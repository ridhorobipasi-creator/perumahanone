<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin Bintang - Sistem Manajemen Properti')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(24px); }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-surface text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    <!-- SideNavBar Anchor -->
    <aside class="h-screen w-64 fixed left-0 top-0 border-r border-slate-200 bg-slate-50 flex flex-col py-6 px-4 z-50">
        <div class="mb-10 px-4">
            <h1 class="text-lg font-black text-teal-900 leading-tight"><a href="{{ url('/') }}">Bintang Emerald</a></h1>
            <p class="text-xs text-slate-500 font-medium">Sistem Manajemen</p>
        </div>
        <nav class="flex-1 space-y-1">
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin') ? 'text-teal-700 bg-teal-50/50 rounded-lg border-r-4 border-teal-600 font-medium' : 'text-slate-600 hover:text-teal-600 hover:bg-slate-100 transition-all font-medium' }} text-sm" href="{{ url('/admin') }}">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span> Dasbor
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/properties') ? 'text-teal-700 bg-teal-50/50 rounded-lg border-r-4 border-teal-600 font-medium' : 'text-slate-600 hover:text-teal-600 hover:bg-slate-100 transition-all font-medium' }} text-sm" href="{{ url('/admin/properties') }}">
                <span class="material-symbols-outlined" data-icon="domain">domain</span> Properti
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/leads') ? 'text-teal-700 bg-teal-50/50 rounded-lg border-r-4 border-teal-600 font-medium' : 'text-slate-600 hover:text-teal-600 hover:bg-slate-100 transition-all font-medium' }} text-sm" href="{{ url('/admin/leads') }}">
                <span class="material-symbols-outlined" data-icon="contact_page">contact_page</span> Klien & Prospek
            </a>
            <a class="flex items-center gap-3 px-4 py-3 {{ request()->is('admin/settings') ? 'text-teal-700 bg-teal-50/50 rounded-lg border-r-4 border-teal-600 font-medium' : 'text-slate-600 hover:text-teal-600 hover:bg-slate-100 transition-all font-medium' }} text-sm" href="{{ url('/admin/settings') }}">
                <span class="material-symbols-outlined" data-icon="settings">settings</span> Pengaturan
            </a>
        </nav>
        <div class="mt-auto space-y-1 pt-6 border-t border-slate-200">
            <a href="{{ url('/admin/properties/create') }}" class="w-full mb-4 bg-gradient-to-br from-primary to-primary-container text-white py-3 rounded-md font-semibold text-sm shadow-sm active:scale-95 transition-transform flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-[18px]">add</span> Tambah Listing Baru
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-teal-600 hover:bg-slate-100 transition-all font-medium text-sm" href="#">
                <span class="material-symbols-outlined" data-icon="logout">logout</span> Keluar
            </a>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <main class="pl-64 min-h-screen flex flex-col">
        <!-- TopAppBar Anchor -->
        <header class="w-full sticky top-0 z-40 bg-white/70 backdrop-blur-3xl border-b border-slate-100 shadow-sm flex items-center justify-between px-6 h-16">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative w-full max-w-md">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input class="w-full bg-slate-50 border-none rounded-full pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-teal-500/20 placeholder:text-slate-400 font-medium" placeholder="Cari properti, klien, atau agen..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors relative">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
                </button>
                <div class="h-8 w-px bg-slate-200 mx-2"></div>
                <div class="flex items-center gap-3 pl-2">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-teal-900 leading-none">Admin Utama</p>
                        <p class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">Super Administrator</p>
                    </div>
                    <img alt="Profil Administrator" class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfevpJ4tetT6xpXKa7lNlsH5b0etygaHWMLIC3Ozoe1atm3CxnOieP7c1194LuZ1mbLTayAjMAmpspgYounuPg4XB4SRLjpYQFPyhGKzBiiok1gT88XDe02_vxrJorrFRGIUINTV3NuJK2FzNUrqXnsL8Ctr_1Jwj5DTNmtuZNV3xF07TWvwUWIuEtM4bBBgJD6qV_cLmlEG8NRoJfd-7GaeqwvetzlNFa0NFv04g9z31gLSnXt6-ybf88aa1o48rURZduZ6V8uus"/>
                </div>
            </div>
        </header>

        <div class="flex-1">
            @yield('content')
        </div>

        <!-- Footer Info -->
        <footer class="p-8 border-t border-slate-100 flex items-center justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-white">
            <p>© 2024 Bintang Property Group — Hak Cipta Dilindungi</p>
            <div class="flex gap-6">
                <a class="hover:text-primary transition-colors" href="#">Privasi</a>
                <a class="hover:text-primary transition-colors" href="#">Syarat & Ketentuan</a>
                <a class="hover:text-primary transition-colors" href="#">Catatan Audit</a>
            </div>
        </footer>
    </main>
</body>
</html>
