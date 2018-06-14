<?php 
	require("conexion.php");

	$alldata = $_POST["data"];
	$id = $_POST["id"];

	$nombre = $alldata["nombre"];
	$des_mensual = $alldata["des_mensual"];
	$des_incripcion = $alldata["des_incripcion"];

	$sql = "UPDATE convenios SET NOMBRE='$nombre', DES_MENSUALIDAD='$des_mensual', DES_INSCRIPCION='$des_incripcion'
			WHERE ID_CONVENIO=$id";
	$res = mysqli_query($conexion,$sql);
	echo mysqli_error($conexion);

 ?>