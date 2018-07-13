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
}elseif ($_POST["action"]=="servicePartidos") {
	# code...
	servicePartidos();
}elseif($_POST["action"]=="serviceCompetencias"){
	serviceCompetencias();
}elseif ($_POST["action"]=="crearGrupo") {
	# code...
	crearGrupo();
}elseif ($_POST["action"]=="getAcceso") {
	# code...
	serviceAcceso();
}elseif ($_POST["action"]=="serviceRegistrar") {
	# code...
	serviceRegistrar();
}elseif ($_POST["action"]=="getByDetallePendienteGrupo") {
	# code...
	getByDetallePendienteGrupo();
}elseif ($_POST["action"]=="getByDetallePendienteUsuarios") {
	# code...
	getByDetallePendienteUsuarios();
}elseif ($_POST["action"]=="getByDetallePendientePartidos") {
	# code...
	getByDetallePendientePartidos();
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

function crearGrupo()
{
	# code...
	include("../models/usuario.php");
	
	$grupo = $_POST["grupo"];
	$nombreGrupo = $grupo["p_Nombregrupo"];
	$montoApuesta = $grupo["p_MontoApuesta"];
	$tipoGrupo = $grupo["p_TipoGrupo"];

	$user=new usuario_model();
	/*Insertamos el Grupo*/
	$response=$user->crearGrupo($nombreGrupo,$_SESSION["session"],$montoApuesta,$tipoGrupo);	
	$idGrp = $response["Id_Grp"];

	/*Insertamos los Partidos*/
	$arrayPartidos = $grupo["Partidos"];
	$add = true;
	foreach($arrayPartidos as $partido)
	{
 		$equipo1 = $partido["p_Equipo1"];
 		$equipo2 = $partido["p_Equipo2"];
 		$fecha = $partido["p_Fecha"];
 		$hora = $partido["p_Hora"];
 		$user=new usuario_model();
 		$response1=$user->crearPartido($equipo1,$equipo2,$fecha,$hora);	
 		$idPartido = $response1["Id_Partido"];
 		//echo json_encode($idPartido);

 		
 		/*Insertamos al Administrador*/
		$user=new usuario_model();
		$response2=$user->crearApuesta($idGrp,$_SESSION["session"],$idPartido,"S","Aceptado");	
		
		/*Insertamos los Amigos*/
		$arrayAmigos = $grupo["Amigos"];
		foreach($arrayAmigos as $amigo)
		{
			$usr = $amigo["p_Usr"];
			$pago = $amigo["p_Pago"];
			$user=new usuario_model();
			$response3=$user->crearApuesta($idGrp,$usr,$idPartido,$pago,"Pendiente");	
		}
	}

	$respuesta[] = array("status"=>200,"message"=>"Se registro correctamente.");
	echo json_encode($respuesta);
}

function servicePartidos()
{
	# code...
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.football-data.org/v1/competitions/".$_POST["filter_id"]."/fixtures",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "postman-token: 8b3f351f-9422-3249-073c-153b02a2032b"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}

function serviceCompetencias()
{
	# code...
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.football-data.org/v1/competitions/?season=".$_POST["filter_anio"],
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "postman-token: f58c5939-4d2d-4d18-dfd7-56865440cdf0"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}

function serviceAcceso()
{
	# code...
	$curl = curl_init();

	//$url = "http://localhost";
	$url = "https://friendlybets-fluque.c9users.io";

	curl_setopt_array($curl, array(
	  CURLOPT_PORT => "8081",
	  CURLOPT_URL => $url.":8081/api/usuario/".$_POST["email"]."/".$_POST["password"],
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "postman-token: b8de9446-463a-6705-f50d-cd26a0653809"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}

function serviceRegistrar()
{
	# code...
	$curl = curl_init();

	//$url = "http://localhost";
	$url = "https://friendlybets-fluque.c9users.io";

	curl_setopt_array($curl, array(
	  CURLOPT_PORT => "8081",
	  CURLOPT_URL => $url.":8081/api/usuario",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $_POST["user"],
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "content-type: application/json",
	    "postman-token: df0fe04c-296f-e2df-22fc-c3c5b87d496b"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
}

function getByDetallePendienteGrupo(){
	include("../models/usuario.php");
	$user=new usuario_model();
	$datos=$user->getByDetallePendienteGrupo($_POST["id_Grp"]);
	$json_string = json_encode($datos);
	echo $json_string;
}

function getByDetallePendienteUsuarios(){
	include("../models/usuario.php");
	$user=new usuario_model();
	$datos=$user->getByDetallePendienteUsuarios($_POST["id_Grp"],$_SESSION["session"]);
	$json_string = json_encode($datos);
	echo $json_string;
}

function getByDetallePendientePartidos(){
	include("../models/usuario.php");
	$user=new usuario_model();
	$datos=$user->getByDetallePendientePartidos($_POST["id_Grp"]);
	$json_string = json_encode($datos);
	echo $json_string;
}

?>