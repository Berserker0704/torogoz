<?php
 include("db.php");

 if (isset($_GET['Id_tarifa'])) {
 	$id = $_GET['Id_tarifa'];
 	echo $id;
 	$query = "DELETE FROM tarifas where Id_tarifa = $id";
 	$resultado = mysqli_query($conn, $query);
 	if (!$resultado) {
 		die("Elemento no eliminado");
 	}
 	$_SESSION['message'] ='Tarifa se elimino de la lista';
 	$_SESSION['message_type'] = 'danger';
 	header ("Location: index.php");
 }

 ?>
