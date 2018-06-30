<?php

session_start();

include("../models/conexion.php");

$action = $_POST['action'];

if ($_POST["action"]=="getByUsuario"){
	getByUsuario();
}
elseif ($_POST["action"]=="crearAmistad") {
	# code...
	crearAmistad();
}

function getByUsuario(){
	include("../models/usuario.php");
	$user=new usuario_model();
	$datos=$user->getAmigos($_SESSION["session"], $_POST["search"]);
	$json_string = json_encode($datos);
	echo $json_string;
}

function crearAmistad(){
	include("../models/usuario.php");
	$valid=0;
	$exist=0;

	/*Validar que exista*/
	$user=new usuario_model();
	$datos2=$user->getUsuario(0);
	foreach ($datos2 as $dato2) {
        if ($dato2["email"]==$_POST["email"]) {
        	$exist=1;
        }
    }

	/*Validar que no sea su propio correo*/
	$user=new usuario_model();
	$datos1=$user->getUsuario($_SESSION["session"]);
	foreach ($datos1 as $dato1) {
        if ($dato1["email"]==$_POST["email"]) {
        	$valid = 1;
        	$respuesta1[] = array("status"=>400,"message"=>"No puede ser amigo de si mismo.");
        	echo json_encode($respuesta1);
        	break;
        }
    }

    /*Validar que no se haya agregado una amistad anteriormente*/
    $user=new usuario_model();
	$datos=$user->getAmigos($_SESSION["session"],'');

	foreach ($datos as $dato) {
        if ($dato["email"]==$_POST["email"]) {
        	$valid = 1;
        	$respuesta3[] = array("status"=>400,"message"=>"Ya existe una amistad.");
        	echo json_encode($respuesta3);
        	break;
        }
    }

    /*Registrar la nueva amistad*/
    if ($valid==0) {
    	# code...
    	/*Validar que exista el correo*/
	    if ($exist==0) {
	    	# code...
	    	$respuesta2[] = array("status"=>400,"message"=>"El correo ingresado no tiene una cuenta en FriendlyBets.");
	    	echo json_encode($respuesta2);
	    }else{
	    	$user=new usuario_model();
			$response=$user->registrarAmistad($_SESSION["session"],$_POST["email"]);

			$respuesta4[] = array("status"=>200,"message"=>"Se registro correctamente.");
	    	echo json_encode($respuesta4);
	    }
		

    }
		
}

?>