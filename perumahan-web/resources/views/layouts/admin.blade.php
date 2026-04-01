<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Admin | Bintang Property Group')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300..800&display=swap" rel="stylesheet"/>
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
           ADMIN DESIGN TOKENS — DARK & LIGHT MODE
        ══════════════════════════════════════════ */
        :root, [data-theme="dark"] {
            --bg:             #07070d;
            --surface:        #0d0d17;
            --card:           #11111e;
            --card2:          #161626;
            --border:         rgba(255,255,255,0.06);
            --border2:        rgba(255,255,255,0.04);
            --border-hover:   rgba(255,255,255,0.12);
            --text:           #e8e8f0;
            --text-secondary: rgba(232,232,240,0.65);
            --text-muted:     #5a5a72;
            --text-faint:     rgba(255,255,255,0.25);
            --accent:         #10d9a0;
            --accent-dim:     rgba(16,217,160,0.10);
            --accent-hover:   #0ffba7;
            --accent-dark:    #021a12;
            --error:          #f87171;
            --error-dim:      rgba(248,113,113,0.10);
            --warning:        #fbbf24;
            --warning-dim:    rgba(251,191,36,0.10);
            --topbar-bg:      rgba(7,7,13,0.88);
            --sidebar-w:      240px;
            color-scheme: dark;
        }
        [data-theme="light"] {
            --bg:             #f1f5f9;
            --surface:        #ffffff;
            --card:           #ffffff;
            --card2:          #f8fafc;
            --border:         rgba(0,0,0,0.07);
            --border2:        rgba(0,0,0,0.05);
            --border-hover:   rgba(0,0,0,0.14);
            --text:           #0f172a;
            --text-secondary: rgba(15,23,42,0.7);
            --text-muted:     #64748b;
            --text-faint:     rgba(15,23,42,0.3);
            --accent:         #059669;
            --accent-dim:     rgba(5,150,105,0.10);
            --accent-hover:   #047857;
            --accent-dark:    #ecfdf5;
            --error:          #ef4444;
            --error-dim:      rgba(239,68,68,0.10);
            --warning:        #d97706;
            --warning-dim:    rgba(217,119,6,0.10);
            --topbar-bg:      rgba(248,250,252,0.95);
            --sidebar-w:      240px;
            color-scheme: light;
        }

        /* ══ BASE ══ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { height: 100%; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            display: flex;
            transition: background 0.3s, color 0.3s;
        }
        .material-symbols-rounded {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            font-size: 20px; line-height: 1;
        }

        /* ══ SIDEBAR ══ */
        .a-sidebar {
            width: var(--sidebar-w);
            min-height: 100vh; height: 100%;
            position: fixed; left: 0; top: 0;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex; flex-direction: column;
            z-index: 50; overflow-y: auto;
            transition: background 0.3s, border-color 0.3s;
        }
        .a-sidebar-header {
            padding: 1.5rem 1.5rem 1.25rem;
            border-bottom: 1px solid var(--border2);
        }
        .a-sidebar-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
        .a-logo-icon {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, #10d9a0, #6366f1);
            display: flex; align-items: center; justify-content: center;
            color: #fff; flex-shrink: 0;
        }
        .a-logo-text { display: flex; flex-direction: column; line-height: 1.2; }
        .a-logo-name { font-size: 0.875rem; font-weight: 800; color: var(--text); }
        .a-logo-sub  { font-size: 0.65rem; color: var(--text-muted); font-weight: 500; }

        .a-nav { flex: 1; padding: 1.25rem 0.875rem; }
        .a-nav-label {
            font-size: 0.6rem; font-weight: 700;
            letter-spacing: 0.15em; text-transform: uppercase;
            color: var(--text-muted); padding: 0.5rem 0.625rem;
            margin-bottom: 0.375rem; display: block;
        }
        .a-nav-item {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.65rem 0.875rem; border-radius: 10px;
            text-decoration: none; font-size: 0.83rem; font-weight: 600;
            color: var(--text-muted); transition: all 0.15s; margin-bottom: 2px;
        }
        .a-nav-item:hover { color: var(--text); background: var(--border); }
        .a-nav-item.active { color: var(--accent); background: var(--accent-dim); }
        .a-nav-item.active .material-symbols-rounded {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .a-nav-badge {
            margin-left: auto; font-size: 0.65rem; font-weight: 700;
            padding: 0.1rem 0.5rem; border-radius: 100px;
            background: var(--accent-dim); color: var(--accent);
        }
        .a-nav-divider { height: 1px; background: var(--border2); margin: 0.875rem 0.875rem; }
        .a-sidebar-footer { padding: 1rem 0.875rem 1.25rem; border-top: 1px solid var(--border2); }
        .a-add-btn {
            display: flex; align-items: center; justify-content: center; gap: 0.5rem;
            width: 100%; padding: 0.75rem;
            background: var(--accent); color: var(--accent-dark);
            font-size: 0.78rem; font-weight: 700; letter-spacing: 0.05em;
            border-radius: 10px; text-decoration: none; margin-bottom: 0.75rem;
            transition: background 0.2s, transform 0.15s;
        }
        .a-add-btn:hover { background: var(--accent-hover); transform: translateY(-1px); }
        .a-logout-btn {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.65rem 0.875rem; border-radius: 10px;
            text-decoration: none; font-size: 0.83rem; font-weight: 600;
            color: var(--text-muted); transition: all 0.15s;
        }
        .a-logout-btn:hover { color: var(--error); background: var(--error-dim); }

        /* ══ MAIN ══ */
        .a-main { margin-left: var(--sidebar-w); flex: 1; min-height: 100vh; display: flex; flex-direction: column; }

        /* ══ TOPBAR ══ */
        .a-topbar {
            position: sticky; top: 0; z-index: 40;
            height: 64px;
            background: var(--topbar-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2rem; gap: 1.5rem;
            transition: background 0.3s, border-color 0.3s;
        }
        .a-topbar-search {
            display: flex; align-items: center; gap: 0.625rem;
            background: var(--border2);
            border: 1px solid var(--border);
            border-radius: 10px; padding: 0.5rem 1rem;
            max-width: 380px; width: 100%; transition: border-color 0.2s;
        }
        .a-topbar-search:focus-within { border-color: var(--accent); }
        .a-topbar-search .material-symbols-rounded { color: var(--text-muted); flex-shrink: 0; }
        .a-topbar-search input {
            background: none; border: none; outline: none;
            color: var(--text); font-size: 0.83rem; font-family: inherit; font-weight: 500; width: 100%;
        }
        .a-topbar-search input::placeholder { color: var(--text-muted); }
        .a-topbar-right { display: flex; align-items: center; gap: 0.75rem; flex-shrink: 0; }
        .a-icon-btn {
            width: 36px; height: 36px; border-radius: 8px;
            border: 1px solid var(--border); background: transparent;
            display: flex; align-items: center; justify-content: center;
            color: var(--text-muted); cursor: pointer; position: relative;
            transition: all 0.15s;
        }
        .a-icon-btn:hover { color: var(--text); border-color: var(--border-hover); background: var(--border); }

        /* Theme toggle in admin */
        #admin-theme-toggle .icon-dark { display: block; }
        #admin-theme-toggle .icon-light { display: none; }
        [data-theme="light"] #admin-theme-toggle .icon-dark { display: none; }
        [data-theme="light"] #admin-theme-toggle .icon-light { display: block; }

        .a-notif-dot {
            position: absolute; top: 6px; right: 6px;
            width: 6px; height: 6px; border-radius: 50%;
            background: var(--accent); border: 1.5px solid var(--bg);
        }
        .a-topbar-divider { width: 1px; height: 24px; background: var(--border); }
        .a-user-pill {
            display: flex; align-items: center; gap: 0.625rem;
            padding: 0.375rem 0.75rem 0.375rem 0.375rem;
            border-radius: 100px; border: 1px solid var(--border);
            background: var(--border2); cursor: pointer; transition: all 0.15s;
        }
        .a-user-pill:hover { border-color: var(--border-hover); background: var(--border); }
        .a-user-avatar { width: 28px; height: 28px; border-radius: 50%; object-fit: cover; border: 1.5px solid var(--accent); }
        .a-user-info { display: flex; flex-direction: column; line-height: 1.2; }
        .a-user-name  { font-size: 0.78rem; font-weight: 700; color: var(--text); }
        .a-user-role  { font-size: 0.6rem; font-weight: 600; color: var(--accent); letter-spacing: 0.06em; }
        .a-topbar-chevron { color: var(--text-muted); flex-shrink: 0; font-size: 16px; }

        /* ══ CONTENT ══ */
        .a-content { flex: 1; }

        /* ══ FOOTER ══ */
        .a-footer {
            padding: 1.25rem 2rem;
            border-top: 1px solid var(--border2);
            display: flex; align-items: center; justify-content: space-between;
            font-size: 0.72rem; font-weight: 600;
            color: var(--text-faint); letter-spacing: 0.04em;
        }
        .a-footer a { color: var(--text-faint); text-decoration: none; transition: color 0.2s; }
        .a-footer a:hover { color: var(--text-muted); }
        .a-footer-links { display: flex; gap: 1.5rem; }
    </style>

    {{-- Anti-FOUC: apply saved theme before paint --}}
    <script>
        (function(){
            var t = localStorage.getItem('bpg-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
</head>
<body>

<!-- ── SIDEBAR ── -->
<aside class="a-sidebar">
    <div class="a-sidebar-header">
        <a href="{{ url('/') }}" class="a-sidebar-logo">
            <div class="a-logo-icon">
                <span class="material-symbols-rounded" style="font-size:18px;">apartment</span>
            </div>
            <div class="a-logo-text">
                <span class="a-logo-name">Bintang Admin</span>
                <span class="a-logo-sub">Property Management</span>
            </div>
        </a>
    </div>

    <nav class="a-nav">
        <span class="a-nav-label">Menu Utama</span>
        <a href="{{ url('/admin') }}"            class="a-nav-item {{ request()->is('admin')            ? 'active' : '' }}">
            <span class="material-symbols-rounded">grid_view</span>Dasbor
        </a>
        <a href="{{ url('/admin/properties') }}" class="a-nav-item {{ request()->is('admin/properties*') ? 'active' : '' }}">
            <span class="material-symbols-rounded">apartment</span>Properti
        </a>
        <a href="{{ url('/admin/leads') }}"      class="a-nav-item {{ request()->is('admin/leads*')     ? 'active' : '' }}">
            <span class="material-symbols-rounded">contacts</span>Klien & Prospek
            <span class="a-nav-badge">3</span>
        </a>
        <div class="a-nav-divider"></div>
        <span class="a-nav-label">Lainnya</span>
        <a href="{{ url('/admin/settings') }}"   class="a-nav-item {{ request()->is('admin/settings*')  ? 'active' : '' }}">
            <span class="material-symbols-rounded">settings</span>Pengaturan
        </a>
        <a href="{{ url('/') }}" class="a-nav-item">
            <span class="material-symbols-rounded">open_in_new</span>Lihat Website
        </a>
    </nav>

    <div class="a-sidebar-footer">
        <a href="{{ url('/admin/properties/create') }}" class="a-add-btn">
            <span class="material-symbols-rounded" style="font-size:18px;">add</span>
            Tambah Listing Baru
        </a>
        <a href="#" class="a-logout-btn">
            <span class="material-symbols-rounded">logout</span>Keluar
        </a>
    </div>
</aside>

<!-- ── MAIN ── -->
<main class="a-main">
    <!-- Topbar -->
    <header class="a-topbar">
        <div class="a-topbar-search">
            <span class="material-symbols-rounded">search</span>
            <input type="text" placeholder="Cari properti, klien, atau agen..."/>
        </div>
        <div class="a-topbar-right">
            <!-- Admin Theme Toggle -->
            <button id="admin-theme-toggle" class="a-icon-btn" title="Toggle dark/light mode" style="transition: transform 0.3s;">
                <span class="material-symbols-rounded icon-dark">dark_mode</span>
                <span class="material-symbols-rounded icon-light">light_mode</span>
            </button>
            <button class="a-icon-btn" title="Notifikasi">
                <span class="material-symbols-rounded">notifications</span>
                <span class="a-notif-dot"></span>
            </button>
            <div class="a-topbar-divider"></div>
            <div class="a-user-pill">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfevpJ4tetT6xpXKa7lNlsH5b0etygaHWMLIC3Ozoe1atm3CxnOieP7c1194LuZ1mbLTayAjMAmpspgYounuPg4XB4SRLjpYQFPyhGKzBiiok1gT88XDe02_vxrJorrFRGIUINTV3NuJK2FzNUrqXnsL8Ctr_1Jwj5DTNmtuZNV3xF07TWvwUWIuEtM4bBBgJD6qV_cLmlEG8NRoJfd-7GaeqwvetzlNFa0NFv04g9z31gLSnXt6-ybf88aa1o48rURZduZ6V8uus"
                    alt="Admin" class="a-user-avatar"/>
                <div class="a-user-info">
                    <span class="a-user-name">Admin Utama</span>
                    <span class="a-user-role">Super Admin</span>
                </div>
                <span class="material-symbols-rounded a-topbar-chevron">expand_more</span>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="a-content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="a-footer">
        <span>© 2024 Bintang Property Group</span>
        <div class="a-footer-links">
            <a href="#">Privasi</a>
            <a href="#">Syarat</a>
            <a href="#">Audit Log</a>
        </div>
    </footer>
</main>

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
    // ── Admin Theme Toggle — shared localStorage key ──
    const adminToggle = document.getElementById('admin-theme-toggle');
    function applyAdminTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('bpg-theme', theme);
    }
    adminToggle.addEventListener('click', () => {
        const cur = document.documentElement.getAttribute('data-theme');
        applyAdminTheme(cur === 'dark' ? 'light' : 'dark');
    });
</script>
@yield('scripts')
</body>
</html>
