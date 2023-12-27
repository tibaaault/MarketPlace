-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 27 déc. 2023 à 18:39
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marketPlace`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date_send` date NOT NULL,
  `message_from` int(11) NOT NULL,
  `message_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(50) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `type`, `img_url`, `description`, `id_seller`) VALUES
(1, 'Xiaomi TV LED 4K 108 cm Mi P1E 43 Pouces', 289, 'Digital', 'Xiaomi', 'Taille de l\'écran : 43 Pouces\r\nMarque : Xiaomi\r\nServices Internet pris en charge :	Netflix, Amazon Instant Video, YouTube\r\nTechnologie d\'affichage	: LED\r\nDimensions du produit : 8,5P x 38,1l x 24, 1H centimètres\r\nRésolution : 4K\r\nFréquence de rafraîchissement : 60 Hz\r\nCaractéristique spéciale : contrôle parental, teletext, channel edit, hbbtv, sous-titres\r\nNom de modèle : Xiaomi UHD Android TV P1E 43\"\r\nTechnologie de connectivité', 1),
(2, 'Samsung Galaxy Tab A9+', 239, 'Digital', 'samsung-galaxy-tab-a9+', 'Marque	SAMSUNG\r\nNom de modèle	Galaxy Tab A9+\r\nTaille de l\'écran 11 Pouces\r\nRésolution d\'affichage maximale	1920 x 1200 Pixels\r\nSystème d\'exploitation Android 13, Samsung One UI 5.1.1\r\nCouleur	Argent\r\nTaille de la mémoire RAM installée 4 Go\r\nAnnée du modèle	2023\r\nPoids de l\'article 480 Grammes', 1),
(5, 'Google Pixel 6 Pro', 899.99, 'Digital', 'google-pixel-6-pro', 'Marque	GOOGLE\r\nModèle Pixel 6 Pro\r\nTaille de l\'écran 6.7 Pouces\r\nRésolution d\'affichage maximale 1440 x 3120 Pixels\r\nSystème d\'exploitation Android 12\r\nCouleur	Noir\r\nMémoire RAM installée 8 Go\r\nAnnée du modèle	2023\r\nPoids de l\'article 210 Grammes', 1),
(6, 'Dell XPS 13', 1299, 'Digital', 'dell-xps-13', 'Marque	DELL\r\nModèle XPS 13\r\nTaille de l\'écran 13.4 Pouces\r\nRésolution d\'affichage maximale 3840 x 2400 Pixels\r\nProcesseur Intel Core i7\r\nMémoire RAM installée 16 Go\r\nStockage SSD 512 Go\r\nAnnée du modèle	2023\r\nPoids de l\'article 1.2 Kilogrammes', 1),
(7, 'Sony Alpha a7 IV', 1999.99, 'Digital', 'sony-alpha-a7-iv', 'Marque	SONY\r\nModèle Alpha a7 IV\r\nType de capteur CMOS\r\nRésolution du capteur 33 Megapixels\r\nEnregistrement vidéo 4K UHD\r\nStabilisation d\'image intégrée\r\nAnnée du modèle	2023\r\nPoids de l\'article 657 Grammes', 1),
(8, 'Apple AirPods Pro', 249.99, 'Digital', 'apple-airpods-pro', 'Marque	APPLE\r\nModèle AirPods Pro\r\nType d\'écouteurs Intra-auriculaire\r\nAutonomie de la batterie jusqu\'à 4.5 heures\r\nRéduction du bruit active\r\nÉtanche IPX4\r\nAnnée du modèle	2023', 1),
(9, 'ASUS ROG Swift PG279Q', 699, 'Digital', 'asus-rog-swift-pg279q', 'Marque	ASUS\r\nModèle ROG Swift PG279Q\r\nTaille de l\'écran 27 Pouces\r\nRésolution d\'affichage maximale 2560 x 1440 Pixels\r\nTaux de rafraîchissement 165 Hz\r\nTechnologie G-Sync\r\nAnnée du modèle	2023\r\nPoids de l\'article 7 Kilogrammes', 1),
(10, 'Nintendo Switch OLED', 349.99, 'Digital', 'nintendo-switch-oled', 'Marque	NINTENDO\r\nModèle Switch OLED\r\nÉcran OLED 7 Pouces\r\nStockage interne 64 Go\r\nMode téléviseur, portable et sur table\r\nJoy-Cons amovibles\r\nAnnée du modèle	2023\r\nPoids de l\'article 320 Grammes', 1),
(11, 'Creality Ender 3 V2', 299, 'Digital', 'creality-ender-3-v2', 'Marque	CREALITY\r\nModèle Ender 3 V2\r\nVolume d\'impression 220 x 220 x 250 mm\r\nÉcran tactile LCD\r\nPlateau chauffant\r\nAssemblage facile\r\nAnnée du modèle	2023\r\nPoids de l\'article 7 Kilogrammes', 1),
(12, 'Netgear Orbi RBK753', 449.99, 'Digital', 'netgear-orbi-rbk753', 'Marque	NETGEAR\r\nModèle Orbi RBK753\r\nCouverture Wi-Fi jusqu\'à 600 m²\r\nTechnologie Tri-Band\r\nConnexion jusqu\'à 40 appareils\r\nContrôle parental\r\nAnnée du modèle	2023\r\nPoids de l\'article 1.2 Kilogrammes', 1),
(13, 'Kindle Paperwhite', 129.99, 'Digital', 'kindle-paperwhite', 'Marque	AMAZON\r\nModèle Paperwhite\r\nÉcran tactile 6 Pouces\r\nRésistant à l\'eau IPX8\r\nÉclairage intégré\r\nAutonomie de la batterie jusqu\'à 10 semaines\r\nAnnée du modèle	2023\r\nPoids de l\'article 182 Grammes', 1);

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

CREATE TABLE `purchase` (
  `id_purchase` int(11) NOT NULL,
  `date_purchase` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for undelivered and 1 for delivery',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text,
  `date_review` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'False(0) for Customers and True(1) for Seller'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `firstname`, `role`) VALUES
(1, 'troelstrate2@myges.fr', 'tibo', 'Thibault', 'Roelstrate', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `message_from` (`message_from`),
  ADD KEY `message_to` (`message_to`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_seller` (`id_seller`);

--
-- Index pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_purchase` (`id_purchase`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`message_from`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`message_to`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_seller`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`id_purchase`) REFERENCES `purchase` (`id_purchase`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
