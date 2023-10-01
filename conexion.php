<?php

class conexion
{
    //Conexion a base de datos SQL
    //Normalmente se crea la variable con la ip del servidor de la base de datos
    //Servidor
    private $servidor="localhost"; //127.0.0.1
    //Usuario
    //Si no lo definimos antes lo coloca por defecto
    private $usuario="root";
    //Password
    private $contrasena="";
    //Variable para conexion
    private $conexion;

    //Metodo constructor que se ejecuta inmediatamente se instancie la clase conexion
    public function __construct()
    {
        //Condicional de errores try and catch
        try{
            //PDO clase que permite la conexion a la base de datos, recibe 3 argumentos, direccion, usuario, pass
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=album", $this->usuario, $this->contrasena);

            
            //setAttributte metodo que da acceso a los errores
            //ATTR_ERRMODE constante estatica
            //ERRMODE_EXCEPTION datos que necesita el metodo setAttributte para mostrar los errores
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //catch necesita un PDOException para mostrar el error
        }catch(PDOException $error){

            return "Falla de conexion".$error;
        }
    }

    //ejecutar instrucciones, como INSERTAR, ACTUALIZAR y ELIMINAR
    public function ejecutar($sql)
    {
        //Para ejecutar la instruccion
        $this->conexion->exec($sql);
        //Regresamos el ultimo ID que se insertó o se modificó para realizar operaciones que se necesiten
        return $this->conexion->lastInsertId();

    }

    public function consultar($sql)
    {
        //El metodo prepare toma una consulta SQL y la almacena en una variable
        $sentencia = $this->conexion->prepare($sql);
        //Ejecutamos la sentencia
        $sentencia->execute();
        //fetchAll() retorna todos los registros que se puedan consultar con la sentencia $sql
        return $sentencia->fetchAll();
    }

}

?>