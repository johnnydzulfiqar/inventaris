<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepala extends Model
{
    use HasFactory;
    protected $table = "kepala";
    protected $fillable = ["barang_id", "ruangan_id", "laporan"];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
    // public function isTheOwner($user)
    // {
    //     return $this->users_id === $user->id;
    // }
}
