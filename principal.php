<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Tienes que iniciar sesion primero.");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }

    
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Autor" content="David Martinez" />
    <title>Control WEB</title>
    <link rel="stylesheet" href="./CSS/estilos.css" />
    <script src="./JavaScript/funciones.js"></script>
</head>

<body onload="generarTemperatura();">
    <div class="titulo">
        <h1>CONTROL WEB</h1>
        <a href="php/cerrar_session_be.php">Cerrar Sesion</a>
    </div>

    <section class="grid-layout">

        <div class="cajaTemperatura">
            <h2>MEDICION TEMPERATURA</h2>
            <!--? DISPLAY TEMPERATURA -->
            <div id="displayTemperatura">
                <img id="display" src="./imagenes/display.jpg">
                <h3 id="temperatura">
                    <script>
                        setInterval(generarTemperatura, 5000);
                    </script>
                </h3>
            </div>
        </div>

        <div class="cajaStream">
            <h2>STREAM VIDEO</h2>
            <div id="media-container">
                <video controls width="80%" height="70%" id="video-player">
                    <source src="./video/file_example_MP4_640_3MG.mp4" type="video/mp4">
                    Tu navegador no admite la etiqueta de video.
                </video>
                <img id="image-player" src="./imagenes/I need an image to be displayed when the video is .jpg" alt="Imagen">
            </div>
            <div>
                <button id="toggle-media" onclick="toggleStream()">
                    <img src="./imagenes/botonVideo.png" alt="Boton icono de youtube" width="50" height="50" />
                </button>
            </div>
        </div>

        <div class="cajaControl">
            <h2>BOTONES CONTROL</h2>
            <button id="boton" onclick="cambiarImagen()">
                <img id="miboton" src="./imagenes/boton1.jpg" />
            </button>
        </div>
    </section>
</body>

</html>
