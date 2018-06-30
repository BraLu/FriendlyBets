

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
		margin-left: 0px !important;
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
				   
				    <button type="button" title="Nuevo Amigo" style="" class="btn btn-info btn-new-amigo" data-toggle='modal' data-target='#m_lista_amigos' onclick="javascript:listarAmistades();" >
							                    <i class="fa fa-search"></i> Buscar Amigos
							                </button>
				    <button type="button" title="Nuevo Amigo" style="margin-left: 5px" class="btn btn-primary btn-new-amigo" data-toggle='modal' data-target='#m_nuevo_amigo' >
							                    <i class="fa fa-plus"></i> Nuevo Amigo
							                </button>
				</div>

		  		<div class="form-group">
		      
		            <div class="table-responsive" >
						<table id="tbl_amigos_apuesta" class="table table-bordered table-striped table-sm table-dark" >
						    <thead class="">
						        <tr>
						        	<th hidden="">Id</th>
						            <th>Nombre</th>
						            <th>Correo</th>
						            <th>Solicitud</th>
						            <th>Pago</th>
						            <th></th>
						        </tr>
						    </thead>
						    <tbody>
						    	<!--
								<tr>
									<td hidden="">1</td>
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
						        	<td hidden="">2</td>
						            <td >Carlos Santos </td>
						            <td>csantos@gmail.com</td>
						            <td>Aceptado</td>
						            <td><input type="checkbox" name="id2"/></td>
						            <td><button type="button" title="Remover" class="btn btn-danger btn-sm btn-icon">
					                    <i class="fa fa-times fa-sm"></i>
					                	</button>
					            	</td>
						        </tr>
						        <tr>
						        	<td hidden="">3</td>
						            <td>Fernando </td>
						            <td>fluque@gmail.com</td>
						            <td>Solicitado</td>
						            <td><input type="checkbox" name="id3"/> </td>
						            <td><button type="button" title="Remover" class="btn btn-danger btn-sm btn-icon">
					                    <i class="fa fa-times fa-sm"></i>
					                	</button>
					            	</td>
						        </tr>
						    	-->
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
		  			
			  		<button type="button" onclick="javascript:guardarGrupo();" class="btn btn-success btn-size-grupo" style="width: 150px; float: right;">Guardar</button>	
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
	    		<input type="email" id="email_amistad" autofocus="" class="form-control" placeholder="Email" value="">
	    	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="button" value="Guardar" class="btn btn-primary" onclick="javascript:registrarAmistad()">
      </div>
    </div>
  </div>
</div>



<!--Modal de Listar Amigos-->
<div class="modal fade" id="m_lista_amigos" tabindex="-1" role="dialog" aria-labelledby="m_lista_amigosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m_lista_amigosLabel">Grupo Amistades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	
        	<div class="form-group">
  				<label for="input_search">Buscar Amigo:</label>
  				<input type="text" id="search_amistad" autofocus="" class="form-control" name="search_amistad" onkeyup="javascript:search_amigo();" />
  			</div>

			<div class="form-group">
		      
	            <!--<div class="table-responsive" >-->
					<table id="tbl_amistades" class="table table-bordered table-striped table-sm table-dark" width="100%">
					    <thead>
					        <tr>
					        	<th hidden="">Id</th>
					            <th>Nombres y Apellidos</th>
					            <th>Correo</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>

					    </tbody>
					</table>
				<!--</div>-->
		  
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="button" value="Guardar" class="btn btn-primary" onclick="javascript:amistadesSeleccionadas();">
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
	
	var arrayAmistades = [];
	var valueSearch = "";

	function amistadesSeleccionadas(){
		var count=0;
		$('#tbl_amistades tbody tr').each(function () {
			var id = $(this).find("td").eq(0).html();
			if ($("#add-check-"+id+"").is(':checked')) {
				var nombres = $(this).find("td").eq(1).html();
				var email = $(this).find("td").eq(2).html();
				var add = $("#add-check-"+id+"").is(':checked');
				var obj = {
						    id: id,
						    nombres: nombres,
						    email: email,
						    add: add,
						    estado : false
						  };
			  	arrayAmistades.push(obj);
			  	count = count + 1;
			  }
		});

		if (count == 0) {
			fbNotify('top','right','info',"No ha seleccionado ningun amigo.");
		}else{
			$("#m_lista_amigos").modal('hide');
			addLista();
			fbNotify('top','right','success',"Se agrego correctamente.");
		}

		//console.log(arrayAmistades);
	}

	function addLista(){
		var tabla = $('#tbl_amigos_apuesta'),
                tablaBody = $('#tbl_amigos_apuesta tbody'),
                tablaHead = $('#tbl_amigos_apuesta thead');
        var items=new Array();
		for (var i = 0; i < arrayAmistades.length; i++) {
			if(arrayAmistades[i].estado==false){
				items.push("<tr id='tblAmigos-tr"+arrayAmistades[i].id+"'>");
	          	items.push("<td hidden>"+arrayAmistades[i].id+"</td>");
	          	items.push("<td>"+arrayAmistades[i].nombres+"</td>");
	          	items.push("<td>"+arrayAmistades[i].email+"</td>");
	          	items.push("<td>Pendiente</td>");
	          	items.push("<td>"+"<input type='checkbox' id='pago-check-"+arrayAmistades[i].idUsuario+"'/> "+"</td>");
	          	items.push("<td>"+"<button type='button' title='Remover' onclick='javascript:removeAmigoLista("+arrayAmistades[i].id+");' class='btn btn-danger btn-sm btn-icon'><i class='fa fa-times fa-sm'></i></button>"+"</td>");
	          	items.push("</tr>");
	          	arrayAmistades[i].estado=true;
			}
        }
        tablaBody.append(items.join(''));
	}

	function removeAmigoLista(value){
		//console.log("Hola Mundo");
		$('#tblAmigos-tr' + value).remove(); 
		$.each(arrayAmistades, function(i){
		    if(arrayAmistades[i].id == value) {
		        arrayAmistades.splice(i,1);
		        return false;
		    }
		});
		console.log(arrayAmistades);
	}

	function search_amigo() {
		// body...
		valueSearch = $("#search_amistad").val();
		listarAmistades();
	}

  	function listarAmistades() {
  		// body...
  		var tabla = $('#tbl_amistades'),
                tablaBody = $('#tbl_amistades tbody'),
                tablaHead = $('#tbl_amistades thead');

  		$.ajax({
	          type: 'POST',
	          url: 'controllers/usuario_controller.php',
	          //dataType: 'json',
	          //contentType: 'application/json',
	          data: { action : "getByUsuario", search : valueSearch },
	          success: function(response) {
	          	  tablaBody.empty();
	              var items=new Array();
	              $.each(JSON.parse(response),function (key,val) {
	              	// body...
	              		var valid=0;
	              		if (arrayAmistades.length > 0) {
              				$.each(arrayAmistades, function(i){
							    if(arrayAmistades[i].id == val.idUsuario) {
							        valid=1;
							    }
							});
	              		}

	              		if (valid==0) {
	              			items.push("<tr>");
			              	items.push("<td hidden>"+val.idUsuario+"</td>");
			              	items.push("<td>"+val.nombre+" " +val.apellidos+"</td>");
			              	items.push("<td>"+val.email+"</td>");
			              	items.push("<td>"+"<input type='checkbox' id='add-check-"+val.idUsuario+"'/> "+"</td>");
			              	items.push("</tr>");
	              		}
		              	
	              })
	              tablaBody.append(items.join(''));
	          },
	          error: function(error) {
	              console.log(error);
	          }
	    });
  	}

  	function registrarAmistad() {
  		// body...

  		if($("#email_amistad").val().indexOf('@', 0) == -1 || $("#email_amistad").val().indexOf('.', 0) == -1) {
            fbNotify('top','right','danger','El email ingresado no tiene el formato correcto, verificar por favor.');
            return false;
        }

  		fbShowLoading();
  		$.ajax({
	          type: 'POST',
	          url: 'controllers/usuario_controller.php',
	          //dataType: 'json',
	          //contentType: 'application/json',
	          data: { action : "crearAmistad", email:$("#email_amistad").val()},
	          success: function(response) {
	          	  	console.log(response);
	          	  	fbHideLoading();
          	  		$.each( JSON.parse(response), function( key, val ) {
					    if(val.status==400){
				    		fbNotify('top','right','danger',val.message);
					    }else if(val.status==200){
					    	$("#email_amistad").val("");
					    	$("#m_nuevo_amigo").modal('hide');
					    	fbNotify('top','right','success',val.message);
					    }
					});
	          	  //fbNotify('top','right','success','Se agrego correctamente.');
	          },
	          error: function(error) {
	          		//console.log(error);
	          	 	fbHideLoading();
	              	fbNotify('top','right','danger',error.responseJSON.message);
	          }
	    });
  	}

  	function guardarGrupo() {
  		// body...
		swal({
		  title: 'Guardar Grupo?',
		  text: "Si desea valida la información!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Guardar!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
		    swal(
		      'Se Guardo Correctamente!',
		      'Espere la confirmación de sus amistades.',
		      'success'
		    ).then((result) => {
	    		location='security/iniciar_session.php';
		    });
		  }else{
		  	//$("#enviarSolicitud").modal('show');
		  }
		});
  	}

</script>