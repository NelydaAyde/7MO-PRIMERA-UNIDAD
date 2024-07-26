<?php
require_once('vendor/tcpdf/tcpdf.php');  // Ajusta esta ruta según la ubicación real del archivo tcpdf.php
include 'dbconfig.php';

$id = $_GET['id'];
$sql = "SELECT * FROM evaluaciones WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$resultado = json_decode($row['resultado'], true);

$contenido = $resultado['contenido'];
$diseno = $resultado['diseno'];
$rendimiento = $resultado['rendimiento'];
$seo = $resultado['seo'];
$seguridad = $resultado['seguridad'];
$interactividad = $resultado['interactividad'];
$analitica = $resultado['analitica'];
$accesibilidad = $resultado['accesibilidad'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Resultados de la Evaluación');
$pdf->SetSubject('Resultados');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

// set some text to print
$html = '
<h1>Resultados de la Evaluación</h1>
<h2>URL: ' . $row['url'] . '</h2>
<h3>Puntaje General: ' . getAverageScore($resultado) . '</h3>
<h4>Análisis del Contenido</h4>
<p>Calidad: ' . $contenido['calidad'] . '</p>
<p>Legibilidad: ' . $contenido['legibilidad'] . '</p>
<p>Actualización: ' . $contenido['actualizacion'] . '</p>
<h4>Diseño y Usabilidad</h4>
<p>UI: ' . $diseno['ui'] . '</p>
<p>UX: ' . $diseno['ux'] . '</p>
<p>Compatibilidad móvil: ' . $diseno['compatibilidad_movil'] . '</p>
<h4>Rendimiento Técnico</h4>
<p>Velocidad de carga: ' . $rendimiento['velocidad_carga'] . '</p>
<p>Optimización: ' . $rendimiento['optimizacion'] . '</p>
<p>Uptime: ' . $rendimiento['uptime'] . '</p>
<h4>SEO</h4>
<p>Palabras clave: ' . $seo['palabras_clave'] . '</p>
<p>Metadatos: ' . $seo['metadatos'] . '</p>
<p>Enlaces: ' . $seo['enlaces'] . '</p>
<h4>Seguridad</h4>
<p>Certificado SSL: ' . $seguridad['ssl'] . '</p>
<p>Protección contra malware: ' . $seguridad['malware'] . '</p>
<p>Política de privacidad: ' . $seguridad['privacidad'] . '</p>
<h4>Interactividad</h4>
<p>Formularios: ' . $interactividad['formularios'] . '</p>
<p>Redes sociales: ' . $interactividad['redes_sociales'] . '</p>
<p>Funcionalidades adicionales: ' . $interactividad['funcionalidades_adicionales'] . '</p>
<h4>Analítica y Métricas</h4>
<p>Tráfico web: ' . $analitica['trafico'] . '</p>
<p>Tasa de rebote: ' . $analitica['tasa_rebote'] . '</p>
<p>Conversión: ' . $analitica['conversion'] . '</p>
<h4>Accesibilidad</h4>
<p>Lectores de pantalla: ' . $accesibilidad['lectores_pantalla'] . '</p>
<p>Colores y contrastes: ' . $accesibilidad['colores_contrastes'] . '</p>
<p>Navegación con teclado: ' . $accesibilidad['navegacion_teclado'] . '</p>
';

// print a block of text using Write()
$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('resultados_evaluacion.pdf', 'I');

?>
