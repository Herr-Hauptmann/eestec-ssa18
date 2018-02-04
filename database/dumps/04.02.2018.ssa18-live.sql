-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2018 at 10:47 PM
-- Server version: 5.6.38-83.0
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssa18`
--

-- --------------------------------------------------------

--
-- Table structure for table `fakulteti`
--

CREATE TABLE `fakulteti` (
  `id` int(10) UNSIGNED NOT NULL,
  `naziv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakulteti`
--

INSERT INTO `fakulteti` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Akademija likovnih umjetnosti', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(2, 'Akademija scenskih umjetnosti', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(3, 'American University in BiH', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(4, 'Arhitektonski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(5, 'Ekonomski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(6, 'Elektrotehnički fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(7, 'Fakultet islamskih nauka', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(8, 'Fakultet političkih nauka', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(9, 'Fakultet sporta i tjelesnog odgoja', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(10, 'Fakultet za kriminalistiku, kriminologiju i sigurnosne studije', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(11, 'Fakultet za saobraćaj i komunikacije', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(12, 'Fakultet za upravu', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(13, 'Fakultet zdravstvenih studija', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(14, 'Farmaceutski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(15, 'Filozofski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(16, 'Građevinski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(17, 'International Burch University', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(18, 'International University of Sarajevo', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(19, 'Katolički bogoslovni fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(20, 'Mašinski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(21, 'Medicinski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(22, 'Muzička akademija', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(23, 'Pedagoški fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(24, 'Poljoprivredno-prehrambeni fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(25, 'Pravni fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(26, 'Prirodno-matematički fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(27, 'Sarajevo School of Science and Technology', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(28, 'Stomatološki fakultet sa klinikama', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(29, 'Šumarski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29'),
(30, 'Veterinarski fakultet', '2018-01-14 21:39:29', '2018-01-14 21:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `fakultet_participant`
--

CREATE TABLE `fakultet_participant` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `participant_id` int(10) UNSIGNED NOT NULL,
  `fakultet_id` int(10) UNSIGNED NOT NULL,
  `godina` int(11) DEFAULT NULL,
  `odsjek` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultet_participant`
--

INSERT INTO `fakultet_participant` (`id`, `created_at`, `updated_at`, `participant_id`, `fakultet_id`, `godina`, `odsjek`) VALUES
(1, NULL, NULL, 1, 15, 4, 'psihologija'),
(2, NULL, NULL, 2, 15, 3, 'Psihologija'),
(3, NULL, NULL, 3, 15, 2, 'Anglistika'),
(4, NULL, NULL, 4, 6, 1, 'Računarstvo i informatika (Kurs)'),
(5, NULL, NULL, 5, 12, 2, 'Poslovna uprava'),
(6, NULL, NULL, 6, 1, 1, NULL),
(7, NULL, NULL, 7, 25, 3, 'Opći'),
(8, NULL, NULL, 8, 5, 3, 'Marketing'),
(9, NULL, NULL, 9, 25, 5, 'Građansko-pravni'),
(10, NULL, NULL, 10, 1, 1, NULL),
(11, NULL, NULL, 11, 15, 1, 'Anglistika'),
(12, NULL, NULL, 12, 6, 2, 'Telekomunikacije'),
(13, NULL, NULL, 13, 8, 4, 'Socijalni rad'),
(14, NULL, NULL, 14, 1, 1, NULL),
(15, NULL, NULL, 15, 8, 2, 'Međunarodni odnosi i Diplomatija'),
(16, NULL, NULL, 16, 1, 1, NULL),
(17, NULL, NULL, 17, 1, 1, NULL),
(18, NULL, NULL, 18, 27, 5, 'Information Systems and Management'),
(19, NULL, NULL, 19, 8, 5, 'Socijalni rad'),
(20, NULL, NULL, 20, 8, 6, 'Sigurnost i mirovne studije'),
(21, NULL, NULL, 21, 25, 4, '/'),
(22, NULL, NULL, 22, 8, 3, 'Socijalni rad'),
(23, NULL, NULL, 23, 6, 3, 'Elektroenergetika'),
(24, NULL, NULL, 24, 3, 4, 'International Finance and Banking'),
(25, NULL, NULL, 25, 1, 1, NULL),
(26, NULL, NULL, 26, 12, 4, '/'),
(27, NULL, NULL, 27, 18, 3, 'Computer Sciences and Engineering'),
(28, NULL, NULL, 28, 26, 2, 'Matematika-TKN'),
(29, NULL, NULL, 29, 24, 4, 'Floristika i pejsazno oblikovanje'),
(30, NULL, NULL, 30, 1, 1, NULL),
(31, NULL, NULL, 31, 18, 3, 'Industrijski inženjering'),
(32, NULL, NULL, 32, 13, 3, 'laboratorijske tehnologije'),
(33, NULL, NULL, 33, 20, 4, 'Proizvodne tehnologije, automatizirani i robotizirani tehnološki procesi'),
(34, NULL, NULL, 34, 1, 1, NULL),
(35, NULL, NULL, 35, 15, 2, 'Turski jezik i knjizevnost'),
(36, NULL, NULL, 36, 20, 2, 'Masinse konstrukcije'),
(37, NULL, NULL, 37, 20, 2, 'Mašinske konstrukcije'),
(38, NULL, NULL, 37, 1, 1, NULL),
(39, NULL, NULL, 37, 1, 1, NULL),
(40, NULL, NULL, 38, 15, 1, 'Anglistika'),
(41, NULL, NULL, 39, 5, 1, 'Menadžment - Engleski jezik'),
(42, NULL, NULL, 40, 8, 2, 'Komunikologija/žurnalistika'),
(43, NULL, NULL, 41, 18, 1, 'Fakultet menadžmenta i javne uprave, smjer Međunarodni odnosi'),
(44, NULL, NULL, 42, 6, 2, 'Računarstvo i informatika'),
(45, NULL, NULL, 43, 8, 3, 'Međunarodni odnosi i diplomatija'),
(46, NULL, NULL, 44, 15, 3, 'Germanistika'),
(47, NULL, NULL, 44, 15, 2, 'Anglistika'),
(48, NULL, NULL, 45, 26, 5, 'Odsjek za geografiju; Smjer-Turizam i zaštita okoliša'),
(49, NULL, NULL, 46, 5, 3, 'Menadzment'),
(50, NULL, NULL, 47, 8, 5, 'Sociologija'),
(51, NULL, NULL, 48, 5, 2, 'Menadžmet'),
(52, NULL, NULL, 49, 6, 5, 'Telekomunikacije'),
(53, NULL, NULL, 50, 6, 5, 'Telekomunikacije'),
(54, NULL, NULL, 51, 5, 4, 'menadžer'),
(55, NULL, NULL, 51, 1, 1, NULL),
(56, NULL, NULL, 52, 25, 2, NULL),
(57, NULL, NULL, 53, 18, 2, 'Ekonomija'),
(58, NULL, NULL, 54, 1, 1, NULL),
(59, NULL, NULL, 55, 15, 1, 'Romanistika'),
(60, NULL, NULL, 56, 25, 3, NULL),
(61, NULL, NULL, 57, 16, 1, NULL),
(62, NULL, NULL, 58, 5, 3, 'Marketing'),
(63, NULL, NULL, 59, 11, 1, 'komunikacije'),
(64, NULL, NULL, 60, 1, 1, NULL),
(65, NULL, NULL, 61, 1, 1, NULL),
(66, NULL, NULL, 62, 20, 4, 'Tehnologija drveta');

-- --------------------------------------------------------

--
-- Table structure for table `kontakts`
--

CREATE TABLE `kontakts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pozicija` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prezime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pozicija_short` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontakts`
--

INSERT INTO `kontakts` (`id`, `created_at`, `updated_at`, `pozicija`, `ime`, `prezime`, `email`, `telefon`, `pozicija_short`) VALUES
(1, '2018-01-14 21:42:14', '2018-01-14 21:49:59', 'Glavna organizatorica', 'Marijana', 'Udovčić', 'marijana.udovcic@softskillsacademy.ba', '++387 61 894 696', '0'),
(2, '2018-01-14 21:43:57', '2018-01-14 21:50:08', 'Koordinator tima za odnose sa javnošću', 'Zlatan', 'Peleksić', 'zlatan.peleksic@softskillsacademy.ba', '++387 60 324 4129', '2'),
(4, '2018-01-14 21:47:53', '2018-01-14 21:47:53', 'Koordinatorica tima za informacione tehnologije', 'Ana', 'Vujanović', 'ana.vujanovic@softskillsacademy.ba', '++387 60 315 4143', '4'),
(5, '2018-01-14 21:48:45', '2018-01-14 21:48:45', 'Koordinatorica tima za odnose sa kompanijama', 'Amila', 'Hrustić', 'amila.hrustic@softskillsacademy.ba', '++387 61 045 749', '3'),
(6, '2018-01-14 21:49:46', '2018-01-14 21:49:46', 'Koordinator tima za dizajn i publikacije', 'Kerim', 'Redžepagić', 'kerim.redzepagic@softskillsacademy.ba', '++387 62 507 356', '5'),
(7, '2018-01-14 22:21:40', '2018-01-14 22:21:40', 'Koordinatorica tima za ljudske resurse i logistiku', 'Enisa', 'Musić', 'enisa.music@softskillsacademy.ba', '++387 62 969 560', '1');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_26_183233_create_posts_table', 1),
(4, '2017_12_26_192244_create_media_table', 1),
(5, '2018_01_09_130246_create_partners_table', 1),
(6, '2018_01_13_142419_create_participanti_table', 1),
(7, '2018_01_13_151811_create_faculty_table', 1),
(8, '2018_01_13_185551_create_fakultet_participant_table', 1),
(9, '2018_01_13_194938_create_kontakts_table', 1),
(10, '2018_01_13_203556_add_phone_column_to_kontakt_table', 1),
(11, '2018_01_14_162343_add_pozicija_short_column_to_kontakt_table', 1),
(12, '2018_01_15_231005_add_category_to_partners_table', 2),
(13, '2018_01_16_232457_create_trainers_table', 3),
(14, '2018_01_16_232730_create_trainings_table', 3),
(15, '2018_01_17_204149_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_id`, `model_type`) VALUES
(6, 2, 'App\\User'),
(7, 2, 'App\\User'),
(8, 2, 'App\\User'),
(9, 2, 'App\\User'),
(10, 2, 'App\\User'),
(11, 2, 'App\\User'),
(12, 2, 'App\\User'),
(13, 2, 'App\\User'),
(14, 2, 'App\\User'),
(15, 2, 'App\\User'),
(16, 2, 'App\\User'),
(17, 2, 'App\\User'),
(18, 2, 'App\\User'),
(19, 2, 'App\\User'),
(20, 2, 'App\\User'),
(21, 2, 'App\\User'),
(22, 2, 'App\\User'),
(23, 2, 'App\\User'),
(2, 3, 'App\\User'),
(6, 4, 'App\\User'),
(7, 4, 'App\\User'),
(8, 4, 'App\\User'),
(9, 4, 'App\\User'),
(10, 4, 'App\\User'),
(11, 4, 'App\\User'),
(12, 4, 'App\\User'),
(13, 4, 'App\\User'),
(14, 4, 'App\\User'),
(15, 4, 'App\\User'),
(16, 4, 'App\\User'),
(17, 4, 'App\\User'),
(18, 4, 'App\\User'),
(19, 4, 'App\\User'),
(20, 4, 'App\\User'),
(21, 4, 'App\\User'),
(22, 4, 'App\\User'),
(23, 4, 'App\\User'),
(6, 5, 'App\\User'),
(7, 5, 'App\\User'),
(8, 5, 'App\\User'),
(9, 5, 'App\\User'),
(10, 5, 'App\\User'),
(11, 5, 'App\\User'),
(12, 5, 'App\\User'),
(13, 5, 'App\\User'),
(14, 5, 'App\\User'),
(15, 5, 'App\\User'),
(16, 5, 'App\\User'),
(17, 5, 'App\\User'),
(18, 5, 'App\\User'),
(19, 5, 'App\\User'),
(20, 5, 'App\\User'),
(21, 5, 'App\\User'),
(22, 5, 'App\\User'),
(23, 5, 'App\\User'),
(6, 6, 'App\\User'),
(7, 6, 'App\\User'),
(8, 6, 'App\\User'),
(9, 6, 'App\\User'),
(10, 6, 'App\\User'),
(11, 6, 'App\\User'),
(12, 6, 'App\\User'),
(13, 6, 'App\\User'),
(14, 6, 'App\\User'),
(15, 6, 'App\\User'),
(16, 6, 'App\\User'),
(17, 6, 'App\\User'),
(18, 6, 'App\\User'),
(19, 6, 'App\\User'),
(20, 6, 'App\\User'),
(21, 6, 'App\\User'),
(22, 6, 'App\\User'),
(23, 6, 'App\\User'),
(6, 7, 'App\\User'),
(7, 7, 'App\\User'),
(8, 7, 'App\\User'),
(9, 7, 'App\\User'),
(10, 7, 'App\\User'),
(11, 7, 'App\\User'),
(12, 7, 'App\\User'),
(13, 7, 'App\\User'),
(14, 7, 'App\\User'),
(15, 7, 'App\\User'),
(16, 7, 'App\\User'),
(17, 7, 'App\\User'),
(18, 7, 'App\\User'),
(19, 7, 'App\\User'),
(20, 7, 'App\\User'),
(21, 7, 'App\\User'),
(22, 7, 'App\\User'),
(23, 7, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 3, 'App\\User'),
(2, 4, 'App\\User'),
(2, 5, 'App\\User'),
(2, 6, 'App\\User'),
(2, 7, 'App\\User'),
(2, 8, 'App\\User'),
(2, 9, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `participanti`
--

CREATE TABLE `participanti` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_telefona` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `velicina_majice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engleski_govor` int(11) DEFAULT NULL,
  `engleski_razumijevanje` int(11) DEFAULT NULL,
  `motivaciono` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ranije_ucesce_na_ssa` tinyint(1) DEFAULT NULL,
  `kako_ste_saznali` text COLLATE utf8mb4_unicode_ci,
  `radno_iskustvo` longtext COLLATE utf8mb4_unicode_ci,
  `trenutno_zaposlenje` tinyint(1) DEFAULT NULL,
  `ucesce_na_treninzima` longtext COLLATE utf8mb4_unicode_ci,
  `ucesce_na_seminarima` longtext COLLATE utf8mb4_unicode_ci,
  `nvo_iskustvo` longtext COLLATE utf8mb4_unicode_ci,
  `dodatne_napomene` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participanti`
--

INSERT INTO `participanti` (`id`, `ime`, `prezime`, `datum_rodjenja`, `broj_telefona`, `email`, `velicina_majice`, `engleski_govor`, `engleski_razumijevanje`, `motivaciono`, `ranije_ucesce_na_ssa`, `kako_ste_saznali`, `radno_iskustvo`, `trenutno_zaposlenje`, `ucesce_na_treninzima`, `ucesce_na_seminarima`, `nvo_iskustvo`, `dodatne_napomene`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Merisa', 'Doljančić', '1995-10-25', '061013988', 'merisa.doljancic@gmail.com', 'S', 4, 4, 'Poštovani, \r\n\r\nDiplomirala sam psihologiju prošle godine i nastavila svoje obrazovanje u istoj domeni u Sarajevu. Shvatila sam da pored akademskih vještina koje usvajam, neophodno mi je i da usvojim lične vještine koje mi mogu pomoći u privatnom, ali i poslovnom kontekstu. Izuzetno sam komunikativna osoba, volim upoznavati druge ljude i volim kad se pred mene stavi određeni izazov. Volim osmišljavati radionice i u toj domeni se još usavršavam, a počela sam kao tim lider za radionice na temu prevencije maloljetničkog prijestupništva.\r\n Generalno, mislim da je cilj uspjeha u Bosni i Hercegovini uz formalno i neformalno obrazovanje koje može pomoći da se pojedinac definira u budućem zvanju. Smatram da, ukoliko želim biti stručnjak u svom području, neophodno je da učestvujem u radionicama kao što je Soft Skill Academy 2018. Soft Skill Academy radionice su dobar potencijal da svako od nas razvije one vještine koje mu nedostaju.\r\nVolonterski sam aktivna duži vremenski period, izuzetno sam komunikativna i društvena, motivirana za učenje i usvajanje novih vještina, te smatram da su to stvari koje meni mogu pomoći  i da se uklopim u kontekst radionice i da prenesem svoja vlastita iskustva i znanja drugima. Uz svo moje neformalno obrazovanje, potrebno mi je i učešće u radionici poput Soft Skill Academy koje će mi olakšati tako što pri izražavanju usvojenih vještina na radinici postanem jedinka koja se izdvaja iz mase i koja ima potencijal kvalitetnog kandidata za posao.\r\n\r\nS poštovanjem,\r\nMerisa Doljančić', 0, 'Društvene mreže', '1. Telefonsko anketiranje u GFK (Growth for Knowledge) u Sarajevu za korisnike dobi 18-70 godina. Glavne odgovornosti jesu ankete o istraživanju tržišta o konzumaciji određenih proizvoda, korištenju telefonskih usluga i anketa u vezi bankovnih računa i usloga koje banke nude.\r\n\r\n2. Osoblje u Kinu Meeting point (Boxoffice randnik). Odgovornosti posla su pružanje informacija o filmovima koje kino pušta, prodaja proizvoda u kinu, te timski rad sa drugim zaposlenicima u kinu i istoimenom kafiću.', 0, 'Do sada nikada nisam učestvovala na soft skills treninzima.', '1. “Trauma i proces pomirenja”, prvi stepen obrazovanja, Sarajevo, 2016. godina\r\nRiječ je o trodnevnoj edukaciji o traumi, vrstama traume, načinima nošenja sa traumom (fokus na ratnim traumama koje su zadesile prostore Balkana). Zadaci su rađeni u timu sa kolegama sa odsjeka psihologije, sociologije i teologije. Također, radilo se i sa geštalt terapeutom.\r\n\r\n2. Akademija za prevenciju maloljetničkog prijestupništva, edukacija, 03.10.2017-\r\n26.10.2017\r\nRiječ je o edukaciji i interaktivnim radionicama koje drže akademski profesori i stručnjaci koji se u svom praktičnom radu susreću sa maloljetničkim prijestupništvom.', '1. Volonter u nevladinoj organizaciji za mlade AIESEC\r\nČlan sam tima iGV (Incoming Global Volunteer).Radimo na ogranizaciji projekta Children of Revolution koji će se održati 12.02.-25.03.2018. Projekat je vezan za organiziranje volonterskih praksi u vrtićima u Sarajevu praktikantima iz različitih zemalja svijeta.', 'Učesnik sam dvije konferencije koje su se održale u Sarajevu: Sarajevo Unlimited (02.11-2017.-04.11.2017.) i Drive konferencije (09.11.2017.)\r\n\r\nUz sve, volonter sam preko godinu dana u  KJU Dom za djecu bez roditeljskog staranja Bjelave u Sarajevu. Rad sa djecom dobi od jedne godine do šest godina, te cilj moga rada jeste učenje kroz igru (različito je za djecu 1-3 godine i djecu 3-6 godina), podsticanje razvitka govornih i motoričkih vještina kod djece, pružanje podrške (emocionalne i psihološke). Također, radim u timu sa osobljem doma, te djeca se uče o timskom radu i važnosti istog (važi za djecu dobi 3-6 godina)', NULL, '2018-01-15 04:26:32', '2018-01-15 04:26:32'),
(2, 'Haris', 'Hajrć', '1995-11-15', '061519316', 'haris-haj@hotmail.com', 'L', 5, 5, 'Skoro svako nakon zavrsenog fakulteta ima blokadu da nadje posao i da zapocne samostalni zivot. Moj cilj kroz soft skills akademiju jeste da naucim skills koji ce mi omoguciti da sto prije probijem tu blokadu i sto prije obezbjedim stabilan zivot. Takodjer kroz soft skills akademiju zelim da upoznam motivisane osobe i osobe sa novim idejama. Stvaranje veze sa ovim ljudima moze da izuzetno znaci za moju buducnost, sa stvaranjem takvih veza znaci ucenje od drugih ljudi, raditi sa tim ljudima i pomagati tim ljudima. Soft skills je sjajna platforma da se napravi korak ispred sto mislim da svakome treba u zivotu. Taj korak ispred moze da bude veoma bitan faktor za daljnji zivot osobe. Moj je cilj da naucim kako da napravim taj sljedeci korak, kako da me prepoznaju u polju mog rada i kako sebe da predstavim kao neko ko im treba za njihovu buducnost. Iz iskustva mojih prijatelja koji su isli na soft skills akademiju, cini se kao da sve sto sam naveo ovdje pruza akademija.', 0, 'Društvene mreže', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-15 08:42:02', '2018-01-15 08:42:02'),
(3, 'Ajla', 'Aljović', '1997-09-15', '062909471', 'ajla_aljovic@hotmail.com', 'S', 5, 5, 'Poštovani!\r\nObraćam Vam se povodom prijave na Soft skills academy koju sam pronašla na vašoj facebook stranici.\r\nKao osoba željna novih znanja i vještina, željela bih svoje vidike proširiti informacijama i iskustvima sa ove Akademije. Smatram da svaku priliku treba iskoristiti na najbolji mogući način. Također, smatram da što više znamo, više vrijedimo, te da smo konkurentniji na tržištu rada.\r\nStudentica sam druge godine Engleskog jezika i književnosti na Filozofskom fakultetu u Sarajevu. Završila sam nekoliko kurseva, trenutno pohađam kurs Android development. Jako sam ambiciozna, organizovana i sve obaveze završim na vrijeme. Komunikativna sam i uvijek raspoložena za rad. \r\nBrzo učim i uporna sam.\r\nMišljenja sam da svi poslodavci traže ono što se nudi na ovoj Akademiji, pa ne bih da propustim šansu za usavršavanjem. \r\nBiće mi zadovoljstvo ako među konkurencijom ukažete povjerenje upravo meni.\r\nNadajući se pozitivnom odgovoru.\r\nS poštovanjem, \r\nAljović Ajla', 0, 'Društvene mreže', 'Saradnik na pisanju seminarskih, diplomskih i master radova;\r\nSfi marketing kompanija;\r\nOriflame kozmetika', 1, NULL, NULL, NULL, 'U Kulturnom centru Kralj Fahd sam završila kurseve MS Word 2016, MS Powerpoint 2016 i Internet. Trenutno pohađam kurs Android development.\r\nU centru Follow me završila sam kurs engleskog jezika, a kurs turskog jezika sam završila na International Burch Univerzitetu.\r\nTakođer, završila sam i plesnu školu, te osvojila prvo mjesto u kategoriji juniori 2.', NULL, '2018-01-15 20:58:16', '2018-01-15 20:58:16'),
(4, 'Ramiz', 'Polić', '1998-02-28', '0603588313', 'ramiz.polic@hotmail.com', 'L', 5, 5, 'Poliranje svih vještina potrebnih za uspješnu poslovnu kvalifikaciju jako je važan korak u modernom dobu. Shodno tome, moja želja je, pored generalnog uvezivanja i povezivanja sa različitim ljudima, također i lično unaprijeđenje osobina potrebnih za konkuretnost na poslovnom tržištu - što zapravo i jeste, objektivno gledajući, poenta ove akademije.', 0, 'Promocija na fakultetu', '- Raiffeisen BANK dd BIH - Application Developer\r\n- Almy Travel - Software Developer\r\n- Klinika.ba - Content Creator and Site Maintenance', 1, NULL, '- Microsoft NetWork 7\r\n- ValueUp', '- Ambasada lokalne demokratije Zavidovići', 'https://www.linkedin.com/in/rasewp/', NULL, '2018-01-15 21:13:10', '2018-01-15 21:13:10'),
(5, 'Velida', 'Hasecic', '1998-02-13', '0603001064', 'velidahasecic@gmail.com', 'S', 4, 4, 'Poštovani,\r\n Obraćam Vam se ovim putem jer kao ambiciozna osoba imam veliku želju da kroz Vaše programe obuke i pohađanje specijalizovanih kurseva napredujem u karijeri.\r\nPohađam fakultet za upravu te smatram da svojim kvalifikacijama i osobinama zadovoljavam Vaše zahtjeve.\r\nKomukativna sam osoba, vrlo rado i lako stupam u odnose sa drugim ljudima, zainteresovana sam da naučim nove načine rada. Imam visoku želju za profesionalnim uspjehom.\r\n\r\nS poštovanjem,\r\nVelida Hasečić', 0, 'Društvene mreže', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-16 13:24:16', '2018-01-16 13:24:16'),
(6, 'Nejra', 'Džananović', '1995-05-02', '0603296868', 'Sotb.1@hotmail.com', 'M', 4, 4, 'Obzirom da sam student fakulteta u Sarajevu vec su mi otvorena vrata za SSA. Zelja mi je bila ranije učestvovati ali mi datumi održavanja nisu odgovarali. Stoga bih voljela ove godine biti dio vaše priče. Spremna sam na red, rad i disciplinu.:) Kao buduci pedagog rarat cu u velikim grupama i neophodne su mi vjestine za timski rad i liderstvo. To je vec drugi razlog zbog kojeg me trebate primiti. Treci bi bile moje vrline: strpljenje, upornost, visoka motivacija.', 0, 'Web stranica', 'Bogato. Radila sam kao promoterka za nekoliko agencija u Sarajevu, kao trenerica Zumba fitnessa, asistentica u nastavi za djecu da posebnim potrebama, davala instrukcije za osnovnu i srednju skolu iz vise predmeta, prikupljala i analizirala podatke GIZovog projekta...', 0, 'Projekat Vijeca mladih Opcine Stari grad, Zona aktivizma i Obuka Uci Misli i Djeluj podržana od strane Instituta za razvoj mladih Kult', 'Veoma često: rješavanje konflikta mirnim putem, iskustva življenja studenta u domovima, pisanje projektnog prijedloga, asertivna komunikacija i mnoge dr.', 'Jedino kao aktivna volonterka, nikada na nekoj drugoj poziciji.', 'Moje srce bi bilo ispunjeno kada bi me primili na akademiju :)', NULL, '2018-01-16 14:25:45', '2018-01-16 14:25:45'),
(7, 'Alma', 'Halilović', '1997-08-14', '0603142094', 'halilovicalma31@gmail.com', 'S', 2, 4, 'Kroz svoje formalno obrazovanje stičem mnogo znanja, međutim, najvažnija stvar je znati primijeniti isto u praksi. Neformalno obrazovanje je, po meni jednako važno kao i formalno. Kroz svoje dosadašnje obrazovanje, prošla sam kroz mnoge radionice, treninge, akademije i seminare i iz istih sam uvidjela koliko ustvari ne znam. Svaka od njih je podjedinačno djelovala na mene. Naučila sam mnogo korisnih stvari koje mi već sada služe, a koje će najviše doći do izražaja na mom radnom mjestu. Soft Skills Academy je događaj kojem sam oduvijek htjela da prisustvujem. Čula sam mnogo pozitivnih komentara za istu, te bih zbog toga htjela biti dio tima koji će učestvovati na ovogodišnjoj akademiji. Bila bi mi velika čast i zadovoljstvo učestovati, te tako steći nova znanja i vještine i upotpuniti svoj životopis. Nadam se da ću biti dio ovog tima, provesti svoje vrijeme u pozitivnom okruženju, upoznati nove ljude i naučiti nove stvari. Unaprijed Vam se zahvaljujem i nadam se našem druženju :) S poštovanjem, Halilović Alma', 0, 'Društvene mreže', NULL, 0, 'Studentska poslovna akademija - SPA 18. do 20.07.2017\r\nAkademija za prevenciju maloljetničkog prijestupništva - PROACTA\r\nPravna klinika iz medicinskog prava - ELSA', 'Seminar \"Studentska poslovna akademija SPA\" 06.06.2017,\r\n\"Gender and Justice in Bosnia and Herzegovina\"- DCAF', 'Ne, ali sam članica ELSA-e.', 'Dodatne napomene nemam :)', NULL, '2018-01-16 14:56:12', '2018-01-16 14:56:12'),
(8, 'Paulina', 'Ribić', '1994-06-08', '063710377', 'paulina.ribic@hotmail.com', 'L', 3, 4, 'S obzirom da već par godina sudjelujem na sličnim projektima i radionicama, prisustvovanje ovom projektu za mene bi bilo veliko zadovoljstvo i iskustvo.Priželjkuje sticanje novih iskustava, upoznavanje novih mladih i motiviranih osoba te učenje kroz zanimljivo druženje.Također, nadam se da ću naučiti mnogo toga kako bih bila pripremljena za tržište rada.', 0, 'Društvene mreže', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-16 16:28:31', '2018-01-16 16:28:31'),
(9, 'Senija', 'Kalčo Skopljak', '1991-11-12', '062/043-154', 's.kalcho@hotmail.com', 'M', 5, 5, 'Poštovani/e,\r\n\r\nVeoma mi je zadovoljstvo poslati prijavu za ovogodišnje učešće na Soft Skills Academy Sarajevo 2018, u nadi da ćete me prepoznati kao dobrog kandidata. Izuzetno sam zainteresovana da budem dio ove radionice koju sam prepoznala kao jedinstvenu i savršenu priliku da poboljšam i unaprijedim svoje dosadašnje vještine, ali otkrijem i  naučim nove. \r\nMotiviše me želja kako sa profesionalnim, tako i ličnim usavršavanjem koje će mi biti od značaja za buduću karijeru. Smatram da je neformalno obrazovanje i cjeloživotno učenje neizostavan segment uspješnog i zrelog građenja ličnosti, ali i način da budemo atraktivniji na tržištu rada. Osim toga, upoznavanje mladih i ambicioznih  ljudi, razmjena informacija i iskustava, novih i svježih ideja su  motivi više za prijavu. \r\nUnaprijed se radujem da ću imati priliku i mogućnost biti dio ove pozitivne priče i energije, uz ugodno druženje, na obostrano zadovoljstvo.\r\n\r\nLijep pozdrav,\r\nSenija Kalčo Skopljak', 0, 'Društvene mreže', 'Bez radnog iskustva', 0, 'Po prvi put se prijavljujem na trening kojem su u fokusu soft skills.', 'Tokom formalnog i neformalnog obrazovanja uzela sam aktivno učešće na brojnim seminarima i edukacijama koji su bili usko povezani sa pravnom strukom i oblašću ljudskih prava,  a neki od  njih su: Gender i korupcija, Nasilje nad ženama, Diskriminacija u oblasti stanovanja, Osnovna ljudska prava i sloboda izražavanja, Ljudska prava u teoriji i praksi, Uloga transparenosti i odgovornosti u savremenoj politici, Funkcionisanje i rad institucija zakonodavne i sudske vlasti na razini BiH, Office menagement- Osnove kancelarijskog poslovanja, te ostali.', 'Član Evropskog udruženje studenata prava i Udruženje studenata Pravnog fakulteta u Sarajevu', NULL, NULL, '2018-01-16 18:37:46', '2018-01-16 18:37:46'),
(10, 'Naida', 'Karić', '1997-10-22', '062759542', 'naidaorif@hotmail.com', 'S', 4, 4, 'Poštovanje,\r\nsasvim slučajno naiđoh na ovu prijavnicu. Kada sam pročitala sve prednosti ove radionice, odmah sam poželjela da se prijavim. Naime, kao student žurnalistike veoma sam zainteresovana za radionice koje nudite. Iako se smatram komunikativnom, odgovornom i elokventnom osobom, ne smatram da je usvajanje novih znanja i vještina višak, naprotiv, voljela bih da kroz ovu radionicu popravim svoje nedostatke i obogatim svoje dosadašnje znanje. Nadam se Vašem pozivu. :)', 0, 'Društvene mreže', '- Menadžer prodaje u Oriflame kompaniji, otprilike 4 godine\r\n- Promocija proizvoda u tržnim centrima', 0, 'Ne', 'U okviru Oriflame kompanije, da.', 'Ne.', NULL, NULL, '2018-01-16 19:04:05', '2018-01-16 19:04:05'),
(11, 'Merima', 'Hadzic', '1999-01-23', '066871709', 'Merimahadzic07@gmail.com', 'S', 4, 4, 'Volontiram u nevladinoj organizaciji \"Vrt plavih ruza\", tokom volontiranja naucila sam da radim razne poslove i dozivljela razna iskustva. Tokom volontiranja posjecivali smo staracke domove, specijalne bolnice i obilazili i finansijski pomagali ugrozenim porodicama u Bosni i Hercegovini i Hrvatskoj.\r\n\r\nTakođer sam tokom skolovanja posjecivala razne sajmove, a na istim smo prodavali proizvode koje smo mi pravili.', 0, 'Preporuka prijatelja', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-16 22:05:34', '2018-01-16 22:05:34'),
(12, 'Amina', 'Žilić', '1994-10-13', '062/546-746', 'amina.zilic@hotmail.com', 'L', 4, 4, 'Poštovani,\r\n\r\nObraćam Vam se ovim putem da kao odgovorna, ambiciozna i prije svega osoba željna znanja i svjesna svojih kvaliteta budem jedan od izabranih kandidata za Vašu radionicu kroz koju ću steći nova znanja i usavršiti do sada stečena.\r\n\r\nSvjesna sam koliki značaj imaju soft skills treninzi meni kao vrijednoj, poštenoj osobi te osobi koja zna cijeniti pruženu priliku, te se nadam da ispunjavam Vaša očekivanja za visokim nivoom lične posvećenosti.\r\n\r\nTrenutno studiram i nemam priliku da se usavršavam u ovim poljima, to nije nešto što ću naučiti na fakultetu te smatram da je ovo idealna prilika za nekog poput mene da na Soft Skills Academy nauči nešto novo i jako bitno za dalju profesionalnu karijeru. \r\n\r\nBit će mi zadovoljstvo ukoliko mi pružite priliku da budem dio Soft Skills Academy, da zajedno napravimo nešto više i nešto bolje za naše društvo jer naravno, treba početi od pojedinaca, a ja ću se potruditi da maksimalno opravdam ukazano povjerenje.\r\n\r\nS poštovanjem,\r\nAmina Žilić', 0, 'Mediji', '-	Volontiranje ( Sarajevo Unlimited 2016)\r\n-	Promocije, podjela letaka', 0, NULL, NULL, 'Posmatrač na izborima (Munja inkubator društvenih inovacija)', 'Član EESTEC LC Sarajevo.', NULL, '2018-01-17 10:12:25', '2018-01-17 10:12:25'),
(13, 'Haris', 'Halitović', '1995-10-22', '0603067078', 'Hari.h@live.de', 'M', 2, 4, 'Poštovani,\r\nČitajući šta soft skill nudi, koje kompetencije, kakvo razvijanje vještina koje su krucijalne u trenutnom dobu neoliberalizma za zaposlenje, te samim tim preventivno djelovati na fenomen odljeva mozgova, pozelio sam se prijaviti i proći kroz radionice. Sklon sam pred formalnog, neformalnom obrazovanju , te mobilizaciji omladine u svrhu razvijanja i širenja kompetencija. Takodje, stečena znanja bih mogao iskoristiti kroz timski rad koji je fundament moje struke, prezentacijske vjestine kroz predstavljanje projekata kroz Asocijaciju studenata Fakulteta političkih nauka koje sam potpredsjednik, te i nakon završetka fakulteta u procesu traženja, odnosno adekvatnog obavljanja zadataka na svom radnom mjestu. \r\nU iščekivanju rezultata, srdačan pozdrav! \r\nHaris Halitović', 0, 'Web stranica', 'Volontiranje: Obavljena praksa u Službi socijalne zaštite Novo Sarajevo.\r\nObavljena praksa u SOS Dječijem selu Sarajevo.', 0, NULL, 'Aktivno učešće na Akademiji za prevenciju maloljetičke delinkvencije. \r\nVodjenje seminara na temu prevencije maloljetnicke delinvencije. \r\nKoordiniranje projektima za obelezavanje 16 dana aktivizma za borbu protiv nasilja nad zenama. \r\nPredstavljanje Evropske unije u lokalnoj zajednici preko njenih fondova.\r\nTribina za prava manjina.\r\nPredstavnik FPNa na 5.Regionalnom kongresu studenata socijalnog rada u Skoplju.', 'Član nadzornog odbora Asocijacije studenata Fakulteta političkih nauka. 2016-2017\r\nPotpredsjednik Asocijacije studenata Fakulteta političkih nauka.\r\nČlan Asocijacije socijalnih radnika KS.', NULL, NULL, '2018-01-17 10:21:52', '2018-01-17 10:21:52'),
(14, 'Iman', 'Fatic', '1997-11-24', '0603323128', 'faticiman@gmail.com', 'XL', 3, 5, 'Zelim se pridruziti vasem seminaru u cilju unaprjedjenja vlastitih govornih i drustvenih sposobnosti i vjestina. Hvala Vam na ovoj mogucnosti!', 0, 'Mediji', 'Rad u vrticu \"Kuca radosti\"', 0, NULL, NULL, NULL, NULL, NULL, '2018-01-17 10:51:21', '2018-01-17 10:51:21'),
(15, 'Irma', 'Sarać-Hukanović', '1992-06-03', '061328825', 'irmasarac1992@gmail.com', 'M', 2, 4, 'Već par mjeseci sam volonterka pri Institutu za društvena istraživanja na Fakultetu političkih nauka u Sarajevu. Radimo na raznim projektima a na jednom od projekata sam Team liderica. Imam nešto malo iskustva u vođenju projekta i rada kao liderica ali je to jako malo i nedovoljno. Radovalo bi me učešće na radionici koju organizuje Soft skills academy jer vjerujem da će mi te radionice pomoći pri stjecanju znanja, vještina kao što su  rad u timu, prezentacijske i komunikacijske vještine, vremensko planiranje, upravljanje projektima, rješavanje konflikata i liderstvo isto tako će mi pomoći pri stjecanju kontakata. Kao vandredna studentica nemam priliku da odradim prezentacije te zbog toga imam strah od govora pred masom i javnim nastupom.\r\nOtvorena sam osoba koja voli da uči, radi na poboljšanju svojih sposobnosti i vještina jer mislim da ne potoji savšenstvo rada ali postoji konstanto usavršavanje rada. \r\nSvaki zadatak koji dobijem želim da odradim sto je moguće bolje, zbog toga voljela bih biti učesnica na radionici te svoje stečeno znaje primijeniti u budučnosti i napredovati.', 0, 'Mediji', 'Prije nego sam počela studirati, radila sam u Call centru, prvo kao referentica prodaje a kasnije kao nadređena za prodaju.\r\nNedugo nakon što sam počela studirati počela sam i sa volontriranjem i radom na projektima.', 0, 'Nisam prije učestvovala na soft skills treninzima.', 'Bila sam učesnica na par seminara kao što su na primjer: \"YOuth against violent radicalization\",\r\n\"Politike izgradnje mira\"  ...', 'Kratko vrijeme sam volontirala za FOndaciju cure i Incijativu mladih za ljudska prava BiH.', 'Vegeterijanka sam.', NULL, '2018-01-17 15:09:13', '2018-01-17 15:09:13'),
(16, 'Emina', 'Šljivo', '1995-09-10', '061029354', 'sljivoemina55@gmail.com', 'L', 4, 4, 'Studentica sam Fakulteta političkih nauka u Sarajevu odsjek komunikologija treća godina.Do sad nisam nigdje radila ali imam želju da počnem raditi ili volontirati. Smatram sebe odgovornom i marljivom osobom, koja je spremna da uči i nauči nešto novo. A Vaša radionica me zainteresovala i jako bih voljela biti dio ove radionice kao i Vašeg tima. 😊', 0, 'Društvene mreže', 'Praksa u sklopu srednje škole na pozicijama : recepcioner u hotelu Garden city i turistički vodič u turističkoj agenciji -ZOOR Bosna.', 0, 'Do sad nisam učestovala na Vašim treninzima zato se i prijavljujem,jer želim da budem dio tima. 😊', NULL, NULL, NULL, NULL, '2018-01-17 21:44:05', '2018-01-17 21:44:05'),
(17, 'Merima', 'Telarević', '1992-11-23', '061539593', 'telarevic_merima@hotmail.com', 'L', 2, 3, 'Poštovani,\r\nMoje ime je Merima Telarević, studentica sam Fakulteta političkih nauka Univerziteta u Sarajevu, odsjek Komunikologija. U nastavku ovog motivacionog pisma ću opisati ću ono što smatram bitnim. \r\nDo sad nisam nigdje radila, ali imam želju da počnem raditi ili volontirati. Bila sam na nekoliko predavanja koja su bila u sklopu fakulteta, kao i na SPA Akademiji koju je organizovala Sparkasse banka, Munja Inkubator i Hocu.ba, također bila sam na radionici Coca Colina podrška mladim, i na Akademiji za prevenciju maloljetničkog prijestupništva u sklopu koje smo imali praksu i orgazovanje naše radionice u kojoj su nam pomogli organizatori same Akademije tj ProActa, Munja Inkubator i Hocu.ba. \r\nSmatram sebe odgovornom i marljivom osobom koja je spremna da uči i da nauči nešto novo. A Vaša radionica me zaniteresovala i jako bih voljela biti dio ove radionice kao Vašeg tima. \r\n\r\nHvala Vam na odvojenom vremenu i srdačan pozdrav.\r\nMerima Telarević', 0, 'Društvene mreže', 'Nemam', 0, 'Do sad nisam učestvovala na Vašim treninzima, pa se zato i prijavljujem, jer bih željela biti dio Vašeg tima, a i da steknem novo znanje i prijateljstvo.', 'SPA Akademija, Coca Colina podrška mladim, Akademija za prevenciju maloljetničkog prijestupništva.', '/', '/', NULL, '2018-01-17 21:44:09', '2018-01-17 21:44:09'),
(18, 'Alen', 'Garibović', '1995-03-11', '061-546-700', 'a.garibovic95@gmail.com', 'L', 5, 5, 'Poštovani,\r\n\r\nOvim pismom izražavam želju da prisustvujem Soft Skills Academy trodnevnoj radionici u Sarajevu, u periodu od 9. do 11. marta 2018 godine. Sa iskustvom volontiranja, obavljanja raznih praksi, prisustvovanjem mnogobrojnim radionicama, smatram da sam pogodan kandidat za navedeni događaj. \r\n\r\nPored formalnog obrazovanja koje se tiče kombinacije kompjuterskih nauka, informacionih sistema i raznih oblasti iz menadžmenta, veoma bih cijenio kada bih dobio priliku da prisustvujem ovoj radionici s ciljem sticanja profesionalnog iskustva iz stvarnog svijeta.\r\n\r\nS obzirom da je u današnjem društvu sve više kadra bez relevantnog iskustva, prisustvo na Soft Skills Academy radionici bi mi omogućilo sticanje mnogobrojnih korisnih vještina, stvaranje dugoročnih poznanstava, ali i konkurentnost na tržištu rada. Pored toga, smatram da će to pozitivno utjecati na moju motivaciju, samopouzdanje, kao i dati mi potrebno ohrabrenje da ostvarim svoje životne ciljeve.  \r\n\r\nZahvaljujem se za razmatranje moje prijave,\r\n\r\nAlen Garibović', 0, 'Web stranica', '- ICMP Sarajevo praksa - rad sa bazom podataka kompanije u MS Access-u , održavanje i popravljanje hardverske opreme u firmi.\r\n- Volontiranja, radionice, seminari', 0, 'N/A', 'Sarajevo Business Forum', 'Volontiranje u raznim nevladinim organizacijama koje se bave pružanjem pomoći onima kojima je to najpotrebnije.', NULL, NULL, '2018-01-17 21:45:58', '2018-01-17 21:45:58'),
(19, 'Suljo', 'Keranović', '1996-06-06', '+387/62-448-150', 'keranovicsuljo@gmail.com', 'S', 3, 3, 'Ja sam Suljo Keranović, imam 21 godinu, student sam treće godine Fakulteta političkih nauka u Sarajevu, gdje studiram na odsjeku za Socijalni rad. Rođen sam u Cazinu kao osoba sa invaliditetom, gdje sam završio Gimnaziju. Bavim se raznim sportovima, a slobodno vrijeme koristim za edukovanje putem seminara, konferenvija, radionica... i za volonterski rad. Nakon više godina volonterskog angažmana uvidio sam da još uvijek nisam otkrio sve svoje personalne vještine, ali i da nisam upoznat sa svim profesionalnim vještinama.\r\n 	Razmišljajući kako da pomognem vlastitoj personi u otkrivanju vještina i sposobnosti koje posjedujem, shvatio sam da ću najlakše sebe upoznati uz pomoć stručne osobe. No dešava se problem u sistemu obrazovanja koje mi isto ne nudi, i stvara se pitanje kako i gdje pronaći tu stručnu pomoć.\r\n 	Nakon dužeg perioda, svakodnevnog surfanja po internetu i traženja kako to na najekonomičniji način upoznati vlastitu ličnost, nailazim na Vaš konkurs za radionicu koja mi, zahvaljući Vama i Vašem „da“ na moju aplikaciju na isti, može pomoći kako to da otkrijem svoj svijet pun, meni, tajanstvenih personalnih vještina.\r\n 	Uz dužno poštovanje, nadam se da će moja želja za otkrivanjem ličnih vještina, želja za edukacijom, usavršavanjem vlastitih sposobnosti, i društvenim položajem mene kao osobe sa invaliditetom kod Vas preovladavati, i da ćete mi omogućiti put ka boljem znanju i lakšim i jednostavnijim načinom upoznavanjem vlastite ličnosti i njenih vještina.', 0, 'Ništa od navedenog', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-18 11:55:31', '2018-01-18 11:55:31'),
(20, 'Amina', 'Beriša', '1992-07-05', '063753660', 'lioxiccyph@protonmail.com', 'L', 5, 5, 'Moja motivacija za pohađanje ove akademije se bazira na želji za ličnim razvojem \"mekih\" vještina u kontekstu elokvencije kolaboracije sa različitim akterima kako u poslovnom, tako i privatnom životu. Ako elaboriramo trenutni segment visokog obrazovanja u Bosni i Hercegovini, on veoma rijetko podrazumjeva razvoj neophodnih \"mekih\" vještina za radno okruženje, kao što su dobre govorničke vještine, javni nastupi, te preformansi prezentacija u toku prezentacije projekata ili drugih validnih stvari za radno okruženje. U sigurnosnim i mirovnim studijama, meka moć ili meke vještine obuhvataju poseban set pristupa širem dijapazonu stakeholdera koji često posmatraju sigurnost kao komponentu tvrde moći. U novom dobu digitalizacije i svih drugih tokova neformalnog obrazovanja, obrazovanje iz polja mekih vještina podrazumjeva kvalitetno ulaganje u sebe i svoju okolinu radi postizanja što boljih rezultata, kreiranja dobrih praksi, te obezbijeđivanja kontinuiteta informalne edukacije koji se dalje mogu koristiti u promoviranju dobrih resursa i kapaciteta naših kolega/ica, suradnika/ca, te u konačnici cijelog menadžmenta. Nadam se da ću uspjeti da dobijem participaciju za ovu edukaciju. \r\n\r\n\r\nSve najbolje, \r\n\r\nAmina Beriša', 0, 'Ništa od navedenog', NULL, 0, NULL, NULL, NULL, 'Trenutno volontiram pri Institutu za društvena istraživanja Fakulteta političkih nauka u oblasti Informacijske sigurnosti, te skoro deset godina sam u informacijsko-komunikacijskom sektoru kao entuzijastkinja. U oblasti razvoja same digitalizacije, te informacijsko-komunikacijskih sektora i tehnologije, nekada je teško približiti opus ponude i potražnje, te kvaliteta,važnosti i potencijala koji ovaj sektor ima netehnološkom sektoru. Za mene, ova edukacija bi imala višestruki benefit: \r\na) Prezentiranje projekata iz oblasti IT menadžmenta prilagođenog široj publici;\r\nb) Prenošenje informalnog znanja na volontere/ke Instituta za drutšvena istraživanja kroz interna predavanja u sklopu grupe za Informacijsku sigurnost;\r\nc) Jačanje resursa u oblasti javnog govorenja i projektiranja, te mapiranja relevantnih stakeholdera i subjekata unutar poslovnog okruženja, te akademske zajednice.', NULL, '2018-01-18 12:16:08', '2018-01-18 12:16:08'),
(21, 'Ema', 'Dervović', '1991-10-21', '061/851-005', 'emadervich@hotmail.com', 'XXL', 3, 4, 'Aplicirala sam i prošle godine, međutim uslijed velikog interesovanja aplikanata nisam imala priliku paticipirati u akademiji. Kao budući pravnik smatram da je ovaj set vještina neophodan za moju profesiju, da upravo on pravi razliku između prosječnog i izvrsnog.', 0, 'Društvene mreže', 'nemam', 0, 'ne', '-	2009. Beograd, Srbija: „Ekonomijada“ – regionalni seminar iz oblasti ekonomije za mlade \r\n-	2010. Sutomore, Crna Gora: Biznis seminar za mlade, sa fokusom na: „Marketing i prodaju“\r\n-	2016. Diploma u islamskim naukama (Fakultet islamskih nauka u Sarajevu)\r\n-	2016. Biznis akademija ( u organizaciji Centra za razvoj socijalnog poduzetništva i općine Novo Sarajevo )\r\n-	2016. Ciklus prvi seminara iz oblasti psihologije „Put ka vlastitoj promjeni“  ( u organizaciji Centra za edukaciju i istraživanje Nahla ) \r\n-	2017. Edukacija za dopisnike - novinare ( AKOS)\r\n-	2017. Ciklus drugi seminara iz oblasti psihologije „Put ka vlastitoj promjeni“ (u organizaciji Centra za edukaciju i istraživanje Nahla)\r\n-	2017. Ciklus treći „Asertivnost“ \r\n- 2017. Edukacija iz oblasti prava na slobodu vjere i uvjerenja (Nahla)\r\n- 2017. Public speech academy (CRSP i općina Novo Sarajevo)', 'Nahla', '-', NULL, '2018-01-18 15:04:50', '2018-01-18 15:04:50'),
(22, 'Milan', 'Kešeljević', '1988-02-01', '+387603390029', 'milan.keseljevic@gmail.com', 'L', 4, 3, 'Smartam za sebe da već posjedujem dobar niz ličnih i profesionalnih vještina. \r\n\r\nI naravno, želim se i dalje izgrađivati i sticate nove vještine (unapređivati i povezivati stare/sa starim, već stečenim vještinama). \r\n\r\nTim povodom se interesujem i imam želju za učestvovanjem na vašim radionicama.\r\n\r\nČini mi se interesantim, i da bi bilo korisno za mene, a moguće i za vas.\r\n\r\nLP\r\n\r\nMilan Kešeljević', 0, 'Promocija na fakultetu', 'Da. Pripravnik na Općinskom sudu u Sarajevu, tokom 2016. (Jedino što mi je upisano u staž)\r\n\r\nPlus još mnogo toga: kafane, hosteli, građevina, prodaja... \r\n\r\npopis stanovništva, praksa u Centru za Socijalni rad, glumio u jednom filmu (glavna uloga), izbori, radionice...', 0, 'Ne', 'Da', 'nisam član NVO-a, neko iskustvo, što se trenutno mogu sjetiti, jeste da sam radio na proteklim Lokalnim Izborima, za mrežu NVO \"Pod Lupom\", kao posmatrač', 'Ništa mi ne pada na pamet trenutno, što bi bilo bitno za napomenuti. Uzdravlje', NULL, '2018-01-18 19:12:13', '2018-01-18 19:12:13'),
(23, 'Lejla', 'Dedic', '1994-04-29', '062095375', 'lejladedic@yahoo.com', 'XL', 4, 5, 'Poštovanje, ja sam studentica treće godine Elektrotehničkog fakulteta u Sarajevu, odsjek elektroenergetika.Vaša radionica će mi mnogo pomoći u širenju svog znanja i mom nastavku ka daljem studiranju. Ako bi mi pružili priliku da učestvujem u Vašoj radionici, sigurna sam da bi ispunila Vaša očekivanja. Unaprijed zahvalna.', 0, 'Promocija na fakultetu', 'Firma Datalab doo Sarajevo- studentski poslovi, rad u call centru, rad na projektima širenja računovodstvenog programa Pantheon.', 0, NULL, NULL, NULL, NULL, NULL, '2018-01-18 20:55:09', '2018-01-18 20:55:09'),
(24, 'SARA', 'MALEŠIĆ', '1995-09-05', '062/283-246', 'sara.malesic95@gmail.com', 'XL', 5, 5, 'Dear Selection Committee,\r\n\r\nI am writing to apply for the Soft Skills Academy Sarajevo, 2018. My name is Sara Malešić and I am a 4th year student of International Finance and Banking at the American University in Bosnia and Herzegovina. I am a multi-skilled, reliable and hard-working student with a strong command of English language. I am a quick learner who can absorb new ideas and communicate clearly and efficiently with people from all social and professional backgrounds. \r\n\r\nGrowing up among intelligent people had great influence on my professional development since from the early childhood I have learnt the importance of education. This made me think about my future, building a career, becoming a successful person and creating my own path in life. I recognized the significance and influence that this event has on individuals ‘professional development which had sparked my desire to become even more actively involved in the program, since I believe that with my knowledge and abilities I could make a significant contribution to your team. \r\n\r\nSome of these abilities include, but are not limited to: strong communication and social skills, excellent writing abilities, time management and multitasking, and the ability to work under pressure. Having the flexibility to adapt to challenges when they arise while simultaneously remaining aware of professional roles and boundaries, I believe that I am an outstanding candidate for the position in such a successful and well-known event. Given my past history of commitment to excellence, I am confident that I will bring a high level of energy and enthusiasm to your program.\r\n\r\nI thank you in advance for your time and consideration and I hope to hear from you soon, \r\n\r\nSincerely, \r\n\r\nSara Malešić', 0, 'Društvene mreže', 'PRAKSA:\r\n\r\n1) Balkanvibe d.o.o. Sarajevo, B&H na poziciji Communication Manager od oktobra 2017\r\n2) Raiffeisen Bank BH, Sarajevo  -- Oktobar 2016 – Januar 2017\r\n3) Vanjski saradnik za Medichem d.o.o., Sarajevo zadužena za prijevod dokumenata s engleskog na bosanski jezik i obratno. \r\n\r\nVOLONTIRANJE:\r\n- Sarajevo Film Festival\r\n- 72 sata bez kompromisa', 0, NULL, '- Sarajevo Unlimited \r\n- CEO Academy\r\n- Active Citizens organized by British Council', NULL, 'Technical Skills: Proficient in MS Word, PowerPoint, Excel, Photo and video editing programs and social media platforms, Basic knowledge in WordPress\r\n\r\nInterests: playing piano, playing volleyball and basketball, reading, solving puzzles and playing chess.', NULL, '2018-01-19 13:07:45', '2018-01-19 13:07:45'),
(25, 'Amina', 'Arnaut', '1997-07-20', '062055646', 'aminaarnaut725@outlook.com', 'M', 3, 4, 'Želim svijetlu budućnost, ostvarenu karijeru, de facto pokazati i razbiti stereotip da zena sa hidzabom moze biti lider u raznim segmentima zivota.', 0, 'Preporuka prijatelja', 'Ne', 0, 'Ne', 'Ne', 'Ne', NULL, NULL, '2018-01-19 14:02:33', '2018-01-19 14:02:33'),
(26, 'Selma', 'Duraković', '1992-11-19', '+38762287288', 'selma.durakovic@outlook.com', 'S', 5, 5, 'Poštovani,\r\n\r\n  Moje ime je Selma Duraković i student sam četvrte godine Fakulteta za upravu. Ono što me motivisalo da se prijavim za radionicu je nedostatak posla,informacija,praksi itd. u Bosni i Hercegovini. Najveći problem je upravo nedostatak znanja, vještina i informacija. Voljela bih da usavršim svoje vještine i znanja te da kroz vaše radionice poboljšam svoje šanse za pronalazak adekvatnog posla. Već sam učestvovala na radionicama Crvenog Križa RCA-PHV i bila u top 10 izabranih instruktora na području Bosne i Hercegovine i voljela bih da imam opet priliku raditi nešto korisno za sebe i zajednicu sa timom ljudi koji su tu da motivišu jedni druge :)\r\n\r\nUnaprijed hvala', 0, 'Mediji', 'Profesor engleskog  Barbados d.o.o\r\nOperater i administrator Sportplus d.o.o\r\nOdgajatelj i asistent-privatno\r\nLjetni poslovi i privremeni angažmani', 1, '/', 'RCA-PHV', 'Crveni Krst/Križ', NULL, NULL, '2018-01-19 18:08:43', '2018-01-19 18:08:43'),
(27, 'Himzo', 'Hasak', '1997-03-07', '+387644254850', 'himzo@hasak.ba', 'L', 4, 5, 'Vidio sam objavu na reklami i jako mi se svidjela. Zasto ne probati jer djeluje super.', 0, 'Društvene mreže', 'null', 0, 'null', 'ASuBiH seminari (Stand Up, Move On)', 'ASuBiH (dok sam bio srednjoskolac)', NULL, NULL, '2018-01-19 19:50:26', '2018-01-19 19:50:26'),
(28, 'Iman', 'Bekkaye', '1997-10-12', '062540916', 'Imanbekkaye@hotmail.com', 'L', 4, 5, 'Zaista želim učestvovati u radionici.', 0, 'Preporuka prijatelja', 'Nemam.', 0, 'Nikad.', 'Raznim.', 'Slabo.', NULL, NULL, '2018-01-19 23:07:49', '2018-01-19 23:07:49'),
(29, 'Dino', 'Beširević', '1995-10-17', '062266410', 'dino.besirevic.bih@gmail.com', 'M', 4, 5, 'Želja za uspjehom marginalizuje se sa ludošću. Svojim odrastanjem prihvatio sam ovu tezu. Ako želiš da budeš najbolji u nečemu, graniči sa zdravim razumom. Dok jos rastem i dok mozak ne staje u bilo kojem času, volio bih da se pripremim, poduprem sa stručnim savjetima ljudi koji su napravili razliku u svijetu. Kako na polju privatnog razvoja, tako i na polju dobrobiti zajednice. Soft Skills academy mi nudi baš to. Profesionalni usmjerivač mojih aspiracija u cilju promjene sopstvene ličnosti.', 0, 'Društvene mreže', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-20 02:58:13', '2018-01-20 02:58:13'),
(30, 'Amina', 'Filan', '1997-01-08', '+38762665204', 'aminafilan97@gmail.com', 'L', 3, 3, 'Moje ime je Amina Filan i studitam Turski jezik i književnost. Dio mog obrazovanja i upotpunjavanja kao budućeg profesora te osobe koja se priprema za rad sa ljudima iz svih branši, te vlastite adaptacije na razne situacije i izazove koji se stavljaju pred mene, obuhvata  dobru organizaciju i vještine. O vašoj akademiji sam slušala od mnogih mojih prijatelja koji su je pohađali i rekli mi samo riječi hvale. Iz njihovog iskustva sam shvatila da upravo  kvalitete neophodne u mom daljem radu i obrazovanju mogu steći sa vama, i da je to jedinstvena prilika da u cjelini naučim sve što mi treba. Organizacija vremena, rješavanje raznih konfliktnih situacija te rad sa ograničenim resursima i različitim profilima ljudi su samo neke od stvari koje su potrebne svim mladim visokoobrazovanim ljudima koji su motivisani i spremni na rad, i upravo sa vama bih imala priliku da se usavršim u tim poljima. Kao osoba koja se suočava sa izazovima svaki dan, što zbog posla koji me čeka, tako i zbog mog hidžaba, ljudi imaju mnogo predrasuda i moj stav je najbitnija tačka pri susretu i rušenju predrasuda kojih ne nedostaje u našem društvu. Smatram da samo veoma obrazovana, osviještena i motivisana mlada osoba može da mijenja društvo, počevši od sebe, a vi svojom akademijom dajete upravo takvu priliku, koju ne želim da propustim.', 0, 'Preporuka prijatelja', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-22 06:09:43', '2018-01-22 06:09:43'),
(31, 'Amina', 'Krdžalić', '1996-06-23', '062544499', 'amina.krdzi@gmail.com', 'M', 5, 5, 'Kroz dosadašnji trud uložen u profesionalnom i ličnom razvoju sebe, učestvovala sam na različitim radionicama i seminarima, te volontirala i bila u organizaciji tokom srednje škole i fakulteta na velikim događajima i aktivnostima, ali nikako do sada nisam pohađala neku obuku ili trenining vezan za mehke vještine. \r\nObzirom da u fomalnom obrazovanju ne postoji neki predmet koji se bavi konkretno razvojem mehkim vještina, željela sam proći kroz neki neformalni vid obuke gdje bih imala priliku da detaljnije razradim svoje vještine i da pronađem praznine kojih do sada nisam bila svjesna te da radim na unaprjeđenju istih. \r\nTokom studija na Industrijskom inženjeringu koji je usko vezan i za menadžment, postala sam svjesna da su mehke vještine od velikog značaja u poslovnom svijetu i na radnom mjestu kako bih maksimalno uspjela iskazati svoje znanje i vještine iz određene oblasti i samim time uspjela u karijeri. \r\nTragala sam za kvalitetnom obukom iz ovo polja kako bih unaprijedila svoje prezentacijske, organizacione, komunikacijske, timske i druge mehke vještine, te sam na preporuku prethodnih polaznica Vaše akademije odlučila aplicirati za ovogodišnju.', 0, 'Preporuka prijatelja', 'Do sada nemam konkretog radnog iskustva osim što sam odrastala uz porodičnu kompaniju i raspuste provodila u njoj.', 0, 'Do sada nisam učestvovala u soft skills treninzima', '- četverodnevni seminar \"Pisanje biznis plana\" u Nahli\r\n- dvodnevna radionica \"Effeftive Communication in English\" u Centru za napredne studije\r\n- jednodnevna radionica \"Design Management\" u sklopu Sarajevo Unlimited Foruma', 'Trenutno sam članica kluba mladih \"Tignum\" pri Nahli (Centar za edukaciju i istraživanje)', 'Članica sam Studentskog parlamenta Internacionalnog univerziteta u Sarajevu za Industrijski inženjering.', NULL, '2018-01-22 19:19:57', '2018-01-22 19:19:57'),
(32, 'Neira', 'Turulja', '1996-05-09', '062967050', 'neira96@live.com', 'XL', 3, 4, 'Shodno velikoj želji i potrebi, pa i odgovornosti da kao mlada osoba ulažem u sebe i razvijam svoj potencijal, te tako i doprinesem svojoj zajednici me potakla da se prijavim. Brojni su pokazatelji da nam ne manjkaju diplome i ideje, već ono što daje adekvatnu i kvalitetnu sliku u cjelini i nas samih, a to je ono što Vi nudite. Javni govor, vještine u govorništvu, znati slušati, način riješavanja problema i mnoge druge su na neki način i pokazatelj naše emocionalne inteligencije, nerijetko predstavljaju presudni faktor da uspješno realizujemo sve čemu se posvetimo, pa tako i da budemo prvi odabir kod poslodavca, a ono što je najbitnije, mogu se naučiti. Kao neizostavan motiv je jačanje socijalnog kapitala, međusobno upoznavanje i razmjena iskustava. Radujem se iskoraku iz komfort zone, ohrabrenju i motivaciji.', 0, 'Preporuka prijatelja', NULL, 0, 'u sklopu programa u naprijed navedenim udruzenjima', 'seminari koje organizuje crsp, biznis akademije', 'Udruženje Svitanje, Akos, Klub mladih Tignum', NULL, NULL, '2018-01-23 14:08:21', '2018-01-23 14:08:21'),
(33, 'Sadžida', 'Kosovac', '1996-06-09', '062488718', 'sadzida.kosovac@gmail.com', 'XXL', 5, 5, 'Poštovani,\r\n\r\nprije par godina sam uočila Vaše post-ove o Soft Skills Academy. Još tad mi se javila velika želja da apliciram jer sam znala da je to ono što mi treba i što će mi svakako koristiti. Međutim, do sad nisam ni pokušala da se prijavim, što vjerovatno mogu pripisati strahu od bilo čega što bi me izvuklo iz zone komfora. Viđajući fotografije i slušajući iskustva osoba koje su prisustvovale vašim radionicama, ta želja se povećala, tako da je ove godine to presudilo da poduzmem prvi korak ka ličnom razvoju. Samim ovim činom probijam svoje granice što će mi pored toga donijeti i vještine koje svakako ne bih imala priliku steći na fakultetu. Trenutno sam na master programu studija i ubrzo ću se morati suočiti sa izazovima zaposlenja, pa i samog posla. Smatram da će mi Soft Skills Academy omogućiti da pristupim svim izazovima sa više samopouzdanja, znajući da sam ne samo kompetentna za željeni posao, već i da imam vještine koje će mi pomoći da kroz taj posao i napredujem.', 0, 'Društvene mreže', 'Praksa - Željezara \"Ilijaš\"', 0, 'Mastery tour 2018 - lični i profesionalni rast i razvoj, 2018.', 'Građanski aktivizam i voloniranje, 2013.\r\nCEA Academy, 2015.\r\nPisanje projekata po standardima EU, 2015.', 'Članica CEI NAHLA i Nahlinog kluba mladih \"Tignum\", 2017 - danas\r\nČlanica UG Svitanje i AKOS-a, 2015 - danas\r\nSummer Reception Coordinator IAESTE organizacije, 2016.\r\nVolonterka Fondacije Hastor, 2008 - danas', NULL, NULL, '2018-01-23 14:26:53', '2018-01-23 14:26:53'),
(34, 'Ilma', 'Cosic', '1997-08-12', '062748376', 'ilmacosic97@gmail.com', 'M', 5, 5, 'Kao sto rekoste, zelim biti korak ispred. Sve ovo sto ovaj mini trening nudi jeste ono sto meni treba. Stecene vjestine cu moci iskoristiti da gradim svoje sutrasnje \"ja\" i na taj nacin  pomoci nasoj domovini koja moze biti puno vise ukoliko joj mi, mladi ljudi koji hrle novim saznanjima, pruzimo priliku.\r\nP. S. Izvinjavam se zbog alfabeta bez afrikata, problem je tehnicke prirode.', 0, 'Društvene mreže', 'Ugostiteljstvo(dostava hrane), rad sa turistima.', 0, 'Nekoliko seminara o kompetencijama i kreativnom misljenju u nevladinim organizacijama.', NULL, 'CEI Nahla (Klub mladih Tignum) , SU Domino (radionice), EUS Sarajevo (kursevi).', NULL, NULL, '2018-01-23 17:25:45', '2018-01-23 17:25:45'),
(35, 'Ilma', 'Cosic', '1997-08-12', '062748376', 'ilmacosic97@gmail.com', 'M', 5, 5, 'Kao sto rekoste, zelim biti korak ispred. Sve ovo sto ovaj mini trening nudi jeste ono sto meni treba. Stecene vjestine cu moci iskoristiti da gradim svoje sutrasnje \"ja\" i na taj nacin  pomoci nasoj domovini koja moze biti puno vise ukoliko joj mi, mladi ljudi koji hrle novim saznanjima, pruzimo priliku.\r\nP. S. Izvinjavam se zbog alfabeta bez afrikata, problem je tehnicke prirode.', 0, 'Promocija na fakultetu', 'Ugostiteljstvo(dostava hrane), rad sa turistima.', 0, 'Nekoliko seminara o kompetencijama i kreativnom misljenju u nevladinim organizacijama.', NULL, 'CEI Nahla (Klub mladih Tignum) , SU Domino (radionice), EUS Sarajevo (kursevi).', NULL, NULL, '2018-01-23 17:27:51', '2018-01-23 17:27:51'),
(36, 'Kerima', 'Alihodzic', '1997-09-03', '061056242', 'kerimaal@outlook.com', 'L', 4, 4, 'Poštovanje, \r\nmoje ime je Kerima Alihodzic, imam 20 godina i druga sam godina Masinskog fakulteta u Sarajevu. Svjesna sam kako je nase obrazovanje u velikom minusu kad su u pitanju ovakvi programi, sto je veliku problem. Vecina studenata ne zna kako razviti neki plan, kako predstaviti svoje ideje i slicno, i to nam nikako ne ide u korist. Vjerujem da ovaj program nudi mnoge pogodnosti u smislu kako da naucimo predstaviti sebe u najbolje svjetlu, kako razviti ideju i povecati ambicije. Iskreno se nadam da ce mi ova prijava uspjeti, jer imam veliku zelju da sudjelujem.\r\nSrdacan pozdrav', 0, 'Promocija na fakultetu', 'Radila sam preko studentskog servisa Index kao ispomoc u Sunnyland-u i poneke promocije.', 0, NULL, NULL, NULL, NULL, NULL, '2018-01-23 22:15:02', '2018-01-23 22:15:02'),
(37, 'Emela', 'Devedžić', '1998-05-13', '061057547', 'emela.devedzic77@gmail.com', 'S', 4, 5, 'Lijep pozdrav, \r\n\r\ntrenutno studiram na Mašinskog fakultetu Sarajevo, a za Soft Skills Academy sam saznala preko promocija i info letaka, te sam odlučila da se prijavim na ovu radionicu. Obzirom na to da sljedeće godine završavam fakultet veoma sam zainteresovana za to da saznam kako da sebe predstavim u najboljem svjetlu budućem poslodavcu, te kako da imam uspješnu karijeru.  Uvijek sam željela da osim znanja koje steknem od cijenjenih profesora steknem i neka nova koja će mi pomoći da za sebe osiguram bolju budućnost. \r\n\r\nZahvaljujem Vam na vremenu i srdačno Vas pozdravljam,\r\nEmela Devedžić', 0, 'Promotivni leci i plakati', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-01-23 22:37:41', '2018-01-23 22:37:41'),
(38, 'Bakira', 'Razić', '1999-01-27', '0603039217', 'anime2706@hotmail.com', 'M', 5, 5, 'Život u multikulturalnoj sredini, kakva je upravo naša čitava država, nosi svoje prednosti, ali i mane. Kada govorim o manama, mislim na ograničenost pogleda pojedinaca prema našem društvu, koje sprječava mlade i ambiciozne osobe da učine korak naprijed i pobjede bilo kakav oblik predrasuda. Mislim da su to česti razlozi zašto mladi danas ne pridaju dovoljno značaja mladalačkom aktivizmu i svojevrsnom doprinosu prema obrazovanju, kako u formalnom, tako i u neformalnom obrazovanju. Upravo ovi problemi su moja lična motivacija za rad i napredovanje, pa zato nastojim iskoristiti sve pogodnosti i prilike koje nam ipak pruža naša sredina, te se nastojim uključiti u što raznovrsnije sfere shvatanja života, kako kroz samo obrazovanje, tako i kroz razne volonterske poduhvate, te učestvovanja  na seminarima i radionicama, kakva je i ova. Vjerujem da mladi danas zaista igraju važnu, ako ne i  vodeću ulogu kada se radi o prosperitetu naše zemlje, te svaki pojedinac iza sebe krije određeno  iskustvo i ideje koje su vrijedne spomena i realizacije. Smatram da sam i sama jedna takva mlada osoba koja može podijeliti zanimljiva iskustva i znanja, te ih proširiti i unaprijediti kroz ovu radionicu. Bila bih veoma sretna biti dio jednog ovakvog tima, koji ima viziju i pobjeđuje predrasude!', 0, 'Društvene mreže', NULL, 0, NULL, 'Učestvovala sam na više seminara organizovanih od strane AFS-a, te sam nedavno prisustvovala seminaru organizovanom od strane \"Youth for peace\" -a.', 'Kratak period sam bila član  NVO-a, \"CEM\" (Centar za edukaciju mladih, Travnik); te sam učestvovala na projektima Campus15, u Njemačkoj, te Erasmus+ u Poljskoj.', NULL, NULL, '2018-01-23 23:39:00', '2018-01-23 23:39:00'),
(39, 'Sulejman', 'Tutnjević', '1998-07-23', '0644004105', 'sulejman.tutnjevic@gmail.com', 'M', 5, 5, 'Poštovani,\r\n\r\nMoje ime je Sulejman Tutnjević, student sam prve godine Ekonomskog fakulteta u Sarajevu. Za ovu veoma korisnu edukaciju sam saznao preko prijatelja koji je prošle godine pohađao SSA - Bučan Tarika. Na osnovu njegovog iskustva sa prethodne edukacije sam odlučio da se prijavim na ovogodišnji SSA.\r\n\r\nU toku srednjoškolskog obrazovanja, kao i sada u toku višeg obrazovanja sam ulagao dosta slobodnog vremena na edukovanje sebe iz raznih oblasti koje bi mi mogle pomoći pri ostvarenju cilja da postanem menadžer u IT oblasti. Moj angažman je zapažen u mnogim organizacijama kao što su ASuBiH, SHL i Hoću.ba.\r\n\r\nSmatram da sam dobar potencijalni kandidat za Vašu edukaciju iz više razloga i to:\r\n\r\n- Komunikativan sam,\r\n- Voljan za rad i učenje,\r\n- Brzo učim\r\n- Posjedujem dosta odrađenih projekata i edukacija,\r\n- Volim se nalaziti u dinamičnom okruženju i ostvarivati kontakt sa što više ljudi.\r\n\r\nIskreno se nadam da i Vi vidite potencijal u meni kao kandidatu za SSA 2018 i da će me ovo motivaciono pismo učiniti dobrim potencijalnim kandidatom za Vašu edukaciju.', 0, 'Preporuka prijatelja', 'Interni Auditor na Ekonomskom fakultetu u Sarajevu', 0, NULL, '- Munja Business Challenge, \r\n- Forum omladinskih lidera,\r\n- Forum o domaćoj proizvodnji 2017,\r\n- SHL MoveOn 2017,\r\n- TEDxYouth@Ilidža.', '-Zamjenik koordinatora Lokalnog tima ASuBiH Fojnica,\r\n-Fundraising koordinator projekta \"Novi početkak za gradsku biblioteku\" podržan od strane SHL-a,\r\n-PR tim hoću.ba.', NULL, NULL, '2018-01-25 11:22:07', '2018-01-25 11:22:07');
INSERT INTO `participanti` (`id`, `ime`, `prezime`, `datum_rodjenja`, `broj_telefona`, `email`, `velicina_majice`, `engleski_govor`, `engleski_razumijevanje`, `motivaciono`, `ranije_ucesce_na_ssa`, `kako_ste_saznali`, `radno_iskustvo`, `trenutno_zaposlenje`, `ucesce_na_treninzima`, `ucesce_na_seminarima`, `nvo_iskustvo`, `dodatne_napomene`, `user_id`, `created_at`, `updated_at`) VALUES
(40, 'Emina', 'Aganović', '1998-02-02', '062 699 845', 'aganovicemina1@gmail.com', 'S', 4, 5, 'Kao aktivna članica tri organizacije u Bosni i Hercegovini imam priliku svakodnevno raditi sa mladima ali i učestvovati u događajima za mlade. Uravo kroz takve događaje sam svakodnevni svjedok koliko je neformalno obrazovanje zapravo bitno za mlade ljude i koliko ih zapravo izdvaja iz mase pojedinaca i čini konkurentnijim na tržištu rada.  Ova obuka mi se čini zanimljiva iz više razloga. Osnovni razlog je upravo koncept same obuke da iz mladih izvuće one skrivene talente i vještine koje posjeduju i da ih nauče da ih iskoriste na pravi način u stvarnom svijetu na tržištu rada koje svakim danom postaje sve konkurentnije. Pored toga, kao neko ko se još od srednje škole bavi omladinskim radom, smatram da su mi jako potrebna nova znanja i usavršavanje da bih bila što bolja u svom poslu i kako bih svoja nova znanja i vještine mogla da prenesem na druge mlade ljude i da učinim mali korak za omladinu naše države.\r\n\r\nTakođer, ovo nije prvi put da se prijavljujem za neki vid neformalnog učenja tako da sam već i ranije učestvovala na treninzima i obukama sličnog koncepta koji su se održavali u Litvaniji, Njemačkoj, Francuskoj i Srbiji na interkulturalnom nivou. Iz tog razloga, moja glad za neformalnim obrazovanjem, pored fakulteta koji studiram, svakim danom postaje sve veća i vrlo rado iznova i iznova učim nove stvari i upoznajem nove ljude.\r\n\r\nMoj profil detaljno možete pogledati na mom Linkedin profilu i dodatno otkriti moju motivaciju za učešće na ovoj akademiji (https://www.linkedin.com/in/emina-aganovi%C4%87-a65a87147/ )', 0, 'Web stranica', '- Projektni asistent u Munja Inkubator Društvenih Inovacija\r\n- Info urednik na portalu hocu.ba (Info platforma za mlade na kojoj sam također podijelila poziv za SSA - https://www.hocu.ba/index.php/hocu.priliku/otvorene-prijave-za-soft-skills-academy-sarajevo-2018/)\r\n- Vršnjački edukator koalicije Pod lupom\r\n- Dugoročni posmatrač koalicije Pod lupom\r\n- Dugogodišnji volonter u više nevladinih organizacija u Sarajevu i Zenici', 1, 'Nisam učestvovala ranije.', 'Kroz svoj rad, volontiranje i aktivizam imala sam puno prilika da uzmem učešće na nekim seminarima ali da i sama budem organizator nekih. \r\nMunja Bussines Challenge (Državno takmičenje u poduzetništvu za mlade)\r\nMladi Eko Reporteri (Takmičenje za srednje škole za istraživanje pitanja i problema zaštite okoliša)\r\nStudentska Poslovna Akademija (Program za razvoj poslovnih vještina studenata i podršku njihovoj lakšoj zapošljivosti)\r\nSeminar za pobjednike takmičenja \"Najbolja školska praksa\"\r\nCEO Konferencija\r\nUNLIMITED Konferencija\r\nKonferencija o omladinskom preduzetništvu...\r\nI mnogi drugi seminari koje organizujemo.', 'Kao što sam već navela, aktivna sam članica dvije organizacije u Sarajevu (Munja i SEEYN) i jedne u Zenici (INPUT) što mi daje priliku i prostor da stečeno znanje na ovoj obuci realizujem  kroz mnogobrojne događaje za mlade u BiH. Munja Inkubator godišnje organizuje preko 200 događaja za mlade u BiH kada je u pitanju neformalno obrazoanjea SEEYN je organizator i partner mnogih projekata u jugoistočnoj Evropi ali i šire. Također INPUT Zenica organizuje događaje za mlade na lokalnom nivou.', 'Pored toga što sam aktivna u poljima koje sam navela prethodno u ovoj aplikaciji, voljela bih istaknuti da uživam u umjetnosti i sportu. Volim slikati i bavim se sportom već duži niz godina. Iz tog razloga sam vrlo uporna i aktivna u svim poljima. To je jš jedan razlog da se prijavim za ovu akademiju i iskušam se u necemu novom :)', NULL, '2018-01-26 15:54:59', '2018-01-26 15:54:59'),
(41, 'Amar', 'Buljubašić', '1998-02-22', '062831583', 'amarbuljubasic1998@gmail.com', 'L', 4, 4, 'Poštovani,\r\n\r\nZovem se Amar Buljubašić i rođen sam u Zavidovićima, a trenutno stanujem i studiram u Sarajevu na Internacionalom Univerzitetu, smjer Međunarodni odnosi. Često imam običaj reći da kao mlada osoba osjećaj potrebno, a istovremeno i odgovornost da aktivno radim na sebi, te da doprinosim svojoj zajednici i društvu. Iz tog razloga trudim se maksimalno uzeti učešće u obukama neformalnog karaktera i savladati nove vještine koje nisam bio u prilici steći kroz redovno obrazovanje, a koje bi dalje mogu koristiti kroz svakodnevne i periodične aktivnosti.  Već sam prošao kroz nekoliko seminara i obuka, te stekao certifikat omladinskog lidera, no i dalje imam veliku želju da usvajam nova znanja i koristim prilike koje mi se pružaju za to. Svjestan sam da još puno moram raditi na sebi i nadam se da ću imati priliku raditi i s vama, u društvu mladih i ambicioznih osoba koje djele iste želje i ciljeve, s obzirom da vjerujem u snagu i potencijal studenata, ali i generalno mladih osoba u našem društvu. Nadam se da ću biti u mogućnosti usvojiti nova i prenijete svoja znanja i iskustva kroz interakciju na Soft Skills Academy.\r\n\r\nSrdačno', 0, 'Promocija na fakultetu', NULL, 0, 'Prošao sam kroz obuku \"Uči, misli i djeluj\" koju organizuje Institut za razvoj mladih KULT.', 'Uz niz radionica i seminara kroz pomenutu obuku \"Uči, misli i djeluj\", učestvovao sam i na nekoliko seminara za mlade u organizaciju Youth for Peace BiH, na međunarodnom seminaru \"Unemployed Youth\" u organizaciji Belgrade Open School, te nekoliko radionica na različite teme u saradnji sa Ambasadom Lokalne Demokratije Zavidovići, Asocijacijom srednjoškolaca u BiH i dr.', 'Često sarađujem sa Ambasadom Lokalne Demokratije u Zavidovićima, a jedan sam od osnivača UG \"Zdići.info\" u Zavidovićima, koji se prvenstveno bazira na informisanju građana putem online portala, ali i organizacijom i promocijom različitih društvenih događaja i radom s marginiziranim grupama. Također, radio sam i na implementaciji više projekata u lokalnoj zajednici.', 'Bez obzira na prethodne navedene stvari i iskustvo, svaku priliku doživljavam kao novu mogućnost da napredujem na ličnom nivou, a zatim da kroz svoje vještine budem u još većoj mogućnosti da doprinesem društvu i angažmanu mladih.', NULL, '2018-01-27 19:25:46', '2018-01-27 19:25:46'),
(42, 'Nedim', 'Ramić', '1997-03-29', '+387603212051', 'nramic15@gmail.com', 'L', 5, 5, 'Pozdrav,\r\nDrago mi je što imam ovu priliku da Vam se predstavim kao student Elektrotehničkog fakulteta u Sarajevu. Zovem se Nedim Ramić i jako sam motivisan da budem polaznik Soft Skills Academy.\r\nPrvenstveno, moja želja da budem član Vaše radionice je što imam prethodno iskustvo sa Vašim radionicama, tako da znam da će i ova, kao i prošle biti kvalitetna, temom primamljiva i nadasve jako korisna. Komunikativna sam osoba, vrlo rado i lahko stupam u kontakt sa drugim osobama, zainteresovan sam da naučim nove načine rada i obogatim svoje znanje. Imam visoku želju za profesionalnim uspjehom i visoko me motivišu sve dodatne aktivnosti koje će mi biti od koristi u mom budućem zanimanju. \r\nKako sam student Elektrotehničkog fakulteta, smijer Računarstva i inofrmatike, smatram da će i moj daljnem obrazovanju i poslu biti korisna oblast koju pokriva ovaj događaj, što dodatno  jača moju želju za prisustvom. Ova radionica bi predstavljala slijedeću stepenicu u mom profesionalnom razvoju i mogućem osnivanju samostalne firme za što sam stekao temeljna znanja na Vašoj ValueUp konferenciji.\r\nNadam se da ćete iz gore navedenog zaključiti da sam osoba koju želite vidjeti na Vašoj radionici.\r\nS poštovanjem,\r\nNedim Ramić', 0, 'Društvene mreže', 'Ljetni raspusti zadnjih 5 godina', 0, NULL, NULL, NULL, NULL, NULL, '2018-01-29 02:34:01', '2018-01-29 02:34:01'),
(43, 'Amar', 'Karahmet', '1996-09-16', '0603502539', 'amarkarahmet0@gmail.com', 'L', 4, 5, 'Poštovani\r\nUzimajući u obzir pretpostavku da ćete dobijati razna preduga, bajkovita pisma sa motivima preizraženog morala, koja graniče sa realnošću, što je kao po šablonu i karakteristično za ovu formu prezentovanja sebe, biću odstupanje od uobičajenog, kratak i jasan.\r\nPrijavljujem se na Softskills Academy program iz prostog razloga što mi je potrebna dodatna edukacija za ispunjavanje plana koji imam, o daljem obrazovanju i eventualnom zapošljavanju na pozicije za koje ću biti stručan. Vjerujem da ovaj program pored znanja koja će se usvojiti nudi i priliku za sticanje novih poznanstava koja mogu imati određeni značaj u budućnosti. \r\nUnaprijed zahvalan.', 0, 'Preporuka prijatelja', 'Sezonska zaposlenja', 0, NULL, '- \"Seminar of excellence: Diplomatic Affairs and Protocol\" , Sarajevo School of Science and\r\nTechnology, Sarajevo, 2017.\r\n- \"Seminar of excellence: Current Issues in European Politics\", Sarajevo School of Science and\r\nTechnology, Sarajevo, 2017.\r\n- \"Forming a coalition in a multiethnic state\" , Faculty of Political Science, Sarajevo, 2016.', 'Predsjednik Nadzornog Odbora Asocijacije studenata Fakulteta Političkih Nauka u Sarajevu', 'Učešće na konferencijama i programima:\r\n- \"Building peace in the region: burdens from the past and visions for the future\", Fakultet Političkih nauka, Sarajevo, 2017.\r\n- \"Strengthening the Capacities of Prosecutors in the Criminal Justice system\", High Judicial and\r\nProsecutorial Council of Bosnia and Herzegovina, Sarajevo, 2017.\r\n- Night Owl Session with Prof. Francis Fukuyama \", Sarajevo, 2017.\r\n- \"Kina & Pojas i put\", Fakultet Političkih Nauka, Sarajevo, 2017.', NULL, '2018-01-30 16:34:57', '2018-01-30 16:34:57'),
(44, 'Meliha', 'Hadžimehmedagić', '1996-06-29', '0603175055', 'hadzimehmedagic.meliha@gmail.com', 'S', 5, 5, 'Poštovane i poštovani,\r\nOvim putem prijavljujem se za učešće na Soft Skills Academy 2018. godine. \r\nUvjerena sam da je svima, bez obzira na vrstu posla kojom se bave ili planiraju baviti i bez obzira na talente koje posjeduju, usavršavanje i osvješćivanje ličnih i profesionalnih vještina od velike koristi. Posljedično ovom stavu, bila sam veoma pozitivno iznenađena kada sam vidjela da Vaša radionica nudi upravo to. Na ponudu sam naišla na Facebook-u, a prijateljica, koja je učestvovala u Vašem programu prije par godina, me je dodatno podstakla da se prijavim prenoseći mi samo riječi hvale za Vaš projekat. Pomislilla sam da je upravo sada idealna prilika da steknem te vještine s obzirom na to da pohađam završnu godinu studija na Filozofskom fakultetu.\r\nUživam i dobro funkcionišem u timskom radu. Iskustva u radu sa ljudima stekla sam u dugogodišnjem prvo volonterskom, a zatim i plaćenom radu na Sarajevo Film Festivalu, gdje sam bila zaposlena u timu za prodaju karata, a pretprošlo ljeto sam osvojila i učešće na Bookstanu, festivalu književnosti i književne kritike, gdje je tim mladih književnih kritičara, čiji sam član i sama bila, radio sa mnogim književnicima i profesorima poput Aleksandra Hemona, Teofila Pančića, Mone Elthahawi, Edina Pobrića, Nenada Rizvanovića i drugim autorima i predavačima. U sklopu ovih radionica dobila sam mnogo inspiracije, motivacije i savjeta kako za bavljenje pisanjem, tako i za usavršavanje svojih književnoanalitičkih i - kritičkih sposobnosti. Ovo iskustvo ubrzo se pokazalo od pomoći, jer sam u novembru 2016. godine pozvana i da budem dio newsletter tima za Pravo Ljudski Film Festival u Sarajevu, gdje sam zajedno sa nekim kolegama sadržaj festivala popratila nizom izvještaja i kritika, na engleskom i B/H/S jeziku. \r\nOve jeseni imala sam priliku da učestvujem na radionici u organizaciji Univerziteta u Würzburgu (Njemačka), gdje sam se bavila problemima iz Lingvistike varijeteta, a nakon toga i na studijskom putovanju, prilikom kojeg sam posjetila Univerzitet u Passau, sudjelujući u radionici na temu Interkulturalne filologije, zatim Univerzitet u Freiburgu i Univerzitet u Heildelbergu, gdje su održane radionice na temu interkulturalnosti i Univerzitet u Mannheimu koji je organizovao istraživački projekat u sklopu sa Institutom za njemački jezik u istome gradu. Sva ova iskustva su izuzetno oplemenila moja shvatanja jezika i njegove važnosti za komunikaciju unutar kulture ali i između različitih kultura.\r\nPored toga, koristim priliku da stičem praktično iskustvo vezano za svoj studij i prije završetka studija, učestvujući redovono na TransLab radionicama književnog prevođenja za engleski i njemački jezik. Također honorarno radim na Goethe Institutu u komisiji koja pregleda ispite i vrši upis kandidata na kurseve.\r\nSigurna sam da će ovako primamljiva ponuda privući mnoštvo kvalitetnih kandidata, ali vjerujem da bih ja izuzetno napredovala u takvom pozitivnom i motivirajućem okruženju. Hvala Vam što ste uzeli moju prijavu u obzir! Radujem se Vašem skorom i, nadam se, pozitivnom odgovoru! \r\nMeliha Hadžimehmedagić', 0, 'Društvene mreže', 'Sarajevo Film Festival - prodaja karata (rad na kasi)\r\nPravo Ljudski Film Festival - pisanje filmskih sižea i kritika (volonterski rad)\r\nGoethe Institut - korektura ispita i komisija pri upisu na kurseve \r\nprivatno - instrukcije iz engleskog i njemačkog jezika', 0, 'ne', 'Međunarodna konferencija iz Interkulturalne filologije - Sarajevo, 2017.\r\nVariationslingvistik, Blockseminar - Würzburg, 2017.', 'ne', NULL, NULL, '2018-01-30 18:49:03', '2018-01-30 18:49:03'),
(45, 'Armen', 'Adilović', '1990-08-05', '062/619-326', 'armen.adilovic@gmail.com', 'L', 4, 4, 'Poštovani,\r\n\r\nObraćam Vam se kao motivisana osoba, sposobna odgovoriti zahtjevima koji stavljate pred polaznike Soft skills academy. Osnovni motiv prijave na ovaj program jeste poteškoća u pronalasku posla u struci unatoč prethodno stečenom visokom obrazovanju, obavljanju pripravničkog staža i dodatnom radnom iskustvu.\r\n\r\nSebe smatram kozmopolitom koji se vrlo lako može uklopiti u dinamičan proces rada u raznim industrijama, ali siguran sam da soft skills čini grupu vještina koji bi mi pomogli da dodatno razvijem interpersonalne sposobnosti, pisane, komunikacijske vještine itd. \r\n\r\nPrije same prijave pokušao sam se što više informisati o mekim vještinama i shvatio sam da one pomažu pri kritičkom razmišljanju, u donošenju odluka i pomažu racionalnom korištenju vremena te se nadam da bi upravo ovaj program bio od pomoći u potrazi za novim poslodavcem.\r\n\r\nNadam se da meke vještine zajedno s tehničkim vještinama koje posjedujem mogu donijeti prevagu u pronalasku posla i da CV bogatiji za ovaj program može uvjeriti poslodavca da posjedujem dodatne vještine koje su dobrodošle u svakoj vrsti posla.\r\n\r\nHvala Vam na izdvojenom vremenu koje ste posvetili razmatranju mog motivacionog pisma. Iskreno se nadam Vašem pozivu.\r\n\r\nSrdačan pozdrav,\r\nArmen Adilović', 0, 'Web stranica', '-Pripravnik (2006-2017)\r\nKantonalna javna ustanova za zaštićena prirodna područja\r\n\r\n-Asistent organizacije (2015;2016)\r\nInternacionalni teatarski festival MESS \r\n\r\n-Projekat povremenih radova na poslovima uz stručno saradništvo za upravljanje prirodom i zaštitu Spomenika prirode Vrelo Bosne (2014)\r\nKantonalna javna ustanova za zaštićena prirodna područja\r\n\r\n-Volonter u Zavodu zdravstvenog osiguranja Kantona Sarajevo u procesu reforme zdravstva na poslovima logistike i distribucije pošte na području Kantona Sarajevo. (2011)', 0, NULL, '• 2017- Kurs \'\'Nauka o okolišu\'\'\r\n Diploma odobrena od strane \'\'Alison Ireland\'\', broj diplome #353-8738319\r\n• 2017-Kurs engleskog jezika napredni nivo B2-C1*\r\n Certifikat odobren od strane \'\'American and British Academy\'\'\r\n• 2017-Kurs \'\'Ugroženost voda u svijetu\'\'\r\n Certifikat odobren od strane \'\'Open2Study Australia\'\'\r\n• 2017-Kurs  \'\'Principi projekt menadžmenta\'\'\r\n Certifikat odobren od strane \'\'Polytechnic West Australia\'\'\r\n• 2017-Učešće u projektu \'\'Pisanje projekata po standardima Evropske unije\'\'\r\n Certifikat od strane Udruženja \'\'Svitanje\'\' Sarajevo\r\n• 2017- Kurs \'\'Ekološke studije-Ekosistemska ekologija\'\'\r\n  Diploma odobrena od strane \'\'Alison Ireland\'\'\r\n• 2013-Uspješno položen seminar za internog auditora ISO 9001:2008 (Sistem upravljanja kvalitetom).Certifikat odobren od strane TÜV  Croatia d.o.o. -  TÜV NORD GROUP', NULL, NULL, NULL, '2018-01-30 21:47:07', '2018-01-30 21:47:07'),
(46, 'Amra', 'Catic', '1996-05-23', '38762698572', 'amra.catic@hotmail.com', 'L', 3, 4, 'Zeljela bih da se prijavim za radionicu Soft skills academy. Za prijavu sam saznala preko portala Hocu.ba. Trenutno sam zavrsna godina prvog ciklusa Ekonomskog fakulteta Univerziteta u Sarajevu, na smjeru Menadzment informacionih tehnologija.\r\nMisljenja sam da neformalna edukacija i sticanje tzv. \"soft skills\" u velikoj mjeri mogu ljudima pomoci da motivisu sami sebe, ali i druge ljude oko sebe. Smatram da se ucescem na ovakvim radionicama mogu poboljsati postojece komunikacione vjestine, te samim tim, kreirati kod sebe spremnost na timski rad, sto kasnije moze biti od velike koristi prilikom zaposljenja u firmama. Soft Skills Academy Sarajevo izvanredna je prilika za sticanje \"soft\" vjestina koje su potrebne da se usvoje kako bi se sto bolje moglo funkcionisati kako na poslu, tako i u drugim aktivnostima. Misljenja sam da bih ucescem na Soft Skills Academy mogla upoznati mnoge vrsnjake i uvidjeti njihovu perspektivu, te samim tim steci nova poznanstva i prosiriti sopstvenu perspektivu, sto je za mene veoma znacajno. Kombinacija stecenih formalnih i neformalnih edukacija moze nas u buducnosti uciniti uspjesnim u poslu, bez obzira na to o kojem poslu je rijec.', 0, 'Mediji', NULL, 0, 'Do sada nisam ucestvovala na soft skills treninzima, zbog cega bih dodatno voljela ucestvovati na Soft Skills Academy Sarajevo.', 'Ucestvovala sam na radionici koju je organizovalo udruzenje Motivator, a tema je bila Start up academy, odnosno kako pokrenuti sopstveni start up. Pored toga, prisustvovala sam CEO academy na Ekonomskom fakultetu, gdje smo 3 dana imali radionice i predavanja na razlicite teme vezane za biznis. Uz to, trenutno pohadjam i kurs znakovnog jezika.', NULL, NULL, NULL, '2018-01-31 00:21:39', '2018-01-31 00:21:39'),
(47, 'Tea', 'Kadić Mujezinović', '1988-07-26', '061/863-363', 'tea.kadicmujezinovic@gmail.com', 'L', 4, 4, 'Poštovani, \r\n\r\nprijavljujem se na vašu radionicu s namjerom da proširim svoje znanje i naučim neke nove poslovne vještine koje će mi koristiti u budućnosti. Svaka dodatna naobrazba, naročito u prestižnoj instituciji, ima svoje benefite. Današnje tržište rada je prezasićeno i svaki segment obrazovanja igra ključnu ulogu pri odabiru kandidata koji su najadekvatniji aplikanti. Smatram da bi mi vaša radionica koristila kako u ličnom, tako i u poslovnom smislu. Nadam se da ćete razmotriti moju prijavu i ukazati mi čast da budem dijelom vašeg projekta.\r\n\r\nS poštovanjem.\r\n\r\nTea Kadić Mujezinović', 0, 'Preporuka prijatelja', '2017 godina. - Volonter Fakulteta političkih nauka Univerziteta u Sarajevu, Institut za društvena istraživanja.\r\n                         - Transkripti za USAID u Sarajevu\r\n                       \r\n                         -   PR, CPI Fondacija', 0, 'Nikada nisam učestvovala na soft skills treninzima.', 'OSCE- Medijska i informacijska pismenost\r\nCRYPTO PARTY- Fakultet političkih nauka', 'CPI Fondacija', NULL, NULL, '2018-01-31 15:45:42', '2018-01-31 15:45:42'),
(48, 'Darko', 'Vrbičić', '1994-10-29', '387 63 88 03 34', 'darkovrbiciccb@gmail.com', 'XL', 4, 4, 'Poštovani,\r\n\r\nStudent sam druge godine Ekonomkog fakulteta u Sarajevu i želio bih se prijaviti na Soft Skills Academy 2018.  Komunikativna i pozitivna osoba, spremna na rad u timu,  spremna dalje učiti i napredovati. U isto vrijeme sklon sam različitim novim idejama i improvizaciji te smatram da bi mi trodnevna Soft Skills radionica pomogla u daljem usavršavanju ličnih  vještina ali i  upoznavanju novih prijatelja koji se bave istim ili sličnim zanimanjem.\r\n\r\nHvala Vam unaprijed.\r\nLijep pozdrav,\r\n\r\nDarko V.', 1, 'Web stranica', 'Figurant (Srpanj 2016 – listopad 2016 “JP Šumsko Privredno Društvo ZE – DO Kantona d.o.o. Zavidovići)\r\n\r\nLogistika ( 02. rujan - 03. rujan2016 Red Bull \"AIRPOWER16” Zeltweg)\r\n\r\nRad u diskoteci \"Loft\" Sarajevo (siječanj 2017 - travanj 2017)\r\n\r\nLogistika  (Srpanj  2017 – Kolovoz 2017 logistika  NCM \"Ivan Pavao II.“)', 0, 'Soft Skills Sarajevo 2017\r\n\r\nČetverodnevna serija radionica - CEO Academy/EFSA (14.12.2017 - 17.12.2017.)', 'Dvodnevni seminar i radionica \"Mala škola fotografije i videozapisa - moćno sredstvo vizuelne\r\nkomunikacije\" 19. -  20. siječanj 2018.', NULL, NULL, NULL, '2018-01-31 22:10:25', '2018-01-31 22:10:25'),
(49, 'Aida', 'Alomerović', '1982-11-26', '+38761828094', 'aidaalomerovic@yahoo.com', 'S', 4, 4, 'Aida Alomerović\r\nG. Velešići 101b\r\n71000 Sarajevo\r\n+38761828094\r\naidaalomerovic@yahoo.com\r\n\r\nPoštovani,\r\n\r\nPrijavljujem se na trodnevnu radionicu tzv. mekih vještina, koju Vaša organizacija organizuje već tradicionalno svake godine, i za ovogodišnji ciklus radionica sam saznala preko info platforme „hocu.ba“.\r\n\r\nApsolvent sam na Elektrotehničkom fakultetu Univerziteta u Sarajevu, na odsjeku za Telekomunikacije. Odslušala sam i kompletirala sve ispite, i sada radim na diplomskom radu. Osim tzv. formalnog znanja, smatram veoma važnim i trudim se kod sebe izgraditi vještine i osobine koje će mi sutra pomoći biti što efikasniji uposlenik, u smislu izvršavanja zadataka, ali i što bolje saradnje sa kolegama. U tom smislu samostalno učim i istražujem na temu samopouzdanja, asertivnosti, komunikacijskih vještina, i sličnog, što smatram da svaka individua treba da posjeduje i primjenjuje, kako u privatnom, tako i u profesionalnom životu.\r\n\r\nPošto Vaša organizacija nudi znanje iz oblasti koje me veoma zanimaju, a ja sam trenutno u fazi profesionalnog usavršavanja i traženja zaposlenja, mislim da je vaša trodnevna radionica odlična prilika za osobu poput mene, da nadopuni svoje znanje, nauči nove vještine, i unaprijedi svoju biografiju.\r\n\r\nIskreno se nadam Vašem pozitivnom odgovoru,\r\n\r\nSrdačan pozdrav,\r\nAida Alomerović\r\n\r\nSarajevo, 01. februar 2018. god.', 0, 'Mediji', 'Ne.', 0, 'Ne.', 'Iz oblasti srodnih tematici na Vašoj radionici: \r\n\"Pozitivna psihologija s aspekta islama\", CEI NAHLA, Sarajevo.', 'Volontiranje u ekološkim i humanitarnim akcijama.', 'Hvala.', NULL, '2018-02-01 19:11:25', '2018-02-01 19:11:25'),
(50, 'Aida', 'Alomerović', '1982-11-26', '+38761828094', 'aidaalomerovic@yahoo.com', 'S', 4, 4, 'Aida Alomerović\r\nG. Velešići 101b\r\n71000 Sarajevo\r\n+38761828094\r\naidaalomerovic@yahoo.com\r\n\r\nPoštovani,\r\n\r\nPrijavljujem se na trodnevnu radionicu tzv. mekih vještina, koju Vaša organizacija organizuje već tradicionalno svake godine, i za ovogodišnji ciklus radionica sam saznala preko info platforme „hocu.ba“.\r\n\r\nApsolvent sam na Elektrotehničkom fakultetu Univerziteta u Sarajevu, na odsjeku za Telekomunikacije. Odslušala sam i kompletirala sve ispite, i sada radim na diplomskom radu. Osim tzv. formalnog znanja, smatram veoma važnim i trudim se kod sebe izgraditi vještine i osobine koje će mi sutra pomoći biti što efikasniji uposlenik, u smislu izvršavanja zadataka, ali i što bolje saradnje sa kolegama. U tom smislu samostalno učim i istražujem na temu samopouzdanja, asertivnosti, komunikacijskih vještina, i sličnog, što smatram da svaka individua treba da posjeduje i primjenjuje, kako u privatnom, tako i u profesionalnom životu.\r\n\r\nPošto Vaša organizacija nudi znanje iz oblasti koje me veoma zanimaju, a ja sam trenutno u fazi profesionalnog usavršavanja i traženja zaposlenja, mislim da je vaša trodnevna radionica odlična prilika za osobu poput mene, da nadopuni svoje znanje, nauči nove vještine, i unaprijedi svoju biografiju.\r\n\r\nIskreno se nadam Vašem pozitivnom odgovoru,\r\n\r\nSrdačan pozdrav,\r\nAida Alomerović\r\n\r\nSarajevo, 01. februar 2018. god.', 0, 'Mediji', 'Ne.', 0, 'Ne.', 'Iz oblasti srodnih tematici na Vašoj radionici:\r\n\"Pozitivna psihologija s aspekta islama\", CEI NAHLA, Sarajevo', 'Volontiranje u ekološkim i humanitarnim akcijama.', 'Hvala.', NULL, '2018-02-01 19:14:40', '2018-02-01 19:14:40'),
(51, 'Siniša', 'Novaković', '1984-04-11', '065/967-249', 'om.savjethp@yahoo.com', 'XL', 1, 1, 'Poštovani,\r\nPredsjednik sam Omladinskog savjeta \"Han Pijesak\" od 2007 godine, učesnik sam raznih manifestacija, događaja, projekata, seminara i svega što se tiče mladih ljudi. Do sada sam bio učesnik na preko 50 seminara, radionica gdje sam kao učesnik dobio i certifikate za te radionice, obuke i seminare.\r\n\r\n    Volio bih učestvovati na vašoj radionici kako bi upoznao i stekao nove prijatelje i razmijenio iskustva sa učesnicima, dobio još veće znanje i to primjenio u svojoj lokalnoj zajednici.\r\nUnaprijed hvala, Siniša Novaković, predsjednik Omladinskog savjeta \"Han Pijesak\"', 0, 'Društvene mreže', 'Ne', 0, NULL, 'Kao predsjednik Omladinskog savjeta \"Han Pijesak\" učestvovao sam na preko 50 seminara iz oblasti voloterizma i omladinskog organizovanja.', 'u NVO sam od 2007 godine', 'Zavrsio sam fakultet, nadam se da cu dobiti priliku da ucestvujem u radionici i nisam iz Sarajeva, iz Han Pijeska sam.\r\nUnaprijed hvala...', NULL, '2018-02-02 06:51:50', '2018-02-02 06:51:50'),
(52, 'Lamija', 'Basic', '1998-05-03', '0603148728', 'lamijabasic98@gmail.com', 'S', 3, 4, 'Poštovani,\r\n\r\nRazlog moje prijave je želja za novim iskustvima i mogućnostima koja će doprinijeti razvoju mojih ličnih sposobnosti i vještina, samim tim pomoći mi širiti vidike i otvoriti mnoge puteve u pogledu mog budućeg zanimanja i rada. Nadam se da će mi se pružiti mnoge prilike da u tom pravcu razvijam svoje dosadašnje sposobnosti i naučeno znanje.', 0, 'Web stranica', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-02 10:14:22', '2018-02-02 10:14:22'),
(53, 'Nejra', 'Karavdić', '1997-07-21', '+38762501907', 'nejrakaravdic@hotmail.com', 'M', 5, 5, 'Za Soft Skills Academy sam čula od prijateljice koja je imala samo pozitivne riječi o programu. Tada sam sebi rekla da ne smijem propustiti iduće prijave. \r\nPo mom mišljenju, neformalne edukacije su od izuzetno velike važnosti jer nam otvaraju nove mogućnosti, te proširuju vidike koje možda nismo dovoljno ispitali tokom formalnog, školskog obrazovanja. Imala sam priliku biti učesnik različitih konferencija i seminara dosad i svaki put se uvjerim da je još toliko toga ostalo da se nauči, istraži, vidi i čuje. Shvatila sam i da uživam slušajući i razgovarajući sa stručnjacima iz raznih oblasti. Bez obzira na sve predrasude i negativnu statistiku koje se vežu za Bosnu i Hercegovinu, ili čak Balkan, prilike su zaista svuda oko nas. Ono što je potrebno jeste da se mi sami pokrenemo i ugrabimo svaku od njih, bez čekanja da se savršena prilika stvori. Smatram da je Soft Skills Akademija upravo jedna od takvih prilika. Ovdje ćemo se malo više fokusirati na one vještine koje vjerovatno inače zapostavljamo, a koje se trebaju jednako trenirati kao i osnovne vještine iz struke koju studiramo. Zaista se radujem Akademiji i vjerujem da ću biti jedna od izabranih učesnika!', 0, 'Preporuka prijatelja', 'Dosad nisam imala radno iskustvo, samo praksu (Sparkasse banka).', 0, 'Nisam bila učesnik soft skills treninga.', 'Studentska Poslovna Akademija (SPA), 2017. (Sparkasse banka, MUNJA Inkubator i Hocu.ba platforma)\r\n\r\nKonferencije\r\n- ValueUp: Mind Your Own Business, 2017. (EESTEC LC Sarajevo)\r\n\r\n- CEO Konferencija, 2017. (EFSA)\r\n\r\n- Sarajevo Unlimited, 2017.', 'Volonter u projektu \"Let\'s Do It\", tim Sarajevo.', NULL, NULL, '2018-02-02 20:27:44', '2018-02-02 20:27:44'),
(54, 'Anela', 'Trebinjac', '1998-02-05', '061925682', 'anela-98@hotmail.com', 'M', 3, 3, 'Poštovani,\r\nStudent sam Ekonomskog fakulteta u Sarajevu i prva sam godina. Imam veliku zelju da prisustvujem, jer zelim da usavrsavam sebe i svoje znanje sto vise. Ranije nisam prisustvovala radionicama, a ovo mi je sada prilika.', 0, 'Preporuka prijatelja', 'Bez radnog iskustva', 0, NULL, 'Pedagoška srijeda', NULL, 'Tokom srednje skole ucestvovala sam u nekoliko vanskolskih aktivnosti, ucestvovala sam na priredbama kao recitator, i u sklopu demokratije radila sam na projektu \"Rješenje problema pasa lutalica\".', NULL, '2018-02-03 09:57:18', '2018-02-03 09:57:18'),
(55, 'Muhammed', 'Hasanovic', '1997-08-15', '061275925', 'mukyhasanov@gmail.com', 'L', 4, 5, 'Zasto zivjeti ako ne iskoristimo sve prilike koje nam se ukazu u zivotu. Kada budemo na samrti necemo zaliti za to sto smo uradili nego za ono sto nismo uradili i postigli a mogli smo. Javit ce se pitanje \"Sta bi bilo da sam to uradio,rekao,prijavio na taj miting...\". Zato svaka sanska koja nam se pruzi ne treba biti ehhh jednog dana cu to uraditi,nego upravo sada u ovom momentu treba pocet ne sutra ne nekad ne poslje SAD.Ako probas pa ne uspijes opet si ziv imas samo novo iskustvo koje oni koji nisu pokusali nemaju jer ih je bilo strah da bi mogli da ne uspiju pa nikad ni ne probaju tako uniste sve sanse da uspiju . Nikad se neces kajati  za to sto si probao da uradis dobru stvar za sebe za druge pa nisi uspio ali ces se kajati ako si mogao da probas ali nisi , tad se javlja to sta bi bilo kad bi bilo....', 0, 'Društvene mreže', 'Nemam', 0, 'Dobro sam upoznat sa socialnim vjestinama vjezbam ih i unapredjujem svakodnevno.Nisam nikad ucestvovao na treninzima uzivo.', 'Da sam licno prisustvovao nisam jer do sada nisam znao da ima nesto za socialne vjestine u BiH. Socialne vjestine koje sam stekao preko raznih programa i kompranija koje prodaju te programe je neusporedivo sa bilo cim drugim.', NULL, 'Dobro sam upoznat sa socialnim vjestinama i dinamikom .', NULL, '2018-02-04 09:17:16', '2018-02-04 09:17:16'),
(56, 'Maida', 'Kurtic', '1996-10-21', '061678481', 'maida_kurtic1996@hotmail.com', 'M', 2, 3, 'Poštovani, \r\nOvim pismom nastojim pokazati svoju motivaciju za učešće u programu \"Soft Skill Academy\"“  Veoma me raduje što sam čula za ovaj program, budući da ovu priliku vidim kao veoma značajan korak u pogledu sticanja novih znanja i iskustava u obrazovanju. Smatram da sam komunikativna osoba, te vrlo lako stupam u odnose sa drugim ljudima, te sam zainteresirana da naučim nešto novo. Imam veliku želju za profesionalnim uspjehom i voljela bih kada bi bila jedan od učesnika ovog programa. Zahvaljujem Vam se na odvojenom vremenu za razmatranje moje prijave.', 0, 'Web stranica', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-04 11:49:36', '2018-02-04 11:49:36'),
(57, 'Esma', 'Sakić', '1998-11-18', '062767523', 'sakicka.98@gmail.com', 'M', 1, 3, 'Prije svega zelim da se zahvalim na ukazanoj prilici a potom da iskažem želju za učešče u radionicama. Ja kao student prve godine i nisam baš spretna u mnogim poljima vezanih za mogućnost pristupa, odrade i odbrane svojih stavova, mogućnosti i prava koje imam nisam toliko sposobna da se izborim za to zbog manjka znanja i sposobnosti koje imam ali nisu izbrusene do te mjere da u svojoj namjeri ostvarim zacrtani cilj. Ove radionice bi mi pomogle u lično izgradnji sebe i preobrazbi onoga sto imam u sebi i nacina na koji bih mogla da iznesem, da budem uspjšna u tome što radim, a taj uspjeh da bude kvalitetan. Nadam se da ćete mi pmoći u brušenju sopstvenih vještina.', 0, 'Društvene mreže', NULL, 0, 'Učešće u Tuzlanskom Sos .u', NULL, 'Clan Odbora Omladinske banke Kalesija\r\nOrganizacija za djecu i mlade Osmijeh za osmijeh\r\nFondacija Tuzlanske zajednice\r\nUHD \"Prijateljice\"\r\nPodrska za djecu s posebnim potrebama \"Duga\"', NULL, NULL, '2018-02-04 17:34:18', '2018-02-04 17:34:18'),
(58, 'Paulina', 'Ribić', '1994-06-08', '063710377', 'paulina.ribic@hotmail.com', 'L', 3, 4, 'Ono što me motiviralo za prijavljivanje na ovu radionicu je zelja za neformalnim učenjem i upoznavanjem drugih mladih i ambiciozni ljudi. Razgovarajući sa drugim kolegama i kolegicama koji su već prosli ovu radionicu, smatram da ju svaki student treba proci prije izlazka na trziste rada.  Nadam se da cu biti u prilici upoznati sve te divne ljude na radionici i nauciti nove stvar koje ce mi biti korisne u buducnosti.', 0, 'Društvene mreže', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-02-04 17:38:04', '2018-02-04 17:38:04'),
(59, 'Nejra', 'Sivić', '1998-08-30', '062 372 894', 'nejraly@gmail.com', 'M', 4, 4, 'Nejra Sivić  \r\nAleja Bosne Srebrene 71000, Sarajevo\r\nnejraly@gmail.com\r\n062 372 894 \r\nSarajevo, 04.02.2018\r\n\r\n\r\nPoštovani/ poštovana,\r\n\r\nja sam Nejra Sivić , inžinjer u nastajanju i slučajno sam na internetskoj stranici \"Hoću.ba\" pronašla Vaš oglas. Trenutno sam student prve godine \"Fakulteta za saobraćaj i komunikacije\" na odsjeku \"Komunikacije\" i prilikom čitanja oglasa zaintrigirale su me pojedinosti koje ste iznijeli u oglasu. \r\n\r\nProšle godine sam završila \"Opću Gimnaziju\" sa odličnim uspjehom te nakon završene srednje škole upisala sam fakultet. Tokom srednje škole bavila sam se različitim vannastavnim aktivnostima. Odslušala sam kurs engleskog jezika \"upper intermediate level\" te kurs njemačkog jezika do nivoa B 1( A ) te za isti imam i certifikat.  \r\nTokom ljeta 2016 bila sam učesnica škole \"Medicine i medicinskog bioinžinjeringa\", a tokom ljeta 2017 godine učestvovala sam u kampu i \"Ljetnoj školi web dizajna\". \r\nUključena sam u rad mnogih drugih organizacija, željna znanja i isprobavanja nečeg novog.\r\nO prethodnim radionicama koje ste organizovali sam čula sve najbolje te želim ove godine da i ja budem dio jedne takve radionice gdje bih mogla da usavršim svoje vještine u komunikaciji i timskom radu, ali i da naučim nešto novo. \r\nNadam se Vašem pozitivnom dogovoru. \r\n\r\nZahvaljujem unaprijed na Vašem vremenu, \r\ni srdačno vas pozdravljam.\r\n\r\nNejra Sivić', 0, 'Web stranica', NULL, 0, NULL, 'Tokom 2016 godine učestvovala sam u školi \" Medicine i medicinskog bioinžinjeringa\". \r\nTokom ljeta 2017 godine bila sam dio kampa i ljetne škole \"Web dizajna\". \r\nTokom  februara 2018 godine održava se \"Regionalna škola medicine i medicinskog bioinžinjeringa\" čiji sam učesnik.', 'NE', NULL, NULL, '2018-02-04 19:02:33', '2018-02-04 19:02:33'),
(60, 'Amina', 'Hodžić', '1996-07-17', '+38762170330', 'mincihodzic@gmail.com', 'S', 3, 4, 'SSA je odlična prilika za upoznati mlade, ambiciozne ljude i zajedno sa njima raditi na usavršavanju ličnih vještina. Mislim da je Soft Skills Akademija odlično mjesto za sticanje vještina potrebnih u profesionalnom usavršavanju, pa bih željela da budem dio iste.', 0, 'Promocija na fakultetu', 'promotivne aktivnosti u tržnim centrima', 0, 'ne', 'ne', 'ne', NULL, NULL, '2018-02-04 20:28:56', '2018-02-04 20:28:56'),
(61, 'Berina', 'Velic', '1996-06-03', '062759595', 'berina78@hotmail.com', 'M', 3, 3, 'Posjedujem veliku zelju za usavrsavanjem na raznim poljima i smatram da je ova trodevna radionica idealan nacin za to. Posebno bih istakla da meni, studentici ekonomije, od izuzetnog znacaja razvoj kako individualnih osobina tako i za rad u timu.', 0, 'Društvene mreže', 'Studentski posao u Inditex grupaciji - Bershka', 0, NULL, NULL, NULL, NULL, NULL, '2018-02-04 20:40:56', '2018-02-04 20:40:56'),
(62, 'Amina', 'Pandžo', '1995-02-02', '062693673', 'amina.pandzo@hotmail.com', 'S', 2, 2, 'Ja sam Amina Pandžo, Bachelor inžinjer mašinstva koja bi kroz SSA stekla puno kvalitetnih vještina potrebnih za profesionalno usavršavanje. \r\nSpremna sam za pokazivanje stečenog znanja, radujem se novim učenjima i  upoznavanjima kvalitetnih ljudi.\r\n\r\nPosedujem određena iskustva kao inžinjer mašinstva zbog prakse koju sam obavljala u jednoj privatnoj firmi. Sada želim ovom akademijom da obogatim i unaprijedim svoje znanje i iskustvo ali i da kroz druženje sa studentima različitih fakulteta, proširim svoju mrežu poznanstva i ostvarim dragocjena prijateljstva.\r\n \r\nIskreno se nadam i jako bih voljela da budem jedan od Vaših odabranih kandidata.\r\n\r\nS poštovanjem,\r\nAmina Pandžo', 0, 'Promocija na fakultetu', 'Radila sam kao inžinjer mašinstva u firmi koja se bavi preradom i proizvodnjom drvenih proizvoda, Radila sam na poslovima kontrole prizvodnog procesa, dorađivanju tehničkih crteža koristeći AutoCad i Solidworks, obradi dokumentacije i slično. \r\nIstakla bih da sam učestvovala u projektu jedne holandske vodeće kompanije za razvoj i proizvodnju 3D printera čij je cilj bio inoviranje nastavnog procesa upotrebom 3D printera. U projektu se takmičilo preko 250 ekipa iz cijele Europe i moja ekipa je pobijedila i osvojila 3D printer kojeg smo poklonili našem fakultetu.', 0, NULL, NULL, NULL, NULL, NULL, '2018-02-04 20:54:58', '2018-02-04 20:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `created_at`, `updated_at`, `name`, `logo`, `category`, `website`) VALUES
(1, '2018-01-16 21:52:40', '2018-01-16 21:52:40', 'Authority Partners', '/uploads/partneri/1/api.png', 'generalni', 'https://www.authoritypartners.com/');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'zatvori prijave', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(2, 'otvori prijave', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(3, 'pregledaj prijave', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(4, 'obrisi prijavu', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(5, 'izmjeniti prijavu', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(6, 'dodati novost', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(7, 'izmjeniti novost', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(8, 'obrisati novost', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(9, 'dodati medij', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(10, 'izmjeniti medij', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(11, 'obrisati medij', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(12, 'dodati partnera', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(13, 'izmjeniti partnera', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(14, 'obrsati partnera', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(15, 'dodaj trenera', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(16, 'izmjeniti trenera', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(17, 'obrisati trenera', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(18, 'dodaj trening', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(19, 'izmjeniti trening', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(20, 'obrisati trening', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(21, 'dodaj kontakt', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(22, 'izmjeniti kontakt', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(23, 'obrisati kontakt', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `content`, `image_url`) VALUES
(1, '2018-01-14 22:02:05', '2018-01-14 22:53:59', 'Otvorene prijave za Soft Skills Academy Sarajevo 2018', '<p>Želja za usavršavanjem i unapređivanjem znanja, kako kroz formalno, tako i neformalno obrazovanje je ono što pojedinca odvaja od mase i pruža mu prednost nad konkurencijom pri zapošljavanju. Upravo je to ono što Soft Skills Academy Sarajevo omogućava svojim učesnicima.&nbsp;</p><p>&nbsp;Soft Skills Academy Sarajevo je besplatna trodnevna radionica ličnih i profesionalnih vještina, koja podstiče studente na razvoj neformalnih vještina neophodnih za zapošljavanje i uspješnu karijeru. Od samih početaka, primarni fokus ove radionice predstavljaju &nbsp;soft skills treninzi odnosno treninzi tzv. mekih vještina kao što su rad u timu, prezentacijske i komunikacijske vještine, vremensko planiranje, upravljanje projektima, rješavanje konflikata i liderstvo, na čijem razvoju studenti inače nemaju priliku da rade, jer iste premašuju okvire postojećeg obrazovnog sistema. &nbsp;&nbsp;</p><p>Nakon što su se prethodne radionice pokazale kao izuzetno uspješne i imale značajan odziv među studentima, Udruženje studenata elektrotehnike, Lokalni komitet Sarajevo odlučilo je da organizuje šestu po redu <strong>Soft Skills Academy Sarajevo</strong> &nbsp;koja će se održati <strong>od 9. do 11. marta 2018. godine.</strong> &nbsp;</p><p>Pravo učešća ostvaruju studenti svih fakulteta u Sarajevu koji će imati priliku steći i unaprijediti svoje sposobnosti te istovremeno vršiti i međusobnu razmjenu iskustava. Prijaviti se možete od <strong>15.01.2018.</strong> putem web stranice <a href=\"http://www.softskillsacademy.ba/prijava/\">www.softskillsacademy.ba/prijava</a>, a prijave su otvorene do <strong>23.02.2018.</strong> <strong>godine</strong>.&nbsp;</p><p>Novosti možete pratiti i na našoj <a href=\"https://www.facebook.com/SoftSkillsAcademySarajevo/\">Facebook </a>stranici kao i na <a href=\"https://www.instagram.com/softskillsacademy_sa/\">Instagram </a>profilu. &nbsp;</p><p>Prijavi se i #budikorakispred. &nbsp;</p>', '/uploads/novosti/1/IMG_6515 (1920x1280).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'root', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(2, 'organizer', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01'),
(3, 'participant', 'web', '2018-01-17 21:59:01', '2018-01-17 21:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tarik Šahinović', 'tarik.upss@gmail.com', '$2y$10$E1rvgZb3BHL1y/OYRwSZEeT6HU69RbAw6Ps81l2xSeyUQewA9nC5O', '1NQGeYHaafRWJYNylSu0IPbrUZCTU4qyxwsmNxULOQZlMZ2xVILkqFluqKqu', '2018-01-14 21:40:13', '2018-01-14 21:40:13'),
(2, 'Amila Hrustić', 'ahrustic13@gmail.com', '$2y$10$.ys03ST6B8p1gOioGQc1wuVoXPZx3xrnnh9ecjPZf9Eu5GseZMM1e', NULL, '2018-01-15 23:46:26', '2018-01-15 23:46:26'),
(3, 'Enisa Musić', 'enisa.musii@gmail.com', '$2y$10$mwQqKsduhgnHfcJyxGz2yuDU0kwMKvgUvNmZOekpy/fITfZFBwjs2', 'B9mZjfTBFH4n1skU8h0MTPDcA3ADAlI4CBUSHXGAe6jucPdQBAvlDKO2KaQU', '2018-01-16 00:49:39', '2018-01-16 00:49:39'),
(4, 'Adi', 'adipandzic@gmail.com', '$2y$10$j1qsg5hGD0ux24/ChpB3QeF01a4lbQ46/uJwy3N8YwOsIKHf1qfSK', NULL, '2018-01-16 07:41:41', '2018-01-16 07:41:41'),
(5, 'Kerim Redzepagic', 'kredzepagic996@gmail.com', '$2y$10$Xi3pCO.G5aGSTl0xhsnz2.Kd0XEu5PMi03CVQlVKdIoIL3z8PjReK', 'bUgYnqvjlbNGEdhM7xscQunLFweiP27FzTETiax2c7RFuDNOMsFgRlIw5whK', '2018-01-16 13:49:15', '2018-01-16 13:49:15'),
(6, 'Amina Alijagić', 'aalijagic2@gmail.com', '$2y$10$7RcZ.U5AYDSZ3ltlRcyruu2D50lZK6IQ9C3ZC3mAcBqOVzIrbIxCe', '14SzFSLjXNw37Dy9xpDlto0L2lxmRHrVq2sIY1cP98YEsMVuvDV5kVnIi2Yg', '2018-01-17 10:23:27', '2018-01-30 22:03:46'),
(7, 'Armin Avdic', 'rwjbtr@gmail.com', '$2y$10$9gdGGGPokJ1hUfdFSU4QsuIVW3Z1OKp8le0Mr0.XUMNmHA6ECszk.', NULL, '2018-01-17 14:11:19', '2018-01-17 14:11:19'),
(8, 'osman', 'haris.osmanbegovic1@gmail.com', '$2y$10$Cdo.O4ZEeT23/mo.ldxNWuM0yhYpn.sBsdchrp0lMy2X1lYgHL0BG', NULL, '2018-01-20 17:08:24', '2018-01-20 17:08:24'),
(9, 'Marijana Udovčić', 'mary.udovcic@gmail.com', '$2y$10$irP754wTk1G8QuqYa5Eo7OvX.8ZArQwT.abwJfy7wrG7vAlBTW.mi', NULL, '2018-01-31 10:24:41', '2018-01-31 10:24:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakulteti`
--
ALTER TABLE `fakulteti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultet_participant`
--
ALTER TABLE `fakultet_participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultet_participant_participant_id_foreign` (`participant_id`),
  ADD KEY `fakultet_participant_fakultet_id_foreign` (`fakultet_id`);

--
-- Indexes for table `kontakts`
--
ALTER TABLE `kontakts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `participanti`
--
ALTER TABLE `participanti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participanti_user_id_foreign` (`user_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_trainer_id_foreign` (`trainer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakulteti`
--
ALTER TABLE `fakulteti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `fakultet_participant`
--
ALTER TABLE `fakultet_participant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `kontakts`
--
ALTER TABLE `kontakts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `participanti`
--
ALTER TABLE `participanti`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fakultet_participant`
--
ALTER TABLE `fakultet_participant`
  ADD CONSTRAINT `fakultet_participant_fakultet_id_foreign` FOREIGN KEY (`fakultet_id`) REFERENCES `fakulteti` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fakultet_participant_participant_id_foreign` FOREIGN KEY (`participant_id`) REFERENCES `participanti` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participanti`
--
ALTER TABLE `participanti`
  ADD CONSTRAINT `participanti_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
