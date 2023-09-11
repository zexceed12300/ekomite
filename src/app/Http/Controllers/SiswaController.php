<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswas = Siswa::latest()->filter(request(['search']))->get();

        return view('pages.siswa.index', compact('siswas'));
    }

    public function create() 
    {
        return view('pages.siswa.create');
    }

    public function edit(Request $request, Siswa $siswa)
    {
        return view('pages.siswa.edit', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nisn' => 'required|string|unique:siswas',
            'nama' => 'required|string',
            'sumbangan' => 'required|numeric',
            'alamat' => 'string|nullable',
            'tanggal_lahir' => 'date|nullable',
            'wali_murid' => 'string|nullable',
            'kelas' => 'string|nullable',
            'jenis_kelamin' => 'string|nullable',
            'keterampilan' => 'string|nullable',
            'golongan_darah' => 'string|nullable',
            'agama' => 'string|nullable',
        ]);

        Siswa::create($validateData);
        return redirect()->route('siswa.index')->with('success', "Data {$validateData['nama']} berhasil ditambahkan");

    }

    public function update(Request $request, Siswa $siswa) 
    {
        $validateData = $request->validate([
            'nisn' => 'required|string',
            'nama' => 'required|string',
            'sumbangan' => 'required|numeric',
            'alamat' => 'string|nullable',
            'tanggal_lahir' => 'date|nullable',
            'wali_murid' => 'string|nullable',
            'kelas' => 'string|nullable',
            'jenis_kelamin' => 'string|nullable',
            'keterampilan' => 'string|nullable',
            'golongan_darah' => 'string|nullable',
            'agama' => 'string|nullable',
        ]);

        $siswa->update($validateData);
        return redirect()->route('siswa.index')->with('warning', "Data {$validateData['nama']} berhasil diubah");
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index', ['search' => request('search')]);
    }
}
