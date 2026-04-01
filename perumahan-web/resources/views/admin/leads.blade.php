@extends('layouts.admin')

@section('title', 'Klien & Prospek | Admin Bintang Property')

@section('content')
<style>
    .leads-page { padding: 2.5rem; }
    .leads-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1rem; }
    .leads-title { font-size: 2rem; font-weight: 800; color: var(--text); }
    .leads-sub { font-size: 0.875rem; color: var(--text-muted); margin-top: 0.25rem; }
    .leads-actions { display: flex; gap: 0.75rem; }
    .btn-export { display: flex; align-items: center; gap: 0.5rem; padding: 0.625rem 1.25rem; background: var(--border2); border: 1px solid var(--border); border-radius: 10px; font-size: 0.78rem; font-weight: 700; color: var(--text-muted); cursor: pointer; text-decoration: none; transition: all 0.15s; }
    .btn-export:hover { color: var(--text); border-color: var(--border-hover); }

    /* Stats */
    .leads-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
    .ls-card { background: var(--card); border: 1px solid var(--border); border-radius: 18px; padding: 1.5rem; }
    .ls-card.a-accent { background: var(--accent-dim); border-color: var(--accent); }
    .ls-icon { width: 40px; height: 40px; border-radius: 12px; background: var(--border); display: flex; align-items: center; justify-content: center; color: var(--text-muted); margin-bottom: 1rem; }
    .ls-icon.a-accent { background: var(--accent-dim); color: var(--accent); }
    .ls-val { font-size: 1.75rem; font-weight: 800; color: var(--text); line-height: 1; }
    .ls-val.a-accent { color: var(--accent); }
    .ls-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-muted); margin-top: 0.25rem; }
    .ls-trend { font-size: 0.72rem; font-weight: 700; color: var(--accent); margin-top: 0.5rem; }

    /* Filters */
    .filter-bar { display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
    .search-wrap { display: flex; align-items: center; gap: 0.625rem; background: var(--card); border: 1px solid var(--border); border-radius: 10px; padding: 0.625rem 1rem; flex: 1; min-width: 220px; transition: border-color 0.2s; }
    .search-wrap:focus-within { border-color: var(--accent); }
    .search-wrap .material-symbols-rounded { color: var(--text-muted); flex-shrink: 0; }
    .search-wrap input { background: none; border: none; outline: none; color: var(--text); font-size: 0.83rem; font-family: inherit; width: 100%; }
    .search-wrap input::placeholder { color: var(--text-muted); }
    .filter-select { background: var(--card); border: 1px solid var(--border); border-radius: 10px; padding: 0.625rem 1rem; color: var(--text); font-size: 0.78rem; font-weight: 700; outline: none; cursor: pointer; }
    .filter-tabs { display: flex; gap: 4px; background: var(--border2); border-radius: 10px; padding: 4px; }
    .filter-tab { padding: 0.375rem 0.875rem; border-radius: 7px; font-size: 0.72rem; font-weight: 700; border: none; background: transparent; cursor: pointer; color: var(--text-muted); transition: all 0.15s; }
    .filter-tab.active { background: var(--card); color: var(--text); box-shadow: 0 1px 4px rgba(0,0,0,0.1); }

    /* Table */
    .leads-table-wrap { background: var(--card); border: 1px solid var(--border); border-radius: 18px; overflow: hidden; }
    .leads-table { width: 100%; border-collapse: collapse; }
    .leads-table thead tr { border-bottom: 1px solid var(--border); }
    .leads-table th { font-size: 0.6rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); padding: 1rem 1.25rem; text-align: left; white-space: nowrap; }
    .leads-table td { padding: 1rem 1.25rem; border-bottom: 1px solid var(--border2); vertical-align: middle; }
    .leads-table tbody tr:last-child td { border-bottom: none; }
    .leads-table tbody tr { transition: background 0.1s; }
    .leads-table tbody tr:hover { background: var(--border2); }
    .l-avatar { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: 800; flex-shrink: 0; }
    .l-name { font-size: 0.875rem; font-weight: 700; color: var(--text); }
    .l-contact { font-size: 0.72rem; color: var(--text-muted); margin-top: 2px; }
    .l-badge { font-size: 0.62rem; font-weight: 700; padding: 0.275rem 0.7rem; border-radius: 6px; white-space: nowrap; }
    .lb-new  { background: var(--accent-dim);       color: var(--accent); }
    .lb-hot  { background: var(--warning-dim);       color: var(--warning); }
    .lb-done { background: rgba(99,102,241,0.12);    color: #818cf8; }
    .lb-sold { background: var(--error-dim);         color: var(--error); }
    .l-prop { font-size: 0.78rem; font-weight: 600; color: var(--text-secondary); max-width: 140px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .l-date { font-size: 0.72rem; color: var(--text-muted); white-space: nowrap; }
    .l-actions { display: flex; gap: 0.5rem; }
    .l-btn { width: 30px; height: 30px; border-radius: 8px; border: 1px solid var(--border); background: var(--bg); display: flex; align-items: center; justify-content: center; color: var(--text-muted); cursor: pointer; transition: all 0.15s; text-decoration: none; }
    .l-btn:hover { color: var(--accent); border-color: var(--accent); background: var(--accent-dim); }
    .l-btn .material-symbols-rounded { font-size: 16px; }

    /* Empty state */
    .empty-state { text-align: center; padding: 4rem 2rem; }
    .empty-state .material-symbols-rounded { font-size: 48px; color: var(--border-hover); display: block; margin-bottom: 1rem; }
    .empty-state h3 { font-size: 1rem; font-weight: 800; color: var(--text); margin-bottom: 0.5rem; }
    .empty-state p { font-size: 0.82rem; color: var(--text-muted); }

    @media(max-width:1100px) { .leads-stats { grid-template-columns: 1fr 1fr; } }
    @media(max-width:768px) { .leads-stats { grid-template-columns: 1fr 1fr; } .leads-table th:nth-child(4),.leads-table td:nth-child(4) { display: none; } .leads-page { padding: 1.5rem; } }
</style>

<div class="leads-page">
    <div class="leads-header">
        <div>
            <div class="leads-title">Klien & Prospek</div>
            <div class="leads-sub">Kelola semua permintaan dan data prospek properti Anda</div>
        </div>
        <div class="leads-actions">
            <a href="#" class="btn-export">
                <span class="material-symbols-rounded" style="font-size:18px;">download</span>Export CSV
            </a>
            <a href="{{ url('/admin/properties/create') }}" style="display:flex;align-items:center;gap:0.5rem;padding:0.625rem 1.25rem;background:var(--accent);color:var(--accent-dark);border:none;border-radius:10px;font-size:0.78rem;font-weight:800;text-decoration:none;transition:background 0.15s;" onmouseenter="this.style.background='var(--accent-hover)'" onmouseleave="this.style.background='var(--accent)'">
                <span class="material-symbols-rounded" style="font-size:18px;">person_add</span>Tambah Lead
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="leads-stats">
        <div class="ls-card a-accent">
            <div class="ls-icon a-accent"><span class="material-symbols-rounded">people</span></div>
            <div class="ls-val a-accent">184</div>
            <div class="ls-label">Total Prospek</div>
            <div class="ls-trend">↑ 12% bulan ini</div>
        </div>
        <div class="ls-card">
            <div class="ls-icon"><span class="material-symbols-rounded">fiber_new</span></div>
            <div class="ls-val">23</div>
            <div class="ls-label">Prospek Baru</div>
            <div class="ls-trend" style="color:var(--accent)">↑ 5 hari ini</div>
        </div>
        <div class="ls-card">
            <div class="ls-icon"><span class="material-symbols-rounded">local_fire_department</span></div>
            <div class="ls-val">41</div>
            <div class="ls-label">Prospek Panas</div>
            <div class="ls-trend" style="color:var(--warning)">Perlu tindak lanjut</div>
        </div>
        <div class="ls-card">
            <div class="ls-icon"><span class="material-symbols-rounded">handshake</span></div>
            <div class="ls-val">47</div>
            <div class="ls-label">Konversi (Terjual)</div>
            <div class="ls-trend" style="color:var(--accent)">Rate: 25.5%</div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <div class="search-wrap">
            <span class="material-symbols-rounded">search</span>
            <input type="text" id="leads-search" placeholder="Cari nama, email, atau telepon..."/>
        </div>
        <div class="filter-tabs">
            <button class="filter-tab active">Semua</button>
            <button class="filter-tab">Baru</button>
            <button class="filter-tab">Panas</button>
            <button class="filter-tab">Proses</button>
        </div>
        <select class="filter-select">
            <option>Semua Properti</option>
            <option>Sicoland Green</option>
            <option>Puri Hamparan Perak</option>
            <option>Bintang Residence</option>
        </select>
        <select class="filter-select">
            <option>Urutkan: Terbaru</option>
            <option>Urutkan: Terlama</option>
            <option>Urutkan: A–Z</option>
        </select>
    </div>

    <!-- Table -->
    <div class="leads-table-wrap">
        <table class="leads-table">
            <thead>
                <tr>
                    <th>Klien</th>
                    <th>Properti Diminati</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Sumber</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $allLeads = [
                        ['name'=>'Rina Sari','phone'=>'+62 812-3456-7890','email'=>'rina@email.com','prop'=>'Sicoland Green','status'=>'Baru','cls'=>'lb-new','date'=>'Hari ini, 09:24','color'=>'#10d9a0','bg'=>'rgba(16,217,160,0.12)','init'=>'RS','source'=>'Website'],
                        ['name'=>'Budi Hartono','phone'=>'+62 877-1234-5678','email'=>'budi@email.com','prop'=>'Bintang Residence','status'=>'Panas','cls'=>'lb-hot','date'=>'Kemarin, 14:30','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.12)','init'=>'BH','source'=>'WhatsApp'],
                        ['name'=>'Dewi Lestari','phone'=>'+62 821-9876-5432','email'=>'dewi@email.com','prop'=>'Puri Hamparan Perak','status'=>'Diproses','cls'=>'lb-done','date'=>'28 Mar 2024','color'=>'#818cf8','bg'=>'rgba(99,102,241,0.12)','init'=>'DL','source'=>'Referral'],
                        ['name'=>'Ahmad Fauzi','phone'=>'+62 895-5555-4444','email'=>'ahmad@email.com','prop'=>'Sicoland Green','status'=>'Baru','cls'=>'lb-new','date'=>'27 Mar 2024','color'=>'#10d9a0','bg'=>'rgba(16,217,160,0.12)','init'=>'AF','source'=>'Instagram'],
                        ['name'=>'Siti Rahayu','phone'=>'+62 812-8888-1234','email'=>'siti@email.com','prop'=>'Bintang Residence','status'=>'Terjual','cls'=>'lb-sold','date'=>'25 Mar 2024','color'=>'#f87171','bg'=>'rgba(248,113,113,0.12)','init'=>'SR','source'=>'Website'],
                        ['name'=>'Hendra Gunawan','phone'=>'+62 822-7654-3210','email'=>'hendra@email.com','prop'=>'Puri Hamparan Perak','status'=>'Panas','cls'=>'lb-hot','date'=>'24 Mar 2024','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.12)','init'=>'HG','source'=>'Telepon'],
                        ['name'=>'Maya Indah','phone'=>'+62 831-2222-3333','email'=>'maya@email.com','prop'=>'Sicoland Green','status'=>'Baru','cls'=>'lb-new','date'=>'23 Mar 2024','color'=>'#10d9a0','bg'=>'rgba(16,217,160,0.12)','init'=>'MI','source'=>'Website'],
                        ['name'=>'Rizky Pratama','phone'=>'+62 812-4444-5555','email'=>'rizky@email.com','prop'=>'Bintang Residence','status'=>'Diproses','cls'=>'lb-done','date'=>'22 Mar 2024','color'=>'#818cf8','bg'=>'rgba(99,102,241,0.12)','init'=>'RP','source'=>'Facebook'],
                    ];
                @endphp
                @foreach($allLeads as $l)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.875rem;">
                            <div class="l-avatar" style="background:{{ $l['bg'] }};color:{{ $l['color'] }}">{{ $l['init'] }}</div>
                            <div>
                                <div class="l-name">{{ $l['name'] }}</div>
                                <div class="l-contact">{{ $l['phone'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td><div class="l-prop">{{ $l['prop'] }}</div></td>
                    <td><span class="l-badge {{ $l['cls'] }}">{{ $l['status'] }}</span></td>
                    <td><div class="l-date">{{ $l['date'] }}</div></td>
                    <td><div style="font-size:0.72rem;font-weight:600;color:var(--text-muted);">{{ $l['source'] }}</div></td>
                    <td>
                        <div class="l-actions">
                            <a href="https://wa.me/{{ str_replace(['+','-',' '], '', $l['phone']) }}" target="_blank" class="l-btn" title="WhatsApp">
                                <span class="material-symbols-rounded">chat</span>
                            </a>
                            <a href="mailto:{{ $l['email'] }}" class="l-btn" title="Email">
                                <span class="material-symbols-rounded">mail</span>
                            </a>
                            <button class="l-btn" title="Detail">
                                <span class="material-symbols-rounded">visibility</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div style="display:flex;align-items:center;justify-content:space-between;padding:1.25rem 1.5rem;border-top:1px solid var(--border);">
            <div style="font-size:0.72rem;color:var(--text-muted);font-weight:600;">Menampilkan 1–8 dari 184 prospek</div>
            <div style="display:flex;gap:0.5rem;">
                @foreach([1,2,3,'…',20] as $p)
                <button style="min-width:34px;height:34px;border-radius:8px;border:1px solid {{ $p==1 ? 'var(--accent)' : 'var(--border)' }};background:{{ $p==1 ? 'var(--accent)' : 'var(--card)' }};color:{{ $p==1 ? 'var(--accent-dark)' : 'var(--text-muted)' }};font-size:0.78rem;font-weight:700;cursor:pointer;">{{ $p }}</button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.querySelectorAll('.filter-tab').forEach(t => {
    t.addEventListener('click', function() {
        document.querySelectorAll('.filter-tab').forEach(x => x.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>
@endsection
@endsection
