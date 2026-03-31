<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource for Admin.
     */
    public function index()
    {
        $properties = Property::latest()->paginate(10);
        return view('admin.properties', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'nullable|numeric',
        ]);

        $data = $request->except(['_token', 'amenities', 'is_featured']);
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        
        $data['amenities'] = $request->input('amenities', []); 
        $data['is_featured'] = $request->has('is_featured');
        
        // Placeholder images
        $data['main_image'] = 'https://lh3.googleusercontent.com/aida-public/AB6AXuAXreprjmU2NUd5zMGXC9fxLRIGHUnftGnDA-jw2jFcZEwH56jMXAmoqFg4KcFBzR0XSJ2JuYLoJcxuI72XKq7SzlaDpyP7r4WbHrmv3Jc1qXJ-k8aWh6LjkhqKZoEXUcSQUChEpzIFLoGxqS9HLigYqh3JAE1k6PFYJTmCzyFO1ZhjAv8wdnalWMnk-TSBdku4ewcIjDA-r7XHNM4XRJbmS2hpa2KsYU0CbxR0VZavTViqI4cJC1fix8a4O5H_hg9d4OevPIbTLHs';
        
        Property::create($data);

        return redirect('/admin/properties')->with('success', 'Properti berhasil ditambahkan!');
    }

    /**
     * Display the specified resource on Frontend.
     */
    public function show($slug)
    {
        $property = Property::where('slug', $slug)->firstOrFail();
        return view('properties.show', compact('property'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return back()->with('success', 'Properti berhasil dihapus!');
    }
}
