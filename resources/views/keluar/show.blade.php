@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Welcome  {{ Auth::user()->name }} /</span> Basic Tables</h4>
  <div class="card text-center">
    <div class="card-header">
      Detail Barang
    </div>
    <div class="card-body">
      <img class="card-img-top" style="width: 300px" src="{{ $data->foto_barang}}" alt="Card image cap">
      <h5 class="card-title">Nama Barang   : {{ $data->nama_barang }}</h5>
      <h5 class="card-title">Stok Barang   : {{ $data->stok }}</h5>
      <h5 class="card-title">Harga Barang  : @currency($data->harga_barang)</h5>
      <h5 class="card-title">Nama Ruangan  : {{ $data->ruangan->nama_ruangan }}</h5>
      <h5 class="card-title">Lokasi Barang : {{ $data->ruangan->lantai }}</h5>
      <h5 class="card-title">Status Barang : {{ $data->status }}</h5>
      <h5 class="card-title">Total Harga Barang : @currency($data->stok * $data->harga_barang)</h5>
      <h5 class="card-title">Laporan Barang : {{ $data->laporan }}</h5>
      <h5 class="card-title">Keterangan Barang : {{ $data->keterangan }}</h5>

      <form action="/keluar/create" method="post" enctype="multipart/form-data">
        @csrf 
        <input style="display: none;" type="text" hidden name="barang_id" value="{{ $data->id }}" class="form-control">
        <input style="display" type="text" name="stok_keluar" value="{{ $data->stok }}" class="form-control">
        @error('stok')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <label for="keterangan_keluar">Keterangan Kerusakan</label>
    <input style="display" type="text" name="keterangan_keluar" value="" class="form-control">
        @error('keterangan_keluar')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
        <input style="display" type="text" hidden name="stok" value="{{ $data->stok }}" class="form-control">
        <input style="display: none;" type="text" hidden name="status" value="Keluar" class="form-control">
        <input style="display: none;" type="text" hidden name="laporan" value="Belum Konfirmasi" class="form-control">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Buat laporan barang keluar</button>
</form>  
    </div>
    {{-- <div class="card-footer text-muted">
      2 days ago
    </div> --}}
  </div>
</div>
@endsection