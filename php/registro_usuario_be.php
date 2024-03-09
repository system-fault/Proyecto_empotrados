<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Encriptado de la contraseña
$contrasena = hash('sha512', $contrasena);

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
                VALUES('$nombre_completo','$correo','$usuario','$contrasena')";

if (empty($nombre_completo) || empty($correo) || empty($usuario) || empty($contrasena)) {
    echo '
        <script>
            alert("Por favor, completa todos los campos del formulario.");
            window.location = "../index.php";
        </script>
        ';
} else {

    // Verificar datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Correo electronico existente, utilice otro diferente.");
                window.location = "../index.php";
            </script>
        ';

        exit();
    }

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("El usuario ya existe, por favor intente con otro diferente.");
                window.location = "../index.php";
            </script>
        ';

        exit();
    }

    $ejecutar_registro = mysqli_query($conexion, $query);

    if ($ejecutar_registro) {

        echo '
            <script>
                alert("Usuario Registrado con Exito");
                window.location = "../index.php";
            </script>
        ';
    } else {

        echo '
        <script>
            alert("Intentelo de Nuevo usuario no Registrado");
            window.location = "../index.php";
        </script>
        ';
    }
}
    mysqli_close($conexion);
?>
