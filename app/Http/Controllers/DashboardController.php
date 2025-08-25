<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    
  public function index()
{
    $rentals = Rental::with(['user', 'vehicle'])->paginate(10); // gunakan paginate, bukan all()
    $vehicles = Vehicle::all();
    $availableVehicles = Vehicle::where('status', 'Tersedia')->count();

    // Top 5 peminjam
    $topUsersRaw = User::withCount('rentals')
        ->orderByDesc('rentals_count')
        ->limit(5)
        ->get();
    $topUsers = $topUsersRaw->pluck('name')->toArray();
    $topUserCounts = $topUsersRaw->pluck('rentals_count')->toArray();

    // Jumlah peminjaman per hari (7 hari terakhir)
    $rentalDays = [];
    $rentalCounts = [];
    for ($i = 6; $i >= 0; $i--) {
        $date = Carbon::today()->subDays($i);
        $rentalDays[] = $date->format('D, d M');
        $rentalCounts[] = Rental::whereDate('created_at', $date)->count();
    }

    return view('admin.dashboard', [
        'rentals' => $rentals,
        'vehicles' => $vehicles,
        'availableVehicles' => $availableVehicles,
        'topUsers' => $topUsers,
        'topUserCounts' => $topUserCounts,
        'rentalDays' => $rentalDays,
        'rentalCounts' => $rentalCounts
    ]);
}
    
    
}


