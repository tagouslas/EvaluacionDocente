-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 08 mai 2020 à 00:14
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eva_docente`
--

-- --------------------------------------------------------

--
-- Structure de la table `Forms`
--

CREATE TABLE `Forms` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `identification_num` int(11) NOT NULL,
  `academic_program` varchar(255) NOT NULL,
  `submitter_name` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Forms`
--

INSERT INTO `Forms` (`id`, `mail`, `identification_num`, `academic_program`, `submitter_name`, `created_at`) VALUES
(5, 'theo35420@gmail.com', 123456789, 'Administración de Empresas', 'theo', '2020-05-07');

-- --------------------------------------------------------

--
-- Structure de la table `Questions`
--

CREATE TABLE `Questions` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Questions`
--

INSERT INTO `Questions` (`id`, `value`, `type`, `category`) VALUES
(1, 'En las clases en vivo y tutorías, demuestro un alto conocimiento de los temas del espacio académico.', 1, 1),
(2, 'En las clases en vivo y tutorías, demuestro que estoy actualizado en los temas del espacio académico.', 1, 1),
(3, 'Respondo oportunamente los mensajes, foros, correos electrónicos y demás comunicaciones dentro del espacio académico.', 1, 2),
(4, 'Me comunico de manera clara y respetuosa.', 1, 2),
(5, 'Domino las herramientas de la plataforma para el desarrollo del espacio académico.', 1, 3),
(6, 'Propongo actividades que incentivan el uso de diferentes recursos digitales y herramientas tecnológicas dentro del espacio académico.', 1, 3),
(7, 'Propongo recursos en inglés relacionados con temas del espacio académico.', 1, 3),
(8, 'Explico de manera clara y precisa los temas del espacio académico.', 1, 4),
(9, 'Explico de manera clara y precisa las actividades que se proponen dentro del espacio académico.', 1, 4),
(10, 'Presento los contenidos de manera novedosa y creativa.', 1, 4),
(11, 'Realizo las clases en vivo y las tutorías cumpliendo con los horarios establecidos.', 1, 4),
(12, 'He desarrollado los temas propuestos en la guía didáctica según el cronograma establecido.', 1, 4),
(13, 'He desarrollado los temas propuestos en la guía didáctica según el cronograma establecido.', 1, 5),
(14, 'Socializo la guía didáctica y los criterios de evaluación al iniciar el espacio académico.', 1, 5),
(15, 'Utilizo las rúbricas para evaluar todas las actividades del espacio académico.', 1, 5),
(16, 'Motivo y acompaño a los estudiantes a alcanzar los resultados de aprendizaje esperados.', 1, 6),
(17, 'Genero un ambiente que fomenta la interacción y participación de los estudiantes.', 1, 6),
(18, 'Incentivo a los estudiantes a participar en eventos académicos, exposiciones o espacios culturales que complementan su formación profesional.', 1, 6),
(19, 'Promuevo la investigación formativa a partir estrategias como la indagación, la búsqueda de referentes o los estudios de caso dentro del espacio académico.', 1, 6),
(20, 'Como docente-tutor, ¿cuál es tu principal aporte al mejoramiento de la calidad educativa de la Uvirtual?', 2, 6),
(21, '¿Qué oportunidades y recomendaciones consideras que podrían mejorar tu desempeño como docente-tutor de la UVirtual?', 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `Question_Categories`
--

CREATE TABLE `Question_Categories` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Question_Categories`
--

INSERT INTO `Question_Categories` (`id`, `value`) VALUES
(1, 'Conocimiento disciplinar'),
(2, 'Comunicación'),
(3, 'Competencias digitales'),
(4, 'Pedagogía y didáctica'),
(5, 'Evaluación'),
(6, 'Disposición y motivación');

-- --------------------------------------------------------

--
-- Structure de la table `Question_Types`
--

CREATE TABLE `Question_Types` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Question_Types`
--

INSERT INTO `Question_Types` (`id`, `value`) VALUES
(1, 'multiple_choices'),
(2, 'text');

-- --------------------------------------------------------

--
-- Structure de la table `Responses`
--

CREATE TABLE `Responses` (
  `id` int(11) NOT NULL,
  `value` varchar(45) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_form` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Forms`
--
ALTER TABLE `Forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_UNIQUE` (`mail`),
  ADD UNIQUE KEY `identification_num_UNIQUE` (`identification_num`);

--
-- Index pour la table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Questions_Question_Types_idx` (`type`),
  ADD KEY `fk_Questions_Question_Categories1_idx` (`category`);

--
-- Index pour la table `Question_Categories`
--
ALTER TABLE `Question_Categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Question_Types`
--
ALTER TABLE `Question_Types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Responses`
--
ALTER TABLE `Responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Responses_Questions1_idx` (`id_question`),
  ADD KEY `fk_Responses_Forms1_idx` (`id_form`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Forms`
--
ALTER TABLE `Forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Questions`
--
ALTER TABLE `Questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `Question_Categories`
--
ALTER TABLE `Question_Categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Question_Types`
--
ALTER TABLE `Question_Types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Responses`
--
ALTER TABLE `Responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
