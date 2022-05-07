-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2022 a las 03:13:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idMascota` int(11) NOT NULL,
  `nombreMascota` varchar(40) NOT NULL,
  `tipoMascota` int(11) NOT NULL,
  `edadMascota` int(11) NOT NULL,
  `enfermedadesMascota` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idMascota`, `nombreMascota`, `tipoMascota`, `edadMascota`, `enfermedadesMascota`, `created_at`, `updated_at`) VALUES
(1, 'Laly', 1, 3, 'Ninguna', '2022-05-06 10:05:49', '2022-05-06 10:05:49'),
(2, 'Pelusa', 2, 4, 'Moquillo', '2022-05-07 03:09:08', '2022-05-07 03:10:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomascota`
--

CREATE TABLE `tipomascota` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomascota`
--

INSERT INTO `tipomascota` (`idTipo`, `nombreTipo`) VALUES
(1, 'Perro'),
(2, 'Gato');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idMascota`);

--
-- Indices de la tabla `tipomascota`
--
ALTER TABLE `tipomascota`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipomascota`
--
ALTER TABLE `tipomascota`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
