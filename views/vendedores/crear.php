<main class="contenedor seccion">
    <h1>Registro de Vendedores</h1>
    <a href="/admin" class="boton-gris">Volver</a>

<?php 
    foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error ?></p>
        </div>
    <?php
}?>

    <form class="formulario contenedor contenido-centrado" method="POST">
        <?php include __DIR__ . '/formulario.php';
        echo '<br />'?>

        <input type="submit" class="boton-verde" value="Enviar">
    </form>

</main>