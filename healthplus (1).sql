-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 août 2022 à 11:04
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
(3, 'tatyana', 'delgado', '2016-05-08', 'Femme', 'cardiologie', 'dolor eveniet velit', 74, '1192006', '1634316', 'zomyqipave@mailinator.com', 'doctor1', '2c6891582192f8cbdcc19ff060ae9adebb288ccd9865a7d3af45340c82790fa9', 'docteurf.png', 'healthplus22'),
(4, 'calista', 'mccoy', '2002-05-01', 'Homme', 'cardiologie', 'ratione sed veritati', 89, '+1984913-5603', '+1592877-9221', 'mefufoc@mailinator.com', 'irure earum harum pr', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22'),
(5, 'kiona', 'foreman', '1998-01-06', 'Femme', 'cardiologie', 'perspiciatis dolore', 45, '+1407266-8882', '+1311559-1339', 'vepak@mailinator.com', 'dolor voluptatum eos', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteurf.png', 'healthplus22'),
(6, 'kathleen', 'welch', '1983-09-27', 'Homme', 'cardiologie', 'sit aliqua ab quas ', 67, '+1896835-5392', '+1773697-5275', 'pemygu@mailinator.com', 'earum sed sed commod', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22'),
(7, 'martha', 'mccarty', '2011-07-25', 'Femme', 'cardiologie', 'deleniti maxime exer', 85, '+1472881-5671', '+1596684-3971', 'josuh@mailinator.com', 'et illo sed veniam ', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteurf.png', 'healthplus22'),
(8, 'brent', 'ayala', '2004-05-21', 'Homme', 'dentiste', 'rem ut veniam quide', 12, '+1111333-4309', '+1862384-6143', 'balow@mailinator.com', 'quod eu nihil amet ', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'docteur.png', 'healthplus22');

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
(7, 'dentiste', 'affaire de dents');

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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth`, `contact`, `emergency_contact`, `email`, `sexe`, `weight`, `height`, `blood`, `allergy`, `medical_background`, `children`, `marital_status`, `profession`, `pseudo`, `password`, `picture`) VALUES
(7, 'kirsten', 'lowery', '1979-12-11', '+1921178-1149', '+1732289-1204', 'gosaxunis@mailinator.com', 'Homme', 74, 85, 'B', 'incidunt deserunt d', 'perferendis quis quo', 58, 'Divorcée', 'dolore corporis dict', 'patient1', '2ab404235058541fe43e965e050608622c27548dae5ea840efea2b42d69fb62d', 'patient.png'),
(8, 'hanae', 'cooper', '1971-02-03', '+1481419-6819', '+1967256-4916', 'cyxig@mailinator.com', 'Femme', 72, 62, 'AB', 'qui ad rerum et impe', 'commodo reprehenderi', 44, 'Divorcée', 'ipsa eveniet corpo', 'fabien', 'd7c04d4096cad217337ccc0c0ab28d42b3704e77671cd647490acb35290abe7c', 'patientf.png'),
(9, 'anthony', 'gallegos', '2015-09-07', '+1827141-6125', '+1142219-7678', 'nadug@mailinator.com', 'Homme', 3, 90, 'O', 'ratione irure invent, ratione irure invent, ratione irure invent', 'do quis est mollitia, ratione irure invent, ratione irure invent', 45, 'Mariée', 'velit voluptates sit', 'patient2', '68cb602dbb582aa248de1640e4a94b54dfaf456cf8d77d9ca03f445235114c6e', 'patient.png'),
(10, 'kimberly', 'hodge', '1983-11-01', '+1821413-3303', '+1115836-2118', 'madoz@mailinator.com', 'Femme', 97, 69, 'AB', 'rem atque sit volupt', 'et delectus esse re', 37, 'Mariée', 'ad maxime impedit n', 'esse ullamco lorem ', 'ce1e37f9a09628751128b846f659ddd3d2cba85848e5bd1d472e4151eb92cc27', 'patientf.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
