<?php
session_start();
//Destruimos la sesion, para destruir debemos iniciar
session_destroy();
//Funcion header nos permite enviar al usuario a una locación o direccion especifica
echo '<script language="javascript">alert("Sesión Finalizada");window.location.href="login.php"</script>';
?>