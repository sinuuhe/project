<?php
require_once('campo.php');
    class Maestro{
        public $infoTabla;
        public $carpeta;
        public $tabla;
        public  $id;
        public  $nombre;
        public  $apellidoP;
        public  $apellidoM;
        public  $telefono;
        public  $celular;
        public  $email;
        public  $fecha_nacimiento;
        public  $fecha_ingreso;
        public  $foto;
        public  $status;
        public  $password;
        public  $puesto;
        public function __construct($infoDeFormulario,$archivo) {
    
        $this -> infoTabla =   new Campo();
        $this -> tabla =   new Campo();
        $this -> id =   new Campo();
        $this -> nombre   =   new Campo();
        $this -> apellidoP  =   new Campo();
        $this -> apellidoM  =   new Campo();
        $this -> telefono   =   new Campo();
        $this -> celular    =   new Campo();
        $this -> email  =   new Campo();
        $this -> fecha_nacimiento   =   new Campo();
        $this -> fecha_ingreso  =   new Campo();
        $this -> foto   =   new Campo();
        $this -> status =   new Campo();
        $this -> password  =   new Campo();
        $this -> puesto  =   new Campo();
        $this -> carpeta  =   new Campo();

        $this -> infoTabla -> valor = "
        CREATE TABLE IF NOT EXISTS maestros (
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR (30),
            apellidoP VARCHAR(20),
            apellidoM VARCHAR(20),
            telefono INT(11),
            celular INT(11),
            email VARCHAR(40),
            fecha_nacimiento DATE,
            fecha_ingreso DATE,
            foto VARCHAR(20),
            status VARCHAR(20),
            password VARCHAR(20),
            puesto VARCHAR(30)
    );";
        $this -> infoTabla -> tipo  =   "varchar";
        $this -> infoTabla -> nombre = 'tabla';

        $this -> tabla -> valor = "maestros";
        $this -> tabla -> tipo  =   "varchar";
        $this -> tabla -> nombre = 'tabla';

        $this -> carpeta -> valor = "fotosMaestros/";
        $this -> carpeta -> tipo  =   "varchar";
        $this -> carpeta -> nombre = 'tabla';

        $this -> nombre -> valor = $infoDeFormulario['nombre'];
        $this -> nombre -> tipo =   "varchar";
        $this -> nombre -> nombre = 'nombre';

        $this -> apellidoP -> valor = $infoDeFormulario['apellidoP'];
        $this -> apellidoP -> tipo  =   "varchar";
        $this -> apellidoP -> nombre = 'apellidoP';

        $this -> apellidoM -> valor = $infoDeFormulario['apellidoM'];
        $this -> apellidoM -> tipo  =   "varchar";
        $this -> apellidoM -> nombre = 'apellidoM';

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

        $this -> password -> valor = $infoDeFormulario['apellidoP']."123";
        $this -> password -> tipo   =   "varchar";
        $this -> password -> nombre = 'password';

        $this -> puesto -> valor = $infoDeFormulario['puesto'];
        $this -> puesto -> tipo    =   "varchar";
        $this -> puesto -> nombre = 'puesto';

        $this -> id -> valor = '0';
        $this -> id -> tipo =   "int";
        $this -> id -> nombre = 'id';

        $this -> status -> valor= 1;
        $this -> status -> tipo =   "int";
        $this -> status -> nombre= 'status';
        }

    }
?>