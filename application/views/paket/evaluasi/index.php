<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>EVALUASI VENDOR</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Peserta Tender
                </div>
                <div class="card-body">
                    <div class="mb-3 mt-3">
                    </div>
                    <table id="tbl_vendor" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Vendor</th>
                                <th>Nilai Penawaran</th>
                                <th>Nilai Persyaratan</th>
                                <th>Nilai Promosi</th>
                                <th>Nilai Tenaga Ahli</th>
                                <th>Nilai Pengalaman</th>
                                <?php if ($angga['status_selesai_tender'] == 1) { ?>

                                <?php  } else { ?>
                                    <th>Action</th>
                                <?php    }  ?>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <a href="<?= base_url('paket/lihat_tender/') . $angga['id_paket'] ?>" class="btn btn-danger btn-sm btn-block">Kembali</a>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
    </section>
</div>