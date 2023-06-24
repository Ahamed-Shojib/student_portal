-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 04:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `admin_pass` varchar(12) NOT NULL,
  `admin_depart` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `emp_id`, `name`, `email`, `admin_pass`, `admin_depart`) VALUES
(1, 1001, 'Mehedi Hasan Shojib', 'ahamed@cse.com', '123@abc', 'CSE'),
(10, 1049, 'Choton', 'chotonshil88@gmail.com', 'Choton@@', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `p_date` date NOT NULL,
  `present` varchar(10) NOT NULL,
  `absents` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `student_id`, `course_id`, `p_date`, `present`, `absents`) VALUES
(65, 212902069, 'CSE 101', '2023-06-23', 'Present', '0'),
(66, 212902070, 'CSE 101', '2023-06-23', 'Present', '0'),
(67, 221902001, 'CSE 101', '2023-06-23', 'Present', '0'),
(68, 212902069, 'CSE 101', '2023-06-23', 'Present', '0'),
(69, 212902070, 'CSE 101', '2023-06-23', 'Present', '0'),
(70, 221902001, 'CSE 101', '2023-06-23', 'Present', '0'),
(71, 212902069, 'CSE 101', '2023-06-23', '0', 'Absent'),
(72, 212902070, 'CSE 101', '2023-06-23', '0', 'Absent'),
(73, 221902001, 'CSE 101', '2023-06-23', '0', 'Absent'),
(74, 212902069, 'CSE 101', '2023-06-23', 'Present', '0'),
(75, 212902070, 'CSE 101', '2023-06-23', 'Present', '0'),
(76, 221902001, 'CSE 101', '2023-06-23', 'Present', '0'),
(77, 212902069, 'CSE 101', '2023-06-23', 'Present', '0'),
(78, 212902070, 'CSE 101', '2023-06-23', 'Present', '0'),
(79, 221902001, 'CSE 101', '2023-06-23', 'Present', '0'),
(80, 212902069, 'CSE 101', '2023-06-23', 'present', '0'),
(81, 212902070, 'CSE 101', '2023-06-23', 'present', '0'),
(82, 221902001, 'CSE 101', '2023-06-23', 'present', '0'),
(83, 212902069, 'CSE 101', '2023-06-23', 'present', '0'),
(84, 212902070, 'CSE 101', '2023-06-23', 'present', '0'),
(85, 221902001, 'CSE 101', '2023-06-23', 'present', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_offer`
--

CREATE TABLE `course_offer` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `credit` float NOT NULL,
  `price` int(11) NOT NULL,
  `schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course_offer`
--

INSERT INTO `course_offer` (`id`, `batch`, `semester`, `course_id`, `course_name`, `credit`, `price`, `schedule`) VALUES
(5, 212, 'Summer_21', 'CSE 101', 'Structrued Programming', 3, 4000, 'Fri(09:30 AM - 11:00 AM) Sat(08:00 AM - 09:30 AM)'),
(6, 211, 'Summer_22', 'CSE 102', 'C Programming', 2.5, 3500, 'Tue(09:30 AM - 11:00 AM) Thu(08:00 AM - 09:30 AM)'),
(7, 212, 'Spring_22', 'EEE 101', 'Introduction Of Electronic', 3, 4000, 'Mon(03:30 PM - 05:00 PM) Wed(03:30 PM - 05:00 PM)'),
(8, 211, 'Summer_22', 'EAP 101', 'English I', 2.5, 3500, 'Mon(02:00 PM - 03:30 PM) Wed(01:30 PM - 03:30 PM)');

--
-- Triggers `course_offer`
--
DELIMITER $$
CREATE TRIGGER `ADD_price` BEFORE INSERT ON `course_offer` FOR EACH ROW BEGIN
IF NEW.credit = 1 THEN
SET NEW.price = 2800;
END IF;
IF NEW.credit = 1.5 THEN
SET NEW.price = 3500;
END IF;
IF NEW.credit = 2 THEN
SET NEW.price = 3000;
END IF;
IF NEW.credit = 2.5 THEN
SET NEW.price = 3500;
END IF;
IF NEW.credit = 3 THEN
SET NEW.price = 4000;
END IF;
IF NEW.credit = 4 THEN
SET NEW.price = 4200;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course_taken`
--

CREATE TABLE `course_taken` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `credit` float NOT NULL,
  `price` int(11) DEFAULT NULL,
  `schedule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_taken`
--

INSERT INTO `course_taken` (`id`, `student_id`, `semester`, `course_id`, `course_name`, `credit`, `price`, `schedule`) VALUES
(7, 212902069, 'Summer_21', 'CSE 101', 'Structrued Programming', 3, 4000, 'Fri(09:30 AM - 11:00 AM) Sat(08:00 AM - 09:30 AM)'),
(8, 212902069, 'Spring_22', 'EEE 101', 'Introduction Of Electronic', 3, 4000, 'Mon(03:30 PM - 05:00 PM) Wed(03:30 PM - 05:00 PM)'),
(9, 212902069, 'Summer_22', 'CSE 102', 'C Programming', 2.5, 3500, 'Tue(09:30 AM - 11:00 AM) Thu(08:00 AM - 09:30 AM)'),
(10, 212902069, 'Summer_22', 'EAP 101', 'English I', 2.5, 3500, 'Mon(02:00 PM - 03:30 PM) Wed(01:30 PM - 03:30 PM)'),
(12, 212902070, 'Summer_21', 'CSE 101', 'Structrued Programming', 3, 4000, 'Fri(09:30 AM - 11:00 AM) Sat(08:00 AM - 09:30 AM)'),
(13, 212902070, 'Spring_22', 'EEE 101', 'Introduction Of Electronic', 3, 4000, 'Mon(03:30 PM - 05:00 PM) Wed(03:30 PM - 05:00 PM)'),
(15, 221902001, 'Summer_21', 'CSE 101', 'Structrued Programming', 3, 4000, 'Fri(09:30 AM - 11:00 AM) Sat(08:00 AM - 09:30 AM)'),
(16, 221902001, 'Spring_22', 'EEE 101', 'Introduction Of Electronic', 3, 4000, 'Mon(03:30 PM - 05:00 PM) Wed(03:30 PM - 05:00 PM)');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` varchar(15) NOT NULL,
  `batch` int(11) NOT NULL,
  `section` varchar(5) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `marks` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `points` float NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `course_id`, `batch`, `section`, `semester`, `marks`, `grade`, `points`, `course_name`) VALUES
(1, 212902069, 'CSE 101', 212, 'DA', 'Spring_22', 56, 'C', 2.5, ''),
(2, 212902069, 'EAP 101', 212, 'DA', 'Summer_22', 79, 'A', 3.5, ''),
(3, 212902069, 'CSE 102', 212, 'DA', 'Summer_22', 82, 'A+', 4, ''),
(4, 212902069, 'EEE 101', 212, 'DA', 'Summer_22', 74, 'A', 3.5, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `depart_name` varchar(5) NOT NULL,
  `batch` int(11) NOT NULL,
  `section` varchar(12) NOT NULL,
  `semester` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `nation` varchar(15) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `blood` varchar(3) NOT NULL,
  `marit` varchar(10) NOT NULL,
  `father_n` varchar(20) NOT NULL,
  `father_pro` varchar(10) NOT NULL,
  `mother_n` varchar(20) NOT NULL,
  `mother_pro` varchar(10) NOT NULL,
  `gurdian_n` varchar(20) NOT NULL,
  `gurdian_phone` varchar(14) NOT NULL,
  `present_add` varchar(255) NOT NULL,
  `parmanent_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `first_name`, `last_name`, `depart_name`, `batch`, `section`, `semester`, `email`, `pass`, `dob`, `nation`, `mobile`, `gender`, `religion`, `blood`, `marit`, `father_n`, `father_pro`, `mother_n`, `mother_pro`, `gurdian_n`, `gurdian_phone`, `present_add`, `parmanent_add`) VALUES
(1, 'Walid', 'Rahaman', 'LAW', 213, '', 'Spring', 'walid@gmail.com', 'walid@123', '2001-06-20', 'Pakistani', '01634260670', 'Male', 'Islam', 'AB+', 'Married', 'Abdullah', 'Busnissman', 'Walida Abdullah', 'Teacher', 'Rustom', '01634260670', 'Motijheel,Dahka', 'Karachi,Pakistan'),
(2, 'Farzana', 'Yeasmin', 'ENG', 0, '', 'Summer', '1', '123', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Tanzim', 'Tabachum', 'BBA', 0, '', 'Fall', '1', '123', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'zara', 'Yesmin', 'TEX', 0, '', 'Summer', '1', '123', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Badhon', 'Sarker', 'LAW', 0, '', 'Summer', '1', 'badhon@123', '2000-01-25', '', '', '', '', 'AB+', '', '', '', '', '', '', '', '', ''),
(366, 'Ahamed ', 'Sorif', 'TEX', 0, '', 'Summer', 'sorif@gmail.com', '123abc', '0000-00-00', '', '01738436573', '', '', '', '', '', '', '', '', '', '', '', ''),
(765, 'Tofayel', 'Islam', 'EEE', 0, '', 'Fall', 'tofayel@gmail.com', '4321', '0000-00-00', '', '018384634', '', '', '', '', '', '', '', '', '', '', '', ''),
(649016, 'Rohit', 'Mahhotra', 'EEE', 0, '', 'Summer', 'rohit@gmail.com', '123#321', '0000-00-00', '', '+2037232983', '', '', '', '', '', '', '', '', '', '', '', ''),
(69649013, 'Mohit', 'Suri', 'SOC', 0, '', 'Spring', 'mohit@hotmail.com', '123@321', '1983-11-02', 'American', '+9732843493', 'Male', 'Atheist', 'AB+', 'Single', 'Haris Suri', 'Employee', 'Eliza Suri', 'Writer', 'Fadrik Walse', '+938489374', 'Washigton,USA', 'New Delhi,India'),
(212902069, 'Mehedi ', 'Hasan', 'CSE', 212, 'DA', 'Summer', 'ahamedshojib333@gmail.com', 'ok69', '2001-01-04', 'Bangladeshi', '01634260670', 'Male', 'Islam', 'B+', 'Unmarid', 'Abdul Khalek', 'Employee', 'Morjina Begum', 'Housewife', 'Mizu Akter', '01611623824', 'Uttara,Dhaka-1230', 'Madargong,Jamalpur,Mymensingh'),
(212902070, 'Rahul ', 'Islam', 'CSE', 212, 'DB', 'Fall', 'rahul@outlook.com', 'rahul@123', '2000-05-16', 'Bangladeshi', '0138934683', 'Male', 'Islam', 'O+', 'Unmarid', '', '', '', '', 'Ahamed Shojib', '01634260670', 'Kanchon,Rupgong,Narayangong', 'Mymensingh'),
(221902001, 'Kajol', 'Biswas', 'BBA', 221, 'DC', 'Summer', 'kajol@gmail.com', '7890', '0000-00-00', '', '0132478595', '', '', '', '', '', '', '', '', '', '', '', ''),
(2147483647, 'Deliye', 'Croze', 'ENG', 0, '', 'Summer', 'deliyel@yahoo.com', '123$432', '0000-00-00', '', '+398932833', '', '', '', '', '', '', '', '', '', '', '', ''),
(2147483647, 'Alfred', 'Wales', 'BBA', 0, '', 'Fall', 'alfred@outlook.com', '123#', '0000-00-00', '', '+833224398', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`,`emp_id`,`email`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_offer`
--
ALTER TABLE `course_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_taken`
--
ALTER TABLE `course_taken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`,`mobile`,`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `course_offer`
--
ALTER TABLE `course_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_taken`
--
ALTER TABLE `course_taken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
