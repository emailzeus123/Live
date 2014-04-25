-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql308.gungoos.com
-- Generation Time: Apr 24, 2014 at 09:42 PM
-- Server version: 5.6.16-64.2-56
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gungo_14617987_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `title`, `post`, `date_added`, `user_id`, `active`) VALUES
(1, 't1         ', 'This is the first update', '2014-04-11 05:42:04', 0, 1),
(4, 't4          ', 'this the forth insert update 4', '2014-04-15 20:56:05', 0, 1),
(3, 't3', 'This the not acitive', '2014-04-11 05:42:48', 0, 0),
(7, 'new post 1', 'the new test post', '2014-04-18 07:23:07', 0, 1),
(8, 'new post 2', 'new test post 2', '2014-04-18 07:23:58', 0, 1),
(9, 'new post 3         ', 'test post 3 update', '2014-04-18 07:26:13', 0, 1),
(10, 'new post 5                  ', 'testing 5', '2014-04-18 07:29:27', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` enum('admin','author','user') NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `user_type`) VALUES
(1, 'emailzeus', '123', 'emailzeus@yahoo.com', 'admin'),
(2, 'jesus', '123', 'jesus@email.com', 'admin'),
(3, 'admin', 'admin', 'admin', 'admin'),
(4, 'user', 'user', 'user', 'user'),
(5, 'author', 'author', 'author', 'author');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
