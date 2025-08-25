<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil aktivitas terbaru (limit 10, eager load user & vehicle)
        $rentals = \App\Models\Rental::with(['user', 'vehicle'])
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        // Statistik utama
        $totalRentals = \App\Models\Rental::count();
        $activeRentals = \App\Models\Rental::whereNull('time_in')->where('status', 'approved')->count();
        $pendingRentals = \App\Models\Rental::where('status', 'pending')->count();
        $rejectedRentals = \App\Models\Rental::where('status', 'rejected')->count();
        $finishedRentals = \App\Models\Rental::whereNotNull('time_in')->count();

        $availableVehicles = \App\Models\Vehicle::where('status', 'tersedia')->count();
        $borrowedVehicles = \App\Models\Vehicle::where('status', 'dipinjam')->count();
        $totalUsers = \App\Models\User::count();
        $totalPengajuan = $pendingRentals;

        // Data chart status rental
        $rentalStatusChart = [
            'finished' => $finishedRentals,
            'active' => $activeRentals,
            'pending' => $pendingRentals,
            'rejected' => $rejectedRentals,
        ];
        // Data chart status kendaraan
        $vehicleStatusChart = [
            'tersedia' => $availableVehicles,
            'dipinjam' => $borrowedVehicles,
        ];

        // Top 5 user dengan jumlah peminjaman terbanyak
        $topUsers = \App\Models\User::withCount('rentals')
            ->orderBy('rentals_count', 'desc')
            ->limit(5)
            ->pluck('name');
        $topUserCounts = \App\Models\User::withCount('rentals')
            ->orderBy('rentals_count', 'desc')
            ->limit(5)
            ->pluck('rentals_count');

        // Data untuk chart harian (7 hari terakhir)
        $rentalDays = [];
        $rentalCounts = [];
        foreach (range(6, 0) as $i) {
            $date = now()->subDays($i)->format('Y-m-d');
            $rentalDays[] = $date;
            $rentalCounts[] = \App\Models\Rental::whereDate('created_at', $date)->count();
        }

        return view('admin.dashboard', compact(
            'rentals',
            'totalRentals',
            'activeRentals',
            'pendingRentals',
            'rejectedRentals',
            'finishedRentals',
            'availableVehicles',
            'borrowedVehicles',
            'totalUsers',
            'totalPengajuan',
            'rentalStatusChart',
            'vehicleStatusChart',
            'topUsers',
            'topUserCounts',
            'rentalDays',
            'rentalCounts'
        ));
    }
}
