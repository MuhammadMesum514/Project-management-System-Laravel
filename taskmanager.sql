-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 10:03 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_All_Task_Count_On_Status_Based_On_Project` (IN `projectID` VARCHAR(4))  select TaskName,
   sum(case when task_status = 'New' then 1  else 0 end) as Completed,  -- only count status New
   sum(case when task_status = 'Completed' THEN 1 else 0 end) as New,-- only count status Completed
    sum(case when task_status = 'On Hold' THEN 1 else 0 end) as OnHold,-- only count status On Hold
     sum(case when task_status = 'In Progress' THEN 1 else 0 end) as InProgress,-- only count status In Progress
   count(*) as total
from tasks WHERE tasks.ProjectID=projectID GROUP BY tasks.ProjectID$$

DELIMITER ;

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
(1, 'Carolyne Pouros', '092', 'kratke@example.org', '$2y$10$p2gCHrmdwaKGsufTxEnthu4qN1BZeXecvhp56RSlwoIULicx9ZGX.', NULL, '1971-03-30 23:30:15', '1985-11-13 12:22:46'),
(2, 'Noble Kiehn', '592', 'dnienow@example.com', '$2y$10$qRkUNkXGnIohV/3EumK/8O7.m7zLynAyXCcbr6Uz.vrmaRuf6UU7q', NULL, '2000-12-04 08:31:47', '1975-05-30 10:16:47'),
(3, 'Noemi Beer Sr.', '413', 'rlueilwitz@example.net', '$2y$10$662TuC3yOp6HAZn98T5CRekmoPFW1aoa/CjSdGVOYBj.uGThulLUm', NULL, '1996-12-17 04:12:25', '1982-03-11 00:02:51'),
(4, 'Ms. Clara Williamson', '507', 'jgottlieb@example.com', '$2y$10$IKZ1i5oj/xNsVORya0slqOhRaJ36yMTeBFxILCLv3oDWfP1DIPW7u', NULL, '2008-04-14 03:56:08', '2014-09-03 12:46:28'),
(5, 'Lorna Towne', '060', 'jimmy.lowe@example.com', '$2y$10$s8OH3YwEMfuJfh/E6UXBgujQ276abesWtu8V8CjRKUsHNcWNs.MlG', NULL, '1997-07-22 05:52:18', '2011-11-14 12:17:17'),
(6, 'Elsa Haag', '387', 'ryder.gibson@example.org', '$2y$10$hNoyiTzjUGBaVraNbLQB5eG.DLNtz..y2SR5hMf/8i2gLwEAqh2Ui', NULL, '1982-07-08 22:51:06', '2006-05-26 13:15:24'),
(7, 'Jasmin O\'Conner', '720', 'bayer.reanna@example.com', '$2y$10$JNm6AmIOubxRFZNBLisTLeE6nlRyGtq2d6jj.d/Rr7KsgMMzg.hQ.', NULL, '2015-10-05 23:28:28', '1978-04-07 09:10:10'),
(8, 'Dr. Deven Bednar', '810', 'birdie50@example.com', '$2y$10$Z9PYui6VS78F9e1kumcSlOjROQ9cfV6X6LWXwZV78uJUhdfHVvjKS', NULL, '2005-02-01 11:34:53', '1997-08-27 20:06:03'),
(9, 'Heather Lesch', '521', 'nschulist@example.com', '$2y$10$TG127mM0vJthJM8i.VrEUudrTvGF5VrtrUn3OJ0kkojeAbsZjqXve', NULL, '1988-05-29 23:38:45', '2012-10-22 20:29:26'),
(10, 'Nayeli Harris I', '583', 'leuschke.dessie@example.net', '$2y$10$bvjS0wlrQCjTwzlDkOmP1eQScR1ghdVzkj4wd/3wf8M.uoWzZWfLa', NULL, '1988-08-14 14:28:20', '1990-01-17 06:28:18');

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
(1, 'Shyann Blick', 'Hammes, Kilback and Botsford', 'Volkman-McGlynn', 'egleason@example.org', '$2y$10$QWr/eqQo1V6ZVnikcj5jrOsbR81pegCUjDPxxfXelcNbwznVqxZOW', NULL, '2013-05-17 15:33:04', '1973-07-25 06:17:27'),
(2, 'Mrs. Pink Hayes', 'Quigley Inc', 'Becker, Keebler and Satterfield', 'cwest@example.net', '$2y$10$wnfB.B47MI09NlzfGX71buocEgoSHdxuI/IHJG203uQO22mxwbJTa', NULL, '1980-05-29 03:35:38', '1974-01-20 19:06:58'),
(3, 'Mr. Eldon O\'Hara DDS', 'Rolfson, Schmeler and Kerluke', 'Larson, Crist and Gorczany', 'quitzon.zack@example.org', '$2y$10$VLuSpUVHLeWhxy4AbquGGOh/tTtuzGqlLoWKIDuml0fnyeTwBD7Eq', NULL, '1983-10-08 11:40:36', '2001-12-12 13:00:57'),
(4, 'Maximus Bode', 'Tillman, Ankunding and Hudson', 'Klein-Barrows', 'athena05@example.com', '$2y$10$ZV.JjEHMePYBPfSMPeqCa.RQ8FTz3r/SKsI5.264Z/FU4LnNHM7FK', NULL, '2021-07-10 07:19:20', '2003-05-24 04:04:37'),
(5, 'Melvina Hyatt', 'O\'Reilly-Cole', 'Anderson, Skiles and Orn', 'vkoepp@example.org', '$2y$10$adRnHwuNmI0SRJsBWW11Hu6SjJa7LZYjEw/2T7zSg7bVlkQ4/F8z2', NULL, '2005-06-11 13:47:21', '1978-02-24 17:59:24'),
(6, 'Mr. Caleb Murray III', 'Stehr, McClure and Simonis', 'Gerhold-Jaskolski', 'shany49@example.net', '$2y$10$LYwySkJHs2mOS/XmZl5aRuHXOVEUZOd0cYvQ3g6PTv30exs3VrBAi', NULL, '1974-06-08 06:12:32', '1998-07-07 04:15:51'),
(7, 'Mr. Christophe Vandervort', 'Ziemann, Kohler and Schneider', 'Jast-Ankunding', 'qbayer@example.com', '$2y$10$upawn1UlFR25H3kpawFVx.XPLEqynQW9XS8aWUPML4YfFv0TmPzEa', NULL, '1987-03-09 12:58:59', '1983-07-21 07:43:32'),
(8, 'Bernadine Padberg Jr.', 'Schulist-Hudson', 'Stamm-Halvorson', 'tyrel51@example.com', '$2y$10$B6GtH29Pg526caVUjU0AJu6qyC5wKk6IMmSmF3QeJlHmnn68rWYTe', NULL, '2016-05-06 14:14:53', '1972-11-02 12:57:50'),
(9, 'Ines Sanford V', 'Romaguera, Langworth and Abshire', 'Wehner, Jakubowski and Bosco', 'lynn01@example.org', '$2y$10$C/lPaMrtoaee4JGtXksN8.3J93cn1mSCNCfGn1MTUG8buE46fg8iC', NULL, '1973-07-15 01:42:59', '1991-02-19 06:53:20'),
(10, 'Alphonso Turner', 'Dietrich-Rutherford', 'Klocko-Renner', 'edouglas@example.org', '$2y$10$W6CUuGNtu4QS4MhNiAVR.eTTbGKZu6wGol7ku5Mj54N0MJnv7/D.u', NULL, '1977-05-05 04:09:39', '2003-09-13 15:51:38');

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
(15, '2022_09_06_153053_create_tasks_table', 2),
(16, '2022_09_06_153109_create_task_details_table', 2),
(17, '2022_09_06_160255_create_user_task_details_table', 2);

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
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `progress` int(11) NOT NULL DEFAULT 0,
  `TeamID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `ProjectName`, `start`, `End`, `ProjectDescription`, `is_completed`, `status`, `progress`, `TeamID`, `created_at`, `updated_at`) VALUES
(1, 'Predovic LLC', '2000-05-05', '1975-10-31', 'Et eligendi harum voluptates aut consequatur. Ab omnis non sit sint rerum voluptatibus nihil. Eveniet nobis commodi ea repudiandae. Et quia doloremque vitae perferendis ea et veritatis commodi. Dignissimos et quis ipsam suscipit quia. Perferendis laudantium quo ducimus hic explicabo quisquam omnis consectetur. Et laboriosam debitis magni rerum. Consequatur consequatur id voluptatibus excepturi nostrum cupiditate. Voluptas voluptas veritatis commodi earum fugit officiis. Accusantium voluptatem exercitationem sed ab officia. Vel eligendi vero consequatur qui. Qui inventore dolor quia eum dolorem eveniet. Illo vel reprehenderit illum porro sed. Corporis numquam facere doloremque neque repellendus culpa magnam eveniet. Ea non consequatur perferendis sed id perspiciatis. Est quis dolor ad quod. Est vel et expedita ut molestiae qui. Aut minima amet recusandae eos aut in quod nobis. Quas et voluptatem consequatur dolorem similique. Quis voluptatem veniam est ea.', 0, 'New', 0, 1, '2005-07-14 19:54:30', '2022-08-05 20:41:20'),
(2, 'Metz Group', '2004-12-15', '2015-01-11', 'Officiis sit pariatur qui veniam assumenda. Earum libero ut nostrum enim sint dicta doloremque voluptas. Sint veritatis excepturi accusamus id optio. Nisi repellendus voluptatem dignissimos ullam rem ut labore. Explicabo qui corporis amet. Iure officia quae et sunt praesentium voluptates. Laudantium quae asperiores iste assumenda. Sed est repudiandae commodi voluptatem dolorum. Odio maxime omnis et voluptas voluptate. Hic error perferendis autem voluptas sit recusandae. Sint doloremque consectetur illum corporis. Sequi sit voluptatem voluptatibus corporis. Ut et corporis beatae sunt qui sint. Odit voluptatum laudantium modi amet officiis quod. Ut ratione architecto et minus unde quam et. Esse et maxime et quis ea quia eveniet. Voluptas sunt necessitatibus illo sint. Expedita recusandae libero rerum qui eligendi unde voluptates. Consectetur quaerat minus in dolor possimus necessitatibus. Qui voluptatum velit quas sit nostrum. Illum molestiae quia vel veritatis quo sed. Quidem est in modi sed qui. Sit perferendis dignissimos incidunt explicabo ab cumque. Molestiae ipsum omnis inventore quia vel quaerat vero. Maiores distinctio impedit numquam cum dolores molestias in. Non voluptatem a doloremque et voluptas sunt. Cupiditate debitis cum aut tempora consectetur. Repellendus molestias excepturi voluptatem commodi. Similique nesciunt repellendus ipsum veritatis. Facere natus similique suscipit quibusdam qui dolores autem. Aut quo quia vitae quasi assumenda eligendi ea. Eos impedit debitis quo laboriosam vel. Rerum et ut id magnam consequatur eum sapiente ab. Voluptas beatae inventore amet doloribus nam expedita. Consequatur magni earum maiores rerum et natus.', 0, 'New', 0, 2, '1971-09-23 20:03:24', '2005-03-18 15:16:27'),
(3, 'Schaden, Bins and Hermiston', '2020-10-23', '1981-01-26', 'A quisquam facilis a quod est a non et. Illum qui ipsum sed voluptatum dolorem. Quo voluptatem quo laboriosam qui. A animi sit quisquam hic. Porro ipsum autem ut illo assumenda. Autem porro quam et quasi enim. Molestiae quia modi qui laboriosam voluptatem soluta. Unde provident animi vitae consectetur. Recusandae officiis sunt autem explicabo. Voluptatem et et cumque aut magnam sed est dolorum. Impedit sunt occaecati esse amet recusandae. Odit soluta omnis aspernatur nihil. Expedita similique omnis quae. Repudiandae sed consequatur soluta hic quia dignissimos error. Qui consequatur aut sunt architecto distinctio rerum ipsum. Accusamus maxime sint praesentium. Provident blanditiis dolore ad totam. Ut ipsa eaque fugit tempora iusto error. Quia autem dicta vitae fugit esse. Ut possimus iste ducimus rem reiciendis enim eum id. Inventore in voluptates et minus distinctio. Quia vero illo aut repudiandae sunt. Sunt commodi est magni id consectetur autem illum. Dolore et ut impedit nesciunt magni. Molestias molestias voluptate unde nihil rerum aut. Expedita a explicabo hic dicta commodi. Fugit ratione quibusdam delectus possimus mollitia dolorem facilis occaecati. Fugiat sint facere officiis et id autem. Optio soluta natus voluptates in. Sed laborum at omnis possimus deserunt quia qui. Dicta accusamus quia omnis ipsam nihil animi. Autem aut iste esse corporis ratione sit.', 1, 'Done', 100, 1, '1993-07-14 22:38:30', '2022-09-14 19:00:00'),
(4, 'O\'Conner Ltd', '2008-10-09', '2015-05-29', 'A quisquam facilis a quod est a non et. Illum qui ipsum sed voluptatum dolorem. Quo voluptatem quo laboriosam qui. A animi sit quisquam hic. Porro ipsum autem ut illo assumenda. Autem porro quam et quasi enim. Molestiae quia modi qui laboriosam voluptatem soluta. Unde provident animi vitae consectetur. Recusandae officiis sunt autem explicabo. Voluptatem et et cumque aut magnam sed est dolorum. Impedit sunt occaecati esse amet recusandae. Odit soluta omnis aspernatur nihil. Expedita similique omnis quae. Repudiandae sed consequatur soluta hic quia dignissimos error. Qui consequatur aut sunt architecto distinctio rerum ipsum. Accusamus maxime sint praesentium. Provident blanditiis dolore ad totam. Ut ipsa eaque fugit tempora iusto error. Quia autem dicta vitae fugit esse. Ut possimus iste ducimus rem reiciendis enim eum id. Inventore in voluptates et minus distinctio. Quia vero illo aut repudiandae sunt. Sunt commodi est magni id consectetur autem illum. Dolore et ut impedit nesciunt magni. Molestias molestias voluptate unde nihil rerum aut. Expedita a explicabo hic dicta commodi. Fugit ratione quibusdam delectus possimus mollitia dolorem facilis occaecati. Fugiat sint facere officiis et id autem. Optio soluta natus voluptates in. Sed laborum at omnis possimus deserunt quia qui. Dicta accusamus quia omnis ipsam nihil animi. Autem aut iste esse corporis ratione sit.', 0, 'In progress', 55, 1, '2011-11-07 17:31:17', '2022-09-14 19:00:00'),
(5, 'Lynch, Shanahan and Ziemann', '1977-03-08', '2005-06-12', 'Autem enim eum sit qui. Nemo vel aut et vel aut corporis. Odit in neque deserunt totam aut quis non labore. Facilis voluptas sit in eum. Ad iste repellendus exercitationem sit et odit ratione. Et provident quia qui optio autem laboriosam. Consequatur repellendus provident et eligendi eius ipsa. Consequatur nam est in totam. Dolorum qui accusantium nostrum necessitatibus est nam quo rerum. Doloremque rerum quasi qui nam. Molestiae eos quibusdam sed minus ut ut amet. Voluptatem laboriosam natus dolor. Qui est eos officia veniam. Reiciendis mollitia quidem ut possimus sit. Rerum amet dicta commodi optio sapiente error sequi molestias. Commodi ea perspiciatis ut placeat ipsam. Neque tempora placeat cupiditate explicabo voluptatem voluptatem qui. Quae autem omnis est sint. Facilis recusandae dolorem dicta eligendi ea. Officia modi dicta molestias sint iusto. Corrupti quod odit quos pariatur voluptatem voluptas. Quod placeat similique assumenda id eligendi aspernatur. Deserunt consectetur ut natus qui sit perspiciatis reiciendis cum. Quisquam repellendus dolor harum ut voluptatibus odio laboriosam. Modi et et officiis harum quisquam explicabo. Neque consequatur consequatur corrupti quo et saepe. Quidem optio ab vero numquam. Corporis quaerat rerum voluptatem quis voluptatem dicta porro autem.', 0, 'New', 0, 2, '1999-05-18 03:33:46', '1993-04-21 17:21:01'),
(6, 'Borer-Gleason', '1970-06-29', '2013-03-16', 'Laborum assumenda rerum consequatur enim est saepe. Rem sit vitae repellendus sed. Suscipit dignissimos rerum sed omnis ut a. Nihil eum laudantium tempore. Sed nam reprehenderit magnam est. Incidunt vel animi est esse reiciendis magnam. Adipisci enim eligendi dolore voluptas accusantium. Sed est maxime non alias. Molestiae cumque ea consequatur unde. Consequatur cupiditate dolorem quod ut. Blanditiis rerum quasi eos natus. Eum non enim consequatur corrupti ab error quidem et. Non accusantium aperiam qui sit rerum quo deserunt. Molestiae aliquid odio impedit quo quis. Dolore molestias eos quia natus dicta ut modi. Voluptatem molestiae dolor omnis consectetur ducimus ut est porro. Et incidunt et voluptatibus est aliquam. Vel dolorem omnis temporibus nam error quasi. Aut sed eaque molestias fuga molestias.', 0, 'New', 0, 2, '2020-10-22 15:50:17', '2020-08-13 13:53:25'),
(7, 'Grant-Hessel', '1994-07-29', '1976-03-04', 'Aut dignissimos nam nihil ea aut numquam. Minus alias perspiciatis consequatur praesentium. Nobis eligendi non fuga ratione sunt. Quo itaque animi explicabo qui ut. Quae veniam est sit dolorum rerum optio qui. Facere delectus aliquam blanditiis voluptates consectetur totam. Est ducimus omnis autem iusto occaecati. Voluptas numquam officiis voluptatum deleniti rerum. Deserunt voluptate vel eaque itaque. Quae qui voluptate quia eius aut facilis. Non ipsam fuga sed sint necessitatibus commodi ut dolores. Dolorum enim possimus delectus assumenda enim esse illo ut. Laboriosam eos maiores molestias accusantium aut. Quidem asperiores in ipsam minus velit et. Aut dolor dolores et fugit. Minima dolorem saepe cupiditate animi saepe. Nisi libero dolorem aut officiis odit fuga soluta velit. Fuga cupiditate asperiores reprehenderit. Aut sit praesentium sed nesciunt quas quia. Non voluptas aliquid qui molestiae. Dolorem dolor saepe commodi ducimus voluptatem recusandae autem maxime. Quam repellendus voluptatum quibusdam accusantium vero occaecati. Id hic eos iste ut. Quae recusandae magni blanditiis qui. Nihil labore fugit veniam ut iusto nulla quia esse. Neque quo aut tempora dolores est et. Repudiandae qui sed quia rerum ex nobis. Ducimus perferendis ut sed nulla dolores cumque cupiditate. Qui a nisi illum laudantium at. Eum aperiam omnis dolores sit voluptates labore cupiditate.', 0, 'New', 0, 1, '1976-05-24 05:33:40', '1990-06-12 20:50:55'),
(8, 'Crooks LLC', '1998-03-24', '1984-01-23', 'Nam autem porro et. Officia nostrum fuga quia doloribus. Facere numquam rem voluptatem iste ipsam maiores natus facere. Dolorum praesentium exercitationem ducimus et et. Aut saepe ab libero et quos reprehenderit eum. Et repudiandae sint consectetur quis placeat quo mollitia. Id molestiae qui soluta debitis eum est voluptatum. Accusantium fugiat perspiciatis nisi. Non sed culpa occaecati magnam aliquid. Est vel et sit impedit. Rerum in et repellendus at. Ut dolorem accusantium non eos. Quia et suscipit doloribus quos. Velit et necessitatibus qui voluptas id voluptas. Dolore enim et est aut unde. Doloribus similique blanditiis sit eum facere sed sunt. Non repellendus aliquid suscipit placeat consequatur. Delectus cum corrupti et voluptatem quod. Sapiente occaecati officia magnam est qui placeat tenetur explicabo. Dolores omnis est officiis qui deleniti. Repellat pariatur voluptatem dicta. Iure dolorem est enim inventore ut fuga. Dolores quo laborum ut ex non. Voluptas occaecati officiis est dolorum in reiciendis. Voluptatem ratione dolor sit ut consectetur.', 0, 'New', 0, 1, '2019-09-10 06:07:44', '1990-04-04 06:41:40'),
(9, 'Swift, Pagac and Rohan', '2012-07-23', '1971-05-17', 'Ducimus et beatae aliquam incidunt aliquid a aut. Tempore soluta impedit dolor non debitis asperiores qui. Impedit officia sed ut rerum quae dolores. Culpa vero distinctio sapiente soluta. Exercitationem sed corporis ipsum pariatur aut. Ut id quaerat amet et quo. Repellendus rerum quibusdam animi quisquam qui ut aperiam. Minima delectus voluptas impedit odit distinctio reprehenderit consectetur. Et debitis illum aperiam. Molestias ducimus nobis libero est debitis voluptatibus. Quae consequatur dolores est voluptatem repellendus aut in. Itaque ea omnis dolores qui vitae qui iusto ab. Fuga dignissimos at eos maxime perspiciatis. Eum velit beatae aut hic eaque. Nihil facilis est possimus architecto. Et temporibus ea laudantium. Officia magni ut ducimus omnis. Nobis totam deserunt voluptas qui qui qui in dolores. Ullam ut aut ratione eaque debitis necessitatibus. Cum ut rem ipsum deleniti in aut. Ratione ullam aut consectetur voluptas vel sint et. Rerum doloremque quas aspernatur molestiae. Expedita nobis sit porro vel asperiores cupiditate. Doloremque explicabo eum quod. Provident voluptatem aut molestiae sunt autem. Rem qui reiciendis voluptatum eius. Dolorem labore error saepe consequatur delectus officiis perspiciatis. Reprehenderit ullam accusamus ut cumque et ut dignissimos. Officia facilis repellat accusantium autem nulla sint. Rerum non earum molestiae dolores deserunt et sit. Non voluptas iure tenetur voluptas quos dolores est molestiae. Aut dolor aliquid et libero id nesciunt quia et. Quia laboriosam vel deserunt odio blanditiis numquam deserunt. Minus maxime rerum qui unde.', 0, 'New', 0, 1, '2020-02-04 15:05:34', '1985-06-18 23:30:56'),
(10, 'Brown, Kris and Gaylord', '1997-10-14', '2003-11-05', 'Ipsum est ut eaque eum cumque mollitia quisquam. Eos velit rem nam. Qui iure harum quaerat dignissimos ut quis. Harum rerum officiis omnis et eum. Vero eos rerum dignissimos earum expedita at. Consectetur consectetur voluptatem et eum ut similique. Odio est corporis nulla eos. Odio officia sint beatae unde debitis maiores cumque. Provident dolorum quasi culpa quia nostrum. Tempora sunt aut sed labore. Fuga a exercitationem et est aut. Voluptatem dolor repudiandae earum quasi et. Blanditiis impedit necessitatibus quod id distinctio magni. Vel eaque est exercitationem quo ea. Dolorem excepturi et pariatur aperiam sint excepturi. Atque minus rerum quia consequuntur et. Sint beatae ipsa omnis eos. Est id animi dicta. Quis ipsam similique pariatur omnis. Suscipit soluta eos natus aut laborum. Vero vitae neque ut aspernatur. Officiis rerum voluptate vel veniam voluptates dicta minus. Cum consequatur libero hic ipsam expedita neque laudantium. Repellendus aut et odit rerum culpa consequatur. Labore pariatur consequatur quis libero. Consequatur aut dolores voluptatem atque.', 0, 'New', 0, 1, '1990-12-21 00:39:16', '2018-11-24 00:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `TaskName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `task_status` enum('New','On Hold','In Progress','Done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `Completion_percent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ProjectID` bigint(20) UNSIGNED NOT NULL,
  `AssignedTo` bigint(20) UNSIGNED NOT NULL,
  `AssignedBy` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `TaskName`, `deadline`, `task_status`, `is_completed`, `Completion_percent`, `ProjectID`, `AssignedTo`, `AssignedBy`, `created_at`, `updated_at`) VALUES
(1, 'New Task', '2022-09-20', 'New', 0, 0, 1, 1, 1, '2022-09-15 18:21:46', '2022-09-15 18:21:46'),
(2, 'Completed Task', '2022-09-23', 'Done', 1, 100, 4, 2, 1, '2022-09-15 18:24:35', '2022-09-15 18:24:35'),
(3, 'On Hold Task', '2022-09-23', 'On Hold', 0, 10, 4, 3, 1, '2022-09-15 18:25:35', '2022-09-15 18:25:35'),
(4, 'In Progress Task', '2022-09-23', 'In Progress', 0, 70, 4, 4, 1, '2022-09-15 18:25:35', '2022-09-15 18:25:35');

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
(1, 'Digital Marketing', 1, '2022-09-15 08:33:51', '2022-09-15 08:33:51'),
(2, 'Medical Billing', 2, '2022-09-15 08:34:11', '2022-09-15 08:34:11');

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
(1, 'Kelley Larkin', 'Hackett Group', 'O\'Kon, Prosacco and Balistreri', 'alexie67@example.com', '$2y$10$QsbbsRoniWzT31yAqSyuk.ckvRRH837moJA49Ghb83VqqqBveEQc2', '1992-05-03 01:39:01', '1992-08-26 00:12:18'),
(2, 'Kattie Bauch', 'Robel, Stanton and Conroy', 'Gaylord-Boyer', 'cgibson@example.org', '$2y$10$fmmH4V368CYmdq29lhX3q.24c7QMwmCF0hqKSxrjKS0V51.d7EK9y', '2019-05-13 18:31:13', '1978-03-24 17:44:07'),
(3, 'Dr. Collin Wunsch II', 'Feest LLC', 'Rowe-Rempel', 'kprosacco@example.org', '$2y$10$64k0/dDfjxqtnPjjo9PCj.LYJ3FE/LIEI60O9iWEsOTQm2jcq3LIW', '2012-07-30 12:27:53', '1991-04-05 11:41:10'),
(4, 'Ian Murazik', 'Mueller Group', 'Stiedemann Inc', 'rlehner@example.net', '$2y$10$5YmlwQWLT5tExxaSam0U2.9.U6wtpa8d.QkMJxjxOUD1zAFFs3/ye', '1970-04-15 14:06:52', '2010-04-20 00:20:18'),
(5, 'Lindsay Daugherty', 'O\'Reilly Group', 'Kiehn-Yundt', 'stamm.gabriel@example.com', '$2y$10$4.QUSuYF5OExUf9iFXzJBOYd/1PzBijGmByNp2exCfiPW7Yv0fWCa', '1975-01-23 00:23:23', '1978-01-04 06:30:23'),
(6, 'Chauncey Hackett V', 'Breitenberg, Schamberger and Eichmann', 'King Ltd', 'mosinski@example.org', '$2y$10$1RC4G4ldtY9EXPEHxKDoJuOtDwEcEfz7cgA8Hir0Zgu9IivlJEi9q', '2006-10-08 10:27:41', '2006-04-08 23:31:51'),
(7, 'Tristian Kozey', 'Rolfson and Sons', 'Rolfson-Schoen', 'edamore@example.org', '$2y$10$n88hUVT924e301zLSHF03O7asJ8lLL3YP3Fqo7nf5uj2kPwMv4dLu', '2007-12-22 09:15:17', '2005-03-30 17:53:00'),
(8, 'Newell Baumbach IV', 'Beer-Toy', 'Welch, Stroman and Larson', 'koch.koby@example.net', '$2y$10$fAcQqjNAwTGwSF/bQjMbfucuy9sUPwgJ.zxr75xMOtmwML7.gG12S', '1973-04-18 14:51:14', '1974-04-10 06:00:24'),
(9, 'Rosario Fisher', 'Muller, Farrell and Bailey', 'Mohr and Sons', 'chase.jaskolski@example.org', '$2y$10$/iIb3KWJMwGubCirRpB.ROQM0NKoyzsbl/iGtvWEalrH37RwlJ/F6', '2005-04-21 16:14:44', '1988-06-28 19:38:34'),
(10, 'Sammy Dach V', 'Heller and Sons', 'Erdman, Kessler and Wiza', 'israel.renner@example.net', '$2y$10$hvbZyaiLz.MAYVAqJIYfOuKp/oXjjGREt1Nerv.G5s3PV1VQEK6.e', '1971-04-07 21:53:07', '2013-04-23 02:15:40');

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
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 2, 7, NULL, NULL),
(6, 2, 8, NULL, NULL),
(7, 2, 9, NULL, NULL),
(8, 2, 10, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_details`
--
ALTER TABLE `task_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `teams_teamlead_foreign` FOREIGN KEY (`teamLead`) REFERENCES `managers` (`manager_id`) ON DELETE CASCADE;

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
