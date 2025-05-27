<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Tampilkan semua pendaftaran
    public function index()
    {
        $pendaftarans = Pendaftaran::with('user', 'paket')->paginate(10);
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    // Form tambah pendaftaran
    public function create()
    {
        $users = User::all();
        $pakets = Paket::all();
        return view('admin.pendaftaran.create', compact('users', 'pakets'));
    }

    // Simpan data pendaftaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'paket_id' => 'required|exists:pakets,paket_id',
            'status' => 'in:Baru,Dikonfirmasi',
            'tanggal_dikonfirmasi' => 'nullable|date',
        ]);

        Pendaftaran::create($validated);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan');
    }

    // Form edit pendaftaran
    public function edit(Pendaftaran $pendaftaran)
    {
        $users = User::all();
        $pakets = Paket::all();
        return view('admin.pendaftaran.edit', compact('pendaftaran', 'users', 'pakets'));
    }

    // Update data pendaftaran
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $validated = $request->validate([
            'status' => 'required|in:Baru,Dikonfirmasi',
            'tanggal_dikonfirmasi' => 'required|date',
        ]);

        $pendaftaran->update($validated);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui');
    }

    // Hapus data pendaftaran
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus');
    }

    // (Opsional) Tampilkan detail pendaftaran
    public function show(Pendaftaran $pendaftaran)
    {
        $pendaftaran->load('user', 'paket');
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }
}
