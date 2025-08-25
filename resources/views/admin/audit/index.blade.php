@extends('layouts.table-layout')

@section('title', '')

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
body { font-family: 'Inter', sans-serif; }

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(24px);}
  to { opacity: 1; transform: none;}
}
.animate-fadeIn {
  animation: fadeIn 0.7s cubic-bezier(.4,1.4,.7,1) both;
}

.audit-card {
  transition: all 0.2s;
}
.audit-card:hover {
  box-shadow: 0 12px 32px -4px rgba(59,130,246,0.10), 0 4px 8px -4px rgba(0,0,0,0.04);
  transform: translateY(-2px) scale(1.01);
}
.audit-table tbody tr:hover {
  background: linear-gradient(90deg, #eff6ff 0%, #dbeafe 100%);
  transition: background 0.2s;
}
.badge {
  box-shadow: 0 1px 2px 0 rgb(59 130 246 / 0.05);
  letter-spacing: 0.03em;
  font-size: 0.85rem;
  padding: 0.45rem 1rem;
}
.audit-title {
  font-size: 2.25rem;
  font-weight: 800;
  letter-spacing: -0.01em;
}

/* ===== MODERN DESIGN SYSTEM ===== */
:root {
  --primary-50: #eff6ff;
  --primary-100: #dbeafe;
  --primary-500: #3b82f6;
  --primary-600: #2563eb;
  --primary-700: #1d4ed8;
  --success-50: #f0fdf4;
  --success-500: #22c55e;
  --warning-50: #fffbeb;
  --warning-500: #f59e0b;
  --gray-50: #f9fafb;
  --gray-100: #f3f4f6;
  --gray-200: #e5e7eb;
  --gray-300: #d1d5db;
  --gray-400: #9ca3af;
  --gray-500: #6b7280;
  --gray-600: #4b5563;
  --gray-700: #374151;
  --gray-800: #1f2937;
  --gray-900: #111827;
  --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  --radius-lg: 12px;
  --radius-xl: 16px;
}

/* ===== LAYOUT & CONTAINERS ===== */
.audit-page {
  min-height: 100vh;
  background: linear-gradient(135deg, var(--primary-50) 0%, var(--gray-50) 100%);
  border-radius: 2.2rem;
  box-shadow: 0 6px 32px 0 rgba(59,130,246,0.06);
}

.audit-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 2rem 1rem;
  border-radius: 2.2rem;
}

.audit-card {
  background: white;
  border-radius: var(--radius-xl);
  box-shadow: var(--shadow-lg);
  overflow: hidden;
  border: 1px solid var(--gray-200);
}

/* ===== HEADER SECTION ===== */
.audit-header {
  background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-700) 100%);
  padding: 2rem;
  position: relative;
  overflow: hidden;
}

.audit-header::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 200px;
  height: 200px;
  background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
  border-radius: 50%;
  transform: translate(50%, -50%);
}

.audit-title {
  color: white;
  font-size: 1.875rem;
  font-weight: 700;
  margin: 0;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  position: relative;
  z-index: 1;
}

.audit-subtitle {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1rem;
  margin-top: 0.5rem;
  position: relative;
  z-index: 1;
}

.audit-stats {
  display: flex;
  gap: 2rem;
  margin-top: 1.5rem;
  position: relative;
  z-index: 1;
}

.stat-item {
  color: white;
  text-align: center;
}

.stat-number {
  font-size: 1.5rem;
  font-weight: 700;
  display: block;
}

.stat-label {
  font-size: 0.875rem;
  opacity: 0.8;
}

/* ===== SEARCH & FILTER SECTION ===== */
.search-section {
  padding: 2rem;
  background: var(--gray-50);
  border-bottom: 1px solid var(--gray-200);
}

.search-form {
  display: grid;
  grid-template-columns: 1fr;
  gap: 1.5rem;
  align-items: end;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.form-label {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--gray-700);
}

.form-input, .form-select {
  padding: 0.75rem 1rem;
  border: 2px solid var(--gray-200);
  border-radius: var(--radius-lg);
  font-size: 1rem;
  transition: all 0.2s ease;
  background: white;
  width: 100%;
  box-sizing: border-box;
}

.form-input:focus, .form-select:focus {
  outline: none;
  border-color: var(--primary-500);
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.search-input-wrapper {
  position: relative;
}

.search-input-wrapper .search-icon {
  position: absolute;
  left: 1rem;
  top: 50%;
  transform: translateY(-50%);
  color: var(--gray-400);
  z-index: 2;
}

.search-input-wrapper .form-input {
  padding-left: 3rem;
}

.form-select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
  background-position: right 1rem center;
  background-repeat: no-repeat;
  background-size: 1.25rem;
  padding-right: 3rem;
}

.form-actions {
  display: flex;
  gap: 1rem;
}

.btn {
  padding: 0.75rem 1.5rem;
  border-radius: var(--radius-lg);
  font-weight: 600;
  font-size: 0.875rem;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  text-decoration: none;
  min-height: 48px;
}

.btn-primary {
  background: var(--primary-500);
  color: white;
}

.btn-primary:hover {
  background: var(--primary-600);
  transform: translateY(-1px);
  box-shadow: var(--shadow-md);
}

.btn-secondary {
  background: white;
  color: var(--gray-600);
  border: 2px solid var(--gray-200);
}

.btn-secondary:hover {
  background: var(--gray-50);
  border-color: var(--gray-300);
  color: var(--gray-700);
}

/* ===== TABLE SECTION ===== */
.table-section {
  overflow: hidden;
}

.table-wrapper {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.audit-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  min-width: 1200px;
}

.audit-table thead th {
  background: var(--gray-50);
  color: var(--gray-700);
  font-weight: 600;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 1rem 0.75rem;
  text-align: left;
  border-bottom: 2px solid var(--gray-200);
  white-space: nowrap;
  position: sticky;
  top: 0;
  z-index: 10;
}

.audit-table tbody td {
  padding: 1rem 0.75rem;
  border-bottom: 1px solid var(--gray-100);
  color: var(--gray-700);
  vertical-align: top;
}

.audit-table tbody tr {
  transition: all 0.2s ease;
}

.audit-table tbody tr:hover {
  background: var(--primary-50);
}

.audit-table tbody tr:last-child td {
  border-bottom: none;
}

/* ===== BADGES & STATUS ===== */
.badge {
  display: inline-flex;
  align-items: center;
  gap: 0.25rem;
  padding: 0.375rem 0.75rem;
  border-radius: 9999px;
  font-size: 0.75rem;
  font-weight: 600;
  white-space: nowrap;
}

.badge-created {
  background: var(--success-50);
  color: var(--success-500);
  border: 1px solid rgba(34, 197, 94, 0.2);
}

.badge-updated {
  background: var(--warning-50);
  color: var(--warning-500);
  border: 1px solid rgba(245, 158, 11, 0.2);
}

.badge-returned {
  background: var(--primary-50);
  color: var(--primary-500);
  border: 1px solid rgba(59, 130, 246, 0.2);
}

/* ===== DATA CELLS ===== */
.vehicle-info {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.vehicle-name {
  font-weight: 600;
  color: var(--gray-900);
}

.vehicle-plate {
  font-size: 0.75rem;
  color: var(--gray-500);
  background: var(--gray-100);
  padding: 0.125rem 0.5rem;
  border-radius: 0.375rem;
  display: inline-block;
  width: fit-content;
}

.user-info {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.user-name {
  font-weight: 600;
  color: var(--gray-900);
}

.user-details {
  font-size: 0.75rem;
  color: var(--gray-500);
}

.time-info {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.875rem;
  color: var(--gray-600);
}

.changes-list {
  max-width: 300px;
}

.change-item {
  font-size: 0.75rem;
  margin-bottom: 0.5rem;
  padding: 0.5rem;
  background: var(--gray-50);
  border-radius: 0.375rem;
  border-left: 3px solid var(--primary-500);
}

.change-field {
  font-weight: 600;
  color: var(--gray-700);
}

.change-values {
  margin-top: 0.25rem;
}

.change-old {
  color: #dc2626;
  text-decoration: line-through;
}

.change-new {
  color: var(--success-500);
  font-weight: 600;
}

/* ===== EMPTY STATE ===== */
.empty-state {
  text-align: center;
  padding: 4rem 2rem;
  color: var(--gray-500);
}

.empty-icon {
  font-size: 3rem;
  color: var(--gray-300);
  margin-bottom: 1rem;
}

.empty-title {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--gray-700);
  margin-bottom: 0.5rem;
}

.empty-description {
  font-size: 0.875rem;
  color: var(--gray-500);
}

/* ===== PAGINATION ===== */
.pagination-wrapper {
  padding: 1.5rem 2rem;
  border-top: 1px solid var(--gray-200);
  background: var(--gray-50);
  display: flex;
  justify-content: center;
}

/* ===== RESPONSIVE DESIGN ===== */
@media (min-width: 768px) {
  .search-form {
    grid-template-columns: 2fr 1fr auto;
    align-items: end;
  }
  
  .audit-container {
    padding: 2rem;
  }
  
  .audit-stats {
    gap: 3rem;
  }
}

@media (min-width: 1024px) {
  .search-form {
    grid-template-columns: 2fr 1fr auto;
  }
  
  .form-actions {
    min-width: 200px;
  }
}

@media (max-width: 767px) {
  .audit-container {
    padding: 1rem 0.5rem;
  }
  
  .audit-header {
    padding: 1.5rem 1rem;
  }
  
  .audit-title {
    font-size: 1.5rem;
  }
  
  .audit-stats {
    flex-direction: column;
    gap: 1rem;
    text-align: left;
  }
  
  .stat-item {
    text-align: left;
  }
  
  .search-section {
    padding: 1.5rem 1rem;
  }
  
  .form-actions {
    flex-direction: column;
  }
  
  .audit-table thead th {
    padding: 0.75rem 0.5rem;
    font-size: 0.625rem;
  }
  
  .audit-table tbody td {
    padding: 0.75rem 0.5rem;
    font-size: 0.875rem;
  }
  
  .vehicle-info, .user-info {
    gap: 0.125rem;
  }
  
  .changes-list {
    max-width: 200px;
  }
}

@media (max-width: 480px) {
  .audit-container {
    padding: 0.5rem 0.25rem;
  }
  
  .audit-card {
    border-radius: var(--radius-lg);
    margin: 0 0.25rem;
  }
  
  .audit-header {
    padding: 1rem;
  }
  
  .audit-title {
    font-size: 1.25rem;
  }
  
  .search-section {
    padding: 1rem;
  }
  
  .audit-table {
    min-width: 800px;
  }
  
  .audit-table thead th {
    padding: 0.5rem 0.25rem;
  }
  
  .audit-table tbody td {
    padding: 0.5rem 0.25rem;
  }
}

/* ===== LOADING STATES ===== */
.loading-skeleton {
  background: linear-gradient(90deg, var(--gray-200) 25%, var(--gray-100) 50%, var(--gray-200) 75%);
  background-size: 200% 100%;
  animation: loading 1.5s infinite;
}

@keyframes loading {
  0% { background-position: 200% 0; }
  100% { background-position: -200% 0; }
}

/* ===== ACCESSIBILITY ===== */
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

/* Hapus CSS statistik card */
.audit-stats-modern, .stat-modern { display: none !important; }
.form-input::placeholder {
  text-align: center;
}
.form-input::-webkit-input-placeholder {
  text-align: center;
}
.form-input:-moz-placeholder {
  text-align: center;
}
.form-input::-moz-placeholder {
  text-align: center;
}
.form-input:-ms-input-placeholder {
  text-align: center;
}
</style>

@section('header')
  <h1 class="text-2xl font-bold text-white flex items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    Audit Trail Peminjaman Kendaraan
  </h1>
  <p class="text-blue-100 text-sm mt-1">Pantau semua aktivitas peminjaman kendaraan dinas secara real-time</p>
@endsection

@section('filters')
  <form method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-end">
    <div>
  <label for="search" class="block text-sm font-medium text-slate-700 mb-2">Cari Nama Pengguna </label>
      <div class="relative">
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </span>
        <input type="text" id="search" name="search" value="{{ request('search') }}"
          class="w-full pl-12 pr-4 py-2 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-slate-50 focus:bg-white transition-all duration-200"
          placeholder="Cari nama atau email...">
      </div>
    </div>
    <div>
      <label for="aksi" class="block text-sm font-medium text-slate-700 mb-2">Filter Aksi</label>
      <select name="aksi" id="aksi"
        class="w-full px-4 py-2 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-slate-50 focus:bg-white transition-all duration-200">
        <option value="">Semua Aksi</option>
        <option value="create" {{ request('aksi') == 'create' ? 'selected' : '' }}>Peminjaman Baru</option>
        <option value="update" {{ request('aksi') == 'update' ? 'selected' : '' }}>Perubahan Data</option>
        <option value="returned" {{ request('aksi') == 'returned' ? 'selected' : '' }}>Pengembalian</option>
      </select>
    </div>
    <div>
      <label for="date_from" class="block text-sm font-medium text-slate-700 mb-2">Dari Tanggal</label>
      <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}"
        class="w-full px-4 py-2 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-slate-50 focus:bg-white transition-all duration-200">
    </div>
    <div>
      <label for="date_to" class="block text-sm font-medium text-slate-700 mb-2">Sampai Tanggal</label>
      <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}"
        class="w-full px-4 py-2 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-slate-50 focus:bg-white transition-all duration-200">
    </div>
    <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-200 col-span-full">
      <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:-translate-y-0.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        Cari Data
      </button>
      <a href="{{ route('admin.audit.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 text-slate-700 rounded-xl text-sm font-semibold shadow hover:bg-slate-200 transition-all duration-200">
        Reset
      </a>
    </div>
  </form>
@endsection

@section('table')
  <table class="w-full min-w-[1200px] text-sm">
    <thead class="bg-gradient-to-r from-slate-50 to-slate-100 border-b border-slate-200">
      <tr>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">No</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">Waktu</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">User</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">Aksi</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">Tipe Data</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">ID Data</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">Data Sebelum</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">Data Sesudah</th>
        <th class="py-4 px-4 text-left font-semibold text-slate-700">Deskripsi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      @forelse($audits as $audit)
        <tr>
          <td class="py-4 px-4">{{ ($audits->currentPage() - 1) * $audits->perPage() + $loop->iteration }}</td>
          <td class="py-4 px-4">{{ $audit->created_at }}</td>
          <td class="py-4 px-4">{{ $audit->user->name ?? '-' }}</td>
          <td class="py-4 px-4">{{ $audit->action }}</td>
          <td class="py-4 px-4">{{ $audit->auditable_type }}</td>
          <td class="py-4 px-4">{{ $audit->auditable_id }}</td>
          <td class="py-4 px-4">
            @if(is_array($audit->old_values) && count($audit->old_values) > 1)
                <ul class="text-xs">
                    @foreach($audit->old_values as $item)
                        <li>
                            ID: {{ $item['id'] ?? '-' }},
                            Nama: {{ $item['vehicle_name'] ?? '-' }},
                            User: {{ $item['user_id'] ?? '-' }},
                            Status: {{ $item['status'] ?? '-' }}
                        </li>
                    @endforeach
                </ul>
            @elseif(is_array($audit->old_values) && count($audit->old_values) == 1)
                ID: {{ $audit->old_values[0]['id'] ?? '-' }},
                Nama: {{ $audit->old_values[0]['vehicle_name'] ?? '-' }},
                User: {{ $audit->old_values[0]['user_id'] ?? '-' }},
                Status: {{ $audit->old_values[0]['status'] ?? '-' }}
            @elseif(is_array($audit->old_values))
                ID: {{ $audit->old_values['id'] ?? '-' }},
                Nama: {{ $audit->old_values['vehicle_name'] ?? '-' }},
                User: {{ $audit->old_values['user_id'] ?? '-' }},
                Status: {{ $audit->old_values['status'] ?? '-' }}
            @else
                -
            @endif
          </td>
          <td class="py-4 px-4">
            @php
              $nv = $audit->new_values;
              $fields = [
                'id' => is_array($nv) ? ($nv['id'] ?? (isset($nv[0]['id']) ? $nv[0]['id'] : '-')) : '-',
                'vehicle_name' => is_array($nv) ? ($nv['vehicle_name'] ?? (isset($nv[0]['vehicle_name']) ? $nv[0]['vehicle_name'] : '-')) : '-',
                'user_id' => is_array($nv) ? ($nv['user_id'] ?? (isset($nv[0]['user_id']) ? $nv[0]['user_id'] : '-')) : '-',
                'status' => is_array($nv) ? ($nv['status'] ?? (isset($nv[0]['status']) ? $nv[0]['status'] : '-')) : '-',
              ];
              $allEmpty = collect($fields)->every(fn($v) => $v === '-');
            @endphp
            @if($allEmpty)
              -
            @else
              ID: {{ $fields['id'] }}, Nama: {{ $fields['vehicle_name'] }}, User: {{ $fields['user_id'] }}, Status: {{ $fields['status'] }}
            @endif
          </td>
          <td class="py-4 px-4">{{ $audit->description }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="9" class="py-4 px-4 text-center">
            <div class="empty-state">
              <div class="empty-icon">
                <i class="bi bi-inbox"></i>
              </div>
              <div class="empty-title">Tidak ada data audit</div>
              <div class="empty-description">
                @if(request('search') || request('aksi'))
                  Tidak ditemukan hasil untuk kriteria pencarian yang diberikan.
                  <br>Coba gunakan kata kunci yang berbeda atau reset filter.
                @else
                  Belum ada aktivitas audit yang tercatat.
                @endif
              </div>
            </div>
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>
  @if($audits->hasPages())
    <div class="pagination-wrapper pagination flex justify-center pb-6">
      {{ $audits->onEachSide(2)->links('vendor.pagination.tailwind') }}
    </div>
  @endif
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Enhanced search functionality
  const searchInput = document.getElementById('search');
  const searchForm = searchInput?.closest('form');
  
  if (searchInput && searchForm) {
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(() => {
        if (this.value.length >= 3 || this.value.length === 0) {
          // Auto-submit after 500ms of no typing
          // searchForm.submit();
        }
      }, 500);
    });
  }
  
  // Enhanced table interactions
  const tableRows = document.querySelectorAll('.audit-table tbody tr');
  
  tableRows.forEach(row => {
    row.addEventListener('click', function(e) {
      // Add click feedback
      if (!e.target.closest('a, button')) {
        this.style.transform = 'scale(0.995)';
        setTimeout(() => {
          this.style.transform = '';
        }, 150);
      }
    });
  });
  
  // Smooth scroll for pagination
  const paginationLinks = document.querySelectorAll('.pagination a');
  
  paginationLinks.forEach(link => {
    link.addEventListener('click', function() {
      document.querySelector('.audit-header').scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    });
  });
});
</script>