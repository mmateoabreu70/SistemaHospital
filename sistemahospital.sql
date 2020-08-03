-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2020 a las 05:35:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fechaCita`, `hora`, `duracion`, `medico`, `paciente`, `costo`) VALUES
(7, '2020-08-02', '13:57:00', '1 minutos', 27, '001-1234567-1', 700),
(8, '2020-08-02', '01:59:00', '5 minutos', 40, '031-2489481-2', 700),
(9, '2020-08-02', '01:05:00', '14 minutos', 52, '201-9373920-3', 700),
(10, '2020-08-18', '10:03:00', '7 minutos', 27, '894-2098340-5', 700),
(11, '2020-08-18', '03:05:00', '8 minutos', 52, '892-0139080-1', 700),
(12, '2020-08-18', '16:07:00', '25 minutos', 40, '092-8439408-4', 700),
(13, '2020-06-16', '03:05:00', '10 minutos', 40, '897-4329474-2', 700),
(14, '2020-07-21', '02:07:00', '35 minutos', 52, '894-2098340-5', 700),
(15, '2020-08-02', '03:06:00', '19 minutos', 27, '892-0139080-1', 700),
(16, '2020-06-21', '15:07:00', '12 minutos', 27, '894-2098340-5', 700),
(17, '2020-07-28', '10:08:00', '9 minutos', 52, '032-1638493-0', 700),
(18, '2020-07-21', '02:08:00', '19 minutos', 40, '892-0139080-1', 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`cedula`, `nombre`, `apellido`, `nacimiento`, `tipoSangre`, `telefono`) VALUES
('001-1234567-1', 'Amadis', 'Suarez', '1982-06-15', 'A+', '8299848389'),
('031-2489481-2', 'Jose', 'Reyes', '1990-12-04', 'B+', '8096832429'),
('032-1638493-0', 'Roshby', 'Pajaro', '2000-11-21', 'A+', '8492065473'),
('084-2935842-3', 'Estefani', 'Mesa', '1972-08-20', 'B+', '8498907852'),
('092-8439408-4', 'Cesar Javier', 'Martinez Garrido', '1985-02-18', 'B+', '8092105643'),
('098-7654321-1', 'Carlos Javier', 'Pascual Polanco', '1998-06-05', 'B+', '8092154783'),
('201-9373920-3', 'alfredo', 'rubio', '1971-01-28', 'B+', '8492154738'),
('613-2879648-7', 'Argenis', 'Rubio', '1995-09-20', 'A+', '8090789402'),
('817-9034793-8', 'Alofoke', 'Music', '1994-10-19', 'A+', '8296749128'),
('820-9348320-9', 'Pedro', 'Martinez', '1999-04-02', 'A+', '8098623612'),
('892-0139080-1', 'Albert', 'Pujols', '2014-05-02', 'A+', '8499132783'),
('894-2098340-5', 'Daniel', 'Debrand', '1995-07-19', 'A+', '8091967391'),
('897-4329474-2', 'Juan', 'Rosario', '1991-03-02', 'A+', '8297138712');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precioconsultas`
--

CREATE TABLE `precioconsultas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precioconsultas`
--

INSERT INTO `precioconsultas` (`id`, `tipo`, `precio`) VALUES
(1, 'Consulta general', 700);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportesistema`
--

INSERT INTO `reportesistema` (`idReporte`, `fecha_hora`, `evento`, `usuario`, `pacienteAfect`) VALUES
(1, '2020-07-29 23:25:13', 1, 20, NULL),
(2, '2020-07-30 00:10:05', 1, 20, NULL),
(3, '2020-07-30 13:45:18', 1, 20, NULL),
(4, '2020-07-30 22:51:26', 1, 20, NULL),
(5, '2020-08-01 21:57:17', 1, 20, NULL),
(6, '2020-08-02 20:24:12', 1, 20, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Asistente'),
(3, 'Medico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoeventos`
--

CREATE TABLE `tipoeventos` (
  `idEvento` int(11) NOT NULL,
  `nomEvento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoeventos`
--

INSERT INTO `tipoeventos` (`idEvento`, `nomEvento`) VALUES
(1, 'Iniciar sesión'),
(2, 'Cerrar sesión'),
(3, 'Crear usuario'),
(4, 'Modificar usuario'),
(5, 'Eliminar usuario'),
(6, 'Asignar costo de consulta'),
(7, 'Registrar paciente'),
(8, 'Asignar cita'),
(9, 'Registrar visita');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomUser`, `apellidoUser`, `user`, `pass`, `tipo`, `estado`) VALUES
(1, 'Michael David', 'Mateo Abreu', 'admin', 'Maicol0502', 1, 1),
(20, 'Luis Alfredo', 'Pascual', 'luisito', 'luisito01', 2, 1),
(27, 'Katherine', 'Soto', 'katsoto', 'katsoto01', 3, 1),
(29, 'Roshby R.', 'Hernandez', 'rosh', 'elflowrosh', 2, 1),
(39, 'Johan', 'Mateo', 'johan01', '12345', 1, 1),
(40, 'Ada', 'Ureña', 'ada123', '12345', 3, 1),
(41, 'Userprueba', 'apellidoUser', 'user3', '12345', 1, 2),
(42, 'Johan', 'Mateo', 'johan01', '12345', 1, 2),
(43, 'nombre', 'apellido', 'era37', '123456', 2, 2),
(44, 'Fulano', 'Detal', 'era37', '12345', 2, 2),
(45, 'Fulano2', 'fulanoapellido', 'fulanero', '12345', 2, 2),
(46, 'Fulano3', 'fulano', 'era37', '12345', 3, 2),
(47, 'Fulano4', 'fulano', 'era37', '12345', 2, 2),
(48, 'Fulano4', 'fulano', 'era37', '12345', 2, 2),
(49, 'Fulano4', 'fulano', 'era37', '12345', 2, 2),
(50, 'Fulano4', 'detal', 'era37', '12345', 3, 2),
(51, 'Fulano4', 'detal', 'era38', '12345', 2, 2),
(52, 'Erasmo', 'Mateo', 'erasmo37', '12345', 3, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `precioconsultas`
--
ALTER TABLE `precioconsultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportesistema`
--
ALTER TABLE `reportesistema`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `evento` (`evento`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `pacienteAfect` (`pacienteAfect`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tipoeventos`
--
ALTER TABLE `tipoeventos`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `visitas`
--

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reportesistema`
--
ALTER TABLE `reportesistema`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`medico`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`cedula`);

--
-- Filtros para la tabla `reportesistema`
--
ALTER TABLE `reportesistema`
  ADD CONSTRAINT `reportesistema_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `tipoeventos` (`idEvento`),
  ADD CONSTRAINT `reportesistema_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `reportesistema_ibfk_3` FOREIGN KEY (`pacienteAfect`) REFERENCES `pacientes` (`cedula`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `roles` (`idRol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `visitas`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
