<?php  

	require 'controllers/home_controller.php';
	
	$objHomeController = new homeController();

	$dataGrupos = $objHomeController->obtenerMisGrupos();
	$dataTopGrupos = $objHomeController->obtenerGrupoTop();
	

	$dataDetalle = $objHomeController->obtenerDetalleApuesta();
	
?>
<div class="row">
	
	<div class="col-md-12 frm-home">
		<div class="card table-mis-grupos">
	        <div class="card-header">
	          <h5 class="title">MIS GRUPOS</h5>
	        </div>
	        <div class="card-body">
	          <form>
	            <div class="table-responsive" style="height: 400px">
					<table class="table table-bordered table-striped table-sm table-dark" width="100%">
					    <thead class="">
					        <tr>
					            <th>Grupos</th>
					            <th>Administrador</th>
					            <th>Fecha 1° Partido</th>
					            <th>Cant. Amigos</th>
					            <th>Total de Apuesta</th>
					            <th>Solicitudes</th>
					            <th>Estado</th>
					        </tr>
					    </thead>
					    <tbody>

					    	<tr>
					            <td><a href="?p=detalle_grupo">Grupo 0</a></td>
					            <td>Participante</td>
					            <td>05/06/2018</td>
					            <td>10</td>
					            <td>&euro; 100.00</td>
					            <td class="td-actions text-center">
					            	<button type="button" data-placement="bottom" title="Aceptar" class="btn btn-success btn-sm btn-icon" data-toggle='modal' data-target='#enviarSolicitud'>
					                    <i class="fa fa-check"></i>
					                </button>
					                <button type="button" onclick="javascript:RechazarSolicitud()" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Rechazar" class="btn btn-danger btn-sm btn-icon">
					                    <i class="fa fa-times"></i>
					                </button>
					            </td>
					            <td>Abierto/Curso/Cerrado</td>
					        </tr>

				    		<?php 
				    			if(count($dataGrupos) > 0){

					    			foreach($dataGrupos as $i => $record) { 
					    				
					    				echo "<tr>".
									            "<td><a href='?p=detalle_grupo'>".utf8_encode($record['Nombre_Grp'])." </a></td>".
									            "<td>".utf8_encode($record['Administrador'])."</td>".
									            "<td>".$record['MIN(P.Fecha_Part)']."</td>".
									            "<td>".$record['Cant_Amigos']."</td>".
									            "<td>".MONEDA.' '. number_format($record['Monto_apuesta'],2)."</td>".
									            "<td>".$record['Solicitudes']." Pendientes</td>".
									            "<td>".$record['Sts_Grp']."</td>".
									        "</tr>";
					    			}
				    			}
				    		?>
					    </tbody>
					</table>
				</div>
			  </form>
			</div>
		</div>

		<div class="card table-top-grupos">
	        <div class="card-header">
	          <h5 class="title">TOP GRUPOS</h5>
	        </div>
	        <div class="card-body">
	          <form>
	            <div class="table-responsive" style="height: 400px">
					<table class="table table-bordered table-striped table-sm table-dark" width="100%">
					    <thead>
					        <tr>
					            <th>Grupos</th>
					            <th>Administrador</th>
					            <th>Fecha 1° Partido</th>
					            <th>Apuesta</th>
					            <th>Total de Apuesta</th>
					            <th>Solicitar</th>
					        </tr>
					    </thead>
					    <tbody>

					    	<?php 
					    		if(count($dataTopGrupos) > 0 ){ 
					    			foreach ($dataTopGrupos as $key => $value) {
					    			
					    	?>
					        <tr>
					            <td><?php echo $value['Nombre_Grp']; ?></td>
					            <td><?php echo $value['nombre']; ?></td>
					            <td><?php echo $value['fecha_part']; ?></td>
					            <td><?php echo MONEDA.' '. number_format($value['monto_apuesta'],2); ?></td>
					            <td><?php echo MONEDA.' '. number_format($value['apuesta'],2); ?></td>
					            <td class="td-actions text-center">
					            	<button onclick="return false" class="btn btn-warning btn-sm" data-toggle='modal' data-target='#enviarSolicitud'>
									  <i class="fa fa-envelope"></i> Unirse
									</button>
					            </td>
					        </tr>
					        <?php 
					    			} 
					    		} 
					    	?>

					    </tbody>
					</table>
				</div>
			  </form>
			</div>
		</div>
	</div>

</div>

<style type="text/css">
	
	#tblMarcador>thead>tr>th{
	  padding: 5px !important;
	}

	#tblMarcador>tbody>tr>td{
	  padding: 5px !important;
	}

	#tblMarcador>tbody>tr>td .form-inline{
	  display: inline-flex;
	}

	#tblMarcador>tbody>tr>td .form-control{
  	  text-align: center;
	  background-color: #fff;
	  color: #000;
	}

</style>

<!--Modal de Unirse-->
<div class="modal fade" id="enviarSolicitud" tabindex="-1" role="dialog" aria-labelledby="enviarSolicitudLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enviarSolicitudLabel">Enviar Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
        	<div class="col-sm-12 col-md-6 col-lg-6">
        		<?php //var_dump($dataDetalle); ?>
        		<div class="form-group">
	        		<label>Administrador del Grupo:</label>
	        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo utf8_encode($dataDetalle[0]['nombre']); ?>">
	        	</div>
        	</div>
        	<div class="col-sm-12 col-md-6 col-lg-6">
        		<div class="form-group">
	        		<label>Monto Total de la Apuesta:</label>
	        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo MONEDA.''.number_format($dataDetalle[0]['monto_apuesta']); ?>">
	        	</div>
        	</div>
    		<div class="col-sm-12 col-md-12 col-lg-12">
        		<div class="form-group">
	        		<label>Ingresar su marcador correspondiente de cada partido:</label>
	        	</div>
        	</div>
        	<div class="col-sm-12 col-md-12 col-lg-12">
        		<!--<form>-->
		            <div >
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
					    				echo "<tr>
									            <td>".utf8_encode($r['equipo_1']).' vs '. utf8_encode($r['equipo_2'])."</td>
									            <td>".$r['fecha_part']."</td>
									            <td>
									            	<div class='row'>
									            		<div class='col-md-12'>
											        		<div class='form-inline'>
												        		<input type='number' onKeyPress='if(this.value.length==2) return false;' id='partido1' style='width: 40px' class='form-control' placeholder='0' value=''>
												        		<label> - </label>
												        		<input type='number' onKeyPress='if(this.value.length==2) return false;' maxlength='2' id='partido2' style='width: 40px' class='form-control' placeholder='0' value=''>
												        	</div>
											        	</div>
									            	</div>
									            </td>
									        </tr>";
					    			}
					    			
					    		?>
						    </tbody>
						</table>
					</div>
			  	<!--</form>-->
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="button" value="Guardar" class="btn btn-primary" onclick="javascript:GuardarMarcacion()">
      </div>
    </div>
  </div>
</div>

<!--Script-->
<script type="text/javascript">
	
	function GuardarMarcacion(){
		$("#enviarSolicitud").modal('hide');
		
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
		    swal(
		      'Envio Correctamente!',
		      'Espere su confirmación.',
		      'success'
		    )
		  }else{
		  	$("#enviarSolicitud").modal('show');
		  }
		})

	}

	function RechazarSolicitud(){
		
		swal({
		  title: 'Desea Rechazar Invitación?',
		  text: "Unete al grupo :)",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Rechazar!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
		    swal(
		      'Se Rechazo Correctamente!',
		      ':(',
		      'success'
		    )
		  }
		})

	}

</script>