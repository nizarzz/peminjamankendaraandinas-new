<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Audit::with('user')->orderBy('created_at', 'desc');

        // Filter pencarian (nama, email, user id)
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $query->whereHas('user', function($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%$search%"])
                  ->orWhereRaw('LOWER(email) LIKE ?', ["%$search%"]);
            });
        }


        // Filter aksi
        if ($request->filled('aksi')) {
            $query->where('action', $request->aksi);
        }

        // Filter tanggal
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->where('created_at', '<=', $request->date_to . ' 23:59:59');
        }

        $audits = $query->paginate(10)->appends($request->all());
        return view('admin.audit.index', compact('audits'));
    }

    public function logAktivitas()
    {
        // Log aktivitas: hanya aktivitas user peminjam (role user)
        $logs = \App\Models\Audit::with('user')->whereHas('user', function($q) {
            $q->where('role', 'user');
        })->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.logaktivitas.index', compact('logs'));
    }
} 