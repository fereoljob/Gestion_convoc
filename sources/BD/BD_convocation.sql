-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 29 mars 2021 à 08:33
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BD_convocation`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int NOT NULL,
  `nom_admin` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `prenom_admin` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `_login` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `mot_de_passe` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `typAdmin` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom_admin`, `prenom_admin`, `_login`, `mot_de_passe`, `typAdmin`) VALUES
(1, 'john', 'doe', 'Admin', 'Admin', 'Entraineur'),
(2, 'france', 'Essai', 'Admin2', 'Admin2', 'Secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

CREATE TABLE `competition` (
  `id_compet` int NOT NULL,
  `nom_compet` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `nom_equipe` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `equipe_adv` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `datecompet` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `terrain` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `site` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id_compet`, `nom_compet`, `nom_equipe`, `equipe_adv`, `datecompet`, `heure`, `terrain`, `site`) VALUES
(1, 'Coupe de France', 'SENIORS_B', 'VALANJOU AS 2', '2021-03-11', '14:45:00', 'STADE RAYMOND GABORIAU 1', 'VEZINS'),
(3, 'D1 - Groupe A', 'SENIORS_B', 'R.C. DOUE LA FONTAINE', '2020-08-30', '15:00:00', 'STADE RAMPILLON MAGNILS 1', 'ST GEMMES/LOIRE'),
(4, 'D4 - Groupe E', 'SENIORS_B', 'AMBILLOU ASVR 1', '2020-09-06', '15:00:00', 'COMPLEXE SPORTIF RENÉ BOUBLIN', 'MARTIGNE'),
(5, 'Coupe des Réserves', 'SENIORS_B', 'THOUARCE FC LAYON 1', '2020-09-13', '15:00:00', 'STADE PAUL FORMON', 'MARTIGNE'),
(6, 'D1 - Groupe A', 'SENIORS_B', 'CHOLET JEUNE FRANCE 1', '2020-09-20', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(7, 'D4 - Groupe E', 'SENIORS_C', 'MONTREUIL BELLAY UA 2', '2020-09-27', '15:00:00', 'STADE MUNICIPAL 1', 'LE MAY SUR EVRE'),
(8, 'D5 - Groupe A', 'SENIORS_B', 'SOMLOIRYZERNAY CP 4', '2020-10-04', '15:00:00', 'STADE DE LA GABARDIÈRE 1', 'CHEMILLE EN ANJOU'),
(9, 'Coupe des Pays de la Loire', 'SENIORS_A', 'AMBILLOU ASVR 1', '2020-10-11', '15:00:00', 'STADE ALPHONSE LEROI 1', 'MARTIGNE'),
(10, 'Coupe des Pays de la Loire', 'SENIORS_A', 'SEICHES MARCE AS 1', '2020-10-18', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(11, 'D1 - Groupe A', 'SENIORS_A', 'CHOLET JEUNE FRANCE 1', '2020-10-25', '15:00:00', 'STADE BORDAGE LUNEAU', 'CHOLET'),
(12, 'D1 - Groupe A', 'SENIORS_A', 'AMBILLOU ASVR 3', '2020-11-08', '15:00:00', 'STADE FLORIMOND COUGNAUD 1', 'MARTIGNE'),
(13, 'D1 - Groupe A', 'SENIORS_A', 'ANDREZE JUB-JALLAIS 1', '2020-11-15', '15:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(14, 'D1 - Groupe A', 'SENIORS_A', 'PELLOUAILLES CORZE 1', '2020-11-22', '15:00:00', 'COMPLEXE SPORTIF RENÉ BOUBLIN', 'BEAUPREAU EN MAUGES'),
(15, 'D1 - Groupe A', 'SENIORS_A', 'LES PONTS DE CE AS 1', '2020-11-29', '15:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(16, 'D1 - Groupe A', 'SENIORS_A', 'AMBILLOU ASVR 3', '2020-12-06', '12:30:00', 'STADE DES RIVES DU THOUET N° 1', 'SAUMUR'),
(17, 'D1 - Groupe A', 'SENIORS_A', 'LE LONGERON TORFOU 1', '2020-12-13', '15:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(18, 'D1 - Groupe A', 'SENIORS_A', 'TOUTLEMONDE MAULEVR 1', '2021-01-17', '15:00:00', 'STADE PAUL FORMON', 'TOUTLEMONDE'),
(19, 'D1 - Groupe A', 'SENIORS_A', 'SOMLOIRYZERNAY CP 1', '2021-01-24', '15:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(20, 'D1 - Groupe A', 'SENIORS_A', 'ST MATH MENITRE FC 1', '2021-01-31', '15:00:00', 'STADE MAURICE TROUILLARD', 'LOIRE AUTHION'),
(21, 'D1 - Groupe A', 'SENIORS_A', 'THOUARCE FC LAYON 1', '2021-02-07', '15:00:00', 'STADE DES RONDIÈRES', 'BELLEVIGNE EN LAYON'),
(22, 'D1 - Groupe A', 'SENIORS_A', 'LE MAY SUR EVRE 1', '2021-02-14', '16:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(23, 'D1 - Groupe A', 'SENIORS_A', 'TOUTLEMONDE MAULEVR 1', '2021-02-21', '17:00:00', 'STADE DE CONTADES', 'MARTIGNE'),
(24, 'D1 - Groupe A', 'SENIORS_A', 'ANGERS NDC 2', '2021-03-14', '18:00:00', 'STADE DE LA CHESNAIE 1', 'ANGERS'),
(25, 'D1 - Groupe A', 'SENIORS_A', 'CHOLET JEUNE FRANCE 1', '2021-03-21', '19:00:00', 'STADE DE LA CHESNAIE 1', 'MARTIGNE'),
(26, 'D1 - Groupe A', 'SENIORS_A', 'SOMLOIRYZERNAY CP 1', '2021-03-28', '20:00:00', 'STADE G. AIGUILLE', 'SOMLOIRE'),
(27, 'D1 - Groupe A', 'SENIORS_A', 'ST SYLVAIN ANJOU AS 1', '2021-04-11', '21:00:00', 'COMPLEXE SPORTIF BOIS LA SALLE 1', 'VERRIERES EN ANJOU'),
(28, 'D1 - Groupe A', 'SENIORS_A', 'ANDREZE JUB-JALLAIS 1', '2021-04-18', '22:00:00', 'STADE ANDRÉ BERTIN 1', 'BEAUPREAU EN MAUGES'),
(29, 'Coupe des Pays de la Loire', 'SENIORS_A', 'PELLOUAILLES CORZE 1', '2021-04-25', '23:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(30, 'D1 - Groupe A', 'SENIORS_A', 'LES PONTS DE CE AS 1', '2021-05-09', '00:00:00', 'STADE DE LA CHESNAIE 1', 'LES PONTS DE CE'),
(31, 'D1 - Groupe A', 'SENIORS_A', 'SAUMUR OFC 3', '2021-05-16', '01:00:00', 'STADE DE LA LUISETTE', 'MARTIGNE'),
(32, 'D1 - Groupe A', 'SENIORS_A', 'LE LONGERON TORFOU 1', '2021-05-30', '02:00:00', 'STADE RAYMOND GABORIAU 1', 'SEVREMOINE'),
(33, 'D1 - Groupe A', 'SENIORS_A', 'ST MATH MENITRE FC 1', '2021-06-06', '03:00:00', 'STADE DE LA CHESNAIE 1', 'MARTIGNE'),
(34, 'Amical', 'SENIORS_B', 'ST CERBOUILLE 2', '2020-08-19', '04:00:00', 'STADE MUNICIPAL', 'CERSAY'),
(35, 'Amical', 'SENIORS_B', 'R.C. DOUE LA FONTAINE', '2020-08-30', '13:00:00', 'STADE DE CONTADES', 'MARTIGNE'),
(36, 'Amical', 'SENIORS_B', 'ST MELAINE OLYMPIQUE SPORT', '2020-09-06', '12:30:00', 'STADE ALPHONSE LEROI 1', 'ST MELAINE'),
(37, 'D4 - Groupe E', 'SENIORS_B', 'ST MELAINE S/AUBANCE 2', '2020-09-13', '15:00:00', 'STADE BORDAGE LUNEAU', 'ST MELAINE SUR AUBANCE'),
(38, 'Coupe des Réserves', 'SENIORS_B', 'BOUCHEMAINE ES 3', '2020-09-20', '12:30:00', 'STADE DE CONTADES', 'MARTIGNE'),
(39, 'D5 - Groupe A', 'SENIORS_B', 'THOUARCE FC LAYON 2', '2020-09-27', '15:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(40, 'Coupe des Réserves', 'SENIORS_B', 'VALANJOU AS 2', '2020-10-04', '15:00:00', 'STADE BORDAGE LUNEAU', 'MARTIGNE'),
(41, 'Coupe de l\'Anjou', 'SENIORS_B', 'LE PUY VAUDELNAY ES 2', '2020-10-11', '12:30:00', 'STADE PAUL BOIVIN 1', 'LE PUY NOTRE DAME'),
(42, 'D4 - Groupe E', 'SENIORS_B', 'ANGERS SCA 2', '2020-10-18', '12:30:00', 'STADE DE LA BARATERIE', 'ANGERS'),
(43, 'Coupe de l\'Anjou', 'SENIORS_B', 'VALANJOU AS 2', '2020-10-25', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(44, 'D4 - Groupe E', 'SENIORS_B', 'MONTREUIL BELLAY UA 1', '2020-11-08', '15:00:00', 'COMPLEXE SPORTIF RENÉ BOUBLIN', 'MONTREUIL BELLAY'),
(45, 'D4 - Groupe E', 'SENIORS_B', 'BRISSAC AUBANCE ES 3', '2020-11-15', '12:30:00', 'STADE DES ALLEUDS', 'LES ALLEUDS'),
(46, 'D4 - Groupe E', 'SENIORS_A', 'DOUE LA FONTAINE RC 3', '2020-11-22', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(47, 'D4 - Groupe E', 'SENIORS_B', 'AMBILLOU ASVR 2', '2020-11-29', '15:00:00', 'STADE MUNICIPAL JOSEPH CHARGE', 'TUFFALUN'),
(48, 'D4 - Groupe E', 'SENIORS_B', 'CORON OSTVC 2', '2020-12-06', '15:00:00', 'STADE DE LA BARATERIE', 'MARTIGNE'),
(49, 'D4 - Groupe E', 'SENIORS_B', 'ST HILAIRE VIHIERS 3', '2020-12-13', '12:30:00', 'STADE ALPHONSE LEROI 1', 'ST HILAIRE DU BOIS'),
(50, 'D4 - Groupe E', 'SENIORS_B', 'SOMLOIRYZERNAY CP 4', '2021-01-31', '15:00:00', 'STADE DE CONTADES', 'MARTIGNE'),
(51, 'D4 - Groupe E', 'SENIORS_B', 'ST MELAINE S/AUBANCE 2', '2021-02-07', '15:00:00', 'STADE DE LA LUISETTE', 'MARTIGNE'),
(52, 'D4 - Groupe E', 'SENIORS_B', 'THOUARCE FC LAYON 2', '2021-02-14', '15:00:00', 'STADE DES RONDIÈRES', 'BELLEVIGNE EN LAYON'),
(53, 'D4 - Groupe E', 'SENIORS_B', 'LE PUY VAUDELNAY ES 2', '2021-03-14', '15:00:00', 'STADE DE LA GABARDIÈRE 1', 'MARTIGNE'),
(54, 'D4 - Groupe E', 'SENIORS_B', 'VALANJOU AS 2', '2021-03-21', '15:00:00', 'STADE ALPHONSE LEROI 1', 'VALANJOU'),
(55, 'D4 - Groupe E', 'SENIORS_B', 'MONTREUIL BELLAY UA 1', '2021-04-11', '15:00:00', 'COMPLEXE SPORTIF RENÉ BOUBLIN', 'MARTIGNE'),
(56, 'D4 - Groupe E', 'SENIORS_B', 'BRISSAC AUBANCE ES 3', '2021-04-18', '15:00:00', 'COMPLEXE SPORTIF BOIS LA SALLE 1', 'MARTIGNE'),
(57, 'D4 - Groupe E', 'SENIORS_B', 'DOUE LA FONTAINE RC 3', '2021-04-25', '12:30:00', 'STADE MARCEL HABERT 1', 'DOUE LA FONTAINE'),
(58, 'D4 - Groupe E', 'SENIORS_B', 'AMBILLOU ASVR 2', '2021-05-09', '15:00:00', 'COMPLEXE SPORTIF BOIS LA SALLE 1', 'MARTIGNE'),
(59, 'D4 - Groupe E', 'SENIORS_B', 'CORON OSTVC 2', '2021-05-16', '15:00:00', 'STADE FLORIMOND COUGNAUD 1', 'VEZINS'),
(60, 'D4 - Groupe E', 'SENIORS_B', 'ST HILAIRE VIHIERS 3', '2021-05-30', '15:00:00', 'STADE ALPHONSE LEROI 1', 'MARTIGNE'),
(61, 'D4 - Groupe E', 'SENIORS_B', 'SOMLOIRYZERNAY CP 4', '2021-06-06', '12:30:00', 'STADE G. AIGUILLE', 'SOMLOIRE'),
(62, 'Amical', 'SENIORS_C', 'F.C. DU LAYON', '2020-09-20', '13:00:00', 'STADE BORDAGE LUNEAU', 'THOUARCE'),
(63, 'D5 - Groupe A', 'SENIORS_C', 'THOUARCE FC LAYON 3', '2020-09-27', '15:00:00', 'STADE DES RONDIÈRES', 'BELLEVIGNE EN LAYON'),
(64, 'D5 - Groupe A', 'SENIORS_C', 'ST HILAIRE VIHIERS 4', '2020-10-11', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(65, 'D5 - Groupe A', 'SENIORS_C', 'GENNES LES ROSIERS 2', '2020-10-25', '12:30:00', 'STADE DE LA LUISETTE', 'LES ROSIERS SUR LOIRE'),
(66, 'D1 - Groupe A', 'SENIORS_C', 'AMBILLOU ASVR 1', '2020-11-08', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(67, 'D5 - Groupe A', 'SENIORS_C', 'LE PUY VAUDELNAY ES 3', '2020-11-08', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(68, 'D5 - Groupe A', 'SENIORS_C', 'AMBILLOU ASVR 3', '2020-11-22', '15:00:00', 'STADE MUNICIPAL JOSEPH CHARGE', 'TUFFALUN'),
(69, 'D5 - Groupe A', 'SENIORS_C', 'SAUMUR BAYARD AS 3', '2020-11-29', '15:00:00', 'STADE ALPHONSE LEROI 1', 'MARTIGNE'),
(70, 'D5 - Groupe A', 'SENIORS_C', 'MONTILLIERS ES 3', '2020-12-06', '15:00:00', 'STADE RAMPILLON MAGNILS 1', 'MONTILLIERS'),
(71, 'D5 - Groupe A', 'SENIORS_C', 'MONTREUIL BELLAY UA 2', '2021-02-07', '15:00:00', 'STADE GASTON AMY 1', 'MONTREUIL BELLAY'),
(72, 'D5 - Groupe A', 'SENIORS_C', 'THOUARCE FC LAYON 3', '2021-02-14', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(73, 'D5 - Groupe A', 'SENIORS_C', 'ST HILAIRE VIHIERS 4', '2021-03-14', '12:30:00', 'STADE HENRI MANCEAU', 'ST PAUL DU BOIS'),
(74, 'D5 - Groupe A', 'SENIORS_C', 'GENNES LES ROSIERS 2', '2021-03-21', '15:00:00', 'COMPLEXE SPORTIF RENÉ BOUBLIN', 'MARTIGNE'),
(75, 'Coupe des Réserves', 'SENIORS_C', '', '2021-04-11', '15:00:00', 'STADE PAUL BOIVIN 1', 'LE PUY NOTRE DAME'),
(76, 'D5 - Groupe A', 'SENIORS_C', 'DOUE LA FONTAINE RC 4', '2021-04-18', '15:00:00', 'STADE MARCEL HABERT 1', 'DOUE LA FONTAINE'),
(77, 'D4 - Groupe E', 'SENIORS_C', 'AMBILLOU ASVR 3', '2021-04-25', '15:00:00', 'COMPLEXE SPORTIF RENÉ BOUBLIN', 'MARTIGNE'),
(78, 'Amical', 'SENIORS_C', 'SAUMUR BAYARD AS 3', '2021-05-09', '15:00:00', 'STADE PIERRE DE BODMAN', 'SAUMUR'),
(79, 'D5 - Groupe A', 'SENIORS_C', 'MONTILLIERS ES 3', '2021-05-16', '15:00:00', 'STADE DE LA CHESNAIE 1', 'MARTIGNE'),
(80, 'D1 - Groupe A', 'SENIORS_C', 'MONTREUIL BELLAY UA 2', '2021-06-06', '15:00:00', 'STADE ANDRÉ BERTIN 1', 'MARTIGNE'),
(81, 'D1 - Groupe A', 'SENIORS_A', 'CHOLET JEUNE FRANCE 1', NULL, NULL, 'STADE DE LA BARATERIE', 'ALLONNES'),
(82, 'Coupe des Pays de la Loire', 'SENIORS_A', 'AMBILLOU ASVR 1', '2030-01-01', '16:00:00', 'COMPLEXE SPORTIF BOIS LA SALLE 1', 'ALLONNES'),
(83, 'Amical', 'SENIORS_B', 'AMBILLOU ASVR 3', NULL, NULL, 'COMPLEXE SPORTIF BOIS LA SALLE 1', 'BEAUPREAU EN MAUGES'),
(84, 'Coupe de l\'Anjou', 'SENIORS_B', 'AMBILLOU ASVR 1', NULL, NULL, '', ''),
(85, '', '', '', NULL, NULL, '', ''),
(86, 'Coupe de France', 'SENIORS_C', 'BEAUFORT EN VALLEE U 1', '2021-03-21', '19:00:00', 'STADE ANDRÉ BERTIN 1', 'ANGERS');

-- --------------------------------------------------------

--
-- Structure de la table `convocation`
--

CREATE TABLE `convocation` (
  `id_convocation` int NOT NULL,
  `DateConvoc` date DEFAULT NULL,
  `nomEquipe` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `publie` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `equipe_adv` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `nbre_convok` int DEFAULT '0',
  `id_compet` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `convocation`
--

INSERT INTO `convocation` (`id_convocation`, `DateConvoc`, `nomEquipe`, `publie`, `equipe_adv`, `nbre_convok`, `id_compet`) VALUES
(1, '2021-03-21', 'SENIORS_A', 'oui', 'CHOLET', 14, 25),
(2, '2021-03-11', 'SENIORS_B', 'oui', 'VALANJOU', 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `effectif`
--

CREATE TABLE `effectif` (
  `id_joueur` int NOT NULL,
  `nom` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `licence` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `effectif`
--

INSERT INTO `effectif` (`id_joueur`, `nom`, `prenom`, `licence`) VALUES
(1, 'Iglotte', 'Paul', 'Libre'),
(2, 'Oglyphe', 'Pierre', 'Libre'),
(3, 'Soule', 'Sam', 'Libre'),
(4, 'passe', 'karlito', 'Libre'),
(5, 'Dicule', 'Terry', 'Libre'),
(6, 'Jasmin', 'Théo', 'Libre'),
(7, 'lidl', 'ana', 'Libre'),
(8, 'carrefour', 'tatatta', 'Libre'),
(9, 'auchan', 'reda', 'Libre'),
(10, 'leroy', 'test', 'Libre'),
(11, 'arbère', 'Paul', 'Libre'),
(12, 'jean', 'pierre', 'Libre'),
(13, 'Ambiqué', 'Al', 'Libre'),
(14, 'Dée', 'Bonnie', 'Libre'),
(15, 'Anescense', 'Ève', 'Libre'),
(16, 'Aniche', 'Hal', 'Libre'),
(17, 'Gamote', 'Hubert', 'Libre'),
(18, 'Ome', 'Maxime', 'Libre'),
(19, 'Patelefaire', 'José', 'Libre'),
(20, 'Covert', 'Marie', 'Libre'),
(21, 'Nière', 'Marie', 'Libre'),
(22, 'Rouanna', 'Marie', 'Libre'),
(23, 'Lait', 'Marion', 'Libre'),
(24, 'Ni', 'Marty', 'Libre'),
(25, 'Cologne', 'Maude', 'Libre'),
(26, 'Zan', 'Mehdi', 'Libre'),
(27, 'Engraiv', 'Mélusine', 'Libre'),
(28, 'Tache', 'Mouss', 'Libre'),
(29, 'Psie', 'Otto', 'Libre');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id_etat` int NOT NULL,
  `type_absence` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `dateAb` date DEFAULT NULL,
  `id_joueur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id_etat`, `type_absence`, `dateAb`, `id_joueur`) VALUES
(1, 'S', '2020-08-02', 13),
(2, 'B', '2020-08-09', 13),
(3, 'A', '2020-08-16', 13),
(4, 'N', '2020-08-23', 13),
(5, 'N', '2021-03-26', 13),
(6, 'N', '2020-09-06', 13),
(7, 'A', '2020-09-13', 13),
(8, 'N', '2020-09-20', 13),
(9, 'N', '2020-09-27', 13),
(10, 'A', '2020-10-04', 13),
(11, 'A', '2020-10-11', 13),
(12, 'N', '2020-10-18', 13),
(13, 'N', '2020-10-25', 13),
(14, 'N', '2020-11-01', 13),
(15, 'N', '2020-11-08', 13),
(16, 'N', '2020-11-15', 13),
(17, 'N', '2020-11-22', 13),
(18, 'N', '2020-11-29', 13),
(19, 'N', '2020-12-06', 13),
(20, 'N', '2020-12-13', 13),
(21, 'N', '2020-12-20', 13),
(22, 'N', '2020-12-27', 13),
(23, 'N', '2021-01-03', 13),
(24, 'N', '2021-01-10', 13),
(25, 'N', '2021-01-17', 13),
(26, 'N', '2021-01-24', 13),
(27, 'N', '2021-01-31', 13),
(28, 'N', '2021-02-07', 13),
(29, 'A', '2021-02-14', 13),
(30, 'S', '2021-02-21', 13),
(31, 'A', '2021-02-28', 13),
(32, 'B', '2021-03-07', 13),
(33, 'N', '2021-03-14', 13),
(34, 'B', '2021-07-25', 13),
(35, 'A', '2020-08-02', 14),
(36, 'A', '2020-08-09', 14),
(37, 'N', '2020-08-23', 14),
(38, 'N', '2020-09-06', 14),
(39, 'B', '2020-10-25', 14),
(40, 'B', '2020-11-01', 14),
(41, 'B', '2021-01-03', 14),
(42, 'B', '2021-02-07', 14),
(43, 'B', '2021-02-14', 14),
(44, 'B', '2021-02-21', 14),
(45, 'N', '2020-09-13', 15),
(46, 'B', '2020-09-20', 15),
(47, 'S', '2020-09-27', 15),
(48, 'S', '2020-10-04', 15),
(49, 'A', '2020-12-06', 15),
(50, 'B', '2020-12-13', 15),
(51, 'N', '2020-12-20', 15),
(52, 'S', '2020-12-27', 15),
(53, 'S', '2021-02-07', 15),
(54, 'S', '2021-03-14', 15),
(55, 'N', '2020-08-02', 16),
(56, 'N', '2020-08-09', 16),
(57, 'N', '2020-08-16', 16),
(58, 'N', '2020-08-23', 16),
(59, 'N', '2021-03-26', 16),
(60, 'N', '2020-09-06', 16),
(61, 'N', '2020-09-13', 16),
(62, 'A', '2020-09-20', 16),
(63, 'N', '2020-09-27', 16),
(64, 'N', '2020-10-04', 16),
(65, 'N', '2020-10-11', 16),
(66, 'N', '2020-10-18', 16),
(67, 'N', '2020-10-25', 16),
(68, 'B', '2020-11-01', 16),
(69, 'B', '2020-11-22', 16),
(70, 'N', '2020-12-06', 16),
(71, 'S', '2021-02-14', 16),
(72, 'S', '2021-03-14', 16),
(73, 'N', '2020-08-02', 17),
(74, 'A', '2020-09-06', 17),
(75, 'N', '2020-10-04', 17),
(76, 'N', '2020-10-11', 17),
(77, 'N', '2020-10-18', 17),
(78, 'N', '2020-10-25', 17),
(79, 'N', '2020-11-01', 17),
(80, 'N', '2020-11-08', 17),
(81, 'A', '2021-02-07', 17),
(82, 'A', '2021-02-14', 17),
(83, 'S', '2021-03-14', 17),
(84, 'B', '2020-11-29', 18),
(85, 'A', '2021-03-07', 18),
(86, 'A', '2021-03-14', 18),
(87, 'S', '2021-04-04', 18),
(88, 'B', '2020-09-06', 19),
(89, 'N', '2020-09-20', 19),
(90, 'B', '2020-11-01', 19),
(91, 'B', '2020-11-08', 19),
(92, 'A', '2020-12-27', 19),
(93, 'B', '2021-03-28', 19),
(94, 'A', '2020-09-20', 20),
(95, 'A', '2020-11-15', 20),
(96, 'B', '2020-11-29', 20),
(97, 'N', '2021-02-14', 20),
(98, 'S', '2021-03-14', 20),
(99, 'B', '2021-05-23', 20),
(100, 'N', '2020-08-02', 21),
(101, 'S', '2020-08-16', 21),
(102, 'B', '2021-03-26', 21),
(103, 'A', '2020-09-13', 21),
(104, 'B', '2020-09-27', 21),
(105, 'A', '2020-10-04', 21),
(106, 'B', '2020-08-02', 22),
(107, 'B', '2020-10-25', 22),
(108, 'B', '2020-12-20', 22),
(109, 'N', '2020-08-02', 23),
(110, 'N', '2020-08-09', 23),
(111, 'N', '2020-08-16', 23),
(112, 'N', '2020-08-23', 23),
(113, 'N', '2021-03-26', 23),
(114, 'N', '2020-09-06', 23),
(115, 'N', '2020-09-13', 23),
(116, 'N', '2020-09-20', 23),
(117, 'N', '2020-09-27', 23),
(118, 'N', '2020-10-04', 23),
(119, 'N', '2020-11-01', 23),
(120, 'S', '2020-12-20', 23),
(121, 'N', '2020-10-18', 24),
(122, 'S', '2021-03-14', 24),
(123, 'A', '2020-08-02', 25),
(124, 'B', '2020-09-27', 25),
(125, 'S', '2020-11-08', 25),
(126, 'A', '2020-11-29', 25),
(127, 'S', '2021-03-14', 25),
(128, 'B', '2020-11-22', 26),
(129, 'A', '2020-08-02', 27),
(130, 'B', '2021-03-26', 27),
(131, 'A', '2020-09-27', 27),
(132, 'B', '2020-10-18', 27),
(133, 'A', '2021-03-26', 28),
(134, 'N', '2020-08-02', 29),
(135, 'N', '2020-08-09', 29),
(136, 'N', '2020-08-16', 29),
(137, 'N', '2020-08-23', 29),
(138, 'N', '2021-03-26', 29),
(139, 'N', '2020-09-06', 29),
(140, 'N', '2020-09-13', 29),
(141, 'A', '2021-01-31', 29),
(142, 'B', '2021-02-21', 29),
(143, 'A', '2020-11-22', 1),
(144, 'A', '2021-02-14', 1),
(145, 'B', '2020-08-02', 2),
(146, 'B', '2020-09-20', 2),
(147, 'B', '2021-02-07', 2),
(148, 'N', '2020-10-25', 3),
(149, 'A', '2020-08-02', 4),
(150, 'N', '2020-08-23', 5),
(151, 'N', '2021-03-26', 5),
(152, 'N', '2020-09-06', 5),
(153, 'N', '2020-09-13', 5),
(154, 'N', '2020-09-20', 5),
(155, 'N', '2020-09-27', 5),
(156, 'A', '2020-08-02', 6),
(157, 'N', '2020-08-09', 6),
(158, 'N', '2020-08-16', 6),
(159, 'N', '2020-08-23', 6),
(160, 'N', '2021-03-26', 6),
(161, 'N', '2020-09-06', 6),
(162, 'N', '2020-09-13', 6),
(163, 'N', '2020-09-20', 6),
(164, 'N', '2020-09-27', 6),
(165, 'N', '2020-10-04', 6),
(166, 'N', '2020-10-11', 6),
(167, 'N', '2020-10-18', 6),
(168, 'N', '2020-10-25', 6),
(169, 'B', '2020-11-08', 6),
(170, 'S', '2020-08-02', 7),
(171, 'A', '2020-09-13', 8),
(172, 'B', '2020-08-02', 10),
(173, 'A', '2020-12-20', 10),
(174, 'N', '2020-08-02', 11),
(175, 'B', '2020-10-04', 11);

-- --------------------------------------------------------

--
-- Structure de la table `occupation`
--

CREATE TABLE `occupation` (
  `id_occup` int NOT NULL,
  `id_joueur` int DEFAULT NULL,
  `dateOccu` date DEFAULT NULL,
  `convo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `occupation`
--

INSERT INTO `occupation` (`id_occup`, `id_joueur`, `dateOccu`, `convo`) VALUES
(1, 19, '2021-03-21', 1),
(2, 20, '2021-03-21', 1),
(3, 21, '2021-03-21', 1),
(4, 22, '2021-03-21', 1),
(5, 23, '2021-03-21', 1),
(6, 24, '2021-03-21', 1),
(7, 25, '2021-03-21', 1),
(8, 26, '2021-03-21', 1),
(9, 27, '2021-03-21', 1),
(10, 28, '2021-03-21', 1),
(11, 1, '2021-03-21', 1),
(12, 2, '2021-03-21', 1),
(13, 3, '2021-03-21', 1),
(14, 4, '2021-03-21', 1),
(15, 10, '2021-03-11', 2),
(16, 11, '2021-03-11', 2),
(17, 12, '2021-03-11', 2),
(18, 13, '2021-03-11', 2),
(19, 14, '2021-03-11', 2),
(20, 15, '2021-03-11', 2),
(21, 16, '2021-03-11', 2),
(22, 17, '2021-03-11', 2),
(23, 18, '2021-03-11', 2),
(24, 19, '2021-03-11', 2),
(25, 20, '2021-03-11', 2),
(26, 21, '2021-03-11', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id_compet`),
  ADD UNIQUE KEY `nom_compet` (`nom_compet`,`nom_equipe`,`equipe_adv`,`datecompet`,`heure`);

--
-- Index pour la table `convocation`
--
ALTER TABLE `convocation`
  ADD PRIMARY KEY (`id_convocation`),
  ADD UNIQUE KEY `DateConvoc` (`DateConvoc`,`nomEquipe`);

--
-- Index pour la table `effectif`
--
ALTER TABLE `effectif`
  ADD PRIMARY KEY (`id_joueur`),
  ADD UNIQUE KEY `nom` (`nom`,`prenom`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id_etat`),
  ADD UNIQUE KEY `id_joueur` (`id_joueur`,`dateAb`);

--
-- Index pour la table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id_occup`),
  ADD UNIQUE KEY `id_joueur` (`id_joueur`,`dateOccu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `competition`
--
ALTER TABLE `competition`
  MODIFY `id_compet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `convocation`
--
ALTER TABLE `convocation`
  MODIFY `id_convocation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `effectif`
--
ALTER TABLE `effectif`
  MODIFY `id_joueur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id_etat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT pour la table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id_occup` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
