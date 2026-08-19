<?php 
session_start();
// Si no está logueado, lo mandamos al login
if (!isset($_SESSION['admin_logueado']) || $_SESSION['admin_logueado'] !== true) {
    header("Location: login.php");
    exit();
}
// Subimos un nivel para incluir la conexión desde la carpeta raíz
include '../db.php'; 

// Consultamos los pedidos junto con el nombre del sabor
$query = "SELECT p.*, s.nombre as nombre_sabor 
          FROM pedidos_helado p 
          JOIN sabores s ON p.sabor_id = s.id 
          ORDER BY p.fecha_registro DESC";
$stmt = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Pedidos Recibidos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Facultad</th>
            <th>Sección</th>
            <th>Sabor</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Acción</th>
            <th>Eliminar</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?php echo $row['nombre'] . ' ' . $row['apellido']; ?></td>
            <td><?php echo $row['facultad']; ?></td>
            <td><?php echo htmlspecialchars($row['opcion_letra']); ?></td>
            <td><?php echo $row['nombre_sabor']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>

            <td><?php echo htmlspecialchars($row['estado']); ?></td>
            <td>
                <?php if ($row['estado'] == 'Pendiente') : ?>
                    <a href="actualizar_estado.php?id=<?php echo $row['id']; ?>">Marcar como Entregado</a>
                <?php else : ?>
                    <span style="color: green; font-weight: bold;">Entregado</span>
                <?php endif; ?>
            </td>

                <td>
                <a href="finalizar.php?id=<?php echo $row['id']; ?>" 
                   onclick="return confirm('¿Estás seguro de eliminar este pedido?');">
                   Eliminar pedido
                </a>
                </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <div style="text-align: center; margin-top: 25px;">
    <a href="sabores.php" style="background-color: #3498db; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin: 0 5px; display: inline-block;">Gestionar Sabores</a>
    
    <a href="../index.php" style="background-color: #95a5a6; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin: 0 5px; display: inline-block;">Volver al formulario</a>
    
    <a href="logout.php" style="background-color: #e74c3c; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin: 0 5px; display: inline-block;">Cerrar Sesión</a>
</div>
</html>