<script>
    var tbl_rup_ku = $('#tbl_rup_ku');

    function reload_rup() {
        tbl_rup_ku.DataTable().ajax.reload();
    }

    // GET DATA LOKASI PEKERJAAN 
    $(document).ready(function() {
        tbl_rup_ku.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/getdata') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });
</script>
<script>
    function message(icon, text) {
        swal({
            title: "success!!!",
            text: text,
            icon: icon,
        });
    }

    function warningku(icon, text) {
        swal({
            title: "Maaf!!!",
            text: text,
            icon: icon,
        });
    }

    // RELOAD TABLENYA


    function pilih_penyedia() {
        var id_penyeleksi = $('[name="id_penyeleksi"]').val();
        var id_paket = $('[name="id_paket"]').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/penyeleksi/'); ?>' + id_paket,
            data: {
                id_penyeleksi: id_penyeleksi
            },
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Penyeleksi Berhasil Di Pilih')
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }


    function SimpanPaketTender() {
        var id_paket = $('[name="id_paket"]').val();
        <?php if (!$total_rincian_hps) { ?>
            message('warning', 'Isi Rincian HPS Terlebih Dahulu');
        <?php  } else if ($angga['id_penyeleksi'] == null || $angga['id_penyeleksi'] == 0) { ?>
            message('warning', 'Pilih Penyeleksi Terlebih Dahulu');
        <?php } else { ?>
            $.ajax({
                method: "POST",
                url: '<?= base_url('paket/umumkan_penyeleksi/'); ?>' + id_paket,
                dataType: "JSON",
                success: function(response) {
                    message('success', 'Paket Berhasil Di Umumkan');
                    location.replace('<?= base_url('paket/paket_tender') ?>')
                },
                error: function() {
                    console.log(error);
                }
            })

        <?php     } ?>

    }
</script>
<script>
    var tbl_rup_paket_terdaftar = $('#tbl_rup_paket_terdaftar');

    function relodTable_lokasi() {
        tbl_rup_paket_terdaftar.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tbl_rup_paket_terdaftar.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/getdata_rup_tender') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });
</script>

<script>
    var table_dokumen_tender = $('#table_dokumen_tender');

    function reload_dokumen() {
        table_dokumen_tender.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_paket = $('#id_paketkusaja').val();
        table_dokumen_tender.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/get_data_dokumen_tender/') ?>" + id_paket,
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });


    var form_dokumen_tender = $('#form_dokumen_tender');
    form_dokumen_tender.on('submit', function(e) {
        e.preventDefault();
        var id_paket = $('#id_paketkusaja').val();
        if ($('.file_dokumen').val() == '') {
            $('#error_file_tender').show();
            setTimeout(function() {
                $('#error_file_tender').hide();
            }, 4000);
        } else if ($('.nama_dokuken').val() == '') {
            $('#error_nama_file').show();
            setTimeout(function() {
                $('#error_nama_file').hide();
            }, 4000);

        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>paket/upload_dokumen_tender/" + id_paket,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_tender').attr('disabled', 'disabled');
                    $('#process_tender').css('display', 'block');
                    $('#sedang_dikirim_tender').show();
                },
                success: function(response) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process_tender(percentage, timer);
                    }, 1000);
                }
            });
        }
    });

    function progress_bar_process_tender(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#form_dokumen_tender')[0].reset();
            $('#process_tender').css('display', 'none');
            $('#sedang_dikirim_tender').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_tender').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            reload_dokumen();
        }
    }

    function by_id_dokumen_pengadaan(id, type) {
        if (type == 'hapus_pengadaan') {
            saveData = 'hapus_pengadaan';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('paket/by_id_dokumen_pengadaan/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'hapus_pengadaan') {
                    Question_delete_dokumen_pengadaan(response['get_dokumen'].id_dokumen_pengadaan, response['get_dokumen'].nama_dokumen);
                }
            }
        })
    }

    // HAPUS DATA 
    function Question_delete_dokumen_pengadaan(id_dokumen_pengadaan, nama_dokumen) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Dokumen " + nama_dokumen + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    delete_dokumen_pengadaan(id_dokumen_pengadaan);
                } else {
                    message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
                }
            });
    }

    function delete_dokumen_pengadaan(id_dokumen_pengadaan) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('paket/delete_dokumen_pengadaan/') ?>" + id_dokumen_pengadaan,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    reload_dokumen();
                    message('success', 'Dokumen Berhasil Di Delete');
                }
            }
        })
    }
</script>

<script>
    var table_syarat_kualifikasi = $('#table_syarat_kualifikasi');

    function reload_kualifikasi() {
        table_syarat_kualifikasi.DataTable().ajax.reload();
    }

    // GET DATA LOKASI PEKERJAAN 
    $(document).ready(function() {
        var id_paket = $('#id_paketkusaja').val();
        table_syarat_kualifikasi.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/get_table_kualifikasi_tender/') ?>" + id_paket,
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });

    var from_syarat_kualifikasi = $('#from_syarat_kualifikasi');
    var modal_kualifikasi = $('#modal_kualifikasi');

    function simpan_kaulifikasi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/simpan_kualifikasi_tender'); ?>',
            data: from_syarat_kualifikasi.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    modal_kualifikasi.modal('hide')
                    from_syarat_kualifikasi[0].reset();
                    message('success', 'Data Berhasil Di Tambah');
                    reload_kualifikasi()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function hapus_kualifikasi(id_kualifikasi_tender) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Dokumen ini ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    delete_kualifikasi(id_kualifikasi_tender);
                } else {
                    message('success', 'Data Tidak Jadi Di Hapus, Data Aman!!')
                }
            });
    }

    function delete_kualifikasi(id_kualifikasi_tender) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('paket/delete_kualifikasi/') ?>" + id_kualifikasi_tender,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    reload_kualifikasi();
                    message('success', 'Dokumen Berhasil Di Delete');
                }
            }
        })
    }
</script>

<script>
    var form_data_tender = $('#form_data_tender');

    function SimpanPaketTender() {
        var id_paket = $('#id_paketkusaja').val();
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/simpan_tender/'); ?>' + id_paket,
            data: form_data_tender.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    form_data_tender[0].reset();
                    message('success', 'Paket Berhasil Di Umumkan');
                    setTimeout(() => {
                        location.replace('<?= base_url('paket/daftar_paket') ?>')
                    }, 3000);
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>

<script>
    var tbl_informasi_tender = $('#tbl_informasi_tender');

    function reload_informasi_tender() {
        tbl_informasi_tender.DataTable().ajax.reload();
    }
    $(document).ready(function() {
        tbl_informasi_tender.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/get_datatable_informasi_tender') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });
</script>


<script>
    var table_persyartan_vendor = $('#table_persyartan_vendor');
    var id_paket = $('#id_paketkusaja').val();

    function reload_informasi_tender() {
        table_persyartan_vendor.DataTable().ajax.reload();
    }
    $(document).ready(function() {
        table_persyartan_vendor.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/get_datatable_syarat_vendor/') ?>" + id_paket,
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });

    var table_promosi = $('#table_promosi');

    function reload_informasi_tender() {
        table_promosi.DataTable().ajax.reload();
    }
    $(document).ready(function() {
        table_promosi.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/get_table_promosi/') ?>" + id_paket,
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
            }
        });
    });

    function by_id_vendor(id, type) {
        var id_paket = $('#id_paketkusaja').val();
        var modal_syarat_vendor = $('#modal_syarat_vendor');
        var modal_promosi = $('#modal_promosi');
        if (type == 'lihat_syarat') {
            saveData = 'lihat_syarat';
        }
        $.ajax({
            type: "POST",
            url: "<?= base_url('paket/by_id_vendor/'); ?>" + id,
            data: {
                id_paket: id_paket
            },
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat_syarat') {
                    modal_syarat_vendor.modal('show');
                    var id_vendor = response['get_vendor'].id_vendor_mengikuti;
                    var id_paket_syarat = response['get_vendor'].id_paket_mengikuti;
                    $('#nama_vendor').text(response['get_vendor'].username_vendor)
                    var tbl_syarat_vendor = $('#tbl_syarat_vendor');
                    $(document).ready(function() {
                        tbl_syarat_vendor.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('paket/get_dokumen_syarat_vendor') ?>",
                                "type": "POST",
                                data: {
                                    id_paket_syarat: id_paket_syarat,
                                    id_vendor: id_vendor
                                },
                            },
                            "columnDefs": [{
                                "target": [-1],
                                "orderable": false
                            }],
                            "oLanguage": {
                                "sSearch": "Pencarian : ",
                                "sEmptyTable": "Data Tidak Tersedia",
                                "sLoadingRecords": "Silahkan Tunggu - loading...",
                                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
                            }
                        });
                    });
                } else {
                    modal_promosi.modal('show');
                    var id_vendor = response['get_vendor'].id_vendor_mengikuti;
                    var id_paket_syarat = response['get_vendor'].id_paket_mengikuti;
                    $('#nama_vendor_promosi').text(response['get_vendor'].username_vendor)
                    var tbl_detail_promosi = $('#tbl_detail_promosi');
                    $(document).ready(function() {
                        tbl_detail_promosi.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('paket/get_dokumen_video_promosi') ?>",
                                "type": "POST",
                                data: {
                                    id_paket_syarat: id_paket_syarat,
                                    id_vendor: id_vendor
                                },
                            },
                            "columnDefs": [{
                                "target": [-1],
                                "orderable": false
                            }],
                            "oLanguage": {
                                "sSearch": "Pencarian : ",
                                "sEmptyTable": "Data Tidak Tersedia",
                                "sLoadingRecords": "Silahkan Tunggu - loading...",
                                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
                            }
                        });
                    });
                }
            }
        })
    }


    function cek_syarat(id, type) {
        if (type == 'cek_syarat') {
            saveData = 'cek_syarat';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('paket/cek_syarat_dokumen/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Cek');
                    location.reload()
                }
            }
        })
    }

    function cek_promosi(id, type) {
        if (type == 'cek_promosi') {
            saveData = 'cek_promosi';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('paket/cek_promosi_dokumen/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Cek');
                    location.reload()
                }
            }
        })
    }
</script>

<script>
    function lihat_vendor(id_paket) {
        var tbl_vendor = $('#tbl_vendor');
        var modal_vendor = $('#modal_vendor');
        modal_vendor.modal('show');
        $(document).ready(function() {
            tbl_vendor.DataTable({
                "responsive": true,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "bDestroy": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('paket/get_peserta_tender/') ?>" + id_paket,
                    "type": "POST"
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                "oLanguage": {
                    "sSearch": "Pencarian : ",
                    "sEmptyTable": "Data Tidak Tersedia",
                    "sLoadingRecords": "Silahkan Tunggu - loading...",
                    "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                    "sZeroRecords": "Tidak Ada Lokasi Kerja Yang Di Cari",
                }
            });
        });
    }

    var form_nilai_persyaratan = $('#form_nilai_persyaratan');

    function Simpan_penilaian() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('evaluasi/nilai_persyartan'); ?>',
            data: form_nilai_persyaratan.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    form_nilai_persyaratan[0].reset();
                    message('success', 'Berhasil Melakukan Penilaian');
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }


    var form_nilai_promosi = $('#form_nilai_promosi');

    function Simpan_promosi() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('evaluasi/nilai_promosi'); ?>',
            data: form_nilai_promosi.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    form_nilai_promosi[0].reset();
                    message('success', 'Berhasil Melakukan Penilaian');
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }


    var form_nilai_penawaran = $('#form_nilai_penawaran');

    function Simpan_penawaran() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('evaluasi/nilai_penawaran'); ?>',
            data: form_nilai_penawaran.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    form_nilai_penawaran[0].reset();
                    message('success', 'Berhasil Melakukan Penilaian');
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    var form_nilai_tenaga_ahli = $('#form_nilai_tenaga_ahli');

    function Simpan_tenaga() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('evaluasi/nilai_tenaga_ahli'); ?>',
            data: form_nilai_tenaga_ahli.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    form_nilai_tenaga_ahli[0].reset();
                    message('success', 'Berhasil Melakukan Penilaian');
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    var form_nilai_pengalaman = $('#form_nilai_pengalaman');

    function Simpan_pengalaman() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('evaluasi/nilai_pengalaman'); ?>',
            data: form_nilai_pengalaman.serialize(),
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    form_nilai_pengalaman[0].reset();
                    message('success', 'Berhasil Melakukan Penilaian');
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>

<script>
    function message(icon, text) {
        swal({
            title: "success!!!",
            text: text,
            icon: icon,
        });
    }

    function warningku(icon, text) {
        swal({
            title: "Maaf!!!",
            text: text,
            icon: icon,
        });
    }

    var form_dokumen_undangan = $('#form_dokumen_undangan');
    form_dokumen_undangan.on('submit', function(e) {
        e.preventDefault();
        var id_paket = $('#id_paket').val();
        if ($('.file_dokumen').val() == '') {
            $('#error_file_tender').show();
            setTimeout(function() {
                $('#error_file_tender').hide();
            }, 4000);
        } else if ($('.nama_dokuken').val() == '') {
            $('#error_nama_file').show();
            setTimeout(function() {
                $('#error_nama_file').hide();
            }, 4000);

        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>evaluasi/upload_undangan/" + id_paket,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_tender').attr('disabled', 'disabled');
                    $('#process_tender').css('display', 'block');
                    $('#sedang_dikirim_tender').show();
                },
                success: function(response) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process_undangan(percentage, timer);
                    }, 1000);
                }
            });
        }
    });

    function progress_bar_process_undangan(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#form_dokumen_undangan')[0].reset();
            $('#process_tender').css('display', 'none');
            $('#sedang_dikirim_tender').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_tender').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            location.reload();
        }
    }



    function Tender_selesai(id) {
        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/tender_selesai/'); ?>' + id,
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Tender Ini Telah Selesai');
                    location.reload()
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>

<script>
    var formData = $('#formData');

    function save() {

        $.ajax({
            method: "POST",
            url: '<?= base_url('paket/save'); ?>',
            data: formData.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                // $('#simpan_rup_paket_new').attr('disabled', 'disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    formData[0].reset();
                    message('success', 'Data Berhasil Di Tambah')
                    // $('#simpan_rup_paket_new').attr('disabled', false);
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }
</script>