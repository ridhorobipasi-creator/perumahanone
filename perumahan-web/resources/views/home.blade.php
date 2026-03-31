@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[90vh] flex items-center pt-24 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img alt="Rumah arsitektur modern di Sumatera Utara" class="w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDt7Q4Aga0iHKKBbXiumtrWCDPG9Tla69EDL9zrz2_uQ7NVmbbcIsFfARkU0Cz1iQGBVr6nwoHLfeWndonxn8yAEjt2--ihFk5eMq4nXKzbqkoi1KaJO8c8gtvXxcn8RXo8HoH9vgvtcb6lyNQtBz-SLRViL6wg9Fba542YsHAuxNYp-GTBi7h1weNZXgvOWvvtLRChqkX0dO9t6H5JSArHBkjUB2rMTCU_VCC82KGQLcACTTw-R69kNLtMh-lq-dFsgliQjJWRBjI" fetchpriority="high" decoding="async"/>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
        <div class="max-w-4xl">
            <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/20 text-emerald-300 text-sm font-bold tracking-widest uppercase mb-6 border border-emerald-500/30">
                Premium Real Estate
            </span>
            <h1 class="text-white text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter leading-[1.1] mb-8">
                Tingkatkan Standar <br/><span class="text-emerald-400">Gaya Hidup</span> Anda.
            </h1>
            <p class="text-slate-300 text-lg md:text-xl max-w-2xl mb-12 font-light leading-relaxed">
                Koleksi hunian eksklusif di lokasi paling bergengsi Sumatera Utara. Desain visioner bertemu kenyamanan tanpa kompromi.
            </p>
            
            <!-- Modern Search Component -->
            <div class="bg-white p-3 rounded-2xl shadow-2xl flex flex-col md:flex-row gap-3 max-w-3xl border border-slate-100">
                <div class="flex-1 flex items-center px-4 py-3 gap-3 bg-slate-50 rounded-xl border border-slate-100 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all">
                    <span class="material-symbols-outlined text-emerald-600">location_on</span>
                    <input class="bg-transparent border-none focus:ring-0 text-slate-800 w-full font-medium placeholder:text-slate-400" placeholder="Cari lokasi (Medan, Binjai...)" type="text"/>
                </div>
                <div class="flex-1 flex items-center px-4 py-3 gap-3 bg-slate-50 rounded-xl border border-slate-100 focus-within:border-emerald-500 focus-within:ring-2 focus-within:ring-emerald-500/20 transition-all">
                    <span class="material-symbols-outlined text-emerald-600">home_work</span>
                    <select class="bg-transparent border-none focus:ring-0 text-slate-800 w-full font-medium cursor-pointer">
                        <option value="">Semua Tipe</option>
                        <option value="residence">Residensi Mewah</option>
                        <option value="commercial">Komersial</option>
                        <option value="apartment">Apartemen</option>
                    </select>
                </div>
                <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl font-bold uppercase tracking-wider text-sm flex items-center justify-center gap-2 transition-all shadow-lg shadow-emerald-600/30">
                    Cari Properti
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Features / Stats Section -->
<section class="bg-white py-24">
    <div class="max-w-screen-2xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-24 divide-y md:divide-y-0 md:divide-x divide-slate-100">
            <div class="p-6 text-center md:text-left">
                <div class="text-4xl font-black text-slate-900 mb-2">4.2k+</div>
                <div class="text-sm font-bold uppercase tracking-widest text-slate-500">Keluarga Bahagia</div>
            </div>
            <div class="p-6 text-center md:text-left">
                <div class="text-4xl font-black text-slate-900 mb-2">12+</div>
                <div class="text-sm font-bold uppercase tracking-widest text-slate-500">Tahun Pengalaman</div>
            </div>
            <div class="p-6 text-center md:text-left">
                <div class="text-4xl font-black text-slate-900 mb-2">18</div>
                <div class="text-sm font-bold uppercase tracking-widest text-slate-500">Proyek Selesai</div>
            </div>
            <div class="p-6 text-center md:text-left">
                <div class="text-4xl font-black text-emerald-600 mb-2">100%</div>
                <div class="text-sm font-bold uppercase tracking-widest text-slate-500">Kepuasan Klien</div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 relative">
                <div class="aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl">
                    <img alt="Interior desain modern" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" loading="lazy" decoding="async"/>
                </div>
                <div class="absolute -bottom-8 -right-8 bg-white p-6 rounded-2xl shadow-xl max-w-xs hidden md:block border border-slate-100">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600">
                            <span class="material-symbols-outlined">architecture</span>
                        </div>
                        <h4 class="font-bold text-slate-900">Desain Berkelanjutan</h4>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed">Setiap hunian dirancang dengan sirkulasi udara optimal dan pencahayaan alami maksimal.</p>
                </div>
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-sm font-bold text-emerald-600 uppercase tracking-widest mb-3">Tentang Pengembang</h2>
                <h3 class="text-4xl md:text-5xl font-black tracking-tighter text-slate-900 mb-6 leading-tight">
                    Membangun Fondasi Masa Depan Anda.
                </h3>
                <p class="text-slate-600 text-lg leading-relaxed mb-8">
                    Bintang Property Group tidak sekadar membangun rumah. Kami mengkurasi lingkungan hidup yang meningkatkan kualitas hidup Anda. Melalui desain inovatif, material premium, dan lokasi strategis, kami menciptakan aset bernilai tinggi yang bertahan lintas generasi.
                </p>
                <ul class="space-y-4 mb-10">
                    <li class="flex items-center gap-3 text-slate-700 font-medium">
                        <span class="material-symbols-outlined text-emerald-500">check_circle</span> Legalitas Terjamin & Sertifikat Hak Milik
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 font-medium">
                        <span class="material-symbols-outlined text-emerald-500">check_circle</span> Infrastruktur Bawah Tanah Modern
                    </li>
                    <li class="flex items-center gap-3 text-slate-700 font-medium">
                        <span class="material-symbols-outlined text-emerald-500">check_circle</span> Keamanan 24 Jam Terintegrasi Cctv
                    </li>
                </ul>
                <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 border-2 border-slate-900 text-slate-900 hover:bg-slate-900 hover:text-white px-8 py-4 rounded-xl font-bold uppercase tracking-wider text-sm transition-all">
                    Konsultasi Sekarang <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Properties -->
<section class="bg-slate-50 py-24 border-y border-slate-200/60">
    <div class="max-w-screen-2xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="text-sm font-bold text-emerald-600 uppercase tracking-widest mb-3">Koleksi Premium</h2>
                <h3 class="text-4xl md:text-5xl font-black tracking-tighter text-slate-900 mb-4">Proyek Pilihan di Sumut</h3>
                <p class="text-slate-600 text-lg">Jelajahi pengembangan unggulan kami dengan fasilitas terbaik di kelasnya.</p>
            </div>
            <a class="group inline-flex items-center gap-2 text-slate-900 font-bold uppercase tracking-widest text-sm bg-white px-6 py-3 rounded-lg shadow-sm border border-slate-200 hover:border-emerald-500 transition-colors" href="{{ url('/properties') }}">
                Lihat Semua Katalog
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Property Card 1 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col">
                <div class="aspect-[4/3] overflow-hidden relative">
                    <img alt="Sicoland Green Deli Serdang" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" loading="lazy" decoding="async"/>
                    <div class="absolute top-4 left-4 bg-emerald-500 text-white text-[10px] font-black px-3 py-1.5 rounded-md uppercase tracking-wider shadow-sm">
                        Baru Launching
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-1 text-slate-500 text-xs font-bold uppercase tracking-widest mb-3">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Deli Serdang, Sumut
                    </div>
                    <h4 class="text-2xl font-black tracking-tight mb-2 text-slate-900 group-hover:text-emerald-600 transition-colors">Sicoland Green</h4>
                    
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
                        <span class="text-xl font-black text-emerald-600 tracking-tight">Rp 850 Jt</span>
                    </div>
                </div>
            </a>

            <!-- Property Card 2 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col">
                <div class="aspect-[4/3] overflow-hidden relative">
                    <img alt="Puri Hamparan Perak" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A" loading="lazy" decoding="async"/>
                    <div class="absolute top-4 left-4 bg-slate-900 text-white text-[10px] font-black px-3 py-1.5 rounded-md uppercase tracking-wider shadow-sm">
                        Terjual 80%
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-1 text-slate-500 text-xs font-bold uppercase tracking-widest mb-3">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Area Binjai & Langkat
                    </div>
                    <h4 class="text-2xl font-black tracking-tight mb-2 text-slate-900 group-hover:text-emerald-600 transition-colors">Puri Hamparan Perak</h4>
                    
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
                        <span class="text-xl font-black text-emerald-600 tracking-tight">Rp 425 Jt</span>
                    </div>
                </div>
            </a>

            <!-- Property Card 3 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col">
                <div class="aspect-[4/3] overflow-hidden relative">
                    <img alt="Bintang Residence Medan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c" loading="lazy" decoding="async"/>
                    <div class="absolute top-4 left-4 bg-amber-500 text-white text-[10px] font-black px-3 py-1.5 rounded-md uppercase tracking-wider shadow-sm">
                        Eksklusif
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-center gap-1 text-slate-500 text-xs font-bold uppercase tracking-widest mb-3">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Johor, Kota Medan
                    </div>
                    <h4 class="text-2xl font-black tracking-tight mb-2 text-slate-900 group-hover:text-emerald-600 transition-colors">Bintang Residence</h4>
                    
                    <div class="flex gap-4 py-4 mt-auto border-t border-slate-100">
                        <div class="flex items-center gap-1.5 text-slate-600">
                            <span class="material-symbols-outlined text-[18px] text-slate-400">bed</span>
                            <span class="text-sm font-semibold">4</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-600">
                            <span class="material-symbols-outlined text-[18px] text-slate-400">bathtub</span>
                            <span class="text-sm font-semibold">3</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-600 ml-auto">
                            <span class="material-symbols-outlined text-[18px] text-slate-400">pool</span>
                            <span class="text-sm font-semibold">Privat</span>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Mulai Dari</span>
                        <span class="text-xl font-black text-emerald-600 tracking-tight">Rp 1.2 M</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 max-w-screen-2xl mx-auto px-8">
    <div class="bg-slate-900 rounded-[2.5rem] p-12 lg:p-20 relative overflow-hidden flex flex-col lg:flex-row items-center gap-16 shadow-2xl">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 24px 24px;"></div>
        
        <div class="relative z-10 lg:w-3/5 text-center lg:text-left">
            <h2 class="text-white text-4xl md:text-5xl lg:text-6xl font-black tracking-tighter mb-6 leading-tight">
                Amankan Unit Impian Anda Hari Ini.
            </h2>
            <p class="text-slate-400 text-lg md:text-xl max-w-xl mb-10 leading-relaxed mx-auto lg:mx-0">
                Konsultasikan kebutuhan hunian Anda dengan spesialis properti kami. Dapatkan penawaran harga perdana dan skema KPR terbaik.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="{{ url('/contact') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-xl font-bold uppercase tracking-wider text-sm transition-all text-center">
                    Jadwalkan Kunjungan
                </a>
                <a href="https://wa.me/6281200000000" target="_blank" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-8 py-4 rounded-xl font-bold uppercase tracking-wider text-sm transition-all text-center flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">chat</span> Chat WhatsApp
                </a>
            </div>
        </div>
        
        <div class="relative z-10 lg:w-2/5 w-full">
            <div class="bg-white p-8 rounded-3xl shadow-2xl">
                <h3 class="text-slate-900 font-black text-2xl mb-2 tracking-tight">Kalkulator Ringkas</h3>
                <p class="text-slate-500 text-sm mb-6">Estimasi cicilan KPR per bulan</p>
                
                <div class="space-y-5">
                    <div>
                        <label class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-600 mb-2">
                            <span>Harga Properti</span>
                            <span class="text-emerald-600">Rp 850 Jt</span>
                        </label>
                        <input class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-emerald-500" type="range" min="300" max="3000" value="850">
                    </div>
                    <div>
                        <label class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-600 mb-2">
                            <span>Uang Muka (DP)</span>
                            <span class="text-emerald-600">10%</span>
                        </label>
                        <input class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-emerald-500" type="range" min="0" max="50" value="10">
                    </div>
                    <div>
                        <label class="flex justify-between text-xs font-bold uppercase tracking-widest text-slate-600 mb-2">
                            <span>Tenor</span>
                            <span class="text-emerald-600">15 Tahun</span>
                        </label>
                        <input class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-emerald-500" type="range" min="5" max="25" value="15">
                    </div>
                    
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 mt-6 text-center">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-1">Estimasi Cicilan</p>
                        <p class="text-3xl font-black text-slate-900 tracking-tighter">Rp 6,4<span class="text-lg text-slate-500 font-medium"> Jt / bln</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

