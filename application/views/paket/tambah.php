<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Pembuatan Paket RUP</h1>
        </div>
        <div class="section-body">
            <form action="#" method="POST" id="formData">
                <div class="card">
                    <div class="card-body">
                        <!-- tahun anggaran -->
                        <!-- nama Paket -->
                        <div class="form-group row">
                            <label for="nama_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Nama Paket</label>
                            <div class="col-sm-4 mb-5">
                                <input type="text" name="nama_paket" id="nama_paket" class="form-control form-control-sm">
                            </div>
                            <label for="program_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Program</label>
                            <div class="col-sm-4 mb-5">
                                <input type="text" name="program_paket" class="form-control form-control-sm">
                            </div>
                            <label for="kualifikasi_usaha" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Kualifikasi Usaha</label>
                            <div class="col-sm-4 mb-5">
                                <select name="kualifikasi_usaha" class="form-control">
                                    <option value="">--Kualifikasi Usaha--</option>
                                    <option value="Kualifikasi Besar (B1)">Kualifikasi Besar (B1)</option>
                                    <option value="Kualifikasi Besar (B2)">Kualifikasi Besar (B2)</option>
                                    <option value="Kualifikasi Menengah (M1)">Kualifikasi Menengah (M1)</option>
                                    <option value="Kualifikasi Menengah (M2)">Kualifikasi Menengah (M2)</option>
                                    <option value="Kualifikasi Kecil (K1)">Kualifikasi Kecil (K1)</option>
                                    <option value="Kualifikasi Kecil (K2)">Kualifikasi Kecil (K2)</option>
                                    <option value="Kualifikasi Kecil (K3)">Kualifikasi Kecil (K3)</option>
                                </select>
                            </div>
                            <label for="tahun_anggaran" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Tahun Anggaran</label>
                            <input type="text" name="program_paket" value="<?= date('Y') ?>" readonly class="col-md-3 form-control">

                            <label for="uraian_pekerjaan_paket" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Uraian Pekerjaan</label>
                            <div class="col-sm-10 mb-5">
                                <textarea name="uraian_pekerjaan_paket" class="form-control form-control-sm"></textarea>
                            </div>
                            <label for="lokasi_pekerjaan" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Lokasi Pekerjaan</label>
                            <div class="col-sm-10 mb-5">
                                <textarea name="lokasi_pekerjaan" class="form-control form-control-sm"></textarea>
                            </div>

                            <label for="sumber_dana" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Sumber Dana</label>
                            <div class="col-sm-10 mb-5">
                                <input type="text" name="sumber_dana" class="form-control form-control-sm">
                            </div>

                            <label for="hps_total" class="col-sm-2 col-form-label" style="font-weight: bold;font-size:14px">Harga Sumber Dana</label>
                            <div class="col-sm-10 mb-5">
                                <input type="text" name="hps_total" class="form-control form-control-sm">
                            </div>

                        </div>
                        <!-- jadwal_pemilihan -->

                    </div>
            </form>
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                    <a href="<?= base_url('paket') ?>" class="btn btn-block btn-primary">Kembali</a>
                </div>
                <div class="col-md-3">
                    <a href="javascript:;" id="save" onclick="save()" class="btn-block btn btn-success">Simpan</a>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <br>
        </div>

        <!-- Modal -->
    </section>
</div>