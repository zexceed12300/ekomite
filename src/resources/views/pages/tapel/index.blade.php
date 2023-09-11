@extends('layouts.main')

@section('title', 'Tahun Pelajaran')

@section('content')
	<div class="flex justify-end items-center mb-6">
		<div>
			<a href="{{ route("tapel.create") }}" class="btn btn-neutral text-white px-12">Tambah</a>
		</div>
	</div>
	<div class="overflow-x-auto w-full border">
		<table class="table table-zebra">
			<!-- head -->
			<thead>
				<tr class="bg-base-200">
					<th>Tahun pelajaran</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				@foreach ($tapels as $tapel)
				<tr>
					<td class="font-bold">{{ $tapel->tahun_pelajaran }}</td>
					<td>
						<form method="POST" action="{{ route("tapel.destroy", $tapel) }}">
							@csrf
							@method("DELETE")
							<button type="submit" class="btn btn-sm btn-error text-white">Hapus</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
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