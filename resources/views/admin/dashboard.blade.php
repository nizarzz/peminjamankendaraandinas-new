@extends('layouts.app')

@section('title', '')

@section('content')
<style>
/* Enhanced Animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translate3d(0, 40px, 0);
  }
  to {
    opacity: 1;
    transform: none;
  }
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: .8;
  }
}

@keyframes shimmer {
  0% {
    background-position: -200px 0;
  }
  100% {
    background-position: calc(200px + 100%) 0;
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-10px);
  }
}

/* Animation Classes */
.animate-fadeInUp {
  animation: fadeInUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}

.animate-slideInLeft {
  animation: slideInLeft 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}

.animate-pulse-slow {
  animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-delay-1 { animation-delay: 0.1s; }
.animate-delay-2 { animation-delay: 0.2s; }
.animate-delay-3 { animation-delay: 0.3s; }
.animate-delay-4 { animation-delay: 0.4s; }
.animate-delay-5 { animation-delay: 0.5s; }

/* Modern Glass Effects */
.glass-effect {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
}

.glass-card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.5);
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* Enhanced Hover Effects */
.card-hover {
  transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.card-hover:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.25);
}

.metric-card-hover {
  transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.metric-card-hover:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 40px -8px rgba(0, 0, 0, 0.15);
}

/* Modern Gradients */
.gradient-bg {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
  position: relative;
}

.gradient-bg::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 50%, rgba(255,255,255,0.1) 100%);
  animation: shimmer 3s infinite;
}

.metric-card {
  background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
  border: 1px solid rgba(226, 232, 240, 0.8);
  position: relative;
  overflow: hidden;
}

.metric-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
  transition: left 0.5s;
}

.metric-card:hover::before {
  left: 100%;
}

/* Enhanced Icon Effects */
.icon-glow {
  box-shadow: 0 0 30px rgba(59, 130, 246, 0.4);
  position: relative;
}

.icon-glow::after {
  content: '';
  position: absolute;
  inset: -2px;
  border-radius: inherit;
  background: linear-gradient(45deg, rgba(59, 130, 246, 0.3), rgba(147, 51, 234, 0.3));
  z-index: -1;
  filter: blur(10px);
}

/* Status Badges */
.status-badge {
  position: relative;
  overflow: hidden;
}

.status-badge::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
  transition: left 0.3s;
}

.status-badge:hover::before {
  left: 100%;
}

/* Responsive Improvements */
@media (max-width: 768px) {
  .metric-card {
    padding: 1rem;
  }
  
  .glass-effect {
    backdrop-filter: blur(10px);
  }
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
  .glass-card {
    background: rgba(17, 24, 39, 0.95);
    border: 1px solid rgba(75, 85, 99, 0.5);
  }
  
  .metric-card {
    background: linear-gradient(145deg, #1f2937 0%, #111827 100%);
    border: 1px solid rgba(75, 85, 99, 0.3);
  }
}

/* Loading States */
.loading-shimmer {
  background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
  background-size: 200% 100%;
  animation: shimmer 1.5s infinite;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.05);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(135deg, #667eea, #764ba2);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(135deg, #5a67d8, #6b46c1);
}
</style>

<body class="bg-gradient-to-br from-white via-gray-100 to-gray-200">
  <div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-7xl mx-auto rounded-3xl bg-white shadow-xl p-8">
      <!-- Seluruh isi dashboard di sini -->
        <!-- Enhanced Header with Modern Glassmorphism -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 mb-8 shadow-lg animate-fadeInUp animate-delay-1">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center gap-4 mb-4 md:mb-0">
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-primary-200' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v11a1 1 0 001 1h3m-10 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-white tracking-tight">Dashboard Sistem Peminjaman Kendaraan Dinas</h1>
                        <p class="text-blue-100 mt-1 text-sm md:text-base">Manajemen Data</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Key Metrics with Modern Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">
            <!-- Total Rentals Card -->
            <div class="glass-card rounded-2xl overflow-hidden border border-gray-100/50 animate-fadeInUp animate-delay-2 metric-card-hover">
                <div class="metric-card p-6 h-full flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 text-white mb-4 shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">{{ $totalRentals }}</div>
                        <div class="text-gray-700 text-base font-semibold text-center leading-tight mb-4">Total Peminjaman</div>
                    </div>
                    <a href="{{ route('admin.daftarpeminjaman.index') }}" class="w-full text-center bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Active Rentals Card -->
            <div class="glass-card rounded-2xl overflow-hidden border border-gray-100/50 animate-fadeInUp animate-delay-3 metric-card-hover">
                <div class="metric-card p-6 h-full flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-orange-500 to-orange-600 text-white mb-4 shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-orange-600 to-orange-800 bg-clip-text text-transparent">{{ $activeRentals }}</div>
                        <div class="text-gray-700 text-base font-semibold text-center leading-tight mb-4">Sedang Dipinjam</div>
                    </div>
                    <a href="{{ route('admin.daftarpeminjaman.index', ['status' => 'active']) }}" class="w-full text-center bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-orange-600 hover:to-orange-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Available Vehicles Card -->
            <div class="glass-card rounded-2xl overflow-hidden border border-gray-100/50 animate-fadeInUp animate-delay-4 metric-card-hover">
                <div class="metric-card p-6 h-full flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 text-white mb-4 shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">{{ $availableVehicles }}</div>
                        <div class="text-gray-700 text-base font-semibold text-center leading-tight mb-4">Kendaraan Tersedia</div>
                    </div>
                    <a href="{{ route('vehicles.index', ['status' => 'tersedia']) }}" class="w-full text-center bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Total Users Card -->
            <div class="glass-card rounded-2xl overflow-hidden border border-gray-100/50 animate-fadeInUp animate-delay-5 metric-card-hover">
                <div class="metric-card p-6 h-full flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-purple-500 to-purple-600 text-white mb-4 shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-5a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-purple-600 to-purple-800 bg-clip-text text-transparent">{{ $totalUsers }}</div>
                        <div class="text-gray-700 text-base font-semibold text-center leading-tight mb-4">Total User</div>
                    </div>
                    <a href="{{ route('admin.user.index') }}" class="w-full text-center bg-gradient-to-r from-purple-500 to-purple-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Lihat Detail
                    </a>
                </div>
            </div>

            <!-- Total Pengajuan Card -->
            <div class="glass-card rounded-2xl overflow-hidden border border-gray-100/50 animate-fadeInUp animate-delay-5 metric-card-hover">
                <div class="metric-card p-6 h-full flex flex-col items-center justify-between">
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 rounded-2xl bg-gradient-to-br from-yellow-500 to-yellow-600 text-white mb-4 shadow-lg">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-yellow-600 to-yellow-800 bg-clip-text text-transparent">{{ $totalPengajuan }}</div>
                        <div class="text-gray-700 text-base font-semibold text-center leading-tight mb-4">Menunggu Persetujuan</div>
                    </div>
                    <a href="{{ route('admin.approvals.index') }}" class="w-full text-center bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Charts Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-10">
            <!-- Rental Status Overview -->
            <div class="glass-card rounded-3xl shadow-2xl border border-white/30 p-8 card-hover animate-fadeInUp animate-delay-2">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Status Peminjaman</h3>
                        <p class="text-gray-600 text-sm">Distribusi status peminjaman bulan ini</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-600 animate-pulse"></div>
                        <span class="text-xs text-gray-500 font-medium">Live Data</span>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="rentalOverviewChart"></canvas>
                </div>
            </div>

            <!-- Vehicle Status Distribution -->
            <div class="glass-card rounded-3xl shadow-2xl border border-white/30 p-8 card-hover animate-fadeInUp animate-delay-3">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Status Kendaraan</h3>
                        <p class="text-gray-600 text-sm">Ketersediaan kendaraan saat ini</p>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="vehicleStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Additional Charts -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-10">
            <!-- Top Users Chart -->
            <div class="glass-card rounded-3xl shadow-2xl border border-white/30 p-8 card-hover animate-fadeInUp animate-delay-4">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Pengguna Teraktif</h3>
                        <p class="text-gray-600 text-sm">Top 5 peminjam kendaraan</p>
                    </div>
                </div>
                <div class="h-80">
                    <div id="topUserChart"></div>
                </div>
            </div>

            <!-- Daily Rentals Chart -->
            <div class="glass-card rounded-3xl shadow-2xl border border-white/30 p-8 card-hover animate-fadeInUp animate-delay-5">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Peminjaman Harian</h3>
                        <p class="text-gray-600 text-sm">Tren peminjaman 7 hari terakhir</p>
                    </div>
                </div>
                <div class="h-80">
                    <div id="rentalByDayChart"></div>
                </div>
            </div>
        </div>

        <!-- Enhanced Recent Activity -->
        <div class="relative">
            <!-- Card Aktivitas Terbaru -->
            <div class="glass-card rounded-3xl shadow-2xl border border-white/30 overflow-hidden animate-fadeInUp animate-delay-4 relative z-10">
                <div class="px-8 py-6 border-b border-gray-100/50 bg-gradient-to-r from-gray-50/50 to-white/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-1">Aktivitas Terbaru</h3>
                            <p class="text-gray-600 text-sm">Peminjaman dan pengembalian terkini</p>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            Real-time
                        </div>
                    </div>
                </div>
                <div class="divide-y divide-gray-100/50">
                    @forelse($rentals->take(5) as $rental)
                    <div class="px-8 py-6 hover:bg-gradient-to-r hover:from-blue-50/30 hover:to-indigo-50/30 transition-all duration-300 animate-slideInLeft" style="animation-delay: {{ number_format($loop->index * 0.1, 1, '.', '') }}s">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="h-14 w-14 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center shadow-lg">
                                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-6 flex-1 min-w-0">
                                <p class="text-lg font-semibold text-gray-900 truncate">
                                    {{ optional($rental->user)->name ?? 'User tidak ditemukan' }} meminjam {{ $rental->vehicle->name ?? 'kendaraan' }}
                                </p>
                                <p class="text-sm text-gray-600 truncate mt-1">
                                    {{ $rental->purpose }} • {{ $rental->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="ml-6">
                                <span class="status-badge inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold
                                    {{ $rental->status === 'approved' ? 'bg-green-100 text-green-800 border border-green-200' : 
                                       ($rental->status === 'pending' ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 'bg-red-100 text-red-800 border border-red-200') }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="px-8 py-12 text-center">
                        <div class="w-20 h-20 mx-auto bg-gray-100 rounded-2xl flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Aktivitas</h3>
                        <p class="text-gray-500">Belum ada transaksi peminjaman yang tercatat.</p>
                    </div>
                    @endforelse
                </div>
                <div class="px-8 py-6 bg-gradient-to-r from-gray-50/50 to-white/50 border-t border-gray-100/50">
                    <a href="{{ route('admin.daftarpeminjaman.index') }}" class="inline-flex items-center gap-2 text-base font-semibold text-blue-600 hover:text-blue-700 transition-colors group">
                        Lihat Semua Aktivitas
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Background Ungu Melengkung di Semua Sudut -->
            <div class="absolute left-0 bottom-0 w-full h-32 bg-gradient-to-br from-purple-400/40 to-purple-700/30 rounded-3xl z-0"></div>
        </div>
    </div>
</body>
</div>

<!-- Chart.js Implementation -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Enhanced Rental Overview Chart
    const rentalOverviewCtx = document.getElementById('rentalOverviewChart').getContext('2d');
    const rentalOverviewChart = new Chart(rentalOverviewCtx, {
        type: 'bar',
        data: {
            labels: ['Selesai', 'Aktif', 'Pending', 'Ditolak'],
            datasets: [{
                label: 'Peminjaman',
                data: [
                    {{ $rentalStatusChart['finished'] }},
                    {{ $rentalStatusChart['active'] }},
                    {{ $rentalStatusChart['pending'] }},
                    {{ $rentalStatusChart['rejected'] }}
                ],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.9)',
                    'rgba(59, 130, 246, 0.9)',
                    'rgba(245, 158, 11, 0.9)',
                    'rgba(239, 68, 68, 0.9)'
                ],
                borderWidth: 0,
                borderRadius: 12,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            },
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 14,
                            weight: '600'
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 14,
                            weight: '600'
                        }
                    }
                }
            }
        }
    });

    // Enhanced Vehicle Status Chart
    const vehicleCtx = document.getElementById('vehicleStatusChart').getContext('2d');
    const vehicleChart = new Chart(vehicleCtx, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Dipinjam'],
            datasets: [{
                data: [
                    {{ $vehicleStatusChart['tersedia'] }},
                    {{ $vehicleStatusChart['dipinjam'] }}
                ],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.9)',
                    'rgba(59, 130, 246, 0.9)'
                ],
                borderWidth: 0,
                hoverOffset: 6 // lebih kecil agar lebih ringan
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            animation: {
                duration: 500, // lebih cepat
                easing: 'easeOutQuad'
            },
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 25,
                        font: {
                            size: 16,
                            weight: '600'
                        }
                    }
                }
            }
        }
    });

    // Enhanced ApexCharts for Top Users
    const topUserLabels = {!! json_encode($topUsers) !!};
    const topUserCounts = {!! json_encode($topUserCounts) !!};
    const topUserColors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#6366f1'].slice(0, topUserLabels.length);

    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            chart: {
                type: 'bar',
                height: 320,
                toolbar: { show: false },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1500,
                }
            },
            series: [{
                name: 'Jumlah Peminjaman',
                data: topUserCounts
            }],
            xaxis: {
                categories: topUserLabels,
                labels: { 
                    style: { 
                        fontSize: '14px',
                        fontWeight: '600'
                    } 
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    borderRadius: 10,
                    distributed: true,
                    barHeight: '75%'
                }
            },
            colors: topUserColors,
            dataLabels: {
                enabled: true,
                style: { 
                    fontSize: '14px',
                    fontWeight: '700'
                }
            },
            grid: { 
                borderColor: '#f1f5f9',
                strokeDashArray: 3
            }
        };

        var chart = new ApexCharts(document.querySelector("#topUserChart"), options);
        chart.render();
    });

    // Enhanced Daily Rentals Chart
    const rentalByDayLabels = {!! json_encode($rentalDays) !!};
    const rentalByDayCounts = {!! json_encode($rentalCounts) !!};
    
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            chart: {
                type: 'area',
                height: 320,
                toolbar: { show: false },
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 1500,
                }
            },
            series: [{
                name: 'Jumlah Peminjaman',
                data: rentalByDayCounts
            }],
            xaxis: {
                categories: rentalByDayLabels,
                labels: { 
                    style: { 
                        fontSize: '14px',
                        fontWeight: '600'
                    } 
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.8,
                    opacityTo: 0.1,
                    stops: [0, 90, 100]
                }
            },
            stroke: {
                curve: 'smooth',
                width: 4
            },
            colors: ['#3b82f6'],
            dataLabels: {
                enabled: false
            },
            grid: { 
                borderColor: '#f1f5f9',
                strokeDashArray: 3
            }
        };
        
        var chart = new ApexCharts(document.querySelector("#rentalByDayChart"), options);
        chart.render();
    });
</script>

<!-- Enhanced Notification -->
@if(session('success'))
<div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-2" x-init="setTimeout(() => show = false, 5000)"
     class="fixed bottom-6 right-6 bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-5 rounded-2xl shadow-2xl flex items-center gap-4 z-50 backdrop-blur-sm border border-green-400/20 max-w-md">
    <div class="p-2 bg-white/20 rounded-xl">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </div>
    <span class="font-semibold text-base">{{ session('success') }}</span>
    <button @click="show = false" class="ml-2 text-white/70 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-xl">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
@endif
@endsection