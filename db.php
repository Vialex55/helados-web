<?php
// Datos de tu conexión de Neon desglosados de forma tradicional
$host = 'ep-solitary-lake-aywrlh4g-pooler.c-5.us-east-2.aws.neon.tech';
$db   = 'neondb';
$user = 'neondb_owner';
$pass = 'npg_IuYtncH92jXa';
$port = '5432';

// Construimos el DSN de forma clásica para asegurar que el driver lo entienda al 100%
$dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";

try {
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "¡Conexión exitosa a la base de datos de Neon de forma tradicional!";
} catch (PDOException $e) {
    echo "Error al conectar: " . $e->getMessage();
}
?>