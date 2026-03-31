@extends('layouts.app')

@section('content')
<!-- Hero Gallery -->
<section class="pt-24 bg-slate-900 relative">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 h-[50vh] md:h-[70vh]">
            <div class="md:col-span-2 h-full rounded-2xl overflow-hidden relative group">
                <img alt="Fasad Bintang Emerald" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" fetchpriority="high"/>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                <div class="absolute bottom-6 left-6 flex gap-3">
                    <span class="bg-emerald-500 text-white text-xs font-bold px-3 py-1 rounded-md uppercase tracking-wider">Tersedia</span>
                    <span class="bg-white/20 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-md border border-white/30">Siap Huni</span>
                </div>
            </div>
            <div class="hidden md:grid grid-rows-2 gap-4 h-full">
                <div class="rounded-2xl overflow-hidden relative group">
                    <img alt="Interior Ruang Tamu" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" loading="lazy"/>
                </div>
                <div class="rounded-2xl overflow-hidden relative group cursor-pointer">
                    <img alt="Kamar Tidur Utama" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvQ1uXSJeU1RNU4uVgSRKq9zUxRJNjEIIgGmPQ07hOulJpcLQ-NaEBStrS-2XFMQ5x12wtbbvTooOl62wUi4BQH0yjxMoJwawFRHdaUK1jcitTvG1qFx9xbBhM0FctOvbQ5zfSuMRZsUgJsAf9AQ7akGi5PykIL_JhPj3W7S8AnRWIUd_kn4ZWilYLGYl27_JdmCMO9IXf623jHyfFJIitel5kiSumXsO1Ch3pMduTKK07A5_5zphU2iX_mxcmjVhdaIBo6Ow5__Q" loading="lazy"/>
                    <div class="absolute inset-0 bg-slate-900/40 group-hover:bg-slate-900/20 transition-colors flex items-center justify-center">
                        <div class="bg-white/20 backdrop-blur-md text-white font-bold px-4 py-2 rounded-lg flex items-center gap-2 border border-white/30">
                            <span class="material-symbols-outlined">photo_library</span> +8 Foto
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-12 bg-slate-50 relative -mt-6 rounded-t-3xl z-20">
    <div class="max-w-screen-xl mx-auto px-8 flex flex-col lg:flex-row gap-12">
        
        <!-- Main Info -->
        <div class="lg:w-2/3">
            <div class="mb-8">
                <div class="flex items-center gap-2 text-slate-500 font-bold uppercase tracking-widest text-xs mb-3">
                    <span class="material-symbols-outlined text-emerald-600 text-sm">location_on</span>
                    Jl. Jamin Ginting, Medan Johor
                </div>
                <h1 class="text-4xl md:text-5xl font-black tracking-tighter text-slate-900 mb-6">Bintang Emerald Residence</h1>
                
                <div class="flex flex-wrap gap-6 py-6 border-y border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <span class="material-symbols-outlined">bed</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Kamar Tidur</p>
                            <p class="text-lg font-black text-slate-900">4 Ruang</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <span class="material-symbols-outlined">bathtub</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Kamar Mandi</p>
                            <p class="text-lg font-black text-slate-900">3 Ruang</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <span class="material-symbols-outlined">square_foot</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-500">Luas Bangunan</p>
                            <p class="text-lg font-black text-slate-900">180 M²</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-12">
                <h2 class="text-2xl font-black tracking-tight text-slate-900 mb-4">Deskripsi Properti</h2>
                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                    <p>Bintang Emerald Residence mendefinisikan ulang kemewahan urban di jantung kota Medan. Didesain oleh arsitek terkemuka, hunian ini memadukan estetika minimalis modern dengan fungsionalitas ruang yang maksimal.</p>
                    <p>Setiap unit dilengkapi dengan sistem sirkulasi udara pintar (cross-ventilation) dan jendela floor-to-ceiling yang memastikan pencahayaan alami sepanjang hari. Material premium seperti marmer impor dan kayu solid digunakan untuk memberikan sentuhan akhir yang elegan.</p>
                    <p>Fasilitas perumahan mencakup sistem keamanan pintar 24 jam, kolam renang infinity bergaya resort, pusat kebugaran, dan taman bermain anak yang dikelilingi lanskap hijau yang asri.</p>
                </div>
            </div>

            <div class="mb-12">
                <h2 class="text-2xl font-black tracking-tight text-slate-900 mb-6">Fasilitas Unggulan</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">security</span>
                        <span class="text-sm font-bold text-slate-700">Keamanan 24 Jam</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">pool</span>
                        <span class="text-sm font-bold text-slate-700">Clubhouse & Kolam</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">park</span>
                        <span class="text-sm font-bold text-slate-700">Taman Tematik</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">ev_station</span>
                        <span class="text-sm font-bold text-slate-700">Smart Home Ready</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">local_cafe</span>
                        <span class="text-sm font-bold text-slate-700">Area Komersial</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">garage</span>
                        <span class="text-sm font-bold text-slate-700">Carport 2 Mobil</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Sidebar -->
        <aside class="lg:w-1/3">
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 sticky top-24">
                <div class="text-center mb-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Harga Perdana Mulai</p>
                    <p class="text-4xl font-black text-emerald-600 tracking-tighter">Rp 1,85 M</p>
                    <p class="text-sm text-slate-400 mt-2">Estimasi cicilan: Rp 14 Jt/bln</p>
                </div>
                
                <hr class="border-slate-100 mb-6"/>
                
                <h3 class="font-bold text-slate-900 mb-4">Jadwalkan Kunjungan</h3>
                <form class="space-y-4 mb-6">
                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 transition-all" placeholder="Nama Lengkap" type="text"/>
                    <input class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 transition-all" placeholder="Nomor Telepon/WA" type="tel"/>
                    <div class="relative">
                        <input class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 transition-all cursor-pointer" type="date"/>
                    </div>
                    <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-4 rounded-xl font-bold uppercase tracking-wider text-sm transition-all shadow-lg shadow-emerald-600/30">
                        Pesan Jadwal
                    </button>
                </form>
                
                <div class="flex items-center justify-center gap-2">
                    <span class="text-xs text-slate-500">Atau hubungi via</span>
                    <a href="https://wa.me/6281200000000" target="_blank" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">chat</span> WhatsApp
                    </a>
                </div>
            </div>
        </aside>
    </div>
</section>
@endsection
