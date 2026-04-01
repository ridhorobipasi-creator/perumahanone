<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

// ─── Demo property data ────────────────────────────────────────────────────────
function demoProperties(): array {
    return [
        (object)['id'=>1,'title'=>'Sicoland Green Residences','slug'=>'sicoland-green','city'=>'Deli Serdang','price'=>850000000,'bedrooms'=>3,'bathrooms'=>2,'build_size'=>120,'status'=>'Tersedia','is_featured'=>true,'main_image'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0'],
        (object)['id'=>2,'title'=>'Puri Hamparan Perak','slug'=>'puri-hamparan-perak','city'=>'Binjai','price'=>425000000,'bedrooms'=>3,'bathrooms'=>2,'build_size'=>90,'status'=>'Terbooking','is_featured'=>false,'main_image'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A'],
        (object)['id'=>3,'title'=>'Bintang Emerald Residence','slug'=>'bintang-emerald','city'=>'Johor, Medan','price'=>1200000000,'bedrooms'=>4,'bathrooms'=>3,'build_size'=>180,'status'=>'Tersedia','is_featured'=>true,'main_image'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuAJqsFnw1o5HUTEoVCLXSKyFHkN0dJKQXkdYszXNRnWpVluexQJuirV9Hv_eiiGJsP0SoFTF-7Pk4yYXOj4QXVRJKF9A3AtUoVOu1Ep12bLtOb2Z7zOtXwzvu5y912W8nIpd5nsZynaj8v8v-Q5VfPp8c-LP8fj0vl4AtZYnN2GfmDNrj_BNUiNK5KwMwy_TclJf5f-4m36PsUUpglAW64f4jthrVx1qqIbnYyi7LsfIYg9LYkqV4TD8EOVyE69ns2hi11UXJJBl9c'],
        (object)['id'=>4,'title'=>'Ruko Grand Binjai Kota','slug'=>'ruko-grand-binjai','city'=>'Binjai','price'=>650000000,'bedrooms'=>0,'bathrooms'=>2,'build_size'=>200,'status'=>'Tersedia','is_featured'=>false,'main_image'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0'],
        (object)['id'=>5,'title'=>'Kavling Langkat Premium','slug'=>'kavling-langkat','city'=>'Langkat','price'=>220000000,'bedrooms'=>0,'bathrooms'=>0,'build_size'=>150,'status'=>'Tersedia','is_featured'=>false,'main_image'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDyB_kFlUTR5Dl_XyEl9nQU-Tc5LaeUwqb8aetADaacVUVrXci2i_b30akqRD6njTBIEGN33B0r31QfJ_McWNaO1BEuCYnlpmgstT-NjVq_ZL_-7VaWwwZwwNE5sUHjmX-koMXQXjYWnzSYEfJNEU7GG4fp_Cc5WYUM2G1tDZnsGQaUI_CZEYq_fzhjngD8mh-c8oW9BlKckwzICaCyiqZx0bPsiJV0mDSES_Fh1UGXB8a9uKeXIqm0PT43rxKXRgVTfWC0fNP0Z_A'],
        (object)['id'=>6,'title'=>'Cluster Mawar Putih','slug'=>'cluster-mawar-putih','city'=>'Deli Serdang','price'=>560000000,'bedrooms'=>3,'bathrooms'=>2,'build_size'=>100,'status'=>'Tersedia','is_featured'=>false,'main_image'=>'https://lh3.googleusercontent.com/aida-public/AB6AXuDcqss5qvYFCb9Ix8globSWVx2UuuOzKerDdSP4jScricWyGU4CHEiLCZBJlanIE29x2DuiGdz6WHE-pdab72Y8yS35Zc2iZxGAwdjAvyeIlzmZOB3W0xjOKKzRAERXqo6u9uM17w3GmX0xhaskZfjs4GMy3TZKnxS5NHMuWhQ9_axzXx7_tz47tDXtQDYqBD07WGSSbKoKo3df3aFOUOdDafVj76EGVKitGovbbFWU-p-ZHWPmm9GkiofxEaZrveiuz5dPcJRkvV0'],
    ];
}

// ─── Frontend Public Routes ────────────────────────────────────────────────────
Route::get('/', function () {
    $featured = collect(demoProperties())->where('is_featured', true)->take(3);
    return view('home', ['featured' => $featured]);
});

Route::get('/properties', function () {
    $data   = demoProperties();
    $page   = request()->get('page', 1);
    $perPage = 6;
    $slice  = array_slice($data, ($page - 1) * $perPage, $perPage);
    $pag    = new LengthAwarePaginator($slice, count($data), $perPage, $page, [
        'path' => request()->url(), 'query' => request()->query()
    ]);
    return view('properties.index', ['properties' => $pag]);
});

Route::get('/properties/{slug}', function ($slug) {
    $prop = collect(demoProperties())->firstWhere('slug', $slug)
        ?? collect(demoProperties())->first();
    return view('properties.show', compact('prop'));
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function () {
    return back()->with('success', 'Pesan Anda berhasil terkirim! Tim kami akan segera menghubungi Anda.');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/promo', function () {
    return view('promo');
});

Route::get('/articles', function () {
    return view('articles');
});

// ─── Admin Panel Routes ────────────────────────────────────────────────────────
Route::prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'));
    Route::get('/properties', fn() => view('admin.properties'));
    Route::get('/properties/create', fn() => view('admin.properties_create'));
    Route::post('/properties', fn() => redirect('/admin/properties')->with('success', 'Properti berhasil ditambahkan!'));
    Route::delete('/properties/{id}', fn() => back()->with('success', 'Properti berhasil dihapus!'));
    Route::get('/leads', fn() => view('admin.leads'));
    Route::get('/settings', fn() => view('admin.settings'));
});
