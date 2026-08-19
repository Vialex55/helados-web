<?php
$host = 'db.jxxfawsfmvvporqrbtrv.supabase.co';
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006';
$port = '6543'; // Mantén el puerto 6543, es el correcto para conexiones externas

try {
    // Agregamos 'sslmode=require' y forzamos IPv4 mediante el formato del host
    // Nota: 'host=127.0.0.1' no funcionaría aquí, pero el DSN de PostgreSQL 
    // a veces requiere forzar el protocolo.
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    
    $conn = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // Esto ayuda a que no intente usar persistencia de red problemática
        PDO::ATTR_PERSISTENT => false 
    ]);
} catch (PDOException $e) {
    // Si sigue fallando, esto nos dirá si es por el SSL o por la red
    echo "Error de conexión: " . $e->getMessage();
}
?>