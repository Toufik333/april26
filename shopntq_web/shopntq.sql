-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2026 at 07:11 PM
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
-- Database: `shopntq`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','paid','shipped','delivered','cancelled') DEFAULT 'pending',
  `shipping_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_purchase` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `sku` varchar(100) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `slug_2` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;
-- ========================================
-- PHASE 1 SAMPLE DATA
-- ========================================
-- Sample user accounts (password_hash values below)
-- Generated with: password_hash('user1', PASSWORD_BCRYPT) and password_hash('admin1', PASSWORD_BCRYPT)

INSERT INTO `users` (`id`, `email`, `password_hash`, `first_name`, `last_name`, `role`, `created_at`) VALUES
(1, 'user1@shop.local', '$2y$10$bgSFhgXi4B6Bm/KpVZK2QuYGZbqJA9l2OQ3lmXc3/rYRbmVlYJH0G', 'Sample', 'User', 'customer', NOW()),
(2, 'admin1@shop.local', '$2y$10$7Db/fGDwJzGmhVhf2S8Vb.0AvqOKE0jPZgKqYl3FhQN8ZQcXKdNs2', 'Admin', 'User', 'admin', NOW());

-- Sample categories
INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`) VALUES
(1, 'Electronics', 'electronics', NULL),
(2, 'Fashion', 'fashion', NULL),
(3, 'Books', 'books', NULL),
(4, 'Home & Garden', 'home-garden', NULL),
(5, 'Sports', 'sports', NULL),
(6, 'Toys', 'toys', NULL);

-- Sample products (is_featured will be managed by admin in Phase 1)
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `stock_quantity`, `sku`, `is_featured`, `created_at`) VALUES
(1, 1, 'Wireless Headphones', 'wireless-headphones', 'Premium noise-cancelling wireless headphones with 30-hour battery life', '199.99', 45, 'WH001', 1, NOW()),
(2, 1, 'USB-C Cable', 'usb-c-cable', 'Durable USB-C charging and data cable', '19.99', 200, 'USC001', 1, NOW()),
(3, 2, 'Premium T-Shirt', 'premium-tshirt', 'Comfortable 100% cotton t-shirt available in multiple colors', '29.99', 150, 'TSHIRT001', 1, NOW()),
(4, 2, 'Denim Jeans', 'denim-jeans', 'Classic blue denim jeans with modern fit', '79.99', 80, 'JEANS001', 0, NOW()),
(5, 3, 'Design Patterns Book', 'design-patterns-book', 'Essential guide to software design patterns', '49.99', 30, 'BOOK001', 1, NOW()),
(6, 3, 'Web Development Guide', 'web-development-guide', 'Complete guide to modern web development', '59.99', 25, 'BOOK002', 0, NOW()),
(7, 4, 'Indoor Plant - Snake Plant', 'indoor-plant-snake', 'Low-maintenance indoor plant perfect for any space', '24.99', 60, 'PLANT001', 0, NOW()),
(8, 4, 'Ceramic Planter', 'ceramic-planter', 'Beautiful handmade ceramic planter', '39.99', 40, 'PLANT002', 0, NOW()),
(9, 5, 'Yoga Mat', 'yoga-mat', 'Non-slip yoga mat with carrying strap', '34.99', 120, 'YOGA001', 0, NOW()),
(10, 6, 'Building Blocks Set', 'building-blocks-set', '500-piece building block set for all ages', '44.99', 70, 'TOY001', 0, NOW());
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
