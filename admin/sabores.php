<?php
session_start();
if (!isset($_SESSION['admin_logueado']) || $_SESSION['admin_logueado'] !== true) {
    header("Location: login.php");
    exit();
}

include '../db.php';

$mensaje = '';

// Procesar cuando se agrega un nuevo sabor
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nuevo_sabor'])) {
    $nombre_sabor = trim($_POST['nombre_sabor']);
    if (!empty($nombre_sabor)) {
        try {
            $stmt = $conn->prepare("INSERT INTO sabores (nombre, disponible) VALUES (:nombre, TRUE)");
            $stmt->execute(['nombre' => $nombre_sabor]);
            $mensaje = "¡Sabor agregado con éxito!";
        } catch (PDOException $e) {
            $mensaje = "Error: El sabor ya existe o hubo un problema.";
        }
    }
}

// Procesar cuando se cambia el estado (disponible / no disponible)
if (isset($_GET['accion']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $nuevo_estado = ($_GET['accion'] == 'activar') ? 'TRUE' : 'FALSE';
    
    $sql = "UPDATE sabores SET disponible = $nuevo_estado WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    header("Location: sabores.php");
    exit();
}

// Obtener todos los sabores de la base de datos
$stmt = $conn->query("SELECT * FROM sabores ORDER BY id ASC");
$sabores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Sabores</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Gestión de Sabores de Helado</h1>
    <a href="admin.php">← Volver al Panel de Pedidos</a>
    <hr>

    <?php if ($mensaje): ?>
        <p style="color: blue;"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h3>Agregar Nuevo Sabor</h3>
    <form method="POST">
        <input type="text" name="nombre_sabor" placeholder="Ej. Maracuyá" required>
        <button type="submit" name="nuevo_sabor">Guardar Sabor</button>
    </form>

    <h3>Lista de Sabores Registrados</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($sabores as $sabor): ?>
        <tr>
            <td><?php echo $sabor['id']; ?></td>
            <td><?php echo $sabor['nombre']; ?></td>
            <td>
                <?php echo $sabor['disponible'] ? '<span class="btn-activo">Disponible</span>' : '<span class="btn-inactivo">No disponible</span>'; ?>
            </td>
            <td>
                <?php if ($sabor['disponible']): ?>
                    <a href="sabores.php?accion=desactivar&id=<?php echo $sabor['id']; ?>" style="color: red;">Desactivar</a>
                <?php else: ?>
                    <a href="sabores.php?accion=activar&id=<?php echo $sabor['id']; ?>" style="color: green;">Activar</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>