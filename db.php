<?php
$host = 'db.jxxfawsfmvvporqrbtrv.supabase.co';
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006';
$port = '5432'; // Volvemos al puerto 5432 con sslmode

try {
    // Forzamos sslmode y deshabilitamos las opciones que buscan IPv6
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    
    $conn = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>