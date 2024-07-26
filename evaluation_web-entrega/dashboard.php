<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
        }
        .header {
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
            font-size: 24px;
        }
        .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ffccbc;
            margin: 0 auto 10px;
        }
        .nav-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .nav-buttons a {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fff;
            background-color: #42a5f5;
            padding: 15px;
            margin: 5px;
            width: 80%;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
            font-size: 18px;
        }
        .nav-buttons a:hover {
            background-color: #1e88e5;
        }
        .nav-buttons a.icon {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            background-color: #fff;
            color: #42a5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .faq-section {
            margin-top: 20px;
            text-align: left;
        }
        .faq-section h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .faq-item {
            margin-bottom: 10px;
        }
        .faq-item button {
            width: 100%;
            text-align: left;
            padding: 10px;
            border: none;
            background-color: #42a5f5;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
            border-radius: 4px;
        }
        .faq-item button:hover {
            background-color: #1e88e5;
        }
        .faq-item .content {
            display: none;
            padding: 10px;
            background-color: #e3f2fd;
            border-radius: 4px;
            margin-top: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="profile-pic"></div>
            <h1>Bienvenida, <?php echo $_SESSION['user']; ?>!</h1>
        </div>
        <div class="nav-buttons">
            <a href="evaluate_form.php"><div class="icon">🌐</div> Evaluar un Sitio Web</a>
            <a href="history.php"><div class="icon">📜</div> Ver Historial</a>
            <a href="search_form.php"><div class="icon">🔍</div> Buscar Evaluaciones</a>
            <a href="logout.php" style="background-color: #ef5350;"><div class="icon">🔒</div> Cerrar Sesión</a>
        </div>
        <div class="faq-section">
            <h2>Preguntas Frecuentes</h2>
            <div class="faq-item">
                <button>¿Qué es la evaluación de sitios web?</button>
                <div class="content">
                    <p>La evaluación de sitios web implica evaluar el rendimiento, diseño, usabilidad y otros aspectos de un sitio web para determinar su efectividad y áreas de mejora.</p>
                </div>
            </div>
            <div class="faq-item">
                <button>¿Cómo evalúo un sitio web?</button>
                <div class="content">
                    <p>Puedes evaluar un sitio web utilizando diversas herramientas y criterios para medir su rendimiento, diseño, usabilidad, SEO, seguridad y otros factores.</p>
                </div>
            </div>
            <div class="faq-item">
                <button>¿Qué herramientas se utilizan para la evaluación de sitios web?</button>
                <div class="content">
                    <p>Existen varias herramientas disponibles para la evaluación de sitios web, incluyendo Google Analytics, PageSpeed Insights, Lighthouse y varias herramientas de SEO y seguridad.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle FAQ content
        document.querySelectorAll('.faq-item button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>
