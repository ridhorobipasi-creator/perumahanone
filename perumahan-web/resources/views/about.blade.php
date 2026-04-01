@extends('layouts.app')

@section('title', 'Tentang Kami | Bintang Property Group')

@section('head')
<style>
    /* ══ HERO ══ */
    .about-hero {
        padding-top: 72px;
        background: var(--surface);
        border-bottom: 1px solid var(--border);
        position: relative;
        overflow: hidden;
    }
    .about-hero::after {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 60% 50% at 70% 50%, var(--accent-dim) 0%, transparent 70%);
        pointer-events: none;
    }
    .about-hero-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 5rem 2rem 4rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    .about-eyebrow {
        font-size: 0.65rem; font-weight: 700;
        letter-spacing: 0.2em; text-transform: uppercase;
        color: var(--accent); margin-bottom: 1rem;
        display: flex; align-items: center; gap: 0.75rem;
    }
    .about-eyebrow::before {
        content: ''; width: 28px; height: 1.5px;
        background: var(--accent); display: block;
    }
    .about-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        color: var(--text);
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }
    .about-title span { color: var(--accent); }
    .about-desc {
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.85;
        max-width: 520px;
    }
    .about-hero-img {
        border-radius: 24px;
        overflow: hidden;
        aspect-ratio: 4/3;
        box-shadow: var(--shadow-lg);
    }
    .about-hero-img img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    /* ══ STATS ══ */
    .about-stats {
        background: var(--bg);
        padding: 4rem 2rem;
    }
    .about-stats-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
    }
    .astat {
        text-align: center;
        padding: 2rem 1rem;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 20px;
        transition: border-color 0.2s, transform 0.2s;
    }
    .astat:hover { border-color: var(--accent); transform: translateY(-4px); }
    .astat-num {
        font-family: 'DM Serif Display', serif;
        font-size: 2.75rem;
        color: var(--accent);
        line-height: 1;
        margin-bottom: 0.5rem;
    }
    .astat-label {
        font-size: 0.72rem; font-weight: 700;
        letter-spacing: 0.12em; text-transform: uppercase;
        color: var(--text-muted);
    }

    /* ══ STORY ══ */
    .about-story {
        background: var(--surface);
        padding: 5rem 2rem;
    }
    .about-story-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
    }
    .story-img {
        border-radius: 24px;
        overflow: hidden;
        aspect-ratio: 1/1;
        box-shadow: var(--shadow-md);
    }
    .story-img img { width: 100%; height: 100%; object-fit: cover; }
    .story-eyebrow {
        font-size: 0.65rem; font-weight: 700;
        letter-spacing: 0.2em; text-transform: uppercase;
        color: var(--accent); margin-bottom: 1rem;
    }
    .story-heading {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        color: var(--text); line-height: 1.15;
        margin-bottom: 1.5rem;
    }
    .story-text {
        font-size: 0.92rem;
        color: var(--text-muted);
        line-height: 1.9;
        margin-bottom: 1.5rem;
    }

    /* ══ VALUES ══ */
    .about-values {
        background: var(--bg);
        padding: 5rem 2rem;
    }
    .about-values-inner {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    .values-eyebrow {
        font-size: 0.65rem; font-weight: 700;
        letter-spacing: 0.2em; text-transform: uppercase;
        color: var(--accent); margin-bottom: 1rem;
    }
    .values-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: clamp(2rem, 3.5vw, 2.75rem);
        color: var(--text); margin-bottom: 3rem;
    }
    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        text-align: left;
    }
    .value-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 2rem;
        transition: border-color 0.3s, transform 0.3s;
    }
    .value-card:hover { border-color: var(--accent); transform: translateY(-5px); }
    .value-icon {
        width: 52px; height: 52px;
        border-radius: 16px;
        background: var(--accent-dim);
        display: flex; align-items: center; justify-content: center;
        color: var(--accent);
        margin-bottom: 1.25rem;
    }
    .value-name {
        font-size: 1.1rem; font-weight: 800;
        color: var(--text); margin-bottom: 0.75rem;
    }
    .value-desc {
        font-size: 0.85rem;
        color: var(--text-muted);
        line-height: 1.8;
    }

    /* ══ TEAM ══ */
    .about-team {
        background: var(--surface);
        padding: 5rem 2rem;
    }
    .about-team-inner {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    .team-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-top: 3rem;
    }
    .team-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 2rem 1.5rem;
        transition: border-color 0.2s, transform 0.2s;
    }
    .team-card:hover { border-color: var(--accent); transform: translateY(-4px); }
    .team-avatar {
        width: 72px; height: 72px;
        border-radius: 50%;
        margin: 0 auto 1.25rem;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.25rem; font-weight: 800;
    }
    .team-name {
        font-size: 1rem; font-weight: 800;
        color: var(--text); margin-bottom: 0.25rem;
    }
    .team-role {
        font-size: 0.72rem; font-weight: 700;
        letter-spacing: 0.1em; text-transform: uppercase;
        color: var(--accent);
    }

    /* ══ CTA ══ */
    .about-cta {
        background: var(--bg);
        padding: 5rem 2rem;
    }
    .about-cta-inner {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        background: var(--gradient-card);
        border: 1px solid var(--accent);
        border-radius: 28px;
        padding: 4rem 3rem;
    }
    .cta-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        color: var(--text); margin-bottom: 1rem;
    }
    .cta-desc {
        font-size: 0.92rem; color: var(--text-muted);
        line-height: 1.8; margin-bottom: 2rem;
        max-width: 500px; margin-inline: auto;
    }
    .cta-buttons { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
    .cta-primary {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 1rem 2rem; background: var(--accent);
        color: var(--accent-dark); font-size: 0.82rem;
        font-weight: 800; text-transform: uppercase;
        letter-spacing: 0.05em; border-radius: 14px;
        text-decoration: none; transition: all 0.2s;
    }
    .cta-primary:hover { background: var(--accent-hover); transform: translateY(-2px); }
    .cta-secondary {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 1rem 2rem; background: transparent;
        border: 1px solid var(--border-hover);
        color: var(--text-muted); font-size: 0.82rem;
        font-weight: 700; border-radius: 14px;
        text-decoration: none; transition: all 0.2s;
    }
    .cta-secondary:hover { color: var(--text); border-color: var(--text); }

    @media(max-width:968px) {
        .about-hero-inner, .about-story-inner { grid-template-columns: 1fr; gap: 2.5rem; }
        .about-stats-inner { grid-template-columns: 1fr 1fr; }
        .values-grid { grid-template-columns: 1fr; }
        .team-grid { grid-template-columns: 1fr 1fr; }
    }
    @media(max-width:600px) {
        .about-stats-inner { grid-template-columns: 1fr 1fr; }
        .team-grid { grid-template-columns: 1fr; }
        .cta-buttons { flex-direction: column; align-items: center; }
    }
</style>
@endsection

@section('content')
<!-- Hero -->
<div class="about-hero">
    <div class="about-hero-inner">
        <div>
            <div class="about-eyebrow">Tentang Kami</div>
            <h1 class="about-title">Membangun <span>Impian</span>,<br/>Menciptakan Nilai.</h1>
            <p class="about-desc">Bintang Property Group adalah pengembang properti premium terpercaya di Sumatera Utara. Sejak 2011, kami telah menghadirkan lebih dari 1.200 unit hunian berkualitas tinggi yang mengubah standar hidup masyarakat.</p>
        </div>
        <div class="about-hero-img">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvQ1uXSJeU1RNU4uVgSRKq9zUxRJNjEIIgGmPQ07hOulJpcLQ-NaEBStrS-2XFMQ5x12wtbbvTooOl62wUi4BQH0yjxMoJwawFRHdaUK1jcitTvG1qFx9xbBhM0FctOvbQ5zfSuMRZsUgJsAf9AQ7akGi5PykIL_JhPj3W7S8AnRWIUd_kn4ZWilYLGYl27_JdmCMO9IXf623jHyfFJIitel5kiSumXsO1Ch3pMduTKK07A5_5zphU2iX_mxcmjVhdaIBo6Ow5__Q" alt="Kantor Bintang Property" fetchpriority="high"/>
        </div>
    </div>
</div>

<!-- Stats -->
<section class="about-stats">
    <div class="about-stats-inner">
        <div class="astat">
            <div class="astat-num">13+</div>
            <div class="astat-label">Tahun Pengalaman</div>
        </div>
        <div class="astat">
            <div class="astat-num">1.200+</div>
            <div class="astat-label">Unit Terbangun</div>
        </div>
        <div class="astat">
            <div class="astat-num">15</div>
            <div class="astat-label">Proyek Aktif</div>
        </div>
        <div class="astat">
            <div class="astat-num">98%</div>
            <div class="astat-label">Klien Puas</div>
        </div>
    </div>
</section>

<!-- Story -->
<section class="about-story">
    <div class="about-story-inner">
        <div class="story-img">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" alt="Cerita Kami" loading="lazy"/>
        </div>
        <div>
            <div class="story-eyebrow">Perjalanan Kami</div>
            <h2 class="story-heading">Dari Visi Sederhana,<br/>Menjadi Legasi Nyata.</h2>
            <p class="story-text">Perjalanan kami bermula dari keyakinan sederhana: setiap keluarga berhak memiliki hunian yang layak, indah, dan terjangkau. Berangkat dari satu proyek kecil di pinggiran Medan, kami terus bertumbuh menjadi salah satu pengembang paling dipercaya di Sumatera Utara.</p>
            <p class="story-text">Setiap rumah yang kami bangun bukan sekadar struktur — melainkan panggung bagi cerita hidup, mimpi, dan kebersamaan keluarga. Kami menggabungkan desain inovatif, material berkualitas, dan infrastruktur modern untuk menciptakan lingkungan hunian yang benar-benar meningkatkan kualitas hidup.</p>
        </div>
    </div>
</section>

<!-- Values -->
<section class="about-values">
    <div class="about-values-inner">
        <div class="values-eyebrow">Prinsip Kami</div>
        <h2 class="values-title">Nilai yang Membedakan Kami</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon"><span class="material-symbols-rounded">verified</span></div>
                <div class="value-name">Integritas Tanpa Kompromi</div>
                <div class="value-desc">Transparansi harga, legalitas terjamin SHM, dan komitmen terhadap janji — fondasi kepercayaan yang kami bangun bersama setiap klien.</div>
            </div>
            <div class="value-card">
                <div class="value-icon"><span class="material-symbols-rounded">architecture</span></div>
                <div class="value-name">Desain yang Inspiratif</div>
                <div class="value-desc">Kolaborasi dengan arsitek terkemuka untuk menciptakan hunian yang tidak hanya cantik, tapi juga fungsional dan berkelanjutan.</div>
            </div>
            <div class="value-card">
                <div class="value-icon"><span class="material-symbols-rounded">eco</span></div>
                <div class="value-name">Berkelanjutan & Hijau</div>
                <div class="value-desc">Sirkulasi udara optimal, pencahayaan alami, dan ruang terbuka hijau — karena rumah terbaik adalah yang selaras dengan alam.</div>
            </div>
            <div class="value-card">
                <div class="value-icon"><span class="material-symbols-rounded">handshake</span></div>
                <div class="value-name">Layanan Seumur Hidup</div>
                <div class="value-desc">Hubungan kami tidak berakhir di akad. Tim after-sales siap membantu Anda kapanpun, untuk apapun.</div>
            </div>
            <div class="value-card">
                <div class="value-icon"><span class="material-symbols-rounded">security</span></div>
                <div class="value-name">Keamanan Terpadu</div>
                <div class="value-desc">Sistem keamanan pintar 24 jam dengan CCTV terintegrasi dan akses kontrol di setiap cluster perumahan.</div>
            </div>
            <div class="value-card">
                <div class="value-icon"><span class="material-symbols-rounded">trending_up</span></div>
                <div class="value-name">Investasi Bernilai Tinggi</div>
                <div class="value-desc">Lokasi strategis dan pengembangan infrastruktur yang terencana menjamin apresiasi nilai properti jangka panjang.</div>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="about-team">
    <div class="about-team-inner">
        <div class="values-eyebrow">Tim Kami</div>
        <h2 class="values-title">Digerakkan oleh Profesional Berdedikasi</h2>
        <div class="team-grid">
            @php
                $team = [
                    ['name'=>'Ir. Hendra Bintang','role'=>'Founder & CEO','init'=>'HB','bg'=>'rgba(16,217,160,0.12)','color'=>'#10d9a0'],
                    ['name'=>'Sari Dewi, ST','role'=>'Head of Design','init'=>'SD','bg'=>'rgba(99,102,241,0.12)','color'=>'#818cf8'],
                    ['name'=>'Rizky Pratama','role'=>'Marketing Director','init'=>'RP','bg'=>'rgba(245,158,11,0.12)','color'=>'#f59e0b'],
                    ['name'=>'Maya Indah, SE','role'=>'Finance Manager','init'=>'MI','bg'=>'rgba(236,72,153,0.12)','color'=>'#ec4899'],
                ];
            @endphp
            @foreach($team as $t)
            <div class="team-card">
                <div class="team-avatar" style="background:{{ $t['bg'] }};color:{{ $t['color'] }};">{{ $t['init'] }}</div>
                <div class="team-name">{{ $t['name'] }}</div>
                <div class="team-role">{{ $t['role'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="about-cta">
    <div class="about-cta-inner">
        <div class="cta-title">Siap Menemukan Hunian Impian?</div>
        <p class="cta-desc">Jadwalkan kunjungan ke salah satu proyek kami, atau konsultasikan kebutuhan properti Anda langsung dengan tim ahli kami.</p>
        <div class="cta-buttons">
            <a href="{{ url('/contact') }}" class="cta-primary">
                <span class="material-symbols-rounded" style="font-size:18px;">calendar_today</span>
                Jadwalkan Kunjungan
            </a>
            <a href="{{ url('/properties') }}" class="cta-secondary">
                <span class="material-symbols-rounded" style="font-size:18px;">apartment</span>
                Lihat Proyek Kami
            </a>
        </div>
    </div>
</section>
@endsection
