-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2025 at 06:37 PM
-- Server version: 8.0.39
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keyrentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int NOT NULL,
  `booking_userID` int NOT NULL,
  `booking_propertyID` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `booking_userID`, `booking_propertyID`, `check_in`, `check_out`, `total_price`, `status`) VALUES
(9, 1, 10, '2025-04-26', '2025-04-30', 1000.00, 'pending'),
(10, 1, 10, '2025-04-30', '2025-04-30', 0.00, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `landlordID` int NOT NULL,
  `landlordFirstName` varchar(45) NOT NULL,
  `landlordLastName` varchar(45) NOT NULL,
  `landlordEmail` varchar(45) NOT NULL,
  `landlordPhone` varchar(15) NOT NULL,
  `landlord_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `landlord`
--

INSERT INTO `landlord` (`landlordID`, `landlordFirstName`, `landlordLastName`, `landlordEmail`, `landlordPhone`, `landlord_password`) VALUES
(1, 'Denis', 'Maftei', 'badarica12@yahoo.com', '0852686750', '$2y$10$Md4mBne7bnmf6RwWMpPot.muyyM9A8j/KUHm6tAQJVi59WIdThJIG'),
(2, 'Testing', 'Testing', 'bada12@yahoo.com', '8927398273', '$2y$10$EFTrbzmS8zZyFPdYNGrn/uj/Y.WgNNlYqCtlhbAy9Tlq3f2Ex9ruC'),
(4, 'Testing', 'Testing', 'bada13@yahoo.com', '8927398273', '$2y$10$WAbrrNeFD5kanC3gocpgjeEv/GW5f37NT/3902r4yYVqrNkfjLSUS');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `propertyID` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `property_address` varchar(255) NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `availability` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `property_description` text,
  `image` varchar(255) DEFAULT NULL,
  `max_guests` int NOT NULL,
  `landlordID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`propertyID`, `title`, `property_address`, `price_per_night`, `property_type`, `availability`, `email`, `property_description`, `image`, `max_guests`, `landlordID`) VALUES
(10, 'Dubai Marina', '176 Marina Village', 250.00, 'Villa', '2025-04-24', 'badarica12@yahoo.com', '3 Bedrooms\r\n2 Bathrooms\r\n1 Kitchen\r\nLarge Garden with Pool', '../uploads/Villa7.png', 6, 1),
(11, 'Cozy Studio', '22 Main Street', 100.00, 'Villa', '2025-04-27', 'badarica12@yahoo.com', '3 bedrooms\r\n1 bathroom', '../uploads/Villa1.jpg', 3, 1),
(12, 'Spacious Loft', '27 High Street', 75.00, 'Apartment', '2025-04-27', 'badarica12@yahoo.com', '3 bedrooms\r\n1 bathroom\r\nsea view', '../uploads/Villa2.jpg', 2, 1),
(13, 'Beachside House', '10 Shoreline Drive', 150.00, 'Villa', '2025-04-27', 'badarica12@yahoo.com', '4 bedrooms\r\n2 bathrooms\r\n1 kitchen\r\nLarge garden', '../uploads/Villa4.jpg', 5, 1),
(14, 'Modern House', '12 Bayview Boulevard', 200.00, 'Villa', '2025-04-27', 'badarica12@yahoo.com', '6 bedrooms\r\n3 bathrooms\r\n2 kitchens\r\nLarge garden', '../uploads/Villa5.jpg', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `userFirstName` varchar(45) NOT NULL,
  `userLastName` varchar(45) NOT NULL,
  `userPhoneNumber` varchar(15) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirstName`, `userLastName`, `userPhoneNumber`, `userEmail`, `userPassword`) VALUES
(1, 'John', 'Doe', '1234567890', 'john.doe@yahoo.com', 'password123'),
(2, 'Jane', 'Smith', '9876543210', 'jane.smith@yahoo.com', 'password456'),
(3, 'Emily', 'Clark', '1112223333', 'emily.clark@yahoo.com', 'pass789'),
(4, 'Michael', 'Brown', '2223334444', 'michael.brown@yahoo.com', 'mikepass'),
(5, 'Sarah', 'Wilson', '3334445555', 'sarah.wilson@yahoo.com', 'sarah123'),
(6, 'David', 'Taylor', '4445556666', 'david.taylor@yahoo.com', 'davidpass'),
(7, 'Laura', 'Martinez', '5556667777', 'laura.martinez@yahoo.com', 'laura987'),
(8, 'James', 'Anderson', '6667778888', 'james.anderson@yahoo.com', 'jamespass'),
(9, 'Olivia', 'Thomas', '7778889999', 'olivia.thomas@yahoo.com', 'olivia321'),
(10, 'Daniel', 'Harris', '8889990000', 'daniel.harris@yahoo.com', 'daniel999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `booking_propertyID` (`booking_propertyID`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`landlordID`),
  ADD UNIQUE KEY `landlordEmail_UNIQUE` (`landlordEmail`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`propertyID`),
  ADD KEY `FK_LandlordID` (`landlordID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail_UNIQUE` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `landlord`
--
ALTER TABLE `landlord`
  MODIFY `landlordID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `propertyID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`booking_propertyID`) REFERENCES `properties` (`propertyID`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `FK_LandlordID` FOREIGN KEY (`landlordID`) REFERENCES `landlord` (`landlordID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
