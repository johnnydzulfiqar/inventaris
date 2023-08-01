<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $rules =
            [
                'nama_kategori' => 'required',
                'kode_ring' => 'required',
            ];
        $this->validate($request, $rules);
        $input = $request->all();
        Kategori::create($input);
        return redirect('/kategori/index')->with('success', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $data = Kategori::findOrfail($id);
        return view('kategori.show', compact('data'));
    }
    public function edit(Kategori $kategori)
    {
        return view('kategori.create', compact(var_name: 'kategori'));
    }
    public function update(Kategori $kategori, Request $request)
    {
        $rules =
            [
                'nama_kategori' => 'required',
                'kode_ring' => 'required',
            ];
        $this->validate($request, $rules);
        $input = $request->all();
        $kategori->update($input);
        return redirect(to: '/kategori/index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori/index')->with('success', 'Data Berhasil Dihapus');
    }
}
