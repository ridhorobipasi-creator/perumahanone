@extends('layouts.admin')

@section('title', 'Pengaturan | Admin Bintang Property')

@section('content')
<style>
    :root {
        --a-card: #11111e; --a-border: rgba(255,255,255,0.06);
        --a-accent: #10d9a0; --a-accent-d: rgba(16,217,160,0.1);
        --a-text: #e8e8f0; --a-muted: #5a5a72; --a-surface: #0d0d17;
    }
    .settings-page { padding: 2.5rem; max-width: 1100px; }
    .settings-title { font-size: 2rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.375rem; }
    .settings-sub { font-size: 0.875rem; color: var(--a-muted); margin-bottom: 2.5rem; }

    .settings-grid { display: grid; grid-template-columns: 220px 1fr; gap: 2rem; }

    /* Sidebar Nav */
    .settings-nav-card { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; padding: 1rem; }
    .snav-item {
        display: flex; align-items: center; justify-content: space-between;
        padding: 0.875rem 1rem; border-radius: 12px; margin-bottom: 2px;
        text-decoration: none; font-size: 0.85rem; font-weight: 700;
        transition: all 0.15s; cursor: pointer;
    }
    .snav-item.active { background: rgba(16,217,160,0.1); color: #10d9a0; }
    .snav-item:not(.active) { color: var(--a-muted); }
    .snav-item:not(.active):hover { background: rgba(255,255,255,0.04); color: var(--a-text); }
    .snav-item-inner { display: flex; align-items: center; gap: 0.75rem; }

    /* Help Card */
    .help-card {
        background: linear-gradient(135deg, rgba(16,217,160,0.07) 0%, rgba(99,102,241,0.07) 100%);
        border: 1px solid rgba(16,217,160,0.12);
        border-radius: 18px; padding: 1.5rem;
        margin-top: 1rem; position: relative; overflow: hidden;
    }
    .help-deco { position: absolute; bottom: -20px; right: -20px; font-size: 90px; color: rgba(255,255,255,0.04); }
    .help-card h4 { font-size: 0.9rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.5rem; }
    .help-card p { font-size: 0.78rem; color: var(--a-muted); line-height: 1.7; margin-bottom: 1rem; }
    .help-card button { font-size: 0.72rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #10d9a0; border: none; background: none; cursor: pointer; border-bottom: 1px solid rgba(16,217,160,0.3); padding-bottom: 1px; }

    /* Form Sections */
    .form-section { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; padding: 2rem; margin-bottom: 1.5rem; overflow: hidden; position: relative; }
    .form-section::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: #10d9a0; border-radius: 0; }
    .fs-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.75rem; }
    .fs-title { font-size: 1rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.25rem; }
    .fs-sub { font-size: 0.78rem; color: var(--a-muted); }
    .fs-badge { font-size: 0.63rem; font-weight: 700; padding: 0.25rem 0.75rem; border-radius: 100px; background: rgba(16,217,160,0.08); border: 1px solid rgba(16,217,160,0.2); color: #10d9a0; white-space: nowrap;}
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem; }
    .form-group { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.25rem; }
    .form-group:last-child { margin-bottom: 0; }
    .form-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.35); }
    .form-ctrl {
        background: rgba(255,255,255,0.04); border: 1px solid var(--a-border);
        border-radius: 12px; padding: 0.875rem 1rem;
        color: var(--a-text); font-size: 0.875rem; font-family: inherit;
        outline: none; transition: border-color 0.2s; width: 100%;
    }
    .form-ctrl:focus { border-color: rgba(16,217,160,0.35); }
    .form-ctrl-icon { position: relative; }
    .form-ctrl-icon .icon { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: #10d9a0; pointer-events: none; }
    .form-ctrl-icon input { padding-left: 2.75rem; }
    textarea.form-ctrl { min-height: 100px; resize: vertical; }

    /* Social */
    .social-row { display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; }
    .social-icon { width: 44px; height: 44px; flex-shrink: 0; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid var(--a-border); display: flex; align-items: center; justify-content: center; color: var(--a-muted); transition: all 0.15s; }
    .social-row:hover .social-icon { background: rgba(16,217,160,0.08); color: #10d9a0; border-color: rgba(16,217,160,0.2); }

    /* Security */
    .security-profile { display: flex; align-items: center; gap: 1.25rem; margin-bottom: 1.75rem; padding-bottom: 1.75rem; border-bottom: 1px solid var(--a-border); }
    .sec-avatar { width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(16,217,160,0.3); }
    .sec-name { font-size: 1rem; font-weight: 800; color: var(--a-text); }
    .sec-email { font-size: 0.78rem; color: var(--a-muted); margin-top: 2px; font-family: monospace; }
    .two-fa-badge {
        display: flex; align-items: flex-start; gap: 1rem;
        background: rgba(16,217,160,0.06); border: 1px solid rgba(16,217,160,0.15);
        border-radius: 14px; padding: 1.25rem; margin-top: 1.25rem;
    }
    .two-fa-icon { width: 40px; height: 40px; border-radius: 10px; background: rgba(16,217,160,0.12); display: flex; align-items: center; justify-content: center; color: #10d9a0; flex-shrink: 0; }
    .two-fa-text h5 { font-size: 0.875rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.375rem; }
    .two-fa-text p { font-size: 0.78rem; color: var(--a-muted); line-height: 1.7; }

    /* Actions */
    .settings-actions { display: flex; justify-content: flex-end; gap: 0.875rem; padding-top: 1.5rem; border-top: 1px solid var(--a-border); }
    .btn-cancel { padding: 0.75rem 1.5rem; background: rgba(255,255,255,0.04); border: 1px solid var(--a-border); border-radius: 12px; color: var(--a-muted); font-size: 0.78rem; font-weight: 700; cursor: pointer; transition: all 0.15s; }
    .btn-cancel:hover { color: var(--a-text); border-color: rgba(255,255,255,0.12); }
    .btn-save { padding: 0.75rem 2rem; background: #10d9a0; color: #021a12; border: none; border-radius: 12px; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; transition: background 0.15s, transform 0.15s; }
    .btn-save:hover { background: #0ffba7; transform: translateY(-1px); }

    @media(max-width:1024px) { .settings-grid { grid-template-columns: 1fr; } }
    @media(max-width:640px) { .form-grid { grid-template-columns: 1fr; } .settings-page { padding: 1.5rem; } }
</style>

<div class="settings-page">
    <div class="settings-title">Pengaturan Sistem</div>
    <div class="settings-sub">Kelola profil identitas agensi, preferensi keamanan, dan konfigurasi global.</div>

    <div class="settings-grid">
        <!-- Nav -->
        <div>
            <div class="settings-nav-card">
                <a href="#company" class="snav-item active">
                    <div class="snav-item-inner">
                        <span class="material-symbols-rounded" style="font-size:18px;">business</span>
                        Profil Perusahaan
                    </div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#social" class="snav-item">
                    <div class="snav-item-inner">
                        <span class="material-symbols-rounded" style="font-size:18px;">share</span>
                        Media Sosial
                    </div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#security" class="snav-item">
                    <div class="snav-item-inner">
                        <span class="material-symbols-rounded" style="font-size:18px;">shield_lock</span>
                        Keamanan & Sandi
                    </div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#notifications" class="snav-item">
                    <div class="snav-item-inner">
                        <span class="material-symbols-rounded" style="font-size:18px;">notifications_active</span>
                        Notifikasi
                    </div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
            </div>
            <div class="help-card">
                <div class="help-deco material-symbols-rounded">support_agent</div>
                <h4>Butuh Bantuan?</h4>
                <p>Tim manajer akun kami siap membantu secara teknis 24/7 di jam kerja operasional.</p>
                <button>Hubungi Support</button>
            </div>
        </div>

        <!-- Form -->
        <div>
            <!-- Company Info -->
            <div class="form-section" id="company">
                <div class="fs-header">
                    <div>
                        <div class="fs-title">Informasi Dasar Bisnis</div>
                        <div class="fs-sub">Identitas publik yang dapat diakses klien.</div>
                    </div>
                    <div class="fs-badge">Lisensi Enterprise</div>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Nama Badan Hukum</label>
                        <input class="form-ctrl" type="text" value="PT Bintang Emerald Properti Tbk."/>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">No. SIUP</label>
                        <input class="form-ctrl" type="text" value="RE-990-2134-XY" style="font-family:monospace;"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat Kantor Pusat</label>
                    <textarea class="form-ctrl">Jalan Ringroad Gagak Hitam No. 88, Suite 402,
Medan Sunggal, Kota Medan, Sumatera Utara 20122</textarea>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Email Representatif</label>
                        <div class="form-ctrl-icon">
                            <span class="material-symbols-rounded icon" style="font-size:18px;">mail</span>
                            <input class="form-ctrl" type="email" value="kontak@bintang-emerald.co.id"/>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Nomor Hotline</label>
                        <div class="form-ctrl-icon">
                            <span class="material-symbols-rounded icon" style="font-size:18px;">call</span>
                            <input class="form-ctrl" type="tel" value="+62 61 777 0192"/>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="form-section" id="social">
                <div class="fs-header" style="margin-bottom:1.25rem;">
                    <div>
                        <div class="fs-title">Presensi Media Sosial</div>
                        <div class="fs-sub">Tautan untuk watermark dan footer navigasi.</div>
                    </div>
                </div>
                <div class="social-row">
                    <div class="social-icon"><span class="material-symbols-rounded" style="font-size:20px;">photo_camera</span></div>
                    <input class="form-ctrl" type="text" value="https://instagram.com/bintangproperty.mdn" placeholder="Link Instagram"/>
                </div>
                <div class="social-row">
                    <div class="social-icon"><span class="material-symbols-rounded" style="font-size:20px;">work</span></div>
                    <input class="form-ctrl" type="text" placeholder="Link LinkedIn" />
                </div>
                <div class="social-row" style="margin-bottom:0;">
                    <div class="social-icon"><span class="material-symbols-rounded" style="font-size:20px;">play_circle</span></div>
                    <input class="form-ctrl" type="text" placeholder="Link YouTube" />
                </div>
            </div>

            <!-- Security -->
            <div class="form-section" id="security">
                <div class="security-profile">
                    <img class="sec-avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfevpJ4tetT6xpXKa7lNlsH5b0etygaHWMLIC3Ozoe1atm3CxnOieP7c1194LuZ1mbLTayAjMAmpspgYounuPg4XB4SRLjpYQFPyhGKzBiiok1gT88XDe02_vxrJorrFRGIUINTV3NuJK2FzNUrqXnsL8Ctr_1Jwj5DTNmtuZNV3xF07TWvwUWIuEtM4bBBgJD6qV_cLmlEG8NRoJfd-7GaeqwvetzlNFa0NFv04g9z31gLSnXt6-ybf88aa1o48rURZduZ6V8uus" alt="Admin"/>
                    <div>
                        <div class="sec-name">Keamanan Akun Pribadi</div>
                        <div class="sec-email">admin@bintang-emerald.co.id</div>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Sandi Saat Ini</label>
                        <input class="form-ctrl" type="password" value="secretdummy123"/>
                    </div>
                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Sandi Baru (Opsional)</label>
                        <input class="form-ctrl" type="password" placeholder="Kosongkan bila sama"/>
                    </div>
                </div>
                <div class="two-fa-badge">
                    <div class="two-fa-icon"><span class="material-symbols-rounded">verified_user</span></div>
                    <div class="two-fa-text">
                        <h5>Otentikasi Dua Faktor (2FA) Aktif</h5>
                        <p>Sistem keamanan ganda "Bintang Secure" sedang melindungi sesi ini. OTP dikirimkan setiap 24 jam.</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="settings-actions">
                <button class="btn-cancel">Batalkan</button>
                <button class="btn-save">
                    <span class="material-symbols-rounded" style="font-size:18px;">save</span>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
