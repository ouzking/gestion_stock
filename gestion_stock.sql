-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 août 2023 à 01:15
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `mouvementsstock`
--

DROP TABLE IF EXISTS `MOUVEMENTSSTOCK`;

CREATE TABLE IF NOT EXISTS `MOUVEMENTSSTOCK` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `PRODUITID` INT DEFAULT NULL,
    `TYPEMOUVEMENT` ENUM('Entree', 'Sortie') DEFAULT NULL,
    `QUANTITE` INT DEFAULT NULL,
    `DATEMOUVEMENT` DATETIME DEFAULT NULL,
    PRIMARY KEY (`ID`),
    KEY `MOUVEMENTSSTOCK_IBFK_1` (`PRODUITID`)
) ENGINE=INNODB AUTO_INCREMENT=26 DEFAULT CHARSET=UTF8MB3;

--
-- Déchargement des données de la table `mouvementsstock`
--

INSERT INTO `MOUVEMENTSSTOCK` (
    `ID`,
    `PRODUITID`,
    `TYPEMOUVEMENT`,
    `QUANTITE`,
    `DATEMOUVEMENT`
) VALUES (
    18,
    1,
    'Entree',
    5,
    '2023-08-17 23:54:34'
),
(
    19,
    1,
    'Entree',
    2,
    '2023-08-18 14:26:25'
),
(
    20,
    3,
    'Sortie',
    1,
    '2023-08-18 14:28:28'
),
(
    21,
    3,
    'Entree',
    3,
    '2023-08-18 14:33:56'
),
(
    22,
    4,
    'Sortie',
    10,
    '2023-08-18 14:34:15'
),
(
    23,
    3,
    'Entree',
    5,
    '2023-08-20 12:59:14'
),
(
    24,
    11,
    'Sortie',
    3,
    '2023-08-20 13:31:46'
),
(
    25,
    4,
    'Entree',
    5,
    '2023-08-26 01:13:31'
);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `PRODUIT`;

CREATE TABLE IF NOT EXISTS `PRODUIT` (
    `ID_PRODUIT` INT NOT NULL AUTO_INCREMENT,
    `NOM` VARCHAR(255) NOT NULL,
    `DESIGNATION` VARCHAR(255) NOT NULL,
    `QUANTITE` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`ID_PRODUIT`)
) ENGINE=INNODB AUTO_INCREMENT=12 DEFAULT CHARSET=UTF8MB3;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `PRODUIT` (
    `ID_PRODUIT`,
    `NOM`,
    `DESIGNATION`,
    `QUANTITE`
) VALUES (
    1,
    'hp',
    'i3',
    '12'
),
(
    3,
    'samsung',
    'i5',
    '25'
),
(
    4,
    'lenovo',
    'duo',
    '45'
),
(
    11,
    'dell',
    'i7',
    '17'
);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `USERS`;

CREATE TABLE IF NOT EXISTS `USERS` (
    `USER_ID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `USERNAME` VARCHAR(50) NOT NULL,
    `PASSWORD_HASH` VARCHAR(100) NOT NULL,
    `EMAIL` VARCHAR(100) NOT NULL,
    `CREATED_AT` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`USER_ID`),
    UNIQUE KEY `USER_ID` (`USER_ID`)
) ENGINE=MYISAM AUTO_INCREMENT=16 DEFAULT CHARSET=UTF8MB4 COLLATE=UTF8MB4_0900_AI_CI;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `USERS` (
    `USER_ID`,
    `USERNAME`,
    `PASSWORD_HASH`,
    `EMAIL`,
    `CREATED_AT`
) VALUES (
    15,
    'meblo',
    '$2y$10$lGrHuw4VRbUWbsfrrIfN5eKT9AplNKlNR.ygPn5w7P4WKzRd9.cS.',
    'meblo@gmail.com',
    '2023-08-26 00:57:34'
);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mouvementsstock`
--
ALTER TABLE `MOUVEMENTSSTOCK` ADD CONSTRAINT `MOUVEMENTSSTOCK_IBFK_1` FOREIGN KEY (`PRODUITID`) REFERENCES `PRODUIT` (`ID_PRODUIT`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;