@extends('layouts.main')

@section('content')
<div class="min-vh-100 d-flex align-items-center py-5" style="background-color: #f0fdf4;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <!-- Card Header with Green Gradient -->
                    <div class="card-header py-4 text-center" style="background: linear-gradient(135deg, #16a34a 0%, #047857 100%);">
                        <div class="mb-3">
                            <div class="bg-white/20 d-inline-flex p-3 rounded-circle mb-3 shadow" style="backdrop-filter: blur(5px);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z"/>
                                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.965-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z"/>
                                </svg>
                            </div>
                            <h2 class="h3 fw-bold mb-2 text-white">Form Peminjaman Kendaraan</h2>
                            <p class="mb-0 text-white/80">
                                Isi form berikut untuk mengajukan peminjaman kendaraan
                            </p>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form action="{{ route('rentals.store') }}" method="POST">
                            @csrf

                            <!-- Nama Peminjam -->
                            <div class="mb-4">
                                <label for="borrower_name" class="form-label fw-medium text-gray-700">Nama Peminjam</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-green-50 border-end-0 pe-1">
                                        <i class="bi bi-person-fill text-green-600"></i>
                                    </span>
                                    <input type="text" id="borrower_name" name="borrower_name" value="{{ auth()->user()->name }}"
                                        class="form-control border-start-0 ps-2 bg-green-50 rounded-end"
                                        style="height: 46px;"
                                        readonly>
                                </div>
                            </div>

                            <!-- Pilih Kendaraan -->
                            <div class="mb-4">
                                <label for="vehicle_id" class="form-label fw-medium text-gray-700">Pilih Kendaraan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-green-50 border-end-0 pe-1">
                                        <i class="bi bi-truck-front-fill text-green-600"></i>
                                    </span>
                                    <select id="vehicle_id" name="vehicle_id" 
                                        class="form-select border-start-0 ps-2 bg-green-50 rounded-end"
                                        style="height: 46px;"
                                        required>
                                        <option value="" disabled selected>-- Pilih Kendaraan --</option>
                                        @foreach($availableVehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}">{{ $vehicle->name }} ({{ $vehicle->license_plate }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Date and Time Picker -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="date" class="form-label fw-medium text-gray-700">Tanggal Peminjaman</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-green-50 border-end-0 pe-1">
                                            <i class="bi bi-calendar-fill text-green-600"></i>
                                        </span>
                                        <input type="date" id="date" name="date" 
                                            class="form-control border-start-0 ps-2 bg-green-50 rounded-end"
                                            style="height: 46px;"
                                            min="{{ date('Y-m-d') }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="time_out" class="form-label fw-medium text-gray-700">Jam Keluar</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-green-50 border-end-0 pe-1">
                                            <i class="bi bi-clock-fill text-green-600"></i>
                                        </span>
                                        <input type="time" id="time_out" name="time_out" 
                                            class="form-control border-start-0 ps-2 bg-green-50 rounded-end"
                                            style="height: 46px;"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Purpose -->
                            <div class="mb-4">
                                <label for="purpose" class="form-label fw-medium text-gray-700">Keperluan Peminjaman</label>
                                <textarea id="purpose" name="purpose" rows="4" placeholder="Contoh: Dinas luar, keperluan rapat, antar barang, dll."
                                    class="form-control p-3 bg-green-50"
                                    style="border-radius: 8px; min-height: 120px; border: 1px solid #d1fae5;"
                                    required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mt-4">
                                <div class="row g-2 flex-column flex-md-row">
                                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                                        <button type="submit" class="btn btn-success btn-md btn-lg-mobile fw-semibold rounded-3 shadow-sm w-100"
                                                style="background: linear-gradient(135deg, #16a34a 0%, #047857 100%); border: none;">
                                            <i class="bi bi-send-check-fill me-2"></i> Ajukan Peminjaman
                                        </button>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <a href="{{ route('user.home') }}" class="btn btn-danger btn-md btn-lg-mobile fw-semibold rounded-3 shadow-sm w-100">
                                            <i class="bi bi-x-circle me-2"></i> Batal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        border-color: #16a34a;
        box-shadow: 0 0 0 0.25rem rgba(22, 163, 74, 0.25);
        background-color: white;
    }
    .input-group-text {
        transition: all 0.3s ease;
    }
    .form-control, .form-select {
        transition: all 0.3s ease;
    }
    .card {
        border: 1px solid #d1fae5;
    }
    .overflow-x-auto {
      overflow-x: scroll !important;
    }
    @media (max-width: 767.98px) {
        .card {
            margin: 0 8px;
        }
        .btn-lg-mobile {
            font-size: 1rem;
            padding: 0.75rem 1rem;
        }
    }
    @media (max-width: 575.98px) {
        .card {
            margin: 0 2px;
        }
        .btn-lg-mobile {
            font-size: 0.95rem;
            padding: 0.6rem 0.8rem;
        }
    }
    @media (min-width: 768px) {
        .btn-lg-mobile {
            font-size: 0.92rem;
            padding: 0.4rem 0.8rem;
        }
    }
    .form-select {
        max-width: 100%;
        width: 100%;
        box-sizing: border-box;
    }
    .input-group {
        width: 100%;
    }
</style>

<script>
    // Set minimum time to current time if today is selected
    document.getElementById('date').addEventListener('change', function() {
        const timeInput = document.getElementById('time_out');
        const selectedDate = new Date(this.value);
        const today = new Date();
        
        if (selectedDate.toDateString() === today.toDateString()) {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            timeInput.min = `${hours}:${minutes}`;
        } else {
            timeInput.removeAttribute('min');
        }
    });
</script>
@endsection