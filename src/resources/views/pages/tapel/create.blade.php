@extends('layouts.main')

@section('title', 'Tambah tapel')

@section('content')
    <form method="POST" action="{{ route('tapel.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4 w-96">
                <span class="font-semibold">Tahun pelajaran</span>
                <input type="text" id="tahun_pelajaran" name="tahun_pelajaran" class="input input-bordered w-full mt-2">
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('angsuran.index') }}" class="btn btn-error text-white" type="reset">
                Batal
            </a>
            <button class="btn btn-neutral text-white" type="submit">
                Tambah
            </button>
        </div>
    </form>
@endsection
