<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ApprovalController extends Controller
{
    // Daftar peminjaman yang butuh persetujuan
    public function index()
    {
        $rentals = Rental::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.approvals.index', compact('rentals'));
    }

    // Setujui peminjaman
    public function approve($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
            'approved_at' => Carbon::now(),
            'rejection_reason' => null,
        ]);
    
        // Inilah yang penting → Update status kendaraan jadi "dipinjam"
        $rental->vehicle->update(['status' => 'dipinjam']);
    
        return redirect()->route('admin.approvals.index')->with('success', 'Peminjaman disetujui.');
    }
    

    // Tolak peminjaman dengan alasan
    public function reject(Request $request, $id)
    {
        $request->validate(['rejection_reason' => 'required|string|max:255']);

        $rental = Rental::findOrFail($id);
        $rental->update([
            'status' => 'rejected',
            'approved_by' => Auth::id(),
            'approved_at' => Carbon::now(),
            'rejection_reason' => $request->rejection_reason,
        ]);

        return redirect()->route('admin.approvals.index')->with('success', 'Peminjaman ditolak.');
    }
}