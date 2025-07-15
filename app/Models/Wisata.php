<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
     protected $fillable = [
        'kategori_wisata_id',
        'nama',
        'deskripsi',
        'harga_tiket',
        'gambar'
    ];
    
    public function kategoriWisata()
    {
        return $this->belongsTo(KategoriWisata::class, 'kategori_wisata_id');
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}