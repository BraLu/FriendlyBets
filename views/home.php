<?php  

	require 'models/conexion.php'; 
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
									            <td><a href='?p=detalle_grupo&id=<?php echo $record['Id_Grp']; ?>'><?php echo utf8_encode($record['grupos']); ?></a></td>
									            <td><?php echo utf8_encode($record['administrador']); ?></td>
									            <td><?php echo $record['fecha_prim_part']; ?></td>
									            <td><?php echo $record['cant_amigos']; ?></td>
									            <td><?php echo MONEDA.' '. number_format($record['total_apuesta'],2); ?></td>
									            <?php 
									            	if ($record['administrador']=="Administrador") {
									            ?>
									            
									            <td>
								            		<button type="button" data-placement="bottom" title="Completar Marcador" class="btn btn-info btn-sm btn-icon" data-toggle='modal' data-target='#enviarSolicitud'>
								                    <i class="fa fa-list"></i>
								                	</button>
									            	<a href="?p=actualizar_grupo&c=<?php echo $record['Id_Grp']; ?>">
									            	
									            	<?php echo $record['solicitudes']; ?>
									            	</a> 
									            </td>

								            	<?php }else {

								            	 ?>
							            		<td>	
										            <button type="button" 
										            data-placement="bottom" title="Aceptar" 
										            class="btn btn-success btn-sm btn-icon" data-target='#enviarSolicitud'
										            data-toggle='modal' onclick="openBoxSol(<?php echo $record['Id_Grp']; ?>,<?php echo IDUSUARIO; ?>)" >
								                    <i class="fa fa-check"></i>
								                	</button>
									                <button type="button" onclick="quizSol(<?php echo 1; ?>,<?php echo 2; ?>)" rel="tooltip" data-toggle="tooltip" data-placement="bottom" title="Rechazar" class="btn btn-danger btn-sm btn-icon">
									                    <i class="fa fa-times"></i>
									                </button>		
								            	</td>
							            		<?php } ?>


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
										            class="btn btn-warning btn-sm" data-target='#enviarSolicitud'
										            data-toggle='modal' onclick="openBoxSol(<?php echo $value['id_grp'] ?>,<?php echo IDUSUARIO; ?>)" >
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
        <h5 class="modal-title" id="enviarSolicitudLabel">Enviar Solicitud</h5>
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
<div class="modal fade" id="enviarSolicitud2" tabindex="-1" role="dialog" aria-labelledby="enviarSolicitudLabel" aria-hidden="true">
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
        </div>
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
    
	function openBoxSol(group,usucod){

		/*$("#dialog").dialog(
			{autoOpen: true, 
				width: 800, 
				modal: true, 
				type: 'POST', 
				data:'id=1', 
			open: 
			$.ajax({url: "/views/box_solicitud.php?group="+group+"&id"+usucod, 
				success: function(result){
        			$("#dialog").html(result);	
    			}
    		})
		});*/
		
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

</script>