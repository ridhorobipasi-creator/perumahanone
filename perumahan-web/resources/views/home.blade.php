@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center pt-24 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Rumah arsitektur modern di Sumatera Utara" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDt7Q4Aga0iHKKBbXiumtrWCDPG9Tla69EDL9zrz2_uQ7NVmbbcIsFfARkU0Cz1iQGBVr6nwoHLfeWndonxn8yAEjt2--ihFk5eMq4nXKzbqkoi1KaJO8c8gtvXxcn8RXo8HoH9vgvtcb6lyNQtBz-SLRViL6wg9Fba542YsHAuxNYp-GTBi7h1weNZXgvOWvvtLRChqkX0dO9t6H5JSArHBkjUB2rMTCU_VCC82KGQLcACTTw-R69kNLtMh-lq-dFsgliQjJWRBjI" fetchpriority="high" decoding="async"/>
        <div class="absolute inset-0 bg-gradient-to-r from-on-background/60 via-on-background/20 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
        <div class="max-w-3xl">
            <h1 class="text-white text-6xl md:text-8xl font-black tracking-tighter leading-[0.9] mb-8">
                Wujudkan Hunian Impian di Sumatera Utara
            </h1>
            <!-- Search Component -->
            <div class="bg-surface-container-lowest p-2 rounded-xl premium-shadow flex flex-col md:flex-row gap-2 max-w-2xl">
                <div class="flex-1 flex items-center px-4 py-3 gap-3 border-r border-outline-variant/15">
                    <span class="material-symbols-outlined text-primary">location_on</span>
                    <input class="bg-transparent border-none focus:ring-0 text-on-surface w-full font-medium" placeholder="Lokasi (Medan, Deli Serdang...)" type="text"/>
                </div>
                <div class="flex-1 flex items-center px-4 py-3 gap-3 border-r border-outline-variant/15">
                    <span class="material-symbols-outlined text-primary">home_work</span>
                    <select class="bg-transparent border-none focus:ring-0 text-on-surface w-full font-medium">
                        <option>Tipe Properti</option>
                        <option>Modern Minimalis</option>
                        <option>Residensi Eksklusif</option>
                        <option>Apartemen Urban</option>
                    </select>
                </div>
                <button class="cta-gradient text-on-primary px-8 py-3 rounded-lg font-bold uppercase tracking-wider text-xs flex items-center justify-center gap-2">
                    Cari <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Stats & About Section -->
<section class="bg-surface-container-low py-24">
    <div class="max-w-screen-2xl mx-auto px-8 flex flex-col lg:flex-row items-center gap-20">
        <div class="lg:w-1/2">
            <div class="inline-block px-4 py-1.5 bg-primary-container/20 text-primary-container rounded-full text-xs font-bold tracking-widest uppercase mb-6">
                Bintang Property Group
            </div>
            <h2 class="text-5xl font-black tracking-tighter mb-8 leading-tight">
                Sejak 2011, Membangun Lebih Dari Sekadar Dinding di Sumut.
            </h2>
            <p class="text-on-surface-variant text-lg leading-relaxed mb-12 max-w-xl">
                Architectural Curator bersama Bintang Property Group adalah pengembang visioner yang didedikasikan untuk menciptakan ruang hunian inspiratif di Sumatera Utara. Portofolio kami mencerminkan komitmen terhadap kemewahan berkelanjutan dan integritas struktural.
            </p>
            <div class="grid grid-cols-2 gap-8">
                <div class="p-8 bg-surface-container-lowest rounded-xl premium-shadow border-l-4 border-primary">
                    <div class="text-4xl font-black text-primary mb-2">4200+</div>
                    <div class="text-sm font-bold uppercase tracking-widest text-secondary">Unit Terjual</div>
                </div>
                <div class="p-8 bg-surface-container-lowest rounded-xl premium-shadow border-l-4 border-primary-container">
                    <div class="text-4xl font-black text-primary mb-2">12+</div>
                    <div class="text-sm font-bold uppercase tracking-widest text-secondary">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
        <div class="lg:w-1/2 relative">
            <div class="aspect-[4/5] rounded-full overflow-hidden premium-shadow transform rotate-3">
                <img alt="Interior desain modern" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" loading="lazy" decoding="async"/>
            </div>
            <div class="absolute -bottom-10 -left-10 w-64 h-64 rounded-xl overflow-hidden premium-shadow transform -rotate-6 border-8 border-surface">
                <img alt="Kolam renang mewah hunian Bintang Property" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvQ1uXSJeU1RNU4uVgSRKq9zUxRJNjEIIgGmPQ07hOulJpcLQ-NaEBStrS-2XFMQ5x12wtbbvTooOl62wUi4BQH0yjxMoJwawFRHdaUK1jcitTvG1qFx9xbBhM0FctOvbQ5zfSuMRZsUgJsAf9AQ7akGi5PykIL_JhPj3W7S8AnRWIUd_kn4ZWilYLGYl27_JdmCMO9IXf623jHyfFJIitel5kiSumXsO1Ch3pMduTKK07A5_5zphU2iX_mxcmjVhdaIBo6Ow5__Q" loading="lazy" decoding="async"/>
            </div>
        </div>
    </div>
</section>

<!-- Featured Properties -->
<section class="bg-surface py-24">
    <div class="max-w-screen-2xl mx-auto px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-5xl font-black tracking-tighter mb-4">Proyek Pilihan di Sumut</h2>
                <p class="text-secondary font-medium">Jelajahi pengembangan unggulan kami di seluruh wilayah Sumatera Utara.</p>
            </div>
            <a class="group flex items-center gap-2 text-primary font-bold uppercase tracking-widest text-sm" href="{{ url('/properties') }}">
                Lihat Semua Proyek 
                <span class="w-12 h-px bg-primary group-hover:w-16 transition-all duration-300"></span>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Property Card 1 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-surface-container-lowest rounded-full overflow-hidden premium-shadow transition-transform duration-500 hover:-translate-y-2 block">
                <div class="aspect-[16/10] overflow-hidden">
                    <img alt="Sicoland Green Deli Serdang" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" loading="lazy" decoding="async"/>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight mb-1 text-on-surface">Sicoland Green</h3>
                            <p class="text-secondary text-sm font-medium flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">location_on</span> Deli Serdang, Sumut
                            </p>
                        </div>
                        <div class="bg-primary-container text-white text-[10px] font-black px-2 py-1 rounded-sm uppercase tracking-tighter">Baru</div>
                    </div>
                    <div class="flex gap-6 py-6 border-y border-outline-variant/10 mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">3 Kamar</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-secondary text-sm">bathtub</span>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">2 Kamar Mandi</span>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-primary tracking-tighter">IDR 850 Jt</div>
                </div>
            </a>
            <!-- Property Card 2 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-surface-container-lowest rounded-full overflow-hidden premium-shadow transition-transform duration-500 hover:-translate-y-2 block">
                <div class="aspect-[16/10] overflow-hidden">
                    <img alt="Puri Hamparan Perak" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A" loading="lazy" decoding="async"/>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight mb-1 text-on-surface">Puri Hamparan Perak</h3>
                            <p class="text-secondary text-sm font-medium flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">location_on</span> Area Binjai &amp; Langkat
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6 py-6 border-y border-outline-variant/10 mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">2 Kamar</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-secondary text-sm">square_foot</span>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">45 M²</span>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-primary tracking-tighter">IDR 425 Jt</div>
                </div>
            </a>
            <!-- Property Card 3 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="group bg-surface-container-lowest rounded-full overflow-hidden premium-shadow transition-transform duration-500 hover:-translate-y-2 block">
                <div class="aspect-[16/10] overflow-hidden">
                    <img alt="Bintang Residence Medan" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c" loading="lazy" decoding="async"/>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-black tracking-tight mb-1 text-on-surface">Bintang Residence</h3>
                            <p class="text-secondary text-sm font-medium flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">location_on</span> Kota Medan
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-6 py-6 border-y border-outline-variant/10 mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">4 Kamar</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                <span class="material-symbols-outlined text-secondary text-sm">pool</span>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Kolam Pribadi</span>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-primary tracking-tighter">IDR 1.2 M</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Articles / News Section -->
<section class="bg-surface-container py-24">
    <div class="max-w-screen-2xl mx-auto px-8">
        <h2 class="text-5xl font-black tracking-tighter mb-16">Wawasan Properti</h2>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 h-full md:h-[600px]">
            <!-- Main Article -->
            <div class="md:col-span-7 bg-surface-container-lowest rounded-xl overflow-hidden premium-shadow relative group">
                <img alt="Program Perumahan Rakyat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzHaV6d-PgR4G5UcWmtnzzIgtHCJLcErXL_AoIZ5Uq0F6dgsFp59c7nmLQFebLNVVnNTU90CstXZyz0U37npSxzuZKwjMUaRvPU_asS8REMBXOWrAC0NpvKYn9tJJvzsFwmuljxy33C6vRWpLOJiQYLVpZQm8U962QL01SaM8bxxgBugz5VsYJAPW-6VrWpdy3p9m9cZmAALxeLiJH4YHBS3G_Eyy-lnmb-k6kv_Evn0_DkRiE5-qhqS6MCYl8G_dvwx6DWFGr200" loading="lazy" decoding="async"/>
                <div class="absolute inset-0 bg-gradient-to-t from-on-background/90 via-on-background/20 to-transparent flex flex-col justify-end p-10">
                    <div class="bg-primary px-3 py-1 rounded text-[10px] font-black text-white uppercase tracking-widest mb-4 w-fit">Program Perumahan</div>
                    <h3 class="text-white text-3xl font-bold mb-4 max-w-lg">Program Rumah Subsidi Baru 2024: Panduan Lengkap Untuk Anda</h3>
                    <p class="text-white/70 line-clamp-2 max-w-md">Pemerintah mengumumkan insentif baru bagi pembeli rumah pertama melalui Bintang Property Group.</p>
                </div>
            </div>
            <!-- Secondary Articles -->
            <div class="md:col-span-5 grid grid-rows-2 gap-6">
                <div class="bg-surface-container-lowest rounded-xl p-8 premium-shadow flex flex-col justify-between hover:bg-primary group transition-colors duration-300">
                    <div>
                        <div class="text-[10px] font-black text-primary group-hover:text-primary-fixed uppercase tracking-widest mb-4">Investasi</div>
                        <h4 class="text-xl font-bold group-hover:text-white transition-colors text-on-surface">Mengapa properti tetap menjadi aset teraman dalam pertumbuhan ekonomi Sumatera Utara.</h4>
                    </div>
                    <a class="text-primary group-hover:text-white font-black text-xs uppercase flex items-center gap-2" href="#">
                        Baca Selengkapnya <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </a>
                </div>
                <div class="bg-surface-container-lowest rounded-xl p-8 premium-shadow flex flex-col justify-between hover:bg-primary group transition-colors duration-300">
                    <div>
                        <div class="text-[10px] font-black text-primary group-hover:text-primary-fixed uppercase tracking-widest mb-4">Hunian Hijau</div>
                        <h4 class="text-xl font-bold group-hover:text-white transition-colors text-on-surface">Integrasi arsitektur berkelanjutan dalam pengembangan residensial modern.</h4>
                    </div>
                    <a class="text-primary group-hover:text-white font-black text-xs uppercase flex items-center gap-2" href="#">
                        Baca Selengkapnya <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Consultation CTA -->
<section class="py-24 max-w-screen-2xl mx-auto px-8">
    <div class="bg-primary rounded-[2rem] p-16 relative overflow-hidden flex flex-col lg:flex-row items-center gap-12">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#00b1a7 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="relative z-10 lg:w-2/3 text-center lg:text-left">
            <h2 class="text-white text-5xl font-black tracking-tighter mb-6 leading-tight">Siap Menemukan Rumah Impian Anda?</h2>
            <p class="text-primary-fixed-dim text-xl max-w-xl">Konsultasikan kebutuhan hunian Anda dengan spesialis properti kami dari Bintang Property Group dan dapatkan rencana pembiayaan yang sesuai.</p>
        </div>
        <div class="relative z-10 lg:w-1/3 w-full">
            <div class="bg-white/10 backdrop-blur-xl p-8 rounded-2xl border border-white/10">
                <h3 class="text-white font-bold mb-6 text-center uppercase tracking-widest text-sm">Buletin &amp; Konsultasi Gratis</h3>
                <div class="space-y-4">
                    <input class="w-full bg-white/5 border border-white/20 rounded-lg px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:border-white transition-all" placeholder="Alamat Email Anda" type="email"/>
                    <button class="w-full bg-white text-primary font-black py-4 rounded-lg uppercase tracking-tighter hover:bg-primary-container hover:text-white transition-all duration-300">
                        Jadwalkan Konsultasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
