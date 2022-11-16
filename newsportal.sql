CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Health'),
(2, 'Technology'),
(3, 'Sports'),
(4, 'Education'),
(5, 'FnB'),
(6, 'Politics'),
(7, 'Automotive'),
(8, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `commentDate` date NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `postId`, `commentDate`, `comment`) VALUES
(1, 1, 7, '2021-10-10', 'Mantap...'),
(2, 2, 2, '2021-10-11', 'Ga sabar deh buat makai Windows 11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `postTitle` varchar(255) NOT NULL,
  `postAuthor` varchar(255) NOT NULL DEFAULT '''Secret Author''',
  `categoryId` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `publishDate` date NOT NULL,
  `postPicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postAuthor`, `categoryId`, `content`, `publishDate`, `postPicture`) VALUES
(1, 'Teluk Jakarta Tercemar Paracetamol, Ini Cara Membuang Obat yang Benar', 'Mahardini Nur Afifah', 1, 'KOMPAS.com - Wilayah Teluk Jakarta tercemar paracetamol atau parasetamol. Fakta pencemaran lingkungan ini dibeberkan studi High Concentrations of Paracetamol in Effluent Dominated Waters of Jakarta Bay, Indonesia di jurnal Science Direct, Agustus 2021. Perlu diketahui, paracetamol atau dikenal dengan acetaminophen adalah obat penghilang rasa sakit yang sering digunakan untuk menghilangkan nyeri dan menurunkan demam. Baca juga: Dua Kemungkinan Asal Kandungan Parasetamol di Teluk Jakarta Menurut data di Badan Pengawas Obat dan Makanan (BPOM), sedikitnya ada 120 obat mengandung paracetamol yang telah mengantongi izin edar. Paracetamol juga dikenal dengan nama lain acetaminophen atau asetaminofen. Penyebab Teluk Jakarta tercemar paracetamol Melansir Kompas.com, Minggu (3/10/2021), Kepala Pusat Penelitian Oseanografi Lembaga Ilmu Pengetahuan Indonesia (LIPI) Zainal Arifin menduga, penyebab Teluk Jakarta tercemar paracetamol disebabkan konsumsi pacetamol berlebihan di masyarakat, rumah sakit, serta industri farmasi. Dapatkan informasi, inspirasi dan insight di email kamu. Daftarkan email Menurut Zainal, paracetamol adalah obat bebas yang bisa dibeli masyarakat tanpa resep dokter. Obat yang dikonsumsi tersebut akan dikeluarkan lewat cairan seni dan kotoran buang air besar lewat limbah. Apabila pengelolaan sanitasi limbah tidak bagus atau tanpa tangki septik memadai, limbah rumah tangga ini bisa sampai ke sungai dan mengalir ke laut. Pengelolaan limbah farmasi yang tidak tepat di lingkup penyedia layanan kesehatan dan industri farmasi juga rentan menjadi penyebab pencemaran. Seperti limbah di lingkup rumah tangga, limbah farmasi juga bisa masuk ke perairan, mengalir ke sungai, dan bermuara di laut. Untuk meminimalkan pencemaran lingkungan dan masalah kesehatan lainnya, peneliti menyarankan agar pemerintah memperhatikan penggunaan paracetamol. Selain itu, manajemen pengelolaan limbah obat dan farmasi juga perlu dibenahi. Baca juga: Kenali Apa itu Obat Paracetamol, Fungsi, Efek Sampingnya Cara membuang obat yang benar agar tidak menjadi limbah farmasi Pengelolaan limbah farmasi seperti obat paracetamol di layanan kesehatan perlu menggunakan standar limbah B3. Sebagian obat seperti paracetamol bisa menjadi limbah farmasi karena rusak, kedaluwarsa, obat tidak dihabiskan oleh pasien, perubahan terapi obat, atau masalah penyimpanan obat. Oleh karenanya, manajemen limbah farmasi khususnya yang ditimbulkan harus dilakukan dengan baik dan hati-hati. Menurut Organisasi Kesehatan Dunia (WHO), cara membuang obat yang benar agar tidak mencemari lingkungan dan membahayakan kesehatan, yakni: Obat dikembalikan ke produsen atau pabrik Obat rusak, bekas, dan kedaluwarsa sebaiknya dikembalikan ke produsen atau perusahaan obat agar tidak terjadi penyalahgunaan obat Sebelum dibuang ke tempat pembuangan akhir (TPA) sampah, obat sudah dipisahkan dari kapsul dan dibakar menggunakan insinerator Obat rusak, bekas, atau kedaluwarsa digerus, lalu dituang ke dalam drum dan dicampurkan dengan dengan semen atau campuran kapur, plastik busa, dan pasir. Setelah itu, drum ditutup rapat, baru dibuang ke TPA Baca juga: 5 Cara Membuang Obat yang Benar menurut BPOM Cara membuang obat yang benar di rumah Selain penyedia layanan kesehatan, masyarakat juga perlu jeli dalam membuang obat yang sudah tidak digunakan seperti paracetamol. Cara membuang obat yang benar bersama dengan sampah rumah tangga lainnya, yakni: Keluarkan obat dari bungkusnya Hancurkan obat agar bentuknya tidak utuh Campurkan obat dengan ampas kopi, tanah, atau bahan lainnya Simpan obat yang sudah dicampur di atas ke dalam wadah yang bisa ditutup dan tidak tumpah, misalkan botol plastik bekas, kaleng, atau wadah lainnya Buang wadah berisi campuran obat dan sudah tertutup rapat ke tempat sampah di rumah Jangan membuang obat bekas pakai seperti paracetamol secara langsung ke tempat sampah atau saluran pembuangan air. Selain itu, hindari membakar obat di bak sampah atau tempat pembakaran sampah karena bisa melepaskan zat berbahaya ke udara.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Teluk Jakarta Tercemar Paracetamol, Ini Cara Membuang Obat yang Benar\", Klik untuk baca: https://health.kompas.com/read/2021/10/04/170100368/teluk-jakarta-tercemar-paracetamol-ini-cara-membuang-obat-yang-benar?page=all#page2.\r\nPenulis : Mahardini Nur Afifah\r\nEditor : Mahardini Nur Afifah', '2021-04-10', 'post1.jpg'),
(2, 'Windows 11 Tersedia Mulai Hari Ini dan Gratis, Begini Cara Download-nya', '\'Secret Author\'', 2, 'KOMPAS.com - Beberapa bulan lalu, Microsoft mengumumkan Windows 11, sistem operasi teranyar penerus Windows 10. Sistem operasi tersebut mulai tersedia hari ini Selasa (5/10/2021) dan dapat diunduh secara cuma-cuma.  \"Hari ini menandai tonggak sejarah Windows. Pada 5 Oktober di setiap zona waktu di seluruh dunia, Windows 11 mulai tersedia melalui update gratis di Windows 10 yang memenuhi syarat,\" tulis Panos Panay, Chief Product Officer, Windows + Devices. Selain melalui update gratis, Panay juga mengatakan Windows 11 sudah dapat dibeli untuk PC atau perangkat komputer baru. \"Kami bersemangat meluncurkan Windows 11, seluruh pengalaman pengguna membawa Anda lebih dekat dengan apa yang Anda dan menginspirasi Anda untuk berkreasi,\" lanjut Panay. Sebelumnya, Microsoft sendiri telah merilis versi beta untuk Windows 11 pada awal Agustus lalu. Microsoft mengumumkan, pengguna Windows 10 resmi akan mendapatkan upgrade ke Windows 11 secara gratis. Windows 11 juga akan terpasang di perangkat yang dijual dengan pre-load Windows 11 . Baca juga: Antarmuka Baru Windows 11 Bisa Dijajal lewat Browser, Begini Caranya Dapatkan informasi, inspirasi dan insight di email kamu. Daftarkan email Bagi pengguna Windows 10, notifikasi ketersediaan Windows 11 akan dimunculkan di menu Windows Update. Jika belum tersedia, kemungkinan update ini digelontorkan secara bertahap. Berikut adalah langkah-langkah yang perlu dilakukan untuk men-download Windows 11 secara gratis. Cara download Windows 11 Pertama, buka menu pengaturan \"Settings\" melalui perangkat komputer Anda (PC Desktop/Laptop). Kemudian, pilih \"Pembaruan Windows/Update Windows\". Selanjutnya, klik \"Periksa Pembaruan\". Jika update tersedia, Anda akan melihat opsi \"Pembaruan Fitur ke Windows 11\". Untuk mengunduh update Windows 11, klik \"Download/Unduh dan Install\" pada menu yang tersedia. Setelah itu, tunggu hingga proses instalasi Windows 11 selesai. Sebelumnya, Microsoft mengumumkan, CPU yang mendukung Windwos 11 adalah Intel generasi 8 atau yang lebih baru. Namun, belakangan Microsoft mengatakan bahwa ada solusi yang bisa digunakan untuk menginstal Windows 11 untuk perangkat lama. PC dengan CPU lama yang tidak lolos uji pembaruan secara resmi, bisa meng-install Windows 11 secara manual lewat file ISO. Metode ini bisa dilakukan selama PC memiliki CPU 64-bit dual core, kecepatan minimal 1 GHz. Perangkat juga harus memiliki RAM 4 GB dan ruang penyimpanan 64 GB, serta chip TPM 1.2. Baca juga: Spesifikasi Mininum Windows 11 Diubah, Tak Bisa Jalan di CPU AMD Ryzen Lawas Namun, jika perangkat lama dengan kondisi tersebut memaksa upgrade ke Windows 11, perangkat tidak mendapatkan akses ke pembaruan Windows atau patch keamanan. Jika perangkat tidak sepenuhnya kompatibel dengan Windows 11, Microsoft masih akan memberikan dukungan untuk Windows 10 hingga 14 Oktober 2025, sebagaimana dihimpun KompasTekno dari The Verge, Selasa (5/10/2021). Sedikit tentang Windows 11, sistem operasi teranyar ini hadir dengan desain antarmuka (UI) yang lebih segar dan bersih. Fitur seperti manajemen jendela tugas, peningkatan kinerja, hingga dukungan aplikasi Android turut dihadirkan di OS Windows terbaru ini. Perubahan yang paling mencolok terlihat di bagian antarmuka, khususnya pada taskbar dan menu Start. Berbeda dari versi sebelumnya, kedua menu tersebut kini sudah tidak lagi berada di samping kiri, melainkan bergeser ke sisi tengah seperti di tampilan MacOS. Baca juga: Windows 11 Berhasil Diinstal di Smartphone, Begini Tampilannya Item seperti jam, koneksi, atau baterai letaknya masih sama yaitu berada di sisi kanan taskbar. Sementara, menu Start kini berada tepat di tengah. Soal tema, UI Windows 11 tampil lebih transparan dengan nuansa aplikasi yang terlihat segar. Ini merupakan salah satu perubahan lainnya yang terlihat di Windows 11. Microsoft juga mengumumkan beberapa aplikasi Android yang akan tersedia di Windows Store, dan bisa berjalan di Windows 11 tanpa perlu modifikasi khusus, seperti aplikasi media sosial dan game.', '2021-10-05', 'post2.jpg'),
(3, 'Egy Absen di Kualifikasi Piala Asia U23, Waktunya STY Panggil Pemain Indonesia yang Moncer di Malaysia?', 'Celvin Moniaga Sipahutar', 3, 'KOMPAS.com - Pemain FK Senica, Egy Maulana Vikri, tidak akan bisa merumput dengan timnas Indonesia di Kualifikasi Piala Asia U23 2022. Hal itu dipastikan setelah Direktur Teknik FK Senica, David Balda, mengatakan bahwa Egy Maulana Vikri hanya akan bergabung dengan Indonesia untuk play-off Kualifikasi Piala Asia 2023. \"Egy hanya bergabung untuk play-off Piala Asia,\" kata direktur teknik FK Senica, David Balda, dikutip dari akun resmi FK Senica Indonesia (3/10/2021). \"Tidak dengan Kualifikasi Piala Asia U23,\" tegasnya. Egy Maulana Vikri sendiri langsung bergabung dengan skuad Shin Tae-yong pada Minggu (3/10/2021). Baca juga: Jadwal Play-off Kualifikasi Piala Asia 2023, Indonesia Vs Taiwan Kini, pemain berusia 21 tahun tersebut sudah berada di Thailand dan tengah mempersiapkan diri bersama rekan-rekannya jelang melawan Taiwan. Dapatkan informasi, inspirasi dan insight di email kamu. Daftarkan email Adapun laga Indonesia vs Taiwan pada play-off Kualifikasi Piala Asia 2023 akan digelar dalam dua leg, yakni 7 Oktober dan 11 Oktober. Sementara itu, kemungkinan FK Senica tak melepas Egy ke Kualifikasi Piala Asia U23 2022 karena ajang tersebut bukan termasuk jeda internasional di kalender FIFA. Tak hanya itu, tenaga Egy Maulana Vikri juga dibutuhkan FK Senica demi bersaing di Liga Slovakia maupun Piala Slovakia. Egy secara keseluruhan telah enam kali tampil bersama FK Senica pada musim 2021-2022 dengan kontribusi dua assist yang dibukukan di Liga Slovakia. Baca juga: Sama-sama Bela Timnas Indonesia, Egy dan Witan Kantongi Izin Berbeda Hal ini membuat Shin Tae-yong perlu memanggil lagi pemain muda Indonesia untuk menggantikan Egy di Kualifikasi Piaa Asia U23 2022. Sosok wonderkid Indonesia, yakni Natanael Siringoringo yang tengah moncer di kompetisi Malaysia bisa menjadi opsi bagus untuk STY. Pada musim ini, Natanael Ringo yang memperkuat Kelantan FA menjadi pemain Indonesia yang bersinar di kompetisi Malaysia. Namun, panggilan timnas Indonesia belum kunjung datang untuk pemain kelahiran Medan tersebut. Padahal, winger berusia 22 tahun itu sempat dipanggil timnas U22 Indonesia asuhan Shin Tae-yong pada pemusatan latihan (TC) Desember 2020. Natanael juga baru mendapat kabar akan diperpanjang kontraknya oleh Kelantan FA karena berhasil peformanya yang cemerlang. Hal tersebut disampaikan langsung oleh bos Kelantan FC, Norizam Tukiman, melalui unggahan Instagram-nya pada Kamis (30/9/2021). \"Investasi saya mengambil pemain Indonesia asal Medan Natanael Siringoringo sepertinya pantas,\" tulis Norizam. \"Pemain 22 tahun yang potensial, hari ini dia bermain bagus, Ringo mencetak gol menarik.\" \"Untuk Ringo saya akan melanjutkan kontrak pemain ini,\" tambahnya. (Bagas Reza Murti)', '2021-10-05', 'post3.jpg'),
(4, 'Nilai-nilai Utama Sekolah Inklusi, Merayakan Keunikan Setiap Anak', 'Ayunda Pininta Kasih', 4, 'KOMPAS.com - Setiap anak memiliki potensi berbeda-beda, termasuk anak-anak berkebutuhan khusus. Anak dengan keterbatasan fisik, psikis atau kemampuan otak yang berbeda, sejatinya memiliki potensi walau cara mengasahnya memerlukan cara yang tak biasa. Untuk mengembangkan potensi anak berkebutuhan khusus, sekolah inklusi bisa menjadi pilihan orangtua. Merayakan keragaman dan keunikan setiap anak menjadi salah satu aspek terpenting dalam sekolah inklusi. Namun, dalam memilih sekolah inklusi bagi anak-anak berkebutuhan khusus, orang tua perlu memperhatikan nilai-nilai utama dari sekolah inklusi itu sendiri. Baca juga: 9 Siswa Berkebutuhan Khusus Ikut Kompetisi Tata Rias Internasional 2021 Prestasi ABK, fokus pada pengembangan diri anak Guru Pendidikan Khusus di Pendidikan Inklusi Cikal, Novia Anggraeni mengatakan, orangtua dapat melihat dan memahami terlebih dahulu nilai-nilai sekolah yang akan dipilih bagi anak-anak yang memiliki kebutuhan khusus untuk mengenyam pendidikan, berdasarkan tiga hal, presensi, partisipasi, dan prestasi. “Presensi atau kehadiran berkaitan dengan di mana tempat para murid belajar dan frekuensi kehadiran murid dalam proses pembelajaran di sekolah atau institusi pendidikan. Apakah semua murid dengan keberagaman karakteristik belajar di tempat yang sama tanpa kecuali? Apakah terdapat murid yang mengalami hambatan untuk hadir di sekolah dengan frekuensi yang cukup sering?” jelasnya dalam keterangan tertulis yang diterima Kompas.com. Dapatkan informasi, inspirasi dan insight di email kamu. Daftarkan email Selain presensi, ia juga menjelaskan tentang partisipasi yang bermakna dan berkaitan dengan kualitas pengalaman murid saat proses belajar berlangsung. “Partisipasi mengharuskan bahwa sistem pengajaran perlu untuk melibatkan pandangan dan suara dari setiap murid. Apakah kurikulum dan pendekatan yang digunakan di kelas dapat menjangkau semua murid? Apakah pendidik dan murid saling memberikan umpan balik untuk meningkatkan partisipasi belajar?,\" tambahnya. Baca juga: Cara Bangun Motivasi Belajar Anak Berkebutuhan Khusus Selama PJJ Poin ketiga yang menjadi hal yang penting diketahui oleh orang tua adalah prestasi yang berkaitan dengan hasil belajar dan pengembangan diri anak. Menurut Novia, hasil belajar dari sekolah inklusi akan berfokus pada perubahan perilaku anak sesuai dengan tujuan belajar yang ingin dicapai, dan bukan hasil tes atau ujian. “Fokus nilai yang ketika berakar pada refleksi, apakah semua murid memiliki kesempatan yang setara untuk berprestasi sesuai dengan karakteristik mereka? Apakah semua jenis pencapaian diakui dan diapresiasi tanpa kecuali? Dan tentu prestasi di sini bukanlah hasil tes atau nilai ujian, melainkan setiap perkembangan diri dan potensi anak-anak berkebutuhan khusus,” tuturnya. Sebagai pendidik yang berpengalaman mengikuti berbagai pertukaran dan pelatihan pendidik anak berkebutuhan khusus di Jepang (University of Hiroshima dan Shizuoka University) dan berlatar belakang pendidikan anak berkebutuhan khusus dari The University of Edinburgh, Inggris, Novia menyatakan bahwa di Sekolah Cikal dan Rumah Main Cikal, pendidikan bagi anak berkebutuhan khusus Cikal mengembangkan Program Pengembangan Individu (PPI) bagi setiap anak yang merefleksikan 3 nilai sekolah inklusi. Baca juga: Beasiswa 2021 untuk Siswa SD-SMP-SMA, Beri Bantuan Biaya Sekolah “Di Pendidikan Inklusi Cikal, setiap anak akan memiliki Individualised Education Programme (IEP) atau program pengembangan individu bagi setiap anak berkebutuhan khusus yang merefleksikan 3 nilai sekolah inklusi yakni presensi, partisipasi, dan prestasi. Dalam sesi Three Ways Conference, pendidik menyampaikan kepada orang tua setiap empat bulan mengenai pengembangan diri setiap anak sesuai dengan capaian tujuan yang ditetapkan di awal pendidikan,\" tutupnya.\r\n', '2021-09-08', 'post5.jpg'),
(5, '3 Martabak Medan Terkenal di Jakarta, Ada Martabak Piring Aliang', '\'Secret Author\'', 5, 'KOMPAS.com - Martabak menjadi salah satu makanan yang paling banyak dicari orang terutama di malam hari, salah satunya martabak Medan. Medan memiliki beragam martabak yang dijual mulai martabak manis hingga martabak asin, contohnya martabak piring. Martabak piring menjadi salah satu ikonik kuliner Medan karena pembuatannya menggunakan piring yang dimasak dimasak di atas bara api. \r\n\r\n1. Martabak Piring Aliang Martabak Piring Aliang terletak di Jalan Salihara Nomor 39, Pasar Minggu, Jakarta Selatan. Tempat martabak ini buka mulai pukul 17.00 hingga 21.00 WIB dengan menyediakan banyak varian martabak piring. Dapatkan informasi, inspirasi dan insight di email kamu. Daftarkan email Beberapa varian martabak piring yaitu CKJ (Cokelat Keju Kacang), Taro Oreo, Jasuke, hingga Green Tea. Harga martabak dijual mulai dari Rp 6.000 untuk yang tipis dan Rp 7.000 untuk yang tebal. Baca juga: Resep Nasi Goreng Teri Medan, Bikin untuk Makan Malam \r\n\r\n2. Martabak India Medan Martabak India juga salah satu yang terkenal di Medan. Tidak hanya di Medan, kamu bisa membelinya juga di Jakarta. Lokasinya berada di Jalan Kusuma Kompleks Duta Mas Blok B1 Nomor 38, Wijaya Kusuma, Grogol, Jakarta Barat. Tempat ini buka mulai pukul 16.00 hingga 22.00 WIB. Baca juga: Beda Bacang Bangka dan Bacang Medan, dari Daun sampai Pengolahan Martabak India ini masuk ke dalam kategori martabak asin. Beberapa menu yang dijual seperti Martabak + Kuah Kare (telur bebek), Martabak + Kari Kambing (telur bebek). Harga yang dijual mulai dari Rp 28.000.\r\n\r\n3. Martabak India Medan Ibu Marni Martabak India Medan ini bisa kamu temui di Jalan Pluit Sakti Raya Nomor 1, Pluit, Jakarta Utara. Martabak India yang dijual seperti Martabak Medan, Martabak Medan + Telur Bebek, hingga Martabak + Kari. Harga yang dijual mulai dari Rp 35.000\r\n', '2021-10-04', 'post6.jpg'),
(6, 'HUT Ke-76 TNI, AHY Harap Kesejahteraan Prajurit Meningkat', 'Yopi Makdori', 6, 'Liputan6.com, Jakarta - Ketua Umum Partai Demokrat, Agus Harimurti Yudhoyono (AHY) mengharapkan supaya dalam momentum HUT ke-76 TNI ini para prajurit TNI kesejahteraannya ditingkatkan.\r\n\r\n\"TNI terus bertransformasi memperkuat daya, upaya dan kapasitasnya menjadi pelindung NKRI. Semakin kuat alutsistanya, semakin sejahtera prajuritnya,\" tulis AHY dalam unggahan Instagram pribadinya, Selasa (5/10/2021).\r\n\r\nIa  juga berharap TNI semakin maju serta semakin kuat dan modern, dan semakin profesional untuk selalu bersama-sama rakyat Indonesia.\r\n\r\n\"Sampai kapanpun jiwa saya tetap prajurit. Dirgahayu ke-76 Tentara Nasional Indonesia,\" katanya.\r\n\r\nPengalamannya di TNI\r\nAHY menuliskan bahwa bekal pengalaman, pengetahuan dan modal kepemimpinan selama 16 tahun mengabdi di TNI, bakal dibawanya ke dalam medan pengabdian yang lebih luas.\r\n\r\n\"Yakni untuk memperjuangkan harapan rakyat,\" pungkasnya.', '2021-10-05', 'post7.jpg'),
(7, 'Setelah BR-V, Model Lain Siap Menyusul Pakai Fitur Honda Sensing', 'Dio Dananjaya', 7, 'JAKARTA, KOMPAS.com – Fitur keamanan dan keselamatan Honda Sensing diklaim banyak diminati konsumen Indonesia. Setelah digunakan BR-V terbaru, fitur ini juga disiapkan untuk model-model lainnya. Honda Sensing sebelumnya dipakai pada mobil-mobil mewah seperti Accord, kemudian menyusul CR-V. Ke depannya, mobil di rentang harga Rp 200 jutaan hingga Rp 300 jutaan bakal punya fitur mobil mewah ini. Namun demikian, fitur ini bakal disematkan pada produk yang sesuai dengan kebutuhan konsumen berdasarkan hasil riset dan pengembangan yang dilakukan Honda.\r\n\r\n“Dengan adanya penerimaan yang baik fitur Honda Sensing di LSUV, tentunya studi akan kami lakukan di model-model lainnya,” ujar Billy, kepada Kompas.com (3/10/2021). “Yang pasti model dan varian beserta fiturnya, akan kami siapkan mengikuti kondisi pasar dan keinginan konsumen di waktu yang tepat,” kata dia.\r\n\r\nSeperti diketahui, Honda Sensing merupakan serangkaian fitur, salah satunya CMBS (Collision Mitigation Braking System), yang bisa memberi tanda ketika potensi berbenturan terjadi.\r\n\r\nFitur ini membantu mengurangi kecepatan kendaraan untuk mengurangi dampak benturan yang tidak terhindarkan. “Jadi hasil studi yang kami dapat, dan dari riset yang kami lakukan, itu memang Honda Sensing, terutama CMBS sangat diminati,” ucap Billy. “Karena sangat membantu mencegah terjadinya kecelakaan. Selain itu lewat BR-V terbaru ini, kami memberikan sesuatu yang tidak dimiliki teman-temannya di segmen LSUV, dan ini baru pertama kali,” tuturnya.', '2021-10-04', 'post8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `fotoUser` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`, `userType`, `birthDate`, `gender`, `fotoUser`) VALUES
(1, 'User', NULL, 'user@user.com', '584222f5fcc844297d56261f377514ac3e9042fd66c345d67ff189e30bd6180c0d6f71b7f54acf38e7a500c077de81776006a249d731a61ca6e80a1514f60da8', 'user', '2002-10-12', 'M', NULL),
(2, 'Admin', NULL, 'admin@admin.com', 'c484731969b767820934f6fb74a803f05b382e4b5b10383f6819a5374fcda0fb8d0d7e14f9cf6ef8f76d406669c081821fc6f32d068e98b3f831b163c8a0f84b', 'admin', '2002-10-12', 'F', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `categoryId` (`categoryId`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `test` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

