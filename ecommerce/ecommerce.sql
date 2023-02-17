-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 05 mars 2022 à 12:57
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom_cat` varchar(100) NOT NULL,
  `img_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_cat`, `img_cat`) VALUES
(1, 'Sport', 'img/sport.jpg'),
(2, 'Class', 'img/boutique-homme.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom_clt` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom_clt`, `username`, `password`, `adresse`) VALUES
(1, 'ARAJDAL', 'ALI', '123', 'MASSIRA 3');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL,
  `id_prod` int(11) NOT NULL,
  `principal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `file`, `id_prod`, `principal`) VALUES
(1, 'anorak-de-golf-repel-pour-78bPFg.png', 1, 1),
(2, 'anorak-de-golf-repel-pour-78bPFg (2).png', 1, 0),
(3, 'anorak-de-golf-repel-pour-78bPFg (1).png', 1, 0),
(4, 'veste-de-football-academy-allemagne-pour-cbrKLx.png', 5, 1),
(5, 'veste-de-football-academy-allemagne-pour-cbrKLx (2).png', 5, 0),
(6, 'veste-de-football-academy-allemagne-pour-cbrKLx (1).png', 5, 0),
(7, 'baskets Ultraboost 20.jpeg', 2, 1),
(8, 'PH48_80d11b65-f11e-4563-80fa-3d9ff5b44a28_1024x1024.jpg', 3, 1),
(9, 'ph4_cf6a95d4-eeda-46a5-b1ab-e8b51c3c8df1_1024x1024.jpg', 4, 1),
(10, '37e65214d701f4187e9c7f691dca87ce_2411a676-157b-4e5e-b9f5-eac97c39542c_1024x1024.jpg', 6, 1),
(11, 'ph1_549da823-b728-4b1e-8b68-22072414d387_1024x1024.jpg', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `date_pan` date NOT NULL,
  `id_clt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `date_pan`, `id_clt`) VALUES
(1, '2021-06-18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier_produit`
--

CREATE TABLE `panier_produit` (
  `id_prod` int(11) NOT NULL,
  `id_pan` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier_produit`
--

INSERT INTO `panier_produit` (`id_prod`, `id_pan`, `quantite`) VALUES
(1, 1, 4),
(2, 1, 1),
(7, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom_prod` varchar(100) NOT NULL,
  `libelle` varchar(100) NOT NULL DEFAULT '',
  `prix` decimal(18,2) NOT NULL,
  `promo` int(11) NOT NULL DEFAULT 0,
  `id_cat` int(11) NOT NULL,
  `descri` text NOT NULL DEFAULT 'This is a description of the product'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom_prod`, `libelle`, `prix`, `promo`, `id_cat`, `descri`) VALUES
(1, 'Anorak de golf', 'Nike Repel', '99.90', 0, 1, 'This is a description of the product'),
(2, 'baskets Ultraboost 20', 'Adidas', '100.00', 30, 1, 'This is a description of the product'),
(3, 'Polo t-shirt', 'Polo uni blanc tendance à col revers noir et boutonnée', '39.99', 30, 2, 'This is a description of the product'),
(4, 'Jean bleu uni délavé stretch', '45', '45.90', 50, 2, 'This is a description of the product'),
(5, 'Veste noir de football', 'Nike Academy Allemagne', '69.99', 20, 1, 'This is a description of the product'),
(6, 'Chemise noir', 'habillée slim à revers blanc', '30.90', 0, 2, 'This is a description of the product'),
(7, 'Chaussures boots', '', '45.60', 20, 2, 'Chaussures boots simili cuir noir avec grosse semelle noire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod_img` (`id_prod`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pan_clt` (`id_clt`);

--
-- Index pour la table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD PRIMARY KEY (`id_prod`,`id_pan`),
  ADD KEY `fk_panprod_pan` (`id_pan`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prod_cat` (`id_cat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_prod_img` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_pan_clt` FOREIGN KEY (`id_clt`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD CONSTRAINT `fk_panprod_pan` FOREIGN KEY (`id_pan`) REFERENCES `panier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_panprod_prod` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_prod_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
