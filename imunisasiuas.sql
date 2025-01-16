-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table imunisasiuas.admins: ~1 rows (approximately)
INSERT INTO `admins` (`idadmin`, `username`, `password`) VALUES
	(1, 'admin', 'admin998800');

-- Dumping data for table imunisasiuas.bayi: ~7 rows (approximately)
INSERT INTO `bayi` (`id_bayi`, `nama`, `jenis_kelamin`, `alamat`, `id_desa`) VALUES
	(1001, 'Nur Aisyah', 'P', 'JL. Kemanggi', 16),
	(1002, 'Muhamad Ali', 'L', 'Jl. Rancaekek No. 10', 10),
	(1003, 'Ahmad Fauzan', 'L', 'Jl. Pasirjambu No. 5', 15),
	(1004, 'Ayu Lestari', 'P', 'Jl. Ciparay No. 3', 13),
	(1005, 'Rizky Ramadhan', 'L', 'Jl. Soreang No. 12', 12),
	(1006, 'Intan Permata', 'P', 'Jl. Ciwidey No. 15', 16),
	(1007, 'Bella Safira', 'P', 'Jl. Banjaran No. 14', 18);

-- Dumping data for table imunisasiuas.data_desa: ~10 rows (approximately)
INSERT INTO `data_desa` (`id_desa`, `nama_desa`, `kecamatan`, `kabupaten`) VALUES
	(10, 'Cangkuang', 'Rancaekek', ' Bandung'),
	(11, 'Bojongsoang', 'Bojongsoang', ' Bandung'),
	(12, 'Soreang', 'Soreang', ' Bandung'),
	(13, 'Ciparay', 'Ciparay', ' Bandung'),
	(14, 'Majalaya', 'Majalaya', ' Bandung'),
	(15, 'Pasirjambu', 'Pasirjambu', ' Bandung'),
	(16, 'Ciwidey', 'Ciwidey', ' Bandung'),
	(17, 'Pameungpeuk', 'Pameungpeuk', ' Bandung'),
	(18, 'Banjaran', 'Banjaran', ' Bandung'),
	(19, 'Dayeuhkolot', 'Dayeuhkolot', ' Bandung');

-- Dumping data for table imunisasiuas.jadwal_imunisasi: ~7 rows (approximately)
INSERT INTO `jadwal_imunisasi` (`id_jadwal`, `id_desa`, `tgl_imunisasi`, `waktu_mulai`, `waktu_selesai`, `lokasi`, `id_petugas`, `jenis_vaksin`) VALUES
	(10000, 10, '2027-01-15', '07:30:00', '12:00:00', '	Puskesmas Desa Cangkuang', 4, 'BCG'),
	(10001, 13, '2025-01-17', '08:30:00', '14:00:00', 'Balai Desa Ciparay', 5, 'Polio'),
	(10002, 11, '2025-01-18', '08:00:00', '13:00:00', 'Aula Kecamatan Bojongsoang', 6, 'DPT'),
	(10003, 15, '2025-01-27', '09:00:00', '12:30:00', 'Klinik Sehat ', 1, 'Campak'),
	(10004, 14, '2025-01-23', '08:30:00', '11:30:00', 'Posyandu Melati', 3, 'Hepatitis B'),
	(10005, 19, '2025-01-30', '08:00:00', '13:00:00', 'Klinik Sinar Jaya', 2, 'Polio');

-- Dumping data for table imunisasiuas.kesehatan_bayi: ~7 rows (approximately)
INSERT INTO `kesehatan_bayi` (`id_kesehatan`, `id_bayi`, `tgl_cek`, `berat_badan`, `tinggi_badan`, `status_gizi`) VALUES
	(101, 1001, '2025-01-05', 8.2, 70.5, 'normal'),
	(102, 1002, '2025-01-10', 7.8, 69, 'kurang'),
	(103, 1003, '2025-01-12', 9.5, 71, 'berlebih'),
	(104, 1004, '2025-01-15', 6.5, 68.5, 'kurang'),
	(105, 1005, '2025-01-18', 8.7, 72, 'normal'),
	(106, 1006, '2025-01-20', 9.8, 70, 'berlebih'),
	(107, 1007, '2025-01-22', 7.2, 68, 'kurang');

-- Dumping data for table imunisasiuas.login: ~3 rows (approximately)
INSERT INTO `login` (`username`, `password`, `role`) VALUES
	('naufal15053', 'n4uf4l15053', 'user'),
	('alfarizal15050', '4lf4r1z4l15050', 'admin'),
	('rezky15063', 'r3zky063', 'user');

-- Dumping data for table imunisasiuas.orangtua: ~7 rows (approximately)
INSERT INTO `orangtua` (`id_orangtua`, `id_bayi`, `nama_ayah`, `nama_ibu`, `alamat`, `id_desa`) VALUES
	(301, 1001, '	Budi Sutiono', 'Siti Aminah', 'JL. Kemanggi', 16),
	(302, 1002, 'Agus Pratama', 'Indah Lestari', 'Rancaekek No. 10', 10),
	(303, 1003, 'Dedi Setiawan', 'Nur Hayati', 'Pasirjambu No. 5', 15),
	(304, 1004, 'Rudi Hartono', 'Ani Susanti', '	Ciparay No. 3', 13),
	(305, 1005, 'Bambang Suharto', 'Dewi Sartika', 'Soreang No. 12', 16),
	(306, 1006, 'Arif Budiman', 'Fitri Handayani', 'Ciwidey No. 15', 16),
	(307, 1007, 'Hendra Wijaya', 'Lina Marlina', 'Banjaran No. 14', 18);

-- Dumping data for table imunisasiuas.petugas_imunisasi: ~6 rows (approximately)
INSERT INTO `petugas_imunisasi` (`id_petugas`, `nama_petugas`, `no_telepon`, `alamat`, `jenis_petugas`, `jadwal_tugas`) VALUES
	(1, 'Andi Setiawan', '081234567890', 'Jl. Sukamaju No. 5', 'Dokter', 'Senin, Selasa, Jumat'),
	(2, 'Budi Pratama', '081456789012', 'Jl. Ciparay No. 12', 'Dokter', 'Rabu, Kamis'),
	(3, '	Rina Kartika', '081345678901', 'Jl. Bojongsoang No. 8', 'Bidan', 'Selasa, Rabu, kamis'),
	(4, 'Ahmad Fauzi', '081678901234', 'Jl. Ciwidey No. 7', 'Dokter', 'Senin, Jumat'),
	(5, 'Siti Aisyah', '081567890123', '	Jl. Dayeuhkolot No. 3', 'Bidan', 'Jumat, Sabtu'),
	(6, 'Dwi Lestari', '081789012345', 'Jl. Banjaran No. 9', 'Bidan', 'Selasa, Sabtu');

-- Dumping data for table imunisasiuas.riwayat_imunisasi: ~7 rows (approximately)
INSERT INTO `riwayat_imunisasi` (`id_riwayat`, `id_bayi`, `jenis_vaksin`, `tgl_imunisasi`, `lokasi`, `nama_petugas`) VALUES
	(100000, 1001, 'BCG', '2025-01-15', '	Puskesmas Desa Cangkuang', 'Ahmad Fauzi'),
	(100001, 1002, 'Polio', '2025-01-17', 'Balai Desa Ciparay', 'Siti Aisyah'),
	(100002, 1003, 'DPT', '2025-01-18', 'Aula Kecamatan Bojongsoang', 'Dwi Lestari'),
	(100003, 1004, 'Campak', '2025-01-27', 'Klinik Sehat ', 'Andi Setiawan'),
	(100004, 1005, 'Campak', '2025-01-27', 'Klinik Sehat ', 'Ahmad Fauzi'),
	(100005, 1006, 'Hepatitis B', '2025-01-23', 'Posyandu Melati', '	Rina Kartika'),
	(100006, 1007, 'Polio', '2025-01-30', 'Klinik Sinar Jaya', 'Budi Pratama');

-- Dumping data for table imunisasiuas.users: ~2 rows (approximately)
INSERT INTO `users` (`iduser`, `username`, `password`) VALUES
	(10000, 'ijal', 'iwakpenyet'),
	(10001, 'bjir', 'iwak');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
