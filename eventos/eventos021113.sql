CREATE DATABASE  IF NOT EXISTS `eventos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eventos`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: eventos
-- ------------------------------------------------------
-- Server version	5.5.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `moderador`
--

DROP TABLE IF EXISTS `moderador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderador` (
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_MODERADOR_USUARIO1` (`idusuario`),
  CONSTRAINT `fk_MODERADOR_USUARIO1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderador`
--

LOCK TABLES `moderador` WRITE;
/*!40000 ALTER TABLE `moderador` DISABLE KEYS */;
INSERT INTO `moderador` VALUES (4),(17),(20),(23),(25),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36);
/*!40000 ALTER TABLE `moderador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante_evento`
--

DROP TABLE IF EXISTS `participante_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participante_evento` (
  `idevento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `asistencia` char(2) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`idevento`,`idusuario`),
  KEY `fk_PARTICIPANTE_EVENTO_EVENTO1` (`idevento`),
  KEY `fk_PARTICIPANTE_EVENTO_PARTICIPANTE1` (`idusuario`),
  CONSTRAINT `fk_PARTICIPANTE_EVENTO_EVENTO1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_PARTICIPANTE_EVENTO_PARTICIPANTE1` FOREIGN KEY (`idusuario`) REFERENCES `participante` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante_evento`
--

LOCK TABLES `participante_evento` WRITE;
/*!40000 ALTER TABLE `participante_evento` DISABLE KEYS */;
INSERT INTO `participante_evento` VALUES (1,6,'Sí'),(1,7,'Sí'),(1,8,'Sí'),(1,13,'Sí'),(1,14,'No'),(23,16,'Sí'),(23,17,'Sí'),(23,28,'No'),(29,29,'Sí'),(30,30,'No'),(30,31,'No'),(33,32,'No'),(34,33,'No'),(34,34,'No'),(34,35,'No');
/*!40000 ALTER TABLE `participante_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos` (
  `idarchivo` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(100) NOT NULL,
  `idtema` int(11) NOT NULL,
  PRIMARY KEY (`idarchivo`),
  KEY `fk_ARCHIVOS_TEMA1` (`idtema`),
  CONSTRAINT `fk_ARCHIVOS_TEMA1` FOREIGN KEY (`idtema`) REFERENCES `tema` (`idtema`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estado` varchar(16) NOT NULL,
  `activa` tinyint(4) NOT NULL,
  `idtema` int(11) NOT NULL,
  PRIMARY KEY (`idpregunta`),
  KEY `fk_PREGUNTA_TEMA1` (`idtema`),
  CONSTRAINT `fk_PREGUNTA_TEMA1` FOREIGN KEY (`idtema`) REFERENCES `tema` (`idtema`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (1,'¿Piensa utilizar HTML5 en un proyecto cercano o lejano?','No respondida',1,1),(2,'¿Qué tan complicadas le parecen las nuevas funcionalidades de HTML5? ','No respondida',1,1),(3,'¿Cuál de los siguientes navegadores utilizas?','No respondida',1,1),(4,'Si trabaja haciendo webs, Ud. es','No respondida',1,1),(5,'Sabe que es Android?','No respondida',1,2),(6,'Android. Principios','Recibida',1,2);
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcion`
--

DROP TABLE IF EXISTS `opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opcion` (
  `idopcion` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `nromarcaciones` smallint(6) NOT NULL,
  `idencuesta` int(11) NOT NULL,
  PRIMARY KEY (`idopcion`),
  KEY `fk_OPCION_ENCUESTA1` (`idencuesta`),
  CONSTRAINT `fk_OPCION_ENCUESTA1` FOREIGN KEY (`idencuesta`) REFERENCES `encuesta` (`idencuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion`
--

LOCK TABLES `opcion` WRITE;
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
INSERT INTO `opcion` VALUES (1,'Excelente',18,1),(2,'Bueno',23,1),(3,'Regular',10,1),(4,'Malo',8,1),(5,'Pésimo',2,1);
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `estado` varchar(22) NOT NULL,
  `respuesta` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idconsulta`),
  KEY `fk_CONSULTA_PARTICIPANTE1` (`idusuario`),
  CONSTRAINT `fk_CONSULTA_PARTICIPANTE1` FOREIGN KEY (`idusuario`) REFERENCES `participante` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (1,6,'¿Lo soporta la última versión de Dreamweaver?','No respondida',NULL),(2,6,'¿Cómo es la curva de aprendizaje?','Respondida en evento',NULL),(3,6,'¿Internet Explorer lo renderiza bien?','Respondida en evento',NULL),(4,7,'¿Es verdad que con CSS3 se puede hacer 3D?','Respondida en evento',NULL),(5,7,'¿Una sóla página sirve para cualquier dispositivo cliente?','No respondida',NULL),(72,7,'¿Cómo se visualiza en navegadores antiguos?','Respondida en evento',NULL),(73,8,'¿Es muy complicado editarlo desde código?','No respondida',NULL),(74,6,'¿Se pueden crear juegos y videos sin librerías de terceros?','No respondida',NULL),(127,6,'¿Todos los móviles lo soportan?','Respondida en evento',NULL),(128,8,'¿Cuál es su futuro?','Respondida en evento',NULL),(129,16,'¿Algún Nokia lo soporta?','No respondida',NULL),(130,28,'¿Hay versión para pcs?','No respondida',NULL),(187,7,'Android. Cual es la última versión de android?','Respondida en evento',NULL),(188,7,'que es la criptografia. Muy complejo','Respondida en evento',NULL),(189,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(190,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','Respondida en evento',NULL),(191,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(192,6,'cual es la complejidad del uso kasperky?. consola','Respondida en evento',NULL),(193,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(194,6,'que es android?. Descripcion','No respondida',NULL),(195,7,'Android. Cual es ','No respondida',NULL),(196,7,'Android. Cual es la última versión de android?','No respondida',NULL),(197,7,'que es la criptografia. Muy complejo','No respondida',NULL),(198,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(199,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(200,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(201,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(202,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(203,6,'que es android?. Descripcion','No respondida',NULL),(204,7,'Android. Cual es ','No respondida',NULL),(205,7,'Android. Cual es la última versión de android?','No respondida',NULL),(206,7,'que es la criptografia. Muy complejo','No respondida',NULL),(207,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(208,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(209,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(210,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(211,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(212,6,'que es android?. Descripcion','No respondida',NULL),(213,7,'Android. Cual es ','No respondida',NULL),(214,7,'Android. Cual es la última versión de android?','No respondida',NULL),(215,7,'que es la criptografia. Muy complejo','No respondida',NULL),(216,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(217,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','Respondida en evento',NULL),(218,7,'truecrypt es bueno?. lo he usado en linux nomas','Respondida en evento',NULL),(219,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(220,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(221,6,'que es android?. Descripcion','No respondida',NULL),(222,7,'Android. Cual es ','No respondida',NULL),(223,7,'Android. Cual es la última versión de android?','No respondida',NULL),(224,7,'que es la criptografia. Muy complejo','No respondida',NULL),(225,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(226,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(227,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(228,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(229,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(230,6,'que es android?. Descripcion','No respondida',NULL),(231,7,'Android. Cual es ','No respondida',NULL),(232,7,'Android. Cual es la última versión de android?','Respondida en evento',NULL),(233,7,'que es la criptografia. Muy complejo','No respondida',NULL),(234,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(235,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(236,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(237,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(238,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(239,6,'que es android?. Descripcion','No respondida',NULL),(261,7,'donde estoy. Descrip','No respondida',NULL),(262,7,'como me llamo. Descripcion','No respondida',NULL),(263,7,'Android. Cual es la última versión de android?','No respondida',NULL),(264,7,'que es la criptografia. Muy complejo','No respondida',NULL),(265,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(266,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(267,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(268,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(269,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(270,6,'que es android?. Descripcion','No respondida',NULL),(271,7,'Android. Cual es ','No respondida',NULL),(272,7,'donde estoy. Descrip','No respondida',NULL),(273,7,'como me llamo. Descripcion','No respondida',NULL),(274,7,'Android. Cual es la última versión de android?','No respondida',NULL),(275,7,'que es la criptografia. Muy complejo','No respondida',NULL),(276,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(277,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(278,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(279,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(280,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(281,6,'que es android?. Descripcion','Respondida en evento',NULL),(282,7,'Android. Cual es ','No respondida',NULL),(283,7,'donde estoy. Descrip','No respondida',NULL),(284,7,'como me llamo. Descripcion','No respondida',NULL),(285,7,'Android. Cual es la última versión de android?','No respondida',NULL),(286,7,'que es la criptografia. Muy complejo','No respondida',NULL),(287,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(288,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(289,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(290,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(291,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(292,6,'que es android?. Descripcion','No respondida',NULL),(293,7,'Android. Cual es ','No respondida',NULL),(294,7,'donde estoy. Descrip','No respondida',NULL),(295,7,'como me llamo. Descripcion','No respondida',NULL),(296,7,'Android. Cual es la última versión de android?','No respondida',NULL),(297,7,'que es la criptografia. Muy complejo','No respondida',NULL),(298,7,'es importante la criptografia?. Descripcion','No respondida',NULL),(299,6,'cual es el algoritmo que va a desapercer?. Estaba pensando en DES simple ','No respondida',NULL),(300,7,'truecrypt es bueno?. lo he usado en linux nomas','No respondida',NULL),(301,6,'cual es la complejidad del uso kasperky?. consola','No respondida',NULL),(302,7,'como funcionan los startups?. La financiacion de estos es algo compleja','No respondida',NULL),(303,6,'que es android?. Descripcion','No respondida',NULL),(304,7,'Android. Cual es ','No respondida',NULL);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alternativa`
--

DROP TABLE IF EXISTS `alternativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alternativa` (
  `idalternativa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nromarcaciones` smallint(6) NOT NULL,
  `idpregunta` int(11) NOT NULL,
  PRIMARY KEY (`idalternativa`),
  KEY `fk_ALTERNATIVA_PREGUNTA1` (`idpregunta`),
  CONSTRAINT `fk_ALTERNATIVA_PREGUNTA1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternativa`
--

LOCK TABLES `alternativa` WRITE;
/*!40000 ALTER TABLE `alternativa` DISABLE KEYS */;
INSERT INTO `alternativa` VALUES (1,'Tal vez',9,1),(2,'Sí',11,1),(3,'No',13,1),(4,'Ya lo utilizo',12,1),(5,'Muy difícil',33,2),(6,'Difícil',29,2),(7,'Normal',15,2),(8,'Fácil',15,2),(9,'Muy fácil',22,2),(10,'Internet Explorer',2,3),(11,'Firefox',9,3),(12,'Chrome',23,3),(13,'Safari',29,3),(14,'Otros',3,3),(15,'Programador web',24,4),(16,'Diseñador web',22,4),(17,'QA',3,4),(18,'Bastante',4,5),(19,'Mas o menos',20,5),(20,'Poco',2,5),(21,'Hice 5 proy',30,6),(22,'Hice 3 proy',10,6),(23,'No hice proy',5,6);
/*!40000 ALTER TABLE `alternativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta` (
  `idencuesta` int(11) NOT NULL AUTO_INCREMENT,
  `idevento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`idencuesta`),
  KEY `fk_ENCUESTA_EVENTO` (`idevento`),
  CONSTRAINT `fk_ENCUESTA_EVENTO` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
INSERT INTO `encuesta` VALUES (1,1,'¿Qué opina del evento HTML5 Y CSS3?','No respondida');
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
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
  `fechalimite` datetime DEFAULT NULL,
  PRIMARY KEY (`idevento`,`idusuario`),
  KEY `fk_EVENTO_MODERADOR1` (`idusuario`),
  CONSTRAINT `fk_EVENTO_MODERADOR1` FOREIGN KEY (`idusuario`) REFERENCES `moderador` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'HTML5 Y CSS3','2013-10-01','2013-10-01','09:00:00','13:00:00','08:00:00','Hotel Sheraton',10.000000000000000,11.000000000000000,1,'Activo',4,120,115,20.00,'2013-09-30 00:00:00'),(22,'Cómo venderle a un escéptico','2013-09-30','2013-09-30','09:00:00','13:00:00','08:00:00','Hotel Los Portales',10.120000000000000,32.120000000000000,1,'Finalizado',4,100,98,40.00,'2013-09-29 00:00:00'),(23,'Programacion de disp moviles con android','2013-10-19','2013-10-19','09:00:00','13:00:00','08:00:00','USIL',12.120000000000000,10.120000000000000,1,'Activo',25,NULL,NULL,NULL,NULL),(28,'Programación con Ruby','2013-10-31','2013-10-31','10:00:00','14:00:00','09:00:00','Hotel Bolívar',10.120000000000000,32.120000000000000,1,'Pendiente',25,NULL,NULL,NULL,NULL),(29,'Angular JS','2013-11-19','2013-11-19','10:00:00','14:00:00','09:00:00','Centro de convenciones El Huaralino',10.120000000000000,50.120000000000000,1,'Activo',25,100,0,20.00,'2013-11-15 00:00:00'),(30,'Programación con PHP','2013-10-31','2013-10-31','11:00:00','14:00:00','09:00:00','Cámara de Comercio',10.120000000000000,32.120000000000000,0,'Activo',23,NULL,NULL,NULL,NULL),(31,'I Congreso de Desarrollo ágil','2013-11-05','2013-11-06','10:00:00','14:00:00','09:00:00','Centro de convenciones El Huaralino',10.120000000000000,-32.120000000000000,1,'Pendiente',4,160,0,35.00,NULL),(32,'I Congreso de Desarrollo ágil','2013-11-05','2013-11-06','10:00:00','16:00:00','09:00:00','Centro de convenciones El Huaralino',10.120000000000000,-32.120000000000000,1,'Activo',4,160,0,35.00,'2013-11-04 00:00:00'),(33,'II Congreso de Desarrollo ágil','2013-11-11','2013-11-11','10:00:00','14:00:00','09:00:00','Cámara de Comercio',-14.000000000000000,-32.120000000000000,1,'Activo',4,120,0,45.00,'0000-00-00 00:00:00'),(34,'Desarrollo con IOS','2013-11-05','2013-11-06','11:00:00','17:00:00','10:00:00','Centro de convenciones El Huaralino',-14.000000000000000,-32.120000000000000,0,'Activo',25,130,0,42.00,'0000-00-00 00:00:00'),(44,'Congreso Internacional de Dirección de Proyectos PMI','2013-11-25','2013-11-25','08:00:00','18:00:00','07:30:00','Hotel Sheraton - Paseo de la República 170',-12.057368000000000,-77.036669000000000,1,'Activo',4,800,123,450.00,'2013-11-25 00:00:00'),(45,'Seminario de Marketing, Publicidad e Innovación en Reino Unido','2013-10-29','2013-10-29','17:30:00','21:30:00','17:00:00','Universidad de Lima - Av. Javier Prado Este cuadra 46, Urb. Monterrico',-12.084656000000000,-76.971384000000000,1,'Finalizado',4,500,414,320.00,'2013-10-28 00:00:00'),(46,'Conferencia sobre nuestro estado de ánimo','2013-10-29','2013-10-29','11:00:00','19:30:00','10:00:00','Hotel Jose Antonio -Av. 28 De Julio 398, Miraflores',-12.126523000000000,-77.029588000000000,1,'Finalizado',20,350,195,230.00,'2013-10-29 00:00:00');
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expositor`
--

DROP TABLE IF EXISTS `expositor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expositor` (
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_EXPOSITOR_USUARIO1` (`idusuario`),
  CONSTRAINT `fk_EXPOSITOR_USUARIO1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expositor`
--

LOCK TABLES `expositor` WRITE;
/*!40000 ALTER TABLE `expositor` DISABLE KEYS */;
INSERT INTO `expositor` VALUES (5),(21),(22),(23),(25),(26),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36);
/*!40000 ALTER TABLE `expositor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suscripcion`
--

DROP TABLE IF EXISTS `suscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suscripcion` (
  `idsuscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `idplan` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idsuscripcion`),
  KEY `fk_SUSCRIPCION_PLAN1` (`idplan`),
  KEY `fk_SUSCRIPCION_PARTICIPANTE1` (`idusuario`),
  CONSTRAINT `fk_SUSCRIPCION_PARTICIPANTE1` FOREIGN KEY (`idusuario`) REFERENCES `participante` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SUSCRIPCION_PLAN1` FOREIGN KEY (`idplan`) REFERENCES `boletin` (`idboletin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suscripcion`
--

LOCK TABLES `suscripcion` WRITE;
/*!40000 ALTER TABLE `suscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `suscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante`
--

DROP TABLE IF EXISTS `participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participante` (
  `idusuario` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_PARTICIPANTE_USUARIO1` (`idusuario`),
  CONSTRAINT `fk_PARTICIPANTE_USUARIO1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante`
--

LOCK TABLES `participante` WRITE;
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
INSERT INTO `participante` VALUES (6,'Habilitado'),(7,'Habilitado'),(8,'Habilitado'),(13,'Habilitado'),(14,'Habilitado'),(16,'Habilitado'),(17,'Habilitado'),(27,'Habilitado'),(28,'Habilitado'),(29,'Habilitado'),(30,'Habilitado'),(31,'Habilitado'),(32,'Habilitado'),(33,'Habilitado'),(34,'Habilitado'),(35,'Habilitado'),(36,'No asociado');
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizador`
--

DROP TABLE IF EXISTS `organizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizador` (
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_ORGANIZADOR_USUARIO1` (`idusuario`),
  CONSTRAINT `fk_ORGANIZADOR_USUARIO1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizador`
--

LOCK TABLES `organizador` WRITE;
/*!40000 ALTER TABLE `organizador` DISABLE KEYS */;
INSERT INTO `organizador` VALUES (3),(17),(20),(23),(25),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36);
/*!40000 ALTER TABLE `organizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'Arias','Velásquez','Enrique','45815308','organizador','eariasvel@gmail.com','','','Jr. Las Postas 441','San Juan de','earias','7c4a8d09ca3762af61e59520943dc26494f8941b'),(4,'Peralta','Vela','Adrián','49932940','moderador','e_adrianv@gmail.com','','','Jr. Los programadores 666','San Martín de Porres','aperalta','7c4a8d09ca3762af61e59520943dc26494f8941b'),(5,'Cortéz','Dios','Rolf','49703423','expositor','rolfcortez@gmail.com','','','Jr. Los Expositores 347','Comas','rcortez','7c4a8d09ca3762af61e59520943dc26494f8941b'),(6,'Muñoz','Gamarra','Ángela María','49071073','participante','angela.munoz.gamarra@gmail.com','','','Av. Las Lomas 458','San Borja','amuñoz','7c4a8d09ca3762af61e59520943dc26494f8941b'),(7,'Aldana','Solano','Patricia','48973963','participante','patty.aldana@gmail.com','','','Jr. Los teclados 976','Surco','pattyald','7c4a8d09ca3762af61e59520943dc26494f8941b'),(8,'Vilchez ','Rodríguez','Diego','74340578','participante','divilcher@correo.com','','','Jr. Los frenos 675','San Luis','divilchez','7c4a8d09ca3762af61e59520943dc26494f8941b'),(13,'Pérez','Vásquez','Liliana','29741310','participante','liperezv@empresa,com','4394872','991155828','Jr. Jirón 234','La Molina','lperezv','098765'),(14,'Samanez','Ocampo','Raúl','39465972','participante','iwjrfierg@algo.com','2116546','989465413','Jr. De prueba 6312','San Isidro','rausaman','rausaman'),(16,'Fernández','Guerra','Nicolás Niko','56464562','participante','nikolasnik@gmail.com','5641231','945112154','Av. Los Tulipanes 485','Magdalena','nikolasnik','3b5876547579497f05780e39d511de24e71bac6c'),(17,'Huacachi','Meza','Elizabeth','57437356','participante','el.huaca@trabajo.pe','2456432','921643215','Av. Las Quenas 345','San Isidro','elizhu','b1b3773a05c0ed0176787a4f1574ff0075f7521e'),(20,'Rojas ','Rojas','Claudia ','56345232','moderador','eclaudiar@gmail.com','3561132','941773983','Jr. Las Reservas 478','La Molina','claudiarojas','7c4a8d09ca3762af61e59520943dc26494f8941b'),(21,'Lozada','Cornejo','Gabriela','48335698','expositor','gabydis@hotmail.com','2554568','913548412','Av. Las Orquestas 579','San Isidro','gabydis','a15c59b8416f4f763b3f0ff01b0cf4910240cadc'),(22,'Rivera ','Salazar','Miguel','57923865','expositor','elcriclri@yahoo.com','2357891','946514321','Jr. Las Oropéndolas 934','Breña','miguelcricri','7ab515d12bd2cf431745511ac4ee13fed15ab578'),(23,'Muñoz ','Castro','Gerardo Martín','63492692','moderador','elgeral@hotmail.com','3654532','911321641','Av. Isabel La Católica 123','','gmunozc','e0c95748a455c27a80fd289269120d4944d1f318'),(25,'Lozada','Castro','Gabriela','49741310','moderador','gabyloza@gmail.com','2116541','911321643','Jr. De prueba 612','San Borja','gabyloza','4a9c0e5a8d59ef7073656d12428cd6c3d64839f3'),(26,'Llanos','Quevedo','Ruperto','45678912','expositor','rllanos@terra.com.pe','5645781','987156421','Jr. Los Portales 127','San Borja','ruperto','7ab515d12bd2cf431745511ac4ee13fed15ab578'),(27,'apellido','apellido2','Fulano','98326332','participante','fulano@gmail.com','3245365','987922493','Av. La Universidad 394','San Borja','fulanito','7c4a8d09ca3762af61e59520943dc26494f8941b'),(28,'Gonzales','Prado','RobertoAnselmo','26598270','participante','robeanselmo@gmail.com','3197364','963742342','Jr. Las vacaciones 297','Villa El Salvador','robeanselmo','7c4a8d09ca3762af61e59520943dc26494f8941b'),(29,'Gonzales','Prado','Fulano','98326331','participante','fgonzales@empresa.com','4394872','991155827','Av. La Universidad 399','Surco','fulagonzales','7c4a8d09ca3762af61e59520943dc26494f8941b'),(30,'Robles','Castro','Francisco','12345679','participante','frobles@gmail.com','4394871','987922490','Jr. Las vacaciones 216','Villa María del Triunfo','frobles','7c4a8d09ca3762af61e59520943dc26494f8941b'),(31,'Reátegui ','López','Javier','36598270','participante','jreateg@hotmail.com','2456122','987919493','Av. Las Quenas 341','Villa El Salvador','jreateg','7c4a8d09ca3762af61e59520943dc26494f8941b'),(32,'Alcázar','Fernández','Fernanda','83235325','participante','feralc@hotmail.com','7394872','943155828','Jr. Las memorias 647','Miraflores','feralc','7c4a8d09ca3762af61e59520943dc26494f8941b'),(33,'Castro','Velarde','Ramiro','34453321','participante','ramirin@gmail.com','3145365','901155827','Jr. Las memorias 611','Breña','ramirin','7c4a8d09ca3762af61e59520943dc26494f8941b'),(34,'Díaz','martínez','Diego','12345676','participante','dieguito@gmail.com','4394878','991055828','Av. La Universidad 399','Breña','dieguito','7c4a8d09ca3762af61e59520943dc26494f8941b'),(35,'Quispe','Mamani','Ermenegildo','98526332','participante','equispe@empresa.com.pe','3205365','991155827','Jr. Las vacaciones 291','San Borja','equispe','7c4a8d09ca3762af61e59520943dc26494f8941b'),(36,'Rojas','Huerta','Fabiola','12245670','participante','frojas@usil.pe','4394872','981155827','Jr. Jirón 236','San Borja','frojas','b1b3773a05c0ed0176787a4f1574ff0075f7521e');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boletin`
--

DROP TABLE IF EXISTS `boletin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boletin` (
  `idboletin` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idboletin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletin`
--

LOCK TABLES `boletin` WRITE;
/*!40000 ALTER TABLE `boletin` DISABLE KEYS */;
/*!40000 ALTER TABLE `boletin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tema` (
  `idtema` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `horainicio` time NOT NULL,
  `horafin` time NOT NULL,
  `idevento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `rondapreguntas` tinyint(4) NOT NULL,
  `rondaconsultas` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtema`,`idusuario`),
  KEY `fk_TEMA_EVENTO1` (`idevento`),
  KEY `fk_TEMA_EXPOSITOR1` (`idusuario`),
  CONSTRAINT `fk_TEMA_EVENTO1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TEMA_EXPOSITOR1` FOREIGN KEY (`idusuario`) REFERENCES `expositor` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tema`
--

LOCK TABLES `tema` WRITE;
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` VALUES (1,'Novedades de HTML5','09:00:00','10:00:00',1,5,1,1),(2,'Android, conceptos basicos','09:00:00','10:00:00',23,5,0,1),(5,'Declaración de variables','10:00:00','11:00:00',28,26,0,1),(6,'Funciones ','11:00:00','12:00:00',28,22,0,1),(7,'Introducción','10:00:00','11:00:00',29,26,0,1),(8,'Decalración de variables','10:00:00','11:00:00',30,21,0,0),(9,'Funciones ','11:00:00','12:00:00',30,26,0,0),(10,'Funciones ','11:00:00','12:00:00',30,26,0,0),(11,'Drupal ','10:00:00','11:00:00',31,26,0,0),(12,'Framework Codeigniter','11:00:00','13:00:00',31,22,0,0),(13,'Audio y video','10:00:00','11:00:00',1,22,0,0),(14,'Scrum orientado a Ruby','10:00:00','12:00:00',33,26,0,0),(15,'Streaming en HTML5','11:00:00','12:00:00',1,26,0,0),(16,'Decalración de variables','11:00:00','12:00:00',34,26,1,1),(17,'Excepciones','12:00:00','13:00:00',34,22,1,1);
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'eventos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-02 18:37:56
