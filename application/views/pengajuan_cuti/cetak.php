<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="Shortcut Icon" href="<?= base_url('assets/jawabaya.gif') ?>" type="image/x-icon" sizes="96x96" />
    <title>CETAK &mdash; PENGAJUAN CUTI</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>style.min.css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" media="all" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/datatable/datatables.min.css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/datatable/dataTables.bootstrap4.min.css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/datatable/select.bootstrap4.min.css" media="all">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/style.css" media="all">
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/components.css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" media="all" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>sweetalert2/sweetalert2.min.css" media="all" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>js/sweetalert.min.js" media="all"></script>
</head>

<body style="background-color: white;">
    <div id="app">
        <div class="main-wrapper">
            <div class="container">
                <div class="container">
                    <div class="container">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?= base_url('assets/jawabaya.gif') ?>" style="width: 30%;" alt="">
                                        </div>
                                        <di class="col-md-8 mt-4">
                                            <h4>WALIKOTA ADMINISTRASI JAKARTA BARAT</h4>
                                        </di>
                                    </div>
                                    <hr>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-8">

                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Jakarta, <?= date('D d M Y', strtotime($pengajuan['tanggal_pengajua_cuti'])) ?></label>
                                            <br>Kepada <br>
                                            Yth. Kepala Suku Dinas Tenaga Kerja, Transmigrasi dan Energi di jakarta
                                        </div>
                                    </div>

                                    <hr>
                                    I. DATA PEGAWAI
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Nama
                                        </div>
                                        <div class="col-md-3">
                                            <label for=""> <?= $pengajuan['nama_pegawai'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            NIP
                                        </div>
                                        <div class="col-md-3">
                                            <label for=""> <?= $pengajuan['nip'] ?></label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Jabatan
                                        </div>
                                        <div class="col-md-3">
                                            <label for=""> <?= $pengajuan['jabatan'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            Masa Kerja
                                        </div>
                                        <div class="col-md-3">
                                            <label for=""> <?= $pengajuan['tahun_kerja'] ?> Tahun</label> <label for=""> <?= $pengajuan['bulan_kerja'] ?> Bulan</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Unit Kerja
                                        </div>
                                        <div class="col-md-9">
                                            <label for=""> <?= $pengajuan['unit_kerja'] ?></label>
                                        </div>
                                    </div>
                                    <hr>
                                    II. JENIS CUTI YANG DI AMBIL
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            1. Cuti Tahunan
                                        </div>
                                        <div class="col-md-3">
                                            <?php if ($pengajuan['jenis_cuti'] == 'CUTI TAHUNAN') { ?>
                                                <label for=""><i class="fas fa fa-check"></i></label>
                                            <?php } else { ?>
                                                <label for=""><i class="fas fa fa-times"></i></label>
                                            <?php   }   ?>

                                        </div>
                                        <div class="col-md-3">
                                            2. Cuti Besar
                                        </div>
                                        <div class="col-md-3">
                                            <?php if ($pengajuan['jenis_cuti'] == 'CUTI BESAR') { ?>
                                                <label for=""><i class="fas fa fa-check"></i></label>
                                            <?php } else { ?>
                                                <label for=""><i class="fas fa fa-times"></i></label>
                                            <?php   }   ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            3. Cuti Sakit
                                        </div>
                                        <div class="col-md-3">
                                            <?php if ($pengajuan['jenis_cuti'] == 'CUTI SAKIT') { ?>
                                                <label for=""><i class="fas fa fa-check"></i></label>
                                            <?php } else { ?>
                                                <label for=""><i class="fas fa fa-times"></i></label>
                                            <?php   }   ?>
                                        </div>
                                        <div class="col-md-3">
                                            4. Cuti Melahirkan
                                        </div>
                                        <div class="col-md-3">
                                            <?php if ($pengajuan['jenis_cuti'] == 'CUTI MELAHIRJAN') { ?>
                                                <label for=""><i class="fas fa fa-check"></i></label>
                                            <?php } else { ?>
                                                <label for=""><i class="fas fa fa-times"></i></label>
                                            <?php   }   ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            5. Cuti Karena Alasan Penting
                                        </div>
                                        <div class="col-md-3">
                                            <?php if ($pengajuan['jenis_cuti'] == 'CUTI KARENA ALASAN PENTING') { ?>
                                                <label for=""><i class="fas fa fa-check"></i></label>
                                            <?php } else { ?>
                                                <label for=""><i class="fas fa fa-times"></i></label>
                                            <?php   }   ?>
                                        </div>
                                        <div class="col-md-3">
                                            6. Cuti di Luar Tanggungan Negara
                                        </div>
                                        <div class="col-md-3">
                                            <?php if ($pengajuan['jenis_cuti'] == 'CUTI DILUAR TANGGUNGAN NEGARA') { ?>
                                                <label for=""><i class="fas fa fa-check"></i></label>
                                            <?php } else { ?>
                                                <label for=""><i class="fas fa fa-times"></i></label>
                                            <?php   }   ?>
                                        </div>
                                    </div>
                                    <hr>
                                    III. ALASAN CUTI
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?= $pengajuan['alasan_cuti'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    IV. LAMANYA CUTI
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            Selama
                                        </div>
                                        <div class="col-md-3">
                                            <label for=""> <?= $pengajuan['hasil_cuti'] ?> Hari</label>
                                        </div>
                                        <div class="col-md-2">
                                            Mulai Tanggal
                                        </div>
                                        <div class="col-md-4">
                                            <?= date('D d M Y', strtotime($pengajuan['mulai_cuti'])) ?> s/d <?= date('D d M Y', strtotime($pengajuan['selesai_cuti'])) ?>
                                        </div>
                                    </div>
                                    <hr>
                                    V. CATATAN CUTI
                                    <hr>
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tahun</th>
                                                    <th>Sisa</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($catatan_cuti as $key => $value) { ?>
                                                    <tr>
                                                        <td><?= date('Y', strtotime($value['tanggal_pengajua_cuti'])) ?></td>
                                                        <td>10</td>
                                                        <td>Sisa Cuti 10</td>
                                                    </tr>
                                                <?php   } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    VI. ALAMAT SELAMA MENJALANKAN CUTI
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><?= $pengajuan['alamat_selama_cuti'] ?></p>
                                        </div>
                                    </div> <br>
                                    <br>
                                    <di class="row">
                                        <div class="col-md-8">

                                        </div>
                                        <div class="col-md-4">
                                            <center>
                                                <label for="">TELP : </label> <label for=""> <?= $pengajuan['telepon'] ?></label>
                                            </center>
                                            <br>
                                            <center>Hormat Saya,</center> <br>
                                            <br><br><br><br>
                                            <center>
                                                <label for="">( <?= $pengajuan['nama_pegawai'] ?> )</label>
                                            </center>
                                            <center>
                                                <label for="">NIP. <?= $pengajuan['nip'] ?> </label>
                                            </center>
                                        </div>
                                    </di>
                                    <hr>
                                    PERTIMBANGAN ATASAN LANGSUNG
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""> STATUS PERSETUJUAN</label>
                                                <table class="table table-bordered">
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
                                    </div>
                                    <br>
                                    <br>
                                    <di class="row">
                                        <div class="col-md-8">

                                        </div>
                                        <div class="col-md-4">
                                            <center>
                                                <label for="">TELP : </label> <label for=""> <?= $atasan['telepon'] ?></label>
                                            </center>
                                            <br>
                                            <center>Hormat Saya,</center> <br>
                                            <br><br><br><br>
                                            <center>
                                                <label for="">( <?= $atasan['nama_pegawai'] ?> )</label>
                                            </center>
                                            <center>
                                                <label for="">NIP. <?= $atasan['nip'] ?> </label>
                                            </center>
                                        </div>
                                    </di>
                                    <hr>
                                    KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-8">

                                        </div>
                                        <div class="col-md-4">
                                            <center>
                                                <label for="">TELP : </label> <label for=""> <?= $kepala_kantor['telepon'] ?></label>
                                            </center>
                                            <br>
                                            <center>Hormat Saya,</center> <br>
                                            <br><br><br><br>
                                            <center>
                                                <label for="">( <?= $kepala_kantor['nama_pegawai'] ?> )</label>
                                            </center>
                                            <center>
                                                <label for="">NIP. <?= $kepala_kantor['nip'] ?> </label>
                                            </center>
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
    <script>
        window.print();
    </script>