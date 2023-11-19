<?php
include('includes/header.php');
include('pages/funciones/lugares-turisticos-comments.php');

$id_lugar = $_GET['id'];
$lugarTuristico = obtenerInformacionLugarTuristico($conexion, $id_lugar);


// Obtén los comentarios del lugar turístico desde la base de datos
$comentarios = obtenerComentarios($conexion, $id_lugar);
?>
<style>
    main {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .detalles-section {
        text-align: center;
        margin-bottom: 20px;
    }

    .detalles-section img {
        max-width: 100%;
        height: auto;
    }

    .comentarios-section {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        margin-bottom: 15px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label, textarea, button {
        margin-bottom: 10px;
    }

    .comentario {
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    .comentario p {
        margin: 0;
    }
</style>
<main>
    <section class="detalles-section">
        <h2><?php echo $lugarTuristico['nombre']; ?></h2>
        <img src="/proyecto<?php echo $lugarTuristico['ruta_imagen']; ?>" alt="<?php echo $lugarTuristico['nombre']; ?>">
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
