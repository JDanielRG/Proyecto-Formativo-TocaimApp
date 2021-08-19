-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2021 a las 21:22:12
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tocaimapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentario` int(11) NOT NULL,
  `registrarcomentario` varchar(40) NOT NULL,
  `usuEmail` varchar(50) NOT NULL,
  `usuPassword` varchar(90) NOT NULL,
  `intentos` int(1) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentario`, `registrarcomentario`, `usuEmail`, `usuPassword`, `intentos`, `rol`) VALUES
(0, 'Hola como estas', '', '', 0, 0),
(0, 'Hola como estas2', '', '', 0, 0),
(0, '34154', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `nombres` varchar(16) NOT NULL,
  `apellidos` varchar(16) DEFAULT NULL,
  `documento de identidad` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapa`
--

CREATE TABLE `mapa` (
  `idsitio turistico` int(11) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `sitios turisticos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrs`
--

CREATE TABLE `pqrs` (
  `idPqrs` int(11) NOT NULL,
  `comPqrs` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pqrs`
--

INSERT INTO `pqrs` (`idPqrs`, `comPqrs`) VALUES
(25, 'Joniel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitiosturisticos`
--

CREATE TABLE `sitiosturisticos` (
  `idSitioTuristico` int(11) NOT NULL,
  `nombreST` varchar(40) NOT NULL,
  `direccionST` varchar(40) DEFAULT NULL,
  `telefonoST` int(25) DEFAULT NULL,
  `tipoST` enum('Piscinas','Hoteles','Restaurantes','Quebradas') DEFAULT NULL,
  `correoST` varchar(40) DEFAULT NULL,
  `propietarioST` varchar(40) DEFAULT NULL,
  `descripcionST` varchar(50) DEFAULT NULL,
  `yearST` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sitiosturisticos`
--

INSERT INTO `sitiosturisticos` (`idSitioTuristico`, `nombreST`, `direccionST`, `telefonoST`, `tipoST`, `correoST`, `propietarioST`, `descripcionST`, `yearST`) VALUES
(47, 'Santa Ana', 'Tocaima', 2147483647, 'Piscinas', 'santa_ana@hotmail.com', 'alfonso gutierres', 'descripsas', '2021-06-28'),
(48, '5', '5', 5, 'Hoteles', '5@gmail.com', '5', '5', '2005-05-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuNombre` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `usuEmail` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `usuPassword` varchar(90) CHARACTER SET utf8mb4 NOT NULL,
  `intentos` int(1) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuNombre`, `usuEmail`, `usuPassword`, `intentos`, `rol`) VALUES
(1, 'Daniela', 'Joniel@gmail.es', '$2a$07$usesomesillystringforeqMV1SwAFDcSafpQyi4tWo8j25Q07t7C', 0, 0),
(2, 'Joniel', 'Daniel@gmail.es', '$2a$07$usesomesillystringforeF5MUueO06nDKzD9SeMEw/nSCRGTraw2', 2, 0),
(3, 'Fuscia', 'romerogalindodaniel@gmail.com', '$2a$07$usesomesillystringforerBVLzO6iEn4ZI4RZbi2D.3ZGIP41sNG', 0, 0),
(4, 'Fuscia', 'DRG@creaters.com', '$2a$07$usesomesillystringforetemofIfNN7ChjSi7bicc61KNVcYuUpO', 0, 0),
(5, 'Joniel', 'Joniel@gmail.es', '$2a$07$usesomesillystringforemssGtsxv2XH6g.nRJg0qG3nm9Z5bqwi', 2, 0),
(6, 'Joniel', 'Joniel@gmail.es', '$2a$07$usesomesillystringforemssGtsxv2XH6g.nRJg0qG3nm9Z5bqwi', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`idsitio turistico`,`sitios turisticos_id`),
  ADD KEY `fk_Mapa_sitios turisticos1_idx` (`sitios turisticos_id`);

--
-- Indices de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD PRIMARY KEY (`idPqrs`);

--
-- Indices de la tabla `sitiosturisticos`
--
ALTER TABLE `sitiosturisticos`
  ADD PRIMARY KEY (`idSitioTuristico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  MODIFY `idPqrs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `sitiosturisticos`
--
ALTER TABLE `sitiosturisticos`
  MODIFY `idSitioTuristico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mapa`
--
ALTER TABLE `mapa`
  ADD CONSTRAINT `fk_Mapa_sitios turisticos1` FOREIGN KEY (`sitios turisticos_id`) REFERENCES `sitiosturisticos` (`idSitioTuristico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
