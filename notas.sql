-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 19/07/2013 às 17h45min
-- Versão do Servidor: 5.0.92
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `notas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_cad`
--

CREATE TABLE IF NOT EXISTS `aluno_cad` (
  `ra` varchar(10) NOT NULL default '',
  `nome` varchar(60) default NULL,
  `filiacao` mediumtext,
  `est_civil` varchar(15) default NULL,
  `d_nasc` varchar(10) default NULL,
  `local_nasc` varchar(60) default NULL,
  `uf_nasc` char(2) default NULL,
  `rg` varchar(25) default NULL,
  `cpf` varchar(15) default NULL,
  `endereco` varchar(60) default NULL,
  `cidade` varchar(60) default NULL,
  `uf` char(2) default NULL,
  `cep` varchar(10) default NULL,
  `endereco_local` varchar(70) default NULL,
  `cidade_local` varchar(60) default NULL,
  `uf_local` char(2) default NULL,
  `cep_local` varchar(9) default NULL,
  `email` varchar(60) default NULL,
  `fone` varchar(15) default NULL,
  `fone_local` varchar(15) default NULL,
  `fone_rec` varchar(15) default NULL,
  `fone_cel` varchar(15) default NULL,
  `tipo_ingresso` enum('vestibular','tranferido','especial','reingresso','ouvinte') default NULL,
  `vestibular_ano` year(4) default NULL,
  `nota_cg` float(10,0) default '0',
  `nota_ce` float(10,0) default '0',
  `nota_lp` float(10,0) default '0',
  `classificacao` int(11) default '0',
  `transferido_origem` varchar(60) default NULL,
  `reingresso_origem` varchar(60) default NULL,
  `observacao` mediumtext,
  `foto` mediumblob,
  `tipo_foto` varchar(30) default NULL,
  `id` int(11) NOT NULL auto_increment,
  `data_cad` varchar(14) default NULL,
  PRIMARY KEY  (`ra`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=368 ;


--
-- Estrutura da tabela `aluno_escolaridade`
--

CREATE TABLE IF NOT EXISTS `aluno_escolaridade` (
  `ra` varchar(10) NOT NULL default '',
  `cpf` varchar(16) NOT NULL default '',
  `ens_med` varchar(60) default NULL,
  `ano_conclusao` year(4) NOT NULL default '0000',
  `cursinho` varchar(60) default NULL,
  `idiomas` varchar(60) default NULL,
  PRIMARY KEY  (`ra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=24 ROW_FORMAT=DYNAMIC;


--
-- Estrutura da tabela `aluno_info_ad`
--

CREATE TABLE IF NOT EXISTS `aluno_info_ad` (
  `ra` varchar(10) NOT NULL default '',
  `cpf` varchar(20) NOT NULL default '',
  `habilitacao` varchar(60) NOT NULL default '',
  `enade` varchar(60) NOT NULL default '',
  `tcc` varchar(100) NOT NULL default '',
  `data_conclusao` date NOT NULL default '0000-00-00',
  `data_colacao` date NOT NULL default '0000-00-00',
  `data_exp_diploma` date NOT NULL default '0000-00-00',
  `obs` mediumtext NOT NULL,
  `grupo_sangue` varchar(4) default NULL,
  `alergias` longtext,
  `situacoes` longtext,
  `medicacao` varchar(50) default NULL,
  `freq_med` varchar(30) default NULL,
  `emergencia` varchar(60) default NULL,
  PRIMARY KEY  (`ra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=24 ROW_FORMAT=DYNAMIC;


--
-- Estrutura da tabela `aluno_w`
--

CREATE TABLE IF NOT EXISTS `aluno_w` (
  `ra` varchar(10) NOT NULL default '',
  `nome` varchar(255) NOT NULL default '',
  `senha` varchar(8) NOT NULL default '12345',
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`ra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC;


--
-- Estrutura da tabela `blocos`
--

CREATE TABLE IF NOT EXISTS `blocos` (
  `bloco` int(1) NOT NULL default '0',
  `respostas` int(1) NOT NULL default '0',
  `id_bloco` int(11) NOT NULL auto_increment,
  KEY `id_bloco` (`id_bloco`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `blocos`
--

INSERT INTO `blocos` (`bloco`, `respostas`, `id_bloco`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 3),
(4, 2, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `comentario` longtext,
  `sessao` varchar(60) NOT NULL default '',
  `sem` int(11) NOT NULL default '0',
  `semestre` int(2) default NULL,
  `ip` varchar(20) NOT NULL default '',
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`sessao`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--
-- Estrutura da tabela `controle_ra`
--

CREATE TABLE IF NOT EXISTS `controle_ra` (
  `ra` varchar(8) NOT NULL default '',
  `sessao` varchar(50) default NULL,
  `semestre` int(2) default NULL,
  PRIMARY KEY  (`ra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC;


--
-- Estrutura da tabela `controle_ra_mat`
--

CREATE TABLE IF NOT EXISTS `controle_ra_mat` (
  `ra` varchar(8) NOT NULL default '',
  `sessao` varchar(50) default NULL,
  `semestre` int(2) NOT NULL default '0',
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`ra`,`semestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC;


--
-- Estrutura da tabela `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL auto_increment,
  `docente` char(100) default NULL,
  `email` char(50) default NULL,
  `nome` char(15) default NULL,
  `senha` char(8) default NULL,
  PRIMARY KEY  (`id_docente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;



--
-- Estrutura da tabela `doc_disc`
--

CREATE TABLE IF NOT EXISTS `doc_disc` (
  `cod_disc` varchar(10) default NULL,
  `id_docente` int(11) default NULL,
  `docente` varchar(60) default NULL,
  `disciplina` varchar(80) default NULL,
  `semestre` int(2) default '0',
  `creditos` int(1) default NULL,
  `tipo` varchar(6) default NULL,
  `id_doc_disc` int(3) NOT NULL auto_increment,
  `id_reitoria` int(11) default NULL,
  `cod_curr` int(11) default NULL,
  `legislacao` varchar(50) default NULL,
  `ativo` enum('s','n') default 's',
  PRIMARY KEY  (`id_doc_disc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=166 ;


--
-- Estrutura da tabela `doc_disc_opt`
--

CREATE TABLE IF NOT EXISTS `doc_disc_opt` (
  `docente` varchar(60) default NULL,
  `disciplina` varchar(60) default NULL,
  `semestre` int(2) default '0',
  `creditos` int(1) default NULL,
  `id_doc_disc` int(3) NOT NULL auto_increment,
  PRIMARY KEY  (`id_doc_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `flag`
--

CREATE TABLE IF NOT EXISTS `flag` (
  `ra` varchar(8) NOT NULL default '',
  `semestre` int(2) default NULL,
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`ra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC;


--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id_log` int(11) NOT NULL auto_increment,
  `ip` varchar(15) default NULL,
  `data` varchar(30) default NULL,
  `acao` longtext,
  PRIMARY KEY  (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9408 ;


--
-- Estrutura da tabela `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `ra` varchar(15) NOT NULL default '',
  `disc` varchar(80) default NULL,
  `nota` varchar(4) default NULL,
  `freq` char(2) default NULL,
  `situacao` char(3) NOT NULL default '',
  `sem` int(2) NOT NULL default '1',
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=26921 ;


--
-- Estrutura da tabela `notas_copy`
--

CREATE TABLE IF NOT EXISTS `notas_copy` (
  `ra` varchar(15) NOT NULL default '',
  `disc` int(80) default NULL,
  `nota` varchar(4) default NULL,
  `freq` char(2) default NULL,
  `situacao` char(3) NOT NULL default '',
  `sem` int(2) NOT NULL default '1',
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9476 ;


--
-- Estrutura da tabela `ra_disc_c_notas`
--

CREATE TABLE IF NOT EXISTS `ra_disc_c_notas` (
  `cod_reitoria_disc` int(11) NOT NULL default '0',
  `ra` varchar(10) NOT NULL default '',
  `id_doc_disc` char(3) NOT NULL default '',
  `nota` varchar(4) default NULL,
  `freq` char(2) default NULL,
  `situacao` char(3) default NULL,
  `creditos` int(2) default NULL,
  `semestre` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL default '1',
  `ano` year(4) NOT NULL default '0000',
  `sem` enum('1','2') NOT NULL default '1',
  `data` varchar(20) default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`,`ra`,`id_doc_disc`,`semestre`,`cod_reitoria_disc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14338 ;


--
-- Estrutura da tabela `ra_disc_opt`
--

CREATE TABLE IF NOT EXISTS `ra_disc_opt` (
  `ra` varchar(10) NOT NULL default '',
  `id_doc_disc` char(3) NOT NULL default '',
  `creditos` int(1) default NULL,
  `semestre` int(2) NOT NULL default '0',
  `data` varchar(20) character set latin1 collate latin1_bin default NULL,
  PRIMARY KEY  (`ra`,`id_doc_disc`,`semestre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ra_disc_rer`
--

CREATE TABLE IF NOT EXISTS `ra_disc_rer` (
  `ra` varchar(10) NOT NULL default '',
  `id_doc_disc` char(3) NOT NULL default '',
  `creditos` int(1) default NULL,
  `semestre` int(2) NOT NULL default '0',
  `ano` year(4) default NULL,
  `sem` enum('1','2') NOT NULL default '1',
  `data` varchar(20) character set latin1 collate latin1_bin default NULL,
  PRIMARY KEY  (`ra`,`id_doc_disc`,`semestre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `ra_disc_rer_disp`
--

CREATE TABLE IF NOT EXISTS `ra_disc_rer_disp` (
  `ra` varchar(10) NOT NULL default '',
  `id_doc_disc` char(3) NOT NULL default '',
  `data` varchar(20) character set latin1 collate latin1_bin default NULL,
  PRIMARY KEY  (`ra`,`id_doc_disc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `rdcn_bck`
--

CREATE TABLE IF NOT EXISTS `rdcn_bck` (
  `ra` varchar(10) NOT NULL default '',
  `id_doc_disc` char(3) NOT NULL default '',
  `nota` varchar(4) default NULL,
  `freq` char(2) default NULL,
  `situacao` char(3) default NULL,
  `creditos` int(2) default NULL,
  `semestre` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL default '1',
  `ano` year(4) NOT NULL default '0000',
  `sem` enum('1','2') NOT NULL default '1',
  `data` varchar(20) default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15734 ;


--
-- Estrutura da tabela `registro_acesso`
--

CREATE TABLE IF NOT EXISTS `registro_acesso` (
  `ip` varchar(15) default NULL,
  `data` varchar(40) default NULL,
  `tabela` varchar(50) default NULL,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE IF NOT EXISTS `resposta` (
  `id_pergunta` int(3) NOT NULL default '0',
  `id_doc_disc` int(3) NOT NULL default '0',
  `nota` int(1) default NULL,
  `sem` int(2) NOT NULL default '0',
  `semestre` enum('1','2') NOT NULL default '1',
  `datahora` varchar(20) default NULL,
  `ip` varchar(20) default NULL,
  `session_id` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id_pergunta`,`id_doc_disc`,`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `ra` varchar(8) NOT NULL default '',
  `sem` int(11) default NULL,
  `semestre` enum('1','2') NOT NULL default '1',
  `id_s` int(15) NOT NULL auto_increment,
  `data` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id_s`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=44 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3626 ;


--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nome` varchar(10) NOT NULL default '',
  `senha` varchar(8) NOT NULL default '',
  `id_usuario` int(11) NOT NULL auto_increment,
  `nivel` enum('1','2') default '2',
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `senha`, `id_usuario`, `nivel`) VALUES
('sonia', 'sonia_ac', 1, '2'),
('cecilia', 'cissa', 2, '2'),
('denise', 'denise_a', 3, '2'),
('luis', 'kubo', 4, '2'),
('aurea', 'coord', 5, '2');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `aluno_escolaridade`
--
ALTER TABLE `aluno_escolaridade`
  ADD CONSTRAINT `FK_aluno_escolaridade` FOREIGN KEY (`ra`) REFERENCES `aluno_cad` (`ra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `aluno_info_ad`
--
ALTER TABLE `aluno_info_ad`
  ADD CONSTRAINT `FK_aluno_info_ad` FOREIGN KEY (`ra`) REFERENCES `aluno_cad` (`ra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `ra_disc`
--
ALTER TABLE `ra_disc`
  ADD CONSTRAINT `FK_ra_disc` FOREIGN KEY (`ra`) REFERENCES `aluno_cad` (`ra`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
