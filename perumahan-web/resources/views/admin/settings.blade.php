@extends('layouts.admin')

@section('title', 'Pengaturan | Admin Bintang')

@section('content')
<!-- Content Canvas -->
<div class="p-8 lg:p-12 max-w-6xl mx-auto">
    <!-- Page Header -->
    <div class="mb-12">
        <h2 class="text-4xl font-black tracking-tight text-on-background mb-2">Pengaturan Sistem</h2>
        <p class="text-secondary font-medium">Kelola profil identitas agensi, preferensi keamanan tingkat lanjut, dan konfigurasi global.</p>
    </div>

    <!-- Bento Layout for Settings -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Navigation/Tabs -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-surface-container-lowest rounded-3xl p-6 shadow-sm border border-slate-100">
                <nav class="space-y-2">
                    <a class="flex items-center justify-between p-3.5 rounded-2xl bg-primary text-white shadow-md shadow-primary/20 group transition-all font-bold text-sm" href="#company">
                        <span class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]" data-icon="business">business</span> Profil Perusahaan
                        </span>
                        <span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-opacity text-[18px] translate-x-2 group-hover:translate-x-0" data-icon="chevron_right">chevron_right</span>
                    </a>
                    <a class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-surface-container-low text-on-surface-variant group transition-all font-bold text-sm" href="#social">
                        <span class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]" data-icon="share">share</span> Media Sosial
                        </span>
                        <span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-opacity text-[18px] text-primary" data-icon="chevron_right">chevron_right</span>
                    </a>
                    <a class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-surface-container-low text-on-surface-variant group transition-all font-bold text-sm" href="#security">
                        <span class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]" data-icon="shield_lock">shield_lock</span> Keamanan & Sandi
                        </span>
                        <span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-opacity text-[18px] text-primary" data-icon="chevron_right">chevron_right</span>
                    </a>
                    <a class="flex items-center justify-between p-3.5 rounded-2xl hover:bg-surface-container-low text-on-surface-variant group transition-all font-bold text-sm" href="#notifications">
                        <span class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]" data-icon="notifications_active">notifications_active</span> Preferensi Notifikasi
                        </span>
                        <span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-opacity text-[18px] text-primary" data-icon="chevron_right">chevron_right</span>
                    </a>
                </nav>
            </div>

            <!-- Small Help Card -->
            <div class="bg-gradient-to-br from-teal-50 to-primary/5 rounded-3xl p-8 relative overflow-hidden border border-teal-100">
                <div class="relative z-10">
                    <h4 class="font-black text-teal-900 mb-2">Butuh Bantuan Teknis?</h4>
                    <p class="text-xs text-secondary-fixed-dim leading-relaxed mb-4 font-medium">Tim manajer akun dedikasi kami siap membantu secara teknis 24/7 di jam kerja operasional.</p>
                    <button class="text-primary text-[10px] font-black uppercase tracking-widest border-b-2 border-primary pb-1 hover:text-teal-900 hover:border-teal-900 transition-colors">Hubungi Layanan Support</button>
                </div>
                <!-- Decorative Icon -->
                <span class="material-symbols-outlined absolute -bottom-4 -right-4 text-8xl text-teal-800/10 rotate-12 pointer-events-none" data-icon="support_agent">support_agent</span>
            </div>
        </div>

        <!-- Right Column: Main Form Area -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Company Information Section -->
            <section class="bg-surface-container-lowest rounded-3xl p-8 lg:p-10 shadow-[0_10px_30px_rgba(0,0,0,0.02)] border border-slate-100 relative overflow-hidden" id="company">
                <div class="absolute top-0 left-0 w-2 h-full bg-primary rounded-l-3xl"></div>
                
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-black text-on-background tracking-tight">Informasi Dasar Bisnis</h3>
                        <p class="text-xs font-medium text-secondary mt-1">Identitas publik dari grup properti Anda yang dapat diakses klien.</p>
                    </div>
                    <span class="bg-primary/10 text-primary text-[9px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full border border-primary/20">Lisensi Enterprise</span>
                </div>
                
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Nama Badan Hukum Bisnis</label>
                            <input class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary/30 text-sm font-bold shadow-inner" type="text" value="PT Bintang Emerald Properti Tbk."/>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">No. Izin Usaha Perdagangan (SIUP)</label>
                            <input class="w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary/30 text-sm font-bold font-mono shadow-inner" type="text" value="RE-990-2134-XY"/>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Alamat Kantor Pusat</label>
                        <textarea class="min-w-full w-full bg-surface-container-low border-none rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary/30 text-sm font-medium leading-relaxed shadow-inner" rows="3">Jalan Ringroad Gagak Hitam No. 88, Suite 402, &#13;Medan Sunggal, Kota Medan, Sumatera Utara 20122</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Email Representatif</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary text-[20px]" data-icon="mail">mail</span>
                                <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/30 text-sm font-bold shadow-inner" type="email" value="kontak@bintang-emerald.co.id"/>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Nomor Telepon Hotline</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary text-[20px]" data-icon="call">call</span>
                                <input class="w-full pl-12 pr-4 py-3.5 bg-surface-container-low border-none rounded-xl focus:ring-2 focus:ring-primary/30 text-sm font-bold font-mono shadow-inner" type="tel" value="+62 61 777 0192"/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Social Media Links -->
            <section class="bg-surface-container-lowest rounded-3xl p-8 lg:p-10 shadow-[0_10px_30px_rgba(0,0,0,0.02)] border border-slate-100" id="social">
                <h3 class="text-xl font-black text-on-background mb-2 tracking-tight">Presensi Media Sosial</h3>
                <p class="text-xs text-secondary mb-8 font-medium">Tautan yang digunakan untuk fitur "Watermark" pada brosur dan panel navigasi footer otomatis.</p>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 group">
                        <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-surface-container-low text-primary border border-slate-100 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined" data-icon="language">language</span>
                        </div>
                        <input class="flex-1 bg-surface-container-low border-none rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-primary/30" placeholder="https://instagram.com/bintangemerald.mdn" type="text" value="https://instagram.com/bintangemerald.mdn"/>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-surface-container-low text-primary border border-slate-100 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined" data-icon="alternate_email">alternate_email</span>
                        </div>
                        <input class="flex-1 bg-surface-container-low border-none rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-primary/30" placeholder="https://linkedin.com/company/bintangemerald" type="text"/>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-surface-container-low text-primary border border-slate-100 group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined" data-icon="movie">movie</span>
                        </div>
                        <input class="flex-1 bg-surface-container-low border-none rounded-xl px-4 py-3 text-sm font-medium focus:ring-2 focus:ring-primary/30" placeholder="https://youtube.com/c/bintangemerald" type="text"/>
                    </div>
                </div>
            </section>

            <!-- User Account / Security Section -->
            <section class="bg-slate-50 rounded-3xl p-8 lg:p-10 border border-slate-200 shadow-inner" id="security">
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow-xl bg-white flex-shrink-0 relative">
                        <div class="absolute inset-0 bg-primary/20 pointer-events-none"></div>
                        <img alt="Profil Pengguna" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfevpJ4tetT6xpXKa7lNlsH5b0etygaHWMLIC3Ozoe1atm3CxnOieP7c1194LuZ1mbLTayAjMAmpspgYounuPg4XB4SRLjpYQFPyhGKzBiiok1gT88XDe02_vxrJorrFRGIUINTV3NuJK2FzNUrqXnsL8Ctr_1Jwj5DTNmtuZNV3xF07TWvwUWIuEtM4bBBgJD6qV_cLmlEG8NRoJfd-7GaeqwvetzlNFa0NFv04g9z31gLSnXt6-ybf88aa1o48rURZduZ6V8uus"/>
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-on-background tracking-tight">Keamanan Akun Pribadi</h3>
                        <p class="text-[11px] text-secondary font-bold uppercase tracking-widest mt-1">Sesi Aktif: <span class="text-primary normal-case font-mono tracking-normal">admin@bintang-emerald.co.id</span></p>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 block">Masukkan Sandi Saat Ini</label>
                            <input class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 focus:border-primary focus:ring-2 focus:ring-primary/20 text-sm font-black text-slate-700 font-mono tracking-widest" type="password" value="secretdummy123"/>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500 block">Sandi Baru (Optional)</label>
                            <input class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3.5 focus:border-primary focus:ring-2 focus:ring-primary/20 text-sm font-medium" placeholder="Kosongkan bila sama" type="password"/>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-5 bg-teal-50 rounded-2xl border border-teal-100 flex items-start gap-4">
                        <span class="material-symbols-outlined text-[24px] text-teal-600 bg-white rounded-full p-2 shadow-sm" data-icon="verified_user">verified_user</span>
                        <div>
                            <h5 class="text-sm font-bold text-teal-900 mb-1">Otentikasi Dua Faktor (2FA) Aktif</h5>
                            <p class="text-[11px] text-teal-800/80 font-medium leading-relaxed">Sistem keamanan ganda "Bintang Emerald Secure" sedang melindungi sesi perangkat ini. OTP akan dikirimkan setiap durasi Token 24 Jam.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <button class="px-6 py-3.5 bg-slate-100 text-slate-500 font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-slate-200 transition-colors">Batalkan</button>
                <button class="px-8 py-3.5 bg-gradient-to-br from-primary to-primary-container text-white font-black text-xs uppercase tracking-widest rounded-xl shadow-lg shadow-primary/30 hover:shadow-xl active:scale-[0.98] transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">save</span> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
