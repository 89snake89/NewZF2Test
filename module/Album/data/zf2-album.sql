-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Dic 10, 2013 alle 09:16
-- Versione del server: 5.5.16
-- Versione PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zf2-album`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Dump dei dati per la tabella `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(1, 'The  Military  Wives', 'In  My  Dreams'),
(2, 'Adele', 'Adele boh'),
(4, 'Lana  Del  Rey', 'Born  To  Die'),
(5, 'Gotye', 'Making  Mirrors'),
(6, 'Miley Cyrus', 'Wrecking Ball'),
(7, 'Adriano Celentano', 'La via Gluc'),
(8, 'David Bowie', 'The Next Day (Deluxe Version)'),
(9, 'Bastille', 'Bad Blood'),
(10, 'Bruno Mars', 'Unorthodox Jukebox'),
(11, 'Emeli Sandé', 'Our Version of Events (Special Edition)'),
(12, 'Bon Jovi', 'What About Now (Deluxe Version)'),
(13, 'Justin Timberlake', 'The 20/20 Experience (Deluxe Version)'),
(14, 'Bastille', 'Bad Blood (The Extended Cut)'),
(15, 'P!nk', 'The Truth About Love'),
(16, 'Sound City - Real to Reel', 'Sound City - Real to Reel'),
(17, 'Jake Bugg', 'Jake Bugg'),
(18, 'Various Artists', 'The Trevor Nelson Collection'),
(19, 'David Bowie', 'The Next Day'),
(20, 'Mumford & Sons', 'Babel'),
(21, 'The Lumineers', 'The Lumineers'),
(22, 'Various Artists', 'Get Ur Freak On - R&B Anthems'),
(23, 'The 1975', 'Music For Cars EP'),
(24, 'Various Artists', 'Saturday Night Club Classics - Ministry of Sound'),
(25, 'Hurts', 'Exile (Deluxe)'),
(26, 'Various Artists', 'Mixmag - The Greatest Dance Tracks of All Time'),
(27, 'Ben Howard', 'Every Kingdom'),
(28, 'Stereophonics', 'Graffiti On the Train'),
(29, 'The Script', '#3'),
(30, 'Stornoway', 'Tales from Terra Firma'),
(31, 'David Bowie', 'Hunky Dory (Remastered)'),
(32, 'Worship Central', 'Let It Be Known (Live)'),
(33, 'Ellie Goulding', 'Halcyon'),
(34, 'Various Artists', 'Dermot O''Leary Presents the Saturday Sessions 2013'),
(35, 'Stereophonics', 'Graffiti On the Train (Deluxe Version)'),
(36, 'Dido', 'Girl Who Got Away (Deluxe)'),
(37, 'Hurts', 'Exile'),
(38, 'Bruno Mars', 'Doo-Wops & Hooligans'),
(39, 'Calvin Harris', '18 Months'),
(40, 'Olly Murs', 'Right Place Right Time'),
(41, 'Alt-J (?)', 'An Awesome Wave'),
(42, 'One Direction', 'Take Me Home'),
(43, 'Various Artists', 'Pop Stars'),
(44, 'Various Artists', 'Now That''s What I Call Music! 83'),
(45, 'John Grant', 'Pale Green Ghosts'),
(46, 'Paloma Faith', 'Fall to Grace'),
(47, 'Laura Mvula', 'Sing To the Moon (Deluxe)'),
(48, 'Duke Dumont', 'Need U (100%) [feat. A*M*E] - EP'),
(49, 'Watsky', 'Cardboard Castles'),
(50, 'Blondie', 'Blondie: Greatest Hits'),
(51, 'Foals', 'Holy Fire'),
(52, 'Maroon 5', 'Overexposed'),
(53, 'Bastille', 'Pompeii (Remixes) - EP'),
(54, 'Imagine Dragons', 'Hear Me - EP'),
(55, 'Various Artists', '100 Hits: 80s Classics'),
(56, 'Various Artists', 'Les Misérables (Highlights From the Motion Picture Soundtrack)'),
(57, 'Mumford & Sons', 'Sigh No More'),
(58, 'Frank Ocean', 'Channel ORANGE'),
(59, 'Bon Jovi', 'What About Now'),
(60, 'Various Artists', 'BRIT Awards 2013'),
(61, 'Taylor Swift', 'Red'),
(62, 'Fleetwood Mac', 'Fleetwood Mac: Greatest Hits'),
(63, 'David Guetta', 'Nothing But the Beat Ultimate'),
(64, 'Various Artists', 'Clubbers Guide 2013 (Mixed By Danny Howard) - Ministry of Sound'),
(65, 'David Bowie', 'Best of Bowie'),
(66, 'Laura Mvula', 'Sing To the Moon'),
(67, 'ADELE', '21'),
(68, 'Of Monsters and Men', 'My Head Is an Animal'),
(69, 'Rihanna', 'Unapologetic'),
(70, 'Various Artists', 'BBC Radio 1''s Live Lounge - 2012'),
(71, 'Avicii & Nicky Romero', 'I Could Be the One (Avicii vs. Nicky Romero)'),
(72, 'The Streets', 'A Grand Don''t Come for Free'),
(73, 'Tim McGraw', 'Two Lanes of Freedom'),
(74, 'Foo Fighters', 'Foo Fighters: Greatest Hits'),
(75, 'Various Artists', 'Now That''s What I Call Running!'),
(76, 'Swedish House Mafia', 'Until Now'),
(77, 'The xx', 'Coexist'),
(78, 'Five', 'Five: Greatest Hits'),
(79, 'Jimi Hendrix', 'People, Hell & Angels'),
(80, 'Biffy Clyro', 'Opposites (Deluxe)'),
(81, 'The Smiths', 'The Sound of the Smiths'),
(82, 'The Saturdays', 'What About Us - EP'),
(83, 'Fleetwood Mac', 'Rumours'),
(84, 'Various Artists', 'The Big Reunion'),
(85, 'Various Artists', 'Anthems 90s - Ministry of Sound'),
(86, 'The Vaccines', 'Come of Age'),
(87, 'Nicole Scherzinger', 'Boomerang (Remixes) - EP'),
(88, 'Bob Marley', 'Legend (Bonus Track Version)'),
(89, 'Josh Groban', 'All That Echoes'),
(90, 'Blue', 'Best of Blue'),
(91, 'Ed Sheeran', '+'),
(92, 'Olly Murs', 'In Case You Didn''t Know (Deluxe Edition)'),
(93, 'Macklemore & Ryan Lewis', 'The Heist (Deluxe Edition)'),
(94, 'Various Artists', 'Defected Presents Most Rated Miami 2013'),
(95, 'Gorgon City', 'Real EP'),
(96, 'Mumford & Sons', 'Babel (Deluxe Version)'),
(97, 'Various Artists', 'The Music of Nashville: Season 1, Vol. 1 (Original Soundtrack)'),
(98, 'Various Artists', 'The Twilight Saga: Breaking Dawn, Pt. 2 (Original Motion Picture Soundtrack)'),
(99, 'Various Artists', 'Mum - The Ultimate Mothers Day Collection'),
(100, 'One Direction', 'Up All Night'),
(101, 'Bon Jovi', 'Bon Jovi Greatest Hits'),
(102, 'Agnetha Fältskog', 'A'),
(103, 'Fun.', 'Some Nights'),
(104, 'Justin Bieber', 'Believe Acoustic'),
(105, 'Atoms for Peace', 'Amok'),
(106, 'Justin Timberlake', 'Justified'),
(107, 'Passenger', 'All the Little Lights'),
(108, 'Kodaline', 'The High Hopes EP'),
(109, 'Lana Del Rey', 'Born to Die'),
(110, 'JAY Z & Kanye West', 'Watch the Throne (Deluxe Version)'),
(111, 'Biffy Clyro', 'Opposites'),
(112, 'Various Artists', 'Return of the 90s'),
(113, 'Gabrielle Aplin', 'Please Don''t Say You Love Me - EP'),
(114, 'Various Artists', '100 Hits - Driving Rock'),
(115, 'Jimi Hendrix', 'Experience Hendrix - The Best of Jimi Hendrix'),
(116, 'Various Artists', 'The Workout Mix 2013'),
(117, 'The 1975', 'Sex'),
(118, 'Chase & Status', 'No More Idols'),
(119, 'Rihanna', 'Unapologetic (Deluxe Version)'),
(120, 'The Killers', 'Battle Born'),
(121, 'Olly Murs', 'Right Place Right Time (Deluxe Edition)'),
(122, 'A$AP Rocky', 'LONG.LIVE.A$AP (Deluxe Version)'),
(123, 'Various Artists', 'Cooking Songs'),
(124, 'Haim', 'Forever - EP'),
(125, 'Lianne La Havas', 'Is Your Love Big Enough?'),
(126, 'Michael Bublé', 'To Be Loved'),
(127, 'Daughter', 'If You Leave'),
(128, 'The xx', 'xx'),
(129, 'Eminem', 'Curtain Call'),
(130, 'Kendrick Lamar', 'good kid, m.A.A.d city (Deluxe)'),
(131, 'Disclosure', 'The Face - EP'),
(132, 'Palma Violets', '180'),
(133, 'Cody Simpson', 'Paradise'),
(134, 'Ed Sheeran', '+ (Deluxe Version)'),
(135, 'Michael Bublé', 'Crazy Love (Hollywood Edition)'),
(136, 'Bon Jovi', 'Bon Jovi Greatest Hits - The Ultimate Collection'),
(137, 'Rita Ora', 'Ora'),
(138, 'g33k', 'Spabby'),
(139, 'Various Artists', 'Annie Mac Presents 2012'),
(140, 'David Bowie', 'The Platinum Collection'),
(141, 'Bridgit Mendler', 'Ready or Not (Remixes) - EP'),
(142, 'Dido', 'Girl Who Got Away'),
(143, 'Various Artists', 'Now That''s What I Call Disney'),
(144, 'The 1975', 'Facedown - EP'),
(145, 'Kodaline', 'The Kodaline - EP'),
(146, 'Various Artists', '100 Hits: Super 70s'),
(147, 'Fred V & Grafix', 'Goggles - EP'),
(148, 'Biffy Clyro', 'Only Revolutions (Deluxe Version)'),
(149, 'Train', 'California 37'),
(150, 'Ben Howard', 'Every Kingdom (Deluxe Edition)'),
(151, 'Various Artists', 'Motown Anthems'),
(152, 'Courteeners', 'ANNA'),
(153, 'Johnny Marr', 'The Messenger'),
(154, 'Rodriguez', 'Searching for Sugar Man'),
(155, 'Jessie Ware', 'Devotion'),
(156, 'Bruno Mars', 'Unorthodox Jukebox'),
(157, 'Various Artists', 'Call the Midwife (Music From the TV Series)');

-- --------------------------------------------------------

--
-- Struttura della tabella `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(127) NOT NULL,
  `model` varchar(127) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`) VALUES
(1, 'Fiat', 'Bravo'),
(2, 'Fiat', 'Qubo Trekking'),
(3, 'Fiat', 'Barchetta'),
(5, 'Alfa Romeo', '159'),
(6, 'Alfa Romeo', '159 SW'),
(7, 'Mercedes', 'Classe E');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
