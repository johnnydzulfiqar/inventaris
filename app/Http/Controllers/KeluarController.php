<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Kepala;
use App\Models\User;
use App\Models\Keluar;
use App\Models\Transaksi;



use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $datakeluar = Keluar::all();
            return view('keluar.index', compact('datakeluar'));
        } else {
            $datakeluar = Keluar::whereBetween('created_at', [$start_date, $end_date])
                // ->where('status', '=', 'Masuk')
                ->get();
            return view('keluar.index', compact('datakeluar'));
        }
    }
    public function create()
    {
        $barang = Barang::all();
        return view('keluar.create', compact('barang'));
    }
    public function show($id)
    {
        $data = Barang::findOrfail($id);
        $data2 = Transaksi::where('barang_id', '=',  $id)
            ->Where('status_barang', 1)
            ->count();
        return view('keluar.show', compact('data', 'data2'));
    }
    public function show2($id)
    {
        $data = Keluar::findOrfail($id);
        return view('keluar.show2', compact('data'));
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
        $rules =
            [
                // 'stok_keluar' => 'required|numeric',
                'keterangan_keluar' => 'required',
            ];
        $this->validate($request, $rules);
        $barang = Barang::find($request->barang_id);
        // $test = $masuk->stok = $request['stok_keluar'] - $barang->stok = $request['stok'];
        $masuk =  new Keluar;
        $masuk->stok_keluar = $request->stok_keluar;
        $keluar = Keluar::create([
            // 'stok' => $request['stok_keluar'],
            'status' => $request['status'],
            'barang_id' => $request['barang_id'],
            'laporan' => $request['laporan'],
            'keterangan_keluar' => $request['keterangan_keluar'],
        ]);
        // $barang->stok = $request['stok'] - $request['stok_keluar'];
        // dd($barang);
        // $barang->save();
        // $filterarray = $request->toArray();

        $transaksi = Transaksi::find($request->barang_id);

        $transaksi->status_barang = $request['status_barang'];

        $transaksi->save();
        dd($request->all());

        return redirect('/guru/index');
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
        // $keluar->stok = $request->stok;
        $keluar->save();
        // // $stok = Admin::find($request->admin_id);
        // $stok->stok = $request->stok;
        // $stok->save();
        // dd($keluar);
        return redirect('/guru/index');
    }
    public function destroy($id)
    {
        $data = Keluar::find($id);
        $data->delete();
        return redirect('/keluar/index')->with('success', 'Data Berhasil Dihapus');
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
