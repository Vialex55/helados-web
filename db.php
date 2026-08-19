<?php
$host = 'db.jxxfawsfmvvporqrbtrv.supabase.co';
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006';
$port = '6543'; // Usamos el puerto del Pooler de Supabase

try {
    // Añadimos connect_timeout=10 para darle margen a la red externa
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;connect_timeout=10";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>