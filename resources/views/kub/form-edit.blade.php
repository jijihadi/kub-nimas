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
    <!-- End plugin css for this page -->
@endsection

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('list-kub') }}">KUB</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ get_headname('1') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (!empty($main))
                            <form id="signupForm" class="row" method="post"
                                action="{{ url('list-kub-update') . '/' . $main['id'] }}">
                                @csrf
                                @include('layouts.partial.alert')
                                <div class="mb-3 col-lg-12">
                                    <label for="name" class="form-label">Nama KUB</label>
                                    <input id="name" class="form-control" name="name" type="text"
                                        value="{{ $main['name'] }}">
                                </div>

                                <div class="mb-3 col-lg-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3">{{ $main['alamat'] }}</textarea>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="name" class="form-label">Jumlah Anggota</label>
                                    <input id="name" class="form-control" name="jumlah_anggota" type="number"
                                        value="{{ $main['jumlah_anggota'] }}">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="name" class="form-label">Kelas</label>
                                    <input id="name" class="form-control" name="kelas" type="text"
                                        value="{{ $main['kelas'] }}">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="name" class="form-label">Nomor Registrasi <b>SKT</b></label>
                                    <input id="name" class="form-control" name="noreg_skt" type="text"
                                        value="{{ $main['noreg_skt'] }}">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="name" class="form-label">Nomor Registrasi <b>PUPI</b></label>
                                    <input id="name" class="form-control" name="noreg_pupi" type="text"
                                        value="{{ $main['noreg_pupi'] }}">
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Ketua</label>
                                    <select class="js-example-basic-single form-select" id="Role" data-width="100%"
                                        name="id_ketua">
                                        <option value="0">Pilih Ketua KUB</option>
                                        @foreach ($side as $row)
                                            <option value="{{ $row->id }}"
                                                {{ $main['id_ketua'] == $row->id ? 'selected' : '' }}
                                                {{ getidkub($row->id) == 0 ? '' : 'disabled' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </form>
                        @endif
                    </div>
                </div>
            </div>
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
@endsection
