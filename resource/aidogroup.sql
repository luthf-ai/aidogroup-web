-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 03:33 AM
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
-- Database: `aidogroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'luthfiaido123@gmail.com', '$2y$10$03YpV4RMYJJ796G7x6I7R.zKMHCWxMifhkGwfY5sRKNHl.H2PyNBe'),
(4, 'aidogroup', 'aidogroup2013@gmail.com', '$2y$10$iQjlcXx3NAWVUvMd2jysGOZYQ0V8XHl3TpPjkUwL10kh9SJg.fywm'),
(5, 'aido', 'aido.el.hakim@gmail.com', '$2y$10$iSr7wUVS7h5iOVxiUyr9pe24OBCUaNhRRzAuGfAWyMvru3Y1G0GlS');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `deskripsi`, `rating`, `kategori`, `gambar`) VALUES
(6, 'Paket Wedding 1', '• 120 File Photo • 120x 4R Cetak Photo • Free Cetak 3x 10rs • 1 orang Fotographer • Rp. 1.000.000,-', 5, 'Wedding Documentation', '63a789e5e376c.jpeg'),
(7, 'Paket Wedding 2', '• 160 File Photo • 160x 4R Cetak Photo • Free Cetak 4x 10rs • 1 orang Fotographer • Rp. 1.200.000,-', 5, 'Wedding Documentation', '63a78deba6763.jpg'),
(8, 'Paket Wedding 3', '• 120 File Photo • 120x 4R Cetak Photo • Free Cetak 3x 10rs • Video Cinematic 1-2 menit • 1 orang Fotographer • 1 orang Videographer • Rp. 1.500.000,-', 5, 'Wedding Documentation', '63a78e459e102.jpg'),
(9, 'Paket Wedding 4', '• 160 File Photo • 160x 4R Cetak Photo • Free Cetak 4x 10rs • Video Cinematic 1-2 menit • 1 orang Fotographer • 1 orang Videographer • Rp. 1.750.000,-', 0, 'Wedding Documentation', '63a78e7ba36b9.jpeg'),
(10, 'Wedding Premium 1', '• Cetak 120 foto 4r + album magazine • Cetak 12rs + Figura 2 • Unlimite Shoot • Video Reel (story) • Video Cinematic (2 - 3 Menit) • 2 orang Fotovideographer • 1 Flashdisk • Rp. 2.000.000,-', 5, 'Wedding Documentation', '63a78f7f966ec.jpg'),
(11, 'Wedding Premium 2', '• Album Magazine 21 Halaman • Exclusive Cover book • Cetak 100 - 120 photo • Cetak 12rs + Figura 1 • Unlimite Shoot • Video Liputan • Video Reel (story) • Video Cinematic (2 - 3 Menit) • 3 orang Fotovideographer • 1 Flashdisk • Rp. 3.000.000,-', 5, 'Wedding Documentation', '63a78f9b3c1bc.jpg'),
(12, 'Wedding Premium 3', '• Album Magazine 21 Halaman • Album magnetic 10sheet • Exclusive Cover book • Cetak 160 - 180 photo • Cetak 16rs + Figura 2 • Unlimite Shoot • Video Liputan • Video Reel (story) • Video Cinematic (2 - 3 Menit) • 3 orang Fotovideographer • 1 Flashdisk • Rp. 3.500.000,-', 5, 'Wedding Documentation', '63a78fb52c29d.jpg'),
(13, 'Prewedding Outdoor 1', 'Outdoor 1 • Cetak 16RS + Figura 1 • Edit 12 Foto hight resolution • Foto Secukupnya (60an) • Lokasi satu Propinsi (Tidak menginap) • Belum termasuk biaya masuk lokasi • Belum termasuk biaya Transportsi • Rp. 1.200.000,-', 5, 'Prewedding', '63a790774eacc.jpg'),
(14, 'Prewedding Outdoor 2', '• Cetak 16rs 2x + Figura • Edit 12 Foto hight resolution • Foto Secukupnya (60an) • Lokasi satu Propinsi (Tidak menginap) • Belum termasuk biaya masuk lokasi • Belum termasuk biaya Transportsi • Rp. 1.500.000,-', 5, 'Prewedding', '63a790cece0c4.jpg'),
(15, 'Prewedding Outdoor 3', '• Cetak 16rs 2x + Figura • Edit 12 Foto High resolution • Foto Secukupnya (60an) • Lokasi bebas • Tiket masuk lokasi dan biaya ditanggung client • Transportasi , akomodasi dan penginapan ditanggung client • Lebih dari satu hari tambah biaya 500 ribu perhari • Rp. 1.500.000,-', 5, 'Prewedding', '63a790ef86721.jpg'),
(16, 'Wisuda 2 (Personal)', '• Tempat di studio  • 4x pose photo  • 4 file edited • File dikirim dokumen WA • Rp. 40.000,-', 5, 'Graduation', '63a79187c3f9e.jpg'),
(17, 'Wisuda 1 (Kolektif)', '• 1 photo salaman • 1x photo di beckground Wisuda • 2 file high resolution • 1x cetak 4R • 1x cetak 10rs with orto • Rp. 25.000,-', 5, 'Graduation', '63a791efce7cf.jpg'),
(18, 'Beauty Shoot Studio', 'Photoshoot for Portofolio Mua, Rp. 300,000.-', 5, 'Photobooth', '63a7930ef0080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `deskripsi` varchar(512) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `judul`, `deskripsi`, `gambar`) VALUES
(1, 'Wedding Photography', 'Pernikahan adalah suatu momen teristimewa dalam hidup, abadikan momen tersebut dalam bentuk foto yang menyimpan kenangan indah anda dengan penuh ekspresi di dalamnya.', '1.jpeg'),
(4, 'Beauty Shoot', 'Beauty shoot merupakan sebuah kategori photography dimana kecantikan dari objek adalah tujuan utamanya, biasanya berupa close-up terhadap objek.', '3.jpeg'),
(5, 'Outdoor Photography', 'Bosen dengan foto indoor dengan background itu-itu aja?. Outdoor solusinya, manfaatkan pemandangan alam disekitar menjadikan foto kamu lebih seger, adem dan natural.', '63a72d4e06052.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
