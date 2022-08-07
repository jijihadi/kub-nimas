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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6 class="card-title">Data {{ get_headname('1') }}</h6>
                            </div>
                            <div class="col-6 ">
                                @if (cek_admin() == 1)
                                    <a href="{{ url('buku-tamu-add') }}">
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
                            <table id="dataTableExample" class="table table-bordered table-responsive table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nama/Jabatan</th>
                                        <th>Kontak</th>
                                        <th>Tanggal Datang</th>
                                        <th>Tanggal Pulang</th>
                                        <th>Keperluan</th>
                                        <th>Kesan Pesan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($main->toarray()))
                                        @foreach ($main as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nama }}&nbsp;<b>({{ $row->jabatan }})</b></td>
                                                <td>{{ $row->telp }}</td>
                                                <td>{{ tglindo($row->tanggal_datang) }}</td>
                                                <td>{{ tglindo($row->tanggal_pulang) }}</td>
                                                <td>{{ $row->keperluan }}</td>
                                                <td>{{ $row->kesan }}/{{ $row->pesan }}</td>
                                                <td>
                                                    @if (cek_admin() == 1)
                                                        <a href="{{ url('buku-tamu-edit') . '/' . $row->id }}">
                                                            <button type="button"
                                                                class="btn btn-sm btn-success btn-icon-text">
                                                                <i class="btn-icon-prepend" data-feather="edit-3"></i>
                                                                Ubah
                                                            </button>
                                                        </a>
                                                        <!--Delete-->
                                                        <a href="{{ url('buku-tamu-delete') . '/' . $row->id }}">
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger btn-icon-text"
                                                                onclick="return confirm('Hapus data {{ $row->nama }}?');">
                                                                <i class="btn-icon-prepend" data-feather="trash-2"></i>
                                                                Hapus
                                                            </button>
                                                        </a>
                                                    @endif
                                                    <!--Edit-->
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (empty($main->toarray()))
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
