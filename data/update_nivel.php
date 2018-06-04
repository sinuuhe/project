<?php 
	require("conexion.php");

	$alldata = $_POST["data"];
	$id = $_POST["id"];

	$nombre = $alldata["nombre"];
	$curso = $alldata["curso"];
	$duracion = $alldata["duracion"];
	$material = $alldata["material"];
	$costo = $alldata["costo"];
	$inscripcion = $alldata["inscripcion"];
	$ducumento = $alldata["ducumento"];

	$sql = "UPDATE niveles SET NOMBRE='$nombre', CURSO='$curso', DURACION=$duracion, 
			MATERIAL_LIBRO='$material', COSTO=$costo, INSCRIPCION=$inscripcion,
			DOCUMENTO='$ducumento'
			WHERE ID_NIVEL=$id";
	$res = mysqli_query($conexion,$sql);
	echo mysqli_error($conexion);




 ?>