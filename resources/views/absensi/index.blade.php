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
                                <a href="{{ url('daftar-hadir-add') }}">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon-text float-end">
                                        <i class="btn-icon-prepend" data-feather="plus"></i>
                                        Add Data
                                    </button>
                                </a>
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
                                    <table id="dataTableExample" class="table table-bordered table-responsive table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Nama Kegiatan</th>
                                                {!! Auth::user()->role == 1 ? '' : '<th>KUB</th>' !!}
                                                <th>Tanggal</th>
                                                <th>Peserta/Jabatan</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($main->toarray()))
                                                @foreach ($main as $row)
                                                    @php
                                                        $id = explode(',', $row->ids);
                                                        $tanggal = explode(',', $row->tanggal);
                                                        $peserta = explode(',', $row->peserta);
                                                        $jabatan = explode(',', $row->jabatan);
                                                        $alamat = explode(',', $row->alamat);
                                                        $max = count($tanggal);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->kegiatan }}</td>
                                                        {!! Auth::user()->role == 1 ? '' : '<td>' . getfieldbyid('kubs', 'name', $row->id_kub) . '</td>' !!}
                                                        <td>{{ tglindo($tanggal[0]) }}</td>
                                                        <td>
                                                            <ol>
                                                                @for ($i = 0; $i < $max; $i++)
                                                                    <li class="mb-2">
                                                                        {{ $peserta[$i] }}/<b>{{ $jabatan[$i] }}</b>

                                                                        <a
                                                                            href="{{ url('daftar-hadir-edit') . '/' . $id[$i] }}">
                                                                            <button type="button"
                                                                                class="btn btn-xs btn-outline-success btn-icon-text">
                                                                                <i class="btn-icon-prepend"
                                                                                    data-feather="edit-3"></i>
                                                                                Ubah
                                                                            </button>
                                                                        </a>
                                                                        <a
                                                                            href="{{ url('daftar-hadir-delete') . '/' . $id[$i] }}">
                                                                            <button type="button"
                                                                                class="btn btn-xs btn-outline-danger btn-icon-text"
                                                                                onclick="return confirm('Hapus data {{ $peserta[$i] }} di kegiatan {{ $row->kegiatan }}?');">
                                                                                <i class="btn-icon-prepend"
                                                                                    data-feather="trash-2"></i>
                                                                                Hapus
                                                                            </button>
                                                                        </a>
                                                                    </li>
                                                                @endfor
                                                            </ol>
                                                        </td>
                                                        <td>
                                                            <ol>
                                                                @for ($i = 0; $i < $max; $i++)
                                                                    <li class="mb-4">{{ $alamat[$i] }} </li>
                                                                @endfor
                                                            </ol>
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
                            </div>
                            @php($i = 1)
                            @foreach ($primary as $rows)
                                <div class="tab-pane fade" id="{{ makeclass($rows->name) }}" role="tabpanel"
                                    aria-labelledby="{{ makeclass($rows->name) }}-tab">
                                    <div class="table-responsive">
                                        <table id="dataTableExample"
                                            class="table table-bordered table-responsive table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Tanggal</th>
                                                    <th>Peserta/Jabatan</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- {{dd(gettable('absensis', 'id_kub', $rows->id))}} --}}
                                                @if (gettable('absensis', 'id_kub', $rows->id) > 0)
                                                    @foreach (gettable('absensis', 'id_kub', $rows->id) as $row)
                                                        <?php
                                                        $id = explode(',', $row->id);
                                                        $tanggal = explode(',', $row->tanggal);
                                                        $peserta = explode(',', $row->peserta);
                                                        $jabatan = explode(',', $row->jabatan);
                                                        $alamat = explode(',', $row->alamat);
                                                        $max = count($tanggal);
                                                        ?>
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $row->kegiatan }}</td>
                                                            <td>{{ tglindo($tanggal[0]) }}</td>
                                                            <td>
                                                                <ol>
                                                                    @for ($i = 0; $i < $max; $i++)
                                                                        <li class="mb-2">
                                                                            {{ $peserta[$i] }}/<b>{{ $jabatan[$i] }}</b>

                                                                            <a
                                                                                href="{{ url('daftar-hadir-edit') . '/' . $id[$i] }}">
                                                                                <button type="button"
                                                                                    class="btn btn-xs btn-outline-success btn-icon-text">
                                                                                    <i class="btn-icon-prepend"
                                                                                        data-feather="edit-3"></i>
                                                                                    Ubah
                                                                                </button>
                                                                            </a>
                                                                            <a
                                                                                href="{{ url('daftar-hadir-delete') . '/' . $id[$i] }}">
                                                                                <button type="button"
                                                                                    class="btn btn-xs btn-outline-danger btn-icon-text"
                                                                                    onclick="return confirm('Hapus data {{ $peserta[$i] }} di kegiatan {{ $row->kegiatan }}?');">
                                                                                    <i class="btn-icon-prepend"
                                                                                        data-feather="trash-2"></i>
                                                                                    Hapus
                                                                                </button>
                                                                            </a>
                                                                        </li>
                                                                    @endfor
                                                                </ol>
                                                            </td>
                                                            <td>
                                                                <ol>
                                                                    @for ($i = 0; $i < $max; $i++)
                                                                        <li class="mb-4">{{ $alamat[$i] }} </li>
                                                                    @endfor
                                                                </ol>
                                                            </td>
                                                        </tr>
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
