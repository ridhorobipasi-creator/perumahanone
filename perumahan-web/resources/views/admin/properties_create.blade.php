@extends('layouts.admin')

@section('title', 'Tambah Properti Baru | Admin Bintang')

@section('content')
<div class="p-8">
    <!-- Breadcrumbs & Header -->
    <div class="mb-10">
        <nav class="flex gap-2 text-[11px] font-bold text-slate-400 mb-3 uppercase tracking-widest">
            <a class="hover:text-primary transition-colors" href="{{ url('/admin') }}">Dasbor</a>
            <span>/</span>
            <a class="hover:text-primary transition-colors" href="{{ url('/admin/properties') }}">Manajemen Properti</a>
            <span>/</span>
            <span class="text-primary-container">Tambah Baru</span>
        </nav>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-black text-on-background tracking-tight">Formulir Listing Properti</h2>
                <p class="text-secondary mt-1 font-medium text-sm">Tambahkan data aset baru yang komprehensif untuk disajikan ke pasar.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ url('/admin/properties') }}" class="px-6 py-2.5 rounded-lg text-sm font-bold text-secondary bg-surface-container-highest hover:bg-surface-container-high transition-colors">
                    Batal
                </a>
                <button type="submit" form="createPropertyForm" class="px-6 py-2.5 rounded-lg text-sm font-bold text-white bg-primary shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">publish</span> Publikasi Aset
                </button>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-error-container text-on-error-container p-4 rounded-xl">
            <ul class="list-disc pl-5 text-sm font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main Form Grid -->
    <form id="createPropertyForm" action="{{ url('/admin/properties') }}" method="POST" class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        @csrf
        
        <!-- Left Section (Main Content 2 Columns Wide) -->
        <div class="xl:col-span-2 space-y-8">
            
            <!-- Basic Information Card -->
            <div class="bg-surface-container-lowest rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                <h3 class="text-lg font-black text-on-background flex items-center gap-2 mb-6">
                    <span class="material-symbols-outlined text-primary" data-icon="edit_document">edit_document</span> Informasi Dasar
                </h3>
                
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Nama Properti / Judul Listing</label>
                        <input type="text" name="title" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors font-bold text-on-surface" placeholder="Cth: Cluster Emerald Premium (Tipe 120)">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Deskripsi Aset (Marketing Copy)</label>
                        <textarea name="description" rows="5" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors leading-relaxed text-secondary" placeholder="Jelaskan nilai jual terbaik dari properti ini kepada calon pembeli..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Kategori / Tipe Data</label>
                            <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors font-bold text-on-surface appearance-none">
                                <option value="Perumahan (Cluster)">Perumahan (Cluster)</option>
                                <option value="Ruko / Komersial">Ruko / Komersial</option>
                                <option value="Townhouse">Townhouse</option>
                                <option value="Tanah Kavling Kosong">Tanah Kavling Kosong</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Kode Unit / SKU Internal</label>
                            <input type="text" name="sku" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors font-mono tracking-wider text-primary" placeholder="BNG-EM-120">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Specifications -->
            <div class="bg-surface-container-lowest rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                <h3 class="text-lg font-black text-on-background flex items-center gap-2 mb-6">
                    <span class="material-symbols-outlined text-primary" data-icon="architecture">architecture</span> Spesifikasi Bangunan
                </h3>
                
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Luas Tanah (m²)</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]" data-icon="straighten">straighten</span>
                            <input type="number" name="land_size" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-bold" placeholder="150">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Luas Bangun (m²)</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]" data-icon="square_foot">square_foot</span>
                            <input type="number" name="build_size" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-bold" placeholder="120">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Kamar Tidur</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]" data-icon="bed">bed</span>
                            <input type="number" name="bedrooms" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-bold" placeholder="3">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Kamar Mandi</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[18px]" data-icon="bathtub">bathtub</span>
                            <input type="number" name="bathrooms" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-bold" placeholder="2">
                        </div>
                    </div>
                </div>

                <div class="mt-8 space-y-4">
                    <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Fasilitas Tambahan</label>
                    <div class="flex flex-wrap gap-3">
                        <label class="flex items-center gap-2 bg-slate-50 px-4 py-2 border border-slate-200 rounded-lg cursor-pointer hover:bg-primary/5 transition-colors">
                            <input type="checkbox" name="amenities[]" value="Carport / Garasi" class="rounded text-primary focus:ring-primary/40 border-slate-300">
                            <span class="text-xs font-bold text-on-surface">Carport / Garasi</span>
                        </label>
                        <label class="flex items-center gap-2 bg-slate-50 px-4 py-2 border border-slate-200 rounded-lg cursor-pointer hover:bg-primary/5 transition-colors">
                            <input type="checkbox" name="amenities[]" value="Taman Pribadi" class="rounded text-primary focus:ring-primary/40 border-slate-300">
                            <span class="text-xs font-bold text-on-surface">Taman Pribadi</span>
                        </label>
                        <label class="flex items-center gap-2 bg-slate-50 px-4 py-2 border border-slate-200 rounded-lg cursor-pointer hover:bg-primary/5 transition-colors">
                            <input type="checkbox" name="amenities[]" value="Keamanan 24 Jam" class="rounded text-primary focus:ring-primary/40 border-slate-300">
                            <span class="text-xs font-bold text-on-surface">Keamanan 24 Jam (Cluster)</span>
                        </label>
                        <label class="flex items-center gap-2 bg-slate-50 px-4 py-2 border border-slate-200 rounded-lg cursor-pointer hover:bg-primary/5 transition-colors">
                            <input type="checkbox" name="amenities[]" value="Akses Kolam Renang" class="rounded text-primary focus:ring-primary/40 border-slate-300">
                            <span class="text-xs font-bold text-on-surface">Akses Kolam Renang</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- Location Data -->
            <div class="bg-surface-container-lowest rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                <h3 class="text-lg font-black text-on-background flex items-center gap-2 mb-6">
                    <span class="material-symbols-outlined text-primary" data-icon="location_on">location_on</span> Pemetaan & Lokasi
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Kota / Kabupaten</label>
                        <input type="text" name="city" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-bold" placeholder="Cth: Kota Medan">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Kecamatan / Area</label>
                        <input type="text" name="area" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-bold" placeholder="Cth: Medan Johor">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Alamat Lengkap</label>
                    <textarea name="address" rows="2" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 leading-relaxed font-medium" placeholder="Jalan Boulevard Raya No..."></textarea>
                </div>
            </div>

        </div>

        <!-- Right Section (Sidebar Content 1 Column) -->
        <div class="xl:col-span-1 space-y-8">
            
            <!-- Pricing & Availability -->
            <div class="bg-surface-container-lowest rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
                <h3 class="text-lg font-black text-on-background flex items-center gap-2 mb-6">
                    <span class="material-symbols-outlined text-primary" data-icon="sell">sell</span> Harga & Status
                </h3>
                
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Harga Jual (IDR)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-black text-primary">Rp</span>
                            <input type="number" name="price" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-12 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 font-black text-on-surface" placeholder="1450000000">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary block">Status Ketersediaan Aset</label>
                        
                        <label class="flex items-center justify-between p-4 rounded-xl border cursor-pointer transition-all border-teal-200 bg-teal-50">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-teal-600">check_circle</span>
                                <span class="text-sm font-bold text-teal-900">Tersedia (Bisa Dijual)</span>
                            </div>
                            <input type="radio" name="status" value="Tersedia" checked class="text-teal-600 focus:ring-teal-500 w-4 h-4">
                        </label>
                        
                        <label class="flex items-center justify-between p-4 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-amber-600">book_online</span>
                                <span class="text-sm font-bold text-amber-900">Dipesan (Terbooking)</span>
                            </div>
                            <input type="radio" name="status" value="Terbooking" class="text-primary focus:ring-primary w-4 h-4">
                        </label>
                        
                        <label class="flex items-center justify-between p-4 rounded-xl border border-slate-200 hover:bg-slate-50 cursor-pointer transition-all">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-error">cancel</span>
                                <span class="text-sm font-bold text-error">Habis Terjual (Sold)</span>
                            </div>
                            <input type="radio" name="status" value="Sold" class="text-primary focus:ring-primary w-4 h-4">
                        </label>
                    </div>

                    <div class="pt-6 border-t border-slate-100">
                        <label class="flex items-center gap-3">
                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input type="checkbox" name="is_featured" id="toggle" value="1" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-slate-300"/>
                                <label for="toggle" class="toggle-label block overflow-hidden h-5 rounded-full bg-slate-300 cursor-pointer"></label>
                            </div>
                            <span class="text-xs font-bold text-on-surface">Jadikan Listing Unggulan (Hot Properti)</span>
                        </label>
                        <style>
                            .toggle-checkbox:checked { right: 0; border-color: #00b1a7; }
                            .toggle-checkbox:checked + .toggle-label { background-color: #00b1a7; }
                            .toggle-checkbox { right: 20px; z-index: 1; border-color: #e2e8f0; border-width: 1px; }
                        </style>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
