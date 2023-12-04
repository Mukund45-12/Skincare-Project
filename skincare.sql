-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 02:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatmessages`
--

CREATE TABLE `chatmessages` (
  `MessageID` int(11) NOT NULL,
  `ConsultationID` int(11) DEFAULT NULL,
  `SenderID` int(11) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `ConsultationID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `DermatologistID` int(11) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'Scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dermatologistrecommendations`
--

CREATE TABLE `dermatologistrecommendations` (
  `RecommendationID` int(11) NOT NULL,
  `RecommenderID` int(11) DEFAULT NULL,
  `RecommendedDermatologistID` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dermatologists`
--

CREATE TABLE `dermatologists` (
  ` Der ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `RecommendationScore` float NOT NULL,
  `VisitationHours` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact Info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user data`
--

CREATE TABLE `user data` (
  `UserID` int(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user data`
--

INSERT INTO `user data` (`UserID`, `Email`, `Phone`, `Password`) VALUES
(1, 'mukundprasad617@gmail.com', '0132282158', '@123'),
(2, 'rifah25@gmail.com', '0123565711', '#12'),
(3, 'atika11@yahoo.com', '0122542177', '$12'),
(4, 'aakash12@gmail.com', '0192154422', '^00'),
(5, 'ashok0@yahoo.com', '0323012410', 'as99');

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE `userfeedback` (
  `FeedbackID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `DermatologistID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatmessages`
--
ALTER TABLE `chatmessages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`ConsultationID`);

--
-- Indexes for table `dermatologistrecommendations`
--
ALTER TABLE `dermatologistrecommendations`
  ADD PRIMARY KEY (`RecommendationID`);

--
-- Indexes for table `dermatologists`
--
ALTER TABLE `dermatologists`
  ADD PRIMARY KEY (` Der ID`);

--
-- Indexes for table `user data`
--
ALTER TABLE `user data`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dermatologists`
--
ALTER TABLE `dermatologists`
  MODIFY ` Der ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user data`
--
ALTER TABLE `user data`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
