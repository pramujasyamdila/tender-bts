<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>EVALUASI VENDOR <?= $row_vendor_mengikuti['username_vendor'] ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Penilaian
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"> Penilaian Persyartaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Penilaian Promosi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile4" aria-selected="false">Penawaran Harga</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile5" aria-selected="false">Penilaian Tenaga Kerja</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile6" aria-selected="false">Penilaian Pengalaman</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Penilaian Persyaratan
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Masukan Nilai Persyartan</label>
                                                        <form action="javascript:;" id="form_nilai_persyaratan" method="POST">
                                                            <input type="hidden" name="id_vendor" value="<?= $row_vendor_mengikuti['id_vendor_mengikuti'] ?>">
                                                            <input type="hidden" name="id_paket" value="<?= $row_vendor_mengikuti['id_paket_mengikuti'] ?>">
                                                            <input type="number" value="<?= $row_vendor_mengikuti['nilai_dokumen'] ?>" name="nilai_dokumen" class="form-control">
                                                        </form>
                                                        <center>
                                                            <br>
                                                            <a href="javascript:;" id="save" onclick="Simpan_penilaian()" class="btn btn-success">SIMPAN PENILAIAN</a>
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Penilaian Promosi
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Masukan Nilai Promosi</label>
                                                    <form action="javascript:;" id="form_nilai_promosi" method="POST">
                                                        <input type="hidden" name="id_vendor" value="<?= $row_vendor_mengikuti['id_vendor_mengikuti'] ?>">
                                                        <input type="hidden" name="id_paket" value="<?= $row_vendor_mengikuti['id_paket_mengikuti'] ?>">
                                                        <input type="number" value="<?= $row_vendor_mengikuti['nilai_promosi'] ?>" name="nilai_promosi" class="form-control">
                                                    </form>
                                                    <center>
                                                        <br>
                                                        <a href="javascript:;" id="save" onclick="Simpan_promosi()" class="btn btn-success">SIMPAN PENILAIAN</a>
                                                    </center>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Penawaran Harga
                                        </div>
                                        <div class="card-body">
                                            <br> <br>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Deskripsi</th>
                                                        <th>Jumlah</th>
                                                        <th>PPN</th>
                                                        <th>Harga / Unit</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($total_rincian_hps_vendor as $key => $value) { ?>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['deskripsi_vendor'] ?></td>
                                                            <td><?= $value['jumlah_vendor'] ?></td>
                                                            <td><?= $value['ppn_vendor'] ?></td>
                                                            <td><?= "Rp " . number_format($value['harga_rincian_hps_vendor'], 2, ',', '.'); ?></td>
                                                            <td>
                                                                <?= "Rp " . number_format($value['jumlah_vendor'] * $value['harga_rincian_hps_vendor'], 2, ',', '.'); ?>
                                                            </td>
                                                        <?php   } ?>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?php $total_vendor = 0;
                                                    $ppn_vendor = 0;
                                                    $subtotal_vendor = 0;
                                                    foreach ($total_rincian_hps_vendor as $key => $value) { ?>
                                                        <?php
                                                        $total_vendor +=  $value['jumlah_vendor'] * $value['harga_rincian_hps_vendor'] + ($value['ppn_vendor'] / 100) * $value['jumlah_vendor'] * $value['harga_rincian_hps_vendor'];
                                                        $ppn_vendor += $value['ppn_vendor'];
                                                        $subtotal_vendor += $value['jumlah_vendor'] * $value['harga_rincian_hps_vendor'];
                                                        ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Sub Total</th>
                                                                <th><?= "Rp " . number_format($subtotal_vendor, 2, ',', '.'); ?></th>
                                                            </tr>
                                                            <tr>
                                                                <th>PPN</th>
                                                                <th><?= $ppn_vendor ?> %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Grand Total</th>
                                                                <th><?= "Rp " . number_format($total_vendor, 2, ',', '.'); ?>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Check Penawaran</label>
                                                    <form action="javascript:;" id="form_nilai_penawaran" method="POST">
                                                        <input type="hidden" name="id_vendor" value="<?= $row_vendor_mengikuti['id_vendor_mengikuti'] ?>">
                                                        <input type="hidden" name="id_paket" value="<?= $row_vendor_mengikuti['id_paket_mengikuti'] ?>">
                                                        <input type="text" disabled value="<?= "Rp " . number_format($total_vendor, 2, ',', '.'); ?>" class="form-control">
                                                        <input type="hidden" value="<?= $total_vendor ?>" name="nilai_penawaran" class="form-control">
                                                    </form>
                                                    <center>
                                                        <br>
                                                        <a href="javascript:;" id="save" onclick="Simpan_penawaran()" class="btn btn-success">SIMPAN PENAWARAN</a>
                                                    </center>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Penilaian Tenaga Ahli
                                        </div>
                                        <div class="card-body">
                                            <br> <br>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Tenaga Ahli</th>
                                                        <th>Pendidikan</th>
                                                        <th>Prodi</th>
                                                        <th>Sepesialis</th>
                                                        <th>Bukti</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($tenaga_ahli as $key => $value) { ?>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_tenaga_ahli'] ?></td>
                                                            <td><?= $value['pendidikan'] ?></td>
                                                            <td><?= $value['prodi'] ?></td>
                                                            <td><?= $value['spesialis'] ?></td>
                                                            <td> <a href="<?= base_url('bukti_tenaga_ahli/') . $value['bukti_tenaga_ahli'] ?>"> <img width="50px" src="<?= base_url('assets/pdf.png') ?>" alt=""></a></td>
                                                        <?php   } ?>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Masukan Nilai Tenaga Ahli</label>
                                                    <form action="javascript:;" id="form_nilai_tenaga_ahli" method="POST">
                                                        <input type="hidden" name="id_vendor" value="<?= $row_vendor_mengikuti['id_vendor_mengikuti'] ?>">
                                                        <input type="hidden" name="id_paket" value="<?= $row_vendor_mengikuti['id_paket_mengikuti'] ?>">
                                                        <input type="number" value="<?= $row_vendor_mengikuti['nilai_tenaga_ahli'] ?>" name="nilai_tenaga_ahli" class="form-control">
                                                    </form>
                                                    <center>
                                                        <br>
                                                        <a href="javascript:;" id="save" onclick="Simpan_tenaga()" class="btn btn-success">SIMPAN PENILAIAN</a>
                                                    </center>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            Penilaian Pengalaman Kerja
                                        </div>
                                        <div class="card-body">
                                            <br> <br>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Pemberi Pekerjaan</th>
                                                        <th>Nilai Kontrak</th>
                                                        <th>Alamat Pengerjaan</th>
                                                        <th>Tanggal Mulai / Selesai</th>
                                                        <th>Bukti</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($pengalaman as $key => $value) { ?>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_pekerjaan'] ?></td>
                                                            <td><?= $value['pemberi_kerja'] ?></td>
                                                            <td> <?= "Rp " . number_format($value['nilai_kontrak'], 2, ',', '.'); ?> </td>
                                                            <td><?= $value['alamat_pekerjaan'] ?></td>
                                                            <td><?= $value['tanggal_mulai_pengalaman'] ?> - <?= $value['tanggal_selesai_pengalaman'] ?></td>
                                                            <td> <a href="<?= base_url('bukti_pengalaman/') . $value['bukti_pengalaman'] ?>"> <img width="50px" src="<?= base_url('assets/pdf.png') ?>" alt=""></a></td>
                                                        <?php   } ?>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Masukan Nilai Tenaga Ahli</label>
                                                    <form action="javascript:;" id="form_nilai_pengalaman" method="POST">
                                                        <input type="hidden" name="id_vendor" value="<?= $row_vendor_mengikuti['id_vendor_mengikuti'] ?>">
                                                        <input type="hidden" name="id_paket" value="<?= $row_vendor_mengikuti['id_paket_mengikuti'] ?>">
                                                        <input type="number" value="<?= $row_vendor_mengikuti['nilai_pengalaman'] ?>" name="nilai_pengalaman" class="form-control">
                                                    </form>
                                                    <center>
                                                        <br>
                                                        <a href="javascript:;" id="save" onclick="Simpan_pengalaman()" class="btn btn-success">SIMPAN PENILAIAN</a>
                                                    </center>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <a href="<?= base_url('evaluasi/evaluasi_vendor/') . $row_vendor_mengikuti['id_paket_mengikuti'] ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>

<!-- Modal -->
</section>
</div>