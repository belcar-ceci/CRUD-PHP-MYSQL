<?php


class BD{

    private static $instancia=NULL;

    public static function crearInstancia(){

        if(!isset( self::$instancia)){

            $opcionesPDO[PDO::ATTR_ERRMODE]= PDO::ERRMODE_EXCEPTION;

            self::$instancia= new PDO ('mysql:host=localhost;dbname=empleados','root','root', $opcionesPDO);
            //es necesario pasarle root tanto a contraseña como a password por esp se agrega root y root.
            echo "conexión realizada";
        }
        return self::$instancia;
    }
}

?>

