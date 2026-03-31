@extends('layouts.app')

@section('title', 'Katalog Properti | Architectural Curator')

@section('content')
<!-- Header Minimalis -->
<section class="bg-slate-900 pt-32 pb-16 relative overflow-hidden">
    <div class="max-w-screen-xl mx-auto px-8 relative z-10">
        <h1 class="text-white text-4xl md:text-5xl font-black tracking-tighter mb-4">Katalog Properti</h1>
        <p class="text-slate-400 text-lg max-w-2xl leading-relaxed">Temukan hunian eksklusif yang sesuai dengan gaya hidup dan kebutuhan Anda di Sumatera Utara.</p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-screen-2xl mx-auto px-8 flex flex-col lg:flex-row gap-10">
        <!-- Sidebar Filter -->
        <aside class="lg:w-1/4">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 sticky top-24">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-black tracking-tight text-slate-900">Filter Pencarian</h2>
                    <button class="text-xs font-bold uppercase tracking-widest text-emerald-600 hover:text-emerald-700">Reset</button>
                </div>
                
                <!-- Filter Kategori -->
                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-4">Lokasi</h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500" checked>
                            <span class="text-sm font-medium text-slate-700">Semua Lokasi</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                            <span class="text-sm font-medium text-slate-700">Kota Medan</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                            <span class="text-sm font-medium text-slate-700">Deli Serdang</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                            <span class="text-sm font-medium text-slate-700">Binjai & Langkat</span>
                        </label>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-4">Tipe Properti</h3>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-2 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold uppercase tracking-widest transition-colors">Semua</button>
                        <button class="px-4 py-2 rounded-lg bg-white text-slate-600 border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 text-xs font-bold uppercase tracking-widest transition-colors">Residensi</button>
                        <button class="px-4 py-2 rounded-lg bg-white text-slate-600 border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 text-xs font-bold uppercase tracking-widest transition-colors">Komersial</button>
                        <button class="px-4 py-2 rounded-lg bg-white text-slate-600 border border-slate-200 hover:border-emerald-500 hover:text-emerald-600 text-xs font-bold uppercase tracking-widest transition-colors">Subsidi</button>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-4">Rentang Harga</h3>
                    <div class="space-y-4">
                        <input type="range" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-emerald-500" min="100" max="5000" value="3000">
                        <div class="flex justify-between text-xs font-bold text-slate-600">
                            <span>Rp 100 Jt</span>
                            <span>Rp 5 M+</span>
                        </div>
                    </div>
                </div>
                
                <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-xl font-bold uppercase tracking-wider text-xs transition-all shadow-lg shadow-emerald-600/30">
                    Terapkan Filter
                </button>
            </div>
        </aside>

        <!-- Property Grid -->
        <main class="lg:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <p class="text-sm font-bold text-slate-500">Menampilkan <span class="text-slate-900">12</span> Properti</p>
                <div class="flex items-center gap-3">
                    <label class="text-xs font-bold uppercase tracking-widest text-slate-500">Urutkan:</label>
                    <select class="bg-white border border-slate-200 rounded-lg px-3 py-2 text-sm font-medium text-slate-700 focus:outline-none focus:border-emerald-500">
                        <option>Terbaru</option>
                        <option>Harga: Rendah ke Tinggi</option>
                        <option>Harga: Tinggi ke Rendah</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Property Card 1 -->
                <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden relative">
                        <img alt="Sicoland Green" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" loading="lazy" decoding="async"/>
                        <div class="absolute top-4 left-4 bg-emerald-500 text-white text-[10px] font-black px-3 py-1.5 rounded-md uppercase tracking-wider shadow-sm">Baru</div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-1 text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">
                            <span class="material-symbols-outlined text-[14px]">location_on</span> Deli Serdang
                        </div>
                        <h3 class="text-xl font-black tracking-tight mb-4 text-slate-900 group-hover:text-emerald-600 transition-colors">Sicoland Green</h3>
                        
                        <div class="flex gap-4 py-4 mt-auto border-t border-slate-100">
                            <div class="flex items-center gap-1.5 text-slate-600">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">bed</span>
                                <span class="text-sm font-semibold">3</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-slate-600">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">bathtub</span>
                                <span class="text-sm font-semibold">2</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-slate-600 ml-auto">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">square_foot</span>
                                <span class="text-sm font-semibold">120m²</span>
                            </div>
                        </div>
                        
                        <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Mulai Dari</span>
                            <span class="text-lg font-black text-emerald-600 tracking-tight">Rp 850 Jt</span>
                        </div>
                    </div>
                </a>

                <!-- Property Card 2 -->
                <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col">
                    <div class="aspect-[4/3] overflow-hidden relative">
                        <img alt="Puri Hamparan Perak" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A" loading="lazy" decoding="async"/>
                        <div class="absolute top-4 left-4 bg-slate-900 text-white text-[10px] font-black px-3 py-1.5 rounded-md uppercase tracking-wider shadow-sm">Terjual 80%</div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-1 text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">
                            <span class="material-symbols-outlined text-[14px]">location_on</span> Area Binjai
                        </div>
                        <h3 class="text-xl font-black tracking-tight mb-4 text-slate-900 group-hover:text-emerald-600 transition-colors">Puri Hamparan Perak</h3>
                        
                        <div class="flex gap-4 py-4 mt-auto border-t border-slate-100">
                            <div class="flex items-center gap-1.5 text-slate-600">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">bed</span>
                                <span class="text-sm font-semibold">2</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-slate-600">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">bathtub</span>
                                <span class="text-sm font-semibold">1</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-slate-600 ml-auto">
                                <span class="material-symbols-outlined text-[18px] text-slate-400">square_foot</span>
                                <span class="text-sm font-semibold">45m²</span>
                            </div>
                        </div>
                        
                        <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Mulai Dari</span>
                            <span class="text-lg font-black text-emerald-600 tracking-tight">Rp 425 Jt</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pagination Minimalis -->
            <div class="mt-12 flex justify-center gap-2">
                <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-slate-200 text-slate-400 cursor-not-allowed">
                    <span class="material-symbols-outlined text-sm">chevron_left</span>
                </button>
                <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-emerald-600 text-white font-bold text-sm">1</button>
                <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-slate-200 text-slate-600 hover:border-emerald-500 hover:text-emerald-600 font-bold text-sm transition-colors">2</button>
                <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-slate-200 text-slate-600 hover:border-emerald-500 hover:text-emerald-600 font-bold text-sm transition-colors">3</button>
                <button class="w-10 h-10 rounded-lg flex items-center justify-center border border-slate-200 text-slate-600 hover:border-emerald-500 transition-colors">
                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                </button>
            </div>
        </main>
    </div>
</section>
@endsection
