-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 23 Avril 2019 à 17:31
-- Version du serveur :  10.1.38-MariaDB-0ubuntu0.18.04.1
-- Version de PHP :  7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` smallint(6) NOT NULL,
  `title` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `textContent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) DEFAULT NULL,
  `page` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `textContent`, `category`, `page`) VALUES
(1, 'a1', 't1', 1, 1),
(2, 'a2', '<p>t2</p>', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` tinyint(4) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'cat1'),
(2, 'categoooo'),
(3, 'p2');

-- --------------------------------------------------------

--
-- Structure de la table `navBar`
--

CREATE TABLE `navBar` (
  `id` smallint(6) NOT NULL,
  `color` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `navBar`
--

INSERT INTO `navBar` (`id`, `color`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `navbar_color`
--

CREATE TABLE `navbar_color` (
  `id` tinyint(4) NOT NULL,
  `color` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `navbar_color`
--

INSERT INTO `navbar_color` (`id`, `color`) VALUES
(1, 'bg-primary'),
(2, 'bg-secondary'),
(3, 'bg-success'),
(4, 'bg-danger'),
(5, 'bg-warning'),
(6, 'bg-info'),
(7, 'bg-light'),
(8, 'bg-dark'),
(9, 'bg-white'),
(10, 'bg-transparent');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` smallint(6) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `name`) VALUES
(1, 'p13'),
(3, 'sfgsdfs');

-- --------------------------------------------------------

--
-- Structure de la table `webPage`
--

CREATE TABLE `webPage` (
  `id` int(11) NOT NULL,
  `WebPageName` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `webPage`
--

INSERT INTO `webPage` (`id`, `WebPageName`) VALUES
(1, 'Index');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `navBar`
--
ALTER TABLE `navBar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color` (`color`);

--
-- Index pour la table `navbar_color`
--
ALTER TABLE `navbar_color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `webPage`
--
ALTER TABLE `webPage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `navBar`
--
ALTER TABLE `navBar`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `navbar_color`
--
ALTER TABLE `navbar_color`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `webPage`
--
ALTER TABLE `webPage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
