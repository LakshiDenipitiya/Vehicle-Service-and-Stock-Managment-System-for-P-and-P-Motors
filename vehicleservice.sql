-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 07:26 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicleservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ap_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `vehicle_model_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `int_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ap_id`, `appointment_date`, `vehicle_type_id`, `vehicle_model_id`, `remarks`, `customer_id`, `created_date`, `int_status`) VALUES
(1, '2018-10-17', 3, 12, 'aaaaaaa', 0, '2018-10-17 04:23:26', 1),
(2, '2018-10-17', 2, 15, 'aa', 0, '2018-10-17 04:26:29', 1),
(3, '2018-10-17', 3, 1, 'aaaaaaa', 0, '2018-10-17 04:27:24', 1),
(4, '2018-10-17', 5, 12, 'aaaaaaaaaa', 3, '2018-10-17 04:31:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colour`
--

CREATE TABLE `colour` (
  `id` int(11) NOT NULL,
  `colour` varchar(45) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colour`
--

INSERT INTO `colour` (`id`, `colour`, `createdate`, `modifieddate`, `status`) VALUES
(2, 'Divine Black', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Desert Gold', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'Cosmic Red', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'Hattie Black', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'Midnight Blue', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 'Nuclear Blue', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 'Laser Black', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 'Red', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 'Green', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 'Yellow', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 'Balck', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `nicno` varchar(12) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phoneno` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `firstname`, `lastname`, `nicno`, `no`, `lane`, `city`, `phoneno`, `email`, `createddate`, `modifieddate`, `status`, `username`, `password`) VALUES
(3, 'Mrs', 'Mala', 'Perera', '857449552V', '342/5', 'highlevel road', 'nugegoda', '0112465245', 'wathsala.2093@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'nipuni3', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'Mr', 'Nimal', 'Pathirana', '864102086V', '23', 'old road', 'Boralasgamuwa', '0112458632', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(6, 'Mr', 'Wasntha', 'Rajapaksha', '728541269V', '341/5B', 'Katuwawala', 'Boralasgamuwa', '0728546594', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(7, 'Mrs', 'Udula', 'Priyangani', '856326489V', '58', 'Darawawardhana Rd', 'Pliyandala', '0758946521', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(9, 'Mr', 'Buwanaka ', 'Prathapasinghe', '912354785V', '1651', 'Katuwawala Rd', 'Boralasgamuwa', '0779874552', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(10, 'Ms', 'Amali', 'Warnapala', '867892015V', '56', 'School lane', 'Bokundara', '0778952265', 'harshi.harshi.perera@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(11, 'Mr', 'Somapala', 'Samarathunga', '734587516V', '14/8', 'Temple Rd', 'Boralasgamuwa', '0112856741', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(12, 'Mr', 'Nuwan', 'Sandamal', '904485124V', '78/3D', 'Kirmatiyana Rd', 'Boralasgamuwa', '0758963321', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(13, 'Mr', 'nimal', 'Pathirana', '784596213V', '548', 'Saman Mw', 'Boralasgamuwa', '0777416874', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(14, 'Mr', 'Hasitha', 'Tharanga', '889785220V', '258/5B', 'Walawwaththa Rd', 'Piliyandala', '0114785412', NULL, '1000-01-01 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(15, 'Mrs', 'Maneesha', 'Sewwandi', '786547889V', '12', 'srimath Mw', 'Piliyandala', '0758477415', 'maneesha@gmail.com', '1000-01-01 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
(22, 'Mr', 'Minura', 'Dilanka', '9210982937V', '10', 'highlevel road', 'Boralasgamuwa', '0112458632', 'minu@gmail.com', '2018-09-13 19:55:41', '2018-09-13 19:55:41', NULL, 'minura22', 'f8ff803'),
(23, 'Mr', 'Samantha', 'Tharanga', '678457441V', '10', 'Salamal mawatha', 'Boralasgamuwa', '0112458632', 'weg@gmail.com', '2018-09-13 20:04:44', '2018-09-13 20:04:44', NULL, 'samantha23', 'c42cb7f');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(45) NOT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `createddate`, `modifieddate`, `status`) VALUES
(1, 'Administrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Cashier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Manger', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'Stock Keeper', '2018-09-15 16:12:24', '2018-09-15 16:12:24', NULL),
(5, 'Labour', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designationmodule`
--

CREATE TABLE `designationmodule` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designationmodule`
--

INSERT INTO `designationmodule` (`id`, `designation_id`, `module_id`) VALUES
(9, 2, 45),
(10, 2, 46),
(11, 2, 47);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `nicno` varchar(12) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `maritalstatus` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dateofrecruitment` date DEFAULT NULL,
  `dateofresigned` date DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `leavestatus` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `title`, `firstname`, `lastname`, `nicno`, `dateofbirth`, `maritalstatus`, `gender`, `no`, `lane`, `city`, `phoneno`, `email`, `dateofrecruitment`, `dateofresigned`, `createddate`, `modifieddate`, `leavestatus`) VALUES
(3, 'Mrs', 'Madu', 'Priyanwada', '708541322V', '1970-05-21', 'Married', 'Female', '125', 'Swaranananda Rd', 'Pliyandala', '0112545692', 'madupriyanwada@gmail.com', '2005-05-12', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(4, 'Mrs', 'Hasitha', 'Deshapriya', '855785220V', '1985-05-05', 'Married', 'Female', '258/5B', 'Walawwaththa Rd', 'Boralasgamuwa', '0114785412', 'hasitha@gmail.com', '2007-02-05', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(25, 'Ms', 'Nadeesha', 'Perera', '199184736954', '1991-03-05', 'Unmarried', 'Female', '01', 'Dolekanaththa', 'Pliyandala', '0777812336', 'nadeesha@gmail.com', '2005-06-03', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(26, 'Mrs', 'Nipuni', 'Tharanga', '197856123147', '1978-10-21', 'Married', 'Female', '12/9', 'Katuwawala', 'Boralasgamuwa', '0725678994', 'nipuni@gmail.com', '2016-06-02', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(27, 'Mr', 'Asith', 'Priyanjana', '199257124232', '1992-12-02', 'Married', 'Male', '10/2', 'highlevel road', 'Nugegoda', '0112458632', 'asitha@gmail.com', '2016-01-13', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(28, 'Mr', 'Jayanadana ', 'Vitharana', '198420610511', '1984-11-12', 'Married', 'Male', '698/3D', 'Elvitigala MW', 'Pliyandala', '0724567899', 'jayananda@gmail.com', '2005-05-05', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(33, 'Mrs', 'Rukshani', 'Gmage', '875985220V', '1987-04-12', 'Married', 'Female', '89/9', 'Madapatha Rd', 'Piliyandala', '0112458632', 'rukshani@gmail.com', '2009-03-12', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(34, 'Mr', 'Wasntha', 'Senevirathne', '874578452V', '1987-03-01', 'Married', 'Male', '125/8', 'Waththegedara Rd', 'Maharagam', '0787894562', '', '2007-05-06', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(40, 'Mr', 'Lasantha', 'Alagiyawanna', '857865478V', '1985-06-12', 'Married', 'Male', '285/5r', 'Katuwawala Rd', 'Boralasgamuwa', '0777548795', 'lasantha@gmail.com', '2016-10-12', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work'),
(41, 'Mr', 'Sameera', 'Gamage', '889575215V', '1988-11-22', 'Unmarried', 'Male', '67/8', 'Watawala Rd', 'Bokundara', '0787954875', '', '2014-04-05', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'leave'),
(42, 'Mr', 'Sampath', 'Mudunkotuwa', '842548221V', '1984-03-06', 'Married', 'Male', '2547', 'Makubura', 'Piliyandala', '0776549475', '', '2009-02-15', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'leave'),
(45, 'Mr', 'Samantha', 'Weerasooriya', '678457441V', '1967-06-25', 'Unmarried', 'Male', '245/4f', 'Makubura', 'Maharagama', '0777416874', '', '2000-02-06', '2015-02-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'leave'),
(46, 'Mr', 'Supun', 'Shantha', '864784115V', '1984-02-04', 'Unmarried', 'Male', '14', 'Namal Rd', 'Boralasgamuwa', '0774158796', '', '2002-03-06', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'work');

-- --------------------------------------------------------

--
-- Table structure for table `employeedesignation`
--

CREATE TABLE `employeedesignation` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeedesignation`
--

INSERT INTO `employeedesignation` (`id`, `designation_id`, `employee_id`) VALUES
(3, 2, 26),
(4, 3, 26),
(15, 2, 4),
(16, 2, 25),
(19, 1, 3),
(20, 3, 3),
(21, 2, 27),
(22, 3, 28),
(24, 5, 34),
(25, 5, 40),
(26, 5, 41),
(27, 2, 42),
(30, 5, 45),
(31, 5, 46);

-- --------------------------------------------------------

--
-- Table structure for table `goodsreceivenotice`
--

CREATE TABLE `goodsreceivenotice` (
  `id` int(11) NOT NULL,
  `goodsreceivenoticeno` varchar(45) DEFAULT NULL,
  `goodsreceivenoticedate` date DEFAULT NULL,
  `invoiceno` varchar(45) DEFAULT NULL,
  `suppliername` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `categoryofsparepart` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `amonut` decimal(10,0) DEFAULT NULL,
  `buyingprice` varchar(45) DEFAULT NULL,
  `totalprice` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `netprice` decimal(10,0) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goodsreceivenotice`
--

INSERT INTO `goodsreceivenotice` (`id`, `goodsreceivenoticeno`, `goodsreceivenoticedate`, `invoiceno`, `suppliername`, `code`, `categoryofsparepart`, `quantity`, `amonut`, `buyingprice`, `totalprice`, `discount`, `netprice`, `createddate`, `modifieddate`, `status`) VALUES
(1, '1', '2018-10-08', '1', '5', '190', '3', '10', NULL, '190', NULL, '2', '341425', '2018-10-07 08:30:56', '2018-10-07 08:30:56', 1),
(2, '1', '2018-10-08', '1', '5', '12575', '4', '12', '150900', '12575', NULL, '2', '341425', '2018-10-07 08:30:56', '2018-10-07 08:30:56', 1),
(3, '1', '2018-10-08', '1', '5', '12575', '4', '15', '188625', '12575', NULL, '2', '341425', '2018-10-07 08:30:56', '2018-10-07 08:30:56', 1),
(4, '2', '2018-10-08', '2', '6', '10', '5', '10', NULL, '10', NULL, '3', '400', '2018-10-07 08:33:41', '2018-10-07 08:33:41', 1),
(5, '2', '2018-10-08', '2', '6', '25', '7', '12', '300', '25', NULL, '3', '400', '2018-10-07 08:33:41', '2018-10-07 08:33:41', 1),
(6, '3', '2018-10-09', '3', '6', '25', '7', '10', NULL, '25', NULL, '1', '250', '2018-10-07 08:36:35', '2018-10-07 08:36:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `goodsreturnnotice`
--

CREATE TABLE `goodsreturnnotice` (
  `id` int(11) NOT NULL,
  `goodsreturnnoticeno` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `categoryofsparepart` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `reasonforreturn` varchar(45) DEFAULT NULL,
  `goodsreceivenoticeno` varchar(45) DEFAULT NULL,
  `buyingdate` date DEFAULT NULL,
  `buyingprice` decimal(10,0) DEFAULT NULL,
  `solddate` date DEFAULT NULL,
  `sellingprice` decimal(10,0) DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `isclaim` tinyint(1) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `discount` decimal(2,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goodsreturnnotice`
--

INSERT INTO `goodsreturnnotice` (`id`, `goodsreturnnoticeno`, `code`, `categoryofsparepart`, `quantity`, `reasonforreturn`, `goodsreceivenoticeno`, `buyingdate`, `buyingprice`, `solddate`, `sellingprice`, `returndate`, `isclaim`, `createddate`, `modifieddate`, `status`, `discount`) VALUES
(13, '1', 'DD121181', '3', '1', '1', '1', '2018-10-08', '190', '2018-10-07', '190', '2018-10-07', 0, '2018-10-07 09:42:40', '2018-10-07 09:42:40', 1, '0.00'),
(14, '1', 'DD141001', '4', '1', '1', '1', '2018-10-08', '12575', '2018-10-07', '12575', '2018-10-07', 0, '2018-10-07 09:42:40', '2018-10-07 09:42:40', 1, '0.00'),
(15, '1', 'DD141001', '4', '1', '1', '1', '2018-10-08', '12575', '2018-10-07', '12575', '2018-10-07', 0, '2018-10-07 09:42:40', '2018-10-07 09:42:40', 1, '0.00'),
(16, '1', 'DD121181', '3', '1', '1', '1', '2018-10-08', '190', '2018-10-07', '190', '2018-10-07', 0, '2018-10-07 09:47:41', '2018-10-07 09:47:41', 1, '0.00'),
(17, '1', 'DD141001', '4', '1', '1', '1', '2018-10-08', '12575', '2018-10-07', '12575', '2018-10-07', 0, '2018-10-07 09:47:41', '2018-10-07 09:47:41', 1, '0.00'),
(18, '1', 'DD141001', '4', '1', '1', '1', '2018-10-08', '12575', '2018-10-07', '12575', '2018-10-07', 0, '2018-10-07 09:47:41', '2018-10-07 09:47:41', 1, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoiceno` varchar(45) DEFAULT NULL,
  `customername` varchar(45) DEFAULT NULL,
  `totalcost` decimal(10,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `taxes` decimal(10,0) DEFAULT NULL,
  `otherpayments` decimal(10,0) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `jobrequest_id` int(11) NOT NULL,
  `cus_id` int(5) NOT NULL,
  `nextmeter` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoiceno`, `customername`, `totalcost`, `discount`, `taxes`, `otherpayments`, `createddate`, `modifieddate`, `jobrequest_id`, `cus_id`, `nextmeter`) VALUES
(1, '10001', 'pila', '940', 2, NULL, '921', '2018-10-09 07:59:17', '2018-10-09 07:59:17', 19, 0, 1500),
(2, '125', 'pilaaas', '1300', 2, NULL, '1274', '2018-10-09 08:36:58', '2018-10-09 08:36:58', 22, 3, 1400),
(5, '110', 'nayanajith4', '1300', 0, NULL, '1300', '2018-10-16 14:15:49', '2018-10-16 14:15:49', 22, 9, 12356);

-- --------------------------------------------------------

--
-- Table structure for table `jobrequest`
--

CREATE TABLE `jobrequest` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `meterreading` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `jb_complete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobrequest`
--

INSERT INTO `jobrequest` (`id`, `status`, `meterreading`, `createddate`, `modifieddate`, `vehicle_id`, `employee_id`, `jb_complete`) VALUES
(7, '1', '200', '2018-10-09 04:44:46', '2018-10-09 04:44:46', 2, 34, 0),
(8, '1', '200', '2018-10-09 04:45:29', '2018-10-09 04:45:29', 2, 34, 0),
(9, '1', '2000', '2018-10-09 04:47:30', '2018-10-09 04:47:30', 2, 34, 0),
(10, '1', '2000', '2018-10-09 04:48:58', '2018-10-09 04:48:58', 2, 34, 0),
(11, '1', '2000', '2018-10-09 04:51:56', '2018-10-09 04:51:56', 2, 34, 0),
(12, '1', '2000', '2018-10-09 04:52:24', '2018-10-09 04:52:24', 2, 34, 0),
(13, '1', '1200', '2018-10-09 06:43:36', '2018-10-09 06:43:36', 2, 34, 0),
(14, '1', '1200', '2018-10-09 06:44:46', '2018-10-09 06:44:46', 2, 34, 0),
(15, '1', '1200', '2018-10-09 06:45:27', '2018-10-09 06:45:27', 2, 34, 0),
(16, '1', '1200', '2018-10-09 06:47:35', '2018-10-09 06:47:35', 2, 34, 0),
(17, '1', '1200', '2018-10-09 06:48:35', '2018-10-09 06:48:35', 2, 34, 0),
(18, '1', '1200', '2018-10-09 06:49:32', '2018-10-09 06:49:32', 2, 34, 0),
(19, '1', '1200', '2018-10-09 06:50:35', '2018-10-09 06:50:35', 2, 34, 0),
(20, '1', '1200', '2018-10-09 08:07:06', '2018-10-09 08:07:06', 2, 34, 0),
(21, '1', '1200', '2018-10-09 08:07:49', '2018-10-09 08:07:49', 2, 34, 0),
(22, '1', '1300', '2018-10-09 08:24:40', '2018-10-09 08:24:40', 2, 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobrequestmechanical`
--

CREATE TABLE `jobrequestmechanical` (
  `id` int(11) NOT NULL,
  `isfree` tinyint(1) DEFAULT NULL,
  `mechanical_id` int(11) NOT NULL,
  `jobrequest_id` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobrequestmechanical`
--

INSERT INTO `jobrequestmechanical` (`id`, `isfree`, `mechanical_id`, `jobrequest_id`, `amount`) VALUES
(1, 0, 4, 7, '500.00'),
(2, 0, 4, 8, '500.00'),
(3, 0, 4, 16, '500.00'),
(4, 0, 4, 17, '500.00'),
(5, 0, 4, 18, '500.00'),
(6, 0, 4, 19, '500.00'),
(7, 0, 4, 22, '500.00'),
(8, 0, 5, 22, '390.00'),
(12, 0, 4, 11, '1000.00'),
(13, 0, 4, 12, '1000.00'),
(14, 0, 4, 13, '1000.00'),
(15, 0, 4, 14, '1000.00'),
(16, 0, 4, 15, '1000.00'),
(18, NULL, 4, 10, '0.00'),
(19, NULL, 4, 9, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `jobrequestservice`
--

CREATE TABLE `jobrequestservice` (
  `id` int(11) NOT NULL,
  `isfree` tinyint(1) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `jobrequest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobrequestservice`
--

INSERT INTO `jobrequestservice` (`id`, `isfree`, `service_id`, `jobrequest_id`) VALUES
(2, NULL, 3, 10),
(3, NULL, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `jobrequestsparepart`
--

CREATE TABLE `jobrequestsparepart` (
  `id` int(11) NOT NULL,
  `isfree` tinyint(1) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `jobrequest_id` int(11) NOT NULL,
  `sparepart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobrequestsparepart`
--

INSERT INTO `jobrequestsparepart` (`id`, `isfree`, `quantity`, `price`, `jobrequest_id`, `sparepart_id`) VALUES
(7, 0, '1', '190', 12, 3),
(8, 0, '2', '12575', 12, 4),
(9, 0, '2', '190', 13, 3),
(10, 0, '2', '12575', 13, 4),
(11, 0, '3', '530', 13, 6),
(12, 0, '2', '190', 14, 3),
(13, 0, '2', '12575', 14, 4),
(14, 0, '3', '530', 14, 6),
(15, 0, '2', '190', 15, 3),
(16, 0, '2', '12575', 15, 4),
(17, 0, '3', '530', 15, 6),
(18, 0, '2', '190', 16, 3),
(19, 0, '3', '10', 16, 5),
(20, 0, '2', '190', 17, 3),
(21, 0, '3', '10', 17, 5),
(22, 0, '2', '190', 18, 3),
(23, 0, '3', '10', 18, 5),
(24, 0, '3', '10', 18, 5),
(25, 0, '2', '190', 19, 3),
(26, 0, '3', '10', 19, 5),
(27, 0, '3', '10', 19, 5),
(28, 0, '2', '190', 20, 3),
(29, 0, '3', '10', 20, 5),
(30, 0, '2', '190', 21, 3),
(31, 0, '3', '10', 21, 5),
(32, 0, '2', '190', 22, 3),
(33, 0, '3', '10', 22, 5),
(35, NULL, NULL, NULL, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mechanical`
--

CREATE TABLE `mechanical` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mechanical`
--

INSERT INTO `mechanical` (`id`, `code`, `type`, `cost`, `createddate`, `modifieddate`, `status`) VALUES
(3, 'AGB', 'Axle Boot Grease', '70', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'ABP', 'Align Break Paddle', '500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'AG', 'Axle Grease', '390', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'AR', 'Advance for repair', '6000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'ASP', 'Advance for Spare parts', '5000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'BA', 'Break Adjust', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'BPG', 'Break Paddle Grease', '100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'BU', 'Body Wash Upper', '250', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'BW', 'Body wash', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'BW3W', 'Body wash 3W', '700', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(13, 'BWS', 'Body wash scooter', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 'CA', 'Chain Adjust', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, 'CBC', 'Carburetor Cleaning', '350', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(16, 'CO', 'Cable Oil', '60', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(17, 'CO3W', 'Cable Oil', '75', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(18, 'CO4S', 'Cable Oil', '75', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `code`, `name`, `status`, `createddate`, `modifieddate`) VALUES
(1, 'employee_list', 'Employee List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(2, 'employee_create', 'Employee Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(3, 'colour_create', 'Colour Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(4, 'colour_edit', 'Colour Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(5, 'colour_list', 'Colour List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(6, 'designation_create', 'Designation Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(7, 'designation_edit', 'Designation Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(8, 'designation_list', 'Designation List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(9, 'goodsreceivenotice_create', 'Goodsreceivenotice Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(10, 'goodsreceivenotice_list', 'Goodsreceivenotice List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(11, 'goodsreturnnotice_create', 'Goodsreturnnotice Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(12, 'goodsreturnnotice_edit', 'Goodsreturnnotice Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(13, 'goodsreturnnotice_list', 'Goodsreturnnotice List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(14, 'jobrequest_create', 'Jobrequest Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(15, 'jobrequest_edit', 'Jobrequest Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(16, 'jobrequest_list', 'Jobrequest List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(17, 'jobrequestmechanical_create', 'Jobrequestmechanical Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(18, 'mechanical_create', 'Mechanical Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(19, 'mechanical_edit', 'Mechanical Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(20, 'mechanical_list', 'Mechanical List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(21, 'module_create', 'Module Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(22, 'module_edit', 'Module Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(23, 'module_list', 'Module List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(24, 'report', 'Report', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(25, 'service_create', 'Service Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(26, 'service_edit', 'Service Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(27, 'service_list', 'Service List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(28, 'sparepart_create', 'Sparepart Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(29, 'sparepart_edit', 'Sparepart Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(30, 'sparepart_list', 'Sparepart List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(31, 'stakeholder_list', 'Stakeholder List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(32, 'stock_list', 'Stock List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(33, 'supplier_create', 'Supplier Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(34, 'supplier_edit', 'Supplier Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(35, 'supplier_list', 'Supplier List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(36, 'vehicle_create', 'Vehicle Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(37, 'vehicle_edit', 'Vehicle Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(38, 'vehicle_list', 'Vehicle List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(39, 'vehiclemodel_create', 'Vehiclemodel Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(40, 'vehiclemodel_edit', 'Vehiclemodel Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(41, 'vehiclemodel_list', 'Vehiclemodel List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(42, 'vehicletype_create', 'Vehicletype Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(43, 'vehicletype_edit', 'Vehicletype Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(44, 'vehicletype_list', 'Vehicletype List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(45, 'customer_create', 'Customer Create', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(46, 'customer_edit', 'Customer Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(47, 'customer_list', 'Customer List', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(48, 'employee_edit', 'Employee Edit', NULL, '2018-08-11 17:43:05', '2018-08-11 17:43:05'),
(49, 'jobrequest_view', 'Jobrequest View', NULL, '2018-09-08 15:52:43', '2018-09-08 15:52:43'),
(50, 'vehicle_view', 'Vehicle View', NULL, '2018-09-08 15:53:10', '2018-09-08 15:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `code`, `type`, `cost`, `createddate`, `modifieddate`, `status`) VALUES
(1, 'FSWOWBW', 'Full Service with Oil with out body wash', '2500', '2001-11-11 00:00:00', '2016-06-06 00:00:00', 1),
(2, 'FSWTO(1.100)', 'Full Service Without Oil', '1990', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'FSWTO(1.200)', 'Full Service Without Oil', '2030', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'FSWTO(1.400)', 'Full Service Without Oil', '2110', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'FSWTO(1L)', 'Full Service Without Oil', '1950', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'FSXCD', 'Full Service', '1100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'FSXCDWBW', 'Full Service without Body Wash', '1000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'FTC', 'Full Tank Cleaning', '350', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 'FTSPLES', 'Fuel Tank Sticker', '4090', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'FTSXCD', 'Fuel Tank Sticker', '2800', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'FU', 'Fuel', '300', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'FW3W4SWO', 'Full Service without oil', '3150', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id` int(11) NOT NULL,
  `code` varchar(8) DEFAULT NULL,
  `categoryofsparepart` varchar(45) DEFAULT NULL,
  `originalprice` decimal(10,0) DEFAULT NULL,
  `sellingprice` decimal(10,0) DEFAULT NULL,
  `cupboard` varchar(2) DEFAULT NULL,
  `row` decimal(2,0) DEFAULT NULL,
  `bin` decimal(2,0) DEFAULT NULL,
  `reorderlevel` varchar(45) DEFAULT NULL,
  `maxstocklevel` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id`, `code`, `categoryofsparepart`, `originalprice`, `sellingprice`, `cupboard`, `row`, `bin`, `reorderlevel`, `maxstocklevel`, `createddate`, `modifieddate`, `status`) VALUES
(1, 'AF', 'Air filter', '700', '700', 'h', '10', '8', '50', '100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'AM', 'Armiture', '25', '52', 'K', '7', '5', '52', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'DD121181', 'Oil Filter', '190', '190', 'E', '1', '8', '50', '100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'DD141001', 'Primered Petrol Tank Caliber', '12575', '12575', 'N', '2', '7', '10', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'DD141016', 'Clamp', '10', '10', 'K', '9', '8', '50', '100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'DD141021', 'Fuel Tap', '530', '530', 'L', '12', '9', '25', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'DD141022', 'Bolt-Flanged', '25', '25', 'N', '2', '10', '100', '200', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'DD141026', 'Tube Rubber', '105', '105', 'E', '6', '6', '100', '200', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'DD141046', 'Tank Wine Red', '17975', '17975', 'K', '7', '15', '5', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'DD141045', 'Tank Jet Black', '3510', '3510', 'L', '9', '6', '10', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

CREATE TABLE `stakeholder` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stakeholder`
--

INSERT INTO `stakeholder` (`id`, `username`, `password`, `createddate`, `modifieddate`, `status`, `employee_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 3),
(6, 'lll', '140f6969d5213fd0ece03148e62e461e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 33),
(7, '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 34),
(11, '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 40),
(12, '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 41),
(13, 'Sampath', 'fb7b9ffa5462084c5f4e7e85a093e6d7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 42),
(16, '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 45),
(17, '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 46);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `code` varchar(8) DEFAULT NULL,
  `sparepart` varchar(45) DEFAULT NULL,
  `currentstocklevel` decimal(4,2) DEFAULT '0.00',
  `stock_minus` decimal(4,2) NOT NULL DEFAULT '0.00',
  `lastgrnno` varchar(45) DEFAULT NULL,
  `lastgrnprice` decimal(10,0) DEFAULT NULL,
  `lastgrndate` date DEFAULT NULL,
  `lastgrtno` varchar(45) DEFAULT NULL,
  `lastgrtdate` date DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `sparepart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `code`, `sparepart`, `currentstocklevel`, `stock_minus`, `lastgrnno`, `lastgrnprice`, `lastgrndate`, `lastgrtno`, `lastgrtdate`, `createddate`, `modifieddate`, `status`, `invoice_id`, `sparepart_id`) VALUES
(1, '190', 'DD121181', '10.00', '0.00', '1', '190', '2018-10-08', '1', '2018-10-08', '2018-10-07 08:30:56', '2018-10-07 08:30:56', 1, 0, 3),
(2, '12575', 'DD141001', '12.00', '0.00', '1', '12575', '2018-10-08', '1', '2018-10-08', '2018-10-07 08:30:56', '2018-10-07 08:30:56', 1, 0, 4),
(3, '12575', 'DD141001', '15.00', '0.00', '1', '12575', '2018-10-08', '1', '2018-10-08', '2018-10-07 08:30:56', '2018-10-07 08:30:56', 1, 0, 4),
(4, '10', 'DD141016', '10.00', '0.00', '2', '10', '2018-10-08', '2', '2018-10-08', '2018-10-07 08:33:41', '2018-10-07 08:33:41', 1, 0, 5),
(5, '25', 'DD141022', '12.00', '0.00', '2', '25', '2018-10-08', '2', '2018-10-08', '2018-10-07 08:33:41', '2018-10-07 08:33:41', 1, 0, 7),
(6, '25', 'DD141022', '10.00', '0.00', '3', '25', '2018-10-09', '3', '2018-10-09', '2018-10-07 08:36:35', '2018-10-07 08:36:35', 1, 0, 7),
(7, 'DD121181', 'DD121181', '0.00', '1.00', '1', '190', '2018-10-08', '1', '2018-10-08', '2018-10-07 09:47:41', '2018-10-07 09:47:41', 1, 0, 3),
(8, 'DD141001', 'DD141001', '0.00', '1.00', '1', '12575', '2018-10-08', '1', '2018-10-08', '2018-10-07 09:47:41', '2018-10-07 09:47:41', 1, 0, 4),
(9, 'DD141001', 'DD141001', '0.00', '1.00', '1', '12575', '2018-10-08', '1', '2018-10-08', '2018-10-07 09:47:41', '2018-10-07 09:47:41', 1, 0, 4),
(10, 'N/A', 'N/A', '0.00', '2.00', '0', '190', '2018-10-09', '20', '2018-10-09', '2018-10-09 08:07:06', '2018-10-09 08:07:06', 1, 20, 3),
(11, 'N/A', 'N/A', '0.00', '3.00', '0', '10', '2018-10-09', '20', '2018-10-09', '2018-10-09 08:07:06', '2018-10-09 08:07:06', 1, 20, 5),
(12, 'N/A', 'N/A', '0.00', '2.00', '0', '190', '2018-10-09', '21', '2018-10-09', '2018-10-09 08:07:49', '2018-10-09 08:07:49', 1, 21, 3),
(13, 'N/A', 'N/A', '0.00', '3.00', '0', '10', '2018-10-09', '21', '2018-10-09', '2018-10-09 08:07:49', '2018-10-09 08:07:49', 1, 21, 5),
(14, 'N/A', 'N/A', '0.00', '2.00', '0', '190', '2018-10-09', '22', '2018-10-09', '2018-10-09 08:24:40', '2018-10-09 08:24:40', 1, 22, 3),
(15, 'N/A', 'N/A', '0.00', '3.00', '0', '10', '2018-10-09', '22', '2018-10-09', '2018-10-09 08:24:40', '2018-10-09 08:24:40', 1, 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `companyname` varchar(45) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `lane` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `faxno` varchar(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `code`, `companyname`, `no`, `lane`, `city`, `phoneno`, `faxno`, `email`, `createddate`, `modifieddate`, `status`) VALUES
(5, 'AR', 'AR Marketing', '138', 'Salamal mawatha', 'Piliyandala', '0112154256', '0112648923', 'armarketing@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'DPMC', 'David Peris Motor company ', '75', 'Hyde park coner', 'Colombo 02', '0114748547', '0114748546', 'dpmc@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 'CO', 'Ceylon auto trading', '25/2', 'Jambugasmulla Rd', 'nugegoda', '0112123456', '0112741852', 'ceylonauto@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 'DT', 'Dilna Trading', '174/3/A', 'malwaththa Rd', 'Bokundara', '0113451264', '0113943761', 'dilna@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 'DAR', 'DAR Marketing', '457/2B', 'Vijitha Rd', 'Boralasgamuwa', '0112445778', '0112445774', 'darmaketing@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 'IE', 'Impress Enterprices', '64', 'Udahamulla ', 'Nugegoda', '0112745681', '0112745682', 'im@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 'KD', 'Karunarathna Distributers', '32/4', 'Galwala Rd', 'Nampamunuwa', '0112357159', '0112357160', 'karunarathnad@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(17, 'ME', 'Mahee Enterprises', '758', 'Galle Rd', 'Colombo', '0114254687', '0114254688', 'mahee@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(18, 'NZ', 'New Zone Lanka (PVT). LTD', '432/5C', 'Waththegedara Rd', 'Maharagama', '0112954784', '0112954785', 'nz@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplierstock`
--

CREATE TABLE `supplierstock` (
  `id` int(11) NOT NULL,
  `goodsreceivenotice_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `goodsreturnnotice_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicleno` varchar(45) DEFAULT NULL,
  `chassisno` varchar(45) DEFAULT NULL,
  `engineno` varchar(45) DEFAULT NULL,
  `purchasedate` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `firstservicedate` date DEFAULT NULL,
  `lastservicedate` date DEFAULT NULL,
  `nooffreeservice` int(11) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehiclemodel_id` int(11) NOT NULL,
  `colour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicleno`, `chassisno`, `engineno`, `purchasedate`, `status`, `firstservicedate`, `lastservicedate`, `nooffreeservice`, `createdate`, `modifieddate`, `customer_id`, `vehiclemodel_id`, `colour_id`) VALUES
(2, 'ABC1524', 'CT64-4879545', 'CT64E4879545', '2013-03-27', 1, '2014-06-29', '2016-10-18', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, 4),
(5, 'ES1578', 'AV45-2456', 'AV452456', '2017-05-10', 0, '2017-07-11', '2017-11-06', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 18, 6),
(7, 'PAS3584', 'SC79-7836', 'SC797836', '2017-05-22', 0, '2017-12-12', '2017-08-13', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 20, 3),
(8, 'ASD1245', 'VT12-4879', 'VT124879', '2017-08-08', 0, '2017-09-04', '2017-10-15', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 17, 11),
(9, 'PO5478', 'DS94-2145', 'DS942145', '2017-07-31', 0, '2017-09-12', '2017-10-16', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 16, 6),
(10, 'WE4652', 'TY47-6548', 'TY476548', '2014-12-15', 0, '2015-03-10', '2017-08-14', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 20, 15),
(13, 'SR1587', 'RE12-1824', 'Re121824', '2016-05-25', 0, '2016-12-05', '2017-02-15', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 19, 9);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemodel`
--

CREATE TABLE `vehiclemodel` (
  `id` int(11) NOT NULL,
  `vehiclemodel` varchar(45) DEFAULT NULL,
  `createddate` datetime NOT NULL,
  `modifiedtime` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `vehicletype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehiclemodel`
--

INSERT INTO `vehiclemodel` (`id`, `vehiclemodel`, `createddate`, `modifiedtime`, `status`, `vehicletype_id`) VALUES
(1, 'pulser 150', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(12, 'CT 100', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(15, 'Platina', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(16, 'Discover', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(17, 'V12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(18, 'Avenger', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(19, 'RE', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 2),
(20, 'Scooter', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(22, 'sfnjk', '2018-09-15 15:01:42', '2018-09-15 15:01:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleservice`
--

CREATE TABLE `vehicleservice` (
  `id` int(11) NOT NULL,
  `servicestatus` tinyint(1) DEFAULT NULL,
  `nextservicedate` date DEFAULT NULL,
  `nextmilage` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `jobrequest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicleservice`
--

INSERT INTO `vehicleservice` (`id`, `servicestatus`, `nextservicedate`, `nextmilage`, `customer_id`, `vehicle_id`, `jobrequest_id`) VALUES
(1, 1, NULL, 12, 15, 5, 7),
(2, 1, '2018-10-31', 15000, 9, 8, 10),
(3, 1, '2018-10-31', 15000, 9, 8, 11),
(4, 1, '2018-10-31', 15000, 9, 8, 12),
(5, 1, '2018-10-31', 15000, 9, 8, 13),
(6, 1, '2018-10-31', 15000, 9, 8, 14),
(7, 1, '2018-10-31', 15000, 9, 8, 15),
(8, 1, '2018-10-31', 15000, 9, 8, 16),
(9, 1, '2018-10-31', 15000, 9, 8, 17),
(10, 1, '2018-10-31', 15000, 9, 8, 18),
(11, 1, '2018-10-31', 15000, 9, 8, 19),
(12, 1, '2018-10-31', 15000, 9, 8, 20),
(13, 1, '2018-10-31', 15000, 9, 8, 21),
(14, 1, '2018-10-31', 15000, 9, 8, 21);

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL,
  `typeofvehicle` varchar(45) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`id`, `typeofvehicle`, `createdate`, `modifieddate`, `status`) VALUES
(1, 'Motor Bike', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Three Wheel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nicno_UNIQUE` (`nicno`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designationmodule`
--
ALTER TABLE `designationmodule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_designationmodule_designation1_idx` (`designation_id`),
  ADD KEY `fk_designationmodule_module1_idx` (`module_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedesignation`
--
ALTER TABLE `employeedesignation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employeedesignation_designation1_idx` (`designation_id`),
  ADD KEY `fk_employeedesignation_employee1_idx` (`employee_id`);

--
-- Indexes for table `goodsreceivenotice`
--
ALTER TABLE `goodsreceivenotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goodsreturnnotice`
--
ALTER TABLE `goodsreturnnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_jobrequest1_idx` (`jobrequest_id`);

--
-- Indexes for table `jobrequest`
--
ALTER TABLE `jobrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobrequest_vehicle1_idx` (`vehicle_id`),
  ADD KEY `fk_jobrequest_employee1_idx` (`employee_id`);

--
-- Indexes for table `jobrequestmechanical`
--
ALTER TABLE `jobrequestmechanical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobrequestmechanical_mechanical1_idx` (`mechanical_id`),
  ADD KEY `fk_jobrequestmechanical_jobrequest1_idx` (`jobrequest_id`);

--
-- Indexes for table `jobrequestservice`
--
ALTER TABLE `jobrequestservice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobrequestservice_service1_idx` (`service_id`),
  ADD KEY `fk_jobrequestservice_jobrequest1_idx` (`jobrequest_id`);

--
-- Indexes for table `jobrequestsparepart`
--
ALTER TABLE `jobrequestsparepart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jobrequeststock_jobrequest1_idx` (`jobrequest_id`),
  ADD KEY `fk_jobrequestsparepart_sparepart1_idx` (`sparepart_id`);

--
-- Indexes for table `mechanical`
--
ALTER TABLE `mechanical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stakeholder_employee1_idx` (`employee_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_stock_sparepart1_idx` (`sparepart_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `supplierstock`
--
ALTER TABLE `supplierstock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supplierstock_goodsreceivenotice1_idx` (`goodsreceivenotice_id`),
  ADD KEY `fk_supplierstock_supplier1_idx` (`supplier_id`),
  ADD KEY `fk_supplierstock_goodsreturnnotice1_idx` (`goodsreturnnotice_id`),
  ADD KEY `fk_supplierstock_stock1_idx` (`stock_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehicle_customer_idx` (`customer_id`),
  ADD KEY `fk_vehicle_vehiclemodel1_idx` (`vehiclemodel_id`),
  ADD KEY `fk_vehicle_colour1_idx` (`colour_id`);

--
-- Indexes for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehiclemodel_vehicletype1_idx` (`vehicletype_id`);

--
-- Indexes for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
  ADD PRIMARY KEY (`id`,`jobrequest_id`),
  ADD KEY `fk_vehicleservice_customer1_idx` (`customer_id`),
  ADD KEY `fk_vehicleservice_vehicle1_idx` (`vehicle_id`),
  ADD KEY `fk_vehicleservice_jobrequest1_idx` (`jobrequest_id`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colour`
--
ALTER TABLE `colour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designationmodule`
--
ALTER TABLE `designationmodule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `employeedesignation`
--
ALTER TABLE `employeedesignation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `goodsreceivenotice`
--
ALTER TABLE `goodsreceivenotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goodsreturnnotice`
--
ALTER TABLE `goodsreturnnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobrequest`
--
ALTER TABLE `jobrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobrequestmechanical`
--
ALTER TABLE `jobrequestmechanical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jobrequestservice`
--
ALTER TABLE `jobrequestservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobrequestsparepart`
--
ALTER TABLE `jobrequestsparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mechanical`
--
ALTER TABLE `mechanical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stakeholder`
--
ALTER TABLE `stakeholder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplierstock`
--
ALTER TABLE `supplierstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designationmodule`
--
ALTER TABLE `designationmodule`
  ADD CONSTRAINT `fk_designationmodule_designation1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_designationmodule_module1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `employeedesignation`
--
ALTER TABLE `employeedesignation`
  ADD CONSTRAINT `fk_employeedesignation_designation1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employeedesignation_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_jobrequest1` FOREIGN KEY (`jobrequest_id`) REFERENCES `jobrequest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jobrequest`
--
ALTER TABLE `jobrequest`
  ADD CONSTRAINT `fk_jobrequest_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jobrequest_vehicle1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jobrequestmechanical`
--
ALTER TABLE `jobrequestmechanical`
  ADD CONSTRAINT `fk_jobrequestmechanical_jobrequest1` FOREIGN KEY (`jobrequest_id`) REFERENCES `jobrequest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jobrequestmechanical_mechanical1` FOREIGN KEY (`mechanical_id`) REFERENCES `mechanical` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jobrequestservice`
--
ALTER TABLE `jobrequestservice`
  ADD CONSTRAINT `fk_jobrequestservice_jobrequest1` FOREIGN KEY (`jobrequest_id`) REFERENCES `jobrequest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jobrequestservice_service1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `jobrequestsparepart`
--
ALTER TABLE `jobrequestsparepart`
  ADD CONSTRAINT `fk_jobrequestsparepart_sparepart1` FOREIGN KEY (`sparepart_id`) REFERENCES `sparepart` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jobrequeststock_jobrequest1` FOREIGN KEY (`jobrequest_id`) REFERENCES `jobrequest` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD CONSTRAINT `fk_stakeholder_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_sparepart1` FOREIGN KEY (`sparepart_id`) REFERENCES `sparepart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplierstock`
--
ALTER TABLE `supplierstock`
  ADD CONSTRAINT `fk_supplierstock_goodsreceivenotice1` FOREIGN KEY (`goodsreceivenotice_id`) REFERENCES `goodsreceivenotice` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supplierstock_goodsreturnnotice1` FOREIGN KEY (`goodsreturnnotice_id`) REFERENCES `goodsreturnnotice` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supplierstock_stock1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supplierstock_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehicle_colour1` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_vehiclemodel1` FOREIGN KEY (`vehiclemodel_id`) REFERENCES `vehiclemodel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  ADD CONSTRAINT `fk_vehiclemodel_vehicletype1` FOREIGN KEY (`vehicletype_id`) REFERENCES `vehicletype` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
  ADD CONSTRAINT `fk_vehicleservice_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicleservice_jobrequest1` FOREIGN KEY (`jobrequest_id`) REFERENCES `jobrequest` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicleservice_vehicle1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
