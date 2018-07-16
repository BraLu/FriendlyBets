<?php 

	require 'models/conexion.php'; 
    require "models/grupo.php";
    
    $idpartido = isset($_GET['id']) ? $_GET['id']: 0;
    $idgrupo = isset($_GET['grp']) ? $_GET['grp']: 0;
	$objGrupo = new grupo_model();
	
	$detalle = $objGrupo->obtenerDetallePuntajePartido($idgrupo,$idpartido);
	//print_r($detalle); exit;
	
	
?>
<div class="card card-body">
	<div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12">
        	<h4>DETALLE DEL PARTIDO</h3>
        </div>
        
        <div class="col-sm-12 col-md-4 col-lg-4">
        	<div class="form-group">
        		<label>Partido:</label>
        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo utf8_encode($detalle[0]['partido']); ?>">
        	</div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
        	<div class="form-group">
        		<label>Marcador Real:</label>
        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="1 - 0">
        	</div>
        </div>
        
        <div class="col-sm-12 col-md-4 col-lg-4">
        	<div class="form-group">
        		<label>Fecha y Hora:</label>
        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="<?php echo $detalle[0]['fecha_part'].' '. $detalle[0]['Hora_part']; ?>">
        	</div>
        </div>
        
        <div class="col-sm-12 col-md-12 col-lg-12">
        	<div class="table-responsive" style="height: 400px">
        		<table class="table table-bordered table-striped table-sm table-dark" width="100%">
        			<thead class="">
        				<tr>
        					<th>Participante</th>
        					<th>Marcación Apostada</br><?php echo utf8_encode($detalle[0]['partido']) ; ?></th>
        					<th>Puntos Ganador - Puntos Marcador</th>
        					<th>Total</th>
        				</tr>
        			</thead>
        			<tbody>
        				<?php foreach($detalle as $v ){ ?>	
						<tr>
        					<td><?php echo $v['nombre']; ?></td>
        					<td><?php echo $v['marcacion_apost']; ?></td>
        					<td><?php echo $v['puntos']; ?></td>
        					<td><?php echo $v['puntaje_usr']; ?></td>
        				</tr>
        				<?php } ?>

        			</tbody>
        		</table>
        	    <a href='?p=detalle_grupo&c=<?php echo $detalle[0]['id_grp']; ?>'>Regresar</a>	
        	</div>
        	
        </div>
	</div>
</div>