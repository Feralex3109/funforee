<?php
$host = '127.0.0.1'; // Mejor que 'localhost' en muchos casos de PHP
$usuario = 'funforee';
$contrasena = 'Mathi@3109';
$baseDatos = 'db_funforee';
$puerto = 3308;

$conn = new mysqli($host, $usuario, $contrasena, $baseDatos, $puerto);

if ($conn->connect_error) {
    http_response_code(500);
    exit('Error de conexión a la base de datos: ' . $conn->connect_error);
}

if (!$conn->set_charset('utf8mb4')) {
    error_log('Error al configurar utf8mb4: ' . $conn->error);
}
?>





