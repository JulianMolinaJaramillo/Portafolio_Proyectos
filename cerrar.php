<?php
session_start();
//Destruimos la sesion, para destruir debemos iniciar
session_destroy();
//Funcion header nos permite enviar al usuario a una locación o direccion especifica
header("location:login.php");
?>