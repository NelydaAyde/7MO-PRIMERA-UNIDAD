<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
} else {
    // Si no ha iniciado sesión, redirigir al usuario al inicio de sesión
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('universo.jpg'); /* Cambia 'background.jpg' por la URL de tu imagen de fondo */
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        header {
            background-color: rgba(0, 0, 0, 0.6); /* Ajusta la opacidad según tus preferencias */
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centra los elementos horizontalmente */
        }
        nav ul li {
            margin-right: 20px;
            position: relative;
        }
        nav ul li:last-child {
            margin-right: 0; /* Elimina el margen derecho del último elemento */
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
            padding: 10px;
        }
        nav ul li a:hover {
            color: #ffc107; /* Cambia el color al pasar el ratón */
        }
        .submenu {
            display: none;
            position: absolute;
            top: 40px; /* Ajusta la posición vertical del submenú */
            left: 0;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 5px;
            padding: 10px;
            z-index: 1;
        }
        nav ul li:hover .submenu {
            display: block;
        }
        .submenu li {
            margin: 5px 0;
        }
        .submenu li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }
        .submenu li a:hover {
            color: #ffc107; /* Cambia el color al pasar el ratón */
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }
        .main-section {
            flex: 70%;
            background-color: rgba(255, 255, 255, 0.8); /* Ajusta la opacidad según tus preferencias */
            padding: 20px;
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-section h2 {
            color: #343a40;
        }
        .news {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .news-item {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .news-item h3 {
            color: #343a40;
        }
        .news-item p {
            color: #555;
        }
        .news-item a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .news-item a:hover {
            text-decoration: underline;
        }
        .sidebar {
            flex: 30%;
            background-color: rgba(255, 255, 255, 0.8); /* Ajusta la opacidad según tus preferencias */
            padding: 20px;
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .event {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .event h3 {
            color: #343a40;
            margin-bottom: 5px;
        }
        .event p {
            color: #555;
            margin: 0;
        }
        footer {
            background-color: rgba(0, 0, 0, 0.6); /* Ajusta la opacidad según tus preferencias */
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 8px 8px;
            margin-top: 20px;
        }
        footer p {
            margin: 0;
        }
        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Our Community!</h1>
            <nav>
            <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Ciencia</a></li>
                    <li><a href="#">Misión</a></li>
                    <li><a href="#">Actividades</a></li>
                    <li><a href="#">Recursos</a>
                        <ul class="submenu">
                            <li><a href="#">Libros</a></li>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">Artículos</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Divulgación</a>
                        <ul class="submenu">
                            <li><a href="#">Charlas</a></li>
                            <li><a href="#">Talleres</a></li>
                            <li><a href="#">Entrevistas</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Conferencias</a>
                        <ul class="submenu">
                            <li><a href="#">Próximas</a></li>
                            <li><a href="#">Pasadas</a></li>
                            <li><a href="#">Destacadas</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Noticias</a>
                        <ul class="submenu">
                            <li><a href="#">Nacionales</a></li>
                            <li><a href="#">Internacionales</a></li>
                            <li><a href="#">Locales</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="banner">
            <img src="1522858_2bc75.gif" alt="Animated Banner">
        </div>
        </header>
        
        <div class="content">
            <div class="main-section">
                <h2>Latest News</h2>
                <div class="news">
                    <div class="news-item">
                        <h3>Community Event</h3>
                        <p>Join us for our upcoming community event on Saturday, June 12th. Don't miss out on all the fun!</p>
                        <a href="#">Read More</a>
                    </div>
                    <div class="news-item">
                        <h3>New Blog Post</h3>
                        <p>Check out our latest blog post discussing the importance of community engagement and collaboration.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <h2>Upcoming Events</h2>
                <div class="event">
                    <h3>Community Cleanup</h3>
                    <p>Date: Saturday, June 19th</p>
                </div>
                <div class="event">
                    <h3>Volunteer Orientation</h3>
                    <p>Date: Wednesday, June 23rd</p>
                </div>
            </div>
        </div>
        <footer>
            <p>© 2024 Community Name. All rights reserved.</p>
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Inicio</title>
            </head>
            <body>
                <h1>Bienvenido, <?php echo $usuario; ?>!</h1>
                <a href="CerrarSesion.php">Cerrar Sesión</a>
            </body>
        </footer>
    </div>
</body>
</html>

