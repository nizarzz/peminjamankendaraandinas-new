<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::where('role', 'user')->findOrFail($id);
        $user->delete();
        // Log aktivitas
        Audit::create([
            'user_id' => Auth::guard('admin')->id(),
            'action' => 'delete_user',
            'description' => 'Menghapus user pegawai: ' . $user->name,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'User pegawai berhasil dihapus.');
    }

    /**
     * Promote a user to admin.
     */
    public function promote($id)
    {
        $user = User::where('role', 'user')->findOrFail($id);
        $user->role = 'admin';
        $user->save();
        // Log aktivitas
        Audit::create([
            'user_id' => Auth::guard('admin')->id(),
            'action' => 'promote_user',
            'description' => 'Promosi user menjadi admin: ' . $user->name,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dijadikan admin.');
    }

    /**
     * Tampilkan profil admin yang sedang login.
     */
    public function profile()
    {
        $admin = auth('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    /**
     * Proses update password admin.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $admin = auth('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        $admin->password = bcrypt($request->password);
        $admin->save();

        // Log aktivitas
        Audit::create([
            'user_id' => $admin->id,
            'action' => 'update_password',
            'description' => 'Admin mengubah password.',
        ]);

        return back()->with('status', 'Password berhasil diubah.');
    }

    /**
     * Update biodata admin (NIP, Jabatan, No HP, Alamat)
     */
    public function updateBiodata(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'position' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:255',
        ]);

        $admin = auth('admin')->user();
        $admin->name = $request->name;
        $admin->nip = $request->nip;
        $admin->position = $request->position;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->save();

        // Log aktivitas
        Audit::create([
            'user_id' => $admin->id,
            'action' => 'update_biodata',
            'description' => 'Admin mengubah biodata.',
        ]);

        return redirect()->route('admin.profile', ['reset' => 1])
            ->with('biodata_status', 'Biodata berhasil diperbarui!');
    }
} 