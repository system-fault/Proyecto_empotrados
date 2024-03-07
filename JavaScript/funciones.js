/**
 * ? Funciones
 */


function cambiarImagen() {
    let imagen = document.getElementById("miboton");
    //? Obtenemos la ruta de la imagen actual
    let rutaActual = imagen.src;
    
    //? Verificamos la ruta actual y cambiamos a la imagen correspondiente
    if (rutaActual.includes("boton1.jpg")) {
        imagen.src = "./imagenes/boton2.jpg"; // Cambiar a la segunda imagen
    } else {
        imagen.src = "./imagenes/boton1.jpg"; // Cambiar a la primera imagen
    }
}

function generarTemperatura() {
    //? Generar un número aleatorio entre -10 y 45
    let temperatura = Math.floor(Math.random() * (45 - (-10) + 1)) + (-10);
    
    //? Actualizar el texto de la temperatura en el HTML
    document.getElementById("temperatura").innerText = temperatura + " ºC";
}

//? Llamar a la función generarTemperatura inicialmente
generarTemperatura();

//? Actualizar la temperatura cada 10 segundos
setInterval(generarTemperatura, 5000);


// TOGGLE ENTRE VIDEO E IMAGEN

function toggleStream(){

    var videoPlayer = document.getElementById('video-player');
    var imagePlayer = document.getElementById('image-player');
    var toggleButton = document.getElementById('toggle-media');

    toggleButton.addEventListener('click', function() {
        if (videoPlayer.style.display === 'none') {
            videoPlayer.style.display = 'block';
            imagePlayer.style.display = 'none';
        } else {
            videoPlayer.style.display = 'none';
            imagePlayer.style.display = 'block';
        }
    });

}
