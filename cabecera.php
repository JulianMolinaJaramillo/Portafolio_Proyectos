<?php
session_start();
//Funcion isset nos permite validar si un campo tiene informacion o esta vacio
if (isset($_SESSION['usuario']) != "jmolinja") 
{
    //Funcion header nos permite enviar al usuario a una locación o direccion especifica
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        h2 {text-align: center;}
        a{
            font-size:25px;
        }
        img.margin 
        {
            margin-left: 70px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio Julián Molina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<!-- a = Contededor bootstrap se cierra en el pie-->
<div class="container">

<!-- a = etiqueta para referencia una URL -->
    <strong><a class="text-secondary" href="index.php"> Inicio </a> |</strong>
    <strong><a class="text-secondary" href="portafolio.php"> Portafolio </a> |</strong>
    <strong><a class="text-secondary" href="cerrar.php"> Cerrar Sesión</a></strong>

<body>
    