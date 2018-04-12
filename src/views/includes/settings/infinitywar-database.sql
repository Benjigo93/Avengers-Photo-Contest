-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 12 avr. 2018 à 18:54
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `infinitywar-database`
--
CREATE DATABASE IF NOT EXISTS `infinitywar-database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `infinitywar-database`;

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
CREATE TABLE `heroes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `hero_id`) VALUES
(1, 'Captain America', 149),
(2, 'Iron Man', 346),
(3, 'Doctor Strange', 226),
(4, 'Hulk', 332),
(5, 'Thor', 659),
(6, 'Black Widow', 107),
(7, 'Spiderman', 620),
(8, 'Black Panther', 106),
(9, 'Scarlet Witch', 579),
(10, 'Vision', 697),
(11, 'War Machine', 703),
(12, 'Falcon', 251),
(13, 'Winter Soldier', 714),
(14, 'Star-Lord', 630),
(15, 'Drax', 234),
(16, 'Gamora', 275),
(17, 'Rocket Raccoon', 566),
(18, 'Groot', 303),
(19, 'Nebula', 487),
(20, 'Mantis', 431);

-- --------------------------------------------------------

--
-- Structure de la table `ip`
--

DROP TABLE IF EXISTS `ip`;
CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `time_vote` time NOT NULL,
  `number_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rankings`
--

DROP TABLE IF EXISTS `rankings`;
CREATE TABLE `rankings` (
  `id` int(11) NOT NULL,
  `team_id` varchar(100) NOT NULL,
  `team_name` varchar(60) NOT NULL,
  `character_number` int(11) NOT NULL,
  `mail_address` varchar(250) NOT NULL,
  `id_hero_1` varchar(3) NOT NULL,
  `id_hero_2` varchar(3) NOT NULL,
  `id_hero_3` varchar(3) NOT NULL,
  `id_hero_4` varchar(3) NOT NULL,
  `id_hero_5` varchar(3) NOT NULL,
  `url_hero_1` varchar(250) NOT NULL,
  `url_hero_2` varchar(250) NOT NULL,
  `url_hero_3` varchar(250) NOT NULL,
  `url_hero_4` varchar(250) NOT NULL,
  `url_hero_5` varchar(250) NOT NULL,
  `reports` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `validated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rankings`
--

INSERT INTO `rankings` (`id`, `team_id`, `team_name`, `character_number`, `mail_address`, `id_hero_1`, `id_hero_2`, `id_hero_3`, `id_hero_4`, `id_hero_5`, `url_hero_1`, `url_hero_2`, `url_hero_3`, `url_hero_4`, `url_hero_5`, `reports`, `votes`, `validated`) VALUES
(7, '5d41402abc4b2a76b9719d911017c592', 'hello', 4, 'hello@hello.fr', '149', '346', '226', '431', '0', 'images/sheroe149', 'images/sheroe346', 'images/sheroe226', 'images/sheroe431', '0', 3, 75, 0),
(8, '5d41402abc4b2a76b9719d911017c592', 'hello', 4, 'hello@hello.fr', '149', '346', '226', '431', '0', 'images/sheroe149', 'images/sheroe346', 'images/sheroe226', 'images/sheroe431', '0', 0, 6, 0),
(9, '5d41402abc4b2a76b9719d911017c592', 'hello', 1, 'aze@zae.fr', '251', '0', '0', '0', '0', 'images/sheroe251', '0', '0', '0', '0', 0, 6, 0),
(10, '0cc175b9c0f1b6a831c399e269772661', 'a', 1, 'aze@zae.fr', '566', '0', '0', '0', '0', 'images/sheroe566', '0', '0', '0', '0', 1, 131, 0),
(11, 'cc8c0a97c2dfcd73caff160b65aa39e2', 'az', 1, 'aze@zae.fr', '303', '0', '0', '0', '0', 'images/sheroe303', '0', '0', '0', '0', 0, 0, 0),
(12, '5d41402abc4b2a76b9719d911017c592', 'hello', 1, 'aze@zae.fr', '566', '0', '0', '0', '0', 'images/sheroe566', '0', '0', '0', '0', 4, 7, 0),
(13, '7c37be7260f8cd7c1f5e4dbdd7bc5b23', 'azeaze', 1, 'aze@zae.fr', '566', '0', '0', '0', '0', 'images/sheroe566', '0', '0', '0', '0', 0, 0, 0),
(14, 'cc479ee70694ef507cb504b0ae89cb87', 'mathieu', 5, 'azeazeazmathieueaze@aa.fr', '346', '332', '579', '251', '303', 'images/sheroe346', 'images/sheroe332', 'images/sheroe579', 'images/sheroe251', 'images/sheroe303', 0, 3, 0),
(15, 'ef6e65efc188e7dffd7335b646a85a21', 'thomas', 2, 'thomas.obadia@yahoo.fr', '149', '346', '0', '0', '0', 'images/sheroe149', 'images/sheroe346', '0', '0', '0', 0, 0, 0),
(16, '85c42eee6cca8d20a33dc0f2653f3694', 'thamas', 2, 'azhdazdhu@azhgd.fr', '346', '226', '0', '0', '0', 'images/sheroe346', 'images/sheroe226', '0', '0', '0', 5, 11, 1),
(17, '6ec5f46fd99134c9d62215f6c9b4bbbb', 'lezgegdu90$$daz$****$)Â°Â°)', 5, 'dd@dxx.dfd', '106', '703', '251', '714', '630', 'images/sheroe106', 'images/sheroe703', 'images/sheroe251', 'images/sheroe714', 'images/sheroe630', 0, 0, 0),
(18, 'e4ba9efdb661f153c62df1da75c7aaef', 'Ã©Ã¨_-&ya', 1, 'azeazdadz@yahoo.fra', '346', '0', '0', '0', '0', 'images/sheroe346', '0', '0', '0', '0', 0, 19, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
