@extends('layouts.admin')

@section('title', 'Dasbor | Admin Bintang Property')

@section('content')
<style>
    .dash-page { padding: 2.5rem; }
    .dash-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem; }
    .dash-eyebrow { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.375rem; }
    .dash-title { font-size: 2rem; font-weight: 800; color: var(--text); line-height: 1; }
    .status-pill { display: flex; align-items: center; gap: 0.5rem; background: var(--accent-dim); border: 1px solid var(--accent); border-radius: 100px; padding: 0.375rem 1rem; font-size: 0.72rem; font-weight: 700; color: var(--accent); }
    .status-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent); animation: a-pulse 2s infinite; }
    @keyframes a-pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }

    /* Stats */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
    .stat-card { background: var(--card); border: 1px solid var(--border); border-radius: 18px; padding: 1.5rem; display: flex; flex-direction: column; justify-content: space-between; transition: border-color 0.2s, box-shadow 0.2s; }
    .stat-card:hover { border-color: var(--border-hover); box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
    .stat-card.a-accent { background: var(--accent-dim); border-color: var(--accent); }
    .stat-card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.25rem; }
    .stat-icon { width: 40px; height: 40px; border-radius: 12px; background: var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-muted); }
    .stat-icon.a-accent { background: var(--accent-dim); color: var(--accent); }
    .stat-badge { font-size: 0.65rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 6px; }
    .stat-badge.up { background: var(--accent-dim); color: var(--accent); }
    .stat-badge.down { background: var(--error-dim); color: var(--error); }
    .stat-badge.warn { background: var(--warning-dim); color: var(--warning); }
    .stat-value { font-size: 2rem; font-weight: 800; color: var(--text); line-height: 1; margin-bottom: 0.375rem; }
    .stat-value.a-accent { color: var(--accent); }
    .stat-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-muted); }

    /* Layout */
    .main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 2rem; }
    .admin-card { background: var(--card); border: 1px solid var(--border); border-radius: 18px; padding: 1.75rem; overflow: hidden; }
    .card-title-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.75rem; }
    .card-title { font-size: 1rem; font-weight: 800; color: var(--text); }
    .card-link { font-size: 0.72rem; font-weight: 700; color: var(--accent); text-decoration: none; display: flex; align-items: center; gap: 0.25rem; }
    .card-link:hover { opacity: 0.8; }

    /* Chart */
    .chart-wrap { height: 160px; display: flex; align-items: flex-end; gap: 6px; }
    .bar-col { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 6px; }
    .bar-outer { width: 100%; flex: 1; border-radius: 6px 6px 0 0; background: var(--border); display: flex; align-items: flex-end; overflow: hidden; }
    .bar-fill { width: 100%; border-radius: 6px 6px 0 0; background: var(--accent); transition: height 0.8s cubic-bezier(.23,1,.32,1); }
    .bar-fill.dim { background: var(--accent-dim); border: 1px solid var(--accent); }
    .bar-label { font-size: 0.58rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.08em; white-space: nowrap; }
    .chart-legend { display: flex; gap: 1.25rem; margin-top: 1.25rem; }
    .legend-item { display: flex; align-items: center; gap: 0.5rem; font-size: 0.72rem; font-weight: 700; color: var(--text-muted); }
    .legend-dot { width: 8px; height: 8px; border-radius: 50%; }

    /* Client table */
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { font-size: 0.6rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); padding: 0 0 0.875rem; text-align: left; border-bottom: 1px solid var(--border); }
    .data-table td { padding: 1rem 0; border-bottom: 1px solid var(--border2); vertical-align: middle; font-size: 0.82rem; }
    .data-table tr:last-child td { border-bottom: none; }
    .client-cell { display: flex; align-items: center; gap: 0.875rem; }
    .client-avatar { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; font-weight: 800; flex-shrink: 0; }
    .client-name { font-weight: 700; color: var(--text); font-size: 0.875rem; }
    .client-email { font-size: 0.72rem; color: var(--text-muted); margin-top: 2px; }
    .badge { font-size: 0.62rem; font-weight: 700; padding: 0.25rem 0.625rem; border-radius: 6px; white-space: nowrap; }
    .badge-new   { background: var(--accent-dim); color: var(--accent); }
    .badge-hot   { background: var(--warning-dim); color: var(--warning); }
    .badge-sold  { background: var(--error-dim); color: var(--error); }
    .badge-done  { background: rgba(99,102,241,0.12); color: #818cf8; }

    /* Property rows */
    .prop-row { display: flex; align-items: center; gap: 1rem; padding: 0.875rem 0; border-bottom: 1px solid var(--border2); }
    .prop-row:last-child { border-bottom: none; padding-bottom: 0; }
    .prop-thumb { width: 48px; height: 48px; border-radius: 10px; object-fit: cover; flex-shrink: 0; background: var(--border); }
    .prop-row-name { font-size: 0.82rem; font-weight: 700; color: var(--text); margin-bottom: 2px; }
    .prop-row-loc { font-size: 0.68rem; color: var(--text-muted); }
    .prop-row-price { font-size: 0.875rem; font-weight: 800; color: var(--accent); margin-left: auto; white-space: nowrap; }

    /* Quick actions */
    .quick-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem; }
    .quick-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; padding: 1.25rem; display: flex; align-items: center; gap: 1rem; text-decoration: none; transition: all 0.15s; cursor: pointer; }
    .quick-card:hover { border-color: var(--accent); background: var(--accent-dim); }
    .quick-card:hover .qc-icon { background: var(--accent); color: var(--accent-dark); }
    .qc-icon { width: 44px; height: 44px; border-radius: 14px; background: var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-muted); flex-shrink: 0; transition: all 0.15s; }
    .qc-label { font-size: 0.82rem; font-weight: 700; color: var(--text); margin-bottom: 2px; }
    .qc-sub { font-size: 0.68rem; color: var(--text-muted); }

    @media(max-width:1100px) { .stats-grid { grid-template-columns: 1fr 1fr; } .main-grid { grid-template-columns: 1fr; } }
    @media(max-width:640px) { .stats-grid { grid-template-columns: 1fr 1fr; } .quick-grid { grid-template-columns: 1fr; } .dash-page { padding: 1.5rem; } }
</style>

<div class="dash-page">
    <div class="dash-header">
        <div>
            <div class="dash-eyebrow">Panel Manajemen</div>
            <div class="dash-title">Selamat Datang, Admin 👋</div>
        </div>
        <div class="status-pill">
            <div class="status-dot"></div>
            Sistem Aktif
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card a-accent">
            <div class="stat-card-top">
                <div class="stat-icon a-accent"><span class="material-symbols-rounded">apartment</span></div>
                <span class="stat-badge up">+3 baru</span>
            </div>
            <div class="stat-value a-accent">92</div>
            <div class="stat-label">Total Listing Aktif</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon"><span class="material-symbols-rounded">contacts</span></div>
                <span class="stat-badge up">↑ 12%</span>
            </div>
            <div class="stat-value">184</div>
            <div class="stat-label">Total Prospek (Leads)</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon"><span class="material-symbols-rounded">monetization_on</span></div>
                <span class="stat-badge up">↑ 8%</span>
            </div>
            <div class="stat-value">47</div>
            <div class="stat-label">Unit Terjual Tahun Ini</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon"><span class="material-symbols-rounded">schedule</span></div>
                <span class="stat-badge warn">Menunggu</span>
            </div>
            <div class="stat-value">8</div>
            <div class="stat-label">Kunjungan Dijadwalkan</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-grid">
        <a href="{{ url('/admin/properties/create') }}" class="quick-card">
            <div class="qc-icon"><span class="material-symbols-rounded">add_circle</span></div>
            <div><div class="qc-label">Tambah Listing Baru</div><div class="qc-sub">Publish properti ke katalog</div></div>
        </a>
        <a href="{{ url('/admin/leads') }}" class="quick-card">
            <div class="qc-icon"><span class="material-symbols-rounded">mark_email_read</span></div>
            <div><div class="qc-label">Lihat Prospek Baru</div><div class="qc-sub">3 permintaan belum diproses</div></div>
        </a>
        <a href="{{ url('/admin/properties') }}" class="quick-card">
            <div class="qc-icon"><span class="material-symbols-rounded">edit_note</span></div>
            <div><div class="qc-label">Manajemen Properti</div><div class="qc-sub">Edit atau hapus listing</div></div>
        </a>
        <a href="{{ url('/admin/settings') }}" class="quick-card">
            <div class="qc-icon"><span class="material-symbols-rounded">tune</span></div>
            <div><div class="qc-label">Pengaturan Sistem</div><div class="qc-sub">Konfigurasi & keamanan</div></div>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-grid">
        <!-- Sales Chart -->
        <div class="admin-card">
            <div class="card-title-row">
                <div class="card-title">Performa Penjualan 2024</div>
                <select style="background:var(--bg);border:1px solid var(--border);border-radius:8px;color:var(--text);font-size:0.72rem;font-weight:700;padding:0.375rem 0.75rem;outline:none;cursor:pointer;">
                    <option>Per Bulan</option>
                    <option>Per Kuartal</option>
                </select>
            </div>
            <div class="chart-wrap">
                @php
                    $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
                    $vals   = [40,55,35,65,80,60,75,85,70,90,78,95];
                @endphp
                @foreach($months as $i => $m)
                <div class="bar-col">
                    <div class="bar-outer">
                        <div class="bar-fill {{ $i === count($months)-1 ? '' : 'dim' }}" style="height:{{ $vals[$i] }}%"></div>
                    </div>
                    <div class="bar-label">{{ $m }}</div>
                </div>
                @endforeach
            </div>
            <div class="chart-legend">
                <div class="legend-item"><div class="legend-dot" style="background:var(--accent)"></div>Bulan Ini</div>
                <div class="legend-item"><div class="legend-dot" style="background:var(--accent-dim);border:1px solid var(--accent)"></div>Bulan Lalu</div>
            </div>
        </div>

        <!-- Recent Leads -->
        <div class="admin-card">
            <div class="card-title-row">
                <div class="card-title">Prospek Terbaru</div>
                <a href="{{ url('/admin/leads') }}" class="card-link">Lihat Semua <span class="material-symbols-rounded" style="font-size:16px;">arrow_forward</span></a>
            </div>
            <table class="data-table">
                <thead><tr><th>Nama</th><th>Status</th></tr></thead>
                <tbody>
                    @php
                        $leads = [
                            ['name'=>'Rina Sari','email'=>'rina@email.com','color'=>'#10d9a0','bg'=>'rgba(16,217,160,0.12)','initials'=>'RS','badge'=>'Baru','cls'=>'badge-new'],
                            ['name'=>'Budi Hartono','email'=>'budi@email.com','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.12)','initials'=>'BH','badge'=>'Panas','cls'=>'badge-hot'],
                            ['name'=>'Dewi Lestari','email'=>'dewi@email.com','color'=>'#6366f1','bg'=>'rgba(99,102,241,0.12)','initials'=>'DL','badge'=>'Proses','cls'=>'badge-done'],
                            ['name'=>'Ahmad Fauzi','email'=>'ahmad@email.com','color'=>'#10d9a0','bg'=>'rgba(16,217,160,0.12)','initials'=>'AF','badge'=>'Baru','cls'=>'badge-new'],
                        ];
                    @endphp
                    @foreach($leads as $l)
                    <tr>
                        <td>
                            <div class="client-cell">
                                <div class="client-avatar" style="background:{{ $l['bg'] }};color:{{ $l['color'] }};">{{ $l['initials'] }}</div>
                                <div>
                                    <div class="client-name">{{ $l['name'] }}</div>
                                    <div class="client-email">{{ $l['email'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge {{ $l['cls'] }}">{{ $l['badge'] }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Latest Properties -->
    <div class="admin-card">
        <div class="card-title-row">
            <div class="card-title">Properti Terbaru di Katalog</div>
            <a href="{{ url('/admin/properties') }}" class="card-link">Kelola Semua <span class="material-symbols-rounded" style="font-size:16px;">arrow_forward</span></a>
        </div>
        @php
            $props = [
                ['name'=>'Sicoland Green','loc'=>'Deli Serdang','price'=>'Rp 850 Jt','status'=>'Tersedia','cls'=>'badge-new','img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0'],
                ['name'=>'Puri Hamparan Perak','loc'=>'Binjai','price'=>'Rp 425 Jt','status'=>'Terbooking','cls'=>'badge-hot','img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A'],
                ['name'=>'Bintang Residence','loc'=>'Johor, Medan','price'=>'Rp 1.2 M','status'=>'Tersedia','cls'=>'badge-new','img'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c'],
            ];
        @endphp
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;">
            @foreach($props as $p)
            <div class="prop-row" style="border:1px solid var(--border);border-radius:14px;padding:1rem;flex-direction:column;align-items:flex-start;gap:0.75rem;">
                <img src="{{ $p['img'] }}" alt="{{ $p['name'] }}" class="prop-thumb" style="width:100%;height:100px;border-radius:10px;">
                <div>
                    <div class="prop-row-name">{{ $p['name'] }}</div>
                    <div class="prop-row-loc" style="display:flex;align-items:center;gap:4px;margin-top:2px;">
                        <span class="material-symbols-rounded" style="font-size:13px;color:var(--accent);">location_on</span>{{ $p['loc'] }}
                    </div>
                </div>
                <div style="display:flex;align-items:center;justify-content:space-between;width:100%;">
                    <div class="prop-row-price">{{ $p['price'] }}</div>
                    <span class="badge {{ $p['cls'] }}">{{ $p['status'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
