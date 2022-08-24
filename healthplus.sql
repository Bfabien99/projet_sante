-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 août 2022 à 10:32
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `healthplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '89a349c05bc7f50878ed868156957d49591983d900ed6ee64523097459c0325b' COMMENT 'admin par défaut',
  `pseudo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `pseudo`) VALUES
(1, 'Brou', 'Fabien', 'zanpolobino99@gmail.com', '89a349c05bc7f50878ed868156957d49591983d900ed6ee64523097459c0325b', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `sexe` enum('Homme','Femme') NOT NULL,
  `fonction` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `experience` int(11) NOT NULL,
  `contact1` varchar(255) NOT NULL,
  `contact2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT '6d912e7c19ddbed26ddc00bb38dd72bc3a0fc71740f8efc86845890193cb435d' COMMENT 'good_doctor par défaut',
  `picture` text DEFAULT NULL,
  `code` varchar(100) DEFAULT 'healthplus22' COMMENT 'code d''accès'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `birth`, `sexe`, `fonction`, `description`, `experience`, `contact1`, `contact2`, `email`, `pseudo`, `password`, `picture`, `code`) VALUES
(1, 'wings', 'grimes', '2018-08-31', 'Homme', 'ophtamologie', 'repudiandae non est ', 5, '1439706', '1441731', 'caqykil@mailinator.com', 'doctor1', '2c6891582192f8cbdcc19ff060ae9adebb288ccd9865a7d3af45340c82790fa9', 'docteur.png', 'healthplus22');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `rdv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `objet` text NOT NULL,
  `date_rdv` date NOT NULL,
  `time_rdv` time NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'wait',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `titre`, `details`) VALUES
(6, 'cardiologie', 'service du coeur'),
(7, 'dentiste', 'affaire de dents'),
(8, 'ophtamologie', 'section des yeux');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `contact` varchar(30) NOT NULL,
  `emergency_contact` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sexe` enum('Homme','Femme','Autre') NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `blood` enum('A','B','AB','O') NOT NULL,
  `allergy` text NOT NULL,
  `medical_background` text NOT NULL,
  `children` int(11) NOT NULL,
  `marital_status` enum('Célibataire','Mariée','Veuve','Divorcée') NOT NULL,
  `profession` varchar(255) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`rdv_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titre` (`titre`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `rdv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
