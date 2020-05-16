<?php 
include ("db.php");
if (isset($_GET['Id_tarifa'])) {
	$id = $_GET['Id_tarifa'];
	$query = "SELECT * FROM tarifas WHERE Id_tarifa = $id";
	$resultado = mysqli_query($conn, $query);
	if (mysqli_num_rows($resultado)==1) {
		$row = mysqli_fetch_array($resultado);
		$tarifa = $row['nm_tarifa'];
		$detalle= $row['detalle_tarifa'];
		$precio = $row['precio_tarifa']; 
    }
}
        if (isset($_POST['actualizar'])) {
 		$Id = $_GET['Id_tarifa'];
 	 	$tarifa = $_POST['tarifa'];
 	 	$detalle = $_POST['detalle'];
 	 	$precio = $_POST['precio'];
 		
 		if ($precio > 0) {
 		
 				$query = "UPDATE tarifas SET nm_tarifa = '$tarifa', detalle_tarifa = '$detalle', precio_tarifa = '$precio' WHERE Id_tarifa = $Id ";
 	 			mysqli_query($conn, $query);
                $_SESSION['message'] = 'Tarifa actualizada.';
		        $_SESSION['message_type'] = 'success';
 	 			header("Location: index.php"); 

 	 		}
 	 		else{
 	 			$_SESSION['message'] = 'El precio no es correcto.';
		        $_SESSION['message_type'] = 'danger';
		        header("Location: index.php");
 	 		}

 	 		
 	}
?>
<?php include("includes/header.php") ?>

	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="edit.php?Id_tarifa=<?php echo $_GET['Id_tarifa']; ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" name="tarifa" value="<?php echo $tarifa; ?>" 
							class="form-control" placeholder="Actualiza nombre de tarifa.">
						</div>
							<textarea name="detalle" rows="2" class="form-control"
							 placeholder="Actualiza los Detalles."><?php echo $detalle; ?>
							</textarea>
						<div class="form-group">
							<input type="text" name="precio" value="$<?php echo $precio; ?>"
							class="form-control" placeholder="Actualiza el precio.">
							<button class="btn btn-success" name="actualizar">Actualizar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include("includes/footer.php") ?>
