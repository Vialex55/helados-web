<?php
// Usamos la IP directa de Supabase para forzar IPv4 y evitar el error de red inalcanzable
$host = '54.219.60.207'; // IP de Supabase (US West / general) o intentemos con el nombre con un truco de opciones
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006';
$port = '5432'; // Volvemos al puerto 5432 o probamos con 6543 si prefieres

try {
    // Forzamos el uso de TCP/IP puro para evitar IPv6
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>