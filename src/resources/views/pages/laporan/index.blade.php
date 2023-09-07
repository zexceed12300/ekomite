@extends('layouts.main')

@section('title', 'Laporan')

@section('content')
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 mb-4">
        <form class="flex gap-3">
            <input class="input input-bordered focus:outline-none rounded-none w-full" type="text" name="search"
                id="search" placeholder="Cari nama, nisn, kelas" value="{{ request('search') }}">
            <select class="select select-bordered rounded-none focus:outline-none w-full" name="tapel_id">
                @foreach ($tapels as $tapel)
                    <option value="{{ $tapel->id }}" {{ $tapel->id == $tapel_id ? 'selected' : '' }}>
                        {{ $tapel->tahun_pelajaran }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-neutral text-white px-12">
                <span>Filter</span>
            </button>
        </form>
        <form method="get" action="{{ route('laporan.download') }}" class="flex">
            @csrf
            <input type="hidden" name="search" value="{{ request('search') }}">
            <input type="hidden" name="tapel_id" value="{{ request('tapel_id') }}">
            <button type="submit" class="btn btn-primary text-white">
                <span>Download Data</span>
            </button>
        </form>
    </div>
    <div class="overflow-x-auto w-full border">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr class="bg-base-200">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Angsuran</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($siswas as $siswa)
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>
                            @foreach ($angsurans as $angsuran)
                                @if ($siswa->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $angsuran->id)->first())
                                    <div class="badge badge-primary text-white">{{ $loop->index + 1 }}</div>
                                @else
                                    <div class="badge badge-error text-white">{{ $loop->index + 1 }}</div>
                                @endif
                            @endforeach

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
