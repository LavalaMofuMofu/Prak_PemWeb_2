<?php
require_once 'Koneksi.php';

function getAllMember() {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("SELECT * FROM member ORDER BY id_member DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMemberById($id) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertMember($nama, $nomor, $alamat, $tgl_mendaftar) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar) VALUES (:nama, :nomor, :alamat, :tgl_mendaftar)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':tgl_mendaftar', $tgl_mendaftar);
    return $stmt->execute();
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar,) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("UPDATE member SET nama_member = :nama, nomor_member = :nomor, alamat = :alamat, tgl_mendaftar = :tgl_mendaftar WHERE id_member = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':nomor', $nomor);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':tgl_mendaftar', $tgl_mendaftar);
    return $stmt->execute();
}


function deleteMember($id) {
    try {
        $conn = koneksiDatabase();
        $stmt = $conn->prepare("DELETE FROM member WHERE id_member = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}


function getAllBuku() {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("SELECT * FROM buku ORDER BY id_buku DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBukuById($id) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (:judul, :penulis, :penerbit, :tahun)");
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':penerbit', $penerbit);
    $stmt->bindParam(':tahun', $tahun, PDO::PARAM_INT);
    return $stmt->execute();
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("UPDATE buku SET judul_buku = :judul, penulis = :penulis, penerbit = :penerbit, tahun_terbit = :tahun WHERE id_buku = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':penerbit', $penerbit);
    $stmt->bindParam(':tahun', $tahun, PDO::PARAM_INT);
    return $stmt->execute();
}

function deleteBuku($id) {
    try {
        $conn = koneksiDatabase();
        $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}


function getAllPeminjaman() {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("
        SELECT p.*, m.nama_member, b.judul_buku 
        FROM peminjaman p
        JOIN member m ON p.id_member = m.id_member
        JOIN buku b ON p.id_buku = b.id_buku
        ORDER BY p.id_peminjaman DESC
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPeminjamanById($id) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (:id_member, :id_buku, :tgl_pinjam, :tgl_kembali)");
    $stmt->bindParam(':id_member', $id_member, PDO::PARAM_INT);
    $stmt->bindParam(':id_buku', $id_buku, PDO::PARAM_INT);
    $stmt->bindParam(':tgl_pinjam', $tgl_pinjam);
    $stmt->bindParam(':tgl_kembali', $tgl_kembali);
    return $stmt->execute();
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("UPDATE peminjaman SET id_member = :id_member, id_buku = :id_buku, tgl_pinjam = :tgl_pinjam, tgl_kembali = :tgl_kembali WHERE id_peminjaman = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':id_member', $id_member, PDO::PARAM_INT);
    $stmt->bindParam(':id_buku', $id_buku, PDO::PARAM_INT);
    $stmt->bindParam(':tgl_pinjam', $tgl_pinjam);
    $stmt->bindParam(':tgl_kembali', $tgl_kembali);
    return $stmt->execute();
}

function deletePeminjaman($id) {
    $conn = koneksiDatabase();
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
?>