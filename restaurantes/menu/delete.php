<?php
 include("db.php");

 if (isset($_GET['id_restaurante'])) {
 	$id = $_GET['id_restaurante'];
 	$query = "DELETE FROM restaurante where id_restaurante = $id";
 	$resultado = mysqli_query($conn, $query);
 	if (!$resultado) {
 		die("Elemento no eliminado");
 	}
 	$_SESSION['message'] ='Vehiculo se elimino de la lista';
 	$_SESSION['message_type'] = 'danger';
 	header ("Location: index.php");
 }

 ?>
