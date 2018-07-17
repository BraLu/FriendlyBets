<?php
  
  if(isset($_GET['id']) && isset($_GET['group'])){
    require '../models/conexion.php'; 
    require "../models/grupo.php";
    require '../controllers/home_controller.php';
    require "../models/apuesta.php";

    $objHomeController = new homeController();
    $objApuesta = new apuesta_model();

    $dataDetalle = $objHomeController->obtenerDetalleApuesta($_GET['group'], $_GET['id']);
    if(count($dataDetalle) == 0){
      die("Usted no tiene acceso a este grupo");
    }

    $existe = $objApuesta->existeSolicitudAdmin($_GET['group'], $_GET['id']);
    if(count($existe) > 0){
        echo "<br>
         <p>Se ha enviado su marcación correctamente</p>";
         exit;
    }
    
  } else {
    die("Ha ocurrido un problema para obtener los partidos");
  }
?>

<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      
      <div class="modal-body">
        
        <div class="row">
        	<div class="col-sm-12 col-md-6 col-lg-6">
        		
        		<div class="form-group">
	        		<label>Administrador del Grupo:</label>
	        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo utf8_encode($dataDetalle[0]['nombre']); ?>">
	        	</div>
        	</div>
        	<div class="col-sm-12 col-md-6 col-lg-6">
        		<div class="form-group">
	        		<label>Monto de Apuesta:</label>
	        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo MONEDA.''.number_format($dataDetalle[0]['monto_apuesta']); ?>">
	        	</div>
        	</div>
    		<div class="col-sm-12 col-md-12 col-lg-12">
        		<div class="form-group">
	        		<label>Ingresar su marcador correspondiente de cada partido:</label>
	        	</div>
        	</div>
        	<div class="col-sm-12 col-md-12 col-lg-12">
        		
		            <div >
            <form id="frmsol" name="frmsol" method="POST" >
              <input type="hidden" name="metodo" value="aceptar"/>
						<table id="tblMarcador" class="table table-bordered table-striped table-sm table-dark" width="100%">
						    <thead class="">
						        <tr>
						            <th>Partidos</th>
						            <th>Fecha Partido</th>
						            <th>Marcador</th>
						        </tr>
						    </thead>
						    <tbody>
					    		<?php 
									
					    			foreach ($dataDetalle as $r) { 
                      $idpart1 = "{$r['id_grp']}_{$r['id_usr']}_{$r['id_partido']}_1";
                      $idpart2 = "{$r['id_grp']}_{$r['id_usr']}_{$r['id_partido']}_2";
					    				echo "<tr>
									            <td>".utf8_encode($r['equipo_1']).' vs '. utf8_encode($r['equipo_2'])."</td>
									            <td>".$r['fecha_part']."</td>
									            <td>
									            	<div class='row'>
									            		<div class='col-md-12'>
											        		<div class='form-inline'>
												        		<input name='".$idpart1."' type='number' onKeyPress='if(this.value.length==2) return false;' id='partido1' style='width: 40px' class='form-control' placeholder='0' value=''>
												        		<label> - </label>
												        		<input name='".$idpart2."' type='number' onKeyPress='if(this.value.length==2) return false;' maxlength='2' id='partido2' style='width: 40px' class='form-control' placeholder='0' value=''>
												        	</div>
											        	</div>
									            	</div>
									            </td>
									        </tr>";
					    			}
					    			
					    		?>
						    </tbody>
						</table>
            </form>
					</div>
        	</div>
        	<div class="col-sm-12 col-md-12 col-lg-12">
        		<div class="form-group">
                    <label>Recuerde!</label>
                    <label>Que solo podra modifcar los marcadores antes de la fecha del primer partido.</textarea>
                  </div>
        	</div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="btnCancel" onclick="closeBox()" class="btn btn-secondary">Cancelar</button>
        <input type="button" id="btnSave" onclick="saveAsSol()" value="Guardar" class="btn btn-primary" >
        <!-- onclick="javascript:GuardarMarcacion()" -->
      </div>
    </div>

  </div>    
  <script type="text/javascript">
  	function closeBox(){
      $("#enviarSolicitud").modal('hide');

    }
    
    function saveAsSol(){
      console.log($('#frmsol').serialize());
      swal({
        title: 'Enviar Solicitud?',
        text: "Si, desea valide el marcador!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Enviar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {

          $.ajax({url: "controllers/servicios_controller.php", 
              contentType: 'application/x-www-form-urlencoded',
              data: $('#frmsol').serialize(),
              type: 'POST',
              dataType: 'html',
              success: function(r){
                console.log(r);
                if(r == 'OK'){
                  closeBox();
                  swal(
                    'Envio Correctamente!',
                    'Espere su confirmación.',
                    'success'
                  ).then((result) =>{
                    location='security/iniciar_session.php';
                  });

                } else {

                }
              
              }
          });

        }

      })

    }

  </script>