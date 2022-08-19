-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 août 2022 à 20:27
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
  `fonction` varchar(100) DEFAULT NULL,
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
(1, 'Jhon', 'Doe', '1988-08-09', 'Homme', '0', 'Expert en coeur.\r\nSur 100 patients traité, 100 sauvés.', 3, '0102030405', '0203040505', 'doctor1@gmail.com', 'doctor1', '6d912e7c19ddbed26ddc00bb38dd72bc3a0fc71740f8efc86845890193cb435d', NULL, 'healthplus22'),
(4, 'rahima', 'gardia', '1995-09-02', 'Femme', 'ophtamologie', 'quia illo illo provi', 33, '+1514886-7955', '+1831796-5205', 'wavyt@mailinator.com', 'doctor2', '6d912e7c19ddbed26ddc00bb38dd72bc3a0fc71740f8efc86845890193cb435d', '', 'healthplus22'),
(5, 'laurel', 'sanders', '1995-07-20', 'Homme', 'pédiatrie', 'laborum esse animi', 11, '+1882271-5857', '+1675288-6697', 'sirov@mailinator.com', 'doctor3', '6d912e7c19ddbed26ddc00bb38dd72bc3a0fc71740f8efc86845890193cb435d', '', 'healthplus22'),
(6, 'melyssa', 'colon', '1971-10-31', 'Femme', 'généraliste', 'quia nesciunt elige', 43, '+1175532-7056', '+1436687-5588', 'xicunyq@mailinator.com', 'illum voluptatum do', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22'),
(7, 'wyoming', 'holloway', '2001-02-08', 'Femme', 'ophtamologie', 'voluptas labore magn', 10, '+1577827-7533', '+1671392-3268', 'wugoqedymy@mailinator.com', 'cumque vitae fugiat ', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22'),
(8, 'bruno', 'goodwin', '1996-08-17', 'Femme', 'chirurgie', 'aut quas quia repell', 4, '+1556814-2793', '+1623745-2214', 'gefohy@mailinator.com', 'ea mollitia inventor', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22'),
(9, 'joelle', 'day', '2005-04-07', 'Homme', 'ophtamologie', 'dolorum ut provident', 47, '+1503744-2017', '+1328877-8636', 'ceryhad@mailinator.com', 'libero quo praesenti', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22'),
(10, 'porter', 'powers', '2011-09-26', 'Femme', 'chirurgie', 'quia error voluptate', 3, '+1193674-1564', '+1418717-2126', 'wapu@mailinator.com', 'odit veniam dolorib', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteurf.png', 'healthplus22');

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
(1, 'Cardiologie', 'S\'occupe des soucis en relations avec le coeur'),
(2, 'Pédiatrie', 'S\'occupe des soucis en relations avec les enfants'),
(3, 'Ophtamologie', 'S\'occupe des soucis en relations avec les yeux'),
(4, 'Chirurgie', 'S\'occupe de tout ce qui concerne les opérations'),
(5, 'Généraliste', 'S\'occupe de tout');

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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth`, `contact`, `emergency_contact`, `email`, `sexe`, `weight`, `height`, `blood`, `allergy`, `medical_background`, `children`, `marital_status`, `profession`, `pseudo`, `password`) VALUES
(2, 'Stacy', 'Hull', '1992-02-28', '+1285699-1710', '+1 (614) 941-7774', 'hygakabipy@mailinator.com', 'Femme', 73, 54, 'AB', 'Ipsam est dolore sed', 'Aut ut culpa elit ', 12, 'Mariée', 'Est ut aut sint ea u', 'Incidunt nihil recu', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27'),
(3, 'brou', 'fabien', '1999-05-18', '0153148864', '0709167244', 'gordon@gmail.com', 'Homme', 48, 125, 'O', 'aucun', 'aucun', 1, 'Célibataire', 'etudiant', 'gordon', 'd7c04d4096cad217337ccc0c0ab28d42b3704e77671cd647490acb35290abe7c'),
(4, 'sharon', 'jones', '1977-11-25', '+1619599-9853', '+1147158-5241', 'vutewasy@mailinator.com', 'Femme', 81, 79, 'B', 'optio sunt assumend', 'sed in impedit volu', 89, 'Veuve', 'veniam dolor verita', 'fabie', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27'),
(5, 'macon', 'wiggins', '1972-12-19', '+1416157-4369', '+1676673-2731', 'fajoky@mailinator.com', 'Homme', 16, 68, 'B', 'rerum id aut suscip', 'enim magnam laboris ', 71, 'Mariée', 'dolores ut illum et', 'darwins', '44cd8e992947f7c312dc4ce694603a3a0fee41819d52e861c3ea052235416a2c');

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
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
