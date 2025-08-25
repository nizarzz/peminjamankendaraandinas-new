<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Audit;


class RentalController extends Controller
{
    /**
     * Tampilkan daftar semua peminjaman (user).
     */
    public function index(Request $request)
    {
        $query = Rental::with(['vehicle'])
            ->where('user_id', auth()->id()) // Aktifkan filter user login
            ->orderBy('created_at', 'desc');

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        // Filter kendaraan
        if ($request->filled('vehicle_id')) {
            $query->where('vehicle_id', $request->vehicle_id);
        }
        // Filter tanggal keluar
        if ($request->filled('date_from') && $request->filled('date_to')) {
            $dateTo = Carbon::parse($request->date_to)->addDay();
            $query->whereBetween('time_out', [$request->date_from, $dateTo]);
        } else {
            if ($request->filled('date_from')) {
                $query->whereDate('time_out', '>=', $request->date_from);
            }
            if ($request->filled('date_to')) {
                $dateTo = Carbon::parse($request->date_to)->addDay();
                $query->where('time_out', '<', $dateTo);
            }
        }
        // Search purpose
        if ($request->filled('search')) {
            $query->where('purpose', 'like', '%'.$request->search.'%');
        }

        // Debug query
        \Log::info($query->toSql());
        \Log::info($query->getBindings());

        $rentals = $query->paginate(10)->appends($request->all());
        $vehicles = Vehicle::all();
        return view('rentals.index', compact('rentals', 'vehicles'));
    }

    /**
     * Tampilkan form untuk membuat peminjaman baru.
     */
    public function create()
    {
        $availableVehicles = Vehicle::where('status', 'Tersedia')->get();
        return view('rentals.create', compact('availableVehicles'));
    }

    /**
     * Simpan data peminjaman kendaraan.
     */
    public function store(Request $request)
{
    //
    $request->validate([
        'vehicle_id' => 'required|exists:vehicles,id',
        //'fuel' => 'required|string|max:191',
        //'kilometers' => 'required|integer',
        'date' => 'required|date',
        'time_out' => 'required|date_format:H:i',
        //'duration' => 'required|integer|min:1|max:24',
        //'damage' => 'nullable|string',
        'purpose' => 'required|string|max:255',
    ]);

    // Ambil data kendaraan berdasarkan vehicle_id
    $vehicle = Vehicle::find($request->vehicle_id);
    

    // Cek apakah kendaraan memang Tersedia
    if ($vehicle->status != 'Tersedia') {
        return back()->with('error', 'Kendaraan tidak Tersedia untuk dipinjam.');
    }

    // Gabungkan tanggal dan waktu
    $timeOut = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time_out);

    // Simpan peminjaman
    $rental = Rental::create([
        'user_id' => Auth::id(),
        'vehicle_id' => $request->vehicle_id,
        'vehicle_name' => $vehicle->name,
        'license_plate' => $vehicle->license_plate,
        'fuel' => $request->fuel,
        //'duration' => $request->duration,
        //'kilometers' => $request->kilometers,
        'time_out' => $timeOut,
        'time_in' => null,
        //'damage' => $request->damage,
        'status' => 'pending',
        'purpose' => $request->purpose,  // simpan purpose
        'start_kilometer' => $vehicle->start_kilometer, // otomatis ambil dari kendaraan
    ]);

    // Log aktivitas
    Audit::create([
        'user_id' => Auth::id(),
        'action' => 'create_rental',
        'auditable_type' => Rental::class,
        'auditable_id' => $rental->id,
        'old_values' => null,
        'new_values' => $rental->toArray(),
        'description' => 'Mengajukan peminjaman kendaraan ID: ' . $rental->vehicle_id,
    ]);


    return redirect()->route('user.home')->with('success', 'Peminjaman berhasil diajukan dan menunggu persetujuan.');
}


    /**
     * Hapus data peminjaman.
     */
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $old = $rental->toArray();
        $rental->delete();

        // Audit trail
        Audit::create([
            'user_id' => Auth::id(),
            'action' => 'delete_rental',
            'auditable_type' => Rental::class,
            'auditable_id' => $id,
            'old_values' => $old,
            'new_values' => null,
            'description' => 'Menghapus peminjaman kendaraan ID: ' . $id,
        ]);

        return redirect()->route('user.home')->with('success', 'Peminjaman berhasil dihapus.');
    }

    public function home()
    {
        $userId = auth()->id();
        $totalRentals = Rental::where('user_id', $userId)->count();
        $approvedRentals = Rental::where('user_id', $userId)->where('status', 'approved')->count();
        $rejectedRentals = Rental::where('user_id', $userId)->where('status', 'rejected')->count();
        $pendingRentals = Rental::where('user_id', $userId)->where('status', 'pending')->count();
        $ongoingRentals = Rental::where('user_id', $userId)
                         ->where('status', 'approved')
                         ->whereNull('time_in')
                         ->count();

        $rental = Rental::where('user_id', $userId)
                ->where('status', 'approved')
                ->whereNull('time_in')
                ->latest()
                ->first();

        $totalAvailableVehicles = \App\Models\Vehicle::where('status', 'Tersedia')->count();

        return view('user.home', compact('totalRentals', 'approvedRentals', 'rejectedRentals', 'pendingRentals', 'ongoingRentals', 'rental', 'totalAvailableVehicles'));
    }

// Tampilkan daftar semua peminjaman untuk admin
public function daftarpeminjaman(Request $request)
{
    $query = Rental::with(['user', 'vehicle'])->orderBy('created_at', 'desc');

    // Search by user name
    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('user', function($q) use ($search) {
            $q->where('name', 'like', "%$search%");
        });
    }

    // Filter status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter kendaraan
    if ($request->filled('vehicle')) {
        $query->whereHas('vehicle', function($q) use ($request) {
            $q->where('name', 'like', "%{$request->vehicle}%");
        });
    }

    // Filter kendaraan by vehicle_id
    if ($request->filled('vehicle_id')) {
        $query->where('vehicle_id', $request->vehicle_id);
    }

    // Filter tanggal
    if ($request->filled('date_from')) {
        $query->whereDate('time_out', '>=', $request->date_from);
    }
    if ($request->filled('date_to')) {
        $query->whereDate('time_out', '<=', $request->date_to);
    }

    // Sorting
    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $query->orderBy(User::select('name')->whereColumn('users.id', 'rentals.user_id'), 'asc');
                break;
            case 'name_desc':
                $query->orderBy(User::select('name')->whereColumn('users.id', 'rentals.user_id'), 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }
    }

    $rentals = $query->paginate(10)->appends($request->all());
    $vehicles = \App\Models\Vehicle::all();
    return view('admin.daftarpeminjaman.index', compact('rentals', 'vehicles'));
}

/**
 * Hapus semua data peminjaman (admin).
 */
public function deleteAll()
{
    $old = Rental::all()->toArray();
    Rental::truncate();

    Audit::create([
        'user_id' => Auth::guard('admin')->id(),
        'action' => 'delete_all_rentals',
        'auditable_type' => Rental::class,
        'auditable_id' => null,
        'old_values' => $old,
        'new_values' => null,
        'description' => 'Menghapus semua data peminjaman (admin)',
    ]);

    return redirect()->route('admin.daftarpeminjaman')->with('success', 'Semua data peminjaman berhasil dihapus.');
}

/**
 * Hapus data peminjaman berdasarkan seleksi (admin).
 */
public function deleteSelected(Request $request)
{
    $ids = $request->input('selected', []);
    if (!empty($ids)) {
        $old = Rental::whereIn('id', $ids)->get()->toArray();
        Rental::whereIn('id', $ids)->delete();

        Audit::create([
            'user_id' => Auth::guard('admin')->id(),
            'action' => 'delete_selected_rentals',
            'auditable_type' => Rental::class,
            'auditable_id' => null,
            'old_values' => $old,
            'new_values' => null,
            'description' => 'Menghapus data peminjaman terpilih (admin): ' . implode(',', $ids),
        ]);

        return redirect()->route('admin.daftarpeminjaman')->with('success', 'Data terpilih berhasil dihapus.');
    }
    return redirect()->route('admin.daftarpeminjaman')->with('error', 'Tidak ada data yang dipilih.');
}

    /**
     * Tampilkan detail peminjaman kendaraan untuk admin
     */
    public function show($id)
    {
        $rental = \App\Models\Rental::with(['user', 'vehicle'])->findOrFail($id);
        return view('admin.daftarpeminjaman.show', compact('rental'));
    }
}
