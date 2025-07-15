<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'user_id',
        'wisata_id',
        'nama_pemesan',
        'email_pemesan',
        'tanggal',
        'jumlah_tiket',
        'total_harga',
        'status'
    ];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}