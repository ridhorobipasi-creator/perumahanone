@extends('layouts.app')

@section('title', 'Promo Eksklusif | Bintang Property Group')

@section('head')
<style>
    .promo-hero {
        padding-top: 120px;
        padding-bottom: 60px;
        background: var(--surface);
        text-align: center;
        border-bottom: 1px solid var(--border);
    }
    .promo-eyebrow {
        font-size: 0.7rem; font-weight: 700;
        letter-spacing: 0.2em; text-transform: uppercase;
        color: var(--accent); margin-bottom: 1rem;
    }
    .promo-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: clamp(2.5rem, 5vw, 4rem);
        color: var(--text);
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }
    .promo-desc {
        max-width: 600px;
        margin: 0 auto;
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.7;
    }

    .promo-section {
        background: var(--bg);
        padding: 4rem 2rem 6rem;
    }
    .promo-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    .promo-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 28px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s, border-color 0.3s;
        position: relative;
    }
    .promo-card:hover { transform: translateY(-8px); border-color: var(--accent); }
    .promo-img {
        height: 300px;
        position: relative;
    }
    .promo-img img { width: 100%; height: 100%; object-fit: cover; }
    .promo-badge {
        position: absolute; top: 1.5rem; right: 1.5rem;
        padding: 0.5rem 1rem; background: var(--accent);
        color: var(--accent-dark); font-size: 0.75rem;
        font-weight: 800; border-radius: 10px;
        text-transform: uppercase; letter-spacing: 0.05em;
    }
    .promo-content {
        padding: 2.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .promo-expiry {
        font-size: 0.7rem; font-weight: 700;
        color: var(--error); text-transform: uppercase;
        letter-spacing: 0.1em; margin-bottom: 0.75rem;
        display: flex; align-items: center; gap: 0.5rem;
    }
    .card-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: 2rem; color: var(--text);
        margin-bottom: 1rem; line-height: 1.2;
    }
    .card-desc {
        font-size: 0.92rem; color: var(--text-muted);
        line-height: 1.8; margin-bottom: 2rem;
    }
    .promo-footer {
        margin-top: auto;
        display: flex; align-items: center; justify-content: space-between;
    }
    .promo-btn {
        padding: 1rem 1.75rem; background: var(--accent-dim);
        color: var(--accent); font-size: 0.8rem;
        font-weight: 800; text-transform: uppercase;
        letter-spacing: 0.05em; border-radius: 12px;
        text-decoration: none; transition: all 0.2s;
    }
    .promo-btn:hover { background: var(--accent); color: var(--accent-dark); }

    .empty-state {
        max-width: 1200px; margin: 4rem auto; text-align: center;
        padding: 4rem 2rem; background: var(--card); border: 1px solid var(--border);
        border-radius: 24px;
    }
    .empty-icon {
        font-size: 4rem; color: var(--accent-dim); margin-bottom: 1.5rem;
    }

    @media(max-width: 768px) {
        .promo-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="promo-hero">
    <div class="promo-eyebrow">Penawaran Menarik</div>
    <h1 class="promo-title">Promo <span>Terbatas</span></h1>
    <p class="promo-desc">Wujudkan impian memiliki hunian mewah dengan berbagai keuntungan eksklusif yang hanya tersedia bulan ini.</p>
</div>

<section class="promo-section">
    <div class="promo-grid">
        <div class="promo-card">
            <div class="promo-img">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" alt="Promo RAMADAN"/>
                <div class="promo-badge">Emberald Deal</div>
            </div>
            <div class="promo-content">
                <div class="promo-expiry">
                    <span class="material-symbols-rounded" style="font-size:16px;">schedule</span>
                    Berakhir dalam 12 Hari
                </div>
                <h2 class="card-title">Mega Cashback 200 Juta & Full Furnished</h2>
                <p class="card-desc">Khusus untuk pembelian unit di Bintang Emerald Residence. Dapatkan cashback langsung dan interior lengkap siap huni tanpa biaya tambahan.</p>
                <div class="promo-footer">
                    <a href="{{ url('/contact') }}" class="promo-btn">Ambil Promo</a>
                </div>
            </div>
        </div>

        <div class="promo-card">
            <div class="promo-img">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A" alt="Promo KPR"/>
                <div class="promo-badge">KPR Special</div>
            </div>
            <div class="promo-content">
                <div class="promo-expiry">
                    <span class="material-symbols-rounded" style="font-size:16px;">schedule</span>
                    Berakhir 30 Apr 2024
                </div>
                <h2 class="card-title">Suku Bunga 2.5% Fixed & Bebas Biaya KPR</h2>
                <p class="card-desc">Bekerjasama dengan Bank Partner utama, kami berikan kemudahan cicilan ringan dan penghapusan seluruh biaya administrasi KPR untuk Anda.</p>
                <div class="promo-footer">
                    <a href="{{ url('/contact') }}" class="promo-btn">Ambil Promo</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
