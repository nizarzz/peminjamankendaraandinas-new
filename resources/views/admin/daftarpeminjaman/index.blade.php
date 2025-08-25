@extends('layouts.table-layout')

@section('header')
  <div class="flex items-center gap-4">
    <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 3h6a2 2 0 012 2v14a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2zm0 4h6m-6 4h6m-6 4h6" />
      </svg>
    </div>
    <div>
      <h1 class="text-2xl font-bold text-white">Daftar Peminjaman Kendaraan</h1>
      <p class="text-blue-100 text-sm mt-1">Kelola dan pantau semua peminjaman kendaraan</p>
    </div>
  </div>
@endsection

@section('filters')
  <form method="GET" class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
      <!-- Search Input -->
      <div class="lg:col-span-2 relative">
        <label class="block text-sm font-medium text-slate-700 mb-2">Pencarian</label>
        <div class="relative">
          <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </span>
          <input type="text" name="search" value="{{ request('search') }}" 
                 class="w-full pl-12 pr-4 py-3 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white" 
                 placeholder="Cari nama peminjam, kendaraan, atau plat nomor...">
        </div>
      </div>
      <!-- Status Filter -->
      <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
        <select name="status" class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white">
          <option value="">Semua Status</option>
          <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
          <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Dikembalikan</option>
          <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
        </select>
      </div>
      <!-- Date From -->
      <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Dari Tanggal</label>
        <input type="date" name="date_from" value="{{ request('date_from') }}" 
               class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white">
      </div>
      <!-- Date To -->
      <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Sampai Tanggal</label>
        <input type="date" name="date_to" value="{{ request('date_to') }}" 
               class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 focus:bg-white">
      </div>
    </div>
    <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200">
      <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:-translate-y-0.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        Cari Data
      </button>
      @if(request('search') || request('status') || request('date_from') || request('date_to'))
      <a href="{{ route('admin.daftarpeminjaman.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-slate-700 rounded-xl text-sm font-semibold hover:bg-slate-200 transition-all duration-200">
        Reset Filter
      </a>
      @endif
    </div>
  </form>
@endsection

@section('table')
  @if ($rentals->count() > 0)
    <form id="selectForm">
      <table class="w-full min-w-[1200px] text-sm">
        <thead class="bg-gradient-to-r from-slate-50 to-slate-100 border-b border-slate-200">
          <tr>
            <th class="py-4 px-4 w-12 text-center">
              <input type="checkbox" id="selectAll" class="w-5 h-5 accent-blue-600 rounded-md">
            </th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Nama Peminjam</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Kendaraan</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Jenis</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Bahan Bakar</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Plat Nomor</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Tgl Pinjam</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Tgl Kembali</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Durasi</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Tujuan</th>
            <th class="py-4 px-4 text-center font-semibold text-slate-700">KM Awal</th>
            <th class="py-4 px-4 text-center font-semibold text-slate-700">KM Akhir</th>
            <th class="py-4 px-4 text-center font-semibold text-slate-700">Jarak</th>
            <th class="py-4 px-4 text-center font-semibold text-slate-700">Status</th>
            <th class="py-4 px-4 text-left font-semibold text-slate-700">Alasan Penolakan</th>
            <th class="py-4 px-4 text-center font-semibold text-slate-700">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @foreach ($rentals as $rental)
          <tr class="hover:bg-blue-50/50 transition-colors duration-200">
            <td class="py-4 px-4 text-center">
              <input type="checkbox" name="selected[]" value="{{ $rental->id }}" form="deleteSelectedForm" class="w-5 h-5 accent-blue-600 rounded-md">
            </td>
            <td class="py-4 px-4">
              <div class="font-medium text-slate-900">{{ $rental->user->name ?? '-' }}</div>
            </td>
            <td class="py-4 px-4">
              <div class="font-medium text-slate-900">{{ $rental->vehicle ? $rental->vehicle->name : '-' }}</div>
            </td>
            <td class="py-4 px-4 text-slate-600">{{ $rental->vehicle ? $rental->vehicle->type : '-' }}</td>
            <td class="py-4 px-4 text-slate-600">{{ $rental->vehicle ? $rental->vehicle->fuel_type : '-' }}</td>
            <td class="py-4 px-4">
              <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 text-slate-800">
                {{ $rental->vehicle ? $rental->vehicle->license_plate : '-' }}
              </span>
            </td>
            <td class="py-4 px-4 text-slate-600">{{ $rental->time_out }}</td>
            <td class="py-4 px-4 text-slate-600">{{ $rental->time_in ?? '-' }}</td>
            <td class="py-4 px-4 text-slate-600">
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
            </td>
            <td class="py-4 px-4 text-slate-600">{{ $rental->purpose }}</td>
            <td class="py-4 px-4 text-center text-slate-600">{{ $rental->start_kilometer }}</td>
            <td class="py-4 px-4 text-center text-slate-600">{{ $rental->end_kilometer }}</td>
            <td class="py-4 px-4 text-center text-slate-600">{{ $rental->jarak_tempuh }}</td>
            <td class="py-4 px-4 text-center">
              @php
                $statusConfig = [
                  'pending' => ['bg-amber-100 text-amber-800 border-amber-200', 'Pending'],
                  'approved' => ['bg-blue-100 text-blue-800 border-blue-200', 'Disetujui'],
                  'returned' => ['bg-emerald-100 text-emerald-800 border-emerald-200', 'Dikembalikan'],
                  'rejected' => ['bg-red-100 text-red-800 border-red-200', 'Ditolak']
                ];
                $config = $statusConfig[$rental->status] ?? ['bg-slate-100 text-slate-800 border-slate-200', ucfirst($rental->status)];
              @endphp
              <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold border {{ $config[0] }}">
                {{ $config[1] }}
              </span>
            </td>
            <td class="py-4 px-4">
              @if($rental->status == 'rejected' && !empty($rental->rejection_reason))
                <div class="text-red-700 text-xs max-w-xs">
                  <p class="line-clamp-2">{{ $rental->rejection_reason }}</p>
                </div>
              @else
                <span class="text-slate-400">-</span>
              @endif
            </td>
            <td class="py-4 px-4 text-center">
              <a href="{{ route('admin.daftarpeminjaman.show', $rental->id) }}" 
                 class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg hover:from-blue-700 hover:to-blue-800 text-xs font-semibold transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5" 
                 title="Lihat Detail">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Detail
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </form>
  @else
    <div class="text-center py-16 px-8">
      <div class="mx-auto w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-6">
        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-slate-900 mb-2">Tidak ada data peminjaman</h3>
      <p class="text-slate-600 mb-6">
        @if(request('search') || request('status') || request('date_from') || request('date_to'))
          Tidak ditemukan data yang sesuai dengan kriteria pencarian Anda
        @else
          Belum ada data peminjaman kendaraan yang tersedia
        @endif
      </p>
      @if(request('search') || request('status') || request('date_from') || request('date_to'))
        <a href="{{ route('admin.daftarpeminjaman.index') }}" 
           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:-translate-y-0.5">
          Reset Pencarian
        </a>
      @endif
    </div>
  @endif
@endsection

<div>
  @section('actions')
    <div class="flex flex-wrap gap-3 justify-end">
      <form id="deleteSelectedForm" method="POST" action="{{ route('rentals.delete.selected') }}">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin hapus data terpilih?')" 
          class="inline-flex items-center justify-center gap-2 min-w-[180px] h-12 px-0 bg-red-100 text-red-700 rounded-lg font-semibold text-sm hover:bg-red-200 transition-all duration-200 border border-red-200">
          Hapus Seleksi
        </button>
      </form>
      <form method="POST" action="{{ route('rentals.delete.all') }}">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin hapus semua data?')" 
          class="inline-flex items-center justify-center gap-2 min-w-[180px] h-12 px-0 bg-red-100 text-red-700 rounded-lg font-semibold text-sm hover:bg-red-200 transition-all duration-200 border border-red-200">
          Hapus Semua
        </button>
      </form>
      <button type="button" id="btnPreviewExcel" 
        class="inline-flex items-center justify-center gap-2 min-w-[180px] h-12 px-0 bg-emerald-50 text-emerald-700 rounded-lg font-semibold text-sm hover:bg-emerald-100 transition-all duration-200 border border-emerald-200">
        Preview Excel
      </button>
      <a href="{{ route('rentals.export.excel', request()->query()) }}" 
        class="inline-flex items-center justify-center gap-2 min-w-[180px] h-12 px-0 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg font-semibold text-sm hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
        Export Excel
      </a>
    </div>
  @endsection

  <!-- Modal Preview Excel -->
  <div id="modalPreviewExcel" style="display:none;" class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-40">
    <div class="bg-white h-full w-full max-w-xl rounded-2xl shadow-lg border border-slate-200/60 overflow-x-auto overflow-y-auto relative flex flex-col">
      <div class="flex justify-between items-center px-6 py-4 border-b">
        <h2 class="text-lg font-bold">Preview Data Ekspor Excel</h2>
        <button id="btnClosePreview" class="text-slate-500 hover:text-red-500 text-2xl font-bold">&times;</button>
      </div>
      <div class="flex-1 p-4 md:p-6 overflow-x-auto">
        <table class="min-w-full text-xs md:text-sm border">
          <thead class="bg-slate-100">
            <tr>
              <th class="border px-2 py-1 text-center">Nama Peminjam</th>
              <th class="border px-2 py-1 text-center">Kendaraan</th>
              <th class="border px-2 py-1 text-center">Jenis</th>
              <th class="border px-2 py-1 text-center">Bahan Bakar</th>
              <th class="border px-2 py-1 text-center">Plat Nomor</th>
              <th class="border px-2 py-1 text-center">Tgl Pinjam</th>
              <th class="border px-2 py-1 text-center">Tgl Kembali</th>
              <th class="border px-2 py-1 text-center">Durasi</th>
              <th class="border px-2 py-1 text-center">Tujuan</th>
              <th class="border px-2 py-1 text-center">KM Awal</th>
              <th class="border px-2 py-1 text-center">KM Akhir</th>
              <th class="border px-2 py-1 text-center">Jarak</th>
              <th class="border px-2 py-1 text-center">Status</th>
              <th class="border px-2 py-1 text-center">Alasan Penolakan</th>
            </tr>
          </thead>
          <tbody id="previewTableBody">
            @forelse($rentals as $rental)
            <tr>
              <td class="border px-2 py-1 text-center">{{ $rental->user->name ?? '-' }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->vehicle->name ?? '-' }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->vehicle->type ?? '-' }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->vehicle->fuel_type ?? '-' }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->vehicle->license_plate ?? '-' }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->time_out }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->time_in ?? '-' }}</td>
              <td class="border px-2 py-1 text-center">
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
              </td>
              <td class="border px-2 py-1 text-center">{{ $rental->purpose }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->start_kilometer }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->end_kilometer }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->jarak_tempuh }}</td>
              <td class="border px-2 py-1 text-center">{{ $rental->status }}</td>
              <td class="border px-2 py-1 text-center">@if($rental->status == 'rejected'){{ $rental->rejection_reason ?? '-' }}@else-@endif</td>
            </tr>
            @empty
            <tr>
              <td colspan="13" class="text-center text-slate-500 py-4">Tidak ada data untuk preview.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <div class="flex justify-between items-center mt-4" id="previewPagination"></div>
      </div>
      <div class="flex justify-end gap-2 px-6 py-4 border-t bg-white">
        <a href="{{ route('rentals.export.excel', request()->query()) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg font-semibold text-sm hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200 shadow-md hover:shadow-lg">Export Excel</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Select all checkbox functionality
    const selectAll = document.getElementById('selectAll');
    if (selectAll) {
      selectAll.addEventListener('change', function(e) {
        document.querySelectorAll('input[name="selected[]"]').forEach(cb => {
          cb.checked = e.target.checked;
        });
      });
    }

    // Individual checkbox change handler
    document.querySelectorAll('input[name="selected[]"]').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const allCheckboxes = document.querySelectorAll('input[name="selected[]"]');
        const checkedCheckboxes = document.querySelectorAll('input[name="selected[]"]:checked');
        
        if (selectAll) {
          selectAll.checked = allCheckboxes.length === checkedCheckboxes.length;
          selectAll.indeterminate = checkedCheckboxes.length > 0 && checkedCheckboxes.length < allCheckboxes.length;
        }
      });
    });

    // Modal Preview Excel
    var btnPreview = document.getElementById('btnPreviewExcel');
    var modal = document.getElementById('modalPreviewExcel');
    var btnClose = document.getElementById('btnClosePreview');
    if(btnPreview && modal && btnClose) {
      btnPreview.addEventListener('click', function() {
        modal.style.display = 'flex';
      });
      btnClose.addEventListener('click', function() {
        modal.style.display = 'none';
      });
      // Tutup modal jika klik di luar konten modal
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          modal.style.display = 'none';
        }
      });
    }

    // PAGINATION PREVIEW
    const rows = Array.from(document.querySelectorAll('#previewTableBody tr'));
    const perPage = 5; // jumlah baris per halaman
    let currentPage = 1;
    const totalPages = Math.ceil(rows.length / perPage);

    function renderPage(page) {
      rows.forEach((row, idx) => {
        row.style.display = (idx >= (page-1)*perPage && idx < page*perPage) ? '' : 'none';
      });
      // Render pagination controls
      let html = '';
      if (totalPages > 1) {
        html += `<button ${page==1?'disabled':''} onclick='window.setPreviewPage(${page-1})' class='px-3 py-1 rounded border mr-2'>Sebelumnya</button>`;
        html += `Halaman ${page} dari ${totalPages}`;
        html += `<button ${page==totalPages?'disabled':''} onclick='window.setPreviewPage(${page+1})' class='px-3 py-1 rounded border ml-2'>Berikutnya</button>`;
      }
      document.getElementById('previewPagination').innerHTML = html;
    }
    window.setPreviewPage = function(page) {
      if(page < 1 || page > totalPages) return;
      currentPage = page;
      renderPage(currentPage);
    }
    if(rows.length) renderPage(1);
  });
</script>