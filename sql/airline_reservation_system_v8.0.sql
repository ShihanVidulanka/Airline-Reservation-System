-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 07:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

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
(1, 'AZ-1234', 'Boeing 737', 18, 40, 130, 0),
(2, 'AZ-6969', 'Boeing 737', 28, 50, 110, 0),
(6, 'AZ-1897', 'Airbus A380', 45, 45, 45, 0),
(7, 'NZ-6789', 'Boeing 757', 23, 69, 110, 0);

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
('AST', 'Anarkatha Sinha Aiport', 'Belize', 'WesternSok', 'ART'),
('BIA', 'Bandaranaike International Airport', 'Katunayake', 'Western Province', 'Sri Lanka'),
('BKK', 'Suvarnabhumi Airport\n', ' Bangkok', 'Bang Phil', 'Thailand'),
('BOM', 'Chhatrapati Shivaji Maharaj International Airport', 'Mumbai', 'Maharashtra', 'India'),
('CGK', 'Soekarno–Hatta International Airport', 'Jakartha', 'Banten', 'Indonesia'),
('DEL', 'Indira Gandhi International Airport', 'New Delhi', 'New Delhi', 'India'),
('DMK', 'Don Mueang International Airport', 'Bangkok', 'Bangkok', 'Thailand'),
('DPS', 'Ngurah Rai International Airport', 'Bali', 'Bali', 'Indonesia'),
('HRI', 'Mattala Rajapaksa International Airport', 'Hambanthota', 'Southern ', 'Sri Lanka'),
('MAA', 'Chennai International Airport', 'Chennai', 'Tamilnadu', 'India'),
('SIN', 'Singapore Changi Airport', 'Singapore', 'Singapore', 'Singapore'),
('VSI', 'Varnawudu Airport', 'Cambodia', 'Western', 'Soki');

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
  `seat_type` int(1) NOT NULL,
  `state` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `flight_id`, `passenger_id`, `booking_time`, `ticket_price`, `seat_no`, `seat_type`, `state`) VALUES
(1, 1, 1, '2022-04-03 12:10:38', 200, 1, 1, 0);

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
  `departure_time` time NOT NULL,
  `departure_date` date NOT NULL,
  `flight_time` int(11) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `origin`, `destination`, `airplane_id`, `business_price`, `economy_price`, `platinum_price`, `departure_time`, `departure_date`, `flight_time`, `state`) VALUES
(1, 'BIA', 'BKK', 2, 100, 200, 350, '21:00:00', '2022-04-20', 360, 0),
(2, 'BIA', 'DMK', 2, 200, 300, 400, '00:45:00', '2022-04-24', 720, 0),
(3, 'BKK', 'SIN', 1, 100, 175, 150, '00:15:00', '2022-04-25', 240, 0),
(4, 'BIA', 'BKK', 1, 100, 200, 300, '12:25:30', '2022-04-20', 300, 0),
(5, 'DPS', 'BIA', 2, 145, 545, 200, '05:30:00', '2022-04-20', 360, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flight_dispatcher`
--

CREATE TABLE `flight_dispatcher` (
  `account_no` int(15) NOT NULL,
  `user_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `airport_code` varchar(5) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_dispatcher`
--

INSERT INTO `flight_dispatcher` (`account_no`, `user_id`, `first_name`, `last_name`, `airport_code`, `is_deleted`) VALUES
(1, 4, 'sahan', ' caldera', 'BIA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_no` int(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `passport_number` varchar(25) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `created_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `passenger_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_no`, `first_name`, `last_name`, `dob`, `passport_number`, `phone_no`, `is_deleted`, `created_date_time`, `passenger_id`) VALUES
(1, 'Yasith', 'Heshan', '1997-09-22', '0987654321-1234567890', 0, 0, '2022-03-30 10:34:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `operations_agent`
--

CREATE TABLE `operations_agent` (
  `account_no` int(15) NOT NULL,
  `user_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `airport_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operations_agent`
--

INSERT INTO `operations_agent` (`account_no`, `user_id`, `first_name`, `last_name`, `is_deleted`, `airport_code`) VALUES
(1, 3, 'Sathira', 'LIyanapathirana', 0, 'BIA');

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
(2, 1),
(3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_passenger`
--

CREATE TABLE `registered_passenger` (
  `account_no` int(15) NOT NULL,
  `user_id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `passport_number` varchar(25) NOT NULL,
  `category` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  `passenger_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_passenger`
--

INSERT INTO `registered_passenger` (`account_no`, `user_id`, `first_name`, `last_name`, `dob`, `passport_number`, `category`, `is_deleted`, `passenger_id`) VALUES
(1, 2, 'Harshani', 'Bandara', '1998-03-25', '1234567890-0987654321', 2, 0, 1),
(2, 5, 'Kasuni', 'Dayarathna', '2022-04-15', 'A2096457', 0, 0, 3);

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
(5, 4, '+94-778765432'),
(6, 5, '+94-719955178'),
(7, 5, '+94-719955170');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `account_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=REDUNDANT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `account_type`) VALUES
(1, 'Admin', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', '', 0),
(2, 'HarshaniBandara', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', '', 3),
(3, 'SathiraLyanapathirana', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', '', 1),
(4, 'SahanCaldera', '$2y$10$XwxseSnyw782C4n9CxsN/e8choRcyfKkXtVJQtDfMhkvN12ZL9Dfa', '', 2),
(5, 'KasuniDaya', '$2y$10$u/uNXNVA8T75AdSLEmaXeui7Jg7nJqxR3TM3U06SAAOd/ys757QvC', 'kasuni.19@cse.mrt.ac.lk', 3);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `passenger_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registered_passenger`
--
ALTER TABLE `registered_passenger`
  MODIFY `account_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `telephone_no`
--
ALTER TABLE `telephone_no`
  MODIFY `telephone_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `passenger_id_hold` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`),
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
