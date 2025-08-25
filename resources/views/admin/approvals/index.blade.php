@extends('layouts.table-layout')

@section('header')
  <div class="flex items-center gap-4">
    <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="white"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4" stroke="currentColor" />
      </svg>
    </div>
    <div>
      <h1 class="text-2xl font-bold text-white">Persetujuan Peminjaman</h1>
      <p class="text-blue-100 text-sm mt-1">Kelola persetujuan peminjaman kendaraan</p>
    </div>
  </div>
@endsection

@section('table')
  @if ($rentals->count() > 0)
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full min-w-[900px] text-sm">
          <thead class="bg-gradient-to-r from-slate-50 to-slate-100 border-b border-slate-200">
            <tr>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">ID</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">User</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Nama Kendaraan</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Plat Nomor</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Waktu Keluar</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Keperluan</th>
              <th class="py-4 px-6 text-center font-semibold text-slate-700">Status</th>
              <th class="py-4 px-6 text-center font-semibold text-slate-700">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @foreach ($rentals as $rental)
              <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                <td class="py-4 px-6">
                  <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-100 text-slate-800">
                    #{{ $rental->id }}
                  </span>
                </td>
                <td class="py-4 px-6">
                  <div class="font-medium text-slate-900">{{ $rental->user->name ?? 'User tidak ditemukan' }}</div>
                </td>
                <td class="py-4 px-6">
                  <div class="font-medium text-slate-900">{{ $rental->vehicle_name }}</div>
                </td>
                <td class="py-4 px-6">
                  <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $rental->license_plate }}
                  </span>
                </td>
                <td class="py-4 px-6 text-slate-600">
                  {{ $rental->time_out ? \Carbon\Carbon::parse($rental->time_out)->format('d-m-Y H:i') : '-' }}
                </td>
                <td class="py-4 px-6">
                  <div class="max-w-xs">
                    <p class="text-slate-600">{{ $rental->purpose ?? '-' }}</p>
                  </div>
                </td>
                <td class="py-4 px-6 text-center">
                  @php
                    $badge = match($rental->status) {
                      'approved' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                      'rejected' => 'bg-red-100 text-red-800 border-red-200',
                      'pending' => 'bg-amber-100 text-amber-800 border-amber-200',
                      default => 'bg-slate-100 text-slate-800 border-slate-200',
                    };
                    $icon = match($rental->status) {
                      'approved' => '<svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="white"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4" stroke="currentColor" /></svg>',
                      'rejected' => '<svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="white"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9l-6 6m0-6l6 6" stroke="currentColor" /></svg>',
                      'pending' => '<svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="white"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l2 2" stroke="currentColor" /></svg>',
                      default => '',
                    };
                  @endphp
                  <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold border {{ $badge }}">
                    {!! $icon !!}
                    {{ ucfirst($rental->status) }}
                  </span>
                </td>
                <td class="py-4 px-6">
                  @if ($rental->status === 'pending')
                    <div class="flex flex-col gap-2 min-w-[120px]">
                      <form action="{{ route('admin.approvals.approve', $rental->id) }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit"
                          class="w-full bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center gap-1.5 shadow-sm hover:shadow-md">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg>
                          Setujui
                        </button>
                      </form>
                      <form action="{{ route('admin.approvals.reject', $rental->id) }}" method="POST" class="w-full" onsubmit="return confirmReject(this);">
                        @csrf
                        <input type="hidden" name="rejection_reason" value="">
                        <button type="submit"
                          class="w-full bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center gap-1.5 shadow-sm hover:shadow-md">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Tolak
                        </button>
                      </form>
                    </div>
                  @else
                    <div class="text-center">
                      <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 text-slate-500">
                        Selesai
                      </span>
                    </div>
                  @endif
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
    </div>
  @else
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
      <div class="text-center py-16 px-8">
        <div class="mx-auto w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-6">
          <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="white"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4" stroke="currentColor" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-slate-900 mb-2">Tidak ada data peminjaman untuk ditinjau</h3>
        <p class="text-slate-600">Semua peminjaman telah diproses atau belum ada pengajuan baru</p>
      </div>
    </div>
  @endif
@endsection

<script>
function confirmReject(form) {
  var reason = prompt('Masukkan alasan penolakan:');
  if (reason === null || reason.trim() === '') {
    alert('Alasan penolakan wajib diisi!');
    return false;
  }
  form.querySelector('input[name="rejection_reason"]').value = reason;
  return true;
}
</script>