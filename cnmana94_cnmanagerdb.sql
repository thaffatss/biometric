-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Jan-2022 às 03:19
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cnmana94_cnmanagerdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `dataEntrada` date DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` varchar(100) DEFAULT NULL,
  `peso` varchar(100) DEFAULT NULL,
  `altura` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status_pago` tinyint(1) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `procedimento` varchar(50) DEFAULT NULL,
  `pc_valor` varchar(50) NOT NULL,
  `sessoes` int(11) NOT NULL,
  `atestado` longtext,
  `Pagamento_idPagamento` int(11) NOT NULL,
  `Planos_idPlano` int(11) NOT NULL,
  `disabled` tinyint(1) DEFAULT '1',
  `opcao1` int(11) NOT NULL DEFAULT '2',
  `opcao2` int(11) NOT NULL DEFAULT '2',
  `opcao3` int(11) NOT NULL DEFAULT '2',
  `opcao4` int(11) NOT NULL DEFAULT '2',
  `opcao5` int(11) NOT NULL DEFAULT '2',
  `opcao6` int(11) NOT NULL DEFAULT '2',
  `opcao7` int(11) NOT NULL DEFAULT '2',
  `opcao8` int(11) NOT NULL DEFAULT '2',
  `opcao9` int(11) NOT NULL DEFAULT '2',
  `opcao10` int(11) NOT NULL DEFAULT '2',
  `opcao11` int(11) NOT NULL DEFAULT '2',
  `opcao12` int(11) NOT NULL DEFAULT '2',
  `opcao13` int(11) NOT NULL DEFAULT '2',
  `opcao14` int(11) NOT NULL DEFAULT '2',
  `opcao15` int(11) NOT NULL DEFAULT '2',
  `opcao16` int(11) NOT NULL DEFAULT '2',
  `opcao17` int(11) NOT NULL DEFAULT '2',
  `opcao18` int(11) NOT NULL DEFAULT '2',
  `opcao19` int(11) NOT NULL DEFAULT '2',
  `opcao20` int(11) NOT NULL DEFAULT '2',
  `opcao21` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idCliente`),
  KEY `Pagamento_idPagamento` (`Pagamento_idPagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='									';

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `dataEntrada`, `horaEntrada`, `nome`, `idade`, `peso`, `altura`, `cpf`, `telefone`, `saldo`, `profissao`, `endereco`, `descricao`, `status_pago`, `dataSaida`, `horaSaida`, `procedimento`, `pc_valor`, `sessoes`, `atestado`, `Pagamento_idPagamento`, `Planos_idPlano`, `disabled`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `opcao5`, `opcao6`, `opcao7`, `opcao8`, `opcao9`, `opcao10`, `opcao11`, `opcao12`, `opcao13`, `opcao14`, `opcao15`, `opcao16`, `opcao17`, `opcao18`, `opcao19`, `opcao20`, `opcao21`) VALUES
(1, '2021-06-28', '18:00:38', 'Bruno Bezerra', '', '', '', '000.000.000-00', '', '0', 'contador', '', '', 1, NULL, NULL, 'Reabilitação', '560,00', 7, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, '2021-06-28', '18:04:06', 'Fernando Bastos', '36', '', '', '000.000.000-00', '', '0', 'Policial Federal', '', '', 1, NULL, NULL, '', '360,00', 2, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(4, '2021-06-28', '18:06:38', 'Hosana Feijo', NULL, NULL, NULL, '', '', '0', 'Arquiteta', '', NULL, 1, NULL, NULL, '', '400,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(5, '2021-06-28', '18:08:35', 'Jairo Costa', NULL, NULL, NULL, '', '', '0', 'Promotor', '', NULL, 1, NULL, NULL, '', '400,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, '2021-06-28', '18:10:12', 'Jamaira Pereira da Silva', NULL, NULL, NULL, '', '', '0', 'Autônoma ', '', NULL, 1, NULL, NULL, 'Avaliação + Quiropraxia', '400,00', 2, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(7, '2021-06-28', '18:13:46', 'Léa Silva', NULL, NULL, NULL, '', '', '0', 'Professora', '', NULL, 1, NULL, NULL, 'Quiropraxia', '200,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(8, '2021-06-28', '18:15:50', 'Ueslei Rodrigues ', NULL, NULL, NULL, '', '', '0', 'Analista de Sistema', '', NULL, 1, NULL, NULL, 'RPG', '400,00', 3, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(9, '2021-06-28', '18:17:01', 'Yaquelim Pereira Ramirez', NULL, NULL, NULL, '', '', '0', 'Médica', '', NULL, 1, NULL, NULL, '', '', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(10, '2021-06-28', '18:18:05', 'Junior Santoas', NULL, NULL, NULL, '', '', '0', 'Empresário', '', NULL, 1, NULL, NULL, 'RPG', '400,00', 2, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(11, '2021-06-28', '18:23:22', 'Luciano Ricardo', NULL, NULL, NULL, '', '', '0', 'Enfermeiro', '', NULL, 1, NULL, NULL, 'RPG', '400,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(13, '2021-07-13', '14:56:20', 'João Paulo ', NULL, NULL, NULL, '', '', '0', 'Fotografo', '', NULL, 1, NULL, NULL, 'Reabilitação', '570,00', 8, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(14, '2021-07-13', '15:26:20', 'Pamela Martins', NULL, NULL, NULL, '016.833.392-90', '(68) 9 9205-4730', '0', 'Autonoma', 'Travessa da Mangueira, 902, Boca da alemanha', NULL, 1, NULL, NULL, 'Fisioterapia ', '640,00', 6, '', 4, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(15, '2021-07-13', '16:55:21', 'Viviane Moura do Santos', NULL, NULL, NULL, '023.813.012-67', '(68) 9 9982-7254', '0', '', 'Rua raimundo leite de melo, n 31, Bairro Aeroporto velho', NULL, 1, NULL, NULL, 'Reabilitação', '640,00', 5, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(16, '2021-08-03', '10:36:00', 'adenilde lima de oliveira', NULL, NULL, NULL, '514.150.112-49', '(68) 9 9991-7619', '0', '', 'rua 590 numero 910, manoel terças', NULL, 1, NULL, NULL, 'avaliação de quiropraxia', '150,00', 0, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(17, '2021-08-03', '14:51:00', 'Maria Itamiria Faustino Souza', NULL, NULL, NULL, '025.732.572-74', '(97) 9 8403-3761', '0', 'Maquiadora', 'Bairro Colegio R jamir nauas, 974', NULL, 1, NULL, NULL, 'Quiropraxia', '150,00', 1, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(18, '2021-08-03', '16:07:00', 'Fernanda cabral lima', NULL, NULL, NULL, '93.141.232-91', '(68) 9 9203-3507', '0', '', 'rua santa catarina, bairro são jose', NULL, 1, NULL, NULL, 'avaliação quiropraxia ', '150,00', 0, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(19, '2021-08-03', '15:00:00', 'Cleber Correa', NULL, NULL, NULL, '591.461.252-72', '(68) 9 9948-4706', '0', '', 'Rua Djalma Dultra 1221, 25 de agosto', NULL, 1, NULL, NULL, 'avaliação e quiropraxia', '150,00', 0, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(20, '2021-08-03', '16:00:00', 'William leite e silva', NULL, NULL, NULL, '530.560.862-72', '(68) 9 9921-2839', '0', '', 'Rua de alagoas 591 bairro  colegio', NULL, 1, NULL, NULL, 'avaliação + quiropraxia', '150,00', 0, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(21, '2021-08-03', '18:00:00', 'Aline feitosa de souza', NULL, NULL, NULL, '028.677.952-81', '', '0', '', 'Rua 5 de novembro bairro formoso', NULL, 1, NULL, NULL, 'avaliação + quiropraxia', '150,00', 0, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(22, '2021-08-03', '19:30:00', 'Mateus Henrrique Bastos Melo', NULL, NULL, NULL, '004.427.582-00', '', '0', '', 'Avenida lauro miller , joão alves', NULL, 1, NULL, NULL, 'quiropraxia ', '120,00', 0, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(23, '2021-08-03', '20:21:00', 'Gustavo Bandeira cameli', NULL, NULL, NULL, '815.491.302-00', '(68) 9 9908-8313', '0', '', 'av. 25 de agosto 1992', NULL, 1, NULL, NULL, 'avaliação + quiropraxia', '150,00', 0, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(24, '2021-08-09', '15:30:00', 'Paulo de Sa', NULL, NULL, NULL, '000.000.000-00', '(68) 9 2193-253', '0', '', 'rua murú, joão alves', NULL, 1, NULL, NULL, 'avaliação e quiropraxia', '150,00', 0, '', 4, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(25, '2021-08-09', '14:00:00', 'felipe almeida rodrigues', NULL, NULL, NULL, '002.868.872-40', '(68) 9 9201-7700', '0', '', 'travessa do flamengo ,20 , bairro cruzeirão', NULL, 1, NULL, NULL, 'avaliação e quiropraxia', '135,00', 1, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(26, '2021-07-17', '15:00:00', 'joão victor ', NULL, NULL, NULL, '000.000.000-00', '(68) 9 8107-7346', '0', '', 'avenida', NULL, 1, NULL, NULL, 'avaliação quiropraxia', '150,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(27, '2021-08-30', '08:34:00', 'thiago juca', NULL, NULL, NULL, '936.875.242-72', '(68) 9 9607-3329', '', '', 'rua 23 de outubro são jose', NULL, 1, NULL, NULL, 'avaliação e quiropraxia', '150,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(28, '2021-08-27', '15:18:00', 'emily vasconcelos melo', NULL, NULL, NULL, '074.716.792-39', '(00) 0 0000-0000', '0', '', 'rua floriano peixoto, centro , 406', NULL, 1, NULL, NULL, 'quiropraxia e avaliação', '150,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(29, '2021-08-28', '09:30:00', 'nayara barbos B. silva', NULL, NULL, NULL, '005.317.952-84', '(68) 9 9223-2693', '0', '', 'rua 25 de agosto, 4782', NULL, 1, NULL, NULL, 'quiropraxia e avaliação', '150,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(30, '2021-08-14', '08:30:00', 'beijamin', '', '', '', '833.709.432-04', '(68) 9 9223-2693', '0', '', 'av 25 de agosto, 4782', '', 1, NULL, NULL, 'reabilitação 8 sessoes ', '640,00', 8, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(31, '0221-08-13', '10:30:00', 'luci helen vasconcelos silva', NULL, NULL, NULL, '519.848.492-04', '(00) 0 0000-0000', '0', '', 'rua solimões, 150', NULL, 1, NULL, NULL, 'quiropraxia e reabilitação', '740,00', 8, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(32, '2021-08-13', '15:45:00', 'ana paula de paula da silva', NULL, NULL, NULL, '852.705.552-04', '(68) 9 9202-2633', '0', '', 'rua benedito leite, 1041 cohab', NULL, 1, NULL, NULL, 'avaliação e pacote de quiropraxia ', '650,00', 4, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(33, '2021-08-26', '15:54:00', 'selma freitas', NULL, NULL, NULL, '339.843.281-49', '', '0', '', 'rio branco ', NULL, 1, NULL, NULL, 'avaliação', '150,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(34, '2021-08-24', '09:30:00', 'Ado Lima de almeida', NULL, NULL, NULL, '484.040.631-49', '(99) 9 5914-64', '0', '', 'rua beijamin constante, 1629', NULL, 1, NULL, NULL, 'avaliação e pacote de reabilitação ', '790,00', 0, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(35, '0021-09-30', '14:00:00', 'natalino de jesus gonçalves maria ', NULL, NULL, NULL, '017.671.652-18', '(00) 0 0000-0000', '0', '', 'rua absoçlon moreira 60 ap 104', NULL, 1, NULL, NULL, 'avaliação ', '150,00', 0, '', 4, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(36, '2021-10-01', '15:00:00', 'maria eunice de sa melo', NULL, NULL, NULL, '065.737.112-20', '(00) 0 0000-0000', '0', '', 'av. bolevar thaumaturgo 2651', NULL, 1, NULL, NULL, 'avaliação', '150,00', 0, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(37, '2022-01-03', '15:30:00', 'FREDSON FERREIRA', '', '', '', '931.683.302-72', '(68) 9 9973-1592', '0', '', 'RUA MINAS GERAIS', '', 1, NULL, NULL, 'AVALIAÇÃO', '162,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(38, '2022-01-03', '16:30:00', 'ESTELA', '', '', '', '', '', '0', '', '', '', 1, NULL, NULL, 'QUIROPRAXIA', '150,00', 1, '', 4, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(39, '2022-01-03', '20:00:00', 'MARIA DAS NEVES', '', '', '', '', '', '0', '', '', '', 1, NULL, NULL, 'AVALIAÇÃO', '180,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(40, '2021-12-30', '18:30:00', 'luiz guimarães barbosa', NULL, NULL, NULL, '195.940.382-62', '(00) 0 0000-0000', '0', '', 'rua mato grosso, 2561, são josé', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(41, '2021-12-24', '00:00:00', 'mateus silva santana', NULL, NULL, NULL, '020.348.152-62', '(00) 0 0000-0000', '1', '', 'av. general thaumaturgo ', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(42, '2021-12-13', '00:00:00', 'danielli marques de lima', NULL, NULL, NULL, '008.217.622-14', '(00) 0 0000-0000', '0', '', 'r, thaumaturgo de azevedo, 204, casa 12', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(43, '2021-12-21', '00:00:00', 'sandson vilber silva oliveira', NULL, NULL, NULL, '020.080.952-07', '(99) 9 8894-54', '0', '', 'rua floriano peixoto, cobal', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(44, '2022-02-03', '21:00:00', 'antonio augusto F, do vale', NULL, NULL, NULL, '308.699.602-10', '(00) 0 0000-0000', '0', '', 'rua carlos lopes de sousa, 71', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(45, '2021-12-21', '00:00:00', 'jose renilson R, moura', NULL, NULL, NULL, '391.142.442-68', '(00) 0 0000-0000', '0', '', 'rua beijamin constante , 846', NULL, 1, NULL, NULL, 'avaliação', '150,00', 1, '', 4, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(46, '2021-12-30', '17:00:00', 'maria assucena', NULL, NULL, NULL, '686.124.234-68', '(00) 0 0000-0000', '0', '', 'osasco, SP', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(47, '2021-12-30', '16:00:00', 'ana cassia', NULL, NULL, NULL, '458.804.202-00', '(00) 0 0000-0000', '0', '', 'osasco SP', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 1, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(48, '2021-12-30', '10:00:00', 'francisco de oliveira ferreira', NULL, NULL, NULL, '012.024.482-03', '(00) 0 0000-0000', '0', '', 'bairro do remanso', NULL, 1, NULL, NULL, 'avaliação', '180,00', 1, '', 2, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(49, '2021-12-10', '18:00:00', 'marcelle M, vieira', NULL, NULL, NULL, '005.328.052-08', '(68) 9 9968-7063', '0', '', 'leopordo de bulhoões, 820. telegrafo', NULL, 1, NULL, NULL, 'avaliação', '162,00', 1, '', 3, 1, NULL, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(50, '2022-01-04', '08:30:00', 'JARISSON DOUGLAS DE SOUZA OLIVEIRA', NULL, NULL, NULL, '041.305.722-45', '', '0', 'PROFESSOR', 'RUA MATO GROSSO N°1046 BAIRRO DO TELEGRAFO', NULL, 1, NULL, NULL, 'AVALIAÇÃ/QUIROPRAXIA', '180,00', 1, '', 2, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(51, '2022-01-04', '16:30:00', 'RADAMES FERREIRA DA SILVA', '', '', '', '863.591.182-20', '', '0', 'SERVIDOR MUNICIPAL', 'TRAVESSA BOULEVARD THAUMATURGO', '', 1, NULL, NULL, 'AVALIAÇÃO/QUIROPRAXIA', '180,00', 1, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(52, '2022-01-04', '16:30:00', 'ROSANGELA NASCIMENTO', NULL, NULL, NULL, '636.268.022-72', '', '0', 'ADMINISTRADORA', 'AV.COPACABANA', NULL, 1, NULL, NULL, 'AVALIAÇÃO/QUIROPRAXIA', '180,00', 1, '', 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(53, '2022-01-05', '14:00:00', 'ALCILENE MARIA SILVA MARTINS', NULL, NULL, NULL, '843.458.022-53', '', '0', 'DOMESTICA', 'RUA RIVALDO BORGES DE PAIVA', NULL, 1, NULL, NULL, 'AVALIAÇÃO/QUIROPRAXIA', '180,00', 1, '', 2, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(54, '2022-01-06', '14:00:00', 'EMERSON EMANUEL', NULL, NULL, NULL, '042.420.352-92', '', '0', 'ESTUDANTE', 'RUA JOSÉ PEDRO DA CRUZ', NULL, 1, NULL, NULL, 'AVALIAÇÃO/QUIROPRAXIA', '180,00', 1, '', 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(55, '2022-01-06', '15:30:00', 'CARLOS CHAUCA', NULL, NULL, NULL, '', '', '0', '', '', NULL, 1, NULL, NULL, '', '150,00', 1, '', 4, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_estetica`
--

DROP TABLE IF EXISTS `cliente_estetica`;
CREATE TABLE IF NOT EXISTS `cliente_estetica` (
  `idCliente_estetica` int(11) NOT NULL AUTO_INCREMENT,
  `dataEntrada` date DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` varchar(100) DEFAULT NULL,
  `peso` varchar(100) DEFAULT NULL,
  `altura` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status_pago` int(11) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `procedimento` varchar(50) DEFAULT NULL,
  `pc_valor` varchar(50) NOT NULL,
  `sessoes` int(11) NOT NULL,
  `atestado` longtext,
  `Pagamento_idPagamento` int(11) NOT NULL,
  `Planos_idPlano` int(11) NOT NULL,
  `disabled` tinyint(1) DEFAULT '1',
  `opcao1` int(11) NOT NULL DEFAULT '2',
  `opcao2` int(11) NOT NULL DEFAULT '2',
  `opcao3` int(11) NOT NULL DEFAULT '2',
  `opcao4` int(11) NOT NULL DEFAULT '2',
  `opcao5` int(11) NOT NULL DEFAULT '2',
  `opcao6` int(11) NOT NULL DEFAULT '2',
  `opcao7` int(11) NOT NULL DEFAULT '2',
  `opcao8` int(11) NOT NULL DEFAULT '2',
  `opcao9` int(11) NOT NULL DEFAULT '2',
  `opcao10` int(11) NOT NULL DEFAULT '2',
  `opcao11` int(11) NOT NULL DEFAULT '2',
  `opcao12` int(11) NOT NULL DEFAULT '2',
  `opcao13` int(11) NOT NULL DEFAULT '2',
  `opcao14` int(11) NOT NULL DEFAULT '2',
  `opcao15` int(11) NOT NULL DEFAULT '2',
  `opcao16` int(11) NOT NULL DEFAULT '2',
  `opcao17` int(11) NOT NULL DEFAULT '2',
  `opcao18` int(11) NOT NULL DEFAULT '2',
  `opcao19` int(11) NOT NULL DEFAULT '2',
  `opcao20` int(11) NOT NULL DEFAULT '2',
  `opcao21` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idCliente_estetica`) USING BTREE,
  KEY `Pagamento_idPagamento` (`Pagamento_idPagamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='									' ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `cliente_estetica`
--

INSERT INTO `cliente_estetica` (`idCliente_estetica`, `dataEntrada`, `horaEntrada`, `nome`, `idade`, `peso`, `altura`, `cpf`, `telefone`, `saldo`, `profissao`, `endereco`, `descricao`, `status_pago`, `dataSaida`, `horaSaida`, `procedimento`, `pc_valor`, `sessoes`, `atestado`, `Pagamento_idPagamento`, `Planos_idPlano`, `disabled`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `opcao5`, `opcao6`, `opcao7`, `opcao8`, `opcao9`, `opcao10`, `opcao11`, `opcao12`, `opcao13`, `opcao14`, `opcao15`, `opcao16`, `opcao17`, `opcao18`, `opcao19`, `opcao20`, `opcao21`) VALUES
(1, '2021-07-13', '14:48:42', 'Luan Felipe Santiago da Silva', '', '', '', '031.002.482-01', '(68) 9 9610-9658', '', 'barbeiro', 'Rua Alfredo Teles', '', 1, NULL, NULL, 'pacote de Massoterapia', '320,00', 1, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(2, '2021-07-13', '16:00:00', 'Carla Fernandes Coelho de Melo Sampaio', '', '', '', '887.894.112-34', '(68) 9 9938-8005', '0', '', 'Av 25 de agosto 4941, aeroporto velho', '', 1, NULL, NULL, 'Pacote de massoterapia', '350,00', 0, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, '2021-07-14', '16:00:00', 'Livia da Silvia Cordeiro', '', '', '', '508.677.502-78', '(92) 9 3567-903', '0', '', '', '', 1, NULL, NULL, ' pacote de massoterapia', '320,00', 3, '', 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(4, '2021-07-27', '19:00:00', 'Loize Caroline Rodrigues Sampaio', NULL, NULL, NULL, '023.508.412-35', '(68) 9 9968-6572', '0', 'psicóloga ', 'Rua morada Feliz, bairro formoso', NULL, 1, NULL, NULL, 'massoterapia', '100,00', 0, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(5, '2021-07-15', '16:00:00', 'Calina Rocha Araujo', NULL, NULL, NULL, '014.085.982-99', '(68) 9 9936-9031', '0', '', 'avenida lauro miller apartamento 104 AABB', NULL, 1, NULL, NULL, 'massoterapia', '100,00', 0, '', 4, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(6, '2021-07-26', '10:00:00', 'Antônio Andrez Osório de Souza', NULL, NULL, NULL, '', '(68) 9 9223-7297', '0', '', 'rua pará, 1390', NULL, 1, NULL, NULL, 'massoterapia', '100,00', 0, '', 4, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(7, '2021-07-24', '00:00:00', 'Eliquim Dultra Ribeiro', NULL, NULL, NULL, '863.178.222-04', '', '0', 'perito', 'rua Rio de janeiro 861 cruzeirão', NULL, 1, NULL, NULL, 'massoterapia', '100,00', 0, '', 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(8, '2021-07-17', '12:00:00', 'Nagida Vieira Costa', NULL, NULL, NULL, '411.708.572-72', '', '0', '', 'rua floriano peixoto 1211 cobal', NULL, 1, NULL, NULL, 'massoterapia', '100,00', 0, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(9, '2021-07-17', '15:00:00', 'Marisson Ferreira da Silva', NULL, NULL, NULL, '887.908.512-34', '', '0', '', 'AV. keopordo de bulhões 875 telegrafo', NULL, 1, NULL, NULL, 'massoterapi', '100,00', 0, '', 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(10, '2021-08-04', '14:00:00', 'FRancymeire Oliveira do Nascimento', NULL, NULL, NULL, '830.924.712-53', '(68) 9 9909-4397', '0', '', 'Rua alagoas telegrafo', NULL, 1, NULL, NULL, 'massoterapia', '100,00', 0, '', 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(11, '2021-08-04', '18:00:00', 'Matheus Rododlfo de santana', NULL, NULL, NULL, '338.060.818-16', '(12) 9 8282-8778', '', '', 'Rua do Muru 101, ap 108', NULL, 1, NULL, NULL, 'pacote de massoterapia', '350,00', 3, '', 4, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(12, '2021-08-06', '15:00:00', 'reginaldo de souza ferreira', NULL, NULL, NULL, '016.349.372-36', '(68) 9 9985-8733', '0', 'professor', 'rua pernambuco, telegrafo, 2187', NULL, 1, NULL, NULL, 'masoterapia e ventosa', '150,00', 0, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(13, '2021-08-13', '13:30:00', 'mylena çlecy martins da costa', NULL, NULL, NULL, '000.262.023-52', '(00) 0 0000-0000', '0', '', 'rua do muru, 101, bairro aabb', NULL, 1, NULL, NULL, 'pacote de massoterapia ', '350,00', 4, '', 3, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(14, '2022-01-03', '13:00:00', 'EVANILDO ALVES DE CASTRO', '', '', '', '307.919.442-04', '', '0', '', 'RUA LIBERDADE 160, RIO BRANCO', '', 1, NULL, NULL, 'MASSOTERAPIA+VENTOSA', '135,00', 1, '', 1, 2, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_pilates`
--

DROP TABLE IF EXISTS `cliente_pilates`;
CREATE TABLE IF NOT EXISTS `cliente_pilates` (
  `idCliente_pilates` int(11) NOT NULL AUTO_INCREMENT,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `dataBloqueio` date DEFAULT NULL,
  `dataLiberacao` date DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `idade` varchar(50) DEFAULT NULL,
  `pc_valor` varchar(50) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `sessoes` int(11) DEFAULT NULL,
  `atestado` longtext,
  `descricao` longtext,
  `procedimento` varchar(100) DEFAULT NULL,
  `Pagamento_idPagamento` int(11) DEFAULT NULL,
  `Planos_idPlano` int(11) DEFAULT NULL,
  `status_pago` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT '1',
  `opcao1` int(11) NOT NULL DEFAULT '2',
  `opcao2` int(11) NOT NULL DEFAULT '2',
  `opcao3` int(11) NOT NULL DEFAULT '2',
  `opcao4` int(11) NOT NULL DEFAULT '2',
  `opcao5` int(11) NOT NULL DEFAULT '2',
  `opcao6` int(11) NOT NULL DEFAULT '2',
  `opcao7` int(11) NOT NULL DEFAULT '2',
  `opcao8` int(11) NOT NULL DEFAULT '2',
  `opcao9` int(11) NOT NULL DEFAULT '2',
  `opcao10` int(11) NOT NULL DEFAULT '2',
  `opcao11` int(11) NOT NULL DEFAULT '2',
  `opcao12` int(11) NOT NULL DEFAULT '2',
  `opcao13` int(11) NOT NULL DEFAULT '2',
  `opcao14` int(11) NOT NULL DEFAULT '2',
  `opcao15` int(11) NOT NULL DEFAULT '2',
  `opcao16` int(11) NOT NULL DEFAULT '2',
  `opcao17` int(11) NOT NULL DEFAULT '2',
  `opcao18` int(11) NOT NULL DEFAULT '2',
  `opcao19` int(11) NOT NULL DEFAULT '2',
  `opcao20` int(11) NOT NULL DEFAULT '2',
  `opcao21` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idCliente_pilates`) USING BTREE,
  KEY `Pagamento_idPagamento` (`Pagamento_idPagamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COMMENT='									' ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `cliente_pilates`
--

INSERT INTO `cliente_pilates` (`idCliente_pilates`, `dataInicio`, `dataFim`, `dataBloqueio`, `dataLiberacao`, `nome`, `cpf`, `idade`, `pc_valor`, `profissao`, `telefone`, `endereco`, `sessoes`, `atestado`, `descricao`, `procedimento`, `Pagamento_idPagamento`, `Planos_idPlano`, `status_pago`, `status`, `disabled`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `opcao5`, `opcao6`, `opcao7`, `opcao8`, `opcao9`, `opcao10`, `opcao11`, `opcao12`, `opcao13`, `opcao14`, `opcao15`, `opcao16`, `opcao17`, `opcao18`, `opcao19`, `opcao20`, `opcao21`) VALUES
(23, '2021-07-13', '2021-09-13', NULL, NULL, 'Leticia Negreiros', '046.555.072-09', '', '400,00', '', '', '', 0, '', '', '', 4, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(24, '2021-07-07', '2021-10-07', NULL, NULL, 'Ana Carolina Silva Domingues ', '058.822.189-93', '', '522,00', 'Delegada', '(41) 9 1868-800', 'Rua Muru, 101, Ap 109 AABB', 11, '', '', '', 4, 7, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(25, '2021-07-07', '2021-10-07', NULL, NULL, 'Tiago Mariani Palter', '06.886.643-32', '', '522,00', '', '(41) 9 1868-800', 'Rua Muru,101, Ap 109', 8, '', '', '', 4, 7, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(27, '2021-08-09', '2021-12-22', NULL, NULL, 'José Euson De Freitas Pascoa ', '627.136.392-04', '', '260,00', '', '(68) 9 9975-9103', 'Rua Purus, 211, João Alves ', 6, '', '', '', 5, 13, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(28, '2021-09-24', '2022-01-24', NULL, NULL, 'Nucia Sales De Melo', '360.262.202-91', '', '580,00', '', '(68) 9 9985-1480', 'Rua Alfredo Teles, 1731', 8, '', '', '', 1, 13, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(38, '2021-09-16', '2021-10-16', NULL, NULL, 'Paula Fernanda Pereira Almeida', '005.863.142-96', '', '180,00', '', '(68) 9 6953-7135', 'Vila Militar De ST N 24', 11, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(40, '2021-09-09', '2021-11-09', NULL, NULL, 'Sabrina Oliveira Abrahim Almeida', '930.713.373-72', '', '180,00', '', '(68) 9 9946-1566', 'Trav. Paulo Cesar, 151, Aeroporto Velho', 17, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(41, '2021-08-09', '2021-11-09', NULL, NULL, 'Laura', '', '', '180,00', '', '(68) 9 9946-1566', 'Trav. Paulo Cesar , 151, Aeroporto Velho', 17, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(43, '2021-07-22', '2022-01-22', NULL, NULL, 'Juliana De Souza Araùjo ', '000.847.822-85', '', '180,00', '', '(68) 9 9978-1205', 'Rua Canamaris, 986, Bairro João Alves', 11, '', '', '', 4, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(45, '2021-07-27', '2021-08-27', NULL, NULL, 'larissa aniely rocha barbary', '961.350.182-72', '', '150,00', '', '(68) 9 2924-515', 'rua alfredo teles', 9, '', '', '', 4, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(47, '2021-07-22', '2022-01-22', NULL, NULL, 'Mirna Costa Da Silva', '940.045.102-44', '', '180,00', '1', '(68) 9 9989-3762', 'Rua Paraiso, 86, Conjunto São Francisco', 9, '', '', '', 2, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(49, '2021-07-23', '2021-12-10', NULL, NULL, 'Suziane Araújo Façanha', '888.213.402-44', '', '180,00', '', '(68) 9 9958-3952', 'Rua De Alagoas 550 Bairro Colegio', 10, '', '', '', 2, 12, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(50, '2021-07-27', '2021-10-27', NULL, NULL, 'Lorena Rezende Vieira', '066.516.996-52', '', '580,00', '', '(31) 8 2081-441', 'Av Coronel Mâncio Lima, 2061 Apt 305 AABB', 9, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(51, '2021-08-09', '2021-10-09', NULL, NULL, 'Thalita Feitosa Cysneiros', '060.684.344-27', '', '193,00', '', '(68) 9 9239-7756', 'Av , 25 De Agosto 722', 8, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(53, '2021-08-03', '2021-10-03', NULL, NULL, 'Cleber Correa', '591.461.252-72', '', '400,00', '', '(68) 9 9948-4706', 'Rua Djalma Dultra 1221, 25 De Agosto', 8, '', '', '', 1, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(55, '2021-08-03', '2022-02-03', NULL, NULL, 'William Leite E Silva', '530.560.862-72', NULL, '1.320,00', '', '(68) 9 9921-2839', 'Rua De Alagoas 591, Bairro Colegio', 72, NULL, NULL, '', 3, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(56, '2021-08-22', '2021-10-22', NULL, NULL, 'Adenilde Lima De Oliveira', '514.150.112-49', '', '180,00', '', '(68) 9 9917-619', '', 12, '', '', '', 2, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(57, '2021-09-06', '2022-01-08', NULL, NULL, 'Luciana Rodrigues De Araujo', '000.000.000-00', '', '220,00', '', '(68) 9 9984-7562', 'João Alves Rua Canamaris', 6, '', '', '', 2, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(58, '2021-08-05', '2021-09-05', NULL, NULL, 'Nara Nubia Sampaio Freitas', '032.367.412-53', '', '260,00', '', '(68) 9 9298-1727', 'Avenida 17 De Novembro 615 , Centro', 10, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(59, '2021-08-05', '2022-02-05', NULL, NULL, 'Lacione Pedrosa Maia', '748.110.022-53', '', '180,00', '', '(69) 9 9902-7419', 'Rua Dombrouwiski, 210, Aeroporto Velho', 12, '', '', '', 1, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(68, '2021-09-09', '2021-10-09', NULL, NULL, 'Renilzia Silva Souza', '830.950.392-04', '', '150,00', '', '(68) 9 9962-8347', 'Coronel Barbosa , 197, Cruzeirinho Novo', 11, '', '', '', 4, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(69, '2021-08-09', '2021-10-09', NULL, NULL, 'Fernando Magalhaes ', '949.023.562-87', '', '260,00', '', '(68) 9 9989-6833', 'Bairro Santa Terezinha ', 12, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(73, '2021-08-12', '2022-02-04', NULL, NULL, 'Maria Izadoria Borgues De Souza', '195.874.652-53', '', '150,00', '', '(68) 9 9961-7655', 'Conjunto Thaumaturgo De Azevedo, Quadra 2, Casa 8, Cohab', 7, '', '', 'PILATES FORTALECIMENTO', 4, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(74, '2021-08-17', '2022-02-17', NULL, NULL, 'Lucia De Vasconcelos Souza', '322.521.102-87', '', '180,00', '', '(68) 9 9957-0875', 'Rua Solimões, 150, Bairro Floresta', 19, '', '', '', 1, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(75, '2021-08-12', '2021-09-12', NULL, NULL, 'Francisca Lucas Dos Santos', '322.309.152-15', '', '220,00', '', '(68) 9 9982-0899', 'Rua Pedro Teles 1140, Cruzeirinho', 9, '', '', '', 3, 1, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(79, '2021-08-18', '2022-01-10', NULL, NULL, 'Caroline P. Cunha De Sá', '763.299.507-25', '', '260,00', '', '(68) 9 9986-4925', 'Rua Solimões, 191, Arthur Maia', 10, '', '', '', 1, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(80, '2021-08-19', '2022-01-10', NULL, NULL, 'Vera Lúcia Da Silva Cunha', '763.299.507-25', '', '260,00', '', '(68) 9 9986-4925', 'Rua Solimões 191, Arthur Maia', 2, '', '', '', 1, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(84, '2021-09-13', '2022-01-13', NULL, NULL, 'José Secunde Pereira De Sá', '000.000.000-00', '', '220,00', '', '(68) 9 9986-4925', 'Rua Solimões, 191, Arthu Maia', 9, '', '', '', 1, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(86, '2021-08-31', '2021-12-31', NULL, NULL, 'Erison Tiago Silva Jucá', '936.875.242-72', '', '480,00', '', '(68) 9 9607-3329', 'Rua 23 De Outubro São José', 24, '', '', '', 3, 6, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(87, '2021-09-06', '2022-02-01', NULL, NULL, 'Iracy De Melo Sarah Oliveira', '000.000.000-00', '', '260,00', '', '(68) 9 9958-3500', 'Rua Djalma Dutra, 380, Centro', 11, '', '', '', 2, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(88, '2021-09-06', '2021-12-06', NULL, NULL, 'Odaíza Bandeira De Araujo', '910.482.572-15', '', '700,00', '', '(68) 9 9922-5616', 'Fazenda Recordação, Estra Do Ponte Do Moa,', 32, '', '', '', 3, 6, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(89, '2021-09-06', '2021-10-06', NULL, NULL, 'Sárita Alves Da Silva', '509.077.862-00', '', '260,00', '', '(68) 9 9987-2447', 'Rua De Alagoas 415, Bairro Colegio', 12, '', '', '', 4, 8, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(91, '2022-01-03', '2022-03-03', NULL, NULL, 'Marlon Lima De Araujo', '003.214.662-09', '', '400,00', '', '(68) 9 9968-3850', 'Avenida Joaquim Tavora, 912, Baixa ', 16, '', '', 'PILATES', 3, 5, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(95, '2021-12-07', '2022-02-07', NULL, NULL, 'Jessica Rodrigues Rosa', '985.232.872-72', '', '400,00', '', '(00) 0 0000-0000', 'Rua Carlos Lopes De Souza', 16, '', '', '', 3, 5, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(98, '2021-09-23', '2022-01-23', NULL, NULL, 'Maria Aurinete Cruz Da Silva', '000.000.000-00', '', '220,00', '', '(00) 0 0000-0000', 'Rua Silvan, 345, Aeroporto Velho', 11, '', '', '', 1, 10, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(99, '2021-09-06', '2021-10-06', NULL, NULL, 'Sárita Alves Da Silva ', '509.077.862-00', '', '260,00', '', '(00) 0 0000-0000', 'Rua Regos Barros, 482, Centro', 12, '', '', '', 3, 8, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(100, '2021-09-14', '2021-12-22', NULL, NULL, 'Renata Matias De Souza Pascóa', '853.882.202-06', '', '260,00', '', '(00) 0 0000-0000', 'Rua Purus 211, João Alves ', 6, '', '', '', 4, 14, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(102, '2021-10-01', '2022-01-01', NULL, NULL, 'Ado Lima De Almeida', '484.040.631-49', '', '580,00', '', '(99) 9 5914-64', 'Rua Beijamin Constante, 1629', 19, '', '', '', 3, 7, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(103, '2021-09-16', '2021-12-22', NULL, NULL, 'Maria Railda De Oliveira Sena', '433.814.802-00', '', '260,00', '', '', 'Rua Regos Barros 1880', 7, '', '', '', 3, 4, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(104, '2021-10-04', '2022-01-11', NULL, NULL, 'Evadson De Souza Lima', '031.642.002-69', '', '650,00', '', '(00) 0 0000-0000', 'Av, São Paulo 1367, Cruzeirão', 1, '', '', '', 2, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(105, '2021-10-01', '2022-03-01', NULL, NULL, 'Suélen Cássia Dos Santos Silva', '843.457.562-00', '', '480,00', '', '(00) 0 0000-0000', 'Rua Vanderlei Da Silva Barbosa, 90, Bairro Divisor', 18, '', '', '', 3, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(107, '2021-09-11', '2022-01-13', NULL, NULL, 'Sarita Alvez Da Silva', '509.077.862-00', '', '194,00', '', '(00) 0 0000-0000', 'Rua Rego Barros 482 Centro', 8, '', '', '', 1, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(108, '2021-10-13', '2022-01-13', NULL, NULL, 'Beijamin Junior', '833.709.432-04', '', '580,00', '', '(00) 0 0000-0000', 'Av 25 De Agosto, 4782ç, 01', 22, '', '', '', 3, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(109, '2021-10-11', '2022-01-11', NULL, NULL, 'Sophia Negreiros', '', '', '480,00', '', '(00) 0 0000-0000', 'Rua Espirito Santos, Av 25 De Agosto, 510', 16, '', '', '', 4, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(112, '2021-10-13', '2022-01-13', NULL, NULL, 'Valmilene Farias De Souza Albino', '623.128.982-68', '', '180,00', '', '(00) 0 0000-0000', 'Br 307, 892, Santa Terezinha ', 8, '', '', '', 4, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(113, '2021-10-13', '2022-01-13', NULL, NULL, 'Frncisco Albino De Araujo', '196.452.012-68', '', '180,00', '', '(00) 0 0000-0000', 'Br 307, 892, Santa Terezinha', 8, '', '', '', 4, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(115, '2021-10-18', '2022-01-18', NULL, NULL, 'Eloiany Cezar Dos Santos Bezerra', '307.775.538-64', '', '180,00', '', '(00) 0 0000-0000', 'Rua Alagoas 1170', 7, '', '', '', 1, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(116, '2021-10-20', '2021-12-20', NULL, NULL, 'Kelly', '995.400.882-91', '', '150,00', '', '(00) 0 0000-0000', 'Rua Beijamim Constant, 1649', 5, '', '', '', 1, 3, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(117, '2021-12-13', '2022-03-13', '0000-00-00', NULL, 'Daniele De Souza Martins', '000.000.000-00', '', '400,00', '', '(00) 0 0000-0000', 'Morro Da Gloria, 188', 12, '', '', '', 3, 6, 1, 0, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(118, '2021-10-25', '2021-12-25', '0000-00-00', NULL, 'Angélica Matos De Souza', '744.878.172-34', '', '400,00', '', '(00) 0 0000-0000', 'Rua Humberto Grandidier, 160, Guarani', 15, '', '', '', 3, 1, 0, 0, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(119, '2021-09-30', '2022-01-30', NULL, NULL, 'Suiane da costa negreiros', '304.138.182-68', '', '150,00', 'Infectologista', '', 'rua floriano peixoto, 665, aluminio', 8, '', '', '', 1, 11, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(122, '2021-11-09', '2022-12-09', NULL, NULL, 'Maria Ilecir Silva Bezerra', '003.643.742-50', '', '260,00', '', '(00) 0 0000-0000', 'Av. 17 De Novembro, 1780, Remanso', 12, '', '', '', 4, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(123, '2021-11-09', '2021-12-09', NULL, NULL, 'Ana Gabriela Bissoli Da Silva Borgues', '028.356.752-05', '', '260,00', '', '(00) 0 0000-0000', 'Rua Do Condamine, 514, Bairro Do Formoso', 12, '', '', '', 3, 4, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(125, '2021-11-09', '2022-02-09', NULL, NULL, 'Ana Paula De Paula Silva ', '852.705.552-04', '', '580,00', '', '(00) 0 0000-0000', 'Rua Yago, 111, Cohab', 24, '', '', '', 4, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(126, '2021-11-09', '2021-12-09', NULL, NULL, 'Kethyla Mota De Araujo', '810.603.942-00', '', '580,00', '', '(00) 0 0000-0000', 'Av. Rodrigues Alves, 171 Apto 03, Centro', 24, '', '', '', 3, 2, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(127, '2021-11-10', '2022-01-10', NULL, NULL, 'Cleiciane Lopes Da Silva', '013.483.252-32', '', '240,00', '', '(00) 0 0000-0000', 'Av. 17 De Novembro, 336, Centro', 12, '', '', '', 4, 6, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(128, '2021-11-16', '2022-01-16', NULL, NULL, 'Adilson Olimpio Costa', '041.642.836-37', '', '194,00', '', '(00) 0 0000-0000', 'Rua Antônio Costeiro, 286, Manoel Terças', 8, '', '', '', 4, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(129, '2021-11-04', '2022-02-04', NULL, NULL, 'Janete Ponce Medeiros', '216.438.492-04', '', '700,00', '', '(00) 0 0000-0000', 'Rua Pedro Teles, 0243, Baixa', 12, '', '', '', 3, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(130, '2021-11-17', '2022-01-17', NULL, NULL, 'Maria Everlandia De Brio Ribeiro', '008.894.332-16', '', '380,00', '', '(00) 0 0000-0000', 'Rua Yaco, 1291, Bairro Cohab', 8, '', '', '', 3, 5, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(131, '2021-11-17', '2022-01-17', NULL, NULL, 'Eliaquim Dultra Ribeiro', '863.178.222-04', '', '360,00', '', '(00) 0 0000-0000', 'Rua Yaco, 1291, Cohab', 8, '', '', '', 3, 5, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(132, '2021-11-17', '2021-12-17', NULL, NULL, 'Narah Greice De Lima Rocha', '835.853.892-87', '', '260,00', '', '(00) 0 0000-0000', 'Rua Açai, 70, Bairro São Francisco', 12, '', '', '', 3, 4, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(133, '2021-11-17', '2022-01-17', NULL, NULL, 'Luiz Antonio Vieira Da Cunha', '217.573.302-59', '', '220,00', '', '(00) 0 0000-0000', 'AABB, Rua Alfredo Teles, 1731', 8, '', '', '', 4, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(136, '2021-11-10', '2022-01-10', NULL, NULL, 'Maria Da Conceição Aquino De Lima', '433.843.822-34', '', '220,00', '', '(00) 0 0000-0000', 'Av. 28 De Setembro, 5121, Aeroporto Velho', 8, '', '', '', 3, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(137, '2021-11-17', '2021-12-17', NULL, NULL, 'Marcos Jose Ribeiro De Carvalho', '998.988.701-25', '', '260,00', '', '', 'Av Mancio Lima Ao Lado Do Supermercado Cameli', 12, '', '', '', 3, 4, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(138, '2021-10-31', '2021-12-31', NULL, NULL, 'Aerisson Thiago Siva Jucá', '936.875.242-72', '', '480,00', '', '', '', 32, '', '', '', 3, 6, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(139, '2021-11-24', '2021-12-24', NULL, '0000-00-00', 'Maria Oliveira Costa De Freitas', '791.561.502-53', '', '208,00', '', '(00) 0 0000-0000', 'Rua Sergipe 440, Telegrafo', 11, '', '', '', 3, 4, 0, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(140, '2021-11-12', '2022-02-12', '0000-00-00', '0000-00-00', 'Hortencia Meiry Daiany Marciel Brito', '830.879.582-04', NULL, '700,00', '', '(00) 0 0000-0000', 'Av 25 De  Agosto 4561, Aeroporto Velho', 32, NULL, NULL, 'plano trimestral', 3, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(141, '2021-11-16', '2022-01-16', NULL, '0000-00-00', 'Josefa Pereira Lucas', '508.441.052-87', '', '190,00', '', '(00) 0 0000-0000', 'Rua Pernanbuco 2237, Telegrafo', 8, '', '', 'pilates', 1, 13, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(142, '2021-11-16', '2022-01-16', '0000-00-00', '0000-00-00', 'Maria Ecy Pereira Lucas', '216.632.382-00', '', '190,00', '', '(00) 0 0000-0000', 'Rua De Alagoas, 1200', 8, '', '', 'pilates', 1, 13, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(143, '2021-12-13', '2022-01-13', NULL, '0000-00-00', 'Aurea Pinheiro Sarah', '195.907.332-04', NULL, '180,00', '', '(00) 0 0000-0000', 'Av Lauro Miller, Joao Alvez 1182', 12, NULL, NULL, 'pilates', 3, 12, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(144, '2021-11-29', '2022-01-29', NULL, '0000-00-00', 'EMERSON SOUZA DE OLIVEIRA', '678.089.722-15', '', '176,00', '', '(00) 0 0000-0000', 'AV GETULIO VARGAS 1332, COBAL', 7, '', '', 'PILATES', 3, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(145, '2021-12-22', '2022-01-22', NULL, '0000-00-00', 'Angelica Rebouças De Carvalho', '013.084.022-01', '', '235,00', '', '(00) 0 0000-0000', 'Estrada BR 307, Km 02 Bairro Divisor\'', 12, '', '', 'pilates boleto', 3, 6, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(146, '2021-12-13', '2022-02-13', NULL, '0000-00-00', 'Mariani Duarte Massena De Freitas', '021.022.060-09', NULL, '400,00', '', '(00) 0 0000-0000', 'Travessa 7, Casa 13, Vila Dos Oficiais', 16, NULL, NULL, 'pilates', 3, 5, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(147, '2021-12-21', '2022-03-21', NULL, '0000-00-00', 'Maria Das Graças Alves Dos Santos', '622.854.082-34', NULL, '580,00', '', '(00) 0 0000-0000', 'Rua Antonio Costeira, 455 João Alves', 24, NULL, NULL, 'pilates', 3, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(148, '2021-12-03', '2022-01-03', '0000-00-00', '0000-00-00', 'Helenice De Freitas Pascoa', '411.977.122-91', NULL, '260,00', '', '(00) 0 0000-0000', 'Rua Newton Prado, 536, João Alves', 12, NULL, NULL, 'pilates', 4, 4, 0, 0, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(149, '2021-11-04', '2022-02-04', NULL, '0000-00-00', 'Ketila Barros De Azevedo', '886.454.522-00', NULL, '580,00', '', '(00) 0 0000-0000', 'Rua Major Assis De Vasconcelos, Aeroporto Velho', 24, NULL, NULL, 'pilates', 3, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(150, '2021-12-08', '2022-01-08', NULL, '0000-00-00', 'Naiara De Lima Silva', '003.497.262-56', NULL, '260,00', '', '(00) 0 0000-0000', 'Av. São Paulo 677, 25 De Agosto', 12, NULL, NULL, 'pilates', 3, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(151, '2021-11-22', '2022-12-22', NULL, '0000-00-00', 'Elmer Pereira Da Rocha', '009.634.552-73', NULL, '235,00', '', '(00) 0 0000-0000', 'Avenida Copacabana, Bairro Floresta', 12, NULL, NULL, 'pilates, boleto', 2, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(152, '2021-11-26', '2022-01-26', NULL, NULL, 'Àquila Pereira Da Silva', '778.493.702-44', NULL, '400,00', '', '(00) 0 0000-0000', 'Tv Getulio Viga, 60, Nossa Senhora Das Graças', 16, NULL, NULL, 'pilates', 3, 5, 1, NULL, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(153, '2021-11-22', '2022-01-22', NULL, '0000-00-00', 'Manuela Canuto De Santana Farhat', '820.928.002-30', '', '220,00', '', '(00) 0 0000-0000', 'Rua Leopordo De Bulhões, 3076, Cruzeirão', 7, '', '', 'pilates', 1, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(154, '2021-12-09', '2022-02-09', '0000-00-00', '0000-00-00', 'Antonio Elenilton Oliveira Ferreira', '666.924.312-04', NULL, '400,00', '', '(00) 0 0000-0000', 'Rua Luiz Pererira 351, Aeroporto Velho', 16, NULL, NULL, 'pilates', 3, 5, 1, 0, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(155, '2021-12-09', '2022-01-09', NULL, '0000-00-00', 'Emily Vitoria Vasconcelos Da Silva', '045.943.642-25', NULL, '190,00', '', '(00) 0 0000-0000', 'Av Copacabana, 115, Bairro Floresta, ', 8, NULL, NULL, 'pilates', 3, 13, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(156, '2021-12-09', '2022-01-09', NULL, '0000-00-00', 'Lucilene Vasconcelos Da Silva', '216.532.672-91', NULL, '190,00', '', '(00) 0 0000-0000', 'Av Copacabana, 115, Bairro Floresta', 8, NULL, NULL, 'pilates', 1, 13, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(157, '2021-11-23', '2022-01-23', NULL, '0000-00-00', 'Mariana Da Costa Negreiros Do Vale', '012.917.312-26', '', '150,00', '', '(00) 0 0000-0000', 'Rua Floriano Peixoto, Aluminio, 666', 8, '', '', 'pilates', 1, 11, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(158, '2021-12-13', '2022-01-13', '0000-00-00', '0000-00-00', 'Mariana Da Costa Falcão', '007.414.612-26', NULL, '260,00', '', '(00) 0 0000-0000', 'Rua Paraiba, 841, Telegrafo', 12, NULL, NULL, 'pilates', 4, 4, 1, 0, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(159, '2021-11-17', '2021-12-17', NULL, '0000-00-00', 'Biliarde Borges Da Silva Bissoli', '010.502.402-35', NULL, '260,00', '', '(00) 0 0000-0000', 'Rua Do Condamine, 514, Bairro Formoso', 12, NULL, NULL, 'pilates', 3, 4, 0, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(160, '2021-10-19', '2022-01-19', NULL, '0000-00-00', 'Isabela Yamine De Oliveira', '045.134.412-08', '', '220,00', '', '(00) 0 0000-0000', 'Avenida Coronel Mancio Lima, Aeroporto Velho', 8, '', '', 'pilates', 1, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(161, '2021-12-29', '2022-01-29', NULL, '0000-00-00', 'JOSE MARIA NASCIMENTO DA SILVA', '877.439.902-06', NULL, '180,00', '', '(68) 9 9904-9915', 'RUA IRIS, 20, JARDIM PRIMAVERA', 11, NULL, NULL, 'PILATES MENSAL', 1, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(162, '2021-12-08', '2022-01-08', NULL, '0000-00-00', 'ELCIMEIRE', '', NULL, '180,00', '', '', '', 12, NULL, NULL, '', 2, 2, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(163, '2022-01-03', '2022-02-03', NULL, '0000-00-00', 'LUIZ GUIMARÃES BARBOSA', '195.940.382-62', NULL, '235,00', 'MILITAR', '', 'RUA MATO GROSSO, N°2561 BAIRRO:SÃO JOSÉ', 11, NULL, NULL, '', 4, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(164, '2022-01-01', '2022-01-07', NULL, '0000-00-00', 'EVANILDO ALVES DE CASTRO', '307.919.442-04', '', '90', 'EMPRESARIO', '(68) 9 9983-2473', 'RUA LIBERDADE, 160, RIO BRANCO', 1, '', '', '03 AULA INDIVIDUAL DE PILATES', 1, 2, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(165, '2021-11-17', '2022-01-17', NULL, '0000-00-00', 'VANUSIA PEREIRA LIMA DE SOUZA', '391.106.212-53', '', '240,00', '', '(68) 9 9988-7651', 'RUA TARAUACA. 03, COHAB', 12, '', '', 'PILATES BOLETO', 3, 6, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(166, '2021-12-14', '2022-03-14', NULL, '0000-00-00', 'VINICIUS SARAIVA RODRIGUES', '034.163.396-19', NULL, '580,00', '', '(68) 9 9226-6501', 'AV, 25 DE AGOSTO 163', 36, NULL, NULL, 'PILATES', 3, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(167, '2021-11-17', '2022-01-17', NULL, '0000-00-00', 'EBER CARDOSO DE FREITAS', '826.533.992-53', NULL, '260,00', '', '(68) 9 9281-5357', 'RUA RIO GRANDE DO SUL, 1181', 12, NULL, NULL, 'PILATES', 4, 4, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(168, '2022-01-04', '2022-02-04', NULL, '0000-00-00', 'FREDSON FERREIRA', '931.683.302-72', NULL, '260,00', 'SERVIDOR PUBLICO', '', 'RUA MINAS GERAIS, N°1850', 11, NULL, NULL, 'PILATES FORTALCIMENTO', 3, 2, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(169, '2021-12-30', '2022-01-30', NULL, '0000-00-00', 'ANASSAILDES DA SILVA', '626.226.502-30', NULL, '220,00', 'MEDICO', '', 'ESTRADA DO CANELA FINA', 7, NULL, NULL, 'PILATES FORTALECIMENTO', 1, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(170, '2022-01-04', '2022-02-04', NULL, '0000-00-00', 'MONICA MARIA ARAUJO MIRANDA', '', '', '162,00', '', '', '', 12, '', '', 'PILATES', 1, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(171, '2022-01-04', '2022-02-04', NULL, '0000-00-00', 'RISOLANGE NEGREIROS', '', '', '162,00', '', '', '', 11, '', '', '', 4, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(172, '2022-01-04', '2022-02-04', NULL, '0000-00-00', 'LARA BELIZE VEIGA DIAS', '', NULL, '194,00', '', '', 'TRAVESSA ANTONIO LUCAS, BAIRRO:AEROPORTO VELHO N°51', 7, NULL, NULL, 'PILATES', 1, 7, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(173, '2022-01-05', '2022-02-05', NULL, '0000-00-00', 'ARIELE DE FREITAS RODRIGUES', '842.368.682-53', '', '235,00', '', '(68) 9 9219-4273', 'RUA SIQUEIRA CAMPOS, 25 DE AGOSTO N°1645', 11, '', '', 'PILATES', 1, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(174, '2022-01-05', '2022-02-05', NULL, '0000-00-00', 'DALVA SOUZA SILVA MOREIRA', '730.022.832-15', NULL, '235,00', '', '', '', 12, NULL, NULL, 'PILATES', 1, 8, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(175, '2022-01-05', '2022-02-05', NULL, '0000-00-00', 'NATIELE DA SILVA SAMPAIO', '', NULL, '193,00', '', '', '', 12, NULL, NULL, 'PILATES', 2, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(176, '2022-01-05', '2022-02-05', NULL, '0000-00-00', 'aline', '', '', '193,00', '', '', '', 12, '', '', '', 4, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(177, '2022-01-05', '2022-02-05', NULL, '0000-00-00', 'ANDERSON', '', NULL, '193,00', '', '', '', 12, NULL, NULL, '', 4, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(178, '2021-12-24', '2022-01-24', NULL, '0000-00-00', 'Ana Paula Valle Aquino', '979.008.342-49', NULL, '220,00', '', '(58) 9 9982-2478', 'Rua Rio Grande Do Sul, 1420', 8, NULL, NULL, 'pilates', 1, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(179, '2022-01-06', '2022-01-21', NULL, '0000-00-00', 'BRUNO NILO GUIMARAES', '529.746.772-15', NULL, '160,00', 'ENGENHEIRO CIVIL', '(68) 9 9987-9826', 'RUA JAMINAUAS BAIRRO: 25 DE AGOSTO N°1654', 5, NULL, NULL, 'PILATES/FORTALECIMENTO', 3, 3, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(180, '2021-12-07', '2022-02-07', NULL, '0000-00-00', 'UILIAN DA SILVA OLIVEIRA', '003.428.412-54', NULL, '180,00', 'BOMBEIRO MILITAR', '', 'RUA PERNAMBUCO, BAIRRO: ESCOLA TECNICA N°1445', 12, NULL, NULL, 'PILATES/FORTALECIMENTO', 3, 10, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(181, '2022-01-06', '2022-02-06', NULL, '0000-00-00', 'JAMAIRA PASCOA DA SILVA', '', '', '163,00', '', '(68) 9 9995-9022', '', 12, '', '', 'PILATES', 1, 14, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_reabilitacao`
--

DROP TABLE IF EXISTS `cliente_reabilitacao`;
CREATE TABLE IF NOT EXISTS `cliente_reabilitacao` (
  `idCliente_reabilitacao` int(11) NOT NULL AUTO_INCREMENT,
  `dataEntrada` date DEFAULT NULL,
  `horaEntrada` time DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` varchar(100) DEFAULT NULL,
  `peso` varchar(100) DEFAULT NULL,
  `altura` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status_pago` tinyint(1) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `procedimento` varchar(50) DEFAULT NULL,
  `pc_valor` varchar(50) NOT NULL,
  `sessoes` int(11) NOT NULL,
  `atestado` longtext,
  `Pagamento_idPagamento` int(11) NOT NULL,
  `Planos_idPlano` int(11) NOT NULL,
  `disabled` tinyint(1) DEFAULT '1',
  `opcao1` int(11) NOT NULL DEFAULT '2',
  `opcao2` int(11) NOT NULL DEFAULT '2',
  `opcao3` int(11) NOT NULL DEFAULT '2',
  `opcao4` int(11) NOT NULL DEFAULT '2',
  `opcao5` int(11) NOT NULL DEFAULT '2',
  `opcao6` int(11) NOT NULL DEFAULT '2',
  `opcao7` int(11) NOT NULL DEFAULT '2',
  `opcao8` int(11) NOT NULL DEFAULT '2',
  `opcao9` int(11) NOT NULL DEFAULT '2',
  `opcao10` int(11) NOT NULL DEFAULT '2',
  `opcao11` int(11) NOT NULL DEFAULT '2',
  `opcao12` int(11) NOT NULL DEFAULT '2',
  `opcao13` int(11) NOT NULL DEFAULT '2',
  `opcao14` int(11) NOT NULL DEFAULT '2',
  `opcao15` int(11) NOT NULL DEFAULT '2',
  `opcao16` int(11) NOT NULL DEFAULT '2',
  `opcao17` int(11) NOT NULL DEFAULT '2',
  `opcao18` int(11) NOT NULL DEFAULT '2',
  `opcao19` int(11) NOT NULL DEFAULT '2',
  `opcao20` int(11) NOT NULL DEFAULT '2',
  `opcao21` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idCliente_reabilitacao`) USING BTREE,
  KEY `Pagamento_idPagamento` (`Pagamento_idPagamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='									' ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `cliente_reabilitacao`
--

INSERT INTO `cliente_reabilitacao` (`idCliente_reabilitacao`, `dataEntrada`, `horaEntrada`, `nome`, `idade`, `peso`, `altura`, `cpf`, `telefone`, `saldo`, `profissao`, `endereco`, `descricao`, `status_pago`, `dataSaida`, `horaSaida`, `procedimento`, `pc_valor`, `sessoes`, `atestado`, `Pagamento_idPagamento`, `Planos_idPlano`, `disabled`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `opcao5`, `opcao6`, `opcao7`, `opcao8`, `opcao9`, `opcao10`, `opcao11`, `opcao12`, `opcao13`, `opcao14`, `opcao15`, `opcao16`, `opcao17`, `opcao18`, `opcao19`, `opcao20`, `opcao21`) VALUES
(1, '2021-07-17', '15:00:00', 'francisca lucas dos santos', '', '', '', '322.309.152-15', '(68) 9 9982-0899', '0', '', 'rua pedro teles, 1140, cruzeirinho', '', 1, NULL, NULL, 'reabilitação ', '640,00', 8, '', 3, 15, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(2, '2022-01-04', '11:00:00', 'BRUNO PINHEIRO BEZERRA', NULL, NULL, NULL, '', '', '0', 'CONTADOR', '', NULL, 1, NULL, NULL, '4 SESSOES DE REABILITAÇÃO', '320,00', 3, '', 1, 15, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, '2022-01-05', '16:30:00', 'MARIA DAS NEVES MOURA PINHEIRO', NULL, NULL, NULL, '695.790.592-68', '(68) 9 9937-9667', '0', 'DO LAR', 'RUA FLORIANO PEIXOTO, N°818 BAIRRO:ALUMINIO', NULL, 1, NULL, NULL, 'REABILITAÇÃO', '460,00', 6, '', 3, 15, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

DROP TABLE IF EXISTS `despesa`;
CREATE TABLE IF NOT EXISTS `despesa` (
  `idDespesa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idDespesa`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `idPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPagamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`idPagamento`, `tipo`) VALUES
(1, 'Transferência/PIX'),
(2, 'Dinheiro'),
(3, 'Cartão de Credito'),
(4, 'Cartão de Debito'),
(5, 'Dinheiro/Cartão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `idPlano` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plano` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPlano`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `plano`) VALUES
(1, 'Avaliação'),
(2, 'Plano Mensal'),
(3, 'Plano mensal 2x por semana'),
(4, 'Plano mensal 3x por semana'),
(5, 'Plano bimestral 2x por semana'),
(6, 'Plano bimestral 3x por semana'),
(7, 'Plano trimestral 2x por semana'),
(8, 'Plano trimestral 3x por semana'),
(9, 'Plano semestral 2x por semana'),
(10, 'Plano semestral 3x por semana'),
(11, 'Plano anual 2x por semana'),
(12, 'Plano anual 3x por semana'),
(13, 'Plano familia 2x por semana'),
(14, 'Plano familia 3x por semana'),
(15, 'Reabilitação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

DROP TABLE IF EXISTS `receita`;
CREATE TABLE IF NOT EXISTS `receita` (
  `idReceita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idReceita`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `perfil` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `perfil`, `status`) VALUES
(1, 'Administrador', 'admin', 'admin2021', 0, 1),
(2, 'Secretária', 'comum', 'comum2021', 1, 1),
(3, 'ADM SYSTEM', 'adm', 'fabricaweb', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_log`
--

DROP TABLE IF EXISTS `usuario_log`;
CREATE TABLE IF NOT EXISTS `usuario_log` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dataEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `acess` tinyint(3) DEFAULT NULL,
  `token` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
