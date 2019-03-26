-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 26 mars 2019 à 15:03
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE `continent` (
  `id` int(11) NOT NULL,
  `continent` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`id`, `continent`) VALUES
(1, 'Afrique'),
(2, 'Amerique'),
(3, 'Asie'),
(4, 'Europe'),
(5, 'Oceanie'),
(6, 'Antarctique');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `pays` varchar(32) COLLATE utf8_bin NOT NULL,
  `continentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `pays`, `continentId`) VALUES
(1, 'Afrique du Sud', 1),
(2, 'Algérie', 1),
(3, 'Cameroun', 1),
(4, 'Egypte', 1),
(5, 'Maroc', 1),
(6, 'Etats-Unis', 2),
(7, 'Argentine', 2),
(8, 'Bresil', 2),
(9, 'Mexique', 2),
(10, 'Canada', 2),
(11, 'Qatar', 3),
(12, 'Iran', 3),
(13, 'Pakistan', 3),
(14, 'Japon', 3),
(15, 'Chine', 3),
(16, 'Allemagne', 4),
(17, 'France', 4),
(18, 'Belgique', 4),
(19, 'Espagne', 4),
(20, 'Portugal', 4),
(21, 'Australie', 5),
(22, 'Nauru', 5),
(23, 'Palaos', 5),
(24, 'Nouvelle-Zelande', 5),
(25, 'Salomon', 5),
(26, 'Antarctique Argentine', 6),
(27, 'Antarctique France', 6),
(28, 'Antarctique Britannique', 6),
(29, 'Antarctique Chilien', 6),
(30, 'Terre Adelie', 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(32) COLLATE utf8_bin NOT NULL,
  `villeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `villeId`) VALUES
(1, 'loic', 'loic', 7),
(2, 'loic', 'guervin', 17);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `ville` varchar(32) COLLATE utf8_bin NOT NULL,
  `paysId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `ville`, `paysId`) VALUES
(1, 'Pretoria', 1),
(2, 'Alger', 2),
(3, 'Douala', 3),
(4, 'Le Caire', 4),
(5, 'Rabat', 5),
(6, 'Washington', 6),
(7, 'Buenos Aires', 7),
(8, 'Brasillia', 8),
(9, 'Mexico', 9),
(10, 'Ottawa', 10),
(11, 'Doha', 11),
(12, 'Teheran', 12),
(13, 'Islamabad', 13),
(14, 'Tokyo', 14),
(15, 'Pekin', 15),
(16, 'Berlin', 16),
(17, 'Paris', 17),
(18, 'Bruxelles', 18),
(19, 'Madrid', 19),
(20, 'Lisbonne', 20),
(21, 'Canberra', 21),
(22, 'Yaren', 22),
(23, 'Ngerulmud', 23),
(24, 'Wellington', 24),
(25, 'Horiara', 25),
(26, 'Argentine', 26),
(27, 'France', 27),
(28, 'Britannique', 28),
(29, 'Chilien', 29),
(30, 'Adelie', 30);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `continent`
--
ALTER TABLE `continent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
