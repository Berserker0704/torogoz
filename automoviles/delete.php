<?php
 include("db.php");

 if (isset($_GET['Id'])) {
 	$id = $_GET['Id'];
 	$query = "DELETE FROM automoviles where Id = $id";
 	$resultado = mysqli_query($conn, $query);
 	if (!$resultado) {
 		die("Elemento no eliminado");
 	}
 	$_SESSION['message'] ='Vehiculo se elimino de la lista';
 	$_SESSION['message_type'] = 'danger';
 	header ("Location: index.php");
 }

 ?>
