@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<style>
    body{margin-top:20px;
background-color:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container mt-5">
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                       
                        <div class="mb-4">
                          
                            
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Request Barang Atas Nama : {{ $data->barang->user->name }}</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1">Email : {{ $data->barang->user->email }}</p>
                            {{-- <p><i class="uil uil-phone me-1"></i> 012-345-6789</p> --}}
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Nama Barang   : {{ $data->barang->nama_barang }}</h5>
                                <img class="card-img-top" style="width: 300px" src="{{ $data->barang->foto_barang}}" alt="Card image cap">
                                {{-- <h5 class="font-size-15 mb-2">Preston Miller</h5>
                                <p class="mb-1">4068 Post Avenue Newfolden, MN 56738</p>
                                <p class="mb-1">PrestonMiller@armyspy.com</p>
                                <p>001-234-5678</p> --}}
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Laporan No:</h5>
                                    <p>K{{ $data->id  }}{{ $data->created_at->format('mdY') }}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Tanggal Laporan:</h5>
                                    <p>{{ $data->created_at }}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Kode Ring :</h5>
                                    <p>{{ $data->barang->kategori->kode_ring }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    
                    <div class="py-2">
                        <h5 class="font-size-15">Laporan barang Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        {{-- <th style="width: 70px;">No.</th> --}}
                                        <th>Stok Barang Keluar</th>
                                        <th>Harga</th>
                                        <th>Ruangan</th>
                                        <th>Status</th>
                                        <th>Laporan</th>
                                        <th>Keterangan</th>
                                        <th>Keterangan Rusak</th>



                                        <th class="text-end" style="width: 120px;">Total</th>
                                        <th>ID</th>

                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    <tr>
                                        {{-- <th scope="row">01</th> --}}
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">{{ $countBarang }}</h5>
                                                {{-- <p class="text-muted mb-0">Watch, Black</p> --}}
                                            </div>
                                        </td>
                                        <td>@currency($data->barang->harga_barang)</td>
                                        <td>{{ $data->barang->ruangan->nama_ruangan }}
                                                <p class="text-muted mb-0">{{ $data->barang->ruangan->lantai }}</p>

                                        </td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->barang->laporan }}</td>
                                        <td>{{ $data->barang->keterangan }}</td>

                                        <td>{{ $data->keterangan_keluar }}</td>

                                        
                                       
                                        <td class="text-end">@currency($countBarang * $data->barang->harga_barang)</td>
                                        <td> 
                                             
                                            @foreach ($transaksi as $trx )
                                            <p>
                                                 {{ $trx->barang->kategori->nama_kategori }}{{ $trx->id }}</p>
                                                {{-- <input style="display: none;" type="text" hidden name="transaksi_id" value="{{ $trx->id }}" class="form-control"> --}}
                                           
                                        @endforeach
                                        </td>

                                        
                                    </tr>
                                    <!-- end tr -->
                                   
                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                {{-- <a href="#" class="btn btn-primary w-md">Send</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
</div>
@endsection