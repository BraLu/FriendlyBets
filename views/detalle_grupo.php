<?php 

	require 'models/conexion.php'; 
    require "models/grupo.php";
    
    $idgrupo = isset($_GET['id']) ? $_GET['id']: 0;
	$objGrupo = new grupo_model();
	$data = $objGrupo->obtenerCabeceraGrupo($idgrupo);
	$detalle = $objGrupo->obtenerBodyGrupo($idgrupo);
	
	$row = current($data);
	$admin = utf8_encode($row['admin']);
	
?>


<div class="row">
	
	<div class="col-md-12 frm-detalle-grupo">
		<div class="card table-detalle-grupo">
	        <div class="card-header">
	          	<div class="row">
		        	<div class="col-sm-12 col-md-4 col-lg-4">
		        		<div class="form-group">
			        		<label>Administrador del Grupo:</label>
			        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo $admin; ?> ">
			        	</div>
		        	</div>
		        	<div class="col-sm-12 col-md-12 col-lg-12">
		        		
			        		<label>Detalle de puntos por participante:</label>
			        	
		        	</div>
		        </div>
	        </div>
	        <div class="card-body">
	          <form>
	            <div class="table-responsive" style="height: 400px">
					<table class="table table-bordered table-striped table-sm table-dark" width="100%">
					    <thead class="">
					        <tr>
					            <th>Participante</th>
					            <?php foreach($data as $x){ ?>
				            	<th>
				            		<a href='<?php echo "?p=detalle_partido&id=".$x['idpartido']."&grp=".$x['idgrupo']; ?>'><b>
				            			<?php echo utf8_encode($x['partido']); ?></br><?php echo $x['fecha'] ?></br><?php echo $x['hora']?>	
				            		</b></a>
				            		
				            	</th>
				            	<?php }?>
					            <th>Total Puntos</th>
					        </tr>
					        
							<tbody>
								<?php foreach($detalle as $d){ 
									    $puntos = 0;
								    ?>
								<tr>
								<td><?php echo $d['nombre']; ?></td>
								<?php foreach($data as $c ){ 
									$puntos += isset($d['partidos'][$c['idpartido']])? $d['partidos'][$c['idpartido']] : 0;
								?>
								<td><?php echo isset($d['partidos'][$c['idpartido']])? $d['partidos'][$c['idpartido']] :'-' ; ?></td>
								<?php } ?>
								<td><?php echo $puntos; ?></td>
								</tr>
								<?php } ?>
							</tbody>
					    </thead>
					    
					</table>
				</div>

			  </form>
		  	<hr>

			</div>

		</div>

	</div>

</div>
<script type="text/javascript" >
	
</script>