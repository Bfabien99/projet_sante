-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 31 août 2022 à 15:10
-- Version du serveur :  10.5.16-MariaDB
-- Version de PHP : 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id19479868_healthplus`
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
(4, 'joshua', 'renner', '2022-09-02', 'Homme', 'radiologie', 'et dolorem aliquid ratione rem minus odio magnam. velit eos in aut et eos. amet illum itaque officia non.', 5, '-3241', '-1094', 'your.email+fakedata68026@gmail.com', 'doctor1', '2c6891582192f8cbdcc19ff060ae9adebb288ccd9865a7d3af45340c82790fa9', 'fa20489952b508d55f75b01e53e29fda_bruno-rodrigues-279xIHymPYY-unsplash.jpg', 'healthplus22', '2022-08-29 15:10:04'),
(5, 'gunnar', 'hilpert', '2023-02-13', 'Femme', 'dermatologie', 'molestias pariatur necessitatibus voluptatem possimus veritatis quae. tempora numquam omnis consequuntur dicta qui debitis ut aut. labore sapiente odit.', 6, '-3786', '-5129', 'your.email+fakedata74776@gmail.com', 'doctor2', 'b6afefd57111ed10d9b9752fbc6b32685622473f827c5e14b5121d0761b7dad2', 'a69d0637f7443b3e6db36feef985f1f9_abbat-uzkNxbPrN9E-unsplash.jpg', 'healthplus22', '2022-08-29 15:16:18'),
(6, 'lucinda', 'hoppe', '2023-07-27', 'Femme', 'dermatologie', 'itaque optio qui laboriosam voluptates accusantium dolorem et accusantium. expedita earum vel laboriosam. sit dolore provident dolorem veniam aut tempore.', 219, '-2976', '-3358', 'your.email+fakedata51984@gmail.com', 'doctor3', '00e7892f7816a5b2aa47fd9f356476a2cbefaf7d8c845e855f34d7164ec1c7eb', '0e7732d2ddb6eff73cadcfcd8addff4f_humberto-chavez-FVh_yqLR9eA-unsplash.jpg', 'healthplus22', '2022-08-29 15:18:32'),
(7, 'kaden', 'walter', '2022-08-21', 'Homme', 'infectiologie', 'molestias quam inventore est. excepturi sit soluta sequi deserunt. consequatur libero reiciendis sequi.', 5, '-6446', '-2129', 'your.email+fakedata90183@gmail.com', 'doctor4', 'f7d45793bc847aac92e52b7ba3532b1e834c73a26fe412090b959c2bfec97f51', 'db3dbba5e8937843c2a2473fba855713_austin-distel-7bMdiIqz_J4-unsplash.jpg', 'healthplus22', '2022-08-29 15:20:27'),
(8, 'santina', 'lind', '2022-07-22', 'Femme', 'hématologie', 'rerum minima minima molestiae nam reiciendis omnis vel. sed natus expedita nam earum dignissimos similique velit architecto rerum. necessitatibus quos qui totam aut.', 8, '-4032', '-7817', 'your.email+fakedata16699@gmail.com', 'doctor5', '810bebb61f7b70712d2c692448065a54db39cbd0a09df3374d95563b4b889316', '1335bc101d6312f5335b90ddb4357b48_jeremy-alford-O13B7suRG4A-unsplash.jpg', 'healthplus22', '2022-08-29 15:21:00'),
(9, 'jovan', 'karim', '2022-06-26', 'Homme', 'pédiatrie', 'quaerat quis accusantium itaque quae sed quis molestias qui dolor. dolores incidunt eum iusto. aut error ratione animi aperiam quia repellat.', 3, '-1650', '-5257', 'your.email+fakedata79244@gmail.com', 'doctor6', '3f14aa044011beccd006bdb61d582d21eab52dd9400316ccfd5f3ff548ae1de8', '83a7b3ba78d73946ba19d3292d2feb6f_usman-yousaf-pTrhfmj2jDA-unsplash.jpg', 'healthplus22', '2022-08-29 15:21:27');

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
(2, 2, '2022-08-24 11:41:27'),
(3, 4, '2022-08-29 15:12:54'),
(4, 5, '2022-08-29 15:16:46'),
(5, 6, '2022-08-29 15:18:58'),
(6, 7, '2022-08-29 15:21:57'),
(7, 8, '2022-08-29 15:22:44'),
(8, 9, '2022-08-29 15:23:17'),
(9, 5, '2022-08-29 15:27:01'),
(10, 4, '2022-08-31 12:02:07'),
(11, 5, '2022-08-31 12:10:12'),
(12, 6, '2022-08-31 12:11:56'),
(13, 7, '2022-08-31 12:13:22'),
(14, 8, '2022-08-31 12:14:55'),
(15, 9, '2022-08-31 12:15:56');

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
(8, 2, 2, 'error mollitia dolorem et.', '2022-09-20 01:46:00', 'confirm', '2022-08-24 13:50:45'),
(10, 1, 3, 'consultation', '2022-08-27 17:55:00', 'wait', '2022-08-27 17:50:27'),
(12, 3, 9, 'consultation', '2022-08-31 15:27:00', 'wait', '2022-08-31 13:27:26');

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
(6, 'cardiologie', 'la cardiologie s’intéresse à l’appareil cardiovasculaire, c’est-à-dire au cœur et aux vaisseaux (artères et veines), à la prévention ainsi qu’au traitement des anomalies et des maladies qui l’affectent : hypertension artérielle, insuffisance cardiaque, troubles du rythme cardiaque, angine de poitrine, athérosclérose … le cardiologue peut être amené à intervenir en urgence notamment en cas d’infarctus du myocarde.'),
(7, 'dentiste', 'affaire de dents'),
(8, 'ophtamologie', 'section des yeux'),
(9, 'dermatologie', 'aaaaaaaaaaaaa'),
(10, 'hématologie', 'aazdazzdzadzd'),
(11, 'radiologie', 'zdzdaadadazd'),
(12, 'pédiatrie', 'efeezfqefqefq'),
(13, 'dermatologie', 'dermatologiedermatologie'),
(14, 'infectiologie', 'infectiologieinfectiologie'),
(15, 'gériatrie', 'gériatriegériatrie'),
(16, 'neurologie', 'neurologieneurologie'),
(17, 'chirurgie', 'chirurgiechirurgie'),
(18, 'rhumatologie', 'rhumatologierhumatologie');

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
(3, 'sybile', 'hintza', '2022-08-26', '153148864', '0709167244', 'fabienbrou99@gmail.com', 'Homme', 48, 126, 'O', 'aucun', 'aucun', 0, 'Célibataire', 'Étudiant', 'fabien', 'd7c04d4096cad217337ccc0c0ab28d42b3704e77671cd647490acb35290abe7c', '98e8395edce4e8bbb879920413c64535_houcine-ncib-B4TjXnI0Y2c-unsplash.jpg', '2022-08-28 15:41:28');

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
(3, 2, '2022-08-24 11:56:33'),
(4, 1, '2022-08-27 13:00:15'),
(5, 1, '2022-08-27 17:48:12'),
(6, 3, '2022-08-28 15:42:06'),
(7, 3, '2022-08-28 23:37:42'),
(8, 4, '2022-08-29 14:53:41'),
(9, 3, '2022-08-31 10:31:46'),
(10, 3, '2022-08-31 12:04:15'),
(11, 3, '2022-08-31 13:21:08');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `doctor_login`
--
ALTER TABLE `doctor_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `rdv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
