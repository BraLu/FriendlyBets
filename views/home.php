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
					                    <i class="now-ui-icons ui-1_check"></i>
					                </button>
					                <button type="button" onclick="javascript:RechazarSolicitud()" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Rechazar" class="btn btn-danger btn-sm btn-icon">
					                    <i class="now-ui-icons ui-1_simple-remove"></i>
					                </button>
					            </td>
					            <td>Abierto/Curso/Cerrado</td>
					        </tr>

				    		<?php 

				    			for ($i=1; $i <= 30 ; $i++) { 
				    				# code...
				    				echo "<tr>".
								            "<td><a href='?p=detalle_grupo'>Grupo $i</a></td>".
								            "<td>Administrador</td>".
								            "<td>05/06/2018</td>".
								            "<td>10</td>".
								            "<td>&euro; 200.00</td>".
								            "<td>2 Pendientes</td>".
								            "<td>Abierto</td>".
								        "</tr>";
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
					        <tr>
					            <td>Grupo 4</td>
					            <td>Jose Campos</td>
					            <td>05/06/2018</td>
					            <td>&euro; 10.00</td>
					            <td>&euro; 200.00</td>
					            <td class="td-actions text-center">
					            	<button onclick="return false" class="btn btn-warning btn-sm" data-toggle='modal' data-target='#enviarSolicitud'>
									  <i class="now-ui-icons ui-1_check"></i> Unirse
									</button>
					            </td>
					        </tr>
					        <tr>
					            <td>Grupo 5</td>
					            <td>Carlos Santos</td>
					            <td>05/06/2018</td>
					            <td>&euro; 5.00</td>
					            <td>&euro; 100.00</td>
					            <td class="td-actions text-center">
					            	<button onclick="return false" class="btn btn-warning btn-sm" data-toggle='modal' data-target='#enviarSolicitud'>
									  <i class="now-ui-icons ui-1_check"></i> Unirse
									</button>
					            </td>
					        </tr>
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
        		<div class="form-group">
	        		<label>Administrador del Grupo:</label>
	        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="Juan Carlos">
	        	</div>
        	</div>
        	<div class="col-sm-12 col-md-6 col-lg-6">
        		<div class="form-group">
	        		<label>Monto Total de la Apuesta:</label>
	        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="S/. 200">
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
									
					    			for ($i=1; $i <= 10 ; $i++) { 
					    				echo "<tr>
									            <td>Peru vs Brasil</td>
									            <td>13/05/2018</td>
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