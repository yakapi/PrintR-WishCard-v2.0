-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 23 fév. 2021 à 11:02
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `printr`
--

-- --------------------------------------------------------

--
-- Structure de la table `carrousel`
--

CREATE TABLE `carrousel` (
  `id` int(6) UNSIGNED NOT NULL,
  `name_carrousel` varchar(30) NOT NULL,
  `hauteur_carrousel` varchar(30) NOT NULL,
  `valeur_hauteur` varchar(50) DEFAULT NULL,
  `largeur_carrouseul` varchar(30) NOT NULL,
  `valeur_largeur` varchar(50) DEFAULT NULL,
  `nb_image` varchar(50) DEFAULT NULL,
  `name_image` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carrousel`
--

INSERT INTO `carrousel` (`id`, `name_carrousel`, `hauteur_carrousel`, `valeur_hauteur`, `largeur_carrouseul`, `valeur_largeur`, `nb_image`, `name_image`, `reg_date`) VALUES
(11, 'demo', '100', 'percent', '100', 'percent', '3', 'decibulles.jpg;capvotekick.png;sziget.jpg;', '2020-09-16 12:34:45');

-- --------------------------------------------------------

--
-- Structure de la table `javascript`
--

CREATE TABLE `javascript` (
  `id` int(11) NOT NULL,
  `nom_js` varchar(255) NOT NULL,
  `where_js` varchar(255) NOT NULL,
  `path_js` varchar(255) NOT NULL,
  `nom_module` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `javascript`
--

INSERT INTO `javascript` (`id`, `nom_js`, `where_js`, `path_js`, `nom_module`) VALUES
(4, 'carrousel_print', 'front', 'cgi-print/templates/modules/Carrousel/js/carrousel_print.js', 'Carrousel');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` text NOT NULL,
  `menu_name_value` text NOT NULL,
  `menu_link_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_name_value`, `menu_link_value`) VALUES
(1, 'documentation', 'Installation,Functions,Module,Service,', ',,,,');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name` text NOT NULL,
  `module_route` text NOT NULL,
  `module_route_view` text NOT NULL,
  `module_describe` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `module_name`, `module_route`, `module_route_view`, `module_describe`) VALUES
(20, 'Carrousel', 'templates/modules/Carrousel/settings_Carrousel.php', 'templates/modules/Carrousel/functions_Carrousel.php', 'Gestion des carrousels'),
(22, 'ClientForm', 'templates/modules/ClientForm/settings_ClientForm.php', 'templates/modules/ClientForm/functions_ClientForm.php', 'Formulaire d\'envoie des carte de voeux'),
(23, 'CarteVoeux', 'templates/modules/CarteVoeux/settings_CarteVoeux.php', 'templates/modules/CarteVoeux/functions_CarteVoeux.php', 'Gestion des cartes de voeux');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_name` text NOT NULL,
  `page_route_temp` text NOT NULL,
  `page_link` text NOT NULL,
  `page_script` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`page_id`, `page_name`, `page_route_temp`, `page_link`, `page_script`) VALUES
(48, 'home', 'templates/template_home.php', 'NULL', 'NULL'),
(49, 'carte', 'templates/template_carte.php', 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_route` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `service_name`, `service_route`) VALUES
(1, 'page', 'templates/services/setting_page.php'),
(2, 'menu', 'templates/services/setting_menu.php');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `mail` text NOT NULL,
  `role` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `mail`, `role`) VALUES
(3, 'yakapi', '2198d7e5999e0efba5c5f7c5216b4aba', 'realitygameserver@gmail.com', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `WishCard`
--

CREATE TABLE `WishCard` (
  `id` int(6) UNSIGNED NOT NULL,
  `name_card` varchar(30) NOT NULL,
  `name_fichier` varchar(255) NOT NULL,
  `image_card` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `WishCard`
--

INSERT INTO `WishCard` (`id`, `name_card`, `name_fichier`, `image_card`, `reg_date`) VALUES
(1, 'NewYear', 'newyear.php', 'profil.jpg', '2021-02-21 18:06:21'),
(2, 'hector', 'xmass.php', 'background-cv.jpg', '2021-02-21 18:08:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carrousel`
--
ALTER TABLE `carrousel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `javascript`
--
ALTER TABLE `javascript`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `WishCard`
--
ALTER TABLE `WishCard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carrousel`
--
ALTER TABLE `carrousel`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `javascript`
--
ALTER TABLE `javascript`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `WishCard`
--
ALTER TABLE `WishCard`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
