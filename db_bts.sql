-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 07:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen_pengadaan`
--

CREATE TABLE `tbl_dokumen_pengadaan` (
  `id_dokumen_pengadaan` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_dokumen` text NOT NULL,
  `file_dokumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dokumen_pengadaan`
--

INSERT INTO `tbl_dokumen_pengadaan` (`id_dokumen_pengadaan`, `id_paket`, `nama_dokumen`, `file_dokumen`) VALUES
(2, 438, 'Erlangga', 'CamScanner_09-10-2022_11_14.pdf'),
(3, 437, 'Dokumen Pestaratan Tender', 'Skill_Pasport_Irgi_Fahlevi1.pdf'),
(4, 437, 'Undangan', 'CamScanner_09-10-2022_11_141.pdf'),
(5, 437, 'asdasd', 'CamScanner_09-10-2022_11_142.pdf'),
(6, 437, 'undangan', 'CamScanner_09-10-2022_11_143.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen_promosi_vendor`
--

CREATE TABLE `tbl_dokumen_promosi_vendor` (
  `id_promosi` int(11) NOT NULL,
  `nama_dokumen_promosi` text NOT NULL,
  `file_dokumen_promosi` text NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `status_promosi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dokumen_promosi_vendor`
--

INSERT INTO `tbl_dokumen_promosi_vendor` (`id_promosi`, `nama_dokumen_promosi`, `file_dokumen_promosi`, `id_vendor`, `id_paket`, `status_promosi`) VALUES
(4, 'asdasd', 'bandicam_2022-08-07_18-27-43-527.mp4', 3, 437, 1),
(5, 'Vendor saya Promosi', 'Skill_Pasport_Irgi_Fahlevi1.pdf', 3, 438, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen_syarat_vendor`
--

CREATE TABLE `tbl_dokumen_syarat_vendor` (
  `id_dokumen_syarat_vendor` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_dokumen` text NOT NULL,
  `file_dokumen` text NOT NULL,
  `status_persyaratan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dokumen_syarat_vendor`
--

INSERT INTO `tbl_dokumen_syarat_vendor` (`id_dokumen_syarat_vendor`, `id_paket`, `id_vendor`, `nama_dokumen`, `file_dokumen`, `status_persyaratan`) VALUES
(1, 438, 3, 'DOKUMEN VENDOR', 'Skill_Pasport_Irgi_Fahlevi1.pdf', 1),
(4, 437, 3, 'DOKUMEN ANGGA', 'Skill_Pasport_Irgi_Fahlevi2.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kualifkasi_tender`
--

CREATE TABLE `tbl_kualifkasi_tender` (
  `id_kualifikasi_tender` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_syarat_kualifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kualifkasi_tender`
--

INSERT INTO `tbl_kualifkasi_tender` (`id_kualifikasi_tender`, `id_paket`, `id_pegawai`, `nama_syarat_kualifikasi`) VALUES
(2, 438, 219, 'Syarat SNI Lengkap'),
(3, 437, 219, 'Memiliki Kualitas BTS lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_akses`
--

CREATE TABLE `tbl_log_akses` (
  `id_log_akses` int(11) NOT NULL,
  `waktu_login` date NOT NULL DEFAULT current_timestamp(),
  `alamat_ip` varchar(222) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log_akses`
--

INSERT INTO `tbl_log_akses` (`id_log_akses`, `waktu_login`, `alamat_ip`, `id_pegawai`) VALUES
(1, '2022-09-11', '::1', 219),
(2, '2022-09-11', '::1', 219),
(3, '2022-09-12', '::1', 219),
(4, '2022-09-12', '::1', 219),
(5, '2022-09-13', '::1', 219),
(6, '2022-09-14', '::1', 219),
(7, '2022-09-15', '::1', 219),
(8, '2022-09-18', '::1', 219),
(9, '2022-09-19', '::1', 219),
(10, '2022-09-21', '127.0.0.1', 219),
(11, '2022-09-22', '::1', 219),
(12, '2022-09-22', '::1', 219),
(13, '2022-09-22', '::1', 219),
(14, '2022-09-22', '::1', 218),
(15, '2022-09-22', '::1', 219),
(16, '2022-09-22', '::1', 218),
(17, '2022-09-22', '::1', 218),
(18, '2022-09-22', '::1', 220),
(19, '2022-09-22', '::1', 220),
(20, '2022-09-22', '::1', 220),
(21, '2022-09-22', '::1', 218),
(22, '2022-09-24', '::1', 218),
(23, '2022-09-24', '::1', 220);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `kode_rup_paket` varchar(225) NOT NULL,
  `nama_paket` varchar(225) NOT NULL,
  `program_paket` varchar(225) NOT NULL,
  `kualifikasi_usaha` varchar(225) NOT NULL,
  `sepesifikasi_paket` varchar(225) NOT NULL,
  `hps_total` int(11) NOT NULL,
  `kode_tender` varchar(200) NOT NULL,
  `status_paket_tender` int(11) NOT NULL,
  `status_tahap_tender` int(11) NOT NULL,
  `kode_tender_random` varchar(200) NOT NULL,
  `tanggal_buat_paket_tender` varchar(200) NOT NULL,
  `bobot_teknis` int(11) NOT NULL,
  `bobot_biaya` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `status_finalisasi_draft` int(11) NOT NULL,
  `penetapan_pemenang` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_vendor` varchar(255) NOT NULL,
  `tanggal_buat_rup` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_soft_delete` int(11) NOT NULL,
  `batas_pendaftaran` varchar(222) NOT NULL,
  `alasan_tender_batal` text NOT NULL,
  `lokasi_pekerjaan` text NOT NULL,
  `sumber_dana` varchar(222) NOT NULL,
  `uraian_pekerjaan_paket` text NOT NULL,
  `pembuat_paket` varchar(222) NOT NULL,
  `id_penyeleksi` int(11) NOT NULL,
  `tangal_selesai_tender` date NOT NULL DEFAULT current_timestamp(),
  `status_selesai_tender` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `kode_rup_paket`, `nama_paket`, `program_paket`, `kualifikasi_usaha`, `sepesifikasi_paket`, `hps_total`, `kode_tender`, `status_paket_tender`, `status_tahap_tender`, `kode_tender_random`, `tanggal_buat_paket_tender`, `bobot_teknis`, `bobot_biaya`, `id_pegawai`, `status_finalisasi_draft`, `penetapan_pemenang`, `token`, `token_vendor`, `tanggal_buat_rup`, `status_soft_delete`, `batas_pendaftaran`, `alasan_tender_batal`, `lokasi_pekerjaan`, `sumber_dana`, `uraian_pekerjaan_paket`, `pembuat_paket`, `id_penyeleksi`, `tangal_selesai_tender`, `status_selesai_tender`) VALUES
(438, '', 'paket erlangga', '2022', 'Kualifikasi Menengah (M2)', '', 3000000, '', 1, 1, 'BTS.100920220003', '', 0, 0, 1, 0, 0, '', '', '2022-09-15 11:37:33', 0, '', '', 'RAWAKALONG', 'paket erlangga', 'paket erlangga', 'Admin', 219, '2022-09-29', 0),
(437, '', 'paket bts', '2022', 'Kualifikasi Besar (B1)', '', 400000, '', 1, 1, 'BTS.100920220002', '', 0, 0, 1, 0, 0, '', '', '2022-09-22 06:02:05', 0, '', '', 'paket bts', 'paket bts', 'paket bts', 'Admin', 219, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_unit_kerja2` int(11) NOT NULL,
  `tanggal_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `otp_verifikasi` varchar(225) DEFAULT NULL,
  `tahun_kerja` varchar(222) NOT NULL,
  `bulan_kerja` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `username`, `password`, `alamat`, `telepon`, `email`, `jabatan`, `status`, `id_role`, `id_provinsi`, `id_kabupaten`, `id_unit_kerja2`, `tanggal_pendaftaran`, `otp_verifikasi`, `tahun_kerja`, `bulan_kerja`) VALUES
(218, 'Erlangga Pramuja Bts', '181011400337', 'erlangga', '$2y$10$/NIh7u5kH7648Yw2aj/pceiU9Vto55h0WA9Y3t229abaFkBLy1a6i', 'jl. kemajuan', '8978201075', 'anggapramuja0000@gmail.com', 'Karyawan', 1, 1, 0, 0, 0, '2022-09-23 17:29:34', '6280', '2', 4),
(219, 'Budi', '213123123', 'budi', '$2y$10$RrO2z0KTfzqeN3euxjv7tODT4HP46ih.LXgEqYbsbecJLpFRAVfLS', 'jl. kemajuan', '8978201075', 'anggapramuja0000@gmail.com', 'Pegawai', 1, 2, 0, 0, 0, '2022-09-22 06:49:55', '8217', '3', 3),
(220, 'Danang', '18101134678', 'danang', '$2y$10$aVgMyKgaCOing1vdO2e/sOFgZ8j8DWn0z8t6O7sbl6THyCK7Yl73W', 'jl. kemajuan', '8978201075', 'anggapramuja0000@gmail.com', 'Karyawan', 1, 8, 0, 0, 0, '2022-09-23 17:45:11', '1427', '6', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `kebutuhan` varchar(222) NOT NULL,
  `anggaran` varchar(222) NOT NULL,
  `lokasi` text NOT NULL,
  `penanggung_jawab` text NOT NULL,
  `keterangan` text NOT NULL,
  `sts_pengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `id_pegawai`, `kebutuhan`, `anggaran`, `lokasi`, `penanggung_jawab`, `keterangan`, `sts_pengajuan`) VALUES
(1, 220, 'TOWER BAGUS', '20000000', 'Rawakalong Gunng Sindur', 'Erlangga', 'KAMI INTA 5 tower', 2),
(2, 220, 'TOWER CINTA', '21000000', 'KALIDERES', 'DANANG', 'KEREN BANGET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengalaman_vendor`
--

CREATE TABLE `tbl_pengalaman_vendor` (
  `id_pengalaman` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_pekerjaan` varchar(222) NOT NULL,
  `pemberi_kerja` varchar(222) NOT NULL,
  `nomor_kontrak` varchar(222) NOT NULL,
  `tanggal_kontrak` date NOT NULL DEFAULT current_timestamp(),
  `nilai_kontrak` varchar(222) NOT NULL,
  `alamat_pekerjaan` text NOT NULL,
  `tanggal_mulai_pengalaman` date NOT NULL DEFAULT current_timestamp(),
  `tanggal_selesai_pengalaman` date NOT NULL DEFAULT current_timestamp(),
  `bukti_pengalaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengalaman_vendor`
--

INSERT INTO `tbl_pengalaman_vendor` (`id_pengalaman`, `id_vendor`, `nama_pekerjaan`, `pemberi_kerja`, `nomor_kontrak`, `tanggal_kontrak`, `nilai_kontrak`, `alamat_pekerjaan`, `tanggal_mulai_pengalaman`, `tanggal_selesai_pengalaman`, `bukti_pengalaman`) VALUES
(1, 3, 'Nama Pekerjaan', 'Erlangga', '91382/asdasd32/324234', '2022-09-22', '2000000', 'Kepulawan Seribu', '2022-09-14', '2022-09-16', 'Skill_Pasport_Irgi_Fahlevi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahan`
--

CREATE TABLE `tbl_perusahan` (
  `id_perusahaan` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_bentuk_usaha` varchar(222) NOT NULL,
  `nama_usaha` varchar(222) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `telepon_usaha` varchar(222) NOT NULL,
  `npwp` varchar(222) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_perusahan`
--

INSERT INTO `tbl_perusahan` (`id_perusahaan`, `id_vendor`, `nama_bentuk_usaha`, `nama_usaha`, `alamat_usaha`, `telepon_usaha`, `npwp`, `kode_pos`) VALUES
(3, 3, 'PT', 'PT TOWER INDONESIA', 'jln smpn 3 gunung sindur desa rawakalong rw 01 rw 11', '8978201075', '2341.2321.232', 16340);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rincian_hps`
--

CREATE TABLE `tbl_rincian_hps` (
  `id_rincian_hps` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` varchar(222) NOT NULL,
  `harga_rincian_hps` varchar(222) NOT NULL,
  `ppn` int(11) NOT NULL,
  `status_hps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rincian_hps`
--

INSERT INTO `tbl_rincian_hps` (`id_rincian_hps`, `id_paket`, `id_pegawai`, `deskripsi`, `jumlah`, `harga_rincian_hps`, `ppn`, `status_hps`) VALUES
(7, 438, 0, 'TOWER', '1', '1000000', 3, 1),
(9, 438, 0, 'ANTENA', '8', '200000', 2, 1),
(12, 437, 0, 'Tower', '23', '200000', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rincian_hps_vendor`
--

CREATE TABLE `tbl_rincian_hps_vendor` (
  `id_rincian_hps_vendor` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `deskripsi_vendor` text NOT NULL,
  `jumlah_vendor` int(11) NOT NULL,
  `harga_rincian_hps_vendor` varchar(222) NOT NULL,
  `ppn_vendor` varchar(222) NOT NULL,
  `status_hps_vendor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rincian_hps_vendor`
--

INSERT INTO `tbl_rincian_hps_vendor` (`id_rincian_hps_vendor`, `id_paket`, `id_vendor`, `deskripsi_vendor`, `jumlah_vendor`, `harga_rincian_hps_vendor`, `ppn_vendor`, `status_hps_vendor`) VALUES
(3, 438, 3, 'Tower', 10, '20000', '15', 1),
(4, 438, 3, 'ANTENA', 20, '100000', '10', 1),
(5, 437, 3, 'ANTENA', 5, '1000000', '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Penyeleksi'),
(8, 'Pengajuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tenaga_ahli`
--

CREATE TABLE `tbl_tenaga_ahli` (
  `id_tenaga_ahli` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_tenaga_ahli` varchar(222) NOT NULL,
  `nip` varchar(222) NOT NULL,
  `pendidikan` varchar(222) NOT NULL,
  `prodi` varchar(222) NOT NULL,
  `spesialis` text NOT NULL,
  `bukti_tenaga_ahli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tenaga_ahli`
--

INSERT INTO `tbl_tenaga_ahli` (`id_tenaga_ahli`, `id_vendor`, `nama_tenaga_ahli`, `nip`, `pendidikan`, `prodi`, `spesialis`, `bukti_tenaga_ahli`) VALUES
(1, 3, 'ERLANGGA', '181011400337', 'S1', 'Teknik Informatika', 'TOWER', 'Skill_Pasport_Irgi_Fahlevi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_undangan_pembuktian`
--

CREATE TABLE `tbl_undangan_pembuktian` (
  `id_undangan` int(11) NOT NULL,
  `nama_dokumen` text NOT NULL,
  `file_dokumen` text NOT NULL,
  `id_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_undangan_pembuktian`
--

INSERT INTO `tbl_undangan_pembuktian` (`id_undangan`, `nama_dokumen`, `file_dokumen`, `id_paket`) VALUES
(1, 'undangan pembuktian', 'Skill_Pasport_Irgi_Fahlevi.pdf', 437);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `id_vendor` int(11) NOT NULL,
  `username_vendor` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `nama_vendor` varchar(222) NOT NULL,
  `sts_vendor` int(11) NOT NULL,
  `alamat_vendor` text NOT NULL,
  `status` int(11) NOT NULL,
  `telepon_vendor` int(11) NOT NULL,
  `email_vendor` varchar(222) NOT NULL,
  `otp_verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`id_vendor`, `username_vendor`, `password`, `nama_vendor`, `sts_vendor`, `alamat_vendor`, `status`, `telepon_vendor`, `email_vendor`, `otp_verifikasi`) VALUES
(1, 'vendor_budi', '$2y$10$0Vmj9kkMPjOPo9SS.AIyh.arAr.RLuspVoUFKBeXim0GIXfdV3KvC', '', 0, 'jln Rawakalong', 1, 2147483647, 'anggapramuja0000@gmail.com', 2189),
(2, 'vendor_gilang', '$2y$10$6OErxz0tQFq8KRMBQXRn0O7ILnPgRU0flW2ecmHgZoJvr2UIGX/hK', '', 0, 'jln Kebagusan', 1, 89782764, 'anggapramuja0000@gmail.com', 0),
(3, 'vendor_budi2', '$2y$10$lv9xKz62wCG8PbinfX8HZOGxIWDqhI1W60sSxjaseil1Dai4aqqzy', '', 0, 'jln Mawar', 1, 123234456, 'anggapramuja0000@gmail.com', 4927);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor_mengikuti_paket`
--

CREATE TABLE `tbl_vendor_mengikuti_paket` (
  `id_mengikuti_paket` int(11) NOT NULL,
  `id_vendor_mengikuti` int(11) NOT NULL,
  `id_paket_mengikuti` int(11) NOT NULL,
  `status_mengikuti_paket` int(11) NOT NULL,
  `nilai_dokumen` int(11) NOT NULL,
  `nilai_promosi` int(11) NOT NULL,
  `nilai_tenaga_ahli` int(11) NOT NULL,
  `nilai_pengalaman` int(11) NOT NULL,
  `status_pemenang` int(11) NOT NULL,
  `nilai_penawaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vendor_mengikuti_paket`
--

INSERT INTO `tbl_vendor_mengikuti_paket` (`id_mengikuti_paket`, `id_vendor_mengikuti`, `id_paket_mengikuti`, `status_mengikuti_paket`, `nilai_dokumen`, `nilai_promosi`, `nilai_tenaga_ahli`, `nilai_pengalaman`, `status_pemenang`, `nilai_penawaran`) VALUES
(1, 3, 438, 1, 0, 0, 0, 0, 0, 0),
(3, 3, 437, 1, 40, 40, 80, 30, 1, 5500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokumen_pengadaan`
--
ALTER TABLE `tbl_dokumen_pengadaan`
  ADD PRIMARY KEY (`id_dokumen_pengadaan`);

--
-- Indexes for table `tbl_dokumen_promosi_vendor`
--
ALTER TABLE `tbl_dokumen_promosi_vendor`
  ADD PRIMARY KEY (`id_promosi`);

--
-- Indexes for table `tbl_dokumen_syarat_vendor`
--
ALTER TABLE `tbl_dokumen_syarat_vendor`
  ADD PRIMARY KEY (`id_dokumen_syarat_vendor`);

--
-- Indexes for table `tbl_kualifkasi_tender`
--
ALTER TABLE `tbl_kualifkasi_tender`
  ADD PRIMARY KEY (`id_kualifikasi_tender`);

--
-- Indexes for table `tbl_log_akses`
--
ALTER TABLE `tbl_log_akses`
  ADD PRIMARY KEY (`id_log_akses`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `nip` (`nip`),
  ADD KEY `user_id` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_unit_kerja2` (`id_unit_kerja2`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tbl_pengalaman_vendor`
--
ALTER TABLE `tbl_pengalaman_vendor`
  ADD PRIMARY KEY (`id_pengalaman`);

--
-- Indexes for table `tbl_perusahan`
--
ALTER TABLE `tbl_perusahan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tbl_rincian_hps`
--
ALTER TABLE `tbl_rincian_hps`
  ADD PRIMARY KEY (`id_rincian_hps`);

--
-- Indexes for table `tbl_rincian_hps_vendor`
--
ALTER TABLE `tbl_rincian_hps_vendor`
  ADD PRIMARY KEY (`id_rincian_hps_vendor`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_tenaga_ahli`
--
ALTER TABLE `tbl_tenaga_ahli`
  ADD PRIMARY KEY (`id_tenaga_ahli`);

--
-- Indexes for table `tbl_undangan_pembuktian`
--
ALTER TABLE `tbl_undangan_pembuktian`
  ADD PRIMARY KEY (`id_undangan`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indexes for table `tbl_vendor_mengikuti_paket`
--
ALTER TABLE `tbl_vendor_mengikuti_paket`
  ADD PRIMARY KEY (`id_mengikuti_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dokumen_pengadaan`
--
ALTER TABLE `tbl_dokumen_pengadaan`
  MODIFY `id_dokumen_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_dokumen_promosi_vendor`
--
ALTER TABLE `tbl_dokumen_promosi_vendor`
  MODIFY `id_promosi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dokumen_syarat_vendor`
--
ALTER TABLE `tbl_dokumen_syarat_vendor`
  MODIFY `id_dokumen_syarat_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kualifkasi_tender`
--
ALTER TABLE `tbl_kualifkasi_tender`
  MODIFY `id_kualifikasi_tender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_log_akses`
--
ALTER TABLE `tbl_log_akses`
  MODIFY `id_log_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengalaman_vendor`
--
ALTER TABLE `tbl_pengalaman_vendor`
  MODIFY `id_pengalaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_perusahan`
--
ALTER TABLE `tbl_perusahan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rincian_hps`
--
ALTER TABLE `tbl_rincian_hps`
  MODIFY `id_rincian_hps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_rincian_hps_vendor`
--
ALTER TABLE `tbl_rincian_hps_vendor`
  MODIFY `id_rincian_hps_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tenaga_ahli`
--
ALTER TABLE `tbl_tenaga_ahli`
  MODIFY `id_tenaga_ahli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_undangan_pembuktian`
--
ALTER TABLE `tbl_undangan_pembuktian`
  MODIFY `id_undangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vendor_mengikuti_paket`
--
ALTER TABLE `tbl_vendor_mengikuti_paket`
  MODIFY `id_mengikuti_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
