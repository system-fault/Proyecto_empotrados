<?php

/*
    Este código PHP maneja la escritura y lectura de datos de presion en un segmento de memoria compartida.
    Primero, define el tamaño del segmento de memoria compartida y lo crea.
    Luego, verifica si se ha enviado una presion mediante el método GET.
    Si se recibe una presion, se convierte a una cadena con un solo decimal y se escribe en el segmento de memoria compartida, luego se actualiza la respuesta.
    Si no se recibe ninguna presion, se lee la presion almacenada en la memoria compartida y se devuelve como respuesta.
*/


// tamano del segmento de memoria compartida
$size_mem = 1024;
// Crea el segmento de memoria compartida
$shmid = shmop_open(ftok(__FILE__, 't'), "c", 0644, $size_mem);


if (isset($_GET['presion'])) {

$temp = $_GET['presion'];

// Convertir la presion a cadena y ajustar su longitud
$temp_str = sprintf("%.2f", $temp);

//Escribir datos en la memoria compartida
shmop_write($shmid,$temp_str,0);
//Actualiza el dato nada mas actualizarlo
echo shmop_read($shmid,0,$size_mem);
}else{
    echo shmop_read($shmid,0,$size_mem);
}

?>