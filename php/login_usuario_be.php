<?php

/*
    Este archivo PHP se encarga de manejar el inicio de sesión de los usuarios. 
    Primero, inicia una sesión para mantener el estado del usuario durante la navegación. 
    Luego, incluye el archivo de conexión a la base de datos para acceder a los datos almacenados. 
    A continuación, recibe los datos del formulario de inicio de sesión: el correo electrónico y la contraseña.
    La contraseña se encripta utilizando el algoritmo hash sha512 para compararla con la contraseña almacenada en la base de datos de manera segura.
    Se realiza una consulta SQL para verificar si existen registros que coincidan con el correo electrónico y la contraseña proporcionados.
    Si se encuentra un usuario con las credenciales válidas, se inicia la sesión del usuario y se lo redirige a la página principal.
    Si las credenciales son inválidas, se muestra un mensaje de alerta y se redirige al usuario de vuelta a la página de inicio de sesión para que vuelva a intentarlo.
*/

// Inicio de la sesión para mantener el estado de la sesión del usuario
session_start();

// Inclusión del archivo de conexión a la base de datos
include 'conexion_be.php';

// Obtención de los datos del formulario de inicio de sesión
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Encriptado de la contraseña utilizando el algoritmo sha512
$contrasena = hash('sha512', $contrasena);

// Consulta SQL para validar las credenciales del usuario
$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios 
                    WHERE correo = '$correo' and contrasena = '$contrasena'");

// Verificación del resultado de la consulta y manejo de la sesión
if (mysqli_num_rows($validar_login) > 0) {
    // Si las credenciales son válidas, se inicia la sesión y se redirige al usuario a la página principal
    $_SESSION['usuario'] = $correo;
    header("location: ../principal.php");
    exit();
} else {
    // Si las credenciales son inválidas, se muestra un mensaje de alerta y se redirige al usuario a la página de inicio de sesión
    echo '
        <script>
            alert("Usuario no existe, verifique los datos");
            window.location = "../index.php";
        </script>
    ';
    exit();
}
?>

