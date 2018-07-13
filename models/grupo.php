<?php

  require 'models/conexion.php'; 
  
  class grupo_model{

  	private $db;

  	public function __construct(){
  		$database  = new BaseDatos();
        $this->db = $database->dbconexion();
    }


    public function obtenerMisGrupos($idUsuario){

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

	public function obtenerGruposTop($idUsuario){

    	try {
    		
    		$response = array();

    		$consulta= $this->db->query("CALL sp_top_grupo(".$idUsuario.")");
	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }

	        return $response;

    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}
        
    } 

    public function obtenerDetalleGrupo($idgrupo = 1, $idUsuario = 1){

		try {
    		
    		$response = array();

    		$consulta= $this->db->query("SELECT g.id_grp, g.nombre_grp, g.sts_grp, g.tipo_grp, g.monto_apuesta, 
    					u.nombre, a.id_partido, a.apuesta_1, a.apuesta_2,
					 	p.equipo_1,p.equipo_2,p.goles_1,p.goles_2, p.fecha_part, p.hora_part
					FROM grupo g
					JOIN usuario u ON g.usr_admin = u.idusuario
					JOIN apuesta a ON a.id_grp = g.id_grp
					JOIN partido p ON p.id_partido = a.id_partido
					AND g.usr_admin = u.idusuario
					WHERE g.id_grp = $idgrupo 
						and a.id_usr = $idUsuario ");

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