-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 17 déc. 2018 à 11:33
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projetBoissons`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(6) NOT NULL,
  `login` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `motDePasse` int(6) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `adresse` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `nom`, `prenom`, `motDePasse`, `sexe`, `Email`, `telephone`, `dateDeNaissance`, `adresse`) VALUES
(4, 'benabbou2u', 'BENABBOU', 'Abdelwahed', 123456, 'h', 'benabbou.abdelwahed@gmail.com', 782817887, '1992-12-06', '26 rue de saurupt, NANCY'),
(5, 'manseur5u', 'manseur', 'aghiles', 123456, 'h', 'manseur.aghiles@gmail.com', 726361662, '1993-05-09', '34 boss, Charlemagne ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
