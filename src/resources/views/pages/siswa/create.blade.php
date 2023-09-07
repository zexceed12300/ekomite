@extends('layouts.main')

@section('title', 'Tambah siswa')

@section('content')
    <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <span class="font-semibold">Nisn</span>
                <input type="text" id="nisn" name="nisn" class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Nama lengkap</span>
                <input type="text" id="nama" name="nama" class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4">
                <div class="font-semibold">Jenis kelamin</div>
                <select class="select select-bordered w-full mt-2" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki">
                        Laki-laki
                    </option>
                    <option value="Perempuan">
                        Perempuan
                    </option>
                </select>
                <label for="nisn">
                    <span class="label-text-alt text-error"></span>
                </label>
            </div>
            <div class="mb-4">
                <span class="font-semibold">Alamat</span>
                <textarea type="text" id="alamat" name="alamat" class="textarea textarea-bordered w-full mt-2" type="text"></textarea>
            </div>
            <div class="mb-4">
                <span class="font-semibold">Tanggal Lahir</span>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input textarea-bordered w-full mt-2"
                    type="text">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Wali Murid</span>
                <input type="text" id="wali_murid" name="wali_murid" class="input textarea-bordered w-full mt-2"
                    type="text">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Kelas</span>
                <input type="text" id="kelas" name="kelas" class="input textarea-bordered w-full mt-2"
                    type="text">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Keterampilan</span>
                <input type="text" id="keterampilan" name="keterampilan" class="input textarea-bordered w-full mt-2"
                    type="text">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Golongan Darah</span>
                <input type="text" id="golongan_darah" name="golongan_darah" class="input textarea-bordered w-full mt-2"
                    type="text">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Agama</span>
                <input type="text" id="agama" name="agama" class="input textarea-bordered w-full mt-2"
                    type="text">
            </div>
            <div class="mb-4">
                <div class="font-semibold">Besar sumbangan</div>
                <select class="select select-bordered w-full mt-2" id="sumbangan" name="sumbangan">
                    <option value="120000">
                        Rp. 120000
                    </option>
                    <option value="60000">
                        Rp. 60000
                    </option>
                </select>
                <label for="nisn">
                    <span class="label-text-alt text-error"></span>
                </label>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('siswa.index') }}" class="btn btn-error text-white" type="reset">
                Batal
            </a>
            <button class="btn btn-success text-white" type="submit">
                Tambah
            </button>
        </div>
    </form>
@endsection
