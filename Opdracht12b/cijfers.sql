-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 mrt 2025 om 14:01
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cijfers`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cijfers`
--

CREATE TABLE `cijfers` (
  `id` int(9) NOT NULL,
  `leerling` varchar(255) NOT NULL,
  `cijfer` float NOT NULL,
  `Vak` varchar(255) NOT NULL,
  `Docent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cijfers`
--

INSERT INTO `cijfers` (`id`, `leerling`, `cijfer`, `Vak`, `Docent`) VALUES
(2, 'Timber', 5.5, 'Informatica', 'Schevchenko'),
(3, 'Caranza', 6.7, 'Nederlands', 'Bou'),
(4, 'Pacman', 10, 'Rekenen', 'Ozer'),
(5, 'Kirby', 12, 'Rekenen', 'Ozer'),
(6, 'Liam', 7.4, 'Nederlands', 'Bou'),
(7, 'Emma', 6.2, 'Burgerschap', 'Karen'),
(8, 'Noah', 8.9, 'Burgerschap', 'Karen'),
(9, 'Olivia', 5.1, 'Informatica', 'Schevchenko'),
(10, 'Mason', 9.3, 'Nederlands', 'Bou'),
(11, 'Sophia', 4.8, 'Rekenen', 'Ozer'),
(12, 'Lucas', 7, 'Burgerschap', 'Karen'),
(14, 'Ethan', 8.2, 'Geschiedenis', 'Olexander'),
(15, 'Mia', 9.8, 'Geschiedenis', 'Olexander');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cijfers`
--
ALTER TABLE `cijfers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cijfers`
--
ALTER TABLE `cijfers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
