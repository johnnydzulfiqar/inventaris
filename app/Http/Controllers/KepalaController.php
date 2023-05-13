<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Kepala;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    public function index()
    {
        // $data = Kepala::where('users_id', Auth::id())->first();
        // $data = Kepala::all();
        // if (Auth::check() && Auth::user()->type == 2) {
        //     return view('kepala.index', compact('laporan'));
        // }
        // return view('barang.index_laporan', compact('laporan'));
        $data = Barang::all();
        $kepala = Kepala::all();

        return view('kepala.index', compact('data', 'kepala'));
    }
    public function create()
    {
        $data = Kepala::all();
        return view('kepala.create', compact('data'));
    }
    public function store(Request $request)
    {
        $data =  new Kepala;
        $data->laporan = $request->laporan;
        $data->barang_id = $request->barang_id;
        $data->ruangan_id = $request->ruangan_id;
        // dd($transaksi);
        $data->save();
        return redirect('/kepala/index');
        Kepala::create();
    }
    public function show($id)
    {
        // $admin = Admin::findOrfail($id);
        // return view('user.transaksi', compact('admin'));
    }
    public function edit($id)
    {
        //
    }
    public function update(Barang $id, Request $request)
    {

        $data = Kepala::find($request->id);
        $data->laporan = $request->laporan;
        $data->save();
        // $stok = Barang::find($request->barang_id);
        // $stok->stok = $request->stok;
        // $stok->save();
        // dd($transaksi);
        return redirect('/kepala/index');
    }
    public function destroy($id)
    {
        //
    }
}
