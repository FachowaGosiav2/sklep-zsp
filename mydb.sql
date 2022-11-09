-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lis 2022, 11:35
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `announcement_and_orders`
--

CREATE TABLE `announcement_and_orders` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `content` varchar(450) NOT NULL,
  `is_announcement` tinyint(1) NOT NULL,
  `is_order` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `announcement_and_orders`
--

INSERT INTO `announcement_and_orders` (`id`, `users_id`, `product_name`, `price`, `content`, `is_announcement`, `is_order`) VALUES
(1, 1, 'ul', '20', 'lubie pszczoły', 1, 0),
(2, 1, 'ul', '20', 'lubie pszczoły', 1, 0),
(3, 2, 'piła ręczna', '30', 'praca praca', 0, 1),
(4, 3, 'łopata', '25', 'kopu kop kopy', 0, 1),
(5, 4, 'wieszaki', '2', 'dobre do ubrań', 0, 1),
(6, 5, 'sznur', '5', 'razu w życiu używany', 0, 1),
(7, 6, 'tort', '200', 'idealny na wesele', 0, 1),
(8, 7, 'niewolnik', '200000', 'pracuje za darmo lecz sam nie jest', 1, 0),
(9, 8, 'zrobienie strony', '350', 'za tyle to nikt ci nie zrobi', 1, 0),
(10, 9, 'pomada', '50', 'dla kobiet', 0, 1),
(11, 10, 'zegarek', '100', 'czas pędzi jak strzeła a mój wujek pędzi bimber', 0, 1),
(12, 2, 'usługi kraweckie', '40', 'idealne jak masz dziure', 1, 0),
(13, 4, 'pochwa', '70', 'na miecz', 1, 0),
(14, 7, 'pan tadeusz', '10', 'lekturka', 1, 0),
(15, 2, 'działka', '700000', 'ładna i duża', 1, 0),
(16, 4, 'szopa', '900', 'idealna na niewolnika', 1, 0),
(17, 5, 'maluch', '20000', 'zatankowany do pełna', 0, 1),
(18, 1, 'zrobienie bazy danych', '2', 'lubie pszczoły', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `is_admin` tinyint(2) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `is_admin`, `password`) VALUES
(1, 'adam', 'adam@gmail.com', 0, 'adam123'),
(2, 'tomek', 'tomek@wp.pl', 0, 'tomek123'),
(3, 'janek', 'janek@gmail.com', 0, 'janek123'),
(4, 'maciek', 'maciek@onet.pl', 0, 'maciek123'),
(5, 'jan', 'jan@gmail.com', 0, 'jan123'),
(6, 'kacper', 'kacper@google.dev', 1, 'kacper123'),
(7, 'brtek', 'brtek@gmail.com', 0, 'brtek123'),
(8, 'patryk', 'patryk@google.dev', 1, 'patryk123'),
(9, 'ewa', 'ewa@gmail.com', 0, 'ewa123'),
(10, 'iga', 'iga@admin.dev', 1, 'iga123');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `announcement_and_orders`
--
ALTER TABLE `announcement_and_orders`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `fk_sale_announcement_users` (`users_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `announcement_and_orders`
--
ALTER TABLE `announcement_and_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `announcement_and_orders`
--
ALTER TABLE `announcement_and_orders`
  ADD CONSTRAINT `fk_sale_announcement_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
