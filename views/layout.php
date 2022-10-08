<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NW</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">

        <a href="/" class="header__logo">LOGOTIPO</a>

        <nav class="header__nav-bar">
            <form action="" class="header__nav-form" style="display: block; visibility: hidden;">
                <input type="text" class="header__nav-form--search" autocomplete="on">
                <input type="submit" value="Buscar" class="header__nav-form--btn">
            </form>

            <div id="menu" class="menu">
                <div class="linea"></div>
                <div class="linea"></div>
                <div class="linea"></div>
            </div>

            <div class="header__nav-bar mostrar enlaces" id="enlaces">
                <?php
                echo isset($inicio) ? '' : '<a href="/">Inicio</a>';
                ?>
                <a href="">Hombres</a>
                <a href="">Mujeres</a>
                <a href="">Mugs</a>
                <a href="/carrito"><img src="/media/carrito.png" alt=""></a>
            </div>
            <div class="login">
                <!-- Los valores son así porque si Juanito -->

                <?php
                if (isset($valor)) {
                    switch ($valor) {
                        case 1: ?>
                            <!--Cuando está en la parte de registro -->
                            <a href="/login">Iniciar Sesión</a>
                        <?php break;
                        case 2: ?>
                            <!--Cuando está en la parte de login -->
                            <a href="/registrarse">Registrarse</a>
                        <?php break;
                        case 3: ?>
                            <!--Cuando ya inició Sesión -->
                            <a>Hola <?php echo " " . $nombre; ?>!</a>
                            <a href="/salir">Salir</a>
                        <?php break;
                        case 4: ?>
                            <a>Bienvenido Juanito</a>
                        <?php break;
                        default: ?>
                            <a href="/login">Iniciar Sesión</a>
                            <a href="/registrarse">Registrarse</a>
                <?php break;
                    }
                }
                ?>
            </div>
        </nav>
    </header>

    <?php
    echo isset($inicio) ? '<div class="hero"><div class="hero__content"><p>Now What Clothes Store</p></div></div>' : '';
    ?>

    <main class="contenedor-app" style="min-height: 20rem;">
        <?php echo $contenido; ?>
    </main>

    <footer class="header footer">
        <a href="" class="header__logo">LOGOTIPO</a>

        <nav class="header__nav-bar footer__nav-bar">
            <a href="">Contactanos</a>
            <a href="">Nosotros</a>
            <!-- <a href="">Trabaja Con Nosotros</a>     -->
            <div>
                <a href="">
                    <img src="/media/instagram.png" alt="">
                </a>

                <a href="">
                    <img src="/media/facebook.png" alt="">
                </a>
            </div>
        </nav>
    </footer>

    <script src="/js/script.js"></script>
</body>

</html>