-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 25 avr. 2018 à 20:04
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetnan2`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `datte` date NOT NULL,
  `datt` date NOT NULL,
  `titre` varchar(150) NOT NULL,
  `contenu` text NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actualites`
--

INSERT INTO `actualites` (`id`, `datte`, `datt`, `titre`, `contenu`, `img`) VALUES
(1, '2018-04-02', '2018-04-25', 'Essai base de donnees', 'oui oui', 'place de photo'),
(4, '2018-04-24', '2018-04-26', 'Essai base de donnees', 's usages', 'place de photo	2');

-- --------------------------------------------------------

--
-- Structure de la table `Entreprise`
--

CREATE TABLE `Entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `slogan` varchar(250) NOT NULL,
  `aPropos` text NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projetsNan`
--

CREATE TABLE `projetsNan` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `aPropos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vieNan`
--

CREATE TABLE `vieNan` (
  `id` int(11) NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vieNan`
--
ALTER TABLE `vieNan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vieNan`
--
ALTER TABLE `vieNan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
