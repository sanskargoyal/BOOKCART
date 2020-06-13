-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 07:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `category_id` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`category_id`, `category`, `status`) VALUES
('C145-227-987', 'School', 'Active'),
('C422-399-638', 'Novel', 'Active'),
('C607-907-475', 'Kids', 'Active'),
('C678-852-160', 'College', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `book_id` varchar(255) NOT NULL,
  `book_category_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `binding` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`book_id`, `book_category_id`, `title`, `author`, `edition`, `language`, `binding`, `price`, `description`, `publisher`, `genre`, `pages`, `availability`, `status`, `image`) VALUES
('B277-388-397', 'C422-399-638', 'Indian Polity-For Civil Services And Other State Examinations|6th Edition', ' M.Laxmikanth', '2019', 'English', 'Paperback', '652', 'The Book \"Indian Polity\", 6th Edition Is A Must-read For The Aspirants Appearing For The Civil Services Examinations As Well As The Other State Services Examinations. It Is Conceived To Cater To The Requirements Of Not Just Students Appearing For Competitive Examinations But Also Postgraduates, Research Scholars, Academics And General Readers Who Are Interested In The Country\'s Political, Civil And Constitutional Issues. The Extant Chapters Have Been Thoroughly Revised And Updated As Per The Recent Developments.', 'McGraw-Hill', 'Political Science', '440', '50', 'Active', 'indian-polity-for-civil-services-and-other-state-examinations-original-imafm6fyuwxbdjks.jpeg'),
('B473-807-873', 'C852-633-069', 'Word Power Made Easy - The Complete Handbook For Building A Superior Vocabulary', 'Lewis Norman', '2019', 'English', 'Paperback', '166', 'Imprint: Penguin', 'Penguin Random House India', 'Study Aids', '560', '20', 'Active', 'word-power-made-easy-original-imaezp9hvy6gqfxj.jpeg'),
('B902-816-750', 'ABC', 'The Theory Of Everything  ', 'Stephen Hawking', '2006', 'English', 'Paperback', '1400', 'In 1994, Stephen Hawking Delivered Seven Lectures Which Was Published In 1994 Called Stephen W. Hawking\'s Life Works: The Cambridge Lectures. In 2002, An Unauthorized Version Called The Theory Of Everything: The Origin And Fate Of The Universe Was Released.\r\n\r\nThis Work Deals With The Theories Relevant To The Four Fundamental Natural Forces In Physics. This Book Seeks To Remove All The Jargon Associated With This Field And Talks Straight On About The Weak Force, Gravity, Strong Force And The Electromagnetic Force.\r\n\r\nInitially Stephen Hawking Has Stated That There Is A Fifty Percent Probability Of The Four Forces Unifying Into One Force. This Is What He Called The Theory Of Everything. However, It Is Not As Simplistic As It Sounds. There Are Traces Of Pessimism In This Book Where Hawking Admits Are Obstacles Within The Theory.\r\n\r\nThis Work Was Written Years Ago And This Current Text Is A Reprint Which Hawking Does Not Currently Endorse. Yet, This Book Is An Extremely Interesting Read As It Puts Forward Some Of The Extraordinary Theories Which May Not Have Culminated Into Anything But Still Shows Promise Of A Breakthrough.', 'Jaico', 'Jaico', '140', '50', 'Active', 'the-theory-of-everything-original-imadbgf6d45p2qzh.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cartdate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments_table`
--

CREATE TABLE `comments_table` (
  `comment_id` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_table`
--

INSERT INTO `comments_table` (`comment_id`, `book_id`, `name`, `email`, `mobile`, `message`, `post_date`, `status`) VALUES
('C-335116', 'B473-807-873', 'Sanskar', 'sanskar@gmail.com', '1234567890', 'Nice', '10-06-2020', 'Active'),
('C-932197', 'B277-388-397', 'Anuj', 'dhatura@gmail.com', '587945621', 'Excellent', '10-06-2020', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `contact_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`contact_id`, `user_id`, `name`, `email`, `subject`, `message`, `cdate`, `status`) VALUES
('CON-365143', 'C602-534-303', 'Anuj', 'anuj@gmail.com', 'Excellent', 'Good Site', '2020-06-13 03:00:00', ''),
('CON-651206', 'C602-534-303', 'Aman', 'aman@gmail.com', 'Good Site', 'Excellent Site', '2020-06-13 02:59:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_table`
--

CREATE TABLE `orders_table` (
  `order_id` varchar(255) NOT NULL,
  `cart_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_table`
--

INSERT INTO `orders_table` (`order_id`, `cart_id`, `user_id`, `book_id`, `payment`, `total`, `order_date`, `status`) VALUES
('ORDER-877-294', 'CART-924-311', 'C602-534-303', 'B277-388-397', 'Paypal', '652', '2020-05-12 07:33:28', 'Active'),
('ORDER-877-295', 'CART-924-311', 'C602-534-303', 'B277-388-397', 'Paypal', '652', '2020-06-12 07:33:28', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`) VALUES
(1, '9275', 'Department was added successfully'),
(2, '1185', 'Duplicate record found'),
(3, '5426', 'Could not add department'),
(4, '7823', 'Settings applied successfully'),
(5, '1298', 'Could not apply settings'),
(6, '1289', 'Category was added successfully'),
(7, '7732', 'Could not add category'),
(8, '3598', 'Subject was added successfully'),
(9, '1925', 'Could not add subject'),
(10, '6310', 'Student was added successfully, default password is 123456'),
(11, '9157', 'Could not register student'),
(12, '2074', 'Duplicate book found'),
(13, '1189', 'Duplicate email found'),
(14, '2932', 'Examination was added successfully'),
(15, '7788', 'Could not add examination'),
(16, '0357', 'New question was added successfully'),
(17, '3903', 'Could not add question'),
(18, '9174', 'Notice was added successfully'),
(19, '6389', 'Could not add notice'),
(20, '9135', 'You must be admin to access the control panel'),
(21, '9422', 'You must login first'),
(22, '0912', 'Invalid username or password'),
(23, '9122', 'You must be a student to acces the exams'),
(24, '5732', 'Your account has been disabled'),
(25, '8924', 'Account not found'),
(26, '1804', 'New password has been sent to you through your email'),
(27, '1100', 'Could not reset your password');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `addtype` varchar(255) DEFAULT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `fname`, `lname`, `email`, `password`, `phone`, `address`, `city`, `state`, `addtype`, `locality`, `status`, `role`, `avatar`) VALUES
('C075-299-370', 'Anuj', 'Arya', 'anuj@gmail.com', 'anuj', '8745691456', NULL, NULL, NULL, NULL, NULL, 'Active', 'user', ''),
('C343-906-297', 'Mehul', 'Patel', 'mehul@gmail.com', NULL, '5478945216', 'Kanpur', 'Kanpur', 'Uttar Pradesh', 'Home', 'Kakadeo', 'Active', 'user', ''),
('C602-534-303', 'Aman ', 'Kumar ', 'aman@gmail.com', 'aman', '1234567890 ', ' Bareily', 'Bareily', 'Uttar Pradesh', 'Home', 'Kanpur', 'Active', 'user', ''),
('C915-480-607', 'Sanskar', 'Goyal', 'sanskarg025@gmail.com', 'sanskar', '9874562145', NULL, NULL, NULL, NULL, NULL, 'Inactive', 'admin', NULL),
('C919-879-298', 'Dhatura ', 'Kumar ', 'dhatura@gmail.com', NULL, '8745691235 ', ' Unnao', 'Kanpur', 'Uttar Pradesh', 'Home', 'Kanpur', 'Active', 'user', 'eliott-reyna-kcT-7cirBEw-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `comments_table`
--
ALTER TABLE `comments_table`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
