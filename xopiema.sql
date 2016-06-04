CREATE DATABASE  IF NOT EXISTS `xopiema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `xopiema`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: xopiema
-- ------------------------------------------------------
-- Server version	5.0.41-community-nt

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL auto_increment,
  `category_name` varchar(50) NOT NULL,
  `short_descriptino` varchar(140) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conta_evento`
--

DROP TABLE IF EXISTS `conta_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta_evento` (
  `id` int(11) NOT NULL auto_increment,
  `banc` varchar(100) NOT NULL,
  `banc_acount` varchar(30) NOT NULL,
  `digit_account` varchar(10) default NULL,
  `agency` varchar(10) NOT NULL,
  `digit_agency` varchar(10) default NULL,
  `ouner_name` varchar(100) default NULL,
  `ouner_cnpj` varchar(100) default NULL,
  `ouner_cpf` varchar(100) default NULL,
  `ouner_endereco` text NOT NULL,
  `created_at` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `conta_evento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta_evento`
--

LOCK TABLES `conta_evento` WRITE;
/*!40000 ALTER TABLE `conta_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipe` (
  `id` int(11) NOT NULL auto_increment,
  `short_name` varchar(140) NOT NULL,
  `description` text,
  `district` varchar(40) default NULL,
  `city` varchar(40) default NULL,
  `country` varchar(40) default NULL,
  `quantity_players` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipe`
--

LOCK TABLES `equipe` WRITE;
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL auto_increment,
  `short_description` varchar(140) NOT NULL,
  `description` text,
  `created_at` datetime default NULL,
  `event_date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_fotos`
--

DROP TABLE IF EXISTS `evento_fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_fotos` (
  `id` int(11) NOT NULL auto_increment,
  `picture` text NOT NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `evento_fotos_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_fotos`
--

LOCK TABLES `evento_fotos` WRITE;
/*!40000 ALTER TABLE `evento_fotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento_fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricao_participante`
--

DROP TABLE IF EXISTS `inscricao_participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricao_participante` (
  `id` int(11) NOT NULL auto_increment,
  `total_value` double(14,2) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `key_validation` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_equipe` (`id_equipe`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `inscricao_participante_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`),
  CONSTRAINT `inscricao_participante_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricao_participante`
--

LOCK TABLES `inscricao_participante` WRITE;
/*!40000 ALTER TABLE `inscricao_participante` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricao_participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricao_visitante`
--

DROP TABLE IF EXISTS `inscricao_visitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricao_visitante` (
  `id` int(11) NOT NULL auto_increment,
  `long_name` varchar(100) NOT NULL,
  `phone1` varchar(20) default NULL,
  `phone2` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `total_value` double(14,2) NOT NULL,
  `key_validation` text NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `inscricao_visitante_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `inscricao_visitante_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricao_visitante`
--

LOCK TABLES `inscricao_visitante` WRITE;
/*!40000 ALTER TABLE `inscricao_visitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscricao_visitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL auto_increment,
  `description` text,
  `short_description` varchar(140) default NULL,
  `picture` text,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regras_evento`
--

DROP TABLE IF EXISTS `regras_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regras_evento` (
  `id` int(11) NOT NULL auto_increment,
  `players` enum('single','team') NOT NULL,
  `quantity_visitors` int(11) default NULL,
  `entry_value` double(14,2) default NULL,
  `quantity_players` int(11) NOT NULL,
  `inscription_value` double(14,2) NOT NULL,
  `short_description` varchar(140) default NULL,
  `id_evento` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `regras_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regras_evento`
--

LOCK TABLES `regras_evento` WRITE;
/*!40000 ALTER TABLE `regras_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `regras_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) default NULL,
  `nick_name` varchar(30) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password_key` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-04 17:47:43
