@extends('layouts.admin')

@section('title', 'Manajemen Properti | Admin Bintang Property')

@section('content')
<style>
    :root {
        --a-card: #11111e; --a-border: rgba(255,255,255,0.06);
        --a-accent: #10d9a0; --a-accent-d: rgba(16,217,160,0.1);
        --a-text: #e8e8f0; --a-muted: #5a5a72;
    }
    .props-page { padding: 2.5rem; }
    .props-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem; }
    .props-breadcrumb { display: flex; align-items: center; gap: 0.5rem; font-size: 0.72rem; color: var(--a-muted); margin-bottom: 0.625rem; }
    .props-breadcrumb a { color: var(--a-muted); text-decoration: none; transition: color 0.15s; }
    .props-breadcrumb a:hover { color: #10d9a0; }
    .props-title { font-size: 2rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.375rem; }
    .props-sub { font-size: 0.875rem; color: var(--a-muted); max-width: 480px; line-height: 1.7; }
    .btn-add {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.75rem 1.5rem; background: #10d9a0; color: #021a12;
        font-size: 0.8rem; font-weight: 800; border: none; border-radius: 12px;
        cursor: pointer; text-decoration: none; transition: background 0.15s, transform 0.15s;
        white-space: nowrap;
    }
    .btn-add:hover { background: #0ffba7; transform: translateY(-1px); }

    /* Stats */
    .props-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
    .ps-card { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; padding: 1.5rem; }
    .ps-card.accent { background: rgba(16,217,160,0.07); border-color: rgba(16,217,160,0.2); }
    .ps-label { font-size: 0.62rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--a-muted); margin-bottom: 0.875rem; }
    .ps-row { display: flex; align-items: center; justify-content: space-between; }
    .ps-val { font-size: 2rem; font-weight: 800; color: var(--a-text); }
    .ps-val.accent { color: #10d9a0; }
    .ps-badge { font-size: 0.65rem; font-weight: 700; padding: 0.2rem 0.625rem; border-radius: 8px; }
    .ps-badge.up { background: rgba(16,217,160,0.12); color: #10d9a0; }
    .ps-badge.warn { background: rgba(248,113,113,0.12); color: #f87171; }

    /* Table Container */
    .table-container { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; overflow: hidden; }
    .table-filters { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--a-border); }
    .filter-tabs { display: flex; gap: 0.5rem; }
    .ftab {
        padding: 0.5rem 1rem; border-radius: 100px;
        font-size: 0.72rem; font-weight: 700; cursor: pointer; border: 1px solid var(--a-border);
        transition: all 0.15s;
    }
    .ftab.active { background: rgba(16,217,160,0.1); border-color: rgba(16,217,160,0.25); color: #10d9a0; }
    .ftab:not(.active) { background: none; color: var(--a-muted); }
    .ftab:not(.active):hover { border-color: rgba(255,255,255,0.12); color: var(--a-text); }
    .table-actions { display: flex; gap: 0.625rem; }
    .tact-btn {
        display: flex; align-items: center; gap: 0.375rem;
        padding: 0.5rem 0.875rem;
        background: rgba(255,255,255,0.04); border: 1px solid var(--a-border);
        border-radius: 8px; color: var(--a-muted);
        font-size: 0.72rem; font-weight: 700; cursor: pointer; transition: all 0.15s;
    }
    .tact-btn:hover { border-color: rgba(255,255,255,0.12); color: var(--a-text); }

    .props-table { width: 100%; border-collapse: collapse; }
    .props-table thead tr { border-bottom: 1px solid var(--a-border); }
    .props-table th { padding: 1rem 1.25rem; font-size: 0.62rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: var(--a-muted); text-align: left; }
    .props-table th:last-child { text-align: right; }
    .props-table tbody tr { border-bottom: 1px solid rgba(255,255,255,0.03); transition: background 0.15s; cursor: pointer; }
    .props-table tbody tr:last-child { border-bottom: none; }
    .props-table tbody tr:hover { background: rgba(255,255,255,0.02); }
    .props-table td { padding: 1rem 1.25rem; }
    .prop-thumb { width: 52px; height: 52px; border-radius: 12px; overflow: hidden; flex-shrink: 0; border: 1px solid var(--a-border); background: rgba(255,255,255,0.04); display: flex; align-items: center; justify-content: center; color: var(--a-muted); }
    .prop-thumb img { width: 100%; height: 100%; object-fit: cover; }
    .prop-tname { font-size: 0.875rem; font-weight: 700; color: var(--a-text); transition: color 0.15s; }
    .props-table tr:hover .prop-tname { color: #10d9a0; }
    .prop-tid { font-size: 0.68rem; font-weight: 600; font-family: monospace; color: var(--a-muted); margin-top: 2px; }
    .prop-city { font-size: 0.875rem; font-weight: 600; color: var(--a-text); }
    .prop-area { font-size: 0.78rem; color: var(--a-muted); margin-top: 2px; }
    .prop-type { display: flex; align-items: center; gap: 0.375rem; font-size: 0.78rem; font-weight: 700; color: var(--a-muted); text-transform: uppercase; letter-spacing: 0.08em; }
    .prop-tprice { font-size: 0.9rem; font-weight: 800; color: #10d9a0; }
    .prop-hot { font-size: 0.68rem; color: rgba(16,217,160,0.7); margin-top: 2px; }
    .status-tag { display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.25rem 0.75rem; border-radius: 8px; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; }
    .status-tag::before { content:''; width:5px; height:5px; border-radius:50%; background:currentColor; }
    .status-tag.available { background: rgba(16,217,160,0.1); color: #10d9a0; border: 1px solid rgba(16,217,160,0.2); }
    .status-tag.booked { background: rgba(251,191,36,0.1); color: #fbbf24; border: 1px solid rgba(251,191,36,0.2); }
    .status-tag.sold { background: rgba(255,255,255,0.05); color: var(--a-muted); border: 1px solid var(--a-border); }
    .t-action-wrap { display: flex; justify-content: flex-end; gap: 0.375rem; }
    .t-act-btn {
        width: 32px; height: 32px; border-radius: 8px; border: 1px solid var(--a-border);
        background: none; display: flex; align-items: center; justify-content: center;
        color: var(--a-muted); cursor: pointer; transition: all 0.15s;
    }
    .t-act-btn.edit:hover { color: #10d9a0; border-color: rgba(16,217,160,0.25); background: rgba(16,217,160,0.06); }
    .t-act-btn.del:hover { color: #f87171; border-color: rgba(248,113,113,0.25); background: rgba(248,113,113,0.06); }
    .empty-state { padding: 4rem 2rem; text-align: center; color: var(--a-muted); }
    .empty-state .material-symbols-rounded { font-size: 40px; margin-bottom: 1rem; color: rgba(255,255,255,0.1); }
    .empty-state h3 { font-size: 0.9rem; font-weight: 700; color: var(--a-text); margin-bottom: 0.375rem; }
    .empty-link { display: inline-flex; margin-top: 1rem; padding: 0.625rem 1.25rem; background: rgba(16,217,160,0.08); border: 1px solid rgba(16,217,160,0.2); border-radius: 10px; color: #10d9a0; font-size: 0.78rem; font-weight: 700; text-decoration: none; }

    .table-footer { padding: 1rem 1.5rem; border-top: 1px solid var(--a-border); }

    /* Success Toast */
    .toast { position: fixed; bottom: 1.5rem; right: 1.5rem; background: rgba(16,217,160,0.12); border: 1px solid rgba(16,217,160,0.3); border-radius: 14px; padding: 1rem 1.5rem; display: flex; align-items: center; gap: 0.75rem; color: #10d9a0; font-size: 0.875rem; font-weight: 700; z-index: 200; backdrop-filter: blur(12px); }

    @media(max-width:1024px) { .props-stats { grid-template-columns: repeat(2, 1fr); } }
    @media(max-width:640px) { .props-stats { grid-template-columns: 1fr 1fr; } .filter-tabs { flex-wrap: wrap; } }
</style>

<div class="props-page">
    <div class="props-header">
        <div>
            <div class="props-breadcrumb">
                <a href="{{ url('/admin') }}">Dasbor</a>
                <span class="material-symbols-rounded" style="font-size:14px;">chevron_right</span>
                <span style="color:rgba(255,255,255,0.4);">Manajemen Properti</span>
            </div>
            <div class="props-title">Daftar Properti</div>
            <div class="props-sub">Kelola seluruh aset perumahan dan komersial. Perbarui ketersediaan, lacak nilai jual, dan kurasi portofolio terbaik.</div>
        </div>
        <a href="{{ url('/admin/properties/create') }}" class="btn-add">
            <span class="material-symbols-rounded" style="font-size:20px;">add</span>
            Tambah Properti Baru
        </a>
    </div>

    <!-- Stats -->
    <div class="props-stats">
        <div class="ps-card">
            <div class="ps-label">Total Aset</div>
            <div class="ps-row">
                <div class="ps-val">1,284</div>
                <span class="ps-badge up">+12%</span>
            </div>
        </div>
        <div class="ps-card">
            <div class="ps-label">Listing Aktif</div>
            <div class="ps-row">
                <div class="ps-val">842</div>
                <span class="ps-badge up">Stabil</span>
            </div>
        </div>
        <div class="ps-card">
            <div class="ps-label">Menunggu Ulasan</div>
            <div class="ps-row">
                <div class="ps-val">42</div>
                <span class="ps-badge warn">+4</span>
            </div>
        </div>
        <div class="ps-card accent">
            <div class="ps-label">Estimasi Nilai Proyek</div>
            <div class="ps-row">
                <div class="ps-val accent">Rp 120M</div>
                <span class="ps-badge up">+2.4%</span>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="table-container">
        <div class="table-filters">
            <div class="filter-tabs">
                <button class="ftab active">Semua Properti</button>
                <button class="ftab">Perumahan</button>
                <button class="ftab">Ruko</button>
                <button class="ftab">Kaveling</button>
            </div>
            <div class="table-actions">
                <button class="tact-btn">
                    <span class="material-symbols-rounded" style="font-size:16px;">filter_list</span>
                    Filter Lanjutan
                </button>
                <button class="tact-btn">
                    <span class="material-symbols-rounded" style="font-size:16px;">file_download</span>
                    Ekspor CSV
                </button>
            </div>
        </div>
        <div style="overflow-x:auto;">
            <table class="props-table">
                <thead>
                    <tr>
                        <th>Rincian Properti</th>
                        <th>Lokasi</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($properties as $property)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:1rem;">
                                <div class="prop-thumb">
                                    @if($property->main_image)
                                        <img src="{{ $property->main_image }}" alt="{{ $property->title }}"/>
                                    @else
                                        <span class="material-symbols-rounded" style="font-size:22px;">image</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="prop-tname">{{ $property->title }}</div>
                                    <div class="prop-tid">ID: {{ $property->sku ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="prop-city">{{ $property->city ?? '-' }}</div>
                            <div class="prop-area">{{ $property->area ?? '-' }}</div>
                        </td>
                        <td>
                            <div class="prop-type">
                                <span class="material-symbols-rounded" style="font-size:16px;">{{ str_contains(strtolower($property->category), 'ruko') ? 'storefront' : 'apartment' }}</span>
                                {{ $property->category }}
                            </div>
                        </td>
                        <td>
                            <div class="prop-tprice">Rp {{ number_format($property->price, 0, ',', '.') }}</div>
                            @if($property->is_featured)
                                <div class="prop-hot">🔥 Hot Properti</div>
                            @endif
                        </td>
                        <td>
                            @if($property->status == 'Tersedia')
                                <span class="status-tag available">Tersedia</span>
                            @elseif($property->status == 'Terbooking')
                                <span class="status-tag booked">Booking</span>
                            @else
                                <span class="status-tag sold">{{ $property->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="t-action-wrap">
                                <button class="t-act-btn edit"><span class="material-symbols-rounded" style="font-size:16px;">edit</span></button>
                                <form action="{{ url('/admin/properties/'.$property->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus aset ini secara permanen?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="t-act-btn del"><span class="material-symbols-rounded" style="font-size:16px;">delete</span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <span class="material-symbols-rounded">folder_open</span>
                                <h3>Belum Ada Properti</h3>
                                <p>Mulai dengan menambahkan properti pertama ke dalam sistem.</p>
                                <a href="{{ url('/admin/properties/create') }}" class="empty-link">Tambah Baru</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="table-footer">
            {{ $properties->links('pagination::tailwind') }}
        </div>
    </div>
</div>

@if(session('success'))
<div class="toast" id="toast">
    <span class="material-symbols-rounded">check_circle</span>
    {{ session('success') }}
</div>
<script>
    setTimeout(() => { const t = document.getElementById('toast'); if(t) t.style.display='none'; }, 4000);
</script>
@endif
@endsection
