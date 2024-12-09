-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 10:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umove`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `BMI` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `profile_pic`, `BMI`) VALUES
(8, 'Fitch Ernest', 'De Vota', 'fitchpogi2133@gmail.com', '$2y$10$aLyfsX.tBiEMh1iAKBALeeyTL5haQwfXLehz2/O.koqXfjHNJXe2K', 'uploads/profile_6756afdc69c303.67233244.jpg', 0),
(9, 'Nea', 'Matradona', 'neamat@gmail.com', '$2y$10$sZKusYF7XfnaHFNO8qm2AOSifffLlj1v5SLHusjDLuuH6LF8qcrmW', 'uploads/profile_6755851e81a9c5.43491058.jpg', 0),
(10, 'Jasper', 'Erich', 'jaspererich@gmail.com', '$2y$10$0Mi2669JKvWuTK5CXhT.dOk2VP1HtQBhfY8K9ZLqp.XKVDK1NOaga', 'uploads/profile_675587090ad622.41968870.jpg', 0),
(11, 'Kyle', 'JB', 'kyle@gmail.com', '$2y$10$aWpU.WQzjNJcX3XkB/WwuungQvleB6jqqqSkASKciPtWQCgGqbeSi', 'uploads/profile_67558c4e2e2d64.89283870.jpg', 0),
(12, 'Chloe', 'Bautista', 'chloe@gmail.com', '$2y$10$878HREMPPjj4GysZVYm1huhmrUp8m4/MP0ZyxIQe5fExho86Np8iK', 'uploads/profile_6756aa2e6cacd7.55412222.jpg', 22.2222),
(13, 'jobelyn', 'lulu', 'jobelyn@gmail.com', '$2y$10$.ApkYJNi1OKVI4bLL8JTZOlgo0b/5LNvcErVOKVgIRSmihNQlOFCm', 'uploads/profile_6756af33c87a58.19048421.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
