<?php
require_once('campo.php');
    class Alumno{
        public  $infoTabla;
        public $carpeta;
        public $tabla;
        public  $id;
        public  $nombre;
        public  $apellidoP;
        public  $apellidoM;
        public  $calle;
        public  $colonia;
        public  $numero;
        public  $municipio;
        public  $telefono;
        public  $celular;
        public  $email;
        public  $fecha_nacimiento;
        public  $fecha_ingreso;
        public  $foto;
        public  $status;
        public  $empresa;
        public  $beca;
        public  $password;
        public  $sede;
        public function __construct($infoDeFormulario,$archivo) {
    
        $this -> infoTabla =   new Campo();            
        $this -> sede =   new Campo();
        $this -> tabla =   new Campo();
        $this -> id =   new Campo();
        $this -> nombre   =   new Campo();
        $this -> apellidoP  =   new Campo();
        $this -> apellidoM  =   new Campo();
        $this -> calle  =   new Campo();
        $this -> colonia    =   new Campo();
        $this -> numero =   new Campo();
        $this -> municipio  =   new Campo();
        $this -> telefono   =   new Campo();
        $this -> celular    =   new Campo();
        $this -> email  =   new Campo();
        $this -> fecha_nacimiento   =   new Campo();
        $this -> fecha_ingreso  =   new Campo();
        $this -> foto   =   new Campo();
        $this -> status =   new Campo();
        $this -> empresa    =   new Campo();
        $this -> beca   =   new Campo();
        $this -> password  =   new Campo();
        $this -> carpeta  =   new Campo();

        $this -> infoTabla -> valor = "
        CREATE TABLE  IF NOT EXISTS alumnos(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR (30),
            apellidoP VARCHAR(20),
            apellidoM VARCHAR(20),
            calle VARCHAR(30),
            colonia VARCHAR(30),
            numero INT(6),
            municipio VARCHAR(20),
            telefono INT(11),
            celular INT(11),
            email VARCHAR(40),
            fecha_nacimiento DATE,
            fecha_ingreso DATE,
            foto VARCHAR(20),
            status VARCHAR(20),
            empresa VARCHAR(20),
            beca INT(2),
            password VARCHAR(20),
            sede INT(1)
    );";
        $this -> infoTabla -> tipo  =   "varchar";
        $this -> infoTabla -> nombre = 'tabla';

        $this -> sede -> valor = $infoDeFormulario['sede'];;
        $this -> sede -> tipo   =   "int";
        $this -> sede -> nombre = 'sede';

        $this -> carpeta -> valor = "fotosAlumnos/";
        $this -> carpeta -> tipo  =   "varchar";
        $this -> carpeta -> nombre = 'tabla';

        $this -> tabla -> valor = "alumnos";
        $this -> tabla -> tipo  =   "varchar";
        $this -> tabla -> nombre = 'tabla';

        $this -> nombre -> valor = $infoDeFormulario['nombre'];
        $this -> nombre -> tipo =   "varchar";
        $this -> nombre -> nombre = 'nombre';

        $this -> apellidoP -> valor = $infoDeFormulario['apellidoP'];
        $this -> apellidoP -> tipo  =   "varchar";
        $this -> apellidoP -> nombre = 'apellidoP';

        $this -> apellidoM -> valor = $infoDeFormulario['apellidoM'];
        $this -> apellidoM -> tipo  =   "varchar";
        $this -> apellidoM -> nombre = 'apellidoM';

        $this -> calle -> valor = $infoDeFormulario['calle'];
        $this -> calle -> tipo  =   "varchar";
        $this -> calle -> nombre = 'calle';

        $this -> colonia -> valor = $infoDeFormulario['colonia'];
        $this -> colonia -> tipo    =   "varchar";
        $this -> colonia -> nombre = 'colonia';

        $this -> numero -> valor = $infoDeFormulario['numero'];
        $this -> numero -> tipo =   "int";
        $this -> numero -> nombre = 'numero';

        $this -> municipio -> valor = $infoDeFormulario['municipio'];
        $this -> municipio -> tipo  =   "varchar";
        $this -> municipio -> nombre = 'municipio';

        $this -> telefono -> valor = $infoDeFormulario['telefono'];
        $this -> telefono -> tipo   =   "int";
        $this -> telefono -> nombre = 'telefono';

        $this -> celular -> valor = $infoDeFormulario['celular'];
        $this -> celular -> tipo    =   "int";
        $this -> celular -> nombre = 'celular';

        $this -> email -> valor = $infoDeFormulario['email'];
        $this -> email -> tipo  =   "varchar";
        $this -> email -> nombre = 'email';

        $this -> fecha_nacimiento -> valor = $infoDeFormulario['fecha_nacimiento'];
        $this -> fecha_nacimiento -> tipo   =   "varchar";
        $this -> fecha_nacimiento -> nombre = 'fecha_nacimiento';

        $this -> fecha_ingreso -> valor = $infoDeFormulario['fecha_ingreso'];
        $this -> fecha_ingreso -> tipo  =   "varchar";
        $this -> fecha_ingreso -> nombre = 'fecha_ingreso';

        $this -> foto -> valor = $this -> id -> valor;
        $this -> foto -> tipo   =   "varchar";
        $this -> foto -> nombre = 'foto';

        $this -> beca -> valor = $infoDeFormulario['beca'];
        $this -> beca -> tipo   =   "int";
        $this -> beca -> nombre = 'beca';

        $this -> password -> valor = $infoDeFormulario['apellidoP']."123";
        $this -> password -> tipo   =   "varchar";
        $this -> password -> nombre = 'password';

        $this -> empresa -> valor = $infoDeFormulario['empresa'];
        $this -> empresa -> tipo    =   "varchar";
        $this -> empresa -> nombre = 'empresa';

        $this -> id -> valor = '0';
        $this -> id -> tipo =   "int";
        $this -> id -> nombre = 'id';

        $this -> status -> valor= 1;
        $this -> status -> tipo =   "int";
        $this -> status -> nombre= 'status';
        }
        
        public  function getAlumno(){
            
        }
    }
?>