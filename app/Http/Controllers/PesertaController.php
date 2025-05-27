<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PesertaController extends Controller
{
    // Tampilkan semua peserta
    public function index()
    {
        $pesertas = Peserta::with('pendaftaran')->paginate(10);
        return view('admin.peserta.index', compact('pesertas'));
    }

    // Form Pendaftaran User
    public function daftar($paket_id)
    {
        $paket = Paket::findOrFail($paket_id);

        $user = Auth::user();

        // Ambil satu data pendaftaran (jika ada)
        $pendaftaran = Pendaftaran::where('paket_id', $paket_id)->where('user_id', $user->id)->first();

        // Cek apakah pendaftaran ditemukan
        if ($pendaftaran) {
            $pesertas = Peserta::where('pendaftaran_id', $pendaftaran->pendaftaran_id)->get();
        } else {
            $pesertas = collect(); // kosong jika belum ada data pendaftaran
        }

        return view('formPendaftaran', [
            'paket' => $paket,
            'pesertas' => $pesertas,
        ]);
    }


    // Tampilkan form untuk menambahkan peserta baru
    public function create()
    {
        $pendaftarans = Pendaftaran::all();
        return view('admin.peserta.create', compact('pendaftarans'));
    }

    // Simpan peserta baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,pendaftaran_id',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:50',
            'nomor_paspor' => 'nullable|string|max:50',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pesertas')->where(function ($query) use ($request) {
                    return $query->where('pendaftaran_id', $request->pendaftaran_id);
                }),
            ],
        ]);

        // Ambil pendaftaran & paket terkait
        $pendaftaran = Pendaftaran::findOrFail($validated['pendaftaran_id']);
        $paket = Paket::findOrFail($pendaftaran->paket_id);

        // Cek apakah kuota masih tersedia
        if ($paket->kuota <= 0) {
            return redirect()->route('admin.peserta.index')->with('error', 'Kuota untuk paket ini sudah habis.');
        }

        // Tambahkan peserta
        Peserta::create($validated);

        // Kurangi kuota
        $paket->kuota -= 1;
        $paket->save();

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil ditambahkan');
    }

    // User Simpan Pendaftaran + simpan Peserta
    public function daftarPeserta(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,paket_id',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:50',
            'nomor_paspor' => 'nullable|string|max:50',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pesertas')->where(function ($query) use ($request) {
                    // Validasi agar email unik dalam pendaftaran yang sama
                    return $query->whereIn('pendaftaran_id', function ($subquery) use ($request) {
                        $subquery->select('pendaftaran_id')
                            ->from('pendaftarans')
                            ->where('user_id', $request->user_id)
                            ->where('paket_id', $request->paket_id);
                    });
                }),
            ],
        ]);

        try {
            DB::transaction(function () use ($request, &$paket, &$pesertas) {
                $paket = Paket::lockForUpdate()->findOrFail($request->paket_id);

                if ($paket->kuota <= 0) {
                    throw new \Exception('Kuota untuk paket ini sudah habis.');
                }

                // Cek apakah sudah ada pendaftaran untuk user_id dan paket_id
                $pendaftaran = Pendaftaran::firstOrCreate(
                    [
                        'user_id' => $request->user_id,
                        'paket_id' => $request->paket_id,
                    ]
                );

                // Tambah peserta ke pendaftaran tersebut
                Peserta::create([
                    'pendaftaran_id' => $pendaftaran->pendaftaran_id,
                    'nama_lengkap' => $request->nama_lengkap,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'nik' => $request->nik,
                    'nomor_paspor' => $request->nomor_paspor,
                    'alamat' => $request->alamat,
                    'nomor_telepon' => $request->nomor_telepon,
                    'email' => $request->email,
                ]);

                // Kurangi kuota paket
                $paket->kuota -= 1;
                $paket->save();

                // Ambil semua peserta pada pendaftaran ini
                $pesertas = Peserta::where('pendaftaran_id', $pendaftaran->pendaftaran_id)->get();
            });

            return redirect()->route('form-pendaftaran-peserta', ['paket_id' => $request->paket_id])
                ->with('success', 'Peserta berhasil didaftarkan!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }




    // Tampilkan form untuk edit peserta
    public function edit(Peserta $peserta)
    {
        $pendaftarans = Pendaftaran::all();
        return view('admin.peserta.edit', compact('peserta', 'pendaftarans'));
    }

    // Simpan hasil edit peserta
    public function update(Request $request, Peserta $peserta)
    {
        $validated = $request->validate([
            'pendaftaran_id' => 'exists:pendaftarans,pendaftaran_id',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:50',
            'nomor_paspor' => 'nullable|string|max:50',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('pesertas')->where(function ($query) use ($request) {
                    return $query->where('pendaftaran_id', $request->pendaftaran_id);
                }),
            ],
        ]);

        $peserta->update($validated);

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil diperbarui');
    }

    // Hapus peserta
    public function destroy(Peserta $peserta)
    {
        // Ambil pendaftaran dan paket terkait
        $pendaftaran = $peserta->pendaftaran;
        $paket = $pendaftaran->paket;

        // Hapus peserta
        $peserta->delete();

        // Tambah kuota kembali
        $paket->kuota += 1;
        $paket->save();

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil dihapus dan kuota dikembalikan');
    }

    // (Opsional) Tampilkan detail peserta
    public function show(Peserta $peserta)
    {
        $peserta->load('pendaftaran');
        return view('admin.peserta.show', compact('peserta'));
    }

    public function selesaikan(Request $request)
    {
        // Setelah pendaftaran selesai, arahkan ke beranda dengan flash message
        return redirect()->route('home')->with('success', 'Pendaftaran berhasil. Silakan tunggu konfirmasi dari admin melalui WhatsApp.');
    }

    public function batalkan($paket_id)
    {
        // Cari pendaftaran berdasarkan paket_id
        $pendaftaran = Pendaftaran::where('paket_id', $paket_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($pendaftaran) {
            // Hapus semua peserta yang terkait
            Peserta::where('pendaftaran_id', $pendaftaran->pendaftaran_id)->delete();

            // Hapus pendaftaran
            $pendaftaran->delete();
        }

        return redirect()->route('home')->with('success', 'Pendaftaran berhasil dibatalkan.');
    }
}
