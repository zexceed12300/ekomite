<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use Illuminate\Http\Request;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tapels = Tapel::all();
        return view('pages.tapel.index', compact('tapels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tahun_pelajaran' => 'required',
            
        ]);
        
        Tapel::create($validateData);
        return redirect()->route('tapel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tapel $tapel)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tapel $tapel)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tapel $tapel)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tapel $tapel)
    {
        $tapel->delete();

        return redirect()->route('tapel.index');
    }
}
