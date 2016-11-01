-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Lis 2016, 10:47
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `twit`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `twits`
--

CREATE TABLE `twits` (
  `id` int(11) NOT NULL,
  `twit` text COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `twits`
--

INSERT INTO `twits` (`id`, `twit`, `user_id`) VALUES
(1, 'Pierwszy posta jana papugi', 34),
(2, 'Pierwszy post Pingwinka Kleofaska', 35);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `hashedPassword` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `hashedPassword`, `email`, `create_date`) VALUES
(34, 'Jan Papuga', '$2y$10$3wzWo8wOtPo2FEPde5EaY.WheONMiet36u08lDjbMDPgPLTjDx/p2', 'jan@papuga.pl', '2016-10-31 22:17:15'),
(35, 'Pingwin Kleofasek', '$2y$10$C2rC85QtTj3zJozsbXi0KefDroJJaJcI2qTtU03htOr9pnzuFE/na', 'pingwin@kleofasek.pl', '2016-11-01 08:32:38');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `twits`
--
ALTER TABLE `twits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foregKey` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unikalnyEmail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `twits`
--
ALTER TABLE `twits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `twits`
--
ALTER TABLE `twits`
  ADD CONSTRAINT `foregKey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
