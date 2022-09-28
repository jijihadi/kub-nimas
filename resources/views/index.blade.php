@extends('layouts.main')
@section('style')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
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
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-info bg-opacity-25">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6 class="card-title">Rekap Data</h6>
                            </div>
                            <div class="col-6 ">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @if (getidkub(Auth::user()->id) == 0)
                                    @php($it = 1)
                                    @foreach ($main as $row)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $it == 1 ? 'active' : '' }}"
                                                id="{{ makeclass($row->name) }}-tabs" data-bs-toggle="tab"
                                                href="#{{ makeclass($row->name) }}s" role="tab"
                                                aria-controls="{{ makeclass($row->name) }}s"
                                                aria-selected="true">{{ maketitle($row->name) }}</a>
                                        </li>
                                        @php($it++)
                                    @endforeach
                                @endif
                            </ul>
                            <div class="tab-content border border-top-0 p-3" id="myTabContent">
                                @php($it = 1)
                                @foreach ($main as $row)
                                    @if (Auth::user()->role == 2)
                                        <div class="tab-pane fade {{ $it == 1 ? 'show active' : '' }}"
                                            id="{{ makeclass($row->name) }}s" role="tabpanel"
                                            aria-labelledby="{{ makeclass($row->name) }}-tabs">
                                            <div class="row">
                                                <div class="table-responsive col-12">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-black text-center">
                                                                    <h5>Rekap Data {{ $row->name }}</h5>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="table-responsive col-6">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th width="15%">Ketua KUB</th>
                                                                <th width="5%">:</th>
                                                                <td>{{ gettablefield('users', 'id', $row->id_ketua, 'name') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Alamat</th>
                                                                <th>:</th>
                                                                <td class="fst-italic">{{ $row->alamat }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Anggota</th>
                                                                <th>:</th>
                                                                <td>{{ $row->jumlah_anggota }} Orang
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kelas</th>
                                                                <th>:</th>
                                                                <td>{{ $row->kelas }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nomor Registrasi SKT</th>
                                                                <th>:</th>
                                                                <td>{{ $row->noreg_skt }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nomor Registrasi PUPI</th>
                                                                <th>:</th>
                                                                <td>{{ $row->noreg_pupi }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Didaftarkan pada</th>
                                                                <th>:</th>
                                                                <td>{{ tglindo($row->created_at) }}
                                                                </td>
                                                            </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="table-responsive col-6">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-black" colspan="3">Produksi</th>
                                                                @php($jumlahprod = gettable('produksis', 'id_kub', $row->id))
                                                                @php($kg = ($jumlahprod==0)?0:array_sum(array_column($jumlahprod, 'jumlah')))
                                                                @php($rp = ($jumlahprod==0)?0:array_sum(array_column($jumlahprod, 'nilai')))
                                                            </tr>
                                                            <tr>
                                                                <th width="15%">Total Produksi (Kg)</th>
                                                                <th width="5%">:</th>
                                                                <td>{{ $kg }} Kg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Hasil (Rp)</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($rp) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-black" colspan="3">Kas KUB</th>
                                                                @php($jumlahkas = gettable('kas', 'id_kub', $row->id))
                                                                @php($masuk = ($jumlahkas==0)?0:array_sum(array_column($jumlahkas, 'masuk')))
                                                                @php($keluar = ($jumlahkas==0)?0:array_sum(array_column($jumlahkas, 'keluar')))
                                                            </tr>
                                                            <tr>
                                                                <th>Uang Kas Masuk</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($masuk) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Uang Kas Keluar</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($keluar) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Saldo Kas</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($masuk - $keluar) }}
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->role != 2 && getidkub(Auth::user()->id) == $row->id)
                                        <div class="tab-pane fade {{ $it == 1 ? 'show active' : '' }}"
                                            id="{{ makeclass($row->name) }}s" role="tabpanel"
                                            aria-labelledby="{{ makeclass($row->name) }}-tabs">
                                            <div class="row">
                                                <div class="table-responsive col-12">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-black text-center">
                                                                    <h5>Rekap Data {{ $row->name }}</h5>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="table-responsive col-6">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th width="15%">Ketua KUB</th>
                                                                <th width="5%">:</th>
                                                                <td>{{ gettablefield('users', 'id', $row->id_ketua, 'name') }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Alamat</th>
                                                                <th>:</th>
                                                                <td class="fst-italic">{{ $row->alamat }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Anggota</th>
                                                                <th>:</th>
                                                                <td>{{ $row->jumlah_anggota }} Orang
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Kelas</th>
                                                                <th>:</th>
                                                                <td>{{ $row->kelas }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nomor Registrasi SKT</th>
                                                                <th>:</th>
                                                                <td>{{ $row->noreg_skt }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nomor Registrasi PUPI</th>
                                                                <th>:</th>
                                                                <td>{{ $row->noreg_pupi }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Didaftarkan pada</th>
                                                                <th>:</th>
                                                                <td>{{ tglindo($row->created_at) }}
                                                                </td>
                                                            </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                                <div class="table-responsive col-6">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-black" colspan="3">Produksi</th>
                                                                @php($jumlahprod = gettable('produksis', 'id_kub', $row->id))
                                                                @php($kg = ($jumlahprod==0)?0:array_sum(array_column($jumlahprod, 'jumlah')))
                                                                @php($rp = ($jumlahprod==0)?0:array_sum(array_column($jumlahprod, 'nilai')))
                                                            </tr>
                                                            <tr>
                                                                <th width="15%">Total Produksi (Kg)</th>
                                                                <th width="5%">:</th>
                                                                <td>{{ $kg }} Kg
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Hasil (Rp)</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($rp) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-black" colspan="3">Kas KUB</th>
                                                                @php($jumlahkas = gettable('kas', 'id_kub', $row->id))
                                                                @php($masuk = ($jumlahkas==0)?0:array_sum(array_column($jumlahkas, 'masuk')))
                                                                @php($keluar = ($jumlahkas==0)?0:array_sum(array_column($jumlahkas, 'keluar')))
                                                            </tr>
                                                            <tr>
                                                                <th>Uang Kas Masuk</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($masuk) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Uang Kas Keluar</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($keluar) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Saldo Kas</th>
                                                                <th>:</th>
                                                                <td>{{ rupiah($masuk - $keluar) }}
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @php($it++)
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-header bg-primary bg-opacity-25">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Hasil Produksi Terbaru</h6>
                            <div class="dropdown mb-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                                    aria-controls="all"
                                    aria-selected="true">{{ getidkub(Auth::user()->id) > 0 ? 'KUB Saya' : 'Semua KUB' }}</a>
                            </li>
                            @if (getidkub(Auth::user()->id) == 0)
                                @foreach ($main as $row)
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
                            <div class="tab-pane fade show active" id="all" role="tabpanel"
                                aria-labelledby="all-tab">
                                <div class="table-responsive">
                                    <table id="dataTableExample" class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Anggota</th>
                                                <th>Tanggal Produksi</th>
                                                <th width="10%">KUB</th>
                                                <th>Jumlah (Kg)</th>
                                                <th>Nilai (Rp)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($third->toarray()))
                                                @php($kg = 0)
                                                @php($rp = 0)
                                                @foreach ($third as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ maketitle($row->nama_anggota) }}</td>
                                                        <td><b>{{ tglindo($row->tanggal) }}</b></td>
                                                        <td>{{ maketitle(getfieldbyid('kubs', 'name', $row->id_kub)) }}
                                                        </td>
                                                        <td>{{ $row->jumlah }}&nbsp;Kg</td>
                                                        <td>{{ rupiah($row->nilai) }}</td>
                                                    </tr>
                                                    @php($kg += $row->jumlah)
                                                    @php($rp += $row->nilai)
                                                @endforeach
                                                <tr class="fst-italic">
                                                    <th colspan="4" style="text-align:right">
                                                        Total
                                                    </th>
                                                    <th>{{ $kg }} Kg</th>
                                                    <th>{{ rupiah($rp) }}</th>
                                                </tr>
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
                            @foreach ($main as $row)
                                <div class="tab-pane fade" id="{{ makeclass($row->name) }}" role="tabpanel"
                                    aria-labelledby="{{ makeclass($row->name) }}-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Nama Anggota</th>
                                                    <th>Tanggal Produksi</th>
                                                    <th>Jumlah (Kg)</th>
                                                    <th>Nilai (Rp)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (gettable('produksis', 'id_kub', $row->id) > 0)
                                                    @php($kg = 0)
                                                    @php($rp = 0)
                                                    @foreach (gettable('produksis', 'id_kub', $row->id) as $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ ucwords($row->nama_anggota) }}</td>
                                                            <td><b>{{ tglindo($row->tanggal) }}</b></td>
                                                            <td>{{ $row->jumlah }}&nbsp;Kg</td>
                                                            <td>{{ rupiah($row->nilai) }}</td>
                                                        </tr>
                                                        @php($kg += $row->jumlah)
                                                        @php($rp += $row->nilai)
                                                    @endforeach
                                                    <tr class="fst-italic">
                                                        <th colspan="3" style="text-align:right">
                                                            Total
                                                        </th>
                                                        <th>{{ $kg }} Kg</th>
                                                        <th>{{ rupiah($rp) }}</th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('/assets/js/dashboard-light.js') }}"></script>
    <script src="{{ asset('/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <!-- End custom js for this page -->
@endsection
