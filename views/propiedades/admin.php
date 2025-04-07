
<div class="aviso neutro">
    <?php 
    $mensaje = mostrarAviso(intval($id));
    if ($mensaje) { ?>
        <p> <?php echo s($mensaje); ?> </p>
    <?php } ?>
</div>

<main class="contenedor seccion">
    <h1>Administrador de DB</h1>
    <a href="/propiedades/crear" class="boton boton-gris">Crear Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-gris">Crear Vendedor</a>
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
                        <a href="/propiedades/actualizar<?php echo '?id='. $propiedad->id; ?>" class="boton-verde">Actualizar</a>
                        <form method="POST" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }?>

        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="table-propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Movil</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) {?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->movil; ?></td>
                    <td>
                        <a href="/vendedores/actualizar<?php echo '?id='. $vendedor->id; ?>" class="boton-verde">Actualizar</a>
                        <form method="POST" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }?>

        </tbody>
    </table>

</main>