@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <form action="{{ !empty($barang) ? route('barang.update', $barang): url('barang/create')}}" method="POST" enctype="multipart/form-data">
            @if(!empty($barang))
            @method('PATCH')
            @endif
            @csrf
            <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Basic with Icons</h5>
            <small class="text-muted float-end">Merged input group</small>
          </div>
          <div class="card-body">
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Barang</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="text"
                      name="nama_barang"
                      class="form-control"
                      id="nama_barang"
                      value="{{ old('nama_barang', @$barang->nama_barang) }}"
                      aria-describedby="basic-icon-default-fullname2"
                    />
                  </div>
                </div>
              </div>
              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Stok</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                    <input
                      type="text"
                      id="stok"
                      name="stok"
                      value="{{ old('stok', @$barang->stok) }}"
                      class="form-control"
                     
                      aria-describedby="basic-icon-default-email2"
                    />
                    
                  </div>
                  
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Harga Barang</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="text"
                      id="harga_barang"
                      name="harga_barang"
                      value="{{ old('harga_barang', @$barang->harga_barang) }}"
                      class="form-control fullname2-mask"
                     
                      aria-describedby="basic-icon-default-fullname2"
                    />
                  </div>
                </div>
              </div>
              <label for="type">Ruangan</label>
              <select name="ruangan_id" id="ruangan_id" class="form-control">
                {{-- <option value="">Pilih Ruangan</option> --}}
                @foreach ($ruangan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
                    {{-- <option @selected(old('nama_ruangan', @$item->nama_ruangan) == '' ) value="">- Pilih Lantai -</option> --}}
                    {{-- <option @selected(old('id', @$item->id) == @$item->id) value="{{ @$item->id }}">{{ $item->nama_ruangan }}</option> --}}
                @endforeach
            </select>
              <div class="mb-3 row mt-3">
                <label for="foto_barang" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-5">
                  @if(!empty(@$barang->foto_barang))
                  <img src="{{ $barang->foto_barang }}" class="mb-3" alt="foto" width="100px" />
                  @endif
                      <input type="file" class="form-control" name="foto_barang" id="foto_barang" placeholder="foto_barang">
                  </div>
              </div>
              <label for="type">Status</label>
              <select id="status" name="status" class="form-select">
                <option value="Masuk">Masuk</option>
                <option value="Keluar">Keluar</option>
                {{-- <option value="2">Kepala Tata Usaha</option> --}}
              </select>
            </div>
            <input style="display: none;" type="text" hidden name="laporan" value="Belum Konfirmasi" class="form-control">
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
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