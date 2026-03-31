@extends('layouts.app')

@section('title', 'Kontak | Bintang Emerald')

@section('content')
<!-- Contact Hero -->
<section class="bg-slate-900 pt-32 pb-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 32px 32px;"></div>
    <div class="max-w-screen-xl mx-auto px-8 relative z-10 text-center">
        <span class="inline-block py-1 px-3 rounded-full bg-emerald-500/20 text-emerald-300 text-sm font-bold tracking-widest uppercase mb-6 border border-emerald-500/30">Hubungi Kami</span>
        <h1 class="text-white text-5xl md:text-7xl font-black tracking-tighter mb-6 leading-tight">Mari Wujudkan<br/>Hunian Impian Anda</h1>
        <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">Tim spesialis properti kami siap membantu Anda menemukan aset terbaik di Sumatera Utara dengan layanan personal.</p>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-24 bg-slate-50 -mt-10 relative z-20 rounded-t-[3rem]">
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Info Cards -->
            <div class="lg:w-1/3 space-y-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-emerald-500 transition-colors">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <span class="material-symbols-outlined">location_on</span>
                    </div>
                    <h3 class="text-xl font-black tracking-tight text-slate-900 mb-2">Kantor Pusat</h3>
                    <p class="text-slate-600 leading-relaxed mb-4">Jl. Jend. Sudirman No. 123<br/>Medan, Sumatera Utara 20112</p>
                    <a href="#" class="text-sm font-bold uppercase tracking-widest text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                        Lihat Peta <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-emerald-500 transition-colors">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <span class="material-symbols-outlined">call</span>
                    </div>
                    <h3 class="text-xl font-black tracking-tight text-slate-900 mb-2">Kontak Langsung</h3>
                    <div class="space-y-3">
                        <p class="flex items-center gap-3 text-slate-600">
                            <span class="material-symbols-outlined text-slate-400 text-sm">phone</span> +62 61 4567 890
                        </p>
                        <p class="flex items-center gap-3 text-slate-600">
                            <span class="material-symbols-outlined text-slate-400 text-sm">chat</span> +62 812 0000 0000 (WA)
                        </p>
                        <p class="flex items-center gap-3 text-slate-600">
                            <span class="material-symbols-outlined text-slate-400 text-sm">mail</span> hello@bintang-emerald.co.id
                        </p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-emerald-500 transition-colors">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-6">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <h3 class="text-xl font-black tracking-tight text-slate-900 mb-2">Jam Operasional</h3>
                    <p class="text-slate-600 leading-relaxed">Senin - Jumat: 08.00 - 17.00<br/>Sabtu - Minggu: 09.00 - 15.00</p>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:w-2/3 bg-white p-10 md:p-12 rounded-3xl shadow-xl border border-slate-100">
                <h2 class="text-3xl font-black tracking-tighter text-slate-900 mb-2">Kirim Pesan</h2>
                <p class="text-slate-500 mb-10">Isi formulir di bawah dan tim kami akan segera menghubungi Anda kembali.</p>
                
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-600">Nama Lengkap</label>
                            <input class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="John Doe" type="text"/>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-600">Nomor Telepon</label>
                            <input class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="0812-XXXX-XXXX" type="tel"/>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-600">Alamat Email</label>
                        <input class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all" placeholder="john@example.com" type="email"/>
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-600">Topik Konsultasi</label>
                        <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all cursor-pointer">
                            <option>Pilih topik...</option>
                            <option>Informasi Proyek Baru</option>
                            <option>Kunjungan Lokasi / Show Unit</option>
                            <option>Simulasi KPR & Pembiayaan</option>
                            <option>Kerjasama & Investasi</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-600">Pesan Anda</label>
                        <textarea class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-900 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all min-h-[150px] resize-y" placeholder="Jelaskan kebutuhan Anda secara detail..."></textarea>
                    </div>
                    
                    <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl font-bold uppercase tracking-wider text-sm transition-all shadow-lg shadow-emerald-600/30">
                        Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Simple Map Component -->
<section class="pb-24 bg-slate-50">
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="bg-slate-200 w-full h-[400px] rounded-3xl overflow-hidden relative border border-slate-200 flex items-center justify-center">
            <!-- Placeholder for actual map embed -->
            <div class="absolute inset-0 bg-slate-200 opacity-50" style="background-image: repeating-linear-gradient(45deg, #cbd5e1 25%, transparent 25%, transparent 75%, #cbd5e1 75%, #cbd5e1), repeating-linear-gradient(45deg, #cbd5e1 25%, #e2e8f0 25%, #e2e8f0 75%, #cbd5e1 75%, #cbd5e1); background-position: 0 0, 10px 10px; background-size: 20px 20px;"></div>
            <div class="relative z-10 flex flex-col items-center">
                <span class="material-symbols-outlined text-emerald-600 text-5xl drop-shadow-md mb-2">location_on</span>
                <div class="bg-white px-4 py-2 rounded-lg shadow-md font-bold text-slate-900 text-sm">
                    Bintang Property Group HQ
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
