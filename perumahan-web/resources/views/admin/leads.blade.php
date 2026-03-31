@extends('layouts.admin')

@section('title', 'Klien & Prospek | Admin Bintang')

@section('content')
<!-- Page Content -->
<div class="p-8 space-y-8">
    <!-- Hero / Header Section -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-4xl font-black text-on-background tracking-tight">Klien &amp; Prospek</h2>
            <p class="text-secondary mt-2 max-w-xl font-medium">Kelola prospek pembeli dan riwayat permintaan informasi. Konversi prospek potensial menjadi transaksi sukses melalui fitur manajemen leads kami.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-surface-container-highest px-6 py-2.5 rounded-md text-sm font-bold flex items-center gap-2 hover:bg-surface-container-high transition-colors text-on-surface">
                <span class="material-symbols-outlined text-lg">filter_list</span> Saring Tampilan
            </button>
            <button class="bg-primary px-6 py-2.5 rounded-md text-sm font-bold text-white flex items-center gap-2 shadow-lg shadow-primary/20 hover:opacity-90 transition-opacity">
                <span class="material-symbols-outlined text-lg">download</span> Unduh Laporan
            </button>
        </div>
    </section>

    <!-- Stats Overview - Subtle Bento Style -->
    <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-surface-container-lowest border border-slate-100 p-6 rounded-3xl flex flex-col justify-between shadow-sm">
            <span class="text-xs font-bold uppercase tracking-widest text-secondary">Total Permintaan</span>
            <div class="flex items-baseline gap-2 mt-4">
                <span class="text-3xl font-black text-primary">1.284</span>
                <span class="text-xs text-teal-600 font-bold bg-teal-50 px-2 py-1 rounded">+12%</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-slate-100 p-6 rounded-3xl flex flex-col justify-between shadow-sm">
            <span class="text-xs font-bold uppercase tracking-widest text-secondary">Prospek Hari Ini</span>
            <div class="flex items-baseline gap-2 mt-4">
                <span class="text-3xl font-black text-on-background">48</span>
                <span class="material-symbols-outlined text-primary text-sm p-1 bg-primary/10 rounded-full">trending_up</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest border border-slate-100 p-6 rounded-3xl flex flex-col justify-between shadow-sm">
            <span class="text-xs font-bold uppercase tracking-widest text-secondary">Tingkat Konversi</span>
            <div class="flex items-baseline gap-2 mt-4">
                <span class="text-3xl font-black text-on-background">3,2%</span>
                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Rata-rata</span>
            </div>
        </div>
        <div class="bg-primary text-white p-6 rounded-3xl flex flex-col justify-between shadow-lg shadow-primary/20">
            <span class="text-xs font-bold uppercase tracking-widest opacity-80">Tindak Lanjut</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-3xl font-black">12</span>
                <span class="material-symbols-outlined text-white text-xl animate-pulse">priority_high</span>
            </div>
        </div>
    </section>

    <!-- Lead Management Table -->
    <div class="bg-surface-container-lowest rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Nama Prospek</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Informasi Kontak</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Minat Properti</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Tgl Masuk</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary">Status</th>
                        <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Row 1 -->
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-teal-100 border border-teal-200 flex items-center justify-center text-teal-800 font-black text-xs">AH</div>
                                <div>
                                    <p class="font-black text-sm text-on-background">Ahmad Hidayat</p>
                                    <p class="text-[10px] font-bold text-secondary uppercase tracking-widest mt-1">Investor Pribadi</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[11px] font-bold text-on-background">ahmad.h@gmail.com</p>
                            <p class="text-[11px] font-medium text-secondary mt-0.5">+62 812-3456-7890</p>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <img alt="Properti" class="w-10 h-10 rounded-lg object-cover border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBq0ioT6AikQcuH8gu748akH-5wtbO5m7xbxyiSg96XufI1ff46XdjwPp5wuGast0NzCxQIKrXnmZYfx4bav4DUWwHM9ARcR2RNiNs9j9VTQMRphu84QuJTQhHYXDlKIl8t3B4DKctsmFxoqpfHPm0ZiBVzFZZlp7_MSrG-xeEOZe9nsCLk4SBuDUly0rgaEu6f_5JTxSKuFS9nYCTw5N4JgTwc6UFFu9_NpbMzY-H3b_QUB4lPJKGk7-fbnLkrOWD19HxOPo3rALg"/>
                                <p class="text-[11px] font-bold text-on-background">Cluster Emerald Baru</p>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-secondary">24 Okt 2023</td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-black bg-teal-100 text-teal-800 uppercase tracking-widest border border-teal-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-teal-600 mr-1.5 animate-pulse"></span> Baru Masuk
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-primary hover:bg-teal-50 rounded-lg transition-all" title="Lihat Detail"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
                                <button class="p-2 text-slate-400 hover:text-secondary hover:bg-slate-100 rounded-lg transition-all" title="Ubah Status"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-200 border border-slate-300 flex items-center justify-center text-slate-600 font-black text-xs">SC</div>
                                <div>
                                    <p class="font-black text-sm text-on-background">Sisca Chen</p>
                                    <p class="text-[10px] font-bold text-secondary uppercase tracking-widest mt-1">Pembeli Rumah Pertama</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[11px] font-bold text-on-background">sisca.chen@lifestyle.co.id</p>
                            <p class="text-[11px] font-medium text-secondary mt-0.5">+62 821-9876-5432</p>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <img alt="Properti" class="w-10 h-10 rounded-lg object-cover border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8lZAU5zyAsUrl0tah-le50treaPp182f_CQx-DT6-vP1BtcZzLJ_443-BdYDQ6nnMtCmKMFdYpoM8-D-zJ2AYo8GJyk5m16TCnN9o5XXkG686CLkF1cIhsC6ua4yAYLLTG1K3g5Km0f_YE9YRFnhBbZqXh8-BZAai9jcV1uBcWQiVb7sjXmWiKCSBeRQx7EF2WhdvKgUOzUJJY5a20150EzSkmyBukbBoTLMAOAK6R8SRoaC2OoAFXk6WcnqFgUlIiK4p_ZWv9yw"/>
                                <p class="text-[11px] font-bold text-on-background">Azure Suites Johor</p>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-secondary">23 Okt 2023</td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-black bg-blue-100 text-blue-800 uppercase tracking-widest border border-blue-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5"></span> Dihubungi
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-primary hover:bg-teal-50 rounded-lg transition-all"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
                                <button class="p-2 text-slate-400 hover:text-secondary hover:bg-slate-100 rounded-lg transition-all"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-amber-100 border border-amber-200 flex items-center justify-center text-amber-800 font-black text-xs">BN</div>
                                <div>
                                    <p class="font-black text-sm text-on-background">Budi Nugroho</p>
                                    <p class="text-[10px] font-bold text-secondary uppercase tracking-widest mt-1">Akun Perusahaan</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[11px] font-bold text-on-background">budi@techcorp.id</p>
                            <p class="text-[11px] font-medium text-secondary mt-0.5">+62 811-2345-6789</p>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <img alt="Properti" class="w-10 h-10 rounded-lg object-cover border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8zzJmiIpL-8iueidkqoKqO3XrSkEMMalIumh9i5q-6OecofoPo-8tWFiVawsidkvResOv4HOi7B2xyX1AuP9-b25_xGOPv6lcBE1Ii5wy5csLekbDRSq8dp-P78zWdz1SD-HrXgug0qqjtf7YiB98fc0r9qfY2jz6KSD7UYRuVqogkf3n1StcG9IIjQKcytIC8Anrwi7k4jQZ1trQ2ct-OdwHX1ygOOfBzsqPOvkWJ-wEG7qXdjxFCRN01nZZqQa1TIT4Md20guk"/>
                                <p class="text-[11px] font-bold text-on-background">Ruko Boulevard</p>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-secondary">20 Okt 2023</td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-black bg-green-100 text-green-800 uppercase tracking-widest border border-green-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-600 mr-1.5"></span> Sukses Terjual
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-primary hover:bg-teal-50 rounded-lg transition-all"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
                                <button class="p-2 text-slate-400 hover:text-secondary hover:bg-slate-100 rounded-lg transition-all"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-purple-100 border border-purple-200 flex items-center justify-center text-purple-800 font-black text-xs">LS</div>
                                <div>
                                    <p class="font-black text-sm text-on-background">Lina Siregar</p>
                                    <p class="text-[10px] font-bold text-secondary uppercase tracking-widest mt-1">Prospek Rujukan</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[11px] font-bold text-on-background">lina.siregar@yahoo.com</p>
                            <p class="text-[11px] font-medium text-secondary mt-0.5">+62 822-1111-2222</p>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-3">
                                <img alt="Properti" class="w-10 h-10 rounded-lg object-cover border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsNxdhs2aUV7DoGuBEY813Rp1bSWEUuphEK2QhzgLbVIezFiLc279a99zW2vTnrPhGOiYteCvyMwX3xZ9hgOrL-RWQpBlrOL5_fnLkxh-6_plMXadsrGuB1TzBtQExfbqlLcXWEkmnx8Xf1R6ngDgmq8QIhDer0YFjGNMu3D6nNmwYQRTuuSVjwg-NYQ58sn2vkEkpRfKp0-Rzze9uCAZM78BEBWppntGfkan6kbggaIUoY4EztAlqv5ZqebKaUP3QJEOGTKl0fug"/>
                                <p class="text-[11px] font-bold text-on-background">Kavling Ekslusif Toba</p>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-[11px] font-bold text-secondary">18 Okt 2023</td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-black bg-slate-100 text-slate-800 uppercase tracking-widest border border-slate-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-1.5"></span> Sedang Diproses
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-primary hover:bg-teal-50 rounded-lg transition-all"><span class="material-symbols-outlined text-[18px]">visibility</span></button>
                                <button class="p-2 text-slate-400 hover:text-secondary hover:bg-slate-100 rounded-lg transition-all"><span class="material-symbols-outlined text-[18px]">edit</span></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="px-6 py-4 bg-surface-container-lowest border-t border-slate-100 flex items-center justify-between">
            <p class="text-[11px] font-bold text-secondary uppercase tracking-widest">Menampilkan <span class="text-primary mx-1">1 - 4</span> dari 1.284 prospek</p>
            <div class="flex gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-50 transition-colors text-secondary border border-slate-100"><span class="material-symbols-outlined text-lg">chevron_left</span></button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-[11px] font-black shadow-md shadow-primary/20">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-50 transition-colors text-[11px] text-secondary font-bold">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-50 transition-colors text-[11px] text-secondary font-bold">3</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-slate-50 transition-colors text-secondary border border-slate-100"><span class="material-symbols-outlined text-lg">chevron_right</span></button>
            </div>
        </div>
    </div>

    <!-- Bottom Asymmetric Section: Lead Sources & Insights -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Chart Area Placeholder -->
        <div class="lg:col-span-2 bg-surface-container-lowest border border-slate-100 p-8 rounded-3xl relative overflow-hidden group shadow-[0_10px_30px_rgba(0,0,0,0.02)]">
            <div class="relative z-10">
                <h3 class="text-xl font-black text-on-background tracking-tight">Tren Permintaan</h3>
                <p class="text-sm font-medium text-secondary mt-1">Lacak volume klien di kuartal fiskal ini.</p>
                <!-- Visual representation of a chart using bars -->
                <div class="mt-10 flex items-end gap-3 h-32 px-4">
                    <div class="flex-1 bg-surface-container-highest rounded-t-lg h-[40%] group-hover:h-[45%] transition-all duration-500 relative"><span class="text-[10px] font-bold absolute -bottom-6 left-1/2 -translate-x-1/2 text-slate-400">JUL</span></div>
                    <div class="flex-1 bg-surface-container-highest rounded-t-lg h-[60%] group-hover:h-[65%] transition-all duration-500 delay-75 relative"><span class="text-[10px] font-bold absolute -bottom-6 left-1/2 -translate-x-1/2 text-slate-400">AGU</span></div>
                    <div class="flex-1 bg-primary rounded-t-lg h-[90%] group-hover:h-[95%] shadow-[0_0_15px_rgba(0,106,100,0.4)] transition-all duration-500 delay-150 relative"><span class="text-[10px] font-bold absolute -bottom-6 left-1/2 -translate-x-1/2 text-on-surface">SEP</span></div>
                    <div class="flex-1 bg-surface-container-highest rounded-t-lg h-[50%] group-hover:h-[55%] transition-all duration-500 delay-200 relative"><span class="text-[10px] font-bold absolute -bottom-6 left-1/2 -translate-x-1/2 text-slate-400">OKT</span></div>
                    <div class="flex-1 bg-surface-container-highest rounded-t-lg h-[70%] group-hover:h-[75%] transition-all duration-500 delay-300 relative"><span class="text-[10px] font-bold absolute -bottom-6 left-1/2 -translate-x-1/2 text-slate-400">NOV</span></div>
                    <div class="flex-1 bg-surface-container-highest rounded-t-lg h-[30%] group-hover:h-[35%] transition-all duration-500 delay-400 relative"><span class="text-[10px] font-bold absolute -bottom-6 left-1/2 -translate-x-1/2 text-slate-400">DES</span></div>
                </div>
            </div>
            <!-- Decorative Element -->
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
        </div>

        <!-- Secondary Insight Card -->
        <div class="bg-gradient-to-br from-teal-50 to-surface-container-low border border-teal-100 p-8 rounded-3xl flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -right-4 -top-4 text-[100px] text-teal-900/5 material-symbols-outlined transform -rotate-12 pointer-events-none">auto_awesome</div>
            <div class="relative z-10">
                <span class="material-symbols-outlined text-primary text-3xl mb-4 bg-white w-12 h-12 flex items-center justify-center rounded-xl shadow-sm">insights</span>
                <h3 class="text-lg font-black text-on-background tracking-tight">Balasan Otomatis AI</h3>
                <p class="text-xs font-medium text-secondary mt-3 leading-relaxed">Asisten virtual properti kami telah otomatis merespon dan menyapa 12 klien baru hari ini menggunakan template salam pemasaran Bintang.</p>
            </div>
            <button class="mt-6 text-[11px] font-black text-primary flex items-center gap-1 group uppercase tracking-widest bg-white w-fit px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition-all">
                Konfigurasi Robot
                <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </button>
        </div>
    </section>
</div>
@endsection
