-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-19 16:29:47
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
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `parents`
--

INSERT INTO `parents` (`id_parents`, `login`, `mot de passe`, `nom`, `ville`, `email`, `portable`, `photo`) VALUES
(103, 'lam', '12345', 'Lamarque', 'Paris', 'lamarque@gmail.com', 638926477, './database/photos/20121023051415627.jpg'),
(102, 'masson', '12345', 'Masson', 'troyes', 'masson@gmail.com', 743567732, './database/photos/6d2e5ca91fd34a5788d2e19de78f7ac4.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
