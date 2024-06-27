<?php
session_start();
require_once __DIR__ . "/conexion.php";

// Obtener datos del formulario
$usuario = $_POST['username'];
$clave = $_POST['password']; // Asegúrate de agregar el campo de contraseña en tu formulario

// Verificar si el usuario ya existe
$sql = "SELECT * FROM usuarios1 WHERE usuario='$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El usuario ya existe, redirigir a la página de registro con un mensaje de error
    header("Location: signup.php?error=1");
    exit();
} else {
    // El usuario no existe, insertar en la base de datos
    $sql_insert = "INSERT INTO usuarios1 (usuario, clave) VALUES ('$usuario', '$clave')";
    if ($conn->query($sql_insert) === TRUE) {
        // Registro exitoso, iniciar sesión y redirigir al usuario a la página de inicio
        $_SESSION['Usuario'] = $usuario;
        header("Location: inicio.php");
        exit();
    } else {
        // Error al insertar en la base de datos, redirigir con un mensaje de error
        header("Location: signup.php?error=2");
        exit();
    }
}
?>
