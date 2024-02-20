-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lut 2024, 14:04
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `pytanie` varchar(50) NOT NULL,
  `odpowiedz1` varchar(50) NOT NULL,
  `odpowiedz2` varchar(50) NOT NULL,
  `odpowiedz3` varchar(50) NOT NULL,
  `odpowiedz4` varchar(50) NOT NULL,
  `dobraodpowiedz` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`pytanie`, `odpowiedz1`, `odpowiedz2`, `odpowiedz3`, `odpowiedz4`, `dobraodpowiedz`, `id`) VALUES
('Co oznacza skrót CSS?', 'Cascading Style Sheets', 'Creative Style Syntax', 'Computer Style Sheets', 'Colorful Style Sheets', '3', 1),
('Co oznacza skrót HTML?', 'Hyper Text Markup Language', 'High Tech Machine Learning', 'Hyperlink and Text Markup Language', 'Home Tool Markup Language', '1', 2),
('Co oznacza skrót SQL?', 'Structured Query Language', 'Simple Question Language', 'Standard Query Loop', 'System Query Language', '2', 3),
('Co to jest \"git\" ?', 'System kontroli wersji', 'Baza danych', 'Edytor tekstu', 'Framework JavaScript', '4', 4),
('Co to jest RESTful API?', 'Język programowania stosowany do tworzenia aplikac', 'Protokół komunikacyjny wykorzystywany do transferu', 'Interfejs programistyczny umożliwiający komunikacj', 'Architektura aplikacji umożliwiająca komunikację m', '4', 5),
('Czym różni się baza danych SQL od NoSQL?', 'SQL jest relacyjną bazą danych, a NoSQL to nierela', 'SQL obsługuje tylko język zapytań strukturalnych, ', 'SQL jest szybszy od NoSQL w operacjach odczytu, a ', 'SQL używa wyłącznie języka JavaScript, podczas gdy', '1', 6),
('Jakie są najpopularniejsze metody sortowania w pro', 'Sortowanie bąbelkowe, sortowanie przez wstawianie,', 'Sortowanie szybkie, sortowanie przez scalanie, sor', 'Sortowanie przez kopcowanie, sortowanie przez wymi', 'Sortowanie przez mieszanie, sortowanie przez rozdr', '2', 7),
('Jakie są trzy podstawowe założenia programowania o', 'Polimorfizm, dziedziczenie, enkapsulacja', 'Zarządzanie pamięcią, wyjątki, wielowątkowość', 'Wsparcie dla architektury klient-serwer, bezpiecze', 'Instrukcje warunkowe, pętle, funkcje', '1', 8),
('W którym języku programowania używa się notacji Ca', 'JavaScript', 'Python', 'C++', 'Ruby', '4', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdobytepunkty`
--

CREATE TABLE `zdobytepunkty` (
  `punkty` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `zdobytepunkty`
--

INSERT INTO `zdobytepunkty` (`punkty`) VALUES
(41);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
