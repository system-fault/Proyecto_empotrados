<?php

/*
Este archivo PHP se encarga de destruir la sesión actual del usuario y redirigirlo a la página de inicio de sesión.

- La función session_start() se utiliza para iniciar la sesión actual si no está iniciada.
- La función session_destroy() se utiliza para destruir todos los datos asociados con la sesión actual.
- Después de destruir la sesión, se redirige al usuario a la página de inicio de sesión utilizando la función header() con la opción 'location'.

No se incluyen comentarios adicionales en el código ya que su funcionalidad es bastante clara y concisa.
*/

session_start();
session_destroy();
header("location: ../index.php");

?>
