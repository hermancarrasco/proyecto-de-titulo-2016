-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `gas_accionescriticas`
--

DROP TABLE IF EXISTS `gas_accionescriticas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_accionescriticas` (
  `id_critica` int(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `accion` varchar(100) NOT NULL,
  `detalle` varchar(1000) NOT NULL,
  `otro` varchar(1000) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_critica`),
  KEY `pk_Id_User` (`id_usuario`),
  CONSTRAINT `pk_accionesCriticas` FOREIGN KEY (`id_usuario`) REFERENCES `gas_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_accionescriticas`
--

LOCK TABLES `gas_accionescriticas` WRITE;
/*!40000 ALTER TABLE `gas_accionescriticas` DISABLE KEYS */;
INSERT INTO `gas_accionescriticas` VALUES (3,1,'Inserta','Registra una nueva factura con número: \"4444777\"','','2015-12-04 21:28:25'),(4,1,'Inserta','Registra un nuevo respaldo manual de la Base De Datos','','0000-00-00 00:00:00'),(5,1,'Modifica','Restaura la base de datos \"20151205-1104_BD_Proyecto.sql\"','','2015-12-05 11:43:17'),(6,1,'Modifica','Restaura la base de datos \"20151205-1200_BD_Proyecto.sql\"','','2015-12-05 12:15:39'),(7,1,'Modifica','Modifica el respaldo automatico con frecuencia: DIARIO, dia:0, hora:14:00','','2015-12-07 13:59:06'),(8,1,'Elimina','Elimina al usuario con id: \"3\"','','2015-12-07 14:38:36'),(9,1,'Modifica','Restaura la base de datos \"20151207-1449_BD_Proyecto.sql\"','','2015-12-07 15:55:38'),(10,12,'Elimina','Elimina al usuario con id: \"11\"','','2015-12-07 16:38:27'),(11,12,'Inserta','Inserta un nuevo Vendedor, Nombre: \"vendedorn nuevoApeVendedor\", Rut: \"11.111.111-1\" ','','2015-12-07 16:53:19'),(12,1,'Modifica','Restaura la base de datos \"20151207-1702_BD_Proyecto.sql\"','','2015-12-09 19:18:44'),(13,1,'Elimina','Elimina al usuario con id: \"6\"','','2015-12-10 11:00:39'),(14,1,'Inserta','Registra un nuevo Cliente, Nombre: \"Cristian Moreno\", Rut: \"22.222.222-2\" ','','2015-12-10 11:02:28'),(15,1,'Inserta','Registra una nueva factura con número: \"666666\"','','2015-12-10 11:04:52'),(16,1,'Modifica','Restaura la base de datos \"20151210-1213_BD_Proyecto.sql\"','','2015-12-10 12:16:19'),(17,1,'Modifica','Restaura la base de datos \"20151210-1213_BD_Proyecto.sql\"','','2015-12-10 12:16:23'),(18,1,'Inserta','Registra una nueva factura con número: \"123456\"','','2015-12-10 12:17:43'),(19,1,'Inserta','Registra un nuevo Administrador, Nombre: \"cristian reyes\", Rut: \"11.111.122-7\" ','','2015-12-10 12:23:18'),(20,1,'Inserta','Registra un nuevo respaldo manual de la Base De Datos','','2015-12-10 12:24:07'),(21,17,'Elimina','Elimina al usuario con id: \"9\"','','2015-12-10 12:25:23'),(22,1,'Modifica','Modifica el respaldo automatico con frecuencia: DIARIO, dia:0, hora:11:00','','2016-03-10 10:36:55'),(23,1,'Modifica','Restaura la base de datos \"20160310-1055_BD_Proyecto.sql\"','','2016-03-10 11:42:11'),(24,1,'Modifica','Restaura la base de datos \"20160310-1202_BD_Proyecto.sql\"','','2016-03-17 20:07:09'),(25,1,'Inserta','Registra una nueva factura con número: \"6634536634\"','','2016-04-06 18:10:46'),(26,1,'Inserta','Registra una nueva factura con número: \"456456456456\"','','2016-04-06 21:36:55'),(27,1,'Inserta','Registra un nuevo Vendedor, Nombre: \"tercero vendedor\", Rut: \"22.222.222-2\" ','','2016-06-30 11:08:28'),(28,1,'Inserta','Registra un nuevo Vendedor, Nombre: \"felipe soto\", Rut: \"77.777.777-7\" ','','2016-06-30 11:25:31'),(29,1,'Inserta','Registra una nueva factura con número: \"116541231\"','','2016-10-26 19:12:12'),(30,1,'Inserta','Registra una nueva factura con número: \"116541232\"','','2016-10-26 19:15:01'),(31,1,'Inserta','Registra una nueva factura con número: \"116541233\"','','2016-10-26 19:17:09'),(32,1,'Inserta','Registra una nueva factura con número: \"34534534\"','','2016-11-23 14:04:21'),(33,12,'Inserta','Registra una nueva factura con número: \"43\"','','2016-11-23 14:05:23'),(34,1,'Elimina','Elimina al usuario con id: \"15\"','','2016-11-23 19:47:32'),(35,1,'Elimina','Elimina al usuario con id: \"16\"','','2016-11-23 19:48:34'),(36,1,'Elimina','Elimina al usuario con id: \"22\"','','2016-11-23 20:01:40'),(37,1,'Elimina','Elimina al usuario con id: \"20\"','','2016-11-23 20:03:26'),(38,1,'Elimina','Elimina al usuario con id: \"19\"','','2016-11-23 20:04:59'),(39,1,'Elimina','Elimina al usuario con id: \"22\"','','2016-11-23 20:06:00'),(40,1,'Elimina','Elimina al usuario con id: \"20\"','','2016-11-23 20:07:45'),(41,1,'Modifica','Restaura la base de datos \"20161123-2027_BD_Proyecto.sql\"','','2016-11-23 20:36:37'),(42,1,'Modifica','Restaura la base de datos \"20161211-1642_BD_Proyecto.sql\"','','2016-12-11 16:42:23'),(43,1,'Modifica','Restaura la base de datos \"20161211-1644_BD_Proyecto.sql\"','','2016-12-11 16:46:05'),(44,1,'Inserta','Registra un nuevo respaldo manual de la Base De Datos','','2016-12-11 16:46:10'),(45,1,'Inserta','Registra un nuevo respaldo manual de la Base De Datos','','2016-12-11 16:46:21'),(46,1,'Inserta','Registra un nuevo respaldo manual de la Base De Datos','','2016-12-11 16:48:56'),(47,1,'Inserta','Registra un nuevo respaldo manual de la Base De Datos','','2016-12-11 16:51:38');
/*!40000 ALTER TABLE `gas_accionescriticas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_camiones`
--

DROP TABLE IF EXISTS `gas_camiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_camiones` (
  `id_camion` bigint(20) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `patente` varchar(20) NOT NULL,
  `revision` date NOT NULL,
  `conductor` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_camion`),
  KEY `conductor` (`conductor`),
  CONSTRAINT `pk_conductor` FOREIGN KEY (`conductor`) REFERENCES `gas_datosusuario` (`id_datosUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_camiones`
--

LOCK TABLES `gas_camiones` WRITE;
/*!40000 ALTER TABLE `gas_camiones` DISABLE KEYS */;
INSERT INTO `gas_camiones` VALUES (1,'CHEVROLET','NKR','BBDD01','2016-12-01',3),(2,'KIA','Frontier','DDQQ00','2017-01-18',23),(4,'Kia','Frontier','FFFF00','2016-12-23',14),(6,'KIA','Frontier','BBBB99','2016-12-30',NULL);
/*!40000 ALTER TABLE `gas_camiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_datosusuario`
--

DROP TABLE IF EXISTS `gas_datosusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_datosusuario` (
  `id_datosUsuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `user_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `celular` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `rut` varchar(30) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `numero` varchar(10) CHARACTER SET latin1 NOT NULL,
  `departamento` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zona` int(1) NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_user` bigint(20) NOT NULL,
  PRIMARY KEY (`id_datosUsuario`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  CONSTRAINT `PkUsuario` FOREIGN KEY (`id_user`) REFERENCES `gas_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_datosusuario`
--

LOCK TABLES `gas_datosusuario` WRITE;
/*!40000 ALTER TABLE `gas_datosusuario` DISABLE KEYS */;
INSERT INTO `gas_datosusuario` VALUES (1,'admin','Admin','Automatico','admin',NULL,NULL,'11.111.111-1','mi direccion','14',NULL,0,NULL,1),(3,'herman','herman','carrasco soto','vendedor','','88998899','22.222.222-2','direccion del cliente','1524','',1,'empleado1.jpg',2),(4,'Juan jhjgjgjh','Juan jhjgjgjh','Perez','cliente','','88998899','33.333.333-3','Av España','1515','',0,NULL,3),(5,'cliente','cliente','dasd','cliente','','88995522','18.222.222-2','Nelson Pereira','1524','',1,NULL,4),(6,'gonzalo','gonzalo','Zuñiga','cliente','232323','34343434','3.333.333-3','vill del sol','3432','',0,NULL,5),(7,'gonzalo         calzonuo','gonzalo         calzonuo','mandoniado ddddddd','cliente','8989898989','92554822','11.111.111-1','dfdfdfdfdffdfddfdfddfdfd','3434343434','fggfg 34343',0,NULL,6),(8,'holas','holas','hola hola','cliente','212343','22222222','22.222.222-2','av kennedy','123','',0,NULL,7),(9,'Javiera','Javiera','Astudillo','cliente','345545','55888585','11.111.111-1','direccion mia','4445','',0,NULL,8),(10,'Trollencio','Trollencio','Meme','cliente','722241524','89049323','11.111.111-1','Gamero ','202','',0,NULL,9),(11,'Hola','Hola','mundo','cliente','225435215','89523132','11.111.111-1','cuevas','123','',0,NULL,10),(12,'aaacliente','aaacliente','apecliente','cliente','','911161565','22.222.222-2','aaaa direccion','123','',0,NULL,11),(13,'bastian','bastian','teran','admin','','234234234','18.949.494-7','asdasd','21123','',0,NULL,12),(14,'vendedorn','vendedorn','nuevoApeVendedor','vendedor','','94849848','11.111.111-1','sdfsdf','211','',2,'empleado2.jpg',13),(15,'herman','herman','carrasco s','cliente','','92554822','18.261.421-1','mi dir','405','',0,NULL,14),(16,'Cristian','Cristian','Moreno','cliente','','98264353','22.222.222-2','Gamero','020','',0,NULL,15),(17,'cesar','cesar','arce','cliente','','92554822','18.261.421-1','tacora','504','',0,NULL,16),(18,'cristian','cristian','reyes','admin','','','11.111.122-7','arica','204','',0,NULL,17),(19,'Rogelio','Rogelio','Rojas Manjarsh','cliente','','99889999','11.651.511-3','Dr. Antonio Donghi','2156','brisas de kennedy A14',0,NULL,18),(20,'herman','herman','carrasco soto','cliente','','99448877','18.261.421-1','recreo','1980','',1,NULL,19),(22,'nacho','nacho','godoy','cliente','','','33.333.333-3','doctor salinas','243','',3,NULL,20),(23,'felipe','felipe','soto','vendedor','','','77.777.777-7','chorrillo','2434','',4,'empleado3.jpg',21),(24,'iiiiiiiiiiiii','iiiiiiiiiiiii','oooooooooooooooo','cliente','','99887744','11.111.111-1','republica de chile','734','',1,NULL,22);
/*!40000 ALTER TABLE `gas_datosusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_detallefaturas`
--

DROP TABLE IF EXISTS `gas_detallefaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_detallefaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(500) NOT NULL,
  `cantidad` varchar(5) NOT NULL,
  `precio` varchar(9) NOT NULL,
  `iva` varchar(9) NOT NULL,
  `total` varchar(15) NOT NULL,
  `id_factura` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`),
  CONSTRAINT `fk_id_facturas` FOREIGN KEY (`id_factura`) REFERENCES `gas_facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_detallefaturas`
--

LOCK TABLES `gas_detallefaturas` WRITE;
/*!40000 ALTER TABLE `gas_detallefaturas` DISABLE KEYS */;
INSERT INTO `gas_detallefaturas` VALUES (1,'detalle factura','1','1000','190','1190',1),(6,'Gas 5Kg','1','666','127','793',8),(7,'Gas 11Kg','1','77','15','92',8),(8,'Gas 15Kg','1','3444','654','4098',8),(9,'Gas 45Kg','1','3333','633','3966',8),(10,'producto 1','1','10','2','12',9),(11,'producto 2','1','20','4','24',9),(12,'producto3','1','30','6','36',9),(14,'Gas 5Kg','1','10','2','12',11),(15,'Gas 11Kg','1','20','4','24',11),(16,'Gas 15Kg','1','30','6','36',11),(17,'Gas 45Kg','1','40','8','48',11),(19,'Gas 5Kg','1','10','2','12',13),(20,'Gas 11Kg','1','20','4','24',13),(21,'Gas 15Kg','1','320','61','381',13),(22,'Gas 45Kg','1','100','19','119',13),(23,'Gas 5Kg','1','5600','1064','6664',14),(24,'Gas 11Kg','1','234','44','278',14),(25,'Gas 15Kg','1','234','44','278',14),(26,'Gas 45Kg','1','234','44','278',14),(27,'Gas 5Kg','1','5300','1007','6307',15),(28,'Gas 11Kg','1','444','84','528',15),(29,'Gas 15Kg','1','5555','1055','6610',15),(30,'Gas 45Kg','1','6666','1267','7933',15),(31,'Gas 5Kg','1','5000','950','5950',16),(32,'Gas 11Kg','1','10000','1900','11900',16),(33,'Gas 15Kg','1','15000','2850','17850',16),(34,'Gas 45Kg','1','22000','4180','26180',16),(35,'Gas 5Kg','1','5000','950','5950',17),(36,'Gas 11Kg','1','10000','1900','11900',17),(37,'Gas 15Kg','1','15000','2850','17850',17),(38,'Gas 45Kg','1','20000','3800','23800',17),(39,'Gas 5Kg','2','5765','2191','13721',18),(40,'Gas 11Kg','4','8000','6080','38080',18),(41,'Gas 15Kg','8','12454','18930','118562',18),(42,'Gas 45Kg','5','40767','38729','242564',18),(43,'Gas 5Kg','1','5500','1045','6545',19),(44,'Gas 11Kg','1','9350','1777','11127',19),(45,'Gas 15Kg','1','13500','2565','16065',19),(46,'Gas 45Kg','1','39760','7554','47314',19),(47,'Gas 5Kg','11','5550','11600','72650',20),(48,'Gas 11Kg','12','9400','21432','134232',20),(49,'Gas 15Kg','13','13550','33469','209619',20),(50,'Gas 45Kg','4','39810','30256','189496',20),(51,'Gas 5Kg','11','5550','11600','72650',21),(52,'Gas 11Kg','12','9400','21432','134232',21),(53,'Gas 15Kg','13','13550','33469','209619',21),(54,'Gas 45Kg','4','39810','30256','189496',21),(55,'Gas 5Kg','11','5550','11600','72650',22),(56,'Gas 11Kg','12','9400','21432','134232',22),(57,'Gas 15Kg','13','13550','33469','209619',22),(58,'Gas 45Kg','4','39810','30256','189496',22),(59,'Gas 5Kg','1','1','0','1',23),(60,'Gas 11Kg','1','1','0','1',23),(61,'Gas 15Kg','1','1','0','1',23),(62,'Gas 45Kg','1','1','0','1',23),(63,'Gas 5Kg','1','2','0','2',24),(64,'Gas 11Kg','1','22','4','26',24),(65,'Gas 15Kg','1','2','0','2',24),(66,'Gas 45Kg','1','2','0','2',24);
/*!40000 ALTER TABLE `gas_detallefaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_direcciones`
--

DROP TABLE IF EXISTS `gas_direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_direcciones` (
  `id_direcciones` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` varchar(100) DEFAULT NULL,
  `longitud` varchar(100) DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `zona` int(1) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_direcciones`),
  KEY `pk_Usuario_Direcciones` (`id_usuario`),
  CONSTRAINT `pk_direcciones_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `gas_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_direcciones`
--

LOCK TABLES `gas_direcciones` WRITE;
/*!40000 ALTER TABLE `gas_direcciones` DISABLE KEYS */;
INSERT INTO `gas_direcciones` VALUES (1,NULL,NULL,'gamero',705,NULL,1,3,4),(2,NULL,NULL,'av españa',1515,NULL,1,1,4),(3,NULL,NULL,NULL,NULL,'tacora 150 rancagua',1,1,4),(4,NULL,NULL,NULL,NULL,'miño 150 Rancagua',1,1,4),(5,NULL,NULL,NULL,NULL,'grecia 1242 Rancagua',1,1,4),(6,NULL,NULL,NULL,NULL,'arica 178 Rancagua',1,1,4),(7,NULL,NULL,NULL,NULL,'carretera el cobre 617 Rancagua',1,4,4),(8,NULL,NULL,NULL,NULL,'tacora 222 Rancagua',1,1,4),(9,NULL,NULL,'recreo',405,NULL,1,1,14),(10,NULL,NULL,'Gamero',20,NULL,1,3,15),(11,NULL,NULL,NULL,NULL,'carretera el cobre 617 Rancagua',1,4,15),(12,NULL,NULL,'tacora',504,NULL,1,1,16),(13,NULL,NULL,'arica',204,NULL,1,1,17),(14,NULL,NULL,NULL,NULL,'av san juan 376 Rancagua',1,2,4),(15,NULL,NULL,'Dr. Antonio Donghi',2156,'brisas de kennedy A14',1,1,18),(16,NULL,NULL,NULL,NULL,'av españa Rancagua',1,1,4),(17,NULL,NULL,'recreo',1980,'',1,1,19),(21,NULL,NULL,'doctor salinas',243,'',1,3,20),(23,NULL,NULL,'republica de chile',734,'',1,1,22),(28,NULL,NULL,NULL,NULL,'republica 734 Rancagua',1,1,4),(33,NULL,NULL,NULL,NULL,'republica 375 Rancagua',1,2,4),(34,NULL,NULL,NULL,NULL,'kennedy 1005 Rancagua',1,1,4),(35,NULL,NULL,NULL,NULL,'kennedy 1100 Rancagua',1,4,4),(36,NULL,NULL,NULL,NULL,'einstein 835 Rancagua',1,4,4);
/*!40000 ALTER TABLE `gas_direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_facturas`
--

DROP TABLE IF EXISTS `gas_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nFactura` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `proveedor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proveedor` (`proveedor`),
  CONSTRAINT `gas_facturas_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `gas_proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_facturas`
--

LOCK TABLES `gas_facturas` WRITE;
/*!40000 ALTER TABLE `gas_facturas` DISABLE KEYS */;
INSERT INTO `gas_facturas` VALUES (1,'8362020','2015-10-04',2),(8,'4444','2015-10-07',1),(9,'99999999','2015-10-14',2),(11,'2020220','2015-10-14',1),(13,'3333222','2015-10-18',1),(14,'444467','2015-12-03',1),(15,'4444777','2015-12-02',1),(16,'666666','2015-12-10',1),(17,'123456','2015-12-10',1),(18,'6634536634','2016-04-01',1),(19,'4564564564','2016-04-06',1),(20,'116541231','2016-10-26',1),(21,'116541232','2016-10-26',1),(22,'116541233','2016-10-26',1),(23,'34534534','2016-11-23',1),(24,'43','2016-11-23',1);
/*!40000 ALTER TABLE `gas_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_faq`
--

DROP TABLE IF EXISTS `gas_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_faq`
--

LOCK TABLES `gas_faq` WRITE;
/*!40000 ALTER TABLE `gas_faq` DISABLE KEYS */;
INSERT INTO `gas_faq` VALUES (1,'¿Como puedo hacer un pedido de gas?','Para poder hacer un pedido, primero debes \'registrarte\' en la pagina, haciendo click \'en el link de abajo’ de estar registrado, haz click en \'Hacer un Pedido\', seleccionas el balon a pedir, escoger entre boleta o factura, luego elegir el medio de pago, WebPay o al momento de la entrega, para concluir con la orden de compra que puede ser imprimida y al mismo tiempo enviada al email del cliente.','../php/registro.php',''),(2,'¿Que debo hacer para registrarme en la pagina?','Haz click \'acá’ para acceder al formulario, llenalo con los datos correspondientes, click en guardar y ya estarás registrado.',NULL,''),(3,'¿Que pasa si olvido mi clave?',' En la sección de inicio de sesión, haz click en ‘¿Olvide Clave?\' ahí rellena con los datos requeridos\r\n   y llegara un email de confirmación para el cambio de clave.',NULL,''),(4,'¿Que pasa si no tengo internet para efectuar una compra?',' Nuestras sucursales estarán disponibles telefónicamente para atenderlo con la misma eficiencia, con solo\r\n   dar el rut, podrás hacer un pedido, ¿como? nuestros sistemas están conectados para dar un mayor servicio\r\n   el rut estará asociado a tu dirección registrada en la pagina, así podrás acceder a nuestros productos sin\r\n   estar conectado.',NULL,''),(5,'¿Esta permitido el uso de cilindro de gas en departamentos?','Según el Oficio Circular N∫4351 de la Superintendencia de Electricidad y Combustibles (SEC), \r\n   no está prohibido el uso de cilindros de gas de hasta 15 kg. en artefactos móviles, como las estufas rodantes.\r\n   Recuerde que el gas licuado de Lipigas es la mejor alternativa para darle calor, porque es energía limpia, segura, \r\n   de abastecimiento continuo y porque no existe impedimento por parte de la SEC para el uso de gas envasado en su \r\n   departamento.',NULL,''),(6,'¿Por que el peso indicado en los cilindros de gas es diferente a la carga comprada?','Los cilindros de gas comercializados por Lipigas pueden ser de 5, 11, 15 y 45 Kgs.\r\n  El valor que se indica en la parte superior del cilindro, señala el peso vacÌo (tara) de éste, \r\n  y en ningún caso la carga de gas, la cual está garantizada al momento de su compra.',NULL,'');
/*!40000 ALTER TABLE `gas_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_iniciosesion`
--

DROP TABLE IF EXISTS `gas_iniciosesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_iniciosesion` (
  `id_inicioSesion` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NOT NULL,
  `fechaInicioSesion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_inicioSesion`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pk_user_login` FOREIGN KEY (`id_user`) REFERENCES `gas_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=436 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_iniciosesion`
--

LOCK TABLES `gas_iniciosesion` WRITE;
/*!40000 ALTER TABLE `gas_iniciosesion` DISABLE KEYS */;
INSERT INTO `gas_iniciosesion` VALUES (1,1,'2015-09-02 22:27:24'),(2,1,'2015-09-02 22:32:37'),(3,4,'2015-09-02 22:36:03'),(4,1,'2015-09-02 22:37:14'),(5,1,'2015-09-02 22:54:55'),(6,1,'2015-09-02 22:56:59'),(7,1,'2015-09-02 22:58:18'),(8,1,'2015-09-02 22:58:27'),(9,4,'2015-09-02 23:21:28'),(10,3,'2015-09-02 23:25:28'),(11,8,'2015-09-02 23:29:51'),(12,8,'2015-09-02 23:30:03'),(15,5,'2015-09-02 23:41:42'),(16,1,'2015-09-03 08:39:42'),(17,1,'2015-09-03 08:42:19'),(18,1,'2015-09-03 09:49:42'),(19,1,'2015-09-03 10:31:07'),(20,1,'2015-09-05 13:40:29'),(21,4,'2015-09-05 13:41:03'),(22,1,'2015-09-05 13:45:01'),(23,4,'2015-09-05 13:45:10'),(24,4,'2015-09-05 13:46:19'),(25,4,'2015-09-05 13:47:51'),(26,1,'2015-09-05 13:49:28'),(27,1,'2015-09-05 13:49:37'),(28,1,'2015-09-05 13:51:00'),(29,4,'2015-09-05 13:51:16'),(30,4,'2015-09-05 13:55:12'),(31,4,'2015-09-05 14:07:28'),(32,4,'2015-09-05 14:11:29'),(33,4,'2015-09-05 14:19:08'),(34,1,'2015-09-05 14:22:38'),(35,1,'2015-09-05 14:31:04'),(36,4,'2015-09-05 14:47:01'),(37,1,'2015-09-05 14:47:12'),(38,4,'2015-09-05 15:21:52'),(39,4,'2015-09-05 15:24:17'),(40,4,'2015-09-05 15:38:29'),(41,4,'2015-09-06 10:15:55'),(42,4,'2015-09-06 13:18:56'),(43,4,'2015-09-06 13:22:14'),(44,4,'2015-09-06 16:16:40'),(45,4,'2015-09-06 18:01:59'),(46,1,'2015-09-06 18:02:46'),(47,1,'2015-09-06 18:03:27'),(48,3,'2015-09-06 20:00:16'),(49,1,'2015-09-06 20:12:10'),(50,1,'2015-09-06 20:27:19'),(51,1,'2015-09-06 21:00:15'),(52,1,'2015-09-06 21:08:57'),(53,1,'2015-09-06 21:20:44'),(54,3,'2015-09-06 21:57:03'),(55,1,'2015-09-06 21:57:28'),(56,3,'2015-09-06 21:57:37'),(57,2,'2015-09-06 22:24:31'),(58,2,'2015-09-06 22:25:57'),(59,1,'2015-09-07 13:46:16'),(60,1,'2015-09-07 13:51:24'),(61,9,'2015-09-07 13:55:53'),(62,9,'2015-09-07 14:09:06'),(63,10,'2015-09-07 14:12:27'),(64,1,'2015-09-07 14:13:29'),(65,2,'2015-09-07 14:18:06'),(66,4,'2015-09-10 10:46:13'),(67,1,'2015-09-10 10:51:01'),(68,1,'2015-09-16 11:29:29'),(69,4,'2015-09-16 11:30:13'),(70,1,'2015-09-16 11:30:26'),(71,1,'2015-09-21 23:27:17'),(72,1,'2015-09-25 12:36:48'),(73,1,'2015-09-25 17:23:15'),(74,4,'2015-09-25 22:32:35'),(75,1,'2015-09-25 22:32:50'),(76,1,'2015-09-27 15:05:28'),(77,1,'2015-09-28 12:06:42'),(78,1,'2015-09-28 13:36:29'),(79,1,'2015-09-30 10:15:59'),(80,1,'2015-10-02 12:30:24'),(81,1,'2015-10-02 18:03:02'),(82,1,'2015-10-13 17:42:11'),(83,1,'2015-10-13 18:38:51'),(84,1,'2015-10-13 18:44:56'),(85,1,'2015-10-13 18:45:21'),(86,1,'2015-10-13 22:06:44'),(87,1,'2015-10-18 17:45:24'),(88,1,'2015-10-19 16:04:00'),(89,4,'2015-10-19 16:04:14'),(90,4,'2015-10-19 16:04:28'),(91,1,'2015-10-19 16:04:41'),(92,4,'2015-10-19 16:07:57'),(93,4,'2015-10-19 16:15:23'),(94,1,'2015-10-19 16:16:19'),(95,4,'2015-10-19 16:17:35'),(96,4,'2015-10-19 16:17:58'),(97,4,'2015-10-19 16:19:12'),(98,4,'2015-10-19 16:19:58'),(99,4,'2015-10-19 16:20:00'),(100,1,'2015-10-19 16:22:05'),(101,4,'2015-10-19 16:22:10'),(102,4,'2015-10-19 16:23:11'),(103,4,'2015-10-19 16:24:34'),(104,4,'2015-10-19 16:26:54'),(105,4,'2015-10-19 16:26:58'),(106,1,'2015-10-19 16:27:41'),(107,4,'2015-10-19 16:27:46'),(108,1,'2015-10-19 16:27:53'),(109,4,'2015-10-19 16:27:58'),(110,4,'2015-10-19 16:28:01'),(111,4,'2015-10-19 16:28:05'),(112,4,'2015-10-19 16:30:45'),(113,4,'2015-10-19 16:31:33'),(114,4,'2015-10-19 16:33:20'),(115,4,'2015-10-19 16:34:53'),(116,1,'2015-10-19 16:35:01'),(117,4,'2015-10-19 16:35:14'),(118,4,'2015-10-19 16:36:33'),(119,4,'2015-10-19 16:38:13'),(120,1,'2015-10-19 16:38:37'),(121,1,'2015-10-19 16:43:20'),(122,1,'2015-10-19 16:43:24'),(123,1,'2015-10-19 16:43:31'),(124,4,'2015-10-19 16:43:39'),(125,4,'2015-10-19 16:44:28'),(126,1,'2015-10-19 16:45:14'),(127,4,'2015-10-19 16:45:23'),(128,1,'2015-10-19 16:46:13'),(129,1,'2015-10-19 16:47:06'),(130,4,'2015-10-19 16:47:11'),(131,2,'2015-10-19 16:47:27'),(132,1,'2015-10-19 16:49:45'),(133,4,'2015-10-19 16:51:36'),(134,4,'2015-10-19 16:54:39'),(135,2,'2015-10-19 16:55:49'),(136,1,'2015-10-19 16:56:26'),(137,1,'2015-10-19 16:56:27'),(138,1,'2015-10-19 16:56:28'),(139,1,'2015-10-19 16:56:31'),(140,1,'2015-10-19 16:56:33'),(141,1,'2015-10-19 16:56:38'),(142,1,'2015-10-19 16:56:52'),(143,1,'2015-10-19 16:57:27'),(144,1,'2015-10-19 16:57:28'),(145,4,'2015-10-19 16:57:32'),(146,1,'2015-10-19 16:57:46'),(147,1,'2015-10-19 16:59:59'),(148,1,'2015-10-19 17:00:01'),(149,1,'2015-10-19 17:00:36'),(150,1,'2015-10-19 17:20:14'),(151,1,'2015-10-19 17:20:14'),(152,1,'2015-10-19 17:20:15'),(153,1,'2015-10-19 17:20:21'),(154,1,'2015-10-19 17:20:24'),(155,1,'2015-10-19 17:20:57'),(156,1,'2015-10-19 17:20:58'),(157,4,'2015-10-19 17:21:03'),(158,1,'2015-10-19 17:21:06'),(159,1,'2015-10-19 17:21:18'),(160,1,'2015-10-19 17:21:21'),(161,1,'2015-10-19 17:21:22'),(162,1,'2015-10-19 17:21:22'),(163,1,'2015-10-19 17:21:23'),(164,1,'2015-10-19 17:21:38'),(165,1,'2015-10-19 17:21:38'),(166,1,'2015-10-19 17:22:01'),(167,1,'2015-10-19 17:22:08'),(168,4,'2015-10-19 17:22:27'),(169,1,'2015-10-19 17:28:45'),(170,4,'2015-10-19 17:28:59'),(171,2,'2015-10-19 17:29:36'),(172,1,'2015-10-19 17:31:01'),(173,1,'2015-10-19 17:31:30'),(174,2,'2015-10-19 17:31:56'),(175,1,'2015-10-19 17:32:36'),(176,4,'2015-10-19 17:35:18'),(177,4,'2015-10-19 18:00:45'),(178,1,'2015-10-19 18:02:39'),(179,1,'2015-10-19 20:25:22'),(180,1,'2015-10-19 20:40:39'),(181,4,'2015-10-19 21:35:42'),(182,4,'2015-10-19 21:37:01'),(183,4,'2015-11-01 17:53:40'),(184,1,'2015-11-01 17:53:53'),(185,1,'2015-11-01 17:57:50'),(186,1,'2015-11-01 17:57:56'),(187,4,'2015-11-01 17:59:28'),(188,1,'2015-11-01 17:59:35'),(189,4,'2015-11-01 18:00:16'),(190,4,'2015-11-01 18:02:54'),(191,1,'2015-11-01 18:03:02'),(192,2,'2015-11-01 18:07:47'),(193,4,'2015-11-01 18:30:40'),(194,4,'2015-11-01 22:19:19'),(195,4,'2015-11-01 22:33:29'),(196,4,'2015-11-01 22:45:20'),(197,4,'2015-11-02 13:45:48'),(198,2,'2015-11-02 13:46:03'),(199,4,'2015-11-02 13:46:56'),(200,1,'2015-11-02 13:48:24'),(201,2,'2015-11-02 13:49:09'),(202,4,'2015-11-02 13:53:14'),(203,1,'2015-11-02 14:43:10'),(204,4,'2015-11-02 14:46:19'),(205,2,'2015-11-02 14:49:01'),(206,2,'2015-11-02 14:49:28'),(207,4,'2015-11-02 14:50:27'),(208,1,'2015-11-02 14:52:54'),(209,2,'2015-11-03 20:55:14'),(210,1,'2015-11-03 20:58:23'),(211,4,'2015-11-03 20:59:26'),(212,3,'2015-11-03 22:13:46'),(213,4,'2015-11-03 22:17:47'),(214,3,'2015-11-03 22:17:59'),(215,4,'2015-11-03 22:25:55'),(216,4,'2015-11-04 10:40:57'),(217,4,'2015-11-04 20:10:39'),(218,1,'2015-11-04 21:49:02'),(219,1,'2015-11-04 21:57:45'),(220,2,'2015-11-04 22:19:32'),(221,2,'2015-11-04 22:20:08'),(222,4,'2015-11-04 22:32:34'),(223,4,'2015-11-05 17:10:41'),(224,2,'2015-11-05 18:28:06'),(225,1,'2015-11-05 21:53:34'),(226,1,'2015-11-06 15:40:27'),(227,4,'2015-11-06 16:45:34'),(228,1,'2015-11-06 16:48:02'),(229,4,'2015-11-06 16:50:57'),(230,4,'2015-11-06 16:54:35'),(231,4,'2015-11-06 17:21:40'),(232,1,'2015-11-06 17:59:24'),(233,2,'2015-11-07 13:55:31'),(234,4,'2015-11-07 13:58:18'),(235,1,'2015-11-07 14:20:24'),(236,4,'2015-11-07 14:42:29'),(237,4,'2015-11-07 14:44:59'),(238,1,'2015-11-07 14:47:15'),(239,1,'2015-11-07 21:24:11'),(240,4,'2015-11-07 21:31:12'),(241,2,'2015-11-08 00:21:37'),(242,2,'2015-11-08 00:24:07'),(243,1,'2015-11-08 00:29:55'),(244,1,'2015-11-08 11:56:42'),(245,4,'2015-11-08 11:57:40'),(246,1,'2015-11-08 11:58:33'),(247,4,'2015-11-08 14:39:09'),(248,1,'2015-11-08 23:35:15'),(249,2,'2015-11-09 10:35:09'),(250,4,'2015-11-09 10:35:54'),(251,1,'2015-11-09 11:39:57'),(252,4,'2015-11-09 13:20:15'),(253,1,'2015-11-09 13:29:38'),(254,4,'2015-11-09 13:30:26'),(255,1,'2015-11-09 13:40:04'),(256,1,'2015-11-28 11:12:44'),(257,1,'2015-12-04 16:39:16'),(258,4,'2015-12-04 16:39:44'),(259,1,'2015-12-04 16:39:49'),(260,1,'2015-12-04 21:27:44'),(261,1,'2015-12-07 14:16:21'),(262,12,'2015-12-07 16:35:28'),(263,13,'2015-12-07 16:54:50'),(264,12,'2015-12-07 16:55:46'),(265,14,'2015-12-09 19:19:35'),(266,1,'2015-12-09 19:22:05'),(267,1,'2015-12-09 20:12:05'),(268,1,'2015-12-10 10:42:18'),(269,2,'2015-12-10 11:05:28'),(270,1,'2015-12-10 11:06:35'),(271,15,'2015-12-10 11:06:56'),(272,1,'2015-12-10 11:09:54'),(273,16,'2015-12-10 12:09:45'),(274,1,'2015-12-10 12:12:53'),(275,17,'2015-12-10 12:24:53'),(276,1,'2016-03-10 10:19:59'),(277,1,'2016-03-10 10:32:32'),(278,4,'2016-03-10 11:43:20'),(279,4,'2016-03-10 11:51:38'),(280,4,'2016-03-10 11:52:11'),(281,2,'2016-03-10 11:52:34'),(282,1,'2016-03-10 11:54:01'),(283,2,'2016-03-10 11:56:19'),(284,4,'2016-03-10 11:56:39'),(285,1,'2016-03-10 11:57:21'),(286,4,'2016-03-21 15:20:22'),(287,1,'2016-03-21 19:06:47'),(288,1,'2016-03-21 19:19:26'),(289,2,'2016-03-21 19:20:57'),(290,2,'2016-03-23 14:21:55'),(291,8,'2016-03-23 14:43:22'),(292,4,'2016-03-23 14:44:30'),(293,8,'2016-03-23 14:44:49'),(294,16,'2016-03-23 14:48:27'),(295,2,'2016-03-23 15:05:51'),(296,4,'2016-03-23 15:27:22'),(297,2,'2016-03-23 15:27:49'),(298,4,'2016-03-23 16:50:32'),(299,2,'2016-03-23 16:51:00'),(300,1,'2016-03-24 10:00:33'),(301,2,'2016-03-24 11:44:05'),(302,4,'2016-03-24 11:44:50'),(303,2,'2016-03-24 11:45:24'),(304,1,'2016-03-24 11:47:53'),(305,2,'2016-03-24 12:04:13'),(306,1,'2016-03-24 12:04:50'),(307,4,'2016-03-24 12:06:20'),(308,4,'2016-03-24 12:12:59'),(309,4,'2016-04-06 11:36:00'),(310,1,'2016-04-06 11:44:10'),(311,8,'2016-04-06 22:25:33'),(312,16,'2016-04-06 22:26:31'),(313,1,'2016-04-06 22:27:14'),(314,2,'2016-04-20 14:38:51'),(315,2,'2016-04-20 15:05:02'),(316,1,'2016-04-20 17:16:44'),(317,18,'2016-04-20 17:22:43'),(318,4,'2016-04-20 17:28:07'),(319,18,'2016-04-20 17:30:14'),(320,1,'2016-04-20 17:31:51'),(321,2,'2016-04-20 17:51:39'),(322,18,'2016-04-20 18:23:32'),(323,1,'2016-04-21 12:01:25'),(324,18,'2016-04-21 12:04:20'),(325,18,'2016-12-12 00:00:00'),(326,1,'2016-04-21 12:13:50'),(327,2,'2016-04-21 12:16:22'),(328,1,'2016-04-21 12:22:37'),(329,2,'2016-04-21 12:23:52'),(330,1,'2016-04-24 12:40:12'),(331,4,'2016-04-24 12:43:18'),(332,2,'2016-04-24 12:44:09'),(333,1,'2016-04-27 11:34:37'),(334,1,'2016-04-27 14:10:57'),(335,1,'2016-04-27 19:17:05'),(336,2,'2016-04-27 19:24:50'),(337,2,'2016-04-27 19:26:08'),(338,1,'2016-04-27 23:27:41'),(339,2,'2016-05-25 12:51:56'),(340,2,'2016-05-25 12:53:15'),(341,2,'2016-05-25 12:53:53'),(342,1,'2016-05-25 15:58:41'),(343,1,'2016-05-25 16:45:21'),(344,4,'2016-05-25 16:45:34'),(345,18,'2016-05-25 16:46:19'),(346,19,'2016-06-15 16:18:17'),(347,1,'2016-06-29 10:27:29'),(348,2,'2016-06-29 12:40:21'),(349,13,'2016-06-29 12:57:02'),(350,2,'2016-06-29 13:03:02'),(351,1,'2016-06-29 13:05:10'),(352,13,'2016-06-29 13:06:57'),(353,2,'2016-06-29 13:11:59'),(354,13,'2016-06-29 13:13:14'),(355,13,'2016-06-29 13:20:48'),(356,13,'2016-06-29 13:21:25'),(357,2,'2016-06-29 13:34:35'),(358,13,'2016-06-29 13:35:36'),(359,13,'2016-06-29 13:38:44'),(360,4,'2016-06-29 14:19:06'),(361,19,'2016-06-29 14:22:29'),(362,4,'2016-06-29 14:23:30'),(363,18,'2016-06-29 14:29:02'),(364,4,'2016-06-29 14:32:00'),(365,2,'2016-06-29 15:51:34'),(366,1,'2016-06-29 16:51:21'),(367,4,'2016-06-29 17:00:18'),(368,2,'2016-06-29 17:04:07'),(369,1,'2016-06-29 17:10:23'),(370,2,'2016-06-30 11:04:19'),(371,13,'2016-06-30 11:07:13'),(372,1,'2016-06-30 11:07:38'),(373,13,'2016-06-30 11:13:00'),(374,1,'2016-06-30 11:24:50'),(375,1,'2016-07-25 22:54:29'),(376,2,'2016-08-01 14:19:37'),(377,22,'2016-09-03 18:27:37'),(378,4,'2016-09-03 18:40:30'),(379,1,'2016-09-03 19:55:30'),(380,1,'2016-09-03 21:38:33'),(381,4,'2016-09-03 22:48:12'),(382,1,'2016-09-03 23:36:20'),(383,4,'2016-09-05 16:27:15'),(384,1,'2016-09-05 16:33:59'),(385,22,'2016-09-05 16:50:43'),(386,1,'2016-09-05 18:14:30'),(387,1,'2016-09-05 18:24:59'),(388,1,'2016-09-05 18:27:59'),(389,1,'2016-09-05 18:28:10'),(390,1,'2016-09-05 18:28:34'),(391,1,'2016-09-05 18:28:45'),(392,1,'2016-09-05 18:28:51'),(393,1,'2016-09-05 18:29:58'),(394,1,'2016-09-05 18:30:29'),(395,1,'2016-09-05 18:31:12'),(396,1,'2016-09-05 18:31:29'),(397,1,'2016-09-05 18:31:57'),(398,1,'2016-09-05 18:32:08'),(399,1,'2016-09-05 18:32:17'),(400,1,'2016-09-05 18:33:27'),(401,1,'2016-09-05 18:34:26'),(402,1,'2016-09-05 18:36:24'),(403,1,'2016-09-05 18:36:39'),(404,1,'2016-09-05 18:36:46'),(405,2,'2016-10-26 15:13:14'),(406,1,'2016-10-26 15:58:31'),(407,2,'2016-10-26 16:13:05'),(408,2,'2016-10-26 16:35:31'),(409,2,'2016-10-26 16:40:04'),(410,2,'2016-10-26 17:15:12'),(411,1,'2016-10-26 18:20:07'),(412,2,'2016-10-26 18:47:14'),(413,1,'2016-10-26 18:54:03'),(414,1,'2016-11-05 11:10:21'),(415,1,'2016-11-23 12:51:46'),(416,2,'2016-11-23 14:01:15'),(417,1,'2016-11-23 14:03:39'),(418,12,'2016-11-23 14:05:00'),(419,4,'2016-11-23 14:12:51'),(420,1,'2016-11-23 14:54:03'),(421,1,'2016-11-23 17:52:44'),(422,1,'2016-11-23 17:52:51'),(423,1,'2016-11-23 19:04:44'),(424,1,'2016-11-30 18:01:44'),(425,1,'2016-11-30 18:01:49'),(426,1,'2016-11-30 18:33:28'),(427,1,'2016-11-30 18:38:31'),(428,4,'2016-11-30 22:19:09'),(429,1,'2016-11-30 22:19:51'),(430,2,'2016-11-30 22:21:03'),(431,13,'2016-11-30 22:22:25'),(432,1,'2016-11-30 22:32:01'),(433,1,'2016-12-11 16:33:55'),(434,1,'2016-12-11 16:34:55'),(435,1,'2016-12-11 16:35:52');
/*!40000 ALTER TABLE `gas_iniciosesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_producto`
--

DROP TABLE IF EXISTS `gas_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(200) NOT NULL,
  `carga` varchar(10) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `estado` bit(1) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_producto`
--

LOCK TABLES `gas_producto` WRITE;
/*!40000 ALTER TABLE `gas_producto` DISABLE KEYS */;
INSERT INTO `gas_producto` VALUES (1,'Gas 5Kg','5',NULL,8250,110,20,''),(2,'Gas 11Kg','11',NULL,12950,113,20,''),(3,'Gas 15Kg','15',NULL,17100,110,20,''),(4,'Gas 45Kg','45',NULL,41000,105,10,'');
/*!40000 ALTER TABLE `gas_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_proveedores`
--

DROP TABLE IF EXISTS `gas_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(12) NOT NULL,
  `razonSocial` varchar(500) NOT NULL,
  `giro` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fono` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`),
  CONSTRAINT `id_tipoProveedores` FOREIGN KEY (`tipo`) REFERENCES `gas_tipoproveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_proveedores`
--

LOCK TABLES `gas_proveedores` WRITE;
/*!40000 ALTER TABLE `gas_proveedores` DISABLE KEYS */;
INSERT INTO `gas_proveedores` VALUES (1,'55.555.555-5','prueba razon social','prueba giro','prueba direccion','prueba fono',1),(2,'22.222.222-2','razon','vuelta','dire','asmdkasmd',2),(5,'18.261.421-1','raaaa','ggggggg','dddddd','2222222',3),(7,'55.555.545-5','aa','ee','dd','544',1);
/*!40000 ALTER TABLE `gas_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_tipoproveedor`
--

DROP TABLE IF EXISTS `gas_tipoproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_tipoproveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_tipoproveedor`
--

LOCK TABLES `gas_tipoproveedor` WRITE;
/*!40000 ALTER TABLE `gas_tipoproveedor` DISABLE KEYS */;
INSERT INTO `gas_tipoproveedor` VALUES (1,'Gas',NULL),(2,'Combustible',NULL),(3,'Otro','');
/*!40000 ALTER TABLE `gas_tipoproveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_users`
--

DROP TABLE IF EXISTS `gas_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_users` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_pass` varchar(64) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_fecha_registro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_status` int(11) NOT NULL,
  `display_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_users`
--

LOCK TABLES `gas_users` WRITE;
/*!40000 ALTER TABLE `gas_users` DISABLE KEYS */;
INSERT INTO `gas_users` VALUES (1,'admin','admin@admin.cl','2015-08-17 14:18:00',1,'ADMIN'),(2,'contraseña','hermancarrasco@outlook.com','2015-08-26 11:12:32',1,'herman'),(3,'123456','cliente@dominio.cl','2015-08-30 16:19:48',1,'Juan jhjgjgjh'),(4,'123456','cliente@cliente.cl','2015-08-30 16:23:09',1,'cliente'),(5,'123456','gonzalo@hotmail.con','2015-08-31 14:35:11',1,'gonzalo'),(6,'a1s2d3f4g5','g_diaz92@hotmail.com','2015-08-31 14:44:35',1,'gonzalo         calzonuo'),(7,'987654','hola@dominio.cl','2015-08-31 15:06:55',1,'holas'),(8,'asdasd','correo@midom.cl','2015-08-31 15:34:03',1,'Javiera'),(9,'1234567','mod@chile.cl','2015-09-07 13:55:09',1,'mod_dis'),(10,'123456','holamundo@gmail.cl','2015-09-07 14:12:01',1,'Hola'),(11,'123456','nuevo@cliente.cl','2015-12-07 16:32:10',1,'aaacliente'),(12,'123456','teran@admin.cl','2015-12-07 16:34:59',1,'bastian'),(13,'123456','nuevo@vendedor.cl','2015-12-07 16:53:19',1,'vendedorn'),(14,'123456','herman@dom.cl','2015-12-09 19:19:22',1,'herman'),(15,'123456','cristian.moreno@gmail.com','2015-12-10 11:02:28',1,'Cristian'),(16,'123456','cesar@corre.cl','2015-12-10 12:08:48',1,'cesar'),(17,'123456','cristian@correo.cl','2015-12-10 12:23:18',1,'cristian'),(18,'123456','rogelio@cliente.cl','2016-04-20 17:22:28',1,'Rogelio'),(19,'123456','herman@cliente.cl','2016-06-15 16:17:03',1,'herman'),(20,'123456','nuevo@cliente2.cl','2016-06-30 11:22:25',1,'nacho'),(21,'123456','tercer@vendedor.cl','2016-06-30 11:25:30',1,'felipe'),(22,'123456','mail@cliente.cl','2016-09-03 18:27:21',1,'iiiiiiiiiiiii');
/*!40000 ALTER TABLE `gas_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_ventas`
--

DROP TABLE IF EXISTS `gas_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_ventas` (
  `id_venta` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `fecha_venta` date NOT NULL DEFAULT '0000-00-00',
  `hora` varchar(8) DEFAULT NULL,
  `entregado` bit(1) NOT NULL,
  `pagado` bit(1) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `zona` int(1) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_prod` (`id_prod`,`id_user`),
  KEY `pk_venta_usr` (`id_user`),
  CONSTRAINT `id_prd_venta` FOREIGN KEY (`id_prod`) REFERENCES `gas_producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_venta_usr` FOREIGN KEY (`id_user`) REFERENCES `gas_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_ventas`
--

LOCK TABLES `gas_ventas` WRITE;
/*!40000 ALTER TABLE `gas_ventas` DISABLE KEYS */;
INSERT INTO `gas_ventas` VALUES (51,2,16,12950,'2016-02-23','15:01:41','','','tacora 504',1),(52,4,4,40000,'2016-01-23','15:27:35','','','miño 150 Rancagua',1),(53,4,4,41000,'2016-03-23','16:50:47','','','av españa 1515',1),(54,3,4,17100,'2016-03-24','11:45:05','','','carretera el cobre 617 Rancagua',4),(55,2,4,13000,'2016-03-24','12:06:42','','','grecia 1242 Rancagua',1),(56,2,4,12950,'2016-04-24','12:07:12','','','av san juan 376',2),(57,1,16,8250,'2016-04-06','22:26:42','','','tacora 796',1),(58,4,16,42000,'2016-04-06','22:26:52','','','tacora 998',1),(62,2,18,12950,'2016-04-21','12:05:17','','','Dr. Antonio Donghi 2156',1),(63,4,19,41000,'2016-06-15','16:01:54','','','recreo 1980',1),(65,3,4,17100,'2016-06-29','13:40:29','\0','\0','gamero 705',3),(66,4,4,41000,'2016-06-29','13:58:41','\0','\0','carretera el cobre 617 Rancagua',4),(67,1,4,8250,'2016-06-29','16:00:33','\0','\0','av españa 1515',1),(68,2,4,12950,'2016-06-29','16:00:51','\0','\0','tacora 150 rancagua',1),(69,3,4,17100,'2016-06-29','16:02:12','\0','\0','miño 150 Rancagua',1),(70,4,4,41000,'2016-06-29','16:03:06','\0','\0','arica 178 Rancagua',1),(71,3,4,17100,'2016-06-29','16:09:15','\0','\0','grecia 1242 Rancagua',1),(72,3,4,17100,'2016-09-03','19:53:33','\0','\0','kennedy 1100',1),(73,3,4,17100,'2016-09-03','19:56:56','\0','\0','kennedy 1100',1),(74,3,4,17100,'2016-09-03','19:59:30','\0','\0','einstein 835',4),(75,1,22,8250,'2016-09-05','16:50:59','\0','\0','republica de chile 734',1),(76,3,22,17100,'2016-09-05','17:26:24','\0','\0','republica de chile 734',1),(77,4,22,41000,'2016-09-05','17:27:13','\0','\0','republica de chile 734',1),(78,3,4,17100,'2016-11-23','14:13:59','\0','\0','gamero 705',3),(79,3,4,17100,'2016-11-30','22:19:13','\0','\0','gamero 705',3),(80,3,4,17100,'2016-11-30','22:19:26','\0','\0','grecia 1242 Rancagua',1);
/*!40000 ALTER TABLE `gas_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gas_ventasruta`
--

DROP TABLE IF EXISTS `gas_ventasruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gas_ventasruta` (
  `id_ventaRuta` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `hora_venta` time NOT NULL,
  `latitud` varchar(200) DEFAULT NULL,
  `longitud` varchar(200) DEFAULT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `zona` int(1) NOT NULL,
  PRIMARY KEY (`id_ventaRuta`),
  KEY `id_producto` (`id_producto`),
  KEY `id_producto_2` (`id_producto`),
  KEY `id_producto_3` (`id_producto`),
  CONSTRAINT `pk_prod` FOREIGN KEY (`id_producto`) REFERENCES `gas_producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_ventasruta`
--

LOCK TABLES `gas_ventasruta` WRITE;
/*!40000 ALTER TABLE `gas_ventasruta` DISABLE KEYS */;
INSERT INTO `gas_ventasruta` VALUES (1,3,14500,1,'2016-10-26','17:44:22','-561651','-11561','cualquiera rancagua',1),(5,1,8250,2,'2016-10-26','00:00:00','-34.161','-70.739','Recreo 399-449, Rancagua, VI Región, Chile',1),(6,1,8250,1,'2016-10-26','17:57:16','-34.161','-70.739','Recreo 399-449, Rancagua, VI Región, Chile',1),(7,1,8250,2,'2016-10-26','18:50:58','-34.161','-70.739','Recreo 399-449, Rancagua, VI Región, Chile',1),(8,4,41000,1,'2016-10-26','18:51:16','-34.161','-70.739','Recreo 399-449, Rancagua, VI Región, Chile',1),(9,3,17100,5,'2016-10-26','18:51:33','-34.161','-70.739','Recreo 399-449, Rancagua, VI Región, Chile',1);
/*!40000 ALTER TABLE `gas_ventasruta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-11 16:56:45
