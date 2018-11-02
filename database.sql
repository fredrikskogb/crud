-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 01 nov 2018 kl 16:05
-- Serverversion: 5.6.34-log
-- PHP-version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `shopping_crud`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `customer_basket`
--

CREATE TABLE `customer_basket` (
  `user_id` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `product`, `image`, `price`, `description`) VALUES
(1, 'Banan', 'banana.jpg', 100, 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.'),
(2, 'Äpple', 'apple.jpg', 90, 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.'),
(3, 'Apelsin', 'orange.jpg', 80, 'Veggies es bonus vobis, proinde vos postulo essum magis kohlrabi welsh onion daikon amaranth tatsoi tomatillo melon azuki bean garlic.');

-- --------------------------------------------------------

--
-- Tabellstruktur `purchased_orders`
--

CREATE TABLE `purchased_orders` (
  `order_id` int(11) NOT NULL,
  `product` varchar(10000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `customer_basket`
--
ALTER TABLE `customer_basket`
  ADD PRIMARY KEY (`product_id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `purchased_orders`
--
ALTER TABLE `purchased_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `customer_basket`
--
ALTER TABLE `customer_basket`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `purchased_orders`
--
ALTER TABLE `purchased_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
