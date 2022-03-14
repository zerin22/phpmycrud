-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2022 at 01:43 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmycrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(6) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` longtext,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(4, 'About Bangladesh', 'BD is a beautiful country', '', '2022-03-04 14:21:39', '2022-03-04 14:21:39'),
(5, 'About Ukarian', 'Russia attacked Ukrain 27 march', '', '2022-03-04 14:21:39', '2022-03-04 14:21:39'),
(6, 'About Russia', 'Russia starts war against USA ', '', '2022-03-04 14:21:39', '2022-03-04 14:21:39'),
(7, 'What is Lorem Ipsum?', '', '', '2022-03-05 04:09:25', '2022-03-05 04:09:25'),
(8, 'What is Lorem Ipsum?', ' It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2022-03-05 04:10:26', '2022-03-05 04:10:26'),
(9, 'Opuis-je men procurer?', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. Lavantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme Du texte.', '', '2022-03-05 04:13:05', '2022-03-05 04:13:05'),
(10, 'What is ', 'What is Lorem Ipsum?', '', '2022-03-05 04:15:14', '2022-03-06 00:18:58'),
(13, 'aaaaaaa', '', '', '2022-03-08 06:29:41', '2022-03-08 06:29:41'),
(17, 'Opuis-je men procurer?', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. Lavantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme Du texte.', '7266012154.jpg', '2022-03-14 13:38:40', '2022-03-14 13:38:40'),
(18, 'same image up', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. Lavantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme Du texte.', '6126715445.jpg', '2022-03-14 13:39:14', '2022-03-14 13:39:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
