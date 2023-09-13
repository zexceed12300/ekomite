@extends('layouts.main')

@section('title', 'Pembayaran')

@section('content')
    <form method="GET" action="{{ route('pembayaran.index') }}" class="flex justify-center items-center gap-3 mb-16">
        <div class="flex md:w-2/5 gap-3">
            <input class="input input-bordered focus:outline-none rounded-none w-full" type="text" name="nisn"
                id="nisn" placeholder="Cari nisn" value="{{ $nisn }}">
            <select class="select select-bordered rounded-none focus:outline-none w-full" name="tapel_id">
                @foreach ($tapels as $tapel)
                    <option value="{{ $tapel->id }}" {{ $tapel->id == $tapel_id ? 'selected' : '' }}>
                        {{ $tapel->tahun_pelajaran }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>

    @if ($siswas != null)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <div class="flex justify-center items-start">
                <div class="flex flex-col gap-2 items-center p-6 bg-base-200 w-96 ">
                    <svg class="h-12 w-12 mb-6" xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                    <span class="font-bold text-2xl">{{ $siswas->nama }}</span>
                    <span class="font-semibold text-lg">{{ $siswas->nisn }}</span>
                    <span class="font-semibold text-lg">{{ $siswas->kelas }}</span>
                </div>
            </div>

            <div class="overflow-x-auto w-full border">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr class="bg-base-200">
                            <th>Angsuran</th>
                            <th>Tanggal lunas</th>
                            <th>Status</th>
                            <th>Besar sumbangan</th>
                            <th>Ttd Bendahara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($angsurans as $angsuran)
                            <tr>
                                <td>{{ $angsuran->ket }}</th>
                                    @if ($siswas->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $angsuran->id)->first())
                                <td>
                                    {{ $siswas->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $angsuran->id)->first()->tanggal }}
                                </td>
                                <td>
                                    <form method="POST"
                                        action="{{ route('pembayaran.destroy',$siswas->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $angsuran->id)->first()) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-primary text-white">Lunas</button>
                                    </form>
                                </td>
                                <td>
                                    <div class="badge badge-warning text-white font-bold">Rp.
                                        {{ $siswas->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $angsuran->id)->first()->sumbangan }}
                                    </div>
                                </td>
                                <td>
                                    {{ $siswas->pembayaran->where('tapel_id', $tapel_id)->where('angsuran_id', $angsuran->id)->first()->user->name }}
                                </td>
                            @else
                                <td></td>
                                <td>
                                    <form method="post" action="{{ route('pembayaran.store') }}">
                                        @csrf
                                        <input type="hidden" name="nisn" value="{{ $nisn }}">
                                        <input type="hidden" name="siswa_id" value="{{ $siswas->id }}">
                                        <input type="hidden" name="angsuran_id" value="{{ $angsuran->id }}">
                                        <input type="hidden" name="tapel_id" value="{{ $tapel_id }}">
                                        <button type="submit" class="btn btn-sm btn-error text-white">Belum lunas</button>
                                    </form>
                                </td>
                                <td></td>
                                <td></td>
                        @endif
                        </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    <dialog id="btnFilter" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </div>
        </form>
    </dialog>
@else
    <div class="flex justify-center">
        <div class="alert flex flex-col max-w-xl text-center p-12 text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-info shrink-0 w-12 h-12">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-semibold">Mohon melakukan pencarian siswa terlebih dahulu</span>
        </div>
    </div>
    @endif
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
