-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 21:26:17
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios_riscos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `NombreProducto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Peso` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `UnidadMasa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Calorias` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `NombreProducto`, `Peso`, `UnidadMasa`, `Calorias`) VALUES
(21, 'Manzana', '15', 'gramo', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `IdRegistro` int(11) NOT NULL,
  `IdUsuario` int(20) NOT NULL,
  `IdRisco` int(20) NOT NULL,
  `IdProducto` int(20) NOT NULL,
  `Peso` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(20) NOT NULL,
  `UnidadMasa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `MinCalorias` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`IdRegistro`, `IdUsuario`, `IdRisco`, `IdProducto`, `Peso`, `Cantidad`, `UnidadMasa`, `MinCalorias`) VALUES
(217, 22, 25, 21, '15', 1, 'gramo', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riscos`
--

CREATE TABLE `riscos` (
  `IdRiscos` int(11) NOT NULL,
  `NombreRisco` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `PesoMaximo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `UnidadMasa` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `MinCalorias` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `riscos`
--

INSERT INTO `riscos` (`IdRiscos`, `NombreRisco`, `PesoMaximo`, `UnidadMasa`, `MinCalorias`) VALUES
(25, 'Risco 1 172 metros', '20', 'gramo', 60),
(26, 'Risco 2  230 metros ', '30', 'gramo', 90),
(27, 'Risco 3  320 metros', '10', 'gramo', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `CedulaUsuario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NombreUsuario`, `CedulaUsuario`) VALUES
(22, 'Melisa Rios ', '1007306573');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`IdRegistro`),
  ADD KEY `NombreUsuario` (`IdUsuario`,`IdRisco`,`IdProducto`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdRisco` (`IdRisco`);

--
-- Indices de la tabla `riscos`
--
ALTER TABLE `riscos`
  ADD PRIMARY KEY (`IdRiscos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `IdRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT de la tabla `riscos`
--
ALTER TABLE `riscos`
  MODIFY `IdRiscos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`IdRisco`) REFERENCES `riscos` (`IdRiscos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
