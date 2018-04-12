-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2018 at 07:36 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinitywar-database`
--
CREATE DATABASE IF NOT EXISTS `infinitywar-database` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `infinitywar-database`;

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
CREATE TABLE IF NOT EXISTS `heroes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hero_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `heroes`
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
(20, 'Mantis', 431),
(21, 'No Hero', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

DROP TABLE IF EXISTS `rankings`;
CREATE TABLE IF NOT EXISTS `rankings` (
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `team_id`, `team_name`, `character_number`, `mail_address`, `id_hero_1`, `id_hero_2`, `id_hero_3`, `id_hero_4`, `id_hero_5`, `url_hero_1`, `url_hero_2`, `url_hero_3`, `url_hero_4`, `url_hero_5`, `reports`, `votes`, `validated`) VALUES
(20, '29f1aa9fc11634a0cf86a9e39bacd8d2', 'azezaazee', 5, 'azheb@azjhazaz.fr', '659', '697', '703', '566', '303', 'images/sheroe659.jpg', 'images/sheroe697.jpg', 'images/sheroe703.jpg', 'images/sheroe566.jpg', 'images/sheroe303.jpg', 0, 0, 0),
(29, '15c65f3931fe8a0057abe097506327ba', 'Mathierrrr', 3, 'azybd@azydgg.fr', '332', '659', '107', '0', '0', 'images/uploads/Mathierrrr/1200px-Pepsi_logo_2014.svg.png', 'images/uploads/Mathierrrr/09310becff6a8c935d07ea073111e7cb.png', 'images/sheroe107.jpg', '0', '0', 0, 0, 0),
(30, 'ed735d55415bee976b771989be8f7005', 'bite', 2, 'ddee@hehhe.fr', '149', '226', '0', '0', '0', 'images/sazdj', 'images/azd26.jpg', '0', '0', '0', 0, 0, 0),
(31, 'ff1289ab9de92a5ca7d36c9f1d35c554', 'adzazd', 1, 'azdhbhbazd@azdb.fr', '234', '0', '0', '0', '0', 'images/uploads/adzazd/09310becff6a8c935d07ea073111e7cb.png', '0', '0', '0', '0', 0, 0, 0),
(32, 'd54e67aaa5673850ce1cec851ff5e5ec', 'azduhdaz', 1, 'azdggazd@zhid.fr', '149', '0', '0', '0', '0', 'images/uploads/azduhdaz/15127418_10211199866131803_181768695_o.png', '0', '0', '0', '0', 0, 0, 1),
(33, '6046dce605ed2aea125aa72b5718cde0', 'Mathierrrraze', 3, 'azjhbd@azud.fr', '149', '346', '226', '0', '0', 'images/uploads/Mathierrrraze/09310becff6a8c935d07ea073111e7cb.png', 'images/uploads/Mathierrrraze/15127418_10211199866131803_181768695_o.png', 'images/uploads/Mathierrrraze/15139266_1869324066636350_1927354436_n.jpg', '0', '0', 0, 0, 1),
(34, 'b32d2f022a024796a5003ffabb3979d9', 'dazdazda', 2, 'dd@ddd.oo', '149', '303', '0', '0', '0', 'images/uploads/dazdazda/thomas-01.jpg', 'images/uploads/dazdazda/20150214_woc135.png', '0', '0', '0', 0, 0, 1),
(35, '7e03ba7d5fee2131181724e9a61f0ec7', 'azdiuhd', 4, 'azd@azud.fr', '226', '332', '659', '107', '0', 'images/sheroe226.jpg', 'images/sheroe332.jpg', 'images/sheroe659.jpg', 'images/sheroe107.jpg', '0', 0, 0, 0),
(36, '509dac30bd5981d70cdec0cbdd9f6e7f', 'adbaze', 3, 'azdugz@aze.fr', '149', '346', '226', '0', '0', 'images/uploads/adbaze/09310becff6a8c935d07ea073111e7cb.png', 'images/uploads/adbaze/15127418_10211199866131803_181768695_o.png', 'images/uploads/adbaze/Toyota-concept-i-1200x733.png', '0', '0', 0, 0, 1),
(37, '9cd050287706397d6aad24c4a096834f', 'azduhdaza', 1, 'azkd@zjdhj.f', '566', '0', '0', '0', '0', 'images/sheroe566.jpg', '0', '0', '0', '0', 0, 0, 0),
(38, '5ba84cc7243cf6670d32de85278f9b50', 'azdbhhjva', 2, 'azdazd@ziuhd.fr', '234', '303', '0', '0', '0', 'images/uploads/azdbhhjva/15127418_10211199866131803_181768695_o.png', 'images/uploads/azdbhhjva/09310becff6a8c935d07ea073111e7cb.png', '0', '0', '0', 0, 0, 1),
(39, 'ac86e9d1fc982ebeb20ce6d2cf830ab2', 'jdsd', 2, 'hjg@ioiu.fr', '346', '487', '0', '0', '0', 'images/sheroe346.jpg', 'images/sheroe487.jpg', '0', '0', '0', 0, 0, 0),
(40, 'c0da2fcc51be7f583c7a9dfae4faaf16', 'hkj', 1, 'hhj@jgjh.fr', '431', '0', '0', '0', '0', 'images/sheroe431.jpg', '0', '0', '0', '0', 0, 0, 0),
(41, 'd756c88400d5405b79ef65605dc492fc', 'azdjhazdg', 1, 'aihdzhad@zuidh.fr', '487', '0', '0', '0', '0', 'images/sheroe487.jpg', '0', '0', '0', '0', 0, 0, 0),
(42, '26a4af223caba1a1cfcbee949fd5d2f6', 'zadadz', 2, 'adzaz@azyazy.gg', '275', '566', '0', '0', '0', 'images/sheroe275.jpg', 'images/sheroe566.jpg', '0', '0', '0', 0, 0, 0),
(43, 'f7ee0e19e9c0636c13e381bf96c3d7b5', 'azdd', 1, 'azdijazd@doihhid.f', '303', '0', '0', '0', '0', 'images/sheroe303.jpg', '0', '0', '0', '0', 0, 0, 0),
(44, 'baced3bd752aaeec34fd9fe0a18f1ead', 'azdzad', 1, 'azdzda@zdhu.fr', '566', '0', '0', '0', '0', 'images/sheroe566.jpg', '0', '0', '0', '0', 0, 0, 0),
(45, 'e74ea462a5a101366b2fd920e6e8692c', 'azdzadaze', 1, 'azdzdaa@zdhu.fr', '566', '0', '0', '0', '0', 'images/sheroe566.jpg', '0', '0', '0', '0', 0, 0, 0),
(46, 'c1edf84ca72d1ea0f809e4750afcf27e', 'azdazd', 1, 'azd@dnc.cn', '566', '0', '0', '0', '0', 'images/uploads/azdazd/09310becff6a8c935d07ea073111e7cb.png', '0', '0', '0', '0', 0, 0, 1),
(47, 'e18399f1d8c90d552cfea3aa633695f8', 'gyguyg', 2, 'lygg@aj.fr', '226', '431', '0', '0', '0', 'images/sheroe226.jpg', 'images/sheroe431.jpg', '0', '0', '0', 0, 0, 0),
(48, '2df0c174245adff9d5bc0ae2be963c48', 'azdhgzdabh', 3, 'azuodhhazd@zydg.fr', '149', '346', '332', '0', '0', 'images/uploads/azdhgzdabh/15139266_1869324066636350_1927354436_n.jpg', 'images/uploads/azdhgzdabh/09310becff6a8c935d07ea073111e7cb.png', 'images/uploads/azdhgzdabh/15127418_10211199866131803_181768695_o.png', '0', '0', 0, 0, 1),
(49, 'b05d6031a1ad16c46188ddf86e9e1dbe', 'abdbbd', 2, 'ajnzjbd@jadj.fr', '346', '226', '0', '0', '0', 'images/uploads/abdbbd/09310becff6a8c935d07ea073111e7cb.png', 'images/uploads/abdbbd/20150214_woc135.png', '0', '0', '0', 0, 0, 1),
(50, 'b5c073cbafb73ee46403f17272da5a49', 'azjkdjkazdn', 3, 'ajdazd@ajhzdazjdk.fr', '149', '346', '226', '0', '0', 'images/uploads/azjkdjkazdn/09310becff6a8c935d07ea073111e7cb.png', 'images/uploads/azjkdjkazdn/4gdcscj.jpg', 'images/sheroe226.jpg', '0', '0', 0, 0, 0),
(51, 'ce10f731c10ed778031760929f7026b4', 'azkjdazd', 3, 'azkjndnjazd@azoid.fr', '346', '226', '332', '0', '0', 'images/uploads/azkjdazd/09310becff6a8c935d07ea073111e7cb.png', 'images/sheroe226.jpg', 'images/sheroe332.jpg', '0', '0', 0, 0, 0),
(52, 'da8a38725e6725e0eeb961d1a5d709ad', 'erzze', 1, 'erzer@trge.fr', '149', '0', '0', '0', '0', 'images/sheroe149.jpg', '0', '0', '0', '0', 0, 0, 0),
(53, '15a3853b450594299287cbb04ce3cf58', '&Ã©"''(-Ã¨_Ã§Ã )=+Â°^@]}\\`|[{#~~Â¨Â£$Â¤*Ã¹*Ã¹Â§/;:!,;,:!;', 1, 'aszas@sfr.fr', '346', '0', '0', '0', '0', 'images/sheroe346.jpg', '0', '0', '0', '0', 0, 0, 0),
(54, 'a25b29fe6a997d6aae95c3fc8e9d5607', 'dfghjklmcaeifuiaop^zdvahyidpzo^djazvdugzidoadvaidadkadvhizad', 1, 'fauzad@fr.fr', '431', '0', '0', '0', '0', 'images/sheroe431.jpg', '0', '0', '0', '0', 0, 0, 0),
(55, '4e9b2b3df01ab6c295d6d68012e949ca', 'trotrotrotro', 1, 'addzaddz@KAJZSJ.fr', '149', '0', '0', '0', '0', 'images/sheroe149.jpg', '0', '0', '0', '0', 0, 0, 0),
(56, '0a9dad5271ab6260d6c239f0bdcce738', 'azduhdzbda', 4, 'azeaazd@azdyghgad.faz', '149', '346', '226', '332', '0', 'images/uploads/azduhdzbda/2-compressor.png', 'images/uploads/azduhdzbda/09310becff6a8c935d07ea073111e7cb.png', 'images/uploads/azduhdzbda/15127418_10211199866131803_181768695_o.png', 'images/uploads/azduhdzbda/4gdcscj.jpg', '0', 0, 0, 1),
(57, '0f8218c455dc5ccd955c1e3ed5748df1', 'djjdjjdjjd', 2, 'azdazd@alkdkl.fr', '487', '431', '0', '0', '0', 'images/uploads/djjdjjdjjd/09310becff6a8c935d07ea073111e7cb.png', 'images/sheroe431.jpg', '0', '0', '0', 0, 0, 0),
(58, '1084a648fa132cff1c84a0d4914298d2', 'azsaz', 2, 'ajzndhnzad@auihz.fr', '620', '106', '0', '0', '0', 'images/sheroe620.jpg', 'images/sheroe106.jpg', '0', '0', '0', 0, 0, 0),
(59, '359fd21c837da5fb5bda02dfdd1563a8', 'azuuhadz', 3, 'aziuazhadz@azdhz.fr', '149', '346', '226', '0', '0', 'images/sheroe149.jpg', 'images/sheroe346.jpg', 'images/sheroe226.jpg', '0', '0', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
