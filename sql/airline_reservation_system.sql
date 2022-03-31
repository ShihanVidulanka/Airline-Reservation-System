-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 02:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplane`
--

CREATE TABLE `airplane` (
  `id` int(5) NOT NULL,
  `tail_no` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `no_platinum_seats` int(3) NOT NULL,
  `no_economy_seats` int(3) NOT NULL,
  `no_business_seats` int(3) NOT NULL,
  `in_service` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airplane`
--

INSERT INTO `airplane` (`id`, `tail_no`, `model`, `no_platinum_seats`, `no_economy_seats`, `no_business_seats`, `in_service`) VALUES
(1, 'AZ-1234', 'Boeing 737', 18, 40, 130, 1),
(2, 'AZ-6969', 'Boeing 737', 28, 50, 110, 0);

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_code` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_code`, `name`, `city`, `province`, `country`) VALUES
('BIA', 'Bandaranaike International Airport', 'Katunayake', 'Western Province', 'Sri Lanka'),
('BKK', 'Suvarnabhumi Airport\n', ' Bangkok', 'Bang Phil', 'Thailand'),
('BOM', 'Chhatrapati Shivaji Maharaj International Airport', 'Mumbai', 'Maharashtra', 'India'),
('CGK', 'Soekarno–Hatta International Airport', 'Jakartha', 'Banten', 'Indonesia'),
('DEL', 'Indira Gandhi International Airport', 'New Delhi', 'New Delhi', 'India'),
('DMK', 'Don Mueang International Airport', 'Bangkok', 'Bangkok', 'Thailand'),
('DPS', 'Ngurah Rai International Airport', 'Bali', 'Bali', 'Indonesia'),
('HRI', 'Mattala Rajapaksa International Airport', 'Hambanthota', 'Southern ', 'Sri Lanka'),
('MAA', 'Chennai International Airport', 'Chennai', 'Tamilnadu', 'India'),
('SIN', 'Singapore Changi Airport', 'Singapore', 'Singapore', 'Singapore');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `flight_id` int(8) NOT NULL,
  `passenger_id` int(15) NOT NULL,
  `booking_time` datetime NOT NULL DEFAULT current_timestamp(),
  `ticket_price` float NOT NULL,
  `seat_no` int(3) NOT NULL,
  `seat_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(8) NOT NULL,
  `origin` varchar(5) NOT NULL,
  `destination` varchar(5) NOT NULL,
  `airplane_id` int(5) NOT NULL,
  `business_price` float NOT NULL,
  `economy_price` float NOT NULL,
  `platinum_price` float NOT NULL,
  `flight_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `departure_date` date NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flight_dispatcher`
--

CREATE TABLE `flight_dispatcher` (
  `account_no` int(15) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `airport_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_dispatcher`
--

INSERT INTO `flight_dispatcher` (`account_no`, `user_id`, `name`, `airport_code`) VALUES
(1, 4, 'sahan caldera', 'BIA');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_no` int(15) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `passport_number` varchar(25) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `state` int(1) NOT NULL,
  `created_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `passenger_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_no`, `NIC`, `name`, `age`, `passport_number`, `phone_no`, `state`, `created_date_time`, `passenger_id`) VALUES
(1, '987654321V', 'Yasith Heshan', 24, '0987654321-1234567890', 0, 0, '2022-03-30 10:34:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `operations_agent`
--

CREATE TABLE `operations_agent` (
  `account_no` int(15) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state` int(1) NOT NULL,
  `airport_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operations_agent`
--

INSERT INTO `operations_agent` (`account_no`, `user_id`, `name`, `state`, `airport_code`) VALUES
(1, 3, 'Sathira LIyanapathirana', 0, 'CMB');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` int(15) NOT NULL,
  `passenger_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `passenger_type`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registered_passenger`
--

CREATE TABLE `registered_passenger` (
  `account_no` int(15) NOT NULL,
  `user_id` int(20) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `passport_number` varchar(25) NOT NULL,
  `category` int(1) NOT NULL,
  `state` int(1) NOT NULL,
  `passenger_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_passenger`
--

INSERT INTO `registered_passenger` (`account_no`, `user_id`, `NIC`, `name`, `age`, `passport_number`, `category`, `state`, `passenger_id`) VALUES
(1, 2, '123456789V', 'Harshani Bandara', 22, '1234567890-0987654321', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `telephone_no`
--

CREATE TABLE `telephone_no` (
  `telephone_id` int(20) NOT NULL,
  `user_id` int(15) NOT NULL,
  `phone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telephone_no`
--

INSERT INTO `telephone_no` (`telephone_id`, `user_id`, `phone_no`) VALUES
(1, 1, '+94-771234567'),
(2, 2, '+94-721234567'),
(3, 3, '+94-711234567'),
(4, 3, '+94-701234567'),
(5, 4, '+94-778765432');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `account_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `account_type`) VALUES
(1, 'Admin', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', 0),
(2, 'HarshaniBandara', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', 3),
(3, 'SathiraLyanapathirana', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', 1),
(4, 'SahanCaldera', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airplane`
--
ALTER TABLE `airplane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_code`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booked_by` (`passenger_id`),
  ADD KEY `select` (`flight_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fly_from` (`origin`),
  ADD KEY `fly_to` (`destination`),
  ADD KEY `use` (`airplane_id`);

--
-- Indexes for table `flight_dispatcher`
--
ALTER TABLE `flight_dispatcher`
  ADD PRIMARY KEY (`account_no`),
  ADD KEY `flight_dispatcher_work_in` (`airport_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_no`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `operations_agent`
--
ALTER TABLE `operations_agent`
  ADD PRIMARY KEY (`account_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `registered_passenger`
--
ALTER TABLE `registered_passenger`
  ADD PRIMARY KEY (`account_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `telephone_no`
--
ALTER TABLE `telephone_no`
  ADD PRIMARY KEY (`telephone_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airplane`
--
ALTER TABLE `airplane`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight_dispatcher`
--
ALTER TABLE `flight_dispatcher`
  MODIFY `account_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operations_agent`
--
ALTER TABLE `operations_agent`
  MODIFY `account_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registered_passenger`
--
ALTER TABLE `registered_passenger`
  MODIFY `account_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telephone_no`
--
ALTER TABLE `telephone_no`
  MODIFY `telephone_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `select` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `fly_from` FOREIGN KEY (`origin`) REFERENCES `airport` (`airport_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fly_to` FOREIGN KEY (`destination`) REFERENCES `airport` (`airport_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `use` FOREIGN KEY (`airplane_id`) REFERENCES `airplane` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight_dispatcher`
--
ALTER TABLE `flight_dispatcher`
  ADD CONSTRAINT `flight_dispatcher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_dispatcher_work_in` FOREIGN KEY (`airport_code`) REFERENCES `airport` (`airport_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`);

--
-- Constraints for table `operations_agent`
--
ALTER TABLE `operations_agent`
  ADD CONSTRAINT `operations_agent_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered_passenger`
--
ALTER TABLE `registered_passenger`
  ADD CONSTRAINT `registered_passenger_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registered_passenger_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`);

--
-- Constraints for table `telephone_no`
--
ALTER TABLE `telephone_no`
  ADD CONSTRAINT `telephone_no_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
