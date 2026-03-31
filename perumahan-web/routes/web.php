<?php

use Illuminate\Support\Facades\Route;

// ─── Frontend Public Routes (Static - No DB) ───────────────────────────────────
Route::get('/', function () {
    return view('home');
});

Route::get('/properties', function () {
    return view('properties.index');
});

Route::get('/contact', function () {
    return view('contact');
});

// ─── Admin Panel Routes (Static - No DB) ──────────────────────────────────────
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/properties', function () {
        return view('admin.properties', ['properties' => new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10)]);
    });

    Route::get('/properties/create', function () {
        return view('admin.properties_create');
    });

    Route::post('/properties', function () {
        return redirect('/admin/properties')->with('success', 'Properti berhasil ditambahkan! (Mode Demo)');
    });

    Route::delete('/properties/{id}', function () {
        return back()->with('success', 'Properti berhasil dihapus! (Mode Demo)');
    });

    Route::get('/leads', function () {
        return view('admin.leads');
    });

    Route::get('/settings', function () {
        return view('admin.settings');
    });
});
