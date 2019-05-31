-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 04:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `B_Code` varchar(25) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Edition` varchar(15) NOT NULL,
  `Publisher` varchar(30) NOT NULL,
  `Price` int(10) NOT NULL,
  `Copies` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`B_Code`, `Title`, `Author`, `Edition`, `Publisher`, `Price`, `Copies`) VALUES
('102050', 'I can', 'Mengi', 'Nyambari', 'First edition', 50000, 10),
('102051', 'IT bench', 'Sarah', 'Multi', 'Third edition', 30000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `BI_ID` int(10) NOT NULL,
  `U_ID` varchar(20) NOT NULL,
  `B_Code` varchar(25) NOT NULL,
  `Date_Issued` date NOT NULL,
  `Date_Return` date NOT NULL,
  `Date_Returned` date NOT NULL,
  `Issue_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_ID` varchar(20) NOT NULL,
  `F_name` varchar(20) NOT NULL,
  `L_name` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `User_type` varchar(10) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `date_registered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_ID`, `F_name`, `L_name`, `Gender`, `Email`, `Phone`, `Address`, `User_type`, `Password`, `date_registered`) VALUES
('0001', 'Jacqueline', 'Hezron', 'Female', 'user@mail.com', '0755869620', 'Sinza', 'client', '', '2019-05-27'),
('LB001', 'Ibrahim', 'Musa', 'Male', 'lb1@mail.com', '0755893612', 'Ubungo', 'librarian', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2019-05-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`B_Code`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`BI_ID`),
  ADD KEY `U_ID` (`U_ID`,`B_Code`),
  ADD KEY `B_Code` (`B_Code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `BI_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD CONSTRAINT `book_issue_ibfk_1` FOREIGN KEY (`B_Code`) REFERENCES `book` (`B_Code`),
  ADD CONSTRAINT `book_issue_ibfk_2` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
