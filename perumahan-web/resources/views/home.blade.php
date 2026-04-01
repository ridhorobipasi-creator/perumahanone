@extends('layouts.app')

@section('head')
<style>
    /* Hero uses hardcoded dark because it's always dark (image bg) */
    .hero { position: relative; min-height: 100vh; display: flex; align-items: center; overflow: hidden; background: #050509; }
    .hero-bg { position: absolute; inset: 0; z-index: 0; }
    .hero-bg img { width: 100%; height: 100%; object-fit: cover; opacity: 0.35; transform: scale(1.05); animation: heroZoom 12s ease-out forwards; }
    @keyframes heroZoom { from{transform:scale(1.05)} to{transform:scale(1.0)} }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(120deg, rgba(5,5,9,0.92) 0%, rgba(5,5,9,0.6) 55%, rgba(5,5,9,0.3) 100%); }
    .hero-noise { position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E"); pointer-events: none; }
    .hero-glow { position: absolute; width: 700px; height: 700px; border-radius: 50%; background: radial-gradient(circle, rgba(16,217,160,0.12) 0%, transparent 70%); top: -200px; left: -200px; pointer-events: none; }
    .hero-inner { position: relative; z-index: 1; max-width: 1440px; margin: 0 auto; padding: 88px 2rem 0; width: 100%; }
    .hero-badge { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.375rem 1rem; border: 1px solid rgba(16,217,160,0.3); background: rgba(16,217,160,0.08); border-radius: 100px; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: #10d9a0; margin-bottom: 2rem; opacity: 0; animation: fadeUp 0.6s 0.3s ease forwards; }
    .hero-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: #10d9a0; animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }
    .hero-title { font-family: 'DM Serif Display', serif; font-style: italic; font-size: clamp(3rem, 7vw, 6.5rem); line-height: 1.05; color: #fff; margin-bottom: 1.75rem; max-width: 820px; opacity: 0; animation: fadeUp 0.7s 0.5s ease forwards; }
    .hero-title em { font-style: normal; color: #10d9a0; }
    .hero-subtitle { font-size: 1.1rem; font-weight: 400; color: rgba(240,240,248,0.6); max-width: 520px; line-height: 1.8; margin-bottom: 3rem; opacity: 0; animation: fadeUp 0.7s 0.7s ease forwards; }
    @keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }
    .hero-search { display: flex; gap: 0.75rem; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 0.75rem; max-width: 680px; backdrop-filter: blur(12px); opacity: 0; animation: fadeUp 0.7s 0.9s ease forwards; }
    .search-field { flex: 1; display: flex; align-items: center; gap: 0.75rem; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.08); border-radius: 10px; padding: 0.875rem 1rem; transition: border-color 0.2s; }
    .search-field:focus-within { border-color: rgba(16,217,160,0.4); }
    .search-field span { color: #10d9a0; flex-shrink: 0; }
    .search-field input, .search-field select { background: none; border: none; outline: none; color: #fff; font-size: 0.875rem; font-family: inherit; font-weight: 500; width: 100%; }
    .search-field select option { background: #0f0f1a; color: #fff; }
    .search-field input::placeholder { color: rgba(240,240,248,0.4); }
    .search-btn { display: flex; align-items: center; gap: 0.5rem; padding: 0.875rem 1.75rem; background: #10d9a0; color: #021a12; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; border: none; border-radius: 10px; cursor: pointer; white-space: nowrap; transition: background 0.2s, transform 0.15s; }
    .search-btn:hover { background: #0ffba7; transform: translateY(-1px); }
    .scroll-cue { position: absolute; bottom: 2.5rem; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center; gap: 0.5rem; z-index: 1; opacity: 0; animation: fade 1s 1.5s ease forwards; }
    @keyframes fade { from{opacity:0} to{opacity:0.5} }
    .scroll-cue span { font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: #fff; }
    .scroll-line { width: 1px; height: 40px; background: linear-gradient(to bottom, #10d9a0, transparent); animation: scrollLine 1.6s ease infinite; }
    @keyframes scrollLine { 0%{height:0;opacity:1} 100%{height:40px;opacity:0} }

    /* ── STATS — Uses CSS vars for theming ── */
    .stats-section { background: var(--surface); border-bottom: 1px solid var(--border); padding: 4rem 2rem; }
    .stats-inner { max-width: 1200px; margin: 0 auto; }
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0; }
    .stat-item { padding: 1.5rem 2rem; border-right: 1px solid var(--border); }
    .stat-item:last-child { border-right: none; }
    .stat-num { font-family: 'DM Serif Display', serif; font-size: 3rem; color: var(--text); line-height: 1; margin-bottom: 0.5rem; }
    .stat-num em { font-style: normal; color: var(--accent); }
    .stat-label { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); }

    /* ── ABOUT ── */
    .about-section { padding: 8rem 2rem; background: var(--bg); }
    .about-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center; }
    .about-media { position: relative; }
    .about-img-wrap { border-radius: 24px; overflow: hidden; aspect-ratio: 4/3; }
    .about-img-wrap img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s; }
    .about-img-wrap:hover img { transform: scale(1.04); }
    .about-float-card { position: absolute; bottom: -2rem; right: -2rem; background: var(--card); border: 1px solid var(--border); border-radius: 18px; padding: 1.5rem; max-width: 220px; backdrop-filter: blur(12px); box-shadow: var(--shadow-md); }
    .about-float-card-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--accent-dim); display: flex; align-items: center; justify-content: center; color: var(--accent); margin-bottom: 0.875rem; }
    .about-float-card h5 { font-size: 0.9rem; font-weight: 700; color: var(--text); margin-bottom: 0.375rem; }
    .about-float-card p { font-size: 0.78rem; color: var(--text-muted); line-height: 1.6; }
    .section-eyebrow { font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.625rem; }
    .section-eyebrow::before { content: ''; display: block; width: 24px; height: 1px; background: var(--accent); }
    .section-title { font-family: 'DM Serif Display', serif; font-style: italic; font-size: clamp(2rem, 4vw, 3rem); color: var(--text); line-height: 1.15; margin-bottom: 1.5rem; }
    .section-body { font-size: 0.95rem; color: var(--text-muted); line-height: 1.85; margin-bottom: 2.5rem; }
    .check-list { list-style: none; display: flex; flex-direction: column; gap: 0.875rem; margin-bottom: 2.5rem; }
    .check-list li { display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.9rem; color: var(--text-secondary); line-height: 1.5; font-weight: 500; }
    .check-list li span.material-symbols-rounded { color: var(--accent); flex-shrink: 0; margin-top: 1px; }
    .btn-outline { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.75rem; border: 1px solid var(--border-hover); border-radius: 100px; color: var(--text); text-decoration: none; font-size: 0.82rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; transition: border-color 0.2s, background 0.2s, color 0.2s; }
    .btn-outline:hover { border-color: var(--accent); background: var(--accent-dim); color: var(--accent); }

    /* ── PROPERTIES ── */
    .properties-section { padding: 8rem 2rem; background: var(--surface); }
    .properties-inner { max-width: 1200px; margin: 0 auto; }
    .section-header { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 3.5rem; gap: 2rem; flex-wrap: wrap; }
    .properties-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
    .prop-card { background: var(--card); border: 1px solid var(--border); border-radius: 20px; overflow: hidden; text-decoration: none; display: flex; flex-direction: column; transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s; }
    .prop-card:hover { transform: translateY(-6px); border-color: rgba(16,217,160,0.25); box-shadow: var(--shadow-lg); }
    [data-theme="light"] .prop-card:hover { border-color: rgba(5,150,105,0.25); }
    .prop-card-img { aspect-ratio: 4/3; overflow: hidden; position: relative; }
    .prop-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
    .prop-card:hover .prop-card-img img { transform: scale(1.06); }
    .prop-badge { position: absolute; top: 1rem; left: 1rem; padding: 0.3rem 0.75rem; border-radius: 6px; font-size: 0.65rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; z-index: 1; }
    .prop-badge.new { background: #10d9a0; color: #021a12; }
    .prop-badge.hot { background: #f59e0b; color: #451a03; }
    .prop-badge.exclusive { background: #6366f1; color: #fff; }
    .prop-card-body { padding: 1.5rem; display: flex; flex-direction: column; flex: 1; }
    .prop-location { display: flex; align-items: center; gap: 0.375rem; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.625rem; }
    .prop-location .material-symbols-rounded { font-size: 14px; color: var(--accent); }
    .prop-name { font-size: 1.3rem; font-weight: 800; color: var(--text); line-height: 1.2; margin-bottom: 1.25rem; transition: color 0.2s; }
    .prop-card:hover .prop-name { color: var(--accent); }
    .prop-meta { display: flex; gap: 1.25rem; align-items: center; padding: 1rem 0; border-top: 1px solid var(--border); margin-top: auto; }
    .prop-meta-item { display: flex; align-items: center; gap: 0.4rem; font-size: 0.82rem; font-weight: 600; color: var(--text-muted); }
    .prop-meta-item .material-symbols-rounded { font-size: 16px; color: var(--text-faint); }
    .prop-price-row { display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--border); }
    .prop-price-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-muted); }
    .prop-price { font-size: 1.25rem; font-weight: 800; color: var(--accent); letter-spacing: -0.02em; }

    /* ── CTA — always dark internally ── */
    .cta-section { padding: 6rem 2rem; background: var(--bg); }
    .cta-inner { max-width: 1200px; margin: 0 auto; background: var(--gradient-card); border: 1px solid var(--border); border-radius: 32px; padding: 5rem; display: grid; grid-template-columns: 3fr 2fr; gap: 4rem; align-items: center; position: relative; overflow: hidden; box-shadow: var(--shadow-md); }
    .cta-glow { position: absolute; width: 500px; height: 500px; border-radius: 50%; background: radial-gradient(circle, var(--accent-dim) 0%, transparent 70%); top: -200px; left: -100px; pointer-events: none; }
    .cta-pattern { position: absolute; inset: 0; pointer-events: none; background-image: radial-gradient(var(--accent-dim) 1px, transparent 1px); background-size: 28px 28px; }
    .cta-text { position: relative; z-index: 1; }
    .cta-title { font-family: 'DM Serif Display', serif; font-style: italic; font-size: clamp(2rem, 4vw, 3.25rem); color: var(--text); line-height: 1.1; margin-bottom: 1.25rem; }
    .cta-body { font-size: 0.95rem; color: var(--text-muted); line-height: 1.8; margin-bottom: 2.5rem; max-width: 460px; }
    .cta-actions { display: flex; gap: 1rem; flex-wrap: wrap; }
    .btn-wa { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.75rem; background: var(--border2); border: 1px solid var(--border-hover); border-radius: 100px; color: var(--text-secondary); text-decoration: none; font-size: 0.82rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; transition: all 0.2s; }
    .btn-wa:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-dim); }
    .kpr-card { background: var(--card); border: 1px solid var(--border); border-radius: 24px; padding: 2rem; position: relative; z-index: 1; }
    .kpr-card h3 { font-size: 1.1rem; font-weight: 800; color: var(--text); margin-bottom: 0.375rem; }
    .kpr-card p { font-size: 0.8rem; color: var(--text-muted); margin-bottom: 1.75rem; }
    .kpr-row { margin-bottom: 1.25rem; }
    .kpr-row label { display: flex; justify-content: space-between; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: var(--text-faint); margin-bottom: 0.625rem; }
    .kpr-row label em { font-style: normal; color: var(--accent); }
    .kpr-row input[type=range] { -webkit-appearance: none; appearance: none; width: 100%; height: 4px; background: var(--border-hover); border-radius: 4px; cursor: pointer; }
    .kpr-row input[type=range]::-webkit-slider-thumb { -webkit-appearance: none; width: 16px; height: 16px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 8px var(--accent-dim); cursor: pointer; }
    .kpr-result { background: var(--accent-dim); border: 1px solid var(--accent); border-radius: 16px; padding: 1.25rem; text-align: center; margin-top: 1.5rem; }
    .kpr-result-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.375rem; }
    .kpr-result-num { font-family: 'DM Serif Display', serif; font-size: 2.25rem; color: var(--accent); line-height: 1; }
    .kpr-result-unit { font-size: 0.875rem; font-weight: 500; color: var(--text-muted); margin-top: 0.25rem; }

    /* ── RESPONSIVE ── */
    @media (max-width: 992px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .stat-item:nth-child(2) { border-right: none; }
        .about-inner { grid-template-columns: 1fr; gap: 3rem; }
        .about-float-card { bottom: 1rem; right: 1rem; }
        .properties-grid { grid-template-columns: repeat(2, 1fr); }
        .cta-inner { grid-template-columns: 1fr; padding: 3rem 2rem; }
    }
    @media (max-width: 640px) {
        .hero-search { flex-direction: column; }
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .stat-item { padding: 1.25rem; }
        .stat-num { font-size: 2.25rem; }
        .properties-grid { grid-template-columns: 1fr; }
        .section-header { flex-direction: column; align-items: flex-start; }
    }
</style>
@endsection

@section('content')
<!-- ── HERO ── -->
<section class="hero">
    <div class="hero-bg">
        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDt7Q4Aga0iHKKBbXiumtrWCDPG9Tla69EDL9zrz2_uQ7NVmbbcIsFfARkU0Cz1iQGBVr6nwoHLfeWndonxn8yAEjt2--ihFk5eMq4nXKzbqkoi1KaJO8c8gtvXxcn8RXo8HoH9vgvtcb6lyNQtBz-SLRViL6wg9Fba542YsHAuxNYp-GTBi7h1weNZXgvOWvvtLRChqkX0dO9t6H5JSArHBkjUB2rMTCU_VCC82KGQLcACTTw-R69kNLtMh-lq-dFsgliQjJWRBjI" alt="Hunian premium Bintang Property Group" fetchpriority="high" decoding="async"/>
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-noise"></div>
    <div class="hero-glow"></div>
    <div class="hero-inner">
        <div class="hero-badge">Premium Real Estate · Sumatera Utara</div>
        <h1 class="hero-title">Tingkatkan Standar<br/><em>Gaya Hidup</em> Anda.</h1>
        <p class="hero-subtitle">Koleksi hunian eksklusif di lokasi paling bergengsi Sumatera Utara. Desain visioner bertemu kenyamanan tanpa kompromi.</p>
        <div class="hero-search">
            <div class="search-field">
                <span class="material-symbols-rounded">location_on</span>
                <input type="text" placeholder="Cari lokasi (Medan, Binjai...)"/>
            </div>
            <div class="search-field" style="max-width:180px;">
                <span class="material-symbols-rounded">home_work</span>
                <select>
                    <option value="">Semua Tipe</option>
                    <option value="residence">Residensi Mewah</option>
                    <option value="commercial">Komersial</option>
                    <option value="apartment">Apartemen</option>
                </select>
            </div>
            <button class="search-btn">
                <span class="material-symbols-rounded">search</span>Cari
            </button>
        </div>
    </div>
    <div class="scroll-cue">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ── STATS ── -->
<section class="stats-section">
    <div class="stats-inner">
        <div class="stats-grid">
            <div class="stat-item"><div class="stat-num">4.2<em>k</em>+</div><div class="stat-label">Keluarga Bahagia</div></div>
            <div class="stat-item"><div class="stat-num">12+</div><div class="stat-label">Tahun Pengalaman</div></div>
            <div class="stat-item"><div class="stat-num">18</div><div class="stat-label">Proyek Selesai</div></div>
            <div class="stat-item" style="border-right:none;"><div class="stat-num">100<em>%</em></div><div class="stat-label">Kepuasan Klien</div></div>
        </div>
    </div>
</section>

<!-- ── ABOUT ── -->
<section class="about-section" id="tentang">
    <div class="about-inner">
        <div class="about-media">
            <div class="about-img-wrap">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" alt="Interior desain modern" loading="lazy" decoding="async"/>
            </div>
            <div class="about-float-card">
                <div class="about-float-card-icon"><span class="material-symbols-rounded">eco</span></div>
                <h5>Desain Berkelanjutan</h5>
                <p>Sirkulasi udara optimal dan pencahayaan alami maksimal di setiap unit.</p>
            </div>
        </div>
        <div>
            <div class="section-eyebrow">Tentang Pengembang</div>
            <h2 class="section-title">Membangun Fondasi<br/>Masa Depan Anda.</h2>
            <p class="section-body">Bintang Property Group tidak sekadar membangun rumah. Kami mengkurasi lingkungan hidup yang meningkatkan kualitas hidup. Melalui desain inovatif dan material premium, kami menciptakan aset bernilai tinggi yang bertahan lintas generasi.</p>
            <ul class="check-list">
                <li><span class="material-symbols-rounded">verified</span>Legalitas Terjamin & Sertifikat Hak Milik</li>
                <li><span class="material-symbols-rounded">verified</span>Infrastruktur Bawah Tanah Modern</li>
                <li><span class="material-symbols-rounded">verified</span>Keamanan 24 Jam Terintegrasi CCTV</li>
                <li><span class="material-symbols-rounded">verified</span>KPR Subsidi & Konvensional Tersedia</li>
            </ul>
            <a href="{{ url('/contact') }}" class="btn-outline">
                Konsultasi Sekarang
                <span class="material-symbols-rounded" style="font-size:18px;">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- ── FEATURED PROPERTIES ── -->
<section class="properties-section">
    <div class="properties-inner">
        <div class="section-header">
            <div>
                <div class="section-eyebrow">Koleksi Premium</div>
                <h2 class="section-title" style="margin-bottom:0;">Proyek Pilihan<br/>di Sumut</h2>
            </div>
            <a href="{{ url('/properties') }}" class="btn-outline" style="flex-shrink:0;">
                Lihat Semua Katalog
                <span class="material-symbols-rounded" style="font-size:18px;">arrow_forward</span>
            </a>
        </div>
        <div class="properties-grid">
            <a href="{{ url('/properties/bintang-emerald') }}" class="prop-card">
                <div class="prop-card-img">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" alt="Sicoland Green" loading="lazy" decoding="async"/>
                    <div class="prop-badge new">Baru Launching</div>
                </div>
                <div class="prop-card-body">
                    <div class="prop-location"><span class="material-symbols-rounded">location_on</span>Deli Serdang, Sumut</div>
                    <div class="prop-name">Sicoland Green</div>
                    <div class="prop-meta">
                        <div class="prop-meta-item"><span class="material-symbols-rounded">bed</span>3</div>
                        <div class="prop-meta-item"><span class="material-symbols-rounded">bathtub</span>2</div>
                        <div class="prop-meta-item" style="margin-left:auto;"><span class="material-symbols-rounded">square_foot</span>120m²</div>
                    </div>
                    <div class="prop-price-row"><span class="prop-price-label">Mulai Dari</span><span class="prop-price">Rp 850 Jt</span></div>
                </div>
            </a>
            <a href="{{ url('/properties/bintang-emerald') }}" class="prop-card">
                <div class="prop-card-img">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A" alt="Puri Hamparan Perak" loading="lazy" decoding="async"/>
                    <div class="prop-badge hot">Terjual 80%</div>
                </div>
                <div class="prop-card-body">
                    <div class="prop-location"><span class="material-symbols-rounded">location_on</span>Area Binjai & Langkat</div>
                    <div class="prop-name">Puri Hamparan Perak</div>
                    <div class="prop-meta">
                        <div class="prop-meta-item"><span class="material-symbols-rounded">bed</span>2</div>
                        <div class="prop-meta-item"><span class="material-symbols-rounded">bathtub</span>1</div>
                        <div class="prop-meta-item" style="margin-left:auto;"><span class="material-symbols-rounded">square_foot</span>45m²</div>
                    </div>
                    <div class="prop-price-row"><span class="prop-price-label">Mulai Dari</span><span class="prop-price">Rp 425 Jt</span></div>
                </div>
            </a>
            <a href="{{ url('/properties/bintang-emerald') }}" class="prop-card">
                <div class="prop-card-img">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c" alt="Bintang Residence" loading="lazy" decoding="async"/>
                    <div class="prop-badge exclusive">Eksklusif</div>
                </div>
                <div class="prop-card-body">
                    <div class="prop-location"><span class="material-symbols-rounded">location_on</span>Johor, Kota Medan</div>
                    <div class="prop-name">Bintang Residence</div>
                    <div class="prop-meta">
                        <div class="prop-meta-item"><span class="material-symbols-rounded">bed</span>4</div>
                        <div class="prop-meta-item"><span class="material-symbols-rounded">bathtub</span>3</div>
                        <div class="prop-meta-item" style="margin-left:auto;"><span class="material-symbols-rounded">pool</span>Privat</div>
                    </div>
                    <div class="prop-price-row"><span class="prop-price-label">Mulai Dari</span><span class="prop-price">Rp 1.2 M</span></div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- ── CTA ── -->
<section class="cta-section">
    <div class="cta-inner">
        <div class="cta-glow"></div>
        <div class="cta-pattern"></div>
        <div class="cta-text">
            <div class="section-eyebrow">Ambil Langkah Pertama</div>
            <h2 class="cta-title">Amankan Unit<br/>Impian Anda Hari Ini.</h2>
            <p class="cta-body">Konsultasikan kebutuhan hunian Anda dengan spesialis properti kami. Dapatkan penawaran harga perdana dan skema KPR terbaik.</p>
            <div class="cta-actions">
                <a href="{{ url('/contact') }}" class="btn-primary">
                    <span class="material-symbols-rounded" style="font-size:18px;">calendar_today</span>Jadwalkan Kunjungan
                </a>
                <a href="https://wa.me/6281200000000" target="_blank" class="btn-wa">
                    <span class="material-symbols-rounded" style="font-size:18px;">chat</span>Chat WhatsApp
                </a>
            </div>
        </div>
        <div class="kpr-card">
            <h3>Kalkulator KPR</h3>
            <p>Estimasi cicilan per bulan Anda</p>
            <div class="kpr-row">
                <label><span>Harga Properti</span><em id="price-label">Rp 850 Jt</em></label>
                <input type="range" id="price-range" min="300" max="3000" value="850"/>
            </div>
            <div class="kpr-row">
                <label><span>Uang Muka (DP)</span><em id="dp-label">10%</em></label>
                <input type="range" id="dp-range" min="0" max="50" value="10"/>
            </div>
            <div class="kpr-row">
                <label><span>Tenor</span><em id="tenor-label">15 Tahun</em></label>
                <input type="range" id="tenor-range" min="5" max="25" value="15"/>
            </div>
            <div class="kpr-result">
                <div class="kpr-result-label">Estimasi Cicilan / Bulan</div>
                <div class="kpr-result-num" id="kpr-result">Rp 6,4 Jt</div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
(function() {
    const priceRange = document.getElementById('price-range');
    const dpRange    = document.getElementById('dp-range');
    const tenorRange = document.getElementById('tenor-range');
    const priceLabel = document.getElementById('price-label');
    const dpLabel    = document.getElementById('dp-label');
    const tenorLabel = document.getElementById('tenor-label');
    const resultEl   = document.getElementById('kpr-result');
    function calcKPR() {
        const harga = parseInt(priceRange.value) * 1e6;
        const dp    = parseInt(dpRange.value) / 100;
        const tenor = parseInt(tenorRange.value);
        const r     = 0.08 / 12;
        const n     = tenor * 12;
        const pokok = harga * (1 - dp);
        const cicilan = r === 0 ? pokok/n : pokok * r * Math.pow(1+r,n) / (Math.pow(1+r,n)-1);
        resultEl.textContent = 'Rp ' + (cicilan / 1e6).toFixed(1).replace('.', ',') + ' Jt';
        const hJt = parseInt(priceRange.value);
        priceLabel.textContent = 'Rp ' + (hJt >= 1000 ? (hJt/1000).toFixed(1) + ' M' : hJt + ' Jt');
        dpLabel.textContent    = dpRange.value + '%';
        tenorLabel.textContent = tenorRange.value + ' Tahun';
    }
    priceRange.addEventListener('input', calcKPR);
    dpRange.addEventListener('input', calcKPR);
    tenorRange.addEventListener('input', calcKPR);
    calcKPR();
})();
</script>
@endsection
