-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 19 mai 2019 à 21:32
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
-- Base de données :  `caisse`
--

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `Id_boisson` int(11) NOT NULL,
  `Libellé` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`Id_boisson`, `Libellé`) VALUES
(1, 'Coca-cola'),
(2, 'Pepsi'),
(3, 'Lipton'),
(4, 'Fanta'),
(5, 'Mountain Dew');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id_employe` int(11) NOT NULL,
  `login_employe` varchar(30) NOT NULL,
  `password_employe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `Id_type` int(11) NOT NULL,
  `Id_produit` int(11) NOT NULL,
  `Libelle_produit` varchar(50) NOT NULL,
  `Prix_produit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`Id_type`, `Id_produit`, `Libelle_produit`, `Prix_produit`) VALUES
(3, 1, 'Cola-coca', 2),
(3, 2, 'Montagne Doux', 2),
(3, 3, 'Peipsy', 2),
(3, 4, 'Fenta', 2),
(3, 5, 'Hepart', 99),
(3, 6, 'Raid Boule', 2),
(1, 7, 'BigSteack', 4),
(1, 8, 'Dwitch', 3.5),
(1, 9, 'TartiBurger', 5.5),
(1, 10, 'Rakletts', 5.49),
(1, 11, 'Jétéhix 1080 Tea', 7),
(1, 12, 'Ultra cheese', 6.5),
(2, 13, 'Glace Fleurrie', 3.5),
(2, 14, 'Mille checks', 4),
(2, 15, 'Gatal', 2),
(4, 16, 'Succinct frite', 1.5),
(4, 17, 'Ample frite', 3),
(4, 18, 'Ample Tubercule comestible', 3.5),
(4, 19, 'Succinct Tubercule comestible', 2),
(5, 20, 'Barbouze chapelée', 0.3),
(5, 21, 'Elytre de barbouze', 0.4);

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE `taille` (
  `Id_taille` int(11) NOT NULL,
  `Libellé_taille` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `Id_type` int(11) NOT NULL,
  `Libellé_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`Id_type`, `Libellé_type`) VALUES
(1, 'Burger'),
(2, 'Dessert'),
(3, 'Boisson'),
(4, 'Frite'),
(5, 'Supplément');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `Id_vente` int(11) NOT NULL,
  `contenu_vente` varchar(500) NOT NULL,
  `prix_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`Id_vente`, `contenu_vente`, `prix_total`) VALUES
(1, 'oui', 0),
(2, 'oui', 0),
(3, 'nullBigSteackAmple friteSuccinct friteRaid BouleCola-coca', 0),
(4, 'Dwitch TartiBurger Ample frite Succinct frite Ample Tubercule comestible Hepart Raid Boule Fenta Montagne Doux', 0),
(5, 'BigSteack Ample frite Cola-coca', 9),
(6, 'Dwitch Ample frite Raid Boule Hepart Peipsy Succinct frite Succinct frite', 112.5),
(7, 'Dwitch Ample frite Raid Boule Cola-coca Succinct frite Ample frite Raid Boule Ample Tubercule comestible Fenta', 22.5),
(8, 'BigSteack Dwitch Succinct frite Ample frite', 12),
(9, 'BigSteack Succinct frite BigSteack BigSteack Succinct frite Succinct frite Succinct frite', 18),
(10, 'Dwitch Ample frite Raid Boule', 8.5),
(11, 'BigSteack Cola-coca Succinct frite Dwitch Ample frite', 14),
(12, 'BigSteack Dwitch Succinct frite Ample frite Raid Boule Cola-coca', 16),
(13, 'BigSteack Succinct frite TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger TartiBurger', 170.5),
(14, 'BigSteack Succinct frite Cola-coca', 7.5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`Id_boisson`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id_employe`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`Id_produit`),
  ADD KEY `Id_type` (`Id_type`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`Id_taille`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Id_type`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`Id_vente`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `Id_boisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id_employe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `Id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `taille`
--
ALTER TABLE `taille`
  MODIFY `Id_taille` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `Id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `Id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_ibfk_1` FOREIGN KEY (`Id_type`) REFERENCES `type` (`Id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
