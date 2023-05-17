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
      <h5 class="card-title">Harga Barang  : {{ $data->harga_barang }}</h5>
      <h5 class="card-title">Nama Ruangan  : {{ $data->ruangan->nama_ruangan }}</h5>
      <h5 class="card-title">Lokasi Barang : {{ $data->ruangan->lantai }}</h5>
      <h5 class="card-title">Status Barang : {{ $data->status }}</h5>
      <h5 class="card-title">Total Harga Barang : {{ $data->stok * $data->harga_barang}}</h5>
      <h5 class="card-title">Laporan Barang : {{ $data->laporan }}</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="/barang/index" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
</div>
@endsection