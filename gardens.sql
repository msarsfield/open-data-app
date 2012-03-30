-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2012 at 05:53 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sars0005`
--

-- --------------------------------------------------------

--
-- Table structure for table `gardens`
--

CREATE TABLE IF NOT EXISTS `gardens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `street_address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `gardens`
--

INSERT INTO `gardens` (`id`, `name`, `longitude`, `latitude`, `street_address`) VALUES
(1, 'Bethany Church Community Garden', -75.7734, 45.3455, '382 Centrepointe Dr.'),
(2, 'Bytown Urban Gardens (BUGs) CG', -75.6988, 45.405, '75 Glendale Ave.'),
(3, 'Carlington Community Garden', -75.7346, 45.3828, '900 Merivale Rd.'),
(4, 'Centretown Community Garden', -75.7017, 45.4152, '461 Lisgar St.'),
(5, 'Chateau Donald Community Garden', -75.6577, 45.4293, '251 Donald St.'),
(6, 'Children''s Garden', -75.676, 45.4061, '321 Main St.'),
(7, 'Debra Dynes Family House Community Garden', -75.706, 45.3681, '955 Debra Ave.'),
(8, 'Friendship Community Garden', -75.6362, 45.4274, '1240/1244 Donald St.'),
(9, 'Gloucester Allotment Gardens', -75.5677, 45.4206, 'N/A Corner of Weir and Anderson'),
(10, 'GO-VEG (Glebe Organic Vegetable Garden) / Corpus-Christi Children''s Garden', -75.692, 45.4013, '185 Fifth Ave.'),
(11, 'Go Green Community Garden', -75.6893, 45.4211, '110 Laurier Ave.'),
(12, 'Jardin Arrowsmith Thyme-Less Community Garden', -75.5954, 45.4386, '2040 Arrowsmith Drive'),
(13, 'Jardin Communautaire Orleans Community Garden', -75.4989, 45.4838, '3350 St Joseph Blvd.'),
(14, 'Jardin Communautaire Vanier Community Garden', -75.6586, 45.4437, '300 des Peres Blancs.'),
(15, 'Kilborn Allotment Garden', -75.6388, 45.3908, '1909/1975 Kilborn Ave.'),
(16, 'Leslie Park Community Garden', -75.7879, 45.3341, '31 Abingdon Dr.'),
(17, 'Lowertown/Basseville Community Garden', -75.6818, 45.4348, '40 Cobourg st.'),
(18, 'Michele Heights Community Garden', -75.8006, 45.3552, '2955 Michelle Dr.'),
(19, 'Nanny Goat Hill Community Garden', -75.7075, 45.4153, '575/551 Laurier Ave. West'),
(20, 'Nepean Allotment Garden', -75.718, 45.3465, '230 Viewmont'),
(21, 'Operation Go Home Community Garden', -75.6908, 45.4311, '179 Murray St.'),
(22, 'Ottawa East Community Garden', -75.6756, 45.4081, '249/223/175 Main St.'),
(23, 'Rochester Heights Children''s Garden', -75.7084, 45.4045, '299 Rochester St.'),
(24, 'Sandy Hill CG', -75.668, 45.4199, '3 Hurdman Rd.'),
(25, 'Somali CG', -75.6392, 45.3896, '1975 Kilborn Ave.'),
(26, 'Strathcona Heights Community Garden', -75.6694, 45.4187, '3 Hurdman Rd.'),
(27, 'Sweet Willow Community Garden', -75.7134, 45.4118, '31 Rochester St.'),
(28, 'Van Lang CG', -75.7556, 45.3957, '295 Churchill Ave.'),
(29, 'Viscount Alexander CG', -75.6747, 45.4203, '55 Mann Ave.'),
(30, 'West Barrhaven Community Garden', -75.7577, 45.271, '3058 Jockvale Rd.'),
(31, 'Bethany Church Community Garden', -75.7734, 45.3455, '382 Centrepointe Dr.'),
(32, 'Bytown Urban Gardens (BUGs) CG', -75.6988, 45.405, '75 Glendale Ave.'),
(33, 'Carlington Community Garden', -75.7346, 45.3828, '900 Merivale Rd.'),
(34, 'Centretown Community Garden', -75.7017, 45.4152, '461 Lisgar St.'),
(35, 'Chateau Donald Community Garden', -75.6577, 45.4293, '251 Donald St.'),
(36, 'Children''s Garden', -75.676, 45.4061, '321 Main St.'),
(37, 'Debra Dynes Family House Community Garden', -75.706, 45.3681, '955 Debra Ave.'),
(38, 'Friendship Community Garden', -75.6362, 45.4274, '1240/1244 Donald St.'),
(39, 'Gloucester Allotment Gardens', -75.5677, 45.4206, 'N/A Corner of Weir and Anderson'),
(40, 'GO-VEG (Glebe Organic Vegetable Garden) / Corpus-Christi Children''s Garden', -75.692, 45.4013, '185 Fifth Ave.'),
(41, 'Go Green Community Garden', -75.6893, 45.4211, '110 Laurier Ave.'),
(42, 'Jardin Arrowsmith Thyme-Less Community Garden', -75.5954, 45.4386, '2040 Arrowsmith Drive'),
(43, 'Jardin Communautaire Orleans Community Garden', -75.4989, 45.4838, '3350 St Joseph Blvd.'),
(44, 'Jardin Communautaire Vanier Community Garden', -75.6586, 45.4437, '300 des Peres Blancs.'),
(45, 'Kilborn Allotment Garden', -75.6388, 45.3908, '1909/1975 Kilborn Ave.'),
(46, 'Leslie Park Community Garden', -75.7879, 45.3341, '31 Abingdon Dr.'),
(47, 'Lowertown/Basseville Community Garden', -75.6818, 45.4348, '40 Cobourg st.'),
(48, 'Michele Heights Community Garden', -75.8006, 45.3552, '2955 Michelle Dr.'),
(49, 'Nanny Goat Hill Community Garden', -75.7075, 45.4153, '575/551 Laurier Ave. West'),
(50, 'Nepean Allotment Garden', -75.718, 45.3465, '230 Viewmont'),
(51, 'Operation Go Home Community Garden', -75.6908, 45.4311, '179 Murray St.'),
(52, 'Ottawa East Community Garden', -75.6756, 45.4081, '249/223/175 Main St.'),
(53, 'Rochester Heights Children''s Garden', -75.7084, 45.4045, '299 Rochester St.'),
(54, 'Sandy Hill CG', -75.668, 45.4199, '3 Hurdman Rd.'),
(55, 'Somali CG', -75.6392, 45.3896, '1975 Kilborn Ave.'),
(56, 'Strathcona Heights Community Garden', -75.6694, 45.4187, '3 Hurdman Rd.'),
(57, 'Sweet Willow Community Garden', -75.7134, 45.4118, '31 Rochester St.'),
(58, 'Van Lang CG', -75.7556, 45.3957, '295 Churchill Ave.'),
(59, 'Viscount Alexander CG', -75.6747, 45.4203, '55 Mann Ave.'),
(60, 'West Barrhaven Community Garden', -75.7577, 45.271, '3058 Jockvale Rd.');
