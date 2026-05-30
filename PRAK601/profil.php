<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="h-20 bg-slate-100 border-b border-slate-200 relative flex items-center justify-end px-4">
            <span class="text-[9px] font-mono font-bold text-slate-300 uppercase tracking-widest"> </span>
        </div>
        <div class="px-5 pb-5 relative flex flex-col sm:flex-row gap-4 items-start -mt-10">
            <div class="relative w-20 h-20 rounded-xl overflow-hidden border-2 border-white bg-white shadow-sm shrink-0">
                <img src="<?= esc($foto) ?>" alt="Foto Profil" class="w-full h-full object-cover">
            </div>
            <div class="flex-grow pt-1 sm:mt-12">
                <h1 class="text-lg font-bold text-slate-900 tracking-tight leading-tight"><?= esc($nama) ?></h1>
                <p class="text-slate-500 font-mono text-xs mt-1 font-semibold"><?= esc($nim) ?>  ·  <?= esc($prodi) ?></p>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        <div class="space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm space-y-3.5">
                <h3 class="text-[12px] uppercase tracking-wider text-indigo-500 font-bold mb-2">Detail Atribut</h3>
                <div class="border-b border-slate-100 pb-2.5">
                    <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Program Studi</span>
                    <p class="text-xs font-semibold text-slate-800 mt-1">S1 <?= esc($prodi) ?></p>
                </div>
                <div>
                    <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Fakultas / Universitas</span>
                    <p class="text-xs font-semibold text-slate-800 mt-1">Teknik / Universitas Lambung Mangkurat</p>
                </div>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
                <h3 class="text-[12px] uppercase tracking-wider text-indigo-500 font-bold mb-2.5">Hobi & Minat</h3>
                <div class="flex flex-wrap gap-1.5">
                    <?php foreach ($hobi as $h): ?>
                        <span class="bg-slate-100 text-slate-700 border border-slate-200 font-semibold px-2.5 py-1 rounded-lg text-[9px] uppercase tracking-wider">
                            <?= esc($h) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="md:col-span-2 space-y-4">
            <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
                <h3 class="text-[12px] uppercase tracking-wider text-indigo-500 font-bold mb-2">Tentang Saya</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    <?= esc($tambahan) ?>
                </p>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm space-y-3">
                <h3 class="text-[12px] uppercase tracking-wider text-indigo-500 font-bold">Skill & Keterampilan</h3>
                <div class="grid grid-cols-2 gap-2">
                    <?php foreach ($skill as $s): ?>
                        <div class="bg-slate-50 border border-slate-200 rounded-lg p-2.5 flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-600 shrink-0" ></span>
                            <span class="text-slate-800 text-xs font-semibold"><?= esc($s) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="<?= base_url('/') ?>" class="inline-flex items-center gap-1.5 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-xs font-semibold transition-colors shadow-sm cursor-pointer">                    
                Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>