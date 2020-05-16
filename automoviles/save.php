<?php
INCLUDE("db.php");

    $marca = "";
	$modelo = "";
	$tipo = "";
	
if (isset($_POST['Guardar'])){
	$marca = $_POST['marca'];
	$año =$_POST['año'];
	$modelo = $_POST['modelo'];
	$tipo = $_POST['tipo'];
	$detalle =$_POST['detalle'];

$nombre_img = $_FILES['imagen']['name'];
$tipo_img=$_FILES['imagen']['type'];
$tamaño_img=$_FILES['imagen']['size'];

if ($tamaño_img <=3000000) {
	if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg") 
	{

		$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/';
		move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_img);

		$query = "INSERT INTO automoviles(año, marca, modelo, tipo, detalle, foto) VALUES('$año', '$marca', '$modelo', '$tipo', '$detalle', '$nombre_img' )";
		$result = mysqli_query($conn,$query);
		$_SESSION['message'] = 'Vehiculo guardado.';
		$_SESSION['message_type'] = 'success';

		header("Location: index.php" );	

	if (!$result){
		die("QUERY FAILED");
				}
	}else{
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