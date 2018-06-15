
<div class="card table-mis-grupos">
    <div class="card-header">
      <h5 class="title">CREAR GRUPO</h5>
    </div>
    
<div class="row">
	    		
	<div class="col-md-6 col-md-offset-6">
		<div class="panel panel-default"> 
		
      		<label for="nombre_grupo">Nombre del Grupo:</label>
      		<input type="text" class="form-control" name="nombre_grupo"/>
      		
      		<label for="monto_grupo">Apuesta por Persona:</label>
      		
      		<input type="text" class="form-control" name="monto_grupo"/>
      		
      		<p><label for="abierto_grupo">Grupo Abierto:</label>
      			<input type="checkbox" name="abierto_grupo"/></p>
      		
      		<label for="texto_grupo">Detalle de apuesta:</label>
      		<textarea class="form-control" name="texto_grupo" row="5"/></textarea>
      		
      		<button type="button" class="btn btn-success">Guardar</button>
      		
      		<button type="button" class="btn btn-info">Puntaje</button>
      		
      		<button type="button" class="btn btn-warning">Cancelar</button>
  		</div>
  	</div>
  	<div class="col-md-6 col-md-offset-6">
  		
  		<label for="nombre_amigo">Agregar Amigo:</label>
  		<input type="text" class="form-control" name="nombre_amigo"/>
  		<div class="card-body">
      
            <div class="table-responsive" >
				<table class="table table-bordered table-striped table-sm table-dark" >
				    <thead class="">
				        <tr>
				            <th>Nombre</th>
				            <th>Correo</th>
				            <th>Solicitud</th>
				            <th>Pago</th>
				        </tr>
				    </thead>
				    <tbody>
						<tr>
				            <td>Angel Mamani </td>
				            <td>amamani@gmail.com</td>
				            <td>Pendiente</td>
				            <td><input type="checkbox" name="id1"/> </td>
				        </tr>
				        <tr>
				            <td>Carlos Santos </td>
				            <td>csantos@gmail.com</td>
				            <td>Aceptado</td>
				            <td><input type="checkbox" name="id2"/> </td>
				        </tr>
				        <tr>
				            <td>Fernando </td>
				            <td>fluque@gmail.com</td>
				            <td>Solicitado</td>
				            <td><input type="checkbox" name="id3"/> </td>
				        </tr>
				    </tbody>
				</table>
			</div>
	  
		</div>
		<label for="nombre_amigo">Seleccionar Partidos:</label>
		<div class="card-body">
      
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
  		
  		<button type="button" class="btn btn-danger">Cancelar</button>
  	</div>
</div>

</div>


