<?php

// Este fragmento PHP se encarga de verificar si el usuario ha iniciado sesión.
// Si el usuario no ha iniciado sesión, se muestra un mensaje de alerta y se redirige a la página de inicio de sesión (index.php).
// Además, se destruye la sesión y se detiene la ejecución del script.

session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
            <script>
                alert("Tienes que iniciar sesión primero.");
                window.location = "index.php";
            </script>
        ';
    session_destroy(); // Destruye la sesión actual
    die(); // Detiene la ejecución del script
}

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Autor" content="David Martinez" />
    <title>Control WEB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/estilos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./JavaScript/funciones.js"></script>


</head>

<body onload="actualizarDatos();">
    <div class="titulo">
        <h1>CONTROL WEB</h1>
        <button id="boton_salir" onclick="salir()" width="50px" height="50px">
        <img src="./imagenes/cerrar_Session_web.png" alt="icono cierre sesion" width="50px" height="50px">
        </button>
    </div>

    <section class="grid-layout">

        <div class="cajaTemperatura">
            <h2>MEDICION AMBIENTAL</h2>
            <!--? DISPLAY TEMPERATURA -->
            <div id="displayTemperatura">
                <img id="display" src="./imagenes/display_web.png">
                <div class="rotulos-display">
                    <h3 class="display_info" id="temperatura">
                        <script onload="setInterval();">
                            setInterval(actualizarDatos, 5000);
                        </script>
                    </h3>
                    <h3 class="display_info" id="presion">
                        <script onload="setInterval();">
                            setInterval(actualizarDatos, 5000);
                        </script>
                    </h3>
                </div class="rotulos-display">
            </div>
        </div>

        <div class="cajaStream">
            <h2>STREAM VIDEO</h2>
            <div id="media-container">
                <img id="image-player" src="./imagenes/carrusel/A desk where it's evident someone has been working.jpg" width="500" height="auto" alt="Imagen">
                <iframe id="video-player" src="http://192.168.1.38:63888/video" frameborder="0" width="640" height="480"></iframe>
            </div>

            <div>
                <!-- <button id="btn-izquierda" class="botonesFlechas"><img src="./imagenes/flechas_izq_web.png" alt="imagen flecha izquierda" width="100" height="100"></button> -->
                <button id="toggle-media" onclick="toggleStream()">
                    <img id="img_toggle" src="./imagenes/img_web.png" alt="Imagen Boton" width="100" height="100" />
                </button>
                <!-- <button id="btn-derecha" class="botonesFlechas"><img src="./imagenes/flechas_derc_web.png" alt="imagen flecha derecha" width="100" height="100"></button> -->
            </div>
        </div>

        <div class="cajaControl">
            <h2>BOTON CONTROL</h2>
            <!-- <h3><a href="php/variable.php">VER ESTADO</a></h3> -->
            <button id="boton">
                <img id="miboton" src="./imagenes/boton_on_web.png" width="200px" height="auto" />
            </button>
        </div>
    </section>
</body>



</html>