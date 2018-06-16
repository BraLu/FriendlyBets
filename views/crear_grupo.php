

<style type="text/css">
	
@media (max-width: 520px) { 
  	#search_amigo{
  		width: 100% !important;
  		margin-left: 0px !important;
	}

	.btn-size-grupo{
		width: 100% !important;
		float: none;
	}

	.btn-new-amigo{
		width: 100% !important;
	}
}

</style>

<div class="card">
    <div class="card-header">
      <h5 class="title">CREAR GRUPO DE APUESTAS</h5>
    </div>
    <div class="card-body">
		<div class="row">
			    		
			<div class="col-md-4">
				<div class="panel panel-default"> 
				
	      			<div class="form-group">
	      				<label for="nombre_grupo">Nombre del Grupo:</label>
	      				<input type="text" class="form-control" maxlength="100" name="nombre_grupo"/>
	      			</div>
	      		
	      			<div class="form-group">
	      				<label for="monto_grupo">Apuesta por Persona:</label>
	      				<input type="number" class="form-control" name="monto_grupo"/>
	      			</div>

	      			<div class="form-group">
	      				<div class="form-check">
						    <label class="form-check-label">
						    	Grupo Abierto:
						        <input class="form-check-input" name="abierto_grupo" type="checkbox" value="">
						          
						        <span class="form-check-sign">
						            <span class="check"></span>
						        </span>
						    </label>
						</div>
	      			</div>
      			
      				<div class="form-group">
			      		<label for="texto_grupo">Detalle de apuesta:</label>
			      		<textarea class="form-control" disabled="" name="texto_grupo" row="5"/></textarea>	
      				</div>
		      		
		  		</div>
		  	</div>

		  	<div class="col-md-8">
  		
		  		<div class="form-inline">
				    <label for="nombre_amigo">Buscar Amigo : </label>
				    <select class="form-control" id="search_amigo" style="width: 40%; margin-left: 5px">
			    	  <option>Selecionar Amigo</option>
				      <option>Amigo 1</option>
				      <option>Amigo 2</option>
				      <option>Amigo 3</option>
				      <option>Amigo 4</option>
				      <option>Amigo 5</option>
				    </select>
				    <button type="button" title="Nuevo Amigo" style="margin-left: 5px" class="btn btn-primary btn-new-amigo" data-toggle='modal' data-target='#m_nuevo_amigo' >
							                    Nuevo Amigo
							                </button>
				</div>

		  		<div class="form-group">
		      
		            <div class="table-responsive" >
						<table class="table table-bordered table-striped table-sm table-dark" >
						    <thead class="">
						        <tr>
						            <th>Nombre</th>
						            <th>Correo</th>
						            <th>Solicitud</th>
						            <th>Pago</th>
						            <th></th>
						        </tr>
						    </thead>
						    <tbody>
								<tr>
						            <td>Angel Mamani </td>
						            <td>amamani@gmail.com</td>
						            <td>Pendiente</td>
						            <td><input type="checkbox" name="id1"/> </td>
						            <td><button type="button" title="Remover" class="btn btn-danger btn-sm btn-icon">
					                    <i class="fa fa-times fa-sm"></i>
					                	</button>
					            	</td>
						        </tr>
						        <tr>
						            <td>Carlos Santos </td>
						            <td>csantos@gmail.com</td>
						            <td>Aceptado</td>
						            <td><input type="checkbox" name="id2"/></td>
						            <td><button type="button" title="Remover" class="btn btn-danger btn-sm btn-icon">
					                    <i class="fa fa-times fa-sm"></i>
					                	</button>
					            	</td>
						        </tr>
						        <tr>
						            <td>Fernando </td>
						            <td>fluque@gmail.com</td>
						            <td>Solicitado</td>
						            <td><input type="checkbox" name="id3"/> </td>
						            <td><button type="button" title="Remover" class="btn btn-danger btn-sm btn-icon">
					                    <i class="fa fa-times fa-sm"></i>
					                	</button>
					            	</td>
						        </tr>
						    </tbody>
						</table>
					</div>
			  
				</div>
				<div class="form-group">
					<label>Seleccionar Partidos:</label>	
				</div>

				
				<div class="form-group">
		      
		            <div class="table-responsive" >
						<table class="table table-bordered table-striped table-sm table-dark" width="100%">
						    <thead class="">
						        <tr>
						            <th>Codigo</th>
						            <th>Partido</th>
						            <th>Fecha</th>
						            <th>Marcar</th>
						        </tr>
						    </thead>
						    <tbody>
								<tr>
						            <td>001 </td>
						            <td>Peru vs Escocia</td>
						            <td>Sabado 7 de Junio del 2018</td>
						            <td><input type="checkbox" name="id1"/> </td>
						        </tr>
						        <tr>
						            <td>002 </td>
						            <td>Peru vs Dinamarca</td>
						            <td>Sabado 14 de Junio del 2018</td>
						            <td><input type="checkbox" name="id1"/> </td>
						        </tr>
						        
						    </tbody>
						</table>
					</div>
			  
				</div>
		  		
		  		<!--<button type="button" class="btn btn-danger">Cancelar</button>-->
		  	</div>

		  	<div class="col-md-12">
		  		<div class="form-group">
		  			
			  		<button type="button" class="btn btn-success btn-size-grupo" style="width: 150px; float: right;">Guardar</button>	
		      		<button type="button" class="btn btn-info btn-size-grupo" disabled="" style="width: 150px; float: right;">Puntaje</button>
		      		<button type="button" class="btn btn-danger btn-size-grupo" disabled="" style="width: 150px; float: right;">Eliminar Grupo</button>

			  	</div>
		  	</div>

		</div>
	</div>
</div>


<!--Modal de Unirse-->
<div class="modal fade" id="m_nuevo_amigo" tabindex="-1" role="dialog" aria-labelledby="m_nuevo_amigoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m_nuevo_amigoLabel">Nuevo Amigo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
			<div class="form-group">
	    		<label>Ingresa el correo electronico de tu amigo:</label>
	    		<input type="email" class="form-control" placeholder="Email" value="">
	    	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="button" value="Guardar" class="btn btn-primary" onclick="javascript:showNotification('top','right')">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	function showNotification(from, align){
		
		$("#m_nuevo_amigo").modal('hide');

    	color = 'success';

	    $.notify({
	        icon: "now-ui-icons ui-1_check",
	        message: "Se agrego correctamente."

	      },{
	          type: color,
	          timer: 200,
	          placement: {
	              from: from,
	              align: align
	          }
	      });
	}

</script>