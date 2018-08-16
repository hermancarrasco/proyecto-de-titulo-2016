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
  `id_user` bigint(20) NOT NULL,
  PRIMARY KEY (`id_datosUsuario`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_datosusuario`
--

LOCK TABLES `gas_datosusuario` WRITE;
/*!40000 ALTER TABLE `gas_datosusuario` DISABLE KEYS */;
INSERT INTO `gas_datosusuario` VALUES (1,'admin','herman','carrasco','admin',NULL,NULL,'11.111.111-1','mi direccion','14',NULL,1),(3,'herman','herman','carrasco soto','vendedor','','88998899','22.222.222-2','direccion del cliente','1524','',2),(4,'Juana','Juana','Perez','cliente','','88998899','33.333.333-3','Av España','1515','',3),(5,'aaaaa','aaaaa','dasd','cliente','','','18.261.421-1','direccion mia','1524','',4),(6,'gonzalo','gonzalo','Zuñiga','cliente','232323','34343434','3.333.333-3','vill del sol','3432','',5),(7,'gonzalo         calzonuo','gonzalo         calzonuo','mandoniado ddddddd','cliente','8989898989','92554822','11.111.111-1','dfdfdfdfdffdfddfdfddfdfd','3434343434','fggfg 34343',6),(8,'hola','hola','hola hola','cliente','212343','22222222','22.222.222-2','av kennedy','123','',7),(9,'asd','asd','asd','cliente','345545','44556556','11.111.111-1','direccion mia','4444','34',8),(10,'Trollencio','Trollencio','Meme','cliente','722241524','89049323','11.111.111-1','Gamero ','202','',9),(11,'Hola','Hola','mundo','cliente','225435215','89523132','11.111.111-1','cuevas','123','',10);
/*!40000 ALTER TABLE `gas_datosusuario` ENABLE KEYS */;
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
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_iniciosesion`
--

LOCK TABLES `gas_iniciosesion` WRITE;
/*!40000 ALTER TABLE `gas_iniciosesion` DISABLE KEYS */;
INSERT INTO `gas_iniciosesion` VALUES (1,1,'2015-09-02 22:27:24'),(2,1,'2015-09-02 22:32:37'),(3,4,'2015-09-02 22:36:03'),(4,1,'2015-09-02 22:37:14'),(5,1,'2015-09-02 22:54:55'),(6,1,'2015-09-02 22:56:59'),(7,1,'2015-09-02 22:58:18'),(8,1,'2015-09-02 22:58:27'),(9,4,'2015-09-02 23:21:28'),(10,3,'2015-09-02 23:25:28'),(11,8,'2015-09-02 23:29:51'),(12,8,'2015-09-02 23:30:03'),(15,5,'2015-09-02 23:41:42'),(16,1,'2015-09-03 08:39:42'),(17,1,'2015-09-03 08:42:19'),(18,1,'2015-09-03 09:49:42'),(19,1,'2015-09-03 10:31:07'),(20,1,'2015-09-05 13:40:29'),(21,4,'2015-09-05 13:41:03'),(22,1,'2015-09-05 13:45:01'),(23,4,'2015-09-05 13:45:10'),(24,4,'2015-09-05 13:46:19'),(25,4,'2015-09-05 13:47:51'),(26,1,'2015-09-05 13:49:28'),(27,1,'2015-09-05 13:49:37'),(28,1,'2015-09-05 13:51:00'),(29,4,'2015-09-05 13:51:16'),(30,4,'2015-09-05 13:55:12'),(31,4,'2015-09-05 14:07:28'),(32,4,'2015-09-05 14:11:29'),(33,4,'2015-09-05 14:19:08'),(34,1,'2015-09-05 14:22:38'),(35,1,'2015-09-05 14:31:04'),(36,4,'2015-09-05 14:47:01'),(37,1,'2015-09-05 14:47:12'),(38,4,'2015-09-05 15:21:52'),(39,4,'2015-09-05 15:24:17'),(40,4,'2015-09-05 15:38:29'),(41,4,'2015-09-06 10:15:55'),(42,4,'2015-09-06 13:18:56'),(43,4,'2015-09-06 13:22:14'),(44,4,'2015-09-06 16:16:40'),(45,4,'2015-09-06 18:01:59'),(46,1,'2015-09-06 18:02:46'),(47,1,'2015-09-06 18:03:27'),(48,3,'2015-09-06 20:00:16'),(49,1,'2015-09-06 20:12:10'),(50,1,'2015-09-06 20:27:19'),(51,1,'2015-09-06 21:00:15'),(52,1,'2015-09-06 21:08:57'),(53,1,'2015-09-06 21:20:44'),(54,3,'2015-09-06 21:57:03'),(55,1,'2015-09-06 21:57:28'),(56,3,'2015-09-06 21:57:37'),(57,2,'2015-09-06 22:24:31'),(58,2,'2015-09-06 22:25:57'),(59,1,'2015-09-07 13:46:16'),(60,1,'2015-09-07 13:51:24'),(61,9,'2015-09-07 13:55:53'),(62,9,'2015-09-07 14:09:06'),(63,10,'2015-09-07 14:12:27'),(64,1,'2015-09-07 14:13:29'),(65,2,'2015-09-07 14:18:06'),(66,4,'2015-09-10 10:46:13'),(67,1,'2015-09-10 10:51:01'),(68,1,'2015-09-16 11:29:29'),(69,4,'2015-09-16 11:30:13'),(70,1,'2015-09-16 11:30:26'),(71,1,'2015-09-21 23:27:17'),(72,1,'2015-09-25 12:36:48'),(73,1,'2015-09-25 17:23:15'),(74,4,'2015-09-25 22:32:35'),(75,1,'2015-09-25 22:32:50'),(76,1,'2015-09-27 15:05:28'),(77,1,'2015-09-27 19:18:07');
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
INSERT INTO `gas_producto` VALUES (1,'5KG',NULL,8250,100,10,''),(2,'11Kg',NULL,12950,100,10,''),(3,'15KG',NULL,17100,100,10,''),(4,'45Kg',NULL,41000,100,10,'');
/*!40000 ALTER TABLE `gas_producto` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_users`
--

LOCK TABLES `gas_users` WRITE;
/*!40000 ALTER TABLE `gas_users` DISABLE KEYS */;
INSERT INTO `gas_users` VALUES (1,'admin','admin@admin.cl','2015-08-17 14:18:00',1,'ADMIN'),(2,'contraseña','hermancarrasco@outlook.com','2015-08-26 11:12:32',1,'herman'),(3,'123456','cliente@dominio.cl','2015-08-30 16:19:48',1,'Juana'),(4,'123456','cliente@cliente.cl','2015-08-30 16:23:09',1,'aaaaa'),(5,'123456','gonzalo@hotmail.com','2015-08-31 14:35:11',1,'gonzalo'),(6,'a1s2d3f4g5','g_diaz92@hotmail.com','2015-08-31 14:44:35',1,'gonzalo         calzonuo'),(7,'987654','hola@dominio.cl','2015-08-31 15:06:55',1,'hola'),(8,'asdasd','asd@asd.cl','2015-08-31 15:34:03',1,'asd'),(9,'123456','trollencio@chile.cl','2015-09-07 13:55:09',1,'Trollencio'),(10,'123456','holamundo@gmail.cl','2015-09-07 14:12:01',1,'Hola');
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
  `fecha_venta` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `entregado` bit(1) NOT NULL,
  `pagado` bit(1) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_prod` (`id_prod`,`id_user`),
  CONSTRAINT `id_prd_venta` FOREIGN KEY (`id_prod`) REFERENCES `gas_producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gas_ventas`
--

LOCK TABLES `gas_ventas` WRITE;
/*!40000 ALTER TABLE `gas_ventas` DISABLE KEYS */;
INSERT INTO `gas_ventas` VALUES (1,4,4,41000,'2015-09-06 16:07:22','\0','\0'),(2,4,4,41000,'2015-09-06 16:24:41','\0','\0'),(3,4,4,41000,'2015-09-06 16:28:19','\0','\0'),(4,3,4,17100,'2015-09-06 16:50:11','\0','\0'),(5,2,3,12950,'2015-09-06 20:00:45','\0','\0'),(6,3,10,17100,'2015-09-07 14:13:02','\0','\0'),(7,4,10,41000,'2015-09-07 14:13:11','\0','\0');
/*!40000 ALTER TABLE `gas_ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-27 23:41:42
