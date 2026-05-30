<div class="flex items-center justify-center min-h-[65vh]">
    
    <div class="w-full max-w-3xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-indigo-600"></div>
        
        <div class="space-y-6">
            <header class="text-center pb-5 border-b border-slate-200">
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Selamat Datang di Beranda Profil Saya</h1>
                <p class="text-slate-500 text-xs mt-1.5 font-medium">Web ini Dibuat untuk Memenuhi Tugas Praktikum Modul 6 - Pengenalan CodeIgniter 4</p>
            </header>
            
            <article class="space-y-4">
                <h3 class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Identitas Praktikan:</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 flex flex-col">
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">Nama Lengkap</span>
                        <p class="text-sm font-semibold text-slate-800"><?= esc($nama) ?></p>
                    </div>
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 flex flex-col">
                        <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold mb-1">NIM (Nomor Induk Mahasiswa)</span>
                        <p class="text-sm font-bold font-mono text-indigo-600"><?= esc($nim) ?></p>
                    </div>
                </div>
            </article>
            
            <div class="pt-6 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4 text-slate-500 text-xs">
                <span>Cek informasi detail data diri saya secara lengkap:</span>
                <a href="<?= base_url('profil') ?>" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-lg transition-colors shadow-sm">
                    Lihat Profil Lengkap
                </a>
            </div>
        </div>
    </div>

</div>