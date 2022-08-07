@extends('layouts.main')

@section('style')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->
@endsection

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ get_headname('1') }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card text-white bg-secondary bg-gradient">
                    <div class="row mb-2 p-3">
                        <img src="{{ asset('assets/images/others/header-kas.png') }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h3> Total Saldo Kas </h3>
                            <h5 class="mt-2 fw-lighter fst-italic">
                                {{ rupiah(getsaldokas(date('Y-m-d'))) }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card text-white bg-success bg-gradient">
                    <div class="row mb-2 p-3">
                        <img src="{{ asset('assets/images/others/header-income.png') }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h3> Total Kas Masuk</h3>
                            <h5 class="mt-2 fw-lighter fst-italic">
                                {{ rupiah(getkasmasuk()) }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card text-white bg-danger bg-gradient">
                    <div class="row mb-2 p-3">
                        <img src="{{ asset('assets/images/others/header-outcome.png') }}" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <h3> Total Kas keluar</h3>
                            <h5 class="mt-2 fw-lighter fst-italic">
                                {{ rupiah(getkaskeluar()) }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6 class="card-title">Data {{ get_headname('1') }}</h6>
                            </div>
                            <div class="col-6 ">
                                @if (cek_admin() == 1)
                                    <a href="{{ url('kas-add') }}">
                                        <button type="button" class="btn btn-sm btn-primary btn-icon-text float-end">
                                            <i class="btn-icon-prepend" data-feather="plus"></i>
                                            Add Data
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            @include('layouts.partial.alert')
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#all"
                                        role="tab" aria-controls="all" aria-selected="true">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#first" role="tab"
                                        aria-controls="first" aria-selected="false">Masuk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#second" role="tab"
                                        aria-controls="second" aria-selected="false">Keluar</a>
                                </li>
                            </ul>
                            <div class="tab-content border border-top-0 p-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <table id="dataTableExample" class="table table-bordered table-responsive table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Jenis</th>
                                                <th>Uraian</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Saldo</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($main->toarray()))
                                                @foreach ($main as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ tglindo($row->tanggal) }}</td>
                                                        <td>{{ $row->keluar == 0 ? 'Kas Masuk' : 'Kas Keluar' }}</td>
                                                        <td>{{ $row->uraian }}</td>
                                                        <td>{{ rupiah($row->banyaknya) }}</td>
                                                        <td>{{ rupiah($row->harga_satuan) }}</td>
                                                        <td>{{ rupiah(getsaldokas($row->tanggal)) }}</td>
                                                        <td>
                                                            @if (cek_admin() == 1)
                                                                <!--Edit-->
                                                                <a href="{{ url('kas-edit') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success btn-icon-text">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="edit-3"></i>
                                                                        Ubah
                                                                    </button>
                                                                </a>
                                                                <!--Delete-->
                                                                <a href="{{ url('kas-delete') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-danger btn-icon-text"
                                                                        onclick="return confirm('Hapus data kas tanggal {{ tglindo($row->tanggal) }}?');">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="trash-2"></i>
                                                                        Hapus
                                                                    </button>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if (empty($main->toarray()))
                                                <td colspan="12" class="text-center text-secondary">
                                                    <i>Data masih kosong</i>
                                                </td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="first" role="tabpanel" aria-labelledby="profile-tab">
                                    <table id="dataTableExample2"
                                        class="table table-bordered table-responsive table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Uraian</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Saldo</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($first->toarray()))
                                                @foreach ($first as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ tglindo($row->tanggal) }}</td>
                                                        <td>{{ $row->uraian }}</td>
                                                        <td>{{ rupiah($row->banyaknya) }}</td>
                                                        <td>{{ rupiah($row->harga_satuan) }}</td>
                                                        <td>{{ rupiah(getsaldokas($row->tanggal)) }}</td>
                                                        <td>
                                                            @if (cek_admin() == 1)
                                                                <!--Edit-->
                                                                <a href="{{ url('kas-edit') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success btn-icon-text">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="edit-3"></i>
                                                                        Ubah
                                                                    </button>
                                                                </a>
                                                                <!--Delete-->
                                                                <a href="{{ url('kas-delete') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-danger btn-icon-text"
                                                                        onclick="return confirm('Hapus data {{ $row->name }}?');">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="trash-2"></i>
                                                                        Hapus
                                                                    </button>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if (empty($first->toarray()))
                                                <td colspan="12" class="text-center text-secondary">
                                                    <i>Data masih kosong</i>
                                                </td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="contact-tab">
                                    <table id="dataTableExample3"
                                        class="table table-bordered table-responsive table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Uraian</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Total</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($second->toarray()))
                                                @foreach ($second as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ tglindo($row->tanggal) }}</td>
                                                        <td>{{ $row->uraian }}</td>
                                                        <td>{{ rupiah($row->banyaknya) }}</td>
                                                        <td>{{ rupiah($row->harga_satuan) }}</td>
                                                        <td>{{ rupiah(getsaldokas($row->tanggal)) }}</td>
                                                        <td>
                                                            @if (cek_admin() == 1)
                                                                <!--Edit-->
                                                                <a href="{{ url('kas-edit') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success btn-icon-text">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="edit-3"></i>
                                                                        Ubah
                                                                    </button>
                                                                </a>
                                                                <!--Delete-->
                                                                <a href="{{ url('kas-delete') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-danger btn-icon-text"
                                                                        onclick="return confirm('Hapus data {{ $row->name }}?');">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="trash-2"></i>
                                                                        Hapus
                                                                    </button>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if (empty($second->toarray()))
                                                <td colspan="12" class="text-center text-secondary">
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
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <!-- End custom js for this page -->
@endsection
