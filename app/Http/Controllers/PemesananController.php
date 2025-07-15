<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'wisata_id' => "required|exists:wisatas,id",
            'tanggal' => 'required|date',
        ]);


        Pemesanan::create([
            'user_id' => auth()->id(),
            'wisata_id' => $request->wisata_id,
            'tanggal' => $request->tanggal,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $wisata->harga_tiket * $request->jumlah_tiket,
            'status' => 'proses',
        ]);

        return redirect()->back()->with('success', 'Pemesanan berhasil dibuat!');
    }
}