-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2016 at 11:28 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` char(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` decimal(4,0) NOT NULL,
  `kota_terbit` varchar(30) NOT NULL,
  `idfakultas` char(3) NOT NULL,
  `idprodi` char(5) NOT NULL,
  `stock` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `kota_terbit`, `idfakultas`, `idprodi`, `stock`) VALUES
('DK01', 'Ilmu Bedah Tradisional', 'Sri Ariani Soeparti', 'PT Elex Media', '2005', 'Serang', 'F01', 'FK01', 1),
('DK02', 'Intisari Mikrobiologi dan Penyakit Infeksi', 'HAWLEY, Louise B', 'Diros Pustaka', '2006', 'Surabaya', 'F01', 'FK01', 10),
('DK03', 'Kamus Istilah Kedokteran', 'DIFA, Danis', 'Erlangga', '2008', 'Jepara', 'F01', 'FK01', 5),
('DK04', 'Kedokteran dan Kegawatan Medik', 'TJOKRONEGORO, Arjatmo; MARKUM, Achmad Husen', 'JavaMedia', '2009', 'Bandung', 'F01', 'FK01', 4),
('DK05', 'Perkembangan terakhir Ilmu Kedokteran', 'HARJONO, M', 'JavaMedia', '2011', 'Semarang', 'F01', 'FK01', 7),
('DK06', 'Buku Ajar Ilmu Kedokteran Gigi Forensik, Jilid 1', 'LUKMAN, Djohansyah', 'Grasindo', '2010', 'Surakarta', 'F01', 'FK02', 0),
('DK07', 'Ilmu Penyakit Dalam untuk Profesi Kedokteran Gigi', 'BAYLEY, T.J; LEINSTER, S.J', 'PT Elex media', '2008', 'Jakarta', 'F01', 'FK02', 5),
('DK08', 'Buku Pintar Anatomi untuk Kedokteran Gigi', 'DIXON, Andrew Derart; YUWONO Lilian', 'Pramedia', '2008', 'Jakarta', 'F01', 'FK02', 3),
('DK09', 'Statistik Dasar untuk Ilmu Kedokteran dan Kesehatan Gigi', 'OETOJO, Imam', 'Pirac', '2008', 'Semarang', 'F01', 'FK02', 2),
('DK10', 'Kamus Kedokteran Gigi', 'HARTY, F.J; OGSTON, R.Suwinata', 'Pustaka Adina', '2009', 'Serang', 'F01', 'FK02', 3),
('DK11', 'Kamus Istilah Gizi', 'HARTY, F.J; OGSTON, R.Suwinata', 'Pustaka Adina', '2012', 'Malang', 'F01', 'FK03', 6),
('DK12', 'Prinsip-prinsip Ilmu Gizi', 'PARAKKASI, Aminuddin', 'PT Elex Media', '2008', 'Tegal', 'F01', 'FK03', 10),
('DK13', 'Ilmu Gizi Klinis pada Anak', 'PUDJIADI,Solihin', 'Grasindo', '2010', 'Wamena', 'F01', 'FK03', 10),
('DK14', 'Ilmu Gizi Komparatif', 'PRAWIROKUSUMO, Soeharto', 'JavaMedia', '2006', 'Aceh', 'F01', 'FK03', 0),
('DK15', 'Dasar-dasar Ilmu Gizi', 'BUDIYANTO, Moch. Agus Krisno ', 'Erlangga', '2009', 'Palembang', 'F01', 'FK03', 0),
('DK16', 'Registrasi dan Praktek Keperawatan', 'Menkes RI', 'Erlangga', '2013', 'Jakarta', 'F01', 'FK04', 1),
('DK17', 'Pengembangan Staf Keperawatan', 'SWANSBURG, Russell C.', 'Tiga Serangkai', '2009', 'Bandung', 'F01', 'FK04', 1),
('DK18', 'Methodologi Riset Keperawatan', '	NERSALAM, M. Nurs', 'Pirac', '2009', 'Demak', 'F01', 'FK04', 5),
('DK19', 'Prinsip-prinsip Sains untuk Keperawatan', 'JAMES, Joyce', 'Pramedia', '2009', 'Depok', 'F01', 'FK04', 2),
('DK20', 'Sains dalam keperawatan', 'CREE, Laurie', 'Diros Pustaka', '2009', 'Rembang', 'F01', 'FK04', 2),
('FISIP01', 'Mengenal Ilmu Pemerintahan', 'SURIANINGRAT, Bayu', 'Erlangga', '2005', 'Semarang', 'F08', 'FIB06', 3),
('FISIP02', 'Media Relations : Konsep, Pendekatan, dan Praktik', 'IRIANTO, Yosal', 'Simbiosa Rekatama Media', '2005', 'Semarang', 'F09', 'FSP01', 4),
('FISIP03', 'Connecting East Asia : a New Framework for Infrastructure', 'THE WORLD BANK GROUP', 'The World Bank', '2005', 'Toronto', 'F09', 'FSP04', 2),
('FKEB01', 'Statistika untuk Ekonomi dan Keuangan Modern, jilid 1', 'SUHARYADI; PURWANTO S.K', 'Salemba Empat', '2003', 'Semarang', 'F05', 'FEB01', 0),
('FKEB02', 'Statistika untuk Ekonomi dan Keuangan Modern, jilid 2', 'SUHARYADI; PURWANTO S.K', 'Salemba Empat', '2004', 'Semarang', 'F05', 'FEB01', 8),
('FKEB03', 'Akuntansi Lanjutan, jilid 1', 'BEAMS, Flody A.; ANTHONY, Joseph H.; CLEMENT, Robi', 'Indeks', '2007', 'Semarang', 'F05', 'FEB02', 10),
('FKEB04', 'Teori dan Soal-soal Akutansi I', 'CASHIN, James A.; JOEL J., Lerner', 'Erlangga', '1986', 'Semarang', 'F05', 'FEB02', 6),
('FKEB05', 'Engineering Economy', 'BLANK, Leland T; TARQUIN, Anthony', 'McGraw-Hill', '2002', 'London', 'F05', 'FEB03', 4),
('FKEB06', 'International Financial Management', 'EUN, Cheol S; RESNICK, Bruce G', 'McGraw-Hill', '2001', 'London', 'F05', 'FEB03', 0),
('FKH01', 'Segi Hukum Dana Pensiun', 'WAHAB, Ziulami', 'Rajawali Press', '2003', 'Semarang', 'F07', 'FH01', 2),
('FKH02', 'Hukum Penanaman Modal', 'ILMAR, Amirruddin', 'Kencana', '2004', 'Semarang', 'F07', 'FH01', 4),
('FKH03', 'Pengantar Hukum Telekomunikasi', 'JUDHARIKSAWAN', 'RajaGrafindo Persada', '2005', 'Semarang', 'F07', 'FH01', 5),
('FKH04', 'Aspek Hukum Internet Banking', 'RISWANDI, Budi Agus', 'RajaGrafindo Persada', '2005', 'Semarang', 'F07', 'FH01', 5),
('FKH05', 'Aspek-aspek Hukum Otonomi Daerah', 'MUSLIMIN, Amrah', 'Alumni', '1978', 'Semarang', 'F07', 'FH01', 2),
('FKIB01', 'Sastra Indonesia dan Tradisi sub Kultur', 'EASTEN, Mursal', 'Grasindo', '2003', 'Semarang', 'F08', 'FIB01', 1),
('FKIB02', 'Kamus Karya Sastra Perancis', 'BAHASOAN, Mardiani; GOBEL, Nurhayati Effendi T; HI', 'Erlangga', '2004', 'Semarang', 'F08', 'FIB03', 6),
('FKIB03', 'The Norton Anthology of English Literature: Rivised vol. 2', 'ABRAM, M.H', 'W.W. Noston', '1968', 'Northampton', 'F08', 'FIB05', 4),
('FKIB04', 'Kothekan Lesung Banarata', 'ASTONO, Sigit', 'Intra Pustaka Utama', '2005', 'Banarata', 'F08', 'FIB06', 7),
('FKIB05', 'Metodologi Penelitian Budaya Rupa', 'SACHARI, Agus; HARDANI, Wibi', 'Erlangga', '2005', 'Semarang', 'F08', 'FIB06', 8),
('FKIP01', 'Pengantar Psikologi Klinis', 'MARKAM, Suprapti Slamet I.S. Sumarno', 'UI Press', '2003', 'Jakarta', 'F11', 'FP01', 9),
('FKKM01', 'Pengantar Administrasi Kesehatan Masyarakat', 'BUDIORO B.', 'BP Undip', '1997', 'Semarang', 'F10', 'FKM03', 10),
('FKPP01', 'Pengembangan Peternakan Kodok Lembu di Indonesia', 'PUJANINGSIH, Retno Iswanrin', 'Fakultas Peternakan UNDIP', '2004', 'Semarang', 'F06', 'FPP01', 5),
('FKPP02', 'Pengembangan Peternakan Itik', 'PUJANINGSIH, Retno Iswanrin', 'Fakultas Peternakan UNDIP', '2001', 'Semarang', 'F06', 'FPP01', 2),
('FKPP03', 'Penggemukan Kambing Potong', '	MULYONO, Subangkit; SARWONO, B.', 'Penebar Swadaya', '2005', 'Semarang', 'F06', 'FPP01', 3),
('FKPP04', 'Pangan dan Kesehatan', 'RETNANINGSIH, Ch.', 'Unika Soegijopranoto', '2005', 'Semarang', 'F06', 'FPP04', 6),
('FKPP05', 'Pengantar Teknologi Pangan', 'WINARNO, F.G; FARDIAZ, Dedi', 'Penebar Swadaya', '2005', 'Semarang', 'F06', 'FPP04', 8),
('FKSM01', 'Kimia Organik', 'ACHMADI, Suminar Setiati', 'Erlangga', '2003', 'Semarang', 'F04', 'FSM01', 9),
('FKSM02', 'Ilmu Kimia untuk Universitas, jilid 1', 'KEENAN, Charles W., WOOD, Jesse H.', 'Erlangga', '1990', 'Semarang', 'F04', 'FPK06', 5),
('FKSM03', 'Pengantar Statistika', 'WALPOLE, Ronald E.', 'Gramedia', '1990', 'Semarang', 'F04', 'FSM02', 1),
('FKSM04', 'Probabilitas dan Statistika untuk Teknik dan Sains, jilid 1', 'HARAHAP, Zulkifli', 'Gramedia', '2002', 'Semarang', 'F04', 'FSM02', 0),
('FKSM05', 'Ekologi', 'EKO, E', 'Yayasan Obor Indonesia', '1988', 'Semarang', 'F04', 'FSM03', 5),
('FKSM06', 'Ichthyology', 'LAGLER, Karl F', 'McGraw-Hill', '1963', 'London', 'F04', 'FSM03', 0),
('FKSM07', 'Fisika Modern', 'KRANE, Kenneth S., NIKSOLIN, Sofia', 'UI Press', '1992', 'Jakarta', 'F04', 'FSM04', 0),
('FKSM08', 'Fisika Dasar', 'SOEDOJO, Peter', '	Andi', '2004', 'Semarang', 'F04', 'FSM04', 0),
('FKSM09', 'Matematika Diskrit, jilid 1 (ed. revisi)', 'KOKASIH, Iskandarsyah', 'Grasindo', '2002', 'Semarang', 'F04', 'FSM05', 1),
('FKSM10', 'Matematika Teknik, jilid 1 (ed. 5)', 'HARAHAP, Zulkifli', 'Erlangga', '2003', 'Semarang', 'F04', 'FSM05', 2),
('FKSM11', 'Mengolah File dengan PFS', 'WINARNO, Wing Wahyu', 'Elex Media', '1988', 'Semarang', 'F04', 'FSM06', 4),
('FKSM12', 'Tentang dBASE IV', 'COWART, Robert', 'Indomicros', '1989', 'Semarang', 'F04', 'FSM06', 5),
('FKSM13', 'Photoshop Artwork', 'PRATAMA, Adietya Hyde; EFFENDHY, Asep', 'MediaKita', '2012', 'Semarang', 'F04', 'FSM06', 10),
('FKSM14', 'Rahasia Teknik Pembuatan Virus Komputer', 'SYNOMADEUS; DENYZIP', 'Andi', '1997', 'Semarang', 'F04', 'FSM06', 9),
('FKT01', 'Quo vadis Arsitektur Perbankan Indonesia', 'DARURI, Ahmad Deni', 'Diros Pustaka', '2007', 'Malang', 'F02', 'FT01', 10),
('FKT02', 'Masalah Arsitektur, Perumahan, Perkotaan', 'BUDIHARJO, Eko', 'Erlangga', '2011', 'Ngawi', 'F02', 'FT01', 4),
('FKT03', 'Arsitektur Tradisional Daerah Jawa Barat', 'CREE, Laurie', 'Paramedia Pustaka', '2003', 'Cirebon', 'F02', 'FT01', 5),
('FKT04', 'Arsitektur Tradisional Daerah Lampung', 'CREE, Laurie', 'JavaMedia', '2010', 'Lampung', 'F02', 'FT01', 10),
('FKT05', 'Arsitektur Tradisional Daerah Jawa Tengah', 'CREE, Laurie', 'PT Elex Media', '2005', 'Cilacap', 'F02', 'FT01', 6),
('FKT06', 'Operasi Teknik Kimia. Jilid 1', 'MCCABE, Warren L; SMITH, Julian', 'PT Elex Media', '2009', 'Jakarta', 'F02', 'FT02', 4),
('FKT07', 'Operasi Teknik Kimia. Jilid 2', 'MCCABE, Warren L; SMITH, Julian', 'PT Elex Media', '2012', 'Jakarta', 'F02', 'FT02', 7),
('FKT08', 'Rekayasa Gempa : untuk Teknik Sipil', 'AGUS, M.', 'JavaMedia', '2005', 'Kediri', 'F02', 'FT03', 8),
('FKT09', 'Kamus teknik perkapalan', 'Soegiono', 'PT Elex Media', '2009', 'Surabaya', 'F02', 'FT04', 10),
('FKT10', 'Kamus istilah teknik perkapalan', 'Soegiono', 'PT Elex Media', '2007', 'Surakarta', 'F02', 'FT04', 4),
('FKT11', 'Teknik Analisis Radioktivitas Lingkungan', 'WARDHANA, Wisnu Arya', 'JavaMedia', '2009', 'Bogor', 'F02', 'FT05', 3),
('FKT12', 'Instrumentasi Elektronik dan Teknik Pengukuran', 'COOPER, William', 'Komputerindo', '2010', 'Jakarta', 'F02', 'FT06', 2),
('FKT13', 'Sistem Tenaga Listrik : Polusi dan Pengaruh Medan Elektromaknetik terhadap Kesehatan Manusia', 'BAAFAI, Usman Saleh', 'ElexMedia', '2009', 'Bandung', 'F02', 'FT06', 5),
('FKT14', 'Prinsip-prinsip Elektronik', 'MALVINO, Albert', 'Erlangga', '2011', 'Bandung', 'F02', 'FT06', 6),
('FKT15', 'Membuat Mesin Tetas Elektronik', 'KELLY, S', 'Mediafire', '2009', 'Surabaya', 'F02', 'FT06', 7),
('FKT16', 'Elektromagnetic Theory', 'THALWAR, S.P', 'Gramedia', '2012', 'Surakarta', 'F02', 'FT06', 10),
('FKT17', 'Aplikasi Elektromagnetik', 'LIANG, Chin Shen', 'Diros Pustaka', '2013', 'Surabaya', 'F02', 'FT06', 4),
('FKT18', 'Kamus Fisika : Elektromagnetika', 'WILARJO, Liek', 'Pustaka Ilmu', '2012', 'Sragen', 'F02', 'FT06', 3),
('FKT19', 'Elektronik Industri', 'PETRUZELLA, Frank D. ', 'Graha Ilmu', '2010', 'Brebes', 'F02', 'FT06', 5),
('FKT20', 'Komunikasi Elektronika', 'SARWAN, Suradi', 'Pustaka Belajar', '2008', 'Banyuwangi', 'F02', 'FT06', 7),
('FKT21', 'Mineralogy : A geologists point of view', 'HIBBARD, M. J.', 'Beta Offset', '2005', 'Boyolali', 'F02', 'FT07', 5),
('FKT22', 'Kamus Geologi', 'ANDU, Ronny', 'Erlangga', '2003', 'Bogor', 'F02', 'FT07', 9),
('FKT23', 'Volkanologi', 'BRONTO, Sutikno', 'Pustaka Belajar', '2009', 'Cianjur', 'F02', 'FT07', 1),
('FKT24', 'Spectrochemical Analysis', 'TAYLOR, S.R', 'Durenworks', '2011', 'Semarang', 'F02', 'FT07', 2),
('FKT25', 'Geologi Kelautan sebagai Tantangan Riset dan Eksplorasi Masa Depan', 'ZAIM, YuhdiSapiie', 'Gramedia', '2013', 'Yogyakarta', 'F02', 'FT07', 4),
('FKT26', 'Geodesi Satelit', 'ABIDIN, Hasanuddin', 'Pradnya Paramita', '2001', 'Makassar', 'F02', 'FT08', 3),
('FKT27', 'Berbagai Ilmu Ukur dalam Ilmu Geodesi', 'WONGSOTJITRO, Soetomo', 'Yayasan Kanisius', '1984', 'Semarang', 'F02', 'FT08', 7),
('FKT28', 'Ilmu geodesi tinggi 1', 'WONGSOTJITRO, Soetomo', 'Yayasan Kanisius', '1984', 'Semarang', 'F02', 'FT08', 6),
('FKT29', 'Physical Geodesy', 'HOFMANN - WELLENHOF, Bernhard, MORITZ, Helmut', 'Springer Wien New York', '2006', 'New York', 'F02', 'FT08', 9),
('FKT30', 'Bagaimana Meningkatkan Mutu Manajer', 'Dewan Pelatihan Industri Teknik', 'ElexMedia', '2009', 'Surabaya', 'F02', 'FT09', 6),
('FKT31', 'Strategi Bersaing : Teknik Menganalisis Industri dan Pesaing', 'Dewan Pelatihan Industri Teknik', 'Graha Ilmu', '2004', 'Sragen', 'F02', 'FT09', 3),
('FKT32', 'Mesin dan Peralatan Usaha Tani', 'SMITH, Harris P.', 'Grasindo', '2007', 'Bandung', 'F02', 'FT10', 2),
('FKT33', 'Mekanika Fluida, Termodinamika Mesin Turbo', 'Sutanto', 'Ganesha', '2004', 'Bogor', 'F02', 'FT10', 10),
('FKT34', 'Proses perencanaan Wilayah dan Kota', 'DJUNAEDI, Achmad', 'Gadjah Mada University Press', '2012', 'Yogyakarta', 'F02', 'FT11', 4),
('FKT35', 'Sumberdaya Manusia (Dosen) Untuk Perencanaan Wilayah dan Kota', 'JAYADINATA, Johara', 'Forum Nasional Pendidikan', '1996', 'Jepara', 'F02', 'FT11', 2),
('FPIK01', 'Pengantar Budidaya Perairan', 'REJEKI, Sri', 'Badan penerbit UNDIP', '2001', 'Semarang', 'F03', 'FPK01', 1),
('FPIK02', 'Pemanfaatan Sumberdaya Perikanan dan Kelautan', 'PRAYITNO, Slamet Budi', 'Badan penerbit UNDIP', '2001', 'Semarang', 'F03', 'FPK01', 0),
('FPIK03', 'Pengantar Ilmu Kelautan', 'WIBISONO, MS', 'Grasindo', '2005', 'Kudus', 'F03', 'FPK05', 5),
('FPIK04', 'Elements of Oceanography', 'WMcCORMICK, J. Michael', 'W.B. Saunders', '1974', 'Hannover', 'F03', 'FPK06', 5),
('FPIK05', 'Pengantar Oseanografi', 'HUTABARAT, Sahala', 'Grasindo', '2002', 'Semarang', 'F03', 'FPK06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `idpinjam` int(10) NOT NULL,
  `idbuku` char(10) NOT NULL,
  `tgl_kembali_real` date DEFAULT NULL,
  `denda` float(6,0) NOT NULL,
  `idpetugas` char(5) NOT NULL,
  `keterlambatan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`idpinjam`, `idbuku`, `tgl_kembali_real`, `denda`, `idpetugas`, `keterlambatan`) VALUES
(1, 'FKSM02', '2016-01-02', 3000, 'ptg01', 3),
(2, 'FKSM05', '2016-01-02', 3000, 'ptg01', 3),
(3, 'FKSM11', '2016-01-10', 0, 'ptg01', -9),
(4, 'FKSM09', '2016-01-10', 0, 'ptg01', -9);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `idfakultas` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`idfakultas`, `nama`) VALUES
('F01', 'Fakultas Kedokteran'),
('F02', 'Fakultas Teknik'),
('F03', 'Fakultas Perikanan dan Kelautan'),
('F04', 'Fakultas Sains dan Matematika'),
('F05', 'Fakultas Ekonomika dan Bisnis'),
('F06', 'Fakultas Peternakan dan Pertanian'),
('F07', 'Fakultas Hukum'),
('F08', 'Fakultas Ilmu Budaya'),
('F09', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
('F10', 'Fakultas Kesehatan Masyarakat'),
('F11', 'Fakultas Psikologi'),
('F12', 'Program Pascasarjana');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(14) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idfakultas` char(3) NOT NULL,
  `idprodi` char(5) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `idfakultas`, `idprodi`, `password`, `email`) VALUES
('24010013120043', 'Khikmah Nurani', 'F03', 'FPK', 'banteng', 'khikmah@undip.ac.id'),
('24010113140001', 'Dzulfikar Fauzi', 'F01', 'FK0', 'macan', 'dzulfikar@undip.ac.id'),
('24010211120003', 'Allam Naufal A P', 'F01', 'FK0', 'curut', 'allam@undip.ac.id'),
('24010312110005', 'Ilham Maulana', 'F01', 'FK0', 'keong', 'ilham@undip.ac.id'),
('24010411140007', 'Rike Yudiawati', 'F01', 'FK0', 'jangkrik', 'rike@undip.ac.id'),
('24010712120037', 'Ilham Tegar Faza', 'F03', 'FPK', 'badak', 'tegar@undip.ac.id'),
('24010813130039', 'Dimas Anugerah', 'F03', 'FPK', 'bajing', 'dimas@undip.ac.id'),
('24010911140041', 'Enggie Rahmawati', 'F03', 'FPK', 'bangau', 'enggie@undip.ac.id'),
('24011013140045', 'M Alvien Ghifari', 'F04', 'FSM', 'bebek', 'alvien@undip.ac.id'),
('24011112120009', 'Tika Nurdinda P', 'F02', 'FT0', 'lenggarangan', 'tika@undip.ac.id'),
('24011114140107', 'Fairuz', 'F10', 'FKM', 'kakatua', 'fairuz@undip.ac.id'),
('24011211130029', 'Vincent', 'F02', 'FT0', 'anjing', 'vincent@undip.ac.id'),
('24011212130105', 'Aisah Juliantri', 'F10', 'FKM', 'kadal', 'aisah@undip.ac.id'),
('24011310120101', 'Fauziyya Yusrika Rachma', 'F10', 'FKM', 'itik', '@undip.ac.id'),
('24011314120011', 'Alifia Nugrahani Sidhi', 'F02', 'FT0', 'manuk', 'alifia@undip.ac.id'),
('24012013140203', 'Rosa Ardiana', 'F10', 'FKM', 'semutmerah', 'rosasa@undip.ac.id'),
('24012113120097', 'Roqy Heidar', 'F09', 'FSP', 'iguana', 'roqy@undip.ac.id'),
('24012310140013', 'Imelsa Ika W', 'F02', 'FT1', 'hiu', 'imelsa@undip.ac.id'),
('24012313140103', 'Mardiono', 'F10', 'FKM', 'jerapah', 'mardiono@undip.ac.id'),
('24012410140031', 'Amin Nudin', 'F02', 'FT0', 'anoa', 'amin@undip.ac.id'),
('24012413130093', 'Deta Teguh Satriyo', 'FSP', 'P09', 'gurita', 'deta@undip.ac.id'),
('24012913140201', 'Kaifa Agna Zakkaha', 'F10', 'FKM', 'pussmeong', 'Kaifaagna@undip.ac.id'),
('24013011120109', 'Mariana Rusida Ulfah', 'F10', 'FKM', 'kalajengking', 'mariana@undip.ac.id'),
('24013213140095', 'Vian Febriane', 'F09', 'FSP', 'hamster', 'vian@undip.ac.id'),
('24013311120015', 'M Zain Y A', 'F02', 'FT1', 'lele', 'zain@undip.ac.id'),
('24013314130099', 'Febryheny Nurbasuki', 'F10', 'FKM', 'iwak', 'febryheny@undip.ac.id'),
('24013512130033', 'Arfan Firmansyah', 'F03', 'FPK', 'arwana', 'arfan@undip.ac.id'),
('24013613140069', 'Samsul Faruq', 'F06', 'FPP', 'capung', 'samsul@undip.ac.id'),
('24013713140067', 'Camara Aurela', 'F06', 'FPP', 'camar', 'camara@undip.ac.id'),
('24013813140065', 'Rizki Mubarok', 'F06', 'FPP', 'cacing', 'rizkim@undip.ac.id'),
('24013913140063', 'Yuni Arifani', 'F06', 'FPP', 'bunglon', 'yuni@undip.ac.id'),
('24014309140017', 'Dwi Islami Estri A', 'F02', 'FT0', 'cumi', 'dwi@undip.ac.id'),
('24014413140061', 'Naufal Perdana', 'F05', 'FEB', 'bison', 'naufal@undip.ac.id'),
('24014513140089', 'Zaesar Pandoyo', 'F09', 'FSP', 'gorila', 'zaesar@undip.ac.id'),
('24014613140059', 'Ali Mashunil', 'F05', 'FEB', 'beruang', 'ali@undip.ac.id'),
('24014614120035', 'Prasetyo Pamungkas', 'F03', 'FPK', 'ayam', 'prasetyo@undip.ac.id'),
('24014713140057', 'Ghaida Afra', 'F05', 'FEB', 'beo', 'ghaida@undip.ac.id'),
('24014813140053', 'Mulki Rosyadi Hidayat', 'F04', 'FSM', 'belibis', 'mulki@undip.ac.id'),
('24014913140055', 'Adnan Jafar', 'F04', 'FSM', 'belut', 'adnan@undip.ac.id'),
('24015113140085', 'M Assaidicky', 'F08', 'FIB', 'gajah', 'assaidicky@undip.ac.id'),
('24015213140087', 'Iin Isnaeni', 'F08', 'FIB', 'garuda', 'iin@undip.ac.id'),
('24015310120019', 'Herlangga', 'F02', 'FT0', 'urang', 'herlangga@undip.ac.id'),
('24015413140081', 'Anjarul Fauzi', 'F08', 'FIB', 'elang', 'anjarul@undip.ac.id'),
('24015513140079', 'Dinar Damara M', 'F08', 'FIB', 'domba', 'dinar@undip.ac.id'),
('24015613140077', 'Karina Oktaviani', 'F07', 'FH0', 'dara', 'karina@undip.ac.id'),
('24015713140075', 'Dwi Kusuma Ramdhani', 'F08', 'FIB', 'cupang', 'kusuma@undip.ac.id'),
('24015813140073', 'Maftuh Hanifa', 'F07', 'FH0', 'codot', 'maftuh@undip.ac.id'),
('24015913140071', 'Wahyu Tri Martia', 'F06', 'FPP', 'coro', 'wahyu@undip.ac.id'),
('24016013140091', 'Dian Ayu', 'F09', 'FSP', 'gurame', 'dian@undip.ac.id'),
('24016113140083', 'Dhony Setiawan', 'F08', 'FIB', 'gagak', 'dhony@undip.ac.id'),
('24016313140021', 'Fakhri Aldiya', 'F02', 'FT0', 'walang', 'fakhri@undip.ac.id'),
('24017314130023', 'Della Anisa', 'F02', 'FT0', 'kucing', 'della@undip.ac.id'),
('24017813140047', 'Agus Muslim', 'F04', 'FSM', 'bekantan', 'agus@undip.ac.id'),
('24018315120025', 'Heri Ade Nur A', 'F02', 'FT0', 'singa', 'heri@undip.ac.id'),
('24018713140049', 'Fandu Edu', 'F04', 'FSM', 'belalang', 'fandu@undip.ac.id'),
('24019113140051', 'Rizki Amalia Hidayati', 'F04', 'FSM', 'belatung', 'rizki@undip.ac.id'),
('24019312140027', 'Hilda Pratiwi', 'F02', 'FT0', 'angsa', 'hilda@undip.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idpinjam` int(10) NOT NULL,
  `nim` char(14) NOT NULL,
  `idpetugas` char(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_peminjaman` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`idpinjam`, `nim`, `idpetugas`, `tgl_pinjam`, `tgl_kembali`, `status_peminjaman`) VALUES
(1, '24010113140001', 'ptg01', '2015-12-16', '2015-12-30', 'T'),
(2, '24010113140001', 'ptg01', '2015-12-16', '2015-12-30', 'T'),
(3, '24010113140001', 'ptg01', '2016-01-05', '2016-01-19', 'T'),
(4, '24010113140001', 'ptg01', '2016-01-05', '2016-01-19', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `idpetugas` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`idpetugas`, `nama`, `email`, `password`, `kategori`) VALUES
('ptg01', 'Ariawan', 'ariawan24@gmail.com', 'ariawan24', 'aktif'),
('ptg02', 'Febriana', 'febriana22@gmail.com', 'febri22', 'aktif'),
('ptg03', 'Agus', 'agus156@gmail.com', 'agus156', 'aktif'),
('ptg04', 'Sunarto', 'sunarto99@gmail.com', 'sunarto99', 'baru'),
('ptg05', 'Abdul Salim', 'abdul2014@gmail.com', 'abdul2014', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idfakultas` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idprodi`, `nama`, `idfakultas`) VALUES
('FEB01', 'Ekonomi', 'F05'),
('FEB02', 'Akutansi', 'F05'),
('FEB03', 'Manajemen', 'F05'),
('FH01', 'Ilmu Hukum Umum', 'F07'),
('FH02', 'Ilmu Hukum Rimba', 'F07'),
('FIB01', 'Sastra Indonesia', 'F08'),
('FIB02', 'Sastra Jepang', 'F08'),
('FIB03', 'Sastra Perancis', 'F08'),
('FIB04', 'Sastra Jerman', 'F08'),
('FIB05', 'Sastra Inggris', 'F08'),
('FIB06', 'Ilmu Seni', 'F08'),
('FK01', 'Pendidikan Dokter', 'F01'),
('FK02', 'Pendidikan Dokter Gigi', 'F01'),
('FK03', 'Ilmu Gizi', 'F01'),
('FK04', 'Keperawatan', 'F01'),
('FKM01', 'Epidemiologi dan Penyakit Tropik', 'F10'),
('FKM02', 'Gizi Kesehatan Masyarakat', 'F10'),
('FKM03', 'Administrasi dan Kebijakan Kesehatan', 'F10'),
('FKM04', 'Biostatistik dan Kependudukan', 'F10'),
('FKM05', 'Kesehatan Lingkungan', 'F10'),
('FKM06', 'Keselamatan dan Kesehatan Kerja', 'F10'),
('FKM07', 'Pendidikan dan Kesehatan Ilmu Perilaku', 'F10'),
('FP01', 'Ilmu Psikologi', 'F11'),
('FPK01', 'Budidaya Perairan', 'F03'),
('FPK02', 'Manajemen Sumberdaya Perairan', 'F03'),
('FPK03', 'Pemanfaatan Sumberdaya Perikanan', 'F03'),
('FPK04', 'Teknologi Hasil Perikanan', 'F03'),
('FPK05', 'Ilmu Kelautan', 'F03'),
('FPK06', 'Oseanografi', 'F03'),
('FPP01', 'Peternakan', 'F06'),
('FPP02', 'Agroteknologi', 'F06'),
('FPP03', 'Agribisnis', 'F06'),
('FPP04', 'Tekonologi Pangan', 'F06'),
('FPP05', 'Pertanian', 'F06'),
('FSM01', 'Kimia', 'F04'),
('FSM02', 'Statistika', 'F04'),
('FSM03', 'Boilogi', 'F04'),
('FSM04', 'Fisika', 'F04'),
('FSM05', 'Matematika', 'F04'),
('FSM06', 'Informatika', 'F04'),
('FSP01', 'Ilmu Pemerintahan', 'F09'),
('FSP02', 'Administrasi Publik', 'F09'),
('FSP03', 'Administrasi Bisnis', 'F09'),
('FSP04', 'Komunikasi', 'F09'),
('FSP05', 'Hubungan Internasional', 'F09'),
('FT01', 'Teknik Arsitektur', 'F02'),
('FT02', 'Teknik Kimia', 'F02'),
('FT03', 'Teknik Sipil', 'F02'),
('FT04', 'Teknik Perkapalan', 'F02'),
('FT05', 'Teknik Lingkungan', 'F02'),
('FT06', 'Teknik Elektro', 'F02'),
('FT07', 'Teknik Geologi', 'F02'),
('FT08', 'Teknik Geodesi', 'F02'),
('FT09', 'Teknik Industri', 'F02'),
('FT10', 'Teknik Mesin', 'F02'),
('FT11', 'Teknik Perencanaan Wilayah dan Kota', 'F02'),
('S01', 'Penelitian dan Evaluasi Pendidikan', 'F12'),
('S02', 'Pendidikan Teknologi dan Kejujuran', 'F12'),
('S03', 'Manajemen Pendidikan', 'F12'),
('S04', 'Pendidikan Luar Sekolah', 'F12'),
('S05', 'Pendidikan Ilmu Sosial', 'F12'),
('S06', 'Pendidikan Sastra Anak', 'F12'),
('S07', 'Linguistik Terapan', 'F12'),
('S08', 'Teknologi Pembelajaran', 'F12'),
('S09', 'Pendidikan Sains', 'F12'),
('S10', 'Pendidikan Ilmu Seni Murni', 'F12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`idpinjam`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`idfakultas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idpinjam`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`idpetugas`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `idpinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idpinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
