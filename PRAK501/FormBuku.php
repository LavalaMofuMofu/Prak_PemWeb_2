<?php
require_once 'Model.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$isEdit = !empty($id);

$judul = '';
$penulis = '';
$penerbit = '';
$tahun = '';

if ($isEdit) {
    $b = getBukuById($id);
    if ($b) {
        $judul = $b['judul_buku'];
        $penulis = $b['penulis'];
        $penerbit = $b['penerbit'];
        $tahun = $b['tahun_terbit'];
    } else {
        header("Location: Buku.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];

    if ($isEdit) {
        $success = updateBuku($id, $judul, $penulis, $penerbit, $tahun);
    } else {
        $success = insertBuku($judul, $penulis, $penerbit, $tahun);
    }

    if ($success) {
        header("Location: Buku.php?status=success_save");
        exit();
    } else {
        $error = "Terjadi masalah saat menyimpan data buku. Tolong validasi kembali.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Ubah Buku' : 'Tambah Buku' ?> | MyLibrary</title>
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
            <a href="Buku.php" class="text-sm text-slate-500 hover:text-slate-800 transition">⬅ Kembali ke Daftar</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-12 w-full flex-grow">
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-8">
            <div class="mb-8 border-b border-blue-50 pb-6">
                <span class="text-xs font-semibold uppercase tracking-wider text-blue-500"><?= $isEdit ? 'Form Mode Edit' : 'Form Penambahan Buku' ?></span>
                <h1 class="text-2xl font-bold text-slate-900 mt-1"><?= $isEdit ? 'Ubah Detail Buku' : 'Masukkan Buku Baru' ?></h1>
                <p class="text-xs text-slate-400 mt-1">Silahkan masukkan informasi buku yang ingin ditambahkan ke dalam katalog.</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-6">
                
                <div>
                    <label for="judul_buku" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Judul Lengkap Buku</label>
                    <input type="text" id="judul_buku" name="judul_buku" required value="<?= htmlspecialchars($judul) ?>"
                            placeholder="Contoh: Laskar Pelangi"
                            class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                </div>

                <div>
                    <label for="penulis" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Penulis / Pengarang</label>
                    <input type="text" id="penulis" name="penulis" required value="<?= htmlspecialchars($penulis) ?>"
                            placeholder="Contoh: Andrea Hirata"
                            class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="penerbit" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Penerbit Buku</label>
                        <input type="text" id="penerbit" name="penerbit" required value="<?= htmlspecialchars($penerbit) ?>"
                                placeholder="Contoh: Bentang Pustaka"
                                class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                    </div>

                    <div>
                        <label for="tahun_terbit" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Tahun Terbit</label>
                        <input type="number" id="tahun_terbit" name="tahun_terbit" min="1500" max="<?= date('Y')+1 ?>" required value="<?= htmlspecialchars($tahun) ?>"
                                placeholder="Contoh: 2005"
                                class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex justify-end gap-4">
                    <a href="Buku.php" class="px-5 py-3 hover:bg-slate-100 rounded-xl text-slate-600 text-sm font-medium transition text-center">Batal</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-6 py-3 rounded-xl transition shadow-sm">
                        <?= $isEdit ? 'Ubah Informasi' : 'Tambahkan Ke Katalog' ?>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <footer class="text-center text-xs text-slate-400 py-6 border-t border-blue-50/40 bg-white">
        &copy; <?= date('Y') ?> MyLibrary - Modul 5
    </footer>
</body>
</html>