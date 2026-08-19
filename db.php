<?php
$host = 'db.jxxfawsfmvvporqrbtrv.supabase.co';
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006'; // Reemplaza con tu contraseña de PostgreSQL
$port = '5432';
try {
    $conn = new PDO("pgsql:host=$host;dbname=$db;port=$port", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>