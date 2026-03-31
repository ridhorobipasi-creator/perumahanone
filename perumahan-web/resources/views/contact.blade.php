@extends('layouts.app')

@section('title', 'Kontak | Architectural Curator')

@section('content')
<main class="pt-32">
    <!-- Hero Section -->
    <section class="px-8 mb-24 max-w-screen-2xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
            <div class="lg:col-span-7">
                <span class="inline-block px-3 py-1 bg-primary-container text-on-primary-container text-[10px] font-bold uppercase tracking-[0.2em] rounded-sm mb-6">
                    Hubungi Kami
                </span>
                <h1 class="text-6xl md:text-8xl font-black tracking-tighter leading-[0.9] text-on-surface mb-8">
                    Mari bangun <br/> <span class="text-primary">warisan</span> Anda bersama.
                </h1>
            </div>
            <div class="lg:col-span-5 pb-4">
                <p class="text-xl text-on-surface-variant leading-relaxed font-light max-w-md">
                    Baik Anda ingin mengakuisisi mahakarya atau mengkurasi portofolio Anda saat ini, pintu kami selalu terbuka untuk percakapan visioner.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact & Form Section -->
    <section class="bg-surface-container-low py-24 px-8">
        <div class="max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-24">
            <!-- Contact Info Column -->
            <div class="space-y-16">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight mb-8">Kantor Kuratorial</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-secondary">
                                <span class="material-symbols-outlined">location_on</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold uppercase tracking-widest text-secondary mb-1">Alamat</p>
                                <p class="text-lg text-on-surface">Jl. Diponegoro No. 428, Madras Hulu<br/>Medan, Sumatera Utara 20152</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-secondary">
                                <span class="material-symbols-outlined">call</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold uppercase tracking-widest text-secondary mb-1">Kontak</p>
                                <p class="text-lg text-on-surface">+62 61 7946 0123<br/>concierge@archcurator.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Consultation Highlight -->
                <div class="bg-primary p-12 rounded-xl text-on-primary relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-4 italic">Konsultasi Utama</h3>
                        <p class="text-primary-fixed/80 mb-8 max-w-sm leading-relaxed">
                            Nikmati panduan khusus melalui portofolio eksklusif kami bersama kurator yang berdedikasi. Konsultasi awal tidak dipungut biaya.
                        </p>
                        <button class="flex items-center gap-3 font-bold uppercase tracking-widest text-sm border-b-2 border-primary-container pb-1 hover:text-primary-container transition-colors">
                            Konsultasi Gratis <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -right-16 -bottom-16 w-64 h-64 border-[32px] border-primary-container/20 rounded-full"></div>
                </div>

                <!-- Social Links -->
                <div>
                    <p class="text-sm font-bold uppercase tracking-widest text-secondary mb-6">Hubungkan Dengan Kami</p>
                    <div class="flex gap-6">
                        <a class="text-on-surface hover:text-primary transition-colors font-medium" href="#">Instagram</a>
                        <a class="text-on-surface hover:text-primary transition-colors font-medium" href="#">LinkedIn</a>
                        <a class="text-on-surface hover:text-primary transition-colors font-medium" href="#">Pinterest</a>
                        <a class="text-on-surface hover:text-primary transition-colors font-medium" href="#">X.com</a>
                    </div>
                </div>
            </div>

            <!-- Form Column -->
            <div class="bg-surface-container-lowest p-12 rounded-xl shadow-2xl shadow-on-surface/5">
                <h3 class="text-2xl font-bold mb-8">Kirim Pertanyaan</h3>
                <form action="#" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-secondary" for="name">Nama Lengkap</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-primary px-0 py-3 text-on-surface placeholder:text-outline-variant transition-all" id="name" placeholder="Johnathan Doe" type="text"/>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-secondary" for="phone">Nomor Telepon</label>
                            <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-primary px-0 py-3 text-on-surface placeholder:text-outline-variant transition-all" id="phone" placeholder="+62 812 0000 0000" type="tel"/>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-secondary" for="email">Alamat Email</label>
                        <input class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-primary px-0 py-3 text-on-surface placeholder:text-outline-variant transition-all" id="email" placeholder="john@example.com" type="email"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-secondary" for="message">Pesan Anda</label>
                        <textarea class="w-full bg-transparent border-0 border-b border-outline-variant/30 focus:ring-0 focus:border-primary px-0 py-3 text-on-surface placeholder:text-outline-variant transition-all resize-none" id="message" placeholder="Ceritakan tentang properti atau proyek yang Anda minati..." rows="4"></textarea>
                    </div>
                    <div class="pt-4">
                        <button class="w-full bg-gradient-to-r from-primary to-primary-container text-on-primary py-5 rounded-md font-bold uppercase tracking-widest text-sm hover:opacity-90 transition-all flex items-center justify-center gap-4" type="submit">
                            Minta Telepon Balik Gratis
                            <span class="material-symbols-outlined">call</span>
                        </button>
                        <p class="text-center text-[10px] text-secondary mt-4 uppercase tracking-tighter">
                            Waktu respons: biasanya dalam 2 jam kerja
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="w-full h-[600px] relative">
        <div class="absolute inset-0 bg-surface-dim overflow-hidden grayscale contrast-125 opacity-60">
            <img alt="Peta minimalis Medan" class="w-full h-full object-cover" data-alt="Modern clean architectural map style of Medan city streets with minimalist teal and white color scheme and soft shadows" data-location="Medan, North Sumatra" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDlP1PQSAvqt0RpifsOtNCf28rWnsfPBlwfvFfbuOxMvVu69Y8DDYiAPjFa4mkF56hQNi0Ft4t6MUIsIjE1ZTaRsAv_mQXfHhxZfpGAO-V12r2kNfuQUbi7PAoK1Js1C6vQ3iaa59lwgZ35hQ5OS41XGlvRa40PTBRfFkIxzHQDbN3VcaFkgpsztC-mu4EKPMkIupZLT52eSML1zflRgQiEsn4iWdMjlyGef0rbf0_anYiXjcM44mEm5gj0Gsz_VlvA5i8LIbfudk" loading="lazy" decoding="async"/>
        </div>
        <!-- Interactive Floating Card -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <div class="bg-white p-6 rounded-xl shadow-2xl flex items-center gap-6 max-w-sm border border-outline-variant/10">
                <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0">
                    <img alt="Gedung kantor Medan" class="w-full h-full object-cover" data-alt="High-end modern glass skyscraper office building in Medan with architectural sharp angles and blue sky reflection" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZM-7lK68eEwkKNnyanAsvCJIlN6NPOdahsZxDGBaoeQo2816qFixo9VkwVZICoucfZbv7Q9c-A66ijeaTO2BRECCnjaFbmuWcNlNFDa816F6YjsXrSyCNvm2F5y1-IvptDVWaI7D1sdTIqswPeGtfApNuaM_UPnkCsbFhZoRr7d-C7g4xpnu0CkSI3bkW5fufunsS6GOtEsXmyV8BQN3wZbNU2R_V1ydY-DkoAhTC4JmF3rD0x15UE1wh0DFWNNX1wVIcg5rDR3o" loading="lazy" decoding="async"/>
                </div>
                <div>
                    <h4 class="font-bold text-on-surface">Galeri Utama Medan</h4>
                    <p class="text-xs text-on-surface-variant mb-2">Buka Sen-Sab: 09:00 - 18:00</p>
                    <a class="text-primary text-xs font-bold uppercase tracking-widest flex items-center gap-1" href="#">
                        Dapatkan Petunjuk <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                    </a>
                </div>
            </div>
            <!-- Pin marker -->
            <div class="mt-4 flex flex-col items-center">
                <div class="w-4 h-4 bg-primary rounded-full border-4 border-white shadow-lg"></div>
                <div class="w-0.5 h-8 bg-gradient-to-b from-primary to-transparent"></div>
            </div>
        </div>
    </section>
</main>
@endsection
