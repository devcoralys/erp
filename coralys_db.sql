-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 19 mai 2024 à 14:58
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coralys1_erp_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `id_fonction` int NOT NULL AUTO_INCREMENT,
  `lib_fonction` varchar(100) NOT NULL,
  `date_creat` datetime NOT NULL,
  `secur_ajout` varchar(7) NOT NULL,
  PRIMARY KEY (`id_fonction`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`id_fonction`, `lib_fonction`, `date_creat`, `secur_ajout`) VALUES
(1, 'INFORMATICIEN DEVELOPPEUR D\\\'APPLICATIONS', '0000-00-00 00:00:00', ''),
(2, 'CHARGE COMMUNICATION', '0000-00-00 00:00:00', ''),
(4, 'CHARGE PROJET', '0000-00-00 00:00:00', ''),
(5, 'AGENT COMMERCIAL', '0000-00-00 00:00:00', ''),
(6, 'RESPONSABLE RH', '0000-00-00 00:00:00', ''),
(11, 'AGENT RECOUVREMENT', '0000-00-00 00:00:00', ''),
(13, 'COMPTABLE', '0000-00-00 00:00:00', ''),
(16, 'ASSISTANT DE DIRECTION', '0000-00-00 00:00:00', ''),
(18, 'CHAUFFEUR', '0000-00-00 00:00:00', ''),
(20, 'RESPONSABLE TECHNIQUE', '0000-00-00 00:00:00', ''),
(21, 'DIRECTEUR GENERAL', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_utilisateur`
--

DROP TABLE IF EXISTS `groupe_utilisateur`;
CREATE TABLE IF NOT EXISTS `groupe_utilisateur` (
  `id_type_groupe` int NOT NULL AUTO_INCREMENT,
  `nom_type_groupe` varchar(30) NOT NULL,
  `ajout_type_groupe` int NOT NULL,
  `modif_type_groupe` int NOT NULL,
  `sup_type_groupe` int NOT NULL,
  `visual_type_groupe` int NOT NULL,
  `requete_type_groupe` int NOT NULL,
  `imprim_type_groupe` int NOT NULL,
  `config_type_groupe` int NOT NULL,
  `secur_type_groupe` int NOT NULL,
  `date_creat` datetime NOT NULL,
  `secur_ajout` varchar(10) NOT NULL,
  PRIMARY KEY (`id_type_groupe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `groupe_utilisateur`
--

INSERT INTO `groupe_utilisateur` (`id_type_groupe`, `nom_type_groupe`, `ajout_type_groupe`, `modif_type_groupe`, `sup_type_groupe`, `visual_type_groupe`, `requete_type_groupe`, `imprim_type_groupe`, `config_type_groupe`, `secur_type_groupe`, `date_creat`, `secur_ajout`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1, 1, 1, 1, '2019-06-05 16:51:32', '53ea2ec'),
(2, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, '2022-05-30 12:05:58', 'lol'),
(3, 'Super User', 1, 1, 1, 1, 1, 1, 1, 1, '2022-05-30 12:05:58', 'lol'),
(4, 'User', 1, 1, 1, 1, 1, 1, 1, 1, '2022-05-30 12:05:58', 'lol');

-- --------------------------------------------------------

--
-- Structure de la table `motif_sortie_pers_soign`
--

DROP TABLE IF EXISTS `motif_sortie_pers_soign`;
CREATE TABLE IF NOT EXISTS `motif_sortie_pers_soign` (
  `id_motif` int NOT NULL AUTO_INCREMENT,
  `lib_motif` text,
  `date_creat` datetime DEFAULT NULL,
  `secur_ajout` text,
  `date_mod` datetime DEFAULT NULL,
  `secur_mod` text,
  PRIMARY KEY (`id_motif`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `motif_sortie_pers_soign`
--

INSERT INTO `motif_sortie_pers_soign` (`id_motif`, `lib_motif`, `date_creat`, `secur_ajout`, `date_mod`, `secur_mod`) VALUES
(8, 'Retraite', '2019-06-25 09:43:49', 'DCnHYO27', NULL, NULL),
(6, 'CongÃ©es', '2019-06-25 09:27:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id_personnel` int NOT NULL AUTO_INCREMENT,
  `matricule_personnel` text NOT NULL,
  `nom_personnel` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sexe_personnel` varchar(1) NOT NULL,
  `date_nais_personnel` date NOT NULL,
  `tel_personnel` varchar(25) NOT NULL,
  `email_personnel` varchar(100) NOT NULL,
  `photo_personnel` varchar(25) NOT NULL,
  `date_recrutement` date NOT NULL,
  `service_id` int NOT NULL,
  `fonction_id` int NOT NULL,
  `statut_personnel_id` int NOT NULL,
  `date_creat_personnel` datetime NOT NULL,
  `secur_ajout` varchar(12) NOT NULL,
  `valide` int NOT NULL,
  `motif_sortie_personnel` int NOT NULL,
  `date_sortie` date NOT NULL,
  `date_creat_sortie` datetime NOT NULL,
  `secur_sup` varchar(12) NOT NULL,
  PRIMARY KEY (`id_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `matricule_personnel`, `nom_personnel`, `sexe_personnel`, `date_nais_personnel`, `tel_personnel`, `email_personnel`, `photo_personnel`, `date_recrutement`, `service_id`, `fonction_id`, `statut_personnel_id`, `date_creat_personnel`, `secur_ajout`, `valide`, `motif_sortie_personnel`, `date_sortie`, `date_creat_sortie`, `secur_sup`) VALUES
(1, 'Vel eveniet qui sit', 'Elit ex tempor sit', '2', '1979-01-20', 'Soluta autem volupta', 'rigeba@mailinator.com', '', '2005-09-03', 10, 16, 1, '2024-05-19 14:44:40', 'qXylyjW6OV', 0, 0, '0000-00-00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int NOT NULL AUTO_INCREMENT,
  `lib_service` text NOT NULL,
  `date_creat` datetime NOT NULL,
  `secur_ajout` varchar(12) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `lib_service`, `date_creat`, `secur_ajout`) VALUES
(1, 'INFORMATIQUE', '0000-00-00 00:00:00', ''),
(2, 'COMMUNICATION', '0000-00-00 00:00:00', ''),
(3, 'DIRECTION GENERALE', '0000-00-00 00:00:00', ''),
(4, 'RESSOURCES HUMAINES', '0000-00-00 00:00:00', ''),
(7, 'FINANCE', '0000-00-00 00:00:00', ''),
(10, 'COMMERCIAL', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `statut_personnel`
--

DROP TABLE IF EXISTS `statut_personnel`;
CREATE TABLE IF NOT EXISTS `statut_personnel` (
  `id_statut_personnel` int NOT NULL AUTO_INCREMENT,
  `lib_statut_personnel` varchar(50) NOT NULL,
  `date_creat` datetime NOT NULL,
  `secur_ajout` varchar(7) NOT NULL,
  PRIMARY KEY (`id_statut_personnel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `statut_personnel`
--

INSERT INTO `statut_personnel` (`id_statut_personnel`, `lib_statut_personnel`, `date_creat`, `secur_ajout`) VALUES
(1, 'CDI', '2019-06-22 12:44:25', '53ea2ec'),
(2, 'CDD', '2019-06-22 12:44:37', '53ea2ec'),
(3, 'TEMPORAIRE', '2019-06-22 12:44:53', '53ea2ec'),
(4, 'STAGIAIRE', '2019-06-22 12:44:53', '53ea2ec');

-- --------------------------------------------------------

--
-- Structure de la table `trace`
--

DROP TABLE IF EXISTS `trace`;
CREATE TABLE IF NOT EXISTS `trace` (
  `ref_trace` int NOT NULL AUTO_INCREMENT,
  `lib_trace` text NOT NULL,
  `adresse_ip` varchar(60) NOT NULL,
  `secur` varchar(12) NOT NULL,
  `date_trace` datetime NOT NULL,
  PRIMARY KEY (`ref_trace`),
  UNIQUE KEY `id_trace` (`ref_trace`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `trace`
--

INSERT INTO `trace` (`ref_trace`, `lib_trace`, `adresse_ip`, `secur`, `date_trace`) VALUES
(1, 'Cr&eacute;ation de l\'utilisateur <b>Elit ex tempor sit</b> avec email <b>rigeba@mailinator.com</b> avec droit d\'utilisateur <b>Admin</b>', 'Adresse IP: ::1 Port: 51114', 'qXylyjW6OV', '2024-05-19 14:55:38'),
(2, 'Connexion de <b>Elit ex tempor sit (rigeba@mailinator.com)</b>', 'Adresse IP: ::1 Port: 51162', 'oOWO1Z8aHV', '2024-05-19 14:56:41');

-- --------------------------------------------------------

--
-- Structure de la table `type_piece`
--

DROP TABLE IF EXISTS `type_piece`;
CREATE TABLE IF NOT EXISTS `type_piece` (
  `id_type_piece` int NOT NULL AUTO_INCREMENT,
  `lib_type_piece` text NOT NULL,
  PRIMARY KEY (`id_type_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_piece`
--

INSERT INTO `type_piece` (`id_type_piece`, `lib_type_piece`) VALUES
(1, 'CNI'),
(2, 'Passeport');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `secur` varchar(20) NOT NULL,
  `nom_utilisateur` varchar(30) NOT NULL,
  `email_utilisateur` text NOT NULL,
  `motpass_utilisateur` text NOT NULL,
  `connecte` varchar(4) NOT NULL,
  `personnel_soignant_id` int NOT NULL,
  `photo_util` varchar(30) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `tel_utilisateur` varchar(12) NOT NULL,
  `type_groupe_id` int NOT NULL,
  `valide_util` int NOT NULL,
  `date_creat` date NOT NULL,
  `heure_creat` varchar(8) NOT NULL,
  `secur_ajout` varchar(20) NOT NULL,
  `date_mod` date NOT NULL,
  `heure_mod` varchar(8) NOT NULL,
  `secur_mod` varchar(8) NOT NULL,
  `date_sup` date NOT NULL,
  `heure_sup` varchar(8) NOT NULL,
  `secur_sup` varchar(20) NOT NULL,
  `statut` int NOT NULL,
  `is_dg` int NOT NULL,
  `personnel_id` int NOT NULL,
  `is_valid` int NOT NULL,
  `acces_groupage` int NOT NULL,
  `acces_dossier` int NOT NULL,
  `acces_finance` int NOT NULL,
  `acces_rh` int NOT NULL,
  `acces_secur` int NOT NULL,
  `acces_dashboard` int NOT NULL,
  `acces_client` int NOT NULL,
  `agence_utilisateur` text NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `secur`, `nom_utilisateur`, `email_utilisateur`, `motpass_utilisateur`, `connecte`, `personnel_soignant_id`, `photo_util`, `pseudo`, `tel_utilisateur`, `type_groupe_id`, `valide_util`, `date_creat`, `heure_creat`, `secur_ajout`, `date_mod`, `heure_mod`, `secur_mod`, `date_sup`, `heure_sup`, `secur_sup`, `statut`, `is_dg`, `personnel_id`, `is_valid`, `acces_groupage`, `acces_dossier`, `acces_finance`, `acces_rh`, `acces_secur`, `acces_dashboard`, `acces_client`, `agence_utilisateur`) VALUES
(12, 'qXylyjW6OV', 'Amin Dev', 'admin@coralys.ci', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '1', 0, 'photo_1673892590.jpg', '', '225074836771', 1, 0, '2022-12-23', '', 'lol', '0000-00-00', '', '', '0000-00-00', '', '', 0, 1, 6, 0, 0, 0, 0, 1, 1, 1, 1, 'AEROPORT FELIX HOUPHOUET BOIGNY ZONE FRET'),
(32, 'oOWO1Z8aHV', 'Elit ex tempor sit', 'rigeba@mailinator.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '1', 0, '', '', 'Soluta autem', 2, 0, '2024-05-19', '', 'qXylyjW6OV', '0000-00-00', '', '', '0000-00-00', '', '', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_service`
--

DROP TABLE IF EXISTS `utilisateur_service`;
CREATE TABLE IF NOT EXISTS `utilisateur_service` (
  `id_utilisateur_service` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `service_id` int NOT NULL,
  PRIMARY KEY (`id_utilisateur_service`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `id_visite` int NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `date` datetime NOT NULL,
  `heure` varchar(8) NOT NULL,
  PRIMARY KEY (`id_visite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`id_visite`, `ip`, `date`, `heure`) VALUES
(1, '::1', '2024-05-19 00:00:00', '17161279'),
(2, '::1', '2024-05-19 00:00:00', '17161279');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
