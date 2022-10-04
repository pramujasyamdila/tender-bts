<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Pegawai</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Pegawai
                </div>
                <div class="card-body">
                    <div class="mb-3 mt-3">
                        <button class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#modelId"><i class="fas fa fa-users"></i> TAMBAH PEGAWAI</button>
                    </div>
                    <table id="tbl_pegawai" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Nip</th>
                                <th>Jabatan</th>
                                <th>No Telpon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
    </section>
</div>
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <hr>
                Data Pegawai
                <hr>
                <form action="javascript:;" id="form_tambah_pegawai" method="post">
                    <input type="hidden" name="id_pegawai">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" id="" class="form-control" placeholder="Nama...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nip</label>
                                <input type="text" name="nip" id="" class="form-control" placeholder="Nip...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input type="text" name="jabatan" id="" class="form-control" placeholder="Jabatan...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Email...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No. Telepon</label>
                                <input type="text" name="telepon" id="" class="form-control" placeholder="Telepon...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <center>
                                    <label for="">Masa Kerja</label>
                                </center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Tahun</label>
                                        <select name="tahun_kerja" class="form-control" id="">
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value=" 1">1 Tahun</option>
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
                                            <option value="20">20 Tahun</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bulan</label>
                                            <select name="bulan_kerja" class="form-control" id="">
                                                <option value="">-- Pilih Bulan --</option>
                                                <option value=" 1">1 Bulan</option>
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
                                                <option value="12">12 Bulan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    Akun Login
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="" class="form-control" placeholder="Username...">
                            </div>
                            <label for="">Role User</label>
                            <select name="id_role" class="form-control" id="">
                                <option value="">-- Pilih Role User --</option>
                                <?php foreach ($role as $key => $value) { ?>
                                    <option value="<?= $value['id_role'] ?>"><?= $value['nama_role'] ?></option>
                                <?php       } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Ulangi Password</label>
                                <input type="password" name="password2" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="javascript:;" id="save" onclick="Tambah_pegawai()" class="btn btn-primary">Save Pegawai</a>
                <a href="javascript:;" id="edit" style="display: none;" onclick="Edit_pegawai()" class="btn btn-primary">Save</a>
            </div>
        </div>
    </div>
</div>