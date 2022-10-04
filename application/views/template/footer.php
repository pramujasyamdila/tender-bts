      <footer class="main-footer">
          <div class="footer-left">
              Copyright &copy; 2022 <div class="bullet"></div> By <a href="https://kintekindo.net/">Kereatif Intelegensi Teknologi</a>
          </div>
          <div class="footer-right">

          </div>
      </footer>
      </div>
      </div>

      <!-- General JS Scripts -->
      <script src="<?= base_url('assets/js') ?>/jquery.min.js" media="all"></script>

      <script media="all" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script media="all" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script media="all" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
      <script media="all" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/stisla.js"></script>

      <!-- JS Libraies -->
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/datatable/datatables.min.js"></script>
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/datatable/dataTables.bootstrap4.min.js"></script>
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/datatable/dataTables.select.min.js"></script>
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/datatable/jquery-ui.min.js"></script>
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/datatable/modules-datatables.js"></script>

      <!-- Template JS File -->
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/scripts.js"></script>
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/custom.js"></script>
      <!-- JS Libraies -->
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/node_modules/chart.js/dist/Chart.min.js"></script>
      <!-- Page Specific JS File -->
      <script media="all" src="<?= base_url('assets/stisla_master') ?>/assets/js/page/modules-chartjs.js"></script>
      <!-- Page Specific JS File -->
      <script media="all" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <!-- dataTables -->

      <script>
          $(document).ready(function() {
              $('.select2').select2();
          });
      </script>
      <script>
          function lihat_dokumen(id) {
              location.replace('<?= base_url('dokumen/paket/list_paket/') ?>' + id)
          }

          function lihat_dokumen_vendor(id_paket, id_vendor) {
              location.replace('<?= base_url('dokumen/paket/list_dokumen_vendor/') ?>' + id_paket + '/' + id_vendor)
          }
      </script>

      <script>
          function cari_data() {
              var cari_paket = $('[name="cari_all_paket"]').val();
              console.log(cari_paket)
              var datatable_paket_all = $('#datatable_paket_all');
              $(document).ready(function() {
                  datatable_paket_all.DataTable({
                      "responsive": true,
                      "autoWidth": false,
                      "processing": true,
                      "serverSide": true,
                      "searching": true,
                      "bDestroy": true,
                      "info": false,
                      "order": [],
                      "ajax": {
                          "url": "<?= base_url('dokumen/paket/get_search_paket/') ?>" + cari_paket,
                          "type": "POST",
                      },
                      "oLanguage": {
                          "sSearch": "Cari Data : ",
                          "sEmptyTable": "Data Tidak Tersedia",
                          "sLoadingRecords": "Silahkan Tunggu - loading...",
                          "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                          "sZeroRecords": "Tidak Ada Yang Di Cari",
                          "sProcessing": "Memuat Data...."
                      }
                  });
              });

              function relodTable2() {
                  datatable_paket_all.DataTable().ajax.reload();
              }
          }
      </script>
      <script>
          function LihatDokumen(id) {
              location.replace('<?= base_url('dokumen/paket/list_dokumen/') ?>' + id)
          }
          // INI ACTION BUTTONYA
          function lihat_sumary(id) {
              location.replace('https://eproc.jmtm.co.id/panitiajmtm/beranda/summary_tender/' + id)
          }

          function list_paket_manual(id) {
              location.replace('<?= base_url('dokumen/paket/list_paket_manual/') ?>' + id)
          }


          function lihat_vendor_detail(id) {
              location.replace('<?= base_url('dokumen/paket/list_vendor/') ?>' + id)
          }

          var modal_detail_panitia = $('#exampleModal');
          // INI UNTUK LIHAT DATA PANITIA
          function byidPIlihPanitia2(id) {
              $.ajax({
                  type: "GET",
                  url: "<?= base_url('dokumen/paket/get_byid_panitia/'); ?>" + id,
                  dataType: "JSON",
                  success: function(response) {
                      modal_detail_panitia.modal('show');
                      var html = '';
                      var i;
                      for (i = 0; i < response['detail'].length; i++) {
                          html += '<tr>' +
                              '<td>' + response['detail'][i].nama_pegawai + '</td>' +
                              '<td>' + response['detail'][i].nama_role_panitia + '</td>' +
                              '<td>' + response['detail'][i].nama_unit_kerja + '</td>' +
                              '</tr>'
                      }
                      $('#detail_panitia').html(html);
                  }
              })
          }
      </script>
      </body>

      </html>