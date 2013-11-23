-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2013 at 11:28 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a2968841_pitreal`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternativa`
--

CREATE TABLE `alternativa` (
  `idalternativa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nromarcaciones` smallint(6) NOT NULL,
  `idpregunta` int(11) NOT NULL,
  PRIMARY KEY (`idalternativa`),
  KEY `fk_ALTERNATIVA_PREGUNTA1` (`idpregunta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `alternativa`
--

INSERT INTO `alternativa` VALUES(1, 'Tal vez', 9, 1);
INSERT INTO `alternativa` VALUES(2, 'Sí', 11, 1);
INSERT INTO `alternativa` VALUES(3, 'No', 13, 1);
INSERT INTO `alternativa` VALUES(4, 'Ya lo utilizo', 12, 1);
INSERT INTO `alternativa` VALUES(5, 'Muy difícil ', 33, 2);
INSERT INTO `alternativa` VALUES(6, 'Difícil', 29, 2);
INSERT INTO `alternativa` VALUES(7, 'Normal', 15, 2);
INSERT INTO `alternativa` VALUES(8, 'Fácil', 15, 2);
INSERT INTO `alternativa` VALUES(9, 'Muy fácil', 22, 2);
INSERT INTO `alternativa` VALUES(10, 'Internet Explorer', 2, 3);
INSERT INTO `alternativa` VALUES(11, 'Firefox', 9, 3);
INSERT INTO `alternativa` VALUES(12, 'Chrome', 23, 3);
INSERT INTO `alternativa` VALUES(13, 'Safari', 29, 3);
INSERT INTO `alternativa` VALUES(14, 'Otros', 3, 3);
INSERT INTO `alternativa` VALUES(15, 'Programador web', 24, 4);
INSERT INTO `alternativa` VALUES(16, 'Diseñador web', 22, 4);
INSERT INTO `alternativa` VALUES(17, 'QA', 3, 4);
INSERT INTO `alternativa` VALUES(18, 'Bastante', 4, 5);
INSERT INTO `alternativa` VALUES(19, 'Mas o menos', 20, 5);
INSERT INTO `alternativa` VALUES(20, 'Poco', 2, 5);
INSERT INTO `alternativa` VALUES(21, 'Hice 5 proy', 30, 6);
INSERT INTO `alternativa` VALUES(22, 'Hice 3 proy', 10, 6);
INSERT INTO `alternativa` VALUES(23, 'No hice proy', 5, 6);
INSERT INTO `alternativa` VALUES(24, 'Demasiados', 0, 33);
INSERT INTO `alternativa` VALUES(25, 'Más o menos', 0, 33);
INSERT INTO `alternativa` VALUES(26, 'Pocos', 0, 33);

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE `archivos` (
  `idarchivo` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) NOT NULL,
  `idtema` int(11) NOT NULL,
  PRIMARY KEY (`idarchivo`),
  KEY `fk_ARCHIVOS_TEMA1` (`idtema`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `archivos`
--


-- --------------------------------------------------------

--
-- Table structure for table `boletin`
--

CREATE TABLE `boletin` (
  `idboletin` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idboletin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boletin`
--


-- --------------------------------------------------------

--
-- Table structure for table `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `estado` varchar(22) NOT NULL,
  `respuesta` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `fk_CONSULTA_PARTICIPANTE1` (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

--
-- Dumping data for table `consulta`
--

INSERT INTO `consulta` VALUES(1, 6, '¿Lo soporta la última versión de Dreamweaver?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(2, 6, '¿Cómo es la curva de aprendizaje?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(3, 6, '¿Internet Explorer lo renderiza bien?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(4, 7, '¿Es verdad que con CSS3 se puede hacer 3D?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(5, 7, '¿Una sóla página sirve para cualquier dispositivo cliente?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(72, 7, '¿Cómo se visualiza en navegadores antiguos?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(73, 8, '¿Es muy complicado editarlo desde código?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(74, 6, '¿Se pueden crear juegos y videos sin librerías de terceros?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(127, 6, '¿Todos los móviles lo soportan?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(128, 8, '¿Cuál es su futuro?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(129, 16, '¿Algún Nokia lo soporta?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(130, 28, '¿Hay versión para pcs?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(187, 7, 'Android. Cual es la última versión de android?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(188, 7, 'que es la criptografia. Muy complejo', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(189, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(190, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(191, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(192, 6, 'cual es la complejidad del uso kasperky?. consola', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(193, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(194, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(195, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(196, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(197, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(198, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(199, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(200, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(201, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(202, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(203, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(204, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(205, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(206, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(207, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(208, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(209, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(210, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(211, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(212, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(213, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(214, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(215, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(216, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(217, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(218, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(219, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(220, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(221, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(222, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(223, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(224, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(225, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(226, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(227, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(228, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(229, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(230, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(231, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(232, 7, 'Android. Cual es la última versión de android?', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(233, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(234, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(235, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(236, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(237, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(238, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(239, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(261, 7, 'donde estoy. Descrip', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(262, 7, 'como me llamo. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(263, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(264, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(265, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(266, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(267, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(268, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(269, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(270, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(271, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(272, 7, 'donde estoy. Descrip', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(273, 7, 'como me llamo. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(274, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(275, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(276, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(277, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(278, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(279, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(280, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(281, 6, 'que es android?. Descripcion', 'Respondida en evento', NULL);
INSERT INTO `consulta` VALUES(282, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(283, 7, 'donde estoy. Descrip', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(284, 7, 'como me llamo. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(285, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(286, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(287, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(288, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(289, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(290, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(291, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(292, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(293, 7, 'Android. Cual es ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(294, 7, 'donde estoy. Descrip', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(295, 7, 'como me llamo. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(296, 7, 'Android. Cual es la última versión de android?', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(297, 7, 'que es la criptografia. Muy complejo', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(298, 7, 'es importante la criptografia?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(299, 6, 'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(300, 7, 'truecrypt es bueno?. lo he usado en linux nomas', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(301, 6, 'cual es la complejidad del uso kasperky?. consola', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(302, 7, 'como funcionan los startups?. La financiacion de estos es algo compleja', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(303, 6, 'que es android?. Descripcion', 'No respondida', NULL);
INSERT INTO `consulta` VALUES(304, 7, 'Android. Cual es ', 'No respondida', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `encuesta`
--

CREATE TABLE `encuesta` (
  `idencuesta` int(11) NOT NULL AUTO_INCREMENT,
  `idevento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`idencuesta`),
  KEY `fk_ENCUESTA_EVENTO` (`idevento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `encuesta`
--

INSERT INTO `encuesta` VALUES(1, 1, '¿Qué opina del evento HTML5 Y CSS3?', 'No respondida');

-- --------------------------------------------------------

--
-- Table structure for table `entrada`
--

CREATE TABLE `entrada` (
  `identrada` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idevento` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `asistencia` char(2) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`identrada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `entrada`
--

INSERT INTO `entrada` VALUES(1, 6, 1, '1229', 'Sí');
INSERT INTO `entrada` VALUES(2, 7, 1, '1230', 'Sí');
INSERT INTO `entrada` VALUES(3, 8, 1, '1231', 'Sí');
INSERT INTO `entrada` VALUES(4, 13, 1, '1232', 'Sí');
INSERT INTO `entrada` VALUES(5, 14, 1, '1233', 'No');
INSERT INTO `entrada` VALUES(6, 16, 23, '1234', 'Sí');
INSERT INTO `entrada` VALUES(7, 17, 23, '1235', 'Sí');
INSERT INTO `entrada` VALUES(8, 28, 23, '1228', 'No');
INSERT INTO `entrada` VALUES(9, 29, 29, '1236', 'Sí');
INSERT INTO `entrada` VALUES(10, 30, 30, '1237', 'No');
INSERT INTO `entrada` VALUES(11, 31, 30, '1238', 'No');
INSERT INTO `entrada` VALUES(12, 32, 33, '1239', 'No');
INSERT INTO `entrada` VALUES(13, 33, 34, '1240', 'No');
INSERT INTO `entrada` VALUES(14, 34, 34, '1241', 'No');
INSERT INTO `entrada` VALUES(15, 35, 34, '1242', 'No');
INSERT INTO `entrada` VALUES(18, 39, 30, '1243', 'No');
INSERT INTO `entrada` VALUES(19, 3, 28, '1244', 'No');
INSERT INTO `entrada` VALUES(28, 39, 47, '86970064ea53b6d66b7c53cbc91c58b4f06fc6fd', 'no');
INSERT INTO `entrada` VALUES(30, 39, 57, 'fc074d501302eb2b93e2554793fcaf50b3bf7291', 'no');
INSERT INTO `entrada` VALUES(31, 3, 57, 'b7eb6c689c037217079766fdb77c3bac3e51cb4c', 'no');
INSERT INTO `entrada` VALUES(34, 3, 55, '1218', 'no');
INSERT INTO `entrada` VALUES(38, 46, 29, '8273', 'no');
INSERT INTO `entrada` VALUES(39, 39, 50, '7844', 'no');
INSERT INTO `entrada` VALUES(40, 39, 29, '5489', 'no');
INSERT INTO `entrada` VALUES(41, 3, 29, '7679', 'no');
INSERT INTO `entrada` VALUES(42, 47, 22, '8966', 'no');
INSERT INTO `entrada` VALUES(46, 50, 29, '2634', 'no');
INSERT INTO `entrada` VALUES(45, 50, 55, '2451', 'no');
INSERT INTO `entrada` VALUES(47, 51, 30, '3474', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `horainicio` time NOT NULL,
  `horafin` time NOT NULL,
  `horaregistro` time NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `latitud` decimal(17,15) NOT NULL,
  `longitud` decimal(17,15) NOT NULL,
  `destacado` tinyint(4) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nroentradas` int(11) DEFAULT NULL,
  `entradasvendidas` int(11) DEFAULT NULL,
  `preciounit` decimal(5,2) DEFAULT NULL,
  `fechalimite` date DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `idorganizador` int(11) NOT NULL,
  PRIMARY KEY (`idevento`,`idusuario`),
  KEY `fk_EVENTO_MODERADOR1` (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` VALUES(1, 'HTML5 Y CSS3', 'Este evento buscara profundizar los conocimientos del reciente HTML5 y el CSS3 aplicando en la construccion de sitios web hoy en dia.', '2014-10-01', '2014-10-01', '09:00:00', '13:00:00', '08:00:00', 'Hotel Sheraton', -12.056854000000000, -77.036701000000000, 1, 'Activo', 4, 120, 15, 0.00, '2014-10-01', '1', 3);
INSERT INTO `evento` VALUES(22, 'Como venderle a un esceptico', 'Tacticas valiosas para poder aumentar la fuerza de ventas personal o su negocio.', '2014-03-30', '2014-03-30', '09:00:00', '13:00:00', '08:00:00', 'Hotel Westin Libertador', -12.091423000000000, -77.025030000000000, 1, 'Activo', 4, 100, 99, 0.00, '2014-03-30', '', 3);
INSERT INTO `evento` VALUES(23, 'Programacion con android', 'Evento para todos los desarrolladores con afinidad a las aplicaciones moviles bajo la plataforma android', '2013-10-19', '2013-10-19', '09:00:00', '13:00:00', '08:00:00', 'Universidad San Ignacio de Loyola', -12.072959000000000, -76.951979000000000, 1, 'Finalizado', 25, 233, 200, 0.00, '2013-10-18', '23', 48);
INSERT INTO `evento` VALUES(28, 'Programacion con Ruby', 'Evento especial para desarrollo en la plataforma Ruby on rails.', '2013-10-31', '2013-10-31', '10:00:00', '14:00:00', '09:00:00', 'Hotel Bolivar', -12.050590000000000, -77.035686000000000, 1, 'Finalizado', 25, 450, 450, 0.00, '2013-10-31', NULL, 3);
INSERT INTO `evento` VALUES(29, 'Angular JS', 'AngularJS es un framework de JavaScript de codigo abierto, mantenido por Google, que ayuda con la gestion de lo que se conoce como aplicaciones de una sola pagina. Su objetivo es aumentar las aplicaciones basadas en navegador con (MVC) Capacidad de Modelo Vista Controlador, en un esfuerzo para hacer que el desarrollo y las pruebas mas faciles.', '2013-11-29', '2013-11-29', '10:00:00', '14:00:00', '09:00:00', 'Centro de convenciones Scencia La Molina', -12.072518000000000, -76.955648000000000, 1, 'Activo', 25, 100, 49, 0.00, '2013-11-29', NULL, 3);
INSERT INTO `evento` VALUES(30, 'Programacion con PHP', 'PHP (acronimo recursivo de PHP: Hypertext Preprocessor) es un lenguaje de codigo abierto muy popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML.', '2013-12-03', '2013-12-03', '11:00:00', '14:00:00', '09:00:00', 'Camara de Comercio', -12.083345000000000, -77.051071000000000, 0, 'Activo', 23, 345, 233, 0.00, '2013-12-03', NULL, 3);
INSERT INTO `evento` VALUES(32, 'I Congreso de Desarrollo agil', 'El desarrollo agil de software son metodos de ingenieria del software basados en el desarrollo iterativo e incremental, donde los requerimientos y soluciones evolucionan mediante la colaboracion de grupos auto organizados y multidisciplinarios. ', '2013-11-05', '2013-11-06', '10:00:00', '16:00:00', '09:00:00', 'Centro de convenciones Scencia La Molina', -12.072518000000000, -76.955648000000000, 1, 'Finalizado', 4, 160, 156, 35.00, '2013-11-04', NULL, 48);
INSERT INTO `evento` VALUES(33, 'II Congreso de Desarrollo agil', 'El desarrollo agil de software son metodos de ingenieria del software basados en el desarrollo iterativo e incremental, donde los requerimientos y soluciones evolucionan mediante la colaboracion de grupos auto organizados y multidisciplinarios. ', '2013-11-07', '2013-11-07', '10:00:00', '14:00:00', '09:00:00', 'Camara de Comercio', -12.083345000000000, -77.051071000000000, 1, 'Finalizado', 4, 120, 120, 45.00, '2013-11-07', NULL, 48);
INSERT INTO `evento` VALUES(34, 'Desarrollo con IOS', 'iOS es un sistema operativo movil de la empresa Apple Inc. Originalmente desarrollado para el iPhone (iPhone OS), siendo despues usado en dispositivos como el iPod Touch, iPad y el Apple TV. Apple, Inc. no permite la instalación de iOS en hardware de terceros.', '2013-12-05', '2013-12-05', '11:00:00', '17:00:00', '10:00:00', 'Universidad de Lima', -12.084520000000000, -76.971377000000000, 0, 'Activo', 25, 130, 13, 0.00, '2013-12-05', NULL, 48);
INSERT INTO `evento` VALUES(47, 'Presupuestos: Gestion de finanzas y economia', 'Mecanismos agiles para la elaboracion acertada de presupuestos', '2014-02-05', '2014-02-05', '09:00:00', '14:00:00', '08:00:00', 'Hotel Bolivar', -12.050590000000000, -77.035686000000000, 1, 'Activo', 25, 160, 6, 0.00, '2014-02-05', NULL, 49);
INSERT INTO `evento` VALUES(50, 'Congreso Internacional de PMI', 'Conviertete en un profesional en proyectos. Este evento reune a experimentados ponentes que te daran la orientacion necesaria para sobresalir.', '2013-11-25', '2013-11-25', '08:00:00', '18:00:00', '07:30:00', 'Hotel Sheraton - Paseo de la Republica 170', -12.057368000000000, -77.036669000000000, 1, 'Activo', 4, 800, 124, 450.00, '2013-11-25', '50', 49);
INSERT INTO `evento` VALUES(51, 'Seminario de Marketing, Publicidad e Innovacion en Reino Unido', 'El marketing desde otro enfoque mas acomodado a la publicidad eficaz implementado en Reino Unido.', '2013-10-29', '2013-10-29', '17:30:00', '21:30:00', '17:00:00', 'Universidad de Lima - Av. Javier Prado Este cuadra 46, Urb. Monterrico', -12.084656000000000, -76.971384000000000, 1, 'Finalizado', 4, 500, 414, 320.00, '2013-10-28', '51', 49);
INSERT INTO `evento` VALUES(52, 'Conferencia sobre nuestro estado de animo', 'Que importante se ha hecho, hoy en dia, en hablar sobre el estado de animo y la forma en que las personas deben superar su soledad.', '2013-10-29', '2013-10-29', '11:00:00', '18:00:00', '10:00:00', 'Hotel Jose Antonio -Av. 28 De Julio 398, Miraflores', -12.126523000000000, -77.029588000000000, 1, 'Finalizado', 20, 350, 195, 230.00, '2013-10-29', '52', 49);
INSERT INTO `evento` VALUES(53, 'Cumbre de marketing', 'Cumbre internacional que enseñara nuevos conceptos de marketing a sus participantes', '2014-05-04', '2014-05-04', '09:00:00', '11:00:00', '08:30:00', 'Delfines hotel y casino', -12.097749000000000, -77.047855000000000, 1, 'Activo', 5, 150, 70, 750.00, '2014-05-04', '53', 49);
INSERT INTO `evento` VALUES(54, 'Bienvenido dolor y no quiero crecer', 'Evento ofrecido con la intension de contribuir con el desarrollo social y profesional de nuestros participantes', '2013-11-07', '2013-11-07', '20:00:00', '22:00:00', '19:30:00', 'Av. La Paz N° 610 - Miraflores', -12.126649000000000, -77.026974000000000, 1, 'Finalizado', 6, 90, 39, 200.00, '2013-11-06', '54', 48);
INSERT INTO `evento` VALUES(55, 'Aprende a vivir sin estres', 'Muy recurrente esta frase pero tambien muy dificil de cumplir. Los retos que la sociedad actualmente afronta con el estres.', '2013-12-12', '2013-12-12', '19:30:00', '21:30:00', '19:00:00', 'Av. Gregorio Escobedo 803 - Jesus Maria', -12.087961000000000, -77.054697000000000, 1, 'Activo', 7, 120, 64, 110.00, '2013-12-12', '55', 48);
INSERT INTO `evento` VALUES(56, 'Mente millonaria', 'Piensa como millonario, aprende a triunfar y a vincularte con el exito.', '2014-01-16', '2014-01-16', '08:30:00', '11:00:00', '08:00:00', 'Centro De Convenciones 28 De Julio', -12.128852000000000, -77.024622000000000, 1, 'Activo', 6, 250, 151, 999.99, '2014-01-16', '56', 48);
INSERT INTO `evento` VALUES(57, 'Conferencia: Sanando heridas', 'No acumules el rencor, no te llevara a nada bueno.', '2013-11-20', '2013-11-20', '20:00:00', '22:00:00', '19:30:00', 'Av. Petit Thouars 4550 - Miraflores', -12.112897000000000, -77.028795000000000, 1, 'Activo', 5, 90, 47, 50.00, '2013-11-20', '57', 48);
INSERT INTO `evento` VALUES(58, 'I congreso internacional de lideres 2013', 'Un lider es aquel que logra que la gente lo siga, no por tener un puesto algo en la empresa, sino porque estan de acuerdo con sus ideales.', '2013-11-30', '2013-11-30', '14:00:00', '18:00:00', '13:30:00', 'Av. Del Ejercito Crd. 13', -12.112897000000000, -77.028795000000000, 1, 'Finalizado', 7, 75, 30, 250.00, '2013-11-30', '58', 3);
INSERT INTO `evento` VALUES(59, 'Supera nacido para liderar 2013', 'Liderando el cambio. Opciones para sobresalir en estos tiempos.', '2013-11-07', '2013-11-07', '08:00:00', '12:00:00', '07:30:00', 'Carretera Central Km.10 - Santa Clara', -12.008008000000000, -76.863663000000000, 1, 'Finalizado', 6, 50, 25, 970.00, '2013-11-07', '59', 39);

-- --------------------------------------------------------

--
-- Table structure for table `expositor`
--

CREATE TABLE `expositor` (
  `idusuario` int(11) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_EXPOSITOR_USUARIO1` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expositor`
--

INSERT INTO `expositor` VALUES(13, 'Especialista en tecnologias de la informacion y marketing');
INSERT INTO `expositor` VALUES(16, 'Anos llevando temas como este a nivel nacional e internacional');
INSERT INTO `expositor` VALUES(21, 'Gestora reconocida en proyectos aplicando PMI.');
INSERT INTO `expositor` VALUES(22, 'Sistemas con mencion en Redes y sistemas distribuidos');
INSERT INTO `expositor` VALUES(25, '');
INSERT INTO `expositor` VALUES(26, 'Conferencista con especialidad en temas diversos relacionado a tecnologia y marketing');
INSERT INTO `expositor` VALUES(27, '');
INSERT INTO `expositor` VALUES(28, '10 anos de experiencia en el Peru y 4 en Mexico');
INSERT INTO `expositor` VALUES(29, 'Desarrollo movil');
INSERT INTO `expositor` VALUES(30, '');
INSERT INTO `expositor` VALUES(31, '');
INSERT INTO `expositor` VALUES(32, '');
INSERT INTO `expositor` VALUES(33, '');
INSERT INTO `expositor` VALUES(34, '');
INSERT INTO `expositor` VALUES(35, '');
INSERT INTO `expositor` VALUES(36, '');
INSERT INTO `expositor` VALUES(48, '');
INSERT INTO `expositor` VALUES(49, '');

-- --------------------------------------------------------

--
-- Table structure for table `moderador`
--

CREATE TABLE `moderador` (
  `idusuario` int(11) NOT NULL,
  `idorganizador` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_MODERADOR_USUARIO1` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderador`
--

INSERT INTO `moderador` VALUES(4, 3);
INSERT INTO `moderador` VALUES(20, 3);
INSERT INTO `moderador` VALUES(23, 48);
INSERT INTO `moderador` VALUES(25, 49);

-- --------------------------------------------------------

--
-- Table structure for table `opcion`
--

CREATE TABLE `opcion` (
  `idopcion` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `nromarcaciones` smallint(6) NOT NULL,
  `idencuesta` int(11) NOT NULL,
  PRIMARY KEY (`idopcion`),
  KEY `fk_OPCION_ENCUESTA1` (`idencuesta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `opcion`
--

INSERT INTO `opcion` VALUES(1, 'Excelente', 18, 1);
INSERT INTO `opcion` VALUES(2, 'Bueno', 23, 1);
INSERT INTO `opcion` VALUES(3, 'Regular', 10, 1);
INSERT INTO `opcion` VALUES(4, 'Malo', 8, 1);
INSERT INTO `opcion` VALUES(5, 'Pésimo', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizador`
--

CREATE TABLE `organizador` (
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_ORGANIZADOR_USUARIO1` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizador`
--

INSERT INTO `organizador` VALUES(3);
INSERT INTO `organizador` VALUES(17);
INSERT INTO `organizador` VALUES(20);
INSERT INTO `organizador` VALUES(23);
INSERT INTO `organizador` VALUES(25);
INSERT INTO `organizador` VALUES(27);
INSERT INTO `organizador` VALUES(28);
INSERT INTO `organizador` VALUES(29);
INSERT INTO `organizador` VALUES(30);
INSERT INTO `organizador` VALUES(31);
INSERT INTO `organizador` VALUES(32);
INSERT INTO `organizador` VALUES(33);
INSERT INTO `organizador` VALUES(34);
INSERT INTO `organizador` VALUES(35);
INSERT INTO `organizador` VALUES(36);
INSERT INTO `organizador` VALUES(39);
INSERT INTO `organizador` VALUES(47);
INSERT INTO `organizador` VALUES(48);
INSERT INTO `organizador` VALUES(49);
INSERT INTO `organizador` VALUES(57);

-- --------------------------------------------------------

--
-- Table structure for table `participante`
--

CREATE TABLE `participante` (
  `idusuario` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_PARTICIPANTE_USUARIO1` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participante`
--

INSERT INTO `participante` VALUES(6, 'Habilitado');
INSERT INTO `participante` VALUES(7, 'Habilitado');
INSERT INTO `participante` VALUES(8, 'Habilitado');
INSERT INTO `participante` VALUES(13, 'Habilitado');
INSERT INTO `participante` VALUES(14, 'Habilitado');
INSERT INTO `participante` VALUES(16, 'Habilitado');
INSERT INTO `participante` VALUES(17, 'Habilitado');
INSERT INTO `participante` VALUES(27, 'Habilitado');
INSERT INTO `participante` VALUES(28, 'Habilitado');
INSERT INTO `participante` VALUES(29, 'Habilitado');
INSERT INTO `participante` VALUES(30, 'Habilitado');
INSERT INTO `participante` VALUES(31, 'Habilitado');
INSERT INTO `participante` VALUES(32, 'Habilitado');
INSERT INTO `participante` VALUES(33, 'Habilitado');
INSERT INTO `participante` VALUES(34, 'Habilitado');
INSERT INTO `participante` VALUES(35, 'Habilitado');
INSERT INTO `participante` VALUES(36, 'No asociado');
INSERT INTO `participante` VALUES(48, 'No asociado');
INSERT INTO `participante` VALUES(49, 'No asociado');

-- --------------------------------------------------------

--
-- Table structure for table `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estado` varchar(16) NOT NULL,
  `activa` tinyint(4) NOT NULL,
  `idtema` int(11) NOT NULL,
  PRIMARY KEY (`idpregunta`),
  KEY `fk_PREGUNTA_TEMA1` (`idtema`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `pregunta`
--

INSERT INTO `pregunta` VALUES(1, '¿Piensa utilizar HTML5 en un proyecto cercano odsdvk  lejano?', 'No respondida', 1, 1);
INSERT INTO `pregunta` VALUES(2, '¿Qué tan complicadas le parecen las nuevas funcionalidades de HTML5? ', 'No respondida', 1, 1);
INSERT INTO `pregunta` VALUES(3, '¿Cuál de los siguientes navegadores utilizas?', 'No respondida', 1, 1);
INSERT INTO `pregunta` VALUES(4, 'Si trabaja haciendo webs, Ud. es', 'No respondida', 1, 1);
INSERT INTO `pregunta` VALUES(5, 'Sabe que es Android?', 'No respondida', 1, 2);
INSERT INTO `pregunta` VALUES(6, 'Android. Principios', 'Recibida', 1, 2);
INSERT INTO `pregunta` VALUES(33, '¿Hay frameworks de css?', 'Recibida', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suscripcion`
--

CREATE TABLE `suscripcion` (
  `idsuscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `idplan` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idsuscripcion`),
  KEY `fk_SUSCRIPCION_PLAN1` (`idplan`),
  KEY `fk_SUSCRIPCION_PARTICIPANTE1` (`idusuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `suscripcion`
--


-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `idtema` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(3000) DEFAULT NULL,
  `idevento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `rondapreguntas` tinyint(4) NOT NULL,
  `rondaconsultas` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtema`,`idusuario`),
  KEY `fk_TEMA_EVENTO1` (`idevento`),
  KEY `fk_TEMA_EXPOSITOR1` (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` VALUES(1, 'Novedades de HTML5', 'HTML5 will be the new standard for HTML.  The previous version of HTML, HTML 4.01, came in 1999. The internet has changed significantly since then.  HTML5 is intended to subsume not only HTML 4, but also XHTML 1 and DOM Level 2 HTML.', 1, 5, 1, 1);
INSERT INTO `tema` VALUES(2, 'Android, conceptos basicos', 'Android es un sistema operativo basado en Linux diseñado principalmente para dispositivos moviles con patalla tactil como: smatphones y tablets.', 23, 5, 0, 1);
INSERT INTO `tema` VALUES(5, 'Declaración de variables', 'Un lenguaje de programacion dinamico y de codigo abierto enfocado en la simplicidad y productividad. Su elegante sintaxis se siente natural al leerla y facil al escribirla.', 28, 26, 0, 1);
INSERT INTO `tema` VALUES(6, 'Funciones ', 'The Koans walk you along the path to enlightenment in order to learn Ruby. The goal is to learn the Ruby language, syntax, structure, and some common functions and libraries. We also teach you culture. Testing is not just something we pay lip service to, but something we live. It is essential in your quest to learn and do great things in the language.', 28, 22, 0, 1);
INSERT INTO `tema` VALUES(7, 'Definition', 'AngularJS is an open-source JavaScript framework, maintained by Google, that assists with running single-page applications. Its goal is to augment browser-based applications with model–view–controller (MVC) capability, in an effort to make both development and testing easier.', 29, 26, 0, 1);
INSERT INTO `tema` VALUES(8, 'Declaracion de variables', 'We are continuing to work through the repercussions of the php.net malware issue described in a news post earlier today. ', 30, 21, 0, 0);
INSERT INTO `tema` VALUES(9, 'Funciones ', 'All affected services have been migrated off those servers. We have verified that our Git repository was not compromised, and it remains in read only mode as services are brought back up in full.', 30, 26, 0, 0);
INSERT INTO `tema` VALUES(10, 'Funciones ', 'The library reads in HTML that contains additional custom tag attributes; it then obeys the directives in those custom attributes, and binds input or output parts of the page to a model represented by standard JavaScript variables.', 29, 26, 0, 0);
INSERT INTO `tema` VALUES(11, 'Tacticas', 'Desarrollo de tacticas de mercadeo', 22, 26, 0, 0);
INSERT INTO `tema` VALUES(12, 'Casos practicos', 'Desarrollo de casos practicos para aprendizaje real de participantes', 22, 16, 0, 0);
INSERT INTO `tema` VALUES(13, 'Audio y video', 'The HTML 5 working group includes AOL, Apple, Google, IBM, Microsoft, Mozilla, Nokia, Opera, and hundreds of other vendors.  HTML5 is still a work in progress. However, all major browsers support many of the new HTML5 elements and APIs.', 1, 22, 0, 0);
INSERT INTO `tema` VALUES(14, 'Scrum orientado a Ruby', 'What is Scrum? Scrum is a way for teams to work together to develop a product. Product development, using Scrum, occurs in small pieces, with each piece building upon previously created pieces. Building products one small piece at a time encourages creativity and enables teams to respond to feedback and change, to build exactly and only what is needed.', 33, 13, 0, 0);
INSERT INTO `tema` VALUES(15, 'Streaming en HTML5', 'HTML5 is also cross-platform (it does not care whether you are using a tablet or a smartphone, a netbook, notebook or a Smart TV).  HTML5 can also be used to write web applications that still work when you are not online.', 1, 26, 0, 0);
INSERT INTO `tema` VALUES(16, 'Declaracion de variables', 'iOS is the world’s most advanced mobile operating system, continually redefining what people can do with a mobile device. Together, the iOS SDK and Xcode IDE make it easy for developers to create revolutionary mobile apps.', 34, 26, 1, 1);
INSERT INTO `tema` VALUES(17, 'Excepciones', 'Derived from core OS X technologies, the amazing user experience of iOS has been streamlined to take maximum advantage of iPhone, iPad, and iPod touch hardware. Technologies shared between iOS and OS X include the OS X kernel, BSD sockets for networking, and Objective-C and C/C++ compilers for native performance.', 34, 22, 1, 1);
INSERT INTO `tema` VALUES(18, 'Presupuesto', 'Desarrollo de casos practicos sobre presupuesto de empresas peruanas.', 47, 5, 0, 0);
INSERT INTO `tema` VALUES(19, 'Numeros', 'Estrategias numericas para finanzas', 47, 26, 0, 0);
INSERT INTO `tema` VALUES(20, 'Videoconfrencia con HTML5', 'HTML5 is a cooperation between the World Wide Web Consortium (W3C) and the Web Hypertext Application Technology Working Group (WHATWG).  WHATWG was working with web forms and applications, and W3C was working with XHTML 2.0. In 2006, they decided to cooperate and create a new version of HTML.', 1, 5, 0, 0);
INSERT INTO `tema` VALUES(43, 'Conceptos generales', 'Somos un grupo de practicantes de metodos agiles de desarrollo de software distribuidos por Latinoamerica.', 32, 28, 0, 0);
INSERT INTO `tema` VALUES(44, 'Consultoría sobre metodos agiles', 'Ofrecemos un servicio de acompañamiento, coaching y mentoring integral para aplicar los metodos agiles de organizacion de equipos en areas de innovacion como marketing, direccion organizacional, diseño de productos y servicios, y desarrollo de software.', 32, 16, 0, 0);
INSERT INTO `tema` VALUES(45, 'Desarrollo android', 'A new version of Android is here, with great new features, APIs, and tools for developers.  Android 4.4 is built to run on more devices than ever before, and gives you more ways to showcase your content and create beautiful, useful, and innovative apps.', 23, 21, 0, 0);
INSERT INTO `tema` VALUES(50, 'PMBOK', 'Aplicación de la extension para la construcción del PMBOK a la Gerencia de Proyectos', 50, 21, 0, 0);
INSERT INTO `tema` VALUES(51, 'Seguimiento y control', 'Seguimiento y control de proyectos ejecutados por terceros', 50, 13, 0, 0);
INSERT INTO `tema` VALUES(56, 'La revolucion', 'Creatividad, storytelling y la revolucion transmediatica', 51, 28, 0, 0);
INSERT INTO `tema` VALUES(57, 'La era digital', 'El emprendimiento y las plataformas digitales', 51, 22, 0, 0);
INSERT INTO `tema` VALUES(59, 'Prevencion de tristeza', 'El Origen y Prevencion de las Enfermedades', 52, 16, 0, 0);
INSERT INTO `tema` VALUES(62, 'Neuromarketing', 'Concepto de neuromarketing', 53, 26, 0, 0);
INSERT INTO `tema` VALUES(63, 'El futuro del marketing', 'Coyuntura social del marketing', 53, 21, 0, 0);
INSERT INTO `tema` VALUES(67, 'BIENVENIDO DOLOR Y NO QUIERO CRECER', 'La gran conferencista nos dara su punto de vista sobre el dolor', 54, 28, 0, 0);
INSERT INTO `tema` VALUES(75, 'No a la violencia', 'Por una sociedad libre de violencia y estres', 55, 28, 0, 0);
INSERT INTO `tema` VALUES(79, 'Haciendo millonarios en 1 2 y 3', 'Despierta tu inteligencia millonaria', 56, 13, 0, 0);
INSERT INTO `tema` VALUES(80, 'SANANDO HERIDAS', 'Terapia personal para la autosuperacion', 57, 21, 0, 0);
INSERT INTO `tema` VALUES(83, 'Liderazgo en el mundo', 'Explicacion de como actua un lider en el 2013', 58, 21, 0, 0);
INSERT INTO `tema` VALUES(84, 'Herramientas para mejorar la convicción', 'Como prepararse mentalmente para lograr seguridad en el accionar', 58, 13, 0, 0);
INSERT INTO `tema` VALUES(90, 'Programa avanzado de liderazgo', 'Conviertete en un lider digno de seguir en tu entorno familiar, profesional y amical.', 59, 13, 0, 0);
INSERT INTO `tema` VALUES(91, 'Postura correcta en un debate', NULL, 60, 5, 0, 0);
INSERT INTO `tema` VALUES(92, 'Mirando al futuro', NULL, 57, 21, 0, 0);
INSERT INTO `tema` VALUES(93, 'Si se puede', NULL, 57, 26, 0, 0);
INSERT INTO `tema` VALUES(94, 'Videoconfrencia con HTML5', NULL, 1, 28, 0, 0);
INSERT INTO `tema` VALUES(95, 'Por qué emprender', NULL, 56, 13, 0, 0);
INSERT INTO `tema` VALUES(96, 'Adiós jefes', NULL, 56, 16, 0, 0);
INSERT INTO `tema` VALUES(97, 'Primeros pasos con IOS', NULL, 61, 26, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `apepat` varchar(30) NOT NULL,
  `apemat` varchar(30) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `dni` char(8) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `celular` varchar(13) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `distrito` varchar(100) NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `dni_UNIQUE` (`dni`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` VALUES(3, 'Arias', 'lalalalal', 'Enrique', '34343434', 'organizador', 'ROLFCORTEZ120@HOTMAIL.COM', '', '', 'jr lucas podolski', 'San Juan de', 'earias', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(4, 'Peralta', 'Vela', 'Adrian', '49932940', 'moderador', 'e_adrianv@gmail.com', '', '', 'Jr. Los programadores 666', 'San Martín de Porres', 'aperalta', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(5, 'Cortez', 'Dios', 'Rolf', '49703423', 'expositor', 'rolfcortez@gmail.com', '', '', 'Jr. Los Expositores 347', 'Comas', 'rcortez', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(6, 'Muñoz', 'Gamarra', 'Angela Maria', '49071073', 'participante', 'angela.munoz.gamarra@gmail.com', '', '', 'Av. Las Lomas 458', 'San Borja', 'amuñoz', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(7, 'Aldana', 'Solano', 'Patricia', '48973963', 'participante', 'patty.aldana@gmail.com', '', '', 'Jr. Los teclados 976', 'Surco', 'pattyald', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(8, 'Vilchez ', 'Rodríguez', 'Diego', '74340578', 'participante', 'divilcher@correo.com', '', '', 'Jr. Los frenos 675', 'San Luis', 'divilchez', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(13, 'Perez', 'Vasquez', 'Liliana', '29741310', 'expositor', 'liperezv@empresa,com', '4394872', '991155828', 'Jr. Jirón 234', 'La Molina', 'lperezv', '098765');
INSERT INTO `usuario` VALUES(14, 'Samanez', 'Ocampo', 'Raul', '39465972', 'participante', 'iwjrfierg@algo.com', '2116546', '989465413', 'Jr. De prueba 6312', 'San Isidro', 'rausaman', 'rausaman');
INSERT INTO `usuario` VALUES(16, 'Fernandez', 'Guerra', 'Nicolas Niko', '56464562', 'expositor', 'nikolasnik@gmail.com', '5641231', '945112154', 'Av. Los Tulipanes 485', 'Magdalena', 'nikolasnik', '3b5876547579497f05780e39d511de24e71bac6c');
INSERT INTO `usuario` VALUES(17, 'Huacachi', 'Meza', 'Elizabeth', '57437356', 'participante', 'el.huaca@trabajo.pe', '2456432', '921643215', 'Av. Las Quenas 345', 'San Isidro', 'elizhu', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
INSERT INTO `usuario` VALUES(20, 'Rojas ', 'Rojas', 'Claudia ', '56345232', 'moderador', 'eclaudiar@gmail.com', '3561132', '941773983', 'Jr. Las Reservas 478', 'La Molina', 'claudiarojas', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(21, 'Lozada', 'Cornejo', 'Gabriela', '48335698', 'expositor', 'gabydis@hotmail.com', '2554568', '913548412', 'Av. Las Orquestas 579', 'San Isidro', 'gabydis', 'a15c59b8416f4f763b3f0ff01b0cf4910240cadc');
INSERT INTO `usuario` VALUES(22, 'Rivera ', 'Salazar', 'Miguel', '57923865', 'expositor', 'elcriclri@yahoo.com', '2357891', '946514321', 'Jr. Las Oropéndolas 934', 'Breña', 'miguelcricri', '7ab515d12bd2cf431745511ac4ee13fed15ab578');
INSERT INTO `usuario` VALUES(23, 'Muñoz ', 'Castro', 'Gerardo MArtín', '63492692', 'moderador', 'elgeral@hotmail.com', '3654532', '911321641', 'Av. Isabel La Católica 123', '', 'gmunozc', 'e0c95748a455c27a80fd289269120d4944d1f318');
INSERT INTO `usuario` VALUES(25, 'Lozada', 'Castro', 'Gabriela', '49741310', 'moderador', 'gabyloza@gmail.com', '2116541', '911321643', 'Jr. De prueba 612', 'San Borja', 'gabyloza', '4a9c0e5a8d59ef7073656d12428cd6c3d64839f3');
INSERT INTO `usuario` VALUES(26, 'Llanos', 'Quevedo', 'Ruperto', '45678912', 'expositor', 'rllanos@terra.com.pe', '5645781', '987156421', 'Jr. Los Portales 127', 'San Borja', 'ruperto', '7ab515d12bd2cf431745511ac4ee13fed15ab578');
INSERT INTO `usuario` VALUES(28, 'Gonzales', 'Prado', 'RobertoAnselmo', '26598270', 'expositor', 'robeanselmo@gmail.com', '3197364', '963742342', 'Jr. Las vacaciones 297', 'Villa El Salvador', 'robeanselmo', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(30, 'Robles', 'Castro', 'Francisco', '12345679', 'participante', 'frobles@gmail.com', '4394871', '987922490', 'Jr. Las vacaciones 216', 'Villa María del Triunfo', 'frobles', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(31, 'Reátegui ', 'López', 'Javier', '36598270', 'participante', 'jreateg@hotmail.com', '2456122', '987919493', 'Av. Las Quenas 341', 'Villa El Salvador', 'jreateg', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(32, 'Alcázar', 'Fernández', 'Fernanda', '83235325', 'participante', 'feralc@hotmail.com', '7394872', '943155828', 'Jr. Las memorias 647', 'Miraflores', 'feralc', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(33, 'Castro', 'Velarde', 'Ramiro', '34453321', 'participante', 'ramirin@gmail.com', '3145365', '901155827', 'Jr. Las memorias 611', 'Breña', 'ramirin', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(34, 'Díaz', 'martínez', 'Diego', '12345676', 'participante', 'dieguito@gmail.com', '4394878', '991055828', 'Av. La Universidad 399', 'Breña', 'dieguito', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(35, 'Quispe', 'Mamani', 'Ermenegildo', '98526332', 'participante', 'equispe@empresa.com.pe', '3205365', '991155827', 'Jr. Las vacaciones 291', 'San Borja', 'equispe', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(36, 'Rojas', 'Huerta', 'Fabiola', '12245670', 'participante', 'frojas@usil.pe', '4394872', '981155827', 'Jr. Jirón 236', 'San Borja', 'frojas', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');
INSERT INTO `usuario` VALUES(39, 'Cortez', 'Dios', 'Rolf', '45654713', 'organizador', 'ROLFCORTEZ120@HOTMAIL.COM', '', '', 'Calle comercial mz u lote 11', 'Ate', 'Rolf', '77aa1026e89be0ca81722a3920e4a32c7960775f');
INSERT INTO `usuario` VALUES(42, 'galarza', 'leiva', 'johan', '23434543', 'usuario', 'ROLFCORTEZ120@HOTMAIL.COM', '', '', 'Calle comercial mz u lote 23', 'Ate', 'johan', '20047f8a1892aa0b2c3c8894ac650ae1fe6ad1ef');
INSERT INTO `usuario` VALUES(47, 'Aldana', 'Solano', 'Patricia', '45245470', 'organizador', 'patty.aldana@gmail.com', '', '', 'Av. Las Manzanas', 'Surco', 'milfiue', 'e5d354655b208a7b6b7776568256fbeb2790f033');
INSERT INTO `usuario` VALUES(48, 'Delgado', 'Cáceres', 'Jorge', '12345671', 'organizador', 'jdelgado@gmail.com', '4394872', '963742342', 'Av. La Universidad 399', 'La Molina', 'jdelgado', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(49, 'Rojas', 'Talledo', 'Roy', '90326332', 'organizador', 'rrojas@gmail.com', '5456432', '961321041', 'Av. La Universidad 392', 'San Isidro', 'rrojas', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(50, 'Loayza', 'Acosta', 'Angie ', '46383580', 'participante', 'angela_mg20@hotmail.com', '', '', 'calle las gaviotas 122', 'San isidro', 'angiemg20', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(51, 'apellido 1', 'apellido 2', 'usuario 1', '46358590', 'usuario', 'angela_mg20@hotmail.com', '', '', 'jr. las gaviotas 1991', 'Santiago de surco', 'usuario1', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(52, 'dasdas', 'dasdasd', 'dasda', 'dfgfs', 'usuario', 'goleador@gmail.com', '', '', 'fsdffs', 'fsdfsd', 'goleador', 'db467f9fdde1dee1fb0989eba02436e876596cdd');
INSERT INTO `usuario` VALUES(53, 'gfh', 'hg', 'dasddfg', 'hgfghgf', 'usuario', 'goleador1@gmail.com', '', '', 'hfdg', 'fghfgh', 'goleador1', '915c2deb19e5b55f77757a5ea641b446ce61a798');
INSERT INTO `usuario` VALUES(54, 'fasd', 'fads', 'sadf', 'fds', 'usuario', 'goleador2@gmail.com', '', '', 'fds', 'sfad', 'goleador2', '636a42c6fb8dbdab22c6f9df38dc19c33b5deaac');
INSERT INTO `usuario` VALUES(55, 'piopui', 'puiopio', 'ipouiop', 'uuuuu', 'usuario', 'goleador3@gmail.com', '', '', 'ipupipiou', 'upiop', 'goleador3', '3cc3b0ce8f2baf09c325dc26843a14673e3b4b38');
INSERT INTO `usuario` VALUES(56, 'oyiuoyui', 'oyuioyui', 'yoi', 'iiiii', 'usuario', 'goleador4@gmail.com', '', '', 'uioyuio', 'uioyiu', 'goleador4', 'ce59c43ef640618cad4ab2b5946b10b762d2cad7');
INSERT INTO `usuario` VALUES(57, 'tttt', 'ttttt', 'ttt', 'ttttt', 'organizador', 'goleador5@gmail.com', '', '', 'ttt', 'tttt', 'goleador5', '89d14ddb15c7182c9a7cb32becc0809e0e45b757');
INSERT INTO `usuario` VALUES(58, 'eqw', 'eqw', 'qew', 'eqw', 'usuario', 'goleador12@gmail.com', '', '', 'eqw', 'eqw', 'goleador12', '5e354ca1a3226db0ebc8d8801d8e4cf299670ceb');
INSERT INTO `usuario` VALUES(59, 'afsdasd', 'fsdf', 'asdfsd', 'saffsad', 'usuario', 'goleador14@gmail.com', '', '', 'fsdfds', 'fsfsadfs', 'goleador14', '1556d7ec0fd58bfd7e568418e6206578c1b9dd27');
INSERT INTO `usuario` VALUES(60, 'Silva', 'Viena', 'Tania', '46383596', 'usuario', 'angela_mg20@hotmail.com', '', '', 'plaza volumetria 112', 'Santiago de surco', 'tatirit', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(61, 'Acosta', 'Martinez', 'Patty', '46383577', 'usuario', 'angela_mg20@hotmail.com', '', '', 'las flores 123', 'Santiago de surco', 'pawm.90', '7c4a8d09ca3762af61e59520943dc26494f8941b');
INSERT INTO `usuario` VALUES(62, 'tertert', 'etrtwer', 'sfdterwter', 'tert', 'usuario', 'angela_mg20@gmail.com', '', '', 'twerte', 'tewrter', 'angelaangela', 'abae854dceb7a01ab186d14e8e024480e917af31');
