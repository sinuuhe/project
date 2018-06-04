<?php 
	require("conexion.php");

	$sql = "SELECT * from convenios";
	$res = mysqli_query($conexion,$sql);

	$tabla ="<table class='centered row bordered'>
        <thead>
          <tr>
              <th class='hide-on-med-and-down'>ID Convenio</th>
              <th>Empresa</th>
              <th>Descuento mensual</th>
              <th>Descuento inscripcion</th>
          </tr>
        </thead>
        <tbody>";

    while ($data = mysqli_fetch_assoc($res)){
		$tabla .="<tr class='myCollapse'>";
		$tabla .="<td class='convenio hide-on-med-and-down'>".$data["ID_CONVENIO"]."</td>";
		$tabla .="<td class='nombre'>".$data["NOMBRE"]."</td>";
		$tabla .="<td>".$data["DES_MENSUALIDAD"]."%</td>";
		$tabla .="<td>".$data["DES_INSCRIPCION"]."%</td>";
		$tabla.="</tr><tr id='".$data["ID_CONVENIO"]."' class='contentCollapsed'>
				<td colspan='4'><form id='".$data["ID_CONVENIO"]."convenio_data' class='card_box container z-depth-4'>";
		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_CONVENIO"]."nombre'>Nombre</label>
					<input value='".$data["NOMBRE"]."' placeholder='Nombre empres' id='".$data["ID_CONVENIO"]."nombre' name='nombre' type='text' class='validate center-align'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 l4 xl4'>
					<label for='".$data["ID_CONVENIO"]."des_mensual'>Descuento mensualidad</label>
					<input value='".$data["DES_MENSUALIDAD"]."' placeholder='Descuento mensual' id='".$data["ID_CONVENIO"]."des_mensual' name='des_mensual' type='number' class='validate center-align' min='0' max='99'>
				</div>";

		$tabla.="<div class='form-group col s12 m6 offset-m3 l4 xl4'>
					<label for='".$data["ID_CONVENIO"]."des_incripcion'>Descuento incripción</label>
					<input value='".$data["DES_INSCRIPCION"]."' placeholder='Descuento inscripción' id='".$data["ID_CONVENIO"]."des_incripcion' name='des_incripcion' type='number' class='validate center-align' min='0' max='99'>
				</div>";

		$tabla.="<a class='actualizar_convenio col s12 m6 offset-m3 l4 offset-l4 xl4 offset-xl4 waves-effect waves-light btn blue darken-3'>Guardar cambios</a>";

		$tabla.="</form>
				</td>
				</tr>";
		}

	$tabla .="</tbody>";
	$tabla .="</table>";
	echo $tabla;
 ?>