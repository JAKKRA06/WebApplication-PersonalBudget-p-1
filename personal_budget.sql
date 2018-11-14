-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lis 2018, 10:36
-- Wersja serwera: 10.1.33-MariaDB
-- Wersja PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `personal_budget`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expense_category_assigned_to_user_id` int(11) UNSIGNED NOT NULL,
  `payment_method_assigned_to_user_id` int(11) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `date_of_expense` date NOT NULL,
  `expense_comment` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `expense_category_assigned_to_user_id`, `payment_method_assigned_to_user_id`, `amount`, `date_of_expense`, `expense_comment`) VALUES
(1, 1, 11, 1, '100.00', '2018-10-31', ''),
(2, 1, 15, 2, '100.99', '2018-10-31', ''),
(3, 1, 11, 2, '100.00', '2018-10-03', ''),
(4, 1, 9, 2, '1000.00', '2018-10-31', ''),
(5, 3, 50, 7, '50.00', '2018-11-01', ''),
(6, 3, 55, 8, '100.00', '2018-11-01', ''),
(7, 1, 13, 1, '100.00', '2018-11-02', ''),
(8, 1, 2, 1, '46.63', '2018-10-31', ''),
(10, 4, 77, 11, '100.00', '2018-11-05', ''),
(11, 4, 75, 10, '100.00', '2018-11-05', ''),
(12, 4, 75, 10, '1000.00', '2018-11-05', ''),
(13, 4, 79, 10, '1.00', '2018-11-05', 'basen + sauna'),
(14, 1, 15, 2, '1.00', '2018-06-15', 'troloogig +gg'),
(15, 1, 15, 3, '100.00', '2018-11-05', ''),
(16, 7, 159, 19, '100.99', '2018-11-05', ''),
(17, 7, 165, 20, '46.63', '2018-11-05', ''),
(18, 1, 9, 2, '44.44', '2018-11-05', ''),
(19, 1, 9, 2, '50.00', '2018-11-05', ''),
(20, 1, 9, 1, '1000.00', '2018-11-13', 'do klasy + wyciecka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses_category_assigned_to_users`
--

CREATE TABLE `expenses_category_assigned_to_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expenses_category_assigned_to_users`
--

INSERT INTO `expenses_category_assigned_to_users` (`id`, `user_id`, `name`) VALUES
(1, 1, 'Transport'),
(2, 1, 'Ksiazki'),
(3, 1, 'Jedzenie'),
(4, 1, 'Mieszkanie'),
(5, 1, 'Telekomunikacja'),
(6, 1, 'Higiena'),
(7, 1, 'Ubrania'),
(8, 1, 'Opieka zdrowotna'),
(9, 1, 'Dzieci'),
(10, 1, 'Rozrywka'),
(11, 1, 'Wycieczka'),
(12, 1, 'Oszczednosci'),
(13, 1, 'Na zlota jesien, czyli emeryture'),
(14, 1, 'Splta dlugow'),
(15, 1, 'Darowizna'),
(16, 1, 'Inne wydatki'),
(32, 2, 'Transport'),
(33, 2, 'Ksiazki'),
(34, 2, 'Jedzenie'),
(35, 2, 'Mieszkanie'),
(36, 2, 'Telekomunikacja'),
(37, 2, 'Higiena'),
(38, 2, 'Ubrania'),
(39, 2, 'Opieka zdrowotna'),
(40, 2, 'Dzieci'),
(41, 2, 'Rozrywka'),
(42, 2, 'Wycieczka'),
(43, 2, 'Oszczednosci'),
(44, 2, 'Na zlota jesien, czyli emeryture'),
(45, 2, 'Splta dlugow'),
(46, 2, 'Darowizna'),
(47, 2, 'Inne wydatki'),
(48, 3, 'Transport'),
(49, 3, 'Ksiazki'),
(50, 3, 'Jedzenie'),
(51, 3, 'Mieszkanie'),
(52, 3, 'Telekomunikacja'),
(53, 3, 'Higiena'),
(54, 3, 'Ubrania'),
(55, 3, 'Opieka zdrowotna'),
(56, 3, 'Dzieci'),
(57, 3, 'Rozrywka'),
(58, 3, 'Wycieczka'),
(59, 3, 'Oszczednosci'),
(60, 3, 'Na zlota jesien, czyli emeryture'),
(61, 3, 'Splta dlugow'),
(62, 3, 'Darowizna'),
(63, 3, 'Inne wydatki'),
(64, 4, 'Transport'),
(65, 4, 'Ksiazki'),
(66, 4, 'Jedzenie'),
(67, 4, 'Mieszkanie'),
(68, 4, 'Telekomunikacja'),
(69, 4, 'Higiena'),
(70, 4, 'Ubrania'),
(71, 4, 'Opieka zdrowotna'),
(72, 4, 'Dzieci'),
(73, 4, 'Rozrywka'),
(74, 4, 'Wycieczka'),
(75, 4, 'Oszczednosci'),
(76, 4, 'Na zlota jesien, czyli emeryture'),
(77, 4, 'Splta dlugow'),
(78, 4, 'Darowizna'),
(79, 4, 'Inne wydatki'),
(95, 5, 'Transport'),
(96, 5, 'Ksiazki'),
(97, 5, 'Jedzenie'),
(98, 5, 'Mieszkanie'),
(99, 5, 'Telekomunikacja'),
(100, 5, 'Higiena'),
(101, 5, 'Ubrania'),
(102, 5, 'Opieka zdrowotna'),
(103, 5, 'Dzieci'),
(104, 5, 'Rozrywka'),
(105, 5, 'Wycieczka'),
(106, 5, 'Oszczednosci'),
(107, 5, 'Na zlota jesien, czyli emeryture'),
(108, 5, 'Splta dlugow'),
(109, 5, 'Darowizna'),
(110, 5, 'Inne wydatki'),
(126, 6, 'Transport'),
(127, 6, 'Ksiazki'),
(128, 6, 'Jedzenie'),
(129, 6, 'Mieszkanie'),
(130, 6, 'Telekomunikacja'),
(131, 6, 'Higiena'),
(132, 6, 'Ubrania'),
(133, 6, 'Opieka zdrowotna'),
(134, 6, 'Dzieci'),
(135, 6, 'Rozrywka'),
(136, 6, 'Wycieczka'),
(137, 6, 'Oszczednosci'),
(138, 6, 'Na zlota jesien, czyli emeryture'),
(139, 6, 'Splta dlugow'),
(140, 6, 'Darowizna'),
(141, 6, 'Inne wydatki'),
(157, 7, 'Transport'),
(158, 7, 'Ksiazki'),
(159, 7, 'Jedzenie'),
(160, 7, 'Mieszkanie'),
(161, 7, 'Telekomunikacja'),
(162, 7, 'Higiena'),
(163, 7, 'Ubrania'),
(164, 7, 'Opieka zdrowotna'),
(165, 7, 'Dzieci'),
(166, 7, 'Rozrywka'),
(167, 7, 'Wycieczka'),
(168, 7, 'Oszczednosci'),
(169, 7, 'Na zlota jesien, czyli emeryture'),
(170, 7, 'Splta dlugow'),
(171, 7, 'Darowizna'),
(172, 7, 'Inne wydatki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses_category_default`
--

CREATE TABLE `expenses_category_default` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `expenses_category_default`
--

INSERT INTO `expenses_category_default` (`id`, `name`) VALUES
(1, 'Transport'),
(2, 'Ksiazki'),
(3, 'Jedzenie'),
(4, 'Mieszkanie'),
(5, 'Telekomunikacja'),
(6, 'Higiena'),
(7, 'Ubrania'),
(8, 'Opieka zdrowotna'),
(9, 'Dzieci'),
(10, 'Rozrywka'),
(11, 'Wycieczka'),
(12, 'Oszczednosci'),
(13, 'Na zlota jesien, czyli emeryture'),
(14, 'Splta dlugow'),
(15, 'Darowizna'),
(16, 'Inne wydatki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes`
--

CREATE TABLE `incomes` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `income_category_assigned_to_user_id` int(11) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `date_of_income` date NOT NULL,
  `income_comment` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `incomes`
--

INSERT INTO `incomes` (`id`, `user_id`, `income_category_assigned_to_user_id`, `amount`, `date_of_income`, `income_comment`) VALUES
(6, 2, 9, '10.55', '2018-10-19', ''),
(7, 2, 10, '100.00', '2018-10-19', ''),
(8, 2, 8, '100.00', '2018-09-07', ''),
(12, 1, 3, '100.00', '2018-10-22', ''),
(13, 1, 1, '5999.00', '2018-10-22', ''),
(14, 1, 2, '100.00', '2018-09-04', ''),
(15, 1, 1, '5999.00', '2018-09-14', ''),
(16, 1, 1, '100.00', '2018-10-26', ''),
(17, 1, 1, '18200.00', '2018-10-26', ''),
(18, 1, 2, '100.00', '2018-02-15', ''),
(19, 1, 4, '10000.00', '2018-10-31', ''),
(20, 3, 13, '100.00', '2018-11-01', ''),
(21, 1, 1, '101.00', '2018-11-02', ''),
(22, 1, 2, '5999.00', '2018-11-02', ''),
(23, 1, 3, '99.99', '2018-11-02', ''),
(24, 4, 17, '100.00', '2018-11-05', ''),
(25, 4, 16, '99.99', '2018-11-05', 'luty'),
(26, 4, 17, '100.00', '2018-11-05', ''),
(27, 4, 16, '5999.00', '2018-11-05', ''),
(28, 4, 19, '10.55', '2018-11-05', ''),
(29, 4, 19, '100.00', '2018-11-05', ''),
(30, 4, 16, '100.00', '2018-10-30', ''),
(31, 4, 16, '5999.00', '2018-10-31', ''),
(32, 1, 1, '100.00', '2018-11-05', 'pÅ‚ywalnia + sauny'),
(33, 7, 37, '5999.00', '2018-11-05', 'oprocentownaie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes_category_assigned_to_users`
--

CREATE TABLE `incomes_category_assigned_to_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `incomes_category_assigned_to_users`
--

INSERT INTO `incomes_category_assigned_to_users` (`id`, `user_id`, `name`) VALUES
(1, 1, 'Wynagrodzenie'),
(2, 1, 'Odsetki bankowe'),
(3, 1, 'Allegro'),
(4, 1, 'Inne'),
(8, 2, 'Wynagrodzenie'),
(9, 2, 'Odsetki bankowe'),
(10, 2, 'Allegro'),
(11, 2, 'Inne'),
(12, 3, 'Wynagrodzenie'),
(13, 3, 'Odsetki bankowe'),
(14, 3, 'Allegro'),
(15, 3, 'Inne'),
(16, 4, 'Wynagrodzenie'),
(17, 4, 'Odsetki bankowe'),
(18, 4, 'Allegro'),
(19, 4, 'Inne'),
(23, 5, 'Wynagrodzenie'),
(24, 5, 'Odsetki bankowe'),
(25, 5, 'Allegro'),
(26, 5, 'Inne'),
(30, 6, 'Wynagrodzenie'),
(31, 6, 'Odsetki bankowe'),
(32, 6, 'Allegro'),
(33, 6, 'Inne'),
(37, 7, 'Wynagrodzenie'),
(38, 7, 'Odsetki bankowe'),
(39, 7, 'Allegro'),
(40, 7, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes_category_default`
--

CREATE TABLE `incomes_category_default` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `incomes_category_default`
--

INSERT INTO `incomes_category_default` (`id`, `name`) VALUES
(1, 'Wynagrodzenie'),
(2, 'Odsetki bankowe'),
(3, 'Allegro'),
(4, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_methods_assigned_to_users`
--

CREATE TABLE `payment_methods_assigned_to_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `payment_methods_assigned_to_users`
--

INSERT INTO `payment_methods_assigned_to_users` (`id`, `user_id`, `name`) VALUES
(1, 1, 'Gotowka'),
(2, 1, 'Karta platnicza'),
(3, 1, 'Karta kredytowa'),
(4, 2, 'Gotowka'),
(5, 2, 'Karta platnicza'),
(6, 2, 'Karta kredytowa'),
(7, 3, 'Gotowka'),
(8, 3, 'Karta platnicza'),
(9, 3, 'Karta kredytowa'),
(10, 4, 'Gotowka'),
(11, 4, 'Karta platnicza'),
(12, 4, 'Karta kredytowa'),
(13, 5, 'Gotowka'),
(14, 5, 'Karta platnicza'),
(15, 5, 'Karta kredytowa'),
(16, 6, 'Gotowka'),
(17, 6, 'Karta platnicza'),
(18, 6, 'Karta kredytowa'),
(19, 7, 'Gotowka'),
(20, 7, 'Karta platnicza'),
(21, 7, 'Karta kredytowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_methods_default`
--

CREATE TABLE `payment_methods_default` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `payment_methods_default`
--

INSERT INTO `payment_methods_default` (`id`, `name`) VALUES
(1, 'Gotowka'),
(2, 'Karta platnicza'),
(3, 'Karta kredytowa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'kuba', '$2y$10$SJOycyDH/lw7EZDx9.S2Iu3gTSHm1D.Y0smut9RfypmSsyyadc4Re', 'kuba@gmail.com'),
(2, 'magda', '$2y$10$s6g7s10dNQ/DziQtDXS/Ruq4p0UTITLfVeFZdr1BSmGvqI8Q1g5b6', 'magda@gmail.com'),
(3, 'ada', '$2y$10$xX0aWbbE2gRUOsGhDVaR4uC10xQglOWOQ3Ri7CVYWzSXr17QTCIFS', 'ada@gmail.com'),
(4, 'koko', '$2y$10$IyS7rOnNV8BWR7/cNVi4o.7SGf7qXLeGGM165Jm13QbUtEx3xUnFe', 'koko@gmial.com'),
(5, 'marta', '$2y$10$K3E.pL1SgNY4WSDTCKGRte8xKL77Cdfi5GwIs9.yNXmGxKXdb9oIW', 'marta@gmail.com'),
(6, 'ania', '$2y$10$nL2XovqkC7RLu/oRtWVgvehkuR3uHX856PHGF5jQKQCDGS3nn4kWm', 'ania@gmail.com'),
(7, 'rafal', '$2y$10$nJT4r2JOQNUlV3iGf.o5CuYTIwtnJjm4M9Mu81ggkXAEhG1FSvAvG', 'rafal@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `expenses_category_default`
--
ALTER TABLE `expenses_category_default`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `incomes_category_default`
--
ALTER TABLE `incomes_category_default`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payment_methods_assigned_to_users`
--
ALTER TABLE `payment_methods_assigned_to_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payment_methods_default`
--
ALTER TABLE `payment_methods_default`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT dla tabeli `expenses_category_default`
--
ALTER TABLE `expenses_category_default`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `incomes_category_default`
--
ALTER TABLE `incomes_category_default`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `payment_methods_assigned_to_users`
--
ALTER TABLE `payment_methods_assigned_to_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `payment_methods_default`
--
ALTER TABLE `payment_methods_default`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
