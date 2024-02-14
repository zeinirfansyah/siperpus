-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2024 at 01:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_perpustakaan`
--

CREATE TABLE `anggota_perpustakaan` (
  `kode_anggota` int NOT NULL,
  `nisn_anggota` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `alamat_anggota` varchar(100) NOT NULL,
  `no_hp_anggota` varchar(100) NOT NULL,
  `email_anggota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_perpustakaan`
--

INSERT INTO `anggota_perpustakaan` (`kode_anggota`, `nisn_anggota`, `nama_anggota`, `alamat_anggota`, `no_hp_anggota`, `email_anggota`) VALUES
(1, '5190411355', 'ZEIN IRFANSYAH', 'ALAMAT1', '01092187410', 'KASKAJ@AKMAG.COM');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int NOT NULL,
  `judul_buku` varchar(500) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `pengarang_buku` varchar(500) DEFAULT NULL,
  `tahun_terbit` varchar(11) DEFAULT NULL,
  `jumlah_buku` int DEFAULT NULL,
  `stok_tersedia` int DEFAULT NULL,
  `kategori_buku` varchar(255) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `lokasi_buku` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `isbn`, `pengarang_buku`, `tahun_terbit`, `jumlah_buku`, `stok_tersedia`, `kategori_buku`, `penerbit_buku`, `lokasi_buku`) VALUES
(270, 'The Stuble Art of Not Giving a Fuck', '123123123', 'Mark Masson', '2019', 10, 10, 'Non Fiksi', 'Gramedia', ''),
(271, 'Confiance règne, La', '80-854-6893', 'Consuelo', '1998', NULL, NULL, NULL, 'Shufflester', NULL),
(272, 'Bill Cosby, Himself', '48-869-3068', 'Lida', '2011', NULL, NULL, NULL, 'Pixoboo', NULL),
(273, 'Wendigo', '30-268-1591', 'Cornelle', '2009', NULL, NULL, NULL, 'Jetwire', NULL),
(274, 'The Land Before Time XIII: The Wisdom of Friends', '24-326-4787', 'Cathie', '2006', NULL, NULL, NULL, 'Twitterbridge', NULL),
(275, 'A Spell to Ward Off the Darkness', '08-835-0440', 'Victoria', '2012', NULL, NULL, NULL, 'Skajo', NULL),
(276, 'Tender Hook, The (Boxer and the Bombshell, The)', '09-134-5746', 'Tressa', '2000', NULL, NULL, NULL, 'Cogidoo', NULL),
(277, 'Springfield Rifle', '11-697-9540', 'Kerrie', '2005', NULL, NULL, NULL, 'Tagtune', NULL),
(278, 'Gambler, The', '66-261-0775', 'Amanda', '2007', NULL, NULL, NULL, 'Skipfire', NULL),
(279, 'French Twist (Gazon maudit)', '10-148-9900', 'Kara-lynn', '2004', NULL, NULL, NULL, 'Meejo', NULL),
(280, 'Clifford\'s Really Big Movie', '61-688-7060', 'Jammie', '2005', NULL, NULL, NULL, 'Topdrive', NULL),
(281, 'Hamlet (Gamlet)', '76-044-2525', 'Cele', '2012', NULL, NULL, NULL, 'Twinder', NULL),
(282, 'Puss in Boots: The Three Diablos', '68-029-0423', 'Lauryn', '1996', NULL, NULL, NULL, 'Skaboo', NULL),
(283, 'Left Behind: The Movie', '31-515-3689', 'Sybille', '2004', NULL, NULL, NULL, 'Blogtags', NULL),
(284, 'Enemy of the People, An', '82-869-2805', 'Janenna', '1994', NULL, NULL, NULL, 'Wikizz', NULL),
(285, 'Hud', '11-870-2045', 'Ariella', '2006', NULL, NULL, NULL, 'Teklist', NULL),
(286, 'Wadd: The Life & Times of John C. Holmes', '36-551-8957', 'Maisie', '1997', NULL, NULL, NULL, 'Bubbletube', NULL),
(287, 'Adrenalin: Fear the Rush', '38-172-6117', 'Mallissa', '2010', NULL, NULL, NULL, 'Aimbo', NULL),
(288, 'Ski Patrol', '84-502-6651', 'Florella', '2002', NULL, NULL, NULL, 'Twitterworks', NULL),
(289, 'The Apocalypse', '89-598-8110', 'Emmy', '2012', NULL, NULL, NULL, 'Mydo', NULL),
(290, '42', '80-109-9268', 'Georgie', '2010', NULL, NULL, NULL, 'Bubblemix', NULL),
(291, 'Midnight Clear, A', '66-550-9272', 'Dyane', '1993', NULL, NULL, NULL, 'Meevee', NULL),
(292, 'X: The Man with the X-Ray Eyes', '95-347-2534', 'Mara', '1984', NULL, NULL, NULL, 'Jabbersphere', NULL),
(293, 'Black Girl (La noire de...)', '50-030-3938', 'Paige', '1992', NULL, NULL, NULL, 'Kwideo', NULL),
(294, 'This Sporting Life', '60-350-9444', 'Billy', '2012', NULL, NULL, NULL, 'Cogidoo', NULL),
(295, 'Isolation', '50-109-0171', 'Blakeley', '2008', NULL, NULL, NULL, 'Mybuzz', NULL),
(297, 'Princesas', '39-432-3383', 'Maurizia', '2001', NULL, NULL, NULL, 'Tagtune', NULL),
(298, 'Three Faces East', '76-262-0310', 'Ianthe', '2012', NULL, NULL, NULL, 'Trudoo', NULL),
(299, 'The Hire: Ticker', '57-904-0039', 'Shana', '1986', NULL, NULL, NULL, 'Jabbersphere', NULL),
(300, 'Midnight Mary', '19-425-9662', 'Delphine', '2001', NULL, NULL, NULL, 'Jaloo', NULL),
(301, 'Twice Upon a Time', '49-512-7805', 'Christyna', '1995', NULL, NULL, NULL, 'Rooxo', NULL),
(302, 'Wagons East', '49-533-2172', 'Harmony', '2008', NULL, NULL, NULL, 'Brightdog', NULL),
(303, 'Careful', '59-021-0730', 'Milly', '2000', NULL, NULL, NULL, 'Skajo', NULL),
(304, 'Dog, The', '04-791-1373', 'Leonelle', '1996', NULL, NULL, NULL, 'Blogtags', NULL),
(305, 'Casper\'s Haunted Christmas', '19-008-5196', 'Larine', '1990', NULL, NULL, NULL, 'Edgepulse', NULL),
(306, 'Kicked in the Head', '59-534-6074', 'Darci', '1993', NULL, NULL, NULL, 'Yabox', NULL),
(307, 'Blue Streak', '25-597-0444', 'Charo', '2008', NULL, NULL, NULL, 'Meevee', NULL),
(308, 'Man of the West', '96-832-4248', 'Melisa', '1994', NULL, NULL, NULL, 'Dabshots', NULL),
(309, 'Gamera vs. Viras ', '36-565-4478', 'Frederica', '2012', NULL, NULL, NULL, 'Skidoo', NULL),
(310, 'Creature', '03-667-8440', 'Austine', '2013', NULL, NULL, NULL, 'Flashdog', NULL),
(311, 'Bandaged', '38-950-5172', 'Oona', '1962', NULL, NULL, NULL, 'Wordpedia', NULL),
(312, 'Jeopardy (a.k.a. A Woman in Jeopardy)', '37-476-7561', 'Jennilee', '1999', NULL, NULL, NULL, 'Jabbersphere', NULL),
(313, 'Business as Usual', '20-604-2823', 'Gabbie', '1998', NULL, NULL, NULL, 'Yakidoo', NULL),
(314, '\'Hellboy\': The Seeds of Creation', '77-817-6444', 'Renelle', '1992', NULL, NULL, NULL, 'Babblestorm', NULL),
(315, 'Living Skeleton, The (Kyûketsu dokuro-sen)', '91-484-2975', 'Ruthie', '1978', NULL, NULL, NULL, 'Omba', NULL),
(316, 'Adventures of Huckleberry Finn, The', '09-835-2990', 'Fawn', '1969', NULL, NULL, NULL, 'Divanoodle', NULL),
(317, 'Taipei Exchanges (Di 36 ge gu shi)', '11-690-1378', 'Joann', '2003', NULL, NULL, NULL, 'Oyondu', NULL),
(318, 'Night Walker, The', '69-033-5958', 'Catharine', '2011', NULL, NULL, NULL, 'Kamba', NULL),
(319, 'But Not for Me', '66-760-1453', 'Sileas', '2012', NULL, NULL, NULL, 'Meemm', NULL),
(320, 'Pulse (Kairo)', '41-633-0115', 'Cinnamon', '2009', NULL, NULL, NULL, 'Zazio', NULL),
(321, 'Incognito', '37-365-7655', 'Darelle', '2007', NULL, NULL, NULL, 'Bubblemix', NULL),
(322, 'Dry Summer (Susuz yaz) (Reflections)', '60-941-3648', 'Claretta', '2001', NULL, NULL, NULL, 'Meevee', NULL),
(323, 'Moving', '93-981-6908', 'Caria', '2012', NULL, NULL, NULL, 'Yozio', NULL),
(324, 'Hamlet', '05-057-2017', 'Johannah', '1995', NULL, NULL, NULL, 'Rhyloo', NULL),
(325, 'John Garfield Story, The', '16-588-8432', 'Marja', '2004', NULL, NULL, NULL, 'Yakijo', NULL),
(326, 'It! The Terror from Beyond Space', '61-627-7475', 'Gustie', '1990', NULL, NULL, NULL, 'Jaxspan', NULL),
(327, 'Shoot to Kill', '80-763-6970', 'Gertruda', '1990', NULL, NULL, NULL, 'Kwilith', NULL),
(328, 'Pickup on South Street', '35-356-4202', 'Berget', '1986', NULL, NULL, NULL, 'Edgetag', NULL),
(329, 'Unknown Soldier, The (Tuntematon sotilas)', '98-014-5994', 'Wandis', '1994', NULL, NULL, NULL, 'Thoughtblab', NULL),
(330, 'Sister My Sister', '18-177-6254', 'Gaynor', '2006', NULL, NULL, NULL, 'Wikizz', NULL),
(331, 'Ivanhoe', '29-033-8281', 'Jennee', '2011', NULL, NULL, NULL, 'Thoughtsphere', NULL),
(332, 'Abouna', '80-149-2084', 'Jewelle', '1963', NULL, NULL, NULL, 'Brainlounge', NULL),
(333, 'Mad Monster Party?', '54-233-0627', 'Karlee', '2007', NULL, NULL, NULL, 'Realblab', NULL),
(334, 'Life After Beth', '93-917-8197', 'Letizia', '2003', NULL, NULL, NULL, 'Podcat', NULL),
(335, 'Keep, The', '87-627-2416', 'Cristabel', '1985', NULL, NULL, NULL, 'Feedbug', NULL),
(336, 'Thin Blue Line, The', '16-823-0518', 'Gwenette', '1992', NULL, NULL, NULL, 'Tagcat', NULL),
(337, 'West of Zanzibar', '28-960-7997', 'Jaine', '2006', NULL, NULL, NULL, 'Vinte', NULL),
(338, 'Prize Winner of Defiance Ohio, The', '62-837-5479', 'Charin', '2007', NULL, NULL, NULL, 'Blogpad', NULL),
(339, 'ABBA: The Movie', '14-968-7400', 'Cori', '2011', NULL, NULL, NULL, 'Edgetag', NULL),
(340, 'Man of the House', '18-864-2451', 'Clemence', '1997', NULL, NULL, NULL, 'Janyx', NULL),
(341, 'Movie, A', '05-521-5332', 'Dyana', '1994', NULL, NULL, NULL, 'Voonix', NULL),
(342, 'Operation Petticoat', '56-766-6892', 'Latashia', '2009', NULL, NULL, NULL, 'Camimbo', NULL),
(343, 'Kamchatka', '44-107-4344', 'Analise', '1993', NULL, NULL, NULL, 'Youspan', NULL),
(344, 'Beverly Hills Ninja', '15-758-6474', 'Daisy', '1987', NULL, NULL, NULL, 'Twitternation', NULL),
(345, 'Pretty One, The', '90-893-2960', 'Korie', '2012', NULL, NULL, NULL, 'Katz', NULL),
(346, 'Whisky Galore', '32-994-9745', 'Abigael', '2001', NULL, NULL, NULL, 'Pixonyx', NULL),
(347, 'Black Moon Rising', '90-325-6156', 'Beatrix', '2003', NULL, NULL, NULL, 'Brightdog', NULL),
(348, 'A.K.', '32-525-7878', 'Susette', '1995', NULL, NULL, NULL, 'Tavu', NULL),
(349, 'Apartment 1303 3D', '02-498-7349', 'Oralee', '1996', NULL, NULL, NULL, 'Brainlounge', NULL),
(350, 'Reconstruction (Anaparastasi)', '01-043-0994', 'Alexina', '2008', NULL, NULL, NULL, 'Shuffledrive', NULL),
(351, 'Home Alone 4', '98-393-2690', 'Erma', '2006', NULL, NULL, NULL, 'Gabvine', NULL),
(352, 'Yearling, The', '82-522-0604', 'Marisa', '1994', NULL, NULL, NULL, 'Jaxworks', NULL),
(353, 'In the Bedroom', '30-426-1343', 'Donnajean', '2000', NULL, NULL, NULL, 'Skaboo', NULL),
(354, 'Sheena', '19-271-4524', 'Gloriane', '1996', NULL, NULL, NULL, 'Ainyx', NULL),
(355, 'Horse Feathers', '19-689-6309', 'Vivi', '1994', NULL, NULL, NULL, 'Devcast', NULL),
(356, 'Charlie Chan Carries On', '22-033-7672', 'Yoshiko', '2003', NULL, NULL, NULL, 'Oloo', NULL),
(357, 'How to Be', '34-547-1328', 'Annalise', '1998', NULL, NULL, NULL, 'Cogilith', NULL),
(358, 'Frozen City (Valkoinen kaupunki) ', '88-458-4272', 'Chris', '2008', NULL, NULL, NULL, 'Oyoloo', NULL),
(359, 'Red Road', '87-730-2986', 'Livia', '2012', NULL, NULL, NULL, 'Kwimbee', NULL),
(360, 'Zeitgeist: The Movie', '06-156-7777', 'Meris', '1992', NULL, NULL, NULL, 'Devbug', NULL),
(361, 'Mummy, The', '89-663-1202', 'Jolie', '2012', NULL, NULL, NULL, 'Jabbersphere', NULL),
(362, 'Shiver (Eskalofrío)', '22-511-7881', 'Diann', '2000', NULL, NULL, NULL, 'Browsetype', NULL),
(363, 'Penelope', '95-388-5148', 'Christa', '2006', NULL, NULL, NULL, 'Tagcat', NULL),
(364, 'Sin of Madelon Claudet, The', '01-435-0228', 'Lucy', '1994', NULL, NULL, NULL, 'Jetpulse', NULL),
(365, 'Face', '43-052-2265', 'Reine', '1993', NULL, NULL, NULL, 'Devbug', NULL),
(367, 'Passion of Anna, The (Passion, En)', '78-070-7041', 'Roslyn', '1993', NULL, NULL, NULL, 'Flipstorm', NULL),
(368, 'Come Sweet Death (Komm, süsser Tod)', '15-781-8002', 'Dodie', '2000', NULL, NULL, NULL, 'Kimia', NULL),
(369, 'Favela Rising', '19-296-2897', 'Sibilla', '2011', NULL, NULL, NULL, 'Oyonder', NULL),
(370, 'Plastic Bag', '27-803-7239', 'Annabal', '2006', NULL, NULL, NULL, 'Muxo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas_perpustakaan`
--

CREATE TABLE `petugas_perpustakaan` (
  `kode_petugas` int NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `alamat_petugas` varchar(100) NOT NULL,
  `no_hp_petugas` varchar(100) NOT NULL,
  `email_petugas` varchar(100) NOT NULL,
  `username_petugas` varchar(100) NOT NULL,
  `password_petugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int NOT NULL,
  `kode_buku` int NOT NULL,
  `kode_anggota` int NOT NULL,
  `nisn_anggota` varchar(100) DEFAULT NULL,
  `kode_petugas` int NOT NULL,
  `status_transaksi` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_perpustakaan`
--
ALTER TABLE `anggota_perpustakaan`
  ADD PRIMARY KEY (`kode_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `petugas_perpustakaan`
--
ALTER TABLE `petugas_perpustakaan`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `kode_anggota` (`kode_anggota`),
  ADD KEY `kode_petugas` (`kode_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_perpustakaan`
--
ALTER TABLE `anggota_perpustakaan`
  MODIFY `kode_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `petugas_perpustakaan`
--
ALTER TABLE `petugas_perpustakaan`
  MODIFY `kode_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_anggota`) REFERENCES `anggota_perpustakaan` (`kode_anggota`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kode_petugas`) REFERENCES `petugas_perpustakaan` (`kode_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
