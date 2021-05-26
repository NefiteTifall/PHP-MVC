-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 mai 2021 à 14:04
-- Version du serveur :  8.0.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `foxwind`
--
CREATE DATABASE IF NOT EXISTS `foxwind` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foxwind`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `intro` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `id_user`, `intro`, `titre`, `img`, `date`) VALUES
('1', '60939a5c1f290', 'desc', 'Titre ', '/resources/image/article/a.jpg', '2021-05-11');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `rue` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `code_postal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pays` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_eolienne` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_article` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `contenu` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_user`, `id_article`, `date`, `contenu`, `level`) VALUES
('1', '60939a5c1f290', '1', '2021-05-06', 'Oui', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `qui` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `id_user`, `mail`, `qui`, `content`) VALUES
('60a6592f3dd6d', '60939a5c1f290', 'a@a.com', 'daz', 'a\r\na\r\na\r\n\r\na');

-- --------------------------------------------------------

--
-- Structure de la table `eolienne`
--

CREATE TABLE `eolienne` (
  `id_eolienne` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `vendu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `libelle` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `libelle`) VALUES
('1', 'utilisateur'),
('2', 'redacteur'),
('3', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id_section` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_article` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id_section`, `id_article`, `type`, `content`, `image`) VALUES
('1', '1', 'left-img', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque elit vitae dapibus suscipit. Etiam porttitor molestie lectus eget pretium. Nulla facilisi. Curabitur venenatis nisl non eros vulputate, non consequat quam vehicula. Curabitur q', '/resources/image/article/a.jpg'),
('2', '1', 'right-img', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque elit vitae dapibus suscipit. Etiam porttitor molestie lectus eget pretium. Nulla facilisi. Curabitur venenatis nisl non eros vulputate, non consequat quam vehicula. Curabitur q', '/resources/image/article/a.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `username`, `mdp`, `id_role`, `email`) VALUES
('60939a5c1f290', 'aaa', 'ed02457b5c41d964dbd2f2a609d63fe1bb7528dbe55e1abf5b52c249cd735797', '3', 'a@a.a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_eolienne` (`id_eolienne`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `eolienne`
--
ALTER TABLE `eolienne`
  ADD PRIMARY KEY (`id_eolienne`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
