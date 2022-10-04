<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>BUAT HPS</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                </div>
                <div class="card-body"> <a href="javascript:;" data-toggle="modal" data-target="#modalDataRincianHps" class="col-md-3 btn btn-block btn-primary"> <i class="fas fa fa-plus"></i> Tambah HPS</a> <br> <br>
                    <table id="rincian_hps_tbl" class="table">
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
                                            <a href="" class="btn btn-primary btn-sm ml-2"><i class="fas fa-sync-alt"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                            </table><br>
                            <label class="text-danger" for="">Klik Tombol Refresh Untuk Update HPS</label>
                        </div>
                    </div>
                    <div class="row">
                        <a href="<?= base_url('paket/buat_paket_tender/') . $angga['id_paket'] ?>" class="btn btn-primary btn-block col-md-3 btn-sm ml-2"><i class="fas fa-arrow-left"></i>Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
    </section>
</div>
<div class="modal fade" id="modalDataRincianHps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">RINCIAN HPS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formDataHps">
                    <input type="hidden" name="id_rincian_hps" id="id_rincian_hps">
                    <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_paket">
                    <!-- inpu disini untuk agency by id-nya nanti -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi">
                            <p class="deskripsi-error text-danger"></p>
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Satuan">
                            <p class="jumlah-error text-danger"></p>
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="ppn">PPN</label>
                            <input type="number" class="form-control" name="ppn" id="ppn" placeholder="Pajak">
                            <p class="ppn-error text-danger"></p>
                            <label for="harga_rincian_hps">Harga</label>
                            <input type="text" class="form-control" name="harga_rincian_hps" id="harga_rincian_hps2" placeholder="Harga">
                            <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah">
                            <p class="harga_rincian_hps-error text-danger"></p>

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