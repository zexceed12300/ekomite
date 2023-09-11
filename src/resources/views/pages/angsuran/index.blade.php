@extends('layouts.main')

@section('title', 'Angsuran')

@section('content')
	<div class="flex justify-end items-center mb-6">
		<div class="flex justify-between items-center gap-3">
			<a href="{{ route("angsuran.create") }}" class="btn btn-neutral text-white px-12">Tambah</a>
		</div>
	</div>
	<div class="overflow-x-auto w-full border">
		<table class="table table-zebra">
			<!-- head -->
			<thead>
				<tr class="bg-base-200">
					<th>Angsuran</th>
					<th>Hapus</th>
				</tr>
			</thead>
			<tbody>
				<!-- row 1 -->
				@foreach ($angsurans as $angsuran)
				<tr>
					<td class="font-bold">{{ $angsuran->ket }}</td>
					<td>
						<form method="POST" action="{{ route("angsuran.destroy", $angsuran) }}">
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