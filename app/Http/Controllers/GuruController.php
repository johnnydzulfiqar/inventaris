<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Keluar;
use App\Models\Kepala;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Transaksi;


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
    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $data = Barang::where('user_id', Auth::id())->first();
            $data = Barang::all();
            return view('guru.index', compact('data'));
        } else {
            $data = Barang::where('user_id', Auth::id())->first();
            $data = Barang::whereBetween('created_at', [$start_date, $end_date])

                ->get();
            return view('guru.index', compact('data'));
        }
    }
    public function filterkeluar(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $data = Keluar::where('barang_id->user_id', Auth::id())->first();
            $data = Keluar::all();
            return view('guru.indexkeluar', compact('data'));
        } else {
            $data = Keluar::where('barang_id->user_id', Auth::id())->first();
            $data = Keluar::whereBetween('created_at', [$start_date, $end_date])
                ->where('status', '=', 'Keluar')
                ->get();
            return view('guru.indexkeluar', compact('data'));
        }
    }
    public function create()
    {
        $ruangan = Ruangan::all();
        $kategori = Kategori::all();
        return view('guru.create', compact('ruangan', 'kategori'));
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

        $barang = Barang::create(
            $input
            // [
            //     'user_id' => $request->Auth::id(),
            // ]
        );
        for ($i = 1; $i <= $request->input('stok'); $i++) {
            Transaksi::create([
                'barang_id' => $barang->id,
                // 'id_ngaasal' => $barang->kategori . $getLatestTransaksiId,
                'status_barang' => 1
            ]);
            // $getLatestTransaksiId++;
        }
        return redirect('/guru/index')->with('success', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $data = Barang::findOrfail($id);
        return view('guru.show', compact('data'));
    }
}
