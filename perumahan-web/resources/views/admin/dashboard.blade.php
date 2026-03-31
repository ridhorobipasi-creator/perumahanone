@extends('layouts.admin')

@section('title', 'Dasbor | Admin Bintang')

@section('content')
<div class="p-8 space-y-8">
    <!-- Editorial Header Section -->
    <section class="flex flex-col md:flex-row justify-between items-end gap-6">
        <div>
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-primary mb-2 block">Ringkasan Performa</span>
            <h2 class="text-4xl font-black text-on-surface tracking-tighter">Dasbor Pasar Properti</h2>
        </div>
        <div class="flex gap-3">
            <div class="bg-surface-container-low px-4 py-2 rounded-lg flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                <span class="text-xs font-semibold text-on-surface-variant">Status Pasar: Sedang Berjalan</span>
            </div>
        </div>
    </section>

    <!-- Bento Grid Stats -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Total Units Card -->
        <div class="bg-surface-container-lowest p-6 rounded-3xl shadow-[0_20px_40px_rgba(30,27,28,0.03)] flex flex-col justify-between border-b-4 border-teal-600">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-surface-container rounded-2xl">
                    <span class="material-symbols-outlined text-secondary" data-icon="domain">domain</span>
                </div>
                <span class="text-xs font-bold text-teal-600 bg-teal-50 px-2 py-1 rounded-md">+12%</span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black tracking-tighter text-on-surface">1,284</p>
                <p class="text-xs font-bold uppercase tracking-widest text-secondary mt-1">Total Unit Tersedia</p>
            </div>
        </div>

        <!-- Sold Units Card -->
        <div class="bg-surface-container-lowest p-6 rounded-3xl shadow-[0_20px_40px_rgba(30,27,28,0.03)] flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-surface-container rounded-2xl">
                    <span class="material-symbols-outlined text-secondary" data-icon="sell">sell</span>
                </div>
                <span class="text-xs font-bold text-teal-600 bg-teal-50 px-2 py-1 rounded-md">+5.4%</span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black tracking-tighter text-on-surface">842</p>
                <p class="text-xs font-bold uppercase tracking-widest text-secondary mt-1">Unit Terjual</p>
            </div>
        </div>

        <!-- Active Leads Card -->
        <div class="bg-surface-container-lowest p-6 rounded-3xl shadow-[0_20px_40px_rgba(30,27,28,0.03)] flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-error/10 rounded-2xl">
                    <span class="material-symbols-outlined text-error" data-icon="group">group</span>
                </div>
                <span class="text-xs font-bold text-error bg-error/10 px-2 py-1 rounded-md">-2.1%</span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black tracking-tighter text-on-surface">319</p>
                <p class="text-xs font-bold uppercase tracking-widest text-secondary mt-1">Prospek Aktif</p>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="bg-gradient-to-br from-primary to-primary-container p-6 rounded-3xl shadow-lg shadow-primary/20 flex flex-col justify-between text-white">
            <div class="flex justify-between items-start">
                <div class="p-3 bg-white/20 rounded-2xl">
                    <span class="material-symbols-outlined text-white" data-icon="payments">payments</span>
                </div>
                <span class="text-xs font-bold text-primary-fixed bg-white/20 px-2 py-1 rounded-md">↑ 18%</span>
            </div>
            <div class="mt-4">
                <p class="text-3xl font-black tracking-tighter">Rp 42.8 M</p>
                <p class="text-xs font-bold uppercase tracking-widest text-white/70 mt-1">Total Pendapatan</p>
            </div>
        </div>
    </section>

    <!-- Main Data Visualization & List -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sales Performance Chart (Placeholder UI) -->
        <div class="lg:col-span-2 bg-surface-container-low rounded-3xl p-8 relative overflow-hidden">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-xl font-black tracking-tight text-on-surface">Performa Penjualan</h3>
                    <p class="text-sm font-medium text-secondary">Volume bulanan vs Proyeksi Target</p>
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-surface-container-lowest rounded-md text-xs font-bold uppercase tracking-wider text-on-surface shadow-sm">6 Bulan</button>
                    <button class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-secondary">Tahunan</button>
                </div>
            </div>
            
            <!-- Mock Chart Visualization -->
            <div class="h-64 flex items-end justify-between gap-2 px-2">
                <div class="w-full bg-surface-container-highest rounded-t-lg h-24 relative group hover:bg-primary/20 transition-colors">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-secondary">JAN</span>
                </div>
                <div class="w-full bg-surface-container-highest rounded-t-lg h-40 relative group hover:bg-primary/20 transition-colors">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-secondary">FEB</span>
                </div>
                <div class="w-full bg-primary rounded-t-lg h-56 relative shadow-[0_0_20px_rgba(0,106,100,0.3)]">
                    <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-on-surface text-white text-[10px] px-3 py-1.5 rounded-md font-bold whitespace-nowrap">Rp 8.2 M</div>
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface">MAR</span>
                </div>
                <div class="w-full bg-surface-container-highest rounded-t-lg h-32 relative group hover:bg-primary/20 transition-colors">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-secondary">APR</span>
                </div>
                <div class="w-full bg-surface-container-highest rounded-t-lg h-48 relative group hover:bg-primary/20 transition-colors">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-secondary">MEI</span>
                </div>
                <div class="w-full bg-surface-container-highest rounded-t-lg h-52 relative group hover:bg-primary/20 transition-colors">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-secondary">JUN</span>
                </div>
            </div>
        </div>

        <!-- Recent Activity List -->
        <div class="bg-surface-container-lowest rounded-3xl p-8 shadow-[0_20px_40px_rgba(30,27,28,0.06)] border border-surface-container">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-black tracking-tight text-on-surface">Klien Terbaru</h3>
                <span class="material-symbols-outlined text-secondary cursor-pointer" data-icon="more_vert">more_vert</span>
            </div>
            <div class="space-y-6">
                <!-- Lead Item -->
                <div class="flex gap-4 items-center p-3 hover:bg-surface-container-low rounded-xl transition-colors cursor-pointer">
                    <div class="h-12 w-12 rounded-full overflow-hidden flex-shrink-0">
                        <img alt="Lead" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjvkWmgeKjkdTojb4DwwsBKflHI4SctzScpQI-eMJ49sCZqvIBxfpWKLUC_nO9_ZnR2VvNTKupf8fUPASiYMuB9BO55J2pvtL2cZF7isZ8z5ur8k7Kmbdfp_VL_vN0VwKY6ZKZ8Jl_7UDnXhVQC5Bh4zEAOkqLrTFO6tqoVnd8HJcacqQF_Uhfd-8hRfEnSuGubZiBF-RT_sNQmxZy6S7T9hnN-XAg406RATGbR2ui3Xsr2WUWKuwg9kkv-re6p75ixNNSowYGySc"/>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-on-surface truncate">Budi Santoso</p>
                        <p class="text-xs font-medium text-secondary truncate">Tipe Emerald - Cluster A</p>
                    </div>
                    <div class="text-right flex flex-col justify-center">
                        <span class="text-[10px] font-bold text-primary uppercase bg-primary-container/20 px-2 py-0.5 rounded-sm line-clamp-1">Prospek Minat</span>
                        <p class="text-[10px] font-medium text-slate-400 mt-1">2 mnt lalu</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center p-3 hover:bg-surface-container-low rounded-xl transition-colors cursor-pointer">
                    <div class="h-12 w-12 rounded-full overflow-hidden flex-shrink-0">
                        <img alt="Lead" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApIXs5dsPnnvJ4zPgQV6F6lAQ5z_PawOu-5OGU6E6BnUHtQAAa_LEmZBfKEoYezhsmCGAgAeaKlGe3YyVFFQTvs6HSUgitJZkPk0-wFGnIK41wD3p0u3Txa0xHGwbbpoST9M7evMIlP6r-FyIDLWNfo-TdbHKLpXHWN_b3XhfbqIFg6nvHjx-e2AmgSWA8J0gHocNJ1gACsZktpTHJrU3sK7cadZjv_QqB-fqMj4R8AtyACrxOM1CMT3q61jY1GjZHRpW3vgAloNk"/>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-on-surface truncate">Siti Rahmawati</p>
                        <p class="text-xs font-medium text-secondary truncate">Tipe Ruby - Cluster B</p>
                    </div>
                    <div class="text-right flex flex-col justify-center">
                        <span class="text-[10px] font-bold text-secondary uppercase bg-surface-container px-2 py-0.5 rounded-sm line-clamp-1">Respon Awal</span>
                        <p class="text-[10px] font-medium text-slate-400 mt-1">15 mnt lalu</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center p-3 hover:bg-surface-container-low rounded-xl transition-colors cursor-pointer">
                    <div class="h-12 w-12 rounded-full overflow-hidden flex-shrink-0 bg-primary/10 flex items-center justify-center text-primary font-bold">
                        AW
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-black text-on-surface truncate">Andi Wijaya</p>
                        <p class="text-xs font-medium text-secondary truncate">Ruko Niaga Boulevard</p>
                    </div>
                    <div class="text-right flex flex-col justify-center">
                        <span class="text-[10px] font-bold text-secondary uppercase bg-surface-container px-2 py-0.5 rounded-sm line-clamp-1">Tanya Harga</span>
                        <p class="text-[10px] font-medium text-slate-400 mt-1">1 jam lalu</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-6 py-3 text-xs font-bold uppercase tracking-widest text-primary bg-primary/5 hover:bg-primary/10 transition-colors rounded-xl">
                Lihat Semua Klien
            </button>
        </div>
    </div>

    <!-- Featured Property Status -->
    <section class="space-y-6">
        <h3 class="text-xl font-black tracking-tight text-on-surface">Aset Paling Diminati</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Property Card 1 -->
            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.02)] group border border-surface-container hover:border-primary/20 transition-colors">
                <div class="relative h-56">
                    <img alt="Property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCH_UQLVVd7u_uOb94GxewGGuscTRkh6YxP2JfSACNfism15TgYBNb9jEvDlZZIxeXGrGJMzcVAvlRTWoSsCnAQvLGtNWxEAWs0_6Nm9Qqa09Vxl5sSlADhUd1jmcmmR8YBVw-o8EVIGKqfJIc9rpbMO27yBKC6MrUJlDRSyv0xSZj2xfn0Uj_97BelzphZLYsyhZQpmLHw8jeg1RTll4Qmnimh4t-b7NxDLVQ5-YpIIYQBme44IHK3LFWSM035hDEb3xowDc7jxI"/>
                    <div class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-3 py-1.5 rounded-md uppercase tracking-tighter shadow-sm">98% Terjual</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-lg font-black text-on-surface tracking-tight">Cluster Emerald (Tipe 120)</h4>
                    </div>
                    <span class="text-primary font-black text-xl block mb-4">Rp 1.450.000.000</span>
                    <p class="text-xs font-medium text-secondary mb-5 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Johor, Medan Selatan
                    </p>
                    <div class="flex items-center gap-4 bg-surface-container-low p-3 rounded-xl">
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="bed">bed</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">3 K.Tidur</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="bathtub">bathtub</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">2 K.Mandi</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="square_foot">square_foot</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">120m²</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Card 2 -->
            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.02)] group border border-surface-container hover:border-primary/20 transition-colors">
                <div class="relative h-56">
                    <img alt="Property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 grayscale-[0.2]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcCf7EBD7nzA5hoFEUrzFAHGOU5cFTXwIdb8vX0ZQyMCcTUJXUYoW7E4GGane4hPyvBn2a9dSYzgCGyUx7FM1fMBWjB1ehPQjJXs2HooEBPF7DgRrxGl4GF_J2EK6NbVVuyI5ZRLyaaxnP7JoBc-NsKJ4NqsYfQVMRQtDL1SpoSQs2z4SnaFIsiSOgC4MlvHXWvt5OSKdu5e5dpnE-Xj5-z7AC83PCf9fgPuNnfQERR_8RtMg-Ha5QBfqXos68A_tPQIhTunUt2ic"/>
                    <div class="absolute top-4 left-4 bg-error text-white text-[10px] font-bold px-3 py-1.5 rounded-md uppercase tracking-tighter shadow-sm">Habis Terjual</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-lg font-black text-on-surface tracking-tight">Ruko Niaga Boulevard</h4>
                    </div>
                    <span class="text-primary font-black text-xl block mb-4">Rp 2.200.000.000</span>
                    <p class="text-xs font-medium text-secondary mb-5 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Ringroad, Kota Medan
                    </p>
                    <div class="flex items-center gap-4 bg-surface-container-low p-3 rounded-xl">
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="layers">layers</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">3 Lantai</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="bathtub">bathtub</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">3 K.Mandi</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="square_foot">square_foot</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">180m²</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Card 3 -->
            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.02)] group border border-primary/20 hover:border-primary/50 transition-colors">
                <div class="relative h-56">
                    <img alt="Property" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCERDWVHwVPOS11b_ap642W5UqeIEeRsrBth_c-D0AFKm8JGuiRbIypWtEOr1fUoRJMBFxb5iLSC1b4VGCThA5Rk7Cbfnk5kXXazmrjmOS3T_9Zrq16WjOI9MNUt4VAtMniEFayzaowwRvjQZl0TyztopCn8U2ylAwS7dLu6zX9Ld_da-wZMbqOCF-KzpKk93EvhC8vexi0IADDuyNq1gyOiP0Gc7WaMNyH6xxi2ByaVRwG6moAC-Tk37uPKFrkNedPXaLJqyzRtOY"/>
                    <div class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-[10px] font-bold px-3 py-1.5 rounded-md uppercase tracking-tighter shadow-sm border border-primary/20">Listing Baru</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-lg font-black text-on-surface tracking-tight">Kavling Ekslusif Toba</h4>
                    </div>
                    <span class="text-primary font-black text-xl block mb-4">Rp 589.000.000</span>
                    <p class="text-xs font-medium text-secondary mb-5 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">location_on</span> Sunggal, Deli Serdang
                    </p>
                    <div class="flex items-center gap-4 bg-surface-container-low p-3 rounded-xl">
                        <div class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="forest">forest</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">Tanah Kosong</span>
                        </div>
                        <div class="flex items-center gap-1.5 ml-auto">
                            <span class="material-symbols-outlined text-[18px] text-primary" data-icon="square_foot">square_foot</span>
                            <span class="text-[11px] font-black uppercase text-on-surface">150m²</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
