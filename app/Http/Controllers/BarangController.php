<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Kepala;

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
        $data = Barang::all();
        return view('barang.index', compact('data'));
    }
    public function create()
    {
        $ruangan = Ruangan::all();
        return view('barang.create', compact('ruangan'));
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
        // $data->foto_barang = $request->foto_barang;
        // $data->status = $request->status;
        // $data->ruangan_id = $request->ruangan_id;
        // $data->save();
        Barang::create($input);
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
        return view('barang.create', compact('barang', 'ruangan'));
    }
    public function update(Barang $barang, Request $request)
    {
        $rules =
            [
                'nama_barang' => 'required',
                'stok' => 'required|numeric',
                'harga_barang' => 'required|numeric',
                'foto_barang' => 'required|mimes:jpg,png|max:1024',
                'status' => 'required',
            ];
        $this->validate($request, $rules);
        $input = $request->all();

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
}
