<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = "ruangan";
    protected $fillable = ["nama_ruangan", "lantai", "kategori"];
    public function barang()
    {
        return $this->hasMany(Barang::class, 'barang_id');
    }
}
