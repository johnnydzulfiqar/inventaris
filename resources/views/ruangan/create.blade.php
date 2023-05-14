@extends('layout.master')
  
@section('judul')
Index Ruangan
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Horizontal Layouts</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <form action="{{ !empty($ruangan) ? route('ruangan.update', $ruangan): url('ruangan/create')}}" method="POST" enctype="multipart/form-data">
            @if(!empty($ruangan))
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
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name Ruangan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"
                      ><i class="bx bx-user"></i
                    ></span>
                    <input
                      type="text"
                      name="nama_ruangan"
                      class="form-control"
                      id="nama_ruangan"
                      value="{{ old('nama_ruangan', @$ruangan->nama_ruangan) }}"
                      aria-describedby="basic-icon-default-fullname2"
                    />
                  </div>
                </div>
              </div>
              
              <label for="nama_ruangan">Lantai</label>
              <select id="lantai" name="lantai" class="form-select">
                <option @selected(old('lantai', @$ruangan->lantai) == '' ) value="">- Pilih Lantai -</option>
                <option @selected(old('lantai', @$ruangan->lantai) == 'Lantai 1') value="Lantai 1">Lantai 1</option>
                <option @selected(old('lantai', @$ruangan->lantai) == 'Lantai 2') value="Lantai 2">Lantai 2</option>
                <option @selected(old('lantai', @$ruangan->lantai) == 'Lantai 3') value="Lantai 3">Lantai 3</option>
                <option @selected(old('lantai', @$ruangan->lantai) == 'Lantai 4') value="Lantai 4">Lantai 4</option>
              </select>
              
              
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