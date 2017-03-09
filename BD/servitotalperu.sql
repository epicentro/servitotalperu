-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-03-2017 a las 12:02:20
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `servitotalperu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `idarticulos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `autor` varchar(150) NOT NULL,
  `sumilla_facebook` text NOT NULL,
  `contador` int(10) unsigned NOT NULL,
  `padre_id` int(10) unsigned NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idyoutube` varchar(100) NOT NULL,
  PRIMARY KEY (`idarticulos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idarticulos`, `title`, `keyword`, `description`, `nombre`, `seo`, `titulo`, `sumilla`, `descripcion`, `imagen`, `idsw`, `idprimera_hoja`, `fecha`, `autor`, `sumilla_facebook`, `contador`, `padre_id`, `orden`, `idyoutube`) VALUES
(2, 'DEFINING FEES WITHIN A STABLE VALUE FUND 2', 'DEFINING FEES WITHIN A STABLE VALUE FUND 2', 'DEFINING FEES WITHIN A STABLE VALUE FUND 2', 'DEFINING FEES WITHIN A STABLE VALUE FUND 2', 'DEFINING-FEES-WITHIN-A-STABLE-VALUE-FUND-2', '', 'Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data. Progressively maintain extensive infomediaries via extensible niches.', 'Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data. Progressively maintain extensive infomediaries via extensible niches. Dramatically disseminate standardized metrics after resource-leveling processes. Objectively pursue diverse catalysts for change for interoperable meta-services.', 'articulos_2_H78zb.jpg', 1, 1, '2016-04-12', 'Admin', 'jojojojo', 0, 0, 0, 'FwA1OsY4Hw0'),
(3, 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING-FEES-WITHIN-A-STABLE-VALUE-FUND-3', '', 'Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data. Progressively maintain extensive infomediaries via extensible niches.', 'Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data. Progressively maintain extensive infomediaries via extensible niches. Dramatically disseminate standardized metrics after resource-leveling processes. Objectively pursue diverse catalysts for change for interoperable meta-services.', 'articulos_3_Kmv2q.jpg', 1, 2, '2016-05-07', 'Angel', 'jijijiji', 0, 0, 0, ''),
(4, 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING FEES WITHIN A STABLE VALUE FUND', 'DEFINING-FEES-WITHIN-A-STABLE-VALUE-FUND-4', '', 'Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data. Progressively maintain extensive infomediaries via extensible niches.', 'Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data. Progressively maintain extensive infomediaries via extensible niches. Dramatically disseminate standardized metrics after resource-leveling processes. Objectively pursue diverse catalysts for change for interoperable meta-services.', 'articulos_4_74s4x.jpg', 1, 2, '2016-06-12', 'angel', 'jujujujuju', 0, 0, 0, 'veYcRPQNnkc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `idbanners` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria_banners` int(10) unsigned NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `link` varchar(100) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `alt` varchar(150) NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbanners`),
  KEY `banners_FKIndex1` (`idcategoria_banners`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`idbanners`, `idcategoria_banners`, `nombre`, `link`, `sumilla`, `descripcion`, `imagen`, `orden`, `alt`, `idsw`) VALUES
(1, 1, 'BANNER BANNER BANNER 01', '#', '&nbsp;', '', 'banners_1_kpPFk.jpg', 1, 'alt', 1),
(2, 1, 'BANNER BANNER BANNER 02', '#', '&nbsp;', '', 'banners_2_FPXHH.jpg', 2, 'alt', 1),
(3, 1, 'BANNER BANNER BANNER 03', '#', '&nbsp;', '', 'banners_3_pajo4.jpg', 3, 'alt', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE IF NOT EXISTS `boletin` (
  `idboletin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`idboletin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `boletin`
--

INSERT INTO `boletin` (`idboletin`, `email`, `fecha`) VALUES
(1, 'yassercalle@hotmail.com', '2016-05-30 21:08:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsa`
--

CREATE TABLE IF NOT EXISTS `bolsa` (
  `idbolsa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `contacto` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `requerimiento` text NOT NULL,
  `contador` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbolsa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `bolsa`
--

INSERT INTO `bolsa` (`idbolsa`, `titulo`, `empresa`, `contacto`, `email`, `telefono`, `fecha`, `requerimiento`, `contador`, `idsw`, `idprimera_hoja`) VALUES
(1, 'Se necesita Programador Senior', 'Innova Logic SAC', 'Yasser Calle Ramos', 'yassercalle@hotmail.com', '898989898', '2016-03-17', 'Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado.', 0, 1, 0),
(2, 'Se Necesita Ing. de Sistema', 'Serpost', 'William Varlverde', 'wil@serpost.pe', '', '2016-03-23', 'Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado.', 0, 1, 0),
(3, 'Especialista en LINUX', 'Pisopak', 'Jorge Mendez', 'jmendez@hotmail.com', '989898989', '2016-03-24', 'Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado. Se necesita Programador Senior, con m&aacute;s de 5 a&ntilde;os de experiencia comprobado.', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_banners`
--

CREATE TABLE IF NOT EXISTS `categoria_banners` (
  `idcategoria_banners` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_categoria` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `padre_id` int(10) unsigned NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `sumilla` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcategoria_banners`),
  KEY `categoria_banners_FKIndex1` (`idtipo_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Aqui se registraran las conferencias y los seminarios' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria_banners`
--

INSERT INTO `categoria_banners` (`idcategoria_banners`, `idtipo_categoria`, `title`, `keyword`, `description`, `nombre`, `seo`, `nivel`, `padre_id`, `orden`, `sumilla`, `imagen`, `idprimera_hoja`, `idsw`) VALUES
(1, 1, '', '', '', 'slide', 'slide', 0, 0, 1, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_clientes`
--

CREATE TABLE IF NOT EXISTS `categoria_clientes` (
  `idcategoria_clientes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_categoria` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `padre_id` int(10) unsigned NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `sumilla` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcategoria_clientes`),
  KEY `categoria_clientes_FKIndex1` (`idtipo_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_maquinarias`
--

CREATE TABLE IF NOT EXISTS `categoria_maquinarias` (
  `idcategoria_maquinarias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_categoria` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `padre_id` int(10) unsigned NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `sumilla` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcategoria_maquinarias`),
  KEY `categoria_ubicacion_FKIndex1` (`idtipo_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria_maquinarias`
--

INSERT INTO `categoria_maquinarias` (`idcategoria_maquinarias`, `idtipo_categoria`, `title`, `keyword`, `description`, `nombre`, `seo`, `titulo`, `nivel`, `padre_id`, `orden`, `sumilla`, `imagen`, `idprimera_hoja`, `idsw`) VALUES
(1, 1, 'Maquinarias', 'Maquinarias', 'Maquinarias', 'Maquinarias', 'Maquinarias', 'Maquinarias', 0, 0, 1, '<p>&nbsp;Maquinarias</p>', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE IF NOT EXISTS `categoria_productos` (
  `idcategoria_productos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_categoria` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `padre_id` int(10) unsigned NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `sumilla` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcategoria_productos`),
  KEY `categoria_ubicacion_FKIndex1` (`idtipo_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categoria_productos`
--

INSERT INTO `categoria_productos` (`idcategoria_productos`, `idtipo_categoria`, `title`, `keyword`, `description`, `nombre`, `seo`, `titulo`, `nivel`, `padre_id`, `orden`, `sumilla`, `imagen`, `idprimera_hoja`, `idsw`) VALUES
(2, 1, 'Productos', 'Productos', 'Productos', 'Productos', 'Productos', 'Productos', 0, 0, 2, '', '', 0, 1),
(5, 1, 'sub cat prod 2', 'sub cat prod 2', 'sub cat prod 2', 'sub cat prod 2', 'sub-cat-prod-2', 'sub cat prod 2', 0, 2, 2, '', 'categoria_productos_5_LZklg.jpg', 0, 1),
(6, 1, 'sub cat prod 1', 'sub cat prod 1', 'sub cat prod 1', 'sub cat prod 1', 'sub-cat-prod-1', 'sub cat prod 1', 0, 2, 1, '', 'categoria_productos_6_KBT62.jpg', 0, 1),
(7, 1, 'sub cat prod 3', 'sub cat prod 3', 'sub cat prod 3', 'sub cat prod 3', 'sub-cat-prod-3', 'sub cat prod 3', 0, 2, 3, '', 'categoria_productos_7_d74hn.jpg', 0, 1),
(8, 1, 'sub cat prod 4', 'sub cat prod 4', 'sub cat prod 4', 'sub cat prod 4', 'sub-cat-prod-4', 'sub cat prod 4', 0, 2, 4, '', 'categoria_productos_8_8Z5QT.jpg', 0, 1),
(9, 1, 'sub sub cat prod 1', 'sub sub cat prod 1', 'sub sub cat prod 1', 'sub sub cat prod 1', 'sub-sub-cat-prod-1', 'sub sub cat prod 1', 0, 6, 1, '<p>&nbsp;sub sub cat prod 1</p>', 'categoria_productos_9_Q6i6g.jpg', 0, 1),
(10, 1, 'sub sub cat prod 2', 'sub sub cat prod 2', 'sub sub cat prod 2', 'sub sub cat prod 2', 'sub-sub-cat-prod-2', 'sub sub cat prod 2', 0, 6, 2, '', 'categoria_productos_10_hmgkM.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_servicios`
--

CREATE TABLE IF NOT EXISTS `categoria_servicios` (
  `idcategoria_servicios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_categoria` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `nivel` int(10) unsigned NOT NULL,
  `padre_id` int(10) unsigned NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `sumilla` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idcategoria_servicios`),
  KEY `categoria_ubicacion_FKIndex1` (`idtipo_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria_servicios`
--

INSERT INTO `categoria_servicios` (`idcategoria_servicios`, `idtipo_categoria`, `title`, `keyword`, `description`, `nombre`, `seo`, `titulo`, `nivel`, `padre_id`, `orden`, `sumilla`, `imagen`, `idprimera_hoja`, `idsw`) VALUES
(1, 1, 'Servicios', 'Servicios', 'Servicios', 'Servicios', 'Servicios', 'Servicios', 0, 0, 1, '', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idclientes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria_clientes` int(10) unsigned NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `link` varchar(100) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `alt` varchar(150) NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) NOT NULL,
  PRIMARY KEY (`idclientes`),
  KEY `clientes_FKIndex1` (`idcategoria_clientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `idcategoria_clientes`, `nombre`, `link`, `sumilla`, `descripcion`, `imagen`, `orden`, `alt`, `idsw`, `idprimera_hoja`) VALUES
(1, 0, 'Cliente 01', '', '', '', 'clientes_1_j1foJ.png', 100, '', 1, 1),
(2, 0, 'Cliente 02', '', '', '', 'clientes_2_iMb66.png', 100, '', 1, 1),
(3, 0, 'Cliente 03', '', '', '', 'clientes_3_vPN9X.png', 100, '', 1, 1),
(4, 0, 'Cliente 04', '', '', '', 'clientes_4_PHVo8.png', 100, '', 1, 1),
(5, 0, 'Cliente 05', '', '', '', 'clientes_5_lGbo6.png', 100, '', 1, 1),
(6, 0, 'Cliente 06', '', '', '', 'clientes_6_EUpyw.png', 100, '', 1, 1),
(7, 0, 'Cliente 07', '', '', '', 'clientes_7_67qc8.png', 100, '', 1, 1),
(8, 0, 'Cliente 08', '', '', '', 'clientes_8_xWmaL.png', 100, '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_imagenes`
--

CREATE TABLE IF NOT EXISTS `cursos_imagenes` (
  `idinmuebles_imagenes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcursos` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_foto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idinmuebles_imagenes`),
  KEY `cursos_imagenes_FKIndex1` (`idcursos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `idemails` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `de` varchar(150) NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `inicio` text NOT NULL,
  `final` text NOT NULL,
  PRIMARY KEY (`idemails`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='el nombre es la descripcion de lo que se trata el email, por ejemplo :  Email al registrarse un cliente' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idestado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `nombre`) VALUES
(1, 'Ninguno'),
(2, 'EN CONSTRUCCIÓN'),
(3, 'EN PLANOS'),
(4, 'ESTRENO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapa`
--

CREATE TABLE IF NOT EXISTS `mapa` (
  `idmapa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `latitud_centro` varchar(100) DEFAULT NULL,
  `longitud_centro` varchar(100) DEFAULT NULL,
  `latitud_punto` varchar(100) DEFAULT NULL,
  `longitud_punto` varchar(100) DEFAULT NULL,
  `zoom` int(11) DEFAULT NULL,
  `tipomapa` varchar(20) DEFAULT NULL,
  `idsw` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mapa`
--

INSERT INTO `mapa` (`idmapa`, `nombre`, `latitud_centro`, `longitud_centro`, `latitud_punto`, `longitud_punto`, `zoom`, `tipomapa`, `idsw`) VALUES
(1, 'sfinetworks', '-12.0808503', '-77.0380534', '-12.0808503', '-77.0380534', 16, 'roadmap', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinarias`
--

CREATE TABLE IF NOT EXISTS `maquinarias` (
  `idmaquinarias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria_maquinarias` int(10) unsigned NOT NULL,
  `idestado` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `pvr` decimal(10,2) NOT NULL,
  `pvp` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `frecuencia` varchar(150) NOT NULL,
  `horario` varchar(150) NOT NULL,
  `horas` varchar(50) NOT NULL,
  PRIMARY KEY (`idmaquinarias`),
  KEY `inmuebles_FKIndex4` (`idestado`),
  KEY `productos_FKIndex2` (`idcategoria_maquinarias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `maquinarias`
--

INSERT INTO `maquinarias` (`idmaquinarias`, `idcategoria_maquinarias`, `idestado`, `title`, `keyword`, `description`, `nombre`, `titulo`, `seo`, `codigo`, `sumilla`, `descripcion`, `pvr`, `pvp`, `video`, `tags`, `orden`, `idprimera_hoja`, `idsw`, `fecha`, `frecuencia`, `horario`, `horas`) VALUES
(1, 1, 0, 'Maquinaria 01', 'Maquinaria 01', 'Maquinaria 01', 'Maquinaria 01', '', 'Maquinaria-01', '', 'It is a long established fact that a reader will be distracted by the &nbsp;', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 1, 1, 1, '0000-00-00', '', '', ''),
(2, 1, 0, 'Maquinaria 02', 'Maquinaria 02', 'Maquinaria 02', 'Maquinaria 02', '', 'Maquinaria-02', '', 'It is a long established fact that a reader will be distracted by the &nbsp;', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 2, 1, 1, '0000-00-00', '', '', ''),
(3, 1, 0, 'Maquinaria 03', 'Maquinaria 03', 'Maquinaria 03', 'Maquinaria 03', '', 'Maquinaria-03', '', 'It is a long established fact that a reader will be distracted by the &nbsp;', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 3, 1, 1, '0000-00-00', '', '', ''),
(4, 1, 0, 'Maquinaria 04', 'Maquinaria 04', 'Maquinaria 04', 'Maquinaria 04', '', 'Maquinaria-04', '', 'It is a long established fact that a reader will be distracted by the &nbsp;', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 4, 1, 1, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinarias_imagenes`
--

CREATE TABLE IF NOT EXISTS `maquinarias_imagenes` (
  `idmaquinarias_imagenes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idmaquinarias` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_foto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idmaquinarias_imagenes`),
  KEY `productos_imagenes_FKIndex1` (`idmaquinarias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `maquinarias_imagenes`
--

INSERT INTO `maquinarias_imagenes` (`idmaquinarias_imagenes`, `idmaquinarias`, `title`, `keyword`, `description`, `nombre`, `seo`, `sumilla`, `descripcion`, `imagen`, `link`, `orden`, `idsw`, `idprimera_foto`) VALUES
(1, 1, '', '', '', '', '', '', '', 'maquinarias_imagenes_1_l573n.png', '', 1, 0, 1),
(5, 4, '', '', '', '', '', '', '', 'maquinarias_imagenes_4_lDbeb.png', '', 1, 0, 1),
(6, 3, '', '', '', '', '', '', '', 'maquinarias_imagenes_3_7xJ7j.png', '', 0, 0, 1),
(7, 2, '', '', '', '', '', '', '', 'maquinarias_imagenes_2_x3HRy.png', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `idmensajes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(10) unsigned NOT NULL,
  `link` varchar(150) NOT NULL,
  PRIMARY KEY (`idmensajes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idmensajes`, `nombre`, `correo`, `telefono`, `asunto`, `mensaje`, `fecha`, `estado`, `link`) VALUES
(1, 'wdfadf', 'qefqe@gmail.com', '', 'wrgw', 'wg', '2017-01-22 08:31:58', 0, ''),
(2, 'acadc', 'qefqe@gmail.com', '', 'aca', 'asc', '2017-01-22 08:52:36', 0, ''),
(3, '', 'fr@fff.com', '', 'wdwd', 'efqef', '2017-01-23 22:47:15', 0, ''),
(4, 'asvwdv', 'dsv@efef.com', '', 'wfwdf', 'wefewqf', '2017-01-23 22:49:45', 0, ''),
(5, 'qcqsc', 'ccec@ded.com', '', 'ewdfq', 'deqdeqfqefceq wd cs fc \r\ncs \r\nwd \r\n w\r\n', '2017-01-23 22:50:48', 0, ''),
(6, 'cqdc', 'qc@dede.com', '', 'eedfee2de2', 'dededwed', '2017-01-23 22:54:20', 0, ''),
(7, '', 'ede@eded.com', '', 'qedeq', 'qed', '2017-01-24 00:15:48', 0, ''),
(8, 'swsw', 'julio_jc2002@hotmail.com', '', 'ded', 'ed', '2017-02-14 01:27:26', 0, 'http://localhost/servitotalperu/contacto/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normas`
--

CREATE TABLE IF NOT EXISTS `normas` (
  `idnormas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `autor` varchar(150) NOT NULL,
  `sumilla_facebook` text NOT NULL,
  `contador` int(10) unsigned NOT NULL,
  `idyoutube` varchar(100) NOT NULL,
  PRIMARY KEY (`idnormas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `normas`
--

INSERT INTO `normas` (`idnormas`, `title`, `keyword`, `description`, `nombre`, `seo`, `titulo`, `sumilla`, `descripcion`, `imagen`, `idsw`, `idprimera_hoja`, `fecha`, `autor`, `sumilla_facebook`, `contador`, `idyoutube`) VALUES
(1, 'Esta es la norma número 01', 'Esta es la norma número 01', 'Esta es la norma número 01', 'Esta es la norma número 01', 'Esta-es-la-norma-numero-01', '', '', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles. Si vas a utilizar un pasaje de Lorem Ipsum, necesit&aacute;s estar seguro de que no hay nada avergonzante escondido en el medio del texto.', 'normas_1_hBWGJ.pdf', 1, 0, '2016-08-01', '', '', 0, ''),
(2, 'Esta es la norma número 02', 'Esta es la norma número 02', 'Esta es la norma número 02', 'Esta es la norma número 02', 'Esta-es-la-norma-numero-02', '', '', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayor&iacute;a sufri&oacute; alteraciones en alguna manera, ya sea porque se le agreg&oacute; humor, o palabras aleatorias que no parecen ni un poco cre&iacute;bles. Si vas a utilizar un pasaje de Lorem Ipsum, necesit&aacute;s estar seguro de que no hay nada avergonzante escondido en el medio del texto.', 'normas_2_EA0bK.pdf', 1, 0, '2016-08-02', '', '', 0, ''),
(3, 'Esta es la norma número 03', 'Esta es la norma número 03', 'Esta es la norma número 03', 'Esta es la norma número 03', 'Esta-es-la-norma-numero-03', '', '', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto.', 'normas_3_aFBEK.pdf', 1, 0, '2016-08-11', '', '', 0, ''),
(4, 'Esta es la norma número 04', 'Esta es la norma número 04', 'Esta es la norma número 04', 'Esta es la norma número 04', 'Esta-es-la-norma-numero-04', '', '', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto.', 'normas_4_Jryh5.pdf', 1, 0, '2016-08-15', '', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `idparametros` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `llave` varchar(150) NOT NULL,
  `valor` text NOT NULL,
  `descripcion` text NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idparametros`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`idparametros`, `llave`, `valor`, `descripcion`, `orden`, `idsw`) VALUES
(1, 'be_elementos_x_pagina', '20', '', 0, 1),
(2, 'telefono_frontis', '(511) 2XX-XXXX', '', 0, 1),
(3, 'celular_frontis', 'YYY YYY YYY', '', 0, 1),
(4, 'link_linkeding', 'https://www.linkedin.com/', '', 0, 1),
(5, 'link_youtube', 'http://www.youtube.com/', '', 0, 1),
(6, 'link_facebook', 'https://www.facebook.com/', '', 0, 1),
(7, 'whatsapp', '987400556', '', 0, 0),
(8, 'link_twitter', 'http://www.twitter.com', '', 0, 1),
(9, 'ip_prueba', '', 'Ip de prueba, borrrarlo en producción', 0, 0),
(10, 'correo_contacto', 'info@servitotalperu.com', 'Correo al que llega los mensajes del formulario de contacto', 0, 1),
(11, 'copia_correo_contacto', 'ycalle@solucionesajax.com', 'Correo al que llega una copia del formulario de contacto', 0, 1),
(13, 'direccion', 'Jr. Antonio Bazo 709 Int. 1110 (Piso 11) Lima - Lima - La Victoria', '', 0, 1),
(14, 'fe_elementos_x_pagina', '2', '', 0, 1),
(15, 'proyectos_realizados', '2034', '', 0, 0),
(16, 'empleados_trabajando', '65', '', 0, 0),
(17, 'reconocimientos', '35', '', 0, 0),
(19, 'atencion-L-V', 'Lun - Vie 08AM-8PM', '', 0, 1),
(20, 'franja_naranja', 'EXPERTOS DE INGENIERÍA EN SEGURIDAD INDUSTRIAL, VIAL, EPP Y ROPA INDUSTRIAL', '', 0, 0),
(21, 'atencion-S', 'Sábado / 9 am a 2 pm', '', 0, 1),
(22, 'atencion-D', 'Domingo / Cerrado', '', 0, 1),
(23, 'titulo_ini_1', 'ServiTotal Peru ofrece dos tipos de Servicios', '', 0, 1),
(24, 'subtitulo_ini_1', 'Son los siguientes:', '', 0, 1),
(25, 'titulo_ini_2', '<strong>Maquinarias</strong> de ServiTotal Peru', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `primera_hoja`
--

CREATE TABLE IF NOT EXISTS `primera_hoja` (
  `idprimera_hoja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idprimera_hoja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `primera_hoja`
--

INSERT INTO `primera_hoja` (`idprimera_hoja`, `nombre`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria_productos` int(10) unsigned NOT NULL,
  `idestado` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `pvr` decimal(10,2) NOT NULL,
  `pvp` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `frecuencia` varchar(150) NOT NULL,
  `horario` varchar(150) NOT NULL,
  `horas` varchar(50) NOT NULL,
  PRIMARY KEY (`idproductos`),
  KEY `inmuebles_FKIndex4` (`idestado`),
  KEY `productos_FKIndex2` (`idcategoria_productos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `idcategoria_productos`, `idestado`, `title`, `keyword`, `description`, `nombre`, `titulo`, `seo`, `codigo`, `sumilla`, `descripcion`, `pvr`, `pvp`, `video`, `tags`, `orden`, `idprimera_hoja`, `idsw`, `fecha`, `frecuencia`, `horario`, `horas`) VALUES
(1, 9, 0, 'producto 01', 'producto 01', 'producto 01', 'producto 01', '', 'producto-01', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 1, 0, 1, '0000-00-00', '', '', ''),
(2, 9, 0, 'producto 02', 'producto 02', 'producto 02', 'producto 02', '', 'producto-02', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 2, 0, 1, '0000-00-00', '', '', ''),
(3, 9, 0, 'producto 03', 'producto 03', 'producto 03', 'producto 03', '', 'producto-03', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 3, 0, 1, '0000-00-00', '', '', ''),
(4, 7, 0, 'producto 04', 'producto 04', 'producto 04', 'producto 04', '', 'producto-04', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 4, 0, 1, '0000-00-00', '', '', ''),
(5, 10, 0, 'producto 05', 'producto 05', 'producto 05', 'producto 05', '', 'producto-05', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 5, 0, 1, '0000-00-00', '', '', ''),
(6, 9, 0, 'producto 06', 'producto 06', 'producto 06', 'producto 06', '', 'producto-06', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 6, 0, 1, '0000-00-00', '', '', ''),
(7, 9, 0, 'producto 07', 'producto 07', 'producto 07', 'producto 07', '', 'producto-07', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 7, 0, 1, '0000-00-00', '', '', ''),
(8, 9, 0, 'producto 08', 'producto 08', 'producto 08', 'producto 08', '', 'producto-08', '', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '0.00', '', '', '', 8, 0, 1, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_comentarios`
--

CREATE TABLE IF NOT EXISTS `productos_comentarios` (
  `idproductos_comentarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproductos` int(10) unsigned NOT NULL,
  `comentario` text NOT NULL,
  `autor` varchar(150) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idproductos_comentarios`),
  KEY `productos_comentarios_FKIndex1` (`idproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_imagenes`
--

CREATE TABLE IF NOT EXISTS `productos_imagenes` (
  `idproductos_imagenes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproductos` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_foto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idproductos_imagenes`),
  KEY `productos_imagenes_FKIndex1` (`idproductos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `productos_imagenes`
--

INSERT INTO `productos_imagenes` (`idproductos_imagenes`, `idproductos`, `title`, `keyword`, `description`, `nombre`, `seo`, `sumilla`, `descripcion`, `imagen`, `link`, `orden`, `idsw`, `idprimera_foto`) VALUES
(1, 2, '', '', '', '', '', '', '', 'productos_imagenes_2_MFiD1.jpg', '', 0, 0, 1),
(4, 5, '', '', '', '', '', '', '', 'productos_imagenes_5_sBCMY.jpg', '', 0, 0, 1),
(5, 4, '', '', '', '', '', '', '', 'productos_imagenes_4_mehr2.jpg', '', 0, 0, 1),
(6, 3, '', '', '', '', '', '', '', 'productos_imagenes_3_lf6HT.jpg', '', 0, 0, 1),
(7, 1, '', '', '', '', '', '', '', 'productos_imagenes_1_WwBb6.jpg', '', 0, 0, 1),
(8, 8, '', '', '', '', '', '', '', 'productos_imagenes_8_DcSAM.jpg', '', 0, 0, 1),
(9, 7, '', '', '', '', '', '', '', 'productos_imagenes_7_QKAm0.jpg', '', 0, 0, 1),
(10, 6, '', '', '', '', '', '', '', 'productos_imagenes_6_i3a0x.jpg', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `idsecciones` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idsecciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='La diferencia entre el nombre y el titulo es que al titulo se le puede meter el nombre pero etiquetas html    Sumilla es lo que mostrara en el index y descripcion  lo que se mostrara al ingresar a cada seccion' AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idsecciones`, `title`, `keyword`, `description`, `nombre`, `titulo`, `seo`, `sumilla`, `descripcion`, `imagen`, `idprimera_hoja`) VALUES
(1, 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'ServiTotal Peru', 'inicio', '', '&nbsp;Se caracteriza por ser una empresa que brinda a todos sus clientes.', '', 1),
(7, 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'Nosotros', '¿QUIÉNES SOMOS?', 'nosotros', '', '<h2>SERVITOTAL <strong>PER&Uacute;</strong></h2>\r\n<strong>SERVITOTAL </strong>es una cadena de Centros de Servicio T&eacute;cnico ubicados en la Regi&oacute;n Centroamericana que brinda servicios t&eacute;cnicos en reparaci&oacute;n de art&iacute;culos para el hogar y electrodom&eacute;sticos a trav&eacute;s de una atenci&oacute;n confiable para nuestros clientes.<br />\r\n<br />\r\n<strong>SERVITOTAL </strong>es el Centro de Servicio garantizado de las marcas: SONY, Samsung, Whirlpool, Philips, Frigdaire, LG SONY y Apple; lo que nos permite brindar el servicio de garant&iacute;a de f&aacute;brica que ofrecen los proveedores. <strong>NUESTROS VALORES</strong>: Eficiencia &ndash; Servicio al Cliente &ndash; Honestidad &ndash; Integridad &ndash; Responsabilidad &ndash; Confiabilidad &ndash; Sinceridad &ndash; Respeto &ndash; Trabajo en Equipo &ndash; Actitud Positiva.&nbsp;<br />\r\n<br />\r\n<br />\r\n<strong>MISION</strong><br />\r\n<br />\r\nEnfocados en la filosof&iacute;a de servicio al cliente, la excelencia en la calidad y la rentabilidad, promovemos el desarrollo de nuestra gente y grantizamos la satisfacci&oacute;n total de nuestros clientes.<br />\r\n<br />\r\n<strong>VISION</strong><br />\r\n<br />\r\nSer la cadena de Centro de Servicio T&eacute;cnico l&iacute;deres en la Regi&oacute;n Centroamericana en servicios t&eacute;cnicos de art&iacute;culo para el hogar a trav&eacute;s e una tenci&oacute;n eficiente y confiable que supere las expectativas de nuestros clientes.<br />\r\n<br />\r\n<br type="_moz" />\r\n<br />', '', 1),
(16, 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'Clientes', 'Algunos de nuestros clientes', 'Clientes', '', '', '', 1),
(18, 'Contacto', 'Contacto', 'Contacto', 'Contacto', 'Contacto', 'contacto', '', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years .', '', 1),
(19, 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'SERVITOTAL PERÚ', 'Mensaje', 'Mensaje', 'mensaje', '&nbsp;', 'Son los siguientes:', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `idservicios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria_servicios` int(10) unsigned NOT NULL,
  `idestado` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `pvr` decimal(10,2) NOT NULL,
  `pvp` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `frecuencia` varchar(150) NOT NULL,
  `horario` varchar(150) NOT NULL,
  `horas` varchar(50) NOT NULL,
  PRIMARY KEY (`idservicios`),
  KEY `inmuebles_FKIndex4` (`idestado`),
  KEY `productos_FKIndex2` (`idcategoria_servicios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicios`, `idcategoria_servicios`, `idestado`, `title`, `keyword`, `description`, `nombre`, `titulo`, `seo`, `codigo`, `sumilla`, `descripcion`, `pvr`, `pvp`, `video`, `tags`, `orden`, `idprimera_hoja`, `idsw`, `fecha`, `frecuencia`, `horario`, `horas`) VALUES
(1, 1, 0, 'Servicios 01', 'Servicios 01', 'Servicios 01', 'Servicios 01', '', 'Servicios-01', '', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also', '&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also', '0.00', '', 'https://www.youtube.com/embed/QMgnyKuK7ns', '', 1, 0, 1, '0000-00-00', '', '', ''),
(2, 1, 0, 'Servicios 02', 'Servicios 02', 'Servicios 02', 'Servicios 02', '', 'Servicios-02', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also&nbsp;', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also <br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also&nbsp;', '0.00', '', 'https://www.youtube.com/embed/QMgnyKuK7ns', '', 2, 0, 1, '0000-00-00', '', '', ''),
(3, 1, 0, 'Servicios 03', 'Servicios 03', 'Servicios 03', 'Servicios 03', '', 'Servicios-03', '', '', '', '0.00', '', '', '', 3, 0, 1, '0000-00-00', '', '', ''),
(4, 1, 0, 'Servicios 04', 'Servicios 04', 'Servicios 04', 'Servicios 04', '', 'Servicios-04', '', '&nbsp;', '&nbsp;', '0.00', '', '', '', 4, 0, 1, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_2`
--

CREATE TABLE IF NOT EXISTS `servicios_2` (
  `idservicios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idservicios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_imagenes`
--

CREATE TABLE IF NOT EXISTS `servicios_imagenes` (
  `idservicios_imagenes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idservicios` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `keyword` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seo` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_foto` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idservicios_imagenes`),
  KEY `productos_imagenes_FKIndex1` (`idservicios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `servicios_imagenes`
--

INSERT INTO `servicios_imagenes` (`idservicios_imagenes`, `idservicios`, `title`, `keyword`, `description`, `nombre`, `seo`, `sumilla`, `descripcion`, `imagen`, `link`, `orden`, `idsw`, `idprimera_foto`) VALUES
(2, 2, '', '', '', '', '', '', '', 'servicios_imagenes_2_fvCak.png', '', 1, 0, 1),
(3, 1, '', '', '', '', '', '', '', 'servicios_imagenes_1_a2qR5.jpg', '', 0, 0, 1),
(5, 3, '', '', '', '', '', '', '', 'servicios_imagenes_3_zun9t.jpg', '', 0, 0, 1),
(6, 4, '', '', '', '', '', '', '', 'servicios_imagenes_4_gzTvE.jpg', '', 0, 0, 1),
(7, 4, '', '', '', '', '', '', '', 'servicios_imagenes_4_dHdym.jpg', '', 1, 0, 2),
(9, 5, '', '', '', '', '', '', '', 'servicios_imagenes_5_rJIX3.jpg', '', 2, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sw`
--

CREATE TABLE IF NOT EXISTS `sw` (
  `idsw` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idsw`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='1 ES SI  2 ES NO' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sw`
--

INSERT INTO `sw` (`idsw`, `nombre`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sw_promociones`
--

CREATE TABLE IF NOT EXISTS `sw_promociones` (
  `idsw_promociones` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idsw_promociones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sw_promociones`
--

INSERT INTO `sw_promociones` (`idsw_promociones`, `nombre`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sw_terminos`
--

CREATE TABLE IF NOT EXISTS `sw_terminos` (
  `idsw_terminos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idsw_terminos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sw_terminos`
--

INSERT INTO `sw_terminos` (`idsw_terminos`, `nombre`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE IF NOT EXISTS `testimonios` (
  `idtestimonios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contacto` varchar(150) NOT NULL,
  `cargo` varchar(150) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `sumilla` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `orden` int(10) unsigned NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  `idprimera_hoja` int(10) unsigned NOT NULL,
  `youtube` text NOT NULL,
  PRIMARY KEY (`idtestimonios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`idtestimonios`, `contacto`, `cargo`, `dni`, `empresa`, `sumilla`, `descripcion`, `imagen`, `fecha`, `orden`, `idsw`, `idprimera_hoja`, `youtube`) VALUES
(1, 'Dr. Joaquin Puccio sandoval', 'Director Gerente', '07636077', 'Innova Logic', 'Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.', '', 'testimonios_1_GHiE7.jpg', '2015-12-25', 100, 1, 1, ''),
(2, 'Lic. Rebeca Chavez', 'Gerenta General', '102874444', 'Adiestra', 'Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.', '', 'testimonios_2_anvj9.jpg', '2015-10-25', 100, 1, 1, ''),
(3, 'Gerente General: Antonio Perez', 'Programador', '87878787', 'Interbank', 'Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.', '', 'testimonios_3_PkaQO.jpg', '2016-01-26', 100, 1, 1, ''),
(4, 'Grerente Comercial: Sandro Rios', 'Gerenta General', '', 'Frecuencia Primera', 'Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.', '', 'testimonios_4_3q5AW.jpg', '2016-05-25', 100, 1, 1, ''),
(5, 'Roxana Peña', 'Directora ', '', 'Academia ADUNI', 'Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.', '', 'testimonios_5_ZLXe0.jpg', '2016-05-25', 100, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_categoria`
--

CREATE TABLE IF NOT EXISTS `tipo_categoria` (
  `idtipo_categoria` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idtipo_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='1 ES CATEGORIA  2 ES SECCION';

--
-- Volcado de datos para la tabla `tipo_categoria`
--

INSERT INTO `tipo_categoria` (`idtipo_categoria`, `nombre`) VALUES
(1, 'Categoría'),
(2, 'Sección'),
(3, 'Especial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `idtipo_usuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idtipo_usuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Pueden ser de 2 tipos: Administrador y Operadores' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`idtipo_usuarios`, `nombre`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo_usuarios` int(10) unsigned NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `idsw` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idusuarios`),
  KEY `usuarios_FKIndex1` (`idtipo_usuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `idtipo_usuarios`, `fullname`, `usuario`, `pass`, `idsw`) VALUES
(1, 1, 'admin', 'admin', '123456', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
