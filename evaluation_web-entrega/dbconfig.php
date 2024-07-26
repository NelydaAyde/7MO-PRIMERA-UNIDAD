<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evaluation_web";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Función para calcular el puntaje promedio
function getAverageScore($resultado) {
    $categorias = ['contenido', 'diseno', 'rendimiento', 'seo', 'seguridad', 'interactividad', 'analitica', 'accesibilidad'];
    $total_sum = 0;
    $total_items = 0;

    foreach ($categorias as $categoria) {
        if (isset($resultado[$categoria]) && is_array($resultado[$categoria])) {
            $total_sum += array_sum($resultado[$categoria]);
            $total_items += count($resultado[$categoria]);
        }
    }

    return $total_items > 0 ? round($total_sum / $total_items) : 0;
}
?>
