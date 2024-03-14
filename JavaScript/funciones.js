/**
 * Este script controla el estado de un LED y la temperatura en una página web.
 *
 * Estado del LED:
 *   - El estado del LED se envía al archivo `variable.php` cuando se hace clic en un botón en la página web.
 *
 * Temperatura:
 *   - Se solicita periódicamente la temperatura al archivo `temperatura.php` y se actualiza en la interfaz de usuario.
 *   - La temperatura recogida se muestra en la interfaz como un valor numérico seguido de "°C".
 *
 * Funciones principales:
 *   1. Envío de estado a `variable.php` cuando se hace clic en un botón en la página web.
 *   2. Obtención periódica de la temperatura.
 *   3. Procesamiento de la temperatura y actualización en la interfaz de usuario.
 *   4. Alternancia entre mostrar un video y una imagen en un reproductor multimedia.
 *
 * Este script utiliza jQuery para gestionar eventos y realizar solicitudes AJAX.
 */

// Estado del led que enviamos a archivo variable.php
let estado = 0;
//Temperatura que mostramos en la web
let temperatura;
let presion;
//temperatura que recogemos del temperatura.php
let temperatura_micro;
let presion_micro;

//? Envío de estado a `variable.php` cuando se hace clic en un botón en la página web.
jQuery(document).ready(function () {
    // Selecciona el botón con el id "boton" y define un evento de clic
    jQuery("#boton").click(function () {
        // Realiza una solicitud POST al archivo `variable.php`
        $.post(
            "./php/variable.php",
            {
                dato: estado, // Envía el estado actual al servidor
            },
            function () {
                // Después de completar la solicitud, cambia la imagen del botón
                let imagen = document.getElementById("miboton");
                // Obtiene la ruta de la imagen actual
                let rutaActual = imagen.src;
                // Verifica la ruta actual y cambia a la imagen correspondiente
                if (rutaActual.includes("boton_on_web")) {
                    imagen.src = "./imagenes/boton_off_web.png"; // Cambia a la segunda imagen
                    estado = 1; // Actualiza el estado del LED a encendido
                } else {
                    imagen.src = "./imagenes/boton_on_web.png"; // Cambia a la primera imagen
                    estado = 0; // Actualiza el estado del LED a apagado
                }
            }
        );
    });
});

//? Función para solicitar la temperatura periódicamente y actualizarla en la interfaz de usuario.
jQuery(document).ready(function () {
    // Define la función obtenerTemperatura que realiza una solicitud GET al archivo `temperatura.php`
    function obtenerTemperatura() {
        $.get("./php/temperatura.php", function (response) {
            // Maneja la respuesta de la página PHP aquí
            console.log("Temperatura recibida:", response);
            // Convierte la respuesta a un número decimal y actualiza la variable temperatura_micro
            temperatura_micro = parseFloat(response);
        });
    }

    // Llama a la función obtenerTemperatura() cada 5 segundos (5000 milisegundos) usando setInterval
    setInterval(obtenerTemperatura, 5000);
});
//? Función para solicitar la presion periódicamente y actualizarla en la interfaz de usuario.
jQuery(document).ready(function () {
    // Define la función obtenerTemperatura que realiza una solicitud GET al archivo `temperatura.php`
    function obtenerPresion() {
        $.get("./php/presion.php", function (response) {
            // Maneja la respuesta de la página PHP aquí
            console.log("Presion recibida:", response);
            // Convierte la respuesta a un número decimal y actualiza la variable temperatura_micro
            presion_micro = parseFloat(response);
        });
    }

    // Llama a la función obtenerPresion() cada 5 segundos (5000 milisegundos) usando setInterval
    setInterval(obtenerPresion, 5000);
});

//? Función para actualizar la temperatura y la presion en la interfaz de usuario.
function actualizarDatos() {
    // Guarda la temperatura recibida por el archivo `temperatura.php`
    temperatura = temperatura_micro;
    // temperatura = "23.5";
    presion = presion_micro;
    // presion="0.98";
    // Actualiza el texto de la temperatura en el HTML
    document.getElementById("temperatura").innerText = temperatura + " ºC";
    document.getElementById("presion").innerText = presion + " Bar";
}

//? Función para alternar entre mostrar un video y una imagen en un reproductor multimedia.
function toggleStream() {
    // Obtiene los elementos del reproductor de video, reproductor de imagen y botón de alternancia
    let videoPlayer = document.getElementById("video-player");
    let imagePlayer = document.getElementById("image-player");
    let toggleButton = document.getElementById("toggle-media");
    let botonDerecha = document.getElementById("btn-derecha");
    let botonIzquierda = document.getElementById("btn-izquierda");


    // Agrega un evento de clic al botón de alternancia
    toggleButton.addEventListener("click", function () {
        // Si el reproductor de video está oculto, lo muestra y oculta el reproductor de imagen
        if (videoPlayer.style.display === "none") {
            videoPlayer.style.display = "block";
            imagePlayer.style.display = "none";
        } else {
            // Si el reproductor de video está visible, lo oculta y muestra el reproductor de imagen
            videoPlayer.style.display = "none";
            imagePlayer.style.display = "block";
        }
        // Después de completar la solicitud, cambia la imagen del botón
        let imagen = document.getElementById("img_toggle");
        // Obtiene la ruta de la imagen actual
        let rutaActual = imagen.src;
        // Verifica la ruta actual y cambia a la imagen correspondiente
        if (rutaActual.includes("img_web.png")) {
            imagen.src = "./imagenes/on_air_web.png"; // Cambia a la segunda imagen
            
        } else {
            imagen.src = "./imagenes/img_web.png"; // Cambia a la primera imagen
        
        }

        // //! sin implementar
        // if(rutaActual.includes("img_web.png")){
        //    botonDerecha.style.visibility = "visible";
        //    botonIzquierda.style.visibility = "visible";
        // }else{
        //    botonDerecha.style.visibility = "hidden";
        //    botonIzquierda.style.visibility = "hidden";
        // }
        
    });
}

//? Funcion para ejecutar al pulsar el boton de salir, sale de la pagina ppal
function salir(){
    console.log("Botón salir presionado");
    window.location.href = "./php/cerrar_session_be.php";
}




