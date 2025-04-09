<div class="aviso neutro">
    <?php 
    $id = $id?? null;
    $mensaje = mostrarAviso(intval($id));
    if ($mensaje) { ?>
        <p> <?php echo s($mensaje); ?> </p>
    <?php } ?>
</div>
<main class="contenido-centrado contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.avif" type="image/avif">
            <img src="build/img/destacada.jpg" alt="Casa de lujo jpg" loading="lazy">
        </picture>
        <h2>Llene el formulario</h2>

        <section class="formulario">
            <form action="/contacto" class="personalF" method="POST">
                <fieldset>
                    <legend>Informacion Personal</legend>
                    
                    <div class="type">
                        <label for="name">Nombre</label>
                        <input type="text" placeholder="Tu nombre" id="name" name="contacto[nombre]" required>
                    </div>
                    <div class="type">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informacion sobre la propiedad</legend>
                    
                    <div class="type">
                        <label for="tipo">Venta o compra</label>
                        <select id="tipo" name="contacto[tipo]">
                            <option hidden>--Selecionar--</option>
                            <option value="compra">Compra</option>
                            <option value="venta">Venta</option>
                        </select>
                    </div>
                    <div class="type">
                        <label for="precio">Cantidad en euros</label>
                        <input type="number" step="any" placeholder="€€€" id="precio" min="0" name="contacto[precio]" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informacion sobre la Propiedad</legend>
                    
                    <p class="texto-form" for="name">Como desea ser contactado</p>
                    <div class="type">
                        <div class="contacto-form">
                            <label for="movil-radio">Movil</label>
                            <input type="radio" value="movil" name="contacto[contacto]" id="movil-radio" required>
                            <label for="email-radio">eMail</label>
                            <input type="radio" value="email" name="contacto[contacto]" id="email-radio" required>
                        </div>
                    </div>

                    <div class="contacto-movil oculto">
                        <div class="type">
                            <label for="movil">Movil</label>
                            <input type="tel" placeholder="Tu movil" id="movil" name="contacto[movil]">
                        </div>
                        <div class="type">
                            <label for="date">Fecha</label>
                            <input type="date" id="date" name="contacto[fecha]">
                        </div>
                        <div class="type">
                            <label for="time">Hora</label>
                            <input type="time" id="time" min="09:00" max="21:00" name="contacto[hora]">
                        </div>
                    </div>

                    <div class="contacto-email oculto">
                        <div class="type">
                            <label for="email">eMail</label>
                            <input type="email" placeholder="Tu eMail" id="email" name="contacto[email]">
                        </div>
                    </div>

                </fieldset>
                <div class="boton-gris-from">
                    <input type="submit" class="boton-gris" value="Enviar">
                </div>
            </form>
        </section>

    </main>