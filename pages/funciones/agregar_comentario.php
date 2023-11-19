<?php
session_start();
$conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano");

function obtenerIdUsuario($conexion, $nombre_usuario) {
    $consulta = "SELECT id FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        return $fila['id'];
    }

    return null;
}

function agregarComentario($conexion, $id_lugar, $nombre_usuario, $comentario, $fecha_comentario, $calificacion) {
    $id_usuario = obtenerIdUsuario($conexion, $nombre_usuario);

    if (!$id_usuario) {
        echo "Error al obtener el id_usuario.";
        return false;
    }

    $nombre_usuario = mysqli_real_escape_string($conexion, $nombre_usuario);
    $comentario = mysqli_real_escape_string($conexion, $comentario);

    $consulta = "INSERT INTO comentarios (id_lugar_destacado, id_usuario, comentario, fecha_comentario, calificacion)
                 VALUES ('$id_lugar', '$id_usuario', '$comentario', '$fecha_comentario', '$calificacion')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        return true;
    } else {
        echo "Error al agregar el comentario: " . mysqli_error($conexion);
        return false;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_lugar = $_POST['id_lugar'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $comentario = $_POST['comentario'];
    
    // Nuevos campos
    $fecha_comentario = $_POST['fecha_comentario'];
    $calificacion = $_POST['calificacion'];

    // Llama a la función para agregar el comentario en la base de datos
    agregarComentario($conexion, $id_lugar, $nombre_usuario, $comentario, $fecha_comentario, $calificacion);

    $_SESSION['mensaje'] = 'Comentario agregado con éxito';
    header("Location: /proyecto/detalles_lugar.php?id=$id_lugar");
    exit();
} else {
    header("Location: /proyecto/index.php");
    exit();
}
?>
