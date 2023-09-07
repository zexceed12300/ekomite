@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="stats rounded-none border">
                    <div class="stat">
                        <div>Total sumbangan</div>
                        <div class="stat-value">Rp.{{ $pembayarans->sum('sumbangan') }}</div>
                        <div>Bulan ini</div>
                    </div>
                </div>
                <div class="stats rounded-none border">
                    <div class="stat">
                        <div>Total siswa</div>
                        <div class="stat-value">{{ $siswaCount }}</div>
                        <div>Siswa</div>
                    </div>
                </div>
                <div class="stats rounded-none border">
                    <div class="stat">
                        <div>Siswa lunas</div>
                        <div class="stat-value">
                            {{ $siswaLunas }}</div>
                        <div>Bulan ini</div>
                    </div>
                </div>
                <div class="stats rounded-none border">
                    <div class="stat">
                        <div>Siswa belum lunas</div>
                        <div class="stat-value">
                            {{ $siswaBelumLunas }}
                        </div>
                        <div>Bulan ini</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="overflow-x-auto p-4 border">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <span class="text-xl font-bold">Pembayaran terbaru</span>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($pembayarans as $pembayaran)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div>
                                            <div class="font-bold">{{ $pembayaran->siswa->nama }}</div>
                                            <div class="text-sm opacity-50">{{ $pembayaran->siswa->nisn }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div>
                                            <div>{{ $pembayaran->angsuran->ket }}</div>
                                            <div class="text-sm opacity-50">{{ $pembayaran->tapel->tahun_pelajaran }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-warning text-white font-bold">Rp. {{ $pembayaran->sumbangan }}
                                    </div>
                                </td>
                                <th>
                                    <div class="text-sm opacity-50">{{ $pembayaran->tanggal }}</div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
