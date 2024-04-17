-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 07:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codies`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccept`
--

CREATE TABLE `adminaccept` (
  `sno` int(11) NOT NULL,
  `adminUsername` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminaccept`
--

INSERT INTO `adminaccept` (`sno`, `adminUsername`, `adminPass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `adminrequest`
--

CREATE TABLE `adminrequest` (
  `adminNo` int(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminType` varchar(255) NOT NULL,
  `adminLanguage` varchar(255) NOT NULL,
  `adminExprience` varchar(255) NOT NULL,
  `adminFrom` varchar(255) NOT NULL,
  `adminAbout` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminTime` datetime NOT NULL DEFAULT current_timestamp(),
  `adminUsername` varchar(255) NOT NULL,
  `adminPfp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminrequest`
--

INSERT INTO `adminrequest` (`adminNo`, `adminName`, `adminType`, `adminLanguage`, `adminExprience`, `adminFrom`, `adminAbout`, `adminEmail`, `adminTime`, `adminUsername`, `adminPfp`) VALUES
(1, 'admin', 'staff', 'ALL', '5+ years', 'INDIA', 'This is about me', 'admin@gmail.com', '2024-03-10 07:46:25', 'admin', 'cool.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_discreption` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_discreption`, `created`) VALUES
(1, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group.', '2024-03-20 23:32:16'),
(2, 'HTML', 'HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the content and structure of web content.', '2024-03-20 23:32:16'),
(3, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically typed and garbage-collected.', '2024-03-20 23:34:26'),
(4, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the Web, alongside HTML and CSS. 99% of websites use JavaScript on the client side for webpage behavior. ', '2024-03-20 23:34:26'),
(5, 'jQuery', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animations, and Ajax.', '2024-03-20 23:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(25) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`, `comment_rating`) VALUES
(1, 'PHP is the general-purpose programming language used to design a website or web application. It is server-side scripting language embedded with HTML to develop a Static website, Dynamic website or Web applications. It was created by Rasmus Lerdorf in 194.', 1, 4, '2024-03-20 23:46:24', 4),
(2, 'Tags are the primary component of the HTML that defines how the content will be structured/ formatted, whereas Attributes are used along with the HTML tags to define the characteristics of the element. For example, &lt;p align=” center”&gt;Interview questions&lt;/p&gt;, in this the ‘align’ is the attribute using which we will align the paragraph to show in the center of the view.', 2, 4, '2024-03-20 23:46:58', 4),
(3, '->It is a server-side scripting language used to design dynamic websites or web applications.It receives data from forms to generate the dynamic page content.It can work with databases, sessions, send and receive cookies, send emails, etc.It can be used to add, delete, modify content within the database.It can be used to set the restriction to the user to access the web page.', 3, 5, '2024-03-20 23:50:21', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `cSno` int(60) NOT NULL,
  `cName` varchar(255) NOT NULL,
  `cEmail` varchar(255) NOT NULL,
  `cSubject` varchar(255) NOT NULL,
  `cMessage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cSno`, `cName`, `cEmail`, `cSubject`, `cMessage`) VALUES
(1, 'Ramesh', 'rameshggg@gmail.com', 'This is a good forum', 'A discussion forum is an online platform that enables people to engage in ongoing conversations and share information about a particular topic or theme. These forums are often created on community engagement platforms designed for business use.'),
(2, 'mahesh ', 'mahesh@gmail.com', 'Great platform', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione delectus reprehenderit quia, magnam nesciunt temporibus ab. Excepturi nesciunt quia, consectetur voluptates obcaecati provident ex tempora placeat porro aliquid, natus voluptatum quo illum e'),
(3, 'suresh', 'sureshggg@gmail.com', 'The community is very supportive and helpful in addressing coding queries.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione delectus reprehenderit quia, magnam nesciunt temporibus ab. Excepturi nesciunt quia, consectetur voluptates obcaecati provident ex tempora placeat porro aliquid, natus voluptatum quo illum e'),
(4, 'Kask', 'kask@gmail.com', 'The moderators maintain a healthy environment by enforcing guidelines and rules.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem minus quibusdam blanditiis illum totam eius iste. Doloremque mollitia quaerat ea iste nesciunt!'),
(6, 'yash223skd', 'yash223skd@gmail.com', 'The diverse range of topics covered caters to developers with various skill levels and interests.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae vero, nobis ipsa assumenda cupiditate corporis vitae voluptatibus itaque aperiam, laudantium, ad accusamus.\r\n'),
(7, 'umesh', 'umesh223skd@gmail.com', 'TThe forum encourages knowledge sharing, fostering a culture of continuous learning.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae vero, nobis ipsa assumenda cupiditate corporis vitae voluptatibus itaque aperiam, laudantium, ad accusamus.\r\n'),
(8, 'naven', 'naven223skd@gmail.com', 'The feedback provided on posts is often detailed and constructive, aiding in problem-solving.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae vero, nobis ipsa assumenda cupiditate corporis vitae voluptatibus itaque aperiam, laudantium, ad accusamus.\r\n'),
(9, 'jasmin', 'jasmin@gmail.com', 'Real time results', 's.');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timeStamp`) VALUES
(1, 'What is php', 'can you explain me ', 1, 1, '2024-03-20 23:36:48'),
(2, 'Are the HTML tags and elements the same thing?', 'define', 2, 2, '2024-03-20 23:41:23'),
(3, 'What are the uses of PHP?', 'explain\r\n', 1, 3, '2024-03-20 23:44:03'),
(4, 'What is a marquee in HTML?', 'tell me', 2, 6, '2024-03-20 23:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_username` varchar(111) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  `user_img` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_username`, `user_pass`, `timestamp`, `user_name`, `user_img`) VALUES
(1, 'Babu@gmail.com', 'Babu111', '$2y$10$O4tfPGg9amGE6.hpRNVhTeSFPR8VL0RUvkEQBkMoPic083G0Ey50O', '2024-03-20 23:25:43', 'Babu', 'cool.jpg'),
(2, 'yash12@gmail.com', 'yash12', '$2y$10$FF4orF36hNEtl6s8lyWu1uaYTkO5irON3lcidMgx2YKA5L.tY/Lba', '2024-03-20 23:40:32', 'Yash', 'yash12.jpg'),
(3, 'Gaurav@gmail.com', 'Gaurav12', '$2y$10$4QMT22HUUCujNp3vfgRjVOFMiotwSOdPeHbcydiadzSEtWvdfCy2a', '2024-03-20 23:42:30', 'Gaurav', 'Gaurav.png'),
(4, 'ankur12@gmail.com', 'ankur12', '$2y$10$zhj2Qf.zjk3lHbDu.qOTWuAcpD/Rps6kxwPqdBUHWwjlw8xMlnv26', '2024-03-20 23:45:44', 'Ankur', 'ankur12.jpg'),
(5, 'akash12@gmail.com', 'akash12', '$2y$10$H0in2h/btk.b6tp4ZJo70eBP5vgIUPDC/f1ZRCbVlznOGD4Uf4dyi', '2024-03-20 23:49:20', 'Akash', 'anime-boy-pfp-4323.png'),
(6, 'samarth12@gmail.com', 'samarth12', '$2y$10$GXgI059Ih/1f.mcG91cvfupoR/SFM531i3lOuVB4GgbNpM.GKwtM6', '2024-03-20 23:53:33', 'Samarth', 'sm.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccept`
--
ALTER TABLE `adminaccept`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `adminrequest`
--
ALTER TABLE `adminrequest`
  ADD PRIMARY KEY (`adminNo`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`cSno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminaccept`
--
ALTER TABLE `adminaccept`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminrequest`
--
ALTER TABLE `adminrequest`
  MODIFY `adminNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cSno` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
