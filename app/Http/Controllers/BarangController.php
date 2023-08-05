<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Kepala;
use App\Models\User;
use App\Models\Keluar;
use App\Models\Kategori;
use App\Models\Transaksi;


use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BarangController extends Controller
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
        $data = Barang::all()->where('status', '=', 'Masuk'); //buat barang masuk
        // $data = User::all();
        return view('barang.index', compact('data'));
    }
    // public function indexkeluar(Request $request)
    // {
    //     // $q = $request->get('q');

    //     // $barang['result'] = Barang::where(function ($query) use ($q) {
    //     //     $query->where('kategori_produk', 'like', '%' . $q . '%');
    //     //     $query->orwhere('nama_produk', 'like', '%' . $q . '%');
    //     //     $query->orwhere('stok', 'like', '%' . $q . '%');
    //     //     $query->orwhere('harga_produk', 'like', '%' . $q . '%');
    //     // })->paginate();

    //     // $barang['q'] = $q;
    //     // return view('barang.index', $barang);
    //     $datakeluar = Barang::all()->where('status', '=', 'Keluar'); //buat barang masuk
    //     // $data = Barang::all();
    //     return view('barang.indexkeluar', compact('datakeluar'));
    // }
    public function indexpending(Request $request)
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
        $datapending = Barang::all()->where('status', '=', 'Pending'); //buat barang masuk
        // $data = Barang::all();
        return view('barang.indexpending', compact('datapending'));
    }
    public function indexreject(Request $request)
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
        $datareject = Barang::all()->where('status', '=', 'Reject'); //buat barang masuk
        // $data = Barang::all();
        return view('barang.indexreject', compact('datareject'));
    }
    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $data = Barang::all()->where('status', '=', 'Masuk');
            return view('barang.index', compact('data'));
        } else {
            $data = Barang::whereBetween('created_at', [$start_date, $end_date])
                ->where('status', '=', 'Masuk')
                ->get();
            return view('barang.index', compact('data'));
        }
    }
    public function filterpending(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $datapending = Barang::all()->where('status', '=', 'Pending');
            return view('barang.indexpending', compact('datapending'));
        } else {
            $datapending = Barang::whereBetween('created_at', [$start_date, $end_date])
                ->where('status', '=', 'Pending')
                ->get();
            return view('barang.indexpending', compact('datapending'));
        }
    }
    public function filterreject(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $datareject = Barang::all()->where('status', '=', 'Reject');
            return view('barang.indexreject', compact('datareject'));
        } else {
            $datareject = Barang::whereBetween('created_at', [$start_date, $end_date])
                ->where('status', '=', 'Reject')
                ->get();
            return view('barang.indexreject', compact('datareject'));
        }
    }



    public function create()
    {
        $ruangan = Ruangan::all();
        $kategori = Kategori::all();

        return view('barang.create', compact('ruangan', 'kategori'));
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
        $barang = Barang::create($input);

        // $getLatestTransaksiId = Transaksi::latest()->first()->id + 1;

        for ($i = 1; $i <= $request->input('stok'); $i++) {
            Transaksi::create([
                'barang_id' => $barang->id,
                // 'id_ngaasal' => $barang->kategori . $getLatestTransaksiId,
                'status_barang' => 1
            ]);
            // $getLatestTransaksiId++;
        }

        return redirect('/barang/index')->with('success', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $data = Barang::findOrfail($id);
        return view('barang.show', compact('data'));
    }
    public function edit(Barang $barang)
    {
        $ruangan = Ruangan::all();
        $kategori = Kategori::all();

        return view('barang.create', compact('barang', 'ruangan', 'kategori'));
    }
    public function update(Barang $barang, Request $request)
    {
        $rules =
            [
                'nama_barang' => 'required',
                'stok' => 'required|numeric',
                'harga_barang' => 'required|numeric',
                // 'foto_barang' => 'required|mimes:jpg,png|max:1024',
                'status' => 'required',
                'keterangan' => 'required',

            ];
        $this->validate($request, $rules);
        $input = $request->all();
        $input = $request->except('user_id');
        if ($request->hasFile('foto_barang')) {
            $fileName = $request->foto_barang->getClientOriginalName();
            $request->foto_barang->storeAs('barang', $fileName);
            $input['foto_barang'] = $fileName;
        }

        // $data->nama_barang = $request->nama_barang;
        // $data->stok = $request->stok;
        // $data->harga_barang = $request->harga_barang;
        // $data->foto_barang = $request->foto_barang;
        // $data->status = $request->status;
        // $data->ruangan_id = $request->ruangan_id;
        // $data->save();
        // Barang::where('id', $id)->update($request->all());
        $barang->update($input);
        return redirect(to: '/barang/index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect('/barang/index')->with('success', 'Data Berhasil Dihapus');
    }
    public function update_laporan(Barang $id, Request $request)
    {

        $barang = Barang::find($request->id);
        $barang->laporan = $request->status;
        $barang->save();
        // $stok = Barang::find($request->admin_id);
        // $stok->stok = $request->stok;
        // $stok->save();
        // dd($transaksi);
        return redirect('/kepala/index');
    }
    public function cetak_pdf()
    {
        $data = Barang::all()->where('laporan', '=', 'Sudah Konfirmasi');
        $pdf = PDF::loadview('barang_pdf', ['data' => $data]);
        return $pdf->download('laporan-barang.pdf');
    }
    public function cetak_pdf2()
    {
        $data = Keluar::all()->where('laporan', '=', 'Sudah Konfirmasi');
        $pdf = PDF::loadview('barang_pdf2', ['data' => $data]);
        return $pdf->download('laporan-barang-keluar.pdf');
    }
}
