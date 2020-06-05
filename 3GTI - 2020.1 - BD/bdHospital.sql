CREATE DATABASE  IF NOT EXISTS `bdhospital` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdhospital`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bdhospital
-- ------------------------------------------------------
-- Server version	5.1.54-community-log

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
-- Table structure for table `acompanhamentos`
--

DROP TABLE IF EXISTS `acompanhamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acompanhamentos` (
  `id_acompanhamento` int(11) NOT NULL AUTO_INCREMENT,
  `dataentrada_acompanhamento` date NOT NULL,
  `datasaida_acompanhamento` date NOT NULL,
  `horaentrada_acompanhamento` time NOT NULL,
  `horasaida_acompanhamento` time NOT NULL,
  `cpfPaciente_acompanhamento` varchar(11) NOT NULL,
  `cpfAcompanhante_acompanhamento` varchar(11) NOT NULL,
  PRIMARY KEY (`id_acompanhamento`),
  KEY `cpfPaciente_acompanhamento` (`cpfPaciente_acompanhamento`),
  KEY `cpfAcompanhante_acompanhamento` (`cpfAcompanhante_acompanhamento`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acompanhamentos`
--

LOCK TABLES `acompanhamentos` WRITE;
/*!40000 ALTER TABLE `acompanhamentos` DISABLE KEYS */;
INSERT INTO `acompanhamentos` VALUES (1,'2020-05-15','2020-05-18','17:15:00','13:30:00','36034994845','80920403891');
/*!40000 ALTER TABLE `acompanhamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acompanhantes`
--

DROP TABLE IF EXISTS `acompanhantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acompanhantes` (
  `cpf_ACOMPANHANTE` varchar(11) NOT NULL,
  `nome_ACOMPANHANTE` varchar(100) NOT NULL,
  `datanascimento_ACOMPANHANTE` date NOT NULL,
  PRIMARY KEY (`cpf_ACOMPANHANTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acompanhantes`
--

LOCK TABLES `acompanhantes` WRITE;
/*!40000 ALTER TABLE `acompanhantes` DISABLE KEYS */;
INSERT INTO `acompanhantes` VALUES ('80920403891','Maria Aparecida de Campos','1952-06-20');
/*!40000 ALTER TABLE `acompanhantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agendas`
--

DROP TABLE IF EXISTS `agendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agendas` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `refeicao_agenda` varchar(20) NOT NULL,
  `observacao_agenda` text NOT NULL,
  `idMedicamento_agenda` int(11) NOT NULL,
  `idReceita_agenda` int(11) NOT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `idMedicamento_agenda` (`idMedicamento_agenda`),
  KEY `idReceita_agenda` (`idReceita_agenda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendas`
--

LOCK TABLES `agendas` WRITE;
/*!40000 ALTER TABLE `agendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_CARGO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_CARGO` varchar(30) NOT NULL,
  PRIMARY KEY (`id_CARGO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Enfermeiro');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cirurgias`
--

DROP TABLE IF EXISTS `cirurgias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cirurgias` (
  `id_cirurgia` int(11) NOT NULL AUTO_INCREMENT,
  `data_cirurgia` date NOT NULL,
  `hora_cirurgia` time NOT NULL,
  `idTipocirurgia_cirurgia` int(11) NOT NULL,
  `cpfPaciente_cirurgia` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_cirurgia`),
  KEY `idTipocirurgia_cirurgia` (`idTipocirurgia_cirurgia`),
  KEY `cpfPaciente_cirurgia` (`cpfPaciente_cirurgia`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cirurgias`
--

LOCK TABLES `cirurgias` WRITE;
/*!40000 ALTER TABLE `cirurgias` DISABLE KEYS */;
INSERT INTO `cirurgias` VALUES (1,'2020-05-15','20:00:00',1,'36034994845');
/*!40000 ALTER TABLE `cirurgias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas` (
  `id_CONSULTA` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_CONSULTA` varchar(30) NOT NULL,
  `data_CONSULTA` date NOT NULL,
  `hora_CONSULTA` time NOT NULL,
  `cpfPaciente_CONSULTA` varchar(11) NOT NULL,
  `crmMedico_CONSULTA` varchar(20) NOT NULL,
  `idSala_CONSULTA` varchar(4) NOT NULL,
  PRIMARY KEY (`id_CONSULTA`),
  KEY `cpfPaciente_CONSULTA` (`cpfPaciente_CONSULTA`),
  KEY `crmMedico_CONSULTA` (`crmMedico_CONSULTA`),
  KEY `idSala_CONSULTA` (`idSala_CONSULTA`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (1,'Consulta Simples','2020-06-01','16:00:00','14789856','1478520','1A05'),(2,'Retorno','2020-05-28','15:30:00','36034994845','48759652','1A05'),(3,'Consulta Emergencial','2020-05-22','13:00:00','36034994845','36985214','1A05');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenios`
--

DROP TABLE IF EXISTS `convenios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenios` (
  `id_CONVENIO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_CONVENIO` varchar(50) NOT NULL,
  `status_CONVENIO` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_CONVENIO`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenios`
--

LOCK TABLES `convenios` WRITE;
/*!40000 ALTER TABLE `convenios` DISABLE KEYS */;
INSERT INTO `convenios` VALUES (1,'Amil',1),(2,'Medial Saúde',1),(3,'Sulamérica Saúde',1),(5,'Notredame',1),(6,'Cabesp',1),(9,'Bradesco',1),(10,'Golden Cross',0);
/*!40000 ALTER TABLE `convenios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_DEPARTAMENTO` varchar(30) NOT NULL,
  PRIMARY KEY (`id_DEPARTAMENTO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Diagnósticos de imagem');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidades` (
  `id_ESPECIALIDADE` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ESPECIALIDADE` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ESPECIALIDADE`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (1,'Clínico-Geral'),(2,'Ortopedista'),(3,'Pediatra'),(4,'Cardiologista'),(5,'Infectologista'),(6,'Obstetra'),(7,'Instrumentista');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exames`
--

DROP TABLE IF EXISTS `exames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exames` (
  `id_EXAME` int(11) NOT NULL AUTO_INCREMENT,
  `data_EXAME` date NOT NULL,
  `hora_EXAME` time NOT NULL,
  `idTipoexame_EXAME` int(11) NOT NULL,
  `cpfPaciente_EXAME` varchar(11) NOT NULL,
  `crmMedico_EXAME` varchar(20) NOT NULL,
  `cpfFuncionario_EXAME` varchar(11) NOT NULL,
  `idSala_EXAME` varchar(4) NOT NULL,
  PRIMARY KEY (`id_EXAME`),
  KEY `idTipoexame_EXAME` (`idTipoexame_EXAME`),
  KEY `cpfPaciente_EXAME` (`cpfPaciente_EXAME`),
  KEY `crmMedico_EXAME` (`crmMedico_EXAME`),
  KEY `cpfFuncionario_EXAME` (`cpfFuncionario_EXAME`),
  KEY `idSala_EXAME` (`idSala_EXAME`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exames`
--

LOCK TABLES `exames` WRITE;
/*!40000 ALTER TABLE `exames` DISABLE KEYS */;
INSERT INTO `exames` VALUES (1,'2020-05-15','16:00:00',1,'36034994845','48759652','1478520013','2');
/*!40000 ALTER TABLE `exames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedores` (
  `cnpj_FONECEDOR` varchar(20) NOT NULL,
  `nome_FORNECEDOR` varchar(100) NOT NULL,
  `datainscricao_FORNECEDOR` date NOT NULL,
  `endereco_FORNECEDOR` varchar(100) NOT NULL,
  `telefone_FORNECEDOR` varchar(11) NOT NULL,
  `email_FORNECEDOR` varchar(50) NOT NULL,
  PRIMARY KEY (`cnpj_FONECEDOR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `cpf_FUNCIONARIO` varchar(11) NOT NULL,
  `nome_FUNCIONARIO` varchar(100) NOT NULL,
  `endereco_FUNCIONARIO` varchar(100) NOT NULL,
  `telefone_FUNCIONARIO` varchar(11) NOT NULL,
  `datanascimento_FUNCIONARIO` date NOT NULL,
  `idCargo_FUNCIONARIO` int(11) NOT NULL,
  `idDepartamento_FUNCIONARIO` int(11) NOT NULL,
  PRIMARY KEY (`cpf_FUNCIONARIO`),
  KEY `idCargo_FUNCIONARIO` (`idCargo_FUNCIONARIO`),
  KEY `idDepartamento_FUNCIONARIO` (`idDepartamento_FUNCIONARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` VALUES ('1478520013','Adalberto Pires','Rua da Praça, 150','11998759876','1990-02-21',1,1);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internacoes`
--

DROP TABLE IF EXISTS `internacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internacoes` (
  `id_internacao` int(11) NOT NULL AUTO_INCREMENT,
  `dataentrada_internacao` date NOT NULL,
  `datasaida_internacao` date NOT NULL,
  `horaentrada_internacao` time NOT NULL,
  `horasaida_internacao` time NOT NULL,
  `cpfPaciente_internacao` varchar(11) NOT NULL,
  `idSala_internacao` varchar(4) NOT NULL,
  `crmMedico_internacao` varchar(20) NOT NULL,
  PRIMARY KEY (`id_internacao`),
  KEY `cpfPaciente_internacao` (`cpfPaciente_internacao`),
  KEY `idSala_internacao` (`idSala_internacao`),
  KEY `crmMedico_internacao` (`crmMedico_internacao`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internacoes`
--

LOCK TABLES `internacoes` WRITE;
/*!40000 ALTER TABLE `internacoes` DISABLE KEYS */;
INSERT INTO `internacoes` VALUES (1,'2020-05-15','2020-05-18','17:15:00','13:30:00','36034994845','0','48759652');
/*!40000 ALTER TABLE `internacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicacoes`
--

DROP TABLE IF EXISTS `medicacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicacoes` (
  `idMedicamento_MEDICACAO` int(11) NOT NULL,
  `idReceita_MEDICACAO` int(11) NOT NULL,
  `data_MEDICACAO` date NOT NULL,
  `hora_MEDICACAO` time NOT NULL,
  `cpfFuncionario_MEDICACAO` varchar(11) NOT NULL,
  PRIMARY KEY (`idMedicamento_MEDICACAO`,`idReceita_MEDICACAO`),
  KEY `cpfFuncionario_MEDICACAO` (`cpfFuncionario_MEDICACAO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicacoes`
--

LOCK TABLES `medicacoes` WRITE;
/*!40000 ALTER TABLE `medicacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamentos` (
  `id_MEDICAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `nome_MEDICAMENTO` varchar(30) NOT NULL,
  `validade_MEDICAMENTO` date NOT NULL,
  `valor_MEDICAMENTO` float NOT NULL,
  `cnpjFornecedor_MEDICAMENTO` varchar(11) NOT NULL,
  PRIMARY KEY (`id_MEDICAMENTO`),
  KEY `cnpjFornecedor_MEDICAMENTO` (`cnpjFornecedor_MEDICAMENTO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamentos`
--

LOCK TABLES `medicamentos` WRITE;
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicos` (
  `crm_MEDICO` varchar(20) NOT NULL,
  `cpf_MEDICO` varchar(11) NOT NULL,
  `rg_MEDICO` varchar(9) NOT NULL,
  `nome_MEDICO` varchar(100) NOT NULL,
  `endereco_MEDICO` varchar(100) NOT NULL,
  `telefone_MEDICO` varchar(11) NOT NULL,
  `datanascimento_MEDICO` date NOT NULL,
  `bairro_MEDICO` varchar(50) NOT NULL,
  `cidade_MEDICO` varchar(50) NOT NULL,
  `email_MEDICO` varchar(100) NOT NULL,
  `idEspecialidade_MEDICO` int(11) NOT NULL,
  PRIMARY KEY (`crm_MEDICO`),
  KEY `idEspecialidade_MEDICO` (`idEspecialidade_MEDICO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES ('1478520','12345678900','123456789','Raila Cristina','Rua Arnaldo Cintra, 190','11994789633','1991-01-12','Tatuapé','São Paulo','raila@hotmail.com',3),('36985214','1597533698','456798132','Priscila Pereira','Rua da Consolação, 1122','11998784565','1999-10-22','Consolação','São Paulo','priscila@hotmail.com',1),('48759652','4545789631','15236598','Beatriz Azul','Avenida brás leme, 195','11945963312','1984-11-08','Santana','São Paulo','beatriz@hotmail.com',4);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `cpf_PACIENTE` varchar(11) NOT NULL,
  `nome_PACIENTE` varchar(100) NOT NULL,
  `endereco_PACIENTE` varchar(100) NOT NULL,
  `telefone_PACIENTE` varchar(11) DEFAULT NULL,
  `datanascimento_PACIENTE` date NOT NULL,
  `email_PACIENTE` varchar(50) DEFAULT NULL,
  `rg_PACIENTE` varchar(9) NOT NULL,
  `bairro_PACIENTE` varchar(50) NOT NULL,
  `cidade_PACIENTE` varchar(50) NOT NULL,
  PRIMARY KEY (`cpf_PACIENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES ('14789856','João Ortiz','Rua das Flores','11998785542','1990-08-30','joao@hotmail.com','453090754','Vila Maria','São Paulo'),('36034994845','Bruno de Souza Campos','Rua Doutor Arlindo de Assis, 70','11994739076','1994-10-30','bruno.souza.campos@hotmail.com','453060754','Pq Edu Chaves','São Paulo');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planos`
--

DROP TABLE IF EXISTS `planos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planos` (
  `idConvenio_PLANO` int(11) NOT NULL,
  `cpfPaciente_PLANO` varchar(11) NOT NULL,
  `numerocartao_PLANO` varchar(30) NOT NULL,
  `status_PLANO` tinyint(1) NOT NULL,
  PRIMARY KEY (`idConvenio_PLANO`,`cpfPaciente_PLANO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planos`
--

LOCK TABLES `planos` WRITE;
/*!40000 ALTER TABLE `planos` DISABLE KEYS */;
INSERT INTO `planos` VALUES (2,'14789856','456789123',1),(6,'36034994845','1000025410002365',1);
/*!40000 ALTER TABLE `planos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receitas`
--

DROP TABLE IF EXISTS `receitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receitas` (
  `id_RECEITA` int(11) NOT NULL AUTO_INCREMENT,
  `validade_RECEITA` date NOT NULL,
  `observacao_RECEITA` text NOT NULL,
  `idConsulta_RECEITA` int(11) NOT NULL,
  PRIMARY KEY (`id_RECEITA`),
  KEY `idConsulta_RECEITA` (`idConsulta_RECEITA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receitas`
--

LOCK TABLES `receitas` WRITE;
/*!40000 ALTER TABLE `receitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `receitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas` (
  `id_SALA` varchar(4) NOT NULL,
  `bloco_SALA` varchar(1) NOT NULL,
  `andar_SALA` int(11) NOT NULL,
  `numero_SALA` int(11) NOT NULL,
  `descricao_SALA` varchar(40) NOT NULL,
  `idTipo_SALA` int(11) NOT NULL,
  PRIMARY KEY (`id_SALA`),
  KEY `idTipo_SALA` (`idTipo_SALA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES ('1A05','A',1,5,'Liberada para uso',1),('C03','C',0,3,'Quarto para internação',4),('2b11','B',2,11,'Sala de Radiografia',3);
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timecirurgias`
--

DROP TABLE IF EXISTS `timecirurgias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timecirurgias` (
  `idcirurgia_timecirurgia` int(11) NOT NULL,
  `crmmedico_timecirurgia` varchar(20) NOT NULL,
  `funcao_timecirurgia` varchar(50) NOT NULL,
  PRIMARY KEY (`idcirurgia_timecirurgia`,`crmmedico_timecirurgia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timecirurgias`
--

LOCK TABLES `timecirurgias` WRITE;
/*!40000 ALTER TABLE `timecirurgias` DISABLE KEYS */;
INSERT INTO `timecirurgias` VALUES (1,'48759652','Cirurgião'),(1,'36985214','Instrumentista'),(1,'1478520','Anestesista');
/*!40000 ALTER TABLE `timecirurgias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocirurgias`
--

DROP TABLE IF EXISTS `tipocirurgias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocirurgias` (
  `id_TIPOCIRURGIA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TIPOCIRURGIA` varchar(30) NOT NULL,
  PRIMARY KEY (`id_TIPOCIRURGIA`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocirurgias`
--

LOCK TABLES `tipocirurgias` WRITE;
/*!40000 ALTER TABLE `tipocirurgias` DISABLE KEYS */;
INSERT INTO `tipocirurgias` VALUES (1,'Extração de pedra nos rins');
/*!40000 ALTER TABLE `tipocirurgias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoexames`
--

DROP TABLE IF EXISTS `tipoexames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoexames` (
  `id_TIPOEXAME` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TIPOEXAME` varchar(30) NOT NULL,
  PRIMARY KEY (`id_TIPOEXAME`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoexames`
--

LOCK TABLES `tipoexames` WRITE;
/*!40000 ALTER TABLE `tipoexames` DISABLE KEYS */;
INSERT INTO `tipoexames` VALUES (1,'Raio X');
/*!40000 ALTER TABLE `tipoexames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposalas`
--

DROP TABLE IF EXISTS `tiposalas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposalas` (
  `id_TIPOSALA` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TIPOSALA` varchar(30) NOT NULL,
  PRIMARY KEY (`id_TIPOSALA`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposalas`
--

LOCK TABLES `tiposalas` WRITE;
/*!40000 ALTER TABLE `tiposalas` DISABLE KEYS */;
INSERT INTO `tiposalas` VALUES (1,'Consultório'),(2,'Laboratório'),(3,'Sala de Exame'),(4,'Almoxarifado'),(5,'Internação');
/*!40000 ALTER TABLE `tiposalas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitantes`
--

DROP TABLE IF EXISTS `visitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitantes` (
  `cpf_VISITANTE` varchar(11) NOT NULL,
  `nome_VISITANTE` varchar(100) NOT NULL,
  `datanascimento_VISITANTE` date NOT NULL,
  PRIMARY KEY (`cpf_VISITANTE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitantes`
--

LOCK TABLES `visitantes` WRITE;
/*!40000 ALTER TABLE `visitantes` DISABLE KEYS */;
INSERT INTO `visitantes` VALUES ('36987554775','Leonardo Ribeiro','1992-09-12'),('36547885475','Bruno Leão','1993-12-13');
/*!40000 ALTER TABLE `visitantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas`
--

DROP TABLE IF EXISTS `visitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT,
  `dataentrada_visita` date NOT NULL,
  `horaentrada_visita` time NOT NULL,
  `horasaida_visita` time NOT NULL,
  `idInternacao_visita` int(11) NOT NULL,
  `cpfVisitante_visita` varchar(11) NOT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `cpfPaciente_visita` (`idInternacao_visita`),
  KEY `cpfVisitante_visita` (`cpfVisitante_visita`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas`
--

LOCK TABLES `visitas` WRITE;
/*!40000 ALTER TABLE `visitas` DISABLE KEYS */;
INSERT INTO `visitas` VALUES (1,'2020-05-16','16:00:00','16:30:00',1,'36987554775'),(2,'2020-05-17','16:00:00','16:30:00',1,'36547885475');
/*!40000 ALTER TABLE `visitas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-05 20:04:08
