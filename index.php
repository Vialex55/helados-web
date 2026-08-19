<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>Pide tu Helado</title>
</head>
<body>
    <h1>¡Pide tu Helado!</h1>
    <form action="procesar.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Apellido:</label><br>
        <input type="text" name="apellido" required><br><br>

        <label>Semestre:</label><br>
        <input type="text" name="semestre" required><br><br>

        <label>Selecciona una sección:</label><br>
<input type="radio" name="opcion_letra" value="A" checked> A<br>
<input type="radio" name="opcion_letra" value="B"> B<br>
<input type="radio" name="opcion_letra" value="C"> C<br><br>

        <label>Facultad:</label><br>
        <input type="text" name="facultad" required><br><br>

        <label>Cantidad de helados:</label><br>
        <input type="number" name="cantidad" min="1" required><br><br>

        <label>Sabor:</label><br>
        <select name="sabor_id" required>
            <option value="">Selecciona un sabor</option>
            <?php
            // Consultamos los sabores disponibles en la base de datos
            $stmt = $conn->query("SELECT * FROM sabores WHERE disponible = TRUE");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Enviar Pedido</button>
    </form>
</body>
</html>