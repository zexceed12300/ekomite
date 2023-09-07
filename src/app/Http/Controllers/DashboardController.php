<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function convertMonth($inputMonth) {
        $conversionPattern = array(
            1 => 7,
            2 => 8,
            3 => 9,
            4 => 10,
            5 => 11,
            6 => 12,
            7 => 1,
            8 => 2,
            9 => 3,
            10 => 4,
            11 => 5,
            12 => 6
        );

        if (isset($conversionPattern[$inputMonth])) {
            return $conversionPattern[$inputMonth];
        } else {
            return false; // Invalid input month
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswas = Siswa::all();
        // pembayarans all limit 10 latest
        $pembayarans = Pembayaran::latest()->limit(10)->get();
        $tapels = Tapel::all();
        $angsurans = Angsuran::all();

        $nisn = $request->nisn;
        $tapel_id = $request->tapel_id;

        // count siswa
        $siswaCount = Siswa::count();
        $siswaLunas = 0;
        $siswaBelumLunas = 0;

        if ($siswaCount > 0) {
            // count siswa lunas
            $angsuranid = $angsurans->find($this->convertMonth(intval(date('m'))))->id;
            $tapelid = Tapel::where('tahun_pelajaran', 'like', '%20'.date('y').'%')->value('id');
            $siswaLunas = Pembayaran::where('angsuran_id', $angsuranid)->where('tapel_id', $tapelid)->count();
            $siswaBelumLunas = $siswaCount - $siswaLunas;
        }

        // siswaCount - pemabayaranLunas

        return view('pages.dashboard', compact('pembayarans', 'siswas', 'siswaCount', 'siswaLunas', 'siswaBelumLunas'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
