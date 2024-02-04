<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<header class="headercita">
    <div class="imagen-cita"></div>
    <img src="../../build/img/logo.jpg" alt="logo" class="logo">
    


</header>

<body>
    <div class="contenedor-app-cita">

        <div class="app-cita"><?php echo $contenido; ?></div>

    </div>

    <footer class="footer-cita">
        <div class="links">
            <ul>
                <li>Preguntas frecuentes</li>
                <li>Contacto</li>
                <li>Sucursales</li>
            </ul>
        </div>
        <div class="logo">

            <img loading="lazy" width="150" height="150" src="/../../build/img/logo.jpg" alt="logo">

        </div>
        <div class="iconos">
            <img loading="lazy" width="32" height="32" src="../../build/img/instagram.png" alt="insta">
            <img loading="lazy" width="32" height="32" src="../../build/img/facebook.png" alt="insta">
            <img loading="lazy" width="32" height="32" src="../../build/img/twitter.png" alt="insta">

        </div>

    </footer>


    <?php echo $script ?? ""; ?>
</body>

</html>