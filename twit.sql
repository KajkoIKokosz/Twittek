-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Paź 2016, 07:25
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.23
--

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
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashedPassword` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `hashedPassword`, `email`) VALUES
(34, 'Stefaniaa', '$2y$10$B7cvbzVtlp35uT..DhegQ.hbpCCqKp4ArMAxxvuB3A.v.G7K4qMgC', 'aaa@bbb'),
(39, 'Stefan', '$2y$10$pMf3bNVO2imVievLOOewqeD3vtHc7mCr2Yn8WLVPdlYaxO65ncFLS', 'bbb@aaa'),
(40, 'Kleofas', '$2y$10$ozwXEx80tctLmyBICuYanuP9h9bYKwu.d7eozs9SMoDVObv3vXdey', 'Kleofas@pingwin.pl'),
(42, 'Smok', '$2y$10$s.soUaNrVsuHk0XUbQTgiO6/gGu8nLz1v5ZLeJ9rs00wIG7Gh3Lyq', 'smok@zupaogorkowa.pl'),
(47, 'jÃ³zef', '$2y$10$ygGXMEQt4IUHi0AOb60oEOgectWmrQnBPep.yke4VODpfni5yHchm', 'kartofle@wworze'),
(68, 'norma', '$2y$10$MJFZhGf/XaYs8tRB4qY6..g8POkpnmEElZ7t7Q0vX9TEIFNMC2SKu', 'dupa@dupa');

--
-- Indeksy dla zrzutów tabel
--

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
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
