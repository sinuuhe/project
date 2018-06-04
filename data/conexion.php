<?php 
$conexion = mysqli_connect( "localhost", "root", "","cle") 
or die ("No se ha podido conectar al servidor de Base de datos");

//Sentencia para extraer los acentos correctamente
$acentos = $conexion->query("SET NAMES 'utf8'");
 ?>