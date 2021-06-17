-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Haz 2021, 23:36:57
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane_otomasyonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresler`
--

CREATE TABLE `adresler` (
  `AdresID` int(11) NOT NULL,
  `il` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ilce` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Mahalle` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Sokak` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `KapiNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `adresler`
--

INSERT INTO `adresler` (`AdresID`, `il`, `ilce`, `Mahalle`, `Sokak`, `KapiNo`) VALUES
(500, 'Ankara', 'Çankaya', 'Bahçelievler', 'İsmet İnönü', 4),
(501, 'Ankara', 'Çankaya', '100. yıl', 'Nenehatun', 57),
(502, 'Ankara', 'Çankaya', 'Talatpaşa', 'Eceabat', 5),
(503, 'Ankara', 'Gölbaşı', 'Gaziosmanpaşa', '377', 6),
(504, 'Bursa ', 'Nilüfer', 'Yüzüncüyıl', 'Uğur Mumcu', 9),
(505, 'Bursa ', 'Nilüfer', 'Ataevler', 'Eğitim', 12),
(506, 'Bursa', 'Osmangazi', 'Başaran', 'Hüsniye', 7),
(507, 'Bursa', 'Osmangazi', 'İstiklal', 'Rodop', 23),
(508, 'Trabzon', 'Ortahisar', 'Üniversite', 'Milli Egemenlik', 34),
(509, 'Ankara', 'Etimesgut', 'Piyade', '1848', 14),
(510, 'Trabzon', 'Arsin', 'Cumhuriyet', '213', 3),
(511, 'Bursa ', 'Yıldırım', 'Mimar Sinan', 'Eflak', 177),
(512, 'İstanbul', 'Sarıyer', 'Maslak', 'Ayazağa', 34469),
(518, 'asdx', 'dsc<', 'dscz', 'dsc<zd', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `islemler`
--

CREATE TABLE `islemler` (
  `EmanetNo` int(11) NOT NULL,
  `AlisTarihi` date NOT NULL,
  `TeslimTarihi` date DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL,
  `KutuphaneID` int(11) DEFAULT NULL,
  `UyeNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `islemler`
--

INSERT INTO `islemler` (`EmanetNo`, `AlisTarihi`, `TeslimTarihi`, `ISBN`, `KutuphaneID`, `UyeNo`) VALUES
(1000, '2021-01-13', '2021-02-01', 9594158, 101, 2),
(1001, '2021-02-24', '2021-03-01', 4623377, 104, 4),
(1002, '2021-03-12', '2021-03-29', 8289611, 108, 1),
(1003, '2021-04-01', '2021-04-15', 3203612, 102, 3),
(1004, '2021-04-10', '2021-04-30', 5094427, 105, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `KategoriID` int(11) NOT NULL,
  `KategoriAdi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`KategoriID`, `KategoriAdi`) VALUES
(300, 'Bilgisayar'),
(301, 'Matematik'),
(302, 'Tarih'),
(303, 'Roman'),
(304, 'Hikaye'),
(305, 'Bilim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitapkategori`
--

CREATE TABLE `kitapkategori` (
  `ISBN` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kitapkategori`
--

INSERT INTO `kitapkategori` (`ISBN`, `KategoriID`) VALUES
(9594158, 300),
(9594158, 305),
(4623377, 300),
(8289611, 301),
(4229048, 301),
(3203612, 300),
(5094427, 302),
(5094427, 303),
(4248650, 301),
(4370796, 304),
(2111929, 303),
(2116832, 303),
(2104037, 303),
(2112438, 303),
(5718533, 305),
(5718533, 303),
(4229048, 301),
(4229048, 305),
(4370652, 304),
(9701501, 304),
(6490361, 302);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitapkutuphane`
--

CREATE TABLE `kitapkutuphane` (
  `ISBN` int(11) NOT NULL,
  `KutuphaneID` int(11) NOT NULL,
  `Miktar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kitapkutuphane`
--

INSERT INTO `kitapkutuphane` (`ISBN`, `KutuphaneID`, `Miktar`) VALUES
(9594158, 101, 2),
(4623377, 102, 12),
(8289611, 103, 7),
(3203612, 104, 3),
(5094427, 105, 9),
(4248650, 106, 21),
(4370796, 107, 15),
(2111929, 108, 4),
(2116832, 109, 2),
(2104037, 105, 3),
(2112438, 102, 2),
(5718533, 107, 3),
(4229048, 101, 3),
(4370652, 101, 15),
(4370652, 102, 9),
(4370652, 103, 4),
(4370652, 104, 12),
(4370652, 105, 14),
(4370652, 106, 6),
(4370652, 107, 8),
(4370652, 108, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `ISBN` int(11) NOT NULL,
  `KitapAdi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `YayineviID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`ISBN`, `KitapAdi`, `YayineviID`) VALUES
(2104037, 'Da Vinci Şifresi', 55),
(2111929, 'Kayıp Sembol', 55),
(2112438, 'Dijital Kale', 55),
(2116832, 'Cehennem', 55),
(3203612, 'Bilgisayar Bilimine Giriş', 53),
(4229048, 'Kompleks Değişkenli Fonksiyonlar Teorisi', 58),
(4248650, 'Thomas Calculus', 53),
(4370652, 'Gençliğim Eyvah', 56),
(4370796, 'Osmancık', 56),
(4623377, 'C Dersi Programlamaya Giriş', 51),
(5094427, 'Orta Doğu', 54),
(5718533, '1984', 57),
(6490361, 'Nutuk', 60),
(8289611, 'Diferansiyel Denklemler', 52),
(9594158, 'Web Tabanlı Programlama', 50),
(9701501, 'Mai Ve Siyah', 59);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kutuphaneler`
--

CREATE TABLE `kutuphaneler` (
  `KutuphaneID` int(11) NOT NULL,
  `KutuphaneAdi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `AdresID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kutuphaneler`
--

INSERT INTO `kutuphaneler` (`KutuphaneID`, `KutuphaneAdi`, `AdresID`) VALUES
(101, 'Milli Kütüphane', 500),
(102, 'Hasan Celal Güzel Halk Kütüphanesi', 503),
(103, 'Ali Dayı Çocuk Kütüphanesi', 501),
(104, 'Akkılıç Kütüphanesi', 505),
(105, 'Şiir Kütüphanesi', 504),
(106, 'Ömer Mercan Kütüphanesi', 507),
(107, 'Hüsniye Bilsen Halk Kütüphanesi', 506),
(108, 'Faik Ahmet Barutçu Kütüphanesi', 508),
(109, 'Cebeci Kütüphanesi', 502);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `UyeNo` int(11) NOT NULL,
  `UyeAdi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `UyeSoyadi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Telefon` int(11) NOT NULL,
  `E_posta` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `AdresID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`UyeNo`, `UyeAdi`, `UyeSoyadi`, `Telefon`, `E_posta`, `AdresID`) VALUES
(1, 'Nazlı', 'Gürsoy', 544, 'nazligursoy@gmail.com', 510),
(2, 'Beyzanur', 'Gürses', 537, 'beyzagurses@gmail.com', 509),
(3, 'Bilal', 'Çalik', 532, 'bilalcalik@gmail.com', 512),
(4, 'Ela', 'Başaran', 543, 'elabasaran@gmail.com', 511);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevleri`
--

CREATE TABLE `yayinevleri` (
  `YayineviID` int(11) NOT NULL,
  `YayineviAdi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yayinevleri`
--

INSERT INTO `yayinevleri` (`YayineviID`, `YayineviAdi`) VALUES
(50, 'Papatya Bilim'),
(51, 'Tüba'),
(52, 'Değişim'),
(53, 'Pearson'),
(54, 'Arkadaş'),
(55, 'Altın'),
(56, 'Ötüken'),
(57, 'Can'),
(58, 'Sakarya'),
(59, 'Venedik'),
(60, 'Alfa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarkitap`
--

CREATE TABLE `yazarkitap` (
  `ISBN` int(11) NOT NULL,
  `YazarNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yazarkitap`
--

INSERT INTO `yazarkitap` (`ISBN`, `YazarNo`) VALUES
(9594158, 201),
(4623377, 202),
(4248650, 206),
(4248650, 207),
(4248650, 208),
(5094427, 203),
(3203612, 204),
(8289611, 205),
(2111929, 209),
(8289611, 210),
(3203612, 211),
(2116832, 209),
(2104037, 209),
(2112438, 209),
(4229048, 205),
(5718533, 212),
(4370652, 214),
(4370796, 214),
(9701501, 213),
(6490361, 215);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlar`
--

CREATE TABLE `yazarlar` (
  `YazarNo` int(11) NOT NULL,
  `YazarAdi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `YazarSoyadi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yazarlar`
--

INSERT INTO `yazarlar` (`YazarNo`, `YazarAdi`, `YazarSoyadi`) VALUES
(201, 'Turgay Tugay', 'Bilgin'),
(202, 'Nergis Ercil', 'Çağıltay'),
(203, 'Bernard', 'Lewis'),
(204, 'J. Glenn', 'Brookshear'),
(205, 'Metin', 'Başarır'),
(206, 'George B.', 'Thomas'),
(207, 'Maurice D.', 'Weir'),
(208, 'Joel R.', 'Hass'),
(209, 'Dan', 'Brown'),
(210, 'Eyüp Sabri', 'Türker'),
(211, 'Birim ', 'Balcı'),
(212, 'George ', 'Orwel'),
(213, 'Halid Ziya', 'Uşaklıgil'),
(214, 'Tarık', 'Buğra'),
(215, 'Mustafa Kemal', 'Atatürk');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresler`
--
ALTER TABLE `adresler`
  ADD PRIMARY KEY (`AdresID`);

--
-- Tablo için indeksler `islemler`
--
ALTER TABLE `islemler`
  ADD PRIMARY KEY (`EmanetNo`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `KutuphaneID` (`KutuphaneID`),
  ADD KEY `UyeNo` (`UyeNo`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Tablo için indeksler `kitapkategori`
--
ALTER TABLE `kitapkategori`
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `KategoriID` (`KategoriID`);

--
-- Tablo için indeksler `kitapkutuphane`
--
ALTER TABLE `kitapkutuphane`
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `KutuphaneID` (`KutuphaneID`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `YayineviID` (`YayineviID`);

--
-- Tablo için indeksler `kutuphaneler`
--
ALTER TABLE `kutuphaneler`
  ADD PRIMARY KEY (`KutuphaneID`),
  ADD KEY `AdresID` (`AdresID`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`UyeNo`),
  ADD UNIQUE KEY `Telefon` (`Telefon`),
  ADD KEY `AdresID` (`AdresID`);

--
-- Tablo için indeksler `yayinevleri`
--
ALTER TABLE `yayinevleri`
  ADD PRIMARY KEY (`YayineviID`);

--
-- Tablo için indeksler `yazarkitap`
--
ALTER TABLE `yazarkitap`
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `YazarNo` (`YazarNo`);

--
-- Tablo için indeksler `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`YazarNo`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresler`
--
ALTER TABLE `adresler`
  MODIFY `AdresID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- Tablo için AUTO_INCREMENT değeri `islemler`
--
ALTER TABLE `islemler`
  MODIFY `EmanetNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `KategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- Tablo için AUTO_INCREMENT değeri `kutuphaneler`
--
ALTER TABLE `kutuphaneler`
  MODIFY `KutuphaneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `UyeNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `yayinevleri`
--
ALTER TABLE `yayinevleri`
  MODIFY `YayineviID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Tablo için AUTO_INCREMENT değeri `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `YazarNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `islemler`
--
ALTER TABLE `islemler`
  ADD CONSTRAINT `islemler_ibfk_1` FOREIGN KEY (`UyeNo`) REFERENCES `uyeler` (`UyeNo`),
  ADD CONSTRAINT `islemler_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `kitaplar` (`ISBN`),
  ADD CONSTRAINT `islemler_ibfk_3` FOREIGN KEY (`KutuphaneID`) REFERENCES `kutuphaneler` (`KutuphaneID`);

--
-- Tablo kısıtlamaları `kitapkategori`
--
ALTER TABLE `kitapkategori`
  ADD CONSTRAINT `kitapkategori_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `kitaplar` (`ISBN`),
  ADD CONSTRAINT `kitapkategori_ibfk_2` FOREIGN KEY (`KategoriID`) REFERENCES `kategoriler` (`KategoriID`);

--
-- Tablo kısıtlamaları `kitapkutuphane`
--
ALTER TABLE `kitapkutuphane`
  ADD CONSTRAINT `kitapkutuphane_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `kitaplar` (`ISBN`),
  ADD CONSTRAINT `kitapkutuphane_ibfk_2` FOREIGN KEY (`KutuphaneID`) REFERENCES `kutuphaneler` (`KutuphaneID`);

--
-- Tablo kısıtlamaları `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD CONSTRAINT `kitaplar_ibfk_1` FOREIGN KEY (`YayineviID`) REFERENCES `yayinevleri` (`YayineviID`);

--
-- Tablo kısıtlamaları `kutuphaneler`
--
ALTER TABLE `kutuphaneler`
  ADD CONSTRAINT `kutuphaneler_ibfk_1` FOREIGN KEY (`AdresID`) REFERENCES `adresler` (`AdresID`);

--
-- Tablo kısıtlamaları `uyeler`
--
ALTER TABLE `uyeler`
  ADD CONSTRAINT `uyeler_ibfk_1` FOREIGN KEY (`AdresID`) REFERENCES `adresler` (`AdresID`);

--
-- Tablo kısıtlamaları `yazarkitap`
--
ALTER TABLE `yazarkitap`
  ADD CONSTRAINT `yazarkitap_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `kitaplar` (`ISBN`),
  ADD CONSTRAINT `yazarkitap_ibfk_2` FOREIGN KEY (`YazarNo`) REFERENCES `yazarlar` (`YazarNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
