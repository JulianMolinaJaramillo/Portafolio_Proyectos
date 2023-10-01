<?php
/**Proyecto creado por: Juliá David Molina Jaramillo
 * Desarrollador de Software
 * 01/10/2023
 */
?>

<?php 
//Incluimos la cabecera con la funcion include
include("cabecera.php"); ?>
<?php 
//Incluimos la conexion con la funcion include
include("conexion.php"); ?>

<?php
//CONSULTAR la base de datos
$objConexion = new conexion();
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos`");
?>


   
   <!-- bs5-jumbotron -->
   <div class="row align-items-md-stretch">
        <div class="col-md-8">
            <div class="h-100 p-5 text-white bg-dark border rounded-3">
            <h1>Bienvenid@s</h1>
            <p class="lead">Este es mi portafolio privado</p>
            <hr class="my-2">
            <p>Mas información</p>
            </div>
        </div>
    </div>
    <!-- bs5-card -->
    
     


<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach($proyectos as $proyect){ ?>
    <div class="col">
        <div class="card h-100">
            <img width="250" src="archivos/<?php echo $proyect['archivo'];?>" class="margin">
            <div class="card-body">
            <h5 class="card-title"><?php echo $proyect['nombre'];?></h5>
            <p class="card-text"><?php echo $proyect['descripcion'];?></p>
            </div>
        </div>
    </div> 
    <?php } ?>     
</div>
    
<?php 
//Incluimos el pie de la pagina
include("pie.php"); ?>