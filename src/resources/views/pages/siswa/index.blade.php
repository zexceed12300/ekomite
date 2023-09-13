@extends('layouts.main')

@section('title', 'Data Siswa')

@section('content')
    <div class="flex flex-col md:flex-row md:justify-between justify-end mb-4 gap-4">
        <form method="GET" action="{{ route('siswa.index') }}">
            <div class="flex gap-3">
                <form method="GET" action="{{ route('pembayaran.index') }}">
                    <input class="input input-bordered focus:outline-none rounded-none w-full" type="text" name="search"
                        id="search" placeholder="Cari nisn, nama, kelas">
                    <button class="btn btn-neutral text-white px-12">
                        <span>Cari</span>
                    </button>
                </form>
            </div>
        </form>
        <div>
            <a href="{{ route('siswa.create') }}" class="btn btn-neutral text-white px-12">Tambah</a>
        </div>
    </div>
    <div class="overflow-x-auto w-full border">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr class="bg-base-200">
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jenis kelamin</th>
                    <th>Sumbangan/bulan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->kelas }}</td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>
                            <div class="badge badge-warning text-white font-bold">Rp. {{ $siswa->sumbangan }}</div>
                        </td>
                        <td class="flex gap-2">
                            @can('manage siswa')
                                <a href="{{ route('siswa.edit', $siswa) }}"
                                    class="btn btn-sm btn-warning text-white font-bold">Ubah</a>
                                <form method="POST" action="{{ route('siswa.destroy', $siswa) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-sm btn-error text-white font-bold">Hapus</button>
                                </form>
                            @endcan
                            <a href="{{ route('pembayaran.index', ['nisn' => $siswa->nisn]) }}"
                                class="btn btn-sm btn-primary text-white font-bold">Bayar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (session()->has('success'))
        <label class="swap">
            <input type="checkbox">
            <div class="z-20 swap-off toast toast-top toast-center">
                <div class="alert bg-primary text-white font-bold">
                    <span>{{ session()->get('success') }}</span>
                </div>
            </div>
            <div class="swap-on"></div>
        </label>
    @endif
    @if (session()->has('warning'))
        <label class="swap">
            <input type="checkbox">
            <div class="z-20 swap-off toast toast-top toast-center">
                <div class="alert bg-warning text-white font-bold">
                    <span>{{ session()->get('warning') }}</span>
                </div>
            </div>
            <div class="swap-on"></div>
        </label>
    @endif
	@if (session()->has('error'))
        <label class="swap">
            <input type="checkbox">
            <div class="z-20 swap-off toast toast-top toast-center">
                <div class="alert bg-error text-white font-bold">
                    <span>{{ session()->get('error') }}</span>
                </div>
            </div>
            <div class="swap-on"></div>
        </label>
    @endif
@endsection
