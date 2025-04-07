
<div class="aviso neutro">
    <?php 
    $mensaje = mostrarAviso(intval($id));
    if ($mensaje) { ?>
        <p> <?php echo s($mensaje); ?> </p>
    <?php } ?>
</div>

<main class="contenedor seccion">
    <h1>Administrador de DB</h1>
    <a href="/propiedad/crear" class="boton boton-gris">Crear Propiedad</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-gris">Crear Vendedor</a>
    <h2>Propiedades</h2>
    <table class="table-propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad) {?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td class="contenedor-ti"><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="tabla-imagen"></td>
                    <td><?php echo $propiedad->precio; ?>€</td>
                    <td>
                        <a href="/propiedad/actualizar<?php echo '?id='. $propiedad->id; ?>" class="boton-verde">Actualizar</a>
                        <form method="POST" action="/propiedad/delete">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }?>

        </tbody>
    </table>
</main>