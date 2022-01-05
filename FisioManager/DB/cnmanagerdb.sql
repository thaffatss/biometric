-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Jan-2022 às 21:05
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
  `dataEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` varchar(100) DEFAULT NULL,
  `peso` varchar(100) DEFAULT NULL,
  `altura` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT '',
  `profissao` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status_pago` int(11) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `procedimento` varchar(50) DEFAULT NULL,
  `pc_valor` varchar(50) NOT NULL,
  `sessoes` int(11) DEFAULT NULL,
  `atestado` longtext NOT NULL,
  `Pagamento_idPagamento` int(11) NOT NULL,
  `Planos_idPlano` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COMMENT='									';

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_estetica`
--

DROP TABLE IF EXISTS `cliente_estetica`;
CREATE TABLE IF NOT EXISTS `cliente_estetica` (
  `idCliente_estetica` int(11) NOT NULL AUTO_INCREMENT,
  `dataEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` varchar(100) DEFAULT NULL,
  `peso` varchar(100) DEFAULT NULL,
  `altura` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT '',
  `profissao` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status_pago` int(11) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `procedimento` varchar(50) NOT NULL,
  `pc_valor` varchar(50) NOT NULL,
  `sessoes` int(11) DEFAULT NULL,
  `atestado` longtext NOT NULL,
  `Pagamento_idPagamento` int(11) NOT NULL,
  `Planos_idPlano` int(11) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_pilates`
--

DROP TABLE IF EXISTS `cliente_pilates`;
CREATE TABLE IF NOT EXISTS `cliente_pilates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `template` varchar(500) DEFAULT NULL,
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
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Pagamento_idPagamento` (`Pagamento_idPagamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 COMMENT='									' ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `cliente_pilates`
--

INSERT INTO `cliente_pilates` (`id`, `dataInicio`, `dataFim`, `dataBloqueio`, `dataLiberacao`, `nome`, `cpf`, `idade`, `pc_valor`, `profissao`, `telefone`, `endereco`, `sessoes`, `atestado`, `descricao`, `procedimento`, `template`, `Pagamento_idPagamento`, `Planos_idPlano`, `status_pago`, `status`, `disabled`, `opcao1`, `opcao2`, `opcao3`, `opcao4`, `opcao5`, `opcao6`, `opcao7`, `opcao8`, `opcao9`, `opcao10`, `opcao11`, `opcao12`, `opcao13`, `opcao14`, `opcao15`, `opcao16`, `opcao17`, `opcao18`, `opcao19`, `opcao20`, `opcao21`) VALUES
(175, '2022-01-05', '2022-01-05', NULL, NULL, 'Teste', '', NULL, '100,00', '', '', '', 2, NULL, NULL, '', NULL, 2, 2, 0, NULL, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_reabilitacao`
--

DROP TABLE IF EXISTS `cliente_reabilitacao`;
CREATE TABLE IF NOT EXISTS `cliente_reabilitacao` (
  `idCliente_reabilitacao` int(11) NOT NULL AUTO_INCREMENT,
  `dataEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` varchar(100) DEFAULT NULL,
  `peso` varchar(100) DEFAULT NULL,
  `altura` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT '',
  `profissao` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `status_pago` int(11) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `horaSaida` time DEFAULT NULL,
  `procedimento` varchar(50) NOT NULL,
  `pc_valor` varchar(50) NOT NULL,
  `sessoes` int(11) DEFAULT NULL,
  `atestado` longtext NOT NULL,
  `Pagamento_idPagamento` int(11) NOT NULL,
  `Planos_idPlano` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='									' ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

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
(14, 'Plano familia 3x por semana');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario_log`
--

INSERT INTO `usuario_log` (`idLog`, `idUsuario`, `nomeUsuario`, `dataEntrada`, `horaEntrada`, `dataSaida`, `horaSaida`, `acess`, `token`, `ipaddress`) VALUES
(7, 3, 'ADM SYSTEM', '2022-01-05', '12:19:27', NULL, NULL, 1, '5237b672c080167a9892dbf4d7c90235060babb4dfe727e3406b3c8d6170d6a46600f66dca454b8502623b2e95cfa256e735acdb3fcb6d46de1d94e4660af5eb', '192.168.10.15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
