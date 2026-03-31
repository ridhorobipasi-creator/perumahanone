@extends('layouts.app')

@section('title', 'Katalog Properti | Architectural Curator')

@section('content')
<!-- Main Content Area -->
<main class="pt-32 pb-24 px-8 max-w-screen-2xl mx-auto flex flex-col md:flex-row gap-12">
    <!-- Sidebar Filters -->
    <aside class="w-full md:w-80 shrink-0">
        <div class="sticky top-32 space-y-10">
            <div>
                <h2 class="text-on-surface font-bold text-lg mb-6 tracking-tight">Filter Koleksi</h2>
                
                <!-- Search Input -->
                <div class="relative mb-8">
                    <input class="w-full bg-surface-container-lowest border-0 border-b-2 border-outline-variant/30 focus:border-primary focus:ring-0 px-0 py-3 text-sm transition-all duration-300 placeholder:text-on-surface-variant/50 text-on-surface" placeholder="Cari properti..." type="text"/>
                    <span class="material-symbols-outlined absolute right-0 top-3 text-on-surface-variant/50">search</span>
                </div>

                <!-- Filter Groups -->
                <div class="space-y-8">
                    <!-- House Type -->
                    <section>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-on-surface-variant/60 mb-4">Gaya Arsitektur</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-4 py-2 rounded-full bg-primary text-on-primary text-xs font-medium cursor-pointer">Minimalis</span>
                            <span class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant text-xs font-medium cursor-pointer hover:bg-surface-container-high transition-colors">Klasik</span>
                            <span class="px-4 py-2 rounded-full bg-surface-container-low text-on-surface-variant text-xs font-medium cursor-pointer hover:bg-surface-container-high transition-colors">Komersial</span>
                        </div>
                    </section>

                    <!-- Price Range -->
                    <section>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-on-surface-variant/60 mb-4">Rentang Harga</h3>
                        <div class="space-y-4">
                            <input class="w-full h-1 bg-surface-container-highest rounded-lg appearance-none cursor-pointer accent-primary" max="20000000000" min="500000000" step="100000000" type="range"/>
                            <div class="flex justify-between text-xs font-medium text-on-surface-variant">
                                <span>Rp 500 Jt</span>
                                <span>Rp 20 M+</span>
                            </div>
                        </div>
                    </section>

                    <!-- Location -->
                    <section>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-on-surface-variant/60 mb-4">Wilayah (Sumut)</h3>
                        <div class="space-y-2">
                            <label class="flex items-center space-x-3 group cursor-pointer">
                                <input checked class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
                                <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Medan</span>
                            </label>
                            <label class="flex items-center space-x-3 group cursor-pointer">
                                <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
                                <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Deli Serdang</span>
                            </label>
                            <label class="flex items-center space-x-3 group cursor-pointer">
                                <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
                                <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Binjai</span>
                            </label>
                            <label class="flex items-center space-x-3 group cursor-pointer">
                                <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
                                <span class="text-sm text-on-surface group-hover:text-primary transition-colors">Langkat</span>
                            </label>
                        </div>
                    </section>
                </div>
            </div>
            
            <div class="p-6 bg-surface-container-low rounded-xl">
                <p class="text-sm text-on-surface-variant leading-relaxed">
                    Koleksi kurasi mingguan oleh pencari arsitektur kami di Sumatera Utara.
                </p>
                <button class="mt-4 text-primary font-bold text-xs uppercase tracking-widest inline-flex items-center group">
                    Pelajari proses seleksi
                    <span class="material-symbols-outlined text-sm ml-1 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
            </div>
        </div>
    </aside>

    <!-- Listing Grid -->
    <section class="flex-1">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h1 class="text-4xl font-bold tracking-tight text-on-surface mb-2">Properti Pilihan</h1>
                <p class="text-on-surface-variant text-lg">Menampilkan 12 dari 48 properti sesuai estetika Anda.</p>
            </div>
            <div class="flex items-center space-x-4 border-b border-outline-variant/30 pb-2">
                <span class="text-xs font-bold uppercase tracking-widest text-on-surface-variant/60">Urutkan</span>
                <select class="bg-transparent border-0 text-sm font-semibold text-primary focus:ring-0 py-0 pl-0 pr-8">
                    <option>Terbaru</option>
                    <option>Harga: Tertinggi</option>
                    <option>Harga: Terendah</option>
                    <option>Luas Bangunan</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-16">
            <!-- Property Card 1 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="block">
                <article class="group cursor-pointer">
                    <div class="relative aspect-[16/10] overflow-hidden rounded-full mb-6">
                        <img alt="Griya Asri Medan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4-1PU9iEk0mVlmMkLhBSYnZ1TzL-yfLKZNORXr1TeWjBv5Gd_dPf_mBBUZ5ATicnQJ0vs5FYcp7Ji3kSIuymMQ0M4kjg2Qj4FZAV0vK8dE5a-whr4ydAlJCNdT6GRZqWoQZJCHKgJ-66WigzxmwTyqRbmwFqTBjybWiAiTNE6MkaRc1bNp_G-_6LAWUjbpLtzeMS2AjTWlOPD41cdrF5B9XmfjCtQYArQ9y2Y0lpvyJkjn3X8ULi4lEAdWIQO0mqlbJnoEgIS2pY"/>
                        <div class="absolute top-6 left-6 px-4 py-1 bg-white/80 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-primary">
                            Listing Baru
                        </div>
                    </div>
                    <div class="px-2">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-2xl font-bold text-on-surface">Griya Asri Medan</h3>
                            <span class="text-2xl font-light text-primary tracking-tighter">Rp 2,85 M</span>
                        </div>
                        <p class="text-on-surface-variant mb-6 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            Setiabudi, Medan
                        </p>
                        <div class="flex items-center gap-8 border-t border-surface-container pt-6">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">4 Kamar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">bathtub</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">3 Mandi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">directions_car</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">2 Garasi</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>

            <!-- Property Card 2 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="block">
                <article class="group cursor-pointer translate-y-8">
                    <div class="relative aspect-[16/10] overflow-hidden rounded-full mb-6">
                        <img alt="Perumahan Deli Indah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA1jxRJY50Mg80Zw-goW7IY2-HjtNN-GkB4FXhaNscdagM0aEuVOadYsvcPB0FCTmMh3F0uXQ2iYqUElrizvYEyqLcWoFQonnNotC-FinKTP5uFvoVoJp8hJ7DuFbxFzuSzYy9x7E7B-nECnVjQBTdEn5ga8My8eGewy_HPTfKiG6k8QQtQkiEwhUyewx5-qtGLdmLmKOKKY5xT_jM0a1B5wYSBhpExL9I9-mCyge8gtQGHepe8RJXoKoKHqw2Rqyk9KwKhqa4QozY"/>
                    </div>
                    <div class="px-2">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-2xl font-bold text-on-surface">Perumahan Deli Indah</h3>
                            <span class="text-2xl font-light text-primary tracking-tighter">Rp 4,1 M</span>
                        </div>
                        <p class="text-on-surface-variant mb-6 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            Tanjung Morawa, Deli Serdang
                        </p>
                        <div class="flex items-center gap-8 border-t border-surface-container pt-6">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">3 Kamar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">bathtub</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">4 Mandi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">square_foot</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">320 M²</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>

            <!-- Property Card 3 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="block">
                <article class="group cursor-pointer">
                    <div class="relative aspect-[16/10] overflow-hidden rounded-full mb-6">
                        <img alt="Binjai Resident" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBHJTW9tiV3Q80F0PkWf0s8CapGhfzQmh3utL1gJwB_zvx-ESHazr7hTvh_-FDAqniEe5gkO61yhLL54bbfRmJYrGnzkC_is0xLYuNcd6Y94_Q-55oZ6ij0hVKFCBVwqS0ObfwkaSTuopRoVH_BWJPwuEVugQgWoSrbvgx_FBnjDJxgPSB0LdGmsZc9Jznl9PTMP3O8lMt3AOkfhR-SCVeloCVKGWYR81q0C1zG-UT6jv-wbduMoeT_zHbR-RhV_xjS_sdMRKQBy5Y"/>
                    </div>
                    <div class="px-2">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-2xl font-bold text-on-surface">Binjai Resident</h3>
                            <span class="text-2xl font-light text-primary tracking-tighter">Rp 850 Jt</span>
                        </div>
                        <p class="text-on-surface-variant mb-6 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            Binjai Timur, Binjai
                        </p>
                        <div class="flex items-center gap-8 border-t border-surface-container pt-6">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">2 Kamar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">local_fire_department</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Dapur Luas</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">garage_home</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Taman</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>

            <!-- Property Card 4 -->
            <a href="{{ url('/properties/bintang-emerald') }}" class="block">
                <article class="group cursor-pointer translate-y-8">
                    <div class="relative aspect-[16/10] overflow-hidden rounded-full mb-6">
                        <img alt="Langkat Riverside Villa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpKT61d1isee_DdMIEZk7_7po83sEV9yHOGXo5fILlIBC_d47ryeZEllw4XydWKFS8Qcr5Nj20GnqlzMcK6BwYz8HJfahqNZtUSMu_HoEgGlndRGJ4O7yRt4osoU8Z2Q5FehcF_BStcQMXiOG5wRc65NO1xM12mz3xCYurG_ViTV3EE_SV6RtqG-AtPKDsCzWmDvfFxdidGR_zgH38AYMSgWhg6ztseDkFCLMTsOUK6jZPBVdAX4jMgAxy9bYCbQ93QfZOYRpdSoQ"/>
                    </div>
                    <div class="px-2">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-2xl font-bold text-on-surface">Langkat Riverside Villa</h3>
                            <span class="text-2xl font-light text-primary tracking-tighter">Rp 6,2 M</span>
                        </div>
                        <p class="text-on-surface-variant mb-6 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            Bahorok, Langkat
                        </p>
                        <div class="flex items-center gap-8 border-t border-surface-container pt-6">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">pool</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Kolam</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">bed</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">6 Kamar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center">
                                    <span class="material-symbols-outlined text-secondary text-sm">wine_bar</span>
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Bar</span>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
        </div>

        <!-- Pagination -->
        <div class="mt-24 flex justify-center items-center gap-8">
            <button class="w-12 h-12 rounded-full border border-outline-variant/30 flex items-center justify-center hover:bg-surface-container transition-colors group">
                <span class="material-symbols-outlined text-on-surface-variant group-hover:-translate-x-1 transition-transform">arrow_back</span>
            </button>
            <div class="flex gap-4">
                <span class="text-primary font-black border-b-2 border-primary pb-1">01</span>
                <span class="text-on-surface-variant hover:text-primary transition-colors cursor-pointer">02</span>
                <span class="text-on-surface-variant hover:text-primary transition-colors cursor-pointer">03</span>
                <span class="text-on-surface-variant">...</span>
                <span class="text-on-surface-variant hover:text-primary transition-colors cursor-pointer">08</span>
            </div>
            <button class="w-12 h-12 rounded-full bg-primary text-on-primary flex items-center justify-center hover:opacity-90 transition-opacity group">
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </button>
        </div>
    </section>
</main>
@endsection
