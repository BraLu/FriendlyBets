<?php

	require '../models/conexion.php'; 
	require '../models/apuesta.php';

	class serviciosController{

		public function init(){
        
    	}
    	
    	public function registrarSolicitud($post){

			try{

				$insert = array();
	    		foreach ($post as $key => $value) {
	    			list($id_grupo,$id_partido,$nro_apuesta) = explode('_', $key);
	    			$iden = $id_grupo.$id_usuario;

	    			$insert[$iden]['idgrupo'] = $id_grupo;
	    			$insert[$iden]['idusuario'] = IDUSUARIO;
	    			$insert[$iden]['idpartido'] = $id_partido;
	    			$insert[$iden]['apuesta'.$nro_apuesta]=$value;
	    		}

	    		$objApuesta = new apuesta_model();
	    		
	    		if(count($insert) > 0){
	    			foreach ($insert as $record) {
		    			$objApuesta->registrarMarcador($record);
		    		}	
	    		} else {
	    			throw new Exception("Sin datos para procesar", 1);
	    		}	    		

			} catch(Exception $e){
				throw new Exception($e->getMessage(), 1);				
			}  
    			
			return true;    		
    	}

    	public function actualizarSolicitud($post){

			try{

				$updates = array();
	    		foreach ($post as $key => $value) {
	    			list($id_grupo,$id_usuario,$id_partido,$nro_apuesta) = explode('_', $key);
	    			$iden = $id_grupo.$id_partido.$id_usuario;

	    			$updates[$iden]['p_idgrp'] = $id_grupo;
	    			$updates[$iden]['p_idpartido'] = $id_partido;
	    			$updates[$iden]['p_user'] = $id_usuario;
	    			$updates[$iden]['p_apuesta'.$nro_apuesta]=$value;
	    		}

	    		$objApuesta = new apuesta_model();
	    		if(count($updates) > 0){
	    			foreach ($updates as $update) {
		    			$objApuesta->aceptarSolicitud($update);
		    		}	
	    		} else {
	    			throw new Exception("Sin datos para procesar", 1);
	    		}	    		

			} catch(Exception $e){
				throw new Exception($e->getMessage(), 1);				
			}  
    			
			return true;
    	}

    	public function rechazarSolicitud(array $post){

    		try{

    			$objApuesta = new apuesta_model();

    			$objApuesta->cancelarSolicitud($post);
    			
    		} catch(Exception $e){
    			throw new Exception($e->getMessage(), 1);				
    		}
    		return true;
    	}
    }

    if(isset($_POST['metodo'])){

    	$objServicio = new serviciosController();
    	switch ($_POST['metodo']) {
    			case 'unirse':
    			try{
    				unset($_POST['metodo']);
    				$objServicio->registrarSolicitud($_POST);
    				echo 'OK';
    			} catch(Exception $e){
    				echo $e->getMessage();
    			}
    			break; 
    		case 'aceptar':
    			try{
    				unset($_POST['metodo']);
    				$objServicio->actualizarSolicitud($_POST);
    				echo 'OK';
    			} catch(Exception $e){
    				echo $e->getMessage();
    			}
    			break;    		
			case 'rechazar':
				try{
					unset($_POST['metodo']);
    				$objServicio->rechazarSolicitud($_POST);
    				echo 'OK';
				} catch(Exception $e){
					echo $e->getMessage();
				}
				break;
    		default:
    			# code...
    			break;
    	}
    } else {
    	die("Hubo un error en el enrutamiento.");
    }
?>
