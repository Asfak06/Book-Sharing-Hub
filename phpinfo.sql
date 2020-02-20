-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 03:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_book`
--

CREATE TABLE `item_book` (
  `bookid` int(11) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_author_img` varchar(100) NOT NULL,
  `book_content` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userId` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `user_img`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(5, 'Rich Dad Poor Dad', 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 4, 'good read', 'good book.very informative. Adds new perspective to assets. ', '2019-10-15 03:39:02', '2019-10-15 03:39:02', 1),
(7, 'The Power of Now', 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 5, 'interesting', 'Must read.', '2020-02-19 17:22:55', '2020-02-19 17:22:55', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_book`
--
ALTER TABLE `item_book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_book`
--
ALTER TABLE `item_book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
