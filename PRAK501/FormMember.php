<?php
date_default_timezone_set('Asia/Makassar');  
require_once 'Model.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$isEdit = !empty($id);

$nama = '';
$nomor = '';
$alamat = '';
$tgl_mendaftar = date('Y-m-d\TH:i'); 

if ($isEdit) {
    $m = getMemberById($id);
    if ($m) {
        $nama = $m['nama_member'];
        $nomor = $m['nomor_member'];
        $alamat = $m['alamat'];
        $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($m['tgl_mendaftar']));
    } else {
        header("Location: Member.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_member'];
    $nomor = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_mendaftar = $_POST['tgl_mendaftar'];

    if ($isEdit) {
        $success = updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar);
    } else {
        $success = insertMember($nama, $nomor, $alamat, $tgl_mendaftar);
    }

    if ($success) {
        header("Location: Member.php?status=success_save");
        exit();
    } else {
        $error = "Terjadi kesalahan saat menyimpan data. Pastikan semua isian valid.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Ubah Member' : 'Tambah Member' ?> | MyLibrary </title>
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
            <a href="Member.php" class="text-sm text-slate-500 hover:text-slate-800 transition">⬅ Kembali ke Daftar</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-12 w-full flex-grow">
        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm p-8">
            <div class="mb-8 border-b border-blue-50 pb-6">
                <span class="text-xs font-semibold uppercase tracking-wider text-blue-500"><?= $isEdit ? 'Form Mode Edit' : 'Form Pendaftaran Member' ?></span>
                <h1 class="text-2xl font-bold text-slate-900 mt-1"><?= $isEdit ? 'Ubah Data Member' : 'Daftarkan Member Baru' ?></h1>
                <p class="text-xs text-slate-400 mt-1">Harap lengkapi semua isian formulir di bawah ini dengan benar!</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-6">
                
                <div>
                    <label for="nama_member" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Nama Lengkap</label>
                    <input type="text" id="nama_member" name="nama_member" required value="<?= htmlspecialchars($nama) ?>"
                            placeholder="Contoh: Andi Wijaya"
                            class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nomor_member" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Nomor HP</label>
                        <input type="text" id="nomor_member" name="nomor_member" required value="<?= htmlspecialchars($nomor) ?>"
                                placeholder="Contoh: 081234567890" maxlength="15"
                                class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm font-mono">
                    </div>

                    <div>
                        <label for="tgl_mendaftar" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Tanggal & Waktu Pendaftaran</label>
                        <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" required value="<?= htmlspecialchars($tgl_mendaftar) ?>"
                                class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm">
                    </div>
                </div>

                <div>
                    <label for="alamat" class="block text-xs font-medium uppercase tracking-wider text-slate-500 mb-2">Alamat Rumah Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="4" required placeholder="Tuliskan alamat tinggal lengkap..."
                            class="w-full px-4 py-3 bg-slate-50/55 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-400 focus:bg-white transition text-sm"><?= htmlspecialchars($alamat) ?></textarea>
                </div>

                <div class="pt-6 border-t border-slate-100 flex justify-end gap-4">
                    <a href="Member.php" class="px-5 py-3 hover:bg-slate-100 rounded-xl text-slate-600 text-sm font-medium transition text-center">Batal</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-6 py-3 rounded-xl transition shadow-sm">
                        <?= $isEdit ? 'Simpan Perubahan' : 'Daftarkan Anggota' ?>
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