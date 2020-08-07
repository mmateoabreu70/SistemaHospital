-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 07-08-2020 a las 05:20:08
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
  `medico` int(11) NULL,
  `paciente` varchar(13) NULL,
  `costo` double NOT NULL
);

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fechaCita`, `hora`, `duracion`, `medico`, `paciente`, `costo`) VALUES
(10, '2020-08-18', '10:03:00', '7 minutos', 27, '894-2098340-5', 700),
(11, '2020-08-18', '03:05:00', '8 minutos', 52, '892-0139080-1', 700),
(19, '2020-08-08', '22:00:00', '30 minutos', 27, '001-1234567-1', 700),
(20, '2020-08-08', '12:00:00', '30 minutos', 27, '897-4329474-2', 700),
(21, '2020-10-23', '15:30:00', '30 minutos', 40, '201-9373920-3', 700),
(22, '2020-09-24', '09:30:00', '30 minutos', 52, '098-7654321-1', 700),
(23, '2020-08-21', '16:30:00', '30 minutos', 52, '892-0139080-1', 700),
(24, '2020-08-21', '16:30:00', '30 minutos', 52, '892-0139080-1', 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
); 

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
);

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(17, 'Narutitis', 'Ver mucho naruto ', 'http://localhost/sistemahospital/descripcion_evento.php?id=17', 'event-info', '1603434600000', '1603434600000', '23/10/2020 3:30', '23/10/2020 3:30'),
(19, 'Radiografia para la nalga', 'Se partio las nalgas ', 'http://localhost/sistemahospital/descripcion_evento.php?id=19', 'event-success', '1600950600000', '1600950600000', '24/09/2020 9:30', '24/09/2020 9:30'),
(21, 'Dolores de cabeza y nariz', 'Intento hacer el auto examen del covid-19 y salio mal ', 'http://localhost/sistemahospital/descripcion_evento.php?id=21', 'event-info', '1597759200000', '1597759200000', '18/08/2020 10:00', '18/08/2020 10:00'),
(22, 'Dolores nalgales', 'Intento darse placer por lugares no debidos', 'http://localhost/sistemahospital/descripcion_evento.php?id=22', 'event-info', '1596938400000', '1596938400000', '08/08/2020 22:00', '08/08/2020 22:00'),
(23, 'Viene a solicitar la pasantia medica', 'Necesita la pansantia por motivos universitarios', 'http://localhost/sistemahospital/descripcion_evento.php?id=23', 'event-warning', '1596902400000', '1596902400000', '08/08/2020 12:00', '08/08/2020 12:00'),
(24, 'Nuevo Doctor', 'Entrevista al Doctor Armado Paredes', 'http://localhost/sistemahospital/descripcion_evento.php?id=24', 'event-important', '1597734300000', '1597734300000', '18/08/2020 3:05', '18/08/2020 3:05'),
(25, 'cumpleaños', 'Me gusta los carritos', 'http://localhost/sistemahospital/descripcion_evento.php?id=25', 'event-info', '1612522800000', '1612522800000', '05/02/2021 8:00', '05/02/2021 8:00');

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
);

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
);

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
  `pacienteAfect` varchar(13) NULL
); 

--
-- Volcado de datos para la tabla `reportesistema`
--

INSERT INTO `reportesistema` (`idReporte`, `fecha_hora`, `evento`, `usuario`, `pacienteAfect`) VALUES
(1, '2020-07-29 23:25:13', 1, 20, NULL),
(2, '2020-07-30 00:10:05', 1, 20, NULL),
(3, '2020-07-30 13:45:18', 1, 20, NULL),
(4, '2020-07-30 22:51:26', 1, 20, NULL),
(5, '2020-08-01 21:57:17', 1, 20, NULL),
(6, '2020-08-02 20:24:12', 1, 20, NULL),
(7, '2020-08-05 11:23:33', 8, 20, NULL),
(8, '2020-08-05 11:48:00', 1, 27, NULL),
(9, '2020-08-05 12:12:49', 9, 27, NULL),
(10, '2020-08-05 12:26:17', 9, 27, NULL),
(11, '2020-08-05 12:47:14', 9, 27, NULL),
(12, '2020-08-05 12:47:45', 9, 27, NULL),
(13, '2020-08-05 12:55:34', 9, 27, NULL),
(14, '2020-08-05 12:58:14', 9, 27, NULL),
(15, '2020-08-05 13:03:59', 9, 27, NULL),
(16, '2020-08-05 13:06:03', 9, 27, NULL),
(17, '2020-08-05 13:17:54', 9, 27, NULL),
(18, '2020-08-05 13:18:31', 2, 27, NULL),
(19, '2020-08-05 13:26:35', 1, 27, NULL),
(20, '2020-08-05 13:40:09', 2, 27, NULL),
(21, '2020-08-05 13:40:15', 1, 40, NULL),
(22, '2020-08-05 13:40:43', 2, 40, NULL),
(23, '2020-08-05 13:41:11', 1, 1, NULL),
(24, '2020-08-05 13:41:32', 2, 1, NULL),
(25, '2020-08-05 13:43:32', 1, 1, NULL),
(26, '2020-08-05 13:43:42', 2, 1, NULL),
(27, '2020-08-05 13:44:37', 1, 1, NULL),
(28, '2020-08-05 13:44:40', 2, 1, NULL),
(29, '2020-08-05 13:45:00', 1, 1, NULL),
(30, '2020-08-05 13:45:16', 2, 1, NULL),
(31, '2020-08-05 13:45:46', 1, 1, NULL),
(32, '2020-08-05 13:45:53', 2, 1, NULL),
(33, '2020-08-05 13:46:36', 1, 27, NULL),
(34, '2020-08-05 13:46:39', 2, 27, NULL),
(35, '2020-08-05 13:47:02', 1, 1, NULL),
(36, '2020-08-05 13:47:05', 2, 1, NULL),
(37, '2020-08-05 13:47:58', 1, 1, NULL),
(38, '2020-08-05 13:48:04', 2, 1, NULL),
(39, '2020-08-05 13:49:23', 1, 1, NULL),
(40, '2020-08-05 13:49:27', 2, 1, NULL),
(41, '2020-08-05 13:50:32', 1, 1, NULL),
(42, '2020-08-05 13:50:36', 2, 1, NULL),
(43, '2020-08-05 13:51:53', 1, 27, NULL),
(44, '2020-08-05 13:52:47', 9, 27, NULL);

--
-- Volcado de datos para la tabla `reportesistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(15) DEFAULT NULL
);

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
);

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
(9, 'Registrar visita'),
(10, 'Imprimir receta');

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
);

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
  `comentario` text,
  `receta` varchar(150) DEFAULT NULL,
  `fechaVisita` date DEFAULT NULL COMMENT 'Esta es la fecha de la visita proxima.'
); 

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
  ADD PRIMARY KEY (`idVisita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
