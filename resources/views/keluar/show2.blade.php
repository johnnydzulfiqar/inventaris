@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Welcome  {{ Auth::user()->name }} </span></h4>
  <div class="card text-center">
    <div class="card-header">
      <h1>Detail Barang</h1>
    </div>
    <div class="card-body">
      <img class="card-img-top" style="width: 300px" src="{{ $data->barang->foto_barang}}" alt="Card image cap">
      <h5 class="card-title">Nama Barang   : {{ $data->barang->nama_barang }}</h5>
      <h5 class="card-title">ID Barang   : <?php
        echo uniqid();
        ?></h5>
      <h5 class="card-title">Stok Barang   : {{ $data->stok }}</h5>
      <h5 class="card-title">Harga Barang  : @currency($data->barang->harga_barang) </h5>
      <h5 class="card-title">Nama Ruangan  : {{ $data->barang->ruangan->nama_ruangan }}</h5>
      <h5 class="card-title">Lokasi Barang : {{ $data->barang->ruangan->lantai }}</h5>
      <h5 class="card-title">Lokasi Barang : {{ $data->barang->ruangan->kategori }}</h5>
      <h5 class="card-title">Request By : {{ $data->barang->user->name }}</h5>
      <h5 class="card-title">Status Barang : {{ $data->status }}</h5>
      <h5 class="card-title">Total Harga Barang : @currency($data->barang->stok * $data->barang->harga_barang)</h5>
      <h5 class="card-title">Laporan Barang : {{ $data->barang->laporan }}</h5>
      {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
      @if ( auth()->user()->type == 'user')       
      <a href="/barang/index" class="btn btn-primary">DashBoard</a>
          @endif
          @if ( auth()->user()->type == 'kepala')       
          <a href="/kepala/index" class="btn btn-primary">DashBoard</a>
              @endif
        
    </div>
    {{-- <div class="card-footer text-muted">
      2 days ago
    </div> --}}
  </div>
</div>
@endsection