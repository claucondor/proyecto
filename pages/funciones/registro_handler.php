<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = htmlspecialchars($_POST['nombre_usuario']);
    $contrasena = $_POST['contrasena']; 


    agregarUsuario($nombre_usuario, $contrasena);

    $_SESSION['mensaje'] = 'Registro exitoso. Ahora puedes iniciar sesión.';
    header("Location: /proyecto/login.php");
    exit();
} else {
    header("Location: /proyecto/index.php");
    exit();
}

function agregarUsuario($nombre_usuario, $contrasena) {
    $conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano");

    $nombre_usuario = mysqli_real_escape_string($conexion, $nombre_usuario);

    $consulta = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES ('$nombre_usuario', '$contrasena')";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        $_SESSION['error'] = 'Error al registrar el usuario. Por favor, inténtalo de nuevo.';
    }
    mysqli_close($conexion);
}
?>
