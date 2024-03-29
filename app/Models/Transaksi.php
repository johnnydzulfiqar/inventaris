<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    public $table = "transaksi";

    protected $guarded = ['id'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    public function keluar(): BelongsTo
    {
        return $this->belongsTo(Keluar::class);
    }
}
