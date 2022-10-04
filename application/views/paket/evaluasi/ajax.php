<script>
    var tbl_vendor = $('#tbl_vendor');

    function reload_informasi_tender() {
        tbl_vendor.DataTable().ajax.reload();
    }
    $(document).ready(function() {
        tbl_vendor.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('evaluasi/get_vendor/') ?>" + <?= $angga['id_paket'] ?>,
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

    var tbl_vendor_pemilihan = $('#tbl_vendor_pemilihan');

    function reload_vendor_pemanang() {
        tbl_vendor_pemilihan.DataTable().ajax.reload();
    }
    $(document).ready(function() {
        tbl_vendor_pemilihan.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('evaluasi/get_vendor_pemenang/') ?>" + <?= $angga['id_paket'] ?>,
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

    function pemenang(id, type) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('evaluasi/tunjuk_pemanang/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Memilih Pemenang');
                    reload_vendor_pemanang();
                }
            }
        })
    }
</script>