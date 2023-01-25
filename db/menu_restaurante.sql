-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2022 a las 01:44:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `menu_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `comida` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(20) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `comida`, `nombre`, `precio`, `imagen`) VALUES
(1, 'Pizza', 'Napolitana', 2500, 'assets/img/1670478176pizza-4-estaciones.png'),

(3, 'Pizza', 'Fugazza', 1900, 'assets/img/1670478203alexandra-gorn-52jG7-FN22Y-unsplash.jpg'),
(4, 'Pizza', 'Chicago Style', 3000, 'assets/img/1670478216david-nuescheler-gUBJ9vSlky0-unsplash.jpg'),
(5, 'Hamburguesa', 'Clasica de Queso y Bacon', 1100, 'assets/img/1670478232amirali-mirhashemian-jh5XyK4Rr3Y-unsplash.jpg'),
(6, 'Hamburguesa', 'Vegetariana', 1500, 'assets/img/1670478237amirali-mirhashemian-88YAXjnpvrM-unsplash.jpg'),
(7, 'Hamburguesa', 'Pollo Frito', 1500, 'assets/img/1670478244amirali-mirhashemian-sc5sTPMrVfk-unsplash.jpg'),
(8, 'Hamburguesa', 'BBQ', 1600, 'assets/img/1670478249amirali-mirhashemian-UH-fIND9svQ-unsplash.jpg'),
(10, 'Hamburguesa', 'Pollo con Hongos', 1300, 'assets/img/1670478281food-photographer-E94j3rMcxlw-unsplash.jpg'),
(11, 'Hot-Dog', 'Chili', 800, 'assets/img/1670478287mateusz-feliksik-w96PYF0Uwjs-unsplash.jpg'),
(12, 'Hot-Dog', 'Hawaiano', 900, 'assets/img/1670478292mr_wdh-PPwYBaC_g8M-unsplash.jpg'),


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
