<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Prosess Pengajuan Cuti</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Prosess Pengajuan Cuti
                </div>
                <div class="card-body">
                    <hr>
                    <center>
                        PRNGAJUAN CUTI PADA : <?= $pengajuan['tanggal_pengajua_cuti'] ?>
                    </center>
                    <hr>
                    <hr>
                    <center>
                        DATA PEGAWAI
                    </center>
                    <hr>
                    <input type="hidden" name="id_pegawai">
                    <input type="hidden" name="id_pengajuan_cuti">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Pegawai <label class="text-danger">*</label></label>
                                <input type="text" name="nama_pegawai" value="<?= $pengajuan['nama_pegawai'] ?>" readonly id="" class="form-control" placeholder="Nama...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nip <label class="text-danger">*</label></label>
                                <input type="text" name="nip" value="<?= $pengajuan['nip'] ?>" readonly class="form-control" placeholder="Nip...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Jabatan <label class="text-danger">*</label></label>
                                    <input type="text" name="jabatan" value="<?= $pengajuan['jabatan'] ?>" readonly class="form-control" placeholder="Jabatan...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email <label class="text-danger">*</label></label>
                                <input type="email" name="email" value="<?= $pengajuan['email'] ?>" readonly class="form-control" placeholder="Email...">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Tahun Masa Kerja</label>
                                        <input value="<?= $pengajuan['tahun_kerja'] ?> Tahun" readonly class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bulan Masa Kerja</label>
                                            <input value="<?= $pengajuan['bulan_kerja'] ?> Tahun" readonly class="form-control">
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
                                <input type="radio" name="jenis_cuti" <?php if ($pengajuan['jenis_cuti'] == 'CUTI TAHUNAN') { ?> checked <?php    } else { ?> <?php     } ?> onchange="pilih_jenis_cuti()" value="CUTI TAHUNAN"> CUTI TAHUNAN
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="radio" name="jenis_cuti" <?php if ($pengajuan['jenis_cuti'] == 'CUTI SAKIT') { ?> checked <?php    } else { ?> <?php     } ?> onchange="pilih_jenis_cuti()" value="CUTI SAKIT"> CUTI SAKIT
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="radio" name="jenis_cuti" re <?php if ($pengajuan['jenis_cuti'] == 'CUTI BESAR') { ?> checked <?php    } else { ?> <?php     } ?> onchange="pilih_jenis_cuti()" value="CUTI BESAR"> CUTI BESAR
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="radio" name="jenis_cuti" <?php if ($pengajuan['jenis_cuti'] == 'CUTI KARENA ALASAN PENTING') { ?> checked <?php    } else { ?> <?php     } ?> onchange="pilih_jenis_cuti()" value="CUTI KARENA ALASAN PENTING"> CUTI KARENA ALASAN PENTING
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="radio" name="jenis_cuti" <?php if ($pengajuan['jenis_cuti'] == 'CUTI MELAHIRKAN') { ?> checked <?php    } else { ?> <?php     } ?> onchange="pilih_jenis_cuti()" value="CUTI MELAHIRKAN"> CUTI MELAHIRKAN
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="radio" name="jenis_cuti" <?php if ($pengajuan['jenis_cuti'] == 'CUTI DILUAR TANGGUNGAN') { ?> checked <?php    } else { ?> <?php     } ?> onchange="pilih_jenis_cuti()" value="CUTI DILUAR TANGGUNGAN NEGARA"> CUTI DILUAR TANGGUNGAN NEGARA
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
                                <textarea name="alasan_cuti" disabled class="form-control" id="" cols="200" rows="40" style="height: 150px;"><?= $pengajuan['nama_pegawai'] ?></textarea>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" name="hasil_cuti">
                                <label for="">Selama</label>
                                <input readonly type="text" value="<?= $pengajuan['hasil_cuti'] ?> Hari" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mulai Cuti</label>
                                <input readonly type="text" value="<?= $pengajuan['mulai_cuti'] ?> " class="form-control">
                            </div>
                        </div>
                        <div class="col-md-1" style="margin-top: 35px;">
                            <center>
                                S / D
                            </center>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Selesai Cuti</label>
                                <input readonly type="text" value="<?= $pengajuan['selesai_cuti'] ?>" class="form-control">
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
                                <textarea name="alasan_cuti" disabled class="form-control" id="" cols="200" rows="40" style="height: 150px;"><?= $pengajuan['alamat_selama_cuti'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <center>
                                PERTIMBANGAN ATASAN OLEH BPK/IBU <?= $atasan['nama_pegawai'] ?>
                            </center>
                            <hr>
                            <div class="form-group">
                                <label for=""> STATUS PERSETUJUAN</label>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>DISETUJUI</th>
                                            <th>PERUBAHAN</th>
                                            <th>DITANGGUHKAN</th>
                                            <th>TIDAK DISETUJUI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'DISETUJUI') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'PERUBAHAN') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'DITANGGUHKAN') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'TIDAK DISETUJUI') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                        </tr>
                                        <tr>
                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'DISETUJUI') { ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php } else { ?>
                                            <?php   }   ?>


                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'PERUBAHAN') { ?>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <label for="">ALASAN </label>
                                                        <textarea name="" disabled id="" class="form-control" cols="30" style="height: 200px;" rows="10"><?= $pengajuan['alasan_pertimbangan_atasan'] ?></textarea>
                                                    </center>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            <?php } else { ?>

                                            <?php   }   ?>


                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'DITANGGUHKAN') { ?>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <label for="">ALASAN </label>
                                                        <textarea name="" disabled id="" class="form-control" cols="30" style="height: 200px;" rows="10"><?= $pengajuan['alasan_pertimbangan_atasan'] ?></textarea>
                                                    </center>
                                                </td>
                                                <td></td>
                                            <?php } else { ?>

                                            <?php   }   ?>


                                            <?php if ($pengajuan['sts_pertimbangan_atasan'] == 'TIDAK DISETUJUI') { ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <label for="">ALASAN </label>
                                                        <textarea name="" disabled id="" class="form-control" cols="30" style="height: 200px;" rows="10"><?= $pengajuan['alasan_pertimbangan_atasan'] ?></textarea>
                                                    </center>
                                                </td>
                                            <?php } else { ?>

                                            <?php   }   ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <center>
                                KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI OLEH BPK/IBU <?= $kepala_kantor['nama_pegawai'] ?>
                            </center>
                            <hr>
                            <div class="form-group">
                                <label for=""> STATUS PERSETUJUAN</label>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>DISETUJUI</th>
                                            <th>PERUBAHAN</th>
                                            <th>DITANGGUHKAN</th>
                                            <th>TIDAK DISETUJUI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'DISETUJUI') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'PERUBAHAN') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'DITANGGUHKAN') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'TIDAK DISETUJUI') { ?>
                                                <td><label class="badge badge-success" for=""><i class="fas fa fa-check"></i></label></td>
                                            <?php } else { ?>
                                                <td><label class="badge badge-danger" for=""><i class="fas fa fa-times"></i></label></td>
                                            <?php   }   ?>
                                        </tr>
                                        <tr>
                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'DISETUJUI') { ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php } else { ?>

                                            <?php   }   ?>


                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'PERUBAHAN') { ?>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <label for="">ALASAN </label>
                                                        <textarea name="" disabled id="" class="form-control" cols="30" style="height: 200px;" rows="10"><?= $pengajuan['alasan_pertimbangan_kepala_kantor'] ?></textarea>
                                                    </center>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            <?php } else { ?>

                                            <?php   }   ?>


                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'DITANGGUHKAN') { ?>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <label for="">ALASAN </label>
                                                        <textarea name="" disabled id="" class="form-control" cols="30" style="height: 200px;" rows="10"><?= $pengajuan['alasan_pertimbangan_kepala_kantor'] ?></textarea>
                                                    </center>
                                                </td>
                                                <td></td>
                                            <?php } else { ?>

                                            <?php   }   ?>


                                            <?php if ($pengajuan['sts_pertimbnag_kelapa_kator'] == 'TIDAK DISETUJUI') { ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <center>
                                                        <label for="">ALASAN </label>
                                                        <textarea name="" disabled id="" class="form-control" cols="30" style="height: 200px;" rows="10"><?= $pengajuan['alasan_pertimbangan_kepala_kantor'] ?></textarea>
                                                    </center>
                                                </td>
                                            <?php } else { ?>

                                            <?php   }   ?>
                                        </tr>
                                    </tbody>
                                </table>
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
<!-- Button trigger modal -->
<!-- Modal -->