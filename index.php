<?php include('includes/header.php'); ?>
<?php include('pages'); ?>


<!-- Contenido específico de la página -->

<section>
    <h2>Explora Lugares Turísticos en Colombia</h2>
    <p>Bienvenido a Tu Aplicación Turística, donde puedes descubrir increíbles destinos turísticos en Colombia.</p>
</section>

<section class="destacados-section">
    <h2>Destinos Destacados</h2>
    <ul>
        <li>Lugar 1</li>
        <li>Lugar 2</li>
    </ul>
</section>

<section>
    <h2>Encuentra tu Destino Ideal</h2>
    <form action="search.php" method="get">
        <label for="search">Buscar por Nombre o Ubicación:</label>
        <input type="text" id="search" name="search" placeholder="Ingresa el nombre o ubicación">
        <button type="submit">Buscar</button>
    </form>
</section>

<?php include('includes/footer.php'); ?>
