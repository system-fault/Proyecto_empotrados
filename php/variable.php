
    <?php
    // tamano del segmento de memoria compartida
    $size_mem = 1024;
    // Crea el segmento de memoria compartida
    $shmid = shmop_open(ftok(__FILE__,'t'),"c",0644,$size_mem);

    // Verificar si el índice 'dato' está definido en $_POST
    if (isset($_POST['dato'])) {

        // Obtener el estado que quiero escribir en el LED desde js cuando hace el post
        $estado = $_POST['dato'];

        //Escribir datos en la memoria compartida
        shmop_write($shmid,$estado,0);
        //Actualiza el dato nada mas actualizarlo
        echo shmop_read($shmid,0,$size_mem);
    } else {
    // Escribimos el dato almacenado en memoria directamente
    echo shmop_read($shmid,0,$size_mem);
    }

    ?>

