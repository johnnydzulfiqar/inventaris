<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Kepala;
use App\Models\User;
use App\Models\Keluar;

use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $barangCount = Barang::all()->sum('stok');
        $barangkeluarCount = Keluar::all()->sum('stok');
        $stok = Barang::all()->sum('stok');
        $harga = Barang::all()->sum('harga_barang');
        $total = $stok * $harga;
        $stok_keluar = Keluar::all()->sum('stok');
        $harga_keluar = Barang::all()->sum('harga_barang');
        $total_keluar = $stok_keluar * $harga_keluar;
        $pending = Barang::all()->where('status', '=', 'Pending')->count('status');
        $pending_date = Barang::all()->where('status', '=', 'Pending');
        // $total = Barang::all()->sum(DB::raw('stok', '*', 'harga_barang'));
        return view('dashboard.index', compact('userCount', 'barangCount', 'barangkeluarCount', 'total', 'total_keluar', 'pending', 'pending_date'));
    }
}
