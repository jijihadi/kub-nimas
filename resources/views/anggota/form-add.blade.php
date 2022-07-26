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
                <li class="breadcrumb-item"><a href="{{url('list-anggota')}}">Anggota</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ get_headname('1') }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form id="signupForm" class="row" method="post" action="{{url('list-anggota-save')}}">
                            @csrf
                            @include('layouts.partial.alert')
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Nama</label>
                                <input id="name" class="form-control" name="name" type="text">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Jabatan</label>
                                <input id="name" class="form-control" name="jabatan" type="text">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Pendidikan</label>
                                <input id="name" class="form-control" name="pendidikan" type="text">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Usia</label>
                                <select class="js-example-basic-single form-select" data-width="100%" name="usia">
                                    <option selected="" disabled="">Select your age</option>
                                    @for ($i = 17; $i < 90; $i++)
                                        <option>{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Usaha Utama</label>
                                <input id="name" class="form-control" name="usaha_utama" type="text">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Usaha Sampingan</label>
                                <input id="name" class="form-control" name="usaha_sampingan" type="text">
                                <p class="text-secondary"><i>Kosongi jika tidak ada</i></p>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Jumlah Perahu</label>
                                <input id="name" class="form-control" name="jumlah_perahu" type="number" value="0">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="name" class="form-label">Jenis Alat</label>
                                <input id="name" class="form-control" name="jenis_alat" type="text">
                                <p class="text-secondary"><i>Kosongi jika tidak ada</i></p>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3"></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- Plugin js for this page -->
	<script src="{{asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
	<script src="{{asset('assets/vendors/inputmask/jquery.inputmask.min.js')}}"></script>
	<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
	<script src="{{asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
	<script src="{{asset('assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
	<script src="{{asset('assets/vendors/dropzone/dropzone.min.js')}}"></script>
	<script src="{{asset('assets/vendors/dropify/dist/dropify.min.js')}}"></script>
	<script src="{{asset('assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('assets/vendors/moment/moment.min.js')}}"></script>
	<script src="{{asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}"></script>
	<!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="{{asset('assets/js/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-maxlength.js')}}"></script>
    <script src="{{asset('assets/js/inputmask.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <script src="{{asset('assets/js/typeahead.js')}}"></script>
    <script src="{{asset('assets/js/tags-input.js')}}"></script>
    <script src="{{asset('assets/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/js/dropify.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('assets/js/datepicker.js')}}"></script>
    <script src="{{asset('assets/js/timepicker.js')}}"></script>
    <!-- End custom js for this page -->
@endsection
