-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 18:33:41
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--
CREATE DATABASE IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id_cliente` int(8) NOT NULL,
  `productos` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `precio_total` int(8) NOT NULL,
  `id_producto` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1500) NOT NULL,
  `stock` varchar(1) NOT NULL,
  `precio` int(30) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `imagen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `stock`, `precio`, `fecha_creacion`, `fecha_modificacion`, `imagen`) VALUES
(1, 'Espada Nichirin color rojo carmesí', 'Espada de alta calidad, diseñada y creada por los mejores artesanos japoneses. Las hojas de las katanas se fabrican mediante un proceso riguroso y cuidadoso que involucra la forja, el templado y el pulido, y requiere de una gran habilidad y experiencia.', 'y', 70, '2023-11-03', '2023-11-03', 'algo'),
(2, 'Katana Enma ', 'La katana enma de Zoro es una réplica exacta de la espada que el personaje Zoro usa en el famoso anime One Piece. Es una pieza genuina para coleccionistas y admiradores del anime en general. Pero también es una katana funcional, con una hoja de acero de carbono que ha sido afilada para su uso en la práctica de artes marciales y otros deportes similares.\r\nEl acero de carbono es un material popular en la fabricación de espadas debido a su durabilidad y resistencia. Además, la hoja de la katana enma está forjada en una forma tradicional utilizando un proceso de templado y revenido para garantizar la resistencia y flexibilidad adecuadas.', 'y', 110, '2023-11-03', '2023-11-10', 'algo'),
(3, 'LLave Espada', 'La Llave Espada es una misteriosa arma y uno de los elementos más importantes de la saga Kingdom Hearts, siendo portada por la mayoría de sus protagonistas. La Llave Espada es una parte principal en la batalla entre la Luz y la Oscuridad.', 'y', 80, '2023-11-17', '2023-11-17', 'algo'),
(4, 'Espada Madera', 'Clásica espada realizada artesanalmente, forjada de un único tronco de madera. Su proceso de fabricación requirió de 2 trozos de madera y un único palo. ', 'y', 10, '2023-11-17', '2023-11-17', 'algo'),
(5, 'Espada Maestra', 'La Espada Maestra es una espada larga de doble filo y una empuñadura de color púrpura o azul', 'y', 85, '2023-11-17', '2023-11-17', 'algo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `Id` int(8) NOT NULL,
  `Usuario` varchar(200) NOT NULL,
  `Contraseña` varchar(200) NOT NULL,
  `Admin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Contraseña`, `Admin`) VALUES
(1, 'admin', 'admin', 'Si'),
(2, 'Pablo', '123', 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
