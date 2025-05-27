<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
            'url' => [
                'secure' => true,
            ],
        ]);
    }

    public function index()
    {
        $pakets = Paket::paginate(10);
        return view('admin.paket.index', compact('pakets'));
    }

    public function detail($id)
    {
        $paket = Paket::findOrFail($id);

        $user = Auth::user();

        // Cek apakah user sudah mendaftar ke paket ini
        $sudahDaftar = false;
        if ($user) {
            $sudahDaftar = Pendaftaran::where('paket_id', $id)
                ->where('user_id', $user->id)
                ->exists();
        }

        return view('detailPaket', compact('paket', 'sudahDaftar'));
    }


    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'durasi_hari' => 'required|integer',
            'tanggal_keberangkatan' => 'required|date',
            'kuota' => 'required|integer',
            'gambar_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar_url')) {
            // Gunakan instance $this->cloudinary untuk upload
            $uploadResult = $this->cloudinary->uploadApi()->upload(
                $request->file('gambar_url')->getRealPath(),
                ['folder' => 'travel_umroh']
            );

            $validated['gambar_url'] = $uploadResult['secure_url'] ?? null;
        }

        Paket::create($validated);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'durasi_hari' => 'required|integer',
            'tanggal_keberangkatan' => 'required|date',
            'kuota' => 'required|integer',
            'gambar_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar_url')) {
            $uploadResult = $this->cloudinary->uploadApi()->upload(
                $request->file('gambar_url')->getRealPath(),
                ['folder' => 'travel_umroh']
            );

            $validated['gambar_url'] = $uploadResult['secure_url'] ?? null;
        } else {
            $validated['gambar_url'] = $paket->gambar_url;
        }

        $paket->update($validated);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus');
    }

    public function show(Paket $paket)
    {
        return view('admin.paket.show', compact('paket'));
    }
}
