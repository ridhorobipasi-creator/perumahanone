@extends('layouts.admin')

@section('title', 'Manajemen Properti | Admin Bintang')

@section('content')
<div class="p-8">
    <!-- Breadcrumbs & Title Row -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <nav class="flex gap-2 text-xs font-bold text-slate-400 mb-3 uppercase tracking-widest">
                <a class="hover:text-primary transition-colors" href="{{ url('/admin') }}">Dasbor</a>
                <span>/</span>
                <span class="text-primary-container">Manajemen Properti</span>
            </nav>
            <h2 class="text-4xl font-black text-on-background tracking-tighter">Daftar Properti</h2>
            <p class="text-slate-500 mt-2 max-w-xl font-medium leading-relaxed">Kelola seluruh aset perumahan dan komersial Anda. Perbarui ketersediaan, lacak nilai jual, dan kurasi portofolio terbaik untuk calon pembeli.</p>
        </div>
        <a href="{{ url('/admin/properties/create') }}" class="flex items-center gap-2 px-6 py-3 bg-primary text-white font-bold rounded-lg shadow-lg shadow-primary/20 hover:shadow-xl hover:opacity-90 active:scale-95 transition-all text-sm h-fit">
            <span class="material-symbols-outlined text-xl">add</span>
            Tambah Properti Baru
        </a>
    </div>

    <!-- Stats Bar - Bento Style -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-surface-container-lowest p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
            <p class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-2">Total Aset</p>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-black text-on-background">1,284</span>
                <span class="text-xs font-bold text-teal-600 bg-teal-50 px-2.5 py-1 rounded-md border border-teal-100">+12%</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
            <p class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-2">Listing Aktif</p>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-black text-on-background">842</span>
                <span class="text-xs font-bold text-teal-600 bg-teal-50 px-2.5 py-1 rounded-md border border-teal-100">Stabil</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_rgba(0,0,0,0.02)]">
            <p class="text-[10px] font-bold uppercase tracking-widest text-secondary mb-2">Menunggu Ulasan</p>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-black text-on-background">42</span>
                <span class="text-xs font-bold text-error bg-error-container px-2.5 py-1 rounded-md border border-error/20">+4</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-6 rounded-2xl border border-primary/20 bg-gradient-to-br from-white to-primary/5 shadow-sm">
            <p class="text-[10px] font-bold uppercase tracking-widest text-primary mb-2">Estimasi Nilai Proyek</p>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-black text-primary">Rp 120 M</span>
                <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-md border border-primary/20">+2.4%</span>
            </div>
        </div>
    </div>

    <!-- Filters & Table Container -->
    <div class="bg-surface-container-lowest rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <!-- Filters Row -->
        <div class="p-6 flex flex-wrap items-center justify-between gap-4 border-b border-slate-50">
            <div class="flex items-center gap-2">
                <button class="bg-primary text-white text-xs font-bold px-4 py-2.5 rounded-full shadow-sm transition-all">Semua Properti</button>
                <button class="bg-surface-container-low text-on-surface-variant hover:bg-surface-container text-xs font-bold px-4 py-2.5 rounded-full transition-all">Perumahan</button>
                <button class="bg-surface-container-low text-on-surface-variant hover:bg-surface-container text-xs font-bold px-4 py-2.5 rounded-full transition-all">Ruko / Komersial</button>
                <button class="bg-surface-container-low text-on-surface-variant hover:bg-surface-container text-xs font-bold px-4 py-2.5 rounded-full transition-all">Kaveling Tanah</button>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center gap-2 px-4 py-2.5 text-xs font-bold text-secondary border border-outline-variant/30 rounded-lg hover:bg-slate-50 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[18px]">filter_list</span> Filter Lanjutan
                </button>
                <button class="flex items-center gap-2 px-4 py-2.5 text-xs font-bold text-secondary border border-outline-variant/30 rounded-lg hover:bg-slate-50 hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[18px]">file_download</span> Ekspor (CSV)
                </button>
            </div>
        </div>
        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Rincian Properti</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Lokasi Utama</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Tipe Properti</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Harga Estimasi</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Status Ketersediaan</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($properties as $property)
                    <tr class="hover:bg-primary/5 transition-colors group cursor-pointer {{ $property->status == 'Sold' ? 'bg-slate-50' : '' }}">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-xl overflow-hidden flex-shrink-0 border border-slate-100 {{ !$property->main_image ? 'opacity-60 bg-slate-200' : '' }}">
                                    @if($property->main_image)
                                        <img alt="{{ $property->title }}" class="w-full h-full object-cover" src="{{ $property->main_image }}"/>
                                    @else
                                        <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                            <span class="material-symbols-outlined">image</span>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-black text-sm text-on-background group-hover:text-primary transition-colors">{{ $property->title }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 font-mono mt-1">ID: {{ $property->sku ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-bold text-on-surface">{{ $property->city ?? '-' }}</p>
                            <p class="text-[11px] font-medium text-slate-500 mt-0.5">{{ $property->area ?? '-' }}</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[11px] font-bold text-secondary uppercase tracking-widest flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">{{ str_contains(strtolower($property->category), 'ruko') ? 'storefront' : 'domain' }}</span> {{ $property->category }}</span>
                        </td>
                        <td class="px-6 py-5">
                            <p class="font-black text-sm text-primary">Rp {{ number_format($property->price, 0, ',', '.') }}</p>
                            @if($property->is_featured)
                            <p class="text-[10px] font-bold text-teal-600 mt-0.5">🔥 Hot Properti</p>
                            @endif
                        </td>
                        <td class="px-6 py-5">
                            @if($property->status == 'Tersedia')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-teal-100 text-teal-800 rounded-md text-[10px] font-black uppercase tracking-wider border border-teal-200">
                                <span class="w-1.5 h-1.5 bg-teal-600 rounded-full"></span> {{ $property->status }}
                            </span>
                            @elseif($property->status == 'Terbooking')
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-100 text-amber-800 rounded-md text-[10px] font-black uppercase tracking-wider border border-amber-200">
                                <span class="w-1.5 h-1.5 bg-amber-600 rounded-full"></span> Booking
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-200 text-slate-600 rounded-md text-[10px] font-black uppercase tracking-wider border border-slate-300">
                                <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span> {{ $property->status }}
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex items-center justify-end gap-1">
                                <button class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                                <form action="{{ url('/admin/properties/' . $property->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus aset ini secara permanen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-error hover:bg-error/10 rounded-lg transition-colors"><span class="material-symbols-outlined text-[20px]">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-slate-400">
                                <span class="material-symbols-outlined text-4xl mb-3">folder_open</span>
                                <h3 class="text-sm font-bold text-on-surface">Belum Ada Properti</h3>
                                <p class="text-xs font-medium mt-1">Mulai dengan menambahkan properti pertama Anda ke dalam sistem.</p>
                                <a href="{{ url('/admin/properties/create') }}" class="mt-4 px-4 py-2 bg-primary/10 text-primary font-bold text-xs rounded-lg hover:bg-primary/20 transition-colors">Tambah Baru</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination Footer -->
        <div class="px-6 py-4 flex items-center justify-between border-t border-slate-100 bg-surface-container-lowest">
            <div class="w-full">
                {{ $properties->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>
<!-- Alert handling -->
@if(session('success'))
<div class="fixed bottom-6 right-6 bg-primary text-white px-6 py-4 rounded-xl shadow-2xl z-50 flex items-center gap-3">
    <span class="material-symbols-outlined">check_circle</span>
    <span class="font-bold text-sm">{{ session('success') }}</span>
</div>
<script>
    setTimeout(() => {
        document.querySelector('.fixed.bottom-6').style.display = 'none';
    }, 4000);
</script>
@endif
@endsection
