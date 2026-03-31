@extends('layouts.app')

@section('title', 'Asoka Palace | Architectural Curator')

@section('content')
<main class="pt-24 pb-20">
    <section class="px-8 max-w-screen-2xl mx-auto mb-12">
        <div class="grid grid-cols-12 gap-4 h-[716px]">
            <div class="col-span-12 md:col-span-8 h-full rounded-full overflow-hidden relative">
                <img alt="Main view of Asoka Palace" class="w-full h-full object-cover" data-alt="Modern architectural masterpiece house with glass walls, clean lines, and a luxury pool at twilight with warm interior lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-MsLo-XXDhCFSwVfRpZcFQSQGHpede5E9F1327wab2h_ZG9btSXz1xTtRxxwytbgyyekwCDEs_saPKgrr9VTAohsgEVIVejGjPD4y-wEatE9J0W66rS5xpwJfgD_8S251k4Z1ZIHBVTe9E7F8iSsg5kymtKpd5zgm6aB4qkzn_XMIb7jeRwOdB5bGQ_ALCxUvyFqlM6EN-egeGm5l_osZvt7ZbZprjMv96-j8Yje7QiLTQFU1u5qe14diog3WSFobJyEENRipKqI"/>
                <div class="absolute bottom-8 left-8 bg-white/10 backdrop-blur-xl p-6 rounded-xl border border-white/20">
                    <h1 class="text-white text-5xl font-black tracking-tighter mb-2">Asoka Palace</h1>
                    <p class="text-white/80 text-lg">Sentul Highlands, Deli Serdang, Sumatera Utara</p>
                </div>
            </div>
            <div class="hidden md:flex flex-col col-span-4 gap-4 h-full">
                <div class="h-1/2 rounded-full overflow-hidden">
                    <img alt="Interior of Asoka Palace" class="w-full h-full object-cover" data-alt="High-end minimalist living room with double height ceilings, floor to ceiling windows, and contemporary designer furniture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCRr36fqLm26EjRe2U2PjUiDjyWt6zznRHaRgTEwbuNu85t-n5QwCI9FnC2WJzWfbO4S9PP_zvdAVrYbXN50fAW9KN0dpY9NLaVYmmLtYOPnBnIDujiIJuVrJvd3IujUsu2jqhUkMgarbVSLq-4H50aMRVeQ2ThpGmPrj7WNTsJnSyzVJ9O7dFss1t3KVa6wkFTf6OwXME7bo4oW71qggJEv9tRZq6YHfUOWSELxTSjiqt1-024ofXuVpVMn4cJykFu3AoHnUXfrY"/>
                </div>
                <div class="h-1/2 rounded-full overflow-hidden">
                    <img alt="Garden of Asoka Palace" class="w-full h-full object-cover" data-alt="Lush tropical landscaped garden with manicured lawn and architectural concrete stepping stones near a luxury villa" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs7sN3KxYyQKQvl-JVYELBFsKnAJaSgKkx4FXLIBnXJ1kTRqbCTBrfzX_fNKmrb6cDVFRkszsaPg5PbUdOz0vai9u3D3haQaz5LM1docvgugkriS6aMXEbkPgUnZDzxix3wmw3VjQT-T2XTzjnU7w8Q_W-PkkrS9e0PEFXgNGRz2pNtouBHNBHTHwy7YUYUApK-fwnfTQHMOJ1nmYICEsvH6m1O7Zjl741eaaq_AltubE9IAaQjpusV5RLCB0r8Xo4ax0NvQ_mQvc"/>
                </div>
            </div>
        </div>
    </section>

    <section class="px-8 max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-16">
        <div class="md:col-span-8 space-y-24">
            <div class="space-y-6" id="overview">
                <div class="flex items-baseline gap-4">
                    <h2 class="text-4xl font-black tracking-tighter text-on-background">Visi Proyek</h2>
                    <div class="h-1 flex-grow bg-surface-container-high rounded-full"></div>
                </div>
                <p class="text-xl text-secondary leading-relaxed max-w-3xl">
                    Asoka Palace merepresentasikan puncak hunian tropis kontemporer di Deli Serdang. Dirancang oleh arsitek pemenang penghargaan, kompleks ini memadukan aliran ruang indoor-outdoor yang mulus dengan material berkelanjutan, menawarkan perlindungan yang bernafas bersama lingkungannya.
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 py-8 border-y border-outline-variant/15">
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-widest text-secondary mb-1">Luas Tanah</span>
                        <span class="text-2xl font-black text-primary">450 m²</span>
                    </div>
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-widest text-secondary mb-1">Luas Bangunan</span>
                        <span class="text-2xl font-black text-primary">320 m²</span>
                    </div>
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-widest text-secondary mb-1">Kamar Tidur</span>
                        <span class="text-2xl font-black text-primary">4+1</span>
                    </div>
                    <div>
                        <span class="block text-xs font-bold uppercase tracking-widest text-secondary mb-1">Kamar Mandi</span>
                        <span class="text-2xl font-black text-primary">3+1</span>
                    </div>
                </div>
            </div>

            <div class="bg-surface-container-low -mx-8 px-8 py-20 rounded-full" id="amenities">
                <h3 class="text-3xl font-black tracking-tighter mb-12">Fasilitas Pilihan</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">security</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1 text-on-surface">Keamanan Elite</h4>
                            <p class="text-sm text-secondary">Akses biometrik 24/7 dan layanan patroli profesional.</p>
                        </div>
                    </div>
                    <!-- Other amenities here -->
                    <div class="flex gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">pool</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1 text-on-surface">Infinity Lounge</h4>
                            <p class="text-sm text-secondary">Kolam air asin dengan pemandangan lembah yang panorama.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 shrink-0 rounded-full bg-surface-container flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">smart_toy</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg mb-1 text-on-surface">Smart Home</h4>
                            <p class="text-sm text-secondary">Sistem IoT terintegrasi penuh.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="floor-plans">
                <h3 class="text-3xl font-black tracking-tighter mb-8 bg-surface text-on-surface">Denah Bangunan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-surface-container-lowest p-8 rounded-full border border-outline-variant/10 group cursor-zoom-in">
                        <span class="text-xs font-bold uppercase tracking-widest text-secondary mb-4 block">Lantai 01: Ruang Sosial</span>
                        <img alt="Floor plan level 1" class="w-full aspect-square object-contain transition-transform group-hover:scale-105" data-alt="Technical architectural blueprint floor plan showing living room, kitchen, and guest area with precise measurements" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3LiI8CDbEJwWUCNzTDGH8DC_mPqtMuaDwLJ8MZ0tpxbBiKCucg5Yi9ekBg3movjBHRHIR1M46KCjzhE8D1ySe54zWP5sh30QHmdK-pvhvszOJ8QVwbnQRxKOX3bLppV0Z-xuQFJ_RgyJzo4tZBpbGuwQK3Q-7kN8tve4rG27uCEBBKg_qhIqoANMi0wATx39n4zvPbGKU9nun5F0SBxGF3OnSY9n8jFaso3OMsALsZzY4JdEKyYn3YfUUiXsM8zWeE0Fd_QhfjCc"/>
                    </div>
                    <div class="bg-surface-container-lowest p-8 rounded-full border border-outline-variant/10 group cursor-zoom-in">
                        <span class="text-xs font-bold uppercase tracking-widest text-secondary mb-4 block">Lantai 02: Ruang Pribadi</span>
                        <img alt="Floor plan level 2" class="w-full aspect-square object-contain transition-transform group-hover:scale-105" data-alt="Technical architectural blueprint floor plan showing master bedroom suite and luxury bathroom layout" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYUXWa89tLQhMD9rN-of6uL7sJpij0vhk67jXu3_7hJhMe2ko0mmRMYiu1DgwBYi-TLSg2mzytGuxC5WfLog64lPuJznY-UAwqgHY1-cXjFzQ6Qokr2DRD1RQBjFWNaCLWHXodaeLT0jqUi0awJIecXSaObVJB45MpYixdrVspkvlKZc2uGFSBr9Aht6N4swmviZv3qXVd5ykTwDwFXtJ7lbfWjr4_Y9-4DbhR_FfbBHveUdg-PRKVhn5FpzKgrLFq1PYQ6RQRKAE"/>
                    </div>
                </div>
            </div>

            <div class="space-y-8" id="location">
                <h3 class="text-3xl font-black tracking-tighter">Lokasi Strategis</h3>
                <div class="h-96 w-full rounded-full overflow-hidden relative">
                    <img alt="Map of Asoka Palace Area" class="w-full h-full object-cover" data-alt="A clean, minimalist topographical map highlighting luxury estate plots and nearby green belts in Sentul City" data-location="Sentul City" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6kLEyv5QnGYn9FPY403NjgCBSXBTPISDTsQlFZD7bXwQ1tBYrb9d7yi1gSXy6oko6CFF5YvZmWkNc6y9CtsxmDrTvNR7MsOXTUbCwjJtyNyK3W_x2itoGKLZiJ0rqjhUH0JVKswjZzNOkBgsSKENawot0AnvoPAI9a8uz7u275AQRsx9YyNV3SNyLJPwFRnTPD9Od1_soDhUzJX-Mh2SDedIu2QkykO5TLD08fR0V07c8Y4QVTZfGM10vp63QGCzEPmMD7pbqtUQ"/>
                    <div class="absolute inset-0 bg-primary/10 pointer-events-none"></div>
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-on-primary shadow-2xl animate-pulse">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <aside class="md:col-span-4">
            <div class="sticky top-32 space-y-8">
                <div class="bg-surface-container-lowest p-8 rounded-full shadow-2xl shadow-on-surface/5 border border-outline-variant/5">
                    <div class="mb-8">
                        <span class="text-xs font-bold uppercase tracking-widest text-secondary block mb-1">Mulai Dari</span>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-on-background">Rp 8.5 M</span>
                            <span class="text-secondary-container bg-primary text-[10px] px-2 py-0.5 rounded-full font-bold uppercase">Siap Huni</span>
                        </div>
                    </div>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-secondary mb-2">Nama Lengkap</label>
                            <input class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-0 py-3 text-on-background placeholder:text-outline-variant" placeholder="Contoh: John Doe" type="text"/>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-secondary mb-2">Alamat Email</label>
                            <input class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-0 py-3 text-on-background placeholder:text-outline-variant" placeholder="email@contoh.com" type="email"/>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-widest text-secondary mb-2">Jenis Pertanyaan</label>
                            <select class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-0 py-3 text-on-background">
                                <option>Jadwalkan Kunjungan Pribadi</option>
                                <option>Unduh Brosur</option>
                                <option>Konsultasi Investasi</option>
                            </select>
                        </div>
                        <button class="w-full bg-gradient-to-br from-primary to-primary-container text-on-primary py-5 rounded-md font-black uppercase tracking-widest text-sm hover:scale-[1.02] transition-transform active:scale-95 duration-200 shadow-lg shadow-primary/20">
                            Kirim Pertanyaan
                        </button>
                    </form>
                    
                    <div class="mt-8 pt-8 border-t border-outline-variant/10">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                <img alt="Agent" class="w-full h-full object-cover" data-alt="Professional real estate agent portrait with friendly expression and modern business attire" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhx8Wf-wJzn5nfdOs21vjKMbecPk6KswLe8JTu6jLS4vgHAbB3I5aqS4r1tmMdGdiNPyc2wH1QT12SWwx_rjIwpPwddLTIJnRKIqZ9zvRPSGQjMwk9x36gDGJN8JdEfKdoflKen69sQDSjAj0KCo9EKDxrsmM1bi5Kyj72M04JacWtf31kqbD9NwdK_IVwB1OPTnctsA6XE5FJ62eywqtjjtZUo1IZPOZoeL2P7RGizxmsBnC5yjiEpto9zI2V62CQlwNgxTd-5mM"/>
                            </div>
                            <div>
                                <h5 class="font-bold text-on-surface">Adrian Sterling</h5>
                                <p class="text-xs text-secondary">Senior Portfolio Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </section>
</main>
@endsection
