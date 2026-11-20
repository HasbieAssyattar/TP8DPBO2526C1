CREATE DATABASE IF NOT EXISTS `tp_mvc25`;
USE `tp_mvc25`;

DROP TABLE IF EXISTS `matkul`;
DROP TABLE IF EXISTS `lecturers`;
DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `faculties` (`id`, `code`, `name`) VALUES
(1, 'FPMIPA', 'Fakultas Pendidikan Matematika dan Ilmu Pengetahuan Alam'),
(2, 'FPIPS', 'Fakultas Pendidikan Ilmu Pengetahuan Sosial'),
(3, 'FPTI', 'Fakultas Pendidikan Teknologi dan Industri');

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `join_date` date NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lecturers_faculties` (`faculty_id`),
  CONSTRAINT `fk_lecturers_faculties` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `lecturers` (`id`, `name`, `nidn`, `phone`, `join_date`, `faculty_id`) VALUES
(1, 'Rosa Ariani Sukamto, M.T.', '0015017901', '08122334455', '2005-08-01', 1),
(2, 'Dr. Muhamad Nursalman, M.T.', '0019087502', '08123456789', '2008-03-15', 1),
(3, 'Prof. Dr. Hj. Enok Maryani, M.S.', '0021045901', '08139876543', '1985-02-01', 2),
(4, 'Dr. Iwan Setiawan, S.Pd., M.Si.', '0003057303', '08135678901', '2000-01-10', 2),
(5, 'Prof. Dr. Hj. Budi Mulyanti, M.Si.', '0028086202', '08112233445', '1990-11-01', 3),
(6, 'Didin Wahyudin, S.Pd., M.T., Ph.D.', '0011037204', '08119988776', '1998-09-01', 3);

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_matkul_lecturers` (`lecturer_id`),
  CONSTRAINT `fk_matkul_lecturers` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `matkul` (`id`, `code`, `name`, `sks`, `semester`, `lecturer_id`) VALUES
(1, 'IK101', 'Dasar-Dasar Pemrograman', 3, 1, 1),
(2, 'IK202', 'Algoritma dan Struktur Data', 3, 2, 1),
(3, 'IK310', 'Desain dan Pemrograman Berorientasi Objek', 3, 3, 1),
(4, 'IK102', 'Aljabar dan Teori Bilangan', 3, 1, 2),
(5, 'IK105', 'Sistem Digital dan Komputer', 3, 1, 2),
(6, 'IK204', 'Metode Diskrit dan Numerik', 3, 2, 2),
(7, 'IK302', 'Statistika dan Analisis Data', 3, 3, 2),
(8, 'GG101', 'Geografi Manusia', 3, 1, 3),
(9, 'GG205', 'Geografi Pariwisata', 2, 4, 3),
(10, 'GG308', 'Pengembangan Kurikulum Pembelajaran Geografi', 3, 5, 3),
(11, 'GG104', 'Kartografi Dasar', 3, 2, 4),
(12, 'GG202', 'Penginderaan Jauh', 3, 3, 4),
(13, 'GG301', 'Sistem Informasi Geografis (SIG)', 3, 4, 4),
(14, 'TE101', 'Rangkaian Listrik', 3, 1, 5),
(15, 'TE203', 'Fisika Semikonduktor', 3, 3, 5),
(16, 'TE305', 'Optoelektronika', 2, 5, 5),
(17, 'TE206', 'Elektronika Daya', 3, 3, 6),
(18, 'TE302', 'Mikroprosesor dan Mikrokontroler', 3, 4, 6),
(19, 'TE309', 'Sistem Tertanam (Embedded System)', 3, 5, 6);
