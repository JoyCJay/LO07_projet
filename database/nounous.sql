-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-15 20:19:16
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
-- Database: `lo07`
--

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
  `disponibilite` varchar(7),
  `situation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `portable` bigint(8) NOT NULL,
  `photo` tinytext NOT NULL,
  `langues` tinytext NOT NULL,
  `presentation` tinytext,
  `experience` tinytext,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id_nounous` (`id_nounous`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `nounous`
--

INSERT INTO `nounous` (`id_nounous`, `login`, `mot de passe`, `nom`, `prenom`, `age`, `ville`, `disponibilite`, `situation`, `email`, `portable`, `photo`, `langues`, `presentation`, `experience`) VALUES
(100, 'solange', 'abc12345', 'SONG', 'Xiaotong', 22, 'troyes', '', 'normal', 'solangeie@163.com', 767219907, '', 'chinois,englais', 'prudence, sympa et tres patience', '3 ans '),
(200, 'ye', 'sdgr', 'Ye', 'xingyu', 21, 'paris', '', 'normal', 'xingyu.ye@163.com', 643215532, '', 'englais', '', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
