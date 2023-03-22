-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 09:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_commande`
--

CREATE TABLE `tb_commande` (
  `id_commande` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `dateComande` date NOT NULL,
  `dateConfimer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_commande`
--

INSERT INTO `tb_commande` (`id_commande`, `id_panier`, `id`, `titre`, `prix`, `qte`, `dateComande`, `dateConfimer`) VALUES
(1, 1, 4, 'The Super Mario', 70000, 2, '2023-03-13', '2023-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panier`
--

CREATE TABLE `tb_panier` (
  `id_panier` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_panier`
--

INSERT INTO `tb_panier` (`id_panier`, `id`, `titre`, `prix`, `qte`, `dateCommande`) VALUES
(2, 4, 'The Super Mario', 70000, 1, '2023-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `titre` varchar(80) NOT NULL,
  `image` blob NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `titre`, `image`, `description`, `prix`) VALUES
(4, 'Scream', 0x53637265616d2e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(7, 'Hôtel Transylvanie 3', 0x48c3b474656c205472616e73796c76616e696520332e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 10000),
(8, 'Alice in Borderland', 0x416c69636520696e20426f726465726c616e642e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 20000),
(9, 'Alibi2.com', 0x416c696269322e636f6d2e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(10, 'PATTIE', 0x5041545449452e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(11, 'Chat potté 2', 0x4368617420706f7474c3a920322e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 80000),
(12, 'La descente', 0x4c612064657363656e74652e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 40000),
(13, 'Sweet Home', 0x537765657420486f6d652e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 100000),
(14, 'ALENA', 0x414c454e412e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 60000),
(15, 'Teen Wolf', 0x5465656e20576f6c662e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 80000),
(16, 'TroisMosquetaires', 0x54726f69734d6f737175657461697265732e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(17, 'Royaumes des étoiles', 0x526f7961756d65732064657320c3a9746f696c65732e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 70000),
(18, 'Marlowe', 0x4d61726c6f77652e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 55000),
(19, 'BABYLON', 0x424142594c4f4e2e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 60000),
(21, 'Tirailleurs', 0x54697261696c6c657572732e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(22, 'Knock at the cabine', 0x4b6e6f636b2061742074686520636162696e652e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 60000),
(23, 'CLOSE', 0x434c4f53452e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(24, 'Hulk', 0x48756c6b2e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 50000),
(25, 'The Novice', 0x546865204e6f766963652e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 55000),
(27, 'The Super Mario', 0x546865205375706572204d6172696f2e6a7067, 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Rasoa', 'Nary', 'nary@gmail.com', 'nary1234'),
(2, 'Maria', 'Jean', 'jeanmarie@gmail.com', 'jeanmarie'),
(3, 'Tojo', 'tooj', 'admin@admin.com', 'admin1234'),
(4, 'Naivo', 'naivo', 'naivo@gmail.com', 'naivo1234'),
(5, 'Vonjy', 'vonjy', 'vonjy@gmail.com', 'vonjy1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_commande`
--
ALTER TABLE `tb_commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Indexes for table `tb_panier`
--
ALTER TABLE `tb_panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_commande`
--
ALTER TABLE `tb_commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_panier`
--
ALTER TABLE `tb_panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
