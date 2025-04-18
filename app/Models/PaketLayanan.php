<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga_paket',
        'deskripsi',
        'image',
        'kategori_id',
    ];

    public function layanans()
    {
        return $this->belongsToMany(Layanan::class, 'layanan_paket_layanan');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
