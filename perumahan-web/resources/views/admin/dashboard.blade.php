@extends('layouts.admin')

@section('title', 'Dasbor | Admin Bintang Property')

@section('content')
<style>
    :root {
        --a-bg: #07070d; --a-surface: #0d0d17; --a-card: #11111e;
        --a-border: rgba(255,255,255,0.06); --a-accent: #10d9a0;
        --a-accent-d: rgba(16,217,160,0.1); --a-text: #e8e8f0; --a-muted: #5a5a72;
    }
    .dash-page { padding: 2.5rem; }
    .dash-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem; }
    .dash-eyebrow { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--a-accent); margin-bottom: 0.375rem; }
    .dash-title { font-size: 2rem; font-weight: 800; color: var(--a-text); line-height: 1; }
    .status-pill {
        display: flex; align-items: center; gap: 0.5rem;
        background: rgba(16,217,160,0.08); border: 1px solid rgba(16,217,160,0.2);
        border-radius: 100px; padding: 0.375rem 1rem;
        font-size: 0.72rem; font-weight: 700; color: #10d9a0;
    }
    .status-dot { width: 7px; height: 7px; border-radius: 50%; background: #10d9a0; animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }

    /* Stats Grid */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
    .stat-card {
        background: var(--a-card); border: 1px solid var(--a-border);
        border-radius: 18px; padding: 1.5rem;
        display: flex; flex-direction: column; justify-content: space-between;
        transition: border-color 0.2s;
    }
    .stat-card:hover { border-color: rgba(255,255,255,0.1); }
    .stat-card.accent { background: linear-gradient(135deg, rgba(16,217,160,0.15), rgba(16,217,160,0.05)); border-color: rgba(16,217,160,0.2); }
    .stat-card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.25rem; }
    .stat-icon { width: 40px; height: 40px; border-radius: 12px; background: rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center; color: var(--a-muted); }
    .stat-icon.accent { background: rgba(16,217,160,0.12); color: #10d9a0; }
    .stat-badge { font-size: 0.65rem; font-weight: 700; padding: 0.2rem 0.6rem; border-radius: 6px; }
    .stat-badge.up { background: rgba(16,217,160,0.12); color: #10d9a0; }
    .stat-badge.down { background: rgba(248,113,113,0.12); color: #f87171; }
    .stat-value { font-size: 2rem; font-weight: 800; color: var(--a-text); line-height: 1; margin-bottom: 0.375rem; }
    .stat-value.accent { color: #10d9a0; }
    .stat-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--a-muted); }

    /* Main Grid */
    .main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; margin-bottom: 2rem; }
    .admin-card {
        background: var(--a-card); border: 1px solid var(--a-border);
        border-radius: 18px; padding: 1.75rem; overflow: hidden;
    }
    .admin-card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.75rem; }
    .admin-card-title { font-size: 1rem; font-weight: 800; color: var(--a-text); }
    .admin-card-sub { font-size: 0.78rem; color: var(--a-muted); margin-top: 0.25rem; }
    .period-tabs { display: flex; gap: 0.5rem; }
    .period-tab {
        padding: 0.375rem 0.875rem; border-radius: 8px;
        font-size: 0.72rem; font-weight: 700; cursor: pointer; border: none;
        transition: all 0.15s;
    }
    .period-tab.active { background: rgba(16,217,160,0.12); color: #10d9a0; }
    .period-tab:not(.active) { background: rgba(255,255,255,0.04); color: var(--a-muted); }

    /* Chart */
    .chart-wrap { height: 180px; display: flex; align-items: flex-end; gap: 0.5rem; padding: 0 0.5rem; }
    .chart-bar { flex: 1; border-radius: 8px 8px 0 0; position: relative; transition: opacity 0.2s; cursor: pointer; }
    .chart-bar:hover { opacity: 0.8; }
    .chart-bar.dim { background: rgba(255,255,255,0.06); }
    .chart-bar.active-bar { background: #10d9a0; }
    .chart-label { position: absolute; bottom: -24px; left: 50%; transform: translateX(-50%); font-size: 0.6rem; font-weight: 700; color: var(--a-muted); white-space: nowrap; }
    .chart-tooltip {
        position: absolute; top: -36px; left: 50%; transform: translateX(-50%);
        background: var(--a-text); color: #07070d;
        font-size: 0.65rem; font-weight: 800; padding: 0.25rem 0.625rem; border-radius: 6px;
        white-space: nowrap;
    }

    /* Recent clients */
    .client-item {
        display: flex; align-items: center; gap: 0.875rem;
        padding: 0.875rem; border-radius: 12px;
        transition: background 0.15s; cursor: pointer;
        margin-bottom: 0.25rem;
    }
    .client-item:hover { background: rgba(255,255,255,0.03); }
    .client-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; flex-shrink: 0; border: 1.5px solid var(--a-border); }
    .client-avatar-text { width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 800; flex-shrink: 0; }
    .client-info { flex: 1; min-width: 0; }
    .client-name { font-size: 0.85rem; font-weight: 700; color: var(--a-text); }
    .client-prop { font-size: 0.75rem; color: var(--a-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .client-right { text-align: right; flex-shrink: 0; }
    .client-status { font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; padding: 0.2rem 0.625rem; border-radius: 6px; }
    .client-status.new { background: rgba(16,217,160,0.12); color: #10d9a0; }
    .client-status.contacted { background: rgba(99,102,241,0.12); color: #818cf8; }
    .client-status.inquiry { background: rgba(255,255,255,0.06); color: var(--a-muted); }
    .client-time { font-size: 0.65rem; color: var(--a-muted); margin-top: 0.25rem; }
    .view-all-btn {
        width: 100%; margin-top: 1rem; padding: 0.75rem;
        background: rgba(16,217,160,0.07); border: 1px solid rgba(16,217,160,0.15);
        border-radius: 10px; color: #10d9a0;
        font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase;
        cursor: pointer; transition: background 0.15s;
    }
    .view-all-btn:hover { background: rgba(16,217,160,0.12); }

    /* Featured Properties */
    .prop-grid-admin { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; }
    .prop-card-admin {
        background: var(--a-card); border: 1px solid var(--a-border);
        border-radius: 18px; overflow: hidden;
        transition: border-color 0.2s;
    }
    .prop-card-admin:hover { border-color: rgba(16,217,160,0.2); }
    .prop-card-img-admin { height: 160px; overflow: hidden; position: relative; }
    .prop-card-img-admin img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
    .prop-card-admin:hover .prop-card-img-admin img { transform: scale(1.05); }
    .prop-badge-admin {
        position: absolute; top: 0.75rem; left: 0.75rem;
        padding: 0.25rem 0.625rem; border-radius: 6px;
        font-size: 0.62rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em;
    }
    .prop-badge-admin.hot { background: #10d9a0; color: #021a12; }
    .prop-badge-admin.sold { background: #f87171; color: #fff; }
    .prop-badge-admin.new { background: rgba(99,102,241,1); color: #fff; }
    .prop-body-admin { padding: 1.25rem; }
    .prop-name-admin { font-size: 0.95rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.375rem; }
    .prop-price-admin { font-size: 1.1rem; font-weight: 800; color: #10d9a0; margin-bottom: 0.75rem; }
    .prop-meta-admin {
        display: flex; align-items: center; gap: 1rem;
        background: rgba(255,255,255,0.03); border-radius: 10px; padding: 0.625rem;
    }
    .prop-meta-item-admin { display: flex; align-items: center; gap: 0.375rem; font-size: 0.72rem; font-weight: 700; color: var(--a-muted); }
    .prop-meta-item-admin .material-symbols-rounded { font-size: 14px; color: rgba(255,255,255,0.2); }

    @media(max-width:1200px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } .prop-grid-admin { grid-template-columns: 1fr 1fr; } }
    @media(max-width:768px) { .main-grid { grid-template-columns: 1fr; } .stats-grid { grid-template-columns: 1fr 1fr; } .prop-grid-admin { grid-template-columns: 1fr; } }
</style>

<div class="dash-page">
    <!-- Header -->
    <div class="dash-header">
        <div>
            <div class="dash-eyebrow">Ringkasan Performa</div>
            <div class="dash-title">Dasbor Properti</div>
        </div>
        <div class="status-pill">
            <div class="status-dot"></div>
            Status Pasar: Sedang Berjalan
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon"><span class="material-symbols-rounded">apartment</span></div>
                <span class="stat-badge up">+12%</span>
            </div>
            <div class="stat-value">1,284</div>
            <div class="stat-label">Total Unit Tersedia</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon"><span class="material-symbols-rounded">sell</span></div>
                <span class="stat-badge up">+5.4%</span>
            </div>
            <div class="stat-value">842</div>
            <div class="stat-label">Unit Terjual</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-top">
                <div class="stat-icon"><span class="material-symbols-rounded">group</span></div>
                <span class="stat-badge down">-2.1%</span>
            </div>
            <div class="stat-value">319</div>
            <div class="stat-label">Prospek Aktif</div>
        </div>
        <div class="stat-card accent">
            <div class="stat-card-top">
                <div class="stat-icon accent"><span class="material-symbols-rounded">payments</span></div>
                <span class="stat-badge up">↑ 18%</span>
            </div>
            <div class="stat-value accent">Rp 42.8M</div>
            <div class="stat-label">Total Pendapatan</div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="main-grid">
        <!-- Chart -->
        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <div class="admin-card-title">Performa Penjualan</div>
                    <div class="admin-card-sub">Volume bulanan vs Proyeksi Target</div>
                </div>
                <div class="period-tabs">
                    <button class="period-tab active">6 Bulan</button>
                    <button class="period-tab">Tahunan</button>
                </div>
            </div>
            <div class="chart-wrap">
                <div class="chart-bar dim" style="height:40%"><span class="chart-label">JAN</span></div>
                <div class="chart-bar dim" style="height:60%"><span class="chart-label">FEB</span></div>
                <div class="chart-bar active-bar" style="height:90%"><span class="chart-label">MAR</span><span class="chart-tooltip">Rp 8.2M</span></div>
                <div class="chart-bar dim" style="height:50%"><span class="chart-label">APR</span></div>
                <div class="chart-bar dim" style="height:75%"><span class="chart-label">MEI</span></div>
                <div class="chart-bar dim" style="height:85%"><span class="chart-label">JUN</span></div>
            </div>
        </div>
        <!-- Recent Clients -->
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="admin-card-title">Klien Terbaru</div>
                <span class="material-symbols-rounded" style="color:var(--a-muted);cursor:pointer;">more_vert</span>
            </div>
            <div class="client-item">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjvkWmgeKjkdTojb4DwwsBKflHI4SctzScpQI-eMJ49sCZqvIBxfpWKLUC_nO9_ZnR2VvNTKupf8fUPASiYMuB9BO55J2pvtL2cZF7isZ8z5ur8k7Kmbdfp_VL_vN0VwKY6ZKZ8Jl_7UDnXhVQC5Bh4zEAOkqLrTFO6tqoVnd8HJcacqQF_Uhfd-8hRfEnSuGubZiBF-RT_sNQmxZy6S7T9hnN-XAg406RATGbR2ui3Xsr2WUWKuwg9kkv-re6p75ixNNSowYGySc" class="client-avatar" alt="Budi"/>
                <div class="client-info">
                    <div class="client-name">Budi Santoso</div>
                    <div class="client-prop">Tipe Emerald - Cluster A</div>
                </div>
                <div class="client-right">
                    <div class="client-status new">Baru</div>
                    <div class="client-time">2 mnt lalu</div>
                </div>
            </div>
            <div class="client-item">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuApIXs5dsPnnvJ4zPgQV6F6lAQ5z_PawOu-5OGU6E6BnUHtQAAa_LEmZBfKEoYezhsmCGAgAeaKlGe3YyVFFQTvs6HSUgitJZkPk0-wFGnIK41wD3p0u3Txa0xHGwbbpoST9M7evMIlP6r-FyIDLWNfo-TdbHKLpXHWN_b3XhfbqIFg6nvHjx-e2AmgSWA8J0gHocNJ1gACsZktpTHJrU3sK7cadZjv_QqB-fqMj4R8AtyACrxOM1CMT3q61jY1GjZHRpW3vgAloNk" class="client-avatar" alt="Siti"/>
                <div class="client-info">
                    <div class="client-name">Siti Rahmawati</div>
                    <div class="client-prop">Tipe Ruby - Cluster B</div>
                </div>
                <div class="client-right">
                    <div class="client-status contacted">Dihubungi</div>
                    <div class="client-time">15 mnt lalu</div>
                </div>
            </div>
            <div class="client-item">
                <div class="client-avatar-text" style="background:rgba(16,217,160,0.12);color:#10d9a0;">AW</div>
                <div class="client-info">
                    <div class="client-name">Andi Wijaya</div>
                    <div class="client-prop">Ruko Niaga Boulevard</div>
                </div>
                <div class="client-right">
                    <div class="client-status inquiry">Tanya Harga</div>
                    <div class="client-time">1 jam lalu</div>
                </div>
            </div>
            <button class="view-all-btn">Lihat Semua Klien</button>
        </div>
    </div>

    <!-- Featured Properties -->
    <div style="margin-bottom:1rem;">
        <div style="font-size:1rem; font-weight:800; color:var(--a-text); margin-bottom:1.25rem;">Aset Paling Diminati</div>
        <div class="prop-grid-admin">
            <div class="prop-card-admin">
                <div class="prop-card-img-admin">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCH_UQLVVd7u_uOb94GxewGGuscTRkh6YxP2JfSACNfism15TgYBNb9jEvDlZZIxeXGrGJMzcVAvlRTWoSsCnAQvLGtNWxEAWs0_6Nm9Qqa09Vxl5sSlADhUd1jmcmmR8YBVw-o8EVIGKqfJIc9rpbMO27yBKC6MrUJlDRSyv0xSZj2xfn0Uj_97BelzphZLYsyhZQpmLHw8jeg1RTll4Qmnimh4t-b7NxDLVQ5-YpIIYQBme44IHK3LFWSM035hDEb3xowDc7jxI" alt="Cluster Emerald"/>
                    <div class="prop-badge-admin hot">98% Terjual</div>
                </div>
                <div class="prop-body-admin">
                    <div class="prop-name-admin">Cluster Emerald (Tipe 120)</div>
                    <div class="prop-price-admin">Rp 1.450.000.000</div>
                    <div class="prop-meta-admin">
                        <div class="prop-meta-item-admin"><span class="material-symbols-rounded">bed</span>3 K.Tidur</div>
                        <div class="prop-meta-item-admin"><span class="material-symbols-rounded">bathtub</span>2 K.Mandi</div>
                        <div class="prop-meta-item-admin" style="margin-left:auto;"><span class="material-symbols-rounded">square_foot</span>120m²</div>
                    </div>
                </div>
            </div>
            <div class="prop-card-admin">
                <div class="prop-card-img-admin">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcCf7EBD7nzA5hoFEUrzFAHGOU5cFTXwIdb8vX0ZQyMCcTUJXUYoW7E4GGane4hPyvBn2a9dSYzgCGyUx7FM1fMBWjB1ehPQjJXs2HooEBPF7DgRrxGl4GF_J2EK6NbVVuyI5ZRLyaaxnP7JoBc-NsKJ4NqsYfQVMRQtDL1SpoSQs2z4SnaFIsiSOgC4MlvHXWvt5OSKdu5e5dpnE-Xj5-z7AC83PCf9fgPuNnfQERR_8RtMg-Ha5QBfqXos68A_tPQIhTunUt2ic" alt="Ruko Niaga"/>
                    <div class="prop-badge-admin sold">Habis Terjual</div>
                </div>
                <div class="prop-body-admin">
                    <div class="prop-name-admin">Ruko Niaga Boulevard</div>
                    <div class="prop-price-admin">Rp 2.200.000.000</div>
                    <div class="prop-meta-admin">
                        <div class="prop-meta-item-admin"><span class="material-symbols-rounded">layers</span>3 Lantai</div>
                        <div class="prop-meta-item-admin"><span class="material-symbols-rounded">bathtub</span>3 K.Mandi</div>
                        <div class="prop-meta-item-admin" style="margin-left:auto;"><span class="material-symbols-rounded">square_foot</span>180m²</div>
                    </div>
                </div>
            </div>
            <div class="prop-card-admin">
                <div class="prop-card-img-admin">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCERDWVHwVPOS11b_ap642W5UqeIEeRsrBth_c-D0AFKm8JGuiRbIypWtEOr1fUoRJMBFxb5iLSC1b4VGCThA5Rk7Cbfnk5kXXazmrjmOS3T_9Zrq16WjOI9MNUt4VAtMniEFayzaowwRvjQZl0TyztopCn8U2ylAwS7dLu6zX9Ld_da-wZMbqOCF-KzpKk93EvhC8vexi0IADDuyNq1gyOiP0Gc7WaMNyH6xxi2ByaVRwG6moAC-Tk37uPKFrkNedPXaLJqyzRtOY" alt="Kavling Toba"/>
                    <div class="prop-badge-admin new">Listing Baru</div>
                </div>
                <div class="prop-body-admin">
                    <div class="prop-name-admin">Kavling Ekslusif Toba</div>
                    <div class="prop-price-admin">Rp 589.000.000</div>
                    <div class="prop-meta-admin">
                        <div class="prop-meta-item-admin"><span class="material-symbols-rounded">forest</span>Tanah Kosong</div>
                        <div class="prop-meta-item-admin" style="margin-left:auto;"><span class="material-symbols-rounded">square_foot</span>150m²</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
