<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Tu Aplicación Turística</title>
</head> 
<body>
    <?php $conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano");?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.jpg" alt="Logo de Tu Aplicación Turística" style="height: 50px;">
                    Aplicación Turística UNAD Colombia
                </a>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        if (isset($_SESSION['nombre_usuario'])) {
                            echo '<li class="nav-item"><p class="nav-link">Bienvenido, ' . $_SESSION['nombre_usuario'] . '!</p></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Cerrar Sesión</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>