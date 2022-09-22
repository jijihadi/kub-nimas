<div class="col-md-5 grid-margin stretch-card">
    <div class="card">
        <div class="card-header bg-info bg-opacity-25">
            <h6 class="text-dark">Notulen Rapat</h6 class="text-dark">
        </div>
        <div class="card-body">
            <form id="notulenForm" class="row" action="javascript(0)">
                @csrf
                @include('layouts.partial.alert')
                <div class="mb-3 col-lg-5">
                    <label for="name" class="form-label">Notulen Rapat</label>
                    <input id="notulen" class="form-control" name="notulen" type="text">
                </div>
                <div class="mb-3 col-lg-5">
                    <label for="name" class="form-label">Jabatan</label>
                    <input id="jabatan-notulen" class="form-control" name="jabatan_notulen" type="text">
                </div>
                <div class="mb-3 col-lg-2" style="margin-top: 8%">
                    <button type="button" class="btn  btn-outline-twitter btn-sm btn-icon" onclick="addNotulen()">
                        <i data-feather="plus"></i>
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table table-hover mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Pembicara/Jabatan</th>
                            </tr>
                        </thead>
                        <tbody id="table-notulen">
                            <td colspan="4" class="text-center text-secondary">
                                <i>Belum ada Notulen</i>
                            </td>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>