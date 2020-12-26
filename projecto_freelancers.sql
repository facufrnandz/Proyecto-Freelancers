-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 02:26:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecto_freelancers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratados`
--

CREATE TABLE `contratados` (
  `id_contratado` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contratados`
--

INSERT INTO `contratados` (`id_contratado`, `id_usuario`, `id_empleado`) VALUES
(12, 10, 10),
(13, 10, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadores`
--

CREATE TABLE `empleadores` (
  `id_empleador` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleadores`
--

INSERT INTO `empleadores` (`id_empleador`, `nombre`, `apellido`, `email`, `tel`, `id_usuario`) VALUES
(5, 'Facundo', 'Fernandez', 'facufrnandz@gmail.com', 1169020433, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fechanac` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` bigint(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido`, `fechanac`, `email`, `tel`, `id_usuario`) VALUES
(9, 'Emiliano', 'Montes', '1997-05-14', 'emilianomontes@gmail.com', 1125363366, 12),
(10, 'Anibal', 'Pachano', '1975-06-18', 'anibalpachanito@gmail.com', 1166666666, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadoside`
--

CREATE TABLE `empleadoside` (
  `id_emp-ide` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `id_ide` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleadoside`
--

INSERT INTO `empleadoside` (`id_emp-ide`, `id_empleado`, `id_ide`) VALUES
(6, 9, 1),
(7, 10, 1),
(8, 10, 2),
(9, 10, 3),
(10, 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadosleng`
--

CREATE TABLE `empleadosleng` (
  `id_emp-leng` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `id_lenguaje` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleadosleng`
--

INSERT INTO `empleadosleng` (`id_emp-leng`, `id_empleado`, `id_lenguaje`) VALUES
(14, 9, 1),
(15, 9, 5),
(16, 10, 1),
(17, 10, 2),
(18, 10, 3),
(19, 10, 4),
(20, 10, 5),
(21, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `id_experiencia` int(10) UNSIGNED NOT NULL,
  `id_empleado` int(10) UNSIGNED NOT NULL,
  `fechadesde` date NOT NULL,
  `fechahasta` date NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`id_experiencia`, `id_empleado`, `fechadesde`, `fechahasta`, `descripcion`) VALUES
(27, 9, '2019-02-27', '2020-12-02', 'Programador FullStack - IBM'),
(28, 10, '1984-01-04', '2020-12-02', 'El rey de la programacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ides`
--

CREATE TABLE `ides` (
  `id_ide` int(10) UNSIGNED NOT NULL,
  `nombreide` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ides`
--

INSERT INTO `ides` (`id_ide`, `nombreide`) VALUES
(1, 'Visual Studio'),
(2, 'Netbeans'),
(3, 'Sublime Text'),
(4, 'Eclipse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguajes`
--

CREATE TABLE `lenguajes` (
  `id_lenguaje` int(10) UNSIGNED NOT NULL,
  `nombreleng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lenguajes`
--

INSERT INTO `lenguajes` (`id_lenguaje`, `nombreleng`) VALUES
(1, 'Javascript'),
(2, 'Java'),
(3, 'C#'),
(4, 'C++'),
(5, 'PHP'),
(6, 'Phyton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`id_tipo`, `descripcion`) VALUES
(1, 'Empleador'),
(2, 'Freelancer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_tipo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`, `id_tipo`) VALUES
(10, 'facundofernandez', '18b634418fefd41238e4cdba7e278fbb3ff4a494', 1),
(12, 'emilianomontes', 'f0a7c9c7d234b0576933f20c66da8d3ef13ff409', 2),
(13, 'anibalpachano', '58e38a897beeb4ec9979defb2245e58f00d94feb', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contratados`
--
ALTER TABLE `contratados`
  ADD PRIMARY KEY (`id_contratado`);

--
-- Indices de la tabla `empleadores`
--
ALTER TABLE `empleadores`
  ADD PRIMARY KEY (`id_empleador`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `empleadoside`
--
ALTER TABLE `empleadoside`
  ADD PRIMARY KEY (`id_emp-ide`);

--
-- Indices de la tabla `empleadosleng`
--
ALTER TABLE `empleadosleng`
  ADD PRIMARY KEY (`id_emp-leng`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id_experiencia`);

--
-- Indices de la tabla `ides`
--
ALTER TABLE `ides`
  ADD PRIMARY KEY (`id_ide`);

--
-- Indices de la tabla `lenguajes`
--
ALTER TABLE `lenguajes`
  ADD PRIMARY KEY (`id_lenguaje`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contratados`
--
ALTER TABLE `contratados`
  MODIFY `id_contratado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `empleadores`
--
ALTER TABLE `empleadores`
  MODIFY `id_empleador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleadoside`
--
ALTER TABLE `empleadoside`
  MODIFY `id_emp-ide` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleadosleng`
--
ALTER TABLE `empleadosleng`
  MODIFY `id_emp-leng` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id_experiencia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ides`
--
ALTER TABLE `ides`
  MODIFY `id_ide` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lenguajes`
--
ALTER TABLE `lenguajes`
  MODIFY `id_lenguaje` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `id_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
