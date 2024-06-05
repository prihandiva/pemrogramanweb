-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 12.53
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekakhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_kategori`
--

INSERT INTO `m_kategori` (`id_kategori`, `kategori_nama`) VALUES
(1, 'Penilaian Fasilitas & Layanan'),
(2, 'Penilaian Dosen'),
(3, 'Penilaian Sistem'),
(4, 'Penilaian Kurikulum'),
(5, 'Penilaian Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_survey`
--

CREATE TABLE `m_survey` (
  `id_survey` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `survey_jenis` enum('Mahasiswa','Dosen','Alumni','Mitra','Wali Mahasiswa','Tenaga Pendidikan') DEFAULT NULL,
  `survey_kode` varchar(20) DEFAULT NULL,
  `survey_nama` varchar(50) DEFAULT NULL,
  `survey_desk` text DEFAULT NULL,
  `survey_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_survey`
--

INSERT INTO `m_survey` (`id_survey`, `id_user`, `survey_jenis`, `survey_kode`, `survey_nama`, `survey_desk`, `survey_tanggal`) VALUES
(1, 1, 'Mahasiswa', 'SURVMHS24', 'Kepuasan Mahasiswa', 'Evaluasi kepuasan mahasiswa terhadap layanan kampus', '2024-04-10 14:30:00'),
(2, 2, 'Dosen', 'SURVDOSEN24', 'Kepuasan Dosen', 'Evaluasi kepuasan dosen terhadap layanan kampus', '2024-04-10 14:30:00'),
(3, 4, 'Wali Mahasiswa', 'SURVWALI24', 'Kepuasan Wali Murid', 'Evaluasi kepuasan wali murid terhadap layanan kampus', '2024-04-10 14:30:00'),
(4, 5, 'Tenaga Pendidikan', 'SURVTENDIK24', 'Kepuasan Tenaga Pendidikan', 'Evaluasi kepuasan tenaga pendidikan terhadap layanan kampus', '2024-04-10 14:30:00'),
(5, 6, 'Mitra', 'SURVMITRA24', 'Kepuasan Mitra', 'Evaluasi kepuasan Mitra terhadap layanan kampus', '2024-04-10 14:30:00'),
(6, 7, 'Alumni', 'SURVALM24', 'Kepuasan Alumni', 'Evaluasi kepuasan alumni terhadap layanan kampus', '2024-04-10 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_survey_soal`
--

CREATE TABLE `m_survey_soal` (
  `id_soal` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `soal_jenis` enum('pilihan') DEFAULT NULL,
  `soal_nama` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_survey_soal`
--

INSERT INTO `m_survey_soal` (`id_soal`, `id_survey`, `id_kategori`, `no_urut`, `soal_jenis`, `soal_nama`) VALUES
(1, 1, 1, 1, 'pilihan', 'Apakah Kelas bersih dan nyaman?'),
(2, 1, 1, 2, 'pilihan', 'Fasilitas belajar mengajar tersedia di dalam kelas?'),
(3, 1, 1, 3, 'pilihan', 'Apakah POLINEMA memiliki fasilitas perpustakaan yang lengkap?'),
(4, 1, 4, 1, 'pilihan', 'Bagaimana Penilaian Anda Terhadap Kualitas Kurikulum Yang Ada Di Politeknik Ini Dalam Mempersiapkan Mahasiswa Untuk Memasuki Dunia Kerja?'),
(5, 1, 4, 2, 'pilihan', 'Seberapa Sesuai Kurikulum Saat Ini Dengan Perkembangan Terkini Di Bidang Industri Terkait?'),
(6, 1, 4, 3, 'pilihan', 'Apakah Kurikulum Menekankan Pengembangan Keterampilan Praktis Yang Diperlukan Dalam Profesi Yang Berkaitan?'),
(7, 1, 2, 1, 'pilihan', 'Apakah Dosen Mampu Mengajar Berdasarkan Kompetensinya?'),
(8, 1, 2, 2, 'pilihan', 'Apakah Dosen Berpikiran Terbuka Dan Kooperatif?'),
(9, 1, 2, 3, 'pilihan', 'Apakah Dosen Bersedia Membantu Mahasiswa Yang Mempunyai Permasalahan Akademik?'),
(10, 1, 3, 1, 'pilihan', 'Apakah Anda Merasa Fitur Pada Website SIAKAD Sudah Memadai?'),
(11, 1, 3, 2, 'pilihan', 'Bagaimana Pendapat Anda Tentang Tampilan Dan Desain Website SIAKAD?'),
(12, 1, 3, 3, 'pilihan', 'Seberapa Memadainya Informasi Yang Disediakan Di Website Kampus Untuk Keperluan Akademik Dan Non-Akademik?'),
(13, 6, 1, 1, 'pilihan', 'Bagaimana Anda menilai ketersediaan dan kualitas fasilitas ruang kelas selama Anda menempuh pendidikan di institusi kami?'),
(14, 6, 1, 2, 'pilihan', 'Seberapa baik fasilitas perpustakaan, termasuk koleksi buku, jurnal, dan akses ke sumber daya digital yang disediakan untuk menunjang studi Anda?'),
(15, 6, 1, 3, 'pilihan', 'Bagaimana Anda menilai fasilitas penunjang lainnya seperti area parkir, kantin, dan ruang rekreasi selama masa studi Anda?'),
(16, 3, 1, 1, 'pilihan', 'Bagaimana penilaian Anda terhadap kejelasan dan ketepatan waktu informasi yang diberikan Polinema mengenai perkembangan akademik anak Anda?'),
(17, 3, 1, 2, 'pilihan', 'Bagaimana penilaian Anda terhadap kemudahan dan kejelasan proses pembayaran Uang Kuliah Tunggal (UKT) di Polinema?'),
(18, 3, 1, 3, 'pilihan', 'Bagaimana penilaian Anda terhadap informasi yang diberikan oleh Polinema mengenai layanan tambahan seperti fasilitas kesehatan dan kegiatan ekstrakurikuler/UKM Kemahasiswaan?'),
(19, 4, 1, 1, 'pilihan', 'Bagaimana Anda menilai kelengkapan dan kualitas peralatan kantor yang disediakan untuk mendukung pekerjaan Anda?'),
(20, 2, 1, 4, 'pilihan', 'Bagaimana pendapat Anda mengenai ketersediaan perangkat teknologi seperti komputer, proyektor, dan akses internet di ruang kerja dosen?'),
(21, 2, 1, 1, 'pilihan', 'Bagaimana penilaian Anda terhadap fasilitas ruang kerja yang disediakan?'),
(22, 2, 1, 2, 'pilihan', 'Apakah Anda merasa nyaman dengan meja dan kursi yang tersedia di ruang kerja Anda?'),
(23, 2, 1, 3, 'pilihan', 'Bagaimana Anda menilai kebersihan dan pemeliharaan lingkungan kampus, termasuk ruang dosen dan area umum?'),
(24, 2, 4, 1, 'pilihan', 'Bagaimana pendapat Anda tentang struktur kurikulum yang ada?'),
(25, 2, 4, 2, 'pilihan', 'Apakah materi perkuliahan disusun dengan baik dan relevan?'),
(26, 2, 4, 3, 'pilihan', 'Bagaimana Anda menilai fleksibilitas kurikulum dalam memberikan ruang bagi dosen untuk berinovasi dalam metode pengajaran?'),
(27, 2, 3, 1, 'pilihan', 'Bagaimana pengalaman Anda dengan sistem administrasi dan manajemen akademik?'),
(28, 2, 3, 2, 'pilihan', 'Apakah sistem ini efisien dan mudah digunakan?'),
(29, 2, 3, 3, 'pilihan', 'Bagaimana Anda menilai dukungan teknis dan pelayanan IT yang disediakan untuk dosen?'),
(30, 4, 1, 2, 'pilihan', 'Seberapa baik fasilitas ruang kerja dan kenyamanan lingkungan kerja yang disediakan untuk tenaga pendidikan?'),
(31, 4, 1, 3, 'pilihan', 'Bagaimana Anda menilai akses dan ketersediaan fasilitas pendukung seperti ruang istirahat, kantin, dan area parkir?'),
(32, 4, 3, 1, 'pilihan', 'Bagaimana Anda menilai efisiensi sistem administrasi kepegawaian, termasuk pengelolaan data dan penggajian?'),
(33, 4, 3, 2, 'pilihan', 'Seberapa baik sistem informasi yang tersedia (misalnya portal kepegawaian dan sistem komunikasi internal) dalam mendukung tugas Anda?'),
(34, 4, 3, 3, 'pilihan', 'Bagaimana Anda menilai dukungan teknis dan pelayanan IT yang disediakan untuk tenaga pendidikan?'),
(35, 5, 1, 1, 'pilihan', 'Bagaimana Anda menilai kualitas dan kelengkapan fasilitas yang disediakan saat kunjungan atau kegiatan kerja sama di kampus kami?'),
(36, 5, 1, 2, 'pilihan', 'Seberapa baik fasilitas ruang pertemuan dan dukungan teknis yang tersedia selama acara atau diskusi bersama?'),
(37, 5, 1, 3, 'pilihan', 'Bagaimana Anda menilai aksesibilitas dan kemudahan dalam menggunakan fasilitas kampus untuk kegiatan kolaborasi?'),
(38, 5, 5, 1, 'pilihan', 'Bagaimana Anda menilai kompetensi teknis dan keterampilan praktis mahasiswa yang bekerja sama dengan perusahaan Anda?'),
(39, 5, 5, 2, 'pilihan', 'Seberapa baik kemampuan komunikasi dan kerja sama tim mahasiswa dalam proyek atau kegiatan bersama?'),
(40, 5, 5, 3, 'pilihan', 'Bagaimana Anda menilai kesiapan mahasiswa dalam menghadapi tantangan dan menyelesaikan tugas yang diberikan oleh perusahaan Anda?'),
(41, 1, 5, 1, 'pilihan', 'Bagaimana kualitas fasilitas ruang kelas di kampus?'),
(42, 1, 5, 2, 'pilihan', 'Bagaimana kebersihan fasilitas umum (toilet, kantin, ruang tunggu) di kampus?'),
(43, 1, 5, 3, 'pilihan', 'Bagaimana kenyamanan dan kelengkapan fasilitas perpustakaan di kampus?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `posisi` enum('Mahasiswa','Dosen','Alumni','Mitra','Admin','Wali Mahasiswa','Tenaga Pendidikan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `nama`, `password`, `posisi`) VALUES
(1, 'mahasiswa', 'Nabilah Rahmah', '123', 'Mahasiswa'),
(2, 'dosen3', 'Adinda Siska', '123', 'Dosen'),
(3, 'admin', 'Admin Kelompok 1', '123', 'Admin'),
(4, 'wali', 'Aisyah Azzahra', '123', 'Wali Mahasiswa'),
(5, 'tendik', 'Martio', '123', 'Tenaga Pendidikan'),
(6, 'mitra', 'Rosyid', '123', 'Mitra'),
(12, 'dosen', 'Dosen 1', '123', 'Dosen'),
(13, '', '', '', 'Mahasiswa'),
(14, 'dosen1', 'Dosen Lagi', '123', 'Dosen'),
(15, 'demo', 'Dosen Demo', '111', 'Dosen'),
(16, 'chikal', 'Chikal Nazmi', '111', 'Dosen'),
(17, '', '', '', ''),
(18, '', '', '', ''),
(19, '', '', '', ''),
(20, '', '', '', ''),
(21, '', '', '', ''),
(22, '', '', '', ''),
(23, '', '', '', ''),
(24, '', '', '', ''),
(25, '', '', '', ''),
(26, '', '', '', ''),
(27, '', '', '', ''),
(28, '', '', '', ''),
(29, '', '', '', ''),
(30, '', '', '', ''),
(31, '', '', '', ''),
(32, '', '', '', ''),
(33, '', '', '', ''),
(34, 'diva', 'FITRIA RAMADHANI PRIHANDIVA', '111', 'Mahasiswa'),
(35, 'diva', 'FITRIA RAMADHANI PRIHANDIVA', '111', 'Mahasiswa'),
(36, 'chikal', 'Chikal', '123', 'Mahasiswa'),
(37, 'chikal', 'Chikal', '123', 'Mahasiswa'),
(38, 'chikal', 'Chikal', '123', 'Mahasiswa'),
(39, 'chikal', 'Chikal', '123', 'Mahasiswa'),
(40, 'dosen2', 'DOSEN 2 COBA LAGI', '111', 'Dosen'),
(41, 'nabila', 'NABILA RAHMA', '123', 'Mahasiswa'),
(42, 'fitria', 'FITRIA RAMADHANI PRIHANDIVA', '123', 'Mahasiswa'),
(43, 'ian', 'fahmi mardiansyah', '123', 'Mahasiswa'),
(44, 'ian', 'fahmi mardiansyah', '123', 'Mahasiswa'),
(45, 'faqih', 'faqih faqih', '123', 'Mahasiswa'),
(46, 'kevin', 'KEVIN KEVIN', '123', 'Mahasiswa'),
(47, 'popo', 'POPOPOPO', '123', 'Mahasiswa'),
(48, 'asd', 'asdfg', '123', 'Mahasiswa'),
(49, 'DDD', 'DDD', 'AAA', 'Mahasiswa'),
(50, 'aaa', 'aaa', 'aaa', 'Mahasiswa'),
(51, 'aaaaaa', 'aaaaa', 'aaa', 'Mahasiswa'),
(52, 'dddddddd', 'ddddddddd', '111', 'Mahasiswa'),
(53, 'zzzz', 'zzzz', '111', 'Mahasiswa'),
(54, 'zzzz', 'zz', 'zz', 'Mahasiswa'),
(55, 'aaaaaa', 'aaa', 'aaa', 'Mahasiswa'),
(56, 'aaaaaaaaa', 'aa', '123', 'Mahasiswa'),
(57, '111', 'aaaaa', 'aa', 'Mahasiswa'),
(58, 'alumni', 'Fitria Ramadhani Prihandiva', '123', 'Alumni'),
(59, 'ddd', 'DOSEN TEST', '111', 'Dosen'),
(60, '1212', 'FITRIA RAMADHANI PRIHANDIVA', '111', 'Mahasiswa'),
(61, 'cobadeh', 'Coba 1', '111', 'Mahasiswa'),
(62, 'demo23', 'DEMO KE CHIKALL', '111', 'Mahasiswa'),
(63, '1234567', 'dosen chikallll', '111', 'Dosen'),
(64, 'naura', 'Naura Haidar Dosen', '123', 'Dosen'),
(65, 'alumni123', 'alumnidiva', '123', 'Alumni'),
(66, 'awan', 'awannnnnnn', '123', 'Mahasiswa'),
(67, 'thoriq', 'Thoriq as Alumni', '123', 'Alumni'),
(68, 'faqih ', 'Faqih as Dosen', '123', 'Dosen'),
(69, 'sofi', 'Sofi as Tendik', '123', 'Tenaga Pendidikan'),
(70, 'ais', 'Aisha as tendik', '123', 'Tenaga Pendidikan'),
(71, 'hanum', 'hanum as tendik', '123', 'Tenaga Pendidikan'),
(72, 'shaf', 'Shafira as Mitra', '123', 'Mitra'),
(73, 'hertin', 'hertin as Ortu', '123', 'Wali Mahasiswa'),
(74, 'yun', 'yunika as ortu', '123', 'Wali Mahasiswa'),
(75, 'prisil', 'Prisil as ortu', '123', 'Wali Mahasiswa'),
(76, 'yogi', 'yogi as ortu', '123', 'Wali Mahasiswa'),
(77, 'gelby', 'gelby as ortu', '123', 'Wali Mahasiswa'),
(78, 'silmy', 'silmy as ortu', '123', 'Wali Mahasiswa'),
(79, 'manda', 'manda as ortu', '123', 'Wali Mahasiswa'),
(80, 'budi', 'budi as ortu', '123', 'Wali Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_alumni`
--

CREATE TABLE `r_alumni` (
  `id_register_alumni` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `alumni_nim` varchar(20) DEFAULT NULL,
  `alumni_nama` varchar(50) DEFAULT NULL,
  `alumni_prodi` varchar(100) DEFAULT NULL,
  `alumni_email` varchar(100) DEFAULT NULL,
  `alumni_hp` varchar(20) DEFAULT NULL,
  `alumni_tahunlulus` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_alumni`
--

INSERT INTO `r_alumni` (`id_register_alumni`, `id_user`, `alumni_nim`, `alumni_nama`, `alumni_prodi`, `alumni_email`, `alumni_hp`, `alumni_tahunlulus`) VALUES
(1, 65, '2241720185', 'alumnidiva', 'Teknik Mesin Produksi Dan Perawatan', 'aisharahmadia8@gmail.com', '0895355779622', 2024),
(2, 67, '2241760055', 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', 2024);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_dosen`
--

CREATE TABLE `r_dosen` (
  `id_register_dosen` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dosen_nip` varchar(20) DEFAULT NULL,
  `dosen_nama` varchar(50) DEFAULT NULL,
  `dosen_unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_dosen`
--

INSERT INTO `r_dosen` (`id_register_dosen`, `id_user`, `dosen_nip`, `dosen_nama`, `dosen_unit`) VALUES
(1, 59, '1234567890', 'DOSEN TEST', 'Jurusan Teknik Mesin'),
(2, 64, '123456789123', 'Naura Haidar Dosen', 'Jurusan Teknologi Informasi'),
(3, 68, '23456789567', 'Faqih as Dosen', 'Jurusan Teknik Kimia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_industri`
--

CREATE TABLE `r_industri` (
  `id_register_industri` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `industri_nama` varchar(50) DEFAULT NULL,
  `industri_jabatan` varchar(50) DEFAULT NULL,
  `industri_perusahaan` varchar(50) DEFAULT NULL,
  `industri_email` varchar(100) DEFAULT NULL,
  `industri_hp` varchar(20) DEFAULT NULL,
  `industri_kota` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_industri`
--

INSERT INTO `r_industri` (`id_register_industri`, `id_user`, `industri_nama`, `industri_jabatan`, `industri_perusahaan`, `industri_email`, `industri_hp`, `industri_kota`) VALUES
(1, 72, 'Shafira as Mitra', 'Direktur Utama', 'PT Mencari Cinta Sejati', 'shafira@gmail.com', '087654345678', 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_mhs`
--

CREATE TABLE `r_mhs` (
  `id_register_mhs` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `mhs_nim` varchar(20) DEFAULT NULL,
  `mhs_nama` varchar(50) DEFAULT NULL,
  `mhs_prodi` varchar(100) DEFAULT NULL,
  `mhs_email` varchar(100) DEFAULT NULL,
  `mhs_hp` varchar(20) DEFAULT NULL,
  `mhs_tahunmasuk` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_mhs`
--

INSERT INTO `r_mhs` (`id_register_mhs`, `id_user`, `mhs_nim`, `mhs_nama`, `mhs_prodi`, `mhs_email`, `mhs_hp`, `mhs_tahunmasuk`) VALUES
(1, NULL, '2241760055', '<br /><b>Warning</b>:  Undefined variable $nama in', 'Sistem Informasi Bisnis', '2241760055@student.polinema.ac.id', '0895355779622', 2002),
(2, NULL, '2241760055', 'KEVIN KEVIN', 'Sistem Informasi Bisnis', 'indra.dharma@polinema.ac.id', '0895355779622', 2022),
(6, 57, '2241760055', 'aaaaa', 'Sistem Informasi Bisnis', 'tes@gmail.com', '021909090', 2022),
(7, 60, '', 'FITRIA RAMADHANI PRIHANDIVA', 'Sistem Kelistrikan', 'prihandiva1711@gmail.com', '1', 2012),
(8, 61, '2241760055', 'Coba 1', 'Sistem Informasi Bisnis', 'prihandiva1711@gmail.com', '0895355779622', 2022),
(9, 62, '2241760055', 'DEMO KE CHIKALL', 'Sistem Kelistrikan', 'fitriaramadhaniprihandiva@gmail.com', '0895355779622', 2022),
(10, 66, '224175667', 'awannnnnnn', 'Akuntansi Manajemen', 'fitriaramadhaniprihandiva@gmail.com', '34567892', 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_ortu`
--

CREATE TABLE `r_ortu` (
  `id_register_ortu` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ortu_nama` varchar(100) DEFAULT NULL,
  `ortu_jk` enum('L','P') DEFAULT NULL,
  `ortu_umur` tinyint(4) DEFAULT NULL,
  `ortu_hp` varchar(20) DEFAULT NULL,
  `ortu_pendidikan` varchar(30) DEFAULT NULL,
  `ortu_pekerjaan` varchar(50) DEFAULT NULL,
  `ortu_penghasilan` varchar(20) DEFAULT NULL,
  `mhs_nim` varchar(20) DEFAULT NULL,
  `mhs_nama` varchar(50) DEFAULT NULL,
  `mhs_prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_ortu`
--

INSERT INTO `r_ortu` (`id_register_ortu`, `id_user`, `ortu_nama`, `ortu_jk`, `ortu_umur`, `ortu_hp`, `ortu_pendidikan`, `ortu_pekerjaan`, `ortu_penghasilan`, `mhs_nim`, `mhs_nama`, `mhs_prodi`) VALUES
(1, 77, 'gelby as ortu', 'L', 23, '081233099035', 'S1', 'Ibu Rumah Tangga', '67000', '2241760045', 'Fitria Ramadhani', 'Bahasa Inggris Untuk Industri Pariwisata'),
(2, 78, 'silmy as ortu', 'P', 23, '0896547889', 'S1', '', '67000', '2241760045', 'Fitria Ramadhani', 'Teknologi Rekayasa Konstruksi Jalan Dan Jembatan'),
(3, 79, 'manda as ortu', 'P', 23, '0896547889', 'S1', 'Ibu Rumah Tangga', '67000', '2241760045', 'Fitria Ramadhani', 'Teknik Otomotif Elektronik'),
(4, 80, 'budi as ortu', 'L', 23, '0896547889', 'S1', 'Ibu Rumah Tangga', '67000', '2241760045', 'Fitria Ramadhani', 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_tendik`
--

CREATE TABLE `r_tendik` (
  `id_register_tendik` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tendik_nopeg` varchar(20) DEFAULT NULL,
  `tendik_nama` varchar(50) DEFAULT NULL,
  `tendik_unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `r_tendik`
--

INSERT INTO `r_tendik` (`id_register_tendik`, `id_user`, `tendik_nopeg`, `tendik_nama`, `tendik_unit`) VALUES
(1, 69, '123456789', 'Sofi as Tendik', 'Jurusan Teknologi Informasi'),
(2, 70, '123456789', 'Aisha as tendik', 'Jurusan Teknik Elektro'),
(3, 71, '12345689', 'hanum as tendik', 'Jurusan Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban_alumni`
--

CREATE TABLE `t_jawaban_alumni` (
  `id_jawaban_alumni` int(11) NOT NULL,
  `id_responden_alumni` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jawaban_alumni`
--

INSERT INTO `t_jawaban_alumni` (`id_jawaban_alumni`, `id_responden_alumni`, `id_soal`, `jawaban`) VALUES
(1, 5, 1, NULL),
(2, 5, 2, NULL),
(3, 5, 3, NULL),
(4, 5, 13, 'kurang'),
(5, 5, 14, 'cukup'),
(6, 5, 15, 'baik'),
(7, 5, 16, NULL),
(8, 5, 17, NULL),
(9, 5, 18, NULL),
(10, 5, 19, NULL),
(11, 5, 20, NULL),
(12, 5, 21, NULL),
(13, 5, 22, NULL),
(14, 5, 23, NULL),
(15, 5, 30, NULL),
(16, 5, 31, NULL),
(17, 5, 35, NULL),
(18, 5, 36, NULL),
(19, 5, 37, NULL),
(20, 6, 1, NULL),
(21, 6, 2, NULL),
(22, 6, 3, NULL),
(23, 6, 13, 'kurang'),
(24, 6, 14, 'cukup'),
(25, 6, 15, 'baik'),
(26, 6, 16, NULL),
(27, 6, 17, NULL),
(28, 6, 18, NULL),
(29, 6, 19, NULL),
(30, 6, 20, NULL),
(31, 6, 21, NULL),
(32, 6, 22, NULL),
(33, 6, 23, NULL),
(34, 6, 30, NULL),
(35, 6, 31, NULL),
(36, 6, 35, NULL),
(37, 6, 36, NULL),
(38, 6, 37, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban_dosen`
--

CREATE TABLE `t_jawaban_dosen` (
  `id_jawaban_dosen` int(11) NOT NULL,
  `id_responden_dosen` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jawaban_dosen`
--

INSERT INTO `t_jawaban_dosen` (`id_jawaban_dosen`, `id_responden_dosen`, `id_soal`, `jawaban`) VALUES
(19, 7, 10, 'kurang'),
(20, 7, 11, 'cukup'),
(21, 7, 12, 'baik'),
(22, 1, 10, 'kurang'),
(23, 1, 11, 'cukup'),
(24, 1, 12, 'baik'),
(25, 2, 4, 'kurang'),
(26, 2, 5, 'cukup'),
(27, 2, 6, 'baik'),
(28, 3, 1, 'cukup'),
(29, 3, 2, 'baik'),
(30, 3, 3, 'sangat baik'),
(31, 4, 1, 'sangat baik'),
(32, 4, 2, 'cukup'),
(33, 4, 3, 'baik'),
(34, 4, 13, 'sangat baik'),
(35, 5, 4, NULL),
(36, 5, 5, NULL),
(37, 5, 6, NULL),
(38, 6, 1, 'kurang'),
(39, 6, 2, 'cukup'),
(40, 6, 3, 'baik'),
(41, 6, 13, 'sangat baik'),
(42, 7, 1, 'kurang'),
(43, 7, 2, 'cukup'),
(44, 7, 3, 'baik'),
(45, 7, 13, 'sangat baik'),
(46, 7, 15, 'kurang'),
(47, 8, 4, 'kurang'),
(48, 8, 5, 'cukup'),
(49, 8, 6, 'baik'),
(50, 9, 1, NULL),
(51, 9, 2, NULL),
(52, 9, 3, NULL),
(53, 9, 13, NULL),
(54, 9, 15, NULL),
(55, 9, 16, NULL),
(56, 9, 17, NULL),
(57, 9, 18, NULL),
(58, 9, 19, NULL),
(59, 9, 20, 'baik'),
(60, 10, 1, NULL),
(61, 10, 2, NULL),
(62, 10, 3, NULL),
(63, 10, 13, NULL),
(64, 10, 15, NULL),
(65, 10, 16, NULL),
(66, 10, 17, NULL),
(67, 10, 18, NULL),
(68, 10, 19, NULL),
(69, 10, 20, 'baik'),
(70, 11, 1, NULL),
(71, 11, 2, NULL),
(72, 11, 3, NULL),
(73, 11, 13, NULL),
(74, 11, 14, NULL),
(75, 11, 15, NULL),
(76, 11, 16, NULL),
(77, 11, 17, NULL),
(78, 11, 18, NULL),
(79, 11, 19, NULL),
(80, 11, 20, 'kurang'),
(81, 11, 21, 'cukup'),
(82, 11, 22, 'baik'),
(83, 11, 23, 'sangat baik'),
(84, 11, 30, NULL),
(85, 11, 31, NULL),
(86, 11, 35, NULL),
(87, 11, 36, NULL),
(88, 11, 37, NULL),
(89, 12, 4, NULL),
(90, 12, 5, NULL),
(91, 12, 6, NULL),
(92, 12, 24, 'kurang'),
(93, 12, 25, 'cukup'),
(94, 12, 26, 'sangat baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban_industri`
--

CREATE TABLE `t_jawaban_industri` (
  `id_jawaban_industri` int(11) NOT NULL,
  `id_responden_industri` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jawaban_industri`
--

INSERT INTO `t_jawaban_industri` (`id_jawaban_industri`, `id_responden_industri`, `id_soal`, `jawaban`) VALUES
(1, 1, 35, 'kurang'),
(2, 1, 36, 'cukup'),
(3, 1, 37, 'baik'),
(4, 2, 38, 'sangat baik'),
(5, 2, 39, 'sangat baik'),
(6, 2, 40, 'sangat baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban_mhs`
--

CREATE TABLE `t_jawaban_mhs` (
  `id_jawaban_mhs` int(11) NOT NULL,
  `id_responden_mhs` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jawaban_mhs`
--

INSERT INTO `t_jawaban_mhs` (`id_jawaban_mhs`, `id_responden_mhs`, `id_soal`, `jawaban`) VALUES
(1, 3, 1, 'kurang'),
(2, 3, 2, 'cukup'),
(3, 3, 3, 'baik'),
(4, 3, 13, 'sangat baik'),
(5, 6, 1, 'kurang'),
(6, 6, 2, 'cukup'),
(7, 6, 3, 'baik'),
(8, 6, 13, 'sangat baik'),
(9, 6, 15, 'sangat baik'),
(10, 6, 16, 'sangat baik'),
(11, 6, 17, 'baik'),
(12, 6, 18, 'baik'),
(13, 6, 19, 'sangat baik'),
(14, 7, 1, 'kurang'),
(15, 7, 2, 'cukup'),
(16, 7, 3, 'baik'),
(17, 7, 13, 'sangat baik'),
(18, 7, 15, 'sangat baik'),
(19, 7, 16, 'sangat baik'),
(20, 7, 17, 'baik'),
(21, 7, 18, 'baik'),
(22, 7, 19, 'sangat baik'),
(23, 8, 1, 'kurang'),
(24, 8, 2, 'cukup'),
(25, 8, 3, 'baik'),
(26, 8, 13, 'sangat baik'),
(27, 8, 15, 'sangat baik'),
(28, 8, 16, 'sangat baik'),
(29, 8, 17, 'baik'),
(30, 8, 18, 'baik'),
(31, 8, 19, 'sangat baik'),
(32, 9, 7, 'cukup'),
(33, 9, 8, 'kurang'),
(34, 9, 9, 'baik'),
(35, 10, 10, 'kurang'),
(36, 10, 11, 'cukup'),
(37, 10, 12, 'baik'),
(38, 10, 14, 'sangat baik'),
(39, 11, 4, 'kurang'),
(40, 11, 5, 'cukup'),
(41, 11, 6, 'baik'),
(42, 12, 1, 'kurang'),
(43, 12, 2, 'cukup'),
(44, 12, 3, 'baik'),
(45, 12, 13, NULL),
(46, 12, 14, NULL),
(47, 12, 15, NULL),
(48, 12, 16, NULL),
(49, 12, 17, NULL),
(50, 12, 18, NULL),
(51, 12, 19, NULL),
(52, 12, 20, NULL),
(53, 12, 21, NULL),
(54, 12, 22, NULL),
(55, 12, 23, NULL),
(56, 12, 30, NULL),
(57, 12, 31, NULL),
(58, 12, 35, NULL),
(59, 12, 36, NULL),
(60, 12, 37, NULL),
(61, 13, 7, 'cukup'),
(62, 13, 8, 'baik'),
(63, 13, 9, 'sangat baik'),
(64, 14, 10, 'cukup'),
(65, 14, 11, 'baik'),
(66, 14, 12, 'sangat baik'),
(67, 14, 27, NULL),
(68, 14, 28, NULL),
(69, 14, 29, NULL),
(70, 14, 32, NULL),
(71, 14, 33, NULL),
(72, 14, 34, NULL),
(73, 14, 38, NULL),
(74, 14, 39, NULL),
(75, 14, 40, NULL),
(76, 15, 1, 'kurang'),
(77, 15, 2, 'cukup'),
(78, 15, 3, 'baik'),
(79, 15, 13, NULL),
(80, 15, 14, NULL),
(81, 15, 15, NULL),
(82, 15, 16, NULL),
(83, 15, 17, NULL),
(84, 15, 18, NULL),
(85, 15, 19, NULL),
(86, 15, 20, NULL),
(87, 15, 21, NULL),
(88, 15, 22, NULL),
(89, 15, 23, NULL),
(90, 15, 30, NULL),
(91, 15, 31, NULL),
(92, 15, 35, NULL),
(93, 15, 36, NULL),
(94, 15, 37, NULL),
(95, 16, 7, 'cukup'),
(96, 16, 8, 'cukup'),
(97, 16, 9, 'cukup'),
(98, 17, 7, 'cukup'),
(99, 17, 8, 'cukup'),
(100, 17, 9, 'cukup'),
(101, 18, 10, 'kurang'),
(102, 18, 11, 'cukup'),
(103, 18, 12, 'baik'),
(104, 18, 27, NULL),
(105, 18, 28, NULL),
(106, 18, 29, NULL),
(107, 18, 32, NULL),
(108, 18, 33, NULL),
(109, 18, 34, NULL),
(110, 18, 38, NULL),
(111, 18, 39, NULL),
(112, 18, 40, NULL),
(113, 19, 10, 'kurang'),
(114, 19, 11, 'cukup'),
(115, 19, 12, 'baik'),
(116, 19, 27, NULL),
(117, 19, 28, NULL),
(118, 19, 29, NULL),
(119, 19, 32, NULL),
(120, 19, 33, NULL),
(121, 19, 34, NULL),
(122, 19, 38, NULL),
(123, 19, 39, NULL),
(124, 19, 40, NULL),
(125, 20, 10, 'kurang'),
(126, 20, 11, 'cukup'),
(127, 20, 12, 'baik'),
(128, 20, 27, NULL),
(129, 20, 28, NULL),
(130, 20, 29, NULL),
(131, 20, 32, NULL),
(132, 20, 33, NULL),
(133, 20, 34, NULL),
(134, 20, 38, NULL),
(135, 20, 39, NULL),
(136, 20, 40, NULL),
(137, 21, 10, 'kurang'),
(138, 21, 11, 'cukup'),
(139, 21, 12, 'baik'),
(140, 21, 27, NULL),
(141, 21, 28, NULL),
(142, 21, 29, NULL),
(143, 21, 32, NULL),
(144, 21, 33, NULL),
(145, 21, 34, NULL),
(146, 21, 38, NULL),
(147, 21, 39, NULL),
(148, 21, 40, NULL),
(149, 22, 10, 'kurang'),
(150, 22, 11, 'cukup'),
(151, 22, 12, 'baik'),
(152, 22, 27, NULL),
(153, 22, 28, NULL),
(154, 22, 29, NULL),
(155, 22, 32, NULL),
(156, 22, 33, NULL),
(157, 22, 34, NULL),
(158, 22, 38, NULL),
(159, 22, 39, NULL),
(160, 22, 40, NULL),
(161, 23, 10, 'kurang'),
(162, 23, 11, 'cukup'),
(163, 23, 12, 'baik'),
(164, 23, 27, NULL),
(165, 23, 28, NULL),
(166, 23, 29, NULL),
(167, 23, 32, NULL),
(168, 23, 33, NULL),
(169, 23, 34, NULL),
(170, 23, 38, NULL),
(171, 23, 39, NULL),
(172, 23, 40, NULL),
(173, 24, 4, 'kurang'),
(174, 24, 5, 'cukup'),
(175, 24, 6, 'baik'),
(176, 24, 24, NULL),
(177, 24, 25, NULL),
(178, 24, 26, NULL),
(179, 25, 1, 'kurang'),
(180, 25, 2, 'cukup'),
(181, 25, 3, 'baik'),
(182, 25, 13, NULL),
(183, 25, 14, NULL),
(184, 25, 15, NULL),
(185, 25, 16, NULL),
(186, 25, 17, NULL),
(187, 25, 18, NULL),
(188, 25, 19, NULL),
(189, 25, 20, NULL),
(190, 25, 21, NULL),
(191, 25, 22, NULL),
(192, 25, 23, NULL),
(193, 25, 30, NULL),
(194, 25, 31, NULL),
(195, 25, 35, NULL),
(196, 25, 36, NULL),
(197, 25, 37, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban_ortu`
--

CREATE TABLE `t_jawaban_ortu` (
  `id_jawaban_ortu` int(11) NOT NULL,
  `id_responden_ortu` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jawaban_ortu`
--

INSERT INTO `t_jawaban_ortu` (`id_jawaban_ortu`, `id_responden_ortu`, `id_soal`, `jawaban`) VALUES
(1, 3, 16, 'kurang'),
(2, 3, 17, 'cukup'),
(3, 3, 18, 'baik'),
(4, 4, 16, 'sangat baik'),
(5, 4, 17, 'sangat baik'),
(6, 4, 18, 'sangat baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban_tendik`
--

CREATE TABLE `t_jawaban_tendik` (
  `id_jawaban_tendik` int(11) NOT NULL,
  `id_responden_tendik` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jawaban_tendik`
--

INSERT INTO `t_jawaban_tendik` (`id_jawaban_tendik`, `id_responden_tendik`, `id_soal`, `jawaban`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 1, 13, NULL),
(5, 1, 14, NULL),
(6, 1, 15, NULL),
(7, 1, 16, NULL),
(8, 1, 17, NULL),
(9, 1, 18, NULL),
(10, 1, 19, 'kurang'),
(11, 1, 20, NULL),
(12, 1, 21, NULL),
(13, 1, 22, NULL),
(14, 1, 23, NULL),
(15, 1, 30, 'cukup'),
(16, 1, 31, 'baik'),
(17, 1, 35, NULL),
(18, 1, 36, NULL),
(19, 1, 37, NULL),
(20, 2, 10, NULL),
(21, 2, 11, NULL),
(22, 2, 12, NULL),
(23, 2, 27, NULL),
(24, 2, 28, NULL),
(25, 2, 29, NULL),
(26, 2, 32, 'baik'),
(27, 2, 33, 'cukup'),
(28, 2, 34, 'kurang'),
(29, 2, 38, NULL),
(30, 2, 39, NULL),
(31, 2, 40, NULL),
(32, 3, 1, NULL),
(33, 3, 2, NULL),
(34, 3, 3, NULL),
(35, 3, 13, NULL),
(36, 3, 14, NULL),
(37, 3, 15, NULL),
(38, 3, 16, NULL),
(39, 3, 17, NULL),
(40, 3, 18, NULL),
(41, 3, 19, 'kurang'),
(42, 3, 20, NULL),
(43, 3, 21, NULL),
(44, 3, 22, NULL),
(45, 3, 23, NULL),
(46, 3, 30, 'cukup'),
(47, 3, 31, 'baik'),
(48, 3, 35, NULL),
(49, 3, 36, NULL),
(50, 3, 37, NULL),
(51, 4, 10, NULL),
(52, 4, 11, NULL),
(53, 4, 12, NULL),
(54, 4, 27, NULL),
(55, 4, 28, NULL),
(56, 4, 29, NULL),
(57, 4, 32, 'kurang'),
(58, 4, 33, 'cukup'),
(59, 4, 34, 'sangat baik'),
(60, 4, 38, NULL),
(61, 4, 39, NULL),
(62, 4, 40, NULL),
(63, 5, 19, 'kurang'),
(64, 5, 30, 'cukup'),
(65, 5, 31, 'baik'),
(66, 6, 32, 'sangat baik'),
(67, 6, 33, 'cukup'),
(68, 6, 34, 'sangat baik'),
(69, 2, 16, 'cukup'),
(70, 2, 17, 'cukup'),
(71, 2, 18, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_responden_alumni`
--

CREATE TABLE `t_responden_alumni` (
  `id_responden_alumni` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nim` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_prodi` varchar(100) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `saran` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_responden_alumni`
--

INSERT INTO `t_responden_alumni` (`id_responden_alumni`, `id_survey`, `responden_tanggal`, `responden_nim`, `responden_nama`, `responden_prodi`, `responden_email`, `responden_hp`, `tahun_lulus`, `saran`, `id_kategori`) VALUES
(1, 6, '2024-05-28 21:28:46', NULL, 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', NULL, 'tes thoriq as alumni', 1),
(2, 6, '2024-05-28 21:41:34', NULL, 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', 2024, 'tes thoriq as alumni', 1),
(3, 6, '2024-05-28 21:48:35', NULL, 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', 2024, 'tes thoriq as alumni', 1),
(4, 6, '2024-05-28 21:50:42', '2241760055', 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', 2024, 'tes thoriq as alumni', 1),
(5, 6, '2024-05-28 21:52:48', '2241760055', 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', 2024, 'tes thoriq as alumni', 1),
(6, 6, '2024-05-28 21:53:16', '2241760055', 'Thoriq as Alumni', 'Pengelolaan Arsip Dan Rekaman Informasi', 'zadoai.naura@gmail.com', '0895355779622', 2024, 'tes thoriq as alumni', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_responden_dosen`
--

CREATE TABLE `t_responden_dosen` (
  `id_responden_dosen` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nip` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_unit` varchar(50) DEFAULT NULL,
  `saran` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_responden_dosen`
--

INSERT INTO `t_responden_dosen` (`id_responden_dosen`, `id_survey`, `responden_tanggal`, `responden_nip`, `responden_nama`, `responden_unit`, `saran`, `id_kategori`) VALUES
(1, 1, '2024-05-12 14:04:38', NULL, 'Dosen 1', NULL, 'tess', 3),
(2, 1, '2024-05-12 14:06:48', NULL, 'Dosen 1', NULL, 'tes', 4),
(3, 1, '2024-05-12 14:07:02', NULL, 'Dosen 1', NULL, 'tesss', 1),
(4, 1, '2024-05-13 08:20:37', NULL, 'Dosen Lagi', NULL, 'dosen lagi buat saran fasilitas', 1),
(5, 1, '2024-05-13 08:20:53', NULL, 'Dosen Lagi', NULL, '', 4),
(6, 1, '2024-05-13 10:26:56', NULL, 'Dosen Demo', NULL, 'tess', 1),
(7, 1, '2024-05-13 21:49:51', NULL, 'Chikal Nazmi', NULL, 'tessssssssssssssss', 1),
(8, 1, '2024-05-13 21:51:09', NULL, 'Chikal Nazmi', NULL, 'hhgehgthggh', 4),
(9, 2, '2024-05-18 14:32:25', NULL, 'DOSEN 2 COBA LAGI', NULL, 'ocay', 1),
(10, 2, '2024-05-18 14:32:46', NULL, 'DOSEN 2 COBA LAGI', NULL, 'ocay', 1),
(11, 2, '2024-05-28 21:57:33', NULL, 'Faqih as Dosen', NULL, 'tes faqih as dosen (fasilitas)', 1),
(12, 2, '2024-05-28 22:02:48', '23456789567', 'Faqih as Dosen', 'Jurusan Teknik Kimia', 'tes faqih as dosen (kurikulum)', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_responden_industri`
--

CREATE TABLE `t_responden_industri` (
  `id_responden_industri` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_jabatan` varchar(50) DEFAULT NULL,
  `responden_perusahaan` varchar(50) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `responden_kota` varchar(50) DEFAULT NULL,
  `saran` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_responden_industri`
--

INSERT INTO `t_responden_industri` (`id_responden_industri`, `id_survey`, `responden_tanggal`, `responden_nama`, `responden_jabatan`, `responden_perusahaan`, `responden_email`, `responden_hp`, `responden_kota`, `saran`, `id_kategori`) VALUES
(1, 5, '2024-05-29 08:19:17', 'Shafira as Mitra', 'Direktur Utama', 'PT Mencari Cinta Sejati', 'shafira@gmail.com', '087654345678', 'Surabaya', 'shafira as mitra (fasilitas)', 1),
(2, 5, '2024-06-02 17:41:14', 'Shafira as Mitra', 'Direktur Utama', 'PT Mencari Cinta Sejati', 'shafira@gmail.com', '087654345678', 'Surabaya', 'tes shaf as mitra (kualitas mahasiswa)', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_responden_mhs`
--

CREATE TABLE `t_responden_mhs` (
  `id_responden_mhs` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nim` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_prodi` varchar(100) DEFAULT NULL,
  `responden_email` varchar(100) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `saran` varchar(255) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_responden_mhs`
--

INSERT INTO `t_responden_mhs` (`id_responden_mhs`, `id_survey`, `responden_tanggal`, `responden_nim`, `responden_nama`, `responden_prodi`, `responden_email`, `responden_hp`, `tahun_masuk`, `saran`, `id_kategori`) VALUES
(2, 1, '2024-05-13 07:47:51', NULL, 'Dosen 1', NULL, NULL, NULL, 2022, 'saran fasilitas Nabilah Rahmah', 1),
(3, 1, '2024-05-13 07:50:44', NULL, 'Dosen 1', NULL, NULL, NULL, 2022, 'saran fasilitas Nabilah Rahmah', 1),
(5, 1, '0000-00-00 00:00:00', '2241760055', 'Chikal', 'Sistem Informasi Bisnis', 'chikal@chikal.chikal', '8912837', 2002, '', NULL),
(6, 1, '2024-05-17 20:07:08', NULL, 'Chikal', NULL, NULL, NULL, 2022, 'tes 1 fasilitas chikal mahasiswa', 1),
(7, 1, '2024-05-17 20:09:01', NULL, 'Chikal', NULL, NULL, NULL, 2022, 'tes 1 fasilitas chikal mahasiswa', 1),
(8, 1, '2024-05-17 20:09:54', NULL, 'Chikal', NULL, NULL, NULL, 2022, 'tes 1 fasilitas chikal mahasiswa', 1),
(9, 1, '2024-05-17 20:10:10', NULL, 'Chikal', NULL, NULL, NULL, 2022, 'tes 2 chikal mahasiswa tes dosen', 2),
(10, 1, '2024-05-17 20:10:25', NULL, 'Chikal', NULL, NULL, NULL, 2022, 'tes 3 chikal mahasiswa tes sistem', 3),
(11, 1, '2024-05-17 20:10:40', NULL, 'Chikal', NULL, NULL, NULL, 2022, 'chikal mahasiswa tes kurikulum', 4),
(15, 1, '2024-05-19 03:35:32', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'll', 1),
(16, 1, '2024-05-19 03:36:43', NULL, 'aaaaa', NULL, NULL, NULL, NULL, '..', 2),
(17, 1, '2024-05-19 03:37:25', NULL, 'aaaaa', NULL, NULL, NULL, NULL, '..', 2),
(18, 1, '2024-05-19 03:37:48', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'l', 3),
(19, 1, '2024-05-19 03:38:04', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'l', 3),
(20, 1, '2024-05-19 03:38:07', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'l', 3),
(21, 1, '2024-05-19 03:38:43', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'l', 3),
(22, 1, '2024-05-19 03:38:57', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'l', 3),
(23, 1, '2024-05-19 03:40:25', NULL, 'aaaaa', NULL, NULL, NULL, NULL, 'l', 3),
(24, 1, '2024-05-19 03:49:09', '2241760055', 'aaaaa', 'Sistem Informasi Bisnis', '2241760055@student.polinema.ac.id', '0895355779622', 2022, 'lll', 4),
(25, 1, '2024-05-20 16:11:59', NULL, 'Nabilah Rahmah', NULL, NULL, NULL, NULL, 'tes', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_responden_ortu`
--

CREATE TABLE `t_responden_ortu` (
  `id_responden_ortu` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nama` varchar(100) DEFAULT NULL,
  `responden_jk` enum('L','P') DEFAULT NULL,
  `responden_umur` tinyint(4) DEFAULT NULL,
  `responden_hp` varchar(20) DEFAULT NULL,
  `responden_pendidikan` varchar(30) DEFAULT NULL,
  `responden_pekerjaan` varchar(50) DEFAULT NULL,
  `responden_penghasilan` varchar(20) DEFAULT NULL,
  `mahasiswa_nim` varchar(20) DEFAULT NULL,
  `mahasiswa_nama` varchar(50) DEFAULT NULL,
  `mahasiswa_prodi` varchar(100) DEFAULT NULL,
  `saran` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_responden_ortu`
--

INSERT INTO `t_responden_ortu` (`id_responden_ortu`, `id_survey`, `responden_tanggal`, `responden_nama`, `responden_jk`, `responden_umur`, `responden_hp`, `responden_pendidikan`, `responden_pekerjaan`, `responden_penghasilan`, `mahasiswa_nim`, `mahasiswa_nama`, `mahasiswa_prodi`, `saran`, `id_kategori`) VALUES
(1, 3, '2024-05-29 11:25:02', 'gelby as ortu', 'L', 23, '081233099035', 'S1', 'Ibu Rumah Tangga', '67000', '2241760045', 'Fitria Ramadhani', 'Bahasa Inggris Untuk Industri Pariwisata', 'fwggwqwe', 1),
(2, 3, '2024-05-29 11:27:28', 'silmy as ortu', 'P', 23, '0896547889', 'S1', '', '67000', '2241760045', 'Fitria Ramadhani', 'Teknologi Rekayasa Konstruksi Jalan Dan Jembatan', 'tes silmy', 1),
(3, 3, '2024-05-29 11:32:34', 'manda as ortu', 'P', 23, '0896547889', 'S1', 'Ibu Rumah Tangga', '67000', '2241760045', 'Fitria Ramadhani', 'Teknik Otomotif Elektronik', 'mandaaaa', 1),
(4, 3, '2024-06-02 17:49:56', 'budi as ortu', 'L', 23, '0896547889', 'S1', 'Ibu Rumah Tangga', '67000', '2241760045', 'Fitria Ramadhani', 'Keuangan', 'budi as ortu (pertanyaan updated)', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_responden_tendik`
--

CREATE TABLE `t_responden_tendik` (
  `id_responden_tendik` int(11) NOT NULL,
  `id_survey` int(11) DEFAULT NULL,
  `responden_tanggal` datetime DEFAULT NULL,
  `responden_nopeg` varchar(20) DEFAULT NULL,
  `responden_nama` varchar(50) DEFAULT NULL,
  `responden_unit` varchar(50) DEFAULT NULL,
  `saran` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_responden_tendik`
--

INSERT INTO `t_responden_tendik` (`id_responden_tendik`, `id_survey`, `responden_tanggal`, `responden_nopeg`, `responden_nama`, `responden_unit`, `saran`, `id_kategori`) VALUES
(1, 4, '2024-05-28 22:28:25', '123456789', 'Sofi as Tendik', 'Jurusan Teknologi Informasi', 'Tes sofi as Tendik (Fasilitas)', 1),
(2, 4, '2024-05-28 22:28:46', '123456789', 'Sofi as Tendik', 'Jurusan Teknologi Informasi', 'tes sofi as tendik (sistem)', 3),
(3, 4, '2024-05-28 22:33:08', '123456789', 'Aisha as tendik', 'Jurusan Teknik Elektro', 'Aisha as tendik (fasilitas)', 1),
(4, 4, '2024-05-28 22:33:24', '123456789', 'Aisha as tendik', 'Jurusan Teknik Elektro', 'aisha as tendik (sistem)', 3),
(5, 4, '2024-05-28 22:48:20', '12345689', 'hanum as tendik', 'Jurusan Teknik Elektro', 'tes hanum as tendik (fasilitas)', 1),
(6, 4, '2024-05-28 22:48:41', '12345689', 'hanum as tendik', 'Jurusan Teknik Elektro', 'hanum as tendik (sistem)', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `m_survey`
--
ALTER TABLE `m_survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indeks untuk tabel `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `r_alumni`
--
ALTER TABLE `r_alumni`
  ADD PRIMARY KEY (`id_register_alumni`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `r_dosen`
--
ALTER TABLE `r_dosen`
  ADD PRIMARY KEY (`id_register_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `r_industri`
--
ALTER TABLE `r_industri`
  ADD PRIMARY KEY (`id_register_industri`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `r_mhs`
--
ALTER TABLE `r_mhs`
  ADD PRIMARY KEY (`id_register_mhs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `r_ortu`
--
ALTER TABLE `r_ortu`
  ADD PRIMARY KEY (`id_register_ortu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `r_tendik`
--
ALTER TABLE `r_tendik`
  ADD PRIMARY KEY (`id_register_tendik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  ADD PRIMARY KEY (`id_jawaban_alumni`),
  ADD KEY `id_responden_alumni` (`id_responden_alumni`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  ADD PRIMARY KEY (`id_jawaban_dosen`),
  ADD KEY `id_responden_dosen` (`id_responden_dosen`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  ADD PRIMARY KEY (`id_jawaban_industri`),
  ADD KEY `id_responden_industri` (`id_responden_industri`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `t_jawaban_mhs`
--
ALTER TABLE `t_jawaban_mhs`
  ADD PRIMARY KEY (`id_jawaban_mhs`),
  ADD KEY `id_responden_mhs` (`id_responden_mhs`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  ADD PRIMARY KEY (`id_jawaban_ortu`),
  ADD KEY `id_responden_ortu` (`id_responden_ortu`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  ADD PRIMARY KEY (`id_jawaban_tendik`),
  ADD KEY `id_soal` (`id_soal`),
  ADD KEY `fk_id_responden_tendik` (`id_responden_tendik`);

--
-- Indeks untuk tabel `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  ADD PRIMARY KEY (`id_responden_alumni`),
  ADD KEY `id_survey` (`id_survey`),
  ADD KEY `fk_id_kategori_industri` (`id_kategori`);

--
-- Indeks untuk tabel `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  ADD PRIMARY KEY (`id_responden_dosen`),
  ADD KEY `id_survey` (`id_survey`),
  ADD KEY `fk_id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  ADD PRIMARY KEY (`id_responden_industri`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indeks untuk tabel `t_responden_mhs`
--
ALTER TABLE `t_responden_mhs`
  ADD PRIMARY KEY (`id_responden_mhs`),
  ADD KEY `id_survey` (`id_survey`),
  ADD KEY `fk_id_kategori_mahasiswa` (`id_kategori`);

--
-- Indeks untuk tabel `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  ADD PRIMARY KEY (`id_responden_ortu`),
  ADD KEY `id_survey` (`id_survey`),
  ADD KEY `fk_id_kategori_ortu` (`id_kategori`);

--
-- Indeks untuk tabel `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  ADD PRIMARY KEY (`id_responden_tendik`),
  ADD KEY `id_survey` (`id_survey`),
  ADD KEY `fk_id_kategori_tendik` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `m_survey`
--
ALTER TABLE `m_survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `r_alumni`
--
ALTER TABLE `r_alumni`
  MODIFY `id_register_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `r_dosen`
--
ALTER TABLE `r_dosen`
  MODIFY `id_register_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `r_industri`
--
ALTER TABLE `r_industri`
  MODIFY `id_register_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `r_mhs`
--
ALTER TABLE `r_mhs`
  MODIFY `id_register_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `r_ortu`
--
ALTER TABLE `r_ortu`
  MODIFY `id_register_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `r_tendik`
--
ALTER TABLE `r_tendik`
  MODIFY `id_register_tendik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  MODIFY `id_jawaban_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  MODIFY `id_jawaban_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  MODIFY `id_jawaban_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_jawaban_mhs`
--
ALTER TABLE `t_jawaban_mhs`
  MODIFY `id_jawaban_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT untuk tabel `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  MODIFY `id_jawaban_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  MODIFY `id_jawaban_tendik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  MODIFY `id_responden_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  MODIFY `id_responden_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  MODIFY `id_responden_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_responden_mhs`
--
ALTER TABLE `t_responden_mhs`
  MODIFY `id_responden_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  MODIFY `id_responden_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  MODIFY `id_responden_tendik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `m_survey`
--
ALTER TABLE `m_survey`
  ADD CONSTRAINT `m_survey_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `m_survey_soal`
--
ALTER TABLE `m_survey_soal`
  ADD CONSTRAINT `m_survey_soal_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `m_survey_soal_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);

--
-- Ketidakleluasaan untuk tabel `r_alumni`
--
ALTER TABLE `r_alumni`
  ADD CONSTRAINT `r_alumni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `r_dosen`
--
ALTER TABLE `r_dosen`
  ADD CONSTRAINT `r_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `r_industri`
--
ALTER TABLE `r_industri`
  ADD CONSTRAINT `r_industri_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `r_mhs`
--
ALTER TABLE `r_mhs`
  ADD CONSTRAINT `r_mhs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `r_ortu`
--
ALTER TABLE `r_ortu`
  ADD CONSTRAINT `r_ortu_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `r_tendik`
--
ALTER TABLE `r_tendik`
  ADD CONSTRAINT `r_tendik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `t_jawaban_alumni`
--
ALTER TABLE `t_jawaban_alumni`
  ADD CONSTRAINT `t_jawaban_alumni_ibfk_1` FOREIGN KEY (`id_responden_alumni`) REFERENCES `t_responden_alumni` (`id_responden_alumni`),
  ADD CONSTRAINT `t_jawaban_alumni_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `m_survey_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `t_jawaban_dosen`
--
ALTER TABLE `t_jawaban_dosen`
  ADD CONSTRAINT `t_jawaban_dosen_ibfk_1` FOREIGN KEY (`id_responden_dosen`) REFERENCES `t_responden_dosen` (`id_responden_dosen`),
  ADD CONSTRAINT `t_jawaban_dosen_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `m_survey_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `t_jawaban_industri`
--
ALTER TABLE `t_jawaban_industri`
  ADD CONSTRAINT `t_jawaban_industri_ibfk_1` FOREIGN KEY (`id_responden_industri`) REFERENCES `t_responden_industri` (`id_responden_industri`),
  ADD CONSTRAINT `t_jawaban_industri_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `m_survey_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `t_jawaban_mhs`
--
ALTER TABLE `t_jawaban_mhs`
  ADD CONSTRAINT `t_jawaban_mhs_ibfk_1` FOREIGN KEY (`id_responden_mhs`) REFERENCES `t_responden_mhs` (`id_responden_mhs`),
  ADD CONSTRAINT `t_jawaban_mhs_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `m_survey_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `t_jawaban_ortu`
--
ALTER TABLE `t_jawaban_ortu`
  ADD CONSTRAINT `t_jawaban_ortu_ibfk_1` FOREIGN KEY (`id_responden_ortu`) REFERENCES `t_responden_ortu` (`id_responden_ortu`),
  ADD CONSTRAINT `t_jawaban_ortu_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `m_survey_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `t_jawaban_tendik`
--
ALTER TABLE `t_jawaban_tendik`
  ADD CONSTRAINT `fk_id_responden_tendik` FOREIGN KEY (`id_responden_tendik`) REFERENCES `t_responden_tendik` (`id_responden_tendik`),
  ADD CONSTRAINT `t_jawaban_tendik_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `m_survey_soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `t_responden_alumni`
--
ALTER TABLE `t_responden_alumni`
  ADD CONSTRAINT `fk_id_kategori_alumni` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `fk_id_kategori_industri` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `t_responden_alumni_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);

--
-- Ketidakleluasaan untuk tabel `t_responden_dosen`
--
ALTER TABLE `t_responden_dosen`
  ADD CONSTRAINT `fk_id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `t_responden_dosen_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);

--
-- Ketidakleluasaan untuk tabel `t_responden_industri`
--
ALTER TABLE `t_responden_industri`
  ADD CONSTRAINT `t_responden_industri_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);

--
-- Ketidakleluasaan untuk tabel `t_responden_mhs`
--
ALTER TABLE `t_responden_mhs`
  ADD CONSTRAINT `fk_id_kategori_mahasiswa` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `t_responden_mhs_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);

--
-- Ketidakleluasaan untuk tabel `t_responden_ortu`
--
ALTER TABLE `t_responden_ortu`
  ADD CONSTRAINT `fk_id_kategori_ortu` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `t_responden_ortu_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);

--
-- Ketidakleluasaan untuk tabel `t_responden_tendik`
--
ALTER TABLE `t_responden_tendik`
  ADD CONSTRAINT `fk_id_kategori_tendik` FOREIGN KEY (`id_kategori`) REFERENCES `m_kategori` (`id_kategori`),
  ADD CONSTRAINT `t_responden_tendik_ibfk_1` FOREIGN KEY (`id_survey`) REFERENCES `m_survey` (`id_survey`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
