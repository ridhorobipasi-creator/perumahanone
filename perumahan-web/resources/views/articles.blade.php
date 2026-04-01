@extends('layouts.app')

@section('title', 'Artikel & Wawasan | Bintang Property Group')

@section('head')
<style>
    .article-hero {
        padding-top: 120px;
        padding-bottom: 60px;
        background: var(--surface);
        text-align: center;
        border-bottom: 1px solid var(--border);
    }
    .article-eyebrow {
        font-size: 0.7rem; font-weight: 700;
        letter-spacing: 0.2em; text-transform: uppercase;
        color: var(--accent); margin-bottom: 1rem;
    }
    .article-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: clamp(2.5rem, 5vw, 4rem);
        color: var(--text);
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }
    .article-desc {
        max-width: 600px;
        margin: 0 auto;
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.7;
    }

    .article-section {
        background: var(--bg);
        padding: 4rem 2rem 6rem;
    }
    .article-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    .article-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 24px;
        overflow: hidden;
        transition: transform 0.3s, border-color 0.3s;
        text-decoration: none;
    }
    .article-card:hover { transform: translateY(-6px); border-color: var(--accent); }
    .article-img { height: 240px; }
    .article-img img { width: 100%; height: 100%; object-fit: cover; }
    .article-content { padding: 1.75rem; }
    .article-meta {
        font-size: 0.7rem; font-weight: 600;
        color: var(--text-faint); margin-bottom: 0.75rem;
        display: flex; align-items: center; gap: 0.75rem;
    }
    .article-tag { color: var(--accent); font-weight: 800; letter-spacing: 0.05em; text-transform: uppercase; }
    .article-card-title {
        font-family: 'DM Serif Display', serif;
        font-style: italic;
        font-size: 1.5rem; color: var(--text);
        margin-bottom: 1rem; line-height: 1.25;
    }
    .article-card-desc {
        font-size: 0.875rem; color: var(--text-muted);
        line-height: 1.7; margin-bottom: 1.5rem;
    }
    .article-link {
        font-size: 0.75rem; font-weight: 800;
        color: var(--accent); text-transform: uppercase;
        letter-spacing: 0.05em; display: flex; align-items: center; gap: 0.5rem;
    }

    @media(max-width: 968px) { .article-grid { grid-template-columns: repeat(2, 1fr); } }
    @media(max-width: 600px) { .article-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="article-hero">
    <div class="article-eyebrow">Wawasan Properti</div>
    <h1 class="article-title">Artikel <span>Terbaru</span></h1>
    <p class="article-desc">Temukan tips menarik seputar investasi properti, desain interior, dan panduan membeli rumah impian Anda.</p>
</div>

<section class="article-section">
    <div class="article-grid">
        <a href="#" class="article-card">
            <div class="article-img">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c" alt="Tips KPR"/>
            </div>
            <div class="article-content">
                <div class="article-meta">
                    <span class="article-tag">PANDUAN</span>
                    <span>•</span>
                    <span>15 Mars 2024</span>
                </div>
                <h2 class="article-card-title">5 Tips Sukses Ajukan KPR Tahun Ini Agar Mudah Disetujui Bank</h2>
                <p class="article-card-desc">Memilih rumah idaman sudah, sekarang saatnya memastikan pengajuan kartu kredit pembiayaan rumah Anda berjalan lancar.</p>
                <div class="article-link">Baca Selengkapnya <span class="material-symbols-rounded" style="font-size:16px;">trending_flat</span></div>
            </div>
        </a>

        <a href="#" class="article-card">
            <div class="article-img">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0" alt="Interior"/>
            </div>
            <div class="article-content">
                <div class="article-meta">
                    <span class="article-tag">DESAIN</span>
                    <span>•</span>
                    <span>12 Mars 2024</span>
                </div>
                <h2 class="article-card-title">Inspirasi Desain Rumah Compact Minimalis untuk Pasangan Muda</h2>
                <p class="article-card-desc">Lahan terbatas bukan penghalang. Simak bagaimana memaksimalkan setiap jengkal ruang agar terasa luas dan tetap estetik.</p>
                <div class="article-link">Baca Selengkapnya <span class="material-symbols-rounded" style="font-size:16px;">trending_flat</span></div>
            </div>
        </a>

        <a href="#" class="article-card">
            <div class="article-img">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" alt="Investasi"/>
            </div>
            <div class="article-content">
                <div class="article-meta">
                    <span class="article-tag">INVESTASI</span>
                    <span>•</span>
                    <span>08 Mars 2024</span>
                </div>
                <h2 class="article-card-title">Mengapa Sicoland Green Jadi Titik Panas Investasi Terkini di Sumut?</h2>
                <p class="article-card-desc">Analisis pakar mengenai perkembangan infrastruktur di Deli Serdang yang mendongkrak nilai jual aset properti dengan signifikan.</p>
                <div class="article-link">Baca Selengkapnya <span class="material-symbols-rounded" style="font-size:16px;">trending_flat</span></div>
            </div>
        </a>
    </div>
</section>
@endsection
