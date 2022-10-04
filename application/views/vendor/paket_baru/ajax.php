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
    var tbl_tender = $('#tbl_tender');

    function reload_kualifikasi() {
        tbl_tender.DataTable().ajax.reload();
    }
    // GET DATA LOKASI PEKERJAAN 
    $(document).ready(function() {
        tbl_tender.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/paket_baru/getdata_tender') ?>",
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
    var modal = $('#modal_tender');

    function byid(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('vendor/paket_baru/by_id_paket/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (data == 'ikuti_tender') {
                    modal.modal('show');
                    $(".modal-title").html("Ikuti Tender");
                    $('[name="id_paket"]').val(response['paket'].id_paket);
                    $('[name="nama_paket"]').val(response['paket'].nama_paket);
                    $('[name="kode_tender_random"]').val(response['paket'].kode_tender_random);
                    $('[name="hps_total"]').val(response['paket'].hps_total);
                    $('[name="lokasi_pekerjaan"]').val(response['paket'].lokasi_pekerjaan);
                    $('[name="program_paket"]').val(response['paket'].program_paket);
                    $('[name="kualifikasi_usaha"]').val(response['paket'].kualifikasi_usaha);
                    if (response['cek_mengikuti']) {
                        $('.sudah_di_ikuti').css("display", "block")
                        $('.belum_di_ikuti').css("display", "none")
                    } else {
                        $('.sudah_di_ikuti').css("display", "none")
                        $('.belum_di_ikuti').css("display", "block")
                    }
                } else {
                    // deleteQuestion(response['paket'].id_pegawai, response['paket'].nama_pegawai)
                }
            }
        })
    }

    var form_ikuti_paket = $('#form_ikuti_paket');

    function ikuti_paket() {
        var modal = $('#modal_tender');
        $.ajax({
            type: "POST",
            data: form_ikuti_paket.serialize(),
            url: "<?= base_url('vendor/paket_baru/ikuti_paket') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Menambah Pegawai');
                    form_ikuti_paket[0].reset()
                    reload_kualifikasi();
                    modal.modal('hide');
                } else {
                    // $(".eror_password2").html(response.password2);
                    // $(".eror_password").html(response.password);
                    // $(".eror_username").html(response.username);
                    // $(".eror_nama_pegawai").html(response.nama_pegawai);
                    // $(".eror_email").html(response.email);
                    // $(".eror_nip").html(response.nip);
                }
            }
        })
    }
</script>