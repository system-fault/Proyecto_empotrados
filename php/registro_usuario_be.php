<?php

/*
    Este script PHP maneja el registro de usuarios en una base de datos.
    Primero, incluye el archivo de conexión a la base de datos.
    Luego, recibe los datos del formulario de registro mediante el método POST.
    A continuación, encripta la contraseña utilizando el algoritmo sha512.
    Realiza una inserción en la tabla de usuarios con los datos proporcionados.
    Verifica si todos los campos del formulario están completos.
    Verifica si el correo electrónico y el nombre de usuario ya existen en la base de datos.
    Muestra alertas y redirige al usuario según los resultados de la verificación y la ejecución del registro.
*/

include 'conexion_be.php';

// Se obtienen los datos del formulario de registro
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Encriptado de la contraseña utilizando el algoritmo sha512
$contrasena = hash('sha512', $contrasena);

// Se prepara la consulta SQL de inserción en la tabla de usuarios
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
            VALUES('$nombre_completo','$correo','$usuario','$contrasena')";

// Se verifica si todos los campos del formulario están completos
if (empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contrasena)) {
    echo '
        <script>
            alert("Por favor, completa todos los campos del formulario.");
            window.location = "../index.php";
        </script>
        ';
} else {
    // Verificación de datos duplicados en la base de datos

    // Verificar si el correo electrónico ya existe en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' ");
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
            <script>
                alert("Correo electrónico existente, utilice otro diferente.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Verificar si el nombre de usuario ya existe en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");
    if (mysqli_num_rows($verificar_usuario) > 0) {
        echo '
            <script>
                alert("El usuario ya existe, por favor intente con otro diferente.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Ejecutar la consulta de inserción en la base de datos
    $ejecutar_registro = mysqli_query($conexion, $query);

    // Mostrar mensajes de éxito o fracaso según el resultado de la inserción
    if ($ejecutar_registro) {
        echo '
            <script>
                alert("Usuario Registrado con Éxito");
                window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
        <script>
            alert("Inténtelo de Nuevo, Usuario no Registrado");
            window.location = "../index.php";
        </script>
        ';
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
