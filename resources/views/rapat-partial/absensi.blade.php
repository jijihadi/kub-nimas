<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header bg-warning bg-opacity-25">
            <h6 class="text-dark">Absensi Peserta Rapat</h6 class="text-dark">
        </div>
        <div class="card-body">
            <form id="absensiForm" class="row" action="javascript(0)">
                @csrf
                @include('layouts.partial.alert')
                <div class="mb-3 col-lg-4">
                    <label for="name" class="form-label">Nama Peserta</label>
                    <input class="form-control" id="nama-peserta" name="nama_peserta" type="text">
                </div>
                <div class="mb-3 col-lg-2">
                    <label for="name" class="form-label">Jabatan</label>
                    <input id="jabatan-peserta" class="form-control" name="jabatan_peserta" type="text">
                </div>
                <div class="mb-3 col-lg-4">
                    <label for="name" class="form-label">Alamat</label>
                    <input id="alamat-peserta" class="form-control" name="alamat" type="text" placeholder="Cukup nama kota/daerah. ex: kedungsari">
                </div>
                <div class="mb-3 col-lg-2" style="margin-top:3.2%">
                    <button type="button" class="btn  btn-outline-twitter btn-sm btn-icon" onclick="addAbsensi()">
                        <i data-feather="plus"></i>
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-hover mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Peserta/Jabatan</th>
                            </tr>
                        </thead>
                        <tbody id="table-absensi">
                            <td colspan="4" class="text-center text-secondary">
                                <i>Belum ada Peserta</i>
                            </td>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>