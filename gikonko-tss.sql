-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2025 at 10:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gikonko-tss`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `Mark_Id` int(11) NOT NULL,
  `Summative_Assessment` varchar(100) DEFAULT NULL,
  `Formative_Assessment` varchar(100) DEFAULT NULL,
  `Total_Marks` int(11) DEFAULT NULL,
  `Decision` varchar(100) DEFAULT NULL,
  `Trainee_Id` int(200) NOT NULL,
  `Module_Id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`Mark_Id`, `Summative_Assessment`, `Formative_Assessment`, `Total_Marks`, `Decision`, `Trainee_Id`, `Module_Id`) VALUES
(11, '30', '30', 60, 'Not Competent', 2, 1),
(12, '40', '40', 80, 'Competent', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `Module_Id` int(11) NOT NULL,
  `Module_Name` varchar(100) NOT NULL,
  `Trade_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`Module_Id`, `Module_Name`, `Trade_Id`) VALUES
(1, 'Php Programming', 2),
(4, 'Wall Elevation', 5),
(5, 'FINANCIAL ACCAUNTING', 4),
(6, 'Baby Style', 3),
(7, 'Clothes Designing', 3),
(8, 'UI/UX Design', 2),
(9, 'Develop backend by using Node js', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `Trade_id` int(11) NOT NULL,
  `Trade_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`Trade_id`, `Trade_name`) VALUES
(1, 'ELECTRICAL TECHNOLOGY'),
(2, 'ICT AND MULTMEDIA'),
(3, 'FASHION DESIGN'),
(4, 'FINANCIAL ACCAUNTING'),
(5, 'BUILDING CONSTRUCTION');

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

CREATE TABLE `trainees` (
  `Trainee_Id` int(11) NOT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `Gender` varchar(40) NOT NULL,
  `Trade_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainees`
--

INSERT INTO `trainees` (`Trainee_Id`, `Firstname`, `lastname`, `Gender`, `Trade_Id`) VALUES
(2, 'Berwa channise', 'Igitego', 'female', 2),
(3, 'etiene', 'niyomugabo (NET)', 'male', 1),
(4, 'kwizera', 'leon', 'male', 4),
(5, 'ERIC', 'kwizera', 'male', 5),
(6, 'NSABIYUMVA', 'regis', 'male', 2),
(7, 'manirakiza', 'pacifique', 'male', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `username`, `password`, `role`) VALUES
(3, 'DOS', '$2y$10$dV1gQewhTktjT.qbSO7wi.mm9WBinOr7nx8ofGfxsLNrikLdAK1ay', 'Dos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`Mark_Id`),
  ADD KEY `fk_marks_module` (`Module_Id`),
  ADD KEY `fk_marks_trainee` (`Trainee_Id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`Module_Id`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`Trade_id`);

--
-- Indexes for table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`Trainee_Id`),
  ADD KEY `Trade_Id` (`Trade_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `Mark_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `Module_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `Trade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `Trainee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `fk_marks_module` FOREIGN KEY (`Module_Id`) REFERENCES `modules` (`Module_Id`),
  ADD CONSTRAINT `fk_marks_trainee` FOREIGN KEY (`Trainee_Id`) REFERENCES `trainees` (`Trainee_Id`);

--
-- Constraints for table `trainees`
--
ALTER TABLE `trainees`
  ADD CONSTRAINT `trainees_ibfk_1` FOREIGN KEY (`Trade_Id`) REFERENCES `trades` (`Trade_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
