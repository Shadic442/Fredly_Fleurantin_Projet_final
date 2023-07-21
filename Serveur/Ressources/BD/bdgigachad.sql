-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 16 mars 2023 à 17:11
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
-- Base de données : `bdgigachad`
--
DROP DATABASE IF EXISTS `bdgigachad`;
CREATE DATABASE IF NOT EXISTS `bdgigachad` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bdgigachad`;
-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idc` int(11) NOT NULL,
  `groupe` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idc`, `groupe`) VALUES
(1, 'Abdominaux'),
(2, 'Épaules'),
(3, 'Biceps'),
(4, 'Triceps'),
(5, 'Avant-Bras'),
(6, 'Pectoraux'),
(7, 'Dos'),
(8, 'Trapèze'),
(9, 'Quadriceps'),
(10, 'Ischio-jambiers'),
(11, 'Mollets');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `idm` int(11) NOT NULL,
  `courriel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `etat` enum('A','I') COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('A','M') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idm`, `courriel`, `pass`, `etat`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'A', 'A'),
(2, 'membre@gmail.com', '12345678', 'A', 'M'),
(3, 'inactife@gmail.com', '12345678', 'I', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE `exercice` (
  `ide` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `exercice`
--

INSERT INTO `exercice` (`ide`, `idc`, `nom`, `description`, `photo`) VALUES
(2, 6, 'Développé couché avec haltères', 'Allongez-vous sur le banc avec vos pieds sur le sol. Avec les bras tendus, dévissez la barre. Abaissez la barre au milieu de votre poitrine. Relevez la barre jusqu\'à ce que vous ayez verrouillé vos coudes.', '12ae64ad9dfe7ff6063e44b6024fd7b5c8950551.gif'),
(3, 6, 'Pompe', 'Placez vos mains fermement sur le sol, directement sous les épaules. Aplatissez votre dos pour que tout votre corps soit droit et abaissez lentement votre corps. Tirez les omoplates vers l\'arrière et vers le bas, en gardant les coudes près de votre corps. Expirez en repoussant vers la position de départ.', '71787c682be004eadd0e88d365176af5c2659eba.gif'),
(4, 2, 'Développé épaules avec haltères', 'Asseyez-vous sur un banc avec support dorsal. Soulevez les haltères à hauteur d\'épaule avec vos paumes vers l\'avant. Soulevez les haltères vers le haut et faites une pause à la position contractée. Abaissez les poids à la position de départ.\r\n\r\n', '998fe7011caf5a2b6ee6e840d7deeb965fbfa3c4.gif'),
(5, 2, 'Élévations latérales', 'Tenez-vous droit avec des haltères de chaque côté, les paumes face à vos hanches. Levez les bras de chaque côté en pliant légèrement le coude jusqu\'à ce qu\'ils soient parallèles au sol. Pause en haut du mouvement. Ramenez lentement vos bras à la position de départ.', '949b2108a29b9edb0a8ddb7233b36ffd7cbd7f25.gif'),
(6, 3, 'Flexion biceps avec haltères', 'Tenez-vous droit avec un haltère dans chaque main à bout de bras.\r\nSoulevez un haltère et tournez votre avant-bras jusqu\'à ce qu\'il soit vertical et que votre paume soit face à l\'épaule. Abaissez à la position d\'origine et répétez avec le bras opposé.', '1f0b4bcdf7801f93b739be1004ce68daad62b587.gif'),
(7, 4, 'Extension poulie haute à la corde\n', 'Vous pouvez utiliser n\'importe quelle pièce jointe pour cela. Le câble doit être placé tout en haut de la machine. Assurez-vous de garder votre bras collé à vos côtés. Étendez vos coudes jusqu\'à ce que vous sentiez vos triceps se contracter.', '426c5842aeac2a2284cedb3dac842cfaf5818246.gif'),
(8, 5, 'Flexion des avant-bras avec haltères', 'Saisissez l\'haltère avec votre paume vers le haut avec votre avant-bras appuyé contre le banc. Courbez lentement votre poignet vers le haut dans un mouvement semi-circulaire. Revenez à la position de départ et répétez.', 'c08fb93de8aa191702758c6bf3e078db6856d823.gif'),
(9, 1, 'Le crunch à la poulie pour les abdominaux', 'Utilisez une fixation à double poignée et placez le câble jusqu\'en haut. Avancez de quelques pas puis mettez-vous à genoux. Poussez vos hanches vers l\'arrière et fléchissez vos abdominaux, puis poussez les hanches vers l\'avant jusqu\'à la position de départ.', '75c944464d4d1536e434899b8cf9e2a2c1a84e39.gif'),
(11, 7, 'Traction', 'Saisissez la barre en pronation, les bras et les épaules complètement tendus. Tirez votre corps vers le haut jusqu\'à ce que votre menton soit au-dessus de la barre. Abaissez votre corps en position de départ.', 'aa0e7408fefc885dfc6edc8ce54df38201f33552.gif'),
(12, 7, 'Tirage vertical poitrine', 'Saisissez la barre avec les paumes vers l\'avant, vos mains doivent être espacées à une distance plus large que la largeur des épaules. Comme vous avez les deux bras tendus devant vous en tenant la barre, ramenez votre torse à environ 30 degrés tout en bombant la poitrine. Tirez la barre vers le bas à peu près au niveau du menton ou un peu plus bas dans un mouvement fluide tout en serrant les omoplates ensemble. Après une seconde de pression, relevez lentement la barre à la position de départ lorsque vos bras sont complètement tendus.\r\n\r\n', 'd2f4c2f2e9e915bccea7744f5d5fd644608aad45.gif'),
(14, 8, 'Haussement d’épaules avec haltères', 'Asseyez-vous sur un banc avec des haltères dans les deux mains, les paumes face à votre corps, le dos droit. Élevez vos épaules et maintenez la position contractée au sommet du mouvement. Abaissez lentement vos épaules en position de départ.', '7ade1b9bc362a8ee4214982aa6bfcf620e61f60b.gif'),
(16, 9, 'Machine d’extension des jambes', 'Asseyez-vous sur la machine avec votre dos contre le coussin et ajustez la machine que vous utilisez de sorte que vos genoux forment un angle de 90 degrés à la position de départ. Soulevez le poids en étendant vos genoux vers l\'extérieur, puis abaissez votre jambe à la position de départ. Les deux mouvements doivent être effectués dans un mouvement lent et contrôlé.\r\n\r\n', 'b4ddd833bc9bce78d95305972781042a2c8628aa.gif'),
(17, 11, 'Extension des mollets à la barre debout', 'Placez la barre sur votre dos. Commencez avec les pieds à plat sur le sol. Étendez vos talons vers le haut tout en gardant vos genoux immobiles et faites une pause dans la position contractée. Revenez lentement à la position de départ. Répéter.\r\n\r\n', '9541bc3a09ec0af00b615662581953070eaf32a9.gif'),
(18, 10, 'Flexion de jambe allongé à la machine', 'Allongez-vous sur la machine en plaçant vos jambes sous le levier rembourré. Positionnez vos jambes de manière à ce que le levier rembourré soit sous vos muscles du mollet. Soutenez-vous en saisissant les poignées latérales de la machine et soulevez lentement le poids avec vos jambes, les orteils pointés droit. Faites une pause au sommet du mouvement, puis revenez lentement à la position de départ.\r\n\r\n', '2867b92af23eaf9106d940b1dee9ded505d72b46.gif'),
(19, 1, 'Relevé de jambes suspendu', 'Saisissez la barre et accrochez-vous, votre corps immobile et vos jambes droites. Ramenez lentement vos genoux vers votre poitrine. Une fois que vous avez levé vos genoux aussi haut que possible, baissez vos jambes et répétez. La durée de ces mouvements doit être lente afin que vous n\'utilisiez pas l\'élan, ce qui vous permet de tirer le meilleur parti de l\'exercice. La durée de ces mouvements doit être lente afin que vous n\'utilisiez pas l\'élan, ce qui vous permet de tirer le meilleur parti de l\'exercice.', 'a7df19796918b427fb34b4ff51d258448cc66cab.gif'),
(20, 3, 'Flexion marteau incliné avec haltères', 'Tenez les haltères avec une prise neutre (pouces face au plafond). Assis sur un banc incliné. Soulevez lentement l\'haltère jusqu\'à la hauteur de la poitrine. Revenez à la position de départ et répétez.\r\n\r\n', '2f36b036066a875f9ebf80666eb38c3e6724a8dc.gif'),
(21, 4, 'Extension couché avec haltères', 'Allongez-vous à plat sur le sol ou sur un banc avec vos poings tendus vers le plafond et une prise neutre. Cassez les coudes jusqu\'à ce que vos poings soient près de vos tempes. Ensuite, étendez vos coudes et fléchissez vos triceps en haut.', '8fc07cbbce8275c831a809284170ba1edbad5043.gif'),
(22, 5, 'Extension du poignet avec haltères', 'Prenez deux haltères en pronation et posez vos avant-bras sur vos genoux. Laissez vos poignets fléchir complètement, puis étendez vos poignets.', '671612f6d55115153bd6d6462cdcbc0f22edce53.gif'),
(23, 7, 'Tirage horizontal à la poulie', 'Asseyez-vous le dos droit sur la machine et saisissez les poignées. Tirez les poignées vers l\'arrière en utilisant vos bras. Vos jambes et votre torse doivent former un angle de 90°. Poussez votre poitrine. Tirez les poignées vers votre corps jusqu\'à ce que vos mains soient à côté de votre abdomen.\r\n\r\n', 'e42f1941e28fa67b74100384bc114d420d9b9fa5.gif'),
(24, 8, 'Tirage vertical à la barre', 'Prenez une double prise en pronation à peu près à la largeur des épaules.\r\nTirez vos coudes vers le plafond. Visez à amener la barre au niveau du menton ou légèrement plus haut.', '1bd023eae1002ffeeea0a166f77a24082398dd78.gif'),
(25, 9, 'Flexion des jambes avec la barre', 'Tenez-vous debout, les pieds écartés à la largeur des épaules. Maintenez la cambrure naturelle de votre dos, en serrant vos omoplates et en soulevant votre poitrine. Saisissez la barre sur vos épaules et soutenez-la sur le haut de votre dos. Déverrouillez la barre en redressant vos jambes et reculez d\'un pas. Pliez vos genoux pendant que vous abaissez le poids sans modifier la forme de votre dos jusqu\'à ce que vos hanches soient sous vos genoux. Relevez la barre en position de départ, soulevez avec vos jambes et expirez en haut.', '27693b487357155fa5ad63706db65b8d8dcc7490.gif'),
(26, 10, 'Soulevé de terre', 'Tenez-vous debout avec une barre au niveau des tibias, les pieds écartés de la largeur des épaules. Penchez-vous en avant au niveau de vos hanches et gardez vos genoux aussi complètement tendus que possible. Saisissez la barre puis étendez vos hanches tout en gardant le dos droit. De la position debout, abaissez le poids de manière contrôlée. Vous pouvez soit baisser le poids au sol ou avant de toucher le sol, en fonction de votre mobilité.\r\n\r\n', '14a8859eceee7222b0f64db07273a774e8116551.gif'),
(27, 11, 'Extension des mollets assis à la machine', 'Installez-vous confortablement sur la machine, puis placez vos cuisses sous le levier rembourré. Placez vos orteils et la plante de vos pieds sur les repose-pieds. Empêchez le poids de glisser vers l\'avant en saisissant les poignées et relâchez la barre de sécurité. Réduisez le poids jusqu\'à ce que vos mollets soient étendus. Poussez vos talons vers le haut pour soulever le levier rembourré et maintenez la position contractée, puis redescendez lentement jusqu\'à la position de départ. Répéter.\r\n\r\n', 'dee195d75ca2613fccb8776b035ca6f7146e07d8.gif');

-- --------------------------------------------------------

--
-- Structure de la table `exercice_planifie`
--

CREATE TABLE `exercice_planifie` (
  `idep` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `series` int(11) NOT NULL,
  `repetitions` int(11) NOT NULL,
  `poids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `idj` int(11) NOT NULL,
  `jourSemaine` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`idj`, `jourSemaine`) VALUES
(1, 'Dimanche'),
(2, 'Lundi'),
(3, 'Mardi'),
(4, 'Mercredi'),
(5, 'Jeudi'),
(6, 'Vendredi'),
(7, 'Samedi');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idm` int(11) NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `daten` date DEFAULT NULL,
  `sexe` enum('M','F','A') COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idm`, `prenom`, `nom`, `courriel`, `daten`, `sexe`, `photo`, `telephone`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '2023-01-23', 'M', 'logo.png', '5145140514'),
(2, 'Michel', 'Le fort', 'membre@gmail.com', '2020-09-12', 'A', 'logo.png', '5146669999'),
(3, 'Inactif', 'Inactive', 'inactife@gmail.com', '2020-10-15', 'A', '.png', '5146669999');

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

CREATE TABLE `plan` (
  `idp` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `nom` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `isSelected` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `plan`
--

INSERT INTO `plan` (`idp`, `idm`, `nom`, `isSelected`) VALUES
(2, 2, 'Mon plan', 0);


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idc`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `fk_foreign_key_connexion_idm` (`idm`);

--
-- Index pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`ide`),
  ADD KEY `fk_exercice_categorie` (`idc`);

--
-- Index pour la table `exercice_planifie`
--
ALTER TABLE `exercice_planifie`
  ADD PRIMARY KEY (`idep`),
  ADD KEY `fk_idp_plan_ep` (`idp`),
  ADD KEY `fk_idp_jour_ep` (`idj`),
  ADD KEY `fk_idp_exercice_ep` (`ide`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`idj`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idm`);

--
-- Index pour la table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `fk_foreign_key_plan_idm` (`idm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `exercice_planifie`
--
ALTER TABLE `exercice_planifie`
  MODIFY `idep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `idj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `plan`
--
ALTER TABLE `plan`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD CONSTRAINT `fk_foreign_key_connexion_idm` FOREIGN KEY (`idm`) REFERENCES `membre` (`idm`);

--
-- Contraintes pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `fk_exercice_categorie` FOREIGN KEY (`idc`) REFERENCES `categorie` (`idc`);

--
-- Contraintes pour la table `exercice_planifie`
--
ALTER TABLE `exercice_planifie`
  ADD CONSTRAINT `fk_idp_exercice_ep` FOREIGN KEY (`ide`) REFERENCES `exercice` (`ide`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_idp_jour_ep` FOREIGN KEY (`idj`) REFERENCES `jour` (`idj`),
  ADD CONSTRAINT `fk_idp_plan_ep` FOREIGN KEY (`idp`) REFERENCES `plan` (`idp`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `fk_foreign_key_plan_idm` FOREIGN KEY (`idm`) REFERENCES `membre` (`idm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
