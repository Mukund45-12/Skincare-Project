-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 07:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `created_at`) VALUES
(1, 1, 'The website is empty :(', '2023-12-19 04:02:20'),
(2, 2, 'The site is up! :)', '2023-12-19 04:43:34'),
(3, 3, 'this site is awesome!', '2023-12-19 15:10:03'),
(14, 5, '', '2023-12-19 17:46:34'),
(15, 5, 'hello\r\n', '2023-12-19 17:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `skin_problem` varchar(50) DEFAULT NULL,
  `suitable_skin_type` varchar(50) DEFAULT NULL,
  `suitable_for_allergies` enum('Yes','No') DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `image_path`, `price`, `skin_problem`, `suitable_skin_type`, `suitable_for_allergies`, `store_id`) VALUES
(1, 'retinol', 'anti-aging', '/images/product1.jpg', 19.99, 'Uneven Tone', 'Dry', 'Yes', 1),
(2, 'Product2', 'Description2', '/images/product2.jpg', 29.99, 'Uneven Tone', 'Combination', 'No', 1),
(3, 'glycolic acid', 'hyperpigmentation', '/images/product3.jpg', 39.99, 'Acne Scar', 'Oily', 'Yes', 1),
(4, 'Product4', 'Description4', '/images/product4.jpg', 49.99, 'Acne Scar', 'Combination', 'No', 1),
(5, 'Product5', 'Description5', '/images/product5.jpg', 59.99, 'Milia', 'Dry', 'Yes', 1),
(6, 'Product6', 'Description6', '/images/product6.jpg', 69.99, 'Milia', 'Combination', 'No', 1),
(7, 'Product7', 'Description7', '/images/product7.jpg', 79.99, 'Blackhead', 'Oily', 'Yes', 1),
(8, 'Product8', 'Description8', '/images/product8.jpg', 89.99, 'Blackhead', 'Combination', 'No', 1),
(9, 'aha bha', 'evens tone', 'paulas_choice_salicylic.jpg', 19.99, 'Uneven Tone', 'Dry', 'Yes', 2),
(17, 'Product17', 'Description17', '/images/product17.jpg', 19.99, 'Uneven Tone', 'Dry', 'Yes', 3),
(18, 'Product18', 'Description18', '/images/product18.jpg', 29.99, 'Uneven Tone', 'Combination', 'No', 3),
(19, 'Product19', 'Description19', '/images/product19.jpg', 39.99, 'Acne Scar', 'Oily', 'Yes', 3),
(20, 'Product20', 'Description20', '/images/product20.jpg', 49.99, 'Acne Scar', 'Combination', 'No', 3),
(21, 'Product21', 'Description21', '/images/product21.jpg', 59.99, 'Milia', 'Dry', 'Yes', 3),
(22, 'salicylic acid', 'reduces milia', 'salicylic.jpg', 69.99, 'Milia', 'Combination', 'No', 3),
(23, 'Product23', 'Description23', '/images/product23.jpg', 79.99, 'Blackhead', 'Oily', 'Yes', 3),
(24, 'Product24', 'Description24', '/images/product24.jpg', 89.99, 'Blackhead', 'Combination', 'No', 3),
(129, 'Niacinamide', 'for scars, open pores and hyperpigmentation', 'niacinamide.jpg', 17.99, 'Uneven tone', 'dry', 'Yes', 1),
(130, 'niacinamide', 'good for acne scars and blemishes', 'niacinamide.jpg', 17.99, 'acne scars', 'dry', 'Yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `specialist_id` int(11) NOT NULL,
  `specialist_name` varchar(100) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `Contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`specialist_id`, `specialist_name`, `expertise`, `Contact`) VALUES
(1, 'Dr. Emily Smith', 'Dermatology', 'emilysmith@example.com'),
(2, 'Dr. James Johnson', 'Cosmetic Dermatology', 'jamesjohnson@example.com'),
(3, 'Dr. Sarah Adams', 'Acne Treatment', 'sarahadams@example.com'),
(4, 'Dr. David Brown', 'Anti-Aging Specialist', 'davidbrown@example.com'),
(5, 'Dr. Olivia Clark', 'Facial Rejuvenation', 'oliviaclark@example.com'),
(6, 'Dr. Michael White', 'Skin Cancer Specialist', 'michaelwhite@example.com'),
(7, 'Dr. Jessica Garcia', 'Dermatopathology', 'jessicagarcia@example.com'),
(8, 'Dr. Thomas Robinson', 'Laser Therapy', 'thomasrobinson@example.com'),
(9, 'Dr. Emma Hall', 'Pediatric Dermatology', 'emmahall@example.com'),
(10, 'Dr. Benjamin Miller', 'Hair Disorders', 'benjaminmiller@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `store_address` varchar(100) NOT NULL,
  `store_contact` varchar(100) NOT NULL,
  `store_region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`store_id`, `store_name`, `store_address`, `store_contact`, `store_region`) VALUES
(1, 'Dhaka SkinCare ', 'Mohammedpur, Dhaka', 'Mohammedpur, Dhaka\r\n12345678910', 'Dhaka'),
(2, 'Sylhet Skin Solution', 'Bandar Bazar Rd., Sylhet', 'Bandar Bazar Rd., Sylhet\r\n10987654321', 'Sylhet'),
(3, 'Chottogram Skin Experts', 'Cox-Bazar, Chottogram', 'Cox-Bazar, Chottogram\r\n9857272134', 'Chottogram');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `skin_type` varchar(20) DEFAULT NULL,
  `region` varchar(20) DEFAULT NULL,
  `sun_exposure` int(11) DEFAULT NULL,
  `allergies` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`, `gender`, `skin_type`, `region`, `sun_exposure`, `allergies`) VALUES
(1, 'Jane Doe', 'janedoe@gmail.com', '202cb962ac59075b964b07152d234b70', '12345678910', 'Female', 'Dry', 'Dhaka', 3, 'Yes'),
(2, 'John Doe', 'johndoe@gmail.com', '202cb962ac59075b964b07152d234b70', '10987654321', 'Male', 'Oily', 'Sylhet', 6, 'No'),
(3, 'Atika Hossain', 'shithycarboncopy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '01322312989', 'Female', 'Dry', 'Dhaka', 2, 'No'),
(5, 'Atika Hossain', 'shithy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '011188', 'Female', 'Dry', 'Dhaka', 7, 'Yes'),
(6, 'babu', 'baby@gugu.com', '202cb962ac59075b964b07152d234b70', '125678', 'Male', 'Dry', 'Dhaka', 2, 'Yes'),
(7, 'huhu', 'hAH@GMAIL.COM', '81dc9bdb52d04dc20036dbd8313ed055', '12345678', 'Female', 'Dry', 'Dhaka', 2, 'Yes'),
(9, 'dfhdsajfkc', 'fsafuiygsdhf@gmai.com', '202cb962ac59075b964b07152d234b70', '0132231', 'Female', 'Dry', 'Dhaka', 6, 'Yes'),
(10, 'Atika Hossain', 'atikaainun11@gmail.com', '202cb962ac59075b964b07152d234b70', '013', NULL, NULL, NULL, NULL, NULL),
(11, 'grgrg', 'leona@kitty.com', '202cb962ac59075b964b07152d234b70', '34567', 'Male', 'Dry', 'Dhaka', 7, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skin_problem` (`skin_problem`),
  ADD KEY `suitable_skin_type` (`suitable_skin_type`),
  ADD KEY `suitable_for_allergies` (`suitable_for_allergies`),
  ADD KEY `sfk` (`store_id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`specialist_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `specialist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `sfk` FOREIGN KEY (`store_id`) REFERENCES `stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
