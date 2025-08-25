<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRentalController extends Controller
{
    /**
     * Tampilkan daftar peminjaman yang diajukan oleh pengguna.
     */
    public function index()
    {
        $rentals = Rental::where('user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        return view('user.rentals.index', compact('rentals'));
    }

    /**
     * Tampilkan status peminjaman untuk pengguna.
     */
    public function status($id)
    {
        // Mengambil data peminjaman berdasarkan ID dan memastikan peminjaman milik pengguna yang sedang login
        $rental = Rental::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        return view('user.rentals.status', compact('rental'));
    }
}
