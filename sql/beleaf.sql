-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2025 at 08:15 PM
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
-- Database: `beleaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(8) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `login`, `password`) VALUES
(1, 'Meri', 'meri@gmail.com', 'meri03');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'body care', 'body care.jpg'),
(2, 'face care', 'face care.jpg'),
(4, 'hair care', 'hair care.jpg'),
(25, 'bath care', 'bath care.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `prod_id` int(5) NOT NULL,
  `quantity` int(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `prod_id`, `quantity`, `created_at`) VALUES
(109, 1, 19, 1, '2025-06-14'),
(110, 1, 22, 1, '2025-06-14'),
(111, 1, 26, 1, '2025-06-14'),
(112, 1, 25, 1, '2025-06-14'),
(113, 1, 24, 1, '2025-06-14'),
(114, 1, 21, 2, '2025-06-14'),
(115, 1, 20, 1, '2025-07-22'),
(116, 1, 12, 1, '2025-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `cat_id`) VALUES
(3, 'Body Balm', 'Indulge your skin with deep nourishment and lasting hydration. Body balm is crafted with rich botanical extracts and essential oils to restore and protect your skin.', 14, 'bodybalm.jpg', 1),
(5, 'Body Oil', 'Perfect for all skin types, it provides intense moisture without leaving a greasy residue, making it ideal for daily use.', 8, 'oil2.jpg', 1),
(7, 'Body Mask', ' Infused with rich minerals, nourishing botanicals, and skin-renewing ingredients, this formula deeply purifies, replenishes, and leaves your skin glowing. ', 16, 'bodymask.jpg', 1),
(10, 'Suncream', 'Water-resistant and fast-absorbing, it provides a smooth, non-greasy finish, making it perfect for outdoor adventures or everyday wear.', 10, 'suncream.jpg', 1),
(11, 'Face Toner', 'Infused with soothing botanicals and skin-loving ingredients, this helps remove impurities, tighten pores, and restore your skin’s natural glow.', 11, 'facetoner.jpg', 2),
(12, 'Face Oil', 'Elevate your skincare routine with ultra-nourishing face oil, designed to hydrate, restore, and enhance your natural glow. ', 8, 'faceoil.jpg', 2),
(13, 'Micellar Water', 'Powered by micelle technology, this lightweight formula attracts and lifts away makeup, dirt, and impurities without stripping the skin.', 10, 'micellar.jpg', 2),
(14, 'Wash Gel', ' Enriched with nourishing botanical extracts, this lightweight gel creates a soft lather that purifies without over-drying.', 6, 'washgel.jpg', 2),
(15, 'Shampoo', 'Designed to leave hair soft, fresh and beautifully shiny, it is perfect for everyday use. The shampoo provides balanced hair care.', 13, 'shampoo.jpg', 3),
(16, 'Toothpaste', 'Infused with enamel-safe whitening agents and cavity-fighting fluoride, this  formula removes plaque, prevents decay, and leaves your breath feeling fresh all day long.', 6, 'toothpaste.jpg', 3),
(17, 'Soap', ' Enriched with skin-loving ingredients and botanical extracts, this rich formula lathers beautifully, leaving your skin feeling soft, refreshed, and delicately scented. ', 8, 'soap.jpg', 3),
(18, 'Shower Cream', 'Perfect for all skin types, it provides long-lasting moisture and a delicate fragrance for freshness. Designed to cleanse and deeply moisturize.\r\n', 7, 'showercream.jpg', 3),
(19, 'Hair Gel', '\r\nDesigned for strong hold and flexibility, this lightweight formula holds your hair in place without stiffness or frizz. Enriched with nourishing ingredients.', 13, 'hairgel.jpg', 4),
(20, 'Hair Oil', 'Restore your hair with our ultra-nourishing hair oil, formulated to hydrate, strengthen, and enhance shine. This oil provides deep moisture.', 9, 'oil.jpg', 4),
(21, 'Hair Mask', 'Transform your hair with  intensive keratin hair mask, designed to restore strength, shine, and smoothness. Infused with powerful keratin proteins.', 14, 'hairmask.jpg', 4),
(22, 'Hair Spray', 'Defend your hair from heat damage with advanced thermal protection spray. Designed to shield strands from the effects of styling tools.', 11, 'hairspray.jpg', 4),
(24, 'Shampoo', 'Designed to leave hair soft, fresh and beautifully shiny, it is perfect for everyday use. The shampoo provides balanced hair care.', 13, 'shampoo.jpg', 25),
(25, 'Toothpaste', 'Infused with enamel-safe whitening agents and cavity-fighting fluoride, this formula removes plaque, prevents decay, and leaves your breath feeling fresh all day long.', 6, 'toothpaste.jpg', 25),
(26, 'Soap', 'Enriched with skin-loving ingredients and botanical extracts, this rich formula lathers beautifully, leaving your skin feeling soft, refreshed, and delicately scented.', 8, 'soap.jpg', 25),
(27, 'Shower Cream', 'Perfect for all skin types, it provides long-lasting moisture and a delicate fragrance for freshness. Designed to cleanse and deeply moisturize.', 7, 'showercream.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'Mery Yesayan', 'mery_yesayan', 'meri@gmail.com', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
