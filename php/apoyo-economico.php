<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Configura estos datos según tu base de datos
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$baseDatos = 'db_funforee';

// Conexión a la base de datos
$conn = new mysqli($host, $usuario, $contrasena, $baseDatos);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos.']);
    exit;
}
$conn->set_charset('utf8mb4');

// Recoge los datos del formulario
$nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : '';
$correo = isset($_POST['correo']) ? $conn->real_escape_string($_POST['correo']) : '';
$monto = isset($_POST['monto']) ? (float)$_POST['monto'] : 0;
$mensaje = isset($_POST['mensaje']) ? $conn->real_escape_string($_POST['mensaje']) : '';

// Validación básica
if ($nombre === '' || $correo === '' || $monto <= 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Campos obligatorios incompletos.']);
    exit;
}

// Inserta en la base de datos
$sql = "INSERT INTO apoyo_economico (nombre, correo, monto, mensaje) VALUES ('$nombre', '$correo', $monto, '$mensaje')";
if ($conn->query($sql)) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Error al guardar la donación: ' . $conn->error  // <-- muestra el error
    ]);
}

$conn->close();
?>
