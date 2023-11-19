<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Iniciar Sesión</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            width: 400px;
            margin: 0 auto;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .btn-login {
            background-color: #007bff;
            color: white;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px 0;
            background-color: #007bff;
            color: white;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="messages">
    <?php
    session_start();

    // Mostrar mensaje de éxito
    if (isset($_SESSION['mensaje'])) {
        echo '<p style="color: green;">' . $_SESSION['mensaje'] . '</p>';
        unset($_SESSION['mensaje']);
    }

    // Mostrar mensaje de error
    if (isset($_SESSION['error'])) {
        echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="images/logo.jpg" alt="Logo de Tu Aplicación Turística" style="max-width: 100%; height: auto;">
                <h1>Iniciar Sesión</h1>
            </div>
            <div class="card-body">
                <?php
                // Mostrar formulario solo si no hay mensaje de error
                if (!isset($_SESSION['error'])) {
                    echo '
                    <form action="pages/funciones/login_handler.php" method="post">
                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <button type="submit" class="btn btn-login btn-block">Iniciar Sesión</button>
                    </form>
                    <p class="text-center mt-3">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>

                    ';
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> Tu Aplicación Turística. Todos los derechos reservados.</p>
        <p>Desarrollado por Carlos Orlando Patiño Lindarte</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
