


<div class="row">
	
	<div class="col-md-12 frm-detalle-grupo">
		<div class="card table-detalle-grupo">
	        <div class="card-header">
	          	<div class="row">
		        	<div class="col-sm-12 col-md-4 col-lg-4">
		        		<div class="form-group">
			        		<label>Administrador del Grupo:</label>
			        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="Jose Campos">
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
					            <?php
					            	for ($i=1; $i <=7 ; $i++) { 
					            		echo "<th>Peru Vs Escocia</br>xx/xx/xxxx</br>hh:mm:ss</th>";
					            	}
					            ?>
					            
					            <th>Total Puntos</th>
					        </tr>
					    </thead>
					    <tbody>

				    		<?php
				            	for ($i=1; $i <=7 ; $i++) { 
				            		echo "<tr>
								            <td>Juan Carlos</td>
								            <td>4</td>
								            <td>5</td>
								            <td>3</td>
								            <td>1</td>
								            <td>1</td>
								            <td>7</td>
								            <td>9</td>
								            <td>55</td>
								        </tr>";
				            	}
				            ?>
					    	

					    </tbody>
					</table>
				</div>

			  </form>

		  		<hr>

				<div class="card card-body">
				    <div class="row">

			    		<div class="col-sm-12 col-md-12 col-lg-12">
			        		<h4>DETALLE DEL PARTIDO</h3>
			        	</div>

				    	<div class="col-sm-12 col-md-4 col-lg-4">
			        		<div class="form-group">
				        		<label>Partido:</label>
				        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="Peru Vs Escocia">
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
				        		<input type="text" disabled="" class="form-control" placeholder="Admin" value="xx/xx/xxxx hh:mm:ss">
				        	</div>
			        	</div>

		        		<div class="col-sm-12 col-md-12 col-lg-12">
		        			<div class="table-responsive" style="height: 400px">
								<table class="table table-bordered table-striped table-sm table-dark" width="100%">
								    <thead class="">
								        <tr>
								            <th>Participante</th>
								            <th>Marcación Apostada</br>Peru Vs Escocia</th>
								            <th>Puntos Ganador - Puntos Marcador</th>
								            <th>Total</th>
								        </tr>
								    </thead>
								    <tbody>

							    		<?php
							            	for ($i=1; $i <=7 ; $i++) { 
							            		echo "<tr>
											            <td>Jose Campos</td>
											            <td>1 - 0</td>
											            <td>2 - 2</td>
											            <td>4</td>
											        </tr>";
							            	}
							            ?>
								    	

								    </tbody>
								</table>
							</div>
		        		</div>

				    </div>
			  	</div>

			</div>


		</div>



	</div>

</div>