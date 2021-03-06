<?php  

	//require 'models/conexion.php'; 
	require 'models/grupo.php';
	require 'controllers/home_controller.php';
	
	$objHomeController = new homeController();

	$dataGrupos = $objHomeController->obtenerMisGrupos();
	$dataTopGrupos = $objHomeController->obtenerGrupoTop();
	
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
					            <th>Tipo</th>
					            <th>Fecha 1° Partido</th>
					            <th>Cant. Amigos</th>
					            <th>Apuesta</th>
					            <th>Solicitudes</th>
					            <th>Estado</th>
					        </tr>
					    </thead>
					    <tbody>

				    		<?php 
				    			if(count($dataGrupos) > 0){

					    			foreach($dataGrupos as  $record) { 
					    				?>
					    				
					    				<tr>
									            <td><a href='?p=detalle_grupo&c=<?php echo $record['Id_Grp']; ?>'><?php echo utf8_encode($record['grupos']); ?></a></td>
									            <td><?php echo utf8_encode($record['administrador']); ?></td>
									            <td><?php echo $record['fecha_prim_part']; ?></td>
									            <td><?php echo $record['cant_amigos']; ?></td>
									            <td><?php echo MONEDA.' '. number_format($record['total_apuesta'],2); ?></td>
									            <?php 

									            	if ($record['estado']=="abierto") {

									            ?>


									            <?php 
									            	if ($record['administrador']=="Administrador") {
									            ?>
									            
									            <td>
								                	<button type="button" 
										            data-placement="bottom" title="Completar Marcador" 
										            class="btn btn-info btn-sm btn-icon" data-target='#enviarSolicitud'
										            data-toggle='modal' onclick="openBoxSol(<?php echo $record['Id_Grp']; ?>,<?php echo IDUSUARIO; ?>)" >
								                    <i class="fa fa-list"></i>
								                	</button>
								                	<span>
									            	<a href="?p=actualizar_grupo&c=<?php echo $record['Id_Grp']; ?>">
									            	
									            	<?php echo $record['solicitudes']; ?>
									            	</a> 
									            	</span>
									            </td>

								            	<?php 
								            	} else {

								            			if ($record['solicitudes']=="pendiente") {
								            				# code...

								            				?>
								            					<td>	
														            <button type="button" 
														            data-placement="bottom" title="Aceptar" 
														            class="btn btn-success btn-sm btn-icon" data-target='#enviarSolicitud'
														            data-toggle='modal' onclick="openBoxSol(<?php echo $record['Id_Grp']; ?>,<?php echo IDUSUARIO; ?>)" >
												                    <i class="fa fa-check"></i>
												                	</button>
													                <button type="button" onclick="quizSol(<?php echo IDUSUARIO; ?>,<?php echo $record['Id_Grp']; ?>)" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Rechazar" class="btn btn-danger btn-sm btn-icon">
													                    <i class="fa fa-times"></i>
													                </button>		
												            	</td>
								            				<?php

								            			}elseif ($record['solicitudes']=="unirse") {
								            				# code...

								            				?>
								            					<td>A confirmar</td>
								            				<?php

								            			}
								            			else
								            			{

								            				?>

								            					<td>-</td>

								            				<?php


								            			}

							            		}
							            	}else{

							            	 ?>

							            	 	<td>-</td>

							            		<?php 

							            			}

							            		 ?>


									            <td><?php echo $record['estado']; ?></td>
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
					            	
									 <button type="button" 
										            data-placement="bottom" title="Aceptar" 
										            class="btn btn-warning btn-sm" data-target='#enviarSolicitud2'
										            data-toggle='modal' onclick="openBoxUnion(<?php echo $value['id_grp'] ?>)" >
								                    Unirse
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

<div id="dialog">
	<div id="framework"></div>
</div>

<div class="modal fade" id="enviarSolicitud"  role="dialog" >
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enviarSolicitudLabel">Registrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="divboxsol"></div>
      </div>
    </div>
  </div>  	
</div>

<!--Modal de Unirse-->
<div class="modal fade" id="enviarSolicitud2"  role="dialog" >
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enviarSolicitudLabel">Enviar Solicitud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="divboxsol2"></div>
      </div>
    </div>
  </div>  	
</div>
<!--Script-->
<script type="text/javascript">

function acepSol(){
    
      swal({
        title: 'Desea aceptar la solicitud?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
         
        }

      })

    }
    
    function openBoxUnion(group){
    	
		setTimeout(function(){
			$.ajax({url: "views/box_unirse.php", 
				data: {group: group, metodo: 'unirse'},
				success: function(result){
        			$("#divboxsol2").html(result);	
    			}
    		});
		},500);
    }
    
	function openBoxSol(group,usucod){

		setTimeout(function(){
			$.ajax({url: "views/box_solicitud.php", 
				data: {group: group, id: usucod, metodo: 'enviar'},
				success: function(result){
        			$("#divboxsol").html(result);	
    			}
    		});
		},500);
	}


	function quizSol(iduser,idgroup){
		
		swal({
		  title: 'Desea Rechazar Invitación?',
		  text: "Este proceso sera irreverible",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Rechazar!',
		  cancelButtonText: 'Cancelar'
		}).then((result) => {
		  if (result.value) {
	  		ajaxcancelsol(iduser,idgroup);		    
		  }
		})

	}

	function ajaxcancelsol(idgroup,iduser){
		 $.ajax({url: "controllers/servicios_controller.php", 
              contentType: 'application/x-www-form-urlencoded',
              data: 'idgroup='+idgroup+'&iduser='+iduser+'&metodo=rechazar',
              type: 'POST',
              dataType: 'html',
              success: function(r){
              	/*swal(
				      'Proceso Finalizado Correctamente!',
				      '',
				      'success'
				    );*/
              }
          });
	}

	

	function actualizarEstado() {
		// body...
		$.ajax({
          type: 'POST',
          url: 'controllers/usuario_controller.php',
          //dataType: 'json',
          //contentType: 'application/json',
          data: { action : "actualizarEstadoGrupo" },
          success: function(response) {
          		console.log(response);

          },
          error: function(error) {
              console.log(error);
          }
    	});	

	}

	function calculoPuntaje() {
		// body...
		$.ajax({
	      type: 'POST',
	      url: 'controllers/usuario_controller.php',
	      //dataType: 'json',
	      //contentType: 'application/json',
	      data: { action : "calculoPuntaje", Id_Grp : $("#accion_grupo_id").val(); },
	      success: function(response) {
	      		console.log(response);

	      },
	      error: function(error) {
	          console.log(error);
	      }
		});	

	}

	serviceActualizarData();

	function serviceActualizarData() {
		// body...
		fbShowLoading();
		//Ajax Para Obtener los partidos
		$.ajax({
          type: 'POST',
          url: 'controllers/usuario_controller.php',
          //dataType: 'json',
          //contentType: 'application/json',
          data: { action : "serviceApiPartidos" },
          success: function(response) {
          		//console.log(JSON.parse(response));
          		//Ajax actualizar datos de los partidos
          		$.ajax({
		          type: 'POST',
		          url: 'controllers/usuario_controller.php',
		          //dataType: 'json',
		          //contentType: 'application/json',
		          data: { action : "actualizarPartido", partidos: JSON.parse(response)},
		          success: function(response) {
		          		//console.log(response);
		          		fbHideLoading();
		          		$.each( JSON.parse(response), function( key, val ) {
						    if(val.status==400){
					    		fbNotify('top','right','danger',val.message);
						    }else if(val.status==200){
					    		actualizarEstado();
					    		calculoPuntaje();
						    	fbNotify('top','right','info',val.message);

						    }
						});
		          },
		          error: function(error) {
		              console.log(error);
		          }
		    	});	



          },
          error: function(error) {
              console.log(error);
          }
    	});	

	}

</script>