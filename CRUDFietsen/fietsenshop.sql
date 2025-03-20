-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 mrt 2025 om 22:54
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
-- Database: `fietsen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fietsenshop`
--

CREATE TABLE `fietsenshop` (
  `id` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `fietsenshop`
--

INSERT INTO `fietsenshop` (`id`, `merk`, `type`, `prijs`) VALUES
(3, 'CRIVIT', 'Fatbike', 300),
(4, 'Gazelle', 'Mountainbike', 200),
(8, 'Stromer', 'Bakfiets', 250),
(11, 'Stromer', 'Stadsfiets', 150),
(13, 'Picolo', 'Electrisch', 140),
(16, 'Stromer', 'Electrisch', 300),
(19, 'Picolo', 'Electrisch', 400);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fietsenshop`
--
ALTER TABLE `fietsenshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fietsenshop`
--
ALTER TABLE `fietsenshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
