-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 23 avr. 2018 à 16:30
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_nan2`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

CREATE TABLE `actualites` (
  `id` int(11) NOT NULL,
  `datt` date NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `activite` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `prenoms` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `photo` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `groupe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `equipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `datt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `telechargement` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sousCategorie`
--

CREATE TABLE `sousCategorie` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datt` date NOT NULL,
  `resolu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vieNaN`
--

CREATE TABLE `vieNaN` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `etudiant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupe_id` (`groupe_id`),
  ADD KEY `groupe_id_2` (`groupe_id`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipe_id` (`equipe_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sousCategorie`
--
ALTER TABLE `sousCategorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vieNaN`
--
ALTER TABLE `vieNaN`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sousCategorie`
--
ALTER TABLE `sousCategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vieNaN`
--
ALTER TABLE `vieNaN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `competence_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`);

--
-- Contraintes pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `sousCategorie`
--
ALTER TABLE `sousCategorie`
  ADD CONSTRAINT `souscategorie_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `souscategorie_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `vieNaN`
--
ALTER TABLE `vieNaN`
  ADD CONSTRAINT `vienan_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
