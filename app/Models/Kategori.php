<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
        'kode_ring',
    ];
    public function barang()
    {
        return $this->hasMany(Barang::class, 'barang_id');
    }
}
