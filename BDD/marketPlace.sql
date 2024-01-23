
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
  `message_to` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `message`, `date_send`, `message_from`, `message_to`, `id_product`) VALUES
(1, 'Bonjour, l\'article est-il toujours disponible ?', '2024-01-22', 2, 1, 8),
(2, 'Bonjour, oui il l\'est toujours ! ', '2024-01-22', 1, 2, 8),
(3, 'La qualité est elle bonne ?', '2024-01-22', 2, 1, 8),
(4, 'Bien sur, la qualité est irréprochable ', '2024-01-22', 1, 2, 8),
(5, 'Pouvez-vous m\'indiquer les dimensions du produit ?', '2024-01-22', 2, 1, 8),
(6, 'Les dimensions du produit sont 20 cm x 15 cm x 10 cm.', '2024-01-22', 1, 2, 8),
(7, 'Est-ce que la livraison est gratuite ?', '2024-01-22', 2, 1, 8),
(8, 'Oui, la livraison est gratuite pour ce produit.', '2024-01-22', 1, 2, 8),
(9, 'Pouvez-vous me donner plus d\'informations sur la garantie ?', '2024-01-22', 2, 1, 8),
(10, 'Pouvez vous me répondre pour l\\\'article svp ?', '2024-01-22', 2, 1, 8),
(15, 'Bonjour, quels sont les délais de livraison ?', '2024-01-22', 2, 3, 22);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(50) NOT NULL,
  `img_url` text NOT NULL,
  `description` text NOT NULL,
  `id_seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `type`, `img_url`, `description`, `id_seller`) VALUES
(1, 'Xiaomi TV LED 4K 108 cm', 289, 'Digital', 'Xiaomi.png', 'Taille de l\'écran : 43 Pouces\r\nMarque : Xiaomi\r\nServices Internet pris en charge :	Netflix, Amazon Instant Video, YouTube\r\nTechnologie d\'affichage	: LED\r\nDimensions du produit : 8,5P x 38,1l x 24, 1H centimètres\r\nRésolution : 4K\r\nFréquence de rafraîchissement : 60 Hz\r\nCaractéristique spéciale : contrôle parental, teletext, channel edit, hbbtv, sous-titres\r\nNom de modèle : Xiaomi UHD Android TV P1E 43\"\r\nTechnologie de connectivité', 1),
(2, 'Samsung Galaxy Tab A9+', 239, 'Digital', 'samsung-galaxy-tab-a9+.png', 'Marque	SAMSUNG\r\nNom de modèle	Galaxy Tab A9+\r\nTaille de l\'écran 11 Pouces\r\nRésolution d\'affichage maximale	1920 x 1200 Pixels\r\nSystème d\'exploitation Android 13, Samsung One UI 5.1.1\r\nCouleur	Argent\r\nTaille de la mémoire RAM installée 4 Go\r\nAnnée du modèle	2023\r\nPoids de l\'article 480 Grammes', 1),
(5, 'Google Pixel 6 Pro', 950, 'Digital', 'google-pixel-6-pro.png', 'Marque	GOOGLE\r\nModèle Pixel 6 Pro\r\nTaille de l\'écran 6.7 Pouces\r\nRésolution d\'affichage maximale 1440 x 3120 Pixels\r\nSystème d\'exploitation Android 12\r\nCouleur	Noir\r\nMémoire RAM installée 8 Go\r\nAnnée du modèle	2023\r\nPoids de l\'article 210 Grammes', 1),
(6, 'Dell XPS 13', 1299, 'Digital', 'dell-xps-13.png', 'Marque	DELL\r\nModèle XPS 13\r\nTaille de l\'écran 13.4 Pouces\r\nRésolution d\'affichage maximale 3840 x 2400 Pixels\r\nProcesseur Intel Core i7\r\nMémoire RAM installée 16 Go\r\nStockage SSD 512 Go\r\nAnnée du modèle	2023\r\nPoids de l\'article 1.2 Kilogrammes', 1),
(7, 'Sony Alpha a7 IV', 1999.99, 'Digital', 'sony-alpha-a7-iv.png', 'Marque	SONY\r\nModèle Alpha a7 IV\r\nType de capteur CMOS\r\nRésolution du capteur 33 Megapixels\r\nEnregistrement vidéo 4K UHD\r\nStabilisation d\'image intégrée\r\nAnnée du modèle	2023\r\nPoids de l\'article 657 Grammes', 1),
(8, 'Apple AirPods Pro', 249.99, 'Digital', 'apple-airpods-pro.png', 'Marque	APPLE\r\nModèle AirPods Pro\r\nType d\'écouteurs Intra-auriculaire\r\nAutonomie de la batterie jusqu\'à 4.5 heures\r\nRéduction du bruit active\r\nÉtanche IPX4\r\nAnnée du modèle	2023', 1),
(9, 'ASUS ROG Swift PG279Q', 699, 'Digital', 'asus-rog-swift-pg279q.png', 'Marque	ASUS\r\nModèle ROG Swift PG279Q\r\nTaille de l\'écran 27 Pouces\r\nRésolution d\'affichage maximale 2560 x 1440 Pixels\r\nTaux de rafraîchissement 165 Hz\r\nTechnologie G-Sync\r\nAnnée du modèle	2023\r\nPoids de l\'article 7 Kilogrammes', 1),
(10, 'Nintendo Switch OLED', 349.99, 'Digital', 'nintendo-switch-oled.png', 'Marque	NINTENDO\r\nModèle Switch OLED\r\nÉcran OLED 7 Pouces\r\nStockage interne 64 Go\r\nMode téléviseur, portable et sur table\r\nJoy-Cons amovibles\r\nAnnée du modèle	2023\r\nPoids de l\'article 320 Grammes', 1),
(11, 'Creality Ender 3 V2', 299, 'Digital', 'creality-ender-3-v2.png', 'Marque	CREALITY\r\nModèle Ender 3 V2\r\nVolume d\'impression 220 x 220 x 250 mm\r\nÉcran tactile LCD\r\nPlateau chauffant\r\nAssemblage facile\r\nAnnée du modèle	2023\r\nPoids de l\'article 7 Kilogrammes', 1),
(12, 'Netgear Orbi RBK753', 449.99, 'Digital', 'netgear-orbi-rbk753.png', 'Marque	NETGEAR\r\nModèle Orbi RBK753\r\nCouverture Wi-Fi jusqu\'à 600 m²\r\nTechnologie Tri-Band\r\nConnexion jusqu\'à 40 appareils\r\nContrôle parental\r\nAnnée du modèle	2023\r\nPoids de l\'article 1.2 Kilogrammes', 1),
(13, 'Kindle Paperwhite', 129.99, 'Digital', 'kindle-paperwhite.png', 'Marque	AMAZON\r\nModèle Paperwhite\r\nÉcran tactile 6 Pouces\r\nRésistant à l\'eau IPX8\r\nÉclairage intégré\r\nAutonomie de la batterie jusqu\'à 10 semaines\r\nAnnée du modèle	2023\r\nPoids de l\'article 182 Grammes', 1),
(22, 'Product 03', 40, 'Digital', '165ae6ed51a403.webp', 'Ajout bdd ', 3),
(23, 'Image mignon', 45, 'Immobilier', '1659ea6e17c807.webp', 'Je vends ma super image des mignons \r\nTrès bon état', 1);

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

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`id_review`, `rating`, `comment`, `date_review`, `id_user`, `id_product`) VALUES
(1, 5, NULL, '2024-01-22', 2, 8),
(2, 3, NULL, '2024-01-22', 2, 8);

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
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'False(0) for Customers and True(1) for Seller',
  `address` varchar(255) DEFAULT NULL,
  `fac_address` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `siret` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `firstname`, `role`, `address`, `fac_address`, `business_name`, `siret`) VALUES
(1, 'troelstrate2@myges.fr', 'tibo', 'Thibault', 'Roelstrate', 1, NULL, NULL, NULL, NULL),
(2, 'customer@gmail.com', 'test', 'Customer', 'ManyThings', 0, NULL, NULL, NULL, NULL),
(3, 'Antoine@gmail.com', 'password', 'Antoine', 'Antoine', 0, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `message_from` (`message_from`),
  ADD KEY `message_to` (`message_to`),
  ADD KEY `id_product` (`id_product`);

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
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`message_from`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`message_to`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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