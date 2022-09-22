<div class="col-md-7 grid-margin stretch-card">
    <div class="card">
        <div class="card-header bg-primary bg-opacity-25">
            <h6 class="text-dark">Rencana Kegiatan</h6 class="text-dark">
        </div>
        <div class="card-body">
            <p>
                <button class="btn btn-outline-twitter btn-xs" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i data-feather="plus" style="height: 13px;"></i>Tambahkan Rencana Kegiatan
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form id="rencanaForm" class="row" action="javascript(0)">
                        @csrf
                        @include('layouts.partial.alert')
                        <div class="mb-3 col-lg-6">
                            <label for="name" class="form-label">Kegiatan</label>
                            <input id="rencana-kegiatan" class="form-control" name="kegiatan" type="text">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="name" class="form-label">Lokasi</label>
                            <input id="lokasi" class="form-control" name="lokasi" type="text">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label for="name" class="form-label">Waktu</label>
                            <div class="input-group date timepicker" id="datetimepickerExample1"
                                data-target-input="nearest">
                                <span class="input-group-text" data-target="#datetimepickerExample1"
                                    data-toggle="datetimepicker"><i data-feather="clock"></i></span>
                                <input class="form-control datetimepicker-input" data-target="#datetimepickerExample1"
                                    id="waktu-kegiatan" name="waktu" type="text" />
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="name" class="form-label">Volume</label>
                            <input id="volume" class="form-control" name="volume" type="number">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan-rencana" name="keterangan_rencana" rows="2"></textarea>
                        </div>
                        <div class="mb-3 col-lg-12">
                            <button type="button" class="btn col-12 btn-outline-twitter btn-sm" onclick="addRencana()">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="dataTableExample" class="table table-hover mb-0">
                    <thead>
                        <tr class="text-center">
                            <th>Nama Kegiatan</th>
                            <th>Tempat/Waktu</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody id="table-rencana">
                        <td colspan="4" class="text-center text-secondary">
                            <i>Belum ada Notulen</i>
                        </td>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
