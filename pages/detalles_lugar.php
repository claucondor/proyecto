<?php
include('includes/header.php');

$id_lugar = $_GET['id'];
$lugarTuristico = obtenerInformacionLugarTuristico($conexion, $id_lugar);

// Obtén los comentarios del lugar turístico desde la base de datos
$comentarios = obtenerComentarios($conexion, $id_lugar);
?>

<main>
    <section class="detalles-section">
        <h2><?php echo $lugarTuristico['nombre']; ?></h2>
        <img src="<?php echo $lugarTuristico['ruta_imagen']; ?>" alt="<?php echo $lugarTuristico['nombre']; ?>">
    </section>

    <section class="comentarios-section">
        <h3>Comentarios</h3>

        <!-- Formulario para agregar comentarios -->
        <form action="agregar_comentario.php" method="post">
            <input type="hidden" name="id_lugar" value="<?php echo $id_lugar; ?>">
            <label for="nombre_usuario">Nombre:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" required></textarea>
            <button type="submit">Agregar Comentario</button>
        </form>

        <!-- Mostrar comentarios existentes -->
        <?php foreach ($comentarios as $comentario): ?>
            <div class="comentario">
                <p><strong><?php echo $comentario['nombre_usuario']; ?>:</strong> <?php echo $comentario['comentario']; ?></p>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?php include('includes/footer.php'); ?>
