<script>
    var tbl_pengalaman = $('#tbl_pengalaman');

    function reload_table() {
        tbl_pengalaman.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tbl_pengalaman.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/pengalaman/data_get_pengalaman') ?>",
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
                "sZeroRecords": "Tidak Ada DataYang Di Cari",
            },
        });

    });

    var modelId = $('#modelId');

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
    var form_tambah_pengalaman = $('#form_tambah_pengalaman');
    form_tambah_pengalaman.on('submit', function(e) {
        e.preventDefault();
        if ($('.bukti_pengalaman').val() == '') {
            $('#error_bukti_pengalaman').show();
            setTimeout(function() {
                $('#error_bukti_pengalaman').hide();
            }, 4000);
        } else if ($('.nama_pekerjaan').val() == '') {
            $('#error_nama_pekerjaan').show();
            setTimeout(function() {
                $('#error_nama_pekerjaan').hide();
            }, 4000);

        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>vendor/pengalaman/tambah_pengalaman",
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
            $('#form_tambah_pengalaman')[0].reset();
            $('#process_tender').css('display', 'none');
            $('#sedang_dikirim_tender').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_tender').attr('disabled', false);
            modelId.modal('hide')
            message('success', 'Pengalaman Berhasil Di Upload');
            reload_table()
        }
    }
</script>