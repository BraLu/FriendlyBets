<?php

	require "models/grupo.php";

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

	    		$data = $objGrupo->obtenerGruposTop($_SESSION["session"]);

	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}    		
    	}

    	public function obtenerDetalleApuesta(){

    		try{

    			$objGrupo = new grupo_model();

	    		$data = $objGrupo->obtenerDetalleGrupo(1,IDUSUARIO);

	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}

    	}
	}
?>