@extends('layouts.table-layout')

{{-- Success Message tetap di luar layout agar tampil di atas --}}
@if(session('success'))
  <div class="mb-6 mx-auto max-w-4xl">
    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 shadow-sm">
      <div class="flex items-center gap-3">
        <div class="flex-shrink-0">
          <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <p class="text-green-800 font-medium text-sm">{{ session('success') }}</p>
      </div>
    </div>
  </div>
@endif

@section('header')
  <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
    <div class="flex items-center gap-4">
      <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('vehicles.index') || request()->routeIs('vehicles.create') ? 'text-white' : 'text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 17v-3a2 2 0 012-2h12a2 2 0 012 2v3M4 17h16M7 17a2 2 0 104 0 2 2 0 00-4 0zm6 0a2 2 0 104 0 2 2 0 00-4 0zM5 10l1.5-4.5A2 2 0 018.5 4h7a2 2 0 011.95 1.5L19 10" />
                    </svg>
      </div>
      <div>
        <h1 class="text-2xl font-bold text-white">Daftar Kendaraan</h1>
        <p class="text-blue-100 text-sm mt-1">Kelola semua kendaraan </p>
      </div>
    </div>
    <div class="flex items-center gap-4">
      <form method="GET" class="relative flex-1">
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </span>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kendaraan..." class="w-full pl-12 pr-4 py-3 bg-blue-100 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" />
      </form>
      <a href="{{ route('vehicles.create') }}" class="px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-semibold text-base flex items-center gap-2 transition-all duration-200">
        <span class="text-xl">+</span> Tambah Kendaraan
      </a>
    </div>
  </div>
@endsection

@section('table')
  <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="min-w-full">
        <thead>
          <tr class="bg-slate-50/80 border-b border-slate-200">
            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kendaraan</th>
            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tipe</th>
            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Plat Nomor</th>
            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tahun</th>
            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">KM Awal</th>
            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
            <th class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse ($vehicles as $vehicle)
          <tr class="hover:bg-slate-50/50 transition-colors duration-150">
            <td class="px-6 py-4">
              <div class="flex items-center gap-3">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10V9a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2H9a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <div>
                  <div class="font-semibold text-slate-900">{{ $vehicle->name }}</div>
                  <div class="text-sm text-slate-500">{{ $vehicle->fuel_type }}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4">
              <span class="text-sm font-medium text-slate-700">{{ $vehicle->type }}</span>
            </td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 text-slate-700 border">
                {{ $vehicle->license_plate }}
              </span>
            </td>
            <td class="px-6 py-4">
              <span class="text-sm text-slate-600">{{ $vehicle->year }}</span>
            </td>
            <td class="px-6 py-4">
              <span class="text-sm text-slate-600">{{ number_format($vehicle->start_kilometer) }} km</span>
            </td>
            <td class="px-6 py-4">
              @php
              $statusConfig = match(strtolower($vehicle->status)) {
                'tersedia' => [
                  'bg' => 'bg-emerald-100',
                  'text' => 'text-emerald-700',
                  'border' => 'border-emerald-200'
                ],
                'tidak tersedia' => [
                  'bg' => 'bg-red-100', 
                  'text' => 'text-red-700',
                  'border' => 'border-red-200'
                ],
                default => [
                  'bg' => 'bg-slate-100',
                  'text' => 'text-slate-600',
                  'border' => 'border-slate-200'
                ]
              };
              @endphp
              <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold border {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} {{ $statusConfig['border'] }}">
                {{ $vehicle->status }}
              </span>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center justify-center gap-2">
                <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-amber-100 hover:bg-amber-200 text-amber-700 rounded-lg text-xs font-medium transition-colors border border-amber-200">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                  Edit
                </a>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" 
                      method="POST" 
                      class="inline-block" 
                      onsubmit="return confirm('Yakin ingin menghapus kendaraan {{ $vehicle->name }}?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" 
                          class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg text-xs font-medium transition-colors border border-red-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="px-6 py-12 text-center">
              <div class="flex flex-col items-center gap-3">
                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10V9a2 2 0 012-2h2a2 2 0 012 2v8a2 2 0 01-2 2H9a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <div>
                  <p class="text-slate-500 font-medium">Belum ada kendaraan</p>
                  <p class="text-slate-400 text-sm mt-1">Tambahkan kendaraan pertama Anda</p>
                </div>
                <a href="{{ route('vehicles.create') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors mt-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah Kendaraan
                </a>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    @if($vehicles->hasPages())
    <div class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
      {{ $vehicles->links('vendor.pagination.tailwind') }}
    </div>
    @endif
  </div>
@endsection

