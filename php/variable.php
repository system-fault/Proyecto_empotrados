<!-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del LED</title>
</head>

<body>
    <h1>AQUÍ SE VE EL ESTADO DEL LED.</h1> -->

    <?php
    // tamano del segmento de memoria compartida
    $size_mem = 1024;
    // Crea el segmento de memoria compartida
    $shmid = shmop_open(ftok(__FILE__,'t'),"c",0644,$size_mem);

    // Verificar si el índice 'dato' está definido en $_POST
    if (isset($_POST['dato'])) {
        // Obtener el estado del LED
        $estado = $_POST['dato'];
    
        // // Establecer una cookie para almacenar el estado del LED
        // setcookie("estado_led", $estado, time() + (86400 * 30), "/"); // La cookie expira en 30 días
        // // Mostrar el estado del LED en la página
        // echo "<p>El estado del LED es: $estado</p>";

        //Escribir datos en la memoria compartida
        shmop_write($shmid,$estado,0);
        echo shmop_read($shmid,0,$size_mem);

        
        
        
        //Escribir datos en la memoria compartida
        // shmop_write($shmid,$estado,0);
        // Mostrar el estado del LED en la página
        // echo shmop_read($shmid,0,$size_mem);

    } else {
        
    // // Si no se ha enviado un nuevo estado del LED, recuperar el estado de la cookie (si existe)
    // $estado = isset($_COOKIE['estado_led']) ? $_COOKIE['estado_led'] : "No hay datos anteriores";
    //     // echo shmop_read($shmid,0,$size_mem);
    //     echo "<p>El estado del led no ha cambiado sigue siendo: $estado .</p>";

    // Escribimos el dato almacenado en memoria directamente
    echo shmop_read($shmid,0,$size_mem);

    }



    ?>
    
<!-- </body>

</html> -->
