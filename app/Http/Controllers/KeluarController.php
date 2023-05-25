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


class KeluarController extends Controller
{
    public function index(Request $request)
    {
        // $q = $request->get('q');

        // $barang['result'] = Barang::where(function ($query) use ($q) {
        //     $query->where('kategori_produk', 'like', '%' . $q . '%');
        //     $query->orwhere('nama_produk', 'like', '%' . $q . '%');
        //     $query->orwhere('stok', 'like', '%' . $q . '%');
        //     $query->orwhere('harga_produk', 'like', '%' . $q . '%');
        // })->paginate();

        // $barang['q'] = $q;
        // return view('barang.index', $barang);
        $datakeluar = Keluar::all(); //buat barang masuk
        // $data = Barang::all();
        return view('keluar.index', compact('datakeluar'));
    }
    public function create()
    {
        $barang = Barang::all();
        return view('keluar.create', compact('barang'));
    }
    public function show($id)
    {
        $data = Barang::findOrfail($id);
        return view('keluar.show', compact('data'));
    }

    public function store(Barang $id, Request $request)
    {
        // $keluar =  new Keluar;
        // $keluar->stok = $request->stok;
        // $keluar->status = $request->status;
        // $keluar->barang_id = $request->barang_id;
        // $transaksi->users_id = Auth::id();
        // dd($keluar);
        // $keluar->save();
        $masuk =  new Keluar;
        $masuk->stok_keluar = $request->stok_keluar;
        $keluar = Keluar::create([
            'stok' => $request['stok_keluar'],
            'status' => $request['status'],
            'barang_id' => $request['barang_id'],
            'laporan' => $request['laporan'],

        ]);
        $barang = Barang::find($request->barang_id);
        // $test = $masuk->stok = $request['stok_keluar'] - $barang->stok = $request['stok'];
        $barang->stok = $request['stok'] - $request['stok_keluar'];
        // dd($barang);
        $barang->save();
        return redirect('/keluar/index');
    }
    // public function show($id)
    // {
    //     $data = Barang::findOrfail($id);
    //     return view('keluar.show', compact('data'));
    // }
    public function edit(Barang $barang)
    {
        $barang = Barang::all();
        return view('keluar.create', compact('barang'));
    }
    public function update(Barang $barang, Request $request)
    {
        $keluar = Keluar::find($request->id);
        $keluar->stok = $request->stok;
        $keluar->save();
        // // $stok = Admin::find($request->admin_id);
        // $stok->stok = $request->stok;
        // $stok->save();
        dd($keluar);
        return redirect('/keluar/index');
    }
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('/barang/index')->with('success', 'Data Berhasil Dihapus');
    }
    public function update_laporan(Keluar $id, Request $request)
    {
        $barang = Keluar::find($request->id);
        $barang->laporan = $request->status;
        $barang->save();
        // $stok = Barang::find($request->admin_id);
        // $stok->stok = $request->stok;
        // $stok->save();
        // dd($transaksi);
        return redirect('/kepala/index');
    }
}