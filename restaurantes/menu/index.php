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
						<input type="text" name="nombre" id="nombre" 
						class="form-control"
						placeholder="Nombre restaurante" autofocus="">
					</div>
					<div class="form-group">
						<input type="text" name="horario" id="horario" 
						class="form-control"
						placeholder="Horario de atencion">
					</div>
					<div class="form-group">
						<textarea name="tiempo" rows="2" id="tiempo"
						 class="form-control"
						placeholder="Escriba el tiempo de entrega"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block"  name="Guardar" value="Guardar"> 

					</form>
			</div>

		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Horario</th>
						<th>Tiempo</th>
						<th>Foto</th>
						<th>Fecha</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				 	$query = "SELECT * FROM restaurante";
				 	$restaurante = mysqli_query($conn, $query);
				 	while($row = mysqli_fetch_array($restaurante)) { ?>
				 		<tr>
				 			<td><?php echo $row['nm_restaurante'] ?></td>
				 			<td><?php echo $row['horario_restaurante'] ?></td>
				 			<td><?php echo $row['tiempo_entrega'] ?></td>
				 			<td align="center"><?php $fotov= $row['foto_resta'] ?><img src="/img/<?php echo $fotov;?>" width="50%" ></td>
				 			<td><?php echo $row['fecha_resta'] ?></td>
				 			<td>
				 			<a href="edit.php?id_restaurante=<?php echo $row['id_restaurante']?>" class="btn btn-secondary">
				 				<i class="fas fa-marker"></i>
				 			</a>
				 			<a href="delete.php?id_restaurante=<?php echo $row['id_restaurante']?>" class="btn btn-danger">
				 				<i class="fas fa-trash-alt"></i>
				 			</a>
				 			<a href="delete.php?id_restaurante=<?php echo $row['id_restaurante']?>" class="btn btn-secondary">
				 				<i class="bi bi-card-checklist">Menu</i>
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