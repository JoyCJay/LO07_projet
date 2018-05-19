-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-19 16:28:46
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
