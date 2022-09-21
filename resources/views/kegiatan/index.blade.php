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
                                    <a href="{{ url('usaha-add') }}">
                                        <button type="button" class="btn btn-sm btn-primary btn-icon-text float-end">
                                            <i class="btn-icon-prepend" data-feather="plus"></i>
                                            Add Data
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @include('layouts.partial.alert')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                                    aria-controls="all"
                                    aria-selected="true">{{ getidkub(Auth::user()->id) > 0 ? 'KUB Saya' : 'Semua KUB' }}</a>
                            </li>
                            @if (getidkub(Auth::user()->id) == 0)
                                @foreach ($primary as $row)
                                    <li class="nav-item">
                                        <a class="nav-link" id="{{ makeclass($row->name) }}-tab" data-bs-toggle="tab"
                                            href="#{{ makeclass($row->name) }}" role="tab"
                                            aria-controls="{{ makeclass($row->name) }}"
                                            aria-selected="true">{{ maketitle($row->name) }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="tab-content border border-top-0 p-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table table-hover mb-0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                {!! Auth::user()->role == 1 ? '' : '<th>KUB</th>' !!}
                                                <th>Uraian</th>
                                                <th>Volume</th>
                                                <th>Pelaksana/Tempat</th>
                                                <th>Hasil</th>
                                                <th>Keterangan</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($main->toarray()))
                                                @foreach ($main as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><b>{{ tglindo($row->tanggal) }}</b></td>
                                                        {!! Auth::user()->role == 1 ? '' : '<td>' . getfieldbyid('kubs', 'name', $row->id_kub) . '</td>' !!}
                                                        <td>{{ $row->uraian }}</td>
                                                        <td>{{ $row->volume }}&nbsp;Orang</td>
                                                        <td>{{ $row->pelaksana }} di {{ $row->tempat }}</td>
                                                        <td>{{ $row->hasil }}</td>
                                                        <td>{{ $row->keterangan }}</td>
                                                        <td>
                                                            @if (cek_admin() == 1)
                                                                <!--Edit-->
                                                                <a href="{{ url('usaha-edit') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success btn-icon-text">
                                                                        <i class="btn-icon-prepend"
                                                                            data-feather="edit-3"></i>
                                                                        Ubah
                                                                    </button>
                                                                </a>
                                                                <!--Delete-->
                                                                <a href="{{ url('usaha-delete') . '/' . $row->id }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-danger btn-icon-text"
                                                                        onclick="return confirm('Hapus data {{ tglindo($row->tanggal) }}?');">
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
                                                <td colspan="8" class="text-center text-secondary">
                                                    <i>Data masih kosong</i>
                                                </td>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @php($i = 1)
                            @foreach ($primary as $rows)
                                <div class="tab-pane fade" id="{{ makeclass($rows->name) }}" role="tabpanel"
                                    aria-labelledby="{{ makeclass($rows->name) }}-tab">
                                    <div class="table-responsive">
                                        <table id="dataTableExample{{ $i }}" class="table table-hover mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Tanggal</th>
                                                    {!! Auth::user()->role == 1 ? '' : '<th>KUB</th>' !!}
                                                    <th>Uraian</th>
                                                    <th>Volume</th>
                                                    <th>Pelaksana/Tempat</th>
                                                    <th>Hasil</th>
                                                    <th>Keterangan</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (gettable('usahas', 'id_kub', $rows->id) > 0)
                                                    @foreach (gettable('usahas', 'id_kub', $rows->id) as $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><b>{{ tglindo($row->tanggal) }}</b></td>
                                                            {!! Auth::user()->role == 1 ? '' : '<td>' . getfieldbyid('kubs', 'name', $row->id_kub) . '</td>' !!}
                                                            <td>{{ $row->uraian }}</td>
                                                            <td>{{ $row->volume }}&nbsp;Orang</td>
                                                            <td>{{ $row->pelaksana }} di {{ $row->tempat }}</td>
                                                            <td>{{ $row->hasil }}</td>
                                                            <td>{{ $row->keterangan }}</td>
                                                            <td>
                                                                @if (cek_admin() == 1)
                                                                    <!--Edit-->
                                                                    <a href="{{ url('usaha-edit') . '/' . $row->id }}">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-success btn-icon-text">
                                                                            <i class="btn-icon-prepend"
                                                                                data-feather="edit-3"></i>
                                                                            Ubah
                                                                        </button>
                                                                    </a>
                                                                    <!--Delete-->
                                                                    <a href="{{ url('usaha-delete') . '/' . $row->id }}">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-danger btn-icon-text"
                                                                            onclick="return confirm('Hapus data {{ tglindo($row->tanggal) }}?');">
                                                                            <i class="btn-icon-prepend"
                                                                                data-feather="trash-2"></i>
                                                                            Hapus
                                                                        </button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @php($i++)
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
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
