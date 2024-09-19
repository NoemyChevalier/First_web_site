-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 sep. 2024 à 15:25
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `patinageclub`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhérent`
--

DROP TABLE IF EXISTS `adhérent`;
CREATE TABLE IF NOT EXISTS `adhérent` (
  `idadherent` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `adresse_postale` varchar(255) DEFAULT NULL,
  `code_postal` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `clubpatinage_idclubpatinage` int(11) DEFAULT NULL,
  `groupeentrainement_idgroupeentrainement` int(11) DEFAULT NULL,
  `groupecompetition_idgroupecompetition` int(11) DEFAULT NULL,
  `binomecompetition_idbinomecompetition` int(11) DEFAULT NULL,
  PRIMARY KEY (`idadherent`),
  KEY `fk_adhérent_clubpatinage1_idx` (`clubpatinage_idclubpatinage`),
  KEY `fk_adhérent_groupeentrainement1_idx` (`groupeentrainement_idgroupeentrainement`),
  KEY `fk_adhérent_groupecompetition1_idx` (`groupecompetition_idgroupecompetition`),
  KEY `fk_adhérent_binomecompetition1_idx` (`binomecompetition_idbinomecompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adhérent`
--

INSERT INTO `adhérent` (`idadherent`, `login`, `nom`, `prenom`, `age`, `password`, `adresse_postale`, `code_postal`, `email`, `telephone`, `clubpatinage_idclubpatinage`, `groupeentrainement_idgroupeentrainement`, `groupecompetition_idgroupecompetition`, `binomecompetition_idbinomecompetition`) VALUES
(12, 'noemy1', 'Chevalier', 'Noemy', '19', '$2y$10$yAeATyAuYmtie56JdDB6gu9kjiN1NalK/8OMW3zY/NVx.2hX7br/y', '11bis rue de Boustroff', '57380', 'noemychevalier1@gmail.com', '02222222', NULL, NULL, NULL, NULL),
(13, 'louise', 'berrada', 'Louise', '22', '$2y$10$J5Azu8Cjkoz8uX6OQeb7b.KgTH3PL0s.3X8FLv089UX2zfyvg2wjO', 'erqgrreregr', 'eqrg', 'qrgq', 'rg', NULL, NULL, NULL, NULL),
(14, 'nth', 'lantz', 'nathan', '19', '$2y$10$uf9j8HVdtO6USmUWZ7MkoeNWYeOiA.0Uza1789hX3uNAudjBmInza', 'ejsfre', 'r<dgw', '<sg', '<srg', NULL, NULL, NULL, NULL),
(18, 'ezh', 'ezh', 'ezh', '15', '$2y$10$sqyoPL7NQcjYsa8zTQ8ekusJknxVAHH4k36itypl2Ku6KdLOhWfsi', 'ezh', '54148741', 'ezh@gmail.com', '5811646515', NULL, NULL, NULL, NULL),
(19, 'efe', 'efe', 'efe', '15', '$2y$10$sxQgrPGmx3BgMUqUtIXT2ulDguVHXYD4GK5i5YMHRNwOOh8g/nH/6', 'efe', '12585', 'efe@gmail.com', '10236548', NULL, NULL, NULL, NULL),
(20, 'anais128', 'CHEVALIER', 'anais ', '22', '$2y$10$IOz9buBvxBmMStK4Uz79YuU0Tvkbg75RszPxaDxL0MLH4zP0m9g1K', '11bis rue de Boustroff', '57380', 'aniasadelande@gmail.com', '0645879412', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `adhérent_has_competition`
--

DROP TABLE IF EXISTS `adhérent_has_competition`;
CREATE TABLE IF NOT EXISTS `adhérent_has_competition` (
  `adhérent_idadhérent` int(11) NOT NULL,
  `competition_idcompetition` int(11) NOT NULL,
  PRIMARY KEY (`adhérent_idadhérent`,`competition_idcompetition`),
  KEY `fk_adhérent_has_competition_competition1_idx` (`competition_idcompetition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `binomecompetition`
--

DROP TABLE IF EXISTS `binomecompetition`;
CREATE TABLE IF NOT EXISTS `binomecompetition` (
  `idbinomecompetition` int(11) NOT NULL,
  `nom_binome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbinomecompetition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `binomecompetition_has_competition`
--

DROP TABLE IF EXISTS `binomecompetition_has_competition`;
CREATE TABLE IF NOT EXISTS `binomecompetition_has_competition` (
  `binomecompetition_idbinomecompetition` int(11) NOT NULL,
  `competition_idcompetition` int(11) NOT NULL,
  PRIMARY KEY (`binomecompetition_idbinomecompetition`,`competition_idcompetition`),
  KEY `fk_binomecompetition_has_competition_competition1_idx` (`competition_idcompetition`),
  KEY `fk_binomecompetition_has_competition_binomecompetition1_idx` (`binomecompetition_idbinomecompetition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clubpatinage`
--

DROP TABLE IF EXISTS `clubpatinage`;
CREATE TABLE IF NOT EXISTS `clubpatinage` (
  `idclubpatinage` int(11) NOT NULL,
  `nom_club` varchar(45) DEFAULT NULL,
  `lieu_club` varchar(45) DEFAULT NULL,
  `nombre_adhrerent` int(11) DEFAULT NULL,
  `horaires_ouverture` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclubpatinage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

DROP TABLE IF EXISTS `competition`;
CREATE TABLE IF NOT EXISTS `competition` (
  `idcompetition` int(11) NOT NULL AUTO_INCREMENT,
  `lieu_competition` varchar(45) DEFAULT NULL,
  `date_competition` date DEFAULT NULL,
  `duree_competitions` varchar(45) DEFAULT NULL,
  `type_competition` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`idcompetition`, `lieu_competition`, `date_competition`, `duree_competitions`, `type_competition`) VALUES
(9, 'Patinoire Nord', '2024-01-09', '2 jours', 'Patinage artistique'),
(10, 'Arene de Glace', '2024-01-17', '1 jour', 'Patinage en couple'),
(11, 'Frigid Ouest', '2024-02-03', '3 jours', 'Patinage artistique'),
(12, 'Glacial Arena', '2024-02-06', '2 jours', 'Patinage synchronise'),
(13, 'Patinoire Sud', '2024-03-10', '1 jour', 'Patinage en couple'),
(14, 'Arctique Rink', '2024-03-13', '4 jours', 'Patinage artistique'),
(15, 'Frigid Est', '2024-04-05', '3 jours', 'Patinage synchronise'),
(16, 'Arene de Glace', '2024-06-22', '2 jours', 'Patinage artistique');

-- --------------------------------------------------------

--
-- Structure de la table `docadmin`
--

DROP TABLE IF EXISTS `docadmin`;
CREATE TABLE IF NOT EXISTS `docadmin` (
  `iddocadmin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `photo_identite` varchar(255) DEFAULT NULL,
  `licence_adherent` varchar(255) DEFAULT NULL,
  `certificat_medical` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iddocadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `docadmin`
--

INSERT INTO `docadmin` (`iddocadmin`, `login`, `prenom`, `photo_identite`, `licence_adherent`, `certificat_medical`) VALUES
(1, '', '', NULL, NULL, NULL),
(2, 'Lantz', 'Nathan', NULL, NULL, NULL),
(3, 'Chevalier', 'Noemy', NULL, NULL, NULL),
(4, '', '', NULL, NULL, NULL),
(5, 'uum', '', NULL, NULL, NULL),
(6, 'EF', 'FQEF', NULL, NULL, NULL),
(7, 'qf', 'sjj', NULL, NULL, NULL),
(8, '', '', NULL, NULL, NULL),
(9, 'nom1', '', NULL, NULL, NULL),
(10, 'nom2', 'jrfnr', NULL, NULL, NULL),
(11, 'noemy1', 'Noemy', NULL, NULL, NULL),
(12, 'louise', 'Louise', NULL, NULL, NULL),
(13, 'nth', 'nathan', NULL, NULL, NULL),
(14, 'test1', 'test1', NULL, NULL, NULL),
(15, 'test1', '', NULL, NULL, NULL),
(16, 'essai', 'essai', NULL, NULL, NULL),
(17, 'essai', 'essai', NULL, NULL, NULL),
(18, 'essai1', 'essai1', NULL, NULL, NULL),
(19, 'noemy1', 'noemy1', NULL, NULL, NULL),
(20, 'ezh', 'ezh', NULL, NULL, NULL),
(21, 'efe', 'efe', NULL, NULL, NULL),
(22, 'anais128', 'anais ', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `identrainement` int(11) NOT NULL AUTO_INCREMENT,
  `adhérent_idadhérent` int(11) NOT NULL,
  `entraineur_identraineur` int(11) NOT NULL,
  `horaire_entrainement` varchar(45) DEFAULT NULL,
  `niveau_entraienement` varchar(45) DEFAULT NULL,
  `lieu_entrainement` varchar(45) DEFAULT NULL,
  `competition` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`identrainement`),
  KEY `fk_entrainement_entraineur1_idx` (`entraineur_identraineur`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`identrainement`, `adhérent_idadhérent`, `entraineur_identraineur`, `horaire_entrainement`, `niveau_entraienement`, `lieu_entrainement`, `competition`) VALUES
(21, 1, 1, '10:00:00', 'Débutant', 'Glacial Arena', 0),
(22, 2, 2, '14:30:00', 'Intermédiaire', 'Arctique Rink', 1),
(23, 3, 3, '16:45:00', 'Expert', 'Glacial Arena', 0),
(24, 4, 1, '12:15:00', 'Débutant', 'Frigid Ouest', 1),
(25, 5, 2, '18:00:00', 'Intermédiaire', 'Glacial Arena', 0),
(26, 6, 1, '15:30:00', 'Expert', 'Glacial Arena', 1),
(27, 7, 2, '11:45:00', 'Débutant', 'Arctique Rink', 0),
(28, 8, 3, '17:00:00', 'Intermédiaire', 'Arctique Rink', 1),
(29, 9, 1, '13:30:00', 'Expert', 'Glacial Arena', 0),
(30, 10, 3, '19:15:00', 'Débutant', 'Frigid Ouest', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

DROP TABLE IF EXISTS `entraineur`;
CREATE TABLE IF NOT EXISTS `entraineur` (
  `identraineur` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`identraineur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`identraineur`, `nom`, `prenom`, `date_naissance`) VALUES
(1, 'Kovalenki', 'Natalia', '1980-05-15'),
(2, 'Taylor', 'Orlane', '1985-08-22'),
(3, 'Leclerc', 'Sophie', '1976-12-10');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idevenement` int(11) NOT NULL AUTO_INCREMENT,
  `clubpatinage_idclubpatinage` int(11) NOT NULL,
  `gala_idgala` int(11) NOT NULL,
  PRIMARY KEY (`idevenement`),
  KEY `fk_evenement_clubpatinage1_idx` (`clubpatinage_idclubpatinage`),
  KEY `fk_evenement_gala1_idx` (`gala_idgala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gala`
--

DROP TABLE IF EXISTS `gala`;
CREATE TABLE IF NOT EXISTS `gala` (
  `idgala` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgala`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gala`
--

INSERT INTO `gala` (`idgala`, `lieu`, `nom`, `date`) VALUES
(1, 'Paris', 'Spectacle des Etoiles', '2024-05-12 '),
(2, 'Tour', 'Gala Magique sur Glace', '2024-06-18'),
(3, 'Lille', 'Nuit des Champions', '2024-08-05 '),
(4, 'Metz', 'Gala Feerique', '2024-09-22 '),
(5, 'Strasbourg', 'Soiree des Pirouettes', '2024-11-08 '),
(6, 'Reims', 'Gala des Elites', '2024-12-15 '),
(7, 'Lyon', 'Spectacle Envoutant', '2024-07-30'),
(8, 'Dijon', 'Gala des Lumieres', '2024-10-25 '),
(9, 'Macon', 'Nuit Etoilee sur Glace', '2024-11-30 '),
(10, 'Rennes', 'Gala des Neiges', '2024-12-22 ');

-- --------------------------------------------------------

--
-- Structure de la table `groupecompetition`
--

DROP TABLE IF EXISTS `groupecompetition`;
CREATE TABLE IF NOT EXISTS `groupecompetition` (
  `idgroupecompetition` int(11) NOT NULL,
  `nom_groupe` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgroupecompetition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupecompetition_has_competition`
--

DROP TABLE IF EXISTS `groupecompetition_has_competition`;
CREATE TABLE IF NOT EXISTS `groupecompetition_has_competition` (
  `groupecompetition_idgroupecompetition` int(11) NOT NULL,
  `competition_idcompetition` int(11) NOT NULL,
  PRIMARY KEY (`groupecompetition_idgroupecompetition`,`competition_idcompetition`),
  KEY `fk_groupecompetition_has_competition_competition1_idx` (`competition_idcompetition`),
  KEY `fk_groupecompetition_has_competition_groupecompetition1_idx` (`groupecompetition_idgroupecompetition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupeentrainement`
--

DROP TABLE IF EXISTS `groupeentrainement`;
CREATE TABLE IF NOT EXISTS `groupeentrainement` (
  `idgroupeentrainement` int(11) NOT NULL,
  `entraineur_identraineur` int(11) NOT NULL,
  PRIMARY KEY (`idgroupeentrainement`),
  KEY `fk_groupeentrainement_entraineur1_idx` (`entraineur_identraineur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscricomp`
--

DROP TABLE IF EXISTS `inscricomp`;
CREATE TABLE IF NOT EXISTS `inscricomp` (
  `idinscription` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `age` varchar(11) NOT NULL,
  `longueur` varchar(45) NOT NULL,
  `musique` varchar(45) NOT NULL,
  `type_competition` varchar(45) NOT NULL,
  PRIMARY KEY (`idinscription`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscricomp`
--

INSERT INTO `inscricomp` (`idinscription`, `nom`, `prenom`, `age`, `longueur`, `musique`, `type_competition`) VALUES
(1, '', '', '', '', '', ''),
(2, '', '', '', '', '', ''),
(3, '', '', '', '', '', ''),
(4, '', '', '', '', '', ''),
(5, 'jnjf', 'eFNeF', 'EFef', 'ef', 'ef', 'ef');

-- --------------------------------------------------------

--
-- Structure de la table `resultatart`
--

DROP TABLE IF EXISTS `resultatart`;
CREATE TABLE IF NOT EXISTS `resultatart` (
  `idresultat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `classement` varchar(45) DEFAULT NULL,
  `categorie` varchar(45) DEFAULT NULL,
  `competition_idcompetition` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresultat`),
  KEY `fk_resultat_competition1_idx` (`competition_idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultatart`
--

INSERT INTO `resultatart` (`idresultat`, `nom`, `prenom`, `classement`, `categorie`, `competition_idcompetition`) VALUES
(11, 'Dupont', 'Alice', 'Premier', 'Patinage artistique', NULL),
(12, 'Martin', 'Bob', 'Deuxieme', 'Patinage artistique', NULL),
(13, 'Leclerc', 'Charlotte', 'Troisieme', 'Patinage artistique', NULL),
(14, 'Lefevre', 'David', 'Quatrieme', 'Patinage artistiqueior', NULL),
(15, 'Girard', 'Emma', 'Cinquieme', 'Patinage artistique', NULL),
(16, 'Thomas', 'Francois', 'Sixieme', 'Patinage artistique', NULL),
(17, 'Robert', 'Giselle', 'Septieme', 'Patinage artistique', NULL),
(18, 'Bouchard', 'Hugo', 'Huitieme', 'Patinage artistique', NULL),
(19, 'Dubois', 'Isabelle', 'Neuvieme', 'Patinage artistique', NULL),
(20, 'Lavoie', 'Jean', 'Dixieme', 'Patinage artistique', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `resultatcouple`
--

DROP TABLE IF EXISTS `resultatcouple`;
CREATE TABLE IF NOT EXISTS `resultatcouple` (
  `idresultatcouple` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `classement` varchar(45) DEFAULT NULL,
  `categorie` varchar(45) DEFAULT NULL,
  `competition_idcompetition` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresultatcouple`),
  KEY `fk_resultatcouple_competition1_idx` (`competition_idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultatcouple`
--

INSERT INTO `resultatcouple` (`idresultatcouple`, `nom`, `prenom`, `classement`, `categorie`, `competition_idcompetition`) VALUES
(21, 'Girard', 'Sophie', 'Premier', 'Patinage en couple', NULL),
(22, 'Lefevre', 'Alexandre', 'Premier', 'Patinage en couple', NULL),
(23, 'Martin', 'Charlotte', 'Deuxieme', 'Patinage en couple', NULL),
(24, 'Boucher', 'Elise', 'Deuxieme', 'Patinage en couple', NULL),
(25, 'Lavoie', 'Gabriel', 'Troisieme', 'Patinage en couple', NULL),
(26, 'Deschamps', 'Valerie', 'Troisieme', 'Patinage en couple', NULL),
(27, 'Belanger', 'Maxime', 'Quatrieme', 'Patinage en couple', NULL),
(28, 'Lamoureux', 'Emilie', 'Quatrieme', 'Patinage en couple', NULL),
(29, 'Gagnon', 'Jeremy', 'Cinquieme', 'Patinage en couple', NULL),
(30, 'Rousseau', 'Sophie', 'Cinquieme', 'Patinage en couple', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `resultatglobal`
--

DROP TABLE IF EXISTS `resultatglobal`;
CREATE TABLE IF NOT EXISTS `resultatglobal` (
  `idresultat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `classement` varchar(11) NOT NULL,
  `type_competition` varchar(255) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idresultat`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultatglobal`
--

INSERT INTO `resultatglobal` (`idresultat`, `nom`, `prenom`, `classement`, `type_competition`, `login`) VALUES
(1, 'Dupont', 'Alice', 'Premier', 'Patinage artistique', 'Dupont'),
(2, 'Martin', 'Bob', 'Deuxieme', 'Patinage artistique', 'Martin'),
(3, 'Leclerc', 'Charlotte', 'Troisieme', 'Patinage artistique', 'Leclerc'),
(4, 'Lefevre', 'David', 'Quatrieme', 'Patinage artistiqueior', 'Lefevre'),
(5, 'Girard', 'Emma', 'Cinquieme', 'Patinage artistique', 'Girard'),
(6, 'Thomas', 'Francois', 'Sixieme', 'Patinage artistique', 'Thomas'),
(7, 'Robert', 'Giselle', 'Septieme', 'Patinage artistique', 'Robert'),
(8, 'Bouchard', 'Hugo', 'Huitieme', 'Patinage artistique', 'Bouchard'),
(9, 'Dubois', 'Isabelle', 'Neuvieme', 'Patinage artistique', 'Dubois'),
(10, 'Lavoie', 'Jean', 'Dixieme', 'Patinage artistique', 'Lavoie'),
(11, 'Girard', 'Sophie', 'Premier', 'Patinage en couple', 'Girard'),
(12, 'Lefevre', 'Alexandre', 'Premier', 'Patinage en couple', 'Lefevre'),
(13, 'Martin', 'Charlotte', 'Deuxieme', 'Patinage en couple', 'Martin'),
(14, 'Boucher', 'Elise', 'Deuxieme', 'Patinage en couple', 'Boucher'),
(15, 'Lavoie', 'Gabriel', 'Troisieme', 'Patinage en couple', 'Lavoie'),
(16, 'Deschamps', 'Valerie', 'Troisieme', 'Patinage en couple', 'Deschamps'),
(17, 'Belanger', 'Maxime', 'Quatrieme', 'Patinage en couple', 'Belanger'),
(18, 'Lamoureux', 'Emilie', 'Quatrieme', 'Patinage en couple', 'Lamoureux'),
(19, 'Gagnon', 'Jeremy', 'Cinquieme', 'Patinage en couple', 'Gagnon'),
(20, 'Rousseau', 'Sophie', 'Cinquieme', 'Patinage en couple', 'Rousseau'),
(21, 'Smith', 'John', 'Premier', 'Patinage synchronise', 'Smith'),
(22, 'Johnson', 'Emily', 'Premier', 'Patinage synchronise', 'Johnson'),
(23, 'Williams', 'Michael', 'Premier', 'Patinage synchronise', 'Williams'),
(24, 'Brown', 'Sophia', 'Premier', 'Patinage synchronise', 'Brown'),
(25, 'Jones', 'Olivia', 'Premier', 'Patinage synchronise', 'Jones'),
(26, 'Miller', 'Daniel', 'Deuxieme', 'Patinage synchronise', NULL),
(27, 'Davis', 'Ava', 'Deuxieme', 'Patinage synchronise', NULL),
(28, 'Garcia', 'Lucas', 'Deuxieme', 'Patinage synchronise', NULL),
(29, 'Rodriguez', 'Isabella', 'Deuxieme', 'Patinage synchronise', NULL),
(30, 'Martinez', 'Ethan', 'Deuxieme', 'Patinage synchronise', NULL),
(31, 'Cooper', 'Sophie', 'Troisieme', 'Patinage synchronise', NULL),
(32, 'Clark', 'Matthew', 'Troisieme', 'Patinage synchronise', NULL),
(33, 'Lee', 'Grace', 'Troisieme', 'Patinage synchronise', NULL),
(34, 'Taylor', 'Logan', 'Troisieme', 'Patinage synchronise', NULL),
(35, 'Wright', 'Emma', 'Troisieme', 'Patinage synchronise', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `resultatsynchro`
--

DROP TABLE IF EXISTS `resultatsynchro`;
CREATE TABLE IF NOT EXISTS `resultatsynchro` (
  `idresultatsynchro` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `classement` varchar(45) DEFAULT NULL,
  `categorie` varchar(45) DEFAULT NULL,
  `competition_idcompetition` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresultatsynchro`),
  KEY `fk_resultatsynchro_competition1_idx` (`competition_idcompetition`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultatsynchro`
--

INSERT INTO `resultatsynchro` (`idresultatsynchro`, `nom`, `prenom`, `classement`, `categorie`, `competition_idcompetition`) VALUES
(16, 'Smith', 'John', 'Premier', 'Patinage synchronise', NULL),
(17, 'Johnson', 'Emily', 'Premier', 'Patinage synchronise', NULL),
(18, 'Williams', 'Michael', 'Premier', 'Patinage synchronise', NULL),
(19, 'Brown', 'Sophia', 'Premier', 'Patinage synchronise', NULL),
(20, 'Jones', 'Olivia', 'Premier', 'Patinage synchronise', NULL),
(21, 'Miller', 'Daniel', 'Deuxieme', 'Patinage synchronise', NULL),
(22, 'Davis', 'Ava', 'Deuxieme', 'Patinage synchronise', NULL),
(23, 'Garcia', 'Lucas', 'Deuxieme', 'Patinage synchronise', NULL),
(24, 'Rodriguez', 'Isabella', 'Deuxieme', 'Patinage synchronise', NULL),
(25, 'Martinez', 'Ethan', 'Deuxieme', 'Patinage synchronise', NULL),
(26, 'Cooper', 'Sophie', 'Troisieme', 'Patinage synchronise', NULL),
(27, 'Clark', 'Matthew', 'Troisieme', 'Patinage synchronise', NULL),
(28, 'Lee', 'Grace', 'Troisieme', 'Patinage synchronise', NULL),
(29, 'Taylor', 'Logan', 'Troisieme', 'Patinage synchronise', NULL),
(30, 'Wright', 'Emma', 'Troisieme', 'Patinage synchronise', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vieclub`
--

DROP TABLE IF EXISTS `vieclub`;
CREATE TABLE IF NOT EXISTS `vieclub` (
  `idvieclub` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `heure` time NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`idvieclub`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vieclub`
--

INSERT INTO `vieclub` (`idvieclub`, `description`, `heure`, `lieu`, `date`) VALUES
(1, 'Entraînement figures imposées', '10:00:00', 'Glacial Arena', '2024-01-19'),
(2, 'Répétition gala de fin de saison', '13:15:00', 'Glacial Arena', '2024-01-24'),
(3, 'Session chorégraphie sur glace', '11:15:00', 'Glacial Arena', '2024-02-15'),
(4, 'Compétition interclubs régionale', '16:00:00', 'Glacial Arena', '2024-02-18'),
(5, 'Entraînement libre ', '11:15:00', 'Glacial Arena', '2024-02-22'),
(6, 'Spectacle patinage artistique ', '14:00:00', 'Glacial Arena', '2024-03-01'),
(7, 'Cours de perfectionnement ', '15:00:00', 'Glacial Arena', '2024-03-12'),
(8, 'Préparation championnat national', '13:45:00', 'Glacial Arena', '2024-03-16'),
(9, 'Entraînement spécial ', '09:15:00', 'Glacial Arena', '2024-03-19'),
(10, 'Session de patinage libre ', '10:30:00', 'Glacial Arena', '2024-03-26');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adhérent`
--
ALTER TABLE `adhérent`
  ADD CONSTRAINT `fk_adhérent_binomecompetition1` FOREIGN KEY (`binomecompetition_idbinomecompetition`) REFERENCES `binomecompetition` (`idbinomecompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adhérent_clubpatinage1` FOREIGN KEY (`clubpatinage_idclubpatinage`) REFERENCES `clubpatinage` (`idclubpatinage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adhérent_groupecompetition1` FOREIGN KEY (`groupecompetition_idgroupecompetition`) REFERENCES `groupecompetition` (`idgroupecompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adhérent_groupeentrainement1` FOREIGN KEY (`groupeentrainement_idgroupeentrainement`) REFERENCES `groupeentrainement` (`idgroupeentrainement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `adhérent_has_competition`
--
ALTER TABLE `adhérent_has_competition`
  ADD CONSTRAINT `fk_adhérent_has_competition_competition1` FOREIGN KEY (`competition_idcompetition`) REFERENCES `competition` (`idcompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `binomecompetition_has_competition`
--
ALTER TABLE `binomecompetition_has_competition`
  ADD CONSTRAINT `fk_binomecompetition_has_competition_binomecompetition1` FOREIGN KEY (`binomecompetition_idbinomecompetition`) REFERENCES `binomecompetition` (`idbinomecompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_binomecompetition_has_competition_competition1` FOREIGN KEY (`competition_idcompetition`) REFERENCES `competition` (`idcompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entrainement`
--
ALTER TABLE `entrainement`
  ADD CONSTRAINT `fk_entrainement_entraineur1` FOREIGN KEY (`entraineur_identraineur`) REFERENCES `entraineur` (`identraineur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_evenement_clubpatinage1` FOREIGN KEY (`clubpatinage_idclubpatinage`) REFERENCES `clubpatinage` (`idclubpatinage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenement_gala1` FOREIGN KEY (`gala_idgala`) REFERENCES `gala` (`idgala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `groupecompetition_has_competition`
--
ALTER TABLE `groupecompetition_has_competition`
  ADD CONSTRAINT `fk_groupecompetition_has_competition_competition1` FOREIGN KEY (`competition_idcompetition`) REFERENCES `competition` (`idcompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_groupecompetition_has_competition_groupecompetition1` FOREIGN KEY (`groupecompetition_idgroupecompetition`) REFERENCES `groupecompetition` (`idgroupecompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `groupeentrainement`
--
ALTER TABLE `groupeentrainement`
  ADD CONSTRAINT `fk_groupeentrainement_entraineur1` FOREIGN KEY (`entraineur_identraineur`) REFERENCES `entraineur` (`identraineur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `resultatart`
--
ALTER TABLE `resultatart`
  ADD CONSTRAINT `fk_resultat_competition1` FOREIGN KEY (`competition_idcompetition`) REFERENCES `competition` (`idcompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `resultatcouple`
--
ALTER TABLE `resultatcouple`
  ADD CONSTRAINT `fk_resultatcouple_competition1` FOREIGN KEY (`competition_idcompetition`) REFERENCES `competition` (`idcompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `resultatsynchro`
--
ALTER TABLE `resultatsynchro`
  ADD CONSTRAINT `fk_resultatsynchro_competition1` FOREIGN KEY (`competition_idcompetition`) REFERENCES `competition` (`idcompetition`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
