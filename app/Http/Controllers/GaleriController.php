<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\User;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class GaleriController extends Controller
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

     // Tampilkan semua galeri
     public function index()
     {
         $galeris = Galeri::with('user')->paginate(10);
         return view('admin.galeri.index', compact('galeris'));
     }
 
     // Tampilkan form untuk membuat galeri baru
     public function create()
     {
         $users = User::all(); // opsional jika ingin memilih uploader
         return view('admin.galeri.create', compact('users'));
     }

    // Simpan galeri baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'diupload_oleh' => 'required|exists:users,id',
            'url_gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('url_gambar')) {
            $uploadResult = $this->cloudinary->uploadApi()->upload(
                $request->file('url_gambar')->getRealPath(),
                ['folder' => 'travel_umroh/galeri']
            );

            $validated['url_gambar'] = $uploadResult['secure_url'] ?? null;
        }

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }
 
     // Tampilkan form untuk mengedit galeri
     public function edit(Galeri $galeri)
     {
         $users = User::all();
         return view('admin.galeri.edit', compact('galeri', 'users'));
     }
 
     // Simpan perubahan galeri
     public function update(Request $request, Galeri $galeri)
     {
         $validated = $request->validate([
             'judul' => 'required|string|max:255',
             'deskripsi' => 'required|string',
             'url_gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
             'diupload_oleh' => 'required|exists:users,id',
         ]);

        if ($request->hasFile('url_gambar')) {
            $uploadResult = $this->cloudinary->uploadApi()->upload(
                $request->file('url_gambar')->getRealPath(),
                ['folder' => 'travel_umroh/galeri']
            );

            $validated['url_gambar'] = $uploadResult['secure_url'] ?? null;
        } else {
            $validated['url_gambar'] = $galeri->url_gambar;
        }

        $galeri->update($validated);
 
         return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
     }
 
     // Hapus galeri
     public function destroy(Galeri $galeri)
     {
         $galeri->delete();
         return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
     }
 
     // (Opsional) Tampilkan detail
     public function show(Galeri $galeri)
     {
         $galeri->load('user');
         return view('admin.galeri.show', compact('galeri'));
     }
}
