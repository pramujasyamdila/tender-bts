<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Otp_halaman extends CI_Controller
{

    public function index()
    {
        $this->load->view('halaman_otp');
        $this->load->view('ajax_otp');
    }

    public function otp_2()
    {
        $this->load->view('halaman_otpp2');
        $this->load->view('ajax_otp');
    }
}
