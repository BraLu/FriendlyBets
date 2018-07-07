

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
	      				<label for="txt_nombre_grupo">Nombre del Grupo:</label>
	      				<input type="text" class="form-control" maxlength="100" id="txt_nombre_grupo" name="txt_nombre_grupo"/>
	      			</div>
	      		
	      			<div class="form-group">
	      				<label for="txt_monto_apuesta">Apuesta por Persona:</label>
	      				<input type="number" class="form-control" id="txt_monto_apuesta" name="txt_monto_apuesta"/>
	      			</div>

	      			<div class="form-group">
	      				<div class="form-check">
						    <label class="form-check-label">
						    	Grupo Abierto:
						        <input class="form-check-input" id="chk_tipo_grupo" name="chk_tipo_grupo" type="checkbox" value="">
						          
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
					<label for="select_competencia">Competencia:</label>
				    <select disabled="" class="form-control" id="select_competencia">
				    </select>
				</div>

				<div class="form-group">
					<label>Seleccionar Partidos:</label>	
				</div>
				
				<div class="form-group">
		      
		            <div class="table-responsive" >
						<table id="tbl_partidos" class="table table-bordered table-striped table-sm table-dark" width="100%">
						    <thead class="">
						        <tr>
						        	<th hidden="">Id</th>
						            <th>Equipo 1</th>
						            <th>Equipo 2</th>
						            <th>Fecha</th>
						            <th>Hora</th>
						            <th>Estado</th>
						            <th>Marcar</th>
						        </tr>
						    </thead>
						    <tbody>
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
	
	
	serviceCompetencias();

	servicePartidos();

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
		              	
	              });
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
  		if($("#txt_nombre_grupo").val()=="") 
		{
			fbNotify('top','right','danger',"Completar el campo nombre del grupo");
			return false;
		}
  		if($("#txt_monto_apuesta").val()=="") 
  		{
  			fbNotify('top','right','danger',"Completar el campo monto de la apuesta");
  			return false;
  		}
  		if(arrayAmistades.length==0) 
  		{
  			fbNotify('top','right','danger',"No tienes ninguna amistad seleccionada.");
  			return false;
		}
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
	    		fbShowLoading();
	    		var check = "C";
	    		if ($("#chk_tipo_grupo").is(':checked')) check = "A";
	    		//Amigos Seleccionados
	    		var arrayAmigos = [];
	    		$('#tbl_amigos_apuesta tbody tr').each(function () {
					var id = $(this).find("td").eq(0).html();
					var pago = "N"
					if ($("#pago-check-"+id).is(':checked')) {
						pago = "S";
					}
					var obj = {
							    p_Usr: id,
							    p_Pago: pago 
							  };
					  	arrayAmigos.push(obj);
				});

	    		//Partidos Seleccionados
	    		var arrayPartidos = [];
	    		$('#tbl_partidos tbody tr').each(function () {
					var id = $(this).find("td").eq(0).html();
					if ($("#partido-"+id+"").is(':checked')) {
						var Equipo1 = $(this).find("td").eq(1).html();
						var Equipo2 = $(this).find("td").eq(2).html();
						var Fecha = $(this).find("td").eq(3).html();
						var date = new Date(Fecha);
						var Hora = $(this).find("td").eq(4).html();
						var obj = {
								    p_Equipo1: Equipo1,
								    p_Equipo2: Equipo2,
								    p_Fecha: date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate(),
								    p_Hora: Hora,
								  };
					  	arrayPartidos.push(obj);
					  }
				});

	    		var p_grupo = {
    				p_Nombregrupo : $("#txt_nombre_grupo").val(),
    				p_MontoApuesta : parseInt($("#txt_monto_apuesta").val()),
    				p_TipoGrupo : check,
    				Amigos : arrayAmigos,
    				Partidos : arrayPartidos
	    		}

	    		$.ajax({
			          type: 'POST',
			          url: 'controllers/usuario_controller.php',
			          //dataType: 'json',
			          //contentType: 'application/json',
			          data: { action : "crearGrupo", 
			          		  grupo : p_grupo
			          		},
			          success: function(response) {
			          		console.log(JSON.parse(response));
			          		fbHideLoading();
			          		$.each( JSON.parse(response), function( key, val ) {
							    if(val.status==400){
						    		fbNotify('top','right','danger',val.message);
							    }else if(val.status==200){
							    	fbNotify('top','right','success',val.message);
							    	location='security/iniciar_session.php';
							    }
							});
			          },
			          error: function(error) {
			              console.log(error);
			              fbHideLoading();
			          }
			    });


	    		
	    		console.log(p_grupo);
		    });
		  }else{
		  	//$("#enviarSolicitud").modal('show');
		  }
		});
  	}

  	function servicePartidos() {
  		// body...
  		var tabla = $('#tbl_partidos'),
                tablaBody = $('#tbl_partidos tbody'),
                tablaHead = $('#tbl_partidos thead');
  		$.ajax({
	          type: 'POST',
	          url: 'controllers/usuario_controller.php',
	          //dataType: 'json',
	          //contentType: 'application/json',
	          data: { action : "servicePartidos", filter_id: /*$("#select_competencia").val()*/ 467 },
	          success: function(response) {
	          		tablaBody.empty();
	          		var items=new Array();
	          		var rs = JSON.parse(response);
	          		//console.log(new Date(rs.fixtures[0].date));
	          		for (var i = 0; i < rs.count; i++) {
          				if (rs.fixtures[i].status != "FINISHED") {
          					items.push(rs.fixtures[i]);
          				}
          			}
          			//console.log(items);
	          		$.each(items,function (key,val) {
	              		// body...
	              		if (val.status != "FINISHED") {
              				var status = "";
		              		items.push("<tr>");
		              		items.push("<td hidden>"+ val.awayTeamName + val.homeTeamName  + "</td>");
		              		items.push("<td>"+ val.awayTeamName +"</td>");
			              	items.push("<td>"+ val.homeTeamName +"</td>");
			              	var fecha = new Date(val.date);
							items.push("<td>"+fecha.toLocaleDateString("en-GB")+"</td>");
							items.push("<td>"+fecha.toLocaleTimeString("en-GB")+"</td>");
				              	if (val.status=="TIMED") {
			              			items.push("<td>PENDIENTE</td>");
			              			items.push("<td>"+"<input type='checkbox' id='partido-"+val.awayTeamName+val.homeTeamName+"'/></td>");
				              	}
				              	else if(val.status=="IN_PLAY")
				              	{
				              		items.push("<td>EN JUEGO</td>");
			              			items.push("<td></td>");
				              	}else{
			              			items.push("<td>EN DEFINICIÓN</td>");
			              			items.push("<td></td>");
				              	}

			              	items.push("</tr>");
	              		}
	              	});
          			tablaBody.append(items.join(''));
	          },
	          error: function(error) {
	              console.log(error);
	          }
	    });		
  	}

  	function serviceCompetencias() {
  		// body...
  		$.ajax({
	          type: 'POST',
	          url: 'controllers/usuario_controller.php',
	          //dataType: 'json',
	          //contentType: 'application/json',
	          data: { action : "serviceCompetencias", 
	          		  filter_anio : (new Date).getFullYear()
	          		},
	          success: function(response) {
	          		var rs = JSON.parse(response);
	          		$("#select_competencia").empty();
	          		var items=new Array();
	          		$.each(rs,function (key,val) {
	              	// body...
		              	items.push("<option id='"+val.id+"'>"+val.caption+"</option>");
	              	});
	              	$("#select_competencia").append(items.join(''));
	          },
	          error: function(error) {
	              console.log(error);
	          }
	    });		
  	}

</script>