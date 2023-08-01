@extends('layout.master')
  
@section('judul')
Index Kategori
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4> --}}

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <form action="{{ !empty($kategori) ? route('kategori.update', $kategori): url('kategori/create')}}" method="POST" enctype="multipart/form-data">
            @if(!empty($kategori))
            @method('PATCH')
            @endif
            @csrf
            <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Form kategori</h5>
            {{-- <small class="text-muted float-end">Merged input group</small> --}}
          </div>
          <div class="card-body mt-3">
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name kategori</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="text"
                      name="nama_kategori"
                      class="form-control"
                      id="nama_kategori"
                      value="{{ old('nama_kategori', @$kategori->nama_kategori) }}"
                      aria-describedby="basic-icon-default-fullname2"
                    />
                    @error('nama_kategori')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
                  </div>
                </div>
               <div class="card-body mt-3">
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Kode Ring</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="text"
                      name="kode_ring"
                      class="form-control"
                      id="kode_ring"
                      value="{{ old('kode_ring', @$kategori->kode_ring) }}"
                      aria-describedby="basic-icon-default-fullname2"
                    />
                    @error('kode_ring')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
                  </div>
                </div>
              </div>
              
             
          
              
              {{-- <div class="mb-3 row mt-3">
                <label for="foto_produk" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-5">
                @if(!empty(@$admin->foto_produk))
                <img src="{{ $admin->foto_produk }}" class="mb-3" alt="foto" width="100px" />
                @endif
                    <input type="file" class="form-control" name="foto_produk" id="foto_produk" placeholder="foto_produk">
                </div>
            </div> --}}
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mb-3 mt-3">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
@endsection