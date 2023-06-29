<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data['data'] = User::all();
        return view('admin.index', $data);

        // $start = Carbon::parse($request->start_date);
        // $end = Carbon::parse($request->end_date);
        // $data = User::whereDate('date', '<=', $end->format('m-d-y'))
        //     ->whereDate('date', '>=', $start->format('m-d-y'));

        // return view('admin.index', compact('data'));
    }
    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if (empty($start_date && $end_date)) {
            $data['data'] = User::all();
            return view('admin.index', $data);
        } else {
            $data = User::whereBetween('created_at', [$start_date, $end_date])
                ->get();
            return view('admin.index', compact('data'));
        }
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $rules =
            [
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'alamat' => 'required',
                'nik' => 'required|numeric',
                // 'foto_produk' => 'required|mimes:jpg,png|max:1024',
                'type' => 'required',
            ];
        $this->validate($request, $rules);
        $data = $request->all();
        // if ($request->hasFile('foto_produk')) {
        //     $fileName = $request->foto_produk->getClientOriginalName();

        //     $request->foto_produk->storeAs('admin', $fileName);
        //     $input['foto_produk'] = $fileName;
        // }
        // User::create($input);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'nik' => $data['nik'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
        ]);
        return redirect('/admin/index')->with('success', 'Data Berhasil Disimpan');
    }
    public function show($id)
    {
        $admin = User::findOrfail($id);
        return view('admin.show', compact('admin'));
    }
    public function edit(User $admin)
    {
        return view('admin.create', compact(var_name: 'admin'));
    }

    public function update(User $admin, Request $request)
    {
        $rules =
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                // 'foto_produk' => 'required|mimes:jpg,png|max:1024',
                'type' => 'required',
            ];
        $this->validate($request, $rules);
        $input = $request->all();

        // if ($request->hasFile('foto_produk')) {
        //     $fileName = $request->foto_produk->getClientOriginalName();

        //     $request->foto_produk->storeAs('admin', $fileName);
        //     $input['foto_produk'] = $fileName;
        // }
        $admin->update($input);
        return redirect(to: '/admin/index')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroy($id)
    {
        $admin = User::find($id);
        // if ($admin->type() == '1') {
        //     abort(401, 'Admin cannot delete admins!');
        // }
        $admin->delete();
        return redirect('/admin/index')->with('success', 'Data Berhasil Dihapus');
    }
}
