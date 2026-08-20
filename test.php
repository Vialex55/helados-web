<?php
// Vamos a comprobar si pdo_pgsql está realmente activo para PHP
if (in_array('pgsql', PDO::getAvailableDrivers())) {
    echo "¡El driver de PostgreSQL está DISPONIBLE!<br><br>";
} else {
    echo "EL DRIVER NO ESTÁ DISPONIBLE. (Aquí está el problema)<br><br>";
}

// Intentar la conexión con Neon
$database_url = "postgresql://neondb_owner:npg_IuYtncH92jXa@ep-solitary-lake-aywrlh4g-pooler.c-5.us-east-2.aws.neon.tech/neondb?sslmode=require";

try {
    $conn = new PDO($database_url);
    echo "¡Conexión exitosa a la base de datos de Neon!";
} catch (PDOException $e) {
    echo "Error al conectar: " . $e->getMessage();
}
?>