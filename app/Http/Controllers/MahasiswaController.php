<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Tampilkan semua data mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json($mahasiswa);
    }

    // Tampilkan form tambah (opsional, jika pakai blade)
    public function create()
    {
        return view('mahasiswa.form_mahasiswa');
    }

    // Simpan data mahasiswa baru
    // In your MahasiswaController@store method
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nim' => 'required|string|max:50|unique:mahasiswa,nim',
                'email' => 'nullable|email',
                'alamat' => 'nullable|string',
                'asal_kampus' => 'nullable|string',
                'tanggal_masuk' => 'nullable|date',
                'tanggal_keluar' => 'nullable|date',
                'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048', // Validation for file
            ]);

            $filePath = null;
            if ($request->hasFile('file')) {
                // Store the file in the 'public' disk under a 'mahasiswa_files' directory
                // and get its path. Laravel automatically generates a unique filename.
                $filePath = $request->file('file')->store('mahasiswa_files', 'public');
            }

            $mahasiswa = Mahasiswa::create(array_merge($validated, ['file' => $filePath]));

            return redirect()->route('mahasiswa.register_success')->with('success_message', 'Registrasi mahasiswa berhasil!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Tampilkan detail mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswa);
    }

    // Tampilkan form edit (opsional, jika pakai blade)
    public function edit($id)
    {
        // $mahasiswa = Mahasiswa::findOrFail($id);
        // return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Update data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'nim' => 'sometimes|required|string|max:50|unique:mahasiswa,nim,' . $id,
            'email' => 'nullable|email',
            'alamat' => 'nullable|string',
            'asal_kampus' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'file' => 'nullable|string',
        ]);

        $mahasiswa->update($validated);
        return response()->json($mahasiswa);
    }

    // Hapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(['message' => 'Data mahasiswa berhasil dihapus']);
    }

    // Metode baru untuk menampilkan halaman sukses
    public function showRegisterSuccess()
    {
        // Pastikan ada pesan sukses di sesi sebelum menampilkan halaman
        if (!session('success_message')) {
            // Jika tidak ada pesan sukses, arahkan kembali ke form atau halaman lain
            return redirect()->route('mahasiswa.create');
        }
        return view('mahasiswa.register_success');
    }

}