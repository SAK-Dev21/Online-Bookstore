-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 11:34 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn_13` varchar(20) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publication_date` date DEFAULT NULL,
  `description` text NOT NULL,
  `trade_price` decimal(5,2) DEFAULT NULL CHECK (`trade_price` >= 0 and `trade_price` <= 100),
  `retail_price` decimal(5,2) DEFAULT NULL CHECK (`retail_price` >= 0 and `retail_price` <= 100),
  `quantity` int(11) DEFAULT NULL CHECK (`quantity` >= 0 and `quantity` <= 20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn_13`, `thumbnail`, `title`, `author`, `publication_date`, `description`, `trade_price`, `retail_price`, `quantity`) VALUES
('9780440414803', '../assets/images/holes.webp', 'Holes', 'Louis Sachar', '1998-09-02', 'Holes follows Stanley Yelnats, a boy sent to a juvenile detention camp where digging holes is part of the daily routine. But there\'s more beneath the surface—literally. As Stanley uncovers the truth about the camp and his family\'s cursed past, the story blends humor, mystery, and heartwarming redemption in a uniquely layered narrative.', 18.99, 24.99, 0),
('9780451524935', '../assets/images/1984.webp', '1984', 'George Orwell', '1949-06-08', 'In George Orwell\'s dystopian masterpiece, 1984 presents a chilling view of a totalitarian regime that uses surveillance, censorship, and propaganda to control its citizens. \n    Winston Smith, the protagonist, begins to question the oppressive system and seeks truth in a world built on lies. The novel is a timeless warning about the dangers of absolute power and the loss of individuality.', 25.50, 35.00, 10),
('9780545010221', '../assets/images/Harry Potter and the Deathly Hallows.webp', 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', '2007-07-21', 'Harry, Ron, and Hermione leave Hogwarts to destroy the Horcruxes and defeat Voldemort. \r\nThe final instalment of the series is an epic conclusion filled with sacrifice, heroism, and the enduring power of love and friendship.', 28.00, 44.00, 7),
('9780735211292', '../assets/images/Atomic Habits.webp', 'Atomic Habits', 'James Clear', '2018-10-16', 'James Clear presents a proven system for personal growth by focusing on tiny changes that lead to remarkable results. \r\nAtomic Habits provides insights on habit formation, identity change, and how to design an environment for success, making it a must-read for anyone aiming to improve their life.', 22.00, 30.00, 14),
('9780747532699', '../assets/images/Harry Potter and the Philosopher\'s Stone.webp', 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', '1997-06-26', 'Harry Potter discovers he is a wizard on his eleventh birthday and begins his magical education at Hogwarts School of Witchcraft and Wizardry. \r\nThere, he makes friends, uncovers the truth about his parents’ death, and faces Lord Voldemort for the first time in this enchanting introduction to the wizarding world.', 20.00, 30.00, 8),
('9780747538493', '../assets/images/Harry Potter and the Chamber of Secrets.webp', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', '1998-07-02', 'In his second year at Hogwarts, Harry Potter hears whispers from within the walls, and students begin turning to stone. \r\nWith the help of his friends, he investigates the reopening of the fabled Chamber of Secrets and battles a mysterious monster tied to Hogwarts\'s dark past.', 22.00, 32.00, 10),
('9780747542155', '../assets/images/Harry Potter and the Prisoner of Azkaban.webp', 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', '1999-07-08', 'Harry returns to Hogwarts amid news of an escaped prisoner named Sirius Black. As new secrets about his family and past are unveiled, \r\nHarry must face dark creatures, time travel, and the shocking truth about those closest to him in a powerful and emotional journey.', 23.00, 33.00, 9),
('9780747546245', '../assets/images/Harry Potter and the Goblet of Fire.webp', 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', '2000-07-08', 'When Harry is mysteriously entered into the dangerous Triwizard Tournament, he faces life-threatening tasks and encounters a resurrecting Lord Voldemort. \r\nThe book marks a turning point in the series, blending high-stakes adventure with darker themes and emotional growth.', 24.00, 34.00, 11),
('9780747551003', '../assets/images/Harry Potter and the Order of the Phoenix.webp', 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', '2003-06-21', 'As the Ministry of Magic refuses to acknowledge Voldemort’s return, Harry and his friends form Dumbledore’s Army to prepare for what lies ahead. \r\nThe book explores teenage angst, political corruption, and resistance, culminating in a heart-wrenching battle and loss.', 25.00, 36.00, 10),
('9780747581086', '../assets/images/Harry Potter and the Half-Blood Prince.webp', 'Harry Potter and the Half-Blood Prince', 'J.K. Rowling', '2005-07-16', 'With Dumbledore’s guidance, Harry delves into Voldemort’s past and discovers secrets hidden within a mysterious potions book. \r\nThe narrative deepens with romance, betrayal, and one of the most shocking events in the series, paving the way for the final battle.', 26.00, 37.00, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('customer','admin') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(4, 'sushilover', 'sushi123@gmail.com', '$2y$10$oZ3tw3bvFcvXN7lSHYjbneKR2EX7lH5JriswIMVKglmjoX7j8OUsm', 'customer'),
(5, 'food', 'food@teams.com', '$2y$10$yH45a73MJYPkh7emFkaIYeokPI81Ukns5vrC6WPl3nOqIoIXSRRDy', 'customer'),
(6, 'Admin2', 'admin2@teams.com', '$2y$10$4XeK.8RjBU.kHPeH9UfwsuCQ7cgxEO3rCPYe8gD7s/.YL9Bbkvmla', 'admin'),
(7, 'coventry1', 'coventry1@hotmail.com', '$2y$10$JkxH5632dWNczCkkDRFopOMZvN7.gc4L02Kuoc4jjIPZNdNIw9zkm', 'customer'),
(8, 'sahil019', 'sahil23@gmail.com', '$2y$10$TatNWl7sgxRnRV90kRaYd.D8mI1TBlPKIRggth6Rnlz083Ytg7PFG', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn_13`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
