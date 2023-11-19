<?php

function obtenerInformacionLugarTuristico($conexion, $id) {
    $consulta = "SELECT * FROM lugares_destacados WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    }

    return null;
}

function obtenerComentarios($conexion, $id_lugar) {
    $consulta = "SELECT * FROM comentarios WHERE id_lugar = $id_lugar";
    $resultado = mysqli_query($conexion, $consulta);

    $comentarios = array();
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $comentarios[] = $fila;
    }

    return $comentarios;
}

?>