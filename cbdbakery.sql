-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 06:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbdbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakfast`
--

CREATE TABLE `breakfast` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breakfast`
--

INSERT INTO `breakfast` (`id`, `name`, `price`, `image`) VALUES
(1, 'fruit toast', 6.00, 'fruit.jfif'),
(2, 'ham & cheese croissant', 8.50, 'ham.jfif'),
(3, 'ham, cheese, tomato toastie', 8.20, 'hamcheese.jfif '),
(4, 'double egg & bacon roll', 13.50, 'eggbacon.jpg'),
(5, 'banana bread', 6.00, 'banana.jpg'),
(6, 'cheese & tomato croissant (v)', 8.50, 'tomato.jfif'),
(7, 'egg, bacon & cheese muffin ', 6.80, 'baconegg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`id`, `name`, `price`, `image`) VALUES
(1, 'date scone', 3.20, 'date.jpg'),
(2, 'plain scone', 3.00, 'plainscone.jpg'),
(3, 'scone with jam & cream ', 5.00, 'jamcream.jpg'),
(4, 'cupcake with lcing ', 3.60, 'cupcake.jfif'),
(5, 'cupcake with butter cream', 4.60, 'cupcake.jfif'),
(6, 'brownie ', 5.00, 'brownie.jpg '),
(7, 'cherry slice', 4.80, 'chery.jpg'),
(8, 'caramel slice', 4.90, 'caramel.jpg'),
(9, 'hedgehog slice', 4.90, 'hedgehog.pjg'),
(10, 'lemon slice', 4.80, 'lemon.jpg'),
(11, 'croissant', 5.00, 'croisssant.jfif'),
(12, 'almond croissant ', 5.80, 'almond.jpg'),
(13, 'chocolate croissant ', 5.40, 'chocolate.jpg'),
(14, 'flourless almond & orange cake (gf)', 4.80, 'orange.jpg'),
(15, 'Assorted vegan & gluten free slices', 6.00, 'assortedvegan.jpg'),
(16, 'jam tart', 3.50, 'tart.jfif'),
(17, 'neenish tart', 3.80, 'neenish.jpeg'),
(18, 'chocolate crackle ', 3.80, 'crackle.jpg'),
(19, 'honey joy', 3.80, 'honeyjoy.jpg'),
(20, 'apple scroll ', 4.80, 'apple.jpg'),
(21, 'coffee scroll ', 4.80, 'coffee.jpg'),
(22, 'cookies', 5.00, 'cookies.jpg'),
(23, 'custard tart', 4.80, 'custard.jfif'),
(24, 'vanilla slice ', 4.90, 'vanilla.jpg'),
(25, 'apple cake', 5.00, 'applecake.jfif'),
(26, 'lamington', 4.80, 'lamington.jpg'),
(27, 'muffin', 5.50, 'muffin.jpg'),
(28, 'chocolate eclair', 5.00, 'eclair.jpg'),
(29, 'danish (assorted fruit & custard)', 5.30, 'danish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'party food'),
(2, 'pies'),
(3, 'hot breakfast'),
(4, 'donuts'),
(5, 'cakes and slices');

-- --------------------------------------------------------

--
-- Table structure for table `donuts`
--

CREATE TABLE `donuts` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donuts`
--

INSERT INTO `donuts` (`id`, `name`, `price`, `image`) VALUES
(1, 'cinnamon', 2.20, 'cinnamon.jfif'),
(2, 'mini filled', 3.80, 'filleddonut.jfif'),
(3, 'iced jam ball', 4.80, 'icedjam.jfif'),
(4, 'iced ', 2.60, 'iced.jfif'),
(5, 'jam ball', 4.60, 'jam.jpg'),
(6, 'long john ', 5.00, 'jhon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pie`
--

CREATE TABLE `pie` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pie`
--

INSERT INTO `pie` (`id`, `name`, `price`, `image`) VALUES
(1, 'plain pie', 7.40, 'plainpie.jfif'),
(2, 'mushroom pie', 7.70, 'mushroom.jpg'),
(3, 'steak & onion pie', 7.70, 'onion.jpg'),
(4, 'pepper steak pie', 8.40, 'pepper.jfif'),
(5, 'chicken & leek pie', 8.40, 'chicken.jpeg'),
(6, 'cornish pastie', 7.70, 'Cornish.jpg'),
(7, 'quicche lorraine', 7.50, 'lorrainepie.jpg'),
(8, 'sausage roll', 6.20, 'roll.jpg'),
(9, 'cheese & bacon pie', 7.70, 'bacon.jpg'),
(10, 'curry pie', 7.70, 'curry.jpg'),
(11, 'cheese & spinach filo (v)', 7.70, 'filopie.jpg'),
(12, 'vegetable pastie (vg)', 7.50, 'vegpastie.jpeg'),
(13, 'vegetable quiche (v)', 7.50, 'vegquiche.jpg'),
(14, 'mini filled croissants ', 6.00, 'minifilled.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eachprice` decimal(10,2) NOT NULL,
  `dozenprice` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `eachprice`, `dozenprice`, `image`) VALUES
(1, 'party sausage roll', 3.50, 28.00, 'sausage.jpg'),
(2, 'party quiche lorraine', 3.50, 30.00, 'quiche.jpg'),
(3, 'party spinach & cheese filo (v)', 3.50, 30.00, 'spinach.jpg'),
(4, 'party pies', 3.50, 30.00, 'pie.jpg'),
(5, 'party quiche vegetable', 3.50, 30.00, 'vegetable.jpg'),
(6, 'vegan party pastie (min 6)', 3.80, 36.00, 'vegpastie.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donuts`
--
ALTER TABLE `donuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pie`
--
ALTER TABLE `pie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
