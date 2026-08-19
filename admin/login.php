<?php
session_start();
include '../db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM administradores WHERE usuario = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && $password == $admin['password']) {
        $_SESSION['admin_logueado'] = true;
        $_SESSION['usuario'] = $admin['usuario'];
        header("Location: admin.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Acceso Administrador</h2>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>
    <br>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>