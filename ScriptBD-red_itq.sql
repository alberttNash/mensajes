-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2014 a las 12:48:22
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `red_itq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion`) VALUES
(1, 'Deportes'),
(2, 'Artes'),
(3, 'Musica'),
(4, 'Noticias'),
(5, 'Peliculas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_padre` int(11) DEFAULT '0',
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `asunto` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `archivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_status_msg` int(11) NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `id_padre`, `id_categoria`, `id_usuario`, `asunto`, `descripcion`, `fecha_publicacion`, `archivo`, `id_status_msg`) VALUES
(1, 0, 1, 1, 'gran fiesta de disfraces', 'Gran fiesta de disfraces terrorificos, premio al mejor disfraz', '2014-10-27', '', 1),
(2, 1, 1, 2, 'RE:Confirmar asistencia', 'Nos vemos ahi, Â¿habrÃ¡ botana y bebida?\r\n														', '2014-10-28', '', 3),
(3, 2, 2, 1, 'RE:asistiremos', 'Nos vemos ahi, llevarÃ© la botana y la bebida :D \r\n														', '2014-10-22', '', 3),
(4, 0, 2, 1, 'Karen huele a popo', 'summertime sadness', '2014-10-22', '', 1),
(7, 0, 1, 1, 'hla', 'hensakelw		', '2014-11-15', '', 1),
(8, 0, 1, 1, 'Menaje prueba', 'Esta es una prueba de mensaje \r\n			', '2014-11-13', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `descripcion`) VALUES
(1, 'activo'),
(2, 'suspendido'),
(3, 'eliminado'),
(7, 'bloqueado'),
(8, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_mensaje`
--

CREATE TABLE IF NOT EXISTS `status_mensaje` (
  `id_status_msg` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status_msg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `status_mensaje`
--

INSERT INTO `status_mensaje` (`id_status_msg`, `descripcion`) VALUES
(1, 'activo'),
(2, 'borrado'),
(3, 'modificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'registrado'),
(3, 'invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_corto` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_largo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `correo_e` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_corto`, `nombre_largo`, `contrasena`, `id_tipo_usuario`, `id_status`, `correo_e`) VALUES
(1, 'Alberto', 'Jose Alberto Bravo', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 'j-ose-33@hotmail.com'),
(2, 'Estela', 'Karen Estela Nunez ', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 1, 'Karens@hotmail.com'),
(3, 'Alejandro', 'Alejandro Antonio Ibarra', '1a1dc91c907325c69271ddf0c944bc72', 2, 3, 'antonio@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
