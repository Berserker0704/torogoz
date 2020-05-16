<?php 
include ("db.php");
if (isset($_GET['Id'])) {
	$id = $_GET['Id'];
	$query = "SELECT * FROM automoviles WHERE Id = $id";
	$resultado = mysqli_query($conn, $query);
	if (mysqli_num_rows($resultado)==1) {
		$row = mysqli_fetch_array($resultado);
		$marca = $row['marca'];
		$modelo = $row['modelo'];
		$año = $row['año'];
		$tipo = $row['tipo'];
		$detalle = $row['detalle'];
		$foto =$row['foto'];
    }
}
 	if (isset($_POST['actualizar'])) {
 		$id = $_GET['Id'];
 	 	$marca = $_POST['marca'];
 	 	$modelo = $_POST['modelo'];
 	 	$año = $_POST['año'];
 	 	$tipo = $_POST['tipo'];
 	 	$detalle = $_POST['detalle'];
 	 	
 	 	$nombre_img = $_FILES['imagen']['name'];
		$tipo_img=$_FILES['imagen']['type'];
		$tamaño_img=$_FILES['imagen']['size'];

		if ($tamaño_img <=3000000) 
		{

			if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg" || $tipo_img=="image/gif")
			{
				$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/';
				move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_img);
 	 			$query = "UPDATE automoviles set marca = '$marca', modelo = '$modelo', año = '$año', tipo = '$tipo', detalle = '$detalle', foto = '$nombre_img' WHERE Id = $id";
 	 			mysqli_query($conn, $query);
 	 			header("Location: index.php"); 

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
					<form action="edit.php?Id=<?php echo $_GET['Id']; ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group" align="center">
							<img src="/img/<?php echo $foto;?>" width="50%" >
						</div>
						<div class="form-group">
							<input type="file" name="imagen" id="imagen" 
							class="form-control"
							size="15">
						</div>
						<div class="form-group">
							<input type="text" name="marca" value="<?php echo $marca; ?>" 
							class="form-control" placeholder="Actualiza la Marca.">
						</div>
						<div class="form-group">
							<input type="text" name="modelo" value="<?php echo $modelo; ?>"
							class="form-control" placeholder="Actualiza el Modelo.">
						</div>
						<div class="form-group">
							<input type="text" name="año" value="<?php echo $año; ?>"
							class="form-control" placeholder="Actualiza el Año.">
						</div>
						<div class="form-group">
							<input type="text" name="tipo" value="<?php echo $tipo; ?>"
							class="form-control" placeholder="Actualiza el Tipo.">
						</div>
						<div class="form-group">
							<textarea name="detalle" rows="2" class="form-control" placeholder="Actualiza los Detalles."><?php echo $detalle; ?>
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
