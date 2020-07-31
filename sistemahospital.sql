-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-07-2020 a las 03:03:46
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `duracion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('001-0605441-4', 'Amadis ', 'Suarez', '1999-04-12', 'A+', '.8092390104');

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
(1, '2020-07-27 22:50:06', 4, 1, NULL),
(2, '2020-07-27 22:57:22', 4, 1, NULL);

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
  `evento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoeventos`
--

INSERT INTO `tipoeventos` (`idEvento`, `evento`) VALUES
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
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `pass`, `tipo`, `estado`) VALUES
(1, 'Michael David', 'Mateo Abreu', 'admin', 'Maicol0502', 1, 1),
(20, 'Luis Alfredo', 'Pascual', 'luisito', 'luisito01', 2, 1),
(27, 'Katherine', 'Soto', 'katsoto', 'katsoto01', 3, 1),
(29, 'Roshby R.', 'Hernandez', 'rosh', 'elflowrosh', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `idVisita` int(11) NOT NULL,
  `fecha` date NOT NULL COMMENT 'Esta es la fecha en la que se registra la visita.',
  `motivo` varchar(150) NOT NULL,
  `comentario` text NOT NULL,
  `receta` varchar(150) NOT NULL,
  `fechaVisita` date NOT NULL COMMENT 'Esta es la fecha de la visita proxima.',
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

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
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`idVisita`),
  ADD KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reportesistema`
--
ALTER TABLE `reportesistema`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

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
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `pacientes` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
