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
                                <a href="{{ url('inventaris-barang-add') }}">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon-text float-end">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        Add Data
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @include('layouts.partial.alert')
                            <table id="dataTableExample" class="table table-bordered table-responsive table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal</th>
                                        <th>Perolehan</th>
                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($main))
                                        @foreach ($main as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><b>{{ $row->kode }}</b></td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ tglindo($row->tanggal)}}</td>
                                                <td>{{ $row->perolehan }}</td>
                                                <td>{{ $row->jumlah }}&nbsp;Buah</td>
                                                <td>{{ $row->kondisi }}</td>
                                                <td>
                                                    <!--Edit-->
                                                    <a href="{{ url('inventaris-barang-edit') . '/' . $row->id }}">
                                                        <button type="button" class="btn btn-sm btn-success btn-icon-text">
                                                            <i class="btn-icon-prepend" data-feather="edit-3"></i>
                                                            Ubah
                                                        </button>
                                                    </a>
                                                    <!--Delete-->
                                                    <a href="{{ url('inventaris-barang-delete') . '/' . $row->id }}">
                                                        <button type="button" class="btn btn-sm btn-danger btn-icon-text" onclick="return confirm('Hapus data {{$row->name}}?');">
                                                            <i class="btn-icon-prepend" data-feather="trash-2"></i>
                                                            Hapus
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (!isset($main))
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
@endsection
