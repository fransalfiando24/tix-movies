-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 08:07 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'frans', 'fransalfiando24', 'Fran''s Alfiando');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE IF NOT EXISTS `cinema` (
  `idcinema` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `namacinema` varchar(50) NOT NULL,
  `lokasicinema` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jmlkursikesamping` int(11) NOT NULL,
  `jmlkursikebelakang` int(11) NOT NULL,
  `tglcinema` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcinema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`idcinema`, `idadmin`, `namacinema`, `lokasicinema`, `harga`, `jmlkursikesamping`, `jmlkursikebelakang`, `tglcinema`) VALUES
(1, 1, 'Cinema XXI Plaza Andalas ', 'Padang', 35000, 12, 10, '2020-12-27 09:45:12'),
(2, 1, 'Cinema XXI Transmart ', 'Padang', 40000, 15, 12, '2020-12-27 09:48:29'),
(3, 1, 'CGV Raya', 'Padang', 35000, 10, 10, '2020-12-29 21:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `idgenre` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `namagenre` varchar(30) NOT NULL,
  `ketgenre` text NOT NULL,
  `tglgenre` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idgenre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idgenre`, `idadmin`, `namagenre`, `ketgenre`, `tglgenre`) VALUES
(1, 1, 'Drama', 'Film dengan genre Drama dapat ditemukan disini', '2020-12-24 14:04:58'),
(2, 1, 'Comedy', 'Film dengan genre Comedy dapat ditemukan disini', '2020-12-24 14:05:43'),
(3, 1, 'Animation', 'Film dengan genre Animation dapat ditemukan disini', '2020-12-24 14:06:20'),
(4, 1, 'Documentary', 'Film dengan genre Documentary dapat ditemukan disini', '2020-12-24 14:06:51'),
(5, 1, 'Thriller', 'Film dengan genre Thriller dapat ditemukan disini', '2020-12-24 14:07:37'),
(6, 1, 'Action', 'Film dengan genre Action dapat ditemukan disini', '2020-12-24 21:02:35'),
(7, 1, 'Horror', 'Film dengan genre Horror bisa ditemukan disini', '2020-12-28 20:57:41'),
(8, 1, 'Crime', 'Film dengan genre Crime dapat ditemukan disini', '2021-01-05 20:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `idjadwal` int(11) NOT NULL AUTO_INCREMENT,
  `idmovie` int(11) NOT NULL,
  `idcinema` int(11) NOT NULL,
  `tgltayang` date NOT NULL DEFAULT '0000-00-00',
  `jamtayang` varchar(10) NOT NULL,
  `tglsimpan` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idjadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `idmovie`, `idcinema`, `tgltayang`, `jamtayang`, `tglsimpan`) VALUES
(3, 1, 1, '2020-12-04', '19:00', '2020-12-27 22:04:49'),
(4, 1, 2, '2021-01-03', '11:30', '2021-01-03 20:32:42'),
(5, 1, 3, '2021-01-04', '14:30', '2021-01-03 20:32:55'),
(6, 1, 1, '2021-01-05', '19:00', '2021-01-03 20:33:10'),
(7, 1, 3, '2021-01-05', '11:30', '2021-01-03 20:58:02'),
(8, 1, 3, '2021-01-05', '09:00', '2021-01-05 09:34:53'),
(9, 1, 3, '2021-01-09', '11:30', '2021-01-05 10:52:08'),
(10, 1, 3, '2021-01-09', '17:30', '2021-01-05 10:52:31'),
(19, 1, 3, '2021-01-09', '23:00', '2021-01-07 20:51:41'),
(20, 4, 2, '2021-02-14', '11:30', '2021-01-13 20:44:07'),
(21, 4, 2, '2021-02-14', '16:00', '2021-01-13 20:45:00'),
(22, 4, 2, '2021-02-15', '13:00', '2021-01-13 20:45:38'),
(23, 4, 1, '2021-02-14', '14:30', '2021-01-13 20:46:16'),
(24, 4, 1, '2021-02-14', '17:30', '2021-01-13 20:46:43'),
(25, 4, 1, '2021-02-15', '19:00', '2021-01-13 20:47:37'),
(26, 4, 1, '2021-02-15', '21:30', '2021-01-13 20:48:06'),
(27, 8, 3, '2021-02-16', '09:00', '2021-01-13 20:49:58'),
(28, 8, 3, '2021-02-16', '13:00', '2021-01-13 20:50:22'),
(29, 8, 3, '2021-02-16', '19:00', '2021-01-13 20:50:45'),
(30, 8, 3, '2021-02-17', '13:00', '2021-01-13 20:51:18'),
(31, 8, 3, '2021-02-17', '16:00', '2021-01-13 20:51:43'),
(32, 8, 2, '2021-02-16', '14:30', '2021-01-13 20:52:06'),
(33, 8, 2, '2021-02-16', '16:00', '2021-01-13 20:52:38'),
(35, 8, 2, '2021-02-17', '21:30', '2021-01-13 20:54:06'),
(36, 7, 1, '2021-02-17', '19:00', '2021-01-13 20:55:38'),
(37, 7, 1, '2021-02-17', '21:30', '2021-01-13 20:56:10'),
(38, 7, 1, '2021-02-17', '23:00', '2021-01-13 20:56:26'),
(39, 7, 1, '2021-02-18', '21:30', '2021-01-13 20:56:44'),
(40, 7, 1, '2021-02-18', '23:00', '2021-01-13 20:57:15'),
(41, 7, 1, '2021-02-19', '21:30', '2021-01-13 20:58:12'),
(42, 7, 2, '2021-02-18', '21:30', '2021-01-13 21:13:30'),
(43, 7, 2, '2021-02-19', '21:30', '2021-01-13 21:14:01'),
(44, 7, 2, '2021-02-19', '23:00', '2021-01-13 21:14:14'),
(45, 3, 3, '2021-02-15', '11:30', '2021-01-13 21:15:42'),
(46, 3, 3, '2021-02-15', '14:30', '2021-01-13 21:15:54'),
(47, 3, 3, '2021-02-15', '17:30', '2021-01-13 21:16:09'),
(48, 3, 3, '2021-02-15', '21:30', '2021-01-13 21:16:28'),
(49, 3, 3, '2021-02-16', '13:00', '2021-01-13 21:16:46'),
(50, 3, 3, '2021-02-16', '17:30', '2021-01-13 21:17:01'),
(51, 3, 3, '2021-02-17', '09:00', '2021-01-13 21:17:20'),
(52, 3, 3, '2021-02-17', '14:30', '2021-01-13 21:17:47'),
(53, 3, 3, '2021-02-17', '19:00', '2021-01-13 21:18:18'),
(54, 3, 1, '2021-02-16', '11:30', '2021-01-13 21:18:44'),
(55, 3, 1, '2021-02-16', '14:30', '2021-01-13 21:19:04'),
(56, 3, 1, '2021-02-17', '13:00', '2021-01-13 21:19:21'),
(57, 3, 1, '2021-02-17', '16:00', '2021-01-13 21:19:38'),
(58, 3, 1, '2021-02-17', '19:00', '2021-01-13 21:19:58'),
(59, 3, 1, '2021-02-16', '21:30', '2021-01-13 21:20:24'),
(60, 3, 2, '2021-02-17', '14:30', '2021-01-13 21:20:45'),
(61, 3, 2, '2021-02-17', '17:30', '2021-01-13 21:21:08'),
(62, 3, 2, '2021-02-18', '16:00', '2021-01-13 21:21:25'),
(63, 3, 2, '2021-02-18', '17:30', '2021-01-13 21:22:14'),
(64, 3, 2, '2021-02-18', '19:00', '2021-01-13 21:22:35'),
(65, 3, 2, '2021-02-18', '21:30', '2021-01-13 21:22:53'),
(66, 9, 2, '2021-02-18', '14:30', '2021-01-31 12:17:22'),
(67, 9, 2, '2021-02-18', '19:00', '2021-01-31 12:17:46'),
(68, 9, 2, '2021-02-19', '16:00', '2021-01-31 12:18:05'),
(69, 10, 1, '2021-02-20', '13:00', '2021-01-31 12:18:29'),
(70, 10, 1, '2021-02-20', '19:00', '2021-01-31 12:18:54'),
(71, 9, 1, '2021-02-21', '13:00', '2021-01-31 12:19:12'),
(72, 10, 1, '2021-02-21', '16:00', '2021-01-31 12:20:13'),
(73, 10, 1, '2021-02-21', '21:30', '2021-01-31 12:20:32'),
(74, 10, 3, '2021-02-20', '16:00', '2021-01-31 12:21:42'),
(75, 10, 3, '2021-02-21', '17:30', '2021-01-31 12:22:23'),
(76, 11, 1, '2021-02-17', '19:00', '2021-01-31 12:22:54'),
(77, 11, 1, '2021-02-17', '21:30', '2021-01-31 12:23:07'),
(78, 11, 1, '2021-02-17', '23:00', '2021-01-31 12:23:46'),
(79, 11, 1, '2021-02-18', '21:30', '2021-01-31 12:24:02'),
(80, 11, 1, '2021-02-19', '21:30', '2021-01-31 12:24:15'),
(81, 11, 1, '2021-02-19', '23:00', '2021-01-31 12:24:34'),
(82, 11, 2, '2021-02-18', '21:30', '2021-01-31 12:24:54'),
(83, 11, 2, '2021-02-18', '23:00', '2021-01-31 12:25:16'),
(84, 11, 2, '2021-02-19', '23:00', '2021-01-31 12:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE IF NOT EXISTS `kursi` (
  `idkursi` int(11) NOT NULL AUTO_INCREMENT,
  `nokursi` varchar(50) NOT NULL,
  PRIMARY KEY (`idkursi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`idkursi`, `nokursi`) VALUES
(2, ''),
(3, ''),
(4, ''),
(5, 'A3,A4,'),
(6, 'A4 A5 '),
(7, 'B4 B5 '),
(8, 'B6 B7 B8 '),
(9, '1'),
(10, '5'),
(11, '4');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idmember` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tgldaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `email`, `password`, `nama`, `jk`, `tgllahir`, `alamat`, `nohp`, `tgldaftar`) VALUES
(3, 'fransalfiando@gmail.com', 'fransalfiando24', 'Frans Alfiando', 'L', '2000-04-24', 'Lubuk Begalung, Padang', '082169738862', '2021-01-06 20:30:22'),
(4, 'dindaputri@yahoo.com', 'dindaputri', 'Dinda Putri Pratama', 'P', '2001-10-10', 'Bukittinggi', '089078657345', '2021-01-13 21:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `idmovie` int(11) NOT NULL AUTO_INCREMENT,
  `idgenre` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `sutradara` varchar(50) NOT NULL,
  `pemain` text NOT NULL,
  `sinopsis` text NOT NULL,
  `rating` float NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `tglmovie` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idmovie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`idmovie`, `idgenre`, `idadmin`, `status`, `judul`, `durasi`, `sutradara`, `pemain`, `sinopsis`, `rating`, `trailer`, `poster`, `tglmovie`) VALUES
(1, 6, 1, 'Now Playing', 'Wonder Woman 1984', 155, 'Patty Jenkins', 'Gal Gadot, Chris Pine, Kristen Wiig, Pedro Pascal, dll', 'Berlatar setting tahun 1980-an, petualangan Wonder Woman selanjutnya adalah menghadapi dua musuh baru: Max Lord dan The Cheetah.\r\n', 6.3, '<iframe width="560" height="315" src="https://www.youtube.com/embed/XW2E2Fnh52w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'wonderwomen.jpg', '2020-12-26 19:45:04'),
(2, 3, 1, 'Coming Soon', 'Sponge on the Run', 0, 'Tim Hill', 'Keanu Reeves, Stephen Hillenburg, Snoop Dogg, Awkwafina, dll', 'Setelah keong kesayangan SpongeBob, Gary menghilang, dia dan Patrick memulai petualangan epik ke Kota Yang Hilang di Kota Atlantik untuk membawa pulang Gary.', 0, '<iframe width="560" height="315" src="https://www.youtube.com/embed/neBkma9xtjM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'SpongeOnTheRun.jpg', '2020-12-26 20:12:39'),
(3, 8, 1, 'Now Playing', 'Joker', 122, 'Todd Phillips', ' Joaquin Phoenix, Robert De Niro, Zazie Beetz, dll', 'Di Kota Gotham, komedian yang bermasalah secara mental, Arthur Fleck, diabaikan dan dianiaya oleh masyarakat. Dia kemudian memulai spiral revolusi dan kejahatan berdarah. Jalan ini membawanya bertatap muka dengan alter-egonya: Joker.', 8.5, '<iframe width="560" height="315" src="https://www.youtube.com/embed/vOW4oybCNAw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'jokerposter.jpg', '2021-01-05 20:57:13'),
(4, 6, 1, 'Now Playing', 'Gundala', 123, ' Joko Anwar', 'Abimana Aryasatya, Pevita Pearce, Tara Basro, Bront Palarae, dll', 'Sancaka hidup di jalanan sejak ditinggal ayah dan ibunya. Menghadapi hidup yang keras, Sancaka belajar untuk bertahan hidup dengan tidak peduli dengan orang lain dan hanya mencoba untuk mendapatkan tempat yang aman bagi dirinya sendiri. Ketika situasi kota semakin tidak aman dan ketidakadilan merajalela di seluruh negeri, Sancaka harus buat keputusan yang berat, tetap hidup di zona amannya, atau keluar sebagai Gundala untuk membela orang-orang yang ditindas.', 6.3, '<iframe width="560" height="315" src="https://www.youtube.com/embed/8rauD1vxMCw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'gundalaposter.jpg', '2021-01-05 21:12:14'),
(5, 6, 1, 'Coming Soon', 'Birds of Prey', 0, ' Cathy Yan', 'Margot Robbie, Jurnee Smollett, Mary Elizabeth Winstead, Ewan McGregor, dll', 'Setelah berpisah dengan Joker, Harley Quinn (Margot Robbie) bergabung dengan Black Canary (Jurnee Smollett-Bell), Huntress (Mary Elizabeth Winstead) dan Renee Montoya (Rosie Perez) untuk menyelamatkan seorang gadis muda bernama Cassandra Cain (Ella Jay Basco) dari sosok penguasa kejahatan yang dikenal sebagai Black Mask (Ewan McGregor).', 0, '<iframe width="560" height="315" src="https://www.youtube.com/embed/2W-Yrdwgj8E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'birdsofpreyposter.jpg', '2021-01-05 21:19:07'),
(6, 7, 1, 'Coming Soon', 'Perempuan Tanah Jahanam', 0, 'Joko Anwar', 'Tara Basro, Faradina Mufti, Aghniny Haque, Marissa Anita, dll', 'Maya (Tarao Basro) jatuh bangun hidup di kota tanpa keluarga, ia hanya memiliki sahabat bernama Dini. Saat usaha bersama mereka membutuhkan modal lebih, Maya yang mendapatkan informasi bahwa dia mungkin memiliki harta warisan dari keluarganya yang kaya di desa, membuatnya pergi mengunjungi kampung halaman yang tak pernah dikenalnya itu. Sesampainya di kampung yang jauh terpencil di tengah hutan, Maya dan Dini sampai di rumah besar yang kosong. Situasi sekitar juga terlihat aneh, salah satunya banyak kuburan anak-anak. Hingga pada suatu malam, Maya mendengar jeritan perempuan yang hendak melahirkan. Maya menuju asal suara dan menyaksikan proses kelahiran anak tersebut. Dari situlah, sedikit demi sedikit, misteri kampung yang kini ditinggali Maya dan Dini mulai terungkap.', 0, '<iframe width="560" height="315" src="https://www.youtube.com/embed/XY7falovJiI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'perempuantanahjahanamposter.jpg', '2021-01-05 21:24:32'),
(7, 7, 1, 'Now Playing', 'Ratu Ilmu Hitam', 99, ' Kimo Stamboel', 'Ade Firman Hakim, Adhisty Zara, Shenina Cinnamon, Ari Irham, dll', 'Hanif membawa Nadya istrinya dan ketiga anak mereka ke panti asuhan tempat Hanif dulu dibesarkan. Pengasuh panti itu, Pak Bandi, sudah sangat tua dan sakit keras, Hanif datang untuk menjenguk setelah bertahun-tahun tidak bertemu. Bukan cuma Hanif yang datang berkunjung, tapi juga dua sahabat Hanif saat tinggal di panti, Anton dan Jefri yang membawa istri-istri mereka. Malam itu mereka semua tiba di panti asuhan yang terletak di luar kota dan jauh dari pemukiman penduduk itu. Mereka bermaksud bermalam di sana untuk memberikan penghormatan terakhir buat orang yang telah mengasuh mereka sejak kecil. Mereka menyangka malam itu akan jadi malam yang penuh kedamaian. Mereka segera memahami bahwa mereka salah.', 6.7, '<iframe width="560" height="315" src="https://www.youtube.com/embed/594PxKASQfg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'ratuilmuhitam.jpg', '2021-01-05 21:32:21'),
(8, 6, 1, 'Now Playing', 'Mulan', 120, ' Niki Caro', 'Liu Yifei, Jet Li, Donnie Yen, Jason Scott Lee, dll', 'Ketika kaisar Tiongkok mengeluarkan dekrit bahwa satu pria dari setiap keluarga wajib bergabung dalam tentara kekaisaran untuk mempertahankan negara dari serangan bangsa Hun, Hua Mulan, putri tertua dari seorang pejuang terhormat, memutuskan menggantikan ayahnya yang sakit-sakitan.', 5.6, '<iframe width="560" height="315" src="https://www.youtube.com/embed/R-eFm--k21c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'mulanposter.jpg', '2021-01-05 21:38:10'),
(9, 6, 1, 'Now Playing', 'Monster Hunter', 104, 'Paul W. S. Anderson', 'Milla Jovovich, Tony Jaa, Ron Perlman, Meagan Good, dll.', 'Ketika Letnan Artemis dan pasukanya berpindah ke dunia baru, mereka terlibat dalam pertempuran yang mengerikan demi bertahan hidup melawan mahluk besar dengan kekuatan yang luar biasa.', 5.3, '<iframe width="560" height="315" src="https://www.youtube.com/embed/3od-kQMTZ9M" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'monsterhunterposter.jpg', '2021-01-29 21:29:08'),
(10, 6, 1, 'Now Playing', 'The New Mutants', 99, 'Josh Boone', 'Anya Taylorâ€‘Joy, Maisie Williams, Charlie Heaton, Blu Hunt,dll', 'Twentieth Century Studios dan Marvel Entertainment mempersembahkan The New Mutants, sebuah film horror thriller yang berlokasi di sebuah rumah sakit terpencil di mana sekelompok mutan remaja ditahan untuk pemantauan psikiatri. Kejadian-kejadian aneh mulai terjadi yang akan menguji baik kemampuan mutan mereka dan juga persahabatan mereka saat mereka berjuang untuk bisa keluar dengan selamat.', 5.3, '<iframe width="560" height="315" src="https://www.youtube.com/embed/W_vJhUAOFpI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'thenewmutants.jpg', '2021-01-31 12:06:37'),
(11, 5, 1, 'Now Playing', 'RUN', 99, 'Aneesh Chaganty', 'Sarah Paulson, Kiera Allen, Onalee Ames, Sara Sohn.', 'Menceritakan tentang seorang anak perempuan, Chloe (Kiera Allen) yang mempunyai ibu bernama Diane (Sarah Paulson). Diane membesarkan Chloe seorang diri dalam isolasi, mengontrol setiap gerak-gerik putrinya sejak lahir hingga besar.', 6.7, '<iframe width="560" height="315" src="https://www.youtube.com/embed/0Dhh7q9Us5c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'RUN.jpg', '2021-01-31 12:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `idticket` int(100) NOT NULL AUTO_INCREMENT,
  `idjadwal` int(11) NOT NULL,
  `seatrow` int(11) NOT NULL,
  `seatcol` int(11) NOT NULL,
  `namamember` varchar(50) NOT NULL,
  `hargaticket` varchar(30) NOT NULL,
  PRIMARY KEY (`idticket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=229 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`idticket`, `idjadwal`, `seatrow`, `seatcol`, `namamember`, `hargaticket`) VALUES
(31, 6, 10, 5, 'YES', '35000'),
(32, 6, 10, 4, 'YES', '35000'),
(33, 6, 10, 5, 'YES', '35000'),
(34, 6, 10, 4, 'YES', '35000'),
(35, 6, 10, 5, 'YES', '35000'),
(36, 6, 10, 4, 'YES', '35000'),
(37, 6, 10, 5, 'YES', '35000'),
(38, 3, 6, 6, 'YES', '35000'),
(39, 3, 10, 1, 'Frans Alfiando', '35000'),
(40, 3, 10, 2, 'Frans Alfiando', '35000'),
(41, 4, 8, 6, 'Frans Alfiando', '40000'),
(42, 4, 8, 7, 'Frans Alfiando', '40000'),
(43, 3, 10, 4, 'Frans Alfiando', '35000'),
(44, 4, 12, 2, 'Frans Alfiando', '40000'),
(46, 4, 11, 1, 'Frans Alfiando', '40000'),
(47, 4, 11, 2, 'Frans Alfiando', '40000'),
(48, 4, 1, 1, 'Frans Alfiando', '40000'),
(49, 4, 1, 2, 'Frans Alfiando', '40000'),
(50, 4, 1, 14, 'Frans Alfiando', '40000'),
(51, 4, 1, 15, 'Frans Alfiando', '40000'),
(52, 4, 1, 6, 'Frans Alfiando', '40000'),
(53, 4, 1, 7, 'Frans Alfiando', '40000'),
(54, 4, 1, 8, 'Frans Alfiando', '40000'),
(55, 4, 1, 6, 'Frans Alfiando', '40000'),
(56, 4, 1, 7, 'Frans Alfiando', '40000'),
(57, 4, 1, 8, 'Frans Alfiando', '40000'),
(58, 4, 1, 6, 'Frans Alfiando', '40000'),
(59, 4, 1, 7, 'Frans Alfiando', '40000'),
(60, 4, 1, 8, 'Frans Alfiando', '40000'),
(61, 4, 1, 6, 'Frans Alfiando', '40000'),
(62, 4, 1, 7, 'Frans Alfiando', '40000'),
(63, 4, 1, 8, 'Frans Alfiando', '40000'),
(64, 4, 1, 6, 'Frans Alfiando', '40000'),
(65, 4, 1, 7, 'Frans Alfiando', '40000'),
(66, 4, 1, 8, 'Frans Alfiando', '40000'),
(67, 4, 1, 6, 'Frans Alfiando', '40000'),
(68, 4, 1, 7, 'Frans Alfiando', '40000'),
(69, 4, 1, 8, 'Frans Alfiando', '40000'),
(70, 4, 1, 6, 'Frans Alfiando', '40000'),
(71, 4, 1, 7, 'Frans Alfiando', '40000'),
(72, 4, 1, 8, 'Frans Alfiando', '40000'),
(73, 4, 1, 6, 'Frans Alfiando', '40000'),
(74, 4, 1, 7, 'Frans Alfiando', '40000'),
(75, 4, 1, 8, 'Frans Alfiando', '40000'),
(76, 4, 1, 6, 'Frans Alfiando', '40000'),
(77, 4, 1, 7, 'Frans Alfiando', '40000'),
(78, 4, 1, 8, 'Frans Alfiando', '40000'),
(79, 4, 1, 6, 'Frans Alfiando', '40000'),
(80, 4, 1, 7, 'Frans Alfiando', '40000'),
(81, 4, 1, 8, 'Frans Alfiando', '40000'),
(82, 4, 1, 6, 'Frans Alfiando', '40000'),
(83, 4, 1, 7, 'Frans Alfiando', '40000'),
(84, 4, 1, 8, 'Frans Alfiando', '40000'),
(85, 4, 1, 6, 'Frans Alfiando', '40000'),
(86, 4, 1, 7, 'Frans Alfiando', '40000'),
(87, 4, 1, 8, 'Frans Alfiando', '40000'),
(88, 4, 1, 6, 'Frans Alfiando', '40000'),
(89, 4, 1, 7, 'Frans Alfiando', '40000'),
(90, 4, 1, 8, 'Frans Alfiando', '40000'),
(91, 4, 1, 6, 'Frans Alfiando', '40000'),
(92, 4, 1, 7, 'Frans Alfiando', '40000'),
(93, 4, 1, 8, 'Frans Alfiando', '40000'),
(94, 4, 1, 6, 'Frans Alfiando', '40000'),
(95, 4, 1, 7, 'Frans Alfiando', '40000'),
(96, 4, 1, 8, 'Frans Alfiando', '40000'),
(97, 4, 1, 6, 'Frans Alfiando', '40000'),
(98, 4, 1, 7, 'Frans Alfiando', '40000'),
(99, 4, 1, 8, 'Frans Alfiando', '40000'),
(100, 4, 1, 6, 'Frans Alfiando', '40000'),
(101, 4, 1, 7, 'Frans Alfiando', '40000'),
(102, 4, 1, 8, 'Frans Alfiando', '40000'),
(103, 4, 1, 6, 'Frans Alfiando', '40000'),
(104, 4, 1, 7, 'Frans Alfiando', '40000'),
(105, 4, 1, 8, 'Frans Alfiando', '40000'),
(106, 4, 1, 6, 'Frans Alfiando', '40000'),
(107, 4, 1, 7, 'Frans Alfiando', '40000'),
(108, 4, 1, 8, 'Frans Alfiando', '40000'),
(109, 4, 1, 6, 'Frans Alfiando', '40000'),
(110, 4, 1, 7, 'Frans Alfiando', '40000'),
(111, 4, 1, 8, 'Frans Alfiando', '40000'),
(112, 4, 1, 6, 'Frans Alfiando', '40000'),
(113, 4, 1, 7, 'Frans Alfiando', '40000'),
(114, 4, 1, 8, 'Frans Alfiando', '40000'),
(115, 4, 1, 6, 'Frans Alfiando', '40000'),
(116, 4, 1, 7, 'Frans Alfiando', '40000'),
(117, 4, 1, 8, 'Frans Alfiando', '40000'),
(118, 4, 1, 6, 'Frans Alfiando', '40000'),
(119, 4, 1, 7, 'Frans Alfiando', '40000'),
(120, 4, 1, 8, 'Frans Alfiando', '40000'),
(121, 4, 1, 6, 'Frans Alfiando', '40000'),
(122, 4, 1, 7, 'Frans Alfiando', '40000'),
(123, 4, 1, 8, 'Frans Alfiando', '40000'),
(124, 4, 12, 14, 'Frans Alfiando', '40000'),
(125, 4, 12, 15, 'Frans Alfiando', '40000'),
(126, 4, 2, 14, 'Frans Alfiando', '40000'),
(127, 4, 2, 15, 'Frans Alfiando', '40000'),
(128, 4, 2, 3, 'Frans Alfiando', '40000'),
(129, 4, 2, 4, 'Frans Alfiando', '40000'),
(130, 4, 2, 5, 'Frans Alfiando', '40000'),
(131, 4, 2, 6, 'Frans Alfiando', '40000'),
(132, 6, 7, 3, 'Frans Alfiando', '35000'),
(133, 6, 7, 4, 'Frans Alfiando', '35000'),
(134, 9, 9, 3, 'Frans Alfiando', '35000'),
(135, 9, 9, 4, 'Frans Alfiando', '35000'),
(136, 9, 10, 1, 'Frans Alfiando', '35000'),
(137, 9, 10, 2, 'Frans Alfiando', '35000'),
(138, 9, 5, 3, 'Frans Alfiando', '35000'),
(139, 9, 5, 4, 'Frans Alfiando', '35000'),
(140, 9, 1, 9, 'Frans Alfiando', '35000'),
(141, 9, 1, 10, 'Frans Alfiando', '35000'),
(142, 9, 2, 8, 'Frans Alfiando', '35000'),
(143, 9, 2, 9, 'Frans Alfiando', '35000'),
(144, 4, 1, 3, '', '40000'),
(145, 4, 1, 4, '', '40000'),
(146, 4, 1, 5, '', '40000'),
(147, 4, 3, 1, 'Frans Alfiando', '40000'),
(148, 4, 3, 2, 'Frans Alfiando', '40000'),
(149, 4, 3, 3, 'Frans Alfiando', '40000'),
(150, 4, 2, 1, 'Frans Alfiando', '40000'),
(151, 4, 2, 2, 'Frans Alfiando', '40000'),
(155, 4, 4, 1, 'Frans Alfiando', '40000'),
(156, 4, 4, 2, 'Frans Alfiando', '40000'),
(157, 4, 4, 3, 'Frans Alfiando', '40000'),
(158, 4, 5, 15, 'Frans Alfiando', '40000'),
(159, 4, 4, 15, 'Frans Alfiando', '40000'),
(160, 4, 3, 15, 'Frans Alfiando', '40000'),
(161, 5, 10, 1, 'Frans Alfiando', '35000'),
(162, 5, 10, 2, 'Frans Alfiando', '35000'),
(163, 5, 10, 3, 'Frans Alfiando', '35000'),
(164, 4, 12, 6, '', '40000'),
(165, 4, 12, 7, '', '40000'),
(166, 4, 5, 8, 'Frans Alfiando', '40000'),
(167, 4, 5, 9, 'Frans Alfiando', '40000'),
(168, 4, 2, 10, 'Frans Alfiando', '40000'),
(169, 4, 2, 11, 'Frans Alfiando', '40000'),
(170, 4, 8, 9, 'Frans Alfiando', '40000'),
(171, 4, 8, 10, 'Frans Alfiando', '40000'),
(172, 4, 11, 5, 'Frans Alfiando', '40000'),
(173, 4, 11, 6, 'Frans Alfiando', '40000'),
(174, 4, 11, 7, 'Frans Alfiando', '40000'),
(175, 3, 1, 1, 'Frans Alfiando', '35000'),
(176, 3, 1, 2, 'Frans Alfiando', '35000'),
(177, 3, 1, 3, 'Frans Alfiando', '35000'),
(178, 3, 1, 4, 'Frans Alfiando', '35000'),
(179, 3, 1, 5, 'Frans Alfiando', '35000'),
(180, 19, 10, 1, 'Frans Alfiando', '35000'),
(181, 19, 10, 3, 'Frans Alfiando', '35000'),
(182, 19, 5, 1, 'Frans Alfiando', '35000'),
(183, 19, 5, 3, 'Frans Alfiando', '35000'),
(184, 19, 4, 3, 'Frans Alfiando', '35000'),
(185, 19, 2, 1, 'Frans Alfiando', '35000'),
(186, 19, 2, 2, 'Frans Alfiando', '35000'),
(187, 19, 2, 3, 'Frans Alfiando', '35000'),
(188, 19, 1, 8, 'Frans Alfiando', '35000'),
(189, 19, 1, 9, 'Frans Alfiando', '35000'),
(190, 9, 10, 10, 'Frans Alfiando', '35000'),
(191, 9, 9, 10, 'Frans Alfiando', '35000'),
(192, 7, 1, 1, 'Frans Alfiando', '35000'),
(193, 7, 1, 2, 'Frans Alfiando', '35000'),
(194, 7, 1, 3, 'Frans Alfiando', '35000'),
(195, 6, 1, 10, 'Frans Alfiando', '35000'),
(196, 6, 1, 11, 'Frans Alfiando', '35000'),
(197, 27, 1, 7, 'Frans Alfiando', '35000'),
(198, 27, 1, 8, 'Frans Alfiando', '35000'),
(199, 27, 1, 9, 'Frans Alfiando', '35000'),
(200, 44, 12, 14, 'Dinda Putri Pratama', '40000'),
(201, 44, 12, 15, 'Dinda Putri Pratama', '40000'),
(202, 24, 4, 8, 'Dinda Putri Pratama', '35000'),
(203, 24, 4, 9, 'Dinda Putri Pratama', '35000'),
(204, 38, 1, 8, 'Frans Alfiando', '35000'),
(205, 38, 1, 9, 'Frans Alfiando', '35000'),
(206, 38, 10, 8, 'Frans Alfiando', '35000'),
(207, 38, 10, 9, 'Frans Alfiando', '35000'),
(208, 38, 10, 1, 'Frans Alfiando', '35000'),
(209, 32, 12, 1, 'Frans Alfiando', '40000'),
(210, 32, 12, 3, 'Frans Alfiando', '40000'),
(211, 32, 12, 5, 'Frans Alfiando', '40000'),
(212, 32, 1, 1, 'Dinda Putri Pratama', '40000'),
(213, 32, 1, 2, 'Dinda Putri Pratama', '40000'),
(214, 20, 1, 12, 'Frans Alfiando', '40000'),
(215, 20, 1, 13, 'Frans Alfiando', '40000'),
(216, 20, 12, 1, 'Frans Alfiando', '40000'),
(217, 20, 12, 2, 'Frans Alfiando', '40000'),
(218, 22, 1, 11, 'Dinda Putri Pratama', '40000'),
(219, 22, 1, 12, 'Dinda Putri Pratama', '40000'),
(220, 22, 1, 13, 'Dinda Putri Pratama', '40000'),
(221, 22, 1, 14, 'Dinda Putri Pratama', '40000'),
(222, 79, 3, 6, 'Frans Alfiando', '35000'),
(223, 79, 3, 7, 'Frans Alfiando', '35000'),
(224, 69, 8, 4, 'Dinda Putri Pratama', '35000'),
(225, 69, 8, 5, 'Dinda Putri Pratama', '35000'),
(226, 66, 3, 6, 'Dinda Putri Pratama', '40000'),
(227, 66, 3, 7, 'Dinda Putri Pratama', '40000'),
(228, 66, 3, 8, 'Dinda Putri Pratama', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` int(100) NOT NULL AUTO_INCREMENT,
  `idmember` int(11) NOT NULL,
  `idcinema` int(11) NOT NULL,
  `idmovie` int(11) NOT NULL,
  `idjadwal` int(11) NOT NULL,
  `notransaksi` varchar(100) NOT NULL,
  `nokursi` varchar(50) NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `buktibayar` text NOT NULL,
  `tgltransaksi` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idmember`, `idcinema`, `idmovie`, `idjadwal`, `notransaksi`, `nokursi`, `totalbayar`, `buktibayar`, `tgltransaksi`) VALUES
(35, 3, 3, 8, 27, '20210113213001', 'A7 A8 A9 ', 105000, 'bukti.jpg', '2021-01-13 21:30:01'),
(36, 4, 2, 7, 44, '20210113213531', 'L14 L15 ', 80000, 'bukti2.jpg', '2021-01-13 21:35:31'),
(37, 4, 1, 4, 24, '20210113213857', 'D8 D9 ', 70000, 'bukti3.jpg', '2021-01-13 21:38:57'),
(38, 3, 1, 7, 38, '20210124202157', 'A8 A9 ', 70000, 'bukti2.jpg', '2021-01-24 20:21:57'),
(39, 3, 1, 7, 38, '20210124202544', 'J8 J9 ', 70000, 'bukti3.jpg', '2021-01-24 20:25:44'),
(40, 3, 1, 7, 38, '20210124204114', 'J1 ', 35000, 'bukti.jpg', '2021-01-24 20:41:14'),
(41, 3, 2, 8, 32, '20210124204901', 'L1 L3 L5 ', 120000, 'bukti5.jpg', '2021-01-24 20:49:01'),
(42, 4, 2, 8, 32, '20210124205219', 'A1 A2 ', 80000, 'bukti4.jpg', '2021-01-24 20:52:19'),
(43, 3, 2, 4, 20, '20210126103539', 'A12 A13 ', 80000, 'bukti5.jpg', '2021-01-26 10:35:39'),
(44, 3, 2, 4, 20, '20210126104336', 'L1 L2 ', 80000, 'bukti4.jpg', '2021-01-26 10:43:36'),
(45, 4, 2, 4, 22, '20210128210718', 'A11 A12 A13 A14 ', 160000, 'bukti5.jpg', '2021-01-28 21:07:18'),
(46, 3, 1, 11, 79, '20210131123007', 'C6 C7 ', 70000, 'bukti.jpg', '2021-01-31 12:30:07'),
(47, 4, 1, 10, 69, '20210131220054', 'H4 H5 ', 70000, 'bukti5.jpg', '2021-01-31 22:00:54'),
(48, 4, 2, 9, 66, '20210201113600', 'C6 C7 C8 ', 120000, 'bukti.jpg', '2021-02-01 11:36:00');
