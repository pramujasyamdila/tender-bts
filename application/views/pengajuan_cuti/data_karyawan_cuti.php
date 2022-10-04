<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>DATA PENGAJUAN CUTI</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Pegawai
                </div>
                <div class="card-body">
                    <div class="mb-3 mt-3">
                    </div>
                    <table id="tbl_proses_cuti2" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Nip</th>
                                <th>No Telpon</th>
                                <th>Keterangan</th>
                                <th>Detail Pengajuan</th>
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
<div class="modal fade" id="modal_persetujuan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Persetujuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_approvel" action="javascript:;" method="post">
                    <input type="hidden" name="id_pengajuan_cuti">
                    <hr>
                    <center>
                        STATUS PERSETUJUAN
                    </center>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="hidden" name="status_persetujuanku">
                            <div class="form-group">
                                <input type="radio" name="status_persetujuan" onchange="pilih_persetujuan()" value="DISETUJUI"> DISETUJUI
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="radio" name="status_persetujuan" onchange="pilih_persetujuan()" value="PERUBAHAN"> PERUBAHAN
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="radio" name="status_persetujuan" onchange="pilih_persetujuan()" value="DITANGGUHKAN"> DITANGGUHKAN
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="radio" name="status_persetujuan" onchange="pilih_persetujuan()" value="TIDAK DISETUJUI"> TIDAK DISETUJUI
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alasan" style="display: none;">
                        <hr>
                        ALASAN
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="alasan_pertimbangan_atasan" class="form-control" style="height: 200px;" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="javascript:;" onclick="persetujuan()" class="btn btn-success"> <i class="fas fa fa-save"> </i> Approval</a>
            </div>
        </div>
    </div>
</div>
</div>