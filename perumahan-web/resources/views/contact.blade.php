@extends('layouts.app')

@section('title', 'Hubungi Kami | Bintang Property Group')

@section('head')
<style>
    .contact-hero {
        padding-top: 72px; min-height: 52vh;
        background: var(--surface);
        display: flex; align-items: center;
        border-bottom: 1px solid var(--border);
        position: relative; overflow: hidden;
    }
    .contact-hero::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse 700px 400px at 30% 60%, var(--accent-dim), transparent);
        pointer-events: none;
    }
    .contact-hero-inner {
        max-width: 1200px; margin: 0 auto;
        padding: 4rem 2rem; position: relative; z-index: 1;
        text-align: center;
    }
    .contact-eyebrow {
        display: inline-flex; align-items: center; gap: 0.625rem;
        font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase;
        color: var(--accent); margin-bottom: 1.25rem;
        padding: 0.4rem 1.25rem; border-radius: 100px;
        background: var(--accent-dim); border: 1px solid var(--accent);
    }
    .contact-eyebrow::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: var(--accent); animation: pulse 2s infinite; }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }
    .contact-title {
        font-family: 'DM Serif Display', serif; font-style: italic;
        font-size: clamp(2.5rem, 5vw, 4.5rem); color: var(--text);
        line-height: 1.1; margin-bottom: 1.25rem;
    }
    .contact-subtitle { font-size: 1rem; color: var(--text-muted); max-width: 540px; margin: 0 auto; line-height: 1.8; }

    /* Body */
    .contact-body { background: var(--bg); padding: 5rem 2rem; }
    .contact-inner { max-width: 1100px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1.6fr; gap: 3rem; }

    /* Info Cards */
    .info-card {
        background: var(--card); border: 1px solid var(--border);
        border-radius: 20px; padding: 1.75rem;
        display: flex; gap: 1.25rem; align-items: flex-start;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .info-card:hover { border-color: var(--accent); box-shadow: 0 0 0 1px var(--accent-dim); }
    .info-card + .info-card { margin-top: 1rem; }
    .info-card-icon {
        width: 48px; height: 48px; border-radius: 14px; flex-shrink: 0;
        background: var(--accent-dim); display: flex; align-items: center; justify-content: center;
        color: var(--accent);
    }
    .info-card-label { font-size: 0.62rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); margin-bottom: 0.375rem; }
    .info-card-value { font-size: 0.9rem; font-weight: 700; color: var(--text); margin-bottom: 0.25rem; }
    .info-card-sub { font-size: 0.78rem; color: var(--text-muted); line-height: 1.6; }
    .wa-btn {
        display: inline-flex; align-items: center; gap: 0.5rem;
        margin-top: 0.75rem; padding: 0.5rem 1rem;
        background: rgba(37,211,102,0.1); border: 1px solid rgba(37,211,102,0.2);
        border-radius: 8px; font-size: 0.72rem; font-weight: 700;
        color: #25d366; text-decoration: none; transition: all 0.15s;
    }
    .wa-btn:hover { background: rgba(37,211,102,0.18); }

    /* Quick hours */
    .hours-grid { margin-top: 1.5rem; background: var(--card); border: 1px solid var(--border); border-radius: 20px; padding: 1.75rem; }
    .hours-title { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); margin-bottom: 1rem; }
    .hours-row { display: flex; justify-content: space-between; font-size: 0.82rem; font-weight: 600; color: var(--text-muted); margin-bottom: 0.5rem; }
    .hours-row strong { color: var(--text); }
    .hours-row.today strong { color: var(--accent); }

    /* Form Card */
    .form-card { background: var(--card); border: 1px solid var(--border); border-radius: 24px; padding: 2.5rem; box-shadow: var(--shadow-sm); }
    .form-card-title { font-family: 'DM Serif Display', serif; font-style: italic; font-size: 1.6rem; color: var(--text); margin-bottom: 0.375rem; }
    .form-card-sub { font-size: 0.82rem; color: var(--text-muted); margin-bottom: 2rem; }
    .form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem; }
    .fg { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.25rem; }
    .fg:last-of-type { margin-bottom: 0; }
    .flabel { font-size: 0.62rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); }
    .finput {
        background: var(--bg); border: 1px solid var(--border);
        border-radius: 12px; padding: 0.875rem 1.125rem;
        color: var(--text); font-size: 0.875rem; font-family: inherit;
        outline: none; transition: border-color 0.2s, box-shadow 0.2s; width: 100%;
    }
    .finput::placeholder { color: var(--text-faint); }
    .finput:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-dim); }
    textarea.finput { min-height: 120px; resize: vertical; }
    .type-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.625rem; margin-bottom: 1.25rem; }
    .type-opt { display: none; }
    .type-label {
        display: flex; flex-direction: column; align-items: center; gap: 0.375rem;
        padding: 0.875rem 0.5rem; border-radius: 12px;
        border: 1px solid var(--border); background: var(--bg);
        cursor: pointer; font-size: 0.72rem; font-weight: 700;
        color: var(--text-muted); text-align: center; transition: all 0.15s;
    }
    .type-label .material-symbols-rounded { font-size: 22px; color: var(--text-faint); transition: color 0.15s; }
    .type-opt:checked + .type-label { border-color: var(--accent); background: var(--accent-dim); color: var(--accent); }
    .type-opt:checked + .type-label .material-symbols-rounded { color: var(--accent); }
    .submit-btn {
        width: 100%; padding: 1rem 2rem;
        background: var(--accent); color: var(--accent-dark);
        font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em;
        border: none; border-radius: 14px; cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 0.625rem;
        transition: background 0.2s, transform 0.15s; margin-top: 1.5rem;
    }
    .submit-btn:hover { background: var(--accent-hover); transform: translateY(-1px); }

    @media(max-width:900px) { .contact-inner { grid-template-columns: 1fr; } }
    @media(max-width:640px) { .form-grid-2 { grid-template-columns: 1fr; } .type-grid { grid-template-columns: 1fr 1fr; } }
</style>
@endsection

@section('content')
<div class="contact-hero">
    <div class="contact-hero-inner">
        <div class="contact-eyebrow">Hubungi Kami</div>
        <h1 class="contact-title">Mari Wujudkan<br/>Hunian Impian Anda</h1>
        <p class="contact-subtitle">Tim spesialis properti kami siap membantu menemukan aset terbaik di Sumatera Utara dengan layanan personal.</p>
    </div>
</div>

<section class="contact-body">
    <div class="contact-inner">
        <!-- Info -->
        <div>
            <div class="info-card">
                <div class="info-card-icon"><span class="material-symbols-rounded">location_on</span></div>
                <div>
                    <div class="info-card-label">Kantor Pusat</div>
                    <div class="info-card-value">Jl. Jend. Sudirman No. 123</div>
                    <div class="info-card-sub">Medan, Sumatera Utara 20112<br/>Gedung Bintang Tower, Lt. 8</div>
                </div>
            </div>
            <div class="info-card">
                <div class="info-card-icon"><span class="material-symbols-rounded">call</span></div>
                <div>
                    <div class="info-card-label">Hotline Penjualan</div>
                    <div class="info-card-value">+62 61 888-0099</div>
                    <div class="info-card-sub">Tersedia 7 hari seminggu, 08.00–21.00 WIB</div>
                    <a href="https://wa.me/6281200000000" target="_blank" class="wa-btn">
                        <span class="material-symbols-rounded" style="font-size:16px;">chat</span>WhatsApp Cepat
                    </a>
                </div>
            </div>
            <div class="info-card">
                <div class="info-card-icon"><span class="material-symbols-rounded">mail</span></div>
                <div>
                    <div class="info-card-label">Email</div>
                    <div class="info-card-value">sales@bintangproperty.id</div>
                    <div class="info-card-sub">Balas dalam 1x24 jam kerja</div>
                </div>
            </div>

            <div class="hours-grid">
                <div class="hours-title">Jam Operasional Showroom</div>
                <div class="hours-row today"><strong>Senin — Jumat</strong><strong>08:00 – 21:00</strong></div>
                <div class="hours-row"><strong>Sabtu</strong><span>09:00 – 18:00</span></div>
                <div class="hours-row"><strong>Minggu</strong><span>10:00 – 16:00</span></div>
            </div>
        </div>

        <!-- Form -->
        <div class="form-card">
            <div class="form-card-title">Kirim Pesan</div>
            <div class="form-card-sub">Isi formulir di bawah dan tim kami akan segera menghubungi Anda.</div>

            @if(session('success'))
                <div style="background:var(--accent-dim);border:1px solid var(--accent);border-radius:12px;padding:1rem 1.25rem;color:var(--accent);font-size:0.875rem;font-weight:700;margin-bottom:1.5rem;display:flex;gap:0.5rem;align-items:center;">
                    <span class="material-symbols-rounded">check_circle</span>{{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/contact') }}" method="POST">
                @csrf
                <label style="font-size:0.62rem;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;color:var(--text-faint);display:block;margin-bottom:0.75rem;">Saya tertarik dengan</label>
                <div class="type-grid">
                    <input class="type-opt" type="radio" name="interest" id="t1" value="Perumahan Cluster" checked>
                    <label class="type-label" for="t1"><span class="material-symbols-rounded">villa</span>Perumahan</label>
                    <input class="type-opt" type="radio" name="interest" id="t2" value="Ruko Komersial">
                    <label class="type-label" for="t2"><span class="material-symbols-rounded">storefront</span>Ruko</label>
                    <input class="type-opt" type="radio" name="interest" id="t3" value="Kavling Tanah">
                    <label class="type-label" for="t3"><span class="material-symbols-rounded">landscape</span>Kavling</label>
                </div>

                <div class="form-grid-2">
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel" for="contact-name">Nama Lengkap</label>
                        <input id="contact-name" class="finput" type="text" name="name" placeholder="Nama Anda" required/>
                    </div>
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel" for="contact-phone">Nomor Telepon / WA</label>
                        <input id="contact-phone" class="finput" type="tel" name="phone" placeholder="+62 812..." required/>
                    </div>
                </div>

                <div class="fg">
                    <label class="flabel" for="contact-email">Email (Opsional)</label>
                    <input id="contact-email" class="finput" type="email" name="email" placeholder="email@domain.com"/>
                </div>

                <div class="fg">
                    <label class="flabel" for="contact-message">Pesan / Pertanyaan</label>
                    <textarea id="contact-message" class="finput" name="message" placeholder="Ceritakan kebutuhan hunian ideal Anda..."></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <span class="material-symbols-rounded" style="font-size:18px;">send</span>
                    Kirim Permintaan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
