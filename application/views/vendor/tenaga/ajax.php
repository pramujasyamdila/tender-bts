<script>
    var tbl_tenaga_ahli = $('#tbl_tenaga_ahli');

    function reload_table() {
        tbl_tenaga_ahli.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tbl_tenaga_ahli.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/tenaga/data_get_tenaga') ?>",
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
    var form_tambah_tenaga = $('#form_tambah_tenaga');
    form_tambah_tenaga.on('submit', function(e) {
        e.preventDefault();
        if ($('.bukti_tenaga_ahli').val() == '') {
            $('#error_bukti_tenaga_ahli').show();
            setTimeout(function() {
                $('#error_bukti_tenaga_ahli').hide();
            }, 4000);
        } else if ($('.nama_tenaga_ahli').val() == '') {
            $('#error_nama_tenaga_ahli').show();
            setTimeout(function() {
                $('#error_nama_tenaga_ahli').hide();
            }, 4000);

        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>vendor/tenaga/tambah_tenaga",
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
            $('#form_tambah_tenaga')[0].reset();
            $('#process_tender').css('display', 'none');
            $('#sedang_dikirim_tender').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_tender').attr('disabled', false);
            modelId.modal('hide')
            message('success', 'Tenaga Ahli Berhasil Di Upload');
            reload_table()
        }
    }
</script>