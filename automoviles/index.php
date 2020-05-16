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
						<input type="file" name="imagen" id="imagen" 
						class="form-control"
						size="15">
					</div>					
					<div class="form-group">
						<input type="text" name="marca" id="marca" 
						class="form-control"
						placeholder="Marca" autofocus="">
					</div>
					<div class="form-group">
						<input type="text" name="modelo" id="modelo" 
						class="form-control"
						placeholder="Modelo">
					</div>
					<div class="form-group">
						<input type="text" name="año" id="año" 
						class="form-control"
						placeholder="Año">
					</div>
					<div class="form-group">
						<input type="text" name="tipo" id="tipo"
						 class="form-control"
						placeholder="Tipo">
					</div>
					<div>
						<textarea name="detalle" rows="2" id="detalle"
						 class="form-control"
						placeholder="Detalles del vehiculo"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block"  name="Guardar" value="Guardar"> 

					</form>
			</div>

		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Año</th>
						<th>Tipo</th>
						<th>Detalle</th>
						<th>Foto</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				 	$query = "SELECT * FROM automoviles";
				 	$rvehiculos = mysqli_query($conn, $query);
				 	while($row = mysqli_fetch_array($rvehiculos)) { ?>
				 		<tr>
				 			<td><?php echo $row['marca'] ?></td>
				 			<td><?php echo $row['modelo'] ?></td>
				 			<td><?php echo $row['año'] ?></td>
				 			<td><?php echo $row['tipo'] ?></td>
				 			<td><?php echo $row['detalle'] ?></td>
				 			<td align="center"><?php $fotov= $row['foto'] ?><img src="/img/<?php echo $fotov;?>" width="10%" ></td>
				 			<td>
				 			<a href="edit.php?Id= <?php echo $row['Id']?>" class="btn btn-secondary">
				 				<i class="fas fa-marker"></i>
				 			</a>
				 			<a href="delete.php?Id= <?php echo $row['Id']?>" class="btn btn-danger">
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