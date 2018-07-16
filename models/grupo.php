<?php
  
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

		public function consultarDetalleDeGrupo($idgrupo){
			
			$query = "SELECT g.usr_admin, CONCAT( adm.nombre,  ' ', adm.apellidos ) AS admin, a.id_grp, a.id_usr, a.id_partido, 
			CONCAT( u.nombre,  ' ', u.apellidos )  'nombre', CONCAT( p.equipo_1,  ' Vs ', p.equipo_2 )  'partido', 
			p.fecha_part, p.Hora_part, a.puntaje_usr, a.ptos_result 'puntos'
FROM apuesta a, usuario u, grupo g, partido p, usuario adm
WHERE a.id_usr = u.idusuario
AND a.id_grp = g.id_grp
AND a.id_partido = p.id_partido
AND adm.idusuario = g.usr_admin
AND a.Id_Grp = $idgrupo ";

				$response = array();
				//echo $query; exit;
				$consulta= $this->db->query($query);

	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }
	        
	        return $response;
		}
		
		public function obtenerBodyGrupo($idgrupo){
			
				$response = $this->consultarDetalleDeGrupo($idgrupo);
			
				$store = array();
				foreach($response as $v){
					$store[$v['id_usr']]['nombre'] = $v['nombre']; 
					$store[$v['id_usr']]['partidos'][$v['id_partido']] = $v['puntos']; 
				}

	        return $store;
		}

		public function obtenerCabeceraGrupo($idgrupo){
			
				$response = $this->consultarDetalleDeGrupo($idgrupo);

				$store = array();
				foreach($response as $v){
					$store[$v['id_partido']] = array(
						'partido'=>$v['partido'],
						'fecha'=>$v['fecha_part'],
						'hora'=>$v['Hora_part'],
						'idgrupo'=>$v['id_grp'],
						'idpartido'=>$v['id_partido'],
						'admin'=>$v['admin'],
						);
				}

	        return $store;

		}

		public function obtenerDetallePuntajePartido($idgrupo, $idpartido){
			
			$query = "SELECT CONCAT( u.nombre,  ' ', u.apellidos )  'nombre', 
CONCAT( p.equipo_1,  ' Vs ', p.equipo_2 )  'partido', 
CONCAT( a.apuesta_1,  ' - ', a.apuesta_1 )  'marcacion_apost', 
CONCAT( a.ptos_result,  ' - ', a.ptos_marcador )  'puntos', 
puntaje_usr, p.fecha_part, p.Hora_part, g.id_grp
FROM apuesta a 
JOIN usuario u on a.id_usr = u.idusuario
JOIN grupo g on g.id_grp = a.id_grp
JOIN partido p on g.id_grp = a.id_grp
WHERE g.id_grp = $idgrupo
AND p.id_partido = $idpartido 
GROUP BY a.id_usr";

			$response = array();
			$consulta= $this->db->query($query);

	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }

	        return $response;
			
		}

		public function obtenerGrupoAbierto($idgrupo){
		
		try {
    		
    		$response = array();

				$query = "SELECT g.id_grp, g.nombre_grp, g.sts_grp, g.tipo_grp, g.monto_apuesta, u.nombre, a.id_partido, a.id_usr, a.apuesta_1, a.apuesta_2, p.equipo_1, p.equipo_2, p.goles_1, p.goles_2, p.fecha_part, p.hora_part
FROM grupo g
JOIN apuesta a ON a.id_grp = g.id_grp 
JOIN partido p ON p.id_partido = a.id_partido
JOIN usuario u ON u.idusuario = g.usr_admin
WHERE g.id_grp = $idgrupo  ";
						//echo $query; exit;
    		$consulta= $this->db->query($query);

	        while($filas=$consulta->fetch_assoc()){
	            $response[]=$filas;
	        }

	        return array(0=>current($response));

    	} catch(Exception $e){
    		throw new Exception($e->getMessage(), 1);    		
    	}	
		}

    public function obtenerDetalleGrupo($idgrupo, $idUsuario){

		try {
    		
    		$response = array();

				$query = "SELECT g.id_grp, g.nombre_grp, g.sts_grp, g.tipo_grp, g.monto_apuesta, 
    					u.nombre, a.id_partido, a.id_usr, a.apuesta_1, a.apuesta_2,
					 	p.equipo_1,p.equipo_2,p.goles_1,p.goles_2, p.fecha_part, p.hora_part
					FROM grupo g
					JOIN usuario u ON g.usr_admin = u.idusuario
					JOIN apuesta a ON a.id_grp = g.id_grp
					JOIN partido p ON p.id_partido = a.id_partido
					AND g.usr_admin = u.idusuario
					WHERE g.id_grp like $idgrupo 
						and a.id_usr like $idUsuario ";
						//echo $query; exit;
    		$consulta= $this->db->query($query);

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