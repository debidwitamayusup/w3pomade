-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.5.16 - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk w3pomade
CREATE DATABASE IF NOT EXISTS `w3pomade` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `w3pomade`;

-- membuang struktur untuk table w3pomade.aksesoris
CREATE TABLE IF NOT EXISTS `aksesoris` (
  `idAksesoris` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambarAksesoris` int(11) NOT NULL,
  `nama_aksesoris` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAksesoris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel w3pomade.aksesoris: ~0 rows (lebih kurang)
DELETE FROM `aksesoris`;
/*!40000 ALTER TABLE `aksesoris` DISABLE KEYS */;
/*!40000 ALTER TABLE `aksesoris` ENABLE KEYS */;

-- membuang struktur untuk table w3pomade.detailkeranjang
CREATE TABLE IF NOT EXISTS `detailkeranjang` (
  `idKeranjang` varchar(50) DEFAULT NULL,
  `idProduk` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  KEY `FK_detailkeranjang_ikan` (`idProduk`),
  KEY `FK_detailkeranjang_keranjang` (`idKeranjang`),
  CONSTRAINT `FK_detailkeranjang_ikan` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detailkeranjang_keranjang` FOREIGN KEY (`idKeranjang`) REFERENCES `keranjang` (`idKeranjang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel w3pomade.detailkeranjang: ~1 rows (lebih kurang)
DELETE FROM `detailkeranjang`;
/*!40000 ALTER TABLE `detailkeranjang` DISABLE KEYS */;
INSERT INTO `detailkeranjang` (`idKeranjang`, `idProduk`, `jumlah`) VALUES
	('KERANJANG-1', 'p003', 11),
	('KERANJANG-1', 'p004', 2);
/*!40000 ALTER TABLE `detailkeranjang` ENABLE KEYS */;

-- membuang struktur untuk table w3pomade.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `idKeranjang` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSession` text,
  PRIMARY KEY (`idKeranjang`),
  KEY `FK_keranjang_user` (`idUser`),
  CONSTRAINT `FK_keranjang_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel w3pomade.keranjang: ~1 rows (lebih kurang)
DELETE FROM `keranjang`;
/*!40000 ALTER TABLE `keranjang` DISABLE KEYS */;
INSERT INTO `keranjang` (`idKeranjang`, `idUser`, `idSession`) VALUES
	('KERANJANG-1', 1, '8om4682aacocbic2fivi89abi1');
/*!40000 ALTER TABLE `keranjang` ENABLE KEYS */;

-- membuang struktur untuk table w3pomade.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `idProduk` varchar(50) NOT NULL,
  `namaProduk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambarProduk` text,
  `kategori` char(50) DEFAULT NULL,
  PRIMARY KEY (`idProduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel w3pomade.produk: ~5 rows (lebih kurang)
DELETE FROM `produk`;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`idProduk`, `namaProduk`, `harga`, `stok`, `gambarProduk`, `kategori`) VALUES
	('p001', 'Murray\'s Original', 80000, 40, 'murraysori.jpg', 'murrays'),
	('p002', 'Murray\'s Superior V', 100000, 30, 'murrayssuperiorv.jpg', 'murrays'),
	('p003', 'Murray\'s Super Light', 80000, 20, 'murrayssuperlight.jpg', 'murrays'),
	('p004', 'Murray\'s Extra Heavy', 120000, 20, 'murraysxtraheavy.jpg', 'murrays'),
	('p005', 'Murray\'s Small Batch 50-50', 150000, 10, 'smallbatch5050.jpg', 'murrays');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- membuang struktur untuk table w3pomade.user
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `noTelp` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel w3pomade.user: ~2 rows (lebih kurang)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`idUser`, `nama`, `alamat`, `noTelp`, `username`, `password`) VALUES
	(1, 'debi', 'antapani', '087718938581', 'dwittamma', 'ce60e43f0b1ba31f8f8ee41275dd9224'),
	(2, 'ewock', 'antafunky', '08787878787', 'ewock', '07664678c3d89d2da2e2d740ae4426fa');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
