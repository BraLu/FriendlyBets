<?php 
  
  class apuesta_model{

  	private $db;

  	public function __construct(){
  		$database  = new BaseDatos();
        $this->db = $database->dbconexion();
    }

    public function aceptarSolicitud(array $params){

    	try {
    		
    		$consulta= $this->db->query("CALL sp_AceptarSolicitud('".$params['p_user']."','".$params['p_idgrp']."','".$params['p_idpartido']."','".$params['p_apuesta1']."','".$params['p_apuesta2']."')");
	        
    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}
        
        return true;
    }

    public function cancelarSolicitud(array $params){

    	try {
    		
    		$consulta= $this->db->query("CALL sp_RechazarSolicitud('".$params['p_user']."','".$params['p_idgrp']."')");
	        
    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}
        
        return true;	
    }
 
  	
  }

?>