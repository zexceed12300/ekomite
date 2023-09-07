@extends('layouts.main')

@section('title', 'Profil bendahara')

@section('content')
    <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="grid grid-cols-1 md:w-1/2 gap-4">
            <div class="mb-4">
                <span class="font-semibold">Name</span>
                <input type="text" id="name" name="name" value="{{ $user->name }}"
                    class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-16">
                <span class="font-semibold">Email</span>
                <input type="text" id="email" name="email" value="{{ $user->email }}"
                    class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Reset password ? (Kosongkan jika tidak)</span>
                <input type="password" id="password" name="password" class="input input-bordered w-full mt-2">
            </div>
            <div class="mt-3">
                <a href="{{ route('siswa.index') }}" class="btn btn-error text-white" type="reset">
                    Batal
                </a>
                <button class="btn btn-warning text-white" type="submit">
                    Ubah
                </button>
            </div>
    </form>
@endsection
