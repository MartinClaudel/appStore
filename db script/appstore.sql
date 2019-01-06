-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 06 jan. 2019 à 22:32
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appstore`
--

-- --------------------------------------------------------

--
-- Structure de la table `app`
--

DROP TABLE IF EXISTS `app`;
CREATE TABLE IF NOT EXISTS `app` (
  `ID` varchar(25) NOT NULL,
  `pckg` varchar(20) NOT NULL,
  `OS` varchar(40) NOT NULL,
  `ver` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image_link` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `app`
--

INSERT INTO `app` (`ID`, `pckg`, `OS`, `ver`, `name`, `description`, `image_link`) VALUES
('123456789101112', '654.5.231', 'Android', '1.4', 'Sample app', 'c\'est vraiment bien j\'adore', 'https://i.kym-cdn.com/entries/icons/mobile/000/018/259/55181940.jpg'),
('4318496616ead5be9522755e4', 'aszzzzzzzzz', 'aaszzzzzzzzzzzz', 'as', 'aszzzzzz', 'ass', NULL),
('7381d35b41064ea338a99d0bf', 'sddqs', 'dqds', 'qsdqs', 'qsdq', 'dqsd', NULL),
('a73fe19dc6494aa27ca57c46a', 'dqs', 'dqsd', 'qsdqs', 'qsqsdq', 'qsdsq', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `appbycategory`
--

DROP TABLE IF EXISTS `appbycategory`;
CREATE TABLE IF NOT EXISTS `appbycategory` (
  `appID` varchar(25) NOT NULL,
  `categoryID` varchar(25) NOT NULL,
  KEY `fk_categoryID` (`categoryID`),
  KEY `fk_appID` (`appID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appbycategory`
--

INSERT INTO `appbycategory` (`appID`, `categoryID`) VALUES
('7381d35b41064ea338a99d0bf', '06355c0087102eb52b1b3154a'),
('123456789101112', 'cd516af44fd1f7b1f97b79d36'),
('123456789101112', '17ed971eb0640ed449f2e2d85'),
('123456789101112', 'e3bd30643835f6fe2ebe88076'),
('7381d35b41064ea338a99d0bf', 'e3bd30643835f6fe2ebe88076'),
('7381d35b41064ea338a99d0bf', 'cd516af44fd1f7b1f97b79d36'),
('7381d35b41064ea338a99d0bf', '17ed971eb0640ed449f2e2d85'),
('a73fe19dc6494aa27ca57c46a', 'cd516af44fd1f7b1f97b79d36'),
('123456789101112', '06355c0087102eb52b1b3154a');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ID` varchar(25) NOT NULL,
  `name` tinytext NOT NULL,
  `OS` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`ID`, `name`, `OS`) VALUES
('06355c0087102eb52b1b3154a', 'Yesssir', 'yesOS'),
('17ed971eb0640ed449f2e2d85', 'Bob', 'Android'),
('cd516af44fd1f7b1f97b79d36', 'La catégorie des bestassosses', 'bestOS'),
('e3bd30643835f6fe2ebe88076', 'Bob', 'iOS');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appbycategory`
--
ALTER TABLE `appbycategory`
  ADD CONSTRAINT `fk_appID` FOREIGN KEY (`appID`) REFERENCES `app` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
