<?php
require_once 'Model.php';

$members = getAllMember();

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $success = deleteMember($id);
    if ($success) {
        header("Location: Member.php?status=success_delete");
        exit();
    } else {
        header("Location: Member.php?status=failed_delete");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member | MyLibrary

    </title>
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
                <a href="Member.php" class="text-blue-600 border-b-2 border-blue-400 pb-1">Member</a>
                <a href="Buku.php" class="text-slate-500 hover:text-blue-500 transition pb-1">Buku</a>
                <a href="Peminjaman.php" class="text-slate-500 hover:text-blue-500 transition pb-1">Peminjaman</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-10">
        
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'success_delete'): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">✓ Data member berhasil dihapus.</div>
            <?php elseif ($_GET['status'] == 'failed_delete'): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">✗ Gagal menghapus member. Data member ini mungkin masih digunakan dalam rekaman Peminjaman.</div>
            <?php elseif ($_GET['status'] == 'success_save'): ?>
                <div class="mb-6 p-4 bg-teal-50 border border-teal-200 text-teal-700 text-sm rounded-xl">✓ Data member berhasil disimpan.</div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Manajemen Member</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola data anggota perpustakaan secara terorganisir.</p>
            </div>
            <a href="FormMember.php" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-5 py-2.5 rounded-xl transition shadow-sm w-fit">
                + Tambah Member Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-blue-50/50 text-blue-900 text-xs uppercase font-semibold border-b border-blue-100">
                        <tr>
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Nama Lengkap</th>
                            <th class="px-6 py-4">Nomor Handphone</th>
                            <th class="px-6 py-4">Alamat</th>
                            <th class="px-6 py-4">Tanggal Daftar</th>
                            <th class="px-6 py-4">Terakhir Bayar</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (empty($members)): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-slate-400">Tidak ada data member saat ini. Silakan tambahkan data baru.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($members as $m): ?>
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-6 py-4 font-semibold text-slate-500">#<?= htmlspecialchars($m['id_member']) ?></td>
                                    <td class="px-6 py-4 font-medium text-slate-900"><?= htmlspecialchars($m['nama_member']) ?></td>
                                    <td class="px-6 py-4 font-mono text-xs text-slate-600"><?= htmlspecialchars($m['nomor_member']) ?></td>
                                    <td class="px-6 py-4 text-slate-600 max-w-xs truncate" title="<?= htmlspecialchars($m['alamat']) ?>"><?= htmlspecialchars($m['alamat']) ?></td>
                                    <td class="px-6 py-4 text-slate-500 text-xs"><?= date('d M Y, H:i', strtotime($m['tgl_mendaftar'])) ?></td>
                                    <td class="px-6 py-4 text-slate-500 text-xs">
                                        <span class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-[11px] font-medium border border-blue-100">
                                            <?= date('d M Y', strtotime($m['tgl_terakhir_bayar'])) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-3">
                                            <a href="FormMember.php?id=<?= $m['id_member'] ?>" class="text-green-500 hover:text-green-700 text-xs font-medium transition"><b>Edit</b></a>
                                            <a href="Member.php?action=delete&id=<?= $m['id_member'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')" class="text-red-400 hover:text-red-600 text-xs font-medium transition"><b>Hapus</b></a>
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