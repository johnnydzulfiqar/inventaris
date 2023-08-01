@extends('layout.master')
  
@section('judul')
Index User
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row"> 
      <div class="col-lg-12 col-md-4 order-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('layout/assets/img/icons/unicons/user.png') }}" alt="chart success"
                      class="rounded" />
                  </div>
                  <div class="dropdown">
                    {{-- <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div> --}}
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">User Aktif</span>
                <h3 class="card-title mb-2"> {{ $userCount }}</h3>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('layout/assets/img/icons/unicons/cc-success.png') }}" alt="chart success"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      {{-- <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button> --}}
                      {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div> --}}
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Barang Masuk</span>
                  <h3 class="card-title mb-2">{{ $barangCount }}</h3>
                  {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                </div>
              </div>
          </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('layout/assets/img/icons/unicons/cc-warning.png') }}" alt="chart success"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      {{-- <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button> --}}
                      {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div> --}}
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Barang Keluar</span>
                  <h3 class="card-title mb-2">{{ $barangkeluarCount }}</h3>
                  {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                </div>
              </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img src="{{ asset('layout/assets/img/icons/unicons/wallet-info.png') }}" alt="chart success"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      {{-- <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button> --}}
                      {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div> --}}
                    </div>
                  </div>
                  <span class="fw-semibold d-block mb-1">Total Aset</span>
                  <h3 class="card-title mb-2">@currency( $total )</h3>
                  {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                </div>
              </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('layout/assets/img/icons/unicons/cc-warning.png') }}" alt="chart success"
                      class="rounded" />
                  </div>
                  <div class="dropdown">
                    {{-- <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div> --}}
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Barang Keluar</span>
                <h3 class="card-title mb-2">@currency( $total_keluar )</h3>
                {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
              </div>
            </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{ asset('layout/assets/img/icons/unicons/wallet-info.png') }}" alt="chart success"
                    class="rounded" />
                </div>
                <div class="dropdown">
                  {{-- <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button> --}}
                  {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div> --}}
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Notifikasi Barang Pending</span>
              <h3 class="card-title mb-2">{{ $pending }}</h3>
              @foreach ($pending_date as $item)
              <h5 class="card-title mb-2">Barang Pending pada tanggal : {{ $item->created_at->format('d-M-Y') }}</h3>
              @endforeach
             

              {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
            </div>
          </div>
    </div>
        </div>
      </div>
    </div>
</div>
@endsection