<?php 
	require("conexion.php");

	$sql = "SELECT * from niveles";
	$res = mysqli_query($conexion,$sql);

	$tabla ="<table class='centered row bordered'>
        <thead>
          <tr>
              <th class='hide-on-med-and-down'>ID Nivel</th>
              <th>Nombre</th>
              <th>Curso</th>
              <th class='hide-on-med-and-down'>Duración</th>
              <th>Material/Libro</th>
              <th class='hide-on-med-and-down'>Costo</th>
          </tr>
        </thead>
        <tbody>";

    while ($data = mysqli_fetch_assoc($res)){
		$tabla .="<tr class='myCollapse'>";
		$tabla .="<td class='nivel hide-on-med-and-down'>".$data["ID_NIVEL"]."</td>";
		$tabla .="<td class='nombre'>".$data["NOMBRE"]."</td>";
		$tabla .="<td>".$data["CURSO"]."</td>";
		$tabla .="<td class='hide-on-med-and-down'>".$data["DURACION"]."</td>";
		$tabla .="<td>".$data["MATERIAL_LIBRO"]."</td>";
		$tabla .="<td class='hide-on-med-and-down'>".$data["COSTO"]."</td>";

		$tabla.="</tr><tr id='".$data["ID_NIVEL"]."' class='contentCollapsed'>
				<td colspan='6'><form id='".$data["ID_NIVEL"]."nivel_data' class='card_box container z-depth-4'>";
		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_NIVEL"]."nombre'>Nombre</label>
					<input value='".$data["NOMBRE"]."' placeholder='Nombre nivel' id='".$data["ID_NIVEL"]."nombre' name='nombre' type='text' class='validate center-align'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_NIVEL"]."curso'>Curso</label>
					<input value='".$data["CURSO"]."' placeholder='Curso' id='".$data["ID_NIVEL"]."curso' name='curso' type='text' class='validate center-align'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_NIVEL"]."duracion'>Duración (meses)</label>
					<input value='".$data["DURACION"]."' placeholder='Duracion curso' id='".$data["ID_NIVEL"]."duracion' name='duracion' type='number' class='validate center-align' min='0' max='12'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_NIVEL"]."material'>Material/Libro</label>
					<input value='".$data["MATERIAL_LIBRO"]."' placeholder='Material/Libro' id='".$data["ID_NIVEL"]."material' name='material' type='text' class='validate center-align'>					
				</div>";

		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_NIVEL"]."costo'>Costo</label>
					<input value='".$data["COSTO"]."' placeholder='Costo nivel' id='".$data["ID_NIVEL"]."costo' name='costo' type='number' class='validate center-align' min='0' max='9999'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_NIVEL"]."inscripcion'>Inscripción</label>
					<input value='".$data["INSCRIPCION"]."' placeholder='Inscripción nivel' id='".$data["ID_NIVEL"]."inscripcion' name='inscripcion' type='number' class='validate center-align' min='0' max='9999'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 offset-m3 l4 offset-l4 xl4 offset-xl4'>
					<label for='".$data["ID_NIVEL"]."ducumento'>Documento otorgado</label>
					<input value='".$data["DOCUMENTO"]."' placeholder='Documento otorgado' id='".$data["ID_NIVEL"]."ducumento' name='ducumento' type='text' class='validate center-align'>
				</div>";

		$tabla.="<a class='actualizar_nivel col s12 m6 offset-m3 l4 offset-l4 xl4 offset-xl4 waves-effect waves-light btn blue darken-3'>Guardar cambios</a>";

		$tabla.="</form>
				</td>
				</tr>";
		}

	$tabla .="</tbody>";
	$tabla .="</table>";
	echo $tabla;

 ?>