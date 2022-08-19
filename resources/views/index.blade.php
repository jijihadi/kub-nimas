@extends('layouts.main')
@section('style')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
@endsection
@section('content')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0"> Selamat Datang
                    {{ (Auth::user()->role == 2 ? 'Admin' : 'Perangkat KUB') . ', ' . Auth::user()->name }}
                </h4>
            </div>
            {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div> --}}
        </div>
        @if (Auth::user()->role == 2)
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header bg-info bg-opacity-25">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <h6 class="card-title">Data KUB Terkini</h6>
                                </div>
                                <div class="col-6 ">
                                </div>
                            </div>
                            </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @include('layouts.partial.alert')
                                <table id="dataTableExample" class="table table-bordered table-responsive table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th rowspan="2">#</th>
                                            <th rowspan="2">Nama KUB</th>
                                            <th rowspan="2">Alamat</th>
                                            <th rowspan="2">Jumlah Anggota</th>
                                            <th rowspan="2">Kelas</th>
                                            <th colspan="2">Nomor Registrasi</th>
                                            <th rowspan="2">Ketua</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>SKT</th>
                                            <th>PUPI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($main->toarray()))
                                            @foreach ($main as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->alamat }}</td>
                                                    <td>{{ $row->jumlah_anggota }} orang</td>
                                                    <td>{{ $row->kelas }}</td>
                                                    <td>{{ $row->noreg_skt }}</td>
                                                    <td>{{ $row->noreg_pupi }}</td>
                                                    <td>{{ getfieldbyid('users', 'name', $row->id_ketua) }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if (empty($main->toarray()))
                                            <td colspan="11" class="text-center text-secondary">
                                                <i>Data masih kosong</i>
                                            </td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
                <div class="card">
                    <div class="card-header bg-success bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Surat Masuk</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div> --}}
                            </div>
                        </div>
                        </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            @if (!empty($main->toarray()))
                                @foreach ($second as $row)
                                    <a href="{{ url('surat-edit') . '/' . $row->id }}"
                                        class="d-flex align-items-center border-bottom pb-3 mt-1">
                                        <div class="me-3">
                                            {{-- <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35"
                                                alt="user"> --}}
                                            <i class="icon-lg text-success" data-feather="mail"></i>
                                        </div>
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="text-body mb-2">Untuk {{ $row->tujuan_masuk }}</h6>
                                                <p class="text-muted tx-12">{{ tglindo($row->tanggal_masuk) }}</p>
                                            </div>
                                            <p class="text-muted tx-13">{{ $row->perihal_masuk }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-8 stretch-card">
                <div class="card">
                    <div class="card-header bg-primary bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Hasil Produksi Terbaru</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span
                                            class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="trash" class="icon-sm me-2"></i> <span
                                            class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="printer" class="icon-sm me-2"></i> <span
                                            class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="download" class="icon-sm me-2"></i> <span
                                            class="">Download</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama Anggota</th>
                                        <th>Tanggal Produksi</th>
                                        <th>Jumlah (Kg)</th>
                                        <th>Nilai (Rp)</th>
                                        <th>Ket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($third->toarray()))
                                        @foreach ($third as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucwords($row->nama_anggota) }}</td>
                                                <td><b>{{ tglindo($row->tanggal) }}</b></td>
                                                <td>{{ $row->jumlah }}&nbsp;Kg</td>
                                                <td>{{ rupiah($row->nilai) }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (empty($third->toarray()))
                                        <td colspan="8" class="text-center text-secondary">
                                            <i>Data masih kosong</i>
                                        </td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>
@endsection
@section('scripts')
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="{{ asset('/assets/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('/assets/js/datepicker.js') }}"></script>
    <!-- End custom js for this page -->
@endsection
