-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Sty 2021, 16:53
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `godziny_seansu`
--

CREATE TABLE `godziny_seansu` (
  `id` int(11) NOT NULL,
  `id_seansu` int(11) DEFAULT NULL,
  `id_zapowiedzi` int(11) DEFAULT NULL,
  `day` int(11) NOT NULL,
  `time2` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `godziny_seansu`
--

INSERT INTO `godziny_seansu` (`id`, `id_seansu`, `id_zapowiedzi`, `day`, `time2`) VALUES
(3, 1, NULL, 5, '19:30:00'),
(4, 1, NULL, 1, '16:30:00'),
(5, 1, NULL, 3, '12:30:00'),
(6, 1, NULL, 3, '15:30:00'),
(7, 1, NULL, 7, '13:00:00'),
(8, 2, NULL, 1, '17:00:00'),
(9, 2, NULL, 5, '13:30:00'),
(10, 2, NULL, 7, '21:00:00'),
(11, 2, NULL, 2, '10:00:00'),
(12, 2, NULL, 2, '14:30:00'),
(17, 3, NULL, 2, '19:30:00'),
(18, 3, NULL, 4, '12:00:00'),
(19, 3, NULL, 6, '12:00:00'),
(20, 3, NULL, 4, '16:00:00'),
(21, 4, NULL, 1, '11:00:00'),
(22, 5, NULL, 1, '15:30:00'),
(23, 6, NULL, 2, '10:30:00'),
(24, 5, NULL, 2, '14:00:00'),
(25, 4, NULL, 3, '14:30:00'),
(26, 5, NULL, 3, '11:30:00'),
(27, 6, NULL, 4, '13:15:00'),
(28, 4, NULL, 4, '16:30:00'),
(29, 5, NULL, 5, '14:00:00'),
(30, 6, NULL, 6, '14:00:00'),
(31, 4, NULL, 7, '11:00:00'),
(32, 7, NULL, 1, '13:00:00'),
(33, 8, NULL, 2, '14:30:00'),
(34, 9, NULL, 2, '17:00:00'),
(35, 7, NULL, 3, '12:00:00'),
(36, 8, NULL, 3, '15:30:00'),
(37, 9, NULL, 4, '11:30:00'),
(38, 8, NULL, 4, '14:30:00'),
(39, 7, NULL, 5, '11:00:00'),
(40, 8, NULL, 5, '15:30:00'),
(41, 9, NULL, 6, '18:00:00'),
(42, 7, NULL, 7, '10:00:00'),
(43, 10, NULL, 1, '18:30:00'),
(44, 10, NULL, 2, '15:30:00'),
(45, 10, NULL, 3, '12:00:00'),
(46, 10, NULL, 2, '19:00:00'),
(47, 10, NULL, 5, '14:30:00'),
(48, 10, NULL, 7, '11:30:00'),
(49, 11, NULL, 1, '13:00:00'),
(50, 11, NULL, 2, '17:00:00'),
(51, 11, NULL, 3, '10:30:00'),
(52, 11, NULL, 3, '14:00:00'),
(53, 11, NULL, 5, '14:30:00'),
(54, 11, NULL, 6, '11:30:00'),
(55, 11, NULL, 6, '16:00:00'),
(56, 12, NULL, 1, '18:00:00'),
(57, 12, NULL, 2, '13:30:00'),
(58, 12, NULL, 2, '17:00:00'),
(59, 12, NULL, 4, '19:00:00'),
(60, 12, NULL, 5, '14:30:00'),
(61, 12, NULL, 6, '17:15:00'),
(62, 12, NULL, 7, '15:00:00'),
(63, 13, NULL, 1, '13:00:00'),
(64, 13, NULL, 2, '15:30:00'),
(65, 13, NULL, 2, '19:30:00'),
(66, 13, NULL, 3, '12:00:00'),
(67, 13, NULL, 4, '14:30:00'),
(68, 13, NULL, 5, '11:30:00'),
(69, 13, NULL, 7, '15:00:00'),
(70, 14, NULL, 1, '13:30:00'),
(71, 14, NULL, 1, '16:15:00'),
(72, 14, NULL, 2, '10:30:00'),
(73, 14, NULL, 3, '14:15:00'),
(74, 14, NULL, 4, '12:15:00'),
(75, 14, NULL, 6, '20:15:00'),
(76, 14, NULL, 7, '18:30:00'),
(77, 15, NULL, 2, '13:00:00'),
(78, 15, NULL, 3, '16:15:00'),
(79, 15, NULL, 4, '10:30:00'),
(80, 15, NULL, 4, '14:00:00'),
(81, 15, NULL, 5, '11:30:00'),
(82, 15, NULL, 6, '19:45:00'),
(83, 15, NULL, 7, '18:30:00'),
(84, 16, NULL, 1, '12:30:00'),
(85, 16, NULL, 2, '14:00:00'),
(86, 16, NULL, 4, '17:30:00'),
(87, 16, NULL, 5, '12:00:00'),
(88, 16, NULL, 6, '11:15:00'),
(89, 16, NULL, 6, '19:00:00'),
(90, 16, NULL, 7, '13:15:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id` int(11) NOT NULL,
  `rzad` int(11) NOT NULL,
  `miejsce` int(11) NOT NULL,
  `id_godziny_seansu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_zapowiedzi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `rzedy` int(11) NOT NULL,
  `miejsca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `sale`
--

INSERT INTO `sale` (`id`, `nazwa`, `rzedy`, `miejsca`) VALUES
(1, 'Sala1', 6, 12),
(2, 'Sala2', 5, 11),
(3, 'Sala3', 8, 15),
(4, 'Sala Vip', 10, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seanse`
--

CREATE TABLE `seanse` (
  `id` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `url_zdjec` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `id_opisu_zdj` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `czas_trwania` text COLLATE utf8_polish_ci NOT NULL,
  `id_sala` int(11) NOT NULL,
  `cena` float NOT NULL,
  `since_day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seanse`
--

INSERT INTO `seanse` (`id`, `nazwa`, `url_zdjec`, `id_opisu_zdj`, `opis`, `czas_trwania`, `id_sala`, `cena`, `since_day`) VALUES
(1, 'Spider-Man', 'https://fwcdn.pl/fpo/96/95/9695/7518091.6.jpg', 'https://fwcdn.pl/fpo/96/95/9695/7518091.6.jpg', 'Peter Parker po ugryzieniu przez radioaktywnego pająka zyskuje supermoce pozwalające mu walczyć z przestępcami. Stara się pomścić śmierć wuja i pokonać Zielonego Goblina.', '2 godz. 1 min.', 1, 20, NULL),
(2, 'BATMAN\r\n', 'https://alejakomiksu.com/gfx/plansze/bbplakatfriends.jpeg', 'https://alejakomiksu.com/gfx/plansze/bbplakatfriends.jpeg', 'Kolejna część opowieści o tajemniczym bohaterze w masce będącym postrachem przestępców w Gotham City. Tym razem, jak sam tytuł na to wskazuje, przenosimy się do czasów kiedy młody, skłócony wewnętrznie Bruce Wayne wędruje przez świat szukając ucieczki przed prawdą i przeznaczeniem do czasu, gdy na jego drodze staje Henri Ducard, członek Ligi Cieni, której celem jest walka ze złem. ', '2 godz. 20 min', 1, 35, NULL),
(3, 'TRANSFORMERS', 'https://fwcdn.pl/fpo/12/20/181220/7168147.6.jpg', 'https://fwcdn.pl/fpo/12/20/181220/7168147.6.jpg', 'Reżyser \"Armageddonu\" i \"Pearl Harbor\" Michael Bay i producent Steven Spielberg ożywiają animowaną sagę opowiadającą o starciu Autobotów z Deceptikonami. Kiedy ich walka zaczyna zagrażać naszej planecie, tylko jeden człowiek, Sam Witwicky (Shia LaBeouf) może przeważyć szalę zwycięstwa!', '2 godz. 24 min.', 1, 26, NULL),
(4, 'LABIRYNT', 'https://fwcdn.pl/fpo/71/69/507169/7568460.6.jpg', 'https://fwcdn.pl/fpo/71/69/507169/7568460.6.jpg', 'Gdy 6-letnia córka małomiasteczkowego stolarza zostaje porwana wraz z jej koleżanką, zostaje wszczęta akcja poszukiwawcza, z którą policja ewidentnie sobie nie radzi. Ojciec, doświadczony myśliwy o głębokiej wierze, mimo iż początkowo współpracuje z organami ścigania, to zrażony ich bezradnością postanawia wymierzyć sprawiedliwość na własną rękę.', '2 godz. 33 min.', 2, 23, NULL),
(5, '21 MOSTÓW', 'https://fwcdn.pl/fpo/96/91/829691/7924192.6.jpg', 'https://fwcdn.pl/fpo/96/91/829691/7924192.6.jpg', 'Podczas włamania do ekskluzywnej nowojorskiej restauracji należącej do mafii, zamordowanych zostaje ośmiu policjantów. Sprawcy uciekają z kilkudziesięcioma kilogramami kokainy. Śledztwo prowadzi detektyw Andrew Davis, znany z tego, że nie ma litości dla zabójców policjantów.', '1 godz. 39 min.', 2, 28, NULL),
(6, 'INIEMAMOCNI 2', 'https://fwcdn.pl/fpo/01/44/740144/7909189.6.jpg', 'https://fwcdn.pl/fpo/01/44/740144/7909189.6.jpg', 'Podczas gdy Bob Parr zmaga się z problemami wychowawczymi swoich dzieci, jego żona Helen, znana także, jako Elastyna, realizuje swe aspiracje, podejmując pracę w lidze antyprzestępczej.', '1 godz. 58 min.', 2, 32, NULL),
(7, 'GREENLAND', 'https://fwcdn.pl/fpo/08/05/840805/7929564.6.jpg', 'https://fwcdn.pl/fpo/08/05/840805/7929564.6.jpg', 'Naukowcy nie mają wątpliwości: Ziemia nie zdoła uniknąć zderzenia ze zbliżającą się do niej potężną kometą, a jego skutki będą katastrofalne. Wybitny inżynier John Garrity i jego rodzina są w grupie wybrańców, którym władze zaoferowały bezpieczne schronienie w położonym na odludziu tajnym bunkrze.', '1 godz. 59 min.', 3, 32, NULL),
(8, 'POSTÓJ NA P.A.', 'https://fwcdn.pl/fpo/74/00/97400/7461867.6.jpg', 'https://fwcdn.pl/fpo/74/00/97400/7461867.6.jpg', 'Czterech uzbrojonych mężczyzn przejmuje kontrolę nad kolejką metra w Nowym Jorku, żądając wysokiego okupu. Doświadczony porucznik Garber stara się pokrzyżować ich plany.', '1 godz. 44min.', 3, 28, NULL),
(9, 'NIEMOŻLIWE', 'https://fwcdn.pl/fpo/63/90/586390/7565796.6.jpg', 'https://fwcdn.pl/fpo/63/90/586390/7565796.6.jpg', 'Historia rodziny – Marii, Henry\'ego i ich trzech synów – która przeżyła tsunami w Tajlandii w 2004 roku.', '1 godz. 54min.', 3, 33, NULL),
(10, 'NIEBO O PÓŁNOCY', 'https://fwcdn.pl/fpo/30/72/843072/7935874.6.jpg', 'https://fwcdn.pl/fpo/30/72/843072/7935874.6.jpg', 'Światem wstrząsa tajemnicza katastrofa. Samotny naukowiec z Arktyki próbuje skontaktować się z załogą wracających do domu astronautów.', '2 godz. 2min.', 1, 40, '2021-01-19'),
(11, 'Midway', 'https://fwcdn.pl/fpo/77/78/827778/7918483.6.jpg', 'https://fwcdn.pl/fpo/77/78/827778/7918483.6.jpg', 'Żołnierze amerykańskiej marynarki próbują powstrzymać ekspansję Japonii na Pacyfiku i odwrócić losy II Wojny Światowej.', '2 godz. 18min.', 2, 45, '2021-01-24'),
(12, 'POSSESSOR', 'https://fwcdn.pl/fpo/60/77/826077/7937769.6.jpg', 'https://fwcdn.pl/fpo/60/77/826077/7937769.6.jpg', 'Tajna organizacja, na zlecenie bogatych klientów, oferuje usługę wszczepienia implantu do mózgu, który umożliwia zmuszenie człowieka do popełniania zabójstw na zlecenie.', '1 godz. 48min.', 3, 35, '2021-01-18'),
(13, 'Ostatni Rycerz', 'https://fwcdn.pl/fpo/46/38/674638/7724999.6.jpg', 'https://fwcdn.pl/fpo/46/38/674638/7724999.6.jpg', 'Upadły wojownik staje do walki przeciwko skorumpowanemu oraz sadystycznemu władcy, by pomścić i przywrócić dobre imię swojego pana.', '1 godz. 55 min.', 4, 55, NULL),
(14, 'Interstellar', 'https://fwcdn.pl/fpo/56/29/375629/7749216.6.jpg', 'https://fwcdn.pl/fpo/56/29/375629/7749216.6.jpg', 'Byt ludzkości na Ziemi dobiega końca wskutek zmian klimatycznych. Grupa naukowców odkrywa tunel czasoprzestrzenny, który umożliwia poszukiwanie nowego domu.', '2 godz. 49 min.', 4, 60, NULL),
(15, 'Pompeje', 'https://fwcdn.pl/fpo/37/96/643796/7594274.6.jpg', 'https://fwcdn.pl/fpo/37/96/643796/7594274.6.jpg', 'Gladiator Milo zwany Celtem trafia do Pompejów, gdzie bierze udział w igrzyskach na cześć senatora odpowiedzialnego za śmierć jego rodziny. Tymczasem górujący nad miastem Wezuwiusz przebudza się.', '1 godz. 42 min.', 4, 50, NULL),
(16, 'LE MANS \'66', 'https://fwcdn.pl/fpo/57/91/705791/7898351.6.jpg', 'https://fwcdn.pl/fpo/57/91/705791/7898351.6.jpg', 'Na zlecenie Henry\'ego Forda II amerykański projektant Carroll Shelby i brytyjski kierowca Ken Miles podejmują wyzwanie pokonania samochodów ekipy Ferrari w 24-godzinnym wyścigu Le Mans.', '2 godz. 43 min.', 4, 65, '2021-01-21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `creation_date`) VALUES
(24, 'Darek', '$2y$10$vmpttDM92FDTSWdqNaC4q.RDDog17ehJDesmqB7ryj6j3jxPHL3Oq', 'darek1@gmail.com', '2020-11-17 18:23:26'),
(25, 'Darek', '$2y$10$Aaji4bjQJbt30WR.tYOvJ.7NMqxJoZuVaBWY/eGmP23ZHdbJpPcUG', 'darek@op.pl', '2020-11-24 10:35:42'),
(26, 'Darek', '$2y$10$FNq1mqtCbbV3VgVDxCUuf.PLS7loS8OQviR7K8F4xfQQCbyfNBDXy', 'd2@op.pl', '2020-12-07 20:38:22'),
(27, 'Alek', '$2y$10$wU2XItIFkAa//R0Jc2y.hOnp/MTb7g8K6zntU8BFxDqxhbhiBCfZC', 'a@1.pl', '2021-01-11 22:28:05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `name` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `adress` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `rzad` int(11) NOT NULL,
  `miejsce` int(11) NOT NULL,
  `sala` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `time` time NOT NULL,
  `day` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `film` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_uzytkownika`, `data`, `name`, `surname`, `adress`, `miasto`, `rzad`, `miejsce`, `sala`, `cena`, `time`, `day`, `film`) VALUES
(18, 26, '2020-12-15 17:00:15', 'Darek', 'Nowak', 'Polna 12a', 'Toruń', 1, 11, '2', 23, '16:30:00', 'Czwartek', 'LABIRYNT'),
(19, 26, '2021-01-18 21:06:59', 'Darek', 'Benek', 'Stacha 32a', 'Poznan', 2, 12, '3', 35, '13:30:00', 'Wtorek', 'POSSESSOR'),
(20, 26, '2021-01-18 17:48:06', 'Darek', 'Nowak', 'Polna 21a', 'Kraków', 3, 9, '2', 23, '14:30:00', 'Środa', 'LABIRYNT');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `godziny_seansu`
--
ALTER TABLE `godziny_seansu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seansu` (`id_seansu`),
  ADD KEY `id_zapowiedzi` (`id_zapowiedzi`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_godziny_seansu` (`id_godziny_seansu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_zapowiedzi` (`id_zapowiedzi`);

--
-- Indeksy dla tabeli `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `godziny_seansu`
--
ALTER TABLE `godziny_seansu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT dla tabeli `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `seanse`
--
ALTER TABLE `seanse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `godziny_seansu`
--
ALTER TABLE `godziny_seansu`
  ADD CONSTRAINT `godziny_seansu_ibfk_1` FOREIGN KEY (`id_seansu`) REFERENCES `seanse` (`id`),
  ADD CONSTRAINT `godziny_seansu_ibfk_2` FOREIGN KEY (`id_zapowiedzi`) REFERENCES `zapowiedzi` (`id`);

--
-- Ograniczenia dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `rezerwacja_ibfk_1` FOREIGN KEY (`id_godziny_seansu`) REFERENCES `godziny_seansu` (`id`),
  ADD CONSTRAINT `rezerwacja_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `rezerwacja_ibfk_3` FOREIGN KEY (`id_zapowiedzi`) REFERENCES `zapowiedzi` (`id`);

--
-- Ograniczenia dla tabeli `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `seanse_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sale` (`id`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
