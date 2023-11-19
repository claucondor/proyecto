<?php

function obtenerDestinosDestacados($conexion) {
    $destinos = array();

    $consulta = "SELECT * FROM lugares_destacados";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $destinos[] = $fila;
        }
        mysqli_free_result($resultado);
    }

    return $destinos;
}

function imprimirDestinosDestacados($destinos) {
    echo '<section class="destacados-section">';
    echo '<h2>Destinos Destacados</h2>';
    echo '<ul class="destacados-list">';

    foreach ($destinos as $destino) {
        echo '<li class="destacado-card">';
        echo '<img src="' . $destino['ruta_imagen'] . '" alt="' . $destino['descripcion'] . '">';
        echo '<div class="descripcion">' . $destino['descripcion'] . '</div>';
        echo '</li>';
    }

    echo '</ul>';
    echo '</section>';
}

?>