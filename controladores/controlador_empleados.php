<?php

include_once("modelos/empleado.php");

include_once("conexion.php");

//BD::crearInstancia(); se creo primero para ver si lei la BBDD
//AHORA SE PASARA A EMPLEADO.PHP
class ControladorEmpleados{

    public function inicio(){

        $empleados=Empleado::consultar();//metodo consultar ya integrado en el modelo
        //recupera información, se crea variable empleados para almacenar los datos que vienen de este modelo.
        include_once("vistas/empleados/inicio.php");
        //muesta en la vista desde donde leemos el dato
    }
    public function crear(){
        
        if($_POST){ 

            print_r($_POST);
            $nombre=$_POST['nombre'];
            $correo=$_POST['correo'];
            Empleado::crear($nombre,$correo);
            header("Location:./?controlador=empleados&accion=inicio");
        }
        include_once("vistas/empleados/crear.php");
    }
    public function editar(){
        
        if($_POST){ //si hay un post consulto los datos y despues 
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $correo=$_POST['correo'];

            Empleado::editar($id, $nombre, $correo);
            header("Location:./?controlador=empleados&accion=inicio");

            
            //print_r($_POST);
        }
        $id=$_GET['id'];//veo que sucede

        //print_r(Empleado::buscar($id));
        $empleado=(Empleado::buscar($id));

        include_once("vistas/empleados/editar.php");
    }


    public function borrar(){
    print_r($_GET); 

        $id=$_GET['id'];

        Empleado::borrar($id);//accede al modelo para borrar
        header("Location:./?controlador=empleados&accion=inicio");
        //me llevara al inicio de la linea 11
    }

    





}

?>
