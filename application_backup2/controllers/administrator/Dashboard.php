<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard/M_Dashboard');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}
	}


	public function index()
	{
		$data['blm_tervalidasi'] = $this->M_Dashboard->count_rekanan_tervalidasi();
		$data['tervalidasi'] = $this->M_Dashboard->count_rekanan_terundang();
		$data['rup'] = $this->M_Dashboard->count_rup();
		$data['paket_tender'] = $this->M_Dashboard->count_paket_tender();
		$data['paket_tender_berjalan'] = $this->M_Dashboard->count_paket_tender_berjalan();
		$data['paket_tender_selesai'] = $this->M_Dashboard->count_paket_tender_selesai();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/template/dashboard/dashboard', $data);
		$this->load->view('template_menu/footer_menu');
	}
}
