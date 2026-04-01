<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Bintang Property Group | Hunian Premium Sumatera Utara')</title>
    <meta name="description" content="Bintang Property Group menghadirkan hunian modern dan berkelas di Sumatera Utara. Jelajahi proyek eksklusif, konsultasi, dan solusi pembiayaan terbaik.">
    <meta name="theme-color" content="#0a0a0f">
    <meta property="og:title" content="Bintang Property Group | Premium Real Estate">
    <meta property="og:description" content="Hunian modern, berkelas, dan berkelanjutan di Sumatera Utara.">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="id_ID">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet"/>
    @php
        $cssStable = public_path('build/assets/app.css');
        $manifestPath = public_path('build/manifest.json');
    @endphp
    @if (file_exists($cssStable))
        <style>{!! file_get_contents($cssStable) !!}</style>
    @elseif (file_exists($manifestPath))
        @php $m = json_decode(file_get_contents($manifestPath), true); @endphp
        @if(isset($m['resources/css/app.css']['file']))
            <link rel="stylesheet" href="{{ url('/build/'.$m['resources/css/app.css']['file']) }}"/>
        @endif
    @else
        @vite(['resources/css/app.css'])
    @endif

    <style>
        /* ══════════════════════════════════════════
           DESIGN TOKENS — DARK & LIGHT MODE
        ══════════════════════════════════════════ */
        :root, [data-theme="dark"] {
            --bg:             #07070d;
            --bg2:            #0a0a14;
            --surface:        #0f0f1a;
            --card:           #14141f;
            --card2:          #181828;
            --border:         rgba(255,255,255,0.07);
            --border2:        rgba(255,255,255,0.04);
            --border-hover:   rgba(255,255,255,0.14);
            --text:           #f0f0f8;
            --text-secondary: rgba(240,240,248,0.7);
            --text-muted:     #6b7280;
            --text-faint:     rgba(255,255,255,0.28);
            --accent:         #10d9a0;
            --accent-dim:     rgba(16,217,160,0.10);
            --accent-hover:   #0ffba7;
            --accent-dark:    #021a12;
            --accent2:        #6366f1;
            --shadow-sm:      0 4px 20px rgba(0,0,0,0.3);
            --shadow-md:      0 12px 40px rgba(0,0,0,0.4);
            --shadow-lg:      0 24px 64px rgba(0,0,0,0.5);
            --nav-blur-bg:    rgba(7,7,13,0.88);
            --footer-bg:      #0a0a14;
            --gradient-card:  linear-gradient(135deg, rgba(16,217,160,0.06) 0%, rgba(99,102,241,0.06) 100%);
            --font-sans:      'Plus Jakarta Sans', sans-serif;
            --font-serif:     'DM Serif Display', serif;
            --error:          #f87171;
            --error-dim:      rgba(248,113,113,0.12);
            --warning:        #f59e0b;
            --warning-dim:    rgba(245,158,11,0.12);
            color-scheme: dark;
        }
        [data-theme="light"] {
            --bg:             #f1f5f9;
            --bg2:            #e8ecf1;
            --surface:        #ffffff;
            --card:           #ffffff;
            --card2:          #f8fafc;
            --border:         rgba(0,0,0,0.08);
            --border2:        rgba(0,0,0,0.05);
            --border-hover:   rgba(0,0,0,0.16);
            --text:           #0f172a;
            --text-secondary: rgba(15,23,42,0.72);
            --text-muted:     #64748b;
            --text-faint:     rgba(15,23,42,0.35);
            --accent:         #059669;
            --accent-dim:     rgba(5,150,105,0.10);
            --accent-hover:   #047857;
            --accent-dark:    #ecfdf5;
            --accent2:        #4f46e5;
            --shadow-sm:      0 1px 6px rgba(0,0,0,0.07), 0 2px 16px rgba(0,0,0,0.04);
            --shadow-md:      0 4px 24px rgba(0,0,0,0.08), 0 1px 8px rgba(0,0,0,0.05);
            --shadow-lg:      0 12px 48px rgba(0,0,0,0.10);
            --nav-blur-bg:    rgba(255,255,255,0.92);
            --footer-bg:      #1e293b;
            --gradient-card:  linear-gradient(135deg, rgba(5,150,105,0.05) 0%, rgba(79,70,229,0.05) 100%);
            --error:          #dc2626;
            --error-dim:      rgba(220,38,38,0.10);
            --warning:        #d97706;
            --warning-dim:    rgba(217,119,6,0.10);
            color-scheme: light;
        }

        /* ══ BASE ══ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: var(--font-sans);
            background-color: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            transition: background-color 0.3s, color 0.3s;
        }
        .material-symbols-rounded {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            font-size: 20px; line-height: 1;
        }

        /* ══ NAV ══ */
        #main-nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            transition: background 0.4s, backdrop-filter 0.4s, border-color 0.4s;
        }
        #main-nav.scrolled {
            background: var(--nav-blur-bg);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }
        .nav-inner {
            max-width: 1440px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2rem; height: 72px;
        }
        .nav-logo { display: flex; flex-direction: column; gap: 1px; text-decoration: none; }
        .nav-logo-name {
            font-family: var(--font-serif);
            font-size: 1.2rem; font-style: italic;
            color: var(--text);
            letter-spacing: 0.01em; line-height: 1.1;
        }
        .nav-logo-sub {
            font-size: 0.6rem; font-weight: 700;
            letter-spacing: 0.2em; text-transform: uppercase;
            color: var(--accent);
        }
        .nav-links { display: flex; align-items: center; gap: 0.25rem; list-style: none; }
        .nav-links a {
            display: block; padding: 0.5rem 0.875rem;
            font-size: 0.8rem; font-weight: 600;
            letter-spacing: 0.06em; text-transform: uppercase;
            color: var(--text-muted); text-decoration: none;
            border-radius: 6px; transition: color 0.2s, background 0.2s;
        }
        .nav-links a:hover  { color: var(--text); background: var(--border); }
        .nav-links a.active { color: var(--accent); background: var(--accent-dim); }
        .nav-actions { display: flex; align-items: center; gap: 0.75rem; }

        /* Ghost icon button */
        .btn-ghost-icon {
            width: 38px; height: 38px; border-radius: 50%;
            border: 1px solid var(--border);
            background: none; display: flex; align-items: center; justify-content: center;
            color: var(--text-muted); cursor: pointer;
            transition: color 0.2s, border-color 0.2s, background 0.2s;
            text-decoration: none; position: relative;
        }
        .btn-ghost-icon:hover { color: var(--text); border-color: var(--border-hover); background: var(--border); }

        /* Theme toggle */
        #theme-toggle { transition: transform 0.3s; }
        #theme-toggle:hover { transform: rotate(20deg); }
        #theme-toggle .icon-dark, #theme-toggle .icon-light { transition: opacity 0.2s; }
        [data-theme="dark"]  #theme-toggle .icon-dark  { display: block; }
        [data-theme="dark"]  #theme-toggle .icon-light { display: none; }
        [data-theme="light"] #theme-toggle .icon-dark  { display: none; }
        [data-theme="light"] #theme-toggle .icon-light { display: block; }

        /* Primary button */
        .btn-primary {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.625rem 1.375rem;
            background: var(--accent); color: var(--accent-dark);
            font-size: 0.8rem; font-weight: 700;
            letter-spacing: 0.05em; text-transform: uppercase;
            border-radius: 100px; text-decoration: none; border: none; cursor: pointer;
            transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 0 20px var(--accent-dim);
        }
        .btn-primary:hover { background: var(--accent-hover); transform: translateY(-1px); }
        .btn-primary:active { transform: translateY(0); }

        /* ══ HAMBURGER BUTTON ══ */
        #burger {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 0;
            width: 42px; height: 42px;
            background: var(--border);
            border: 1px solid var(--border-hover);
            border-radius: 12px;
            cursor: pointer;
            position: relative;
            z-index: 201;
            flex-shrink: 0;
        }
        #burger .bline {
            display: block;
            width: 18px; height: 1.5px;
            background: var(--text);
            border-radius: 2px;
            transition: transform 0.35s cubic-bezier(.23,1,.32,1), opacity 0.25s, width 0.3s;
            position: absolute;
        }
        #burger .bline:nth-child(1) { transform: translateY(-5px); }
        #burger .bline:nth-child(2) { transform: translateY(0px); width: 12px; }
        #burger .bline:nth-child(3) { transform: translateY(5px); }
        /* Open state */
        #burger.open .bline:nth-child(1) { transform: translateY(0) rotate(45deg); width: 18px; }
        #burger.open .bline:nth-child(2) { opacity: 0; transform: translateX(8px); }
        #burger.open .bline:nth-child(3) { transform: translateY(0) rotate(-45deg); width: 18px; }

        /* ══ MOBILE OVERLAY + DRAWER ══ */
        #mobile-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 149; opacity: 0;
            transition: opacity 0.3s;
        }
        #mobile-overlay.open { display: block; opacity: 1; }
        #mobile-drawer {
            position: fixed; top: 0; right: -100%;
            width: min(360px, 92vw); height: 100dvh; z-index: 150;
            background: var(--surface);
            border-left: 1px solid var(--border);
            display: flex; flex-direction: column;
            transition: right 0.4s cubic-bezier(.23,1,.32,1);
            overflow-y: auto;
        }
        #mobile-drawer.open { right: 0; }
        .md-header { display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border); }
        .md-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
        .md-logo-icon { width: 36px; height: 36px; border-radius: 10px; background: linear-gradient(135deg,#10d9a0,#6366f1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .md-logo-name { font-size: 0.9rem; font-weight: 800; color: var(--text); line-height: 1.2; }
        .md-logo-sub  { font-size: 0.58rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent); }
        #md-close { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--border2); display: flex; align-items: center; justify-content: center; color: var(--text-muted); cursor: pointer; transition: all 0.15s; }
        #md-close:hover { color: var(--text); border-color: var(--border-hover); }
        .md-nav { padding: 1rem; flex: 1; }
        .md-link { display: flex; align-items: center; gap: 0.875rem; padding: 0.875rem 1rem; border-radius: 14px; text-decoration: none; font-size: 0.875rem; font-weight: 700; color: var(--text-muted); margin-bottom: 2px; transition: all 0.15s; }
        .md-link:hover { background: var(--border); color: var(--text); }
        .md-link.md-active { background: var(--accent-dim); color: var(--accent); }
        .md-link .material-symbols-rounded:first-child { font-size: 20px; flex-shrink: 0; }
        .md-arrow { margin-left: auto; font-size: 18px !important; opacity: 0.4; }
        .md-link:hover .md-arrow, .md-link.md-active .md-arrow { opacity: 1; }
        .md-theme-row { margin: 0 1rem; padding: 1rem 1.25rem; border-radius: 16px; background: var(--card); border: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; gap: 1rem; }
        .md-theme-info { display: flex; align-items: center; gap: 0.875rem; }
        .md-theme-info .material-symbols-rounded { font-size: 22px; color: var(--accent); }
        .md-theme-label { font-size: 0.82rem; font-weight: 700; color: var(--text); }
        .md-theme-sub   { font-size: 0.68rem; color: var(--text-muted); margin-top: 1px; }
        .md-toggle-btn  { background: none; border: none; cursor: pointer; flex-shrink: 0; }
        .md-toggle-track { width: 48px; height: 26px; border-radius: 100px; background: var(--border-hover); position: relative; transition: background 0.25s; }
        .md-toggle-track.on { background: var(--accent); }
        .md-toggle-knob { width: 20px; height: 20px; border-radius: 50%; background: #fff; position: absolute; top: 3px; left: 3px; transition: transform 0.25s cubic-bezier(.23,1,.32,1); box-shadow: 0 1px 4px rgba(0,0,0,0.3); }
        .md-toggle-track.on .md-toggle-knob { transform: translateX(22px); }
        .md-footer { padding: 1.25rem 1rem 2rem; display: flex; flex-direction: column; gap: 0.75rem; margin-top: 1rem; }
        .md-cta-btn { display: flex; align-items: center; justify-content: center; gap: 0.625rem; padding: 1rem; background: var(--accent); color: var(--accent-dark); font-size: 0.82rem; font-weight: 800; letter-spacing: 0.05em; text-transform: uppercase; border-radius: 14px; text-decoration: none; transition: background 0.2s; }
        .md-cta-btn:hover { background: var(--accent-hover); }
        .md-wa-btn { display: flex; align-items: center; justify-content: center; gap: 0.625rem; padding: 0.875rem; background: var(--border); border: 1px solid var(--border-hover); border-radius: 14px; color: var(--text-muted); font-size: 0.82rem; font-weight: 700; text-decoration: none; transition: all 0.15s; }
        .md-wa-btn:hover { color: var(--accent); border-color: var(--accent); background: var(--accent-dim); }

        /* ══ FOOTER ══ */
        footer.site-footer {
            background: var(--footer-bg);
            border-top: 1px solid var(--border2);
            padding: 5rem 2rem 2.5rem;
        }
        .footer-inner { max-width: 1200px; margin: 0 auto; }
        .footer-grid {
            display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem;
            padding-bottom: 3rem; border-bottom: 1px solid var(--border2); margin-bottom: 2rem;
        }
        .footer-brand-name {
            font-family: var(--font-serif); font-style: italic;
            font-size: 1.5rem; color: #fff; margin-bottom: 0.25rem;
        }
        .footer-brand-sub {
            font-size: 0.65rem; font-weight: 700;
            letter-spacing: 0.2em; text-transform: uppercase;
            color: var(--accent); margin-bottom: 1rem;
        }
        .footer-desc { font-size: 0.85rem; line-height: 1.7; color: rgba(255,255,255,0.45); max-width: 280px; }
        .footer-col-title {
            font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em;
            text-transform: uppercase; color: rgba(255,255,255,0.3); margin-bottom: 1.25rem;
        }
        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 0.75rem; }
        .footer-links a { font-size: 0.875rem; color: rgba(255,255,255,0.45); text-decoration: none; transition: color 0.2s; }
        .footer-links a:hover { color: var(--accent); }
        .footer-social { display: flex; gap: 0.75rem; margin-top: 1.5rem; }
        .social-btn {
            width: 38px; height: 38px; border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.4); text-decoration: none;
            transition: color 0.2s, border-color 0.2s, background 0.2s;
        }
        .social-btn:hover { color: var(--accent); border-color: var(--accent); background: rgba(16,217,160,0.08); }
        .footer-bottom {
            display: flex; align-items: center; justify-content: space-between;
            font-size: 0.75rem; color: rgba(255,255,255,0.2);
        }
        .footer-bottom a { color: rgba(255,255,255,0.2); text-decoration: none; transition: color 0.2s; }
        .footer-bottom a:hover { color: rgba(255,255,255,0.5); }

        /* ══ RESPONSIVE ══ */
        @media (max-width: 992px) {
            .nav-links, .nav-actions .btn-primary { display: none; }
            #burger { display: flex; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 2rem; }
        }
        @media (max-width: 600px) {
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; gap: 0.5rem; text-align: center; }
        }

        /* ══ PAGE CONTENT SHARED VARS (used by child pages) ══ */
        /* Expose all vars so child page styles can reference them */
    </style>

    {{-- Anti-FOUC: apply saved theme before paint --}}
    <script>
        (function(){
            var t = localStorage.getItem('bpg-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>

    @yield('head')
</head>
<body>

<!-- ── NAVIGATION ── -->
<nav id="main-nav">
    <div class="nav-inner">
        <a href="{{ url('/') }}" class="nav-logo">
            <span class="nav-logo-name">Bintang Property</span>
            <span class="nav-logo-sub">Premium Real Estate</span>
        </a>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}"           class="{{ request()->is('/')          ? 'active' : '' }}">Beranda</a></li>
            <li><a href="{{ url('/about') }}"      class="{{ request()->is('about*')     ? 'active' : '' }}">Tentang</a></li>
            <li><a href="{{ url('/properties') }}" class="{{ request()->is('properties*') ? 'active' : '' }}">Proyek</a></li>
            <li><a href="{{ url('/promo') }}"         class="{{ request()->is('promo*')     ? 'active' : '' }}">Promo</a></li>
            <li><a href="{{ url('/articles') }}"      class="{{ request()->is('articles*')  ? 'active' : '' }}">Artikel</a></li>
            <li><a href="{{ url('/contact') }}"    class="{{ request()->is('contact*')   ? 'active' : '' }}">Kontak</a></li>
        </ul>

        <div class="nav-actions">
            <!-- Theme toggle -->
            <button id="theme-toggle" class="btn-ghost-icon" aria-label="Toggle theme" title="Toggle dark/light mode">
                <span class="material-symbols-rounded icon-dark">dark_mode</span>
                <span class="material-symbols-rounded icon-light">light_mode</span>
            </button>
            <a href="{{ url('/admin') }}" class="btn-ghost-icon" title="Admin Panel">
                <span class="material-symbols-rounded">shield_person</span>
            </a>
            <a href="{{ url('/contact') }}" class="btn-primary">Konsultasi Gratis</a>
            <button id="burger" aria-label="Menu">
                <span class="bline"></span>
                <span class="bline"></span>
                <span class="bline"></span>
            </button>
        </div>
    </div>
</nav>

<!-- ══ MOBILE MENU OVERLAY ══ -->
<div id="mobile-overlay" aria-hidden="true"></div>
<div id="mobile-drawer" aria-label="Mobile Menu">
    <!-- Drawer Header -->
    <div class="md-header">
        <a href="{{ url('/') }}" class="md-logo">
            <div class="md-logo-icon">
                <span class="material-symbols-rounded" style="font-size:18px;color:#fff;">apartment</span>
            </div>
            <div>
                <div class="md-logo-name">Bintang Property</div>
                <div class="md-logo-sub">Premium Real Estate</div>
            </div>
        </a>
        <button id="md-close" aria-label="Tutup menu">
            <span class="material-symbols-rounded">close</span>
        </button>
    </div>

    <!-- Nav Links -->
    <nav class="md-nav">
        <a href="{{ url('/') }}"           class="md-link {{ request()->is('/')           ? 'md-active' : '' }}">
            <span class="material-symbols-rounded">home</span>Beranda
            <span class="md-arrow material-symbols-rounded">chevron_right</span>
        </a>
        <a href="{{ url('/properties') }}" class="md-link {{ request()->is('properties*') ? 'md-active' : '' }}">
            <span class="material-symbols-rounded">apartment</span>Proyek Kami
            <span class="md-arrow material-symbols-rounded">chevron_right</span>
        </a>
        <a href="{{ url('/about') }}"      class="md-link {{ request()->is('about*')      ? 'md-active' : '' }}">
            <span class="material-symbols-rounded">info</span>Tentang Kami
            <span class="md-arrow material-symbols-rounded">chevron_right</span>
        </a>
        <a href="{{ url('/promo') }}"      class="md-link {{ request()->is('promo*')      ? 'md-active' : '' }}">
            <span class="material-symbols-rounded">local_offer</span>Promo
            <span class="md-arrow material-symbols-rounded">chevron_right</span>
        </a>
        <a href="{{ url('/articles') }}"   class="md-link {{ request()->is('articles*')   ? 'md-active' : '' }}">
            <span class="material-symbols-rounded">article</span>Artikel
            <span class="md-arrow material-symbols-rounded">chevron_right</span>
        </a>
        <a href="{{ url('/contact') }}"    class="md-link {{ request()->is('contact*')   ? 'md-active' : '' }}">
            <span class="material-symbols-rounded">mail</span>Kontak
            <span class="md-arrow material-symbols-rounded">chevron_right</span>
        </a>
    </nav>

    <!-- Theme Toggle Row -->
    <div class="md-theme-row">
        <div class="md-theme-info">
            <span class="material-symbols-rounded" id="md-theme-icon">dark_mode</span>
            <div>
                <div class="md-theme-label" id="md-theme-label">Mode Gelap</div>
                <div class="md-theme-sub">Ketuk untuk beralih tampilan</div>
            </div>
        </div>
        <button id="md-theme-toggle" class="md-toggle-btn" aria-label="Toggle theme">
            <div class="md-toggle-track">
                <div class="md-toggle-knob"></div>
            </div>
        </button>
    </div>

    <!-- CTA -->
    <div class="md-footer">
        <a href="{{ url('/contact') }}" class="md-cta-btn">
            <span class="material-symbols-rounded" style="font-size:18px;">calendar_today</span>
            Jadwalkan Kunjungan
        </a>
        <a href="https://wa.me/6281200000000" target="_blank" class="md-wa-btn">
            <span class="material-symbols-rounded" style="font-size:18px;">chat</span>
            WhatsApp
        </a>
    </div>
</div>

@yield('content')

<!-- ── FOOTER ── -->
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-grid">
            <div>
                <div class="footer-brand-name">Bintang Property</div>
                <div class="footer-brand-sub">Bintang Property Group</div>
                <p class="footer-desc">Mentransformasi real estate sejak 2011. Menghadirkan kemewahan terpercaya di setiap meter persegi di Sumatera Utara.</p>
                <div class="footer-social">
                    <a href="#" class="social-btn" title="Instagram"><span class="material-symbols-rounded">photo_camera</span></a>
                    <a href="#" class="social-btn" title="Facebook"><span class="material-symbols-rounded">thumb_up</span></a>
                    <a href="https://wa.me/6281200000000" target="_blank" class="social-btn" title="WhatsApp"><span class="material-symbols-rounded">chat</span></a>
                    <a href="#" class="social-btn" title="YouTube"><span class="material-symbols-rounded">play_circle</span></a>
                </div>
            </div>
            <div>
                <div class="footer-col-title">Navigasi</div>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/properties') }}">Proyek Kami</a></li>
                    <li><a href="{{ url('/promo') }}">Promo</a></li>
                    <li><a href="{{ url('/articles') }}">Artikel</a></li>
                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Informasi</div>
                <ul class="footer-links">
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Kebijakan Cookie</a></li>
                    <li><a href="#">Laporan Keberlanjutan</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Kontak</div>
                <ul class="footer-links">
                    <li><a href="tel:+6261000000">+62 61 000-0000</a></li>
                    <li><a href="mailto:info@bintangproperty.id">info@bintangproperty.id</a></li>
                    <li style="color:rgba(255,255,255,0.4); font-size:0.875rem; line-height:1.6;">Jl. Sudirman No. 99,<br>Medan, Sumatera Utara</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2024 Bintang Property Group — Hak Cipta Dilindungi</span>
            <div style="display:flex; gap:1.5rem;">
                <a href="#">Privasi</a>
                <a href="#">Syarat</a>
                <a href="#">Cookie</a>
            </div>
        </div>
    </div>
</footer>

@php $jsStable = public_path('build/assets/app.js'); $manifestPath = public_path('build/manifest.json'); @endphp
@if (file_exists($jsStable))
    <script type="module" src="{{ url('/build/assets/app.js') }}" defer></script>
@elseif (file_exists($manifestPath))
    @php $m = json_decode(file_get_contents($manifestPath), true); @endphp
    @if(isset($m['resources/js/app.js']['file']))
        <script type="module" src="{{ url('/build/'.$m['resources/js/app.js']['file']) }}" defer></script>
    @endif
@else
    @vite(['resources/js/app.js'])
@endif

<script>
    // ── Scroll nav ──
    const nav = document.getElementById('main-nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 20);
    }, { passive: true });
    if (window.scrollY > 20) nav.classList.add('scrolled');

    // ── Mobile Drawer ──
    const burger  = document.getElementById('burger');
    const drawer  = document.getElementById('mobile-drawer');
    const overlay = document.getElementById('mobile-overlay');

    function openDrawer() {
        burger.classList.add('open');
        drawer.classList.add('open');
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeDrawer() {
        burger.classList.remove('open');
        drawer.classList.remove('open');
        overlay.classList.remove('open');
        document.body.style.overflow = '';
    }
    burger.addEventListener('click', () => {
        burger.classList.contains('open') ? closeDrawer() : openDrawer();
    });
    document.getElementById('md-close').addEventListener('click', closeDrawer);
    overlay.addEventListener('click', closeDrawer);
    // Close on ESC
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDrawer(); });

    // ── Theme Toggle (navbar) ──
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('bpg-theme', theme);
        syncMdThemeToggle(theme);
    }
    document.getElementById('theme-toggle').addEventListener('click', () => {
        const cur = document.documentElement.getAttribute('data-theme');
        applyTheme(cur === 'dark' ? 'light' : 'dark');
    });

    // ── Mobile Drawer Theme Toggle ──
    const mdTrack  = document.querySelector('.md-toggle-track');
    const mdIcon   = document.getElementById('md-theme-icon');
    const mdLabel  = document.getElementById('md-theme-label');
    function syncMdThemeToggle(theme) {
        const isDark = theme === 'dark';
        mdTrack.classList.toggle('on', !isDark);
        mdIcon.textContent  = isDark ? 'dark_mode'  : 'light_mode';
        mdLabel.textContent = isDark ? 'Mode Gelap' : 'Mode Terang';
    }
    document.getElementById('md-theme-toggle').addEventListener('click', () => {
        const cur = document.documentElement.getAttribute('data-theme');
        applyTheme(cur === 'dark' ? 'light' : 'dark');
    });
    // Sync on load
    syncMdThemeToggle(document.documentElement.getAttribute('data-theme') || 'dark');
</script>
@yield('scripts')
</body>
</html>
