<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class role_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('Auth_model');
		$this->ci->load->model('Pegawai/Pegawai_model');
		$this->ci->load->helper('string');
	}

	public function login($username, $password, $qrcode)
	{
		$cek = $this->ci->Auth_model->login($username);
		$dataqr = [
			'otp_verifikasi' => $qrcode,
		];
		$where = [
			'id_pegawai' => $cek->id_pegawai
		];
		$this->ci->Auth_model->update($where, $dataqr);
		if ($cek) {
			if ($cek && password_verify($password, $cek->password)) {
				if ($cek->status == 1) {
					$sekarang = date('Y-m-d H:i');
					$data = [
						'waktu_login' => $sekarang,
						'alamat_ip' => $this->ci->input->ip_address(),
						'id_pegawai' => $cek->id_pegawai
					];
					$this->ci->Auth_model->insert_log($data);
					$username = $cek->username;
					$nip = $cek->nip;
					$email = $cek->email;
					$nama_pegawai = $cek->nama_pegawai;
					$id_pegawai = $cek->id_pegawai;
					$id_role = $cek->id_role;
					$telepon = $cek->telepon;
					$jabatan = $cek->jabatan;
					$tahun_kerja = $cek->tahun_kerja;
					$bulan_kerja = $cek->bulan_kerja;
					$unit_kerja = $cek->unit_kerja;
					$otp_verifikasi = $cek->otp_verifikasi;

					$this->ci->session->set_userdata('username', $username);
					$this->ci->session->set_userdata('nip', $nip);
					$this->ci->session->set_userdata('email', $email);
					$this->ci->session->set_userdata('nama_pegawai', $nama_pegawai);
					$this->ci->session->set_userdata('id_pegawai', $id_pegawai);
					$this->ci->session->set_userdata('id_role', $id_role);
					$this->ci->session->set_userdata('jabatan', $jabatan);
					$this->ci->session->set_userdata('telepon', $telepon);
					$this->ci->session->set_userdata('tahun_kerja', $tahun_kerja);
					$this->ci->session->set_userdata('bulan_kerja', $bulan_kerja);
					$this->ci->session->set_userdata('unit_kerja', $unit_kerja);
					$this->ci->session->set_userdata('otp_verifikasi', $otp_verifikasi);
					// buat session
					$config = array(
						'protocol' => 'smtp',
						'smtp_host' => 'mail.jmtm.co.id',
						'smtp_port' => 465,
						'smtp_user' => 'eproc@jmtm.co.id',
						'smtp_pass' => '@dminJMTM!',
						'mailtype'  => 'html',
						'charset'   => 'iso-8859-1'
					);
					$this->ci->load->library('email', $config);
					$this->ci->email->set_newline("\r\n");
					// Email dan nama pengirim
					$this->ci->email->from('eproc@jmtm.co.id', 'JMTM MANAJEMEN DOKUMEN');
					// Email penerima

					$this->ci->email->to($this->ci->session->userdata('email')); // Ganti dengan email tujuan

					// Subject email
					$this->ci->email->subject('JMTM MANAJEMEN DOKUMEN : KODE OTP');

					// Isi email
					$this->ci->email->message("Masukan Kode Otp Anda : $qrcode https://doc-proc.jmtm.co.id/otp_halaman");

					$this->ci->email->send();

					if ($this->ci->session->userdata('id_role') == 1) {
						redirect('otp_halaman');
					} else if ($this->ci->session->userdata('id_role') == 2) {
						redirect('otp_halaman');
					} else if ($this->ci->session->userdata('id_role') == 8) {
						redirect('otp_halaman/otp_2');
					} else {
						$this->ci->session->unset_userdata('username');
						$this->ci->session->unset_userdata('nip');
						$this->ci->session->unset_userdata('nama_pegawai');
						$this->ci->session->unset_userdata('id_pegawai');
						$this->ci->session->unset_userdata('id_role');
						$this->ci->session->unset_userdata('jabatan');
						$this->ci->session->unset_userdata('telepon');
						$this->ci->session->set_userdata('tahun_kerja');
						$this->ci->session->set_userdata('bulan_kerja');
						$this->ci->session->set_userdata('unit_kerja');
						$this->ci->session->unset_userdata('otp_verifikasi');
						$this->ci->session->set_flashdata('tidak_bisa', 'Anda Tidak Diperkenankan untuk login di aplikasi ini');
						redirect('auth');
					}
				} else {
					$this->ci->session->set_flashdata('tidak_aktif', 'Username Tidak Aktif');
					redirect('auth');
				}
			} else {
				$this->ci->session->set_flashdata('salah', 'Username Atau Password Salah');
				redirect('auth');
			}
		} else {
			$this->ci->session->set_flashdata('salah', 'Username Tidak Terdaftar');
			redirect('auth');
		}
	}
	public function cek_login()
	{
		if ($this->ci->session->userdata('username') == "") {
			$this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nip');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('nama_pegawai');
		$this->ci->session->unset_userdata('id_pegawai');
		$this->ci->session->unset_userdata('id_role');
		$this->ci->session->unset_userdata('jabatan');
		$this->ci->session->set_userdata('tahun_kerja');
		$this->ci->session->set_userdata('bulan_kerja');
		$this->ci->session->set_userdata('unit_kerja');
		$this->ci->session->unset_userdata('telepon');
		$this->ci->session->unset_userdata('otp_verifikasi');
		$this->ci->session->set_flashdata('berhasil', 'Anda Berhasil Logout');
		redirect('auth');
	}
}
