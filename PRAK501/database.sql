CREATE TABLE IF NOT EXISTS `member` (
  `id_member` INT AUTO_INCREMENT PRIMARY KEY,
  `nama_member` VARCHAR(250) NOT NULL,
  `nomor_member` VARCHAR(15) NOT NULL,
  `alamat` TEXT NOT NULL,
  `tgl_mendaftar` DATETIME NOT NULL,
  `tgl_terakhir_bayar` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` INT AUTO_INCREMENT PRIMARY KEY,
  `judul_buku` VARCHAR(500) NOT NULL,
  `penulis` VARCHAR(500) NOT NULL,
  `penerbit` VARCHAR(250) NOT NULL,
  `tahun_terbit` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` INT AUTO_INCREMENT PRIMARY KEY,
  `id_member` INT NOT NULL,
  `id_buku` INT NOT NULL,
  `tgl_pinjam` DATE NOT NULL,
  `tgl_kembali` DATE NOT NULL,
  FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE,
  FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
