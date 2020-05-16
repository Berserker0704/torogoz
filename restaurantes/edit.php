<?php 
include ("db.php");
if (isset($_GET['id_restaurante'])) {
	$id = $_GET['id_restaurante'];
	$query = "SELECT * FROM restaurante WHERE id_restaurante = $id";
	$resultado = mysqli_query($conn, $query);
	if (mysqli_num_rows($resultado)==1) {
		$row = mysqli_fetch_array($resultado);
		$nombre = $row['nm_restaurante'];
		$horario = $row['horario_restaurante'];
		$tiempo = $row['tiempo_entrega'];
		$foto =$row['foto_resta'];
		//echo $query;
		//echo $nombre;

    }
}
 	if (isset($_POST['actualizar'])) {
 		$id = $_GET['id_restaurante'];
 	 	$nombre = $_POST['nombre'];
 	 	$horario = $_POST['horario'];
 	 	$tiempo = $_POST['tiempo'];
 	 	 	 	
 	 	$nombre_img = $_FILES['imagen']['name'];
		$tipo_img=$_FILES['imagen']['type'];
		$tamaño_img=$_FILES['imagen']['size'];

		if ($tamaño_img <=3000000) 
		{

			if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg" || $tipo_img=="image/gif")
			{
				$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/';
				move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_img);
 	 			$query = "UPDATE restaurante set nm_restaurante = '$nombre', horario_restaurante = '$horario', tiempo_entrega = '$tiempo', foto_resta = '$nombre_img' WHERE id_restaurante = $id";
 	 			mysqli_query($conn, $query);
 	 			$_SESSION['message'] = 'Datos del restaurante actualizados';
				$_SESSION['message_type'] = 'success';
 	 			header("Location: index.php"); 
 	 			echo $query;

 	 		}
 	 		else
 	 		{
					$_SESSION['message'] = 'El archivo no es del tipo imagen.';
					$_SESSION['message_type'] = 'danger';

					header("Location: index.php" );
			}

	}else{
		$_SESSION['message'] = 'El Tamaño de la imagen es demasiado grande.';
		$_SESSION['message_type'] = 'danger';

		header("Location: index.php" );
		}
 	}
?>
<?php include("includes/header.php") ?>

	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="edit.php?id_restaurante=<?php echo $_GET['id_restaurante']; ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group" align="center">
							<img src="/img/<?php echo $foto;?>" width="50%" >
						</div>
						<div class="form-group">
							<input type="file" name="imagen" id="imagen" 
							class="form-control"
							size="15">
						</div>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo $nombre; ?>" 
							class="form-control" placeholder="Actualiza el nombre del restaurante.">
						</div>
						<div class="form-group">
							<input type="text" name="horario" value="<?php echo $horario; ?>"
							class="form-control" placeholder="Actualiza el horario de atencion.">
						</div>
						<textarea name="tiempo" rows="2" class="form-control" placeholder="Actualiza tiempo de entrega."><?php echo $tiempo; ?>
							</textarea>
							<button class="btn btn-success" name="actualizar">Actualizar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include("includes/footer.php") ?>
