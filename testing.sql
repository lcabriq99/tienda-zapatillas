-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2021 a las 20:54:38
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(32, 'Zapatilla Nike Space', '32.jpg', 320.00),
(29, 'Zapatilla Casual', '30.jpg', 20.00),
(31, 'Zapatilla Gucci', '31.jpg', 150.00),
(33, 'Zapatilla Nike Basica', '33.jpg', 20.00),
(34, 'Zapatilla Nike Retro', '34.jpg', 80.00),
(35, 'Zapatilla Jordan AirBus', '35.jpg', 650.00),
(36, 'Zapatilla Adidas Basica', '36.jpg', 30.00),
(37, 'Zapatilla Nike Yellow-Submarine', '37.jpg', 55.00),
(38, 'Zapatilla Gucci Red', '38.jpg', 150.00),
(39, 'Zapatilla Nike Rainbow', '39.jpg', 50.00),
(40, 'Zapatilla Nike Sport', '40.jpg', 70.00),
(41, 'Zapatilla Nike Casual', '41.jpg', 60.00),
(42, 'Zapatillas de Piel', '42.jpg', 180.00),
(43, 'Zapatilla Black Classic', '43.jpg', 35.00),
(44, 'Zapatilla Nike Pink', '44.jpg', 40.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
