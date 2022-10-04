<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> Persyartan Kualifikasi dan Rencana Pelaksanaan Tender</h1>
        </div>
        <div class="section-body">
            <div class="card">

                <div class="container">
                    <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paketkusaja">
                    <br>
                    <ol class="breadcrumb bg-primary">
                        <li><a style="text-decoration: none; color:white;" href="#">Detail Rencana Pelaksanaan Tender</a></li>
                    </ol>
                    <br>

                    <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket_tender">
                    <input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
                    <div class="content">
                        <div class="content tab-content">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-striped">
                                    <form action="javascript:;" method="POST" id="form_data_tender">

                                        <tr>
                                            <th class="bgwarning">Tender</th>
                                            <td>
                                                <table class="table table-bordered">
                                                    <tr class="btn-grad7">
                                                        <th>Kode Rup</th>
                                                        <th>Nama Paket</th>
                                                        <th>Kualifikasi Usaha</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $angga['kode_tender_random'] ?></td>
                                                        <td><?= $angga['nama_paket'] ?></td>
                                                        <td><?= $angga['kualifikasi_usaha'] ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php $total = 0;
                                        $ppn = 0;
                                        $subtotal = 0;
                                        foreach ($total_rincian_hps as $key => $value) { ?>
                                            <?php
                                            $total +=  $value['jumlah'] * $value['harga_rincian_hps'] + ($value['ppn'] / 100) * $value['jumlah'] * $value['harga_rincian_hps'];
                                            $ppn += $value['ppn'];
                                            $subtotal += $value['jumlah'] * $value['harga_rincian_hps'];
                                            ?>
                                        <?php } ?>
                                        <tr>
                                            <th class="bgwarning">Nilai HPS <span class="warning">*</span></th>
                                            <?php if ($this->session->userdata('id_role') == 2) { ?>
                                                <?php if ($total_rincian_hps) { ?>
                                                    <td><?= "Rp " . number_format($total, 2, ',', '.'); ?> </td>
                                                <?php  } else { ?>
                                                    <td><?= "Rp " . number_format($total, 2, ',', '.'); ?> </td>
                                                <?php     } ?>
                                            <?php  } else { ?>
                                                <?php if ($total_rincian_hps) { ?>
                                                    <td><?= "Rp " . number_format($total, 2, ',', '.'); ?> <a href="<?= base_url('paket/buat_rincian_hps/') . $angga['id_paket'] ?>" id="btnSave" class="btn btn-warning btn-sm"> <i class="fas fa fa-edit"></i> Ubah Rincian Hps</a></td>
                                                <?php  } else { ?>
                                                    <td>
                                                        <a href="<?= base_url('paket/buat_rincian_hps/') . $angga['id_paket'] ?>" id="btnSave" class="btn btn-warning btn-sm"> <i class="fas fa fa-edit"></i> Buat Rincian Hps</a>
                                                    </td>
                                                <?php     } ?>
                                            <?php     } ?>
                                        </tr>
                                        <!-- <tr>
                                            <th class="bgwarning">Batas Pendaftaran Tender <span class="warning">*</span></th>
                                            <td><input name="tanggal_tender_selesai" type="date" class="col-md-4 form-control"></td>
                                        </tr> -->
                                        <tr>
                                            <th class="bgwarning">Tanggal Selesai Tender <span class="warning">*</span></th>
                                            <td><input name="tangal_selesai_tender" type="date" class="col-md-4 form-control"></td>
                                        </tr>
                                    </form>
                                    <tr>
                                        <th>Dokumen Persyartan Tender</th>
                                        <td colspan="3">
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">Upload Dokumen Tender</div>
                                                <div class="card-body">
                                                    <center>
                                                        <form action="javascript:;" id="form_dokumen_tender" enctype="multipart/form-data">
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
                                                    <table class="table table-hover" id="table_dokumen_tender">
                                                        <thead>
                                                            <tr class="btn-grad100">
                                                                <th>No</th>
                                                                <th>Nama Dokumen</th>
                                                                <th>File</th>
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
                                        <th>Syarat Kualifikasi Tender</th>
                                        <td>
                                            <div class="card">
                                                <div class="card-header">
                                                    <a href="javascript:;" data-toggle="modal" data-target="#modal_kualifikasi" class="btn btn-primary"> <i class="fas fa fa-plus"></i> Tambah Kualfikasi </a>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-hover" id="table_syarat_kualifikasi">
                                                        <thead>
                                                            <tr class="btn-grad100">
                                                                <th>No</th>
                                                                <th>Syarat Kualifikasi</th>
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
                                </table>
                            </div>
                            <div class="bs-callout bs-callout-warning">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <a href="<?= base_url('paket/paket_tender') ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="javascript:;" onclick="SimpanPaketTender()" class="btn btn-success btn-sm btn-block" id="cek_semua_isian_paket">Simpan Dan Umumkan Tender</a>
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