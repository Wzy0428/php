-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2024 at 10:26 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whats_happening`
--

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventID` int NOT NULL,
  `EventTypeID` int NOT NULL,
  `GroupID` int NOT NULL,
  `EventDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SubmitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EventTitle` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `EventImage` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `EventDesc` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`EventID`, `EventTypeID`, `GroupID`, `EventDate`, `SubmitDate`, `EventTitle`, `EventImage`, `EventDesc`) VALUES
(1, 5, 1, '2024-02-26 02:00:00', '2024-01-04 05:11:38', 'Support Spay and Neuter Day', 'files/images/events/animal1.jpg', 'Nullam id pellentesque ante. Vestibulum in convallis mauris.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem. Curabitur eleifend maximus finibus. Phasellus sagittis porttitor augue ut commodo.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem.'),
(2, 3, 6, '2024-02-26 15:00:00', '2024-01-11 01:11:38', 'Come Skate on the Oval', 'files/images/events/skate3.jpg', 'Nunc vel commodo sapien. Phasellus ac enim sit amet ligula congue scelerisque sit amet quis tellus.Ut tincidunt nibh sapien, nec interdum eros fringilla in.'),
(3, 3, 8, '2024-02-28 00:00:00', '2024-01-15 09:07:28', 'Learn to Ski', 'files/images/events/ski6.jpg', 'Aliquam consequat, est et posuere maximus, magna arcu dapibus justo. Nulla euismod elit in mauris dignissim auctor.'),
(4, 4, 2, '2024-02-28 21:00:00', '2024-02-01 18:08:44', 'Food/Wine Pairing', 'files/images/events/food1.jpg', 'Aenean odio ante, efficitur vel porttitor id, imperdiet ut urna. Ut tincidunt nibh sapien, nec interdum eros fringilla in. Cras accumsan rutrum arcu ac congue. Integer finibus velit eu elementum rutrum.'),
(5, 2, 3, '2024-03-01 22:00:00', '2024-02-18 13:18:10', 'Exhibition of Local Dance', 'files/images/events/dance1.jpg', 'Sed sit amet urna sed nisl lobortis pharetra sit amet at nulla. Nulla euismod elit in mauris dignissim auctor. Aenean a diam non turpis mollis auctor ac quis est.'),
(6, 5, 4, '2024-03-08 20:00:00', '2024-02-21 01:27:33', 'Local Bands compete to raise funds for national competition', 'files/images/events/music1.jpg', 'Ut ligula metus, pretium non dapibus dictum, rutrum at magna. Pellentesque et lorem in diam pharetra cursus eget et ex. Integer finibus velit eu elementum rutrum.'),
(7, 5, 1, '2024-06-02 19:00:00', '2024-02-18 14:16:11', 'Meet, Greet and Adapt Day', 'files/images/events/animal3.jpg', 'Nullam id pellentesque ante. Vestibulum in convallis mauris.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem. Curabitur eleifend maximus finibus. Phasellus sagittis porttitor augue ut commodo.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem.'),
(8, 5, 5, '2024-06-25 20:00:00', '2024-02-14 13:08:11', 'Auction of local art to support local arts', 'files/images/events/art1.jpg', 'Quisque vel rutrum est. Donec in turpis nec enim tincidunt eleifend vel eu nunc.Varius eget gravida eu, ullamcorper vitae sem.'),
(9, 1, 4, '2024-07-29 21:00:00', '2024-02-18 01:31:26', 'Spring Concert', 'files/images/events/music2.jpg', 'Mperdiet ut urna. Ut tincidunt nibh sapien, nec interdum eros fringilla in. Cras accumsan rutrum arcu ac congue. Integer finibus velit eu elementum rutrum'),
(10, 4, 2, '2024-06-30 18:00:00', '2024-02-20 01:31:26', 'Spring Hamper - Get Yours', 'files/images/events/food7.jpg', 'llperdiet ut urna. Ut tincidunt nibh sapien, nec interdum eros fringilla in. Cras accumsan rutrum arcu ac congue. Integer finibus velit eu elementum rutrum');

-- --------------------------------------------------------

--
-- Table structure for table `EventTypes`
--

CREATE TABLE `EventTypes` (
  `EventTypeID` int NOT NULL,
  `EventType` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EventTypes`
--

INSERT INTO `EventTypes` (`EventTypeID`, `EventType`) VALUES
(1, 'Music'),
(2, 'Art+Culture'),
(3, 'Sports'),
(4, 'Food'),
(5, 'Fund Raiser');

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `GroupID` int NOT NULL,
  `GroupName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `GroupImage` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `GroupType` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `GroupDesc` text COLLATE utf8mb4_general_ci NOT NULL,
  `ContactName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ContactEmail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`GroupID`, `GroupName`, `GroupImage`, `GroupType`, `GroupDesc`, `ContactName`, `ContactEmail`) VALUES
(1, 'Human Society', 'files/images/Groups/HumanSociety.jpg', 'Animal Shelter', 'ullam id pellentesque ante. Vestibulum in convallis mauris.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem. Curabitur eleifend maximus finibus. Phasellus sagittis porttitor augue ut commodo.Duis dolor augue, varius eget gravida eu, ullamcorper vitae sem.', 'Petra Barn', 'pb@hs.com'),
(2, 'Eat Local', 'files/images/Groups/EatLocal.jpg', 'Promotes Local Farms', 'Aenean odio ante, efficitur vel porttitor id, imperdiet ut urna. Ut tincidunt nibh sapien, nec interdum eros fringilla in. Cras accumsan rutrum arcu ac congue. Integer finibus velit eu elementum rutrum.', 'Joe Farm', 'joe@farms.com'),
(3, 'Dance NS', 'files/images/Groups/DanceNS.jpg', 'Dance for Youth', 'Sed sit amet urna sed nisl lobortis pharetra sit amet at nulla. Nulla euismod elit in mauris dignissim auctor. Aenean a diam non turpis mollis auctor ac quis est.', 'Ami Gien', 'ami@NSD.com'),
(4, 'Youth Band', 'files/images/Groups/YouthBand.jpg', 'Promotes Local School Bands', 'Ut ligula metus, pretium non dapibus dictum, rutrum at magna. Pellentesque et lorem in diam pharetra cursus eget et ex. Integer finibus velit eu elementum rutrum.', 'Drum Trumpet', 'DT@band.com'),
(5, 'Nocturne Association', 'files/images/Groups/Nocturne.jpg', 'Showcasing and supporting local art', 'Quisque vel rutrum est. Donec in turpis nec enim tincidunt eleifend vel eu nunc.Varius eget gravida eu, ullamcorper vitae sem.', 'P Blue', 'pb@nocturne.com'),
(6, 'Outdoor Skating Group', 'files/images/Groups/Outdoor_Skate.jpg', 'Organizes outdoor skating', 'Nunc vel commodo sapien. Phasellus ac enim sit amet ligula congue scelerisque sit amet quis tellus.Ut tincidunt nibh sapien, nec interdum eros fringilla in. ', 'Blade Fast', 'bf@rink.com'),
(7, 'NS Soccer Association', 'files/images/Groups/NS_Soccer.jpg', 'Organzies youth soccer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consequat, est et posuere maximus, magna arcu dapibus justo, ac congue dui dui sed tellus. Aliquam bibendum efficitur lacinia. Quisque ac pellentesque turpis', 'Soca Foot', 'soca@soccer.com'),
(8, 'NS Ski School', 'files/images/Groups/NS_Ski.jpg', 'Downhill skiing', 'Aliquam consequat, est et posuere maximus, magna arcu dapibus justo.', 'SK Downing', 'sk@hill.com');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `AccountID` int NOT NULL,
  `GroupID` int NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`AccountID`, `GroupID`, `Username`, `Password`) VALUES
(1, 1, 'humanS', 'abc123'),
(2, 2, 'locals', 'abc123'),
(3, 3, 'dancer', 'abc123'),
(4, 4, 'bands', 'abc123'),
(5, 5, 'nocturne', 'abc123'),
(6, 6, 'skate', 'abc123'),
(7, 7, 'soccer', 'abc123'),
(8, 8, 'skiNS', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `EventTypeID` (`EventTypeID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- Indexes for table `EventTypes`
--
ALTER TABLE `EventTypes`
  ADD PRIMARY KEY (`EventTypeID`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `EventID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `EventTypes`
--
ALTER TABLE `EventTypes`
  MODIFY `EventTypeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `GroupID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `AccountID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Events`
--
ALTER TABLE `Events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`EventTypeID`) REFERENCES `EventTypes` (`EventTypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`GroupID`) REFERENCES `Groups` (`GroupID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Login`
--
ALTER TABLE `Login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`GroupID`) REFERENCES `Groups` (`GroupID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
