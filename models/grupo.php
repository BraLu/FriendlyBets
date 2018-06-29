<?php

  require 'models/conexion.php'; 
  
  class grupo_model{

  	private $db;

  	public function __construct(){
  		$database  = new BaseDatos();
        $this->db = $database->dbconexion();
    }


    public function obtenerMisGrupos($idUsuario = 1){

    	try {
    		
    		$response = array();

    		$consulta= $this->db->query("CALL sp_ListarMisGrupos(".$idUsuario.")");
	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }

	        return $response;

    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}
        
    }

	public function obtenerGruposTop(){

    	try {
    		
    		$response = array();

    		$consulta= $this->db->query("CALL sp_top_grupo()");
	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }

	        return $response;

    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}
        
    }    
  	
  }

?>