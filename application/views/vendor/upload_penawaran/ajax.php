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
    var table_rincian_hps = $('#rincian_hps_tbl');
    var formDataHps = $('#formDataHps');
    var modalhps = $('#modalDataRincianHps');

    function relodTableRincianHps() {
        table_rincian_hps.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_paket = $('#id_paket').val();
        table_rincian_hps.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "info": false,
            "order": [],
            "ajax": {
                "url": "<?= base_url('paket/data_get_rincian_hps/') ?>" + id_paket,
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
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            },
        });
        // $('#test').html(url);
    });
</script>
<script>
    var table_rincian_hps_vendor = $('#rincian_hps_tbl_vendor');
    var formDataHps = $('#formDataHps');
    var modalhps = $('#modalDataRincianHps');

    function relodTableRincianHps_vendor() {
        table_rincian_hps_vendor.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        var id_paket = $('#id_paket').val();
        table_rincian_hps_vendor.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "info": false,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/tender_diikuti/data_get_rincian_hps_vendor/') ?>" + id_paket,
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
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
            },
        });
        // $('#test').html(url);
    });


    function save_rincian_hps() {
        $.ajax({
            method: "POST",
            url: url = "<?= base_url('vendor/tender_diikuti/add_rincian_hps'); ?>",
            data: formDataHps.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modalhps.modal('hide');
                    relodTableRincianHps_vendor();
                    formDataHps[0].reset();
                    message('success', 'Data Berhasil Di Tambah')

                } else {
                    $(".deskripsi_vendor-error").html(response.deskripsi_vendor);
                    $(".jumlah_vendor-error").html(response.jumlah_vendor);
                    $(".ppn_vendor-error").html(response.ppn_vendor);
                    $(".harga_rincian_hps_vendor-error").html(response.harga_rincian_hps_vendor);
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }


    function edit_rincian_hps() {
        $.ajax({
            method: "POST",
            url: url = "<?= base_url('vendor/tender_diikuti/edit_rincian_hps'); ?>",
            data: formDataHps.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modalhps.modal('hide');
                    relodTableRincianHps_vendor();
                    formDataHps[0].reset();
                    message('success', 'Data Berhasil Di Tambah')
                } else {
                    $(".deskripsi_vendor-error").html(response.deskripsi_vendor);
                    $(".jumlah_vendor-error").html(response.jumlah_vendor);
                    $(".ppn_vendor-error").html(response.ppn_vendor);
                    $(".harga_rincian_hps_vendor-error").html(response.harga_rincian_hps_vendor);
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function byidRincianHps_vendor(id, data) {
        var modalhps = $('#modalDataRincianHps');
        $.ajax({
            type: "POST",
            url: "<?= base_url('vendor/tender_diikuti/byRincianHps_vendor/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (data == 'editRincianHps') {
                    $('#btnSave').css("display", "none");
                    $('#btnEdit').css("display", "block");
                    modalhps.modal('show');
                    $(".modal-title").html("Edit Data");
                    $('[name="id_rincian_hps_vendor"]').val(response['get_rincian_paket'].id_rincian_hps_vendor);
                    $('[name="deskripsi_vendor"]').val(response['get_rincian_paket'].deskripsi_vendor);
                    $('[name="jumlah_vendor"]').val(response['get_rincian_paket'].jumlah_vendor);
                    $('[name="ppn_vendor"]').val(response['get_rincian_paket'].ppn_vendor);
                    $('[name="harga_rincian_hps_vendor"]').val(response['get_rincian_paket'].harga_rincian_hps_vendor);
                } else {
                    deleteQuestion(response['get_rincian_paket'].id_rincian_hps_vendor, response['get_rincian_paket'].deskripsi_vendor)
                }
            }
        })
    }
    // HAPUS DATA
    function deleteQuestion(id_rincian_hps_vendor, deskripsi_vendor) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Data   " + deskripsi_vendor + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    delete_hps(id_rincian_hps_vendor);
                } else {
                    message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
                }
            });
    }

    function delete_hps(id_rincian_hps_vendor) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('vendor/tender_diikuti/delete_rincian_hps_vendor/') ?>" + id_rincian_hps_vendor,
            dataType: "JSON",
            success: function(response) {
                relodTableRincianHps_vendor();
                message('success', 'Data Berhasil Di Hapus')
            }
        })
    }

    $(modalhps).on("hidden.bs.modal", () => {
        formDataHps[0].reset();
        $('#btnSave').css("display", "block");
        $('#btnEdit').css("display", "none");
        $(".deskripsi_vendor-error").html('');
        $(".jumlah_vendor-error").html('');
        $(".ppn_vendor-error").html('');
        $(".harga_rincian_hps_vendor-error").html('');
    });
</script>

<script>
    $("#harga_rincian_hps_vendor2").keyup(function() {
        var harga = $("#harga_rincian_hps_vendor2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>