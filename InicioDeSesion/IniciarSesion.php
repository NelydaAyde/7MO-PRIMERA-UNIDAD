<?php
session_start();
require_once __DIR__ . "/conexion.php";

// Obtener datos del formulario
$usuario = $_POST['Usuario'];
$clave = $_POST['Clave'];

// Consulta SQL para verificar el usuario
$sql = "SELECT * FROM usuarios1 WHERE usuario='$usuario' AND clave='$clave'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar sesión
    $_SESSION['Usuario'] = $usuario;
    // Cerrar la conexión
    $conn->close();
    // Redirigir a la página de inicio
    header("Location: inicio.php");
    exit(); // Asegurarse de que el script termine después de redirigir
} else {
    // Redirigir de vuelta al login con un mensaje de error
    header("Location: index.php?error=1");
    exit(); // Asegurarse de que el script termine después de redirigir
}
?>
