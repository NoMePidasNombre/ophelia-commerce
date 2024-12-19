-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-08-2022 a las 16:05:17
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
-- Base de datos: `db_ophelia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtros`
--

CREATE TABLE `filtros` (
  `id_filtro` int(10) NOT NULL,
  `nom_filtro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `filtros`
--

INSERT INTO `filtros` (`id_filtro`, `nom_filtro`) VALUES
(1, 'Ninguno'),
(2, 'Destacados'),
(3, 'En Oferta'),
(4, 'Liquidacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_msg` int(4) NOT NULL,
  `nombre_msg` varchar(25) NOT NULL,
  `asunto_msg` varchar(30) NOT NULL,
  `email_msg` varchar(30) NOT NULL,
  `mensaje_msg` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_msg`, `nombre_msg`, `asunto_msg`, `email_msg`, `mensaje_msg`) VALUES
(2, 'Tomi D', 'Prueba', 'tomi_duarte@hotmail.com', 'Probando probando'),
(3, 'Tomi D', 'Prueba', 'gregoryhunk1996@hotmail.com', 'sdafasf'),
(4, 'Alicia', 'Pruebaasf', 'perezalicia_7@hotmail.com', 'asasfasfasdf'),
(5, 'Tomás Ariel', 'asdasdafa', 'toms_games@outlook.com', 'asfasgasg'),
(6, 'Santiago Retamozo', 'Hola uwu', 'santi123@hotmail.com', 'TREMENDA PAG!!!!!!!!!! '),
(7, 'TOMAS ASD', 'ASDASDASDA', 'ASDASD', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(8, 'Adriana', 'Duda', 'aibrugnoli@gmail.com', '¿Cómo hacemos efectivo el pago y la entrega de los productos?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(4) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `precio_prod` varchar(100) NOT NULL,
  `detalle_prod` varchar(500) NOT NULL,
  `ruta_img` varchar(300) NOT NULL,
  `id_filtro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nombre_prod`, `precio_prod`, `detalle_prod`, `ruta_img`, `id_filtro`) VALUES
(1, 'Anillo Diamante', '16.99$', 'Esto es un anillo', '2', 0),
(2, 'Anillo Plata', '16.99$', 'Esto es un anillo de prueba', '4', 4),
(3, 'Collar Perlado', '7.00$', 'Esto es un collar perlado.', '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `contra_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contra_usuario`, `email_usuario`) VALUES
(1, 'admin', 'admin', ''),
(2, 'Tomas', '1234', ''),
(3, 'ELPAPU', 'asd', 'ELPAPU@GMAIL.COM'),
(7, 'Retamozo Santiago', '1234', 'docentedemg@gmail.com'),
(8, 'wilmake', 'ELCAPO12', 'MATIASELIMA@HOTMAIL.COM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `filtros`
--
ALTER TABLE `filtros`
  ADD PRIMARY KEY (`id_filtro`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `filtros`
--
ALTER TABLE `filtros`
  MODIFY `id_filtro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_msg` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
