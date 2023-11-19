<?php
$conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano");

// Inicia o reanuda la sesión
session_start();

// Comprueba si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales
    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    
    // Ejecuta la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Verifica si la consulta fue exitosa
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Inicia sesión y redirige a la página principal
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['mensaje'] = 'Inicio de sesión exitoso';
        header("Location: /proyecto/index.php");
        exit();
    } else {
        // Credenciales incorrectas, vuelve al formulario de inicio de sesión
        $_SESSION['error'] = 'Usuario o contraseña incorrectos';
        header("Location: /proyecto/login.php");
        exit();
    }
} else {

    header("Location: login.php");
    exit();
}
?>
