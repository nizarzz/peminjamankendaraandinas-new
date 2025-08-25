@extends('layouts.app')
    
@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8">
  <div class="max-w-4xl mx-auto px-4">
    <!-- Header Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden mb-8">
      <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
        <div class="flex items-center gap-4">
          <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
          </div>
          <div>
            <h1 class="text-2xl font-bold text-white">Edit Kendaraan</h1>
            <p class="text-blue-100 text-sm mt-1">Perbarui informasi kendaraan {{ $vehicle->name }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
      <div class="p-8">
        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Kendaraan -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Nama Kendaraan</label>
              <input type="text" 
                     name="name" 
                     value="{{ $vehicle->name }}" 
                     class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                     placeholder="Masukkan nama kendaraan"
                     required>
              @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Tipe Kendaraan -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Tipe Kendaraan</label>
              <input type="text" 
                     name="type" 
                     value="{{ $vehicle->type }}" 
                     class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                     placeholder="Masukkan tipe kendaraan"
                     required>
              @error('type')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Tahun -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Tahun</label>
              <input type="number" 
                     name="year" 
                     value="{{ $vehicle->year }}" 
                     class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                     placeholder="Masukkan tahun kendaraan"
                     min="1900"
                     max="{{ date('Y') + 1 }}"
                     required>
              @error('year')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Nomor Polisi -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Nomor Polisi</label>
              <input type="text" 
                     name="license_plate" 
                     value="{{ $vehicle->license_plate }}" 
                     class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                     placeholder="Masukkan nomor polisi"
                     required>
              @error('license_plate')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Kilometer Awal -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Kilometer Awal</label>
              <input type="number" 
                     name="start_kilometer" 
                     value="{{ $vehicle->start_kilometer }}" 
                     class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                     placeholder="Masukkan kilometer awal"
                     min="0"
                     required>
              @error('start_kilometer')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Jenis Bahan Bakar -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Jenis Bahan Bakar</label>
              <select name="fuel_type" 
                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                      required>
                <option value="">Pilih jenis bahan bakar</option>
                <option value="Bensin" {{ $vehicle->fuel_type == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                <option value="Solar" {{ $vehicle->fuel_type == 'Solar' ? 'selected' : '' }}>Solar</option>
              </select>
              @error('fuel_type')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Status -->
            <div class="space-y-2">
              <label class="block text-sm font-semibold text-slate-700">Status</label>
              <select name="status" 
                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50" 
                      required>
                <option value="">Pilih status kendaraan</option>
                <option value="Tersedia" {{ $vehicle->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ $vehicle->status == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
              </select>
              @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Tanggal Servis Terakhir -->
            <div class="space-y-2 md:col-span-2">
              <label class="block text-sm font-semibold text-slate-700">Tanggal Servis Terakhir</label>
              <input type="date" 
                     name="last_service_date" 
                     value="{{ $vehicle->last_service_date }}" 
                     class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 text-sm bg-slate-50/50">
              @error('last_service_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t border-slate-200">
            <a href="{{ route('vehicles.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors duration-200 border border-slate-200">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              Kembali
            </a>
            
            <button type="submit"
                    class="inline-flex items-center gap-2 px-8 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
</qodoArtifact>

