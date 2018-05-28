-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 mai 2018 à 21:18
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
  `note` float DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_utilisateur`, `login`, `mot_de_passe`, `type`) VALUES
(114, 'Cathy', '12345', 'nounous'),
(107, 'celine', '12345', 'nounous'),
(109, 'Jennifer', '12345', 'nounous'),
(110, 'Justine', '12345', 'nounous'),
(116, 'Karine', '12345', 'nounous'),
(103, 'lam', '12345', 'parents'),
(108, 'lydia', '12345', 'nounous'),
(113, 'Magali', '12345', 'nounous'),
(102, 'masson', '12345', 'parents'),
(111, 'Mathilde', '12345', 'nounous'),
(115, 'Severine', '12345', 'nounous'),
(5, 'solange', '12345', 'nounous'),
(101, 'soso', '12345', 'parents'),
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
  `presentation` longtext,
  `experience` tinytext,
  `heure_debut` int(3) DEFAULT NULL,
  `heure_fin` int(3) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `jour` varchar(75) DEFAULT NULL,
  `notemoyen` float DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `id_nounous` (`id_nounous`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nounous`
--

INSERT INTO `nounous` (`id_nounous`, `login`, `mot de passe`, `nom`, `prenom`, `age`, `ville`, `situation`, `email`, `portable`, `photo`, `langues`, `presentation`, `experience`, `heure_debut`, `heure_fin`, `date_debut`, `date_fin`, `jour`, `notemoyen`) VALUES
(114, 'Cathy', '12345', 'Nys', 'Cathy', 31, 'troyes', 'candidat', 'Cathy@gmail.com', 643215677, './database/photos/Nys', 'Francais,Allemande', 'Bonjour, je mâ€™appelle Cathy.\r\nJe suis Ã¢gÃ©e de 31ans, diplÃ´mÃ©e du CAP petite enfance et agrÃ©Ã©e assistante maternelle pour 2 enfants. Je suis Ã  disposition pour garder votre petit Boutâ€™Choux en occasionnel 1 Ã  2 jours par semaine et pendant les vacances scolaires dâ€™avril ainsi celle de juillet /aoÃ»t .\r\nJe me situe Ã  Troyes proche de la gare. Maman dâ€™une petite fille de 8 ans qui accueillera avec plaisir votre petit.\r\nAncienne animatrice de centre de loisirs...\r\nJâ€™aime divertir les enfants en fonction leurs Ã¢ges grÃ¢ce Ã  de nombreuses activitÃ©s sensorielles, manuelles, de motricitÃ©, de la cuisine, des sorties aux parcs, Ã  la mÃ©diathÃ¨que, aux relais des assistantes maternelles...\r\nMais aussi partager des moments dÃ©tente Ã  lire des histoires, Ã©couter des comptines faire de la relaxation... jâ€™Ã©tudie aussi beaucoup la mÃ©thode MARIA MONTESSORI...et jâ€™adore! Lâ€™Ã©volution de lâ€™enfant me passionne. Jâ€™aime prÃ©parer de bon petits plats maison.Toutes nos journÃ©es seront organisÃ©es et basÃ©es sur des rituels pour le bien Ãªtre de votre enfant.\r\nDe nature calme, douce et patiente, flexible je reste Ã  votre disposition.\r\nPour tous renseignements hÃ©sitez pas Ã  me contacter!', 'Experience de parent : j\'ai Ã©levÃ© mes propres enfants. ', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'celine', '12345', 'Lehoucq', 'celine', 41, 'troyes', 'candidat', 'celine.lehoucq@gmail.com', 865763244, './database/photos/Lehoucq', 'Francais,Anglais', 'ma future nounou, (alias nounouchoux) 41 ans, agrÃ©er pour 4 enfants de 0 Ã  18 ans dispose de1 acceuils libre Ã  partir de septembre 2019 (adaptation en aout) Du lundi au vendredi 7 h30 Ã  18h00 les week end Ã©tant consacrÃ© a mes enfants. certifiÃ© Methode MARIA MONTESORI\r\nJ\'accueille 4 poussins = 4 puces de 2 ans, 19 mois , 1 ans et 3 mois\r\nMaman de 4 loulous (tous scolarisÃ©s et autonome dont un qui a pris son envol) qui seront ravis d\'avoir un nouveau compagnon de jeu. Titulaire du cap petite enfance et SST (secouriste du travail)\r\nDans une maison de 145 mÂ² proche du colruyt ave 400 mÂ² de jardin Nos journÃ©es sont ponctuÃ©es par de nombreuses activitÃ©s sensorielles, musicales et manuelles ainsi que des sorties (relais, bibliothÃ¨ques... que je partage avec les parents via un cahier de vie et un site internet.. N\'hÃ©siter pas Ã  me contacter pour vos Ã©ventuelles questions.\r\ndÃ©claration ursaff et cheque emploi service acceptÃ©\r\ndemande pas serieuse s\'abstenir merci', 'Experience professionnelle, plus de 5 ans.', 10, 16, '2018-06-16', '2018-07-21', 'tous les jours travaillÃ©s (Lu, Ma, Me, Je, Ve)', NULL),
(109, 'Jennifer', '12345', 'Gaule', 'Jennifer', 34, 'troyes', 'candidat', 'Jennifer@gamil.com', 865234255, './database/photos/Gaule', 'Francais,Anglais', 'Je m\'appelle Jennifer, je suis Assistante maternelle agrÃ©Ã©e Ã  Savoie, sur la commune de Moussey. (Chemin non passant, grande maison de plein pied et terrain clÃ´turÃ©).\r\nJ\'ai une place disponible Ã  partir de septembre 2018.\r\nMon activitÃ© professionnelle est un vrai choix de vie que j\'exerce avec beaucoup de bonheur et de passion.\r\nMa maison se transforme, le temps de l\'accueil en une vÃ©ritable petite crÃ¨che. Les enfants Ã©voluent dans un univers attrayant, Ã  leur hauteur et en toute sÃ©curitÃ©. Grands tapis, piscines Ã  balles, coin bibliothÃ¨que, nido pour les plus petits, table de crÃ¨che...\r\nIci, pas de salle de jeux mais une grande piÃ¨ce de vie lumineuse.\r\n\r\nPrivilÃ©giant les temps de jeux libres, J\'accompagne les petits dans toutes leurs activitÃ©s de jeux et d\'apprentissage.\r\nJ\'aide sans faire Ã  la place, je protÃ¨ge sans surprotÃ©ger, je sÃ©curise et adapte lâ€™environnement pour laisser place Ã  l\'autonomie.\r\nMa ligne de conduite :\r\nComprendre, soutenir, accompagner, prendre le temps, faire confiance et Ãªtre attentive!\r\n\r\nNous chantons beaucoup et Ã©coutons beaucoup de musique diverses.\r\n\r\nLa lecture occupe Ã©galement une place trÃ¨s importante dans mon univers. J\'aime prÃªter les livres ou jouets aux enfants afin de crÃ©er un vÃ©ritable lien entre leur lieu d\'accueil et la maison et les enfants sont heureux de partager tout Ã§a avec papa et maman.\r\n\r\nAyant passÃ© quelques temps sur les bancs d\'une Ã©cole d\'arts appliquÃ©s, comptez sur moi pour faire dÃ©couvrir Ã  vos enfants le plaisir de mettre les mains dans la peinture ou dans des pÃ¢te diverses...\r\n\r\nJe suis sensible Ã  la qualitÃ© environnementale des petits. Ainsi, j\'utilise des produits sans perturbateurs endocriniens pour l\'entretien de la maison ( savon noir, vinaigre blanc et bicarbonate de soude).\r\n\r\nPour la gestion administrative, j\'utilise le logiciel \" top assmat\" qui se charge de tout. Contrats, avenants, fiche de paie, gestion des congÃ©s...\r\n\r\nDifficile de faire court lorsque l\'on parle de sujets que l\'on adore...\r\nAlors n\'hÃ©sitez pas Ã  me contacter.\r\n\r\nJennifer HÃ©lie.', 'Experience professionnelle, 1 Ã  2 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Justine', '12345', 'Lenoir', 'Justine', 40, 'troyes', 'candidat', 'Justine@gmail.com', 743216687, './database/photos/Lenoir', 'Francais,Allemande', 'Bonjour,\r\n\r\nJe suis assistante maternelle agrÃ©Ã©e depuis 2009 par passion dans une maison non fumeur avec jardin .\r\nJe possÃ¨de tout le matÃ©riel nÃ©cessaire au bien Ãªtre , Ã  l Ã©panouissement et Ã  la sÃ©curitÃ© de votre enfant.\r\n\r\nAu programme de votre enfant : jeux libres , activitÃ©s manuelles , promenades (viennes, mÃ©diathÃ¨que , fouchy , ferme pÃ©dagogique, musÃ©e saint loup...avec accord pour l\'utilisation de la voiture) , Ã©veil musical ...tout en respectant le rythme de votre enfant qui est trÃ¨s important.\r\n\r\nDiplÃ´me que je possÃ¨de: Cap Petite Enfance\r\n\r\nFormations faites : Histoires et contes.\r\nSauveteur Secourisme au Travail (sst) faites grÃ¢ce Ã  la croix blanche en fÃ©vrier 2017.\r\n\r\nDÃ¨s l\'arrivÃ©e de l\'enfant je met en place une pochette avec des photos du quotidien (avec votre accord), ses dessins, gommettes ...et tout ce que nous faisons au quotidien. Vous pourrez l\'avoir Ã  chaques vacances, week ends et sur demande.\r\n\r\nPour plus de renseignements, n hÃ©sitez pas Ã  me contacter.\r\nSecteur chapeau rouge Ã  Sainte Savine\r\n\r\nA bientÃ´t\r\nCordialement\r\n\r\nJustine ', 'Experience professionnelle, plus de 5 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Karine', '12345', 'Gonnet', 'Karine', 38, 'troyes', 'candidat', 'Karine@gmail.com', 767345523, './database/photos/Gonnet', 'Francais,Anglais,Allemande', 'Bonjour je suis assistante maternelle agrÃ©e Ã  st benoit sur seine (10).\r\nVotre enfant sera accueilli dans un environnement calme, chaleureux et sÃ©curisÃ© avec de nombreux jouets d\'intÃ©rieur et d\'extÃ©rieur afin de lui permettre de s\'Ã©veiller et de s\'Ã©panouir.\r\nJe propose des activitÃ©s diverses et variÃ©es selon l\'age de votre enfant ainsi que des promenades lorsque le temps le permet.\r\nJe suis une personne sÃ©rieuse, de confiance et me consacre entiÃ¨rement au bien Ãªtre des enfants.\r\nJ\'accepte tout type d\'horaires, du lundi au vendredi et j\'Ã©tudie toutes propositions alors n\'hÃ©sitez pas Ã  me contacter.\r\nA bientÃ´t\r\nCordialement', 'Experience professionnelle, 2 Ã  5 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'lydia', '12345', 'Diagana', 'Lydia', 38, 'troyes', 'candidat', 'lydia@gmail.com', 643546687, './database/photos/Diagana', 'Francais', 'Bonjour,\r\n\r\nJe suis assistante maternelle agrÃ©es depuis 2011, avec 4 agrÃ©ments.\r\nJ\'ai 2 enfants de 16 et 13 ans.\r\nJe suis Ã  l\'Ã©coute des parents et je n\'hÃ©site pas Ã  prendre le temps de discuter de l\'Ã©volutions des enfants.\r\nJ\'accueille les petits dans une maison avec une salle de jeux et un jardin clos.\r\nJe suis pour la motricitÃ© libre, tout en respectant les rÃ¨gles de sÃ©curitÃ© de mon travail.\r\nJe respecte le sommeil de l\'enfant, ils dorment dans des chambres sÃ©parÃ©es et je ne suis plus contrainte avec les trajets d\'Ã©cole de mes enfants.\r\nLes activitÃ©s sont les jeux en intÃ©rieur et extÃ©rieur, les activitÃ©s manuelles sont le dessin, la peinture, la pÃ¢te Ã  sel et des bricolages en fonction des fÃªtes. Les histoires et comptines.\r\nJe partage sur internet en privÃ© avec les parents, un album photos de nos activitÃ©s.\r\nJe peux prÃ©pare les repas en fonction du choix des parents. Je cuisine avec des lÃ©gumes du jardin et j\'essaie de cuisiner le plus de choses maison. J\'accepte les biberon de lait maternelle.\r\nJe travaille du lundi au vendredi avec une amplitude d\'horaire de 7h Ã  19h30 environ.\r\nJe travaille avec top assmat pour faciliter la gestion des contrats\r\nNous avons un chat (trÃ¨s indÃ©pendant) et envisageons de reprendre un chien qui ne sera pas en contact avec les enfants.', 'Experience professionnelle, plus de 5 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Magali', '12345', 'Namm', 'Magali', 48, 'troyes', 'candidat', 'Magali@gamail.com', 854325677, './database/photos/Namm', 'Francais,Anglais', 'Bonjour, je suis assistante maternelle depuis 10 ans, agrÃ©e pour l\'accueil de 4 loulous. Je suis maman de 5 grands enfants qui ont quittÃ© le cocon familial, ce qui me permet de proposer 2 chambres spÃ©ciales pour les petits en accueil. Les journÃ©es sont remplies par de bons moments de jeux ( chez nounou les jouets ne manquent pas, autant pour l\'intÃ©rieur que pour jouer dans le jardin ), d\'activitÃ©s, de promenades, nous allons au RAM aussi souvent que possible, nous faisons des crÃ©ations pour les occasions ( NoÃ«l, PÃ¢ques, carnaval, fÃªtes et anniversaires etc... ). J\'habite en maison non fumeur, vos bambins auront comme compagnons 2 adorables lapins nains trÃ¨s affectueux, qui n\'attendent que les caresses des enfants. Je me trouve Ã  proximitÃ© du Mail des Charmilles. Je vous propose une place afin d\'accueillir votre loulou , je travaille avec des horaires atypiques ainsi que le samedi. Je me qualifie comme une personne douce, calme, patiente, joueuse, Ã  l\'Ã©coute de l\'enfant (et des parents ). Votre enfant viendra partager les journÃ©es de 3 adorables pÃ©pettes de 30 mois et 25 mois. N\'hÃ©sitez pas Ã  me contacter si mon profil vous convient.', 'Experience professionnelle, plus de 10 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Mathilde', '12345', 'Marlow', 'Mathilde', 29, 'troyes', 'candidat', 'Mathilde@gmail.com', 763245677, './database/photos/Marlow', 'Francais,Anglais,Allemande', 'Bonjour Moi c\'est Mathilde,\r\nj\'ai 26 ans je suis Assistante maternelle et aussi Auxiliaire de PuÃ©riculture de formation.\r\nL\'agrÃ©ment ma Ã©tÃ© accordÃ© en 2017, j\'ai eu le souhait de travailler Ã  mon domicile car je trouve que mon travail d\'auxiliaire de PuÃ©riculture n\'est que trop peu valorisÃ© en crÃ¨che car beaucoup trop d\'enfants pour peu de personnel.\r\n\r\nC\'est pour cela que je vous propose mes services, afin de rÃ©aliser un travail de qualitÃ© avec vos enfants.\r\n\r\nJe travail sur les principes d\'Ã©ducation montessori ( autonomie, libre motricitÃ©, respect du rythme et des besoins de l\'enfant ).\r\n\r\nA chaque saison son activitÃ©e...\r\nA chaque changement de saison nous faisons des activitÃ©es en relation avec celle ci aux maximum.\r\n\r\nQuand le temps le permet nous sortons le bout du nez dehors\r\n(balade, parc, ferme pÃ©dagogique, bÃ©bÃ© lecteur, jardinage quand c\'est la saison... )\r\nSinon toutes les 3 semaines nous allons Ã  la bibliothÃ¨que de buchÃ¨res dÃ©couvrir le monde des livres.\r\n\r\nJe suis quelqu\'un qui est douce, Ã  l\'Ã©coute, patiente mais aussi dynamique je ne vais pas hÃ©siter Ã  \"mouiller le maillot\" si il le faut, c\'est Ã  dire faire la courses avec les enfants faire en mÃªme temps qu\'eux pour les rassurer.\r\nEn dehors de ce cÃ´tÃ© un peu \"foufou\" j\'aime aussi que les choses soit claire entre les enfants , les parents et moi.\r\nLe cadre et les limites sont trÃ¨s rassurant et structurant pour un enfant.\r\n\r\nSi vous voulez en savoir plus je vous invite Ã  me contacter pour vous en dire un peu plus, Ã©couter vos attentes et celles de vos enfants. ', 'Experience professionnelle, 2 Ã  5 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Severine', '12345', 'Lenoir', 'SÃ©verine', 42, 'troyes', 'candidat', 'Severine@gmail.com', 754234456, './database/photos/Lenoir', 'Francais,Allemande', 'Je suis assistante maternelle depuis 12 ans j\'aime mon mÃ©tier car avec les enfants on apprend tous les jours, ils sont tous diffÃ©rents et Ã§a c\'est agrÃ©able. Je suis disponible avec les enfants et avec les parents car Ãªtre a leurs Ã©coute est trÃ¨s important\r\nj\'habite dans une maison avec une grande piÃ¨ce de vie, une chambre pour chaque enfant dormir et des jeux extÃ©rieur pour jouer dehors l\'Ã©tÃ©.\r\nJe fais des sorties en poussette et des jeux ( puzzles, coloriages, colorino..) et les goÃ»ter d\'anniversaire.\r\nDe plus afin d\' acquÃ©rir plus d\'expÃ©rience j\'ai passer mon CAP petite enfance avec succÃ¨s.\r\nJe fais du baby-sitting le soir en semaine ou a des occasions en dehors de mon mÃ©tier d\'assistante maternelle.', 'Experience professionnelle, plus de 10 ans. ', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'solange', 'abc12345', 'SONG', 'Xiaotong', 22, 'troyes', 'normal', 'solangeie@163.com', 767219907, '', 'chinois,englais', 'prudence, sympa et tres patience', '3 ans ', 14, 18, '2018-06-01', '2018-06-30', 'tous les jours travaillÃ©s (Lu, Ma, Me, Je, Ve)', NULL);

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
