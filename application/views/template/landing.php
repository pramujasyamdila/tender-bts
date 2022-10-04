<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tender-Bts</title>
    <link rel="stylesheet" href="https://technext.github.io/patrix/assets/css/style.css">
    <link rel="stylesheet" href="https://technext.github.io/patrix/assets/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;
    600;700;800;900&display=swap" rel="stylesheet">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/datatable/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/datatable/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla_master') ?>/assets/css/components.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>sweetalert2/sweetalert2.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>js/sweetalert.min.js"></script>
</head>

<body>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////
                               START SECTION 1 - THE NAVBAR SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////-->
    <nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="<?= base_url('assets/naruto.png') ?>" width="150px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Paket Tender</a></li>
                    <?php if ($this->session->userdata('id_role') == 8) { ?>
                        <li class="nav-item"><a href="<?= base_url('landing/pengajuan') ?>" class="nav-link">Pengajuan Tender </a></li>
                    <?php  } else { ?>

                    <?php   }  ?>

                </ul>
                <!-- Button trigger modal -->

                <!-- Modal -->
                <?php if ($this->session->userdata('id_role') == 8) { ?>
                    <button type="button" class="rounded-pill btn-rounded">
                        <?= $this->session->userdata('username'); ?>
                        <span>
                            <i class="fas fa-user-alt"></i>
                        </span>
                    </button>
                    <a style="text-decoration: none;" href="<?= base_url('auth/logout') ?>">
                        <button style="margin-left: 20px !important;" type="button" class="rounded-pill btn-rounded">
                            LOGOUT
                            <span>
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                        </button>
                    </a>
                <?php  } else { ?>
                    <a style="text-decoration: none;" href="<?= base_url('vendor/registrasi') ?>">
                        <button style="margin-right: 20px !important;" type="button" data-toggle="modal" data-target="#modelId" class="rounded-pill btn-rounded">
                            DAFTAR
                            <span>
                                <i class="fas fa-file-alt"></i>
                            </span>
                        </button>
                    </a>
                    <button type="button" data-toggle="modal" data-target="#modelId" class="rounded-pill btn-rounded">
                        LOGIN
                        <span>
                            <i class="fas fa-sign-in-alt"></i>
                        </span>
                    </button>
                <?php   }  ?>

            </div>
        </div>
    </nav>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                            START SECTION 2 - THE INTRO SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <section id="home" class="intro-section">
        <div class="container">
            <div class="row align-items-center text-white">
                <!-- START THE CONTENT FOR THE INTRO  -->
                <div class="col-md-6 intros text-start">
                    <h1 class="display-2">
                        <span class="display-2--intro">Wellcome To Tender BTS</span>
                        <span class="display-2--description lh-base">
                            Aplikasi Tender BTS PT ALIA
                        </span>
                    </h1>

                    <?php if ($this->session->userdata('id_role') == 8) { ?>
                    <?php  } else { ?>
                        <a style="text-decoration: none;" href="<?= base_url('vendor/registrasi') ?>">
                            <button type="button" class="rounded-pill btn-rounded">Daftar Vendor Segera !!
                                <span><i class="fas fa-arrow-right"></i></span>
                            </button>
                        </a>
                    <?php   }  ?>

                </div>
                <!-- START THE CONTENT FOR THE VIDEO -->
                <div class="col-md-6 intros text-end">
                    <div class="video-box">
                        <img src="<?= base_url('assets/naruto.png') ?>" alt="video illutration" class="img-fluid">
                        <a href="#" class="glightbox position-absolute top-50 start-50 translate-middle">
                            <span>
                                <i class="fas fa-play-circle"></i>
                            </span>
                            <span class="border-animation border-animation--border-1"></span>
                            <span class="border-animation border-animation--border-2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////
                             START SECTION 3 - THE CAMPANIES SECTION  
////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////
                         START SECTION 4 - THE SERVICES  
///////////////////////////////////////////////////////////////////////////////////////////////////-->
    <section id="services" class="services">
        <div class="container">
            <div class="row text-center">
                <h1 class="display-3 fw-bold">PAKET TENDER</h1>
                <div class="heading-line mb-1"></div>
            </div>
            <!-- START THE DESCRIPTION CONTENT  -->
            <div class="row pt-2 pb-2 mt-0 mb-3">
                <div class="col-md-12">
                    <table id="tbl_rup_ku" class="table table-inverse table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Tender</th>
                                <th>Nama Paket</th>
                                <th>Kualifikasi Usaha</th>
                                <th>Sumber Dana</th>
                                <th>Total Dana</th>
                                <th>Lokasi Pekerjaan</th>
                                <th>Status Tender</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////
                               START SECTION 5 - THE TESTIMONIALS  
/////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                       START SECTION 6 - THE FAQ 
//////////////////////////////////////////////////////////////////////////////////////////////////////-->


    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////
                              START SECTION 7 - THE PORTFOLIO  
//////////////////////////////////////////////////////////////////////////////////////////////////////-->


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////
              START SECTION 8 - GET STARTED  
/////////////////////////////////////////////////////////////////////////////////////////////////////////-->

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////
                           START SECTION 9 - THE FOOTER  
///////////////////////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- CONTENT FOR THE MOBILE NUMBER  -->
                <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
                    <div class="contact-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                            <path d="M15 7a2 2 0 0 1 2 2" />
                            <path d="M15 3a6 6 0 0 1 6 6" />
                        </svg>
                    </div>
                    <div class="contact-box__info">
                        <a href="#" class="contact-box__info--title">+1 728365413</a>
                        <p class="contact-box__info--subtitle"> Mon-Fri 9am-6pm</p>
                    </div>
                </div>
                <!-- CONTENT FOR EMAIL  -->
                <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
                    <div class="contact-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="3 9 12 15 21 9 12 3 3 9" />
                            <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
                            <line x1="3" y1="19" x2="9" y2="13" />
                            <line x1="15" y1="13" x2="21" y2="19" />
                        </svg>
                    </div>
                    <div class="contact-box__info">
                        <a href="#" class="contact-box__info--title">info@company.com</a>
                        <p class="contact-box__info--subtitle">Online support</p>
                    </div>
                </div>
                <!-- CONTENT FOR LOCATION  -->
                <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
                    <div class="contact-box__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="18" y1="6" x2="18" y2="6.01" />
                            <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
                            <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
                            <line x1="9" y1="4" x2="9" y2="17" />
                            <line x1="15" y1="15" x2="15" y2="20" />
                        </svg>
                    </div>
                    <div class="contact-box__info">
                        <a href="#" class="contact-box__info--title">New York, USA</a>
                        <p class="contact-box__info--subtitle">NY 10012, US</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- START THE SOCIAL MEDIA CONTENT  -->
        <div class="footer-sm" style="background-color: #212121;">
            <div class="container">
                <div class="row py-4 text-center text-white">
                    <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                        connect with us on social media
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- START THE CONTENT FOR THE CAMPANY INFO -->
        <div class="container mt-5">
            <div class="row text-white justify-content-center mt-3 pb-3">
                <div class="col-12 col-sm-6 col-lg-6 mx-auto">
                    <h5 class="text-capitalize fw-bold">Campany name</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <p class="lh-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ex obcaecati blanditiis reprehenderit ab mollitia voluptatem consectetur?
                    </p>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">Products</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline campany-list">
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">useful links</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline campany-list">
                        <li><a href="#"> Your Account</a></li>
                        <li><a href="#">Become an Affiliate</a></li>
                        <li><a href="#">create an account</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
                    <h5 class="text-capitalize fw-bold">contact</h5>
                    <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
                    <ul class="list-inline campany-list">
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                        <li><a href="#">Lorem ipsum</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- START THE COPYRIGHT INFO  -->
        <div class="footer-bottom pt-5 pb-5">
            <div class="container">
                <div class="row text-center text-white">
                    <div class="col-12">
                        <div class="footer-bottom__copyright">
                            &COPY; Copyright 2021 <a href="#">Company</a> | Created by <a href="http://codewithpatrick.com" target="_blank">Muriungi</a><br><br>

                            Distributed by <a href="http://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- BACK TO TOP BUTTON  -->
    <a href="#" class="shadow btn-primary rounded-circle back-to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PILIH LOGIN</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-primary">
                    <div class="container-fluid">
                        <center>


                            <a style="text-decoration: none;" class="btn-block" href="<?= base_url('vendor/auth') ?>">
                                <button type="button" class="rounded-pill btn-rounded"> Penyedia !!
                                    <span><i class="fas fa-arrow-right"></i></span>
                                </button>
                            </a> <br>
                            <a style="text-decoration: none;" href="<?= base_url('auth') ?>">
                                <button type="button" class="rounded-pill btn-rounded"> Non Penyedia!!
                                    <span><i class="fas fa-arrow-right"></i></span>
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
            </div>
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


    <script src="assets/vendors/js/glightbox.min.js"></script>

    <script type="text/javascript">
        const lightbox = GLightbox({
            'touchNavigation': true,
            'href': 'https://www.youtube.com/watch?v=J9lS14nM1xg',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoPlayVideos': 'true',
        });
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script>
        var tbl_rup_ku = $('#tbl_rup_ku');

        function reload_rup() {
            tbl_rup_ku.DataTable().ajax.reload();
        }

        // GET DATA LOKASI PEKERJAAN 
        $(document).ready(function() {
            tbl_rup_ku.DataTable({
                "responsive": true,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('paket/getdata_landing') ?>",
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
    </script>
    <script>
        $("#anggaran").keyup(function() {
            var harga = $("#anggaran").val();
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
</body>

</html>