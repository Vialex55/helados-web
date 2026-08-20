<?php
$host = 'ep-solitary-lake-aywrlh4g-pooler.c-5.us-east-2.aws.neon.tech';
$db   = 'neondb';
$user = 'neondb_owner';
$pass = 'npg_IuYtncH92jXa';
$port = '5432';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";

try {
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // echo "¡Conexión exitosa!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>