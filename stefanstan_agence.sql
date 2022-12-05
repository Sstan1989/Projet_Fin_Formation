-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : lun. 05 déc. 2022 à 15:28
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stefanstan_agence`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `contenu` longtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`) VALUES
(1, 'Quels documents vous faut-il pour acheter ?', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(2, 'Comment se préparer à acheter un bien immobilier.', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(6, 'Banquier ou courtier ? Qui choisir ...', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(7, 'Avez-vous un notaire ?', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(9, 'Le rôle d\'un agent immobilier', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(11, 'Faut-il vendre avant d\'acheter ? Parlons du crédit relais ...', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(12, 'Primo accédant, quel type de bien est fait pour vous ?', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?'),
(13, 'Chasseur d\'appartements, en avez-vous vraiment l\'utilité ?', 'In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?In illum quod et distinctio nemo aut facilis quaerat sit reprehenderit tempora et modi? Aut repellendus aspernatur quo repellendus voluptatibus est voluptas molestiae et debitis eaque?');

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) CHARACTER SET latin1 NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Maison', 'Maison d\'une superficie de 250m2 située à 20 minutes de Nantes en transports. Elle est composée de 4 chambres dont une suite parentale, d\'une cuisine ouverte sur un grand séjour, d\'une salle de bain, d\'une salle d\'eau ainsi que d\'un sous-sol aménageable. Garage avec deux emplacements véhicules. Bel extérieur sans vis à vis, Pas de travaux à prévoir.', 200000, '62ab2cc744374-pexels-mark-mccammon-2724749.jpg', 1),
(2, 'Maison', 'Maison d\'une superficie de 100m2 située dans la campagne à 30 minutes de Nantes en voiture. Elle est composée de 2 chambres, d\'une cuisine, d\'un séjour exposé plein sud, d\'une salle de bain, d\'une salle d\'eau ainsi que d\'un grenier. Garage extérieur couvert. Bel extérieur. Quelques travaux à prévoir.', 170000, 'maison_campagne.jpg', 1),
(4, 'Maison', 'Maison d\'une superficie de 200m2 située à Rezé. Elle est composée de 4 chambres dont une suite parentale, d\'une cuisine ouverte sur un grand séjour, d\'une salle de bain, d\'une salle d\'eau ainsi que d\'un sous-sol aménageable. Garage avec deux emplacements véhicules. Bel extérieur sans vis à vis, Pas de travaux à prévoir.', 350000, '629f1c5cddd0a-appart1.jpg', 1),
(8, 'Maison', 'Maison d\'architecte d\'une superficie de 300m2 située près de la mer et du soleil quand il est là ! Elle est composée de 4 chambres dont une suite parentale, d\'une cuisine ouverte sur un grand séjour, de deux salles de bains  ainsi que d\'un sous-sol aménageable. Garage avec deux emplacements véhicules. Aucun vis à vis, Pas de travaux à prévoir.', 700000, '62ac971d169d0-appartDemo1.jpg', 1),
(9, 'Appartement', 'Appartement d\'une superficie 57 m2 constitué de 3pièces 2chambres  cuisine séparée et salle de bain avec WC indépendants. Il est situé face à la gare de Nantes, proche des transports et des commodités. Travaux à prévoir.', 251000, 'comingSoon.jpg', 2),
(10, 'Terrain', 'Terrain constructible d\'une superficie de 1200 hectares se trouve près de la Baule. Opportunité rare sur le secteur. A saisir !', 500000, '62a8ebfd1d75f-av.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(120) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Appartement'),
(1, 'Maison'),
(3, 'Terrain');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nom` varchar(40) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(40) CHARACTER SET latin1 NOT NULL,
  `login` varchar(40) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(250) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `date`, `nom`, `prenom`, `login`, `pass`, `email`) VALUES
(6, '2022-06-17 06:42:23', 'Dany', 'Daniel', 'daniel', '$2y$10$LhyzHizmex8xoYDIc.vYRerBO1/iIT/BI10a7hUkjJmxR0pzVxuSG', 'daniel@gmail.com'),
(7, '2022-06-17 06:47:13', 'Truc', 'Serge', 'Sergio', '$2y$10$KG/A7axuFnRWXxyMKbD1F.urHJakEBSDjfu5ulTDhbuhuNoZZ/VPO', 'serge@gmail.com'),
(8, '2022-06-17 06:47:58', 'Machin', 'Julie', 'Juju', '$2y$10$ukorualwetzV/OpVyYWsOOjm9oWpW5qgTodVivCmIVM.9zpgertOG', 'julie@gmail.com'),
(13, '2022-06-18 10:42:38', 'invite', 'invite', 'invite', '$2y$10$QaW7WvGyC0bihXSyO.u.j.D6R50yXTv3Snu11nxhXELkSBBSq63bq', 'invite@gmail.com'),
(14, '2022-06-18 10:43:28', 'Bidule', 'Andrea', 'Andy', '$2y$10$54hoQrOIY39nWtdy4rSlZON1a2o/CVUrDcEp2/SszJx1d1rpsu6Oe', 'andrea@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name` (`name`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `biens`
--
ALTER TABLE `biens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `biens_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
