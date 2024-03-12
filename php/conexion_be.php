<?php

/*
Este archivo PHP establece una conexión con la base de datos utilizando las credenciales proporcionadas.
Se conecta al servidor de base de datos MySQL en localhost con el nombre de usuario 'root' y la contraseña 'empotrados1234'.
La conexión se realiza a la base de datos 'login_registro_db'.
Se comenta un bloque de código que imprime un mensaje de conexión exitosa o fallida, ya que no es necesario para el funcionamiento del archivo.

Si la conexión se establece correctamente, la variable $conexion contendrá el identificador de la conexión a la base de datos.
*/

$conexion = mysqli_connect("localhost", "root", "empotrados1234", "login_registro_db");


//! codigo para debug y comprobar el acceso a la base de datos
// if($conexion){

//     echo 'Conectado exitosamente con la Base de Datos.';
// }else{

//     echo 'No se ha conectado a la Base de Datos.';
// }
//! fin codigo debug

?>
