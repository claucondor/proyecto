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

    echo '<div id="destacadosCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-left: 40px; margin-right: 40px;">';
    echo '<div class="carousel-inner">';

    $totalDestinos = count($destinos);
    $itemsPorSlide = 3;
    $totalSlides = ceil($totalDestinos / $itemsPorSlide);

    for ($i = 0; $i < $totalSlides; $i++) {
        echo '<div class="carousel-item' . ($i === 0 ? ' active' : '') . '">';
        echo '<div class="row g-3">';

        for ($j = 0; $j < $itemsPorSlide; $j++) {
            $indiceDestino = $i * $itemsPorSlide + $j;

            if ($indiceDestino < $totalDestinos) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                echo '<img src="/proyecto' . $destinos[$indiceDestino]['ruta_imagen'] . '" class="card-img-top" alt="' . $destinos[$indiceDestino]['descripcion'] . '">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . $destinos[$indiceDestino]['descripcion'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#destacadosCarousel" data-bs-slide="prev">';
    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Anterior</span>';
    echo '</button>';
    echo '<button class="carousel-control-next" type="button" data-bs-target="#destacadosCarousel" data-bs-slide="next">';
    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Siguiente</span>';
    echo '</button>';
    echo '</div>';

    echo '</section>';
}

?>