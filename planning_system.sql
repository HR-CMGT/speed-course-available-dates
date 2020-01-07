-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 07 jan 2020 om 10:05
-- Serverversie: 10.1.36-MariaDB
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `planning_system`
--
CREATE DATABASE IF NOT EXISTS `planning_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `planning_system`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
                                              `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                                              `description` varchar(255) COLLATE utf8_bin NOT NULL,
                                              `date` date NOT NULL,
                                              `start_time` time NOT NULL,
                                              `end_time` time NOT NULL,
                                              PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `description`, `date`, `start_time`, `end_time`) VALUES
(1, 'Tandarts', NOW() + INTERVAL 1 DAY, '14:30:00', '15:00:00'),
(2, 'PHP les 1',        NOW() + INTERVAL 0 DAY, '14:30:00', '15:30:00'),
(3, 'PHP les 2',        NOW() + INTERVAL 2 DAY, '15:00:00', '17:00:00'),
(4, 'keuzevak',         NOW() + INTERVAL 2 DAY, '09:00:00', '10:30:00');
COMMIT;