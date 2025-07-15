<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    protected $fillable = ['nama', 'gambar'];
    
    public function wisatas() 
    {
        return $this->hasMany(Wisata::class, 'kategori_wisata_id');
    }
}