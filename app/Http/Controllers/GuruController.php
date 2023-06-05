<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Keluar;
use App\Models\Kepala;
use App\Models\User;

use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
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
        // $data = Barang::all()->where('status', '=', 'Masuk'); //buat barang masuk
        $data = Barang::where('user_id', Auth::id())->first();
        $data = Barang::all();
        return view('guru.index', compact('data'));
    }
    public function indexkeluar(Request $request)
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
        // $data = Barang::all()->where('status', '=', 'Masuk'); //buat barang masuk
        $data = Keluar::where('barang_id->user_id', Auth::id())->first();
        $data = Keluar::all();
        return view('guru.indexkeluar', compact('data'));
    }
    public function create()
    {
        $ruangan = Ruangan::all();
        return view('guru.create', compact('ruangan'));
    }
    public function store(Request $request)
    {
        $rules =
            [
                'nama_barang' => 'required',
                'stok' => 'required|numeric',
                'harga_barang' => 'required|numeric',
                'foto_barang' => 'required|mimes:jpg,png|max:1024',
                'status' => 'required',
                'keterangan' => 'required',

            ];
        $this->validate($request, $rules);
        $input = $request->all();
        if ($request->hasFile('foto_barang')) {
            $fileName = $request->foto_barang->getClientOriginalName();
            $request->foto_barang->storeAs('barang', $fileName);
            $input['foto_barang'] = $fileName;
        }
        // dd($input);
        // $data =  new Barang;
        // $data->nama_barang = $request->nama_barang;
        // $data->stok = $request->stok;
        // $data->harga_barang = $request->harga_barang;
        // if ($request->hasFile('foto_barang')) {
        //     $fileName = $request->foto_barang->getClientOriginalName();
        //     $request->foto_barang->storeAs('barang', $fileName);
        //     $data['foto_barang'] = $fileName;
        // }
        // $data->ruangan_id = $request->ruangan_id;
        // $data->status = $request->status;
        // $data->laporan = $request->laporan;
        // $data->user_id = Auth::id();
        // $data->save();
        // dd($data);
        // Barang::create();

        Barang::create(
            $input
            // [
            //     'user_id' => $request->Auth::id(),
            // ]
        );
        return redirect('/guru/index')->with('success', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $data = Barang::findOrfail($id);
        return view('guru.show', compact('data'));
    }
}
