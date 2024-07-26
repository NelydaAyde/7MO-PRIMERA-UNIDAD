<?php
include 'dbconfig.php';
session_start();

$user = $_SESSION['user'];
$sql = "SELECT * FROM evaluaciones WHERE user = '$user' ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Evaluaciones</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .button-container {
            display: flex;
            gap: 10px;
        }
        .button {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 14px;
            display: inline-block;
            margin-top: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .button-container {
                flex-direction: column;
                gap: 5px;
            }
            .button {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Historial de Evaluaciones</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>URL</th>
                        <th>Fecha</th>
                        <th>Puntaje General</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): 
                        $resultado = json_decode($row['resultado'], true);
                        $puntaje_general = getAverageScore($resultado);
                    ?>
                    <tr>
                        <td><?php echo $row['url']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $puntaje_general; ?></td>
                        <td>
                            <div class="button-container">
                                <a href="results.php?id=<?php echo $row['id']; ?>" class="button">Ver</a>
                                <a href="generate_pdf.php?id=<?php echo $row['id']; ?>" class="button">Descargar PDF</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
