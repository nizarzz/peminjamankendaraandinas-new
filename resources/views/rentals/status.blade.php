@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Status Peminjaman Kendaraan</h2>

    @if($rentals->isEmpty())
        <p class="text-gray-600">Belum ada peminjaman kendaraan.</p>
    @else
        @foreach($rentals as $rental)
            <div class="border p-4 mb-4 rounded bg-gray-50">
                <table class="table-auto w-full mb-2">
                    <tr>
                        <th class="text-left w-1/3">Nama Kendaraan</th>
                        <td>{{ $rental->vehicle_name }}</td>
                    </tr>
                    <tr>
                        <th>Plat Nomor</th>
                        <td>{{ $rental->license_plate }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Pengambilan</th>
                        <td>{{ $rental->time_out }}</td>
                    </tr>
                    <tr>
                        <th>Status Peminjaman</th>
                        <td>
                            @if($rental->status === 'pending')
                                <span class="text-yellow-600 font-semibold">Menunggu Persetujuan</span>
                            @elseif($rental->status === 'approved')
                                <span class="text-green-600 font-semibold">Disetujui</span>
                            @elseif($rental->status === 'rejected')
                                <span class="text-red-600 font-semibold">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    @if($rental->rejection_reason)
                    <tr>
                        <th>Alasan Penolakan</th>
                        <td>{{ $rental->rejection_reason }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        @endforeach
    @endif
</div>
@endsection
