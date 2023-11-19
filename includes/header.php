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
<?php $conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano"); ?>
    <header>
        <img src="images/logo.jpg" alt="Logo de Tu Aplicación Turística" style="display: block; margin: 0 auto;">
        <h1>Aplicación Turística UNAD Colombia</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
