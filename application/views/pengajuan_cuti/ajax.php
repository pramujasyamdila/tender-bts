<script>
    function warningku(icon, text) {
        swal({
            title: "Maaf!!!",
            text: text,
            icon: icon,
        });
    }

    function message(icon, text) {
        swal({
            title: "success!!!",
            text: text,
            icon: icon,
        });
    }

    function cek_cuti() {
        var mulai_cuti = new Date($('[name="mulai_cuti"]').val());
        var selesai_cuti = new Date($('[name="selesai_cuti"]').val());
        if (mulai_cuti.getTime() > selesai_cuti.getTime()) {
            warningku('warning', 'Hari Cuti Tidak Valid');
            $('[name="hasil_cuti_manipulasi"]').val('');
            $('[name="hasil_cuti"]').val('');
        } else {
            var days = daysdifference(mulai_cuti, selesai_cuti);
            $('[name="hasil_cuti_manipulasi"]').val(days + ' Hari');
            $('[name="hasil_cuti"]').val(days);
        }
    }

    function daysdifference(firstDate, secondDate) {

        var startDay = new Date(firstDate);
        var endDay = new Date(secondDate);


        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / (1000 * 3600 * 24);
        return Math.round(Math.abs(days));

    }

    function pilih_jenis_cuti() {
        var set_cuti = $('[type="radio"]:checked').val();
        $('[name="cuti_value"]').val(set_cuti);
    }

    function pilih_persetujuan() {
        var status_persetujuan = $('[type="radio"]:checked').val();
        if (status_persetujuan == 'PERUBAHAN') {
            $('.alasan').css("display", "block")
            $('[name="status_persetujuanku"]').val(status_persetujuan);
        } else if (status_persetujuan == 'DITANGGUHKAN') {
            $('.alasan').css("display", "block")
            $('[name="status_persetujuanku"]').val(status_persetujuan);
        } else if (status_persetujuan == 'TIDAK DISETUJUI') {
            $('.alasan').css("display", "block")
            $('[name="status_persetujuanku"]').val(status_persetujuan);
        } else {
            $('[name="status_persetujuanku"]').val(status_persetujuan);
            $('[name="alasan_pertimbangan_atasan"]').val('');
            $('.alasan').css("display", "none")
        }
    }




    var form_pengajuan_cuti = $('#form_pengajuan_cuti');

    function simpan_pengajuan() {
        $.ajax({
            type: "POST",
            data: form_pengajuan_cuti.serialize(),
            url: "<?= base_url('pengajuan_cuti/ajukan_cuti') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Mengajukan Cuti');
                    form_pengajuan_cuti[0].reset()
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

<script>
    var modelId = $('#modelId');
    var tbl_proses_cuti = $('#tbl_proses_cuti');
    $(document).ready(function() {
        tbl_proses_cuti.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('pengajuan_cuti/data_get_proses_cuti') ?>",
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

    function by_id(id, data) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('pengajuan_cuti/by_id_pengajuan_cuti/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (data == 'edit') {
                    $('#modelId').modal('show');
                    $(".modal-title").html("Edit Data");
                    $('[name="id_pegawai"]').val(response['pengajuan'].id_pegawai);
                    $('[name="id_pengajuan_cuti"]').val(response['pengajuan'].id_pengajuan_cuti);
                    $('[name="nama_pegawai"]').val(response['pengajuan'].nama_pegawai);
                    $('[name="nip"]').val(response['pengajuan'].nip);
                    $('[name="jabatan"]').val(response['pengajuan'].jabatan);
                    $('[name="email"]').val(response['pengajuan'].email);
                    $('[name="alamat"]').val(response['pengajuan'].alamat);
                    $('[name="telepon"]').val(response['pengajuan'].telepon);
                    $('[name="tahun_kerja"]').val(response['pengajuan'].tahun_kerja);
                    $('[name="bulan_kerja"]').val(response['pengajuan'].bulan_kerja);
                    $('input[name="jenis_cuti"][value="' + response['pengajuan'].jenis_cuti + '"]').attr('checked', true);
                    $('[name="cuti_value"]').val(response['pengajuan'].jenis_cuti);
                    $('[name="alasan_cuti"]').val(response['pengajuan'].alasan_cuti);
                    $('[name="hasil_cuti"]').val(response['pengajuan'].hasil_cuti);
                    $('[name="hasil_cuti_manipulasi"]').val(response['pengajuan'].hasil_cuti + ' Hari');
                    $('[name="mulai_cuti"]').val(response['pengajuan'].mulai_cuti);
                    $('[name="selesai_cuti"]').val(response['pengajuan'].selesai_cuti);
                    $('[name="alamat_selama_cuti"]').val(response['pengajuan'].alamat_selama_cuti);
                    $('[name="id_pegawai_atasan"]').val(response['pengajuan'].id_pegawai_atasan);
                    $('[name="id_pegawai_kepala_kantor"]').val(response['pengajuan'].id_pegawai_kepala_kantor);
                } else if (data == 'lihat_prosess') {
                    location.replace('<?= base_url('pengajuan_cuti/lihat_prosess_cuti/') ?>' + response['pengajuan'].id_pengajuan_cuti)
                } else if (data == 'setujui_kepala') {
                    $('#modal_persetujuan').modal('show');
                    $('[name="id_pengajuan_cuti"]').val(response['pengajuan'].id_pengajuan_cuti);
                } else if (data == 'cetak') {
                    location.replace('<?= base_url('pengajuan_cuti/cetak/') ?>' + response['pengajuan'].id_pengajuan_cuti)
                } else {
                    deleteQuestion(response['pengajuan'].id_pengajuan_cuti, response['pengajuan'].nama_pegawai)
                }
            }
        })
    }

    function udpate_pengajuan() {
        $.ajax({
            type: "POST",
            data: form_pengajuan_cuti.serialize(),
            url: "<?= base_url('pengajuan_cuti/kirim_ulang_pengajuan') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Mengajukan Cuti Ulang');
                    $('#modelId').modal('hide');
                    form_pengajuan_cuti[0].reset()
                } else {

                }
            }
        })
    }

    var tbl_proses_cuti2 = $('#tbl_proses_cuti2');
    $(document).ready(function() {
        tbl_proses_cuti2.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('pengajuan_cuti/data_get_proses_cuti2') ?>",
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


    function persetujuan() {
        var form_approvel = $('#form_approvel');
        $.ajax({
            type: "POST",
            data: form_approvel.serialize(),
            url: "<?= base_url('pengajuan_cuti/approval') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil Melakukan Persetujuan');
                    $('#modelId').modal('hide');
                    form_approvel[0].reset()
                } else {

                }
            }
        })
    }
</script>