@extends('layouts.main')

@section('title', 'Tambah angsuran')

@section('content')
    <form method="POST" action="{{ route('angsuran.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-4">
            <div class="mb-4 md:w-96">
                <span class="font-semibold">Keterangan</span>
                <input type="text" id="ket" name="ket" class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4 md:w-96">
                <div class="font-semibold">Komite</div>
                <label for="nisn">
                    <span class="label-text-alt text-error"></span>
                </label>
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
