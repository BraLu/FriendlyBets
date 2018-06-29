<?php

include("../models/conexion.php");

$action = $_POST['action'];

if ($_POST["action"]=="getByUsuario"){
	getByUsuario();
}

function getByUsuario(){
	include("../models/usuario.php");
	$user=new usuario_model();
	$datos=$user->get_usuarios(1);
	$json_string = json_encode($datos);
	echo $json_string;
}


?>