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

    var table_tender_vendor = $('#table_tender_vendor');

    function reload_vendor_syarat() {
        table_tender_vendor.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_paket = $('#id_paketkusaja').val();
        table_tender_vendor.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/tender_diikuti/getdatatable_persyaratan_vendor/') ?>" + id_paket,
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




    var form_dokumen_persyaratan_vendor = $('#form_dokumen_persyaratan_vendor');
    form_dokumen_persyaratan_vendor.on('submit', function(e) {
        e.preventDefault();
        var id_paket = $('#id_paketkusaja').val();
        if ($('.file_dokumen').val() == '') {
            $('#error_file_persyartan_vendor').show();
            setTimeout(function() {
                $('#error_file_persyartan_vendor').hide();
            }, 4000);
        } else if ($('.nama_dokuken').val() == '') {
            $('#error_nama_file').show();
            setTimeout(function() {
                $('#error_nama_file').hide();
            }, 4000);

        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>vendor/tender_diikuti/upload_dokumen_persyaratan/" + id_paket,
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
            $('#form_dokumen_persyaratan_vendor')[0].reset();
            $('#process_tender').css('display', 'none');
            $('#sedang_dikirim_tender').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_tender').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            reload_vendor_syarat()
        }
    }

    function by_id_persyartaan_vendor(id, type) {
        if (type == 'hapus_pengadaan') {
            saveData = 'hapus_pengadaan';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('vendor/tender_diikuti/by_id_persyartaan_vendor/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'hapus_pengadaan') {
                    Question_delete_dokumen_pengadaan(response['get_dokumen'].id_dokumen_syarat_vendor, response['get_dokumen'].nama_dokumen);
                }
            }
        })
    }

    // HAPUS DATA 
    function Question_delete_dokumen_pengadaan(id_dokumen_syarat_vendor, nama_dokumen) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Dokumen " + nama_dokumen + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    delete_dokumen_pengadaan(id_dokumen_syarat_vendor);
                } else {
                    message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
                }
            });
    }

    function delete_dokumen_pengadaan(id_dokumen_syarat_vendor) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('vendor/tender_diikuti/delete_dokumen_pengadaan/') ?>" + id_dokumen_syarat_vendor,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    reload_vendor_syarat();
                    message('success', 'Dokumen Berhasil Di Delete');
                }
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

    var table_tender_vendor_promosi = $('#table_tender_vendor_promosi');

    function reload_vendor_promosi() {
        table_tender_vendor_promosi.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_paket = $('#id_paketkusaja').val();
        table_tender_vendor_promosi.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/tender_diikuti/getdatatable_promosi_vendor/') ?>" + id_paket,
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




    var form_dokumen_promosi_vendor = $('#form_dokumen_promosi_vendor');
    form_dokumen_promosi_vendor.on('submit', function(e) {
        e.preventDefault();
        var id_paket = $('#id_paketkusaja').val();
        if ($('.file_dokumen_promosi').val() == '') {
            $('#error_file_promosi_vendor').show();
            setTimeout(function() {
                $('#error_file_promosi_vendor').hide();
            }, 4000);
        } else if ($('.nama_dokuken_promosi').val() == '') {
            $('#error_nama_file_promosi').show();
            setTimeout(function() {
                $('#error_nama_file_promosi').hide();
            }, 4000);

        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>vendor/tender_diikuti/upload_dokumen_promosi/" + id_paket,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_tender_promosi').attr('disabled', 'disabled');
                    $('#process_tender_promosi').css('display', 'block');
                    $('#sedang_dikirim_tender_promosi').show();
                },
                success: function(response) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process_tender_promosi(percentage, timer);
                    }, 1000);
                }
            });
        }
    });

    function progress_bar_process_tender_promosi(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#form_dokumen_promosi_vendor')[0].reset();
            $('#process_tender_promosi').css('display', 'none');
            $('#sedang_dikirim_tender_promosi').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_tender_promosi').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            reload_vendor_promosi()
        }
    }

    function by_id_vendor_promosi(id, type) {
        if (type == 'hapus_promosi') {
            saveData = 'hapus_promosi';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('vendor/tender_diikuti/by_id_vendor_promosi/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'hapus_promosi') {
                    Question_delete_dokumen_pengadaan_promosi(response['get_dokumen'].id_promosi, response['get_dokumen'].nama_dokumen_promosi);
                }
            }
        })
    }

    // HAPUS DATA 
    function Question_delete_dokumen_pengadaan_promosi(id_promosi, nama_dokumen_promosi) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Dokumen " + nama_dokumen_promosi + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    delete_dokumen_promosi(id_promosi);
                } else {
                    message('success', 'Dokumen Tidak Jadi Di Hapus, Dokumen Aman!!')
                }
            });
    }

    function delete_dokumen_promosi(id_promosi) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('vendor/tender_diikuti/delete_dokumen_promosi/') ?>" + id_promosi,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    reload_vendor_promosi();
                    message('success', 'Dokumen Berhasil Di Delete');
                }
            }
        })
    }
</script>