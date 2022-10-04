<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengalaman Kerja</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Pengalaman Kerja
                </div>
                <div class="card-body">
                    <div class="mb-3 mt-3">
                        <button class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#modelId"><i class="fas fa fa-users"></i> TAMBAH</button>
                    </div>
                    <table id="tbl_pengalaman" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pekerjaan</th>
                                <th>Pemberi Tugas</th>
                                <th>Nilai Kontrak</th>
                                <th>Awal Pekerjaan</th>
                                <th>Akhir Pekerjaan</th>
                                <th>Bukti</th>
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
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Tambah Pengalaman Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <hr>
                Pengalaman Kerja
                <hr>
                <form action="javascript:;" id="form_tambah_pengalaman" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $this->session->userdata('id_vendor') ?>" name="id_vendor">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Pekerjan</label>
                                <input type="text" name="nama_pekerjaan" id="" class="form-control nama_pekerjaan" placeholder="Nama Pekerjaan...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Pemberi Pekerjaan</label>
                                <input type="text" name="pemberi_kerja" id="" class="form-control" placeholder="Pemberi Pekerjaan...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Nomor Kontrak</label>
                                    <input type="text" name="nomor_kontrak" id="" class="form-control" placeholder="No Kontrak...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Kontrak</label>
                                <input type="date" name="tanggal_kontrak" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nilai Kontrak</label>
                                <input type="number" name="nilai_kontrak" id="" class="form-control" placeholder="Nilai Kontrak...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Alamat Pekerjaan</label>
                                <textarea name="alamat_pekerjaan" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Mulai Kerja</label>
                                <input type="date" name="tanggal_mulai_pengalaman" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Selesai Kerja</label>
                                <input type="date" name="tanggal_selesai_pengalaman" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Bukti</label>
                                <input type="file" name="bukti_pengalaman" id="" class="form-control bukti_pengalaman">
                            </div>
                        </div>
                    </div>
                    <div style="display: none;" id="error_bukti_pengalaman" class="alert alert-danger" role="alert">
                        ANDA BELUM MENGISI FILE !!!
                    </div>
                    <div style="display: none;" id="error_nama_pekerjaan" class="alert alert-danger" role="alert">
                        ANDA BELUM MENGISI NAMA PEKERJAAN !!!
                    </div>
                    <center>
                        <div class="form-group col-md-6" id="process_tender" style="display:none;">
                            <small for="" style="display:none;" id="sedang_dikirim_tender">Sedang Mengupload....</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="upload_tender" id="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>