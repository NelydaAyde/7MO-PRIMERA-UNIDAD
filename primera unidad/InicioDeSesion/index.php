<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh60/CkQoPOWDdYTDqeRdPCVd15pvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inicio de sesión</title>
    <style>
        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <form action="IniciarSesion.php" method="POST">
                <h1>Hello, Welcome!</h1>
                <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
                    <div class="alert alert-danger">Incorrect username or password.</div>
                <?php endif; ?>
                <div class="error-message">
                    <?php if(isset($_GET['error']) && $_GET['error'] == 2): ?>
                        Username incorrecto.
                    <?php endif; ?>
                    <?php if(isset($_GET['error']) && $_GET['error'] == 3): ?>
                        Password incorrecto.
                    <?php endif; ?>
                </div>
                <label for="usuario">Username</label>
                <div class="label-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="usuario" name="Usuario" placeholder="Enter your username or email" required>
                </div>
                <label for="clave">Password</label>
                <div class="label-container">
                    <i class="fa-solid fa-unlock"></i>
                    <input type="password" id="clave" name="Clave" placeholder="Enter your password" required>
                </div>
                <div class="form-footer">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit">Login</button>
                <button type="button" class="secondary-button">Sign-up</button>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </form>
        </div>
        <div class="right-panel">
            <!-- La imagen de fondo ya está incluida en el CSS de la clase .right-panel -->
        </div>
    </div>
</body>
</html>
