@extends('layouts.app')

@section('title', 'Katalog Properti | Bintang Property Group')

@section('head')
<style>
    .cat-hero { padding-top: 72px; background: var(--surface); border-bottom: 1px solid var(--border); }
    .cat-hero-inner { max-width: 1440px; margin: 0 auto; padding: 4rem 2rem 3rem; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; }
    .cat-eyebrow { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.75rem; }
    .cat-title { font-family: 'DM Serif Display', serif; font-style: italic; font-size: clamp(2.2rem, 4vw, 3.5rem); color: var(--text); line-height: 1.1; }
    .cat-count { font-size: 0.82rem; font-weight: 600; color: var(--text-muted); }
    .cat-count strong { color: var(--accent); }

    /* Sort bar */
    .sort-bar { background: var(--bg); border-bottom: 1px solid var(--border); padding: 0 2rem; }
    .sort-bar-inner { max-width: 1440px; margin: 0 auto; display: flex; align-items: center; gap: 1rem; height: 52px; overflow-x: auto; }
    .sort-btn { padding: 0.375rem 0.875rem; border-radius: 8px; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase; border: 1px solid var(--border); cursor: pointer; white-space: nowrap; transition: all 0.15s; background: transparent; color: var(--text-muted); }
    .sort-btn.active { background: var(--accent-dim); border-color: var(--accent); color: var(--accent); }
    .sort-btn:hover:not(.active) { border-color: var(--border-hover); color: var(--text); }
    .sort-sep { width: 1px; height: 20px; background: var(--border); flex-shrink: 0; }
    .sort-select { background: var(--bg); border: 1px solid var(--border); border-radius: 8px; color: var(--text); font-size: 0.72rem; font-weight: 700; padding: 0.375rem 0.875rem; outline: none; cursor: pointer; margin-left: auto; }

    /* Main layout */
    .cat-body { background: var(--bg); padding: 2.5rem 2rem 5rem; }
    .cat-inner { max-width: 1440px; margin: 0 auto; display: grid; grid-template-columns: 280px 1fr; gap: 2.5rem; }

    /* Sidebar */
    .filter-sidebar { position: sticky; top: 76px; align-self: flex-start; }
    .filter-card { background: var(--card); border: 1px solid var(--border); border-radius: 20px; padding: 1.75rem; margin-bottom: 1.25rem; }
    .filter-title { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); margin-bottom: 1.25rem; display: flex; justify-content: space-between; align-items: center; }
    .filter-reset { color: var(--accent); font-size: 0.65rem; font-weight: 700; cursor: pointer; border: none; background: none; letter-spacing: 0.1em; text-transform: uppercase; }
    .filter-option { display: flex; align-items: center; gap: 0.75rem; padding: 0.625rem 0; cursor: pointer; border-bottom: 1px solid var(--border2); transition: all 0.15s; }
    .filter-option:last-child { border-bottom: none; padding-bottom: 0; }
    .filter-option input[type=checkbox] { width: 16px; height: 16px; border: 1.5px solid var(--border-hover); border-radius: 4px; appearance: none; cursor: pointer; position: relative; transition: all 0.15s; background: var(--bg); flex-shrink: 0; }
    .filter-option input[type=checkbox]:checked { background: var(--accent); border-color: var(--accent); }
    .filter-option input[type=checkbox]:checked::after { content: '✓'; position: absolute; top: -2px; left: 1px; font-size: 12px; font-weight: 900; color: var(--accent-dark); }
    .filter-option label { font-size: 0.82rem; font-weight: 600; color: var(--text-muted); cursor: pointer; transition: color 0.15s; }
    .filter-option:hover label { color: var(--text); }
    .filter-count { margin-left: auto; font-size: 0.65rem; font-weight: 700; color: var(--text-faint); background: var(--border); border-radius: 100px; padding: 0.1rem 0.5rem; }
    .price-range-wrap { padding-top: 0.5rem; }
    .price-range-row { display: flex; gap: 0.75rem; margin-bottom: 1rem; }
    .price-input { flex: 1; background: var(--bg); border: 1px solid var(--border); border-radius: 10px; padding: 0.625rem 0.75rem; font-size: 0.78rem; font-weight: 700; color: var(--text); outline: none; transition: border-color 0.2s; }
    .price-input:focus { border-color: var(--accent); }

    /* Property Grid */
    .prop-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; }
    .pg-card { background: var(--card); border: 1px solid var(--border); border-radius: 20px; overflow: hidden; text-decoration: none; display: flex; flex-direction: column; transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s; }
    .pg-card:hover { transform: translateY(-5px); border-color: var(--accent); box-shadow: var(--shadow-md); }
    .pg-img { aspect-ratio: 4/3; overflow: hidden; position: relative; }
    .pg-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
    .pg-card:hover .pg-img img { transform: scale(1.06); }
    .pg-badge { position: absolute; top: 0.875rem; left: 0.875rem; padding: 0.275rem 0.7rem; border-radius: 6px; font-size: 0.62rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; }
    .pg-badge.new { background: var(--accent); color: var(--accent-dark); }
    .pg-badge.hot { background: #f59e0b; color: #451a03; }
    .pg-badge.exc { background: #6366f1; color: #fff; }
    .pg-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; }
    .pg-loc { display: flex; align-items: center; gap: 0.375rem; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-muted); margin-bottom: 0.5rem; }
    .pg-loc .material-symbols-rounded { font-size: 13px; color: var(--accent); }
    .pg-name { font-size: 1.1rem; font-weight: 800; color: var(--text); margin-bottom: 1rem; transition: color 0.2s; }
    .pg-card:hover .pg-name { color: var(--accent); }
    .pg-meta { display: flex; gap: 1rem; padding: 0.875rem 0; border-top: 1px solid var(--border); margin-top: auto; }
    .pg-meta-item { display: flex; align-items: center; gap: 0.35rem; font-size: 0.78rem; font-weight: 600; color: var(--text-muted); }
    .pg-meta-item .material-symbols-rounded { font-size: 14px; color: var(--text-faint); }
    .pg-price-row { display: flex; justify-content: space-between; align-items: center; padding-top: 0.875rem; border-top: 1px solid var(--border); }
    .pg-price-label { font-size: 0.62rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-faint); }
    .pg-price { font-size: 1.15rem; font-weight: 800; color: var(--accent); }

    /* Empty */
    .pg-empty { grid-column: 1/-1; text-align: center; padding: 4rem; color: var(--text-muted); }
    .pg-empty .material-symbols-rounded { font-size: 48px; color: var(--border-hover); margin-bottom: 1rem; display: block; }

    /* Pagination */
    .pag-wrap { margin-top: 2.5rem; display: flex; justify-content: center; gap: 0.5rem; }
    .pag-btn { width: 38px; height: 38px; border-radius: 10px; border: 1px solid var(--border); background: var(--card); display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 0.82rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: all 0.15s; }
    .pag-btn.active { background: var(--accent); border-color: var(--accent); color: var(--accent-dark); }
    .pag-btn:hover:not(.active) { border-color: var(--border-hover); color: var(--text); }

    @media(max-width:1200px) { .cat-inner { grid-template-columns: 240px 1fr; } .prop-grid { grid-template-columns: 1fr 1fr; } }
    @media(max-width:900px) { .cat-inner { grid-template-columns: 1fr; } .filter-sidebar { position: static; } }
    @media(max-width:640px) { .prop-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="cat-hero">
    <div class="cat-hero-inner">
        <div>
            <div class="cat-eyebrow">Koleksi Properti</div>
            <h1 class="cat-title">Temukan Hunian<br/>Impian Anda</h1>
        </div>
        <div class="cat-count">
            Menampilkan <strong>{{ $properties->count() }}</strong> dari {{ $properties->total() }} properti
        </div>
    </div>
</div>

<div class="sort-bar">
    <div class="sort-bar-inner">
        <button class="sort-btn active">Semua</button>
        <button class="sort-btn">Perumahan</button>
        <button class="sort-btn">Ruko</button>
        <button class="sort-btn">Kavling</button>
        <div class="sort-sep"></div>
        <button class="sort-btn">Siap Huni</button>
        <button class="sort-btn">Inden</button>
        <select class="sort-select">
            <option>Harga: Rendah – Tinggi</option>
            <option>Harga: Tinggi – Rendah</option>
            <option>Terbaru</option>
            <option>Terpopuler</option>
        </select>
    </div>
</div>

<section class="cat-body">
    <div class="cat-inner">
        <!-- Filters -->
        <aside class="filter-sidebar">
            <div class="filter-card">
                <div class="filter-title">
                    Rentang Harga
                    <button class="filter-reset">Reset</button>
                </div>
                <div class="price-range-wrap">
                    <div class="price-range-row">
                        <input class="price-input" type="text" placeholder="Min (Rp)" value=""/>
                        <input class="price-input" type="text" placeholder="Max (Rp)" value=""/>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="filter-title">Tipe Properti</div>
                <div class="filter-option"><input type="checkbox" id="f-cluster" checked><label for="f-cluster">Cluster Residensial</label><span class="filter-count">48</span></div>
                <div class="filter-option"><input type="checkbox" id="f-ruko"><label for="f-ruko">Ruko / Komersial</label><span class="filter-count">12</span></div>
                <div class="filter-option"><input type="checkbox" id="f-kavling"><label for="f-kavling">Kavling Kosong</label><span class="filter-count">24</span></div>
                <div class="filter-option"><input type="checkbox" id="f-townhouse"><label for="f-townhouse">Townhouse</label><span class="filter-count">8</span></div>
            </div>
            <div class="filter-card">
                <div class="filter-title">Lokasi</div>
                <div class="filter-option"><input type="checkbox" id="l-medan" checked><label for="l-medan">Kota Medan</label><span class="filter-count">32</span></div>
                <div class="filter-option"><input type="checkbox" id="l-deli"><label for="l-deli">Deli Serdang</label><span class="filter-count">24</span></div>
                <div class="filter-option"><input type="checkbox" id="l-binjai"><label for="l-binjai">Binjai</label><span class="filter-count">18</span></div>
                <div class="filter-option"><input type="checkbox" id="l-langkat"><label for="l-langkat">Langkat</label><span class="filter-count">10</span></div>
            </div>
            <div class="filter-card">
                <div class="filter-title">Kamar Tidur</div>
                <div class="filter-option"><input type="checkbox" id="b-1"><label for="b-1">1 Kamar</label></div>
                <div class="filter-option"><input type="checkbox" id="b-2"><label for="b-2">2 Kamar</label></div>
                <div class="filter-option"><input type="checkbox" id="b-3" checked><label for="b-3">3 Kamar</label></div>
                <div class="filter-option"><input type="checkbox" id="b-4"><label for="b-4">4+ Kamar</label></div>
            </div>
        </aside>

        <!-- Grid -->
        <div>
            <div class="prop-grid">
                @forelse($properties as $property)
                <a href="{{ url('/properties/'.$property->slug ?? $property->id) }}" class="pg-card">
                    <div class="pg-img">
                        @if($property->main_image)
                            <img src="{{ $property->main_image }}" alt="{{ $property->title }}" loading="lazy"/>
                        @else
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" alt="{{ $property->title }}" loading="lazy"/>
                        @endif
                        @if($property->is_featured)
                            <div class="pg-badge hot">Hot Properti</div>
                        @elseif($property->status === 'Tersedia')
                            <div class="pg-badge new">Tersedia</div>
                        @else
                            <div class="pg-badge exc">{{ $property->status }}</div>
                        @endif
                    </div>
                    <div class="pg-body">
                        <div class="pg-loc"><span class="material-symbols-rounded">location_on</span>{{ $property->city ?? 'Sumatera Utara' }}</div>
                        <div class="pg-name">{{ $property->title }}</div>
                        <div class="pg-meta">
                            @if($property->bedrooms)<div class="pg-meta-item"><span class="material-symbols-rounded">bed</span>{{ $property->bedrooms }}</div>@endif
                            @if($property->bathrooms)<div class="pg-meta-item"><span class="material-symbols-rounded">bathtub</span>{{ $property->bathrooms }}</div>@endif
                            @if($property->build_size)<div class="pg-meta-item" style="margin-left:auto;"><span class="material-symbols-rounded">square_foot</span>{{ $property->build_size }}m²</div>@endif
                        </div>
                        <div class="pg-price-row">
                            <span class="pg-price-label">Mulai Dari</span>
                            <span class="pg-price">Rp {{ number_format($property->price / 1e6, 0, ',', '.') }} Jt</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="pg-empty">
                    <span class="material-symbols-rounded">search_off</span>
                    <h3 style="font-size:1rem;font-weight:800;color:var(--text);margin-bottom:0.5rem;">Tidak Ada Properti</h3>
                    <p style="font-size:0.82rem;">Coba ubah filter atau kata kunci pencarian Anda.</p>
                </div>
                @endforelse
            </div>

            @if($properties->hasPages())
            <div class="pag-wrap">
                <a href="{{ $properties->previousPageUrl() ?? '#' }}" class="pag-btn">
                    <span class="material-symbols-rounded" style="font-size:18px;">chevron_left</span>
                </a>
                @foreach(range(1, $properties->lastPage()) as $page)
                    <a href="{{ $properties->url($page) }}" class="pag-btn {{ $properties->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
                <a href="{{ $properties->nextPageUrl() ?? '#' }}" class="pag-btn">
                    <span class="material-symbols-rounded" style="font-size:18px;">chevron_right</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
