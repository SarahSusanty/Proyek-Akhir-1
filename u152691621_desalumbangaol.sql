-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2021 at 07:02 PM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u152691621_desalumbangaol`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDisplay` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `idDisplay`, `created_at`, `updated_at`) VALUES
(4, 'Album Pantai Sunset Beach', 'Berisi foto-foto dari pantai sunset beach tambunan.', 74, '2020-12-17 14:50:45', '2020-12-17 14:50:45'),
(11, 'Album Water Park Toba Mountain', 'Berisi foto-foto dari Water Park Toba Mountain desa  Lumban Gaol Tambunan', 89, '2021-01-07 10:43:03', '2021-01-07 10:43:03'),
(12, 'Album Seni Tenun', 'Berisi foto-foto kesenian di bidang Tenun', 28, '2021-01-07 10:44:42', '2021-01-07 10:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `album_picture`
--

CREATE TABLE `album_picture` (
  `idAlbum` bigint(20) UNSIGNED NOT NULL,
  `idPicture` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album_picture`
--

INSERT INTO `album_picture` (`idAlbum`, `idPicture`, `created_at`, `updated_at`) VALUES
(4, 72, '2020-12-17 14:50:45', '2020-12-17 14:50:45'),
(4, 74, '2020-12-29 15:14:35', '2020-12-29 15:14:35'),
(4, 85, '2021-01-06 17:14:30', '2021-01-06 17:14:30'),
(4, 86, '2021-01-06 17:16:01', '2021-01-06 17:16:01'),
(11, 89, '2021-01-07 10:43:03', '2021-01-07 10:43:03'),
(12, 28, '2021-01-07 10:44:42', '2021-01-07 10:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `album_video`
--

CREATE TABLE `album_video` (
  `idAlbum` bigint(20) UNSIGNED NOT NULL,
  `idVideo` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aspirations`
--

CREATE TABLE `aspirations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspiration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('approved','rejected','waiting','blocked') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aspirations`
--

INSERT INTO `aspirations` (`id`, `idUser`, `topic`, `aspiration`, `status`, `created_at`, `updated_at`) VALUES
(15, 11, 'Keamanan', '<p>Semoga pada pantai dibuat pembatas dangkal dan dalam. Agar berenang lebih nyaman</p>', 'approved', '2021-01-05 00:17:30', '2021-01-05 00:17:30'),
(17, 17, 'Topik : Kebersihan', '<p>Semoga Kebersihan yang berada di sekitaran Tempat Wisata tetap terjaga.</p>', 'waiting', '2021-01-07 14:32:38', '2021-01-07 14:32:38'),
(18, 17, 'Topik : Keamanan', '<p>semoga keamanan di sekitaran tempat wisata aman dan tentram.</p>', 'approved', '2021-01-07 14:42:11', '2021-01-07 14:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Seni', '2020-12-06 18:11:01', '2020-12-06 18:11:01'),
(2, 'Agama', '2020-12-07 10:44:11', '2020-12-07 10:44:11'),
(4, 'Kuliner', '2020-12-29 14:56:24', '2020-12-29 14:56:24'),
(6, 'Wisata', '2020-12-29 14:56:24', '2020-12-29 14:56:24'),
(7, 'Budaya', '2020-12-29 14:56:24', '2020-12-29 14:56:24'),
(8, 'Sosial', '2020-12-29 14:56:24', '2020-12-29 14:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `data_web`
--

CREATE TABLE `data_web` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('links','slider','header','text','logo','background') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_web`
--

INSERT INTO `data_web` (`id`, `name`, `information`, `picture`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Slide Beranda', 'Pariwisata Desa Lumban Gaol |<p><em>&quot;Marsipature Hutana Be&quot;</em></p>#Desa Lumban Gaol Tambunan|<p>&nbsp;Semilir angin berhembus menyapu setiap pepohonan, sawah-sawah, dan rumah warga. Sepanjang mata memandang terlihat hamparan tanaman padi yang menghijau dan tumbuh subur beratmosfir sejuknya udara yang bersih tanpa polusi.</p>#Sunset Beach Tambunan|<p>Sunset Beach adalah&nbsp;salah satu pantai yang berada pada desa wisata ini.&nbsp;<br />Pantai ini sangat indah,terlebih kita dapat melihat matahari tenggelam dengan sangat memukau.</p>', 'LumbanGaol-SliderHome-2.jpeg#Lumban-Gaol_Video-1033531509-1610012101.jpg#Lumban-Gaol_Video-1038131923-1610012104.jpg', 'slider', 'Data web ini berada pada halaman beranda, atau halaman awal page', '2020-12-06 17:08:30', '2021-01-07 16:42:26'),
(2, 'Tentang Desa', '<p>Lumban Gaol adalah sebuah desa indah yang berada di kawasan pinggiran Danau Toba, Kecamatan Balige, Kabupaten Toba Samosir, Sumatera Utara. Kepala Desa Lumban Gaol saat ini adalah Edward Tambunan.&nbsp; Mayoritas penduduk Desa Lumban Gaol adalah suku Batak Toba dan pemeluk agama Kristen. Dalam aspek sumber mata pencaharian utama, penduduk desa ini bekerja sebagai petani atau buruh tani di lahan pertanian yang umumnya ditanami padi sebagai tanaman utama.Tak heran jika di kiri-kanan jalan desa terlihat hamparan tanaman padi yang tumbuh subur.&nbsp;</p><p>Sektor wisata cukup berkembang sebagai bagian dari destinasi Danau Toba. Desa Lumban Gaol sangat menjaga kebersihan dan keindahan desa sehingga kunjungan wisatawan ke daerah ini terus meningkat. Bahkan, pada 2017, Desa Lumban Gaol menyabet juara I Lomba Kebersihan Pinggiran Danau Toba mengalahkan tujuh kabupaten lainnya.</p><p>untuk lokasi desa lebih detail, dapat dilihat pada map dibawah ini.</p>', 'Lumban-Gaol_File-1393576034-1609239298.png', 'text', 'Data web ini berada pada halaman beranda, atau halaman awal page', '2020-12-06 17:10:00', '2021-01-07 14:36:52'),
(3, 'Temukan Kami Disini', '<p>Desa Lumban Gaol Tambunan berada dekat dengan pinggiran danau toba, dimana dengan keterangan sebagai berikut:</p><p>Provinsi : SUMATERA UTARA<br />Kabupaten/Kota : KABUPATEN TOBA SAMOSIR<br />Kecamatan : BALIGE<br />Desa/Kelurahan : LUMBAN GAOL<br />Kodepos : 22312<br />Tahun Pembangunan: 2013</p><p>Desa kami selalu terbuka untuk anda, mari kunjungi desa&nbsp;kami.</p>', NULL, 'text', 'Data web ini berada pada halaman beranda, atau halaman awal page', '2020-12-06 17:10:19', '2021-01-07 15:22:04'),
(4, 'Dashboard Admin', '<p>Selamat datang di dashboard admin, pertama tujuan dari halaman admin adalah untuk mengatur segala kegiatan yang ada pada semua halaman web, jadi diharapkan halaman admin ini tidak boleh diakses oleh sembarang orang. Adapun fitur yang disediakan dihalaman admin adalah :</p><ol><li>Aspirasi&nbsp;<br />Pada fitur ini terdapat 3 halaman yaitu :<br />a. Semua Aspirasi<br />&nbsp; &nbsp; Berisi semua aspirasi yang telah dikonfirmasi dan, pada laman ini kita juga dapat membatalkan konfirmasi yang telah kita buat.<br />b. Belum dikonfirmasi<br />&nbsp; &nbsp; Berisi seluruh aspirasi yang dikirimkan oleh pengunjung dimana masih menunggu konfirmasi dari admin.<br />c. Aspirasi Dilarang<br />&nbsp; &nbsp; Berisi aspirasi aspirasi yang mengandung pesan yang mengancam atapun, pesan yang tidak sopan sehingga admin&nbsp; &nbsp; &nbsp; &nbsp; menempatkannya pada aspirasi dilarang. Perbedaan ditolak dan dilarang adalah ditolak pengunjung masih dapat melakukan perbaikan sedangkan dilarang pengunjung tidak dapat melakukan perbaikan terhadap aspirasi yang dikirimkan.</li><li>​Informasi Desa<br />Berisi seluruh informasi yang ditambahkan oleh admin, jadi pada fitur ini admin dapat menambahkan sebuah informasi seputar desa ataupun informasi penting lainnya.&nbsp;</li><li>Forum<br />Pada fitur forum ini admin dapat berdiskusi dengan pengunjung dalam sebuah forum, dimana forum tersebut dapat ditambahkan oleh admin ataupun dihapus oleh admin. Admin juga memiliki wewenang dalam mengatur anggota yang boleh ikut berdiskusi dalam forum, forum juga sudah dilengkapi fitur notifikasi, dan pengiriman dokumen beserta gambar.</li><li>Galeri<br />Pada fitur ini admin dapat menambahkan foto-foto ataupun video dalam sebuah album. Album ini dibuat oleh admin dan kemudian admin menambahkan foto atau video sesuai keinginan, fitur ini juga dilengkapi file manager jadi admin akan lebih mudah mengatur foto dan video yang akan ditambahkan kedalam Album.</li><li>Data Web<br />Pada fitur ini admin dapat mengelola seluruh atribut yang ada pada web seperti logo, background, judul, dan lain lain, akan tetapi admin hanya diijinkan mengedit data yang sudah disedikan web admin tidak dapat melakukan penghapusan&nbsp;ataupun penambahan data web yang baru.</li><li>Data diri<br />Admin juga dapat mengelola profil dari admin seperti perubahan biodata atau perubahan profil.</li></ol><p>Kepada admin yang menggunakan ini pertama kami ucapkan terima kasih, dan semoga web ini dapat membantu anda melakukan tugas ataupun mengembangkan desa terutama pada bidang wisata.</p>', NULL, 'text', 'Data web ini berada pada halaman dashboard dari administrator', '2020-12-06 17:10:43', '2021-01-06 12:44:35'),
(5, 'Logo IT DEL', '<p>Logo dari lembaga pembuat web.</p>', 'Lumban-Gaol_File-1606502543-1609780820.png', 'logo', 'Merupakan logo dari lembaga pembuat web', '2020-12-06 17:12:37', '2021-01-05 00:20:20'),
(6, 'Logo Desa Lumban Gaol', '<p>Merupakan logo dari desa lumban gaol.</p>', 'LumbanGaol-LogoWeb.png', 'logo', 'Merupakan logo dari website desa', '2020-12-06 17:13:38', '2020-12-29 04:01:55'),
(7, 'Link Terkait', '<a href=\'http://www.tobasamosirkab.go.id/\'>Pemerintah Kabupaten Toba</a>|<a href=\'https://www.indonesia.travel/id/id/home\'>Wonderful Indonesia</a>|<a href=\'https://www.kemenparekraf.go.id/\'>Kementrian Pariwisata dan Ekonomi Kreatif-RI</a>|<a href=\'https://www.del.ac.id/\'>IT Del</a>', NULL, 'links', 'Data web ini berada pada halaman beranda pada footer, atau halaman awal page', '2020-12-06 17:13:38', '2021-01-07 16:51:09'),
(8, 'Background header page informasi', '<p>Merupkan&nbsp;background header dari page informasi.</p>', 'LumbanGaol-Header-Informasi.jpeg', 'background', 'Merupakan background bagian atas pada halaman informasi', '2020-12-06 17:14:36', '2020-12-29 04:04:34'),
(9, 'Informasi Desa', '<p>&quot;Mari Bersama Memperkenalkan Desa Kita&quot;</p>', NULL, 'header', 'Merupakan bagian atas pada halaman informasi', '2020-12-06 17:15:07', '2020-12-29 03:36:56'),
(10, 'Aspirasi', '<p>&quot;Bagikan pendapat anda, tentang desa ini.&quot;</p>', NULL, 'header', 'Merupakan bagian atas pada halaman informasi', '2020-12-06 17:15:25', '2020-12-29 03:29:51'),
(11, 'Background header aspirassi', '<p>Merupkan&nbsp;background header dari page aspirasi.</p>', 'LumbanGaol-Header-Informasi.jpeg', 'background', 'Merupakan background bagian atas pada halaman informasi', '2020-12-06 17:16:03', '2020-12-29 04:04:49'),
(12, 'Tentang Kami', '<p>Website Desa Lumban Gaol adalah sebuah website hasil karya anak daerah yang mana berasal dari kampus yang berada di sekitaran daerah ini, yaitu&nbsp;Institut Teknologi&nbsp;Del.</p><p>Website ini &nbsp;bertujuan untuk Mempromosikan Desa&nbsp;dan Pariwisata Desa Lumban Gaol.</p>', NULL, 'text', 'Data web ini berada pada halaman beranda, atau halaman awal page', '2020-12-06 17:17:01', '2021-01-07 16:07:39'),
(13, 'Dashboard Pengunjung', '<p>Selamat datang di web parawisata Desa Lumban Gaol. Hal hal yang anda dapatkan setelah mendaftar pada akun website kami adalah sebagai berikut</p><ol><li>Dapat mengelola data pribadi anda pada &quot;Ubah Data Diri&quot;. Anda dapat melakukan perubahan data diri anda berupa penggantian nama, email, foto profil, tanggal lahir.</li><li>Dapat melakukan komunikasi berupa diskusi Bersama perangkat desa pada &quot;Forum&quot;. Anda dapat melakukan diskusi khusus Bersama perangkat desa untuk membahas sebuah topik khusus yang telah tersedia.</li><li>Anda juga dapat mengedit aspirasi anda mengenai desa wisata pada &quot;Aspirasi Anda&quot;. Anda dapat melakukan pengeditan pada aspirasi yang telah anda tambahkan. Selain mengedit anda juga berhak menghapus aspirasi yang telah anda buat. Aspirasi akan ditampilkan jika admin menyetujui aspirasi yang telah anda berikan.</li></ol><p>Jika anda mengalami masalah atau kebingungan terhadap suatu hal anda dapat menghungi kami di <strong>lumbangaoltambunan2000@gmail.com</strong>.</p><p>Aspirasi dan pendapat yang anda berikan pada forum diskusi dan aspirasi sangat membantu kami dalam mengembangkan desa parawisata kita untuk jauh lebih baik lagi.</p>', NULL, 'text', 'Data web ini berada pada halaman dashboard dari Pengunjung', '2020-12-06 17:18:00', '2020-12-30 21:48:19'),
(14, 'Copyright footer', 'Copyright &copy; 2020 All Rights Reserved | This Website Is Developed By IT Del', NULL, 'text', 'Merupakan footer dari semua halaman', '2020-12-06 17:19:12', '2020-12-06 17:19:12'),
(15, 'Note !', '<p> Admin dapat melakukan perubahan pada beberapa bagian seperti yang disediakan di atas, dan ada beberapa hal yang perlu diperhatikan oleh User.</p>\r\n<ol>\r\n<li>Jangan merubah web selain yang telah disediakan pada bagian atas</li>\r\n<li>Tidak melakukan perubahan yang dapat merusak web.</li>\r\n<li>Lakukanlah perubahan dengan baik, karena ini merupakan website kita bersama</li>\r\n</ol>', NULL, 'text', 'Peraturan yang tertera pada page data_web di halaman admin.', '2020-12-19 09:50:23', '2020-12-19 09:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filemanager`
--

CREATE TABLE `filemanager` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `absolute_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`extra`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filemanager`
--

INSERT INTO `filemanager` (`id`, `name`, `ext`, `file_size`, `user_id`, `absolute_url`, `extra`, `created_at`, `updated_at`) VALUES
(3, 'terkait.jpg', 'jpg', 121230.00, 1, 'http://localhost:8000/filemanager/uploads/terkait.jpg', '{\"width\":1024,\"height\":672}', '2020-12-14 21:26:33', '2020-12-14 21:26:33'),
(4, '874eff2068954a3595682a1ecf882a34-1bcd50ef49c3f0e9dbf462b30b13a1bb.jpg', 'jpg', 246155.00, 1, 'https://desalumbangaol.com/filemanager/uploads/874eff2068954a3595682a1ecf882a34-1bcd50ef49c3f0e9dbf462b30b13a1bb.jpg', '{\"width\":1024,\"height\":1024}', '2021-01-05 12:52:02', '2021-01-05 12:52:02'),
(5, 'ggg.jpg', 'jpg', 72878.00, 1, 'https://desalumbangaol.com/filemanager/uploads/ggg.jpg', '{\"width\":1024,\"height\":551}', '2021-01-05 13:10:28', '2021-01-05 13:10:28'),
(6, 'go2.jpg', 'jpg', 154694.00, 1, 'https://desalumbangaol.com/filemanager/uploads/go2.jpg', '{\"width\":1024,\"height\":1056}', '2021-01-05 13:48:03', '2021-01-05 13:48:03'),
(7, 'ars.jpg', 'jpg', 136121.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ars.jpg', '{\"width\":1024,\"height\":682}', '2021-01-05 19:09:23', '2021-01-05 19:09:23'),
(8, 'nani.png', 'png', 845939.00, 1, 'http://desalumbangaol.com/filemanager/uploads/nani.png', '{\"width\":1024,\"height\":552}', '2021-01-05 19:21:47', '2021-01-05 19:21:47'),
(9, 'sak.jpg', 'jpg', 99117.00, 1, 'http://desalumbangaol.com/filemanager/uploads/sak.jpg', '{\"width\":1024,\"height\":680}', '2021-01-05 19:27:15', '2021-01-05 19:27:15'),
(14, 'napinadar1.jpg', 'jpg', 102496.00, 1, 'http://desalumbangaol.com/filemanager/uploads/napinadar1.jpg', '{\"width\":1024,\"height\":640}', '2021-01-05 19:37:58', '2021-01-05 19:37:58'),
(15, 'babipanggang.jpg', 'jpg', 86386.00, 1, 'http://desalumbangaol.com/filemanager/uploads/babipanggang.jpg', '{\"width\":1024,\"height\":682}', '2021-01-05 19:44:17', '2021-01-05 19:44:17'),
(16, 'ulosAntakantak.jpg', 'jpg', 109836.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ulosAntakantak.jpg', '{\"width\":1024,\"height\":1024}', '2021-01-05 21:15:52', '2021-01-05 21:15:52'),
(17, 'ulosMaratur.jpeg', 'jpeg', 214234.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ulosMaratur.jpeg', '{\"width\":1024,\"height\":1122}', '2021-01-05 21:17:17', '2021-01-05 21:17:17'),
(18, 'ulosBolean.jpg', 'jpg', 154377.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ulosBolean.jpg', '{\"width\":1024,\"height\":1024}', '2021-01-05 21:20:15', '2021-01-05 21:20:15'),
(19, 'ulosMangiring.jpg', 'jpg', 314700.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ulosMangiring.jpg', '{\"width\":1024,\"height\":1160}', '2021-01-05 21:21:47', '2021-01-05 21:21:47'),
(20, 'ulosPinuncaan.jpg', 'jpg', 67007.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ulosPinuncaan.jpg', '{\"width\":1024,\"height\":880}', '2021-01-05 21:22:35', '2021-01-05 21:22:35'),
(21, 'ulosRagiHotang.jpeg', 'jpeg', 175992.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ulosRagiHotang.jpeg', '{\"width\":1024,\"height\":849}', '2021-01-05 21:24:27', '2021-01-05 21:24:27'),
(22, 'sulim.jpg', 'jpg', 56662.00, 1, 'http://desalumbangaol.com/filemanager/uploads/sulim.jpg', '{\"width\":1024,\"height\":1024}', '2021-01-05 21:35:40', '2021-01-05 21:35:40'),
(23, 'taganing.jpg', 'jpg', 98200.00, 1, 'http://desalumbangaol.com/filemanager/uploads/taganing.jpg', '{\"width\":1024,\"height\":656}', '2021-01-05 21:36:57', '2021-01-05 21:36:57'),
(24, 'ogung.jpg', 'jpg', 65461.00, 1, 'http://desalumbangaol.com/filemanager/uploads/ogung.jpg', '{\"width\":1024,\"height\":848}', '2021-01-05 21:37:53', '2021-01-05 21:37:53'),
(25, 'to.jpg', 'jpg', 68898.00, 1, 'http://desalumbangaol.com/filemanager/uploads/to.jpg', '{\"width\":1024,\"height\":554}', '2021-01-05 21:41:51', '2021-01-05 21:41:51'),
(26, 'tortorPangurason.jpg', 'jpg', 111428.00, 1, 'http://desalumbangaol.com/filemanager/uploads/tortorPangurason.jpg', '{\"width\":1024,\"height\":681}', '2021-01-05 21:49:47', '2021-01-05 21:49:47'),
(27, 'tortorSipitucawan.jpg', 'jpg', 81970.00, 1, 'http://desalumbangaol.com/filemanager/uploads/tortorSipitucawan.jpg', '{\"width\":1024,\"height\":589}', '2021-01-05 21:50:41', '2021-01-05 21:50:41'),
(28, 'tortorPanaluan.jpg', 'jpg', 83106.00, 1, 'http://desalumbangaol.com/filemanager/uploads/tortorPanaluan.jpg', '{\"width\":1024,\"height\":543}', '2021-01-05 21:51:33', '2021-01-05 21:51:33'),
(29, 'tortorSigalegale.jpg', 'jpg', 88958.00, 1, 'http://desalumbangaol.com/filemanager/uploads/tortorSigalegale.jpg', '{\"width\":1024,\"height\":682}', '2021-01-05 21:54:20', '2021-01-05 21:54:20'),
(30, 'gerejaLbnGaol.jpg', 'jpg', 156021.00, 1, 'http://desalumbangaol.com/filemanager/uploads/gerejaLbnGaol.jpg', '{\"width\":1024,\"height\":852}', '2021-01-06 20:34:16', '2021-01-06 20:34:16'),
(31, 'terkait1.jpg', 'jpg', 119413.00, 1, 'http://desalumbangaol.com/filemanager/uploads/terkait1.jpg', '{\"width\":1024,\"height\":672}', '2021-01-06 20:35:25', '2021-01-06 20:35:25'),
(32, 'tk2.jpg', 'jpg', 86026.00, 1, 'http://desalumbangaol.com/filemanager/uploads/tk2.jpg', '{\"width\":1024,\"height\":768}', '2021-01-06 20:36:15', '2021-01-06 20:36:15'),
(33, 'gbkp.jpg', 'jpg', 138037.00, 1, 'http://desalumbangaol.com/filemanager/uploads/gbkp.jpg', '{\"width\":1024,\"height\":888}', '2021-01-06 20:37:03', '2021-01-06 20:37:03'),
(34, 'sunsetb.jpg', 'jpg', 96345.00, 1, 'http://desalumbangaol.com/filemanager/uploads/sunsetb.jpg', '{\"width\":1024,\"height\":768}', '2021-01-06 21:20:43', '2021-01-06 21:20:43'),
(35, 'baa.jpg', 'jpg', 105110.00, 1, 'http://desalumbangaol.com/filemanager/uploads/baa.jpg', '{\"width\":1024,\"height\":731}', '2021-01-06 21:21:44', '2021-01-06 21:21:44'),
(36, 'sunsetb1.jpg', 'jpg', 96345.00, 1, 'http://desalumbangaol.com/filemanager/uploads/sunsetb1.jpg', '{\"width\":1024,\"height\":768}', '2021-01-06 21:22:18', '2021-01-06 21:22:18'),
(39, 'IMG-20200222-WA0034.jpg', 'jpg', 151333.00, 1, 'http://desalumbangaol.com/filemanager/uploads/IMG-20200222-WA0034.jpg', '{\"width\":1024,\"height\":904}', '2021-01-06 21:38:47', '2021-01-06 21:38:47'),
(40, 'IMG-20200222-WA35.jpg', 'jpg', 163655.00, 1, 'http://desalumbangaol.com/filemanager/uploads/IMG-20200222-WA35.jpg', '{\"width\":1024,\"height\":904}', '2021-01-06 21:45:23', '2021-01-06 21:45:23'),
(42, 'lahan1.jpg', 'jpg', 110064.00, 1, 'http://desalumbangaol.com/filemanager/uploads/lahan1.jpg', '{\"width\":1024,\"height\":598}', '2021-01-07 13:56:37', '2021-01-07 13:56:37'),
(43, 'rbolon.jpg', 'jpg', 128407.00, 1, 'http://desalumbangaol.com/filemanager/uploads/rbolon.jpg', '{\"width\":1024,\"height\":729}', '2021-01-07 16:54:18', '2021-01-07 16:54:18'),
(44, 'budaya.jpg', 'jpg', 93480.00, 1, 'http://desalumbangaol.com/filemanager/uploads/budaya.jpg', '{\"width\":1024,\"height\":512}', '2021-01-07 16:56:11', '2021-01-07 16:56:11'),
(45, 'waterpark.JPG', 'JPG', 85022.00, 1, 'http://desalumbangaol.com/filemanager/uploads/waterpark.JPG', '[]', '2021-01-07 19:01:04', '2021-01-07 19:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LumbanGaol-LogoForum-Default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Forum Perbaikan peraturan desa.', '<p>Membahas peraturan desa yang kurang tepat dalam kehidupan masyarakat.</p>', 'Lumban-Gaol_LogoForum-442521625-1609773337.jpg', '2020-12-12 11:53:08', '2021-01-08 00:19:31'),
(15, 'Forum tempat pembuangan sampah rumah tangga', '<p>Mendiskusikan dimana tempat yang paling tepat untuk membuang sampah masyrakat atau sampah rumah tangga.</p>', 'LumbanGaol-LogoForum-Default.jpg', '2021-01-07 04:08:01', '2021-01-07 21:37:12'),
(16, 'Forum keamanan tempat wisata.', '<p>Membahas hal hal yang berkaitan dengan keamanan tempat wisata.</p>', 'LumbanGaol-LogoForum-Default.jpg', '2021-01-07 17:11:13', '2021-01-08 01:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `forum_participants`
--

CREATE TABLE `forum_participants` (
  `idForum` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `status` enum('approved','rejected','waiting','blocked') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_participants`
--

INSERT INTO `forum_participants` (`idForum`, `idUser`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'approved', '2021-01-03 04:48:30', '2021-01-03 04:48:30'),
(1, 7, 'approved', '2021-01-04 10:48:47', '2021-01-04 10:48:47'),
(15, 5, 'approved', '2021-01-07 14:36:21', '2021-01-07 14:36:21'),
(15, 17, 'approved', '2021-01-07 07:23:25', '2021-01-07 07:23:25'),
(15, 19, 'approved', '2021-01-07 12:49:29', '2021-01-07 12:49:29'),
(16, 11, 'approved', '2021-01-07 18:01:41', '2021-01-07 18:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDisplay` bigint(20) UNSIGNED DEFAULT NULL,
  `idCategory` bigint(20) UNSIGNED DEFAULT NULL,
  `view` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `title`, `content`, `description`, `idDisplay`, `idCategory`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Ini dia, beberapa alat musik khas Toba yang sangat familiar di desa Lumban gaol', '<p>Desa Lumban Gaol merupakan desa yang mayoritas masyarakatnya adalah suku batak toba,sehingga banyak sekali kesenian tradisional khas suku ini yang mungkin belum kamu ketahui. Batak Toba memang dikenal sebagai salah satu suku yang memiiki keberagaman seni yang unik dan menarik. Nah, maka dari itu di dalam kesempatan kali ini kita akan membahas tentang kesenian tradisional yang dimiliki oleh salah satu daerah Suku Batak Toba, yaitu Desa Lumban Gaol. Penasaran? Yuk kita simak bersama-sama tentang beberapa kesenian musik tradisional khas yang perlu kamu ketahui ini! Tanpa alat musik, jelas lagu daerah yang dilantunkan oleh penyanyi ataupun acara adat tidak akan sempurna. Alat musik tradisional Batak Toba cukup erat kaitannya dengan perayaan hari-hari besar. Pada desa Lumban Gaol ini, acara seperti pernikahan, pesta panen, bahkan upacara kematian akan berlangsung diiringi dengan musik.</p>\r\n\r\n<p>1. Sulim</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/sulim.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>Alat musik pertama yang masuk ke dalam salah satu kesenian musik tradisional khas Batak Toba adalah Sulim. Sulim ini merupakan salah satu alat musik Batak Toba yang terbuat dari bambu yang dimainkan denga cara ditiup,dan hampir sama seperti seruling. Dan di desa ini, sulim ini biasanya memainkan lagu-lagu yang bersifat melankolis ataupun lagu-lagu sedih.</p>\r\n\r\n<p>2. Taganing</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/taganing.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /><br />\r\nAlat musik berikutnya adalah Taganing. Taganing adalah lima buah gendang yang berfungsi sebagai pembawa melodi dalam beberapa lagu. Sama seperti Sulim, alat musik ini biasanya dimainkan saat perayaan seperti pernikahan, adat, dan lainnya. Untuk bunyi,yang paling besar adalah gendang paling kanan, dan semakin ke kiri ukurannya semakin kecil. Nadanya juga demikian, semakin ke kiri semakin tinggi nadanya.</p>\r\n\r\n<p>3. Ogung</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ogung.jpg\" style=\"height:30%; width:40%\" /><br />\r\nNah, disini Ogung menjadi alat musik sekaligus alat komunikasi yang digunakan oleh masyarakat. Ogung itu sendiri berbentuk gong dengan ukuran yang bervariasi. Ogung merupakan salah satu bagian daripada Gondang Sabangunan (terdiri dari Taganing, Ogung, Sarune dan Hesek), yang dipakai untuk upacara adat seperti upacara meninggal orang tua yang sudah punya cicit, menggali tulang belulang orang tua untuk dipindahkan ke bangunan yang telah disediakan, bahkan pada upacara adat perkawinan.</p>\r\n\r\n<p>Nah itu dia beberapa kesenian musik yang biasanya digunakan di desa Lumban Gaol ini, semoga menambah pengetahuanmu seputar Kesenian musik Tradisional!</p>', '<p>Desa Lumban Gaol merupakan desa yang mayoritas masyarakatnya adalah suku batak toba,sehingga banyak sekali kesenian tradisional khas suku ini yang mungkin belum kamu ketahui. Batak Toba memang dikenal sebagai salah satu suku yang memiiki keberagaman seni</p>', 27, 1, 22, '2020-12-07 02:50:38', '2021-01-06 23:27:49'),
(2, 'Ragam Seni Tari Desa Lumban gaol', '<p>Desa Lumban Gaol merupakan desa yang dimana mayoritas masyarakatnya adalah suku batak toba sehingga begitu banyak kegiatan kesenian tradisional yang terdapat di desa tersebut. salah satu kegiatan kesenian yang ada yaitu kesenian tari tortor.</p>\r\n\r\n<p>Nah, disini kita akan membahas tentang kesenian tari tortor yang berada didesa lumban gaol, sebelum itu kita harus mengetahui terlebih dahulu apa itu seni tari?</p>\r\n\r\n<p>Seni Tari merupakan gerak tubuh secara berirama yang dilakukan di tempat dan waktu tertentu untuk keperluan pergaulan, mengungkapkan perasaan, maksud, dan pikiran. Bunyi-bunyian yang disebut musik pengiring tari mengatur gerakan penari dan memperkuat maksud yang ingin disampaikan.&nbsp;</p>\r\n\r\n<p>Kegiatan seni tari tortor yang diadakan di desa lumban gaol bukan hanya untuk acara maupun event tertentu tetapi juga dijadikan menjadi sebuah lomba menjadi wadah untuk penyaluran bakat serta potensi remaja,serta memotivasi mereka dalam membangun kreasi dan kretivitas di bidang seni dan budaya Batak. Perlu kita tahu bahwa didalam tari tortor tersebut harus disajikan dengan sebuah musik maupun alat musik seperti gondang untuk lebih membuat tarian itu lebih indah.&nbsp;</p>\r\n\r\n<p>Kita akan melihat beberapa jenis dari tari tortor, sebagai berikut:</p>\r\n\r\n<p>1.Tortor Pangurason</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/tortorPangurason.jpg\" style=\"height:40%; width:50%\" /></p>\r\n\r\n<p>&nbsp;Tarian tortor ini biasanya digelar pada saat acara pesta besar.Pangurason berarti menguras wilayah. sebelum pesta dimulai, tempat dan lokasi pesta terlebih dahulu dibersihkan agar diharapkan jauh dari mara bahaya dan bala bencana.Tarian ini identik dengan penarinya yang membawa mangkuk kaca putih dikepala disertai dengan alunan Gondang Batak. Percikan air dari mangkuk yang dibawa itulah yang konon berguna untuk mengusir atau membersihkan wilayah dari roh &ndash; roh jahat.</p>\r\n\r\n<p>2.Tortor Sipitu Cawan</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/tortorSipitucawan.jpg\" style=\"height:40%; width:50%\" /></p>\r\n\r\n<p>Tarian tortor ini biasanya digelar pada saat acara pengukuhan raja.Tortor ini tidak bisa dipelajari sembarangan orang kecuali kalau memang sudah jodoh. Lewat turun temurun, tarian tujuh cawan dianggap sebagai tarian paling unik karena sang penari harus menjaga keseimbangan tujuh cawan yang diletakkan di kedua belah tangan kanan dan kiri tiga serta satu di kepala. Tarian tujuh cawan mengandung arti pada setiap cawannya. Cawan 1 mengandung makna kebijakan, cawan 2 kesucian, cawan 3 kekuatan, cawan 4 tatanan hidup, cawan 5 hukum, cawan 6 adat dan budaya, cawan 7 penyucian atau pengobatan. Kegunaan lain dari tarian ini adalah membuang semua penghalang, sebab orang Batak percaya manusia biasanya mengalami kegagalan karna ada penghalang.</p>\r\n\r\n<p>3. Tortor Panaluan</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/tortorPanaluan.jpg\" style=\"height:40%; width:50%\" /></p>\r\n\r\n<p>Tarian Tortor Panaluan adalah untuk mengetahui sebab musabab sebuah desa terkena musibah. Tentunya tarian ini tidak bisa dilakukan oleh orang-orang awam sehingga hanya orang yang bergelar Datu saja yang bisa melakukan tarian ini. Ciri khas dari Tortor Panalua ini dapat dilihat dari properti berupa Tunggal Panalua yang tampak begitu mencolok. Tunggal Panalua merupakan sebuah tongkat sepanjang dua meter yang dipercaya memiliki kekuatan magis tersendiri. Jika dilihat dari kaca mata seni, tongkat ini mempunyai nilai seni yang tinggi. Kamu bisa melihat adanya ukiran-ukiran yang menggambarkan unsur-unsur kehidupan berupa kepala manusia dan dilengkapi dengan beberapa hewan.</p>\r\n\r\n<p>4.Tortor Sigale-gale</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/tortorSigalegale.jpg\" style=\"height:40%; width:50%\" /></p>\r\n\r\n<p>Pernah ada cerita pada jaman dahulu ada seorang raja Batak yang kehilangan anaknya karena suatu penyakit. Lalu, untuk menghibur hati sang raja karena kematian anaknya diciptakanlah sigale-gale ini. Tortor Sigale-gale biasanya digunakan untuk acara hiburan. Sigale-gale adalah perwujudan anak raja batak yang digambarkan menjadi sebuah kesenian patung dari kayu. Gerakan yang dihasilkan oleh Sigale-gale ini berasal dari orang yang menggerakan dibagian belakangnya.</p>', '<p>Desa Lumban Gaol merupakan desa yang dimana mayoritas masyarakatnya adalah suku batak toba sehingga begitu banyak kegiatan kesenian tradisional yang terdapat di desa tersebut. salah satu kegiatan kesenian yang ada yaitu kesenian tari tortor.</p>', 2, 1, 12, '2020-12-07 12:14:21', '2021-01-06 23:26:37'),
(3, 'Ulos, Seni tenun terbaik desa Lumban Gaol.', '<p>Ulos merupakan salah satu busana khas Indonesia yang secara turun temurun dikembangkan oleh masyarakat Batak, Sumatera Utara. Begitu pula pada masyarakat desa lumbangaol yang masih melakukan kegiatan menenun ulos. Ulos mulanya dikenakan di dalam bentuk selendang atau sarung saja, kerap digunakan pada acara resmi atau upacara adat batak, tetapi sekarang banyak dijumpai didalam bentuk produk souvenir.. Arti ulos itu sendiri atau Mangulosi adalah suatu kegiatan adat yang sangat penting bagi orang batak. Dalam setiap kegiatan seperti upacara pernikahan, kelahiran, dan dukacita, ulos selalu menjadi bagian adat yang selalu diikutsertakan. Ulos pun menjadi barang yang penting dan dibutuhkan semua orang kapan saja dan di mana saja. Hingga akhirnya karena ulos memiliki nilai yang tinggi di tengah-tengah masyarakat batak. Dibuatlah aturan penggunaan ulos yang dituangkan dalam aturan adat, antara lain:</p>\r\n\r\n<p>1. Ulos hanya diberikan kepada kerabat yang di bawah kita. Misalnya Natoras tu ianakhon (orang tua kepada anak), hula-hula kepada boru, dll.</p>\r\n\r\n<p>2. Ulos yang diberikan haruslah sesuai dengan kerabat yang akan diberi ulos. Misalnya Ragihotang diberikan untuk ulos kepada hela (menantu laki-laki).</p>\r\n\r\n<p>Ulos itu sendiri juga memiliki berbagai jenis, makna dan fungsi yang masih diterapkan oleh masyarakat desa lumban gaol pada saat menenun, sebagai contoh adalah berikut</p>\r\n\r\n<p>1. Ulos Antakantak</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ulosAntakantak.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>&nbsp;Ulos ini dipakai sebagai selendang orang tua untuk melayat orang yang meninggal, selain itu ulos tersebut juga dipakai sebagai kain yang dililit pada waktu acara manortor (menari).</p>\r\n\r\n<p>2. Ulos Bintang Maratur</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ulosMaratur.jpeg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>&nbsp;Ulos ini merupakan Ulos yang paling banyak kegunaannya di dalam acara-acara adat Batak Toba, beberapa di antaranyauntuk anakk yang memasuki&nbsp; rumah baru (milik Sendiri), yang merupakan suatu kebanggaan terbesar bagi masyarakat Batak Toba.&nbsp;Secara khusus di daerah Toba Ulos ini diberikan waktu acara selamatan Hamil 7 Bulan yang diberikan oleh pihak hulahula kepada anaknya. Ulos ini juga diberikan kepada Pahompu (cucu) yang baru lahir sebagai Parompa (gendongan) yang memiliki arti dan makna agar anak yang baru lahir itu diiringi kelahiran anak yang selanjutnya, kemudian ulos ini juga diberikan untuk pahompu (cucu) yang baru mendapat baptisan di gereja dan juga bisa dipakai sebagai selendang.</p>\r\n\r\n<p>3. Ulos Bolean</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ulosBolean.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>&nbsp;Ulos ini biasanya dipakai sebagai selendang pada acara-acara kedukaan.</p>\r\n\r\n<p>4. Ulos Mangiring</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ulosMangiring.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>&nbsp;Ulos ini dipakai sebagai selendang, Talitali, juga Ulos ini diberikan kepada anak cucu yang baru lahir terutama anak pertama yang memiliki maksud dan tujuan sekaligus sebagai Simbol besarnya keinginan agar si anak yang lahir baru kelak diiringi kelahiran anak yang seterusnya, Ulos ini juga dapat dipergunakan sebagai Parompa (alat gendong) untuk anak.</p>\r\n\r\n<p>5. Ulos Pinuncaan</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ulosPinuncaan.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>biasanya dipakai dalam berbagai keperluan acara-acara dukacita maupun sukacita, dalam acara adat ulos ini dipakai/disandang oleh Raja-raja Adat, maupun&nbsp;rakyat biasa selama memenuhi beberapa pedoman. misalnya, pada pesta perkawinan atau upacara adat dipakai oleh suhut sihabolonon/ Hasuhuton (tuan rumah).&nbsp;</p>\r\n\r\n<p>6. Ulos Ragi Hotang</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ulosRagiHotang.jpeg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>Ulos ini diberikan kepada sepasang pengantin yang sedang melaksanakan pesta adat yang disebut dengan nama Ulos Hela. Pemberian ulos Hela memiliki makna bahwa orang tua pengantin perempuan telah menyetujui putrinya dipersunting atau diperistri oleh laki-laki yang telah disebut sebagai &ldquo;Hela&rdquo; (menantu).</p>\r\n\r\n<p>Nah itu dia penjelasan tentang Ulos sebagai kain khas Batak, yang juga digunakan oleh masyarakat di desa Lumban Gaol ini, semoga menambah wawasanmu ya!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>Ulos salah satu busana khas Indonesia yang secara turun temurun dikembangkan oleh masyarakat Batak, Sumatera Utara. Begitu pula pada masyarakat desa lumbangaol yang masih melakukan kegiatan menenun ulos.</p>', 28, 1, 10, '2020-12-07 12:46:47', '2021-01-06 23:25:14'),
(6, 'Suka kuliner? ini 6 makanan khas Toba yang digemari masyarakat desa Lumban Gaol !', '<p>Makanan khas Batak Toba memiliki cita rasa khas yang menggugah selera. Makanan khas Batak Toba dapat dengan mudah ditemui di beberapa kabupaten seperti Samosir, Humbang Hasundutan, Tapanuli Utara, dan tak lupa, Kabupaten Toba Samosir. Disinilah desa Lumban Gaol berada.</p>\r\n\r\n<p>Berikut masakan khas batak yang akan kita bahas bersama-sama!</p>\r\n\r\n<p><strong><big>1. Mie Gomak</big></strong></p>\r\n\r\n<p><img alt=\"\" src=\"https://desalumbangaol.com/filemanager/uploads/ggg.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:60%\" /></p>\r\n\r\n<p>Mie Gomak terkenal sebagai masakan khas daerah tanah Batak Toba. Cara penyajian kuliner ini cukup unik, mie digomak atau dalam bahasa Indonesia digenggam langsung menggunakan tangan saat memasukkannya ke dalam wadah.</p>\r\n\r\n<p>&nbsp;Menyukai menu spaghetti? Anda harus coba<strong>&nbsp;mie gomak khas Toba</strong>&nbsp;ini, Akan nikmat dan sedap jika dinikmati pada sore hari. Hal yang membuat mie ini unik, adalah tampilannya yang sering disebut sebagai&nbsp;<strong>spaghettinya orang Batak</strong>.</p>\r\n\r\n<p><strong>2. Ikan Arsik</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/ars.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:60%\" /></strong></p>\r\n\r\n<p>Ikan Arsik adalah salah satu hidangan khas Batak yang dibuat dengan bahan ikan mas pada umumnya, dan bisa juga dengan ikan mujahir atau nila. Ikan ini biasanya ditangkap langsung dan langsung dimasak agar terjamin kesegarannya.</p>\r\n\r\n<p>Cara memasak hidangan ini sejatinya sama dengan proses&nbsp;memasak ikan biasa, yang membedakan adalah dengan menambahkan Andaliman. Andaliman merupakan bumbu rempah khas Batak yang akan menimbulkan rasa pedas serta aroma yang khas. Serta rempah-rempah lainnya yang ditambahkan membuat cita rasa lebih terasa dan nikmat.</p>\r\n\r\n<p><strong>3. Naniura</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/nani.png\" style=\"height:60%; margin-left:20px; margin-right:20px; width:60%\" /></strong></p>\r\n\r\n<p>Makanan khas yang ini adalah Naniura. mirip dengan arsik, bahan dasar hidangan ini adalah ikan mas. tapi yang membuatnya berbeda adalah sajian ini disebut dengan sushinya orang Batak.&nbsp;Karena memang dari segi tampilan dan bahan-bahan yang digunakan hampir mirip dengan sushi.</p>\r\n\r\n<p>Seperti sushi, ikan tersebut tidak dimasak dan hanya disajikan dengan bumbu-bumbu khas yang lengkap dari daerah Batak.Karena proses pematangannya yang menggunakan asam, maka cita rasa asam segar yang khas menjadikan naniura melambai ingin segera disantap.</p>\r\n\r\n<p><strong>4. Napinadar</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/napinadar1.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:60%\" /></strong></p>\r\n\r\n<p>Jenis sajian yang satu ini merupakan makanan yang bahannya terdiri dari ayam segar yang kemudian dibumbui dengan bumbu khas Batak. Sebuah ciri khas lagi adalah pengolahan dagingnya masih disiram lagi dengan darah ayam itu sendiri.&nbsp;Bumbu yang digunakan mayoritas menggunakan bumbu andaliman, sehingga menciptakan rasa dan aroma yang khas.</p>\r\n\r\n<p>Tingkat kematangan yang diatur sedemikian rupa juga menjadikan makanan yang satu ini selalu dirindukan oleh para wisatawan.</p>\r\n\r\n<p><strong>5. Babi Panggang</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/babipanggang.jpg\" style=\"height:40%; margin-left:20px; margin-right:20px; width:60%\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Jika menengok dari namanya, jelas makanan khas Batak yang satu ini diolah dengan cara dipanggang. Babi yang sudah dibersihkan dipanggang di atas bara api kemudian disiram dengan sedikit asam pada saat proses pemanggangan.</p>\r\n\r\n<p>Tanda bahwa daging babi sudah matang sempurna adalah keluarnya tetesan lemak dari daging babi. Selanjutnya hidangan ini disajikan dengan saus dari darah babi yang dimasak dengan bumbu khas. Masyarakat suku Batak biasanya menambahkan sayur daun ubi sebagai pelengkapnya.</p>\r\n\r\n<p><strong>6. Saksang</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/sak.jpg\" style=\"height:39%; margin-left:20px; margin-right:20px; width:60%\" /></strong></p>\r\n\r\n<p>Nah masakan&nbsp;ini berbahan dasar daging babi. Makanan yang satu ini dimasak dengan bumbu khas khusus yang mirip dengan bumbu saat mengolah hidangan napinadar. Proses memasaknya pun sama karena dicampur dengan darah itu sendiri, sehingga menghasilkan warna kecoklatan.</p>\r\n\r\n<p>Apabila dibandingkan dengan babi panggang, maka saksang cenderung memiliki banyak daging dibandingkan lemak. Saksang sangat cocok dimasak dengan Kamuliman agar tercipta sensasi pedas panas yang menggetarkan lidah.</p>\r\n\r\n<p><big>Nah, itu dia 6 makanan khas Toba yang ada di desa Lumban Gaol, dan masih banyak lagi.&nbsp; Ayo segera berkunjung ke desa ini dan nikmati hidangannya</big></p>\r\n\r\n<p>&nbsp;</p>', '<p>Makanan khas Batak Toba memiliki cita rasa khas yang menggugah selera. Makanan khas Batak Toba dapat dengan mudah ditemui&nbsp;di beberapa kabupaten seperti Samosir, Humbang Hasundutan, Tapanuli Utara, dan tak lupa, Kabupaten Toba Samosir. Disinilah desa Lumban Gaol berada....</p>', 80, 4, 67, '2021-01-05 04:54:16', '2021-01-06 22:56:03'),
(7, 'Tempat peribadahan di desa Lumban Gaol', '<p>Mayoritas penduduk Desa Lumban Gaol adalah memeluk agama Kristen. Maka dari itu, Di sekitaran Desa Lumban Gaol &nbsp;tersedia beberapa tempat ibadah bagi umat Kristen, diantaranya yaitu</p>\r\n\r\n<p><strong>1.&nbsp; HKBP Pardomuan Nauli&nbsp; (Huria Kristen Batak Protestan)</strong></p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/gerejaLbnGaol.jpg\" style=\"height:40%; margin-left:20px; margin-right:20px; width:50%\" /></p>\r\n\r\n<p><strong>&nbsp;2. HKBP Tambunan</strong></p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/terkait1.jpg\" style=\"height:40%; margin-left:20px; margin-right:20px; width:50%\" /></p>\r\n\r\n<p><strong>3.&nbsp;GKPI Jemaat Khusus Maranatha Tambunan (Gereja Kristen Protestan Indonesia)</strong></p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/tk2.jpg\" style=\"height:40%; margin-left:20px; margin-right:20px; width:50%\" /></p>\r\n\r\n<p><strong>&nbsp;4. GBKP Runggun Balige (Gereja Batak Karo Protestan)</strong></p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/gbkp.jpg\" style=\"height:40%; margin-left:20px; margin-right:20px; width:50%\" /></p>\r\n\r\n<p>&nbsp;</p>', '<p>Mayoritas penduduk Desa Lumban Gaol adalah memeluk agama Kristen. Maka dari itu, Di Desa Lumban Gaol juga terdapat tempat ibadah...</p>', 81, 2, 14, '2021-01-06 13:39:06', '2021-01-06 23:21:32'),
(8, 'Keterikatan Budaya Batak Toba di desa Lumban Gaol', '<p>Tradisi, adat istiadat dan kebudayaan yang dimiliki Indonesia memang sangat beraneka ragam jenisnya.Bahkan satu suku di Indonesia masih memiliki sub-sub suku yang beranak pinak.Salah satunya suku Batak. Suku Batak yang kita kenal bukan hanya satu jenis saja, ada beberapa sub suku batak seperti batak toba, batak simalungun dan batak karo.</p>\r\n\r\n<p>Nah, perbedaan dari setiap sub suku batak ini bisa berupa kebiasaan, adat sampai bahasanya juga memiliki perbedaan. Yang kita bahas kali ini adalah suku Batak Toba, yang merupakan suku mayoritas di desa Lumban Gaol ini.</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/budaya.jpg\" style=\"height:50%; width:50%\" /></p>\r\n\r\n<p>&nbsp;</p>', '<p>Tradisi, adat istiadat dan kebudayaan yang dimiliki Indonesia memang sangat beraneka ragam jenisnya.Bahkan satu suku di Indonesia masih memiliki sub-sub suku yang beranak pinak.Salah satunya suku Batak. Suku Batak yang kita kenal bukan hanya...</p>', 88, 7, 32, '2021-01-06 13:55:23', '2021-01-07 18:22:48'),
(9, 'Kegiatan sosial di desa Lumban Gaol', '<p>Kehidupan masyarakat Desa Lumban Gaol&nbsp;dari dulu sampai sekarang dapat dikatakan sangat baik dalam menjaga hubungan antar sesamanya. Salah satu cara menjaga hubungan antar sesama dengan sering mengadakan kegiatan-kegiatan yang bersifat sosial di desa maupun program dari pemerintah. Masyarakat Desa Lumban Gaol&nbsp;sangat antusias dalam kegiatan-kegiatan ini.&nbsp;Itu terbukti dengan banyaknya kegiatan-kegiatan yang sudah&nbsp;dilaksanakan oleh masyarakat Desa Lumban Gaol.</p>\r\n\r\n<p><big><strong>Lomba Kebersihan Pinggiran Danau Toba&nbsp;2017</strong></big></p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/lahan1.jpg\" style=\"height:50%; width:60%\" /></p>\r\n\r\n<p>Pemerintah Provinsi Sumatera Utara&nbsp;mengadakan program kebersihan daerah dengan membuat lomba Kebersihan Pinggiran Danau Toba&nbsp;tahun 2017. Kabar ini tentu ditanggap antusias oleh warga Desa Lumban Gaol. Masyarakat desa bekerja sama melakukan kebersihan lingkungan,hingga Desa Lumban Gaol menyabet juara I Lomba Kebersihan &nbsp;Pinggiran Danau Toba mengalahkan tujuh kabupaten lainnya.</p>\r\n\r\n<p>Dan dari sinilah dilakukan penyerahan dan penandatanganan&nbsp;prasasti&nbsp;saat pengumuman lomba desa terbersih yang dihadiri oleh ratusan warga dan beberapa tamu undangan lainnya. &quot;Harapan kita, selain melalui otorita Danau Toba, kita juga berupaya, agar kawasan Danau Toba yang merupakan kaldera Toba, bisa menjadi Geoprak yang akan terdaftar di UNESCO,&quot; ujar Nurhajizah selaku Wakil Gubernur Sumut pada pengumuman lomba desa terbersih tahap final yang dilaksanakan di Desa Tambunan Lumbangaol Kecamatan Balige Kabupaten Toba Samosir, Selasa (29/8).</p>\r\n\r\n<p>&nbsp;Setelah itu, disinilah Warga Desa Tambunan Lumbangaol melalui Kades Edward Tambunan&nbsp;&nbsp; menyerahkan sebidang pantai pasir putih kepada Pemkab Toba Samosir, untuk dikelola dan dikembangkan menjadi daerah parawisata sekaligus menetapkannya dengan nama pantai Tambunan Sunset Beach.&nbsp;Pembentukan objek wisata&nbsp;ini merupakan hasil kerja sama antara pemerintahan Toba Samosir dengan &nbsp;warga setempat melalui niat yang ingin membuat desanya menjadi desa parawisata serta memiliki lahan pertanian yang luas. Dan benar saja, Pantai Sunset Beach ini memiliki pesona yang masih alami. air yang jernih serta pemandangan yang mempesona. Serta beberapa fasilitas seperti spot foto, Perahu, dan motor pantai, yang membuat setiap kunjungan menjadi tidak terlupakan.</p>\r\n\r\n<p>&nbsp;</p>', '<p>Kehidupan masyarakat Desa Lumban Gaol&nbsp;dari dulu sampai sekarang dapat dikatakan sangat baik dalam menjaga hubungan antar sesamanya. Salah satu cara menjaga hubungan antar sesama dengan sering mengadakan...</p>', 87, 8, 27, '2021-01-07 02:16:45', '2021-01-07 14:47:53'),
(10, 'Menyaksikan Sunset yang memukau di Sunset Beach, desa Lumban Gaol', '<p>Pernahkah anda melihat matahari yang terbenam sempurna? Kunjungilah pantai di desa Lumban Gaol yang dikenal dengan nama Sunset Beach ini untuk menyaksikan keindahan alam ini dengan leluasa!</p>\r\n\r\n<p>Sunset Beach masih masuk dalam kategori pantai yang belum diketahui oleh banyak orang, karena akses jalan ke pantai yang banyak belum diketahui. untuk petunjuk lokasi yang lebih detail, anda dapat mengakses nya melalui link ini :&nbsp;&nbsp;<a href=\"https://goo.gl/maps/9rhSa8AXqEMtsDcy9\">Sunset Beach Lumban Gaol Tambunan</a></p>\r\n\r\n<p>&nbsp;Fenomena dari matahari yang terbenam ini dapat anda saksikan ketika sore hari menjelang maghrib. dan pada&nbsp;siang hari, anda juga dapat menikmati keindahan alam berupa pantai jernih yang luas, dan bisa berenang pada pantai yang landai ini&nbsp;serta merasakan sensasi berenang di Danau Toba.</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/baa.jpg\" style=\"height:30%; width:40%\" /><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/sunsetb1.jpg\" style=\"height:30%; margin-left:20px; margin-right:20px; width:40%\" /></p>\r\n\r\n<p>Dan lagi, disini terdapat spot-spot foto dan permainan yang membuat anda tidak merasa bosan, mulai dari spot foto berlatar bingkai yang menghadap ke pantai, Jembatan warna-warni, hingga permainan motor mini, dan sebagainya</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/IMG-20200222-WA35.jpg\" style=\"height:50%; width:50%\" /></p>\r\n\r\n<p>Nah, tunggu apalagi? ayo segera berkunjung ke desa Lumban Gaol dan nikmati keindahan Sunset Beach, and Enjoy your day !!!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>Pernahkah anda melihat matahari yang terbenam sempurna? Kunjungilah pantai di desa Lumban Gaol yang dikenal dengan nama Sunset Beach ini untuk menyaksikan keindahan alam ini dengan leluasa...&nbsp;</p>', 82, 6, 27, '2021-01-07 09:13:00', '2021-01-07 18:22:54'),
(12, 'Menikmati Water Park Toba Mountain, dengan suasana berbeda', '<p>Sebelum sampai ke Sunset Beach, kita juga akan menjumpai Water park Toba Mountain yang tak kalah seru, berbagai wahana disediakan yang membuat kita dapat bersenang-senang dan menikmati setiap permainannya.&nbsp; Yang membuat suasananya berbeda adalah waterpark ini langsung berhadapan dengan Danau Toba sehingga pengunjung disediakan fasilitas untuk menaiki kano-kano di Danau Toba. dan Air pada kolam Waterpark juga merupakan aliran langsung dari Danau Toba, Sehingga tidak perlu kuatir pada masalah kulit.</p>\r\n\r\n<p><img alt=\"\" src=\"http://desalumbangaol.com/filemanager/uploads/waterpark.JPG\" style=\"height:50%; width:90%\" /></p>\r\n\r\n<p>Harga yang ditawarkan untuk&nbsp; dewasa adalah 15.000, sedangkan untuk anak-anak adalah 10.000 Dengan membayar biaya tersebut, anda sudah bisa bebas memainkan seluruh wahana yang ada. Ditambah lagi terdapat toko makanan dan pakaian yang membuat anda tidak perlu takut jika kekurangan sesuatu.</p>\r\n\r\n<p>Untuk lokasi lebih detail, anda bisa mengunjungi link dibawah ini untuk melihatnya di map :</p>\r\n\r\n<p>&nbsp;<a href=\"https://goo.gl/maps/dvrnamYb6gcfckmg6\">Waterpark Toba Mountain Tambunan</a></p>\r\n\r\n<p>&nbsp;</p>', '<p>Sebelum sampai ke Sunset Beach, kita juga akan menjumpai Water park Toba Mountain yang tak kalah seru, berbagai wahana disediakan yang membuat kita dapat bersenang-senang dan...</p>\r\n\r\n<p>&nbsp;</p>', 89, 6, 26, '2021-01-07 12:02:30', '2021-01-07 19:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `idForum` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `idUser`, `idForum`, `message`, `picture`, `document`, `created_at`, `updated_at`) VALUES
(237, 1, 1, 'Hy, saya adalah pengurus desa.', NULL, NULL, '2021-01-07 17:18:09', '2021-01-07 17:18:09'),
(239, 5, 1, 'Hy, saya adalah salah satu pengunjung yang datang ke desa ini.', NULL, NULL, '2021-01-07 17:18:50', '2021-01-07 17:18:50'),
(242, 11, 16, 'Bagaimana dengan keamanan tempat wisata?', NULL, NULL, '2021-01-07 18:05:11', '2021-01-07 18:05:11'),
(243, 1, 16, 'Kami sedang meningkatkan keamanan desa, terutama pada daerah pariwisata', NULL, NULL, '2021-01-07 18:05:52', '2021-01-07 18:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `message_reads`
--

CREATE TABLE `message_reads` (
  `idMessage` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_reads`
--

INSERT INTO `message_reads` (`idMessage`, `idUser`, `created_at`, `updated_at`) VALUES
(237, 5, '2021-01-07 17:18:26', '2021-01-07 17:18:26'),
(239, 1, '2021-01-07 17:18:51', '2021-01-07 17:18:51'),
(242, 1, '2021-01-07 18:05:26', '2021-01-07 18:05:26'),
(243, 11, '2021-01-07 18:05:53', '2021-01-07 18:05:53');

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
(6, '2020_12_06_161214_create_data_web', 2),
(7, '2020_12_06_162659_create_informations', 3),
(8, '2020_12_06_162749_create_aspirations', 3),
(9, '2020_12_06_162759_create_forums', 3),
(10, '2020_12_06_162808_create_replays', 3),
(11, '2020_12_06_162840_create_forum_participants', 3),
(12, '2020_12_06_162910_create_messages', 3),
(13, '2020_12_06_162926_create_message_reads', 3),
(14, '2020_12_06_163008_create_albums', 3),
(15, '2020_12_06_163027_create_videos', 3),
(16, '2020_12_06_163036_create_pictures', 3),
(17, '2020_12_06_163052_create_album_video', 3),
(18, '2020_12_06_163102_create_album_picture', 3),
(19, '2020_12_06_170151_create_category', 4),
(20, '2020_05_02_100001_create_filemanager_table', 5);

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
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(2, 'LumbanGaol-Informasi-SeniTari-1241.png', '/uploads/img/Album/', '2020-12-07 12:43:58', '2020-12-07 12:43:58'),
(27, 'Lumban-Gaol_Foto-1608180029.jpg', '/uploads/img/Album/', '2020-12-17 04:40:29', '2020-12-17 04:40:29'),
(28, 'Lumban-Gaol_Foto-1608180038.jpg', '/uploads/img/Album/', '2020-12-17 04:40:38', '2020-12-17 04:40:38'),
(62, 'Lumban-Gaol_Foto-869564317-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(63, 'Lumban-Gaol_Foto-1605232737-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(64, 'Lumban-Gaol_Foto-1436374603-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(65, 'Lumban-Gaol_Foto-1218648575-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(66, 'Lumban-Gaol_Foto-1667005560-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(67, 'Lumban-Gaol_Foto-1578021998-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(68, 'Lumban-Gaol_Foto-60316502-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(69, 'Lumban-Gaol_Foto-1094658278-1608206409.jpg', '/uploads/img/Album/', '2020-12-17 12:00:09', '2020-12-17 12:00:09'),
(72, 'Lumban-Gaol_Foto-1419879738-1608216633.jpg', '/uploads/img/Album/', '2020-12-17 14:50:33', '2020-12-17 14:50:33'),
(73, 'Lumban-Gaol_Foto-996056686-1608395500.jpg', '/uploads/img/Album/', '2020-12-19 16:31:40', '2020-12-19 16:31:40'),
(74, 'Lumban-Gaol_Foto-958250700-1609254867.jpg', '/uploads/img/Album/', '2020-12-29 15:14:27', '2020-12-29 15:14:27'),
(75, 'Lumban-Gaol_Foto-1104795409-1609781146.jpg', '/uploads/img/Album/', '2021-01-04 17:25:49', '2021-01-04 17:25:49'),
(77, 'Lumban-Gaol_Foto-922792640-1609822427.jpg', '/uploads/img/Album/', '2021-01-05 04:53:47', '2021-01-05 04:53:47'),
(78, 'Lumban-Gaol_Foto-1925700894-1609822556.jpg', '/uploads/img/Album/', '2021-01-05 04:55:56', '2021-01-05 04:55:56'),
(79, 'Lumban-Gaol_Foto-170690085-1609829822.jpg', '/uploads/img/Album/', '2021-01-05 06:57:02', '2021-01-05 06:57:02'),
(80, 'Lumban-Gaol_Foto-426351477-1609830137.jpg', '/uploads/img/Album/', '2021-01-05 07:02:17', '2021-01-05 07:02:17'),
(81, 'Lumban-Gaol_Foto-978409194-1609939835.jpg', '/uploads/img/Album/', '2021-01-06 13:30:39', '2021-01-06 13:30:39'),
(82, 'Lumban-Gaol_Foto-1963421119-1609941359.jpg', '/uploads/img/Album/', '2021-01-06 13:55:59', '2021-01-06 13:55:59'),
(83, 'Lumban-Gaol_Foto-460480523-1609952655.jpg', '/uploads/img/Album/', '2021-01-06 17:04:15', '2021-01-06 17:04:15'),
(84, 'Lumban-Gaol_Foto-1518447447-1609953130.jpg', '/uploads/img/Album/', '2021-01-06 17:12:10', '2021-01-06 17:12:10'),
(85, 'Lumban-Gaol_Foto-1424440590-1609953256.jpg', '/uploads/img/Album/', '2021-01-06 17:14:20', '2021-01-06 17:14:20'),
(86, 'Lumban-Gaol_Foto-49552350-1609953354.jpg', '/uploads/img/Album/', '2021-01-06 17:15:54', '2021-01-06 17:15:54'),
(87, 'Lumban-Gaol_Foto-767494776-1609985792.jpg', '/uploads/img/Album/', '2021-01-07 02:16:32', '2021-01-07 02:16:32'),
(88, 'Lumban-Gaol_Foto-1697469938-1610010771.jpg', '/uploads/img/Album/', '2021-01-07 09:12:52', '2021-01-07 09:12:52'),
(89, 'Lumban-Gaol_Foto-1028964233-1610016175.jpg', '/uploads/img/Album/', '2021-01-07 10:42:55', '2021-01-07 10:42:55'),
(90, 'Lumban-Gaol_Foto-1258074231-1610030364.gif', '/uploads/img/Album/', '2021-01-07 14:39:24', '2021-01-07 14:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `replays`
--

CREATE TABLE `replays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idAspiration` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `replay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replays`
--

INSERT INTO `replays` (`id`, `idAspiration`, `idUser`, `replay`, `created_at`, `updated_at`) VALUES
(10, 15, 1, '<p>Baik kami akan segera merundingkannya.</p>', '2021-01-08 00:08:23', '2021-01-08 00:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `jenisKelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `role` int(11) DEFAULT 2,
  `status` int(11) DEFAULT 0,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LumbanGaol-Default-UserProfil.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `alamat`, `tanggalLahir`, `jenisKelamin`, `role`, `status`, `profile`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lumban Gaol Tambunan', 'lumbangaoltambunan2000@gmail.com', 'Lumban Gaol, Tambunan', '2000-01-19', 'L', 1, 0, 'Lumban-Gaol_userProfile-925913809-1609252462.png', '2020-12-06 08:13:29', '$2y$10$.kkBLGeoiFV6PIVQH7yopeSKoYusfvYrXaDOY6Vg5CvnP2p/ZWnLK', '112491497632638156627', '8tZYR8gJ8dBdvgi0aaNRGYdswiwDKIYUh0kReFZhH9LSdrueK704exHTfzlR', '2020-12-06 07:58:02', '2021-01-05 13:07:13'),
(5, 'Andree Panjaitan', 'blankandree8@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2020-12-08 19:57:38', '$2y$10$8P.pLj6U40X3VZ6DLnSGOeLo2WcGi3GSD45k9.iDVGXOEOBzfmgt2', '105390345943700935966', 'B1dizHWPU8J8jDsyhPo4QFfxcq6MOvrYye2TuOfL8oEKPjTPcB8geBK8Sp3P', '2020-12-08 19:56:57', '2021-01-08 00:17:04'),
(7, 'Andree Panjaitan', 'panjaitanandree@gmail.com', 'Porsea', '2002-01-11', 'L', 2, 0, 'Lumban-Gaol_userProfile-1394316627-1609674415.jpg', '2020-12-10 09:45:16', '$2y$10$h6EwRU.1c.K3m6p5smnl7OCi/4Ptv2uUZE3d2hIgj.QtuX50ADQqm', '117696922215256432973', NULL, '2020-12-10 09:44:32', '2020-12-10 09:45:16'),
(8, 'Andree Panjaitan', 'panjaitanandree11@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2020-12-23 21:48:46', '$2y$10$N4vgI5P6ePA4aE26sO90EuONafxNylSXf8InTNhmgQr28o3g/As0a', '107569047042327589378', NULL, '2020-12-23 21:47:29', '2020-12-23 21:48:46'),
(9, 'Astri Panjaitan', 'astriivopanjaitan@gmail.com', NULL, NULL, 'L', 2, 0, 'Lumban-Gaol_userProfile-2041713119-1609777955.jpg', '2021-01-04 23:25:16', '$2y$10$VBz2DVWnuq.fbpaRagzw5Omrk/zC4a/xbq91VlG2aFn7mnhnz7Due', '117273319431509614778', NULL, '2021-01-04 23:24:15', '2021-01-04 23:25:16'),
(10, 'Astri Panjaitan', 'astripan.13@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-04 23:41:36', '$2y$10$iyMZhqmawHhyGUBnI.N97O00.X/5NRgb/Vf5SLrI8ngGZwHmgmbBu', '108427711712865512754', NULL, '2021-01-04 23:40:45', '2021-01-04 23:41:36'),
(11, 'Sarah Simorangkir', 'sarahsimorangkir34@gmail.com', 'Belum Mengisi Alamat', '2001-02-28', 'P', 2, 0, 'Lumban-Gaol_userProfile-799853884-1609945826.jpg', '2021-01-04 23:54:55', '$2y$10$Adw7V.UdrINlbTEckAAmyuIQ30ve0ISAwbuV4RpC/EdwC69mSAuCe', '117621924815470880234', 'wIOxbYcXWUH6RI8Eg3l61hEmySeAJSCWZKI3EIsm1wPMrqKbgcmeJwWC7eGv', '2021-01-04 23:50:15', '2021-01-04 23:54:55'),
(12, '02 - Ade Putra Rejeki', 'putrapanjaitan23@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-06 23:05:08', '$2y$10$6pYh4WQdEMi/9WPyGwhRReo0TikFY0OqW5xZepbzOY99zNwrySnLa', '104826725279110861428', NULL, '2021-01-06 23:04:04', '2021-01-06 23:05:08'),
(13, 'Indah Andriyani Sitorus', 'indahsitorus0901@gmail.com', 'Belum Mengisi Alamat', '2021-01-06', 'P', 2, 0, 'Lumban-Gaol_userProfile-1723966743-1609952565.jpg', '2021-01-06 23:51:05', '$2y$10$IAar4QNheeSHMxVtfh0G9eVlpWu7jNmzhibkaayHrEtqugreWhIY2', '116110925910756165265', NULL, '2021-01-06 23:43:18', '2021-01-06 23:51:05'),
(14, 'Yemima Febe Yanti Marpaung', 'yemimafym17@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-07 06:48:21', '$2y$10$QNpsRLW5SB/01E0.DjbnTOXkJCFlEeiJKSJS82sEPgaPzOFBXptXK', NULL, NULL, '2021-01-07 06:47:24', '2021-01-07 06:48:21'),
(15, 'Parasian Manurung', 'parasian12@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', NULL, '$2y$10$lSjU7/eAJ./cNYnzHmn9DuBfn92R9l6vRKMaO0cFpvaTE0k8CL6Ay', NULL, NULL, '2021-01-07 08:34:31', '2021-01-07 08:34:31'),
(16, 'Johan Fransiskus', 'hansmak518@gmail.com', 'Balige', '1980-04-21', 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-07 08:47:28', '$2y$10$mJvhedFYHBFjQjB6fWH1SeouFPifAjiKVO1AuhMMBoBaSe1S2LR1G', '114691120107435329777', NULL, '2021-01-07 08:42:42', '2021-01-07 08:47:28'),
(17, 'nazirmanurung 020', 'nazirjiminmanurung@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-07 10:35:14', '$2y$10$gRC0dmLTkMqgD9lMWQyKjO0F.WpUyy.zo0CQxpTFSJY/QxZLFn0Hq', '115221489476497149773', NULL, '2021-01-07 10:30:31', '2021-01-07 10:35:14'),
(18, 'Sarah Susanty Tampubolon', 'sarahsusanty1510@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-07 14:29:01', '$2y$10$RHpHP1du.wQSdj3ARDrOoOaVQvSPS9bXsWk1NPkSyQ//Tk/.fnwRu', '108248538053358578403', NULL, '2021-01-07 10:38:04', '2021-01-07 14:29:01'),
(19, 'Gahasa Purba', 'timothiuspurba@gmail.com', NULL, NULL, 'L', 2, 0, 'LumbanGaol-Default-UserProfil.png', '2021-01-07 19:49:06', '$2y$10$pEaBEConT/bR9RPQ/nFk/.IByvCtuLLP/04kQUaexPjkxWtc61fsu', '118413417097619390807', NULL, '2021-01-07 19:48:32', '2021-01-07 19:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_display3` (`idDisplay`);

--
-- Indexes for table `album_picture`
--
ALTER TABLE `album_picture`
  ADD PRIMARY KEY (`idAlbum`,`idPicture`),
  ADD KEY `fk_pictures` (`idPicture`);

--
-- Indexes for table `album_video`
--
ALTER TABLE `album_video`
  ADD PRIMARY KEY (`idAlbum`,`idVideo`),
  ADD KEY `fk_video` (`idVideo`);

--
-- Indexes for table `aspirations`
--
ALTER TABLE `aspirations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user1` (`idUser`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `data_web`
--
ALTER TABLE `data_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filemanager`
--
ALTER TABLE `filemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_participants`
--
ALTER TABLE `forum_participants`
  ADD PRIMARY KEY (`idForum`,`idUser`),
  ADD KEY `fk_user2` (`idUser`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Category2` (`idCategory`),
  ADD KEY `fk_Display2` (`idDisplay`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_forum2` (`idForum`),
  ADD KEY `fk_user3` (`idUser`);

--
-- Indexes for table `message_reads`
--
ALTER TABLE `message_reads`
  ADD PRIMARY KEY (`idMessage`,`idUser`),
  ADD KEY `fk_user4` (`idUser`);

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
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replays`
--
ALTER TABLE `replays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aspirations` (`idAspiration`),
  ADD KEY `fk_user5` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `aspirations`
--
ALTER TABLE `aspirations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_web`
--
ALTER TABLE `data_web`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filemanager`
--
ALTER TABLE `filemanager`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `replays`
--
ALTER TABLE `replays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_display3` FOREIGN KEY (`idDisplay`) REFERENCES `pictures` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `album_picture`
--
ALTER TABLE `album_picture`
  ADD CONSTRAINT `fk_album` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pictures` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `album_video`
--
ALTER TABLE `album_video`
  ADD CONSTRAINT `fk_album2` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_video` FOREIGN KEY (`idVideo`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `aspirations`
--
ALTER TABLE `aspirations`
  ADD CONSTRAINT `fk_user1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_participants`
--
ALTER TABLE `forum_participants`
  ADD CONSTRAINT `fk_forum3` FOREIGN KEY (`idForum`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `fk_Category2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Display2` FOREIGN KEY (`idDisplay`) REFERENCES `pictures` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_forum2` FOREIGN KEY (`idForum`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user3` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message_reads`
--
ALTER TABLE `message_reads`
  ADD CONSTRAINT `fk_messages` FOREIGN KEY (`idMessage`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user4` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replays`
--
ALTER TABLE `replays`
  ADD CONSTRAINT `fk_aspirations` FOREIGN KEY (`idAspiration`) REFERENCES `aspirations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user5` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
