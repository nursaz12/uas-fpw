<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data mahasiswa dari database
        $mahasiswa = Mahasiswa::all();

        // Tampilkan ke view
        return view('dashboard', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form tambah data mahasiswa
        return view('mahasiswa.mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'npm' => 'required|unique:mahasiswa|max:50',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100',
        ]);

        // Simpan data ke database
        Mahasiswa::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Data mahasiswa berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $validated = $request->validate([
            'npm' => 'required|max:15|unique:mahasiswas,npm,' . $id,
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:100',
        ]);

        // Update data di database
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate!');
    }
}