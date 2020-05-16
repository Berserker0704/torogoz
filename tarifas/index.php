<?php include("db.php") ?>
<?php include("includes/header.php") ?>
<?php include("save.php") ?>	
	<div class="container p-4">
	<div class="row">
		
		<div class="col-md-4">
			<?php if (isset($_SESSION['message'])) { ?>
				
				<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
  				<?= $_SESSION['message'] ?>
 			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>

			<?php session_unset(); } ?>

			<div class="cad cad-body">
				<form action="save.php" method="POST" enctype="multipart/form-data">
										
					<div class="form-group">
						<input type="text" name="tarifa" id="tarifa" 
						class="form-control"
						placeholder="Agregar nueva tarifa" autofocus="">
					</div>
					<div class="form-group">
						<input type="text" name="detalle" id="detalle" 
						class="form-control"
						placeholder="Detalles de tarifa">
					</div>
					<div class="form-group">
						<input type="text" name="precio" id="precio" 
						class="form-control"
						placeholder="Agregar precio de tarifa">
					</div>
					<input type="submit" class="btn btn-success btn-block"  name="Guardar" value="Guardar"> 

					</form>
			</div>

		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nombre tarifa</th>
						<th>Detalles</th>
						<th>precio</th>
						<th>Fecha</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				 	$query = "SELECT * FROM tarifas";
				 	$rtarifas = mysqli_query($conn, $query);
				 	while($row = mysqli_fetch_array($rtarifas)) { ?>
				 		<tr>
				 			<td><?php echo $row['nm_tarifa'] ?></td>
				 			<td><?php echo $row['detalle_tarifa'] ?></td>
				 			<td><?php echo $row['precio_tarifa'] ?></td>
				 			<td><?php echo $row['fecha_creacion'] ?></td>
				 			<td>
				 			<a href="edit.php?Id_tarifa=<?php echo $row['Id_tarifa']?>" class="btn btn-secondary">
				 				<i class="fas fa-marker"></i>
				 			</a>
				 			<a <?php echo "href='delete.php?Id_tarifa='".$row['Id_tarifa'];?> class="btn btn-danger">
				 				<i class="fas fa-trash-alt"></i>
				 			</a>
				 		</td>
				 		</tr>

				 	<?php }
				?>
				</tbody>
			</table>
			
		</div>

	</div>
	</div>
<?php include("includes/footer.php") ?>