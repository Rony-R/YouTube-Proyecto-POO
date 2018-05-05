-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-05-2018 a las 16:56:15
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_youtube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_accesos`
--

DROP TABLE IF EXISTS `tbl_accesos`;
CREATE TABLE IF NOT EXISTS `tbl_accesos` (
  `codigo_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `acceso` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_accesos`
--

INSERT INTO `tbl_accesos` (`codigo_acceso`, `acceso`) VALUES
(1, 'Publico'),
(2, 'Privado'),
(3, 'Protegido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_canales`
--

DROP TABLE IF EXISTS `tbl_canales`;
CREATE TABLE IF NOT EXISTS `tbl_canales` (
  `codigo_canal` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_usuario` int(11) DEFAULT NULL,
  `nombre_canal` varchar(45) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `foto_canal` varchar(100) DEFAULT NULL,
  `num_videos` int(11) DEFAULT NULL,
  `descripcion_canal` varchar(500) DEFAULT NULL,
  `num_suscriptores` double DEFAULT NULL,
  PRIMARY KEY (`codigo_canal`),
  KEY `fk_tbl_canales_tbl_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_canales`
--

INSERT INTO `tbl_canales` (`codigo_canal`, `codigo_usuario`, `nombre_canal`, `banner`, `foto_canal`, `num_videos`, `descripcion_canal`, `num_suscriptores`) VALUES
(1, NULL, 'Musica', 'img/banners/yt-music.jpg', 'img/foto_canal/music.jpg', 5, 'Un canal para conocer la musica del momento ', 1500),
(2, NULL, 'Deporte', 'img/banners/yt-sports.jpg', 'img/foto_canal/sport.jpg', 15, 'Un canal para conocer deportes', 1500),
(3, NULL, 'Juegos', 'img/banners/yt-games.jpg', 'img/foto_canal/games.jpg', 20, 'Un canal para juegos', 3000),
(4, NULL, 'Noticias', 'img/banners/yt-news.jpg', 'img/foto_canal/news.jpg', 30, 'Un canal para ver noticias', 2500),
(5, NULL, 'Videos en Vivo', 'img/banners/yt-en-vivo.jpg', 'img/foto_canal/live.jpg', 30, 'Un canal para ver videos en vivo', 3000),
(6, NULL, 'Videos en 360°', 'img/banners/yt-360.jpg', 'img/foto_canal/explore.jpg', 20, 'Un canal para ver videos en 360', 1500),
(7, 2, 'Gaming Zone', 'img/banners/gz.jpg', 'img/foto_canal/gz.jpg', 2, 'Un canal para verme jugar con mis amigos', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `codigo_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`codigo_categoria`, `categoria`) VALUES
(1, 'Musica'),
(2, 'Juegos'),
(3, 'Deporte'),
(4, 'Peliculas'),
(5, 'Cine'),
(6, 'Accion'),
(7, 'Suspenso'),
(8, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

DROP TABLE IF EXISTS `tbl_comentarios`;
CREATE TABLE IF NOT EXISTS `tbl_comentarios` (
  `codigo_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_video` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `comentario` varchar(300) DEFAULT NULL,
  `fecha_comentario` date DEFAULT NULL,
  PRIMARY KEY (`codigo_comentario`),
  KEY `fk_tbl_comentarios_tbl_videos1_idx` (`codigo_video`),
  KEY `fk_tbl_comentarios_tbl_usuarios1_idx` (`codigo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`codigo_comentario`, `codigo_video`, `codigo_usuario`, `comentario`, `fecha_comentario`) VALUES
(1, 1, 1, 'Excelente cancion ', '2017-10-10'),
(2, 1, 2, 'Me encanta ', '2018-02-02'),
(3, 2, 2, 'Muy buena ', '2016-10-03'),
(4, 2, 5, 'Perfecto', '2015-02-03'),
(5, 3, 4, 'Infancia ', '2018-01-01'),
(6, 9, 2, 'Excelente ', '2016-10-06'),
(7, 11, 5, 'Excelente ', '2017-05-06'),
(8, 10, 1, 'Muy bueno', '2018-09-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuraciones`
--

DROP TABLE IF EXISTS `tbl_configuraciones`;
CREATE TABLE IF NOT EXISTS `tbl_configuraciones` (
  `codigo_config` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_video` int(11) NOT NULL,
  `config_comentarios` tinyint(4) DEFAULT NULL,
  `config_mostrar` varchar(45) DEFAULT NULL,
  `config_licencia` varchar(45) DEFAULT NULL,
  `config_distribucion` tinyint(4) DEFAULT NULL,
  `config_subtitulos` int(11) DEFAULT NULL,
  `config_res_edad` tinyint(4) DEFAULT NULL,
  `config_fecha_grabacion` date DEFAULT NULL,
  `config_estadisticas` tinyint(4) DEFAULT NULL,
  `config_contenido` tinyint(4) DEFAULT NULL,
  `config_ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_config`),
  KEY `fk_tbl_configuracion_tbl_videos1_idx` (`codigo_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_etiquetas`
--

DROP TABLE IF EXISTS `tbl_etiquetas`;
CREATE TABLE IF NOT EXISTS `tbl_etiquetas` (
  `codigo_etiqueta` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_video` int(11) NOT NULL,
  `etiqueta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_etiqueta`),
  KEY `fk_tbl_etiquetas_tbl_videos1_idx` (`codigo_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

DROP TABLE IF EXISTS `tbl_generos`;
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `codigo_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codigo_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`codigo_genero`, `genero`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial`
--

DROP TABLE IF EXISTS `tbl_historial`;
CREATE TABLE IF NOT EXISTS `tbl_historial` (
  `codigo_video` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo_video`,`codigo_usuario`),
  KEY `fk_tbl_videos_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario`),
  KEY `fk_tbl_videos_has_tbl_usuarios_tbl_videos1_idx` (`codigo_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_idiomas`
--

DROP TABLE IF EXISTS `tbl_idiomas`;
CREATE TABLE IF NOT EXISTS `tbl_idiomas` (
  `codigo_idioma` int(11) NOT NULL AUTO_INCREMENT,
  `idioma` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_suscripciones`
--

DROP TABLE IF EXISTS `tbl_suscripciones`;
CREATE TABLE IF NOT EXISTS `tbl_suscripciones` (
  `codigo_canal` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`codigo_canal`,`codigo_usuario`),
  KEY `fk_tbl_canales_has_tbl_usuarios_tbl_usuarios1_idx` (`codigo_usuario`),
  KEY `fk_tbl_canales_has_tbl_usuarios_tbl_canales1_idx` (`codigo_canal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_genero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `url_imagen_perfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `fk_tbl_usuarios_tbl_generos_idx` (`codigo_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `codigo_genero`, `nombre`, `apellido`, `correo`, `contrasena`, `fecha_nacimiento`, `telefono`, `ubicacion`, `url_imagen_perfil`) VALUES
(1, 1, 'Maria ', 'Perez', 'mperez@gmail.com', 'asd.456', '1997-01-10', '99325648', 'Honduras', 'img/foto_perfil/user.png'),
(2, 2, 'Jose', 'Perez', 'jperez@gmail.com', 'asd.456', '1998-02-03', '88754612', 'España', 'img/foto_perfil/user.png'),
(3, 2, 'Mario', 'Mendez', 'mmendez@yahoo.com', 'asd.456', '1995-09-11', '33265840', 'Guatemala', 'img/foto_perfil/user.png'),
(4, 1, 'Juana', 'Dominguez', 'jdominguez@yahoo.com', 'asd.456', '1996-10-03', '99652013', 'USA', 'img/foto_perfil/user.png'),
(5, 2, 'Alejandro ', 'Casillas', 'acasillas@gmail.com', 'asd.456', '1990-10-08', '98456321', 'Honduras', 'img/foto_perfil/user.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_videos`
--

DROP TABLE IF EXISTS `tbl_videos`;
CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `codigo_video` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_canal` int(11) NOT NULL,
  `codigo_categoria` int(11) NOT NULL,
  `codigo_acceso` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `url_video` varchar(100) DEFAULT NULL,
  `url_miniatura` varchar(100) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `num_visualizaciones` double DEFAULT NULL,
  `num_likes` int(11) DEFAULT NULL,
  `num_dislikes` int(11) DEFAULT NULL,
  `mensaje_usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo_video`),
  KEY `fk_tbl_videos_tbl_canales1_idx` (`codigo_canal`),
  KEY `fk_tbl_videos_tbl_categorias1_idx` (`codigo_categoria`),
  KEY `fk_tbl_videos_tbl_accesos1_idx` (`codigo_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_videos`
--

INSERT INTO `tbl_videos` (`codigo_video`, `codigo_canal`, `codigo_categoria`, `codigo_acceso`, `titulo`, `descripcion`, `url_video`, `url_miniatura`, `fecha_subida`, `num_visualizaciones`, `num_likes`, `num_dislikes`, `mensaje_usuario`) VALUES
(1, 1, 1, 1, 'Maroon 5 - Sugar ', 'Video oficial de la cancion Sugar interpretada por Maroon 5', 'img/videos/video9.mp4', 'img/miniaturas/Maroon_5_Sugar.jpg', '2016-02-02', 1500000, 1000000, 500, 'Disfruta de nuestro video Sugar'),
(2, 1, 1, 0, 'Eminem - Till i Collapse', 'Musica oficial de Eminem', 'img/videos/video2.mp4', 'img/miniaturas/Eminem_Till_i_Collapse_(Official_Music_Video).jpg', '2009-10-12', 650000, 1000000, 200, 'Disfruta de mi video'),
(3, 1, 1, 0, 'Don Diablo - Cutting Shapes (Official Music Video)', 'Video de la cancion Cutting Shapes', 'img/videos/video1.mp4', 'img/miniaturas/miniatura1.jpg', '2008-10-06', 600000, 1000000, 9000, 'Hola'),
(4, 7, 2, 0, 'FIFA 17 - TODOS LOS MOVIMIENTOS HABILES Y TRUCOS -  TUTORIAL', 'Tutorial de los movimientos de Fifa', 'img/videos/video3.mp4', 'img/miniaturas/FIFA_17_TODOS_LOS_MOVIMIENTOS_HABILES_Y_TRUCOS_TUTORIAL.jpg', '2012-10-05', 500000, 200, 5, 'Hola'),
(5, 1, 1, 0, 'Imagine Dragons - Believer', 'Cancion Believer', 'img/videos/video4.mp4', 'img/miniaturas/Imagine_Dragons_Believer.jpg', '2016-02-02', 1000000, 1000000, 500, 'Hola'),
(6, 2, 3, 0, 'LOS 10 MEJORES GOLES DE CRISTIANO RONALDO', 'Goles de Cristiano', 'img/videos/video5.mp4', 'img/miniaturas/miniatura2.jpg', '2012-10-05', 500000, 500, 100, 'Hola'),
(7, 2, 3, 0, 'Los 10 Mejores Goles de Ronaldinho', 'Goles de Ronaldinho', 'img/videos/video6.mp4', 'img/miniaturas/Los_10_Mejores_Goles_de_Ronaldinho.jpg', '2013-06-10', 600, 500, 100, 'Hola'),
(8, 2, 3, 0, 'Los 20 mejores goles de neymar', 'Goles de Neymar', 'img/videos/video7.mp4', 'img/miniaturas/Los_20_mejores_goles_de_neymar.jpg', '2015-10-16', 500, 300, 200, 'Hola'),
(9, 2, 3, 0, 'Los diez mejores goles de Lionel Messi', 'Goles de Messi', 'img/videos/video8.mp4', 'img/miniaturas/Los_diez_mejores_goles_de_Lionel_Messi.jpg', '2015-10-15', 1000000, 500, 300, 'Hola'),
(10, 2, 3, 0, 'Mejores goles de Kaka', 'Goles de Kaka', 'img/videos/video10.mp4', 'img/miniaturas/Mejores_goles_de_Kaka.jpg', '2016-02-02', 5000000, 200, 300, 'hola'),
(11, 1, 1, 0, 'Metallica - One ', 'Cancion de Metallica ', 'img/videos/video11.mp4', 'img/miniaturas/Metallica_One_[Official_Music_Video].jpg', '2012-10-05', 900000, 1500, 2, 'Hola'),
(12, 3, 2, 0, 'MI PRIMERA PARTIDA A CALL OF DUTY BLACK OPS 3', 'Primera partida', 'img/videos/video12.mp4', 'img/miniaturas/MI_PRIMERA_PARTIDA_A_CALL_OF_DUTY_BLACK_OPS_3.jpg', '2013-06-10', 1500, 100, 50, 'hola'),
(13, 1, 1, 0, 'NEFFEX - Fight Back [Official Video]', 'Official Video Neffex', 'img/videos/video13.mp4', 'img/miniaturas/NEFFEX_Fight_Back_[Official_Video].jpg', '2015-10-16', 1500000, 100000, 500, 'hola'),
(14, 3, 2, 0, 'PERO ESTO QUE TIPO DE TROLL ES', 'Troll', 'img/videos/video14.mp4', 'img/miniaturas/PERO_ESTO_QUE_TIPO_DE_TROLL_ES.jpg', '2015-10-15', 5000, 200, 100, 'hola'),
(15, 7, 2, 0, 'VEN Y LUCHA COMO UN HOMBRE!! PARKOUR GTA V', 'Pelea como hombre', 'img/videos/video15.mp4', 'img/miniaturas/VEN_Y_LUCHA_COMO_UN_HOMBRE!!_PARKOUR_GTA_V.jpg', '2016-02-02', 1600, 100, 50, 'hola');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_canales`
--
ALTER TABLE `tbl_canales`
  ADD CONSTRAINT `fk_tbl_canales_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_comentarios_tbl_videos1` FOREIGN KEY (`codigo_video`) REFERENCES `tbl_videos` (`codigo_video`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  ADD CONSTRAINT `fk_tbl_configuracion_tbl_videos1` FOREIGN KEY (`codigo_video`) REFERENCES `tbl_videos` (`codigo_video`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_etiquetas`
--
ALTER TABLE `tbl_etiquetas`
  ADD CONSTRAINT `fk_tbl_etiquetas_tbl_videos1` FOREIGN KEY (`codigo_video`) REFERENCES `tbl_videos` (`codigo_video`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_historial`
--
ALTER TABLE `tbl_historial`
  ADD CONSTRAINT `fk_tbl_videos_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_videos_has_tbl_usuarios_tbl_videos1` FOREIGN KEY (`codigo_video`) REFERENCES `tbl_videos` (`codigo_video`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_suscripciones`
--
ALTER TABLE `tbl_suscripciones`
  ADD CONSTRAINT `fk_tbl_canales_has_tbl_usuarios_tbl_canales1` FOREIGN KEY (`codigo_canal`) REFERENCES `tbl_canales` (`codigo_canal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_canales_has_tbl_usuarios_tbl_usuarios1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_generos` FOREIGN KEY (`codigo_genero`) REFERENCES `tbl_generos` (`codigo_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD CONSTRAINT `fk_tbl_videos_tbl_accesos1` FOREIGN KEY (`codigo_acceso`) REFERENCES `tbl_accesos` (`codigo_acceso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_videos_tbl_canales1` FOREIGN KEY (`codigo_canal`) REFERENCES `tbl_canales` (`codigo_canal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_videos_tbl_categorias1` FOREIGN KEY (`codigo_categoria`) REFERENCES `tbl_categorias` (`codigo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
