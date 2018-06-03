<?php
    include("con.php");
    include("student.php");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "<script>alert('Error al conectarse a la base de datos: ".mysqli_connect_error()."');</script>";
    }else{

        class CrudManager{
            public function registrar($tipo){
                switch($tipo){
                    case "alumno":
                        $alumno = new Alumno();
                        echo $_POST;
                    break;
                    case "maestro":
                        echo "MAESTRO";
                    break;
                    case "personal":
                        echo "PERSONAL";
                    break;
                }
            }
        }

        if(isset($_POST['registrar_alumno'])){
            $crudmanager = new CrudManager();
            echo "pop";
            $crudmanager -> registrar($_POST['nombre']);
        }
    }
  ?>