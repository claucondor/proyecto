<?php
include('pages/funciones/lugares-turisticos-comments.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_lugar = $_POST['id_lugar'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $comentario = $_POST['comentario'];
    $fecha_comentario = date('Y-m-d'); // Fecha actual

    // Llama a la función para agregar el comentario en la base de datos
    agregarComentario($conexion, $id_lugar, $nombre_usuario, $comentario, $fecha_comentario);

    $_SESSION['mensaje'] = 'Comentario agregado con éxito';
    header("Location: /proyecto/detalles.php?id=$id_lugar");
    exit();
} else {
    header("Location: /proyecto/index.php");
    exit();
}
?>