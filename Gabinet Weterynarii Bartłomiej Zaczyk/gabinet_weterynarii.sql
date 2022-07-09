-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Cze 2020, 11:53
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gabinet_weterynarii`
--

DELIMITER $$
--
-- Procedury
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `srednia` (IN `pracownicy` VARCHAR(25))  BEGIN
SELECT COUNT(*) as ilosc_pracownikow, MIN(pensja) as minimalne, MAX(pensja) as maksymalne, AVG(pensja) as srednie
FROM pracownicy
WHERE stanowisko='weterynarz';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srednia2` (IN `pracownicy` VARCHAR(25))  BEGIN
SELECT COUNT(*) as ilosc_pracownikow, MIN(pensja) as minimalne, MAX(pensja) as maksymalne, AVG(pensja) as srednie
FROM pracownicy
WHERE stanowisko='pomocnik';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `srednia3` (IN `pracownicy` VARCHAR(25))  BEGIN
SELECT COUNT(*) as ilosc_pracownikow, MIN(pensja) as minimalne, MAX(pensja) as maksymalne, AVG(pensja) as srednie
FROM pracownicy
WHERE stanowisko='sprzatacz';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administracja`
--

CREATE TABLE `administracja` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `administracja`
--

INSERT INTO `administracja` (`id`, `login`, `haslo`, `email`) VALUES
(2, 'admin', 'admin123', 'admin@admin.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dziennik`
--

CREATE TABLE `dziennik` (
  `id` int(11) NOT NULL,
  `komunikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dziennik`
--

INSERT INTO `dziennik` (`id`, `komunikat`) VALUES
(1, 'nazwa: katar i bol glowy -> sprawdzam czy zaszla zmiana'),
(2, 'nazwa: oko -> pacjent skarzy sie na bol oka i podbrzusza');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `harmonogram_dni`
--

CREATE TABLE `harmonogram_dni` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `zajecie` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `harmonogram_dni`
--

INSERT INTO `harmonogram_dni` (`id`, `data`, `zajecie`) VALUES
(4, '2020-06-06', 'wyjazd na farme petersona'),
(5, '2020-07-19', 'Dzien porządków w gabinecie'),
(6, '2020-07-30', 'Wyprawa na bagna'),
(7, '2020-08-19', 'koniec klinkik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `informacje_o_gabinecie`
--

CREATE TABLE `informacje_o_gabinecie` (
  `adres` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `adres_email` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `telefon` int(9) NOT NULL,
  `drugi_telefon` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `karta_pacjentow`
--

CREATE TABLE `karta_pacjentow` (
  `id` int(11) NOT NULL,
  `imie_wlasciciela` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko_wlasciciela` text COLLATE utf8_polish_ci NOT NULL,
  `imie_zwierzaka` text COLLATE utf8_polish_ci NOT NULL,
  `gatunek` text COLLATE utf8_polish_ci NOT NULL,
  `plec` char(1) COLLATE utf8_polish_ci NOT NULL,
  `rasa` text COLLATE utf8_polish_ci NOT NULL,
  `wiek` int(11) NOT NULL,
  `waga` int(11) NOT NULL,
  `wzrost` int(11) NOT NULL,
  `powod_przyjecia` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `karta_pacjentow`
--

INSERT INTO `karta_pacjentow` (`id`, `imie_wlasciciela`, `nazwisko_wlasciciela`, `imie_zwierzaka`, `gatunek`, `plec`, `rasa`, `wiek`, `waga`, `wzrost`, `powod_przyjecia`) VALUES
(2, 'zofia', 'kowalska', 'funia', 'pies', 'k', 'kundel', 12, 123, 54, 'sprawdzam czy zaszla zmiana'),
(4, 'zdzisiek', 'majka', 'funia', 'pies', 'k', 'kundel', 12, 123, 54, 'pacjent skarzy sie na bol oka i podbrzusza');

--
-- Wyzwalacze `karta_pacjentow`
--
DELIMITER $$
CREATE TRIGGER `zmiana` BEFORE UPDATE ON `karta_pacjentow` FOR EACH ROW BEGIN
IF new.powod_przyjecia != old.powod_przyjecia
OR new.powod_przyjecia is null and old.powod_przyjecia is not null
OR old.powod_przyjecia is null and new.powod_przyjecia is not null then
INSERT INTO dziennik(komunikat)
VALUES ( CONCAT('nazwa: ', COALESCE(old.powod_przyjecia,'NULL'), ' -> ', COALESCE(new.powod_przyjecia,'NULL')));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL,
  `wiek` int(3) NOT NULL,
  `plec` char(1) COLLATE utf8mb4_polish_ci NOT NULL,
  `rodzaj_zatrudnienia` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `telefon` int(9) NOT NULL,
  `adres_korespondencyjny` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `adres_email` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `stanowisko` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `pensja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `wiek`, `plec`, `rodzaj_zatrudnienia`, `telefon`, `adres_korespondencyjny`, `adres_email`, `stanowisko`, `pensja`) VALUES
(3, 'pracownik', 'pracownik123', 'zofia', 'dara', 12, 'k', 'umowa o prace', 999888777, 'ul krotka', 'admin@admin.pl', 'admin', 1111),
(4, 'kasia', 'kasia123', 'zofia', 'dara', 12, 'k', 'umowa o prace', 999888777, 'ul krotka', 'admin@admin.pl', 'admin', 0),
(5, 'pracownikmiesiaca', 'pracownikmiesiaca123', 'staszek', 'majka', 33, 'm', 'pełen etat', 333333222, 'ul zygmunta augusta 8', 'staszek@hotmail.com', 'sprzatacz', 2500),
(6, 'halina', 'halina123', 'halina', 'kowalska', 55, 'k', 'pełen etat', 111111111, 'halina na zwrotniku 03', 'halina@gmail.com', 'sprzatacz', 2222),
(7, 'student', 'student123', 'nick', 'andrew', 21, 'm', 'staż', 999999999, 'americana 13', 'studencik@hotmail.com', 'pomocnik', 2000),
(8, 'lola', 'lola123', 'karolina', 'guś', 21, 'k', 'staż', 222333777, 'pisarzowa 668', 'lola@gmail.com', 'sprzatacz', 5555),
(9, 'mati', 'mati123', 'mateusz', 'snuk', 40, 'm', 'staż', 777766665, 'gdzies tam 04', 'mati@op.pl', 'pomocnik', 4090),
(10, 'patrycja', 'patrycja123', 'patrycja', 'dudek', 29, 'k', 'pełen etat', 990009090, 'augusta 07', 'pati@gmail.com', 'weterynarz', 9999),
(11, 'seba', 'seba123', 'seba', 'nawalaniec', 33, 'm', 'staż', 444444444, 'nowojorska 13', 'seba@o2.pl', 'pomocnik', 3232);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recepcja`
--

CREATE TABLE `recepcja` (
  `id` int(11) NOT NULL,
  `id_pracownika` int(11) NOT NULL,
  `godziny_pracy` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `wiek` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `login`, `haslo`, `email`) VALUES
(1, 'ktos', 'ktos123', 'ktos@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `weterynarz`
--

CREATE TABLE `weterynarz` (
  `id` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `ilosc_lat_w_zawodzie` int(11) NOT NULL,
  `telefon` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administracja`
--
ALTER TABLE `administracja`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `harmonogram_dni`
--
ALTER TABLE `harmonogram_dni`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `karta_pacjentow`
--
ALTER TABLE `karta_pacjentow`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `recepcja`
--
ALTER TABLE `recepcja`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `weterynarz`
--
ALTER TABLE `weterynarz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `administracja`
--
ALTER TABLE `administracja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `dziennik`
--
ALTER TABLE `dziennik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `harmonogram_dni`
--
ALTER TABLE `harmonogram_dni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `karta_pacjentow`
--
ALTER TABLE `karta_pacjentow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
