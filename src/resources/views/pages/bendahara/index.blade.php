@extends('layouts.main')

@section('title', 'Kelola bendahara')

@section('content')
    <div class="flex flex-col md:flex-row justify-end mb-12 gap-4">
        <div>
            <a href="{{ route('bendahara.create') }}" class="btn btn-neutral text-white px-12">Tambah</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4">
        @foreach ($users as $user)
            <div class="col-span-1 justify-self-center">
                <div class="card w-80 bg-base-200">
                    <figure class="px-10 pt-10">
                        {{-- <img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" class="rounded-xl" /> --}}
                        <i class="fa fa-user text-5xl"></i>
                    </figure>
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">{{ $user->name }}</h2>
                        <div class="card-actions justify-end mb-3">
                            @foreach ($user->getRoleNames() as $role)
                                <div class="badge badge-outline">{{ $role }}</div>
                            @endforeach
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('bendahara.edit', $user->id) }}"
                                class="btn btn-sm btn-warning text-white font-bold">Ubah</a>
                            <form method="POST" action="{{ route('bendahara.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error text-white font-bold">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
