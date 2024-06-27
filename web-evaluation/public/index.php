<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Evaluation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            flex: 0 0 250px;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar a {
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column p-3">
        <h3>Web Evaluation</h3>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_evaluation.php">Create Evaluation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">Web Evaluation System</a>
        </nav>
        <div class="container mt-5">
            <h1 class="text-center">Dashboard</h1>
            <p>Welcome to the Web Evaluation System. Use the sidebar to navigate through different sections.</p>
        </div>
    </div>
</body>
</html>

<?php
include '../src/send_email.php';

// Ejemplo de datos
$to = 'cnelyda7201@gmail.com'; // Reemplaza con el correo electrónico del destinatario
$url = 'http://cnelyda7201@gmail.com';
$load_time = 2.5;
$word_count = 1234;

sendNotificationEmail($to, $url, $load_time, $word_count);
?>
