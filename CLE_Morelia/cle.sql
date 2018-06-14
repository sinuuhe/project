-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2018 a las 07:04:15
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE IF NOT EXISTS `convenios` (
  `ID_CONVENIO` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `DES_MENSUALIDAD` int(2) NOT NULL,
  `DES_INSCRIPCION` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`ID_CONVENIO`, `NOMBRE`, `DES_MENSUALIDAD`, `DES_INSCRIPCION`) VALUES
(1, 'ITM', 50, 30),
(2, 'PREU', 60, 30),
(3, 'Cinepolis', 40, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_activos`
--

CREATE TABLE IF NOT EXISTS `grupos_activos` (
  `ID_GRUPO` varchar(10) NOT NULL,
  `ID_NIVEL` varchar(10) NOT NULL,
  `ID_MAESTRO` varchar(10) NOT NULL,
  `DIA` varchar(30) NOT NULL,
  `HORARIO` varchar(30) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FEHA_FIN` date NOT NULL,
  `SEDE` int(1) NOT NULL,
  `SALON` int(2) NOT NULL,
  `OBSERVACION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `ID_NIVEL` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `CURSO` varchar(15) NOT NULL,
  `DURACION` int(2) NOT NULL,
  `MATERIAL_LIBRO` varchar(40) NOT NULL,
  `COSTO` int(4) NOT NULL,
  `INSCRIPCION` int(4) NOT NULL,
  `DOCUMENTO` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`ID_NIVEL`, `NOMBRE`, `CURSO`, `DURACION`, `MATERIAL_LIBRO`, `COSTO`, `INSCRIPCION`, `DOCUMENTO`) VALUES
(1, 'Basico', 'Ingles', 10, 'Inter', 700, 400, 'Diploma'),
(2, 'Medio', 'Frances', 10, 'Summit', 800, 400, 'Diploma Summit'),
(3, 'Intermedio', 'Ingles', 10, 'Basic', 600, 400, 'Dimploma Basic');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`ID_CONVENIO`);

--
-- Indices de la tabla `grupos_activos`
--
ALTER TABLE `grupos_activos`
  ADD PRIMARY KEY (`ID_GRUPO`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`ID_NIVEL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `ID_CONVENIO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `ID_NIVEL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
