<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <form action="signup_process.php" method="POST">
                <h1>Sign Up</h1>
                <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
                    <div class="error-message">Username already exists.</div>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <!-- Otros campos de registro (nombre, correo, etc.) -->
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <!-- Resto del contenido omitido por brevedad -->
    </div>
</body>
</html>
