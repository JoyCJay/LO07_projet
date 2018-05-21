-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-21 16:32:04
-- 服务器版本： 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nounous`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(5) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mot de passe` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `id_contrat` int(5) NOT NULL AUTO_INCREMENT,
  `revenue` float NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `nounous` varchar(20) NOT NULL,
  `parents` varchar(20) NOT NULL,
  `evaluation` text NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_contrat`),
  KEY `nounous_fk` (`nounous`),
  KEY `parents_fk` (`parents`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(11) NOT NULL,
  `parents` varchar(20) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `restrictions_alimentaires` varchar(225) NOT NULL,
  PRIMARY KEY (`id_enfant`),
  KEY `parents_KF_idx` (`parents`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `prenom`, `parents`, `date_de_naissance`, `restrictions_alimentaires`) VALUES
(1, 'colin', 'lam', '1995-02-12', 'non'),
(2, 'matin', 'masson', '1998-05-22', 'non'),
(3, 'ss', 'masson', '2018-05-15', 'non');

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_utilisateur` int(5) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id_utilisateur_2` (`id_utilisateur`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`id_utilisateur`, `login`, `mot_de_passe`, `type`) VALUES
(2, 'gigi', 'wfxs', 'nounous'),
(103, 'lam', '12345', 'parents'),
(102, 'masson', '12345', 'parents'),
(5, 'solange', '12345', 'nounous'),
(101, 'soso', '12345', 'parents'),
(4, 'whq', 'whq', 'nounous'),
(3, 'ye', 'sdjr', 'nounous'),
(1, 'zcj', 'svse', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `nounous`
--

DROP TABLE IF EXISTS `nounous`;
CREATE TABLE IF NOT EXISTS `nounous` (
  `id_nounous` int(5) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mot de passe` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` smallint(3) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `disponibilite` varchar(7) DEFAULT NULL,
  `situation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `portable` bigint(8) NOT NULL,
  `photo` tinytext NOT NULL,
  `langues` tinytext NOT NULL,
  `presentation` tinytext,
  `experience` tinytext,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id_nounous` (`id_nounous`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `nounous`
--

INSERT INTO `nounous` (`id_nounous`, `login`, `mot de passe`, `nom`, `prenom`, `age`, `ville`, `disponibilite`, `situation`, `email`, `portable`, `photo`, `langues`, `presentation`, `experience`) VALUES
(5, 'solange', 'abc12345', 'SONG', 'Xiaotong', 22, 'troyes', '', 'normal', 'solangeie@163.com', 767219907, '', 'chinois,englais', 'prudence, sympa et tres patience', '3 ans '),
(4, 'whq', 'whq', 'wang', 'huiqi', 22, 'troyes', 'a', 'candidat', 'huiqi.wang@163.com', 743267883, './database/photos/whq', 'Francais,Chinois', '', 'pas experience'),
(3, 'ye', 'sdgr', 'Ye', 'xingyu', 21, 'paris', '', 'normal', 'xingyu.ye@163.com', 643215532, '', 'englais', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `parents`
--

DROP TABLE IF EXISTS `parents`;
CREATE TABLE IF NOT EXISTS `parents` (
  `id_parents` int(5) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mot de passe` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `ville` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `portable` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id_parents` (`id_parents`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `parents`
--

INSERT INTO `parents` (`id_parents`, `login`, `mot de passe`, `nom`, `ville`, `email`, `portable`, `photo`) VALUES
(103, 'lam', '12345', 'Lamarque', 'Paris', 'lamarque@gmail.com', 638926477, './database/photos/20121023051415627.jpg'),
(102, 'masson', '12345', 'Masson', 'troyes', 'masson@gmail.com', 743567732, './database/photos/6d2e5ca91fd34a5788d2e19de78f7ac4.jpg');

--
-- 限制导出的表
--

--
-- 限制表 `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `nounous_fk` FOREIGN KEY (`nounous`) REFERENCES `nounous` (`login`),
  ADD CONSTRAINT `parents_fk` FOREIGN KEY (`parents`) REFERENCES `parents` (`login`);

--
-- 限制表 `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `parents_KF` FOREIGN KEY (`parents`) REFERENCES `parents` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
