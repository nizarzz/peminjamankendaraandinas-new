@extends('layouts.table-layout')

@section('header')
  <div class="flex items-center gap-4">
    <div class="p-3 rounded-xl bg-white/20 backdrop-blur-sm">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
      </svg>
    </div>
    <div>
      <h1 class="text-2xl font-bold text-white">Log Aktivitas</h1>
      <p class="text-blue-100 text-sm mt-1">Pantau semua aktivitas dan perubahan dalam sistem</p>
    </div>
  </div>
@endsection

@if ($logs->count() > 0)
  @section('table')
    <table class="w-full min-w-[800px] text-sm">
      <thead class="bg-gradient-to-r from-slate-50 to-slate-100 border-b border-slate-200">
        <tr>
          <th class="py-4 px-6 text-left font-semibold text-slate-700">Waktu</th>
          <th class="py-4 px-6 text-left font-semibold text-slate-700">User</th>
          <th class="py-4 px-6 text-left font-semibold text-slate-700">Aksi</th>
          <th class="py-4 px-6 text-left font-semibold text-slate-700">Deskripsi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        @foreach($logs as $log)
        <tr class="hover:bg-blue-50/50 transition-colors duration-200">
          <td class="py-4 px-6">
            <div class="text-slate-900 font-medium">
              {{ $log->created_at ? $log->created_at->format('d/m/Y H:i:s') : '-' }}
            </div>
            @if($log->created_at)
            <div class="text-xs text-slate-500 mt-1">
              {{ $log->created_at->diffForHumans() }}
            </div>
            @endif
          </td>
          <td class="py-4 px-6">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                {{ $log->user ? strtoupper(substr($log->user->name, 0, 1)) : 'U' }}
              </div>
              <div>
                <div class="font-medium text-slate-900">{{ $log->user->name ?? '-' }}</div>
                @if($log->user && $log->user->email)
                <div class="text-xs text-slate-500">{{ $log->user->email }}</div>
                @endif
              </div>
            </div>
          </td>
          <td class="py-4 px-6">
            @if($log->action)
              @php
                $actionConfig = [
                  'create' => ['bg-emerald-100 text-emerald-800 border-emerald-200', 'Create'],
                  'update' => ['bg-blue-100 text-blue-800 border-blue-200', 'Update'],
                  'delete' => ['bg-red-100 text-red-800 border-red-200', 'Delete'],
                  'login' => ['bg-green-100 text-green-800 border-green-200', 'Login'],
                  'logout' => ['bg-orange-100 text-orange-800 border-orange-200', 'Logout'],
                  'approve' => ['bg-purple-100 text-purple-800 border-purple-200', 'Approve'],
                  'reject' => ['bg-pink-100 text-pink-800 border-pink-200', 'Reject']
                ];
                $config = $actionConfig[strtolower($log->action)] ?? ['bg-slate-100 text-slate-800 border-slate-200', ucfirst($log->action)];
              @endphp
              <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold border {{ $config[0] }}">
                {{ $config[1] }}
              </span>
            @else
              <span class="text-slate-400">-</span>
            @endif
          </td>
          <td class="py-4 px-6">
            <div class="text-slate-700 max-w-md">
              {{ $log->description ?? '-' }}
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endsection

  @if(method_exists($logs, 'links') && $logs->hasPages())
    @section('actions')
      <div class="flex justify-center">
        {{ $logs->links('vendor.pagination.tailwind') }}
      </div>
    @endsection
  @endif
@else
  @section('table')
    <div class="text-center py-16 px-8">
      <div class="mx-auto w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-6">
        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-slate-900 mb-2">Belum ada log aktivitas</h3>
      <p class="text-slate-600 mb-6">
        Sistem belum mencatat aktivitas apapun. Log akan muncul ketika ada aktivitas pengguna.
      </p>
    </div>
  @endsection
@endif