<!-- page content -->

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<div class="col-12 col-md-6 col-lg-6">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-primary text-white-all">
						<li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
						<li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Paket Manual </a></li>
						<li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i> List Dokumen Manual</a></li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">DOKUMEN TENDER MANUAL</a>
							<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">DOKUMEN BERITA ACARA MANUAL</a>
							<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">DOKUMEN SURAT PENUNJUKAN MANUAL</a>
							<a class="nav-link" id="v-pills-manual-tab" data-toggle="pill" href="#v-pills-manual" role="tab" aria-controls="v-pills-manual" aria-selected="false">DOKUMEN PENGADAAN</a>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<div class="section-header">
						INPUT DOKUMEN TENDER MANUAL
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_rincian_hps_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN RINCIAN HPS <span class="badge badge-warning"> <?= $jumlah_dokumen_rincian_hps ?> </span> </a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-warning" href="<?= base_url('dokumen/paket/dokumen_penunjang_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN PENUNJANG <span class="badge badge-warning"> <?= $jumlah_dokumen_rincian_hps ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-success" href="<?= base_url('dokumen/paket/dokumen_persyaratan_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN PERSYARATAN <span class="badge badge-warning"> <?= $jumlah_dokumen_persyaratan ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-danger" href="<?= base_url('dokumen/paket/dokumen_lelang_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN LELANG <span class="badge badge-warning"> <?= $jumlah_dokumen_lelang ?> </span>

										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_prakualifikasi_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN PRAKUALIFIKASI <span class="badge badge-warning"> <?= $jumlah_dokumen_prakualifikasi ?> </span>

										</a>
									</center>
								</div>
							</div>
						</div>


					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<div class="section-header">
						DOKUMEN BERITA ACARA
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-warning" href="<?= base_url('dokumen/paket/dokumen_peringkat_teknis_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN PRINGKAT TEKNIS <span class="badge badge-warning"> <?= $jumlah_dokumen_peringkat_teknis ?> </span>

										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-danger" href="<?= base_url('dokumen/paket/dokumen_informasi_lainya_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN INFORMASI LAINYA <span class="badge badge-primary"> <?= $jumlah_dokumen_informasi_lainya ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-success" href="<?= base_url('dokumen/paket/dokumen_hasil_penawaran_manual/') . $row_paket['id_paket'] ?>">
											DOKUMEN EVALUASI HASIL PENAWARAN <span class="badge badge-primary"> <?= $jumlah_hasil_penawaran ?> </span>

										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_hasil_tender_manual/') . $row_paket['id_paket'] ?>">

											DOKUMEN HASIL TENDER <span class="badge badge-primary"> <?= $jumlah_dokumen_hasil_tender ?> </span>

										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<div class="section-header">
						DOKUMEN SURAT PENUNJUKAN
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokume_surat_penunjukan_manual/') . $row_paket['id_paket'] ?>">

											DOKUMEN SURAT PENUNJUKAN <span class="badge badge-primary"> <?= $jumlah_dokumen_penunjukan ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade show active" id="v-pills-manual" role="tabpanel" aria-labelledby="v-pills-manual-tab">
					<div class="section-header">
						INPUT DOKUMEN PENGADAAN
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-info" href="<?= base_url('dokumen/paket/dokumen_kerangka_kerja/') . $row_paket['id_paket'] ?>">
											Kerangka Acuan Kerja (KAK) <span class="badge badge-warning"> <?= $jumlah_dokumen_kak ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_spesifikasi_khusus/') . $row_paket['id_paket'] ?>">
											Spesifikasi Khusus <span class="badge badge-warning"> <?= $jumlah_dokumen_spesifikasi_khusus ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-success" href="<?= base_url('dokumen/paket/dokumen_spesifikasi_umum/') . $row_paket['id_paket'] ?>">
											Spesifikasi Umum <span class="badge badge-warning"> <?= $jumlah_dokumen_spesifikasi_umum ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-warning" href="<?= base_url('dokumen/paket/dokumen_harga_perkiraan_sendiri_hps/') . $row_paket['id_paket'] ?>">
											Harga perkiraan sendiri (HPS) <span class="badge badge-warning"> <?= $jumlah_dokumen_hps ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-info" href="<?= base_url('dokumen/paket/dokumen_peralatan/') . $row_paket['id_paket'] ?>">
											Daftar peralatan yg diperlukan <span class="badge badge-warning"> <?= $jumlah_dokumen_peralatan ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_rancangan_kontrak/') . $row_paket['id_paket'] ?>">
											Rancangan kontrak <span class="badge badge-warning"> <?= $jumlah_dokumen_rancangan_kontrak ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_ketentuan_umum_kontrak_kuk/') . $row_paket['id_paket'] ?>">
											Ketentuan umum kontrak (KUK) <span class="badge badge-warning"> <?= $jumlah_dokumen_kuk ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_k3/') . $row_paket['id_paket'] ?>">
											Dokumen K3 <span class="badge badge-warning"> <?= $jumlah_dokumen_k3 ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card" style="background: url(<?= base_url('assets/dokumen2.jpg') ?>); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:50px; background-repeat: no-repeat; background-size: cover;">
								<div class="card-body">
									<br><br><br><br> <br><br>
									<center>
										<a class="btn btn-primary" href="<?= base_url('dokumen/paket/dokumen_gambar_rencana/') . $row_paket['id_paket'] ?>">
											Dokumen Gambar Rencana <span class="badge badge-warning"> <?= $jumlah_dokumen_gambar ?> </span>
										</a>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>