<?php 
//Incluimos la cabecera con la funcion include
include("cabecera.php"); ?>
<?php 
//Incluimos la cabecera con la funcion include
include("conexion.php"); ?>

<?php
//INSERSION cuando se realice un envio de formulario
if ($_POST) 
{
    //Variables del post input
    $name = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    //Creamos un objeto tipo fecha para renombrar los archivos que se llamen igual y evitar que se sobrescriban
    $fecha = new DateTime();

    //recepcionamos el nombre del archivo y lo concatenamos a la fecha para modificar el nombre con la fecha y tiempo de subida
    $file = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];

    //Para recibir el archivo original y poderlo descarga posteriormente
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    //move_uploaded_file para mover el archivo a una ubicacion especifica, en este caso a la carpeta archivos
    move_uploaded_file($imagen_temporal,"archivos/".$file);


    //creamos una instancia de la clase conexion
    $objConexion = new conexion();
    $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `archivo`, `descripcion`) VALUES (NULL, '$name', '$file', '$descripcion');";

    //Accedemos al metodo ejecutar de la clase conexion
    $objConexion->ejecutar($sql);

    echo '<script language="javascript">alert("Proyecto Agregado Exitosamente");window.location.href="portafolio.php"</script>';
}

//ELIMINAR de la base de datos recibiendo el envio GET del boton eliminar
if ($_GET) 
{
    $id = $_GET['borrar'];
    $objConexion = new conexion();

    //Primero identificamos el archivo que se desea eliminar
    $archivo = $objConexion->consultar("SELECT archivo FROM `proyectos` WHERE id = $id");
    //Metodo unlink me permite eliminar un archivo de una ruta en especifico
    unlink("archivos/".$archivo[0]['archivo']);

    $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` = $id";
    $objConexion->ejecutar($sql);

    //Funcion header nos permite enviar al usuario a una locación o direccion especifica
    header("location:portafolio.php");
}

//CONSULTAR la base de datos
$objConexion = new conexion();
$proyectos = $objConexion->consultar("SELECT * FROM `proyectos`");


?>




<br/>
<br/>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- bs5-grid-card-head-foot -->
            <div class="card">
                <div class="card-header">
                    <h2>Datos Del Proyecto</h2>
                </div>
                <div class="card-body">
                <form action="portafolio.php" method="post" enctype="multipart/form-data">
                    <strong>Nombre del Proyecto: </strong>        
                    <!-- required para requerir los campos -->       
                    <input required class="form-control" type="text" name="nombre">
                    <br/>
                    <strong>Archivo del Proyecto: </strong>                  
                    <input required class="form-control" type="file" name="archivo">    
                    <br/>
                    <strong>Descripción del Proyecto: </strong>             
                    <textarea required class="form-control" name="descripcion" cols="30" rows="5"></textarea>   
                    <br/>
                    <div class="vh-5 row m-3 text-center align-items-center justify-content-center"><input class="btn btn-dark" type="submit" value="Subir Proyecto"></div>     
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- bs5-table-default -->
            <div class="table-responsive">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Archivo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones    </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- recorremos y asignamos los registros de la base de datos -->
                        <?php foreach($proyectos as $proyect){ ?>
                        <tr>
                            <td><?php echo $proyect['id'];?></td>
                            <td><?php echo $proyect['nombre'];?></td>
                            <td>
                                <!-- img para mostrar una imagen en la pagina web -->
                                <img width="70" src="archivos/<?php echo $proyect['archivo'];?>" class=".img">
                                <br/>
                                <?php echo $proyect['archivo'];?>
                            </td>
                            <td><?php echo $proyect['descripcion'];?></td>
                            <!-- bs5-button-a -->
                            <!-- Enviamos un parametro por URL a traves de GET para poder borrar ?borrar-->
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyect['id'];?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?php 
//Incluimos el pie de la pagina
include("pie.php"); ?>