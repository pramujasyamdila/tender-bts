<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Paket Tender Untuk Anda </h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Paket Tender Untuk Anda
                </div>
                <div class="card-body">
                    <table id="tbl_tender" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Tender</th>
                                <th>Nama Paket</th>
                                <th>Kualifikasi Usaha</th>
                                <th>Status Tender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
    </section>
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modal_tender" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Ikut Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript;;" id="form_ikuti_paket" method="POST">
                    <input type="hidden" name="id_paket">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kode Rup</label>
                                <input disabled type="text" name="kode_tender_random" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Paket</label>
                                <input disabled type="text" name="nama_paket" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Total Hps</label>
                                <input disabled type="text" name="hps_total" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Lokasi Pekerjaan</label>
                                <textarea disabled name="lokasi_pekerjaan" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Program Paket</label>
                                <input disabled type="text" name="program_paket" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kualifikasi Usaha</label>
                                <input type="text" disabled name="kualifikasi_usaha" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a style="display: none;" href="javascript:;" class="btn btn-success disabled sudah_di_ikuti">Paket Sudah Di Ikuti</a>
                <a href="javascript:;" onclick="ikuti_paket()" class="btn btn-primary belum_di_ikuti">Ikuti Paket</a>
            </div>
        </div>
    </div>
</div>