@extends('layouts.main')

@section('style')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/dropify/dist/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- End plugin css for this page -->
    <style>
        .bootstrap-datetimepicker-widget {
            inset: auto;
        }

        .bootstrap-datetimepicker-widget .datepicker-days {
            background-color: white;
            width: 170%;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Rapat</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ get_headname('1') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header bg-secondary bg-opacity-75">
                        <h3 class="text-white">Rapat Baru
                            {{ maketitle(getfieldbyid('kubs', 'name', getidkub(Auth::user()->id))) }} <br>
                            <small class="fs-5 fst-italic">Tanggal {{ tglindo(date('Y-m-d')) }}</small>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form id="RapatForm" class="row" action="javascript(0)">
                            @csrf
                            @include('layouts.partial.alert')
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Judul Rapat</label>
                                <input id="judul" class="form-control" name="judul" type="text"
                                    onchange="updateJudul()">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Tanggal</label>
                                <input id="tanggal-rapat" class="form-control" name="tanggal_rapat" type="text" readonly
                                    value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Materi Rapat</label>
                                <input id="materi" class="form-control" name="materi" type="text"
                                    onchange="updateMateri()">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Kesimpulan</label>
                                <textarea class="form-control" id="kesimpulan" name="kesimpulan" rows="2" onchange="updateKesimpulan()"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Absensi --}}
            @include('rapat-partial/absensi')
            {{-- Notulen --}}
            @include('rapat-partial/notulen')
            {{-- Rencana --}}
            @include('rapat-partial/rencana')
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/tags-input.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/timepicker.js') }}"></script>
    <!-- End custom js for this page -->

    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4500,
            timerProgressBar: true,
        });
        $(document).ready(function() {

            // Variables to store the input text
            let judul = '';
            let materi = '';
            let kesimpulan = '';

            updateJudul = () => {
                judul = $('#judul').val();
            }
            updateMateri = () => {
                materi = $('#materi').val();
            }
            updateKesimpulan = () => {
                kesimpulan = $('#kesimpulan').val();
            }

            // Event listener for the 
            // 'beforeunload' event
            window.addEventListener('beforeunload',
                function(e) {
                    if (judul !== '' ||
                        materi !== '' ||
                        kesimpulan !== '') {
                        e.preventDefault();
                        e.returnValue = '';
                    }
                });

        });

        // Absensi
        function addAbsensi() {
            addAbsensi: {
                var error;
                // check kegiatan
                if ($('#judul').val() == '') {
                    error = "Judul Rapat";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#nama-peserta').val() == '') {
                    error = "Nama Peserta";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#jabatan-peserta').val() == '') {
                    error = "Jabatan Peserta";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#alamat-peserta').val() == '') {
                    error = "Alamat Peserta";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                // make new form data
                var formData = new FormData();
                // append data
                formData.append('kegiatan', $('#judul').val());
                formData.append('peserta', $('#nama-peserta').val());
                formData.append('jabatan', $('#jabatan-peserta').val());
                formData.append('alamat', $('#alamat-peserta').val());
                formData.append('tanggal', $('#tanggal-rapat').val());
                // upload
                $.ajax({
                    type: "POST",
                    url: "{{ url('daftar-hadir-save') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Melakukan Absensi'
                        });
                        loadAbsen();
                        $('#nama-peserta').val("");
                        $('#jabatan-peserta').val("");
                        $('#alamat-peserta').val("");
                    },
                    error: function(e) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal Melakukan Absensi'
                        });
                        loadAbsen();
                    }
                });
            }
        };
        function loadAbsen() {
            var jd = $('#judul').val().replace(' ', '_');
            $.ajax({
                type: "GET",
                url: "{{ url('daftar-hadir-ajax') }}/" + jd,
                success: function(data) {
                    d = JSON.parse("[" + data + "]");
                    $.each(d, function(i, val) {
                        var view = "";
                        $.each(val, function(index, value) {
                            view += `<tr class="text-center">`;
                            view += `<td>${index+1}</td>`;
                            view += `<td>${value.peserta}/${value.jabatan}</td>`;
                            view += `</tr>`;
                        });
                        console.log(view);
                        $('#table-absensi').html(view);
                    });

                }
            });
        };
        // Notulen
        function addNotulen() {
            addAbsensi: {
                var error;
                // check kegiatan
                if ($('#notulen').val() == '') {
                    error = "Nama Notulen";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#jabatan-notulen').val() == '') {
                    error = "Jabatan Notulen";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#materi').val() == '') {
                    error = "Materi";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#kesimpulan').val() == '') {
                    error = "Kesimpulan";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                // make new form data
                var formData = new FormData();
                // append data
                formData.append('kegiatan', $('#judul').val());
                formData.append('tanggal', $('#tanggal-rapat').val());
                formData.append('pembicara', $('#notulen').val());
                formData.append('jabatan', $('#jabatan-notulen').val());
                formData.append('materi', $('#materi').val());
                formData.append('kesimpulan', $('#kesimpulan').val());
                // upload
                $.ajax({
                    type: "POST",
                    url: "{{ url('notulen-save') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Menambahkan Notulen'
                        });
                        loadNotulen();
                        $('#notulen').val("");
                        $('#jabatan-notulen').val("");
                    },
                    error: function(e) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal Menambahkan Notulen'
                        });
                        loadNotulen();
                    }
                });
            }
        };
        function loadNotulen() {
            var jd = $('#judul').val().replace(' ', '_');
            $.ajax({
                type: "GET",
                url: "{{ url('notulen-ajax') }}/" + jd,
                success: function(data) {
                    d = JSON.parse("[" + data + "]");
                    $.each(d, function(i, val) {
                        var view = "";
                        $.each(val, function(index, value) {
                            view += `<tr class="text-center">`;
                            view += `<td>${index+1}</td>`;
                            view += `<td>${value.pembicara}/${value.jabatan}</td>`;
                            view += `</tr>`;
                        });
                        console.log(view);
                        $('#table-notulen').html(view);
                    });

                }
            });
        };
        // Rencana
        function addRencana() {
            addAbsensi: {
                var error;
                // check kegiatan
                if ($('#rencana-kegiatan').val() == '') {
                    error = "Nama Rencana Kegiatan";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#lokasi').val() == '') {
                    error = "Lokasi Kegiatan";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#waktu-kegiatan').val() == '') {
                    error = "Waktu Kegiatan";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#volume').val() == '') {
                    error = "Volume";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                if ($('#keterangan-rencana').val() == '') {
                    error = "Keterangan Kegiatan";
                    Swal.fire({
                        icon: 'error',
                        title: error + ' Kosong',
                        text: 'Silahkan isikan ' + error + ' terlebih dahulu'
                    });
                    break addAbsensi;
                }
                // make new form data
                var formData = new FormData();
                // append data
                formData.append('name', $('#rencana-kegiatan').val());
                formData.append('waktu', $('#waktu-kegiatan').val());
                formData.append('volume', $('#volume').val());
                formData.append('tempat', $('#lokasi').val());
                formData.append('keterangan', $('#keterangan-rencana').val());
                // upload
                $.ajax({
                    type: "POST",
                    url: "{{ url('rencana-kegiatan-save') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Menambahkan Rencana Kegiatan'
                        });
                        loadRencana();
                        $('#rencana-kegiatan').val("");
                        $('#waktu-kegiatan').val("");
                        $('#volume').val("");
                        $('#lokasi').val("");
                        $('#keterangan-kegiatan').val("");
                    },
                    error: function(e) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Gagal Menambahkan Rencana Kegiatan'
                        });
                        loadRencana();
                    }
                });
            }
        };
        function loadRencana() {
            $.ajax({
                type: "GET",
                url: "{{ url('rencana-kegiatan-ajax') }}",
                success: function(data) {
                    d = JSON.parse("[" + data + "]");
                    $.each(d, function(i, val) {
                        var view = "";
                        $.each(val, function(index, value) {
                            view += `<tr class="text-center">`;
                            view += `<td>${index+1}</td>`;
                            view += `<td>${value.name}</td>`;
                            view += `<td>${value.tempat}/${value.waktu}</td>`;
                            view += `<td>${value.volume}</td>`;
                            view += `</tr>`;
                        });
                        console.log(view);
                        $('#table-rencana').html(view);
                    });

                }
            });
        };
    </script>
@endsection
