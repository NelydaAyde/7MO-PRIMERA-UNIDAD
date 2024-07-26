<?php
include 'dbconfig.php';
session_start();

$url = $_POST['url'];
$user = $_SESSION['user'];

// Función de evaluación ficticia (deberías reemplazarla con tu lógica de evaluación real)
function evaluateWebsite($url) {
    return [
        'contenido' => ['calidad' => rand(1, 100), 'legibilidad' => rand(1, 100), 'actualizacion' => rand(1, 100)],
        'diseno' => ['ui' => rand(1, 100), 'ux' => rand(1, 100), 'compatibilidad_movil' => rand(1, 100)],
        'rendimiento' => ['velocidad_carga' => rand(1, 100), 'optimizacion' => rand(1, 100), 'uptime' => rand(1, 100)],
        'seo' => ['palabras_clave' => rand(1, 100), 'metadatos' => rand(1, 100), 'enlaces' => rand(1, 100)],
        'seguridad' => ['ssl' => rand(1, 100), 'malware' => rand(1, 100), 'privacidad' => rand(1, 100)],
        'interactividad' => ['formularios' => rand(1, 100), 'redes_sociales' => rand(1, 100), 'funcionalidades_adicionales' => rand(1, 100)],
        'analitica' => ['trafico' => rand(1, 100), 'tasa_rebote' => rand(1, 100), 'conversion' => rand(1, 100)],
        'accesibilidad' => ['lectores_pantalla' => rand(1, 100), 'colores_contrastes' => rand(1, 100), 'navegacion_teclado' => rand(1, 100)]
    ];
}

$resultado = evaluateWebsite($url);
$resultado_json = json_encode($resultado);

$sql = "INSERT INTO evaluaciones (user, url, resultado) VALUES ('$user', '$url', '$resultado_json')";

if ($conn->query($sql) === TRUE) {
    header('Location: results.php?id=' . $conn->insert_id);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
