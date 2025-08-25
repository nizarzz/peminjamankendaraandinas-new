<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('license_plate', 'like', "%$search%")
                  ->orWhere('type', 'like', "%$search%")
                  ->orWhere('year', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                ;
            });
        }
        $vehicles = $query->paginate(10)->withQueryString();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'license_plate' => 'required|string|max:20|unique:vehicles',
        'type' => 'required|string',
        'year' => 'required|integer',
        'fuel_type' => 'required|string',
        'status' => 'required|string',
        'last_service_date' => 'nullable|date',
        'start_kilometer' => 'required|integer|min:0',
    ]);

    Vehicle::create($validated);

    return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
}


    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate,' . $vehicle->id,
            'type' => 'required|string',
            'year' => 'required|integer',
            'fuel_type' => 'required|string',
            'status' => 'required|string',
            'last_service_date' => 'nullable|date',
            'start_kilometer' => 'required|integer|min:0',
        ]);

        $vehicle->update($validated);

        return redirect()->route('vehicles.index')->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
