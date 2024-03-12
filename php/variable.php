
    <?php

/*
    Este código PHP maneja la escritura y lectura de datos en un segmento de memoria compartida. 
    Primero, crea un segmento de memoria compartida con un tamaño específico. 
    Luego, verifica si se ha enviado un dato mediante el método POST. 
    Si se recibe un dato, se escribe en el segmento de memoria compartida y se actualiza la respuesta. 
    Si no se recibe ningún dato, se lee el dato almacenado en la memoria compartida y se devuelve como respuesta.
*/


    // tamano del segmento de memoria compartida
    $size_mem = 1024;
    // Crea el segmento de memoria compartida
    $shmid = shmop_open(ftok(__FILE__, 't'), "c", 0644, $size_mem);

    // Verificar si el índice 'dato' está definido en $_POST
    if (isset($_POST['dato'])) {

        // Obtener el estado que quiero escribir en el LED desde js cuando hace el post
        $estado = $_POST['dato'];

        //Escribir datos en la memoria compartida
        shmop_write($shmid, $estado, 0);
        //Actualiza el dato nada mas actualizarlo
        echo shmop_read($shmid, 0, $size_mem);
    } else {
        // Escribimos el dato almacenado en memoria directamente
        echo shmop_read($shmid, 0, $size_mem);
    }

    ?>

