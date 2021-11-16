<?php

class Empleado {

    public $id;
    public $nombre;
    public $correo;
    public function __construct($id, $nombre, $correo)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->correo=$correo;

    }

    public static function consultar(){//consulta datos-se pasa a controlador empleado.php
        $listaEmpleados=[];
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->query("SELECT * FROM empleados");
    
        //recuperar datos
        foreach($sql->fetchAll() as $empleado){

            $listaEmpleados[]= new Empleado ($empleado['id'], $empleado['nombre'], $empleado['correo']);
            //datos de select se almacenan en lista empleados
        }
        return $listaEmpleados; //almacenarlos en lista
    
    
    }

    public static function crear($nombre, $correo){
        
        $conexionBD=BD::crearInstancia();//se crea variable para almacenar la conexion de esa variable
        
        $sql= $conexionBD->prepare("INSERT INTO empleados(nombre, correo) VALUES(?,?)");
        $sql->execute(array($nombre, $correo));
    }

    public static function borrar($id){
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->prepare("DELETE FROM empleados WHERE id=? ");
        $sql->execute(array($id));
    }

    public static function buscar($id){
        $conexionBD=BD::crearInstancia();

        $sql= $conexionBD->prepare("SELECT * FROM empleados WHERE id=? ");
        $sql->execute(array($id));
        $empleado=$sql->fetch();
        return new Empleado($empleado['id'], $empleado['nombre'], $empleado['correo']);
    }

    public static function editar($id, $nombre, $correo){
        $conexionBD=BD::crearInstancia();//se crea variable para almacenar la conexion de esa variable
        
        $sql= $conexionBD->prepare("UPDATE empleados SET nombre=?, correo=? WHERE ID=? ");
        $sql->execute(array($nombre, $correo, $id));
    }

}

?>