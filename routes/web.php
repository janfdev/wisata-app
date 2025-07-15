<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\KategoriWisata;
use App\Models\Wisata;
use App\Models\Pemesanan;

// Homepage
Route::get('/', function () {
    $kategori = KategoriWisata::all();
    $wisata = Wisata::all();
    return view('home', compact('kategori', 'wisata'));
})->name('home');

// Detail KategoriWisata
Route::get('/kategori/{id}', function($id) {
    $kategori = KategoriWisata::findOrFail($id);
    $wisatas = $kategori->wisatas; //relasi
    return view('kategori', compact('kategori', 'wisatas'));
})->name('kategori.detail');

// Halaman detail wisata + form pemesanan
Route::get('/wisata/{id}', function($id) {
    $wisata = Wisata::findOrFail($id);
    return view('wisata-detail', compact('wisata'));
})->name('wisata.detail');

Route::post('/pemesanan', function(Illuminate\Http\Request $request) {
    $request->validate([
        'wisata_id' => 'required|exists:wisatas,id',
        'tanggal' => 'required|date',
        'jumlah_tiket' => 'required|integer|min:1',
    ]);

    $wisata = \App\Models\Wisata::findOrFail($request->wisata_id);
    $total = $wisata->harga_tiket * $request->jumlah_tiket;

    \App\Models\Pemesanan::create([
        'user_id' => auth()->id(),
        'wisata_id' => $request->wisata_id,
        'tanggal' => $request->tanggal,
        'jumlah_tiket' => $request->jumlah_tiket,
        'total_harga' => $total,
        'status' => 'proses',
    ]);

    return redirect()->route('pesanan.saya')->with('success', 'Pemesanan berhasil');
})->middleware('auth')->name('pemesanan.submit');

Route::get('/pesanan-saya', function() {
    $pemesanan = Pemesanan::where('user_id', auth()->id())->latest()->get();
    return view('pesanan-saya', compact('pemesanan'));
})->middleware('auth')->name('pesanan.saya');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';