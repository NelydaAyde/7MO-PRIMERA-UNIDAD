<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container sign-in-container">
            <form action="authenticate.php" method="POST">
                <h1>Welcome!</h1>
                <span>Sign in to your account</span>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <div class="input-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me?</label>
                    <a href="forgot_password.php">Forgot password?</a>
                </div>
                <button type="submit">Sign in</button>
            </form>
        </div>
        <div class="form-container sign-up-container">
            <form action="register.php" method="POST">
                <h1>Create account!</h1>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="submit">Create</button>
                <span>Or create account using social media</span>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
