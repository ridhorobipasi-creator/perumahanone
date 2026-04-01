@extends('layouts.admin')

@section('title', 'Klien & Prospek | Admin Bintang Property')

@section('content')
<style>
    :root {
        --a-bg: #07070d; --a-card: #11111e;
        --a-border: rgba(255,255,255,0.06); --a-accent: #10d9a0;
        --a-accent-d: rgba(16,217,160,0.1); --a-text: #e8e8f0; --a-muted: #5a5a72;
    }
    .leads-page { padding: 2.5rem; }
    .leads-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 1.25rem; }
    .leads-title { font-size: 2rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.375rem; }
    .leads-sub { font-size: 0.875rem; color: var(--a-muted); max-width: 480px; line-height: 1.7; }
    .leads-actions { display: flex; gap: 0.75rem; }
    .btn-admin-ghost {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: rgba(255,255,255,0.04); border: 1px solid var(--a-border);
        border-radius: 10px; color: var(--a-muted);
        font-size: 0.78rem; font-weight: 700; cursor: pointer; transition: all 0.15s;
    }
    .btn-admin-ghost:hover { border-color: rgba(255,255,255,0.12); color: var(--a-text); }
    .btn-admin-primary {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        background: #10d9a0; color: #021a12;
        border-radius: 10px; font-size: 0.78rem; font-weight: 800;
        border: none; cursor: pointer; transition: background 0.15s;
    }
    .btn-admin-primary:hover { background: #0ffba7; }

    /* Stats */
    .leads-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
    .ls-card { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; padding: 1.5rem; }
    .ls-card.accent { background: rgba(16,217,160,0.08); border-color: rgba(16,217,160,0.2); }
    .ls-label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--a-muted); margin-bottom: 1rem; }
    .ls-val { font-size: 2rem; font-weight: 800; color: var(--a-text); }
    .ls-val.accent { color: #10d9a0; }
    .ls-badge { font-size: 0.65rem; font-weight: 700; padding: 0.2rem 0.625rem; border-radius: 100px; margin-left: 0.5rem; }
    .ls-badge.up { background: rgba(16,217,160,0.12); color: #10d9a0; }

    /* Table */
    .leads-table-wrap { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; overflow: hidden; margin-bottom: 2rem; }
    .leads-table { width: 100%; border-collapse: collapse; }
    .leads-table thead tr { border-bottom: 1px solid var(--a-border); }
    .leads-table th { padding: 1rem 1.25rem; font-size: 0.62rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: var(--a-muted); text-align: left; }
    .leads-table th:last-child { text-align: right; }
    .leads-table tbody tr { border-bottom: 1px solid rgba(255,255,255,0.03); transition: background 0.15s; }
    .leads-table tbody tr:last-child { border-bottom: none; }
    .leads-table tbody tr:hover { background: rgba(255,255,255,0.02); }
    .leads-table td { padding: 1rem 1.25rem; }
    .prospect-avatar { width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; font-weight: 800; flex-shrink: 0; }
    .prospect-name { font-size: 0.875rem; font-weight: 700; color: var(--a-text); }
    .prospect-type { font-size: 0.68rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--a-muted); margin-top: 2px; }
    .contact-email { font-size: 0.8rem; font-weight: 600; color: var(--a-text); }
    .contact-phone { font-size: 0.78rem; color: var(--a-muted); margin-top: 2px; }
    .prop-mini { display: flex; align-items: center; gap: 0.625rem; }
    .prop-mini img { width: 38px; height: 38px; border-radius: 8px; object-fit: cover; border: 1px solid var(--a-border); }
    .prop-mini span { font-size: 0.8rem; font-weight: 700; color: var(--a-text); }
    .lead-date { font-size: 0.8rem; font-weight: 600; color: var(--a-muted); }
    .lead-status { display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.25rem 0.75rem; border-radius: 8px; font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; }
    .lead-status.new { background: rgba(16,217,160,0.1); color: #10d9a0; border: 1px solid rgba(16,217,160,0.2); }
    .lead-status.contacted { background: rgba(99,102,241,0.1); color: #818cf8; border: 1px solid rgba(99,102,241,0.2); }
    .lead-status.sold { background: rgba(34,197,94,0.1); color: #4ade80; border: 1px solid rgba(34,197,94,0.2); }
    .lead-status.process { background: rgba(255,255,255,0.05); color: var(--a-muted); border: 1px solid var(--a-border); }
    .lead-status::before { content:''; width:5px; height:5px; border-radius:50%; background:currentColor; }
    .action-wrap { display: flex; justify-content: flex-end; gap: 0.375rem; }
    .action-btn {
        width: 32px; height: 32px; border-radius: 8px; border: 1px solid var(--a-border);
        background: none; display: flex; align-items: center; justify-content: center;
        color: var(--a-muted); cursor: pointer; transition: all 0.15s;
    }
    .action-btn:hover { color: #10d9a0; border-color: rgba(16,217,160,0.25); background: rgba(16,217,160,0.06); }
    .table-pagination { display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.25rem; border-top: 1px solid var(--a-border); }
    .pag-info { font-size: 0.75rem; color: var(--a-muted); }
    .pag-info strong { color: #10d9a0; }
    .pag-btns { display: flex; gap: 0.375rem; }
    .pag-btn {
        width: 32px; height: 32px; border-radius: 8px; border: 1px solid var(--a-border);
        background: none; display: flex; align-items: center; justify-content: center;
        color: var(--a-muted); font-size: 0.8rem; font-weight: 700; cursor: pointer; transition: all 0.15s;
    }
    .pag-btn.active { background: #10d9a0; border-color: #10d9a0; color: #021a12; }
    .pag-btn:hover:not(.active) { border-color: rgba(255,255,255,0.12); color: var(--a-text); }

    /* Bottom Charts */
    .bottom-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    .chart-card { background: var(--a-card); border: 1px solid var(--a-border); border-radius: 18px; padding: 1.75rem; }
    .chart-title { font-size: 1rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.25rem; }
    .chart-sub { font-size: 0.78rem; color: var(--a-muted); margin-bottom: 2rem; }
    .mini-chart { display: flex; align-items: flex-end; gap: 0.625rem; height: 100px; margin-top: 1.5rem; }
    .mini-bar { flex: 1; border-radius: 6px 6px 0 0; position: relative; transition: height 0.5s; }
    .mini-bar.dim { background: rgba(255,255,255,0.06); }
    .mini-bar.peak { background: #10d9a0; }
    .mini-bar span { position: absolute; bottom: -22px; left: 50%; transform: translateX(-50%); font-size: 0.58rem; font-weight: 700; color: var(--a-muted); white-space: nowrap; }
    .ai-card { background: linear-gradient(135deg, rgba(16,217,160,0.08) 0%, rgba(99,102,241,0.08) 100%); border: 1px solid rgba(16,217,160,0.15); border-radius: 18px; padding: 1.75rem; display: flex; flex-direction: column; }
    .ai-icon { width: 48px; height: 48px; border-radius: 14px; background: rgba(16,217,160,0.12); display: flex; align-items: center; justify-content: center; color: #10d9a0; margin-bottom: 1rem; }
    .ai-title { font-size: 1rem; font-weight: 800; color: var(--a-text); margin-bottom: 0.625rem; }
    .ai-desc { font-size: 0.82rem; color: var(--a-muted); line-height: 1.7; flex: 1; }
    .ai-btn { margin-top: 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.625rem 1.125rem; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; color: var(--a-text); font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; cursor: pointer; transition: all 0.15s; }
    .ai-btn:hover { border-color: #10d9a0; color: #10d9a0; }

    @media(max-width:1024px) { .leads-stats { grid-template-columns: repeat(2, 1fr); } .bottom-grid { grid-template-columns: 1fr; } }
    @media(max-width:640px) { .leads-stats { grid-template-columns: 1fr 1fr; } .leads-table { font-size: 0.8rem; } }
</style>

<div class="leads-page">
    <div class="leads-header">
        <div>
            <div class="leads-title">Klien & Prospek</div>
            <div class="leads-sub">Kelola prospek pembeli dan riwayat permintaan informasi. Konversi prospek potensial menjadi transaksi sukses.</div>
        </div>
        <div class="leads-actions">
            <button class="btn-admin-ghost">
                <span class="material-symbols-rounded" style="font-size:18px;">filter_list</span>
                Filter
            </button>
            <button class="btn-admin-primary">
                <span class="material-symbols-rounded" style="font-size:18px;">download</span>
                Unduh Laporan
            </button>
        </div>
    </div>

    <!-- Stats -->
    <div class="leads-stats">
        <div class="ls-card">
            <div class="ls-label">Total Permintaan</div>
            <div class="ls-val">1.284<span class="ls-badge up">+12%</span></div>
        </div>
        <div class="ls-card">
            <div class="ls-label">Prospek Hari Ini</div>
            <div class="ls-val">48 <span class="material-symbols-rounded" style="font-size:18px;color:#10d9a0;vertical-align:middle;">trending_up</span></div>
        </div>
        <div class="ls-card">
            <div class="ls-label">Tingkat Konversi</div>
            <div class="ls-val">3,2%</div>
        </div>
        <div class="ls-card accent">
            <div class="ls-label">Tindak Lanjut</div>
            <div class="ls-val accent">12 <span class="material-symbols-rounded" style="font-size:18px;color:#10d9a0;vertical-align:middle;animation: pulse-anim 1s infinite;">priority_high</span></div>
        </div>
    </div>

    <!-- Table -->
    <div class="leads-table-wrap">
        <div style="overflow-x:auto;">
            <table class="leads-table">
                <thead>
                    <tr>
                        <th>Nama Prospek</th>
                        <th>Informasi Kontak</th>
                        <th>Minat Properti</th>
                        <th>Tgl Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:0.875rem;">
                                <div class="prospect-avatar" style="background:rgba(16,217,160,0.12);color:#10d9a0;">AH</div>
                                <div>
                                    <div class="prospect-name">Ahmad Hidayat</div>
                                    <div class="prospect-type">Investor Pribadi</div>
                                </div>
                            </div>
                        </td>
                        <td><div class="contact-email">ahmad.h@gmail.com</div><div class="contact-phone">+62 812-3456-7890</div></td>
                        <td>
                            <div class="prop-mini">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBq0ioT6AikQcuH8gu748akH-5wtbO5m7xbxyiSg96XufI1ff46XdjwPp5wuGast0NzCxQIKrXnmZYfx4bav4DUWwHM9ARcR2RNiNs9j9VTQMRphu84QuJTQhHYXDlKIl8t3B4DKctsmFxoqpfHPm0ZiBVzFZZlp7_MSrG-xeEOZe9nsCLk4SBuDUly0rgaEu6f_5JTxSKuFS9nYCTw5N4JgTwc6UFFu9_NpbMzY-H3b_QUB4lPJKGk7-fbnLkrOWD19HxOPo3rALg" alt="prop"/>
                                <span>Cluster Emerald Baru</span>
                            </div>
                        </td>
                        <td><span class="lead-date">24 Okt 2023</span></td>
                        <td><span class="lead-status new">Baru Masuk</span></td>
                        <td>
                            <div class="action-wrap">
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">visibility</span></button>
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">edit</span></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:0.875rem;">
                                <div class="prospect-avatar" style="background:rgba(99,102,241,0.12);color:#818cf8;">SC</div>
                                <div>
                                    <div class="prospect-name">Sisca Chen</div>
                                    <div class="prospect-type">Pembeli Rumah Pertama</div>
                                </div>
                            </div>
                        </td>
                        <td><div class="contact-email">sisca.chen@lifestyle.co.id</div><div class="contact-phone">+62 821-9876-5432</div></td>
                        <td>
                            <div class="prop-mini">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8lZAU5zyAsUrl0tah-le50treaPp182f_CQx-DT6-vP1BtcZzLJ_443-BdYDQ6nnMtCmKMFdYpoM8-D-zJ2AYo8GJyk5m16TCnN9o5XXkG686CLkF1cIhsC6ua4yAYLLTG1K3g5Km0f_YE9YRFnhBbZqXh8-BZAai9jcV1uBcWQiVb7sjXmWiKCSBeRQx7EF2WhdvKgUOzUJJY5a20150EzSkmyBukbBoTLMAOAK6R8SRoaC2OoAFXk6WcnqFgUlIiK4p_ZWv9yw" alt="prop"/>
                                <span>Azure Suites Johor</span>
                            </div>
                        </td>
                        <td><span class="lead-date">23 Okt 2023</span></td>
                        <td><span class="lead-status contacted">Dihubungi</span></td>
                        <td>
                            <div class="action-wrap">
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">visibility</span></button>
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">edit</span></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:0.875rem;">
                                <div class="prospect-avatar" style="background:rgba(251,191,36,0.12);color:#fbbf24;">BN</div>
                                <div>
                                    <div class="prospect-name">Budi Nugroho</div>
                                    <div class="prospect-type">Akun Perusahaan</div>
                                </div>
                            </div>
                        </td>
                        <td><div class="contact-email">budi@techcorp.id</div><div class="contact-phone">+62 811-2345-6789</div></td>
                        <td>
                            <div class="prop-mini">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8zzJmiIpL-8iueidkqoKqO3XrSkEMMalIumh9i5q-6OecofoPo-8tWFiVawsidkvResOv4HOi7B2xyX1AuP9-b25_xGOPv6lcBE1Ii5wy5csLekbDRSq8dp-P78zWdz1SD-HrXgug0qqjtf7YiB98fc0r9qfY2jz6KSD7UYRuVqogkf3n1StcG9IIjQKcytIC8Anrwi7k4jQZ1trQ2ct-OdwHX1ygOOfBzsqPOvkWJ-wEG7qXdjxFCRN01nZZqQa1TIT4Md20guk" alt="prop"/>
                                <span>Ruko Boulevard</span>
                            </div>
                        </td>
                        <td><span class="lead-date">20 Okt 2023</span></td>
                        <td><span class="lead-status sold">Sukses Terjual</span></td>
                        <td>
                            <div class="action-wrap">
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">visibility</span></button>
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">edit</span></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:0.875rem;">
                                <div class="prospect-avatar" style="background:rgba(167,139,250,0.12);color:#a78bfa;">LS</div>
                                <div>
                                    <div class="prospect-name">Lina Siregar</div>
                                    <div class="prospect-type">Prospek Rujukan</div>
                                </div>
                            </div>
                        </td>
                        <td><div class="contact-email">lina.siregar@yahoo.com</div><div class="contact-phone">+62 822-1111-2222</div></td>
                        <td>
                            <div class="prop-mini">
                                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsNxdhs2aUV7DoGuBEY813Rp1bSWEUuphEK2QhzgLbVIezFiLc279a99zW2vTnrPhGOiYteCvyMwX3xZ9hgOrL-RWQpBlrOL5_fnLkxh-6_plMXadsrGuB1TzBtQExfbqlLcXWEkmnx8Xf1R6ngDgmq8QIhDer0YFjGNMu3D6nNmwYQRTuuSVjwg-NYQ58sn2vkEkpRfKp0-Rzze9uCAZM78BEBWppntGfkan6kbggaIUoY4EztAlqv5ZqebKaUP3QJEOGTKl0fug" alt="prop"/>
                                <span>Kavling Ekslusif Toba</span>
                            </div>
                        </td>
                        <td><span class="lead-date">18 Okt 2023</span></td>
                        <td><span class="lead-status process">Diproses</span></td>
                        <td>
                            <div class="action-wrap">
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">visibility</span></button>
                                <button class="action-btn"><span class="material-symbols-rounded" style="font-size:16px;">edit</span></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-pagination">
            <span class="pag-info">Menampilkan <strong>1 – 4</strong> dari 1.284 prospek</span>
            <div class="pag-btns">
                <button class="pag-btn"><span class="material-symbols-rounded" style="font-size:18px;">chevron_left</span></button>
                <button class="pag-btn active">1</button>
                <button class="pag-btn">2</button>
                <button class="pag-btn">3</button>
                <button class="pag-btn"><span class="material-symbols-rounded" style="font-size:18px;">chevron_right</span></button>
            </div>
        </div>
    </div>

    <!-- Bottom -->
    <div class="bottom-grid">
        <div class="chart-card">
            <div class="chart-title">Tren Permintaan</div>
            <div class="chart-sub">Lacak volume klien di kuartal fiskal ini.</div>
            <div class="mini-chart">
                <div class="mini-bar dim" style="height:40%"><span>JUL</span></div>
                <div class="mini-bar dim" style="height:60%"><span>AGU</span></div>
                <div class="mini-bar peak" style="height:90%"><span>SEP</span></div>
                <div class="mini-bar dim" style="height:50%"><span>OKT</span></div>
                <div class="mini-bar dim" style="height:70%"><span>NOV</span></div>
                <div class="mini-bar dim" style="height:30%"><span>DES</span></div>
            </div>
        </div>
        <div class="ai-card">
            <div class="ai-icon"><span class="material-symbols-rounded">smart_toy</span></div>
            <div class="ai-title">Balasan Otomatis AI</div>
            <div class="ai-desc">Asisten virtual properti kami telah otomatis merespon dan menyapa 12 klien baru hari ini menggunakan template salam pemasaran Bintang.</div>
            <button class="ai-btn">
                Konfigurasi Robot
                <span class="material-symbols-rounded" style="font-size:16px;">arrow_forward</span>
            </button>
        </div>
    </div>
</div>
@endsection
