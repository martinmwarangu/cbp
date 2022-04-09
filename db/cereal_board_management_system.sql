-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2019 at 07:05 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cereal_board_management_system`
--
CREATE DATABASE IF NOT EXISTS `cereal_board_management_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cereal_board_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `cereals`
--

CREATE TABLE IF NOT EXISTS `cereals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cerealtype` varchar(20) NOT NULL,
  `price` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cereals`
--

INSERT INTO `cereals` (`id`, `cerealtype`, `price`) VALUES
(2, 'Maize', 2300),
(3, 'Millet', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pa_id` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `c_from` varchar(30) NOT NULL,
  `c_date` varchar(20) NOT NULL,
  `c_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pa_id`, `comment`, `c_from`, `c_date`, `c_time`) VALUES
(1, 1829, 'gjdhvusvji', 'admin', '31-Jan-2018', '07:01 am'),
(2, 1829, 'cgfg', 'admin', '31-Jan-2018', '07:01 am'),
(3, 1831, 'xhhggf', 'emp', '31-Jan-2018', '07:01 am'),
(4, 1829, 'ftrykyikfkg', 'admin', '21-Mar-2018', '16:03 pm'),
(5, 1829, 'eeeeee', 'nyerifarmers@ac.ke', '10-Feb-2019', '20:02 pm'),
(6, 1829, 'vfdfds', 'nyerifarmers@ac.ke', '10-Feb-2019', '20:02 pm');

-- --------------------------------------------------------

--
-- Table structure for table `farmerrecord`
--

CREATE TABLE IF NOT EXISTS `farmerrecord` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `id_num` varchar(18) NOT NULL,
  `phone` text NOT NULL,
  `farmno` text NOT NULL,
  `farmlocation` text NOT NULL,
  `sacco` text NOT NULL,
  `cerealtype` varchar(30) NOT NULL,
  `noofbagsdelivered` text NOT NULL,
  `day` text NOT NULL,
  `date` text NOT NULL,
  `amount` text NOT NULL,
  `dueamount` text NOT NULL,
  `paidamount` text NOT NULL,
  `ncpdelivered` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `farmerrecord`
--

INSERT INTO `farmerrecord` (`fid`, `name`, `id_num`, `phone`, `farmno`, `farmlocation`, `sacco`, `cerealtype`, `noofbagsdelivered`, `day`, `date`, `amount`, `dueamount`, `paidamount`, `ncpdelivered`) VALUES
(8, 'Navoy Western', '1600', '0701635572', 'plot /343234', 'nairobi', 'Nyeri Farmers SACCO', 'Millet', '12', 'Monday', 'Feb,11,2019', '', '', '4270', '1'),
(10, 'Arthur Nderi', '1300', '03701635572', '32674615', 'NYERI', 'Nyeri Farmers SACCO', 'Maize', '100', 'Wensday', 'Feb,11,2019', '', '', '3082000', '1'),
(11, 'Arthur Nderitu', '1300', '03701635572', '32674615', 'NYERI', 'Nyeri Farmers SACCO', 'Maize', '1340', 'Monday', 'Feb,11,2019', '', '', '3082000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `gmails`
--

CREATE TABLE IF NOT EXISTS `gmails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `nid` int(15) NOT NULL,
  `phone` int(15) NOT NULL,
  `residence` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `subject` varchar(29) NOT NULL,
  `message` varchar(300) NOT NULL,
  `reply` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `gmails`
--

INSERT INTO `gmails` (`id`, `name`, `nid`, `phone`, `residence`, `email`, `subject`, `message`, `reply`) VALUES
(1, 'ezra daniel', 0, 1000000000, 'Nakuru', 'seannavoy@gmail', '', '', ''),
(2, 'Navoy', 0, 1000000001, 'Nyeri', 'sunnygkp10@gmai', '', '', ''),
(3, 'Bread', 0, 1000000000, 'Baringo', 'easd@hot.com', 'sclmcz', 'zxcxzccxc', ''),
(4, 'john', 0, 53453453, 'Kisumu', 'sean@hot.com', 'jkfdsjk', 'cjhsajdsa ', ''),
(5, 'Navoy Western', 32674615, 701635572, 'Nakuru', 'seannavoy@gmail', 'compain', 'check ', '');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `n_date` varchar(20) NOT NULL,
  `n_time` varchar(20) NOT NULL,
  `n_title` varchar(35) NOT NULL,
  `n_contents` varchar(200) NOT NULL,
  `more_info` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1832 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `id_num` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `farmno` varchar(20) NOT NULL,
  `farmlocation` varchar(20) NOT NULL,
  `sacco` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `user_level` int(2) NOT NULL DEFAULT '2',
  `active` varchar(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `id_num`, `phone`, `email`, `residence`, `gender`, `farmno`, `farmlocation`, `sacco`, `username`, `pass`, `user_level`, `active`) VALUES
(2, 'Paul John', '1100', '2245856866', 'wanjige@gmail.com', 'nakuru', 'female', '', '', '', 'user', 'user', 2, '1'),
(11, 'Arthur Nderitu', '1300', '03701635572', 'host@gmail.com', 'Laikipia', 'male', '32674615', 'NYERI', '', 'arthur', '1234', 3, ''),
(12, 'seannavoy', '1400', '0701635572', 'kwest@hot.com', 'Nyeri', 'female', '35454565', '', '', 'nav', 'nav', 2, '1'),
(13, 'Navoy', '1500', '', 'seannavoy@gmail.com', '', '', '', 'NYERI', '', 'admin', 'admin', 1, '1'),
(14, 'Navoy Western', '1600', '0701635572', 'seannavoy@gmail.com', 'Nakuru', 'female', 'plot /343234', 'nairobi', '', 'kkkkk', 'nav', 3, '1'),
(17, 'western smart', '32344', '', 'host@gmail.com', '', '', '', '', '', 'wester', '123', 1, '1'),
(21, '1', '32000', '25543545', 'nyerifarmers@ac.ke', 'Nanyuki', '', '', 'Nyeri', 'Nyeri Farmers SACCO', 'nyerifarmers@ac.ke', '1234', 2, '1'),
(22, '1', '254400', '2533899', 'bungomacerealfarmers@co.ke', 'Bungoma', '', '', 'Bungoma', 'Bungoma Cereal Farmers', 'bungomacerealfarmers@co.ke', '1000', 2, '1'),
(23, '1', '3245543', '1845372', 'tranzoia@ac.ke', 'Kitale', '', '', 'Tranzoia', 'Tranzoia Farmers Sacco', 'tranzoia@ac.ke', '123456', 2, '1'),
(24, '1', '435673', '24573948', 'uasingishucerealboard@outlook.com', 'Eldoret', '', '', 'Uasingishu', 'Uasingishu Farmers Association', 'uasingishucerealboard@outlook.', '1234', 2, '1'),
(25, 'Kelvin West', '3243545', '', 'kelwest@yahoo.com', '', '', '', '', '', 'manager', 'manager', 3, '1'),
(26, '1', '2324353', '2545343', 'nak@co.ke', 'Nakuru', '', '', 'Nakuru', 'Nakuru Farmers Sacco', 'nak@co.ke', '1234', 2, '1'),
(27, 'kru', '2434343', '232322323', 'seannavoy@gmail.com', 'Nakuru', 'male', '323232', 'dfd', '', 'key', 'key', 8, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
