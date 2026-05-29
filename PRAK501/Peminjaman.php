<?php
require_once 'Model.php';

$peminjamanList = getAllPeminjaman();

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $success = deletePeminjaman($id);
    if ($success) {
        header("Location: Peminjaman.php?status=success_delete");
        exit();
    } else {
        header("Location: Peminjaman.php?status=failed_delete");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sirkulasi Peminjaman | MyLibrary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f0f7ff] text-slate-800 min-h-screen">
    
    <nav class="bg-white/80 backdrop-blur-md border-b border-blue-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="font-bold text-lg tracking-tight text-blue-600">My<span class="text-blue-400 font-light">Library</span></span>
            <div class="flex gap-6 text-sm font-medium">
                <a href="Member.php" class="text-slate-500 hover:text-blue-500 transition pb-1">Member</a>
                <a href="Buku.php" class="text-slate-500 hover:text-blue-500 transition pb-1">Buku</a>
                <a href="Peminjaman.php" class="text-blue-600 border-b-2 border-blue-400 pb-1">Peminjaman</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-10">
        
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'success_delete'): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">✓ Menghapus sirkulasi peminjaman berhasil.</div>
            <?php elseif ($_GET['status'] == 'failed_delete'): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">✗ Gagal menghapus sirkulasi peminjaman.</div>
            <?php elseif ($_GET['status'] == 'success_save'): ?>
                <div class="mb-6 p-4 bg-teal-50 border border-teal-200 text-teal-700 text-sm rounded-xl">✓ Log peminjaman telah berhasil diperbarui/disimpan.</div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Peminjaman Buku</h1>
                <p class="text-sm text-slate-500 mt-1">Catat transaksi peminjaman buku dan kontrol masa peminjaman.</p>
            </div>
            <a href="FormPeminjaman.php" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition shadow-sm w-fit">
                + Pinjamkan Buku Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-blue-50/50 text-blue-900 text-xs uppercase font-semibold border-b border-blue-100">
                        <tr>
                            <th class="px-6 py-4">ID Transaksi</th>
                            <th class="px-6 py-4">Nama Peminjam</th>
                            <th class="px-6 py-4">Buku Yang Dipinjam</th>
                            <th class="px-6 py-4">Mulai Pinjam</th>
                            <th class="px-6 py-4">Batas Pengembalian</th>
                            <th class="px-6 py-4">Durasi Sisa</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (empty($peminjamanList)): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-slate-400">Belum ada transaksi peminjaman buku saat ini.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($peminjamanList as $p): ?>
                                <?php 
                                    $today = strtotime(date('Y-m-d'));
                                    $due = strtotime($p['tgl_kembali']);
                                    $diff_days = round(($due - $today) / (60 * 60 * 24));
                                ?>
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-slate-500">TRX-<?= htmlspecialchars($p['id_peminjaman']) ?></td>
                                    <td class="px-6 py-4 font-semibold text-slate-900"><?= htmlspecialchars($p['nama_member']) ?></td>
                                    <td class="px-6 py-4 text-slate-700 font-medium"><?= htmlspecialchars($p['judul_buku']) ?></td>
                                    <td class="px-6 py-4 text-slate-500 text-xs"><?= date('d M Y', strtotime($p['tgl_pinjam'])) ?></td>
                                    <td class="px-6 py-4 text-slate-500 text-xs font-semibold"><?= date('d M Y', strtotime($p['tgl_kembali'])) ?></td>
                                    <td class="px-6 py-4">
                                        <?php if ($diff_days < 0): ?>
                                            <span class="bg-red-50 text-red-600 border border-red-200 px-2.5 py-0.5 rounded-full text-[11px] font-semibold">
                                                Terlambat <?= abs($diff_days) ?> Hari
                                            </span>
                                        <?php elseif ($diff_days == 0): ?>
                                            <span class="bg-amber-50 text-amber-700 border border-amber-200 px-2.5 py-0.5 rounded-full text-[11px] font-semibold">
                                                Hari Ini Kembali
                                            </span>
                                        <?php else: ?>
                                            <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-0.5 rounded-full text-[11px] font-medium">
                                                Sisa <?= $diff_days ?> Hari Lagi
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-3">
                                            <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman'] ?>" class="text-green-500 hover:text-green-700 text-xs font-medium transition"><b>Edit</b></a>
                                            <a href="Peminjaman.php?action=delete&id=<?= $p['id_peminjaman'] ?>" onclick="return confirm('Apakah sirkulasi pengembalian buku ini telah selesai/ingin dihapus?')" class="text-red-400 hover:text-red-600 text-xs font-medium transition"><b>Hapus</b></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="text-center text-xs text-slate-400 py-10">
        &copy; <?= date('Y') ?> MyLibrary - PRAK501 Web II
    </footer>
</body>
</html>