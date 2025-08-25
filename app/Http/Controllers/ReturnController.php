<?php
namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
public function showReturnForm()
{
    // Ambil daftar rental aktif milik user yang belum dikembalikan
    $rentals = Rental::where('user_id', Auth::id())
                    ->where('status', 'approved')
                    ->whereNull('time_in')
                    ->with('vehicle') // untuk ambil info kendaraan
                    ->get();

    return view('rentals.return', compact('rentals'));
}

public function returnCar(Request $request)
{
    $request->validate([
        'rental_id' => 'required|exists:rentals,id',
        'return_time' => 'required|date',
        'end_kilometer' => 'required|integer|min:0',
    ]);

    $rental = Rental::findOrFail($request->rental_id);

    if (Auth::id() !== $rental->user_id) {
        return redirect()->route('user.login')->with('error', 'Anda tidak berhak mengembalikan mobil ini.');
    }

    if ($rental->status !== 'returned') {
        $rental->status = 'returned';
        $rental->time_in = $request->return_time;
        $rental->end_kilometer = $request->end_kilometer;
        $rental->save();

        // Cek status kendaraan
        $vehicle = $rental->vehicle;

        if ($vehicle) {
            // Update kilometer awal kendaraan jika end_kilometer lebih besar
            if ($request->end_kilometer > $vehicle->start_kilometer) {
                $vehicle->start_kilometer = $request->end_kilometer;
            }
            $activeRentals = Rental::where('vehicle_id', $vehicle->id)
                ->where('status', 'approved')
                ->whereNull('time_in')
                ->count();

            if ($activeRentals === 0) {
                $vehicle->status = 'Tersedia';
            }
            $vehicle->save();
        }

        return redirect()->route('rentals.index')->with('success', 'Mobil telah dikembalikan.');
    }

    return redirect()->route('rentals.index')->with('error', 'Mobil sudah dikembalikan sebelumnya.');
}
    // Menampilkan daftar pengembalian untuk admin
    public function adminIndex()
{
    // Pastikan menggunakan pagination untuk hasilnya
    $rentals = Rental::where('status', 'returned')
                     ->orderBy('time_in', 'desc')
                     ->paginate(10);  // Sesuaikan jumlah item per halaman sesuai kebutuhan
    
    return view('admin.return.index', compact('rentals'));
}

}
