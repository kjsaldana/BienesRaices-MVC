<?php
$auth = $_SESSION['auth'] ?? null;
$login = $login ?? null;
$inicio = $inicio ?? null;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes y Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body <?php echo $login ? ' class="page" ' : ''; ?>>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes Raices" class="logo">
                </a>
                <div class="menu-barra">
                    <img class="icono-menu" src="/build/img/barras.svg" alt="barra navegacion">
                </div>

                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <a
                        href="<?php echo !$auth ? '/login' : '/logout' ?>"><?php echo !$auth ? 'Conectarse' : 'Cerrar sesion' ?></a>
                    <a href="#">
                        <img class="botonDM" src="/build/img/dark-mode.svg" alt="luna dark-mode">
                    </a>
                </nav>

            </div>

            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '' ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion footer_nav">
                <a href="nosotros">Nosotros</a>
                <a href="propiedades">Anuncios</a>
                <a href="blog">Blog</a>
                <a href="contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?>©</p>
        <script src="../build/js/app.js"></script>
    </footer>
</body>

</html>