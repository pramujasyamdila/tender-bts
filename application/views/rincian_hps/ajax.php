<script>
    $("#harga_rincian_hps2").keyup(function() {
        var harga = $("#harga_rincian_hps2").val();
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
    // buat rincian hps
    // GET RINCIAN HPSNYA
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

    function save_rincian_hps() {
        $.ajax({
            method: "POST",
            url: url = "<?= base_url('paket/add_rincian_hps'); ?>",
            data: formDataHps.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modalhps.modal('hide');
                    relodTableRincianHps();
                    formDataHps[0].reset();
                    message('success', 'Data Berhasil Di Tambah')

                } else {
                    $(".deskripsi-error").html(response.deskripsi);
                    $(".jumlah-error").html(response.jumlah);
                    $(".ppn-error").html(response.ppn);
                    $(".harga_rincian_hps-error").html(response.harga_rincian_hps);
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
            url: url = "<?= base_url('paket/edit_rincian_hps'); ?>",
            data: formDataHps.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modalhps.modal('hide');
                    relodTableRincianHps();
                    formDataHps[0].reset();
                    message('success', 'Data Berhasil Di Tambah')
                } else {
                    $(".deskripsi-error").html(response.deskripsi);
                    $(".jumlah-error").html(response.jumlah);
                    $(".ppn-error").html(response.ppn);
                    $(".harga_rincian_hps-error").html(response.harga_rincian_hps);
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function byidRincianHps(id, data) {
        var modalhps = $('#modalDataRincianHps');
        $.ajax({
            type: "POST",
            url: "<?= base_url('paket/byRincianHps/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (data == 'editRincianHps') {
                    $('#btnSave').css("display", "none");
                    $('#btnEdit').css("display", "block");
                    modalhps.modal('show');
                    $(".modal-title").html("Edit Data");
                    $('[name="id_rincian_hps"]').val(response['get_rincian_paket'].id_rincian_hps);
                    $('[name="deskripsi"]').val(response['get_rincian_paket'].deskripsi);
                    $('[name="jumlah"]').val(response['get_rincian_paket'].jumlah);
                    $('[name="ppn"]').val(response['get_rincian_paket'].ppn);
                    $('[name="harga_rincian_hps"]').val(response['get_rincian_paket'].harga_rincian_hps);
                } else {
                    deleteQuestion(response['get_rincian_paket'].id_rincian_hps, response['get_rincian_paket'].deskripsi)
                }
            }
        })
    }
    // HAPUS DATA
    function deleteQuestion(id_rincian_hps, deskripsi) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Data   " + deskripsi + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    delete_hps(id_rincian_hps);
                } else {
                    message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
                }
            });
    }

    function delete_hps(id_rincian_hps) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('paket/delete_rincian_hps/') ?>" + id_rincian_hps,
            dataType: "JSON",
            success: function(response) {
                relodTableRincianHps();
                message('success', 'Data Berhasil Di Hapus')
            }
        })
    }

    $(modalhps).on("hidden.bs.modal", () => {
        formDataHps[0].reset();
        $('#btnSave').css("display", "block");
        $('#btnEdit').css("display", "none");
        $(".deskripsi-error").html('');
        $(".jumlah-error").html('');
        $(".ppn-error").html('');
        $(".harga_rincian_hps-error").html('');
    });
</script>