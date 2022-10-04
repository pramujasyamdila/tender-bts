<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Pengajuan Cuti</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Pengajuan Cuti
                </div>
                <div class="card-body">
                    <hr>
                    <center>
                        ISI DATA PEGAWAI
                    </center>
                    <hr>
                    <form action="javascript:;" id="form_pengajuan_cuti" method="post">
                        <input type="hidden" name="id_pegawai" value="<?= $this->session->userdata('id_pegawai') ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Pegawai <label class="text-danger">*</label></label>
                                    <input type="text" name="nama_pegawai" readonly value="<?= $this->session->userdata('nama_pegawai'); ?>" id="" class="form-control" placeholder="Nama...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nip <label class="text-danger">*</label></label>
                                    <input type="text" name="nip" readonly value="<?= $this->session->userdata('nip'); ?>" id="" class="form-control" placeholder="Nip...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Jabatan <label class="text-danger">*</label></label>
                                        <input type="text" name="jabatan" readonly value="<?= $this->session->userdata('jabatan'); ?>" id="" class="form-control" placeholder="Jabatan...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email <label class="text-danger">*</label></label>
                                    <input type="email" readonly value="<?= $this->session->userdata('email'); ?>" name="email" id="" class="form-control" placeholder="Email...">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mt-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Tahun Masa Kerja</label>
                                            <select name="tahun_kerja" class="form-control" id="">
                                                <option value="<?= $this->session->userdata('tahun_kerja'); ?>"><?= $this->session->userdata('tahun_kerja'); ?> Tahun</option>
                                                <!-- <option value=" 1">1 Tahun</option>
                                                <option value="2">2 Tahun</option>
                                                <option value="3">3 Tahun</option>
                                                <option value="4">4 Tahun</option>
                                                <option value="5">5 Tahun</option>
                                                <option value="6">6 Tahun</option>
                                                <option value="7">7 Tahun</option>
                                                <option value="8">8 Tahun</option>
                                                <option value="9">9 Tahun</option>
                                                <option value="10">10 Tahun</option>
                                                <option value="11">11 Tahun</option>
                                                <option value="12">12 Tahun</option>
                                                <option value="13">13 Tahun</option>
                                                <option value="14">14 Tahun</option>
                                                <option value="15">15 Tahun</option>
                                                <option value="16">16 Tahun</option>
                                                <option value="17">17 Tahun</option>
                                                <option value="18">18 Tahun</option>
                                                <option value="19">19 Tahun</option>
                                                <option value="20">20 Tahun</option> -->
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Bulan Masa Kerja</label>
                                                <select name="bulan_kerja" class="form-control" id="">
                                                    <option value="<?= $this->session->userdata('bulan_kerja'); ?>"><?= $this->session->userdata('bulan_kerja'); ?> Bulan</option>
                                                    <!-- <option value=" 1">1 Bulan</option>
                                                    <option value="2">2 Bulan</option>
                                                    <option value="3">3 Bulan</option>
                                                    <option value="4">4 Bulan</option>
                                                    <option value="5">5 Bulan</option>
                                                    <option value="6">6 Bulan</option>
                                                    <option value="7">7 Bulan</option>
                                                    <option value="8">8 Bulan</option>
                                                    <option value="9">9 Bulan</option>
                                                    <option value="10">10 Bulan</option>
                                                    <option value="11">11 Bulan</option>
                                                    <option value="12">12 Bulan</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <center>
                            JENIS CUTI YANG DI AMBIL
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="radio" name="jenis_cuti" onchange="pilih_jenis_cuti()" value="CUTI TAHUNAN"> CUTI TAHUNAN
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="radio" name="jenis_cuti" onchange="pilih_jenis_cuti()" value="CUTI SAKIT"> CUTI SAKIT
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="radio" name="jenis_cuti" onchange="pilih_jenis_cuti()" value="CUTI BESAR"> CUTI BESAR
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="radio" name="jenis_cuti" onchange="pilih_jenis_cuti()" value="CUTI KARENA ALASAN PENTING"> CUTI KARENA ALASAN PENTING
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="radio" name="jenis_cuti" onchange="pilih_jenis_cuti()" value="CUTI MELAHIRKAN"> CUTI MELAHIRKAN
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="radio" name="jenis_cuti" onchange="pilih_jenis_cuti()" value="CUTI DILUAR TANGGUNGAN NEGARA"> CUTI DILUAR TANGGUNGAN NEGARA
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="cuti_value">
                        <hr>
                        <center>
                            ALASAN CUTI
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alasan Cuti</label>
                                    <textarea name="alasan_cuti" class="form-control" id="" cols="200" rows="40" style="height: 150px;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">

                            </div>

                        </div>
                        <hr>
                        <center>
                            LAMANYA CUTI
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="hasil_cuti">
                                    <label for="">Selama</label>
                                    <input readonly type="text" class="form-control" name="hasil_cuti_manipulasi">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Mulai Cuti</label>
                                    <input type="date" class="form-control" name="mulai_cuti">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Selesai</label>
                                    <input type="date" onchange="cek_cuti()" class="form-control" name="selesai_cuti">
                                </div>
                            </div>
                        </div>
                        <center>
                            ALAMAT SELAMA MENJALANKAN CUTI
                        </center>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat_selama_cuti" class="form-control" id="" cols="200" rows="40" style="height: 150px;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <hr>
                                <center>
                                    PERTIMBANGAN ATASAN LANGSUNG
                                </center>
                                <hr>
                                <div class="form-group">
                                    <label for=""> PERTIMBANGAN ATASAN <label class="text-danger">*</label></label>
                                    <select name="id_pegawai_atasan" id="" class="form-control">
                                        <option value="">-- PIlih --</option>
                                        <?php foreach ($atasan as $key => $value) { ?>
                                            <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?></option>
                                        <?php   } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <hr>
                                <center>
                                    KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI
                                </center>
                                <hr>
                                <div class="form-group">
                                    <label for=""> KEPUTUSAN KEPALA KANTOR <label class="text-danger">*</label></label>
                                    <select name="id_pegawai_kepala_kantor" id="" class="form-control">
                                        <option value="">-- PIlih --</option>
                                        <?php foreach ($kepala_kantor as $key => $value) { ?>
                                            <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama_pegawai'] ?></option>
                                        <?php   } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <a href="javascript:;" class="btn btn-primary btn-block"> <i class="fas fa fa-arrow-left"></i> KEMBALI</a>
                        </div>
                        <div class="col-md-3">
                            <a href="javascript:;" onclick="simpan_pengajuan()" class="btn btn-success btn-block"> <i class="fas fa fa-save"> </i> SIMPAN</a>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
    </section>
</div>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="javascript:;" id="save" onclick="Tambah_pegawai()" class="btn btn-primary">Save Pegawai</a>
                <a href="javascript:;" id="edit" style="display: none;" onclick="Edit_pegawai()" class="btn btn-primary">Save</a>
            </div>
        </div>
    </div>
</div>