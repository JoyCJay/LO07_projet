-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 27 mai 2018 à 13:53
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nounous`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
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
-- Structure de la table `contrat`
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
-- Structure de la table `enfant`
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
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`id_enfant`, `prenom`, `parents`, `date_de_naissance`, `restrictions_alimentaires`) VALUES
(1, 'colin', 'lam', '1995-02-12', 'non'),
(2, 'matin', 'masson', '1998-05-22', 'non'),
(3, 'ss', 'masson', '2018-05-15', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `login`
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
-- Déchargement des données de la table `login`
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
-- Structure de la table `nounous`
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
  `situation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `portable` bigint(8) NOT NULL,
  `photo` tinytext NOT NULL,
  `langues` tinytext NOT NULL,
  `presentation` tinytext,
  `experience` tinytext,
  `heure_debut` int(3) DEFAULT NULL,
  `heure_fin` int(3) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `jour` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id_nounous` (`id_nounous`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nounous`
--

INSERT INTO `nounous` (`id_nounous`, `login`, `mot de passe`, `nom`, `prenom`, `age`, `ville`, `situation`, `email`, `portable`, `photo`, `langues`, `presentation`, `experience`, `heure_debut`, `heure_fin`, `date_debut`, `date_fin`, `jour`) VALUES
(5, 'solange', 'abc12345', 'SONG', 'Xiaotong', 22, 'troyes', 'normal', 'solangeie@163.com', 767219907, '', 'chinois,englais', 'prudence, sympa et tres patience', '3 ans ', 14, 17, '2018-06-01', '2018-06-30', 'tous les jours travaillÃ©s (Lu, Ma, Me, Je, Ve)'),
(4, 'whq', 'whq', 'wang', 'huiqi', 22, 'troyes', 'bloquer', 'huiqi.wang@163.com', 743267883, './database/photos/whq', 'Francais,Chinois', '', 'pas experience', NULL, NULL, NULL, NULL, NULL),
(3, 'ye', 'sdgr', 'Ye', 'xingyu', 21, 'paris', 'normal', 'xingyu.ye@163.com', 643215532, '', 'englais', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
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
-- Déchargement des données de la table `parents`
--

INSERT INTO `parents` (`id_parents`, `login`, `mot de passe`, `nom`, `ville`, `email`, `portable`, `photo`) VALUES
(103, 'lam', '12345', 'Lamarque', 'Paris', 'lamarque@gmail.com', 638926477, './database/photos/20121023051415627.jpg'),
(102, 'masson', '12345', 'Masson', 'troyes', 'masson@gmail.com', 743567732, './database/photos/6d2e5ca91fd34a5788d2e19de78f7ac4.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `nounous_fk` FOREIGN KEY (`nounous`) REFERENCES `nounous` (`login`),
  ADD CONSTRAINT `parents_fk` FOREIGN KEY (`parents`) REFERENCES `parents` (`login`);

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `parents_KF` FOREIGN KEY (`parents`) REFERENCES `parents` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
