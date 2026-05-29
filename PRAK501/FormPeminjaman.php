<?php
date_default_timezone_set('Asia/Makassar');  
require_once 'Model.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$isEdit = !empty($id);

$members = getAllMember();
$books = getAllBuku();

$id_member = '';
$id_buku = '';
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+7 days'));

if ($isEdit) {
    $p = getPeminjamanById($id);
    if ($p) {
        $id_member = $p['id_member'];
        $id_buku = $p['id_buku'];
        $tgl_pinjam = $p['tgl_pinjam'];
        $tgl_kembali = $p['tgl_kembali'];
    } else {
        header("Location: Peminjaman.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if ($isEdit) {
        $success = updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    } else {
        $success = insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    }

    if ($success) {
        header("Location: Peminjaman.php?status=success_save");
        exit();
    } else {
        $error = "Gagal memproses transaksi. Mohon cek kecocokan data Anda.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Ubah Transaksi' : 'Sirkulasi Baru' ?> | MyLibrary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f0f7ff] text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white/80 backdrop-blur-md border-b border-blue-100 py-4">
        <div class="max-w-3xl mx-auto px-6 flex justify-between items-center">
            <span class="font-bold text-lg tracking-tight text-blue-600">My<span class="text-blue-400 font-light">Library</span></span>
            <a href="Peminjaman.php" class="text-sm text-slate-500 hover:text-slate-800 transition">⬅ Kembali</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-12 w-full flex-grow">
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-8">
            <div class="mb-8 border-b border-blue-50 pb-6">
                <span class="text-xs font-semibold uppercase tracking-wider text-blue-500"><?= $isEdit ? 'Form Mode Edit' : 'Form Peminjaman Buku' ?></span>
                <h1 class="text-2xl font-bold text-slate-900 mt-1"><?= $isEdit ? 'Ubah Siklus Transaksi Peminjaman' : 'Formulir Peminjaman Baru' ?></h1>
                <p class="text-xs text-slate-400 mt-1">Gunakan form ini untuk merekam peminjamaan buku.</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <?php if (empty($members) || empty($books)): ?>
                <div class="p-6 bg-amber-50 border border-amber-200 rounded-xl text-amber-800 text-sm space-y-3">
                    <p class="font-bold">⚠️ Data Anggota atau Buku masih kosong!</p>
                    <p>Sebelum merekam sirkulasi peminjaman, pastikan Anda telah memasukkan minimal <strong>1 data Member</strong> dan <strong>1 data Buku</strong> ke dalam sistem.</p>
                    <div class="flex gap-4 pt-2">
                        <a href="FormMember.php" class="text-xs bg-amber-200 text-amber-900-font-medium px-3 py-1.5 rounded-lg border border-amber-300">Tambah Member</a>
                        <a href="FormBuku.php" class="text-xs bg-amber-200 text-amber-900-font-medium px-3 py-1.5 rounded-lg border border-amber-300">Tambah Buku</a>
                    </div>
                </div>
            <?php else: ?>
                <form action="" method="POST" class="space-y-6">
                    
                    <div>
                        <label for="id_member" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Pilih Anggota Perpustakaan</label>
                        <select id="id_member" name="id_member" required 
                                class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                            <option value="" disabled selected>-- Pilih Member --</option>
                            <?php foreach ($members as $m): ?>
                                <option value="<?= $m['id_member'] ?>" <?= $id_member == $m['id_member'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($m['nama_member']) ?> (Telp: <?= htmlspecialchars($m['nomor_member']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="id_buku" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Pilih Buku Yang Dipinjam</label>
                        <select id="id_buku" name="id_buku" required 
                                class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                            <option value="" disabled selected>-- Pilih Buku --</option>
                            <?php foreach ($books as $b): ?>
                                <option value="<?= $b['id_buku'] ?>" <?= $id_buku == $b['id_buku'] ? 'selected' : '' ?>>
                                    &quot;<?= htmlspecialchars($b['judul_buku']) ?>&quot; karya <?= htmlspecialchars($b['penulis']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tgl_pinjam" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Tanggal Peminjaman</label>
                            <input type="date" id="tgl_pinjam" name="tgl_pinjam" required value="<?= htmlspecialchars($tgl_pinjam) ?>"
                                    class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                        </div>

                        <div>
                            <label for="tgl_kembali" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Tanggal Batas Pengembalian</label>
                            <input type="date" id="tgl_kembali" name="tgl_kembali" required value="<?= htmlspecialchars($tgl_kembali) ?>"
                                    class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 flex justify-end gap-4">
                        <a href="Peminjaman.php" class="px-5 py-3 hover:bg-slate-100 rounded-xl text-slate-600 text-sm font-medium transition text-center">Batal</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-6 py-3 rounded-xl transition shadow-sm">
                            <?= $isEdit ? 'Simpan Sirkulasi' : 'Pinjamkan Buku' ?>
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </main>

    <footer class="text-center text-xs text-slate-400 py-6 border-t border-blue-50/40 bg-white">
        &copy; <?= date('Y') ?> MyLibrary - Modul 5
    </footer>
</body>
</html>