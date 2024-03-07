

document.getElementById("btn__iniciar-registro").addEventListener("click", registro);
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);


window.addEventListener("resize",anchoPagina);


//declaracion de variables

let contenedor__login_registro = document.querySelector(".contenedor__login-registro");
let formulario_login = document.querySelector(".formulario__login");
let formulario_registro = document.querySelector(".formulario__registro");
let caja_trasera_login = document.querySelector(".caja__trasera-login");
let caja_trasera_registro = document.querySelector(".caja__trasera-registro");


function anchoPagina(){
    if (window.innerWidth> 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
    }else{
        caja_trasera_registro.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_registro.style.display = "none";
        contenedor__login_registro.style.left = "0px";

    }
}

anchoPagina();

function iniciarSesion(){

    if(window.innerWidth > 850){
    formulario_registro.style.display = "none";
    contenedor__login_registro.style.left = "10px";
    formulario_login.style.display = "block";
    caja_trasera_registro.style.opacity = "1";
    caja_trasera_login.style.opacity = "0";
}else{
    formulario_registro.style.display = "none";
    contenedor__login_registro.style.left = "0px";
    formulario_login.style.display = "block";
    caja_trasera_registro.style.display = "block";
    caja_trasera_login.style.display = "none";
}
}


function registro(){

    if(window.innerWidth > 850){
    formulario_registro.style.display = "block";
    contenedor__login_registro.style.left = "410px";
    formulario_login.style.display = "none";
    caja_trasera_registro.style.opacity = "0";
    caja_trasera_login.style.opacity = "1";
}else{
    formulario_registro.style.display = "block";
    contenedor__login_registro.style.left = "0px";
    formulario_login.style.display = "none";
    caja_trasera_registro.style.display = "none";
    caja_trasera_login.style.display = "block";
    caja_trasera_login.style.opacity = "1";
}
}