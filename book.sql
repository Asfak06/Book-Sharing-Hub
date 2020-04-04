-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 06:27 PM
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
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `book_id` int(11) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_author_img` varchar(100) NOT NULL,
  `book_content` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`book_id`, `book_author`, `book_author_img`, `book_content`, `post_id`) VALUES
(102, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'booked this.', 3),
(120, 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 'booked this.', 12),
(121, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'booked this.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `comment_author_img` varchar(100) NOT NULL,
  `comment_content` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_author`, `comment_author_img`, `comment_content`, `post_id`) VALUES
(1, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'ddd', 5),
(2, 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 'i need this', 9);

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
(7, 'The Power of Now', 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 5, 'interesting', 'Must read.', '2020-02-19 17:22:55', '2020-02-19 17:22:55', 1),
(8, 'Wireless Communications', 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 3, 'Good book', 'Really helpful ', '2020-03-13 11:08:46', '2020-03-13 11:08:46', 1),
(9, 'The Power of Now', 'Tanvin', '6c5c684b4d9c30523a8e04bcf62ebd4a.png', 5, 'Mind blown', 'A new perspective to everything', '2020-03-14 18:25:02', '2020-03-14 18:25:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_author_img` varchar(100) NOT NULL,
  `post_date` varchar(100) NOT NULL,
  `post_content` varchar(100) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  `post_author_dept` varchar(100) NOT NULL,
  `post_author_ses` varchar(100) NOT NULL,
  `post_author_roll` varchar(100) NOT NULL,
  `post_author_cell` varchar(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publishyear` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_author`, `post_author_img`, `post_date`, `post_content`, `post_img`, `post_author_dept`, `post_author_ses`, `post_author_roll`, `post_author_cell`, `bookname`, `authorname`, `publisher`, `publishyear`, `subject`, `category`) VALUES
(3, 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 'September,07,2019', 'Rich Dad Poor Dad is a 1997 book written by Robert Kiyosaki and Sharon Lechter. It advocates the imp', '0c60754ec5ed5b5ea58555fc17eefc32.jpg', 'CSE', '2015-2016', '11509022', '01923865676', 'Rich Dad Poor Dad', 'Robert Kiyosaki, Sharon L. Lechter', 'Warner Books Ed', 'April 1, 2000', 'financial education', 'Non Fiction'),
(9, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'February,17,2020', 'some  details', '9f49c740469b81332e19b4b61fd39d85.jpg', 'ICT', '2013-2014', '11509023', '01521259536', 'The Power of Now', 'Eckhart Tolle', 'Namaste Publishing', '1997', 'Spirituality, Psychology', 'Non Fiction'),
(12, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'February,19,2020', 'asdasd', '33f7cb150cdc5d18f3c12b930b20f863.jpg', 'ICT', '2013-2014', '11509023', '01521259536', 'tipping point', 'malcom gladewell', 'dont know', 'no idea', 'non fiction', 'Non Fiction'),
(13, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'March,13,2020', 'Dimitris G. Manolakis is currently a Member of Technical Staff at MIT Lincoln Laboratory in Lexingto', 'b80311c2d0b0e68e4e55e6abc9eab554.png', 'ICT', '2013-2014', '11509023', '01521259536', 'Digital Signal Processing', 'John G. Proakis', 'Pearson Prentice Hall', '2007', ' Signal Processing', 'Academic'),
(14, 'Shovon', 'f0ecbcf3666830e7b6ef23db81c54e23.png', 'March,13,2020', 'For cellular radio engineers and technicians.\r\nThe leading book on wireless communications offers a ', 'e71f595c2f2e6545287fdbc4a0f5c88f.png', 'LAW', '2013-2014', '11509002', '01710833146', 'Wireless Communications', 'Theodore S. Rappaport', 'Prentice Hall', '2002', 'Communications', 'Academic'),
(15, 'Tanvin', '6c5c684b4d9c30523a8e04bcf62ebd4a.png', 'March,13,2020', 'Dennis Roddy, Professor Emeritus of Electrical Engineering at Lakehead University in Thunder Bay, On', 'c6ba2871e58c07c523564084a35aba66.png', 'PHYSICS', '2013-2014', '11509015', '01687102997', ' Satellite Communications', 'Dennis Roddy', 'McGraw-Hill', '2001', 'Communications', 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User IP Address',
  `submitted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewlist`
--

CREATE TABLE `reviewlist` (
  `review_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `bookname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewlist`
--

INSERT INTO `reviewlist` (`review_id`, `content`, `author`, `img`, `bookname`) VALUES
(1, '                          this book will change your life\r\n                      ', 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'The Power of Now'),
(2, 'masterpiece\r\n                      ', 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 'The Power of Now'),
(3, 'asset and liability\r\n                      ', 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'Rich Dad Poor Dad');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `dept`, `session`, `roll`, `cell`, `pass`, `img`) VALUES
(4, 'Asfak', 'ICT', '2013-2014', '11509023', '01521259536', '123456', '60568426908aea2b6f29a23adae0b7cd.jpg'),
(5, 'tamim', 'CSE', '2015-2016', '11509022', '01923865676', '22222', '262d800870ff976d084e5c0d3529b508.jpg'),
(6, 'Tanvin', 'PHYSICS', '2013-2014', '11509015', '01687102997', '11111', '6c5c684b4d9c30523a8e04bcf62ebd4a.png'),
(7, 'Shovon', 'LAW', '2013-2014', '11509002', '01710833146', '33333', 'f0ecbcf3666830e7b6ef23db81c54e23.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewlist`
--
ALTER TABLE `reviewlist`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewlist`
--
ALTER TABLE `reviewlist`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
