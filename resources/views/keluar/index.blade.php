@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Login Sebagai  {{ Auth::user()->name }} </h4>

    <div class="demo-inline-spacing " style="margin:-25px 0px 10px 20px;">
      {{-- @if ( auth()->user()->type == 'user')   
      <a type="button" class="btn btn-outline-primary" href="{{ url('keluar/create') }}">
        <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Barang Keluar
      </a>    
      @endif --}}
      @if ( auth()->user()->type == 'kepala') 
      <a href="{{ url('/kepala/cetak_pdf2') }}" class="btn btn-primary" target="_blank">CETAK PDF</a>
      @endif
    </div>
 

<div class="container">

  <div class="col-md-12">
      <div class="card">

        <div class="card-header">
          <h4>Data Index Barang</h4>
          {{-- <p>Data table with print, pdf, csv</p> --}}
      </div>


          <div class="card-body">
            @if ( auth()->user()->type == 'user')   
            <form method="GET" action="{{ url('/keluar/filter') }}">
            @endif
            @if ( auth()->user()->type == 'kepala')   
            <form method="GET" action="{{ url('/kepala/filter2') }}">
            @endif
              <div class="row pb-3">
            <div class="col-md-3">
              <label>Start date</label>
              <input type="date" name="start_date" class="form-control">
            </div>
            <div class="col-md-3">
              <label>End date</label>
              <input type="date" name="end_date" class="form-control">
            </div>
            <div class="col-md-1 pt-4" style="margin: 5px 0px 0px 0px">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
          </form>
              <table class="table table-bordered table-hover" id="table_id">
                  <thead>
                 
                    <tr>
                      <th>No</th>
                      {{-- <th>Foto</th> --}}
                      {{-- <th>Foto Barang</th> --}}
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      {{-- <th>Harga Barang</th> --}}
                      <th>Lokasi Barang</th>
                      @if ( auth()->user()->type == 'user')   
                      <th>Status</th>
                      @endif
                      <th>Request</th>
            
                      <th>Laporan</th>
                      <th>Tanggal</th>

                      <th>Action</th>
                      
                      @if ( auth()->user()->type == 'kepala')       
                      <th>Validasi</th>
                      @endif
            
                      
            
                    </tr>
                  </thead>
               
                  <tbody>
                    @foreach ($datakeluar as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                                    {{-- <td><img src="{{ asset('layout/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" /></td> --}}
                                    {{-- <td><img src="{{ $item->barang->foto_barang}}" alt="foto" width="100px"></td> --}}
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>{{ $item->stok }}</td>
                                    {{-- <td>{{ $item->harga_barang }}</td> --}}
                                    <td>{{ $item->barang->ruangan->nama_ruangan }}</td>
                                    @if ( auth()->user()->type == 'user')   
                                    <td>{{ $item->status }}</td>
                                    @endif
                                     
                                      
                                    <td>{{ $item->barang->user->name }}</td>
                                    @if($item->laporan === 'Belum Konfirmasi')
                                    <td style="color: red">
                                    {{ $item->laporan  }}</td>
                                    
                                    @else
                                    <td style="color: green">
                                        {{ $item->laporan  }}</td>
                                        @endif
                                        
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>      
                              <form action="{{ url("/keluar/$item->id")}}" method="POST">
                                @csrf
                               @method('delete')
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                               
                                <div class="dropdown-menu">
                                 {{-- @if ( auth()->user()->type == 'user') 
                                  <a class="dropdown-item" href="/barang/{{ $item->id }}/edit"
                                    ><i class="bx bx-edit-alt me-2"></i> Edit</a
                                  > --}}
                                  @if ( auth()->user()->type == 'user') 
                                  <a class="dropdown-item" href="{{ url("/keluar/$item->barang_id/show2")}}"
                                    ><i class="bx bx-edit-alt me-2"></i> Detail</a>
                                  >
                                  @endif  
                                  {{-- <input type="submit" class="btn btn-danger btn-sm" value="delete">
                                  @endif     --}}
                                  @if ( auth()->user()->type == 'kepala') 
                                  <a class="dropdown-item" href="{{ url("/kepala/$item->id/show2")}}"
                                    ><i class="bx bx-edit-alt me-2"></i> Detail</a>
                                  >
                                  @endif  
                                                 
                            </div>
                          </div>
                        </form>  
                          </td>
                          @if ( auth()->user()->type == 'kepala')
                                  <td><form action="{{ url("/keluar/{keluar}/laporan")}}" method="post" enctype="multipart/form-data">
                                    @csrf 
                                    <input style="display: none;" type="text" hidden name="id" value="{{ $item->id }}" class="form-control">
                                    {{-- <input style="display: none;" type="text" hidden name="barang_id" value="{{ $item->admin->id }}" class="form-control">
                                    <input style="display: none;" type="text" hidden name="stok" value="{{ $item->admin->stok-1 }}" class="form-control"> --}}
                                    <input style="display: none;" type="text" hidden name="status" value="Sudah Konfirmasi" class="form-control">
                                @if ($item->laporan == 'Belum Konfirmasi')
                                <button type="submit" class="btn btn-success">Konfirmasi</button>
                                @else
                                @endif
                                @endif
                            </form>  </td>
                    </tr>
                @endforeach
                  </tbody>
               
              </table>

          </div>

      </div>
  </div>
@endsection