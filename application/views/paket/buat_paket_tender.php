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
                    <form action="" id="form_data_tender">
                        <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket_tender">
                        <input type="hidden" name="tanggal_buat_paket_tender" value="<?php echo date('d F Y || H:i:s') ?>">
                        <div class="content">
                            <div class="content tab-content">
                                <div style="overflow-x:auto;">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="bgwarning">Rencana Umum Pengadaan</th>
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
                                        <tr>
                                            <th class="bgwarning">Nama Pembuat Paket</th>
                                            <td><?= $angga['pembuat_paket'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bgwarning">Tanggal Buat Paket</th>
                                            <td><?= $angga['tanggal_buat_rup'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bgwarning">Lokasi Pengerjaan</th>
                                            <td class="">
                                                <textarea name="" disabled class="form-control" id="" cols="30" rows="10"><?= $angga['lokasi_pekerjaan'] ?></textarea>
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
                                            <?php if ($total_rincian_hps) { ?>
                                                <td><?= "Rp " . number_format($total, 2, ',', '.'); ?> <a href="<?= base_url('paket/buat_rincian_hps/') . $angga['id_paket'] ?>" id="btnSave" class="btn btn-warning btn-sm"> <i class="fas fa fa-edit"></i> Ubah Rincian Hps</a></td>
                                            <?php  } else { ?>
                                                <td>
                                                    <a href="<?= base_url('paket/buat_rincian_hps/') . $angga['id_paket'] ?>" id="btnSave" class="btn btn-warning btn-sm"> <i class="fas fa fa-edit"></i> Buat Rincian Hps</a>
                                                </td>
                                            <?php     } ?>

                                        </tr>

                                        <tr>
                                            <th class="bgwarning">Nilai Pagu Paket</th>
                                            <td><?= "Rp " . number_format($angga['hps_total'], 2, ',', '.') ?> </td>
                                        </tr>
                                        <tr>
                                            <th class="bgwarning">Nama Paket <span class="warning">*</span></th>
                                            <td class="">
                                                <input name="nama_tender" readonly class="form-control form-control-sm " value="<?= $angga['nama_paket'] ?>" />
                                                <div class="invalid-feedback"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bgwarning">Pilih Penyeleksi</th>
                                            <td class="col-md-8">
                                                <select name="id_penyeleksi" onchange="pilih_penyedia()" class="form-control" id="">
                                                    <option value="<?= $angga2['id_pegawai'] ?>"><?= $angga2['nama_pegawai'] ?></option>
                                                    <?php foreach ($penyeleksi as $key => $value) { ?>
                                                        <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?></option>
                                                    <?php     } ?>
                                                </select>
                                                <!-- <input type="hidden" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
                                                <a href="<?= base_url('paket/pilih_panitia/') . $angga['id_paket']  ?>" class="btn btn-primary btn-sm"><i class="fas fa fa-users"></i> Pilih Panitia</a> -->
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
                                        <a href="javascript:;" onclick="SimpanPaketTender()" class="btn btn-success btn-sm btn-block" id="cek_semua_isian_paket">Simpan Dan Umumkan Ke Penyeleksi</a>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
    </section>
</div>