-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2020 a las 06:48:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemahospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fechaCita` date NOT NULL,
  `hora` time NOT NULL,
  `duracion` varchar(10) NOT NULL,
  `medico` int(11) DEFAULT NULL,
  `paciente` varchar(13) DEFAULT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

UPDATE `citas` SET `id` = 10,`fechaCita` = '2020-08-18',`hora` = '10:03:00',`duracion` = '7 minutos',`medico` = 27,`paciente` = '894-2098340-5',`costo` = 700 WHERE `citas`.`id` = 10;
UPDATE `citas` SET `id` = 11,`fechaCita` = '2020-08-18',`hora` = '03:05:00',`duracion` = '8 minutos',`medico` = 52,`paciente` = '892-0139080-1',`costo` = 700 WHERE `citas`.`id` = 11;
UPDATE `citas` SET `id` = 19,`fechaCita` = '2020-08-08',`hora` = '22:00:00',`duracion` = '30 minutos',`medico` = 27,`paciente` = '001-1234567-1',`costo` = 700 WHERE `citas`.`id` = 19;
UPDATE `citas` SET `id` = 20,`fechaCita` = '2020-08-08',`hora` = '12:00:00',`duracion` = '30 minutos',`medico` = 27,`paciente` = '897-4329474-2',`costo` = 700 WHERE `citas`.`id` = 20;
UPDATE `citas` SET `id` = 21,`fechaCita` = '2020-10-23',`hora` = '15:30:00',`duracion` = '30 minutos',`medico` = 40,`paciente` = '201-9373920-3',`costo` = 700 WHERE `citas`.`id` = 21;
UPDATE `citas` SET `id` = 22,`fechaCita` = '2020-09-24',`hora` = '09:30:00',`duracion` = '30 minutos',`medico` = 52,`paciente` = '098-7654321-1',`costo` = 700 WHERE `citas`.`id` = 22;
UPDATE `citas` SET `id` = 23,`fechaCita` = '2020-08-21',`hora` = '16:30:00',`duracion` = '30 minutos',`medico` = 52,`paciente` = '892-0139080-1',`costo` = 700 WHERE `citas`.`id` = 23;
UPDATE `citas` SET `id` = 24,`fechaCita` = '2020-08-21',`hora` = '16:30:00',`duracion` = '30 minutos',`medico` = 52,`paciente` = '892-0139080-1',`costo` = 700 WHERE `citas`.`id` = 24;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

UPDATE `estado` SET `idEstado` = 1,`estado` = 'Activo' WHERE `estado`.`idEstado` = 1;
UPDATE `estado` SET `idEstado` = 2,`estado` = 'Inactivo' WHERE `estado`.`idEstado` = 2;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

UPDATE `eventos` SET `id` = 17,`title` = 'Narutitis',`body` = 'Ver mucho naruto ',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=17',`class` = 'event-info',`start` = '1603434600000',`end` = '1603434600000',`inicio_normal` = '23/10/2020 3:30',`final_normal` = '23/10/2020 3:30' WHERE `eventos`.`id` = 17;
UPDATE `eventos` SET `id` = 19,`title` = 'Radiografia para la nalga',`body` = 'Se partio las nalgas ',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=19',`class` = 'event-success',`start` = '1600950600000',`end` = '1600950600000',`inicio_normal` = '24/09/2020 9:30',`final_normal` = '24/09/2020 9:30' WHERE `eventos`.`id` = 19;
UPDATE `eventos` SET `id` = 21,`title` = 'Dolores de cabeza y nariz',`body` = 'Intento hacer el auto examen del covid-19 y salio mal ',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=21',`class` = 'event-info',`start` = '1597759200000',`end` = '1597759200000',`inicio_normal` = '18/08/2020 10:00',`final_normal` = '18/08/2020 10:00' WHERE `eventos`.`id` = 21;
UPDATE `eventos` SET `id` = 22,`title` = 'Dolores nalgales',`body` = 'Intento darse placer por lugares no debidos',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=22',`class` = 'event-info',`start` = '1596938400000',`end` = '1596938400000',`inicio_normal` = '08/08/2020 22:00',`final_normal` = '08/08/2020 22:00' WHERE `eventos`.`id` = 22;
UPDATE `eventos` SET `id` = 23,`title` = 'Viene a solicitar la pasantia medica',`body` = 'Necesita la pansantia por motivos universitarios',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=23',`class` = 'event-warning',`start` = '1596902400000',`end` = '1596902400000',`inicio_normal` = '08/08/2020 12:00',`final_normal` = '08/08/2020 12:00' WHERE `eventos`.`id` = 23;
UPDATE `eventos` SET `id` = 24,`title` = 'Nuevo Doctor',`body` = 'Entrevista al Doctor Armado Paredes',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=24',`class` = 'event-important',`start` = '1597734300000',`end` = '1597734300000',`inicio_normal` = '18/08/2020 3:05',`final_normal` = '18/08/2020 3:05' WHERE `eventos`.`id` = 24;
UPDATE `eventos` SET `id` = 25,`title` = 'cumpleaños',`body` = 'Me gusta los carritos',`url` = 'http://localhost/sistemahospital/descripcion_evento.php?id=25',`class` = 'event-info',`start` = '1612522800000',`end` = '1612522800000',`inicio_normal` = '05/02/2021 8:00',`final_normal` = '05/02/2021 8:00' WHERE `eventos`.`id` = 25;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `cedula` varchar(13) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `nacimiento` date NOT NULL,
  `tipoSangre` char(2) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

UPDATE `pacientes` SET `cedula` = '001-1234567-1',`nombre` = 'Amadis',`apellido` = 'Suarez',`nacimiento` = '1982-06-15',`tipoSangre` = 'A+',`telefono` = '8299848389' WHERE `pacientes`.`cedula` = '001-1234567-1';
UPDATE `pacientes` SET `cedula` = '031-2489481-2',`nombre` = 'Jose',`apellido` = 'Reyes',`nacimiento` = '1990-12-04',`tipoSangre` = 'B+',`telefono` = '8096832429' WHERE `pacientes`.`cedula` = '031-2489481-2';
UPDATE `pacientes` SET `cedula` = '032-1638493-0',`nombre` = 'Roshby',`apellido` = 'Pajaro',`nacimiento` = '2000-11-21',`tipoSangre` = 'A+',`telefono` = '8492065473' WHERE `pacientes`.`cedula` = '032-1638493-0';
UPDATE `pacientes` SET `cedula` = '084-2935842-3',`nombre` = 'Estefani',`apellido` = 'Mesa',`nacimiento` = '1972-08-20',`tipoSangre` = 'B+',`telefono` = '8498907852' WHERE `pacientes`.`cedula` = '084-2935842-3';
UPDATE `pacientes` SET `cedula` = '092-8439408-4',`nombre` = 'Cesar Javier',`apellido` = 'Martinez Garrido',`nacimiento` = '1985-02-18',`tipoSangre` = 'B+',`telefono` = '8092105643' WHERE `pacientes`.`cedula` = '092-8439408-4';
UPDATE `pacientes` SET `cedula` = '098-7654321-1',`nombre` = 'Carlos Javier',`apellido` = 'Pascual Polanco',`nacimiento` = '1998-06-05',`tipoSangre` = 'B+',`telefono` = '8092154783' WHERE `pacientes`.`cedula` = '098-7654321-1';
UPDATE `pacientes` SET `cedula` = '201-9373920-3',`nombre` = 'alfredo',`apellido` = 'rubio',`nacimiento` = '1971-01-28',`tipoSangre` = 'B+',`telefono` = '8492154738' WHERE `pacientes`.`cedula` = '201-9373920-3';
UPDATE `pacientes` SET `cedula` = '613-2879648-7',`nombre` = 'Argenis',`apellido` = 'Rubio',`nacimiento` = '1995-09-20',`tipoSangre` = 'A+',`telefono` = '8090789402' WHERE `pacientes`.`cedula` = '613-2879648-7';
UPDATE `pacientes` SET `cedula` = '817-9034793-8',`nombre` = 'Alofoke',`apellido` = 'Music',`nacimiento` = '1994-10-19',`tipoSangre` = 'A+',`telefono` = '8296749128' WHERE `pacientes`.`cedula` = '817-9034793-8';
UPDATE `pacientes` SET `cedula` = '820-9348320-9',`nombre` = 'Pedro',`apellido` = 'Martinez',`nacimiento` = '1999-04-02',`tipoSangre` = 'A+',`telefono` = '8098623612' WHERE `pacientes`.`cedula` = '820-9348320-9';
UPDATE `pacientes` SET `cedula` = '892-0139080-1',`nombre` = 'Albert',`apellido` = 'Pujols',`nacimiento` = '2014-05-02',`tipoSangre` = 'A+',`telefono` = '8499132783' WHERE `pacientes`.`cedula` = '892-0139080-1';
UPDATE `pacientes` SET `cedula` = '894-2098340-5',`nombre` = 'Daniel',`apellido` = 'Debrand',`nacimiento` = '1995-07-19',`tipoSangre` = 'A+',`telefono` = '8091967391' WHERE `pacientes`.`cedula` = '894-2098340-5';
UPDATE `pacientes` SET `cedula` = '897-4329474-2',`nombre` = 'Juan',`apellido` = 'Rosario',`nacimiento` = '1991-03-02',`tipoSangre` = 'A+',`telefono` = '8297138712' WHERE `pacientes`.`cedula` = '897-4329474-2';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precioconsultas`
--

CREATE TABLE `precioconsultas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precioconsultas`
--

UPDATE `precioconsultas` SET `id` = 1,`tipo` = 'Consulta general',`precio` = 700 WHERE `precioconsultas`.`id` = 1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportesistema`
--

CREATE TABLE `reportesistema` (
  `idReporte` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `evento` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pacienteAfect` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reportesistema`
--

UPDATE `reportesistema` SET `idReporte` = 1,`fecha_hora` = '2020-07-29 23:25:13',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 1 AND `reportesistema`.`fecha_hora` = '2020-07-29 23:25:13' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 2,`fecha_hora` = '2020-07-30 00:10:05',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 2 AND `reportesistema`.`fecha_hora` = '2020-07-30 00:10:05' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 3,`fecha_hora` = '2020-07-30 13:45:18',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 3 AND `reportesistema`.`fecha_hora` = '2020-07-30 13:45:18' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 4,`fecha_hora` = '2020-07-30 22:51:26',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 4 AND `reportesistema`.`fecha_hora` = '2020-07-30 22:51:26' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 5,`fecha_hora` = '2020-08-01 21:57:17',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 5 AND `reportesistema`.`fecha_hora` = '2020-08-01 21:57:17' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 6,`fecha_hora` = '2020-08-02 20:24:12',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 6 AND `reportesistema`.`fecha_hora` = '2020-08-02 20:24:12' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 7,`fecha_hora` = '2020-08-05 11:23:33',`evento` = 8,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 7 AND `reportesistema`.`fecha_hora` = '2020-08-05 11:23:33' AND `reportesistema`.`evento` = 8 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 8,`fecha_hora` = '2020-08-05 11:48:00',`evento` = 1,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 8 AND `reportesistema`.`fecha_hora` = '2020-08-05 11:48:00' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 9,`fecha_hora` = '2020-08-05 12:12:49',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 9 AND `reportesistema`.`fecha_hora` = '2020-08-05 12:12:49' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 10,`fecha_hora` = '2020-08-05 12:26:17',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 10 AND `reportesistema`.`fecha_hora` = '2020-08-05 12:26:17' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 11,`fecha_hora` = '2020-08-05 12:47:14',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 11 AND `reportesistema`.`fecha_hora` = '2020-08-05 12:47:14' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 12,`fecha_hora` = '2020-08-05 12:47:45',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 12 AND `reportesistema`.`fecha_hora` = '2020-08-05 12:47:45' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 13,`fecha_hora` = '2020-08-05 12:55:34',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 13 AND `reportesistema`.`fecha_hora` = '2020-08-05 12:55:34' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 14,`fecha_hora` = '2020-08-05 12:58:14',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 14 AND `reportesistema`.`fecha_hora` = '2020-08-05 12:58:14' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 15,`fecha_hora` = '2020-08-05 13:03:59',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 15 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:03:59' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 16,`fecha_hora` = '2020-08-05 13:06:03',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 16 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:06:03' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 17,`fecha_hora` = '2020-08-05 13:17:54',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 17 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:17:54' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 18,`fecha_hora` = '2020-08-05 13:18:31',`evento` = 2,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 18 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:18:31' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 19,`fecha_hora` = '2020-08-05 13:26:35',`evento` = 1,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 19 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:26:35' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 20,`fecha_hora` = '2020-08-05 13:40:09',`evento` = 2,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 20 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:40:09' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 21,`fecha_hora` = '2020-08-05 13:40:15',`evento` = 1,`usuario` = 40,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 21 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:40:15' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 40 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 22,`fecha_hora` = '2020-08-05 13:40:43',`evento` = 2,`usuario` = 40,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 22 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:40:43' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 40 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 23,`fecha_hora` = '2020-08-05 13:41:11',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 23 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:41:11' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 24,`fecha_hora` = '2020-08-05 13:41:32',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 24 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:41:32' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 25,`fecha_hora` = '2020-08-05 13:43:32',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 25 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:43:32' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 26,`fecha_hora` = '2020-08-05 13:43:42',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 26 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:43:42' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 27,`fecha_hora` = '2020-08-05 13:44:37',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 27 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:44:37' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 28,`fecha_hora` = '2020-08-05 13:44:40',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 28 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:44:40' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 29,`fecha_hora` = '2020-08-05 13:45:00',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 29 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:45:00' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 30,`fecha_hora` = '2020-08-05 13:45:16',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 30 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:45:16' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 31,`fecha_hora` = '2020-08-05 13:45:46',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 31 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:45:46' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 32,`fecha_hora` = '2020-08-05 13:45:53',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 32 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:45:53' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 33,`fecha_hora` = '2020-08-05 13:46:36',`evento` = 1,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 33 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:46:36' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 34,`fecha_hora` = '2020-08-05 13:46:39',`evento` = 2,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 34 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:46:39' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 35,`fecha_hora` = '2020-08-05 13:47:02',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 35 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:47:02' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 36,`fecha_hora` = '2020-08-05 13:47:05',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 36 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:47:05' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 37,`fecha_hora` = '2020-08-05 13:47:58',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 37 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:47:58' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 38,`fecha_hora` = '2020-08-05 13:48:04',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 38 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:48:04' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 39,`fecha_hora` = '2020-08-05 13:49:23',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 39 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:49:23' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 40,`fecha_hora` = '2020-08-05 13:49:27',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 40 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:49:27' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 41,`fecha_hora` = '2020-08-05 13:50:32',`evento` = 1,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 41 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:50:32' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 42,`fecha_hora` = '2020-08-05 13:50:36',`evento` = 2,`usuario` = 1,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 42 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:50:36' AND `reportesistema`.`evento` = 2 AND `reportesistema`.`usuario` = 1 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 43,`fecha_hora` = '2020-08-05 13:51:53',`evento` = 1,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 43 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:51:53' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 44,`fecha_hora` = '2020-08-05 13:52:47',`evento` = 9,`usuario` = 27,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 44 AND `reportesistema`.`fecha_hora` = '2020-08-05 13:52:47' AND `reportesistema`.`evento` = 9 AND `reportesistema`.`usuario` = 27 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 1,`fecha_hora` = '2020-07-29 23:25:13',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 1 AND `reportesistema`.`fecha_hora` = '2020-07-29 23:25:13' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 2,`fecha_hora` = '2020-07-30 00:10:05',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 2 AND `reportesistema`.`fecha_hora` = '2020-07-30 00:10:05' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 3,`fecha_hora` = '2020-07-30 13:45:18',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 3 AND `reportesistema`.`fecha_hora` = '2020-07-30 13:45:18' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 4,`fecha_hora` = '2020-07-30 22:51:26',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 4 AND `reportesistema`.`fecha_hora` = '2020-07-30 22:51:26' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 5,`fecha_hora` = '2020-08-01 21:57:17',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 5 AND `reportesistema`.`fecha_hora` = '2020-08-01 21:57:17' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;
UPDATE `reportesistema` SET `idReporte` = 6,`fecha_hora` = '2020-08-02 20:24:12',`evento` = 1,`usuario` = 20,`pacienteAfect` = NULL WHERE `reportesistema`.`idReporte` = 6 AND `reportesistema`.`fecha_hora` = '2020-08-02 20:24:12' AND `reportesistema`.`evento` = 1 AND `reportesistema`.`usuario` = 20 AND `reportesistema`.`pacienteAfect` IS NULL;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

UPDATE `roles` SET `idRol` = 1,`rol` = 'Administrador' WHERE `roles`.`idRol` = 1 AND `roles`.`rol` = 'Administrador';
UPDATE `roles` SET `idRol` = 2,`rol` = 'Asistente' WHERE `roles`.`idRol` = 2 AND `roles`.`rol` = 'Asistente';
UPDATE `roles` SET `idRol` = 3,`rol` = 'Medico' WHERE `roles`.`idRol` = 3 AND `roles`.`rol` = 'Medico';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoeventos`
--

CREATE TABLE `tipoeventos` (
  `idEvento` int(11) NOT NULL,
  `nomEvento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoeventos`
--

UPDATE `tipoeventos` SET `idEvento` = 1,`nomEvento` = 'Iniciar sesión' WHERE `tipoeventos`.`idEvento` = 1 AND `tipoeventos`.`nomEvento` = 'Iniciar sesión';
UPDATE `tipoeventos` SET `idEvento` = 2,`nomEvento` = 'Cerrar sesión' WHERE `tipoeventos`.`idEvento` = 2 AND `tipoeventos`.`nomEvento` = 'Cerrar sesión';
UPDATE `tipoeventos` SET `idEvento` = 3,`nomEvento` = 'Crear usuario' WHERE `tipoeventos`.`idEvento` = 3 AND `tipoeventos`.`nomEvento` = 'Crear usuario';
UPDATE `tipoeventos` SET `idEvento` = 4,`nomEvento` = 'Modificar usuario' WHERE `tipoeventos`.`idEvento` = 4 AND `tipoeventos`.`nomEvento` = 'Modificar usuario';
UPDATE `tipoeventos` SET `idEvento` = 5,`nomEvento` = 'Eliminar usuario' WHERE `tipoeventos`.`idEvento` = 5 AND `tipoeventos`.`nomEvento` = 'Eliminar usuario';
UPDATE `tipoeventos` SET `idEvento` = 6,`nomEvento` = 'Asignar costo de consulta' WHERE `tipoeventos`.`idEvento` = 6 AND `tipoeventos`.`nomEvento` = 'Asignar costo de consulta';
UPDATE `tipoeventos` SET `idEvento` = 7,`nomEvento` = 'Registrar paciente' WHERE `tipoeventos`.`idEvento` = 7 AND `tipoeventos`.`nomEvento` = 'Registrar paciente';
UPDATE `tipoeventos` SET `idEvento` = 8,`nomEvento` = 'Asignar cita' WHERE `tipoeventos`.`idEvento` = 8 AND `tipoeventos`.`nomEvento` = 'Asignar cita';
UPDATE `tipoeventos` SET `idEvento` = 9,`nomEvento` = 'Registrar visita' WHERE `tipoeventos`.`idEvento` = 9 AND `tipoeventos`.`nomEvento` = 'Registrar visita';
UPDATE `tipoeventos` SET `idEvento` = 10,`nomEvento` = 'Imprimir receta' WHERE `tipoeventos`.`idEvento` = 10 AND `tipoeventos`.`nomEvento` = 'Imprimir receta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomUser` varchar(60) DEFAULT NULL,
  `apellidoUser` varchar(60) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

UPDATE `usuarios` SET `idUsuario` = 1,`nomUser` = 'Michael David',`apellidoUser` = 'Mateo Abreu',`user` = 'admin',`pass` = 'Maicol0502',`tipo` = 1,`estado` = 1 WHERE `usuarios`.`idUsuario` = 1 AND `usuarios`.`nomUser` = 'Michael David' AND `usuarios`.`apellidoUser` = 'Mateo Abreu' AND `usuarios`.`user` = 'admin' AND `usuarios`.`pass` = 'Maicol0502' AND `usuarios`.`tipo` = 1 AND `usuarios`.`estado` = 1;
UPDATE `usuarios` SET `idUsuario` = 20,`nomUser` = 'Luis Alfredo',`apellidoUser` = 'Pascual',`user` = 'luisito',`pass` = 'luisito01',`tipo` = 2,`estado` = 1 WHERE `usuarios`.`idUsuario` = 20 AND `usuarios`.`nomUser` = 'Luis Alfredo' AND `usuarios`.`apellidoUser` = 'Pascual' AND `usuarios`.`user` = 'luisito' AND `usuarios`.`pass` = 'luisito01' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 1;
UPDATE `usuarios` SET `idUsuario` = 27,`nomUser` = 'Katherine',`apellidoUser` = 'Soto',`user` = 'katsoto',`pass` = 'katsoto01',`tipo` = 3,`estado` = 1 WHERE `usuarios`.`idUsuario` = 27 AND `usuarios`.`nomUser` = 'Katherine' AND `usuarios`.`apellidoUser` = 'Soto' AND `usuarios`.`user` = 'katsoto' AND `usuarios`.`pass` = 'katsoto01' AND `usuarios`.`tipo` = 3 AND `usuarios`.`estado` = 1;
UPDATE `usuarios` SET `idUsuario` = 29,`nomUser` = 'Roshby R.',`apellidoUser` = 'Hernandez',`user` = 'rosh',`pass` = 'elflowrosh',`tipo` = 2,`estado` = 1 WHERE `usuarios`.`idUsuario` = 29 AND `usuarios`.`nomUser` = 'Roshby R.' AND `usuarios`.`apellidoUser` = 'Hernandez' AND `usuarios`.`user` = 'rosh' AND `usuarios`.`pass` = 'elflowrosh' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 1;
UPDATE `usuarios` SET `idUsuario` = 39,`nomUser` = 'Johan',`apellidoUser` = 'Mateo',`user` = 'johan01',`pass` = '12345',`tipo` = 1,`estado` = 1 WHERE `usuarios`.`idUsuario` = 39 AND `usuarios`.`nomUser` = 'Johan' AND `usuarios`.`apellidoUser` = 'Mateo' AND `usuarios`.`user` = 'johan01' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 1 AND `usuarios`.`estado` = 1;
UPDATE `usuarios` SET `idUsuario` = 40,`nomUser` = 'Ada',`apellidoUser` = 'Ureña',`user` = 'ada123',`pass` = '12345',`tipo` = 3,`estado` = 1 WHERE `usuarios`.`idUsuario` = 40 AND `usuarios`.`nomUser` = 'Ada' AND `usuarios`.`apellidoUser` = 'Ureña' AND `usuarios`.`user` = 'ada123' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 3 AND `usuarios`.`estado` = 1;
UPDATE `usuarios` SET `idUsuario` = 41,`nomUser` = 'Userprueba',`apellidoUser` = 'apellidoUser',`user` = 'user3',`pass` = '12345',`tipo` = 1,`estado` = 2 WHERE `usuarios`.`idUsuario` = 41 AND `usuarios`.`nomUser` = 'Userprueba' AND `usuarios`.`apellidoUser` = 'apellidoUser' AND `usuarios`.`user` = 'user3' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 1 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 42,`nomUser` = 'Johan',`apellidoUser` = 'Mateo',`user` = 'johan01',`pass` = '12345',`tipo` = 1,`estado` = 2 WHERE `usuarios`.`idUsuario` = 42 AND `usuarios`.`nomUser` = 'Johan' AND `usuarios`.`apellidoUser` = 'Mateo' AND `usuarios`.`user` = 'johan01' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 1 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 43,`nomUser` = 'nombre',`apellidoUser` = 'apellido',`user` = 'era37',`pass` = '123456',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 43 AND `usuarios`.`nomUser` = 'nombre' AND `usuarios`.`apellidoUser` = 'apellido' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '123456' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 44,`nomUser` = 'Fulano',`apellidoUser` = 'Detal',`user` = 'era37',`pass` = '12345',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 44 AND `usuarios`.`nomUser` = 'Fulano' AND `usuarios`.`apellidoUser` = 'Detal' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 45,`nomUser` = 'Fulano2',`apellidoUser` = 'fulanoapellido',`user` = 'fulanero',`pass` = '12345',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 45 AND `usuarios`.`nomUser` = 'Fulano2' AND `usuarios`.`apellidoUser` = 'fulanoapellido' AND `usuarios`.`user` = 'fulanero' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 46,`nomUser` = 'Fulano3',`apellidoUser` = 'fulano',`user` = 'era37',`pass` = '12345',`tipo` = 3,`estado` = 2 WHERE `usuarios`.`idUsuario` = 46 AND `usuarios`.`nomUser` = 'Fulano3' AND `usuarios`.`apellidoUser` = 'fulano' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 3 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 47,`nomUser` = 'Fulano4',`apellidoUser` = 'fulano',`user` = 'era37',`pass` = '12345',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 47 AND `usuarios`.`nomUser` = 'Fulano4' AND `usuarios`.`apellidoUser` = 'fulano' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 48,`nomUser` = 'Fulano4',`apellidoUser` = 'fulano',`user` = 'era37',`pass` = '12345',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 48 AND `usuarios`.`nomUser` = 'Fulano4' AND `usuarios`.`apellidoUser` = 'fulano' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 49,`nomUser` = 'Fulano4',`apellidoUser` = 'fulano',`user` = 'era37',`pass` = '12345',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 49 AND `usuarios`.`nomUser` = 'Fulano4' AND `usuarios`.`apellidoUser` = 'fulano' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 50,`nomUser` = 'Fulano4',`apellidoUser` = 'detal',`user` = 'era37',`pass` = '12345',`tipo` = 3,`estado` = 2 WHERE `usuarios`.`idUsuario` = 50 AND `usuarios`.`nomUser` = 'Fulano4' AND `usuarios`.`apellidoUser` = 'detal' AND `usuarios`.`user` = 'era37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 3 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 51,`nomUser` = 'Fulano4',`apellidoUser` = 'detal',`user` = 'era38',`pass` = '12345',`tipo` = 2,`estado` = 2 WHERE `usuarios`.`idUsuario` = 51 AND `usuarios`.`nomUser` = 'Fulano4' AND `usuarios`.`apellidoUser` = 'detal' AND `usuarios`.`user` = 'era38' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 2 AND `usuarios`.`estado` = 2;
UPDATE `usuarios` SET `idUsuario` = 52,`nomUser` = 'Erasmo',`apellidoUser` = 'Mateo',`user` = 'erasmo37',`pass` = '12345',`tipo` = 3,`estado` = 1 WHERE `usuarios`.`idUsuario` = 52 AND `usuarios`.`nomUser` = 'Erasmo' AND `usuarios`.`apellidoUser` = 'Mateo' AND `usuarios`.`user` = 'erasmo37' AND `usuarios`.`pass` = '12345' AND `usuarios`.`tipo` = 3 AND `usuarios`.`estado` = 1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `idVisita` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL COMMENT 'Esta es la fecha en la que se registra la visita.',
  `motivo` varchar(150) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `receta` varchar(150) DEFAULT NULL,
  `fechaVisita` date DEFAULT NULL COMMENT 'Esta es la fecha de la visita proxima.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico` (`medico`),
  ADD KEY `paciente` (`paciente`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `precioconsultas`
--
ALTER TABLE `precioconsultas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
