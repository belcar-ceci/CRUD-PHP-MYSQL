<?php


include_once("controladores/controlador_".$controlador.".php");

$objControlador= "Controlador".ucfirst($controlador);

$controlador = new $objControlador();//instancia del controlador al que quiero acceder

$controlador->$accion();



?>