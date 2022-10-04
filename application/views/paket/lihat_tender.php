<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> Beranda Tender</h1>
        </div>
        <div class="section-body">
            <div class="card">

                <div class="container">
                    <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paketkusaja">
                    <br>
                    <ol class="breadcrumb bg-primary">
                        <li><a style="text-decoration: none; color:white;" href="#">Proses Tender</a></li>
                    </ol>
                    <br>

                    <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket_tender">
                    <input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
                    <div class="content">
                        <div class="content tab-content">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Evaluasi Persyaratan Vendor</th>
                                        <td colspan="3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-hover" id="table_persyartan_vendor">
                                                        <thead>
                                                            <tr class="btn-grad100">
                                                                <th>No</th>
                                                                <th>Nama Vendor</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Evaluasi Promosi Alat</th>
                                        <td>
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-hover" id="table_promosi">
                                                        <thead>
                                                            <tr class="btn-grad100">
                                                                <th>No</th>
                                                                <th>Nama Vendor</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Peserta Tender</th>
                                        <td>
                                            <a href="javascript:;" onclick="lihat_vendor(<?= $angga['id_paket'] ?>)" class="btn btn-primary"> <?= $peserta ?> Perusahaan</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Evaluasi Penilaian Vendor</th>
                                        <td colspan="3">
                                            <a href="<?= base_url('evaluasi/evaluasi_vendor/') . $angga['id_paket'] ?>" class="btn btn-success"> <i class="fas fa fa-star text-warning"></i> Evaluasi Vendor</a>
                                        </td>
                                    </tr>
                                    <?php if ($angga['status_selesai_tender'] == 1) { ?>
                                        <tr>
                                            <th>Pilih Pemenang Tender</th>
                                            <td colspan="3">
                                                <a href="<?= base_url('evaluasi/pilih_pemenang/') . $angga['id_paket'] ?>" class="btn btn-info disabled"> <i class="fas fa fa-users text-warning"></i> Pemilihan Pemenang Tender</a>
                                            </td>
                                        </tr>
                                    <?php  } else { ?>
                                        <tr>
                                            <th>Pilih Pemenang Tender</th>
                                            <td colspan="3">
                                                <a href="<?= base_url('evaluasi/pilih_pemenang/') . $angga['id_paket'] ?>" class="btn btn-info"> <i class="fas fa fa-users text-warning"></i> Pemilihan Pemenang Tender</a>
                                            </td>
                                        </tr>
                                    <?php    }  ?>


                                    <tr>
                                        <th>Kirim Undangan Pembuktian</th>
                                        <td colspan="3">
                                            <br><br>
                                            <center>
                                                <?php if ($angga['status_selesai_tender'] == 1) { ?>

                                                <?php  } else { ?>
                                                    <form action="javascript:;" id="form_dokumen_undangan" enctype="multipart/form-data">
                                                        <input type="hidden" id="id_paket" value="<?= $angga['id_paket'] ?>" name="id_paket">
                                                        <div class="input-group col-md-6">
                                                            <div class="input-group-append">
                                                                <button class="input-group-text attach_btn text-white btn-primary" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_tender').click();"><i class="fas fa-paperclip"></i></button>
                                                                <input type="file" accept="application/pdf" style="display:none;" id="file_tender" class="file_dokumen" name="file_dokumen" />
                                                            </div>
                                                            <input type="text" name="nama_dokumen" class="nama_dokuken form-control" placeholder="Nama File....">
                                                            <div class="input-group-append">
                                                                <button type="submit" id="upload_tender" name="upload" class="input-group-text  btn-warning"><i class="fas fa-upload"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php    }  ?>

                                                <br>
                                                <div style="display: none;" id="error_file_tender" class="alert alert-danger" role="alert">
                                                    ANDA BELUM MENGISI FILE !!!
                                                </div>
                                                <div style="display: none;" id="error_nama_file" class="alert alert-danger" role="alert">
                                                    ANDA BELUM MENGISI NAMA FILE !!!
                                                </div>
                                            </center>
                                            <br>
                                            <center>
                                                <div class="form-group col-md-6" id="process_tender" style="display:none;">
                                                    <small for="" style="display:none;" id="sedang_dikirim_tender">Sedang Mengupload....</small>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                            <?php if ($cek_undangan) { ?>
                                                <?php foreach ($cek_undangan as $key => $value) { ?>
                                                    <a href="<?= base_url('file_dokumen_persyaratan_vendor/') . $value['file_dokumen'] ?>"> <img width="50pc" src="<?= base_url('assets/pdf.png') ?>" alt=""><?= $value['nama_dokumen'] ?> </a>
                                                <?php } ?>
                                            <?php  } else { ?>

                                            <?php    }  ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <div class="bs-callout bs-callout-warning">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:;" onclick="SimpanPaketTender()" class="btn btn-danger btn-sm btn-block" id="cek_semua_isian_paket">Batal Tender</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:;" onclick="Tender_selesai(<?= $angga['id_paket'] ?>)" class="btn btn-primary btn-sm btn-block">Tender Telah Selesai</a>
                                </div>
                                <div class="col-md-2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
    </section>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
    Launch
</button>

<!-- Modal -->
<div class="modal fade" id="modal_kualifikasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Form Syarat Kualifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:;" id="from_syarat_kualifikasi" method="POST">
                    <input type="hidden" value="<?= $angga['id_paket'] ?>" name="id_paket">
                    <div class="form-group">
                        <label for="">Syarat Kualifkasi</label>
                        <input type="text" class="form-control" name="nama_syarat_kualifikasi">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="simpan_kaulifikasi()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modal_vendor" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Peserta Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover" id="tbl_vendor">
                    <thead>
                        <tr class="btn-grad100">
                            <th>No</th>
                            <th>Nama Vendor</th>
                            <th>Telepon Vendor</th>
                            <th>Email Vendor</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modal_syarat_vendor" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Persyatan Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <label for="">Dokumen Persyartan Vendor <label for="" id="nama_vendor"></label></label>
                </center>
                <table class="table table-hover" id="tbl_syarat_vendor">
                    <thead>
                        <tr class="btn-grad100">
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modal_promosi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Promosi Alat Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <label for="">Dokumen / Video Alat Promosi Vendor <label for="" id="nama_vendor_promosi"></label></label>
                </center>
                <table class="table table-hover" id="tbl_detail_promosi">
                    <thead>
                        <tr class="btn-grad100">
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>