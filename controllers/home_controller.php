<?php

	require "/models/grupo.php";

	class homeController{

		public function init(){
        
    	}

    	public function obtenerMisGrupos(){

    		try{

    			$objGrupo = new grupo_model();

	    		$data = $objGrupo->obtenerMisGrupos();

	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}

    	}

    	public function obtenerGrupoTop(){

			try{

    			$objGrupo = new grupo_model();

	    		$data = $objGrupo->obtenerGruposTop();
	    		
	    		return $data;

    		} catch(Exception $e){
    			echo $e->getMessage();
    		}    		
    	}
	}
?>