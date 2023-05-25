@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Welcome  {{ Auth::user()->name }} /</span> Basic Tables</h4>
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div>
    <div class="demo-inline-spacing " style="margin:-25px 0px 10px 20px;">
      @if ( auth()->user()->type == 'user')   
      <a type="button" class="btn btn-outline-primary" href="{{ url('barang/create') }}">
        <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Tambah Barang
      </a>    
      @endif
    </div>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          {{-- <th>Foto</th> --}}
          <th>Foto Barang</th>
          <th>Nama Barang</th>
          <th>Stok</th>
          {{-- <th>Harga Barang</th> --}}
          <th>Lokasi Barang</th>
          <th>Status</th>
         
          <th>Request</th>
          <th>Laporan</th>
          @if ( auth()->user()->type == 'user')       
          <th>Action</th>
          @endif

        </tr>
      </thead>
      @foreach ($datareject as $item)
      <tbody class="table-border-bottom-0">
        <tr>
          <td>{{ $loop->iteration }}</td>
                        {{-- <td><img src="{{ asset('layout/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" /></td> --}}
                        <td><img src="{{ $item->foto_barang}}" alt="foto" width="100px"></td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        {{-- <td>{{ $item->harga_barang }}</td> --}}
                        <td>{{ $item->ruangan->nama_ruangan }}</td>
                        <td>{{ $item->status }}</td>
                        
                         
                          
                        <td>{{ $item->user->name }}</td>
                        @if($item->laporan === 'Belum Konfirmasi')
                        <td style="color: red">
                        {{ $item->laporan  }}</td>
                        
                        @else
                        <td style="color: green">
                            {{ $item->laporan  }}</td>
                            @endif
                            @if ( auth()->user()->type == 'kepala')
                      <td><form action="/barang/{barang}/laporan" method="post" enctype="multipart/form-data">
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
                <td>      
                  <form action="/barang/{{  $item->id }}" method="POST">
                    @csrf
                   @method('delete')
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                   
                    <div class="dropdown-menu">
                      @if ( auth()->user()->type == 'user') 
                      <a class="dropdown-item" href="/barang/{{ $item->id }}/edit"
                        ><i class="bx bx-edit-alt me-2"></i> Edit</a
                      >
                      <a class="dropdown-item" href="/barang/{{ $item->id }}/show"
                        ><i class="bx bx-edit-alt me-2"></i> Detail</a
                      >
                      <input type="submit" class="btn btn-danger btn-sm" value="delete">
                      @endif    
                      @if ( auth()->user()->type == 'kepala') 
                      <a class="dropdown-item" href="/kepala/{{ $item->id }}/show"
                        ><i class="bx bx-edit-alt me-2"></i> Detail</a
                      >
                      @endif  
                                     
                </div>
              </div>
            </form>  
              </td>
        </tr>
        @endforeach
        
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection