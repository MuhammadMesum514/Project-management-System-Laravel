-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 08:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Percy Jakubowski', '674', 'schuyler.parisian@example.net', '$2y$10$1nV8ogpoUdUhxX7CiawR7edPat6vnKz1i68ftxghmt42.LKRgML6q', NULL, '2018-04-21 11:54:10', '2010-07-11 08:55:03'),
(2, 'Mr. Theo Cronin Sr.', '559', 'aryanna68@example.com', '$2y$10$X4vRYsLLAWLZnQVkbDzele4XYZHH900xrvviQSxo30e08BelKEsim', NULL, '1974-08-11 09:24:40', '2022-02-27 00:05:12'),
(3, 'Prof. Annabel Kunde', '158', 'hortense02@example.net', '$2y$10$2MWl0jU6H3utOKjqUfpf8Ojf9bmtFQ2qMKmINLb7zneg0v6N6dfVq', NULL, '1979-01-04 19:30:51', '2000-05-05 05:14:20'),
(4, 'Dr. Beulah Hudson Jr.', '141', 'salvador86@example.org', '$2y$10$k.HJbojVsVk0C5HOTjSsouZOSlDb4PvC2DssK8ahK2fN//x8qz0k.', NULL, '1997-06-08 14:33:36', '1976-06-10 08:25:28'),
(5, 'Mr. Cruz Runolfsdottir', '329', 'kelsie.fay@example.org', '$2y$10$Na.GWc9FESGqezo3UDllpe2rbHGPYxQelUlo1RsIDzdE/Sdj5pgpq', NULL, '2009-07-27 09:53:37', '1979-12-02 21:46:56'),
(6, 'Santos Wisozk', '561', 'zhickle@example.com', '$2y$10$s5tr9yMVrEFADTVaONlPj.MQd0kqpmhxOGkgh0tO8T8T2jFkC.xmO', NULL, '2021-11-19 17:12:23', '2003-02-24 23:31:05'),
(7, 'Jarrod Stoltenberg', '217', 'borer.vince@example.net', '$2y$10$evNbeiPNP5D1wYSyel5vKudxnbKLaFzmjNAbY8VgQQWQ4SR6qyBn6', NULL, '1989-07-26 17:38:33', '2018-06-15 10:27:27'),
(8, 'Sister Nicolas', '453', 'hlehner@example.net', '$2y$10$PLTbaORFzuLR2Ag7J3EKmOVIuBrK8hL5jE7RpXA2y6QoQmIC4iXBC', NULL, '1992-09-25 05:46:12', '2021-06-15 13:35:53'),
(9, 'Elizabeth Nitzsche', '728', 'iframi@example.com', '$2y$10$tgvD2wtJtgMJ1Ww/6kq6XOplyVRiWmxlfuUKR10X7T//Z8pdmMrcK', NULL, '1979-03-23 12:38:57', '1994-09-04 02:30:08'),
(10, 'Delphia Parker', '167', 'turcotte.rosie@example.com', '$2y$10$wRamKl.k/XxHscAYYfQ2AuDYAvb4CHNOJF0eavvR1uujIjH63PzHO', NULL, '2016-03-23 01:42:45', '2010-04-13 12:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `name`, `department`, `designation`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jameson Lockman', 'Schmitt-Ward', 'Runte, Grimes and Huels', 'boberbrunner@example.org', '$2y$10$R/CYzrc0OZuREAD5HX5FN.z77FjS6nNc8oOiXZ9w8BzyZMZhF4Jgy', NULL, '1996-06-20 09:20:10', '1991-10-20 04:57:05'),
(2, 'Jayson Conroy', 'Hoeger Group', 'Botsford PLC', 'jamar31@example.net', '$2y$10$C6JmAgibgc9UBjKccawkF.bwsmodZhClGmMHwpK9zadfj6WScKUtm', NULL, '2003-12-06 00:49:10', '2013-07-16 01:41:01'),
(3, 'Mr. Bailey Gerlach', 'Wiza and Sons', 'Marks, Weimann and Streich', 'mertie84@example.org', '$2y$10$4FktfPhHk/T6wzzrM21HD.Ru0QdhQ5i/DQDX4SUAv7P6hvJJ94Fl.', NULL, '2004-06-06 07:02:24', '1991-01-07 06:35:33'),
(4, 'Berry Cruickshank', 'Crona-Tremblay', 'Daniel LLC', 'rudy.olson@example.net', '$2y$10$9YfFnTx7.HN8.2AtYubmMeeuAxqOfG4VM46Cojl49n4ZQy16.E56q', NULL, '1991-08-15 07:24:06', '2021-05-14 00:42:27'),
(5, 'Christa Kuhn', 'Bechtelar, Wolf and Harber', 'Kub, McDermott and Kulas', 'lonny.kuhlman@example.com', '$2y$10$TgzTqoa7SW3UimjP7K5WeeKOA3mV8rr/YtcPBOq7ioQP7N2BrO43.', NULL, '2017-02-08 19:32:54', '1979-09-18 21:26:35'),
(6, 'Connie Davis', 'Jones-Stokes', 'Moen-Tromp', 'dshanahan@example.com', '$2y$10$gFlj79Cbl7.CpskiPTObFeuSMvEhui4bavkccc46gYBn35KRYilm6', NULL, '1984-01-07 08:01:56', '1984-11-01 22:07:34'),
(7, 'Sim Rolfson', 'Wisozk, Durgan and Lind', 'Willms, Stoltenberg and Buckridge', 'marco24@example.com', '$2y$10$1/m2ZDDjxLlhGruJ/mxMJO0fndaMLVuXCNrnAMMBLTK4vzcxsjT4m', NULL, '1997-09-28 19:07:22', '1996-09-13 13:00:38'),
(8, 'Carlos Bosco', 'Ward-O\'Connell', 'Johnson, Huels and Thompson', 'chris.braun@example.org', '$2y$10$qmIstvscTp4C11zIEAmgAOjz5AgLRO9rfML51SBzHYr2JOme6C1/S', NULL, '2010-11-09 13:08:58', '2004-08-18 03:23:56'),
(9, 'Dr. Jermain Kohler', 'Schoen-Morissette', 'Lindgren Inc', 'abogan@example.net', '$2y$10$rUzAytkacTAD9/t0.nrGD.5hsm5ABNNAPTidZ9yoCpc.aL3Rcl2Qy', NULL, '1994-03-08 04:12:05', '1972-07-24 16:18:46'),
(10, 'Marjory Hessel', 'Rice-Franecki', 'Kuhlman, Wunsch and Hackett', 'adolfo.daugherty@example.com', '$2y$10$upBVM7Bsqct1Wk3g8cL3YO1wFF.OdvfX8rSwtVkhvGf1brKzm1a.G', NULL, '2022-08-07 09:39:38', '1973-04-25 03:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_08_154637_create_admins_table', 1),
(5, '2021_05_08_181649_create_managers_table', 1),
(6, '2022_09_06_152944_create_teams_table', 1),
(7, '2022_09_06_152945_create_user_team_table', 1),
(8, '2022_09_06_153000_create_projects_table', 1),
(9, '2022_09_06_153053_create_tasks_table', 1),
(10, '2022_09_06_153109_create_task_details_table', 1),
(11, '2022_09_06_160255_create_user_task_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `ProjectName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `End` date NOT NULL,
  `ProjectDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_completed` tinyint(1) DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `progress` int(11) DEFAULT 0,
  `TeamID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `ProjectName`, `start`, `End`, `ProjectDescription`, `is_completed`, `status`, `progress`, `TeamID`, `created_at`, `updated_at`) VALUES
(1, 'Bradtke-Kub', '2011-10-21', '1988-02-29', 'Sed ratione ab explicabo commodi vitae numquam. Sit iure velit qui consequatur excepturi. Minus velit vel neque voluptatum veniam ut eum. Tenetur velit impedit necessitatibus mollitia ut dolorum magnam. Ratione quos quas at quis iusto rerum. Eos distinctio consectetur magni ab. Esse nihil minima iste. Culpa est eum ipsum sit ab fuga. Vel nesciunt architecto vero perspiciatis et. Iure itaque magnam repellat et architecto odit omnis. Consequatur illo ut tenetur consequatur illo unde totam. Repudiandae et qui laboriosam cumque. Occaecati quidem nesciunt similique repudiandae dolore. Harum numquam similique eum doloremque ducimus optio. Rem consectetur provident fugit aut voluptas molestiae possimus rerum. Facere deleniti nostrum aut ducimus facere. Vel autem excepturi voluptatibus et. Id officiis quibusdam ea provident. Numquam pariatur impedit corrupti tempore officia. A adipisci earum in omnis velit et consequatur ut. Cumque maxime ducimus ratione maxime. Adipisci ratione exercitationem illum occaecati facilis optio quam. Quibusdam qui perferendis corporis distinctio sit et sapiente. Iusto corrupti ut id et autem magnam quidem eligendi. Asperiores illo corrupti minima non. Quisquam occaecati facilis quis beatae magnam incidunt odio. Mollitia id sit aut. Vitae quo omnis libero ut voluptatibus fugiat. Adipisci expedita dolorem dolorem omnis voluptatem expedita. Et iusto eligendi fugiat natus ut dolor non. Labore consequatur tempora laudantium voluptatem in dolorum voluptas est. Sit sit repellendus maiores odio rem illo ipsum deserunt. Tenetur omnis quaerat recusandae qui. Quam architecto aliquid unde qui consectetur neque quia. Nobis occaecati fuga eaque possimus id praesentium. Dolore est explicabo alias. Est praesentium eum eius deserunt molestiae sunt sit enim. Et magni facere rerum deleniti eum aut. Aut consequatur omnis adipisci iusto delectus sapiente soluta quia. Unde perferendis sit aut corrupti. Dolor laudantium beatae est velit dignissimos soluta. Nisi qui harum illum voluptatem est sed corrupti. Occaecati est id laborum dolores qui fugit.', 0, 'New', 0, 6, '2019-09-10 02:27:21', '2019-05-30 07:37:26'),
(2, 'Fay Inc', '2013-06-29', '1997-05-01', 'Incidunt et est et rem molestias maiores laborum. Voluptatem occaecati numquam totam rerum natus sed. Minima veritatis sed aut deleniti non ut. Ipsum consequatur sapiente expedita dicta. Repudiandae consequatur itaque eaque ut qui beatae et. Commodi in enim sed error asperiores voluptatem et iusto. Sunt quo quasi reiciendis autem. Explicabo voluptatem dolor qui enim amet et. Sunt quaerat aut velit cumque voluptatem aspernatur soluta. Inventore aliquam et distinctio veritatis magnam assumenda. Omnis sit nesciunt nemo laboriosam est quia. Officiis cupiditate magnam sunt. Veniam officia eius corrupti dolorem fuga. Voluptatem magni quas libero aliquid dignissimos. Quisquam consequatur quia inventore. Quasi magni velit autem excepturi occaecati aperiam sit. Unde id hic possimus doloribus. Ipsum corrupti voluptatem eum fuga. Omnis odit provident voluptas voluptatum officiis quia. Quo vero fugiat velit repellendus. Voluptatibus ducimus aliquid quis vel. Autem dicta enim quos assumenda in omnis omnis. Veritatis et dicta ea non velit consequuntur inventore.', 0, 'New', 0, 6, '1984-06-05 04:11:02', '1986-09-07 12:12:56'),
(3, 'Bartoletti PLC', '1999-08-01', '1997-02-20', 'Earum nisi impedit vero rerum ea. Architecto dolorem quasi vel earum possimus architecto quidem. Neque optio deleniti perspiciatis facilis. Atque dolor ipsum ut non est ea corporis. Impedit soluta eum sed dolorem suscipit. Ut non voluptas a natus architecto nam sit non. Voluptatem repellendus sunt iusto ratione ut. Quam voluptas voluptatibus earum voluptatibus id amet ea dolores. Asperiores veniam et laborum praesentium molestias. Error repudiandae id et ipsum minus qui. Cumque perferendis tempora quis dolores assumenda doloremque iusto. Earum perferendis voluptatem dicta impedit non reprehenderit qui. Non nam nam quia repellat unde qui. Consequatur laudantium veniam est ipsum. Dolorem voluptatem inventore ut nihil. Quaerat sequi similique tempore voluptas. Et iusto qui ad at aut facilis odit. Molestiae perspiciatis dolorum et ipsum omnis error et. Mollitia et voluptatem ut facilis ut amet. Voluptates eligendi consequatur aut reiciendis. Aliquid perspiciatis necessitatibus minima ut. Pariatur cum et temporibus quo. Deleniti quos reprehenderit aut. Beatae iste libero dolores ipsam est dolore molestias. Molestias temporibus iste enim. Odio alias unde repellat. Atque iure dignissimos sit dolore. Enim quo est nihil voluptate voluptatem atque et nesciunt.', 0, 'New', 0, 6, '2005-02-24 08:15:44', '1976-08-16 23:06:08'),
(4, 'Koepp Group', '1978-09-24', '2020-03-28', 'Ut officia necessitatibus eos exercitationem eum sint. Fugit praesentium veniam dolor tenetur cupiditate. Totam odio neque dolor porro autem inventore occaecati. Exercitationem incidunt nihil neque est fuga totam quidem. Voluptas suscipit dolores rem et qui. Sunt id in dolorum quos. Harum ut neque ab itaque eos. Et sit harum ullam voluptatem. Unde earum iste iure provident dolor et natus rerum. Illo aut ipsa itaque ipsum dolorem totam. Nihil consequuntur omnis saepe omnis. Velit maiores et quia repudiandae quia. Culpa illo dicta dolores nulla ut iusto. Facere laboriosam occaecati autem nostrum. Est enim ullam repellendus ut qui aut natus. Maiores optio et sint rerum alias. Eos provident est dolores minus quo velit voluptas. Accusamus aut excepturi nostrum est. Quia numquam nobis est temporibus asperiores. Voluptas voluptatem dolorum pariatur odit deserunt. Perspiciatis aut eum aliquam ea provident est ut asperiores. Rem voluptatem est et. Voluptas est et temporibus. Consequatur natus nisi molestias natus quis et sed. Itaque enim molestiae autem nobis voluptatum perspiciatis. Velit velit sed nisi quidem. Dolor fugiat odio distinctio voluptas molestiae aut. Cumque laborum sunt beatae est dignissimos ut necessitatibus quia. Alias inventore rerum eaque dignissimos. Ea eveniet id dolores officiis. Vel iusto dolore vero autem fugit dolores doloremque.', 0, 'New', 0, 6, '2015-03-29 11:25:33', '1987-01-26 18:55:40'),
(5, 'Feeney, Gibson and Simonis', '2014-08-11', '2002-07-21', 'Possimus rerum repellat provident eligendi quo et. Nemo a magnam quis libero iusto reprehenderit. Facilis ut dolores enim ipsa. At assumenda omnis nulla quos animi consequatur odit. Sit eligendi asperiores numquam cumque sint doloribus. Praesentium nihil veniam quos animi ipsam. Nam recusandae earum fugiat. Odio ullam harum placeat reiciendis quia corrupti quis. Aperiam consequatur sunt voluptatem illo qui est. Sed sunt optio et. Illo velit ducimus tempora eveniet sint sed hic. Dicta velit numquam ratione et sed. Voluptatum rem aspernatur qui similique dolore unde quam quia. Velit consequatur qui dignissimos sit nihil nam. Eum ea quia expedita excepturi ut consequatur soluta. Consequatur quo velit aut sit. Temporibus autem et enim voluptas similique officia. Ea ea dignissimos veritatis animi ut. Animi accusamus magnam quis accusantium vel. Dignissimos nostrum deserunt qui quas optio tempora nam. Molestiae eaque tempora numquam rerum eum ratione. Porro et nemo sit harum autem.', 0, 'New', 0, 6, '2019-02-21 00:47:55', '1998-06-12 16:54:09'),
(6, 'O\'Connell-Wiegand', '2006-11-16', '2014-04-26', 'Aliquam sint et aut excepturi. Dolor deleniti totam maiores molestias. Sequi neque impedit accusantium nihil. Nihil ipsa sequi voluptatem sint est. Omnis recusandae ut omnis ut voluptatum corrupti. Qui porro rerum aut assumenda. Esse quas explicabo ut necessitatibus quia doloremque omnis. Ut aut quia ex magnam harum velit vero. Alias magnam et dolorum voluptatem. Eligendi laborum aperiam ab voluptas corporis voluptas. Dolores aut quibusdam expedita veritatis enim praesentium. Repudiandae amet corporis consequatur nisi eveniet voluptatem. Quo quas et nulla itaque. Sed eveniet et porro et natus eos. Deleniti nulla qui porro nulla ea commodi. Ea ab error quo quis. Eaque omnis voluptatem libero error. Neque est sed neque nesciunt illum repellat. Quo alias rerum ducimus.', 0, 'New', 0, 6, '2004-01-01 19:29:25', '1990-02-01 15:13:50'),
(7, 'Rutherford PLC', '1992-07-16', '1970-06-02', 'Sint nemo quidem sit et ut omnis cum non. Provident ut perferendis est magnam provident qui. Libero voluptatem voluptas modi. Nostrum aut consequatur quibusdam illo doloribus rem consequatur. Maiores tempore hic a qui sed doloribus. Minus aut quod aperiam perferendis quaerat. Exercitationem minima facere aliquid et. Ipsum consequuntur totam et dicta sunt dignissimos. Ea deleniti at dolorum qui dignissimos qui consequatur. Et veritatis minus cumque quis sed est. Ut est iste ut culpa accusamus. Iusto quia ducimus ab magnam ea harum assumenda facere. Consequatur vel laudantium dicta quasi natus tempora. Doloremque sunt rerum consequatur sed est voluptatibus veniam. Et reiciendis unde officia et excepturi minus. Ab voluptas rerum sed soluta ea in maxime. Doloribus illo enim aut omnis aut quia. Ratione quos exercitationem sit quod unde cumque sit. Aut dignissimos optio quis.', 0, 'New', 0, 6, '2010-09-23 03:02:33', '1993-04-27 13:42:39'),
(8, 'Feest, Aufderhar and Block', '1990-02-07', '2020-04-13', 'Ipsum sunt quia vero earum adipisci cumque et. Reiciendis distinctio velit ipsa. Pariatur placeat accusamus facilis vel. Aspernatur necessitatibus quia distinctio dolor. Porro ea et quae. Architecto quaerat vel non qui est magnam. Earum impedit suscipit rerum sint maxime quae aut quia. Sequi tempore non adipisci vitae perspiciatis perferendis blanditiis dicta. Repudiandae aliquam inventore et tempora cumque. Excepturi ducimus sint natus sint consequuntur. Veniam libero fugit dolores. Et adipisci aut officia incidunt eos rem repellat. Sed vel et cumque provident et. Aut non reprehenderit odio. Id praesentium similique sint hic optio quod. Quibusdam ut et maxime vel iste id facilis. Et exercitationem est et. Nihil et quod dolor eveniet repellat et. Qui molestias beatae enim sapiente quaerat tempore consequuntur. Molestiae tenetur ratione minus dolorem dignissimos et quaerat. Odio quos amet debitis illo quisquam error enim. Quas perferendis atque quos qui voluptates. Aut itaque repellendus ut laboriosam voluptates. Quia quia hic harum cupiditate aperiam. Odit et impedit magni. Vitae error veniam aliquam nihil ex aut. Molestias sint et asperiores ex nihil assumenda non et. Assumenda sed ea sit. Placeat aut quis rem id. Dolorem necessitatibus velit sed corporis. Aut voluptas non omnis aut. Molestiae ea commodi quo sed sit assumenda et. Et facere sunt aut et et. Aliquam ut accusamus culpa quo officiis. Soluta qui ut cumque mollitia ex sunt alias.', 0, 'New', 0, 6, '2016-02-14 02:13:41', '2005-11-25 16:44:06'),
(9, 'Jaskolski, Funk and Marquardt', '2009-12-18', '1986-01-31', 'Nihil voluptatem dolorum dolorem ipsum maxime. Quos voluptatem et dolorem autem. Optio sunt non aliquid quis. Incidunt inventore dolorem sunt ut quisquam dolor. At nulla repellat accusamus sed beatae. Facilis doloribus harum ut quibusdam aspernatur eaque et. Velit recusandae quis ipsam iusto id sunt. Nostrum distinctio consequatur repellendus quia. Veritatis facilis numquam harum vero in beatae voluptas eligendi. Qui voluptatum excepturi mollitia dolor at magni dolores. Consequatur soluta velit eos saepe. Non quis nobis quae voluptates ipsam praesentium voluptatem. Quia officiis sit alias aliquam. Facere velit quia ut assumenda in. Tempora voluptas commodi ab animi. Vel voluptas impedit incidunt quasi consectetur sed. Eos itaque sit ea sapiente inventore quisquam et aut. Voluptatem quod alias in fugit dolorem. Ut voluptatem dolores at illum. Temporibus laborum eos illo alias rem ab facere. Repudiandae ducimus consectetur ipsam iste sed omnis harum. Maiores deleniti accusantium qui soluta itaque. Sunt incidunt qui magnam dolor accusamus reprehenderit. Et et corrupti provident esse consectetur exercitationem. Blanditiis quis deleniti nostrum aliquam nemo. A a et aut illum. Quibusdam et suscipit cumque perspiciatis qui esse eaque. Repudiandae sint magni hic non. Ab omnis aut iste et enim vitae. Quibusdam eum sint animi aspernatur neque. Ut quis quisquam deserunt et ipsa occaecati qui sed. Eum nam pariatur atque nulla incidunt. At aut et eius blanditiis necessitatibus ut ut laboriosam. Modi voluptatem officia et ab repellat animi odio. Dolor aut vero qui voluptates reprehenderit dolore. Sed qui repellendus quaerat tempora dolorum sed explicabo. Harum sit quas numquam. Quam quis molestiae fuga quos. Et ipsam a sapiente. Ipsum rerum voluptatibus atque rerum.', 0, 'New', 0, 7, '2004-01-16 10:44:43', '1972-07-17 00:19:56'),
(10, 'Denesik, Kovacek and Collier', '1993-02-04', '1973-10-24', 'Ipsum sunt consequatur vitae aspernatur molestiae. Maiores facilis ut ad non consequatur. Consequatur qui qui earum est error error. Consequuntur ut ullam cumque quia voluptates in perspiciatis. Autem consequuntur iusto nisi. Quaerat eligendi consectetur non harum veritatis. Quam exercitationem quibusdam dolor dolore. Exercitationem incidunt officiis accusamus voluptates iusto aut et. Aut voluptate minus qui quisquam accusamus nostrum commodi. Qui cumque doloribus quis vero. Sint illum enim et possimus. Voluptate ipsa quam saepe aut. Corrupti rerum sapiente odit hic rerum. Totam quo assumenda quaerat ipsum quia aut. Nesciunt voluptatem tempore est eligendi. Odio suscipit illum sint beatae aliquid ipsa ut. Voluptatem voluptatum dolor id quia dolor eveniet dolorem. Maxime est illo voluptate. Magnam tempora totam et et possimus aut blanditiis. Enim reiciendis perferendis sed omnis exercitationem quo omnis. Maxime quia cupiditate tempora. Porro et ut est at. Ea sint est qui omnis suscipit quidem aut. Distinctio aperiam corrupti amet non sunt suscipit voluptatem.', 0, 'New', 0, 6, '1972-08-29 18:07:45', '2008-08-30 08:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `TaskName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProjectID` bigint(20) UNSIGNED NOT NULL,
  `AssignedTo` bigint(20) UNSIGNED NOT NULL,
  `AssignedBy` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

CREATE TABLE `task_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TaskDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taskPriority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Low',
  `TaskID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `teamName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamLead` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `teamName`, `teamLead`, `created_at`, `updated_at`) VALUES
(6, 'Test', 3, '2022-09-08 12:43:02', '2022-09-08 12:43:02'),
(7, 'Digital Marketing', 3, '2022-09-09 09:02:02', '2022-09-09 09:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `department`, `designation`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Helena Crist', 'Hegmann-Altenwerth', 'Gislason Group', 'hgleason@example.net', '$2y$10$nADyN3bW99INTUcwjyBXXOEJwGlxubtGVzDhbW91wq5XZeWNb7ti6', '2007-03-07 22:43:47', '2021-06-13 00:58:34'),
(2, 'Shakira Wilderman', 'Stamm, Hermann and Douglas', 'Kunze-Hartmann', 'jett44@example.org', '$2y$10$/qQLEd.2eDdqJlJt83g0neIY6EPC8s0/veuSUieTktywDrBUz9Vce', '1989-12-10 16:44:59', '2016-04-01 08:53:50'),
(3, 'Adonis Rowe', 'Larson Group', 'Boyer, Kovacek and Schoen', 'bkeebler@example.com', '$2y$10$6HHYX6TLbX2ldq.mAJi0g.ERODx3dw7Jo4b.DlnWSNdQ9s1Dz0bjS', '2007-07-23 07:30:47', '2004-08-14 13:19:04'),
(4, 'Simone Zulauf', 'Johnson, Block and Armstrong', 'Paucek Inc', 'danial18@example.com', '$2y$10$r18L5sxoVsimJSNy3cegRupu.omDjiw/Gd7NMrj/4GdvY3OBudACm', '2020-09-26 03:14:11', '2010-04-25 20:51:59'),
(5, 'Ivy Moore', 'Rempel-Heaney', 'Murphy Inc', 'benjamin.smitham@example.net', '$2y$10$YxXQmR86zf.r/DHZo1h5BOdxRfxMlWsbI.J2j6CDeY3SGqJPXyMBC', '1976-02-01 18:02:40', '2014-07-10 23:32:49'),
(6, 'Kaylin Ward', 'Turner-Jerde', 'Macejkovic LLC', 'cecilia32@example.net', '$2y$10$Y6f.pJS5Oq5HEP4Pw6gULuPEywuz3E6RMnirROQNdqX8SbRb/3oTi', '1988-05-06 00:53:46', '1996-01-09 17:29:58'),
(7, 'Osborne Kuphal', 'Herman Inc', 'Schamberger-Mayert', 'jacklyn11@example.com', '$2y$10$7lyh92QFpRaemRDOZEk91u/rQ5MBoXaRGJ3sW8k/B/wuEBmLtv4qW', '1982-04-05 22:12:32', '1995-03-25 05:46:01'),
(8, 'Mackenzie Romaguera', 'Hackett Inc', 'Jacobson Inc', 'ureichert@example.org', '$2y$10$84j4DDHfdddFhXzTrL4LoOhOvNYvNaXfsGqL0ZxaMDcVSHmtF.PZG', '1994-04-04 06:40:16', '1994-11-03 11:28:49'),
(9, 'Madilyn Spinka', 'Volkman, Sanford and Murazik', 'Turner PLC', 'kirlin.dexter@example.com', '$2y$10$ri6VgSkRbGGU6gfBZBhFXOTr9no4ISu12jODe48i42GXjyZNBesPC', '2000-07-25 01:07:33', '1984-03-12 01:46:23'),
(10, 'Kareem Pagac', 'Murphy, Tremblay and Bosco', 'Halvorson LLC', 'wilhelmine.larson@example.org', '$2y$10$5UVznl2cwAzJB5dQjJgUs.jOUzkDMg/wdEtntAlFUnhWacNsRCO1W', '1982-09-17 04:28:21', '2007-07-22 06:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_task_details`
--

CREATE TABLE `user_task_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `Completion_percent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `TaskID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_team`
--

CREATE TABLE `user_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teamID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_team`
--

INSERT INTO `user_team` (`id`, `teamID`, `userID`, `created_at`, `updated_at`) VALUES
(1, 6, 4, NULL, NULL),
(2, 6, 8, NULL, NULL),
(3, 6, 9, NULL, NULL),
(4, 7, 1, NULL, NULL),
(5, 7, 2, NULL, NULL),
(6, 7, 3, NULL, NULL),
(8, 7, 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `projects_teamid_foreign` (`TeamID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `tasks_projectid_foreign` (`ProjectID`),
  ADD KEY `tasks_assignedto_foreign` (`AssignedTo`),
  ADD KEY `tasks_assignedby_foreign` (`AssignedBy`);

--
-- Indexes for table `task_details`
--
ALTER TABLE `task_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_details_taskid_foreign` (`TaskID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `teams_teamlead_foreign` (`teamLead`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_task_details`
--
ALTER TABLE `user_task_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_task_details_taskid_foreign` (`TaskID`);

--
-- Indexes for table `user_team`
--
ALTER TABLE `user_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_team_teamid_foreign` (`teamID`),
  ADD KEY `user_team_userid_foreign` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_details`
--
ALTER TABLE `task_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_task_details`
--
ALTER TABLE `user_task_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_team`
--
ALTER TABLE `user_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_teamid_foreign` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_assignedby_foreign` FOREIGN KEY (`AssignedBy`) REFERENCES `managers` (`manager_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_assignedto_foreign` FOREIGN KEY (`AssignedTo`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_projectid_foreign` FOREIGN KEY (`ProjectID`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `task_details`
--
ALTER TABLE `task_details`
  ADD CONSTRAINT `task_details_taskid_foreign` FOREIGN KEY (`TaskID`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_teamlead_foreign` FOREIGN KEY (`teamLead`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_task_details`
--
ALTER TABLE `user_task_details`
  ADD CONSTRAINT `user_task_details_taskid_foreign` FOREIGN KEY (`TaskID`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_team`
--
ALTER TABLE `user_team`
  ADD CONSTRAINT `user_team_teamid_foreign` FOREIGN KEY (`teamID`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_team_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
