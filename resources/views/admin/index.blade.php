@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Welcome  {{ Auth::user()->name }} /</span> Basic Tables</h4>
  <div>
    <div class="demo-inline-spacing " style="margin:-25px 0px 10px 20px;">
      <a type="button" class="btn btn-outline-primary" href="{{ url('admin/create') }}">
        <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Tambah User
      </a>    
    </div>
  </div>
</div>
<div class="container">

  <div class="col-md-12">
      <div class="card">

          <div class="card-header">
              <h4>Data Table Export</h4>
              <p>Data table with print, pdf, csv</p>
          </div>
          
          <div class="card-body">
           
              <form method="GET" action="/admin/filter">
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
            
        </div>
              <table class="table table-bordered table-hover" id="table_id">
                  <thead>
                      <tr>
                        <th>No</th>
                        {{-- <th>Foto</th> --}}
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>NIK</th>
                        <th>Jabatan</th>
                        <th>Tanggal</th>
                        <th>Actions</th>


                      </tr>
                  </thead>
               
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                                    {{-- <td><img src="{{ asset('layout/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" /></td> --}}
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>@if ($item->type == "user")
                                        staff tata usaha
                                    @else
                                    {{ $item->type }}
                                    @endif
                                     </td>
                                     <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    <td>
                                    
                                    @if ($item->type=='admin')
                                    <form action="/admin/{{  $item->id }}" method="POST">
                                      @csrf
                                     @method('delete')
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admin/{{ $item->id }}/edit"
                                          ><i class="bx bx-edit-alt me-2"></i> Edit</a
                                        >
                                        
                                                            
                                  </div>
                                </div>
                              </form>
                                    @else
                                    <form action="/admin/{{  $item->id }}" method="POST">
                                      @csrf
                                     @method('delete')
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admin/{{ $item->id }}/edit"
                                          ><i class="bx bx-edit-alt me-2"></i> Edit</a
                                        >
                                        <input type="submit" class="btn btn-danger btn-sm" value="delete">
                                                            
                                  </div>
                                </div>
                              </form>
                                    @endif  
                                         
                                      
                                    </td>
                    </tr>
                    @endforeach
                  </tbody>
               
              </table>

          </div>

      </div>
  </div>

</div>

@endsection