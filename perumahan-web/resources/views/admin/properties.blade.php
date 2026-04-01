@extends('layouts.admin')

@section('title', 'Manajemen Properti | Admin Bintang Property')

@section('content')
<style>
    .props-page { padding: 2.5rem; }
    .props-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem; }
    .props-title { font-size: 2rem; font-weight: 800; color: var(--text); }
    .props-sub { font-size: 0.875rem; color: var(--text-muted); margin-top: 0.25rem; }
    .btn-add-prop { display: flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: var(--accent); color: var(--accent-dark); border: none; border-radius: 12px; font-size: 0.82rem; font-weight: 800; letter-spacing: 0.04em; text-decoration: none; transition: background 0.15s, transform 0.15s; }
    .btn-add-prop:hover { background: var(--accent-hover); transform: translateY(-1px); }

    /* Stats */
    .props-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
    .ps-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; padding: 1.25rem 1.5rem; display: flex; align-items: center; gap: 1rem; }
    .ps-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-muted); flex-shrink: 0; }
    .ps-icon.accent { background: var(--accent-dim); color: var(--accent); }
    .ps-icon.warn { background: var(--warning-dim); color: var(--warning); }
    .ps-icon.err { background: var(--error-dim); color: var(--error); }
    .ps-num { font-size: 1.75rem; font-weight: 800; color: var(--text); line-height: 1; }
    .ps-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-muted); margin-top: 2px; }

    /* Filter bar */
    .props-filter-bar { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
    .props-search { display: flex; align-items: center; gap: 0.625rem; background: var(--card); border: 1px solid var(--border); border-radius: 10px; padding: 0.625rem 1rem; flex: 1; min-width: 200px; transition: border-color 0.2s; }
    .props-search:focus-within { border-color: var(--accent); }
    .props-search .material-symbols-rounded { color: var(--text-muted); flex-shrink: 0; font-size: 18px; }
    .props-search input { background: none; border: none; outline: none; color: var(--text); font-size: 0.83rem; font-family: inherit; width: 100%; }
    .props-search input::placeholder { color: var(--text-muted); }
    .props-select { background: var(--card); border: 1px solid var(--border); border-radius: 10px; padding: 0.625rem 1rem; color: var(--text); font-size: 0.78rem; font-weight: 700; outline: none; cursor: pointer; }
    .view-toggle { display: flex; gap: 4px; background: var(--border2); border-radius: 10px; padding: 4px; }
    .vt-btn { width: 34px; height: 34px; border-radius: 7px; border: none; background: transparent; color: var(--text-muted); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.15s; }
    .vt-btn.active { background: var(--card); color: var(--text); }

    /* Table */
    .props-table-wrap { background: var(--card); border: 1px solid var(--border); border-radius: 18px; overflow: hidden; }
    .props-table { width: 100%; border-collapse: collapse; }
    .props-table th { font-size: 0.6rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); padding: 1rem 1.25rem; text-align: left; border-bottom: 1px solid var(--border); white-space: nowrap; }
    .props-table td { padding: 1rem 1.25rem; border-bottom: 1px solid var(--border2); vertical-align: middle; }
    .props-table tbody tr:last-child td { border-bottom: none; }
    .props-table tbody tr { transition: background 0.1s; }
    .props-table tbody tr:hover { background: var(--border2); }
    .prop-thumb-sm { width: 52px; height: 40px; border-radius: 8px; object-fit: cover; flex-shrink: 0; background: var(--border); }
    .prop-name-cell { font-size: 0.875rem; font-weight: 700; color: var(--text); }
    .prop-cat { font-size: 0.68rem; color: var(--text-muted); margin-top: 2px; }
    .prop-price-sm { font-size: 0.875rem; font-weight: 800; color: var(--accent); white-space: nowrap; }
    .prop-badge { font-size: 0.62rem; font-weight: 700; padding: 0.275rem 0.7rem; border-radius: 6px; white-space: nowrap; }
    .pb-available { background: var(--accent-dim); color: var(--accent); }
    .pb-booked { background: var(--warning-dim); color: var(--warning); }
    .pb-sold { background: var(--error-dim); color: var(--error); }
    .prop-act-btns { display: flex; gap: 0.5rem; }
    .pact-btn { height: 30px; padding: 0 0.75rem; border-radius: 7px; border: 1px solid var(--border); background: var(--bg); font-size: 0.68rem; font-weight: 700; color: var(--text-muted); cursor: pointer; display: flex; align-items: center; gap: 0.3rem; transition: all 0.15s; text-decoration: none; white-space: nowrap; }
    .pact-btn:hover { color: var(--accent); border-color: var(--accent); background: var(--accent-dim); }
    .pact-btn.del:hover { color: var(--error); border-color: var(--error); background: var(--error-dim); }
    .pact-btn .material-symbols-rounded { font-size: 14px; }
    .feat-toggle { width: 36px; height: 20px; border-radius: 100px; border: none; cursor: pointer; position: relative; transition: background 0.2s; }
    .feat-toggle::after { content: ''; position: absolute; width: 14px; height: 14px; border-radius: 50%; background: #fff; top: 3px; left: 3px; transition: transform 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
    .feat-toggle.on { background: var(--accent); }
    .feat-toggle.on::after { transform: translateX(16px); }
    .feat-toggle:not(.on) { background: var(--border-hover); }

    /* Empty */
    .props-empty { text-align: center; padding: 4rem 2rem; }
    .props-empty .material-symbols-rounded { font-size: 56px; color: var(--border-hover); display: block; margin-bottom: 1.25rem; }

    @media(max-width:1100px) { .props-stats { grid-template-columns: 1fr 1fr; } }
    @media(max-width:768px) { .props-table th:nth-child(4),.props-table td:nth-child(4) { display:none; } .props-table th:nth-child(5),.props-table td:nth-child(5) { display:none; } .props-page { padding: 1.5rem; } }
</style>

<div class="props-page">
    <div class="props-header">
        <div>
            <div class="props-title">Manajemen Properti</div>
            <div class="props-sub">Kelola semua listing aset yang ditampilkan di platform</div>
        </div>
        <a href="{{ url('/admin/properties/create') }}" class="btn-add-prop">
            <span class="material-symbols-rounded" style="font-size:18px;">add</span>
            Listing Baru
        </a>
    </div>

    <!-- Stats -->
    <div class="props-stats">
        <div class="ps-card"><div class="ps-icon accent"><span class="material-symbols-rounded">apartment</span></div><div><div class="ps-num">92</div><div class="ps-label">Total Listing</div></div></div>
        <div class="ps-card"><div class="ps-icon accent"><span class="material-symbols-rounded">check_circle</span></div><div><div class="ps-num">67</div><div class="ps-label">Tersedia</div></div></div>
        <div class="ps-card"><div class="ps-icon warn"><span class="material-symbols-rounded">book_online</span></div><div><div class="ps-num">18</div><div class="ps-label">Terbooking</div></div></div>
        <div class="ps-card"><div class="ps-icon err"><span class="material-symbols-rounded">cancel</span></div><div><div class="ps-num">7</div><div class="ps-label">Terjual Habis</div></div></div>
    </div>

    <!-- Filter -->
    <div class="props-filter-bar">
        <div class="props-search">
            <span class="material-symbols-rounded">search</span>
            <input type="text" placeholder="Cari nama, lokasi, SKU..."/>
        </div>
        <select class="props-select">
            <option>Semua Tipe</option>
            <option>Perumahan Cluster</option>
            <option>Ruko Komersial</option>
            <option>Kavling Kosong</option>
        </select>
        <select class="props-select">
            <option>Semua Status</option>
            <option>Tersedia</option>
            <option>Terbooking</option>
            <option>Terjual</option>
        </select>
        <select class="props-select">
            <option>Harga: Semua</option>
            <option>&lt; Rp 500 Jt</option>
            <option>Rp 500 Jt – 1 M</option>
            <option>&gt; Rp 1 M</option>
        </select>
        <div class="view-toggle">
            <button class="vt-btn active" title="Tabel"><span class="material-symbols-rounded" style="font-size:18px;">table_rows</span></button>
            <button class="vt-btn" title="Grid"><span class="material-symbols-rounded" style="font-size:18px;">grid_view</span></button>
        </div>
    </div>

    <!-- Table -->
    <div class="props-table-wrap">
        @php
            $propList = [
                ['img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0','name'=>'Sicoland Green Residences','cat'=>'Perumahan (Cluster)','loc'=>'Deli Serdang','price'=>'Rp 850 Jt','status'=>'Tersedia','cls'=>'pb-available','feat'=>true,'sku'=>'SIC-GR-01'],
                ['img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A','name'=>'Puri Hamparan Perak','cat'=>'Perumahan (Cluster)','loc'=>'Binjai','price'=>'Rp 425 Jt','status'=>'Terbooking','cls'=>'pb-booked','feat'=>false,'sku'=>'PHP-02'],
                ['img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c','name'=>'Bintang Emerald Residence','cat'=>'Townhouse','loc'=>'Johor, Medan','price'=>'Rp 1.2 M','status'=>'Tersedia','cls'=>'pb-available','feat'=>true,'sku'=>'BNG-EM-120'],
                ['img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0','name'=>'Ruko Grand Binjai Kota','cat'=>'Ruko / Komersial','loc'=>'Binjai','price'=>'Rp 650 Jt','status'=>'Tersedia','cls'=>'pb-available','feat'=>false,'sku'=>'RKO-GB-03'],
                ['img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A','name'=>'Kavling Langkat Premium','cat'=>'Tanah Kavling','loc'=>'Langkat','price'=>'Rp 220 Jt','status'=>'Terjual','cls'=>'pb-sold','feat'=>false,'sku'=>'KAV-LK-07'],
            ];
        @endphp
        <table class="props-table">
            <thead>
                <tr>
                    <th>Properti</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Unggulan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propList as $p)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.875rem;">
                            <img src="{{ $p['img'] }}" alt="{{ $p['name'] }}" class="prop-thumb-sm">
                            <div>
                                <div class="prop-name-cell">{{ $p['name'] }}</div>
                                <div class="prop-cat">{{ $p['cat'] }} · SKU: {{ $p['sku'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td style="font-size:0.82rem;color:var(--text-muted);">{{ $p['loc'] }}</td>
                    <td><div class="prop-price-sm">{{ $p['price'] }}</div></td>
                    <td><span class="prop-badge {{ $p['cls'] }}">{{ $p['status'] }}</span></td>
                    <td>
                        <button class="feat-toggle {{ $p['feat'] ? 'on' : '' }}" onclick="this.classList.toggle('on')" title="Toggle unggulan"></button>
                    </td>
                    <td>
                        <div class="prop-act-btns">
                            <a href="{{ url('/properties/bintang-emerald') }}" target="_blank" class="pact-btn">
                                <span class="material-symbols-rounded">visibility</span>Preview
                            </a>
                            <a href="#" class="pact-btn">
                                <span class="material-symbols-rounded">edit</span>Edit
                            </a>
                            <form action="{{ url('/admin/properties/1') }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus listing ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="pact-btn del">
                                    <span class="material-symbols-rounded">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if(count($propList) === 0)
        <div class="props-empty">
            <span class="material-symbols-rounded">domain_disabled</span>
            <h3 style="font-size:1rem;font-weight:800;color:var(--text);margin-bottom:0.5rem;">Belum Ada Listing</h3>
            <p style="font-size:0.82rem;color:var(--text-muted);margin-bottom:1.5rem;">Mulai tambahkan aset properti pertama Anda ke platform.</p>
            <a href="{{ url('/admin/properties/create') }}" class="btn-add-prop" style="display:inline-flex;">Tambah Listing Pertama</a>
        </div>
        @endif

        <!-- Pagination -->
        <div style="display:flex;align-items:center;justify-content:space-between;padding:1rem 1.5rem;border-top:1px solid var(--border);">
            <div style="font-size:0.72rem;color:var(--text-muted);font-weight:600;">Menampilkan 1–5 dari 92 listing</div>
            <div style="display:flex;gap:0.5rem;">
                @foreach([1,2,3,'…',10] as $pg)
                <button style="min-width:34px;height:34px;border-radius:8px;border:1px solid {{ $pg==1 ? 'var(--accent)' : 'var(--border)' }};background:{{ $pg==1 ? 'var(--accent)' : 'var(--card)' }};color:{{ $pg==1 ? 'var(--accent-dark)' : 'var(--text-muted)' }};font-size:0.78rem;font-weight:700;cursor:pointer;">{{ $pg }}</button>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
