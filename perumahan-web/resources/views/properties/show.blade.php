@extends('layouts.app')

@section('title', ($prop->title ?? 'Detail Properti') . ' | Bintang Property Group')

@section('head')
<style>
    .show-gallery { padding-top: 72px; background: var(--surface); }
    .gallery-inner { max-width: 1440px; margin: 0 auto; padding: 1.5rem 2rem; }
    .gallery-grid { display: grid; grid-template-columns: 2fr 1fr; grid-template-rows: 1fr 1fr; gap: 1rem; height: 520px; }
    .gallery-main { grid-row: 1 / 3; border-radius: 20px; overflow: hidden; position: relative; }
    .gallery-main img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
    .gallery-main:hover img { transform: scale(1.04); }
    .gallery-thumb { border-radius: 16px; overflow: hidden; position: relative; cursor: pointer; }
    .gallery-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s; }
    .gallery-thumb:hover img { transform: scale(1.05); }
    .gallery-thumb-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.45); display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
    .gallery-thumb:hover .gallery-thumb-overlay { background: rgba(0,0,0,0.25); }
    .gallery-thumb-btn { background: rgba(255,255,255,0.12); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); border-radius: 10px; padding: 0.625rem 1.25rem; color: #fff; font-size: 0.82rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; }
    .gallery-badges { position: absolute; bottom: 1.25rem; left: 1.25rem; display: flex; gap: 0.5rem; }
    .g-badge { padding: 0.35rem 0.875rem; border-radius: 8px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; }
    .g-badge.available { background: var(--accent); color: var(--accent-dark); }
    .g-badge.ready { background: rgba(255,255,255,0.12); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); color: #fff; }

    .show-body { background: var(--bg); padding: 3rem 2rem 5rem; }
    .show-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 380px; gap: 3rem; }
    .show-breadcrumb { display: flex; align-items: center; gap: 0.5rem; font-size: 0.75rem; color: var(--text-muted); margin-bottom: 1.5rem; }
    .show-breadcrumb a { color: var(--text-muted); text-decoration: none; transition: color 0.15s; }
    .show-breadcrumb a:hover { color: var(--accent); }
    .show-loc { display: flex; align-items: center; gap: 0.375rem; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.875rem; }
    .show-title { font-family: 'DM Serif Display', serif; font-style: italic; font-size: clamp(2rem, 4vw, 3rem); color: var(--text); line-height: 1.1; margin-bottom: 2rem; text-wrap: balance; }
    .show-specs { display: flex; flex-wrap: wrap; gap: 1.25rem; padding: 1.5rem 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); margin-bottom: 2rem; }
    .spec-item { display: flex; align-items: center; gap: 0.875rem; }
    .spec-icon { width: 48px; height: 48px; border-radius: 14px; background: var(--accent-dim); display: flex; align-items: center; justify-content: center; color: var(--accent); flex-shrink: 0; }
    .spec-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-faint); }
    .spec-value { font-size: 1rem; font-weight: 800; color: var(--text); margin-top: 2px; }
    .show-section { margin-bottom: 2.5rem; }
    .show-section h2 { font-size: 1.25rem; font-weight: 800; color: var(--text); margin-bottom: 1rem; }
    .show-desc { font-size: 0.9rem; color: var(--text-muted); line-height: 1.9; }
    .show-desc p + p { margin-top: 1rem; }
    .facilities-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.75rem; }
    .facility-item { display: flex; align-items: center; gap: 0.75rem; padding: 1rem; background: var(--card); border: 1px solid var(--border); border-radius: 14px; font-size: 0.82rem; font-weight: 600; color: var(--text-secondary); transition: border-color 0.2s; }
    .facility-item:hover { border-color: var(--accent); }
    .facility-item .material-symbols-rounded { color: var(--accent); flex-shrink: 0; }

    /* Sticky Sidebar */
    .show-sidebar { align-self: flex-start; position: sticky; top: 90px; }
    .booking-card { background: var(--card); border: 1px solid var(--border); border-radius: 24px; padding: 2rem; box-shadow: var(--shadow-sm); }
    .price-top { text-align: center; padding-bottom: 1.5rem; border-bottom: 1px solid var(--border); margin-bottom: 1.5rem; }
    .price-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.5rem; }
    .price-num { font-family: 'DM Serif Display', serif; font-size: 2.4rem; color: var(--accent); line-height: 1; letter-spacing: -0.02em; }
    .price-monthly { font-size: 0.82rem; color: var(--text-muted); margin-top: 0.375rem; }
    .booking-title { font-size: 1rem; font-weight: 800; color: var(--text); margin-bottom: 1rem; }
    .booking-input { width: 100%; background: var(--bg); border: 1px solid var(--border); border-radius: 12px; padding: 0.875rem 1rem; color: var(--text); font-size: 0.875rem; font-family: inherit; outline: none; margin-bottom: 0.875rem; transition: border-color 0.2s; }
    .booking-input::placeholder { color: var(--text-faint); }
    .booking-input:focus { border-color: var(--accent); }
    .booking-btn { width: 100%; padding: 1rem; background: var(--accent); color: var(--accent-dark); font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; border: none; border-radius: 12px; cursor: pointer; margin-bottom: 1rem; transition: background 0.2s, transform 0.15s; }
    .booking-btn:hover { background: var(--accent-hover); transform: translateY(-1px); }
    .booking-wa { display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-size: 0.8rem; color: var(--text-muted); text-decoration: none; transition: color 0.2s; }
    .booking-wa:hover { color: var(--accent); }

    @media(max-width:1024px) { .show-inner { grid-template-columns: 1fr; } .show-sidebar { position: static; } }
    @media(max-width:768px) { .gallery-grid { grid-template-columns: 1fr; height: auto; } .gallery-main { grid-row: auto; height: 260px; } .gallery-thumb { height: 130px; } .facilities-grid { grid-template-columns: 1fr 1fr; } }
</style>
@endsection

@section('content')
<!-- Gallery -->
<div class="show-gallery">
    <div class="gallery-inner">
        <div class="gallery-grid">
            <div class="gallery-main">
                <img src="{{ $prop->main_image }}" alt="{{ $prop->title }}" fetchpriority="high"/>
                <div class="gallery-badges">
                    <span class="g-badge available">{{ $prop->status }}</span>
                    <span class="g-badge ready">Siap Huni</span>
                </div>
            </div>
            <div class="gallery-thumb">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7lz969iWsPePZaJ5W-HVOzIJQUfehqD1DxTdp5NVQR1lpgqJbrcR-fomD_HDgfSqRe7ZvJmVTvHzMzOmq_-oLuAJGPnx2ZkvMP86zjH4WMECwejxyyvAejxYL8BnKzHw6Pn82UAp44lZdUqkqg2XbHwG2eikZBOGgF_gu11d4muj-d5mMU8kROyR13JPjKdV9bNo6hZv34vW36iyiIJ4c5hCNAB1s_cVS2PFNR03I605RjON8XRucqEoCEhFPXSw7jLbQB3EOAic" alt="Interior" loading="lazy"/>
            </div>
            <div class="gallery-thumb">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvQ1uXSJeU1RNU4uVgSRKq9zUxRJNjEIIgGmPQ07hOulJpcLQ-NaEBStrS-2XFMQ5x12wtbbvTooOl62wUi4BQH0yjxMoJwawFRHdaUK1jcitTvG1qFx9xbBhM0FctOvbQ5zfSuMRZsUgJsAf9AQ7akGi5PykIL_JhPj3W7S8AnRWIUd_kn4ZWilYLGYl27_JdmCMO9IXf623jHyfFJIitel5kiSumXsO1Ch3pMduTKK07A5_5zphU2iX_mxcmjVhdaIBo6Ow5__Q" alt="Kamar Tidur" loading="lazy"/>
                <div class="gallery-thumb-overlay">
                    <div class="gallery-thumb-btn">
                        <span class="material-symbols-rounded" style="font-size:18px;">photo_library</span> +8 Foto
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Body -->
<section class="show-body">
    <div class="show-inner">
        <div>
            <div class="show-breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="material-symbols-rounded" style="font-size:14px;">chevron_right</span>
                <a href="{{ url('/properties') }}">Properti</a>
                <span class="material-symbols-rounded" style="font-size:14px;">chevron_right</span>
                <span style="color:var(--text-faint);">{{ $prop->title }}</span>
            </div>
            <div class="show-loc">
                <span class="material-symbols-rounded" style="font-size:16px;">location_on</span>
                {{ $prop->city }}
            </div>
            <h1 class="show-title">{{ $prop->title }}</h1>

            <div class="show-specs">
                <div class="spec-item">
                    <div class="spec-icon"><span class="material-symbols-rounded">bed</span></div>
                    <div><div class="spec-label">Kamar Tidur</div><div class="spec-value">{{ $prop->bedrooms > 0 ? $prop->bedrooms . ' Ruang' : '-' }}</div></div>
                </div>
                <div class="spec-item">
                    <div class="spec-icon"><span class="material-symbols-rounded">bathtub</span></div>
                    <div><div class="spec-label">Kamar Mandi</div><div class="spec-value">{{ $prop->bathrooms > 0 ? $prop->bathrooms . ' Ruang' : '-' }}</div></div>
                </div>
                <div class="spec-item">
                    <div class="spec-icon"><span class="material-symbols-rounded">square_foot</span></div>
                    <div><div class="spec-label">Luas Bangunan</div><div class="spec-value">{{ $prop->build_size }} M²</div></div>
                </div>
                <div class="spec-item">
                    <div class="spec-icon"><span class="material-symbols-rounded">garage</span></div>
                    <div><div class="spec-label">Carport</div><div class="spec-value">2 Mobil</div></div>
                </div>
            </div>

            <div class="show-section">
                <h2>Deskripsi Properti</h2>
                <div class="show-desc">
                    <p>{{ $prop->title }} mendefinisikan ulang kemewahan urban di {{ $prop->city }}. Didesain oleh arsitek terkemuka, hunian ini memadukan estetika minimalis modern dengan fungsionalitas ruang yang maksimal.</p>
                    <p>Setiap unit dilengkapi dengan sistem sirkulasi udara pintar dan jendela floor-to-ceiling yang memastikan pencahayaan alami sepanjang hari. Material premium seperti marmer impor dan kayu solid untuk sentuhan akhir yang elegan.</p>
                    <p>Fasilitas perumahan mencakup sistem keamanan pintar 24 jam, kolam renang infinity bergaya resort, pusat kebugaran, dan taman bermain anak yang dikelilingi lanskap hijau yang asri.</p>
                </div>
            </div>

            <div class="show-section">
                <h2>Fasilitas Unggulan</h2>
                <div class="facilities-grid">
                    <div class="facility-item"><span class="material-symbols-rounded">security</span>Keamanan 24 Jam</div>
                    <div class="facility-item"><span class="material-symbols-rounded">pool</span>Clubhouse & Kolam</div>
                    <div class="facility-item"><span class="material-symbols-rounded">park</span>Taman Tematik</div>
                    <div class="facility-item"><span class="material-symbols-rounded">home_iot_device</span>Smart Home Ready</div>
                    <div class="facility-item"><span class="material-symbols-rounded">local_cafe</span>Area Komersial</div>
                    <div class="facility-item"><span class="material-symbols-rounded">garage</span>Carport 2 Mobil</div>
                </div>
            </div>
        </div>

        <!-- Sticky Sidebar -->
        <aside class="show-sidebar">
            <div class="booking-card">
                <div class="price-top">
                    <div class="price-label">Harga Perdana Mulai</div>
                    <div class="price-num">Rp {{ number_format($prop->price / 1000000, 1, ',', '.') }} Jt</div>
                    <div class="price-monthly">Estimasi cicilan: Rp {{ number_format(($prop->price * 0.007) / 1000000, 1, ',', '.') }} Jt/bln</div>
                </div>
                <div class="booking-title">Jadwalkan Kunjungan</div>
                <form action="{{ url('/contact') }}" method="POST">
                    @csrf
                    <input class="booking-input" name="name" type="text" placeholder="Nama Lengkap" required/>
                    <input class="booking-input" name="phone" type="tel" placeholder="Nomor Telepon/WA" required/>
                    <input class="booking-input" name="date" type="date" required/>
                    <button type="submit" class="booking-btn">Pesan Jadwal</button>
                </form>
                <a href="https://wa.me/6281200000000?text=Halo Bintang Property, saya tertarik dengan {{ $prop->title }}" target="_blank" class="booking-wa">
                    <span class="material-symbols-rounded" style="font-size:16px;">chat</span>
                    Atau hubungi via WhatsApp
                </a>
            </div>
        </aside>
    </div>
</section>
@endsection

