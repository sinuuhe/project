<?php
    include("con.php");
    include("student.php");
    include("sqlManager.php");
    include("maestro.php");
    include("administrativos.php");
    include("personal.php");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "<script>alert('Error al conectarse a la base de datos: ".mysqli_connect_error()."');</script>";
    }else{
        $crudmanager = new CrudManager();
        if(isset($_POST['registrar_alumno'])){
            $crudmanager -> registrarAlumno($_POST['jsonForm'],$_FILES);
        }
        if(isset($_POST['registrar_maestro'])){
            $crudmanager -> registrarMaestro($_POST['jsonForm'],$_FILES); 
        }
        if(isset($_POST['registrar_administrativo'])){
            $crudmanager -> registrarAdministrativo($_POST['jsonForm'],$_FILES);
            
        }
        if(isset($_POST['registrar_personal'])){
            $crudmanager -> registrarPersonal($_POST['jsonForm'],$_FILES);
            
        }
        if(isset($_POST['tipoBusqueda'])){
            
            $elemento;
            switch ( $_POST['tipoBusqueda']){
                case "busqueda":
                switch ($_POST['elemento']){
                    case 1:
                    $elemento = "alumnos";
                    break;
                    case 2:
                    $elemento = "maestros";
                    break;
                    case 3:
                    $elemento = "administrativos";
                    break;
                    case 4:
                    $elemento = "personal";
                    break;
                }
                $crudmanager -> selectDesdeBD($elemento,0);
                break;
                case "busquedaEspecifica":
                $crudmanager -> selectEspecificoAlumnos($_POST['tabla'],$_POST['id']);
                break;  
                    
                case "actualizar":
                $crudmanager -> actualizar($_POST['tabla'],$_POST['id'],$_POST['jsonForm']);    
                break;

                case "baja":
                $crudmanager -> baja($_POST['tabla'],$_POST['id']);    
                break;
            }
           
        }
    }


    class CrudManager{
        public function insertarEnBD($objeto){
            echo SQLManager::insertar($objeto);
        }
       
        public function registrarAlumno($postDeFormulario,$archivoFoto){
            $alumno = new Alumno($postDeFormulario,$archivoFoto);
            $this -> insertarEnBD($alumno);
            //call insert in database function which is the same for every object 
        }

        public function registrarMaestro($postDeFormulario,$archivoFoto){
            $maestro = new Maestro($postDeFormulario,$archivoFoto);
            $this -> insertarEnBD($maestro);
            
        }
        public function registrarAdministrativo($postDeFormulario,$archivoFoto){
            $administrativo = new Administrativo($postDeFormulario,$archivoFoto);
            $this -> insertarEnBD($administrativo);
            
        }
        public function registrarPersonal($postDeFormulario,$archivoFoto){
            $personal = new Personal($postDeFormulario,$archivoFoto);
            $this -> insertarEnBD($personal);
            
        }

        public function selectDesdeBD($elemento){
            include("con.php");

                $select = "select * from ".$elemento.";";
            

            $resultado = mysqli_query($con, $select);
            if($elemento == "alumnos"){
                if ($resultado->num_rows > 0) {
                    echo "
                    <thead>
                    <tr class = 'orange darken-2'>
                    <th class = 'orange darken-2'>Nombre</th>
                    <th class = 'orange darken-2'>Apellido Paterno</th> 
                    <th class = 'orange darken-2'>Apellido Materno</th>
                    <th class = 'orange darken-2'>Status</th>
                    <th class = 'orange darken-2'>Sede</th>
                    <th class = 'orange darken-2'>Editar</th>
                    </tr>
                    <thead>
                    <tbody>";
                while($fila = $resultado->fetch_assoc()) {
                    if($fila['sede'] == 1)$sede = "Matriz";
                    if($fila['sede'] == 2)$sede = "Campus";
                    echo "
                        <tr'>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['apellidoP']."</td>
                            <td>".$fila['apellidoM']."</td>
                            <td>"; if($fila['status'] == 1){echo "
                                Activo
                                ";}
                                if($fila['status'] == 2){echo "En Espera
                                    ";}
                                    if($fila['status'] == 3){echo "
                                       Baja
                                        ";}
                            echo "</td>
                            <td>".$sede."</td>
                            <td><a class = 'green accent-4 btn small' href = '#titulo' onclick = 'selectEspecificoAlumnos(&quot;".$fila['id']."&quot;,&quot;alumnos&quot;)'><i class = 'material-icons'>edit</i></a></td>
                        </tr>
                    ";
                }
                echo "</tbody>";
            }else{
                echo "<h3>No hay resultados</h3>";
            }
            }

            if($elemento == "maestros"){
                if ($resultado->num_rows > 0) {
                    echo "
                    <thead class = 'orange darken-2'>
                    <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th> 
                    <th>Apellido Materno</th>
                    <th>Status</th>
                    <th>Opciones</th>
                    
                    </tr>
                    <thead>
                    <tbody>";
                while($fila = $resultado->fetch_assoc()) {
                    
                    echo "
                        <tr>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['apellidoP']."</td>
                            <td>".$fila['apellidoM']."</td>
                            <td>"; if($fila['status'] == 1){echo "
                                Activo
                                ";}
                                if($fila['status'] == 2){echo "En Espera
                                    ";}
                                    if($fila['status'] == 3){echo "
                                       Baja
                                        ";}
                            echo "</td>
                            <td><a class = 'green accent-4 btn small' href = '#titulo' onclick = 'selectEspecificoAlumnos(&quot;".$fila['id']."&quot;,&quot;maestros&quot;)'><i class = 'material-icons'>edit</i></a></td>
                            
                        </tr>
                    ";
                }
                echo "</tbody>";
            }else{
                echo "<h3>No hay resultados</h3>";
            }
            }

            if($elemento == "administrativos"){
                if ($resultado->num_rows > 0) {
                    echo "
                    <thead class = 'orange darken-2'>
                    <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th> 
                    <th>Apellido Materno</th>
                    <th>Status</th>
                    <th>Opciones</th>
                    
                    </tr>
                    <thead>
                    <tbody>";
                while($fila = $resultado->fetch_assoc()) {
                    
                    echo "
                        <tr>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['apellidoP']."</td>
                            <td>".$fila['apellidoM']."</td>
                            <td>"; if($fila['status'] == 1){echo "
                                Activo
                                ";}
                                if($fila['status'] == 2){echo "En Espera
                                    ";}
                                    if($fila['status'] == 3){echo "
                                       Baja
                                        ";}
                            echo "</td>
                            <td><a class = 'green accent-4 btn small' href = '#titulo' onclick = 'selectEspecificoAlumnos(&quot;".$fila['id']."&quot;,&quot;administrativos&quot;)'><i class = 'material-icons'>edit</i></a></td>
                            
                        </tr>
                    ";
                }
                echo "</tbody>";
            }else{
                echo "<h3>No hay resultados</h3>";
            }
            }
            

            if($elemento == "personal"){
                if ($resultado->num_rows > 0) {
                    echo "
                    <thead class = 'orange darken-2'>
                    <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th> 
                    <th>Apellido Materno</th>
                    <th>Status</th>
                    <th>Opciones</th>
                    
                    </tr>
                    </thead>
                    <tbody>";
                while($fila = $resultado->fetch_assoc()) {
                    
                    echo "
                        <tr>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['apellidoP']."</td>
                            <td>".$fila['apellidoM']."</td>
                            <td>"; if($fila['status'] == 1){echo "
                                Activo
                                ";}
                                if($fila['status'] == 2){echo "En Espera
                                    ";}
                                    if($fila['status'] == 3){echo "
                                       Baja
                                        ";}
                            echo "</td>
                            <td><a class = 'green accent-4 btn small' href = '#titulo' onclick = 'selectEspecificoAlumnos(&quot;".$fila['id']."&quot;,&quot;personal&quot;)'><i class = 'material-icons'>edit</i></a></td>

                        </tr>
                    ";
                }
                echo "</tbody>";
            }else{
                echo "<h3>No hay resultados</h3>";
            }
            }
    }
        
    public function selectEspecificoAlumnos($elemento,$especifico){
        include("con.php");

            $select = "select * from ".$elemento." where id = ".$especifico.";";

        $resultado = mysqli_query($con, $select);
        if ($resultado->num_rows > 0) {         
            if($elemento == "alumnos"){
                while($fila = $resultado->fetch_assoc()) {
                    
            
                    echo "
                    <h4>Editando: ".$fila['nombre']." ".$fila['apellidoP']."</h4>
                    <div class='row'>
                    <img src='fotosAlumnos/".$fila['foto']."' class='circle col l4 offset-l3 offset-s1 offset-m1 s10 m10'><img>
                    </div>
                <form action='crudManager.php' method='POST' enctype='multipart/form-data' id='actualizarForm'>
                <label for='nombre'>Nombre del alumno</label>
                <input type='text' name='nombre' id='nombre' value = '".$fila['nombre']."'>
                <br>
                <label for='apellidoP'>Apellido Paterno</label>
                <input type='text' name='apellidoP' id='apellidoP' value = '".$fila['apellidoP']."'>
                <br>
                <label for='apellidoM'>Apellido Materno</label>
                <input type='text' name='apellidoM' id='apellidoM' value = '".$fila['apellidoM']."'>
                <br>
                <label for='calle'>Calle</label>
                <input type='text' name='calle' id='calle' value = '".$fila['calle']."'>
                <br>
                <label for='colonia'>Colonia</label>
                <input type='text' name='colonia' id='colonia' value = '".$fila['colonia']."'>
                <br>
                <label for='numero'>Numero</label>
                <input type='text' name='numero' id='numero' value = '".$fila['numero']."'>
                <br>
                <label for='municipio'>Municipio</label>
                <input type='text' name='municipio' id='municipio' value = '".$fila['municipio']."'>
                <br>
                <label for='telefono'>Teléfono</label>
                <input type='text' name='telefono' maxlength='10' id='telefono' value = '".$fila['telefono']."'>
                <br>
                <label for='celular'>Celular</label>
                <input type='text' name='celular' maxlength='10' id='celular' value = '".$fila['celular']."'>
                <br>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value = '".$fila['email']."'>
                <br>
                <label for='fecha_nacimiento'>Fecha de Nacimiento</label>
                <input type='text' class='datepicker' name='fecha_nacimiento' id='fecha_nacimiento' value = '".$fila['fecha_nacimiento']."'>
                <br>
                <label for='fecha_ingreso'>Fecha de ingreso</label>
                <input type='text' class='datepicker' name='fecha_ingreso' id='fecha_ingreso' value = '".$fila['fecha_ingreso']."'>
                <br>
                <label for='password'>Contraseña</label>
                <input type='password' name='password' id='password' value = '".$fila['password']."'>
                <br>
                <label for='beca'>Beca (Si el alumno tiene beca, ingrese el porcentaje)</label>
                <input type='number' step='1' name='beca' id='beca' value = '".$fila['beca']."'>
                <br>
                <label for='empresa'>Empresa (Opcional)</label>
                <input type='text' name='empresa' id='empresa' value = '".$fila['empresa']."'>
                <label for='sede'>Sede</label>
                <select name='sede' id='sede' class = 'browser-default'>
                "; if($fila['sede'] == 1){echo "
                    <option value='1' selected>Matriz</option>
                    <option value='2'>Campus</option>
                    ";}
                    if($fila['sede'] == 2){echo "
                        <option value='1'>Matriz</option>
                        <option value='2' selected>Campus</option>
                        ";}
                echo "
                    
                </select>
                <br>
                <label for='status'>Status</label>
                <select id = 'status' name = 'status' class = 'browser-default'>
                "; if($fila['status'] == 1){echo "
                    <option value='1' selected>Activo</option>
                    <option value='2'>En Espera</option>
                    <option value='3'>Baja</option>
                    ";}
                    if($fila['status'] == 2){echo "
                        <option value='1' >Activo</option>
                    <option value='2' selected>En Espera</option>
                    <option value='3'>Baja</option>
                        ";}
                        if($fila['status'] == 3){echo "
                            <option value='1' >Activo</option>
                        <option value='2'>En Espera</option>
                        <option value='3'selected>Baja</option>
                            ";}
                echo "
                </select>
                <input type='button' name='actualizar_alumno' class = 'btn small orange darken-4' id='actualizar_alumno' value = 'Actualizar' onclick = 'actualizar(".$fila['id'].",&quot;alumnos&quot;,&quot;actualizarForm&quot;);'>
                <br><br>
            </form>
            <div id='verResultado'></div>
                    ";
                }
            }

            if($elemento == "maestros"){
                while($fila = $resultado->fetch_assoc()) {
            
                    echo "
                    <h4>Editando: ".$fila['nombre']." ".$fila['apellidoP']."</h4>
                    <div class='row'>
                    <img src='fotosMaestros/".$fila['foto']."' class='circle col l4 offset-l3 offset-s1 offset-m1 s10 m10'><img>
                    </div>
                <form action='crudManager.php' method='POST' enctype='multipart/form-data' id='actualizarForm'>
                <label for='nombre'>Nombre del Maestro</label>
                <input type='text' name='nombre' id='nombre' value = '".$fila['nombre']."'>
                <br>
                <label for='apellidoP'>Apellido Paterno</label>
                <input type='text' name='apellidoP' id='apellidoP' value = '".$fila['apellidoP']."'>
                <br>
                <label for='apellidoM'>Apellido Materno</label>
                <input type='text' name='apellidoM' id='apellidoM' value = '".$fila['apellidoM']."'>
                <br>
                <label for='telefono'>Teléfono</label>
                <input type='text' name='telefono' maxlength='10' id='telefono' value = '".$fila['telefono']."'>
                <br>
                <label for='celular'>Celular</label>
                <input type='text' name='celular' maxlength='10' id='celular' value = '".$fila['celular']."'>
                <br>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value = '".$fila['email']."'>
                <br>
                <label for='fecha_nacimiento'>Fecha de Nacimiento</label>
                <input type='text' class='datepicker'  name='fecha_nacimiento' id='fecha_nacimiento' value = '".$fila['fecha_nacimiento']."'>
                <br>
                <label for='fecha_ingreso'>Fecha de ingreso</label>
                <input type='text' class='datepicker'  name='fecha_ingreso' id='fecha_ingreso' value = '".$fila['fecha_ingreso']."'>
                <br>
                <label for='password'>Contraseña</label>
                <input type='password' name='password' id='password' value = '".$fila['password']."'>
                <br>
                <label for='puesto'>Puesto</label>
                <input type='text' name='puesto' id='puesto' value = '".$fila['puesto']."'>
                <br>
                <label for='status'>Status</label>
                <select id = 'status' name = 'status' class = 'browser-default'>
                "; if($fila['status'] == 1){echo "
                    <option value='1' selected>Activo</option>
                    <option value='2'>En Espera</option>
                    <option value='3'>Baja</option>
                    ";}
                    if($fila['status'] == 2){echo "
                        <option value='1' >Activo</option>
                    <option value='2' selected>En Espera</option>
                    <option value='3'>Baja</option>
                        ";}
                        if($fila['status'] == 3){echo "
                            <option value='1' >Activo</option>
                        <option value='2'>En Espera</option>
                        <option value='3'selected>Baja</option>
                            ";}
                echo "
                </select>
                <br>
                <input type='button'  class = 'btn small orange darken-4' name='actualizar_maestro' id='actualizar_maestro' value = 'Actualizar' onclick = 'actualizar(".$fila['id'].",&quot;maestros&quot;,&quot;actualizarForm&quot;);'>
                <br><br>
            </form>
            <div id='verResultado'></div>   ";
                }
            }

            if($elemento == "administrativos"){
                while($fila = $resultado->fetch_assoc()) {
            
                    echo "
                    <h4>Editando: ".$fila['nombre']." ".$fila['apellidoP']."</h4>
                    <div class='row'>
                    <img src='fotosAdministrativos/".$fila['foto'].".jpg' class='circle col l4 offset-l3 offset-s1 offset-m1 s10 m10'><img>
                    </div>
                <form action='crudManager.php' method='POST' enctype='multipart/form-data' id='actualizarForm'>
                <label for='nombre'>Nombre del Maestro</label>
                <input type='text' name='nombre' id='nombre' value = '".$fila['nombre']."'>
                <br>
                <label for='apellidoP'>Apellido Paterno</label>
                <input type='text' name='apellidoP' id='apellidoP' value = '".$fila['apellidoP']."'>
                <br>
                <label for='apellidoM'>Apellido Materno</label>
                <input type='text' name='apellidoM' id='apellidoM' value = '".$fila['apellidoM']."'>
                <br>
                <label for='telefono'>Teléfono</label>
                <input type='text' maxlength='10' name='telefono' id='telefono' value = '".$fila['telefono']."'>
                <br>
                <label for='celular'>Celular</label>
                <input type='text' maxlength='10' name='celular' id='celular' value = '".$fila['celular']."'>
                <br>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value = '".$fila['email']."'>
                <br>
                <label for='fecha_nacimiento'>Fecha de Nacimiento</label>
                <input type='text' class='datepicker' name='fecha_nacimiento' id='fecha_nacimiento' value = '".$fila['fecha_nacimiento']."'>
                <br>
                <label for='fecha_ingreso'>Fecha de ingreso</label>
                <input type='text' class='datepicker' name='fecha_ingreso' id='fecha_ingreso' value = '".$fila['fecha_ingreso']."'>
                <br>
                <label for='password'>Contraseña</label>
                <input type='password' name='password' id='password' value = '".$fila['password']."'>
                <br>
                <label for='status'>Status</label>
                <select id = 'status' name = 'status' class = 'browser-default'>
                "; if($fila['status'] == 1){echo "
                    <option value='1' selected>Activo</option>
                    <option value='2'>En Espera</option>
                    <option value='3'>Baja</option>
                    ";}
                    if($fila['status'] == 2){echo "
                        <option value='1' >Activo</option>
                    <option value='2' selected>En Espera</option>
                    <option value='3'>Baja</option>
                        ";}
                        if($fila['status'] == 3){echo "
                            <option value='1' >Activo</option>
                        <option value='2'>En Espera</option>
                        <option value='3'selected>Baja</option>
                            ";}
                echo "
                </select>
                <br>
                <input type='button'  class = 'btn small orange darken-4' name='actualizar_administrativo' id='actualizar_administrativo' value = 'Actualizar' onclick = 'actualizar(".$fila['id'].",&quot;administrativos&quot;,&quot;actualizarForm&quot;);'>
                <br><br>
            </form>
            <div id='verResultado'></div>   ";
                }
            }

            if($elemento == "personal"){
                while($fila = $resultado->fetch_assoc()) {
            
                    echo "
                    <h4>Editando: ".$fila['nombre']." ".$fila['apellidoP']."</h4>
                    <div class='row'>
                    <img src='fotosPersonal/".$fila['foto']."' class='circle col l4 offset-l3 offset-s1 offset-m1 s10 m10'><img>
                    </div>
                <form action='crudManager.php' method='POST' enctype='multipart/form-data' id='actualizarForm'>
                <label for='nombre'>Nombre del Maestro</label>
                <input type='text' name='nombre' id='nombre' value = '".$fila['nombre']."'>
                <br>
                <label for='apellidoP'>Apellido Paterno</label>
                <input type='text' name='apellidoP' id='apellidoP' value = '".$fila['apellidoP']."'>
                <br>
                <label for='apellidoM'>Apellido Materno</label>
                <input type='text' name='apellidoM' id='apellidoM' value = '".$fila['apellidoM']."'>
                <br>
                <label for='telefono'>Teléfono</label>
                <input type='text' maxlength='10' name='telefono' id='telefono' value = '".$fila['telefono']."'>
                <br>
                <label for='celular'>Celular</label>
                <input type='text' maxlength='10' name='celular' id='celular' value = '".$fila['celular']."'>
                <br>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value = '".$fila['email']."'>
                <br>
                <label for='fecha_nacimiento'>Fecha de Nacimiento</label>
                <input type='text' class='datepicker'  name='fecha_nacimiento' id='fecha_nacimiento' value = '".$fila['fecha_nacimiento']."'>
                <br>
                <label for='fecha_ingreso'>Fecha de ingreso</label>
                <input type='text' class='datepicker'  name='fecha_ingreso' id='fecha_ingreso' value = '".$fila['fecha_ingreso']."'>
                <br>
                <label for='password'>Contraseña</label>
                <input type='password' name='password' id='password' value = '".$fila['password']."'>
                <br>
                <label for='puesto'>Puesto</label>
                <input type='text' name='puesto' id='puesto' value = '".$fila['puesto']."'>
                <br>
                <label for='status'>Status</label>
                <select id = 'status' name = 'status' class = 'browser-default'>
                "; if($fila['status'] == 1){echo "
                    <option value='1' selected>Activo</option>
                    <option value='2'>En Espera</option>
                    <option value='3'>Baja</option>
                    ";}
                    if($fila['status'] == 2){echo "
                        <option value='1' >Activo</option>
                    <option value='2' selected>En Espera</option>
                    <option value='3'>Baja</option>
                        ";}
                        if($fila['status'] == 3){echo "
                            <option value='1' >Activo</option>
                        <option value='2'>En Espera</option>
                        <option value='3'selected>Baja</option>
                            ";}
                echo "
                </select>
                <br>
                <input type='button'  class = 'btn small orange darken-4' name='actualizar_personal' id='actualizar_personal' value = 'Actualizar' onclick = 'actualizar(".$fila['id'].",&quot;personal&quot;,&quot;actualizarForm&quot;);'>
                <br><br>
            </form>
            <div id='verResultado'></div>   ";
                }
            }
    }else{
        echo "<h3>No hay resultados</h3>";
    }
}


public function actualizar($tabla,$id,$jsonForm){
   if($tabla == "alumnos"){
        $query = "update ".$tabla." set nombre = '".$jsonForm['nombre']."',
        apellidoP = '".$jsonForm['apellidoP']."',
        apellidoM = '".$jsonForm['apellidoM']."',
        calle = '".$jsonForm['calle']."',
        colonia = '".$jsonForm['colonia']."',
        numero = ".$jsonForm['numero'].",
        municipio = '".$jsonForm['municipio']."',
        telefono = ".$jsonForm['telefono'].",
        celular = ".$jsonForm['celular'].",
        email = '".$jsonForm['email']."',
        fecha_nacimiento = '".$jsonForm['fecha_nacimiento']."',
        beca = ".$jsonForm['beca'].",
        status = ".$jsonForm['status'].",
        password = '".$jsonForm['password']."',
        empresa = '".$jsonForm['empresa']."',
        sede = ".$jsonForm['sede']."
        where id = ".$id.";";

include("con.php");
            if (mysqli_query($con, $query)) {
                echo "<h5>Actualización correcta!</h5>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
            
    }

     if($tabla == "maestros"){
        $query = "update ".$tabla." set nombre = '".$jsonForm['nombre']."',
        apellidoP = '".$jsonForm['apellidoP']."',
        apellidoM = '".$jsonForm['apellidoM']."',
        telefono = ".$jsonForm['telefono'].",
        celular = ".$jsonForm['celular'].",
        status = ".$jsonForm['status'].",
        password = '".$jsonForm['password']."',
        email = '".$jsonForm['email']."',
        fecha_nacimiento = '".$jsonForm['fecha_nacimiento']."',
        fecha_ingreso = '".$jsonForm['fecha_ingreso']."',
        puesto = '".$jsonForm['puesto']."'
        where id = ".$id.";";
        
include("con.php");
            if (mysqli_query($con, $query)) {
                echo "<h5>Actualización correcta!</h5>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
            
    }
    
    if($tabla == "administrativos"){
        $query = "update ".$tabla." set nombre = '".$jsonForm['nombre']."',
        apellidoP = '".$jsonForm['apellidoP']."',
        apellidoM = '".$jsonForm['apellidoM']."',
        telefono = ".$jsonForm['telefono'].",
        celular = ".$jsonForm['celular'].",
        email = '".$jsonForm['email']."',
        status = ".$jsonForm['status'].",
        password = '".$jsonForm['password']."',
        fecha_nacimiento = '".$jsonForm['fecha_nacimiento']."',
        fecha_ingreso = '".$jsonForm['fecha_ingreso']."'
        where id = ".$id.";";
        
include("con.php");
            if (mysqli_query($con, $query)) {
                echo "<h5>Actualización correcta!</h5>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
            
    }
    if($tabla == "personal"){
        $query = "update ".$tabla." set nombre = '".$jsonForm['nombre']."',
        apellidoP = '".$jsonForm['apellidoP']."',
        apellidoM = '".$jsonForm['apellidoM']."',
        telefono = ".$jsonForm['telefono'].",
        celular = ".$jsonForm['celular'].",
        email = '".$jsonForm['email']."',
        password = '".$jsonForm['password']."',
        status = ".$jsonForm['status'].",
        fecha_nacimiento = '".$jsonForm['fecha_nacimiento']."',
        fecha_ingreso = '".$jsonForm['fecha_ingreso']."',
        puesto = '".$jsonForm['puesto']."'
        where id = ".$id.";";
        
include("con.php");
            if (mysqli_query($con, $query)) {
                echo "<h5>Actualización correcta!</h5>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
            
    }
    
}

}
  ?>