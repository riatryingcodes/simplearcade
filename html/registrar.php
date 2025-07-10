<?php
$conexion = new mysqli("localhost", "root", "", "arcade");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$password = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, correo, telefono, password) VALUES ('$nombre', '$correo', '$telefono', '$password')";


if ($conexion->query($sql) === TRUE) {
    echo "<script>alert('¡Gracias por registrarte!'); window.location.href='usuario.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
