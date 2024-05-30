<?php
include('connection.php');
$con = connection();

// Obtener y sanitizar los valores del formulario
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$consulta = isset($_POST['consulta']) ? trim($_POST['consulta']) : '';

// Verificar que todos los campos no están vacíos
if (empty($nombre) || empty($apellido) || empty($username) || empty($password) || empty($email) || empty($consulta)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Usar declaraciones preparadas para insertar los datos de manera segura
$sql = "INSERT INTO users (nombre, apellido, username, password, email, consulta) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($con->error));
}

// Vincular los parámetros
$stmt->bind_param("ssssss", $nombre, $apellido, $username, $password, $email, $consulta);

// Ejecutar la declaración
if ($stmt->execute()) {
    Header("Location: index.php");
} else {
    echo "Error: " . htmlspecialchars($stmt->error);
}

// Cerrar la declaración y la conexión
$stmt->close();
$con->close();
?>
