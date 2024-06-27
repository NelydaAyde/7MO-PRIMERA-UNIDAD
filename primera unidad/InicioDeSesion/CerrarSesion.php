<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Borrar la cookie de sesión si existe
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
}

// Destruir la sesión
session_destroy();

// Redirigir al usuario al inicio de sesión
header("Location: index.php");
exit();
?>
