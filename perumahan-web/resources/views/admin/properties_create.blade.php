@extends('layouts.admin')

@section('title', 'Tambah Properti Baru | Admin Bintang')

@section('content')
<style>
    .create-page { padding: 2.5rem; max-width: 1200px; }
    .create-breadcrumb { display: flex; align-items: center; gap: 0.5rem; font-size: 0.72rem; color: var(--text-muted); margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700; }
    .create-breadcrumb a { color: var(--text-muted); text-decoration: none; transition: color 0.15s; }
    .create-breadcrumb a:hover { color: var(--accent); }
    .create-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem; }
    .create-title { font-size: 2rem; font-weight: 800; color: var(--text); margin-bottom: 0.375rem; }
    .create-sub { font-size: 0.875rem; color: var(--text-muted); max-width: 500px; line-height: 1.7; }
    .create-actions { display: flex; gap: 0.75rem; }
    .btn-cancel-create { padding: 0.75rem 1.5rem; background: var(--border2); border: 1px solid var(--border); border-radius: 12px; color: var(--text-muted); font-size: 0.78rem; font-weight: 700; text-decoration: none; transition: all 0.15s; }
    .btn-cancel-create:hover { color: var(--text); border-color: var(--border-hover); }
    .btn-publish { padding: 0.75rem 2rem; background: var(--accent); color: var(--accent-dark); border: none; border-radius: 12px; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; transition: background 0.15s, transform 0.15s; }
    .btn-publish:hover { background: var(--accent-hover); transform: translateY(-1px); }

    /* Error alert */
    .error-alert { background: var(--error-dim); border: 1px solid var(--error); border-radius: 14px; padding: 1rem 1.25rem; margin-bottom: 1.5rem; color: var(--error); font-size: 0.82rem; font-weight: 700; }
    .error-alert ul { padding-left: 1.25rem; }

    /* Form Grid */
    .form-layout { display: grid; grid-template-columns: 1fr 340px; gap: 2rem; }
    .form-section { background: var(--card); border: 1px solid var(--border); border-radius: 20px; padding: 2rem; margin-bottom: 1.5rem; }
    .form-section-title { font-size: 1rem; font-weight: 800; color: var(--text); margin-bottom: 1.75rem; display: flex; align-items: center; gap: 0.75rem; }
    .form-section-title .material-symbols-rounded { color: var(--accent); }
    .fg { display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.25rem; }
    .fg:last-child { margin-bottom: 0; }
    .fg-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem; }
    .fg-2 .fg { margin-bottom: 0; }
    .fg-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1.25rem; }
    .fg-4 .fg { margin-bottom: 0; }
    .flabel { font-size: 0.62rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-faint); }
    .finput {
        background: var(--bg); border: 1px solid var(--border); border-radius: 12px;
        padding: 0.875rem 1rem; color: var(--text); font-size: 0.875rem;
        font-family: inherit; outline: none; width: 100%; transition: border-color 0.2s, box-shadow 0.2s;
    }
    .finput::placeholder { color: var(--text-faint); }
    .finput:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-dim); }
    select.finput { cursor: pointer; }
    textarea.finput { min-height: 110px; resize: vertical; }
    .finput-icon-wrap { position: relative; }
    .finput-icon-wrap .fi-icon { position: absolute; left: 0.875rem; top: 50%; transform: translateY(-50%); color: var(--accent); pointer-events: none; font-size: 18px; }
    .finput-icon-wrap .finput { padding-left: 2.75rem; }
    .finput-prefix { position: relative; }
    .finput-prefix .f-prefix { position: absolute; left: 0.875rem; top: 50%; transform: translateY(-50%); font-size: 0.875rem; font-weight: 800; color: var(--accent); }
    .finput-prefix .finput { padding-left: 2.75rem; }

    /* Amenity chips */
    .amenity-grid { display: flex; flex-wrap: wrap; gap: 0.625rem; }
    .amenity-opt { display: none; }
    .amenity-label { display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border: 1px solid var(--border); border-radius: 100px; background: var(--bg); cursor: pointer; font-size: 0.78rem; font-weight: 700; color: var(--text-muted); transition: all 0.15s; }
    .amenity-opt:checked + .amenity-label { background: var(--accent-dim); border-color: var(--accent); color: var(--accent); }
    .amenity-label .material-symbols-rounded { font-size: 16px; }

    /* Status radio */
    .status-grid { display: flex; flex-direction: column; gap: 0.75rem; }
    .status-opt { display: none; }
    .status-label { display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.125rem; border-radius: 14px; border: 1px solid var(--border); background: var(--bg); cursor: pointer; transition: all 0.15s; }
    .status-label:hover { border-color: var(--border-hover); }
    .status-opt:checked + .status-label { border-color: var(--accent); background: var(--accent-dim); }
    .status-label-inner { display: flex; align-items: center; gap: 0.75rem; font-size: 0.875rem; font-weight: 700; color: var(--text); }
    .status-label-inner .material-symbols-rounded { font-size: 18px; }
    .status-opt:checked + .status-label .status-label-inner { color: var(--accent); }
    .status-opt:checked + .status-label .status-label-inner .material-symbols-rounded {
        font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .status-radio-circle { width: 18px; height: 18px; border-radius: 50%; border: 2px solid var(--border-hover); transition: all 0.15s; position: relative; flex-shrink: 0; }
    .status-opt:checked + .status-label .status-radio-circle { border-color: var(--accent); background: var(--accent); }
    .status-opt:checked + .status-label .status-radio-circle::after { content: ''; position: absolute; width: 6px; height: 6px; border-radius: 50%; background: var(--accent-dark); top: 50%; left: 50%; transform: translate(-50%,-50%); }

    /* Featured toggle */
    .toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.125rem; border-radius: 14px; border: 1px solid var(--border); background: var(--bg); margin-top: 0.75rem; }
    .toggle-row-text h5 { font-size: 0.875rem; font-weight: 700; color: var(--text); }
    .toggle-row-text p { font-size: 0.72rem; color: var(--text-muted); margin-top: 2px; }
    .toggle-switch { width: 44px; height: 24px; background: var(--border-hover); border-radius: 100px; position: relative; cursor: pointer; transition: background 0.2s; flex-shrink: 0; }
    #featured-toggle:checked ~ .toggle-row .toggle-switch { background: var(--accent); }
    .toggle-switch::after { content: ''; position: absolute; width: 18px; height: 18px; background: #fff; border-radius: 50%; top: 3px; left: 3px; transition: transform 0.2s; }

    @media(max-width:1024px) { .form-layout { grid-template-columns: 1fr; } .fg-4 { grid-template-columns: 1fr 1fr; } }
    @media(max-width:640px) { .fg-2 { grid-template-columns: 1fr; } .create-page { padding: 1.5rem; } }
</style>

<div class="create-page">
    <div class="create-header">
        <div>
            <nav class="create-breadcrumb">
                <a href="{{ url('/admin') }}">Dasbor</a>
                <span class="material-symbols-rounded" style="font-size:14px;">chevron_right</span>
                <a href="{{ url('/admin/properties') }}">Manajemen Properti</a>
                <span class="material-symbols-rounded" style="font-size:14px;">chevron_right</span>
                <span style="color:var(--accent);">Tambah Baru</span>
            </nav>
            <div class="create-title">Formulir Listing Baru</div>
            <div class="create-sub">Tambahkan aset baru yang komprehensif untuk dipresentasikan ke pasar.</div>
        </div>
        <div class="create-actions">
            <a href="{{ url('/admin/properties') }}" class="btn-cancel-create">Batal</a>
            <button type="submit" form="createPropertyForm" class="btn-publish">
                <span class="material-symbols-rounded" style="font-size:18px;">publish</span>
                Publikasi Aset
            </button>
        </div>
    </div>

    @if ($errors->any())
        <div class="error-alert">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form id="createPropertyForm" action="{{ url('/admin/properties') }}" method="POST">
        @csrf
        <div class="form-layout">
            <!-- Left -->
            <div>
                <div class="form-section">
                    <div class="form-section-title">
                        <span class="material-symbols-rounded">edit_document</span>Informasi Dasar
                    </div>
                    <div class="fg">
                        <label class="flabel" for="title">Nama Properti / Judul Listing</label>
                        <input id="title" class="finput" type="text" name="title" required placeholder="Cth: Cluster Emerald Premium (Tipe 120)">
                    </div>
                    <div class="fg">
                        <label class="flabel" for="description">Deskripsi Aset (Marketing Copy)</label>
                        <textarea id="description" class="finput" name="description" rows="5" placeholder="Jelaskan nilai jual terbaik dari properti ini kepada calon pembeli..."></textarea>
                    </div>
                    <div class="fg-2">
                        <div class="fg">
                            <label class="flabel" for="category">Kategori / Tipe Aset</label>
                            <select id="category" class="finput" name="category" required>
                                <option value="Perumahan (Cluster)">Perumahan (Cluster)</option>
                                <option value="Ruko / Komersial">Ruko / Komersial</option>
                                <option value="Townhouse">Townhouse</option>
                                <option value="Tanah Kavling Kosong">Tanah Kavling Kosong</option>
                            </select>
                        </div>
                        <div class="fg">
                            <label class="flabel" for="sku">Kode Unit / SKU Internal</label>
                            <input id="sku" class="finput" type="text" name="sku" placeholder="BNG-EM-120" style="font-family:monospace;">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="material-symbols-rounded">architecture</span>Spesifikasi Bangunan
                    </div>
                    <div class="fg-4">
                        <div class="fg">
                            <label class="flabel" for="land_size">Luas Tanah (m²)</label>
                            <div class="finput-icon-wrap">
                                <span class="fi-icon material-symbols-rounded">straighten</span>
                                <input id="land_size" class="finput" type="number" name="land_size" placeholder="150">
                            </div>
                        </div>
                        <div class="fg">
                            <label class="flabel" for="build_size">Luas Bangun (m²)</label>
                            <div class="finput-icon-wrap">
                                <span class="fi-icon material-symbols-rounded">square_foot</span>
                                <input id="build_size" class="finput" type="number" name="build_size" placeholder="120">
                            </div>
                        </div>
                        <div class="fg">
                            <label class="flabel" for="bedrooms">Kamar Tidur</label>
                            <div class="finput-icon-wrap">
                                <span class="fi-icon material-symbols-rounded">bed</span>
                                <input id="bedrooms" class="finput" type="number" name="bedrooms" placeholder="3">
                            </div>
                        </div>
                        <div class="fg">
                            <label class="flabel" for="bathrooms">Kamar Mandi</label>
                            <div class="finput-icon-wrap">
                                <span class="fi-icon material-symbols-rounded">bathtub</span>
                                <input id="bathrooms" class="finput" type="number" name="bathrooms" placeholder="2">
                            </div>
                        </div>
                    </div>
                    <div class="fg">
                        <label class="flabel">Fasilitas Cluster</label>
                        <div class="amenity-grid">
                            <input class="amenity-opt" type="checkbox" id="am1" name="amenities[]" value="Carport / Garasi">
                            <label class="amenity-label" for="am1"><span class="material-symbols-rounded">garage</span>Carport</label>
                            <input class="amenity-opt" type="checkbox" id="am2" name="amenities[]" value="Taman Pribadi">
                            <label class="amenity-label" for="am2"><span class="material-symbols-rounded">park</span>Taman</label>
                            <input class="amenity-opt" type="checkbox" id="am3" name="amenities[]" value="Keamanan 24 Jam">
                            <label class="amenity-label" for="am3"><span class="material-symbols-rounded">security</span>Security 24H</label>
                            <input class="amenity-opt" type="checkbox" id="am4" name="amenities[]" value="Akses Kolam Renang">
                            <label class="amenity-label" for="am4"><span class="material-symbols-rounded">pool</span>Kolam Renang</label>
                            <input class="amenity-opt" type="checkbox" id="am5" name="amenities[]" value="Smart Home">
                            <label class="amenity-label" for="am5"><span class="material-symbols-rounded">home_iot_device</span>Smart Home</label>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="material-symbols-rounded">location_on</span>Pemetaan & Lokasi
                    </div>
                    <div class="fg-2">
                        <div class="fg">
                            <label class="flabel" for="city">Kota / Kabupaten</label>
                            <div class="finput-icon-wrap">
                                <span class="fi-icon material-symbols-rounded">location_city</span>
                                <input id="city" class="finput" type="text" name="city" placeholder="Kota Medan">
                            </div>
                        </div>
                        <div class="fg">
                            <label class="flabel" for="area">Kecamatan / Area</label>
                            <div class="finput-icon-wrap">
                                <span class="fi-icon material-symbols-rounded">map</span>
                                <input id="area" class="finput" type="text" name="area" placeholder="Medan Johor">
                            </div>
                        </div>
                    </div>
                    <div class="fg">
                        <label class="flabel" for="address">Alamat Lengkap</label>
                        <textarea id="address" class="finput" name="address" rows="2" style="min-height:70px;" placeholder="Jalan Boulevard Raya No..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div>
                <div class="form-section">
                    <div class="form-section-title">
                        <span class="material-symbols-rounded">sell</span>Harga & Status
                    </div>
                    <div class="fg">
                        <label class="flabel" for="price">Harga Jual (IDR)</label>
                        <div class="finput-prefix">
                            <span class="f-prefix">Rp</span>
                            <input id="price" class="finput" type="number" name="price" required placeholder="1450000000">
                        </div>
                    </div>
                    <div class="fg" style="margin-bottom:0;">
                        <label class="flabel">Status Ketersediaan</label>
                        <div class="status-grid" style="margin-top:0.75rem;">
                            <input class="status-opt" type="radio" name="status" id="s1" value="Tersedia" checked>
                            <label class="status-label" for="s1">
                                <div class="status-label-inner">
                                    <span class="material-symbols-rounded">check_circle</span>Tersedia
                                </div>
                                <div class="status-radio-circle"></div>
                            </label>
                            <input class="status-opt" type="radio" name="status" id="s2" value="Terbooking">
                            <label class="status-label" for="s2">
                                <div class="status-label-inner">
                                    <span class="material-symbols-rounded">book_online</span>Dipesan (Booking)
                                </div>
                                <div class="status-radio-circle"></div>
                            </label>
                            <input class="status-opt" type="radio" name="status" id="s3" value="Sold">
                            <label class="status-label" for="s3">
                                <div class="status-label-inner">
                                    <span class="material-symbols-rounded">cancel</span>Habis Terjual
                                </div>
                                <div class="status-radio-circle"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-section" style="padding:1.5rem;">
                    <div class="toggle-row" style="padding:0;border:none;background:none;">
                        <div class="toggle-row-text">
                            <h5>Listing Unggulan</h5>
                            <p>Tampilkan sebagai Hot Properti di halaman utama</p>
                        </div>
                        <label style="cursor:pointer;">
                            <input id="featured-toggle" type="checkbox" name="is_featured" value="1" style="display:none;" onchange="this.parentElement.querySelector('.toggle-switch').style.background = this.checked ? 'var(--accent)' : ''; this.parentElement.querySelector('.toggle-knob').style.transform = this.checked ? 'translateX(20px)' : '';">
                            <div class="toggle-switch">
                                <div class="toggle-knob" style="position:absolute;width:18px;height:18px;background:#fff;border-radius:50%;top:3px;left:3px;transition:transform 0.2s;"></div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-section" style="background:var(--gradient-card);border-color:var(--accent);">
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1rem;">
                        <div style="width:36px;height:36px;border-radius:10px;background:var(--accent-dim);display:flex;align-items:center;justify-content:center;color:var(--accent);flex-shrink:0;">
                            <span class="material-symbols-rounded">info</span>
                        </div>
                        <div style="font-size:0.875rem;font-weight:800;color:var(--text);">Panduan Listing</div>
                    </div>
                    <ul style="font-size:0.78rem;color:var(--text-muted);line-height:1.8;padding-left:1rem;">
                        <li>Isi semua kolom yang bertanda * wajib</li>
                        <li>Gunakan harga jual bersih tanpa pajak</li>
                        <li>Deskripsi minimal 100 karakter untuk SEO</li>
                        <li>Foto utama maks 5MB, format JPG/PNG</li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
