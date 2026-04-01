@extends('layouts.admin')

@section('title', 'Pengaturan | Admin Bintang Property')

@section('content')
<style>
    .settings-page { padding: 2.5rem; max-width: 1100px; }
    .settings-title { font-size: 2rem; font-weight: 800; color: var(--text); margin-bottom: 0.375rem; }
    .settings-sub { font-size: 0.875rem; color: var(--text-muted); margin-bottom: 2.5rem; }
    .settings-grid { display: grid; grid-template-columns: 220px 1fr; gap: 2rem; }

    /* Sidebar Nav */
    .settings-nav-card { background: var(--card); border: 1px solid var(--border); border-radius: 18px; padding: 1rem; align-self: flex-start; position: sticky; top: 80px; }
    .snav-item { display: flex; align-items: center; justify-content: space-between; padding: 0.875rem 1rem; border-radius: 12px; margin-bottom: 2px; text-decoration: none; font-size: 0.85rem; font-weight: 700; transition: all 0.15s; cursor: pointer; }
    .snav-item.active { background: var(--accent-dim); color: var(--accent); }
    .snav-item:not(.active) { color: var(--text-muted); }
    .snav-item:not(.active):hover { background: var(--border); color: var(--text); }
    .snav-item-inner { display: flex; align-items: center; gap: 0.75rem; }

    /* Help Card */
    .help-card { background: var(--gradient-card); border: 1px solid var(--accent); border-radius: 18px; padding: 1.5rem; margin-top: 1rem; position: relative; overflow: hidden; }
    .help-card h4 { font-size: 0.9rem; font-weight: 800; color: var(--text); margin-bottom: 0.5rem; }
    .help-card p { font-size: 0.78rem; color: var(--text-muted); line-height: 1.7; margin-bottom: 1rem; }
    .help-card button { font-size: 0.72rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: var(--accent); border: none; background: none; cursor: pointer; }

    /* Form Sections */
    .form-section { background: var(--card); border: 1px solid var(--border); border-radius: 18px; padding: 2rem; margin-bottom: 1.5rem; overflow: hidden; position: relative; }
    .form-section::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; background: var(--accent); border-radius: 0; }
    .fs-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.75rem; }
    .fs-title { font-size: 1rem; font-weight: 800; color: var(--text); margin-bottom: 0.25rem; }
    .fs-sub { font-size: 0.78rem; color: var(--text-muted); }
    .fs-badge { font-size: 0.63rem; font-weight: 700; padding: 0.25rem 0.75rem; border-radius: 100px; background: var(--accent-dim); border: 1px solid var(--accent); color: var(--accent); white-space: nowrap; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem; }
    .fg { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.25rem; }
    .flabel { font-size: 0.62rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); }
    .finput { background: var(--bg); border: 1px solid var(--border); border-radius: 12px; padding: 0.875rem 1rem; color: var(--text); font-size: 0.875rem; font-family: inherit; outline: none; transition: border-color 0.2s; width: 100%; }
    .finput::placeholder { color: var(--text-faint); }
    .finput:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-dim); }
    textarea.finput { min-height: 90px; resize: vertical; }
    select.finput { cursor: pointer; }
    .save-btn { padding: 0.875rem 2rem; background: var(--accent); color: var(--accent-dark); border: none; border-radius: 12px; font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.06em; cursor: pointer; transition: background 0.15s, transform 0.15s; display: inline-flex; align-items: center; gap: 0.5rem; }
    .save-btn:hover { background: var(--accent-hover); transform: translateY(-1px); }
    .cancel-btn { padding: 0.875rem 1.5rem; background: var(--border2); border: 1px solid var(--border); border-radius: 12px; font-size: 0.82rem; font-weight: 700; color: var(--text-muted); cursor: pointer; transition: all 0.15s; }
    .cancel-btn:hover { color: var(--text); border-color: var(--border-hover); }

    /* Social links */
    .social-input-row { display: flex; align-items: center; gap: 0.875rem; padding: 0.875rem 1rem; background: var(--bg); border: 1px solid var(--border); border-radius: 12px; margin-bottom: 0.75rem; transition: border-color 0.2s; }
    .social-input-row:focus-within { border-color: var(--accent); }
    .social-platform { font-size: 0.72rem; font-weight: 800; color: var(--text-muted); min-width: 80px; text-transform: uppercase; letter-spacing: 0.1em; }
    .social-input-row input { background: none; border: none; outline: none; color: var(--text); font-size: 0.83rem; flex: 1; font-family: inherit; }
    .social-input-row input::placeholder { color: var(--text-faint); }

    /* 2FA */
    .twofa-status { display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; background: var(--bg); border: 1px solid var(--border); border-radius: 14px; margin-bottom: 1.25rem; }
    .twofa-info { display: flex; align-items: center; gap: 1rem; }
    .twofa-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .twofa-on { background: var(--accent-dim); color: var(--accent); }
    .twofa-off { background: var(--border); color: var(--text-muted); }
    .twofa-label { font-size: 0.875rem; font-weight: 700; color: var(--text); }
    .twofa-sublabel { font-size: 0.72rem; color: var(--text-muted); margin-top: 2px; }
    .twofa-toggle { width: 44px; height: 24px; border-radius: 100px; border: none; cursor: pointer; position: relative; transition: background 0.2s; }
    .twofa-toggle.on { background: var(--accent); }
    .twofa-toggle:not(.on) { background: var(--border-hover); }
    .twofa-toggle::after { content: ''; position: absolute; width: 18px; height: 18px; border-radius: 50%; background: #fff; top: 3px; left: 3px; transition: transform 0.2s; box-shadow: 0 1px 3px rgba(0,0,0,0.2); }
    .twofa-toggle.on::after { transform: translateX(20px); }

    /* Danger zone */
    .danger-section { background: var(--error-dim); border: 1px solid var(--error); border-radius: 18px; padding: 2rem; }
    .danger-title { font-size: 1rem; font-weight: 800; color: var(--error); margin-bottom: 0.375rem; }
    .danger-sub { font-size: 0.82rem; color: var(--text-muted); margin-bottom: 1.5rem; }
    .danger-btn { padding: 0.75rem 1.5rem; background: var(--error); color: #fff; border: none; border-radius: 10px; font-size: 0.78rem; font-weight: 800; cursor: pointer; transition: opacity 0.15s; }
    .danger-btn:hover { opacity: 0.85; }

    /* Appearance */
    .theme-picker { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.5rem; }
    .theme-opt { border: 2px solid var(--border); border-radius: 14px; padding: 1rem; cursor: pointer; transition: all 0.15s; text-align: center; }
    .theme-opt.selected { border-color: var(--accent); background: var(--accent-dim); }
    .theme-opt-preview { height: 60px; border-radius: 8px; margin-bottom: 0.75rem; }
    .theme-opt-label { font-size: 0.78rem; font-weight: 700; color: var(--text); }

    @media(max-width:960px) { .settings-grid { grid-template-columns: 1fr; } .settings-nav-card { position: static; } }
    @media(max-width:640px) { .form-grid { grid-template-columns: 1fr; } .settings-page { padding: 1.5rem; } }
</style>

<div class="settings-page">
    <div class="settings-title">Pengaturan Sistem</div>
    <div class="settings-sub">Kelola konfigurasi platform, profil perusahaan, dan preferensi tampilan</div>

    <div class="settings-grid">
        <!-- Sidebar -->
        <div>
            <div class="settings-nav-card">
                <a href="#profil" class="snav-item active">
                    <div class="snav-item-inner"><span class="material-symbols-rounded">business</span>Profil Perusahaan</div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#penampilan" class="snav-item">
                    <div class="snav-item-inner"><span class="material-symbols-rounded">palette</span>Penampilan</div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#sosial" class="snav-item">
                    <div class="snav-item-inner"><span class="material-symbols-rounded">share</span>Media Sosial</div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#notif" class="snav-item">
                    <div class="snav-item-inner"><span class="material-symbols-rounded">notifications</span>Notifikasi</div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
                <a href="#keamanan" class="snav-item">
                    <div class="snav-item-inner"><span class="material-symbols-rounded">lock</span>Keamanan</div>
                    <span class="material-symbols-rounded" style="font-size:16px;opacity:0.4;">chevron_right</span>
                </a>
            </div>

            <div class="help-card">
                <h4>Butuh Bantuan?</h4>
                <p>Hubungi tim teknis kami untuk bantuan konfigurasi sistem atau troubleshooting.</p>
                <button>Hubungi Support →</button>
            </div>
        </div>

        <!-- Form Content -->
        <div>
            <!-- Profil Perusahaan -->
            <div class="form-section" id="profil">
                <div class="fs-header">
                    <div>
                        <div class="fs-title">Profil Perusahaan</div>
                        <div class="fs-sub">Informasi yang ditampilkan di website dan materi pemasaran</div>
                    </div>
                    <span class="fs-badge">Publik</span>
                </div>
                <div class="form-grid">
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Nama Perusahaan</label>
                        <input class="finput" type="text" value="Bintang Property Group"/>
                    </div>
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Tagline</label>
                        <input class="finput" type="text" value="Premium Real Estate Sumatera Utara"/>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Email Kontak</label>
                        <input class="finput" type="email" value="info@bintangproperty.id"/>
                    </div>
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Nomor WhatsApp</label>
                        <input class="finput" type="tel" value="+62 812 0000 0000"/>
                    </div>
                </div>
                <div class="fg">
                    <label class="flabel">Alamat Kantor</label>
                    <textarea class="finput">Jl. Jend. Sudirman No. 123, Medan, Sumatera Utara 20112</textarea>
                </div>
                <div class="fg" style="margin-bottom:0;">
                    <label class="flabel">Deskripsi Perusahaan (SEO)</label>
                    <textarea class="finput">Bintang Property Group adalah pengembang properti premium terpercaya di Sumatera Utara, menghadirkan hunian modern dan berkualitas tinggi sejak 2011.</textarea>
                </div>
                <div style="display:flex;gap:0.75rem;margin-top:1.75rem;">
                    <button class="save-btn"><span class="material-symbols-rounded" style="font-size:18px;">save</span>Simpan Perubahan</button>
                    <button class="cancel-btn">Batal</button>
                </div>
            </div>

            <!-- Penampilan -->
            <div class="form-section" id="penampilan">
                <div class="fs-header">
                    <div>
                        <div class="fs-title">Penampilan & Tema</div>
                        <div class="fs-sub">Kustomisasi tampilan platform untuk klien dan admin</div>
                    </div>
                    <span class="fs-badge">UI/UX</span>
                </div>
                <label class="flabel" style="display:block;margin-bottom:1rem;">Tema Warna Platform</label>
                <div class="theme-picker">
                    <div class="theme-opt selected">
                        <div class="theme-opt-preview" style="background:linear-gradient(135deg,#07070d,#0d1a13);border:1px solid rgba(16,217,160,0.3);display:flex;align-items:flex-end;padding:0.5rem;gap:4px;">
                            <div style="flex:1;height:50%;background:rgba(16,217,160,0.6);border-radius:4px;"></div>
                            <div style="flex:2;height:80%;background:rgba(16,217,160,0.3);border-radius:4px;"></div>
                            <div style="flex:1;height:60%;background:rgba(16,217,160,0.5);border-radius:4px;"></div>
                        </div>
                        <div class="theme-opt-label">Teal Premium ✓</div>
                    </div>
                    <div class="theme-opt">
                        <div class="theme-opt-preview" style="background:linear-gradient(135deg,#07070d,#1a0d1a);display:flex;align-items:flex-end;padding:0.5rem;gap:4px;">
                            <div style="flex:1;height:50%;background:rgba(139,92,246,0.6);border-radius:4px;"></div>
                            <div style="flex:2;height:80%;background:rgba(139,92,246,0.3);border-radius:4px;"></div>
                            <div style="flex:1;height:60%;background:rgba(139,92,246,0.5);border-radius:4px;"></div>
                        </div>
                        <div class="theme-opt-label">Purple Luxe</div>
                    </div>
                    <div class="theme-opt">
                        <div class="theme-opt-preview" style="background:linear-gradient(135deg,#07070d,#1a1207);display:flex;align-items:flex-end;padding:0.5rem;gap:4px;">
                            <div style="flex:1;height:50%;background:rgba(251,191,36,0.6);border-radius:4px;"></div>
                            <div style="flex:2;height:80%;background:rgba(251,191,36,0.3);border-radius:4px;"></div>
                            <div style="flex:1;height:60%;background:rgba(251,191,36,0.5);border-radius:4px;"></div>
                        </div>
                        <div class="theme-opt-label">Gold Elite</div>
                    </div>
                </div>
                <div class="fg" style="margin-bottom:0;">
                    <label class="flabel">Bahasa Default</label>
                    <select class="finput">
                        <option selected>Bahasa Indonesia</option>
                        <option>English</option>
                    </select>
                </div>
                <div style="margin-top:1.75rem;">
                    <button class="save-btn"><span class="material-symbols-rounded" style="font-size:18px;">palette</span>Simpan Tampilan</button>
                </div>
            </div>

            <!-- Media Sosial -->
            <div class="form-section" id="sosial">
                <div class="fs-header">
                    <div>
                        <div class="fs-title">Media Sosial & Integrasi</div>
                        <div class="fs-sub">Hubungkan platform dengan saluran pemasaran digital</div>
                    </div>
                </div>
                <div class="social-input-row">
                    <span class="social-platform">Instagram</span>
                    <input type="url" placeholder="https://instagram.com/bintangproperty"/>
                </div>
                <div class="social-input-row">
                    <span class="social-platform">Facebook</span>
                    <input type="url" placeholder="https://facebook.com/bintangproperty"/>
                </div>
                <div class="social-input-row">
                    <span class="social-platform">YouTube</span>
                    <input type="url" placeholder="https://youtube.com/@bintangproperty"/>
                </div>
                <div class="social-input-row">
                    <span class="social-platform">TikTok</span>
                    <input type="url" placeholder="https://tiktok.com/@bintangproperty"/>
                </div>
                <div style="margin-top:1.5rem;">
                    <label class="flabel" style="display:block;margin-bottom:0.75rem;">Google Analytics ID</label>
                    <input class="finput" type="text" placeholder="G-XXXXXXXXXX" style="max-width:280px;font-family:monospace;"/>
                </div>
                <div style="margin-top:1.5rem;">
                    <button class="save-btn"><span class="material-symbols-rounded" style="font-size:18px;">link</span>Simpan Integrasi</button>
                </div>
            </div>

            <!-- Notifikasi -->
            <div class="form-section" id="notif">
                <div class="fs-header">
                    <div>
                        <div class="fs-title">Preferensi Notifikasi</div>
                        <div class="fs-sub">Atur notifikasi yang dikirim ke email admin</div>
                    </div>
                </div>
                @php $notifs = [['icon'=>'person_add','label'=>'Prospek Baru Masuk','sub'=>'Notifikasi saat ada permintaan baru dari website','on'=>true],['icon'=>'calendar_today','label'=>'Jadwal Kunjungan','sub'=>'Pengingat 1 jam sebelum jadwal kunjungan','on'=>true],['icon'=>'sell','label'=>'Unit Terjual','sub'=>'Notifikasi ketika status unit berubah menjadi Terjual','on'=>true],['icon'=>'warning','label'=>'Laporan Mingguan','sub'=>'Ringkasan performa penjualan setiap Senin pagi','on'=>false]]; @endphp
                @foreach($notifs as $n)
                <div class="twofa-status" style="margin-bottom:0.75rem;">
                    <div class="twofa-info">
                        <div class="twofa-icon {{ $n['on'] ? 'twofa-on' : 'twofa-off' }}">
                            <span class="material-symbols-rounded">{{ $n['icon'] }}</span>
                        </div>
                        <div>
                            <div class="twofa-label">{{ $n['label'] }}</div>
                            <div class="twofa-sublabel">{{ $n['sub'] }}</div>
                        </div>
                    </div>
                    <button class="twofa-toggle {{ $n['on'] ? 'on' : '' }}" onclick="this.classList.toggle('on')"></button>
                </div>
                @endforeach
                <div style="margin-top:1.5rem;">
                    <button class="save-btn"><span class="material-symbols-rounded" style="font-size:18px;">notifications</span>Simpan Preferensi</button>
                </div>
            </div>

            <!-- Keamanan -->
            <div class="form-section" id="keamanan">
                <div class="fs-header">
                    <div>
                        <div class="fs-title">Keamanan Akun</div>
                        <div class="fs-sub">Lindungi akses admin dengan autentikasi berlapis</div>
                    </div>
                    <span class="fs-badge">Kritis</span>
                </div>
                <div class="form-grid">
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Password Saat Ini</label>
                        <input class="finput" type="password" placeholder="••••••••"/>
                    </div>
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Password Baru</label>
                        <input class="finput" type="password" placeholder="Min. 8 karakter"/>
                    </div>
                </div>
                <div class="twofa-status" style="margin-top:1rem;">
                    <div class="twofa-info">
                        <div class="twofa-icon twofa-on">
                            <span class="material-symbols-rounded">verified_user</span>
                        </div>
                        <div>
                            <div class="twofa-label">Autentikasi 2 Faktor (2FA)</div>
                            <div class="twofa-sublabel">Aktif via Google Authenticator — terakhir login 2 jam lalu</div>
                        </div>
                    </div>
                    <button class="twofa-toggle on" onclick="this.classList.toggle('on')"></button>
                </div>
                <div style="display:flex;gap:0.75rem;margin-top:1.5rem;">
                    <button class="save-btn"><span class="material-symbols-rounded" style="font-size:18px;">lock_reset</span>Update Password</button>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="danger-section">
                <div class="danger-title">⚠ Zona Berbahaya</div>
                <div class="danger-sub">Tindakan berikut bersifat permanen dan tidak dapat dibatalkan. Lanjutkan dengan sangat hati-hati.</div>
                <div style="display:flex;gap:0.875rem;flex-wrap:wrap;">
                    <button class="danger-btn">Hapus Semua Data Prospek</button>
                    <button class="danger-btn" style="background:transparent;border:1px solid var(--error);color:var(--error);">Reset Pengaturan</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.querySelectorAll('.snav-item').forEach(item => {
    item.addEventListener('click', function(e) {
        document.querySelectorAll('.snav-item').forEach(x => x.classList.remove('active'));
        this.classList.add('active');
    });
});
document.querySelectorAll('.theme-opt').forEach(opt => {
    opt.addEventListener('click', function() {
        document.querySelectorAll('.theme-opt').forEach(x => x.classList.remove('selected'));
        this.classList.add('selected');
        this.querySelector('.theme-opt-label').textContent = this.querySelector('.theme-opt-label').textContent.replace(' ✓','') + ' ✓';
    });
});
</script>
@endsection
@endsection
