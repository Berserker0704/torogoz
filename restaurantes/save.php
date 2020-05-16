<?php
INCLUDE("db.php");

    $nombre = "";
	$horario = "";
	$tiempo = "";
	
if (isset($_POST['Guardar'])){
	$nombre = $_POST['nombre'];
	$horario =$_POST['horario'];
	$tiempo = $_POST['tiempo'];

$nombre_img = $_FILES['imagen']['name'];
$tipo_img=$_FILES['imagen']['type'];
$tamaño_img=$_FILES['imagen']['size'];

if ($tamaño_img <=3000000) {
	if ($tipo_img=="image/jpg" || $tipo_img=="image/png" || $tipo_img=="image/jpeg") 
	{

		$carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/';
		move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_img);

		$query = "INSERT INTO restaurante(nm_restaurante, horario_restaurante, tiempo_entrega, foto_resta) VALUES('$nombre', '$horario', '$tiempo', '$nombre_img' )";
		$result = mysqli_query($conn,$query);
		$_SESSION['message'] = 'Restaurante agregado.';
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