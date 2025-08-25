@extends('layouts.table-layout')

@section('header')
  <div class="flex items-center gap-4">
    <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.return.index') ? 'text-white' : 'text-purple-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14v7H5v-7M12 3v11m0 0l-4-4m4 4l4-4" />
                    </svg>
    </div>
    <div>
      <h1 class="text-2xl font-bold text-white">Daftar Pengembalian Kendaraan</h1>
      <p class="text-blue-100 text-sm mt-1">Riwayat pengembalian kendaraan dari semua peminjaman</p>
    </div>
  </div>
@endsection

@section('table')
  <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
    @if ($rentals->count() > 0)
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="bg-slate-50/80 border-b border-slate-200">
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Peminjam</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kendaraan</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal Pinjam</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal Kembali</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Durasi</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @foreach ($rentals as $rental)
              <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-full flex items-center justify-center">
                      <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    </div>
                    <div>
                      <div class="font-semibold text-slate-900">
                        {{ $rental->user ? $rental->user->name : 'User tidak ditemukan' }}
                      </div>
                      @if($rental->user && $rental->user->email)
                        <div class="text-sm text-slate-500">{{ $rental->user->email }}</div>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                      <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10V9a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2H9a2 2 0 01-2-2z" />
                      </svg>
                    </div>
                    <div>
                      <div class="font-semibold text-slate-900">
                        {{ $rental->vehicle ? $rental->vehicle->name : 'Kendaraan tidak ditemukan' }}
                      </div>
                      @if($rental->vehicle && $rental->vehicle->license_plate)
                        <div class="text-sm text-slate-500">{{ $rental->vehicle->license_plate }}</div>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm font-medium text-slate-900">
                    {{ \Carbon\Carbon::parse($rental->time_out)->format('d M Y') }}
                  </div>
                  <div class="text-xs text-slate-500">
                    {{ \Carbon\Carbon::parse($rental->time_out)->format('H:i') }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  @if($rental->time_in)
                    <div class="text-sm font-medium text-slate-900">
                      {{ \Carbon\Carbon::parse($rental->time_in)->format('d M Y') }}
                    </div>
                    <div class="text-xs text-slate-500">
                      {{ \Carbon\Carbon::parse($rental->time_in)->format('H:i') }}
                    </div>
                  @else
                    <span class="text-sm text-slate-400 italic">Belum dikembalikan</span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  @if($rental->time_in)
                    @php
                      $duration = \Carbon\Carbon::parse($rental->time_out)->diffInDays(\Carbon\Carbon::parse($rental->time_in));
                    @endphp
                    <span class="text-sm text-slate-600">
                      {{ $duration }} hari
                    </span>
                  @else
                    @php
                      $duration = \Carbon\Carbon::parse($rental->time_out)->diffInDays(now());
                    @endphp
                    <span class="text-sm text-amber-600 font-medium">
                      {{ $duration }} hari (berjalan)
                    </span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  @php
                  $statusConfig = match(strtolower($rental->status)) {
                    'returned' => [
                      'bg' => 'bg-emerald-100',
                      'text' => 'text-emerald-700',
                      'border' => 'border-emerald-200',
                      'label' => 'Dikembalikan'
                    ],
                    'borrowed' => [
                      'bg' => 'bg-blue-100', 
                      'text' => 'text-blue-700',
                      'border' => 'border-blue-200',
                      'label' => 'Dipinjam'
                    ],
                    'overdue' => [
                      'bg' => 'bg-red-100',
                      'text' => 'text-red-700', 
                      'border' => 'border-red-200',
                      'label' => 'Terlambat'
                    ],
                    default => [
                      'bg' => 'bg-slate-100',
                      'text' => 'text-slate-600',
                      'border' => 'border-slate-200',
                      'label' => ucfirst($rental->status)
                    ]
                  };
                  @endphp
                  <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold border {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} {{ $statusConfig['border'] }}">
                    {{ $statusConfig['label'] }}
                  </span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @if($rentals->hasPages())
      <div class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
        {{ $rentals->links('vendor.pagination.tailwind') }}
      </div>
      @endif
    @else
      <div class="px-6 py-16 text-center">
        <div class="flex flex-col items-center gap-4">
          <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full flex items-center justify-center">
            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">Belum Ada Data Pengembalian</h3>
            <p class="text-slate-500 mb-4">Belum ada riwayat peminjaman dan pengembalian kendaraan.</p>
            <a href="{{ route('admin.dashboard') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-medium transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              Kembali ke Dashboard
            </a>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection