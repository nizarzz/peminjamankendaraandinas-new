@extends('layouts.table-layout')

@section('header')
  <div class="flex items-center gap-4">
    <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
      </svg>
    </div>
    <div>
      <h1 class="text-2xl font-bold text-white">Kelola User Pegawai</h1>
      <p class="text-blue-100 text-sm mt-1">Kelola akun pegawai dan promosi ke admin</p>
    </div>
  </div>
@endsection

@section('table')
  <style>
    /* Responsive Table Custom untuk halaman user admin */
    .user-table-container {
      width: 100%;
      overflow-x: auto;
    }
    .user-table {
      min-width: 600px;
    }
    @media (max-width: 991.98px) {
      .user-table {
        min-width: 500px;
      }
    }
    @media (max-width: 767.98px) {
      .user-table {
        min-width: unset;
        width: 100%;
      }
      .user-table th, .user-table td {
        padding: 0.5rem 0.3rem;
        font-size: 13px;
      }
    }
    @media (max-width: 575.98px) {
      .user-table {
        min-width: unset;
        width: 100%;
      }
      .user-table th, .user-table td {
        padding: 0.35rem 0.2rem;
        font-size: 12px;
      }
    }
  </style>
  @if ($users->count() > 0)
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
      <div class="user-table-container">
        <table class="user-table w-full text-sm">
          <thead class="bg-gradient-to-r from-slate-50 to-slate-100 border-b border-slate-200">
            <tr>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Nama</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Email</th>
              <th class="py-4 px-6 text-left font-semibold text-slate-700">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @foreach ($users as $user)
            <tr class="hover:bg-blue-50/50 transition-colors duration-200">
              <td class="py-4 px-6">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                  </div>
                  <div>
                    <div class="font-medium text-slate-900">{{ $user->name }}</div>
                    <div class="text-xs text-slate-500">Pegawai</div>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                <div class="text-slate-700">{{ $user->email }}</div>
              </td>
              <td class="py-4 px-6">
                <div class="flex items-center gap-2">
                  <!-- Promote Button -->
                  <form action="{{ route('admin.user.promote', $user->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                            onclick="return confirm('Yakin ingin menjadikan {{ $user->name }} sebagai admin?')"
                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-emerald-100 hover:bg-emerald-200 text-emerald-700 text-xs rounded-lg font-medium transition-colors duration-200 border border-emerald-200">
                      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                      </svg>
                      Jadikan Admin
                    </button>
                  </form>

                  <!-- Delete Button -->
                  <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Yakin ingin menghapus user {{ $user->name }}? Tindakan ini tidak dapat dibatalkan.')"
                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 text-xs rounded-lg font-medium transition-colors duration-200 border border-red-200">
                      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                      Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @if(method_exists($users, 'links') && $users->hasPages())
      <div class="border-t border-slate-200 bg-white px-8 py-6">
        <div class="flex justify-center">
          {{ $users->links('vendor.pagination.tailwind') }}
        </div>
      </div>
      @endif
    </div>
  @else
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden">
      <div class="text-center py-16 px-8">
        <div class="mx-auto w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-6">
          <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold text-slate-900 mb-2">Belum ada user pegawai</h3>
        <p class="text-slate-600 mb-6">
          Sistem belum memiliki user pegawai. User pegawai akan muncul setelah registrasi.
        </p>
      </div>
    </div>
  @endif
@endsection