<?php
// URL de conexión a tu base de datos en Neon
$database_url = "postgresql://neondb_owner:npg_IuYtncH92jXa@ep-solitary-lake-aywrlh4g-pooler.c-5.us-east-2.aws.neon.tech/neondb?sslmode=require";

try {
    $conn = new PDO($database_url);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Si quieres probar la conexión, puedes descomentar la siguiente línea temporalmente:
    // echo "¡Conectado a Neon exitosamente!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>