<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>UPLOAD DOKUMEN PENAWARAN</h1>
        </div>
        <div class="section-body">
            <input id="id_paket" name="id_paket" type="hidden" value="<?= $angga['id_paket'] ?>">
            <div class="row">
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"> RINCIAN HPS TENDER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">BUAT RINCIAN HPS TENDER</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Penawaran Tender
                                </div>
                                <div class="card-body"> <br> <br>
                                    <table id="rincian_hps_tbl" class="table">
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

                                        </tbody>
                                    </table>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sub Total</th>
                                                        <th><?= "Rp " . number_format($subtotal, 2, ',', '.'); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>PPN</th>
                                                        <th><?= $ppn ?> %</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th><?= "Rp " . number_format($total, 2, ',', '.'); ?>

                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Penawaran Vendor <?= $this->session->userdata('username_vendor'); ?>
                                </div>
                                <div class="card-body">
                                    <a href="javascript:;" data-toggle="modal" data-target="#modalDataRincianHps" class="col-md-3 btn btn-block btn-primary"> <i class="fas fa fa-plus"></i> Tambah HPS</a>
                                    <br> <br>
                                    <table id="rincian_hps_tbl_vendor" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah</th>
                                                <th>PPN</th>
                                                <th>Harga / Unit</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
                                                            <a href="" class="btn btn-primary btn-sm ml-2"><i class="fas fa-sync-alt"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table><br>
                                            <label class="text-danger" for="">Klik Tombol Refresh Untuk Update HPS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <a href="<?= base_url('vendor/tender_diikuti') ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalDataRincianHps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">PENAWARAN HPS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formDataHps">
                    <input type="hidden" name="id_rincian_hps_vendor" id="id_rincian_hps_vendor">
                    <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket">
                    <!-- inpu disini untuk agency by id-nya nanti -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="deskripsi_vendor">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi_vendor" id="deskripsi_vendor" placeholder="Deskripsi">
                            <p class="deskripsi_vendor-error text-danger"></p>
                            <label for="jumlah_vendor">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah_vendor" id="jumlah_vendor" placeholder="Satuan">
                            <p class="jumlah_vendor-error text-danger"></p>
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="ppn_vendor">PPN</label>
                            <input type="number" class="form-control" name="ppn_vendor" id="ppn_vendor" placeholder="Pajak">
                            <p class="ppn_vendor-error text-danger"></p>
                            <label for="harga_rincian_hps_vendor">Harga</label>
                            <input type="text" class="form-control" name="harga_rincian_hps_vendor" id="harga_rincian_hps_vendor2" placeholder="Harga">
                            <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah">
                            <p class="harga_rincian_hps_vendor-error text-danger"></p>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSave" onclick="save_rincian_hps()">Save</button>
                <button type="button" style="display: none;" class="btn btn-primary" id="btnEdit" onclick="edit_rincian_hps()">Save Edit</button>
            </div>
        </div>
    </div>
</div>