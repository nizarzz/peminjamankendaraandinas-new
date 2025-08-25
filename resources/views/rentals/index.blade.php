@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient-primary text-white py-3 rounded-top-4 d-flex align-items-center justify-content-between">
    <h3 class="mb-0 d-flex align-items-center">
        <i class="bi bi-car-front-fill me-2"></i> Daftar Peminjaman Kendaraan
    </h3>

    <a href="{{ route('user.home') }}" 
       class="btn btn-outline-light btn-sm d-flex align-items-center px-3" title="Kembali">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

        <div class="card-body p-4">
            <!-- Filter & Search Modern -->
            <form method="GET" class="row g-2 align-items-end mb-4 modern-filter-form p-3 rounded-3 shadow-sm bg-white border">
                <div class="col-md-3 position-relative">
                    <label class="form-label mb-1">Cari Tujuan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Cari tujuan peminjaman...">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label mb-1">Status</label>
                    <select name="status" class="form-select modern-status-select">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>🟡 Pending</option>
                        <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>🟢 Disetujui</option>
                        <option value="rejected" {{ request('status')=='rejected' ? 'selected' : '' }}>🔴 Ditolak</option>
                        <option value="returned" {{ request('status')=='returned' ? 'selected' : '' }}>🔵 Dikembalikan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label mb-1">Kendaraan</label>
                    <select name="vehicle_id" class="form-select">
                        <option value="">Semua Kendaraan</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ request('vehicle_id')==$vehicle->id ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 position-relative">
                    <label class="form-label mb-1">Dari Tanggal</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-calendar"></i></span>
                        <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control border-start-0">
                    </div>
                </div>
                <div class="col-md-2 position-relative">
                    <label class="form-label mb-1">Sampai Tanggal</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-calendar2-week"></i></span>
                        <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control border-start-0">
                    </div>
                </div>
                <div class="col-12 col-md-auto mt-2 mt-md-0">
                    <button type="submit" class="btn btn-success w-100 shadow-sm"><i class="bi bi-funnel"></i> Filter</button>
                </div>
                <div class="col-12 col-md-auto mt-2 mt-md-0">
                    <a href="{{ route('rentals.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
            </form>
            <!-- END Filter & Search Modern -->
            <div class="table-container-wrapper">
                <table class="table table-hover align-middle table-bordered table-striped text-center mb-0 responsive-rental-table">
                    <thead class="table-primary text-center text-uppercase align-middle">
                        <tr>
                            <th scope="col" style="width: 4%;">#</th>
                            <th scope="col" style="min-width: 120px;">Nama Kendaraan</th>
                            <th scope="col" style="min-width: 120px;">Nama Peminjam</th>
                            <th scope="col" style="min-width: 120px;">Tanggal Peminjaman</th>
                            <th scope="col" style="min-width: 120px;">Tanggal Pengembalian</th>
                            <th scope="col" style="min-width: 120px;">Tujuan</th>
                            <th scope="col" style="min-width: 100px;">Status</th>
                            <th scope="col" style="min-width: 90px;">KM Awal</th>
                            <th scope="col" style="min-width: 90px;">KM Akhir</th>
                            <th scope="col" style="min-width: 150px;">Alasan Penolakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rentals as $rental)
                            <tr class="align-middle text-center">
                                <td class="fw-semibold">{{ $loop->iteration }}</td>
                                <td>{{ $rental->vehicle?->name ?? '-' }}</td>
                                <td>{{ $rental->user?->name ?? '-' }}</td>
                                <td>{{ $rental->time_out ? \Carbon\Carbon::parse($rental->time_out)->format('d-m-Y H:i') : '-' }}</td>
                                <td>{{ $rental->time_in ? \Carbon\Carbon::parse($rental->time_in)->format('d-m-Y H:i') : '-' }}</td>
                                <td>{{ $rental->purpose ?? '-' }}</td>
                                <td>
                                    @if($rental->status === 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($rental->status === 'rejected')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif($rental->status === 'returned')
                                        <span class="badge bg-primary">Dikembalikan</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $rental->start_kilometer ?? '-' }}</td>
                                <td>{{ $rental->end_kilometer ?? '-' }}</td>
                                <td>
                                    @if($rental->status === 'rejected')
                                        {{ $rental->rejection_reason ?? '-' }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4 fst-italic">Tidak ada data peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Modern Pagination -->
            <div class="mt-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <div class="text-muted small mb-2 mb-md-0">
                    Menampilkan <b>{{ $rentals->firstItem() }}</b> - <b>{{ $rentals->lastItem() }}</b> dari <b>{{ $rentals->total() }}</b> data
                </div>
                <nav aria-label="Modern pagination">
                    <ul class="pagination modern-pagination mb-0">
                        {{-- Previous Page Link --}}
                        @if ($rentals->onFirstPage())
                            <li class="page-item disabled"><span class="page-link"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg></span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $rentals->previousPageUrl() }}" rel="prev"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg></a></li>
                        @endif
                        {{-- Pagination Elements --}}
                        @foreach ($rentals->getUrlRange(max($rentals->currentPage()-1,1), min($rentals->currentPage()+1,$rentals->lastPage())) as $page => $url)
                            @if ($page == $rentals->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                        {{-- Next Page Link --}}
                        @if ($rentals->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $rentals->nextPageUrl() }}" rel="next"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></span></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <!-- END Modern Pagination -->
        </div>

        
    </div>
</div>

<style>
/* Membatasi seluruh halaman agar tidak overflow horizontal */
body {
    overflow-x: hidden;
}

/* Bungkus tabel agar bisa scroll horizontal */
.table-container-wrapper {
    width: 100%;
    overflow-x: auto;
}

/* Hindari card ikut melebar */
.card {
    max-width: 100%;
    overflow-x: hidden;
    word-wrap: break-word;
}

/* Responsive min-width hanya di desktop */
.responsive-rental-table {
    min-width: 700px;
}
@media (max-width: 991.98px) {
    .responsive-rental-table {
        min-width: 600px;
    }
}
@media (max-width: 767.98px) {
    .responsive-rental-table {
        min-width: unset;
        width: 100%;
    }
    .table-container-wrapper table {
        font-size: 13px;
    }
    .table-container-wrapper th, .table-container-wrapper td {
        padding: 0.4rem 0.3rem;
    }
}
@media (max-width: 575.98px) {
    .responsive-rental-table {
        min-width: unset;
        width: 100%;
    }
    .table-container-wrapper table {
        font-size: 12px;
    }
    .table-container-wrapper th, .table-container-wrapper td {
        padding: 0.3rem 0.2rem;
    }
}

/* Modern Pagination Custom */
.pagination.modern-pagination {
    --bs-pagination-padding-x: 1.1rem;
    --bs-pagination-padding-y: 0.6rem;
    --bs-pagination-font-size: 1.15rem;
    --bs-pagination-border-radius: 1.2rem;
    --bs-pagination-color: #009639;
    --bs-pagination-bg: #fff;
    --bs-pagination-border-color: #e0e0e0;
    --bs-pagination-hover-bg: #e6f5ec;
    --bs-pagination-hover-color: #007a2f;
    --bs-pagination-active-bg: #009639;
    --bs-pagination-active-color: #fff;
    --bs-pagination-active-border-color: #009639;
    gap: 0.6rem;
    box-shadow: 0 2px 12px rgba(0,150,57,0.07);
}
.pagination.modern-pagination .page-link {
    border-radius: 1.2rem !important;
    transition: all 0.2s;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 2.5rem;
    min-height: 2.5rem;
}
.pagination.modern-pagination .page-item.active .page-link {
    box-shadow: 0 2px 12px rgba(0,150,57,0.13);
}
.pagination.modern-pagination .page-link:focus {
    box-shadow: 0 0 0 0.18rem #00963933;
}
.modern-filter-form {
    background: #fff;
    border: 1.5px solid #e0e0e0;
    box-shadow: 0 2px 12px rgba(0,150,57,0.06);
}
.modern-status-select option {
    font-weight: 600;
}
</style>

<!-- CSS Tambahan untuk Responsif PC & Mobile -->
<style>
/* Sticky table header di mobile */
@media (max-width: 767.98px) {
    .responsive-rental-table thead th {
        position: sticky;
        top: 0;
        background: linear-gradient(90deg, #00c853 0%, #43e97b 100%) !important;
        color: #fff !important;
        border-color: #43e97b !important;
        z-index: 2;
    }
}

/* Perbaikan form filter di mobile */
@media (max-width: 575.98px) {
    .modern-filter-form .form-label {
        font-size: 13px;
    }
    .modern-filter-form .form-control,
    .modern-filter-form .form-select {
        font-size: 13px;
        padding: 0.3rem 0.4rem;
    }
    .modern-filter-form .input-group-text {
        font-size: 13px;
        padding: 0.3rem 0.4rem;
    }
    .modern-filter-form {
        padding: 1rem 0.5rem;
    }
}

/* Card responsif */
@media (max-width: 575.98px) {
    .card {
        border-radius: 1rem !important;
        box-shadow: 0 1px 6px rgba(0,0,0,0.07);
    }
    .card-header {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 0.5rem;
    }
}

/* Tombol responsif */
@media (max-width: 575.98px) {
    .btn {
        font-size: 13px;
        padding: 0.4rem 0.7rem;
    }
}

/* Pagination responsif */
@media (max-width: 575.98px) {
    .pagination.modern-pagination .page-link {
        min-width: 2rem;
        min-height: 2rem;
        font-size: 1rem;
        padding: 0.3rem 0.5rem;
    }
}
</style>

@endsection

