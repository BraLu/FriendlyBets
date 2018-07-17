<?php 
  
  class apuesta_model{

  	private $db;

  	public function __construct(){
  		$database  = new BaseDatos();
        $this->db = $database->dbconexion();
    }
    
    public function existeSolicitud($idgrupo, $idusuario){
        
        
			$response = array();
			$consulta= $this->db->query("SELECT * FROM apuesta where id_grp = $idgrupo and id_usr = $idusuario");

	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }

	        return $response;
    }

    public function existeSolicitudAdmin($idgrupo, $idusuario){
        
        
            $response = array();
            $consulta= $this->db->query("SELECT * FROM apuesta where id_grp = $idgrupo and id_usr = $idusuario and Sts_Solicitud_Usr='aceptado'");

            while($filas=$consulta->fetch_assoc()){
                $response[]=$filas;
            }

            return $response;
    }

    public function registrarMarcador(array $post){
        try {
    		//echo json_encode($post);
    		$consulta= $this->db->query("INSERT INTO apuesta(Id_Grp, Id_Usr, Id_Partido,Apuesta_1, Apuesta_2, Ind_Pago,Sts_Solicitud_Usr) 
    		 VALUES (".$post['idgrupo'].", ".$post['idusuario'].", ".$post['idpartido'].",".$post['apuesta1'].",".$post['apuesta2'].",'N','unirse'); ");
	        
    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}
    }

    public function aceptarSolicitud(array $params){

    	try {
    		//echo json_encode($params);
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