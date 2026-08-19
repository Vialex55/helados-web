<?php
$host = 'db.jxxfawsfmvvporqrbtrv.supabase.co';
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006';
$port = '6543'; // Cambiado al puerto del Pooler de Supabase para mayor estabilidad en la nube

try {
    // Agregamos options para forzar IPv4 y asegurar la compatibilidad con Render
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;options='--client_encoding=UTF8'";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>