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
-- Table structure for table `categoria_evento`
--

DROP TABLE IF EXISTS `categoria_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_evento` (
  `id` int(11) NOT NULL auto_increment,
  `id_evento` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_evento` (`id_evento`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `categoria_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`),
  CONSTRAINT `categoria_evento_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(120) default NULL,
  `estado` int(5) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Cidade_estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `contato_usuario`
--

DROP TABLE IF EXISTS `contato_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato_usuario` (
  `id` int(11) NOT NULL auto_increment,
  `phone1` varchar(14) NOT NULL,
  `phone2` varchar(14) default NULL,
  `phone3` varchar(14) default NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `contato_usuario_ibfk_1` (`id_usuario`),
  CONSTRAINT `contato_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` int(11) NOT NULL auto_increment,
  `id_conect_table` int(11) NOT NULL,
  `conection_table` varchar(50) NOT NULL,
  `id_city` int(11) NOT NULL,
  `street` text NOT NULL,
  `district` text,
  PRIMARY KEY  (`id`),
  KEY `id_city` (`id_city`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `cidade` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `id_usuario` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(75) default NULL,
  `uf` varchar(5) default NULL,
  `pais` int(7) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_Estado_pais` (`pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_evento_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(60) default NULL,
  `sigla` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `vacancies` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `regras_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `login` varchar(100) NOT NULL,
  `password_key` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `validacao_cadastro`
--

DROP TABLE IF EXISTS `validacao_cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validacao_cadastro` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL,
  `hash_code` varchar(24) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `validacao_cadastro_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-26 18:31:26
