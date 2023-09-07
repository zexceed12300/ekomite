<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswas = Siswa::where('nisn', $request->nisn)->first();
        $tapels = Tapel::all();
        $angsurans = Angsuran::all();
        
        $nisn = $request->nisn;
        $tapel_id = $request->tapel_id;
        
        // pembayarans left join angsurans on pembayarans.angsuran_id = angsurans.id right join tapels on pembayarans.tapel_id = tapels.id where pembayarans.siswa_id = 1 and pembayarans.tapel_id = 1
        // $pembayarans = Pembayaran::select('pembayarans.*', 'angsurans.*')
        //     ->rightJoin('angsurans', 'pembayarans.angsuran_id', '=', 'angsurans.id')
        //     ->get();

        return view('pages.pembayaran.index', compact('siswas', 'angsurans', 'tapels', 'tapel_id', 'nisn'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'siswa_id' => 'required|integer',
            'tapel_id' => 'required|integer',
            'angsuran_id' => 'required|integer',
        ]);

        $sumbangan = Siswa::all()->find($validateData['siswa_id'])->sumbangan;

        Pembayaran::create([
            'siswa_id' => $validateData['siswa_id'],
            'angsuran_id' => $validateData['angsuran_id'],
            'tapel_id' => $validateData['tapel_id'],
            'sumbangan' => $sumbangan,
            'tanggal' => now(),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('pembayaran.index', ['nisn' => $request['nisn'], 'tapel_id' => $validateData['tapel_id']])->with('success', 'Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayaran.index', ['nisn' => $pembayaran->siswa->nisn, 'tapel_id' => $pembayaran->tapel->id])->with('success', 'Pembayaran berhasil dihapus');
    }
}
