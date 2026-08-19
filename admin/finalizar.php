<?php
session_start();
if (!isset($_SESSION['admin_logueado']) || $_SESSION['admin_logueado'] !== true) {
    header("Location: login.php");
    exit();
}
include '../db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cambiamos el UPDATE por un DELETE
    $stmt = $conn->prepare("DELETE FROM pedidos_helado WHERE id = :id");
    $stmt->execute(['id' => $id]);

    // Redirigimos de vuelta al panel
    header("Location: admin.php");
    exit();
}
?>