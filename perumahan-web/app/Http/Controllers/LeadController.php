<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::latest()->paginate(10);
        return view('admin.leads', compact('leads'));
    }

    /**
     * Store a newly created resource in storage (From Frontend Contact Form)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Lead::create($request->all());

        return back()->with('success', 'Pesan Anda telah berhasil dikirim, tim kami akan segera membalas!');
    }
}
