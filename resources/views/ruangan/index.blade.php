@extends('layout.master')
  
@section('judul')
Index Ruangan
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Login Sebagai  {{ Auth::user()->name }} </h4>

  <div>
    <div class="demo-inline-spacing " style="margin:-25px 0px 10px 20px;">
      <a type="button" class="btn btn-outline-primary" href="{{ url('ruangan/create') }}">
        <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Tambah Ruangan
      </a>    
    </div>

  
<div class="container">

  <div class="col-md-12">
      <div class="card">

        <div class="card-header">
          <h4>Data Index Barang</h4>
          {{-- <p>Data table with print, pdf, csv</p> --}}
      </div>

          <div class="card-body">

              <table class="table table-bordered table-hover" id="table_id">
                  <thead>
                 
                    <tr>
                      <th>No</th>
                      {{-- <th>Foto</th> --}}
                      <th>Nama Ruangan</th>
                      <th>Lantai</th>
                      <th>Kategori</th>
            
                      <th>Action</th>
            
                    </tr>
                  </thead>
               
                  <tbody>
                    @foreach ($ruangan as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                                    {{-- <td><img src="{{ asset('layout/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" /></td> --}}
                                    <td>{{ $item->nama_ruangan }}</td>
                                    <td>{{ $item->lantai }}</td>
                                    <td>{{ $item->kategori }}</td>
            
                                    
                                    <td>                  
                                     
                                      <form action="/ruangan/{{  $item->id }}" method="POST">
                                        @csrf
                                       @method('delete')
                                      <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                          <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="/ruangan/{{ $item->id }}/edit"
                                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                                          >
                                          <input type="submit" class="btn btn-danger btn-sm" value="delete">
                                                              
                                    </div>
                                  </div>
                                </form>
                                     
                                    </td>
                    </tr>
            
                @endforeach
                  </tbody>
               
              </table>

          </div>

      </div>
  </div>
@endsection