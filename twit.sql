-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lis 2016, 20:29
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
-- Struktura tabeli dla tabeli `friendships`
--



CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `friendships`
--

INSERT INTO `friendships` (`id`, `user_id`, `friend_id`) VALUES
(13, 41, 36),
(14, 36, 41),
(15, 41, 37),
(16, 37, 41),
(17, 42, 36),
(18, 36, 42),
(19, 42, 37),
(20, 37, 42),
(21, 43, 36),
(22, 36, 43),
(23, 43, 37),
(24, 37, 43),
(25, 43, 41),
(26, 41, 43),
(27, 43, 42),
(28, 42, 43),
(29, 44, 41),
(30, 41, 44);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `sender_id_bckp` int(11) NOT NULL,
  `receiver_id_bckp` int(11) NOT NULL,
  `message` text COLLATE utf8_polish_ci NOT NULL,
  `received` tinyint(1) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `sender_id_bckp`, `receiver_id_bckp`, `message`, `received`, `create_date`) VALUES
(10, 41, 36, 41, 36, 'WiadomoÅ›Ä‡ do MorÅ›wina od Jana Papugi', NULL, '2016-11-02 19:53:34'),
(11, 36, 41, 36, 41, 'Drogi Papuziu, tu MorÅ›win', NULL, '2016-11-02 20:04:03');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `twits`
--

CREATE TABLE `twits` (
  `id` int(11) NOT NULL,
  `twit` text COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `twit_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `twits`
--

INSERT INTO `twits` (`id`, `twit`, `user_id`, `twit_date`) VALUES
(74, 'Tak sobie myÅ›lÄ™, Å¼e juÅ¼ chyba nic nie wymyÅ›lÄ™.', 43, '2016-11-02 16:22:07'),
(76, 'lalala', 43, '2016-11-02 17:22:55'),
(77, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 41, '2016-11-02 20:14:21');

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
(36, 'Adam MorÅ›win', '$2y$10$p6crnlAcjgntahMuUkx1Zu8nX7fs7bIlB20Tq6xVDiUHpb016Is.a', 'adam@morswin.pl', '2016-11-01 12:09:19'),
(37, 'Julia Mastodont', '$2y$10$La9OZBlUkKtWzsL02s.7f.f.8kNDli3WWc.tORG/2TAJ3skZEcpIi', 'julia@mastodont.pl', '2016-11-01 12:10:15'),
(41, 'JanPapuga', '$2y$10$Zoct0.6xmGYlve0FCAJgfOq3PxL6PKhRPpPlN9uNJbhK9gTGKNuIC', 'jan@papuga.pl', '2016-11-02 10:22:42'),
(42, 'Pingwin Kleofasek', '$2y$10$MtXhx32gNNThaXmC4iwrTOhcII5TYP.1oTmbzHZ8TXpoySO5ifcIW', 'pingwin@kleofasek.pl', '2016-11-02 12:23:46'),
(43, 'LeonXIII', '$2y$10$C8zNuSX523ux1DWNUhLsfuafvS/AU2Huk0CwVFqAFo0QlGu.XVlvO', 'cycki@juhc.pl', '2016-11-02 12:56:05'),
(44, 'Arnold Troll', '$2y$10$0TwgmKCFypwozglim1eKkOoM2WlWipPdg0Np/7pbuCigbckkElmga', 'arnold@troll.pl', '2016-11-02 17:38:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `messages_ibfk_666` (`sender_id`);

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
-- AUTO_INCREMENT dla tabeli `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `twits`
--
ALTER TABLE `twits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `messages_ibfk_666` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ograniczenia dla tabeli `twits`
--
ALTER TABLE `twits`
  ADD CONSTRAINT `foregKey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
