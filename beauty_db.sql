-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 mai 2023 à 21:44
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `beauty_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse1`
--

CREATE TABLE `caisse1` (
  `id` int(11) NOT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `caisse1`
--

INSERT INTO `caisse1` (`id`, `montant`) VALUES
(1, 654),
(2, 6),
(3, 8765432),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `ID` int(11) NOT NULL,
  `Titre` varchar(33) NOT NULL,
  `Description` varchar(33) NOT NULL,
  `Montant` int(33) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`ID`, `Titre`, `Description`, `Montant`, `Date`) VALUES
(2, 'produit Cosmetique', 'sdfgjhketryuidfghjkrtyjk', 10000, '2023-05-13'),
(3, 'les masques', 'lkjhfdsoiuytrewjhgfdsauytr', 5000, '2023-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `ID_Pesonne` int(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `tele` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID_Pesonne`, `nom`, `prenom`, `Email`, `tele`, `password`, `username`, `Adresse`) VALUES
(2, 'badda', 'youssra', 'youssra.badda@etu.uae.ac.ma', 76543, '222', 'client', ''),
(3, 'ettajrini', 'safa', 'admin@gmail.com', 456789, '222', 'admin@gmail.com', ''),
(9, 'el hankari', 'ouijdane', 'ouijdane@gmail.com', 98765434, '000', 'ouijdane@gmail.com', 'imzouren');

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `ID` int(11) NOT NULL,
  `Titre` varchar(33) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`ID`, `Titre`, `Description`, `prix`, `image`) VALUES
(1, 'Broching', 'dfghjklasirtejdgkjastudfddffdffff', 100, 'broching.jpg'),
(3, 'soins de visage ', 'dfghjkrftguifghjkgh', 800, 'C:fakepathsoin2.jpg'),
(5, 'fghjgj', 'rtyurftyu', 124, 'C:fakepathsoin.webp');

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `id_RV` int(20) NOT NULL,
  `Id_client` int(20) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `Etat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id_RV`, `Id_client`, `date`, `heure`, `Etat`) VALUES
(4, 2, '2029-06-26', '20:05:06', 'confirmer'),
(7, 2, '2023-05-03', '20:23:00', 'confirmer'),
(9, 9, '2023-05-12', '20:36:00', 'en attente'),
(10, 9, '2023-05-07', '08:33:00', 'en attente');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caisse1`
--
ALTER TABLE `caisse1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID_Pesonne`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`id_RV`),
  ADD KEY `Id_client` (`Id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caisse1`
--
ALTER TABLE `caisse1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID_Pesonne` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `id_RV` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `personne` (`ID_Pesonne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
