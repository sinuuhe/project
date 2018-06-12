CREATE TABLE  IF NOT EXISTS alumnos(
        id INT(12) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR (30),
        apellidoP VARCHAR(20),
        apellidoM VARCHAR(20),
        calle VARCHAR(30),
        colonia VARCHAR(30),
        numero INT(6),
        municipio VARCHAR(20),
        telefono INT(12),
        celular INT(12),
        email VARCHAR(40),
        fecha_nacimiento DATE,
        fecha_ingreso DATE,
        foto VARCHAR(20),
        status VARCHAR(20),
        empresa VARCHAR(20),
        beca INT(2),
        password VARCHAR(20),
        sede INT(1)
);

CREATE TABLE IF NOT EXISTS maestros (
        id INT(12) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR (30),
        apellidoP VARCHAR(20),
        apellidoM VARCHAR(20),
        telefono INT(12),
        celular INT(12),
        email VARCHAR(40),
        fecha_nacimiento DATE,
        fecha_ingreso DATE,
        foto VARCHAR(20),
        status VARCHAR(20),
        password VARCHAR(20),
        puesto VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS administrativos (
        id INT(12) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR (30),
        apellidoP VARCHAR(20),
        apellidoM VARCHAR(20),
        telefono INT(12),
        celular INT(12),
        email VARCHAR(40),
        fecha_nacimiento DATE,
        fecha_ingreso DATE,
        foto VARCHAR(20),
        status VARCHAR(20),
        password VARCHAR(20)
);

CREATE TABLE  IF NOT EXISTS personal(
        id INT(12) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR (30),
        apellidoP VARCHAR(20),
        apellidoM VARCHAR(20),
        telefono INT(12),
        celular INT(12),
        email VARCHAR(40),
        fecha_nacimiento DATE,
        fecha_ingreso DATE,
        foto VARCHAR(20),
        status VARCHAR(20),
        password VARCHAR(20),
        puesto VARCHAR(30)
);