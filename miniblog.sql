-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.byetcluster.com
-- Generation Time: Oct 25, 2020 at 03:03 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27039659_miniblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(128, 'Politik'),
(130, 'Olahraga'),
(131, 'Pendidikan'),
(134, 'Kesehatan'),
(137, 'COVID 19'),
(144, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idcomment` int(11) NOT NULL,
  `idpenulis` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idcomment`, `idpenulis`, `idpost`, `name`, `email`, `comment`, `tgl_update`) VALUES
(34, 62, 38, 'sheilavirginia', 'svirginia246@gmail.com', 'keren banget', 1603537924),
(33, 62, 38, 'dimaspndw', 'dimaspndw@gmail.com', 'waah', 1603537813),
(32, 60, 37, 'danang', 'danang@gmail.com', 'Waaahhh covid ', 1603533941),
(35, 61, 39, 'rachel', 'racheliaptradr@gmail.com', 'wihhh mantap banget', 1603537988),
(36, 60, 37, 'sheilavirginia', 'svirginia246@gmail.com', 'waaaaw', 1603538140),
(37, 61, 39, 'hello', 'hello@gmail.com', 'hello', 1603584151);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `isi_post` text NOT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `tgl_insert` int(30) NOT NULL,
  `tgl_update` int(30) NOT NULL,
  `idpenulis` int(11) NOT NULL,
  `read` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `judul`, `idkategori`, `isi_post`, `file_gambar`, `tgl_insert`, `tgl_update`, `idpenulis`, `read`) VALUES
(39, 'VOICE TWEET, FITUR BARU DARI TWITTER', 144, '<p>Selama ini, Twitter hanya bisa digunakan untuk mengunggah teks, foto, video, dan GIF saja. Kini, Twitter meluncurkan fitur baru yang bisa membuat penggunanya melakukan rekaman suara sebagai tweet. Fitur baru ini dibuat sebagai alternatif apabila batasan 280 karakter yang disediakan tidak cukup bagi para pengguna. Durasi dari rekaman suara ini adalah 140 detik. Jika melebihi batas waktu tersebut, maka Twitter akan otomatis membuat sebuah utas (thread). Fitur uji coba ini baru bisa dirasakan oleh beberapa pengguna iOS yang beruntung.</p><p>Untuk langkah-langkah memakai fitur baru tersebut adalah sebagai berikut:<br />1. Pilih ikon + seperti membuat tweet pada biasanya<br />2. Jika anda melihat ikon gelombang suara maka anda termasuk pengguna yang bisa mencoba fitur ini. Tuliskan dulu beberapa kata untuk cuitan kemudian klik pada ikon tersebut untuk merekam suara anda.<br />3. Tekan tombol play untuk merekam suara. Setelah itu, tekan tombol stop apabila ingin menghentikan rekaman suara.<br />4. Tekan tombol done/ selesai.<br />5. Yang terakhir tinggal menunggu proses unggahan tweet selesai. Jika sudah maka tweet akan muncul otomatis di Home. Utas (thread) akan dibuat apabila rekaman suara lebih dari 140 detik.</p><p>&nbsp;</p><p>Caranya cukup mudah, kan? Bagi yang penasaran bagaimana tampilan dari fitur terbaru ini, ada di foto ya!&nbsp;</p>', 'VoiceCompose_png_img_fullhd_medium.png', 1603537859, 1603537859, 61, 24),
(41, ' LeBron James membuat sejarah, memenangkan MVP Final dengan 3 waralaba berbeda', 130, '<p>James dinobatkan sebagai Finals MVP setelah Los Angeles Lakers mengalahkan Miami Heat dengan kemenangan 106-93 di Game 6. Dengan demikian, James menjadi pemain pertama dalam sejarah NBA yang dinobatkan sebagai Finals MVP dengan tiga waralaba berbeda. Dia berada dalam performa terbaiknya dalam menentukan Game 6, menyelesaikan dengan 28 poin, 14 rebound dan 10 assist dan memenangkan MVP Final dengan suara bulat 11-0.</p><p>Di Final 2020, James rata-rata mencetak 29,8 poin, 11,8 rebound, dan 8,5 assist per game. Gelar Lakers adalah yang pertama sejak 2010, ketika ikon franchise Kobe Bryant mengumpulkan penghargaan MVP Final dalam perjalanan ke LA mengalahkan saingannya Boston Celtics di Game 7. Secara keseluruhan, ini adalah kejuaraan ke-17 dalam sejarah Lakers, mengikat mereka dengan Celtics paling banyak. dalam sejarah NBA.</p><p>&nbsp;</p>', 'lebron.jpg', 1603558449, 1603558449, 65, 16),
(37, 'Vaksin Covid 20', 137, '<p>Penulis Ahmad Naufal Dzulfaroh | Editor Jihad Akbar KOMPAS.com-&nbsp;Pemerintah berencana memulai vaksinasi virus corona&nbsp;massal pada awal bulan November 2020. Diberitakan Kompas.com, 15 Oktober 2020, Koordinator Bidang Kemaritiman dan Investasi Luhut Binsar Pandjaitan mengungkapkan sekitar 6,6 juta dosis vaksin dari China tiba di Indonesia bulan depan. Vaksin yang dipesan itu adalah produksi Sinovac, G42/Sinopharm, CanSino Biologics. Terkait rencana tersebut, Epidemiolog Griffith University, Dicky Budiman, mengingatkan vaksinasi baru bisa dilakukan setelah mendapat kepastian lulus uji fase tiga secara sempurna. Sebab, uji coba vaksin virus corona secara sempurna akan memberikan jaminan keamanan, bahwa vaksin tersebut memiliki manfaat lebih besar daripada risiko atau efek sampingnya. &quot;Aspek keamanan itu syarat wajib yang tidak bisa diabaikan, karena vaksin ini akan diberikan pada orang sehat,&quot; kata Dicky saat dihubungi Kompas.com, Jumat (23/10/2020). Baca juga: Vaksinasi Corona Ditargetkan November, Ini 5 Rekomendasi PB IDI &quot;Saat ini belum ada satu pun vaksin di dunia ini yang memenuhi aspek keamanan, dan selesai uji coba fase tiganya,&quot; lanjutnya. Menurutnya, vaksinasi dengan menggunakan mekanisme emergency use authorization (EUA) tetap tak boleh mengabaikan aspek keamanan. Setidaknya, harus ada bukti awal atau bukti yang ada sudah cukup untuk memberikan jaminan keamanan. Dicky mengatakan, vaksinasi yang tidak memiliki argumentasi ilmiah kuat dalam aspek keamanan berdasarkan pengujian, maka akan berisiko besar. &quot;Ingat, walaupun sekecil apa pun jumlah orang yang mengalami efek samping, tentu itu akan memiliki efek luar biasa dalam hal keberhasilan program vaksinasi,&quot; terang dia. Baca juga: Virus Corona dan Meninggalnya Relawan Uji Vaksin Covid-19 AstraZeneca... Dengan kondisi demikian, Dicky menilai pemberian vaksinasi di Indonesia bulan depan terkesan terburu-buru. Ia menjelaskan, salah satu kriteria emergency use adalah kondisi pandemi yang tak bisa dikendalikan, meski telah memaksimalkan strategi testing, tracing, dan treating (3T). &quot;Jelas ini selain tidak ada argumentasi ilmiah yang kuat, juga terburu-buru. Motifnya juga apa, karena kita saat ini belum melakukan 3T dan 3M secara maksimal,&quot; jelas dia. &quot;Ya tentu harus dilakukan itu dulu sebelum vaksin dinyatakan aman, jadi jangan tergesa-gesa,&quot; tambahnya. Baca juga: Rekam Jejak Upaya Penemuan Vaksin Covid-19 dan Tahapan yang Dilalui Dibandingkan terburu-buru memberikan vaksinasi, Dicky menganggap pemerintah terlebih dahulu harus memperbaiki strategi 3T. Pasalnya, keberhasilan vaksinasi juga tergantung pada keberhasilan 3T. &quot;Setidaknya dilakukan secara memadai, lebih bagus jika optimal, sehingga sambil menunggu vaksinasi, kita bisa mengendalikan angka infeksi dan kematian serta mendukung program vaksinasi itu sendiri,&quot; tutup dia.<br /><br />Artikel ini telah tayang di&nbsp;<a href=\"https://www.kompas.com/\">Kompas.com</a>&nbsp;dengan judul &quot;Rencana Vaksinasi November, Epidemiolog: Belum Ada Vaksin Corona yang Penuhi Aspek Keamanan&quot;, Klik untuk baca:&nbsp;<a href=\"https://www.kompas.com/tren/read/2020/10/24/062900765/rencana-vaksinasi-november-epidemiolog--belum-ada-vaksin-corona-yang-penuhi?page=all\">https://www.kompas.com/tren/read/2020/10/24/062900765/rencana-vaksinasi-november-epidemiolog--belum-ada-vaksin-corona-yang-penuhi?page=all</a>.<br />Penulis : Ahmad Naufal Dzulfaroh<br />Editor : Jihad Akbar<br /><br />&nbsp;</p>', 'covid2.jpg', 1603530002, 1603534299, 60, 12),
(38, 'Cara Lain Mengatasi Maag ', 134, '<p>Hal yang sering dialami oleh beberapa orang adalah menderita sakit maag. Ada beberapa cara lain dalam mengatasi maag selain dengan obat medis. Apa saja ya?? Yuk kita bahas satu persatu</p><p><strong>1. Ubah Kebiasaan</strong></p><p>Banyak kebiasaan positif yang perlu diterapkan untuk mengatasi maag yaitu dengan tidak merokok, rajin berolahraga, istirahat dahulu setelah makan (tidak langsung melakukan aktivitas berat atau olahraga), tidak mengkonsumsi obat-obatan yang menyebabkan iritasi lambung.</p><p><strong>2. Mengendalikan&nbsp;Stress</strong></p><p>Maag bisa juga kambuh disebabkan oleh stress, oleh karena itu, biasanya dokter akan menyarankang untuk melakukan relaksasi, meditasi atau hal lainnya seperti konselin yang dapat membuat penderita menjadi lebih tenang. Selain itu, jika disebabkan oleh masalah psikologis yang serius, biasanya dokter akan menyarankan penderita untuk menjalani psikoterapi dan mengonsumsi obat-obatan yang berhubungan dengan masalah tersebut.</p><p>Oleh sebab itu, alangkah lebih baiknya jika penderita maag mengunjungi dokter jika menderita maag dan tidak kunjung sembuh hingga lebih dari 2 minggu agar mendapatkan penanganan yang tepat dan tidak menjadi semakin parah.</p><p><strong>3. Mengatur Pola Makan</strong></p><p>Untuk mengatasi maag, penderita disarankan mengonsumsi makanan dalam porsi kecil, namun lebih sering. Biasakan juga untuk tidak langsung berbaring setelah makan dan tunggu setidaknya 2&ndash;3 jam sebelum berbaring.</p><p>Selain itu, hindari mengonsumsi makanan pedas dan makanan yang terlalu asam, seperti tomat dan jeruk. Hindari pula minuman bersoda, kafein, dan minuman beralkohol, serta makanan pemicu sakit maag seperti cokelat dan mint.</p><p>&nbsp;</p><p>-referensi : alodokter-</p>', 'maag.jpg', 1603537064, 1603537064, 62, 17);

-- --------------------------------------------------------

--
-- Table structure for table `rating_penulis`
--

CREATE TABLE `rating_penulis` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `rating` decimal(4,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating_penulis`
--

INSERT INTO `rating_penulis` (`id`, `iduser`, `rating`) VALUES
(6, 50, '0.0'),
(7, 51, '105.0'),
(9, 53, '1.0'),
(11, 55, '0.0'),
(12, 56, '0.0'),
(13, 57, '0.0'),
(14, 58, '0.0'),
(15, 59, '0.0'),
(16, 60, '12.0'),
(17, 61, '14.0'),
(18, 62, '10.0'),
(19, 63, '0.0'),
(20, 65, '14.0'),
(21, 66, '0.0'),
(22, 67, '0.0');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `iduser`, `testimoni`) VALUES
(1, 51, 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn'),
(2, 53, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(3, 55, ''),
(4, 56, 'qqqqqqqqqq qqqqqqqqqq qqqqqqqqqq qqqqqqqqqq qqq'),
(5, 57, ''),
(6, 58, ''),
(7, 59, ''),
(8, 60, 'Blognya sangat bagus sekali, dan sangat enak untuk menulis'),
(9, 61, ''),
(10, 62, ''),
(11, 63, ''),
(12, 65, ''),
(13, 66, ''),
(14, 67, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `ava` varchar(255) NOT NULL,
  `role` enum('admin','penulis') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telp`, `alamat`, `city`, `ava`, `role`) VALUES
(64, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '087676522618', 'INDONESIA', 'WONOGIRI', 'DSCN6251.JPG', 'admin'),
(63, 'Shelyana Wulandari', 'd3a60f39c92549fc2869cd762be9c83c', 'shellyana.wulandary@gmail.com', '082338991470', 'Bugelan kismantoro', 'Wonogiri', '', 'penulis'),
(62, 'rachel', '8e73b27568cb3be29e2da74d42eab6dd', 'racheliaptradr@gmail.com', '081228543805', 'pati', 'pati', 'jessie.jpg', 'penulis'),
(61, 'sheilavirginia', '8a586dd5feceded67e4442ef2101f2a9', 'svirginia246@gmail.com', '081343479499', 'Gajah Mungkur', 'Semarang', '4.jpg', 'penulis'),
(60, 'dimaspndw', '815153fefafe133673467b2355bdebad', 'dimaspndw@gmail.com', '083108326160', 'Wonogiri', 'Solo', 'bg_1.jpg', 'penulis'),
(65, 'Rezza Aldy', 'b02dd1f9ddf82871026edd1786c47ed3', 'wanjadyy@gmail.com', '085884711764', 'jalan banjarsari', 'semarang', '', 'penulis'),
(66, 'hello', '5d41402abc4b2a76b9719d911017c592', 'hello@gmail.com', '08888888', 'tembalang', 'semarang', '', 'penulis'),
(67, 'Mahocan', 'd3f49b9330f66252c40a15aaf275363a', 'begitu_banyak@gmai.com', '0246720', 'Jl. Genshin Impact 1 Isekai Jaya', 'Rock Bottom', '', 'penulis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idpenulis` (`idpenulis`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `idpenulis` (`idpenulis`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indexes for table `rating_penulis`
--
ALTER TABLE `rating_penulis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rating_penulis`
--
ALTER TABLE `rating_penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
