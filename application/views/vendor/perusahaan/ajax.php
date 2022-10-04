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


    var form_perusahaan = $('#form_perusahaan');

    function Simpan_perusahaan() {
        $.ajax({
            type: "POST",
            data: form_perusahaan.serialize(),
            url: "<?= base_url('vendor/perusahaan/tambah') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Mengupdate Data Perusahaan');
                    location.reload()
                } else {}
            }
        })
    }
</script>