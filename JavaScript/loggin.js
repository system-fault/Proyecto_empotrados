/*
Archivo JavaScript para el manejo del formulario de inicio de sesión y registro
- Selecciona los elementos del DOM y agrega eventos
- Controla el comportamiento del formulario y las animaciones de los contenedores
- Realiza cambios de diseño dependiendo del ancho de la página
*/

// Event listeners para los botones de iniciar sesión y registro
document.getElementById("btn__iniciar-registro").addEventListener("click", registro);
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);

// Event listener para detectar cambios en el tamaño de la ventana del navegador
window.addEventListener("resize", anchoPagina);

// Declaración de variables
let contenedor__login_registro = document.querySelector(".contenedor__login-registro");
let formulario_login = document.querySelector(".formulario__login");
let formulario_registro = document.querySelector(".formulario__registro");
let caja_trasera_login = document.querySelector(".caja__trasera-login");
let caja_trasera_registro = document.querySelector(".caja__trasera-registro");

// Función para ajustar el diseño de la página según el ancho de la ventana del navegador
function anchoPagina() {
    if (window.innerWidth > 850) {
        // Si la ventana es lo suficientemente ancha, muestra ambas cajas traseras y formularios
        caja_trasera_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
    } else {
        // Si la ventana es estrecha, muestra solo una caja trasera y formulario
        caja_trasera_registro.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_registro.style.display = "none";
        contenedor__login_registro.style.left = "0px";
    }
}


// Llama a la función anchoPagina() para ajustar el diseño de la página al cargar
anchoPagina();

// Función para manejar el inicio de sesión
function iniciarSesion() {
    // Si la ventana es lo suficientemente ancha, ajusta el diseño
    if (window.innerWidth > 850) {
        formulario_registro.style.display = "none";
        contenedor__login_registro.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        // Si la ventana es estrecha, muestra solo el formulario de inicio de sesión y la caja trasera correspondiente
        formulario_registro.style.display = "none";
        contenedor__login_registro.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

// Función para manejar el registro de usuarios
function registro() {
    // Si la ventana es lo suficientemente ancha, ajusta el diseño
    if (window.innerWidth > 850) {
        formulario_registro.style.display = "block";
        contenedor__login_registro.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        // Si la ventana es estrecha, muestra solo el formulario de registro y la caja trasera correspondiente
        formulario_registro.style.display = "block";
        contenedor__login_registro.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}
