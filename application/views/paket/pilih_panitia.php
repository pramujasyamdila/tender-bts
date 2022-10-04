<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pilih Panitia</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="content">
                    <div class="container">
                        <table class="table table-bordered">
                            <tr>
                                <th class="bgwarning">Rencana Umum Pengadaan</th>
                                <td>
                                    <input type="hidden" name="id_paket" id="id_paketnya" value="<?= $angga['id_paket'] ?>">
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
                        </table>
                        <div class="bs-callout-primary" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
                            <b>Petunjuk Penginputan Pemilihan Panitia :</b><br>
                            1. Pilih Salah Satu Panita <br>
                            <br>
                        </div>
                        <br><br>
                        <div style="padding: 10px;">
                            <div style="overflow: auto;">
                                <input type="hidden" name="id_paket" value="<?= $angga['id_paket'] ?>" id="id_pilih_panitia">
                                <table id="tbl_id_pilih_panitia" class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Panitia</th>
                                            <th>Unit</th>
                                            <th>Status</th>
                                            <th>Jenis Panitia</th>
                                            <th>Pilih Panitia</th>
                                        </tr>

                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div> <br><br><br>
                        <div class="row">
                            <a href="<?= base_url('paket/edit/' . $angga['id_paket']) ?>" class="btn btn-danger col-md-5">Kembali</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
    </section>
</div>