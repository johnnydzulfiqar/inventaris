<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'stok',
        'harga_barang',
        'foto_barang',
        'status',
        'laporan',
        'keterangan',
        'kode_ring',
        'ruangan_id',
        'user_id',

    ];
    public function getFotoBarangAttribute()
    {
        $foto_barang = $this->attributes['foto_barang'];
        if (empty($foto_barang)) return 'https://via.placeholder.com/100?text=Produk';
        else return Storage::url('barang/' . $foto_barang);
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function kepala()
    // {
    //     return $this->belongsTo(Kepala::class, 'kepala_id');
    // }
    public function isTheOwner($user)
    {
        return $this->users_id === $user->id;
    }
}
