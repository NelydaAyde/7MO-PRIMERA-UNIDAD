<?php
include '../config.php';
include '../src/generate_pdf.php';
include '../src/send_email.php';

$url = $_GET['url'];
$sql = "SELECT * FROM evaluations WHERE url='$url' ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);
$evaluation = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['download_pdf'])) {
    generatePDFReport($evaluation['url'], $evaluation['load_time'], $evaluation['word_count'], $evaluation['image_count'], $evaluation['link_count'], $evaluation['script_count']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send_email'])) {
    $to = 'cnelyda7201@gmail.com';
    sendNotificationEmail($to, $evaluation['url'], $evaluation['load_time'], $evaluation['word_count'], $evaluation['image_count'], $evaluation['link_count'], $evaluation['script_count']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Evaluation Results</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
        <form method="post" class="text-center">
            <button type="submit" name="download_pdf" class="btn btn-primary mt-3">Download PDF</button>
            <button type="submit" name="send_email" class="btn btn-secondary mt-3">Send by Email</button>
        </form>
    </div>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Load Time', 'Word Count', 'Image Count', 'Link Count', 'Script Count'],
                datasets: [{
                    label: 'Scores',
                    data: [
                        <?php echo $evaluation['load_time']; ?>,
                        <?php echo $evaluation['word_count']; ?>,
                        <?php echo $evaluation['image_count']; ?>,
                        <?php echo $evaluation['link_count']; ?>,
                        <?php echo $evaluation['script_count']; ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
