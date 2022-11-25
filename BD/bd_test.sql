-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 22:51:35
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_transportes`
--

CREATE TABLE `cat_transportes` (
  `id` int(11) NOT NULL,
  `sMarca` varchar(40) NOT NULL,
  `nModelo` int(4) NOT NULL,
  `sPlacas` varchar(10) NOT NULL,
  `sAlias` varchar(50) NOT NULL,
  `dFechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `dFechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_transportes`
--

INSERT INTO `cat_transportes` (`id`, `sMarca`, `nModelo`, `sPlacas`, `sAlias`, `dFechaCreacion`, `dFechaModificacion`, `bStatus`) VALUES
(1, 'FORD', 2020, 'XAH-098-N', 'FORD 2020', '2022-11-25 19:18:20', '2022-11-25 19:18:20', 1),
(2, 'Nissan versa', 2021, '345NL71', 'Versa 2021', '2022-11-25 21:45:58', '2022-11-25 21:51:01', 1),
(3, 'Kia', 2019, '23456', 'Forte', '2022-11-25 21:51:18', '2022-11-25 21:51:18', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_transportes`
--
ALTER TABLE `cat_transportes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_transportes`
--
ALTER TABLE `cat_transportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
