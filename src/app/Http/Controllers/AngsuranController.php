<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Tapel;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $angsurans = Angsuran::all();
        return view('pages.angsuran.index', compact('angsurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tapels = Tapel::all();
        return view('pages.angsuran.create', compact('tapels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'ket' => 'required|string',
        ]);

        Angsuran::create($validateData);
        return redirect()->route('angsuran.index')->with('success', "Angsuran {$validateData['ket']} berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Angsuran $angsuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angsuran $angsuran)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angsuran $angsuran)
    {
        $angsuran->delete();

        return redirect()->route('angsuran.index')->with('error', "Angsuran {$angsuran->ket} berhasil dihapus");
    }
}
