@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-header bg-gradient bg-success text-white rounded-top-4 text-center py-4">
                    <h4 class="mb-0 fw-bold">Pengembalian Kendaraan</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('rentals.return.selection') }}" method="POST" class="modern-return-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="rental_id" class="form-label fw-semibold">Pilih Kendaraan</label>
                                <select name="rental_id" id="rental_id" class="form-select shadow-sm" required>
                                    <option value="">-- Pilih Kendaraan --</option>
                                    @forelse($rentals as $rental)
                                        <option value="{{ $rental->id }}">
                                            {{ $rental->vehicle->name }} - {{ $rental->vehicle->license_plate }}
                                        </option>
                                    @empty
                                        <option disabled>Tidak ada kendaraan yang sedang dipinjam</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="return_time" class="form-label fw-semibold">Waktu Pengembalian</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-clock-history"></i></span>
                                    <input type="datetime-local" id="return_time" name="return_time" class="form-control shadow-sm border-start-0" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="end_kilometer" class="form-label fw-semibold">Kilometer Akhir</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-speedometer2"></i></span>
                                    <input type="number" id="end_kilometer" name="end_kilometer" class="form-control shadow-sm border-start-0" min="0" required placeholder="Masukkan kilometer akhir kendaraan">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
                            <button type="submit" class="btn btn-success fw-bold shadow-sm modern-btn-action">
                                <i class="bi bi-check-circle me-1"></i> Kembalikan Kendaraan
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary fw-bold shadow-sm modern-btn-action">
                                <i class="bi bi-x-circle me-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const now = new Date();
        const pad = num => String(num).padStart(2, '0');
        const formatted = `${now.getFullYear()}-${pad(now.getMonth()+1)}-${pad(now.getDate())}T${pad(now.getHours())}:${pad(now.getMinutes())}`;
        document.getElementById('return_time').value = formatted;
    });
</script>
@endpush

<style>
.modern-return-form label {
    font-weight: 600;
    color: #009639;
}
.modern-return-form .form-control:focus {
    border-color: #009639;
    box-shadow: 0 0 0 0.15rem #00963933;
}
.modern-return-form .input-group-text {
    background: #e6f5ec;
    color: #009639;
    border-radius: 0.75rem 0 0 0.75rem;
    border-right: 0;
}
.modern-return-form .form-control {
    border-radius: 0 0.75rem 0.75rem 0;
}
@media (max-width: 767.98px) {
    .modern-return-form .input-group-text, .modern-return-form .form-control {
        border-radius: 0.75rem !important;
    }
}
.modern-return-form .btn {
    font-size: 1rem;
    padding-left: 1.2rem;
    padding-right: 1.2rem;
    border-radius: 0.75rem;
}
@media (max-width: 767.98px) {
    .modern-return-form .btn {
        font-size: 0.98rem;
        padding-left: 0.8rem;
        padding-right: 0.8rem;
    }
}
.modern-btn-action {
    min-width: 170px;
    max-width: 240px;
    padding: 0.7rem 1.5rem;
    font-size: 1.08rem;
    border-radius: 1.1rem;
    text-align: center;
    white-space: nowrap;
}
@media (max-width: 767.98px) {
    .modern-btn-action {
        min-width: 120px;
        max-width: 100%;
        font-size: 0.98rem;
        padding: 0.6rem 1rem;
    }
}
</style>

@endsection
