<?php
session_start();
if (!isset($_SESSION['admin_logueado']) || $_SESSION['admin_logueado'] !== true) {
    header("Location: login.php");
    exit();
}

include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Actualizamos el estado del pedido a 'Entregado'
    $stmt = $conn->prepare("UPDATE pedidos_helado SET estado = 'Entregado' WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: admin.php");
    exit();
}
?>