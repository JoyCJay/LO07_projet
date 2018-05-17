-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-17 13:33:40
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
-- 表的结构 `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(11) NOT NULL,
  `parents` varchar(225) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `restrictions_alimentaires` varchar(225) NOT NULL,
  PRIMARY KEY (`id_enfant`),
  KEY `parents_KF_idx` (`parents`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 限制导出的表
--

--
-- 限制表 `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `parents_KF` FOREIGN KEY (`parents`) REFERENCES `parents` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
