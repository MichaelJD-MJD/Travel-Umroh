<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Galeri;
use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\User;

Route::get('/', function () {
    $pakets = Paket::where('kuota', '>', 0)
        ->latest('created_at')
        ->take(4)
        ->get();

    $galeris = Galeri::latest('tanggal_upload')->take(8)->get();

    return view('welcome', compact('pakets', 'galeris'));
})->name('home');

Route::get('/paket', function () {
    $pakets = Paket::latest('created_at')->get();
    return view('listPaket', compact('pakets'));
});

Route::get('/galeri', function () {
    $galeris = Galeri::latest('tanggal_upload')->get();
    return view('listGaleri', compact('galeris'));
});

Route::get('/profile-perusahaan', function () {
    return view('profilePerusahaan');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/detail/{id}', [PaketController::class, 'detail'])->middleware(['auth', 'verified'])->name('paket-detail');
Route::get('/pendaftaran/{paket_id}', [PesertaController::class, 'daftar'])->middleware(['auth', 'verified'])->name('form-pendaftaran-peserta');
Route::post('/pendaftaran-peserta', [PesertaController::class, 'daftarPeserta'])->middleware(['auth', 'verified'])->name('pendaftaran-peserta');
Route::post('/pendaftaran/selesai', [PesertaController::class, 'selesaikan'])->middleware(['auth', 'verified'])->name('selesaikan-pendaftaran');
Route::get('/pendaftaran/batalkan/{paket_id}', [PesertaController::class, 'batalkan'])->middleware(['auth', 'verified'])->name('batalkan-pendaftaran');


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        $pakets = Paket::latest('created_at')->take(5)->get();
        $galeris = Galeri::latest('tanggal_upload')->take(5)->get();
        $totalPaket = Paket::count();
        $totalUser = User::count();
        $totalPendaftaran = Pendaftaran::count();
        return view('admin.dashboard', compact('pakets', 'galeris', 'totalUser', 'totalPendaftaran', 'totalPaket'));
    })->name('admin.dashboard');
});

Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
    Route::resource('peserta', PesertaController::class)->parameters([
        'peserta' => 'peserta'
    ]);
    Route::resource('galeri', GaleriController::class);
});


require __DIR__ . '/auth.php';
