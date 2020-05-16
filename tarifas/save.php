<?php
INCLUDE("db.php");

    $tarifa = "";
	$detalle = "";
	$precio = "";
	
if (isset($_POST['Guardar'])){
	$tarifa = $_POST['tarifa'];
	$detalle =$_POST['detalle'];
	$precio = $_POST['precio'];

if ($precio > 0) {

		$query = "INSERT INTO tarifas(nm_tarifa, detalle_tarifa, precio_tarifa) VALUES('$tarifa', '$detalle', '$precio'  )";
		$result = mysqli_query($conn,$query);
		$_SESSION['message'] = 'Tarifa guardada.';
		$_SESSION['message_type'] = 'success';

		header("Location: index.php" );	

	if (!$result){
		die("QUERY FAILED");
				}
}
else{
	$_SESSION['message'] = 'No esta guardando un precio valido.';
	$_SESSION['message_type'] = 'danger';

}


header("Location: index.php" );
}
?> 