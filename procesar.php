<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando Pedido</title>
    <!-- Enlace al archivo CSS (como está en la raíz, va directo) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" style="text-align: center; margin-top: 50px;">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $semestre = $_POST['semestre'];
            $opcion_letra = $_POST['opcion_letra'];
            $facultad = $_POST['facultad'];
            $cantidad = $_POST['cantidad'];
            $sabor_id = $_POST['sabor_id'];

            try {
                $sql = "INSERT INTO pedidos_helado (nombre, apellido, semestre, facultad, opcion_letra, cantidad, sabor_id) 
                        VALUES (:nombre, :apellido, :semestre, :facultad, :opcion_letra, :cantidad, :sabor_id)";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'semestre' => $semestre,
                    'facultad' => $facultad,
                    'opcion_letra' => $opcion_letra,
                    'cantidad' => $cantidad,
                    'sabor_id' => $sabor_id
                ]);

                echo "<h2 style='color: #27ae60;'>¡Pedido registrado con éxito!</h2>";
                echo "<br><a href='index.php' class='btn'>Regresar</a>";
            } catch (PDOException $e) {
                echo "<h2 style='color: #e74c3c;'>Error al guardar el pedido:</h2>";
                echo "<p>" . $e->getMessage() . "</p>";
                echo "<br><a href='index.php' class='btn'>Volver a intentar</a>";
            }
        }
        ?>
    </div>
</body>
</html>