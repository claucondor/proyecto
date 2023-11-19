<?php
$conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['mensaje'] = 'Inicio de sesión exitoso';
        header("Location: /proyecto/index.php");
        exit();
    } else {
        $_SESSION['error'] = 'Usuario o contraseña incorrectos';
        header("Location: /proyecto/login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
