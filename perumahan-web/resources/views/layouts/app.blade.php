<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Architectural Curator | Bintang Property Group')</title>
    <meta name="description" content="Architectural Curator dari Bintang Property Group menghadirkan hunian modern dan berkelas di Sumatera Utara. Jelajahi proyek, konsultasi, dan solusi pembiayaan.">
    <meta name="theme-color" content="#006a64">
    <meta property="og:title" content="Architectural Curator | Bintang Property Group">
    <meta property="og:description" content="Hunian modern, berkelas, dan berkelanjutan di Sumatera Utara.">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Architectural Curator">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    @php
        $manifestPath = public_path('build/manifest.json');
    @endphp
    @if (file_exists($manifestPath))
        @php $m = json_decode(file_get_contents($manifestPath), true); @endphp
        @if(isset($m['resources/css/app.css']['file']))
            <link rel="stylesheet" href="{{ url('/build/'.$m['resources/css/app.css']['file']) }}"/>
        @endif
        @if(isset($m['resources/js/app.js']['file']))
            <script type="module" src="{{ url('/build/'.$m['resources/js/app.js']['file']) }}" defer></script>
        @endif
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fff8f8; color: #1e1b1c; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-nav { backdrop-filter: blur(24px); }
        .premium-shadow { box-shadow: 0 20px 40px rgba(30, 27, 28, 0.06); }
        .cta-gradient { background: linear-gradient(135deg, #006a64 0%, #00b1a7 100%); }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased">
    <!-- Top Navigation Shell -->
    <nav class="fixed top-0 w-full z-50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-sm dark:shadow-none">
        <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
            <div class="text-2xl font-bold tracking-tighter text-[#006a64] dark:text-[#00b1a7]">
                <a href="{{ url('/') }}">Architectural Curator</a>
            </div>
            <div class="hidden lg:flex items-center gap-6">
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase {{ request()->is('/') ? 'text-[#006a64] dark:text-[#00b1a7] font-bold border-b-2 border-[#006a64] pb-1' : 'text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors' }}" href="{{ url('/') }}">Beranda</a>
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors" href="#">Tentang Kami</a>
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase {{ request()->is('properties*') ? 'text-[#006a64] dark:text-[#00b1a7] font-bold border-b-2 border-[#006a64] pb-1' : 'text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors' }}" href="{{ url('/properties') }}">Proyek</a>
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors" href="#">Promo</a>
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors" href="#">Tim Bintang</a>
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors" href="#">Artikel</a>
                <a class="font-['Inter'] tracking-tight text-sm font-medium uppercase {{ request()->is('contact*') ? 'text-[#006a64] dark:text-[#00b1a7] font-bold border-b-2 border-[#006a64] pb-1' : 'text-slate-600 dark:text-slate-400 hover:text-[#006a64] transition-colors' }}" href="{{ url('/contact') }}">Hubungi Kami</a>
            </div>
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex gap-3">
                    <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:opacity-80 transition-all duration-300">search</span>
                    <a href="{{ url('/admin') }}"><span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:opacity-80 transition-all duration-300">admin_panel_settings</span></a>
                </div>
                <button class="cta-gradient text-on-primary px-5 py-2 rounded-md font-medium text-sm transition-transform scale-95 active:scale-100">
                    Konsultasi Gratis
                </button>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer Shell -->
    <footer class="bg-[#f5eced] dark:bg-slate-800 w-full border-t-0">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 px-12 py-20 max-w-screen-2xl mx-auto">
            <div class="col-span-1 md:col-span-1">
                <div class="text-xl font-bold text-[#1e1b1c] dark:text-white mb-4">Architectural Curator</div>
                <div class="text-xs font-bold text-primary mb-2 uppercase tracking-widest">Bintang Property Group</div>
                <p class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400">
                    Mentransformasi real estate menjadi perjalanan editorial. Sejak 2011, menghadirkan kemewahan terpercaya di setiap meter persegi di Sumatera Utara.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-on-surface mb-6 uppercase tracking-widest text-xs">Navigasi</h4>
                <ul class="space-y-4">
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="{{ url('/properties') }}">Proyek Kami</a></li>
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="#">Tentang Kami</a></li>
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="#">Artikel</a></li>
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-on-surface mb-6 uppercase tracking-widest text-xs">Informasi</h4>
                <ul class="space-y-4">
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="#">Kebijakan Privasi</a></li>
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="#">Syarat &amp; Ketentuan</a></li>
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="#">Kebijakan Cookie</a></li>
                    <li><a class="font-['Inter'] text-sm leading-relaxed text-slate-500 dark:text-slate-400 hover:text-[#00b1a7] transition-colors underline-offset-4 hover:underline" href="#">Laporan Keberlanjutan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-on-surface mb-6 uppercase tracking-widest text-xs">Ikuti Kami</h4>
                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-primary premium-shadow cursor-pointer hover:bg-primary hover:text-white transition-all">
                        <span class="material-symbols-outlined text-xl">share</span>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-primary premium-shadow cursor-pointer hover:bg-primary hover:text-white transition-all">
                        <span class="material-symbols-outlined text-xl">camera</span>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="font-['Inter'] text-xs leading-relaxed text-slate-500 dark:text-slate-400">
                        © 2024 Architectural Curator. Member of Bintang Property Group. Seluruh hak cipta dilindungi.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
