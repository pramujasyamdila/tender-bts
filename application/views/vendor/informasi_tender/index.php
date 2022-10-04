<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> Rencana Pelaksanaan Paket</h1>
        </div>
        <div class="section-body">
            <div class="card">

                <div class="container">
                    <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_paketkusaja">
                    <br>
                    <ol class="breadcrumb bg-primary">
                        <li><a style="text-decoration: none; color:white;" href="#">Detail Rencana Pelaksanaan Paket</a></li>
                    </ol>
                    <br>
                    <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket_tender">
                    <input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
                    <div class="content">
                        <div class="content tab-content">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="bgwarning">Rencana Umum Pengadaan</th>
                                        <td>
                                            <br>
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
                                    <tr>
                                        <th class="bgwarning">Download Dokumen Lelang</th>
                                        <td><br>
                                            <table class="table table-hover" id="table_dokumen_tender">
                                                <thead>
                                                    <tr class="btn-grad100">
                                                        <th>No</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bgwarning">Download Dokumen Persyaratan Kualifikasi</th>
                                        <td><br>
                                            <table class="table table-hover" id="table_syarat_kualifikasi">
                                                <thead>
                                                    <tr class="btn-grad100">
                                                        <th>No</th>
                                                        <th>Syarat Kualifikasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Upload Dokumen Pesyaratan Kualifikasi
                                        </th>
                                        <td colspan="3">
                                            <br>
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">Upload Dokumen Pesyaratan</div>
                                                <div class="card-body">
                                                    <center>
                                                        <?php if ($angga['status_selesai_tender'] == 1) { ?>
                                                        <?php  } else { ?>
                                                            <form action="javascript:;" id="form_dokumen_persyaratan_vendor" enctype="multipart/form-data">
                                                                <div class="input-group col-md-6">
                                                                    <div class="input-group-append">
                                                                        <button class="input-group-text attach_btn text-white btn-primary" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_persyartan_vendor').click();"><i class="fas fa-paperclip"></i></button>
                                                                        <input type="file" accept="application/pdf" style="display:none;" id="file_persyartan_vendor" class="file_dokumen" name="file_dokumen" />
                                                                    </div>
                                                                    <input type="text" name="nama_dokumen" class="nama_dokuken form-control" placeholder="Nama File....">
                                                                    <div class="input-group-append">
                                                                        <button type="submit" id="upload_tender" name="upload" class="input-group-text  btn-warning"><i class="fas fa-upload"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        <?php    }  ?>
                                                        <br>
                                                        <div style="display: none;" id="error_file_persyartan_vendor" class="alert alert-danger" role="alert">
                                                            ANDA BELUM MENGISI FILE !!!
                                                        </div>
                                                        <div style="display: none;" id="error_nama_file" class="alert alert-danger" role="alert">
                                                            ANDA BELUM MENGISI NAMA FILE !!!
                                                        </div>
                                                    </center>
                                                    <br>
                                                    <center>
                                                        <center>
                                                            <div class="form-group col-md-6" id="process_tender" style="display:none;">
                                                                <small for="" style="display:none;" id="sedang_dikirim_tender">Sedang Mengupload....</small>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    </center>
                                                    <table class="table table-hover" id="table_tender_vendor">
                                                        <thead>
                                                            <tr class="btn-grad100">
                                                                <th>No</th>
                                                                <th>Nama Dokumen</th>
                                                                <th>Status</th>
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
                                        <th>
                                            Upload Promosi Alat BTS
                                        </th>
                                        <td colspan="3">
                                            <br>
                                            <div class="card">
                                                <div class="card-header bg-primary text-white">Upload Promosi Alat BTS</div>
                                                <div class="card-body">
                                                    <center>
                                                        <?php if ($angga['status_selesai_tender'] == 1) { ?>
                                                        <?php  } else { ?>
                                                            <form action="javascript:;" id="form_dokumen_promosi_vendor" enctype="multipart/form-data">
                                                                <div class="input-group col-md-6">
                                                                    <div class="input-group-append">
                                                                        <button class="input-group-text attach_btn text-white btn-primary" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_promosi_vendor').click();"><i class="fas fa-paperclip"></i></button>
                                                                        <input type="file" accept="application/pdf video/*" style="display:none;" id="file_promosi_vendor" class="file_dokumen_promosi" name="file_dokumen_promosi" />
                                                                    </div>
                                                                    <input type="text" name="nama_dokumen_promosi" class="nama_dokumen_promosi form-control" placeholder="Nama File....">
                                                                    <div class="input-group-append">
                                                                        <button type="submit" id="upload_tender_promosi" name="upload" class="input-group-text  btn-warning"><i class="fas fa-upload"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        <?php    }  ?>

                                                        <br>
                                                        <div style="display: none;" id="error_file_promosi_vendor" class="alert alert-danger" role="alert">
                                                            ANDA BELUM MENGISI FILE !!!
                                                        </div>
                                                        <div style="display: none;" id="error_nama_file_promosi" class="alert alert-danger" role="alert">
                                                            ANDA BELUM MENGISI NAMA FILE !!!
                                                        </div>
                                                    </center>
                                                    <br>
                                                    <center>
                                                        <center>
                                                            <div class="form-group col-md-6" id="process_tender_promosi" style="display:none;">
                                                                <small for="" style="display:none;" id="sedang_dikirim_tender_promosi">Sedang Mengupload....</small>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </center>
                                                        <small class="text-danger">Anda Dapat Mengupload File Berupa Video Dan Pdf</small>
                                                        <br><br><br>
                                                    </center>
                                                    <table class="table table-hover" id="table_tender_vendor_promosi">
                                                        <thead>
                                                            <tr class="btn-grad100">
                                                                <th>No</th>
                                                                <th>Nama File</th>
                                                                <th>Status</th>
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
                                        <th>Upload Dokumen Penawaran</th>
                                        <td>
                                            <?php if ($angga['status_selesai_tender'] == 1) { ?>
                                                <label for="" class="text-danger">TENDER INI TELAH SELESAI</label>
                                            <?php  } else { ?>
                                                <a class="btn btn-sm btn-primary" href="<?= base_url('vendor/tender_diikuti/upload_penawaran/') . $angga['id_paket'] ?>"> Upload Dokumen Penawaran</a>
                                            <?php    }  ?>

                                        </td>
                                    </tr>
                                    <?php if ($cek_pemenang) { ?>
                                        <tr>
                                            <th>UNDANGAN PEMENANG TENDER</th>
                                            <td>
                                                <?php if ($cek_undangan) { ?>
                                                    <?php foreach ($cek_undangan as $key => $value) { ?>
                                                        <a href="<?= base_url('file_dokumen_persyaratan_vendor/') . $value['file_dokumen'] ?>"> <img width="50pc" src="<?= base_url('assets/pdf.png') ?>" alt=""><?= $value['nama_dokumen'] ?> </a>
                                                    <?php } ?>
                                                <?php  } else { ?>

                                                <?php    }  ?>

                                            </td>
                                        </tr>
                                    <?php } else { ?>

                                    <?php } ?>
                                </table>
                            </div>
                            <div class="bs-callout bs-callout-warning">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <a href="<?= base_url('vendor/tender_diikuti') ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
    </section>
</div>