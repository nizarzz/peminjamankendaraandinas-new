@extends('layouts.app')

@section('content')
<style>
  .detail-card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }
  .detail-card:hover {
    box-shadow: 0 4px 12px rgba(59,130,246,0.10);
  }
  .card-header {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
  }
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 16px;
    font-size: 0.85rem;
    font-weight: 600;
    min-width: 90px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.04);
  }
  .status-returned {
    background-color: #ecfdf5;
    color: #059669;
  }
  .status-approved {
    background-color: #dbeafe;
    color: #1d4ed8;
  }
  .status-pending {
    background-color: #fef3c7;
    color: #92400e;
  }
  .status-rejected {
    background-color: #fee2e2;
    color: #b91c1c;
  }
  .back-btn {
    transition: all 0.2s ease;
  }
  .back-btn:hover {
    transform: translateX(-2px);
    background: #e2e8f0;
  }
  .detail-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  @media (max-width: 640px) {
    .detail-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden mb-8">
      <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
        <div class="flex items-center gap-4">
          <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
            </svg>
          </div>
          <div>
            <h1 class="text-2xl font-bold text-white">Detail Peminjaman Kendaraan</h1>
            <p class="text-blue-100 text-sm mt-1">Informasi lengkap peminjaman kendaraan</p>
          </div>
        </div>
      </div>
      <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <p class="text-sm font-medium text-slate-500">Nama Peminjam</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->user->name ?? '-' }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Kendaraan</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->vehicle->name ?? '-' }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Jenis Kendaraan</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->vehicle->type ?? '-' }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Jenis Bahan Bakar</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->vehicle->fuel_type ?? '-' }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Plat Nomor</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->vehicle->license_plate ?? '-' }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Tanggal Peminjaman</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->time_out }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Tanggal Pengembalian</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->time_in ?? '-' }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Durasi</p>
            <p class="text-base font-semibold text-slate-900">
              @if($rental->status == 'returned' && $rental->time_in && $rental->time_out)
                @php
                  $start = \Carbon\Carbon::parse($rental->time_out);
                  $end = \Carbon\Carbon::parse($rental->time_in);
                  $diff = $start->diff($end);
                  $durasi = [];
                  if ($diff->d > 0) $durasi[] = $diff->d . ' hari';
                  if ($diff->h > 0) $durasi[] = $diff->h . ' jam';
                  if ($diff->i > 0) $durasi[] = $diff->i . ' menit';
                  echo implode(' ', $durasi);
                @endphp
              @else
                -
              @endif
            </p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Tujuan</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->purpose }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">KM Awal</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->start_kilometer }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">KM Akhir</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->end_kilometer }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Jarak Tempuh</p>
            <p class="text-base font-semibold text-slate-900">{{ $rental->jarak_tempuh }}</p>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-500">Status</p>
            @php
              $statusConfig = [
                'pending' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800', 'border' => 'border-amber-200', 'label' => 'Pending'],
                'approved' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'border' => 'border-blue-200', 'label' => 'Disetujui'],
                'returned' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-800', 'border' => 'border-emerald-200', 'label' => 'Dikembalikan'],
                'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'border' => 'border-red-200', 'label' => 'Ditolak'],
              ];
              $config = $statusConfig[$rental->status] ?? ['bg' => 'bg-slate-100', 'text' => 'text-slate-800', 'border' => 'border-slate-200', 'label' => ucfirst($rental->status)];
            @endphp
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold border {{ $config['bg'] }} {{ $config['text'] }} {{ $config['border'] }}">
              {{ $config['label'] }}
            </span>
          </div>
          @if($rental->status == 'rejected' && !empty($rental->rejection_reason))
            <div class="md:col-span-2">
              <p class="text-sm font-medium text-slate-500">Alasan Penolakan</p>
              <p class="text-base font-semibold text-red-600">{{ $rental->rejection_reason }}</p>
            </div>
          @endif
        </div>
        <div class="pt-8 flex justify-end">
          <a href="{{ route('admin.daftarpeminjaman.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-semibold text-sm hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection