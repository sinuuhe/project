<?php 
	require("conexion.php");

	$alldata = $_POST["data"];

	$nombre = $alldata["nombre"];
	$curso = $alldata["curso"];
	$duracion = $alldata["duracion"];
	$material = $alldata["material"];
	$costo = $alldata["costo"];
	$inscripcion = $alldata["inscripcion"];
	$ducumento = $alldata["ducumento"];

	$sql ="INSERT INTO niveles VALUES('','$nombre', '$curso', $duracion, '$material', $costo, $inscripcion, '$ducumento')";
	$res = mysqli_query($conexion,$sql);

	echo mysqli_error($conexion);


 ?>