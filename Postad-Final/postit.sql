-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 09 avr. 2018 à 22:04
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `postit`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_Compte` int(5) NOT NULL,
  `nom_Compte` varchar(40) DEFAULT NULL,
  `prenom_Compte` varchar(40) DEFAULT NULL,
  `pseudo_Compte` varchar(50) DEFAULT NULL,
  `mail_Compte` varchar(80) DEFAULT NULL,
  `mdp_Compte` varchar(60) DEFAULT NULL,
  `date_Compte` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_Compte`, `nom_Compte`, `prenom_Compte`, `pseudo_Compte`, `mail_Compte`, `mdp_Compte`, `date_Compte`) VALUES
(11, 'x', 'x', 'x', 'x@x.x', '$2y$10$CbCilLsVicxaSA3VBaWBx.YGnLQZpF78/5KW9eujr0aZjx65uPjFC', NULL),
(12, 'Barret', 'HervÃ©', 'rv974', 'herve974.30@gmail.com', '$2y$10$pQX8wjRJ/K6GrSUdMyJDbu7sxpi4/WQXdteqEGjzmwyvHWnT1TQ4u', NULL),
(13, 'BARRET', 'LUCIE', 'Barlu', 'petite_miss974@hotmail.fr', '$2y$10$K8mIsJZBwy0NqpGFpotL/udAf41dBAbr21LDWetpnMUWFo.Pk7JVi', NULL),
(14, 'test', 'test', 'test', 'herve974.30@gmail.com', '$2y$10$rIiu2TVhRyQFLkEkPTQeJujkZ2Fr/x2mNBQeRSTq85XXXTmGJODe.', NULL),
(15, 'biotope', 'diahrÃ©e', 'hum...merde', 'wild@gmail.com', '$2y$10$tDNkG.6yqP8Lv4NZOI.fN.c1owYxdco0i/oawznQ4VWVecMQizoLu', NULL),
(16, 'Emma', 'Tony', 'Mylilpwny', 'emma.tony@gmail.com', '$2y$10$X0zL96QRPzxLIzG7zbkKsudc55XJ.b0TnDQw2yP5kcAeY0eXgIgNe', '2018-04-09'),
(17, 'Sin', 'Lee', 'LeeSin', 'leesin@gmail.com', '$2y$10$MhO/SP4EjJwLarh7jxOfA.M7QrsAVyrxodsh5kGE3Gu6ftYiDSyhy', '2018-04-09');

-- --------------------------------------------------------

--
-- Structure de la table `postit`
--

CREATE TABLE `postit` (
  `id_Postit` int(10) NOT NULL,
  `id_Compte` int(5) DEFAULT NULL,
  `contenu_Postit` varchar(1000) DEFAULT NULL,
  `titre_Postit` varchar(20) DEFAULT NULL,
  `date_Postit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `postit`
--

INSERT INTO `postit` (`id_Postit`, `id_Compte`, `contenu_Postit`, `titre_Postit`, `date_Postit`) VALUES
(23, 16, 'fe', 'fe', '2018-04-09'),
(24, 16, 'tvzv', 'gtv', '2018-04-09'),
(25, 16, 'grggr', 'grgr', '2018-04-09'),
(26, 16, 'grgrgr', 'grgr', '2018-04-09'),
(27, 16, 'eded', 'ded', '2018-04-09'),
(28, 16, 'Jde rzjgb rzibgirz rizgbrzg rgzubirzgu', 'OUI', '2018-04-09'),
(29, 12, 'Bonjour je loue une villa contactez moi au 0692000000', 'Villa', '2018-04-09'),
(30, 12, 'test\r\n', 'test', '2018-04-09'),
(31, 12, 'test2', 'test2', '2018-04-09'),
(32, 12, 'dedejndekee\r\ngtgtgtgttgtgtgtgtg', 'gtgtgtgtgtgtgtggtggg', '2018-04-09'),
(33, 17, 'fefefef', 'efefe', '2018-04-09'),
(34, 17, 'defzbgr', 'azdefrgbr', '2018-04-09'),
(35, 17, 'oui', 'oui', '2018-04-09'),
(36, 17, 'testdate', 'test', '2018-04-09');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_Compte`);

--
-- Index pour la table `postit`
--
ALTER TABLE `postit`
  ADD PRIMARY KEY (`id_Postit`),
  ADD KEY `id_Compte` (`id_Compte`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_Compte` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `postit`
--
ALTER TABLE `postit`
  MODIFY `id_Postit` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `postit`
--
ALTER TABLE `postit`
  ADD CONSTRAINT `postit_ibfk_1` FOREIGN KEY (`id_Compte`) REFERENCES `compte` (`id_Compte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
