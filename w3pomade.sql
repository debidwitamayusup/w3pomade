-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for w3pomade
CREATE DATABASE IF NOT EXISTS `w3pomade` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `w3pomade`;


-- Dumping structure for table w3pomade.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`idAdmin`, `nama`, `telp`, `alamat`, `email`, `username`, `password`) VALUES
	('a001', 'Yusup', '0989098989', 'antafunky', 'yusup@gmail.com', 'yusup', 'f2ec4b1440f6f15e1a6a5dca0bb704b3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table w3pomade.aksesoris
CREATE TABLE IF NOT EXISTS `aksesoris` (
  `idAksesoris` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambarAksesoris` int(11) NOT NULL,
  `nama_aksesoris` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAksesoris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.aksesoris: ~0 rows (approximately)
DELETE FROM `aksesoris`;
/*!40000 ALTER TABLE `aksesoris` DISABLE KEYS */;
/*!40000 ALTER TABLE `aksesoris` ENABLE KEYS */;


-- Dumping structure for table w3pomade.checkout
CREATE TABLE IF NOT EXISTS `checkout` (
  `idUser` varchar(50) DEFAULT NULL,
  `a_checkout` varchar(300) DEFAULT NULL,
  KEY `FK_checkout_user` (`idUser`),
  CONSTRAINT `FK_checkout_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.checkout: ~3 rows (approximately)
DELETE FROM `checkout`;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
INSERT INTO `checkout` (`idUser`, `a_checkout`) VALUES
	('u0001', 'suci'),
	('u00021', 'Manglayang regency'),
	('u00022', 'Cibiru'),
	('u00023', 'Jl. Cikampek 14 no 1');
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;


-- Dumping structure for table w3pomade.detailkeranjang
CREATE TABLE IF NOT EXISTS `detailkeranjang` (
  `idKeranjang` varchar(50) DEFAULT NULL,
  `idProduk` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  KEY `FK_detailkeranjang_ikan` (`idProduk`),
  KEY `FK_detailkeranjang_keranjang` (`idKeranjang`),
  CONSTRAINT `FK_detailkeranjang_ikan` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detailkeranjang_keranjang` FOREIGN KEY (`idKeranjang`) REFERENCES `keranjang` (`idKeranjang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.detailkeranjang: ~10 rows (approximately)
DELETE FROM `detailkeranjang`;
/*!40000 ALTER TABLE `detailkeranjang` DISABLE KEYS */;
INSERT INTO `detailkeranjang` (`idKeranjang`, `idProduk`, `jumlah`) VALUES
	('K-u00021', 'p003', 5),
	('K-u00022', 'p010', 2),
	('K-u00022', 'p007', 1),
	('K-u00023', 'p013', 12),
	('K-u00023', 'p014', 1),
	('K-u00023', 'p006', 3),
	('K-u00023', 'p008', 3),
	('K-u00023', 'p005', 7),
	('K-u00023', 'p018', 5),
	('K-u00023', 'p017', 2);
/*!40000 ALTER TABLE `detailkeranjang` ENABLE KEYS */;


-- Dumping structure for table w3pomade.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `idKeranjang` varchar(50) NOT NULL,
  `Column 2` varchar(50) NOT NULL,
  `idUser` varchar(50) NOT NULL,
  `idSession` text,
  `status` varchar(50) DEFAULT 'Belum Bayar',
  PRIMARY KEY (`idKeranjang`),
  KEY `FK_keranjang_user` (`idUser`),
  CONSTRAINT `FK_keranjang_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.keranjang: ~4 rows (approximately)
DELETE FROM `keranjang`;
/*!40000 ALTER TABLE `keranjang` DISABLE KEYS */;
INSERT INTO `keranjang` (`idKeranjang`, `Column 2`, `idUser`, `idSession`, `status`) VALUES
	('K-u00021', '', 'u00021', '1l9333urisrrmnk0cgdi1koj10', 'Belum Dibayar'),
	('K-u00022', '', 'u00022', '1l9333urisrrmnk0cgdi1koj10', 'Sudah Dikirim'),
	('K-u00023', '', 'u00023', 'q6ac9mivd5fvofis3m226fh0i4', 'Belum Bayar');
/*!40000 ALTER TABLE `keranjang` ENABLE KEYS */;


-- Dumping structure for table w3pomade.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `idProduk` varchar(50) NOT NULL,
  `namaProduk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambarProduk` text,
  `kategori` char(50) DEFAULT NULL,
  `deskripsi1` varchar(500) DEFAULT NULL,
  `deskripsi2` varchar(500) DEFAULT NULL,
  `deskripsi3` varchar(500) DEFAULT NULL,
  `deskripsi4` varchar(500) DEFAULT NULL,
  `deskripsi5` varchar(500) DEFAULT NULL,
  `deskripsi6` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idProduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.produk: ~19 rows (approximately)
DELETE FROM `produk`;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`idProduk`, `namaProduk`, `harga`, `stok`, `gambarProduk`, `kategori`, `deskripsi1`, `deskripsi2`, `deskripsi3`, `deskripsi4`, `deskripsi5`, `deskripsi6`, `status`) VALUES
	('p001', 'Murrays Original', 80000, 30, 'murraysori.jpg', 'murrays', '', '', '', '', '', '', 'ramai'),
	('p002', 'Murray\'s Superior V', 100000, 19, 'murrayssuperiorv.jpg', 'murrays', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	('p003', 'Murray\'s Super Light', 80000, 3, 'murrayssuperlight.jpg', 'murrays', ':::: Pomade dengan tingkat hold rendah', ':::: Tingkat kilau/shine tinggi', '::::Cocok dipakai untuk orang yang berambut lurus/tipis dan mudah diatur', ':::: Cocok bagi yang ingin mencari pomade dengan kilau tinggi', NULL, NULL, 'ramai'),
	('p004', 'Murray\'s Extra Heavy', 120000, 20, 'murraysxtraheavy.jpg', 'murrays', ':::: Pomade yang memiliki daya rekat (5+)', ':::: Cocok dipakai untuk yang berambut ikal/susah diatur', ':::: Cocok bagi yang menginginkan pomade keras dan tahan lama', NULL, NULL, NULL, NULL),
	('p005', 'Murray\'s Small Batch 50-50', 120000, 3, 'smallbatch5050.jpg', 'murrays', ':::: Pomade ini mengkombinasikan Superior dan Exelento', ':::: Cocok dipakai untuk rambut ikal/susah diatur', ':::: Cocok bagi yang menginginkan pomade keras dan tahan lama', NULL, NULL, NULL, NULL),
	('p006', 'Molding Paste', 70000, 27, 'molding-paste.jpg', 'murrays', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('p007', 'Gel Loc-Lock', 90000, 38, 'gel-loc-lock.jpg', 'murrays', NULL, NULL, NULL, NULL, NULL, NULL, 'ramai'),
	('p008', 'Cream Beeswax', 125000, 78, 'creambeeswax.jpg', 'murrays', '', '', '', '', '', '', ''),
	('p009', 'Black Beeswax', 130000, 40, 'BlackBeeswax.jpg', 'murrays', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('p010', 'Murray\'s Beeswax', 100000, 15, 'Beeswax.jpg', 'murrays', ':::: Mengandung beeswax supaya rambut sehat', ':::: Pomade dengan tingkat hold yang medium', ':::: Tingkat kilau/shine medium', ':::: Cocok dipakai bagi yang menginginkan rambut diam dan berkilau', NULL, NULL, 'ramai'),
	('p011', 'Edge Wax Extreme', 90000, 50, 'edgewax-extreme.jpg', 'murrays', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	('p012', 'Edge Wax', 120000, 30, 'edgewax.jpg', 'murrays', ':::: Pomade waterbase termurah', ':::: Larut dalam air', ':::: memiliki aroma melon', NULL, NULL, NULL, NULL),
	('p013', 'NuNile', 80000, 58, 'nunile.jpg', 'murrays', ':::: Pomade dengan tingkat hold medium', ':::: Tingkat kilau/shine medium', ':::: Cocok dipakai untuk yang berambut lurus/agak ikal', ':::: Cocok bagi yang menginginkan rambut diam dan berkilau', NULL, NULL, 'ramai'),
	('p014', 'Hair Glo', 90000, 69, 'HairGlo.jpg', 'murrays', ':::: Memiliki daya kilau paling tinggi (5+)', ':::: Mengandung coconut oil dan lanolin untuk merawat rambut', ':::: Dirancang untuk menjaga agar rambut indah', ':::: Cocok dipakai untuk yang berambut halus', NULL, NULL, NULL),
	('p015', 'Exelento', 80000, 43, 'exelento.jpg', 'murrays', ':::: Mengandung Lanolin dan Olive Oil', ':::: Menyejukkan rambut', ':::: Membantu membersihkan ketombe', ':::: Mencegah rambut keriting dan bercabang', '', '', ''),
	('p016', 'Death Pomade Heavy Hold', 80000, 18, 'deathpomade-heavy2.jpg', 'oilbased', ':::: Pomade oil based terjangkau dengan desain packaging yang keren', ':::: Aroma Grape membuat rambut wangi sepanjang hari dan sylish', NULL, NULL, NULL, NULL, NULL),
	('p017', 'Death Pomade HellRider', 80000, 21, 'hellrider2.jpg', 'oilbased', ':::: Pomade oil based terjangkau dengan desain packaging yang keren', ':::: Aroma Vanilla membuat rambut wangi sepanjang hari dan stylish', NULL, NULL, NULL, NULL, 'ramai'),
	('p018', 'Barbers Pomade Firm Hold', 135000, 9, 'barbersfirm.jpg', 'waterbased', ':::: Memiliki tingkat hold yang mediuium', ':::: Waterbased, mudah untuk dibersihkan', ':::: Cocok untuk rambut lurus dan halus', ':::: Rambuut akan tertata dan rapi sepanjang hari', NULL, NULL, 'ramai');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;


-- Dumping structure for table w3pomade.user
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table w3pomade.user: ~5 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`idUser`, `nama`, `telp`, `alamat`, `email`, `username`, `password`) VALUES
	('u0001', 'debi', '087718938581', 'Jl. Cikampek 7 no.1 Kel. Antapani Tengah, Kec. Cicadas, Bandung', 'dwittamma192@gmail.com', 'dwittamma', 'ce60e43f0b1ba31f8f8ee41275dd9224'),
	('u00019', 'Rakha Albarra', '0909090', 'Jl. Cikampek 7', 'rakha@gmail.com', 'rakha', '67f3173658ee5142d4708657b618549b'),
	('u00020', 'Rizal Moch', '081321982898', 'Sukagalih', 'rizalkizul21@gmail.com', 'rizal', '150fb021c56c33f82eef99253eb36ee1'),
	('u00021', 'Anwar', '9879887687', 'Manglayang regency', 'anwar@gmail.com', 'anwar', '46d923d9b44b8aaaf3179c5f6f7adf81'),
	('u00022', 'Julaiha', '0998876876', 'Cibiru', 'iha@gmail.com', 'iha', '30bbffd3062e6fc12f248b9eb4fec232'),
	('u00023', 'Efa Nurfaida', '09896875765', 'Panyaungan', 'efa@gmail.com', 'efa', '7c50afe1d8e6ee4cea552132d50dc461');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
