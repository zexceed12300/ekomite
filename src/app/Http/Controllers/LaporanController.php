<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nisn = $request->nisn;
        $tapel_id = $request->tapel_id;

        $laporans = [];

        $pembayarans = Pembayaran::all();
        $siswas = Siswa::filter(request(['search']))->get();

        $tapels = Tapel::all();
        $angsurans = Angsuran::all();

        // foreach data in siswas to laporans 
        foreach ($siswas as $siswa) {

            $angsuran = [];
            
            foreach ($angsurans as $item) {
                $pembayaran = $siswa->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $item->id)->first();
                if ($pembayaran) {
                    $angsuran[] = [
                        'angsuran' => $item->ket,
                        'tanggal' => $pembayaran->tanggal,
                    ];
                } else {
                    $angsuran[] = [
                        'angsuran' => $item->ket,
                        'tanggal' => null,
                    ];
                }
            }

            $laporans[] = [
                'nisn' => $siswa->nisn,
                'nama' => $siswa->nama,
                'tapel' => $siswa->nama,
                'angsuran' => $angsuran,
            ];
        }

        return view('pages.laporan.index', compact('pembayarans', 'siswas', 'angsurans', 'tapels', 'nisn', 'tapel_id'));
    }

    public function download(Request $request) {

        $nisn = $request->nisn;
        $tapel_id = $request->tapel_id;

        $laporans = [];

        $pembayarans = Pembayaran::all();
        $siswas = Siswa::filter(request(['search']))->get();
        $tapels = Tapel::all();
        $angsurans = Angsuran::all();

        // foreach data in siswas to laporans 
        foreach ($siswas as $siswa) {

            $angsuran = [];
            
            foreach ($angsurans as $item) {
                $pembayaran = $siswa->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $item->id)->first();
                if ($pembayaran) {
                    $angsuran[] = [
                        'ket' => $item->ket,
                        'tanggal' => $pembayaran->tanggal,
                    ];
                } else {
                    $angsuran[] = [
                        'ket' => $item->ket,
                        'tanggal' => null,
                    ];
                }
            }

            $laporans[] = [
                'nisn' => $siswa->nisn,
                'nama' => $siswa->nama,
                'angsuran' => $angsuran,
            ];

        }

        $filename = "laporan.csv";

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $handle = fopen('php://output', 'w');
        
        $date_header = ['nisn', 'nama'];
        foreach ($angsurans as $angsuran) {
            $date_header[] = $angsuran['ket'];
        }

        fputcsv($handle, $date_header);

        // fputcsv laporans to csv file. and angsuran is dynamic
        foreach ($laporans as $laporan) {
            $row = [
                $laporan['nisn'],
                $laporan['nama'],
            ];
            foreach ($laporan['angsuran'] as $angsuran) {
                $lunas = $angsuran['tanggal'];
                if ($lunas) {
                    $row[] = 'Lunas';
                } else {
                    $row[] = 'Belum';
                }
            }
            fputcsv($handle, $row);
        }

        fclose($handle);

        return Response::make('', 200, $headers);

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
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
