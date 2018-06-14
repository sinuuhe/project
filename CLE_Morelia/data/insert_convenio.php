<?php 
	require("conexion.php");

	$alldata = $_POST["data"];

	$nombre = $alldata["nombre"];
	$des_mensual = $alldata["des_mensual"];
	$des_incripcion = $alldata["des_incripcion"];

	$sql ="INSERT INTO convenios VALUES('','$nombre', $des_mensual, $des_incripcion)";
	$res = mysqli_query($conexion,$sql);

	echo mysqli_error($conexion);

 ?>