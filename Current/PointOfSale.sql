-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2018 at 05:03 AM
-- Server version: 8.0.11
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PointOfSale`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contains`
--

CREATE TABLE `Contains` (
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Notes` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Contains`
--

INSERT INTO `Contains` (`OrderID`, `ItemID`, `Quantity`, `Notes`) VALUES
(14, 1, 1, NULL),
(14, 2, 1, NULL),
(14, 3, 1, NULL),
(15, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `TableNo` int(11) DEFAULT NULL,
  `Street` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `Zip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerID`, `email`, `FirstName`, `LastName`, `DOB`, `TableNo`, `Street`, `City`, `State`, `Zip`) VALUES
(1, 'foo@bar.com', 'Stu', 'Disco', '1986-11-26', 1, '111 Gamble', 'Honolulu', 'HI', 96666),
(2, 'foo2@bar.com', 'Disco', 'Stu', '2002-04-07', 7, '123 Fake', 'Honolulu', 'OH', 77777),
(3, 'sddenning@gmail.com', 'Sean', 'Denning', '1987-11-27', 3, '133 21st St.', 'Honolulu', 'HI', 96818),
(4, 'sasanner@yahoo.com', 'Sarah', 'Denning', '1999-01-01', 3, '133 21st St.', 'Honolulu', 'HI', 96818),
(5, 'sddenning1@gmail.com', 'Grandma', 'Denning', '1955-11-11', 2, '133 21st St.', 'Honolulu', 'HI', 96818);

-- --------------------------------------------------------

--
-- Table structure for table `CustOrder`
--

CREATE TABLE `CustOrder` (
  `OrderID` int(11) NOT NULL,
  `Tip` double DEFAULT '0',
  `TimePlaced` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('Placed','Ready','Served','Closed') NOT NULL DEFAULT 'Placed',
  `SubTotal` double NOT NULL DEFAULT '0',
  `Notes` varchar(45) DEFAULT NULL,
  `CustomerID` int(11) NOT NULL,
  `EmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CustOrder`
--

INSERT INTO `CustOrder` (`OrderID`, `Tip`, `TimePlaced`, `Status`, `SubTotal`, `Notes`, `CustomerID`, `EmpID`) VALUES
(11, 0, '2018-06-26 15:59:55', 'Ready', 0, NULL, 1, 1),
(12, 0, '2018-06-26 16:53:07', 'Placed', 0, NULL, 2, 2),
(13, 2, '2018-06-26 16:53:10', 'Served', 0, NULL, 1, 1),
(14, 2, '2018-06-26 16:53:12', 'Placed', 5.55, NULL, 1, 1),
(15, 6, '2018-06-26 18:48:50', 'Placed', 22.4, NULL, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Ingredient`
--

CREATE TABLE `Ingredient` (
  `Name` varchar(45) NOT NULL,
  `Supplier` varchar(45) NOT NULL,
  `Cost` double DEFAULT NULL,
  `Inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ingredient`
--

INSERT INTO `Ingredient` (`Name`, `Supplier`, `Cost`, `Inventory`) VALUES
('Cinnamon', 'mc', 5.55, 60),
('harry', 'mc', 5.6, 60),
('henry', 'mc', 5.55, 60),
('Marsala', 'grant', 50, 66),
('poppy', 'mc', 5.6, 60),
('potatoes', 'idaho', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `MenuItem`
--

CREATE TABLE `MenuItem` (
  `ItemID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Size` enum('Small','Medium','Large') DEFAULT NULL,
  `Cost` double NOT NULL,
  `AgeRestriction` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MenuItem`
--

INSERT INTO `MenuItem` (`ItemID`, `Name`, `Size`, `Cost`, `AgeRestriction`) VALUES
(1, 'enchiladas', 'Medium', 5.6, 'No'),
(2, 'huevos', 'Medium', 6, 'No'),
(3, 'henry', 'Medium', 5.55, 'No'),
(4, 'chili mac', 'Large', 10, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `Places`
--

CREATE TABLE `Places` (
  `CustomerID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Requires`
--

CREATE TABLE `Requires` (
  `ItemID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Requires`
--

INSERT INTO `Requires` (`ItemID`, `Name`, `Quantity`) VALUES
(3, 'henry', 1),
(4, 'Marsala', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Server`
--

CREATE TABLE `Server` (
  `EmpID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `SSN` varchar(11) DEFAULT NULL,
  `Wages` double NOT NULL DEFAULT '0',
  `Tips` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Server`
--

INSERT INTO `Server` (`EmpID`, `FirstName`, `LastName`, `SSN`, `Wages`, `Tips`) VALUES
(1, 'Sean', 'Dean', '111-11-1111', 5.11, 4),
(2, 'Jimmie', 'Dean', '222-22-2222', 4.5, 0),
(5, 'Sean', 'Denning', '333-33-3333', 5.55, 6),
(6, 'Sarah', 'Denning', '555-55-5555', 5.55, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Takes`
--

CREATE TABLE `Takes` (
  `EmpID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contains`
--
ALTER TABLE `Contains`
  ADD PRIMARY KEY (`OrderID`,`ItemID`),
  ADD KEY `ItemID_idx` (`ItemID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `CustOrder`
--
ALTER TABLE `CustOrder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `Ingredient`
--
ALTER TABLE `Ingredient`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `MenuItem`
--
ALTER TABLE `MenuItem`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `Places`
--
ALTER TABLE `Places`
  ADD PRIMARY KEY (`CustomerID`,`OrderID`),
  ADD KEY `OrderID_idx` (`OrderID`);

--
-- Indexes for table `Requires`
--
ALTER TABLE `Requires`
  ADD PRIMARY KEY (`ItemID`,`Name`),
  ADD KEY `Name_idx` (`Name`);

--
-- Indexes for table `Server`
--
ALTER TABLE `Server`
  ADD PRIMARY KEY (`EmpID`),
  ADD UNIQUE KEY `SSN_UNIQUE` (`SSN`);

--
-- Indexes for table `Takes`
--
ALTER TABLE `Takes`
  ADD PRIMARY KEY (`EmpID`,`OrderID`),
  ADD KEY `OrderID_idx` (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `CustOrder`
--
ALTER TABLE `CustOrder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `MenuItem`
--
ALTER TABLE `MenuItem`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Server`
--
ALTER TABLE `Server`
  MODIFY `EmpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Contains`
--
ALTER TABLE `Contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `custorder` (`orderid`),
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `menuitem` (`itemid`);

--
-- Constraints for table `Places`
--
ALTER TABLE `Places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `custorder` (`orderid`),
  ADD CONSTRAINT `places_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `Requires`
--
ALTER TABLE `Requires`
  ADD CONSTRAINT `requires_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `menuitem` (`itemid`),
  ADD CONSTRAINT `requires_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `ingredient` (`name`);

--
-- Constraints for table `Takes`
--
ALTER TABLE `Takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `custorder` (`orderid`),
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`EmpID`) REFERENCES `server` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
