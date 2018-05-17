-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 03:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `venue_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `special_password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email_id`, `password`, `special_password`, `name`) VALUES
('avnishagr@gmail.com', 'imthebest', 'm150503ca', 'Avnish Agrahari');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` varchar(20) NOT NULL,
  `hall_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `date` date NOT NULL,
  `review_status` int(1) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `hall_id`, `user_id`, `status`, `date`, `review_status`) VALUES
('VB001B', 'VB122HI', 'VB122UR', 0, '2018-04-27', 0),
('VB002B', 'VB126HI', 'VB126HO', 0, '2018-04-27', 0),
('VB003B', 'VB124HI', 'VB127UR', 0, '2018-04-28', 0),
('VB004B', 'VB124HI', 'VB127UR', 0, '2018-04-23', 0),
('VB10B', 'VB131HI', 'VB118UR', 0, '2018-05-27', 0),
('VB9B', 'VB122HI', 'VB118UR', 0, '2018-04-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hall_images`
--

CREATE TABLE IF NOT EXISTS `hall_images` (
  `hall_id` varchar(20) NOT NULL,
  `media_url` varchar(200) NOT NULL,
  `image_description` varchar(2000) NOT NULL,
  PRIMARY KEY (`media_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall_images`
--

INSERT INTO `hall_images` (`hall_id`, `media_url`, `image_description`) VALUES
('VB124HI', '1 (1).jpg', 'b'),
('VB124HI', '1 (2).jpg', 'c'),
('VB124HI', '1 (3).jpg', 'd'),
('VB130HI', '1.jpg', '3'),
('VB122HI', '4385aa086bfc933f375bf23312a083f4 (1).jpg', 'image3'),
('VB122HI', 'AlDanaWeddingHall2.jpg', 'image2'),
('VB131HI', 'awesome-living-hall-design-images-decoration-ideas-cheap.jpg', 'image1'),
('VB131HI', 'banquet-halls-feature-image.jpg', 'image4'),
('VB129HI', 'f1.jpg', 'a1'),
('VB129HI', 'f2.jpg', 'a2'),
('VB129HI', 'f4.jpg', 'a3'),
('VB129HI', 'f6.jpg', 'a4'),
('VB124HI', 'hall4.jpg', 'a'),
('VB131HI', 'HD-39.jpg', 'image2'),
('VB123HI', 'ice_2016-12-22-23-42-38-938.jpg', 'IMAGE2'),
('VB131HI', 'maxresdefault (1).jpg', 'image3'),
('VB122HI', 'o.jpg', 'image4'),
('VB122HI', 'Phoenix.jpg', 'image1');

-- --------------------------------------------------------

--
-- Table structure for table `hall_owner`
--

CREATE TABLE IF NOT EXISTS `hall_owner` (
  `owner_id` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `media_url` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` text NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `hall_name` varchar(50) NOT NULL,
  `hall_id` varchar(20) NOT NULL,
  `verification_status` varchar(1) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall_owner`
--

INSERT INTO `hall_owner` (`owner_id`, `user_name`, `email`, `mobile_no`, `media_url`, `gender`, `dob`, `street_address`, `city`, `state`, `zip_code`, `hall_name`, `hall_id`, `verification_status`) VALUES
('VB120HO', 'SONIA', 'snk@gmail.com', '8574634154', '', 'Male', '04/01/1978', 'm-23 rajendra nager', 'allahabad', 'uttar pradesh', '  211005', 'rajat skl wedding service ', 'VB120HI', '2'),
('VB122HO', 'anoop maurya          ', 'anoop@gmail.com', '9876543210', 'abc.png', 'Male', '04/02/1990                              ', ' rajesh nager e-23               ', '                 nagpur               ', '               maharashtra               ', '                 564230               ', ' rajeshmita              ', 'VB122HI', '1'),
('VB123HO', 'deepika agrahari ', 'deepika@gmail.com', '8574634154', '', 'Female', '04/17/1990', 'room-no_2213,MBA_HOSTEL', 'CALICUT', 'KERALA', '673601', ' deps wedding hall', 'VB123HI', '2'),
('VB124HO', 'avnish agr    ', 'avnnitc@gmail.com', '8574778572', 'abc.png', 'Male', '04/01/1990          ', 'room no 2213, MBA hostel, NITC ', '    Calicut', '    Kerala    ', '    673601    ', 'avn-wedzing services     ', 'VB124HI', '2'),
('VB126HO', 'abhiraaj gupta   ', 'abiraaj@gmail.com', '8574556673', 'abc.png', 'Male', '1995-04-24    ', ' gali no 430 raaj nager  ', '    allahabad  ', '    uttar pradesh  ', '  673601  ', '', 'VB126HI', '1'),
('VB129HO', 'deepika agrahari ', 'dips@gmail.com', '8574634154', 'abc.png', 'Female', '1996-04-10', ' r- 234 rajesh nager, civil lines', '  allahabad', '  uttar pradesh', '  211002', '', 'VB129HI', '1'),
('VB130HO', 'yogendra maurya ', 'yogi@gmail.com', '9532712764', 'abc.png', 'Male', '1993-04-30', 'room-no 2213 MBA HOSTEL', 'calicut', 'KERALA', '673601', '', 'VB130HI', '1'),
('VB131HO', 'ajay agrahari  ', 'ajay@gmail.com', '+918574778', '', 'Female', '1995-04-30  ', 'room no 2213 ', ' allahabad ', ' NIT CALICUT KERALA ', ' 211002 ', '', 'VB131HI', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `user_id` varchar(20) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `paid_money` int(10) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `hall_id` varchar(20) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user_id`, `transaction_id`, `paid_money`, `date`, `bank_name`, `booking_id`, `hall_id`) VALUES
('VB127UR', 'VB003P', 200000, '2018-04-27', 'City Carp', 'VB003B', 'VB124HI'),
('VB127UR', 'VB004P', 10000, '2018-04-23', 'ALLAHABAD BANK', 'VB004B', 'VB124HI'),
('VB118UR', 'VB10P', 20000, '2018-05-01', 'sbi', 'VB10B', 'VB131HI'),
('VB118UR', 'VB9P', 20000, '2018-04-27', 'sbi', 'VB9B', 'VB122HI');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `userid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `email`, `password`) VALUES
('VB118UR', 'arsh@gmail.com', '12345'),
('VB119UR', 'rajputavn@gmail.com', '12345'),
('VB120HO', 'snk@gmail.com', '12345'),
('VB121UR', 'pa@gmail.com', '12345'),
('VB122HO', 'anoop@gmail.com', 'anoop'),
('VB123HO', 'deepika@gmail.com', 'deep'),
('VB124HO', 'avnnitc@gmail.com', '12345'),
('VB125UR', 'hsona@gmail.com', 'hsona'),
('VB126HO', 'abiraaj@gmail.com', '1234'),
('VB127UR', 'dheesh@gmail.com', 'dheesh'),
('VB128UR', 'monika@gmail.com', 'monika'),
('VB129HO', 'dips@gmail.com', 'dips'),
('VB130HO', 'yogi@gmail.com', 'yogi'),
('VB131HO', 'ajay@gmail.com', 'ajay'),
('VB132UR', 'raman@gmail.com', 'raman');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `user_id` varchar(50) NOT NULL,
  `hall_id` varchar(50) NOT NULL,
  `review` varchar(2000) NOT NULL,
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`user_id`, `hall_id`, `review`, `review_id`) VALUES
('VB122UR', 'VB124HI', 'yes nice service and facilities', 1),
('VB118UR', 'VB122HI', 'all services are very good. but one thing you should improve on your parking services. only 200 vehicle space for parking. Other than that everything is mind blowing.Wish to come soon :)', 7),
('VB122UR', 'VB122HI', 'all services are very good. but one thing you should improve on your parking services. only 200 vehicle space for parking. Other than that everything is mind blowing.Wish to come soon :)', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `profile_url` varchar(2000) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `date` date NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `user_name`, `profile_url`, `gender`, `profession`, `dob`, `date`, `mobile_no`, `email`, `city`, `street_address`, `state`, `zip_code`) VALUES
('VB117UR', 'abhishek nair', '', '', '', '0000-00-00', '2018-04-04', '', 'abhi@gmail.com', '', '', '', ''),
('VB118UR', 'Avnish Agrahari', 'abc.png', 'Male', ' banker', '1996-04-30', '2018-04-07', '8574778572', 'arsh@gmail.com', 'delhi', 'E-3_MADHOUNJ katra', 'delhi ', '211002'),
('VB119UR', 'avinash', '', 'Male', 'RAILways', '0000-00-00', '2018-04-09', '9532712764', 'rajputavn@gmail.com', 'calicut', 'E-3 MADHOUNJ', 'kerala', '673601'),
('VB122UR', 'abhishek gupta', '', 'Male', 'Railway Employe', '0000-00-00', '2018-04-16', '876543210', 'abhi123@gmail.com', 'CALICUT', 'room no 2219 MBA hostel', 'KERALA', '673601'),
('VB126UR', 'avby', '', '', '', '0000-00-00', '2018-04-18', '', 'av@gmail.com', '', '', '', ''),
('VB127UR', 'dwarika dheesh', 'abc.png', 'Male', 'king', '0000-00-00', '2018-04-18', '9876543210', 'dheesh@gmail.com', 'dwarika', '1/2 near mahal', 'dwarika', '12345'),
('VB128UR', 'monika agrahari', 'abc.png', 'Female', '     bank manager', '1996-04-03', '2018-04-25', '9532712764', 'monika@gmail.com', 'allahabad', '2/8 B laal ji jaishwal', 'uttar   pradesh', '211002'),
('VB132UR', 'raman agr', 'abc.png', 'Male', ' student', '1998-04-08', '2018-04-26', '8574556673', 'raman@gmail.com', 'allahabad', 'gali no 430 raaj nager', ' uttar pradesh', '211002');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_hall`
--

CREATE TABLE IF NOT EXISTS `wedding_hall` (
  `hall_id` varchar(20) NOT NULL,
  `hall_street_address` varchar(50) NOT NULL,
  `hall_city` varchar(50) NOT NULL,
  `hall_name` varchar(100) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `hall_image` varchar(100) NOT NULL,
  `menu_type` varchar(50) NOT NULL,
  `decoration` varchar(50) NOT NULL,
  `caterer` varchar(50) NOT NULL,
  `ac_service` varchar(50) NOT NULL,
  `hall_rent` int(20) NOT NULL,
  `no_of_seat` int(5) NOT NULL,
  `no_of_rooms` int(5) NOT NULL,
  `hall_discription` varchar(2000) NOT NULL,
  `status` int(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_hall`
--

INSERT INTO `wedding_hall` (`hall_id`, `hall_street_address`, `hall_city`, `hall_name`, `landmark`, `hall_image`, `menu_type`, `decoration`, `caterer`, `ac_service`, `hall_rent`, `no_of_seat`, `no_of_rooms`, `hall_discription`, `status`, `date`) VALUES
('VB120HI', 'E-3 madhounj katra', 'kanpur', 'Raajasmita wedding hall', '0', 'a2.jpeg', '', '', '', '0', 300, 1200, 400, 'hello and welcome to aour wedding service', 1, '0000-00-00'),
('VB122HI', 'e-23 rajeshmita ', 'allahabad', 'saadi mubarak season 2 ', 'near NIT gate', 'a1.jpg', 'vej and non vej both', 'yes included with hall booking', 'yes', 'for 200 rooms', 20000, 300, 200, 'Perquiramus atque ut casus tui ex quae ad te ad suis caelo dicit hoc. Tempore percussus ait est amet consensit cellula rei civibus in modo ad nomine. Navibus celebrent duo dominus Lampsacenus tu bestias terras navis cupit quae vero quo. A his domino vias multis miraculum manibus individuationis quae ad suis ut diem obiecti invidunt cum magna duobus auro purpurea vobis.', 1, '2018-04-22'),
('VB123HI', 'kunnamangalam', 'kanpur', 'abc wedding hall', '0', 'a6.jpg', '', '', '', '0', 12000, 230, 200, 'yes', 1, '2018-04-25'),
('VB124HI', 'e-23 rajeshmita       ', 'allahabad', 'avn-wedzing services          ', 'near', 'a2.jpeg', 'both veg and non vej', 'yes decomration is availble', 'External not availble', 'yes for 200 rooms', 5000, 600, 500, 'abxyjgyug', 2, '2018-04-25'),
('VB126HI', 'lakksmi chauraha E-23', 'allahabad', 'anmol saadi mubarak wedding hall', '0', 'a2.jpeg', '', '', '', '0', 200000, 400, 500, '', 0, '2018-04-19'),
('VB129HI', ' r- 231 civil lines  ', 'allahabad ', ' dips saadi and reception service ', 'near perol pump', 'a6.jpg', 'vej and non vej both', 'yes included with hall booking', ' external not allowed', ' for 400 rooms ', 30000, 500, 400, 'helllo and welcom to dips wedding service', 0, '2018-04-25'),
('VB130HI', ' room no 1208 MBA hostel', 'allahabad', ' yogi wedding service', 'near nit calicut', 'terrace.jpg', 'both veg and non vej', 'yes decomration is availble', 'External not availble', 'yes for 200 rooms', 200000, 5000, 4000, 'hello and welcome to yogi wedding service', 0, '2018-04-26'),
('VB131HI', 'room no 2213 mba hostel', 'allahabad', ' ajay wedding service', 'near nit calicut', 'a2.jpeg', 'both veg and non vej', 'yes included with hall booking', 'yes availbe', ' yes for 200 rooms', 30000, 400, 300, 'ab avsd abs ashva', 1, '2018-04-26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
