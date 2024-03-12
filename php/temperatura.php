
<?php

// tamano del segmento de memoria compartida
$size_mem = 1024;
// Crea el segmento de memoria compartida
$shmid = shmop_open(ftok(__FILE__, 't'), "c", 0644, $size_mem);


if (isset($_GET['temperatura'])) {

$temp = $_GET['temperatura'];

// Convertir la temperatura a cadena y ajustar su longitud
$temp_str = sprintf("%.1f", $temp);

//Escribir datos en la memoria compartida
shmop_write($shmid,$temp_str,0);
//Actualiza el dato nada mas actualizarlo
echo shmop_read($shmid,0,$size_mem);
}else{
    echo shmop_read($shmid,0,$size_mem);
}

?>