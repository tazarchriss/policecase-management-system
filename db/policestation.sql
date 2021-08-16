-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `policestation`
--

-- --------------------------------------------------------

--
-- Table structure for table `accused`
--

CREATE TABLE `accused` (
  `accusedId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `accusedcfname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accusedcphone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accused`
--

INSERT INTO `accused` (`accusedId`, `userId`, `accusedcfname`, `accusedcphone`, `occupation`) VALUES
(7, 41, 'maneno cahaku', '0176516514', 'mwalimu');

-- --------------------------------------------------------

--
-- Table structure for table `accuser`
--

CREATE TABLE `accuser` (
  `accuserId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `officerId` int(11) NOT NULL,
  `cfname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cphone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accuser`
--

INSERT INTO `accuser` (`accuserId`, `userId`, `officerId`, `cfname`, `cphone`, `occupation`) VALUES
(26, 40, 1, 'maneno chaku', '0766543432', 'mkuliima');

-- --------------------------------------------------------

--
-- Table structure for table `case_seq`
--

CREATE TABLE `case_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_seq`
--

INSERT INTO `case_seq` (`id`) VALUES
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtId` int(11) NOT NULL,
  `regionId` int(11) NOT NULL,
  `districtName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtId`, `regionId`, `districtName`) VALUES
(1, 2, 'KININDONI');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `evidenceId` int(11) NOT NULL,
  `investId` int(11) NOT NULL,
  `attachment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment_size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `edescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`evidenceId`, `investId`, `attachment_name`, `attachment_size`, `downloads`, `edescription`) VALUES
(1, 1, 'cx', 122, 0, 'mahususi kabisa'),
(2, 2, 'ghfgf', 122, 1, 'gfhfghg'),
(3, 17, '15588685352741 (3).pdf', 442305, 3, 'report yamalehemu'),
(4, 18, '21734.pdf', 681351, 0, 'haikua rahisi');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `investId` int(11) NOT NULL,
  `officerId` int(11) NOT NULL,
  `caseId` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`investId`, `officerId`, `caseId`) VALUES
(17, 1, 'KCN002'),
(2, 1, 'KCN003'),
(18, 1, 'KCN003'),
(1, 2, 'KCN002'),
(15, 6, 'KCN003'),
(16, 6, 'KCN003');

-- --------------------------------------------------------

--
-- Table structure for table `policecase`
--

CREATE TABLE `policecase` (
  `caseId` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accuserId` int(11) NOT NULL,
  `accusedId` int(11) NOT NULL,
  `officerId` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whenOccur` datetime NOT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policecase`
--

INSERT INTO `policecase` (`caseId`, `accuserId`, `accusedId`, `officerId`, `title`, `description`, `whenOccur`, `progress`) VALUES
('KCN002', 26, 7, 1, 'wizi', 'kaiba mke wake', '2021-07-01 16:40:39', ' Investigate'),
('KCN003', 26, 7, 1, 'ubakaji', 'amembaka mwanae', '2021-07-01 16:40:39', 'investigate'),
('KCN004', 26, 7, 1, 'mauaji', 'mauaji ya albino', '2021-07-21 12:48:39', 'pending');

--
-- Triggers `policecase`
--
DELIMITER $$
CREATE TRIGGER `tg_policecase_insert` BEFORE INSERT ON `policecase` FOR EACH ROW BEGIN
  INSERT INTO case_seq VALUES (NULL);
  SET NEW.caseId = CONCAT('KCN', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `policeofficer`
--

CREATE TABLE `policeofficer` (
  `officerId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `rankId` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policeofficer`
--

INSERT INTO `policeofficer` (`officerId`, `userId`, `rankId`, `email`, `userName`, `password`) VALUES
(1, 39, 6, 'janeth123@gmail.com', 'janeth', '011c945f30ce2cbafc452f39840f025693339c42'),
(2, 42, 2, 'anitha@gmail.com', 'anitha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 43, 3, 'salma@gmail.com', 'salma', '011c945f30ce2cbafc452f39840f025693339c42'),
(6, 40, 5, 'janeth@gmail.com', 'janeth', '011c945f30ce2cbafc452f39840f025693339c42');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `rankId` int(11) NOT NULL,
  `rankName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rankId`, `rankName`) VALUES
(1, 'admin'),
(2, 'OCS'),
(3, 'OCCID'),
(4, 'Corporal'),
(5, 'Sergent'),
(6, 'Staff Sergent');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `regionId` int(11) NOT NULL,
  `regionName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`regionId`, `regionName`) VALUES
(1, 'morogoro'),
(2, 'dar es slaam');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `stationName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationId`, `districtId`, `stationName`) VALUES
(1, 1, 'Kinondoni Station');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `stationId` int(11) NOT NULL,
  `firstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritalStatus` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `stationId`, `firstName`, `middleName`, `lastName`, `phone`, `address`, `gender`, `maritalStatus`, `dob`, `created_at`) VALUES
(39, 1, 'janeth', 'king', 'vidal', '0788765654', 'kawe', 'male', 'Married', '2021-07-08', '2021-07-22 16:36:53'),
(40, 1, 'abely', 'kilalez', 'naisoni', '0765907513', 'morogoroo', 'female', 'single', '1999-07-14', '2021-07-22 16:38:02'),
(41, 1, 'omary', 'kasisi', 'kalonga', '0987678909', 'kinondoni', 'male', 'SINGLE', '1990-07-20', '2021-07-22 16:38:48'),
(42, 1, 'anitha', 'simon', 'migalo', '09764567', 'ilala', 'female', 'Single', '1991-07-15', '2021-07-23 17:35:00'),
(43, 1, 'salma', 'janeth', 'anitha', '0987678909', 'tandika', 'female', 'Single', '2000-07-08', '2021-07-23 17:37:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accused`
--
ALTER TABLE `accused`
  ADD PRIMARY KEY (`accusedId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `accuser`
--
ALTER TABLE `accuser`
  ADD PRIMARY KEY (`accuserId`),
  ADD KEY `userId` (`userId`,`officerId`),
  ADD KEY `userId_2` (`userId`,`officerId`),
  ADD KEY `officerId` (`officerId`);

--
-- Indexes for table `case_seq`
--
ALTER TABLE `case_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`),
  ADD KEY `regionId` (`regionId`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`evidenceId`),
  ADD KEY `investId` (`investId`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`investId`),
  ADD KEY `officerId` (`officerId`,`caseId`),
  ADD KEY `officerId_2` (`officerId`),
  ADD KEY `accusedId` (`caseId`);

--
-- Indexes for table `policecase`
--
ALTER TABLE `policecase`
  ADD PRIMARY KEY (`caseId`),
  ADD KEY `accuserId` (`accuserId`,`accusedId`),
  ADD KEY `accusedId` (`accusedId`),
  ADD KEY `officerId` (`officerId`);

--
-- Indexes for table `policeofficer`
--
ALTER TABLE `policeofficer`
  ADD PRIMARY KEY (`officerId`),
  ADD KEY `userId` (`userId`,`rankId`),
  ADD KEY `rankId` (`rankId`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rankId`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`regionId`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationId`),
  ADD KEY `districtId` (`districtId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `stationId` (`stationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accused`
--
ALTER TABLE `accused`
  MODIFY `accusedId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `accuser`
--
ALTER TABLE `accuser`
  MODIFY `accuserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `case_seq`
--
ALTER TABLE `case_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `evidenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `investId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `policeofficer`
--
ALTER TABLE `policeofficer`
  MODIFY `officerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `rankId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `regionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accused`
--
ALTER TABLE `accused`
  ADD CONSTRAINT `accused_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accuser`
--
ALTER TABLE `accuser`
  ADD CONSTRAINT `accuser_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accuser_ibfk_2` FOREIGN KEY (`officerId`) REFERENCES `policeofficer` (`officerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`regionId`) REFERENCES `region` (`regionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_ibfk_1` FOREIGN KEY (`investId`) REFERENCES `investigation` (`investId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investigation`
--
ALTER TABLE `investigation`
  ADD CONSTRAINT `investigation_ibfk_3` FOREIGN KEY (`officerId`) REFERENCES `policeofficer` (`officerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `investigation_ibfk_5` FOREIGN KEY (`caseId`) REFERENCES `policecase` (`caseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policecase`
--
ALTER TABLE `policecase`
  ADD CONSTRAINT `policecase_ibfk_1` FOREIGN KEY (`accusedId`) REFERENCES `accused` (`accusedId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `policecase_ibfk_2` FOREIGN KEY (`accuserId`) REFERENCES `accuser` (`accuserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `policecase_ibfk_3` FOREIGN KEY (`officerId`) REFERENCES `policeofficer` (`officerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policeofficer`
--
ALTER TABLE `policeofficer`
  ADD CONSTRAINT `policeofficer_ibfk_2` FOREIGN KEY (`rankId`) REFERENCES `rank` (`rankId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `policeofficer_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `station_ibfk_1` FOREIGN KEY (`districtId`) REFERENCES `district` (`districtId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`stationId`) REFERENCES `station` (`stationId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
