<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::where('diterima', false);
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('asal_kampus', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_masuk', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_keluar', 'LIKE', "%{$search}%");
            });
        }
        
        $pendaftar = $query->orderByDesc('created_at')->paginate(10);
        
        // Pass search term to view
        $search = $request->search;
        
        return view('backend.pendaftar.index', compact('pendaftar', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pendaftar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:mahasiswa,nim',
            'email' => 'required|email|unique:mahasiswa,email',
            'alamat' => 'required|string',
            'asal_kampus' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:4096',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('mahasiswa_files', 'public');
        }

        Mahasiswa::create(array_merge($validated, ['file' => $filePath]));

        return redirect()->route('pendaftar.index')->with('success', 'Pendaftar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftar = Mahasiswa::findOrFail($id);
        return view('backend.pendaftar.show', compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendaftar = Mahasiswa::findOrFail($id);
        return view('backend.pendaftar.edit', compact('pendaftar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftar = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:mahasiswa,nim,' . $pendaftar->id,
            'email' => 'required|email|unique:mahasiswa,email,' . $pendaftar->id,
            'alamat' => 'required|string',
            'asal_kampus' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:4096',
        ]);

        if ($request->hasFile('file')) {
            if (!empty($pendaftar->file) && Storage::disk('public')->exists($pendaftar->file)) {
                Storage::disk('public')->delete($pendaftar->file);
            }
            $validated['file'] = $request->file('file')->store('mahasiswa_files', 'public');
        }

        $pendaftar->update($validated);

        return redirect()->route('pendaftar.index')->with('success', 'Pendaftar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftar = Mahasiswa::findOrFail($id);

        if (!empty($pendaftar->file) && Storage::disk('public')->exists($pendaftar->file)) {
            Storage::disk('public')->delete($pendaftar->file);
        }

        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('success', 'Pendaftar berhasil dihapus.');
    }

    /**
     * Tandai pendaftar sebagai diterima dan alihkan ke halaman diterima
     */
    public function accept(string $id)
    {
        $pendaftar = Mahasiswa::findOrFail($id);
        $pendaftar->update(['diterima' => true]);

        // Create notification for accepted applicant
        \App\Http\Controllers\NotificationController::createNotification(
            'Pendaftar Diterima',
            "Pendaftar {$pendaftar->nama} telah diterima",
            'success',
            [
                'pendaftar_name' => $pendaftar->nama,
                'pendaftar_id' => $pendaftar->id,
                'timestamp' => now()->toISOString()
            ]
        );

        return redirect()->route('pendaftar.diterima.index')->with('success', 'Pendaftar diterima.');
    }

    /**
     * Tampilkan daftar pendaftar yang sudah diterima
     */
    public function diterimaIndex(Request $request)
    {
        $query = Mahasiswa::where('diterima', true);
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('asal_kampus', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_masuk', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_keluar', 'LIKE', "%{$search}%");
            });
        }
        
        $pendaftarDiterima = $query->orderByDesc('created_at')->paginate(10);
        
        // Pass search term to view
        $search = $request->search;
        
        return view('backend.pendaftar.diterima', compact('pendaftarDiterima', 'search'));
    }

    /**
     * Search pendaftar dengan filter status
     */
    public function search(Request $request)
    {
        $status = $request->get('status', 'pendaftar'); // 'pendaftar' atau 'diterima'
        $search = $request->get('search', '');
        
        $query = Mahasiswa::query();
        
        // Filter berdasarkan status
        if ($status === 'diterima') {
            $query->where('diterima', true);
        } else {
            $query->where('diterima', false);
        }
        
        // Search functionality
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nim', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('asal_kampus', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_masuk', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_keluar', 'LIKE', "%{$search}%");
            });
        }
        
        $pendaftar = $query->orderByDesc('created_at')->paginate(10);
        
        return response()->json([
            'success' => true,
            'data' => $pendaftar->items(),
            'pagination' => [
                'current_page' => $pendaftar->currentPage(),
                'last_page' => $pendaftar->lastPage(),
                'per_page' => $pendaftar->perPage(),
                'total' => $pendaftar->total(),
            ],
            'search' => $search,
            'status' => $status
        ]);
    }

    /**
     * Hapus pendaftar yang sudah diterima
     */
    public function destroyDiterima(string $id)
    {
        $pendaftar = Mahasiswa::findOrFail($id);
        
        // Pastikan hanya pendaftar yang sudah diterima yang bisa dihapus
        if (!$pendaftar->diterima) {
            return redirect()->route('pendaftar.diterima.index')->with('error', 'Hanya pendaftar yang sudah diterima yang dapat dihapus.');
        }

        // Hapus file jika ada
        if (!empty($pendaftar->file) && Storage::disk('public')->exists($pendaftar->file)) {
            Storage::disk('public')->delete($pendaftar->file);
        }

        // Hapus data pendaftar
        $pendaftar->delete();

        return redirect()->route('pendaftar.diterima.index')->with('success', 'Pendaftar berhasil dihapus.');
    }


}


