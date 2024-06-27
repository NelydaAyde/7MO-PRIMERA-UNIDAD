<?php
include '../config.php';
include '../src/analyze_website.php';
include '../src/save_data.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $analysisData = analyzeWebsite($url);
        saveEvaluationData($conn, $url, $analysisData);
        header('Location: report.php?url=' . urlencode($url));
        exit();
    } else {
        $error = "Invalid URL";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Evaluation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Create Evaluation</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" action="create_evaluation.php">
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>
            <button type="submit" class="btn btn-primary">Evaluate</button>
        </form>
    </div>
</body>
</html>
