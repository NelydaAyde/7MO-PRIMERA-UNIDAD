<?php
include 'dbconfig.php';

$id = $_GET['id'];
$sql = "SELECT * FROM evaluaciones WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$resultado = json_decode($row['resultado'], true);

$puntaje_general = getAverageScore($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Evaluación</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .general-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .score-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .site-info {
            text-align: left;
            flex: 1;
            padding-left: 20px;
        }
        .site-info h3 {
            margin: 0;
        }
        .site-info p {
            margin: 10px 0 0;
        }
        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .button {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .chart-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .chart-container h3 {
            margin-top: 0;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Resultados de la Evaluación</h1>
        </div>
        <div class="general-summary">
            <div class="score-circle">
                <div class="score"><?php echo $puntaje_general; ?></div>
            </div>
            <div class="site-info">
                <h3><?php echo $row['url']; ?></h3>
                <div class="button-container">
                    <a href="generate_pdf.php?id=<?php echo $id; ?>" class="button">Descargar PDF</a>
                    <a href="evaluate_form.php" class="button">Reevaluar este sitio</a>
                </div>
                <p>No está mal, pero aún hay margen de mejora.<br>Descubre en lo que necesitas trabajar a continuación.</p>
            </div>
        </div>
        <div class="charts">
            <div class="chart-container">
                <h3>Análisis del Contenido</h3>
                <canvas id="contenidoChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>Diseño y Usabilidad</h3>
                <canvas id="disenoChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>Rendimiento Técnico</h3>
                <canvas id="rendimientoChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>SEO</h3>
                <canvas id="seoChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>Seguridad</h3>
                <canvas id="seguridadChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>Interactividad</h3>
                <canvas id="interactividadChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>Analítica y Métricas</h3>
                <canvas id="analiticaChart"></canvas>
            </div>
            <div class="chart-container">
                <h3>Accesibilidad</h3>
                <canvas id="accesibilidadChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        const contenidoData = {
            labels: ['Calidad', 'Legibilidad', 'Actualización'],
            datasets: [{
                label: 'Análisis del Contenido',
                data: [
                    <?php echo $resultado['contenido']['calidad']; ?>,
                    <?php echo $resultado['contenido']['legibilidad']; ?>,
                    <?php echo $resultado['contenido']['actualizacion']; ?>
                ],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 1
            }]
        };

        const disenoData = {
            labels: ['UI', 'UX', 'Compatibilidad móvil'],
            datasets: [{
                label: 'Diseño y Usabilidad',
                data: [
                    <?php echo $resultado['diseno']['ui']; ?>,
                    <?php echo $resultado['diseno']['ux']; ?>,
                    <?php echo $resultado['diseno']['compatibilidad_movil']; ?>
                ],
                backgroundColor: ['rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        };

        const rendimientoData = {
            labels: ['Velocidad de carga', 'Optimización', 'Uptime'],
            datasets: [{
                label: 'Rendimiento Técnico',
                data: [
                    <?php echo $resultado['rendimiento']['velocidad_carga']; ?>,
                    <?php echo $resultado['rendimiento']['optimizacion']; ?>,
                    <?php echo $resultado['rendimiento']['uptime']; ?>
                ],
                backgroundColor: ['rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        };

        const seoData = {
            labels: ['Palabras clave', 'Metadatos', 'Enlaces'],
            datasets: [{
                label: 'SEO',
                data: [
                    <?php echo $resultado['seo']['palabras_clave']; ?>,
                    <?php echo $resultado['seo']['metadatos']; ?>,
                    <?php echo $resultado['seo']['enlaces']; ?>
                ],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                borderWidth: 1
            }]
        };

        const seguridadData = {
            labels: ['Certificado SSL', 'Protección contra malware', 'Política de privacidad'],
            datasets: [{
                label: 'Seguridad',
                data: [
                    <?php echo $resultado['seguridad']['ssl']; ?>,
                    <?php echo $resultado['seguridad']['malware']; ?>,
                    <?php echo $resultado['seguridad']['privacidad']; ?>
                ],
                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                borderWidth: 1
            }]
        };

        const interactividadData = {
            labels: ['Formularios', 'Redes sociales', 'Funcionalidades adicionales'],
            datasets: [{
                label: 'Interactividad',
                data: [
                    <?php echo $resultado['interactividad']['formularios']; ?>,
                    <?php echo $resultado['interactividad']['redes_sociales']; ?>,
                    <?php echo $resultado['interactividad']['funcionalidades_adicionales']; ?>
                ],
                backgroundColor: ['rgba(255, 159, 64, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                borderColor: ['rgba(255, 159, 64, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }]
        };

        const analiticaData = {
            labels: ['Tráfico web', 'Tasa de rebote', 'Conversión'],
            datasets: [{
                label: 'Analítica y Métricas',
                data: [
                    <?php echo $resultado['analitica']['trafico']; ?>,
                    <?php echo $resultado['analitica']['tasa_rebote']; ?>,
                    <?php echo $resultado['analitica']['conversion']; ?>
                ],
                backgroundColor: ['rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        };

        const accesibilidadData = {
            labels: ['Lectores de pantalla', 'Colores y contrastes', 'Navegación con teclado'],
            datasets: [{
                label: 'Accesibilidad',
                data: [
                    <?php echo $resultado['accesibilidad']['lectores_pantalla']; ?>,
                    <?php echo $resultado['accesibilidad']['colores_contrastes']; ?>,
                    <?php echo $resultado['accesibilidad']['navegacion_teclado']; ?>
                ],
                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                borderWidth: 1
            }]
        };

        // Crear los gráficos
        new Chart(document.getElementById('contenidoChart'), { type: 'bar', data: contenidoData });
        new Chart(document.getElementById('disenoChart'), { type: 'pie', data: disenoData });
        new Chart(document.getElementById('rendimientoChart'), { type: 'line', data: rendimientoData });
        new Chart(document.getElementById('seoChart'), { type: 'bar', data: seoData });
        new Chart(document.getElementById('seguridadChart'), { type: 'pie', data: seguridadData });
        new Chart(document.getElementById('interactividadChart'), { type: 'line', data: interactividadData });
        new Chart(document.getElementById('analiticaChart'), { type: 'bar', data: analiticaData });
        new Chart(document.getElementById('accesibilidadChart'), { type: 'pie', data: accesibilidadData });
    </script>
</body>
</html>
