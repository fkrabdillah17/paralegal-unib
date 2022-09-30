-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jun 2022 pada 12.16
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_paralegal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspirations`
--

CREATE TABLE `aspirations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspirasi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aspirations`
--

INSERT INTO `aspirations` (`id`, `name`, `email`, `nomor`, `npm`, `jurusan`, `title`, `aspirasi`, `created_at`, `updated_at`) VALUES
(2, 'Fikri Abdillah', 'fkr.abdillah17@gmail.com', '082390901110', 'G1A018056', 'Informatika', 'KRS S1', 'KRS Rusak', '2022-06-16 01:36:01', '2022-06-16 01:36:01'),
(3, 'Muhammad Fikri Abdillah Arifin', 'fkr.abdillah17@gmail.com', '082390901110', 'G1A018056', 'Informatika', 'ROG', 'Mau ROG', '2022-06-16 01:37:33', '2022-06-16 01:37:33'),
(4, 'Muhammad Fikri Abdillah Arifin', 'fkr.abdillah17@gmail.com', '082390901110', 'G1A018056', 'Informatika', 'Baru', 'Baru', '2022-06-16 04:10:37', '2022-06-16 04:10:37'),
(5, 'Admin', 'yawadvipavt@gmail.com', '082390901110', 'G1A018056', 'Informatika', 'lorem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt facilis, beatae eum reiciendis earum porro laborum veniam consequatur fuga optio eos, quia est nesciunt minima animi expedita dicta ullam cumque vel, officia at. Velit, numquam qui? Totam excepturi rerum soluta. Ullam amet similique tempore saepe fugiat! Molestiae officia quam itaque animi enim esse. Quibusdam suscipit maiores tenetur illo odit sed nemo placeat alias fugit eaque optio velit vero saepe, error ipsam quos rerum ea harum corporis minus totam fuga dolores illum autem? Sapiente sit alias ipsa excepturi cupiditate enim maiores dolor mollitia numquam! Velit, nobis. Excepturi, amet sapiente totam tenetur repellendus itaque molestiae beatae unde hic aliquam veniam nisi. Quos, consequuntur molestiae! Laborum, rem repellendus? Fugiat sequi laudantium placeat ad amet nam, dignissimos est similique aut impedit deserunt molestias necessitatibus quod aliquam ipsum, iste earum dolores maxime rerum. Minima blanditiis itaque nobis facilis exercitationem quaerat, nam ipsa corporis id, veniam quam ratione. Assumenda recusandae similique accusamus tenetur neque dolorum veniam nobis quos pariatur, odio quaerat debitis unde dicta maxime aliquid vel sapiente repellendus necessitatibus molestias nulla quas harum totam accusantium. Itaque consequuntur eveniet adipisci quaerat corporis aliquid animi, non in sint atque fuga voluptate eligendi nam totam, quibusdam, unde amet.', '2022-06-16 14:34:41', '2022-06-16 14:34:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman', 'pengumuman', 1, '2022-06-24 09:45:18', '2022-06-24 09:45:18'),
(2, 'Berita', 'berita', 1, '2022-06-24 09:45:33', '2022-06-24 09:45:33'),
(3, 'Kegiatan', 'kegiatan', 3, '2022-06-24 09:45:46', '2022-06-24 09:45:46'),
(4, 'Prestasi', 'prestasi', 1, '2022-06-24 09:45:55', '2022-06-24 09:45:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contents`
--

INSERT INTO `contents` (`id`, `user_id`, `tag_id`, `category_id`, `title`, `slug`, `description`, `thumbnail`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 'Medali', 'medali', '<div>\n<div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex quod eum fuga aut sed consectetur, assumenda rem obcaecati dolores natus atque velit, facere corrupti vitae officia deserunt veniam repellat odit illo. Delectus ratione unde alias fuga voluptatum praesentium officiis ut rem repellat maxime similique necessitatibus, possimus accusantium quo eligendi dicta nisi aut beatae perspiciatis! Qui voluptatem quaerat voluptates natus, officia ducimus molestiae assumenda quae non dolore nisi dolorem nesciunt. Quibusdam distinctio exercitationem autem eius cumque eos commodi laudantium facere ut! Quidem, molestiae. Repellendus maiores ratione assumenda exercitationem eos saepe temporibus maxime, facere quasi culpa blanditiis tempore velit consequatur nobis rem impedit corporis tenetur magnam minima! Ad optio saepe eum expedita.</div>\n<div>&nbsp;</div>\n<div>Corrupti hic veniam aperiam, aliquid consectetur beatae fugiat exercitationem placeat distinctio perferendis sapiente perspiciatis ipsum ducimus fuga, dolorem quaerat ad cumque, eaque earum libero. Omnis ipsam id voluptatem aliquid inventore eaque neque, repellendus ipsa iure voluptatibus aspernatur corrupti eligendi consequatur ad fugiat eos similique, culpa veritatis cum enim, sed reiciendis quaerat! Molestias unde esse inventore iste eum sit! Quae cumque doloribus exercitationem, distinctio et tempora optio eos facere necessitatibus nesciunt praesentium rerum repellendus modi perferendis officiis quidem id est at vel saepe adipisci consequatur. Expedita ad similique, eaque laborum ea culpa cupiditate neque quisquam asperiores repellat aperiam itaque fugit dolor eligendi temporibus pariatur recusandae esse ex maiores. Aliquid unde excepturi assumenda asperiores voluptatibus fugiat ratione ab molestias doloribus soluta fugit, fuga accusantium in, provident possimus dolorem rem reiciendis numquam. Ipsum voluptate aspernatur quia obcaecati eaque impedit, omnis eos dicta quo.</div>\n</div>', '1656066106661.png', '1', '2022-06-24 10:35:31', '2022-06-24 10:21:46', '2022-06-24 10:35:31'),
(2, 1, 3, 3, 'KBS', 'kbs', '<div style=\"text-align: justify;\"><strong>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati ullam nulla blanditiis at! Accusantium accusamus, laboriosam fuga officiis molestias unde, nobis culpa corporis commodi dolor magni voluptatem saepe voluptatibus neque velit nulla architecto. Ipsum corrupti est provident commodi dignissimos molestiae modi adipisci quibusdam dicta alias, rerum recusandae repellendus illo cumque quod a numquam tenetur laborum voluptas dolorum quaerat eos quas! Numquam molestiae nam aspernatur unde voluptatum natus vitae possimus. Magni facere cumque at ipsum quae facilis optio eos harum, dignissimos eveniet eaque, sunt sed aperiam quo officiis quisquam? Voluptates, libero illo. Rerum quo nisi earum provident cumque.</strong></div>\r\n<div style=\"text-align: justify;\"><hr></div>\r\n<div style=\"text-align: center;\">&nbsp;</div>\r\n<div style=\"text-align: center;\">Nostrum quas quo eligendi, aliquam consectetur corporis inventore voluptatum porro laboriosam placeat! Voluptatum ab a laboriosam voluptates cum aperiam ratione dolores amet perferendis natus deserunt dignissimos repellendus, quaerat reiciendis velit voluptate, deleniti quia architecto soluta libero. Quisquam omnis natus, accusantium beatae eaque iste ducimus corporis nihil doloremque illum laboriosam explicabo, dolor molestiae! Voluptatum iure corporis voluptate quaerat tempore sit quam incidunt. Recusandae, alias! At nobis error natus atque adipisci esse eaque magnam voluptas qui? Temporibus exercitationem labore aut error expedita atque in excepturi possimus eveniet officia. Atque sunt molestias voluptates a doloribus totam harum facilis pariatur doloremque dolor corporis, modi ipsum nihil eos eum voluptas corrupti laudantium maxime.</div>\r\n<div>&nbsp;</div>\r\n<div style=\"text-align: justify;\">Eum, eaque! Veritatis assumenda nihil molestias placeat quas laudantium quos voluptates accusamus optio, iusto deserunt reiciendis saepe et reprehenderit doloremque perferendis aliquam nostrum laborum dolore voluptate odit consectetur quidem exercitationem. Quae inventore fugit quia! Consequuntur repellat beatae doloremque repudiandae dolores ex a aspernatur, excepturi nam reiciendis similique eaque omnis nemo porro minus? Nulla rerum inventore nisi animi ex unde minima, rem repellat repudiandae id quam dolores facere harum quis cum odio quas. Minus harum voluptas nesciunt amet molestias temporibus placeat delectus ut distinctio, ipsa praesentium ea necessitatibus mollitia porro doloremque soluta voluptatum earum! Neque, eius!</div>\r\n<div>&nbsp;</div>\r\n<div style=\"text-align: center;\">\r\n<table style=\"border-collapse: collapse; width: 100%; height: 68.1562px; background-color: rgb(194, 224, 244); border: 1px solid rgb(35, 111, 161); margin-left: auto; margin-right: auto;\" border=\"1\"><caption><span style=\"color: rgb(255, 255, 255);\">Tabel Jumlah Mahasiswa</span></caption><colgroup><col style=\"width: 50%;\"><col style=\"width: 50%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 23.375px;\">\r\n<td style=\"height: 23.375px; border-width: 1px; border-color: rgb(35, 111, 161);\">&nbsp;</td>\r\n<td style=\"height: 23.375px; border-width: 1px; border-color: rgb(35, 111, 161); text-align: center; background-color: rgb(191, 237, 210);\"><span style=\"color: rgb(0, 0, 0);\">Jumlah</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 1px; border-color: rgb(35, 111, 161); text-align: left; background-color: rgb(251, 238, 184);\"><span style=\"color: rgb(0, 0, 0);\">Laki-Laki</span></td>\r\n<td style=\"height: 22.3906px; border-width: 1px; text-align: center; border-color: rgb(35, 111, 161);\"><span style=\"color: rgb(0, 0, 0);\">120</span></td>\r\n</tr>\r\n<tr style=\"height: 22.3906px;\">\r\n<td style=\"height: 22.3906px; border-width: 1px; border-color: rgb(35, 111, 161); text-align: left; background-color: rgb(251, 238, 184);\"><span style=\"color: rgb(0, 0, 0);\">Perempuan</span></td>\r\n<td style=\"height: 22.3906px; border-width: 1px; border-color: rgb(35, 111, 161);\"><span style=\"color: rgb(0, 0, 0);\">45</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>', '1656069612735.png', '1', '2022-06-28 22:03:57', '2022-06-24 11:20:12', '2022-06-28 22:06:51'),
(3, 1, 3, 3, 'Rabes', 'rabes', '<p>Lorem</p>', '1656443331687.png', '1', '2022-06-28 19:08:58', '2022-06-28 19:08:51', '2022-06-28 19:08:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'BPH Inti', 'bph-inti', '2022-06-23 08:16:17', '2022-06-23 08:16:17'),
(2, 'Biro Advokasi', 'biro-advokasi', '2022-06-23 08:27:11', '2022-06-23 08:27:11'),
(3, 'Pembina', 'pembina', '2022-06-29 12:04:10', '2022-06-29 12:04:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(53, '2022_06_16_075436_create_aspirations_table', 2),
(54, '2022_06_16_220455_create_pengaduans_table', 3),
(55, '2022_06_22_034142_create_divisions_table', 4),
(56, '2022_06_22_034335_create_sub_divisions_table', 4),
(57, '2022_06_22_034405_create_positions_table', 4),
(58, '2022_06_22_034422_create_profiles_table', 4),
(59, '2022_06_24_044351_create_tags_table', 5),
(60, '2022_06_24_044614_create_categories_table', 5),
(61, '2022_06_24_044730_create_contents_table', 5),
(62, '2022_06_24_044747_create_comments_table', 5),
(63, '2022_06_28_212532_create_slides_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci,
  `id_pelapor` bigint(20) UNSIGNED NOT NULL,
  `id_penjawab` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `title`, `description`, `status`, `feedback`, `id_pelapor`, `id_penjawab`, `created_at`, `updated_at`) VALUES
(1, 'Mahasiswa Bolos 2', 'Bolos Ke Warnet', '0', NULL, 1, NULL, '2022-06-16 16:12:39', '2022-06-16 17:57:31'),
(3, 'Coba Cepu', 'Mencoba menjadi cepu', '2', 'Gak ada', 1, 1, '2022-06-16 16:49:03', '2022-06-16 17:54:27'),
(4, 'Difitnah Cepu', 'Saya Difitnah jadi seorang cepu', '1', 'Sabar Aja', 2, 1, '2022-06-16 17:06:15', '2022-06-16 17:53:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ketua Umum', '2022-06-28 20:17:56', '2022-06-28 20:17:56'),
(2, 'Sekretaris Jendral', '2022-06-28 20:18:01', '2022-06-28 20:18:01'),
(3, 'Kepala Biro', '2022-06-28 20:18:08', '2022-06-28 20:18:08'),
(4, 'Sekretaris Biro', '2022-06-28 20:18:12', '2022-06-28 20:18:12'),
(5, 'Staff', '2022-06-28 20:18:16', '2022-06-28 20:18:16'),
(6, 'Pembina', '2022-06-30 11:46:48', '2022-06-29 11:46:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `photo`, `division_id`, `sub_division_id`, `position_id`, `created_at`, `updated_at`) VALUES
(10, 'M. Fahmi Alip', NULL, 1, NULL, 1, '2022-06-28 20:19:47', '2022-06-28 20:19:47'),
(11, 'Bunga Mayang Safira', NULL, 1, NULL, 2, '2022-06-28 20:19:57', '2022-06-28 20:19:57'),
(12, 'M. Lapif Muhandis', NULL, 2, NULL, 3, '2022-06-28 20:20:13', '2022-06-28 20:20:13'),
(13, 'Ariestiesa wydioza', NULL, 2, NULL, 4, '2022-06-28 20:20:29', '2022-06-28 20:20:29'),
(14, 'Harri Bagus Akbar', NULL, 2, NULL, 5, '2022-06-28 20:20:52', '2022-06-28 20:20:52'),
(15, 'Evi  Fanias Sidabutar', NULL, 2, NULL, 5, '2022-06-28 20:36:16', '2022-06-28 20:36:16'),
(16, 'Aurora Majestica', NULL, 2, NULL, 5, '2022-06-28 20:53:41', '2022-06-28 20:53:41'),
(17, 'Tiara Rathelita Aprilia', NULL, 2, NULL, 5, '2022-06-28 20:54:05', '2022-06-28 20:54:05'),
(18, 'Oktafiani Zendrato', NULL, 2, NULL, 5, '2022-06-28 20:54:18', '2022-06-28 20:54:18'),
(19, 'Erika Shahwa', NULL, 2, NULL, 5, '2022-06-28 20:54:33', '2022-06-28 20:54:33'),
(20, 'Anisa Larasati', NULL, 2, NULL, 5, '2022-06-28 20:54:43', '2022-06-28 20:54:43'),
(21, 'Ari irawan', NULL, 2, NULL, 5, '2022-06-28 20:55:00', '2022-06-28 20:55:00'),
(22, 'Yoky meliandi', NULL, 2, NULL, 5, '2022-06-28 20:55:16', '2022-06-28 20:55:16'),
(23, 'Khairullah Dzaky Muhammad', NULL, 2, NULL, 5, '2022-06-28 20:55:32', '2022-06-28 20:55:32'),
(24, 'Pembina', NULL, 3, NULL, 6, '2022-06-29 12:04:25', '2022-06-29 12:04:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci,
  `overlay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slides`
--

INSERT INTO `slides` (`id`, `title`, `caption`, `overlay`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Garuda', '<p>Ini Adalah Burung Garuda</p>', 'on', '1656433606350.png', '2022-06-28 16:26:46', '2022-06-28 18:06:23'),
(3, 'Pancasila', NULL, 'on', '1656439552644.png', '2022-06-28 18:05:52', '2022-06-28 18:45:34'),
(4, 'Coba Caption without overlay', '<p>Coba coba</p>', NULL, '1656439630249.png', '2022-06-28 18:07:10', '2022-06-28 18:07:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_divisions`
--

CREATE TABLE `sub_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Berita', 'berita', '2022-06-24 09:26:32', '2022-06-24 09:26:32'),
(3, 'Arsip', 'arsip', '2022-06-24 09:42:22', '2022-06-24 09:42:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Fikri Abdillah Arifin', 'fkr.abdillah17@gmail.com', '2022-06-14 14:09:59', '$2y$10$emLAErtzexTdbfQ917rP.e0bUOER3LxveX.UKiZ58.bVBkfut62B2', 1, 'AGzKKK1ze7cWZe3MH2CHo1GruDI8peDHVYO0tOyp4kT5UxRei92NM8bMMPoR', '2022-06-14 14:09:47', '2022-06-14 14:09:59'),
(2, 'Hilmi Nurhadi', 'healme@gmail.com', '2022-06-16 16:59:26', '$2y$10$ZmqvDziTs6RQVysqUsh7XuIs4kIGqtJ3oZ2vfS9k8SYdt2LoLYk0O', 0, 'cprbcssVSv7CEe3bW8Wm3JIVzj8QKH6jraozKyP0cIyWBR3cqAiUFP43wbI5', '2022-06-16 16:59:09', '2022-06-16 16:59:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aspirations`
--
ALTER TABLE `aspirations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aspirations_title_unique` (`title`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD KEY `categories_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_content_id_foreign` (`content_id`);

--
-- Indeks untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contents_title_unique` (`title`),
  ADD KEY `contents_tag_id_foreign` (`tag_id`),
  ADD KEY `contents_category_id_foreign` (`category_id`),
  ADD KEY `contents_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduans_id_pelapor_foreign` (`id_pelapor`),
  ADD KEY `pengaduans_id_penjawab_foreign` (`id_penjawab`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positions_name_unique` (`name`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_name_unique` (`name`),
  ADD KEY `profiles_division_id_foreign` (`division_id`),
  ADD KEY `profiles_sub_division_id_foreign` (`sub_division_id`),
  ADD KEY `profiles_position_id_foreign` (`position_id`);

--
-- Indeks untuk tabel `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slides_title_unique` (`title`);

--
-- Indeks untuk tabel `sub_divisions`
--
ALTER TABLE `sub_divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_divisions_name_unique` (`name`),
  ADD KEY `sub_divisions_division_id_foreign` (`division_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aspirations`
--
ALTER TABLE `aspirations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_divisions`
--
ALTER TABLE `sub_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `contents_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD CONSTRAINT `pengaduans_id_pelapor_foreign` FOREIGN KEY (`id_pelapor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pengaduans_id_penjawab_foreign` FOREIGN KEY (`id_penjawab`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `profiles_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `profiles_sub_division_id_foreign` FOREIGN KEY (`sub_division_id`) REFERENCES `sub_divisions` (`id`);

--
-- Ketidakleluasaan untuk tabel `sub_divisions`
--
ALTER TABLE `sub_divisions`
  ADD CONSTRAINT `sub_divisions_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
