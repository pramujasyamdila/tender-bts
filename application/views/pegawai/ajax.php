<script>
    var tbl_pegawai = $('#tbl_pegawai');
    var modal = $('#modelId');
    var form_tambah_pegawai = $('#form_tambah_pegawai');

    function reload_table() {
        tbl_pegawai.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tbl_pegawai.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('pegawai/data_get_pegawai') ?>",
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


    var form_tambah_pegawai = $('#form_tambah_pegawai');

    function Tambah_pegawai() {
        $.ajax({
            type: "POST",
            data: form_tambah_pegawai.serialize(),
            url: "<?= base_url('pegawai/tambah_pegawai') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Menambah Pegawai');
                    form_tambah_pegawai[0].reset()
                    reload_table();
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


    function tidak_aktivasi(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pegawai/tidak_aktivasi/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Non Aktivasi Pegawai');
                    reload_table();
                } else {}
            }
        })
    }


    function by_id(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pegawai/by_id_pegawai/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (data == 'edit') {
                    $('#save').css("display", "none");
                    $('#edit').css("display", "block");
                    modal.modal('show');
                    $(".modal-title").html("Edit Data");
                    $('[name="id_pegawai"]').val(response['pegawai'].id_pegawai);
                    $('[name="nama_pegawai"]').val(response['pegawai'].nama_pegawai);
                    $('[name="nip"]').val(response['pegawai'].nip);
                    $('[name="jabatan"]').val(response['pegawai'].jabatan);
                    $('[name="email"]').val(response['pegawai'].email);
                    $('[name="alamat"]').val(response['pegawai'].alamat);
                    $('[name="telepon"]').val(response['pegawai'].telepon);
                    $('[name="tahun_kerja"]').val(response['pegawai'].tahun_kerja);
                    $('[name="bulan_kerja"]').val(response['pegawai'].bulan_kerja);
                    $('[name="username"]').val(response['pegawai'].username);
                    $('[name="role"]').val(response['pegawai'].role);
                } else {
                    deleteQuestion(response['pegawai'].id_pegawai, response['pegawai'].nama_pegawai)
                }
            }
        })
    }

    $(modal).on("hidden.bs.modal", () => {
        $('#save').css("display", "block");
        $('#edit').css("display", "none");
    });


    function Edit_pegawai() {
        $.ajax({
            method: "POST",
            url: '<?= base_url('pegawai/edit'); ?>',
            data: form_tambah_pegawai.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    form_tambah_pegawai[0].reset();
                    message('success', 'Data Berhasil Di Edit')
                    reload_table();
                    modal.modal('hide');
                }
            },
            error: function() {
                console.log(error);
            }
        })
    }

    function deleteQuestion(id_pegawai, nama_pegawai) {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Menghapus Data   " + nama_pegawai + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    deleteDatanya(id_pegawai);
                } else {
                    message('success', 'Data Tidak Jadi Di Hapus, Data Kamu Aman!!')
                }
            });
    }

    function deleteDatanya(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pegawai/hapus/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Hapus Pegawai');
                    reload_table();
                } else {}
            }
        })
    }

    function aktivasi(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pegawai/aktivasi/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Aktivasi Pegawai');
                    reload_table();
                } else {}
            }
        })
    }





    var tbl_pengajuan = $('#tbl_pengajuan');

    function reload_rup_pengajuan() {
        tbl_pengajuan.DataTable().ajax.reload();
    }

    // GET DATA LOKASI PEKERJAAN 
    $(document).ready(function() {
        tbl_pengajuan.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('pegawai/getdata_table_pengajuan') ?>",
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
                "sZeroRecords": "Data Not Found",
            }
        });
    });

    function setujui(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pegawai/setujui_pengajuan/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Setujui Pengajuan');
                    reload_rup_pengajuan();
                } else {}
            }
        })
    }

    function batal_setujui(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pegawai/tolak_pengajuan/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Tolak Pengajuan');
                    reload_rup_pengajuan();
                } else {}
            }
        })
    }

    var form_pengajuan = $('#form_pengajuan');

    function Kirim_pengajuan() {
        swal({
                title: "Apakah Anda Yakin!! ?",
                text: "Ingin Membuat Pengajuan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: form_pengajuan.serialize(),
                        url: "<?= base_url('landing/kirim_pengajuan') ?>",
                        dataType: "JSON",
                        success: function(response) {
                            if (response == 'success') {
                                message('success', 'Berhasil Membuat Pengajuan');
                                form_pengajuan[0].reset()
                                reload_rup_pengajuan()
                            } else {}
                        }
                    })
                } else {
                    message('success', 'Pengajuan Di Batalkan!!');
                    form_pengajuan[0].reset()
                    reload_rup_pengajuan()
                }
            });
    }
</script>