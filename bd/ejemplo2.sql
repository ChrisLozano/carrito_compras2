-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2015 a las 00:06:51
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ejemplo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`, `descripcion`) VALUES
(1, 'XBOX ONE', 'Consola XBOX ONE'),
(2, 'PS4', 'Consola PS4'),
(3, '3DS', 'Consola portatil de Nintendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `nombre`, `email`, `comentario`, `fecha`, `estatus`) VALUES
(1, '', '', '', '2015-02-18', 0),
(2, 'Pamela Lozano', 'pamelita@gmail.com', 'Holaaa', '2015-02-18', 0),
(3, 'Pamela Lozano', 'pamelita@gmail.com', 'Hola de nuevo', '2015-02-18', 0),
(4, 'Pamela Lozano', 'pamelita@gmail.com', 'Hola de nuevo', '2015-02-18', 0),
(5, 'Pamela Lozano', 'pamelita@gmail.com', 'asasa', '2015-02-18', 1),
(6, 'Emmanuel', 'emmanuel@gmail.com', 'Holaaaaaaaaaaaa', '2015-02-19', 0),
(7, 'Emmanuel', 'emmanuel@gmail.com', 'Holaaaaa otravez', '2015-02-19', 1),
(8, 'Emmanuel', 'emmanuel@gmail.com', 'Ya contesteme!!!', '2015-02-19', 0),
(9, 'Salomon', 'salomon@salomon.com', 'Holaaaaa', '2015-02-23', 1),
(10, 'Salomon', 'salomon@salomon.com', 'Holaaaaa', '2015-02-23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(200) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `imagen`, `sku`, `nombre`, `stock`, `precio`, `idCategoria`, `descripcion`) VALUES
(15, 'uploads/xbox_one.png', '1234453', 'Xbox One', '6', '7000', 1, 'Consola XBOX ONE'),
(16, 'uploads/fifa 15.jpg', '121274343', 'FIFA 15', '6', '999', 1, 'Juego FIFA 15'),
(17, 'uploads/zelda ocarina 3ds.jpg', '121212', 'Zelda Ocarina of Tim', '3', '1100', 3, 'Muy raro de conseguir'),
(18, 'uploads/zelda 3ds.jpg', '121212', 'Zelda Beetween World', '6', '700', 3, 'Nuevo juego de Zelda'),
(19, 'uploads/majoras.jpg', '1212188', 'Zelda Majoras Mask', '10', '799', 3, 'Remake Zelda Majoras Mask'),
(20, 'uploads/ps4_gtav.jpg', '2323989', 'Consola PS4', '5', '9000', 2, 'Bundle PS4 + GTA V'),
(21, 'uploads/new.jpg', '3456567', 'New Nintendo 3DS', '5', '4600', 3, 'Nueva Consola Nintendo 3DS'),
(23, 'uploads/amiibo.jpg', '6464637', 'Amiibo Toon Link', '5', '350', 3, 'Amiibo Toon Link');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilegios` tinyint(1) NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `privilegios`, `estatus`) VALUES
(13, 'Chris Lozano', 'chris@admin.com', '12345', 1, 1),
(14, 'Maira', 'maira@maira.com', '•Eóâ{ïã2±3ý.ëeQ', 2, 1),
(16, 'Tavo', 'tavo@tavo.com', '•Eóâ{ïã2±3ý.ëeQ', 2, 1),
(18, 'Emmanuel', 'emmanuel@gmail.com', '\n÷±,(h aë+»g¥', 2, 1),
(19, 'Salomon', 'salomon@salomon.com', '\n÷±,(h aë+»g¥', 2, 1),
(20, 'Chris', 'christoforo18@hotmail.com', '\n÷±,(h aë+»g¥', 2, 1),
(21, 'Emmanuel', 'emmanuel5@gmail.com', '\n÷±,(h aë+»g¥', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
