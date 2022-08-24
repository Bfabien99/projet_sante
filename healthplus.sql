-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 24 août 2022 à 16:12
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.28

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
-- Structure de la table `carnets`
--

CREATE TABLE `carnets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `analyse` text DEFAULT NULL,
  `resultat` text DEFAULT NULL,
  `avis` text NOT NULL,
  `ordonnance` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `code` varchar(100) DEFAULT 'healthplus22' COMMENT 'code d''accès',
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `birth`, `sexe`, `fonction`, `description`, `experience`, `contact1`, `contact2`, `email`, `pseudo`, `password`, `picture`, `code`, `created`) VALUES
(2, 'henriette', 'moen', '2023-05-19', 'Femme', 'ophtamologie', 'nemo aut quia iusto. alias vero ut necessitatibus adipisci cumque et alias. et sit saepe.', 4, '232-270-6311', '868-620-6485', 'your.email+fakedata78032@gmail.com', 'doctor1', '2c6891582192f8cbdcc19ff060ae9adebb288ccd9865a7d3af45340c82790fa9', 'docteurf.png', 'healthplus22', '2022-08-24 09:29:53'),
(3, 'electa', 'grady', '2022-09-02', 'Femme', 'cardiologie', 'odit velit nulla quae molestiae eum earum. at rem nisi similique eius consequatur doloremque nihil. ab soluta vel laborum aliquam repudiandae.', 300, '185-662-5670', '861-907-7643', 'your.email+fakedata75365@gmail.com', 'doctor2', 'b6afefd57111ed10d9b9752fbc6b32685622473f827c5e14b5121d0761b7dad2', 'docteurf.png', 'healthplus22', '2022-08-24 13:47:54');

-- --------------------------------------------------------

--
-- Structure de la table `doctor_login`
--

CREATE TABLE `doctor_login` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctor_login`
--

INSERT INTO `doctor_login` (`id`, `doctor_id`, `date`) VALUES
(1, 2, '2022-08-24 11:32:42'),
(2, 2, '2022-08-24 11:41:27');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `rdv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `objet` text NOT NULL,
  `date_rdv` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'wait',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`rdv_id`, `user_id`, `doctor_id`, `objet`, `date_rdv`, `status`, `date`) VALUES
(6, 2, 3, 'sit eaque et omnis ut qui fugit.', '2022-11-07 04:17:00', 'wait', '2022-08-24 13:48:21'),
(7, 2, 2, 'voluptatem quis quam eos voluptate.', '2022-12-20 00:40:00', 'undo', '2022-08-24 13:48:47'),
(8, 2, 2, 'error mollitia dolorem et.', '2022-09-20 01:46:00', 'confirm', '2022-08-24 13:50:45');

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
  `picture` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth`, `contact`, `emergency_contact`, `email`, `sexe`, `weight`, `height`, `blood`, `allergy`, `medical_background`, `children`, `marital_status`, `profession`, `pseudo`, `password`, `picture`, `created`) VALUES
(1, 'sarah', 'erdman', '2023-08-08', '-1682', '578-935-8787', 'your.emaildata85869@gmail.com', 'Femme', 293, 191, 'B', 'fugiat eum, enim consectetur, ipsam ratione, autem', 'iusto, minus, incidunt ea, quaerat aut', 0, 'Célibataire', 'ut perferendis nihil placeat rerum ipsa alias sint quidem. eius fuga sit illo iusto. quos unde reprehenderit harum et itaque temporibus dicta omnis.', 'patient1', 'c313700a0df0d2588fa963ba1181b55c7bfd982bb9d8903aced00e918faedf9e', 'patientf.png', '2022-08-24 09:29:10'),
(2, 'cedrick', 'ullrich', '2022-05-02', '581-282-0236', '152-131-8735', 'your.email+fakedata21128@gmail.com', 'Homme', 129, 361, 'O', 'accusantium neque delectus cumque.', 'nisi culpa labore sed expedita molestias asperiores quo.', 0, 'Divorcée', 'qui harum a voluptatem. a totam qui. aut velit repudiandae eum consequatur.', 'patient2', '68cb602dbb582aa248de1640e4a94b54dfaf456cf8d77d9ca03f445235114c6e', 'patient.png', '2022-08-24 11:56:07');

-- --------------------------------------------------------

--
-- Structure de la table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `date`) VALUES
(1, 1, '2022-08-24 11:07:31'),
(2, 1, '2022-08-24 11:15:23'),
(3, 2, '2022-08-24 11:56:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `carnets`
--
ALTER TABLE `carnets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `carnets`
--
ALTER TABLE `carnets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `doctor_login`
--
ALTER TABLE `doctor_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `rdv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
