-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 03:41 PM
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
(120, 'tamim', '262d800870ff976d084e5c0d3529b508.jpg', 'booked this.', 12);

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
(12, 'Asfak', '60568426908aea2b6f29a23adae0b7cd.jpg', 'February,19,2020', 'asdasd', '33f7cb150cdc5d18f3c12b930b20f863.jpg', 'ICT', '2013-2014', '11509023', '01521259536', 'tipping point', 'malcom gladewell', 'dont know', 'no idea', 'non fiction', 'Non Fiction');

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
(6, 'Tanvin', 'PHYSICS', '2013-2014', '11509015', '01687102997', '11111', '6c5c684b4d9c30523a8e04bcf62ebd4a.jpeg'),
(7, 'Shovon', 'LAW', '2013-2014', '11509002', '01710833146', '33333', 'f0ecbcf3666830e7b6ef23db81c54e23.jpg');

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
