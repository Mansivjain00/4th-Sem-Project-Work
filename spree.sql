-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 07:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spree`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(3, 'First Cry'),
(4, 'Nykaa'),
(5, 'Home Center'),
(6, 'Accessorize'),
(10, 'H&M'),
(11, 'Louis Philippe'),
(12, 'Zara');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Men'),
(3, 'Women'),
(4, 'Kids'),
(5, 'Beauty & Grooming'),
(6, 'Home & Living'),
(7, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `feedback`, `date`) VALUES
(1, 'Mansi V Jain', 'mansi.cs20@bmsce.ac.in', 'I enjoyed shopping here at Spree! \r\n1) The delivery of the products was done much before the promised time.\r\n2) The quality of the products received were great!\r\n3) Value For Money Products. ', '2022-09-04 21:26:51'),
(2, 'Rashi V Jain', 'rashivjain007@gmail.com', 'Always satisfied with the service, you can find literally anything you want on Spree. Delivery is fast too. Great customer service. Heard there might be issues with the refunds. ', '2022-09-04 21:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image`, `price`, `date`, `status`) VALUES
(2, 'Floral Shirt', 'Relaxed Summer Fit for Men', 'Shirt,Men,H&M,Summer', 2, 10, 'Men(floral).jpg', '1199', '2022-08-08 22:40:14', '1'),
(3, 'Blue Sweatshirt', 'Plain Blue Sweatshirt for Men ', 'Blue, Sweatshirt, H&M, Men', 2, 10, 'Men(sweatshirt).jpg', '1399', '2022-08-08 22:45:46', '1'),
(4, 'Cream Hoodie', 'Comfortable Cream Hoodie for Men', 'Men,H&M,Hoodie,Cream', 2, 10, 'Men(Hoodie).jpg', '1599', '2022-08-08 22:47:41', '1'),
(5, 'Light Pink Bodysuit', 'Elegant Bodysuits for Women', 'Bodysuit,Women,H&M', 3, 10, 'Women(Body Suit).jpg', '1099', '2022-08-08 22:50:01', '1'),
(6, 'Blue Ripped Jeans ', 'Blue Ripped Denim Jeans for Women', 'Jeans,Women,H&M,Ripped', 3, 10, 'Women(jeans).jpg', '1999', '2022-08-08 22:51:29', '1'),
(7, 'Grey Dress', 'Grey Dress for a Baby Girl', 'Baby,Girl,Dress,first cry', 4, 3, 'Kids(frock).jpg', '999', '2022-08-08 22:54:50', '1'),
(8, 'Checkered Outfit', 'Checkered Outfit for Baby Boys', 'Boys,First Cry,Baby,Checkered', 4, 3, 'Kids(checkered).jpg', '999', '2022-08-08 22:56:35', '1'),
(9, 'Syga Turban', 'Syga Turban Wrapped Style Cap Cream for kids', 'Turban, Syga, Kids, First Cry', 4, 3, 'Kids(turban).jpg', '499', '2022-08-08 22:58:41', '1'),
(10, 'Babyhug Giraffe Shaped Toy', 'A Babyhug Giraffe Shaped Toy for Kids', 'Giraffe,Babyhug,First Cry, Kids', 4, 3, 'Kids(toys).jpg', '599', '2022-08-08 23:00:48', '1'),
(11, 'Hippo the Elephant', 'Hippo Soft Toy for kids', 'Hippo, Elephant, First Cry', 4, 3, 'Kids(toys-elephant).jpg', '399', '2022-08-08 23:02:16', '1'),
(12, 'Nykaa Matte Finish Lipstick', 'Nykaa Matte to Last Liquid Lipstick', 'Nykaa, Matte, Lipstick,', 5, 4, 'Nykaa(Lipstick).jpg', '599', '2022-08-08 23:07:36', '1'),
(13, 'Nykaa Eyeliner', 'Nykaa Glamorous Eyeliner Pencil Shade', 'Nykaa,Eyeliner', 5, 4, 'Nykaa(Eyeliner).jpg', '499', '2022-08-08 23:10:03', '1'),
(14, 'Dinner Set', 'Home Center Dinner Set for Beautiful Homes', 'Dinner Set, Home center', 6, 5, 'homecenter(Dinner set).jpg', '2999', '2022-08-08 23:12:06', '1'),
(15, 'Plants', 'Home Center Plants to decorate your beautiful home', 'Plants, Home Center', 6, 5, 'homecenter(plants).jpg', '799', '2022-08-08 23:13:37', '1'),
(16, 'Golden Three Layered Chain', 'Golden Three Layered Chain for Women', 'Chain, Golden, Accessorize', 7, 6, 'Accessorize(Chain).jpg', '899', '2022-08-08 23:15:14', '1'),
(17, 'Golden Half Hoops', 'Gold Tonned Half Hoop Earrings for Women', 'Golden, Hoop, Women, earrings,Accessorize', 7, 6, 'Accessorize(hoops).jpg', '1099', '2022-08-08 23:17:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(9, 6, 1897, 1757919479, 3, '2022-08-13 21:39:02', 'Complete'),
(11, 6, 3696, 408978307, 4, '2022-08-13 21:39:48', 'Complete'),
(18, 6, 1898, 706207928, 2, '2022-08-21 05:11:18', 'Complete'),
(19, 6, 1498, 240399957, 2, '2022-09-04 11:22:33', 'Complete'),
(20, 6, 2999, 661295930, 1, '2022-09-04 19:10:49', 'Complete'),
(21, 6, 4496, 1547290574, 4, '2022-09-04 20:54:24', 'Complete'),
(22, 6, 799, 1948937121, 1, '2022-09-04 11:23:18', 'pending'),
(23, 6, 2998, 549622763, 2, '2022-09-04 19:05:54', 'pending'),
(24, 6, 3098, 1939550142, 2, '2022-09-05 07:00:07', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `payment_date`) VALUES
(9, 10, 1660897003, 4998, 'Paypal', '2022-08-13 21:39:42'),
(10, 11, 408978307, 3696, 'Cash On Delivery', '2022-08-13 21:39:48'),
(11, 12, 1720490177, 2598, 'Paypal', '2022-08-14 07:49:00'),
(12, 16, 1248621147, 1098, 'Paypal', '2022-08-15 09:04:53'),
(13, 15, 1819310596, 2198, 'Cash On Delivery', '2022-08-19 10:19:38'),
(14, 17, 1265874636, 899, 'UPI', '2022-08-20 16:00:31'),
(15, 18, 706207928, 1898, 'Paypal', '2022-08-21 05:11:18'),
(16, 19, 240399957, 1498, 'Cash On Delivery', '2022-09-04 11:22:33'),
(17, 20, 661295930, 2999, 'Paypal', '2022-09-04 19:10:49'),
(18, 21, 1547290574, 4496, 'UPI', '2022-09-04 20:54:24'),
(19, 24, 1939550142, 3098, 'Cash On Delivery', '2022-09-05 07:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(6, 'Mansi V Jain', 'mansi.cs20@bmsce.ac.in', '$2y$10$0Iq6.CM0b8sPMAy4h1bA8u8DBMtq6jgZGy5OlRwt5S/F/MwivMvnO', 'adminprofile.jpg', '::1', '#12/1 , Kamal Villa , Sripuram , Sheshadripuram , 3rd Main , Bengaluru: 560020', '9980702776'),
(10, 'Krish R Sakriya', 'krish.cs20@bmsce.ac.in', '$2y$10$Hjs85c3G5Lq8lV.YBG.48.ZNn7NyXmEKB7FUCbGYlWv.9f5Uly2AW', 'profile1.jpg', '::1', 'Mantri Greens, Malleshwaram, Bengaluru: 560020', '9900123836'),
(11, 'Mehul Tej', 'mehul.cs20@bmsce.ac.in', '$2y$10$tNbF8k9VBKHkA79kfeMMXeQZSzC1WmkpAnFfuDvJoa..90.NiKLIa', 'profile2.jpg', '::1', 'Jayanagar 4th Block, Bengaluru: 560019', '9380895804'),
(12, 'pavithra ', 'pavithra.cs20@bmsce.ac.in', '$2y$10$ohHM3bWgGMJ9pZaQACztIuK4Ks/C3GK4jc3K4H8vWgtkXO7ncB7UG', 'profile1.jpg', '::1', 'rajajinagar', '9108011041');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
