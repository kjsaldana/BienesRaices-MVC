<main class="contenido-login contenedor seccion">
    <h1>Iniciar Sesion</h1>
    <?php
        foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error; ?></p>
        </div>

        <?php
        }
    ?>

    <section class="formulario">
        <form class="personalF" method="POST" action="/login">
            <fieldset>

                <legend>Log-in</legend>
                
                <div class="type">
                    <label for="email">Usuario</label>
                    <input type="email" name="login[email]" placeholder="Tu email" id="email" autocomplete="username">
                </div>

                <div class="type">
                    <label for="password">Contraseña</label>
                    <input type="password" name="login[password]" placeholder="Tu contraseña" id="password" autocomplete="current-password">
                </div>

            </fieldset>

            <div class="boton-gris-from">
                <input type="submit" class="boton-gris" value="Enviar">
            </div>

        </form>
    </section>
</main>