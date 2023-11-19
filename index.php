<?php include('includes/header.php'); ?>
<?php include('pages/lugares-destacados.php'); ?>


<!-- Contenido específico de la página -->

<section>
    <h2>Explora Lugares Turísticos en Colombia</h2>
    <p>Bienvenido a Tu Aplicación Turística, donde puedes descubrir increíbles destinos turísticos en Colombia.</p>
</section>

<?php
$conexion = mysqli_connect("localhost", "carlos", "1234", "turismo_colombiano");

if ($conexion) {
    $destinos = obtenerDestinosDestacados($conexion);
    imprimirDestinosDestacados($destinos);

    mysqli_close($conexion);
} else {
    echo "Error al conectar a la base de datos.";
}
?>

<section>
    <h2>Encuentra tu Destino Ideal</h2>
    <form action="search.php" method="get">
        <label for="search">Buscar por Nombre o Ubicación:</label>
        <input type="text" id="search" name="search" placeholder="Ingresa el nombre o ubicación">
        <button type="submit">Buscar</button>
    </form>
</section>

<?php include('includes/footer.php'); ?>
