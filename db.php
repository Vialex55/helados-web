<?php
$domain = 'db.jxxfawsfmvvporqrbtrv.supabase.co';
$db = 'postgres';
$user = 'postgres'; 
$password = 'Vasc@_231006';
$port = '5432';

try {
    // Obtenemos la IP del dominio forzando exclusivamente registros IPv4 (AF_INET)
    $records = dns_get_record($domain, DNS_A);
    if (!empty($records) && isset($records[0]['ip'])) {
        $host = $records[0]['ip']; // Esto nos da una IP numérica IPv4 real (ej. 54.x.x.x)
    } else {
        $host = $domain; // Si falla, usa el dominio por defecto
    }

    // Conectamos usando la IP IPv4 ya limpia y segura
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";
    
    $conn = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
    // Si llega aquí, conectó con éxito (puedes borrar este echo si quieres luego)
    // echo "¡Conexión exitosa!";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>