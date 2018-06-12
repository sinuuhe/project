<?php     
    class SQLManager{

        public static function crearQueryInsertar($objeto){
            $queryPartUno = "INSERT INTO ".$objeto -> tabla -> valor." (";
            $queryPartDos = " VALUES( ";
            foreach($objeto as $atributo){
                if($atributo -> nombre != "tabla"){
                    $queryPartUno = $queryPartUno.$atributo -> nombre.',';
                    if($atributo -> tipo == "int"){
                        $queryPartDos = $queryPartDos.$atributo -> valor.",";
                    }else{
                        $queryPartDos = $queryPartDos."'".$atributo -> valor."',";
                    }
                    
                }
            }
            $queryPartUno = substr($queryPartUno,0 ,-1);
            $queryPartDos = substr($queryPartDos,0 ,-1);
            $queryPartUno = $queryPartUno.') ';
            $queryPartDos = $queryPartDos.');';
            $query = $queryPartUno.$queryPartDos;
            return $query;
        }

        public static function insertar($objeto){
            $query = self::crearQueryInsertar($objeto);
            self::insertarEnBD($query,$objeto);
        }

        public function insertarEnBD($query,$objeto){
            include("con.php");
            $crearTabla = $objeto -> infoTabla -> valor;

            if (mysqli_query($con, $query)) {
                self::guardarImagen($objeto);
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
                
            }

            
        }

        public function guardarImagen($objeto){
            include("con.php");
            $select = "select * from ".$objeto -> tabla -> valor." ORDER BY ID DESC LIMIT 1;";
            $resultado = mysqli_query($con, $select);
            $resultadoArray = $resultado -> fetch_assoc();

            $dir_subida = $objeto -> carpeta -> valor;
            $nombreArchivo = $objeto -> tabla -> valor.$resultadoArray['id'].'.jpg';
            $fichero_subido = $dir_subida . basename($nombreArchivo);
            //$_FILES['foto']['type'] = 'image/jpg';
            if(isset($_FILES)){
                print_r($_FILES);
            }
          
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido)) {
                
                $actualizar = "UPDATE ".$objeto -> tabla -> valor." SET foto = '".$nombreArchivo."' WHERE id = ".$resultadoArray['id'].";";
                if (mysqli_query($con, $actualizar)) {
                    echo 'photo up';
                } else {
                    echo "Error: " . $actualizar . "<br>" . mysqli_error($con);
                }
            } else {
               echo '';
            }

            

          
        }

        
    }    
?>