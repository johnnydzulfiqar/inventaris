<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;
    protected $table = 'keluar';
    protected $fillable = [
        'barang_id',
        'stok',
        'status',
        'laporan',
        'keterangan',



    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
