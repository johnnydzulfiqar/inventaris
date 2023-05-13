<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Barang;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        $ruangan = Ruangan::all();
        return view('ruangan.index', compact('ruangan'));
    }
    public function create()
    {
        return view('ruangan.create');
    }
    public function store(Request $request)
    {
        $rules =
            [
                'nama_ruangan' => 'required',
                'lantai' => 'required',
            ];
        $this->validate($request, $rules);
        $input = $request->all();
        Ruangan::create($input);
        return redirect('/ruangan/index')->with('success', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $data = Ruangan::findOrfail($id);
        return view('ruangan.show', compact('data'));
    }
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.create', compact(var_name: 'ruangan'));
    }
    public function update(Ruangan $ruangan, Request $request)
    {
        $rules =
            [
                'nama_ruangan' => 'required',
                'lantai' => 'required',
            ];
        $this->validate($request, $rules);
        $input = $request->all();

        $ruangan->update($input);
        return redirect(to: '/ruangan/index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);
        $ruangan->delete();
        return redirect('/ruangan/index')->with('success', 'Data Berhasil Dihapus');
    }
}
