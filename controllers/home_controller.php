<?php

	class homeController{

		public function init(){
        
    	}

    	public function obtenerMisGrupos(){

    		try{

    			$objGrupo = new grupo_model();

	    		$data = $objGrupo->obtenerMisGrupos($_SESSION["session"]);

	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}

    	}

    	public function obtenerGrupoTop(){

			try{

    			$objGrupo = new grupo_model();

	    		$data = $objGrupo->obtenerGruposTop(IDUSUARIO);

	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}    		
    	}

    	public function obtenerDetalleApuesta($idgroup = 1, $idusuario = IDUSUARIO){

    		try{

    			$objGrupo = new grupo_model();

	    		$data = $objGrupo->obtenerDetalleGrupo($idgroup, $idusuario);

	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}

    	}

    	public function aceptar(){

    		try{

    			$objApuesta = new apuesta_model();

	    		$data = $objApuesta->aceptarSolicitud($_POST);

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}

    		return 'OK';
    	}

    	public function rechazar(){

    		try{

    			$objApuesta = new apuesta_model();

	    		$data = $objApuesta->rechazarSolicitud($_POST);

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}

    		return 'OK';

    	}

	}
?>