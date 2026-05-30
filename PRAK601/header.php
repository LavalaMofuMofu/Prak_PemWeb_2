<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">
    <nav class="bg-white shadow-xs border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold text-indigo-900 tracking-tight">MyProfileGwe</span>
                </div>
                <div class="flex space-x-6 items-center">
                    <a href="<?= base_url('/') ?>" class="text-slate-600 hover:text-slate-900 font-semibold text-xs uppercase tracking-wide py-5">
                        Beranda
                    </a>
                    <a href="<?= base_url('profil') ?>" class="text-slate-600 hover:text-slate-900 font-semibold text-xs uppercase tracking-wide py-5">
                        Profil
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <main class="flex-grow max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">