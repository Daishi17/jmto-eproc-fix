<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		// panitia
		$data['count_paket_tender_draf_panitia'] = $this->M_Dashboard->count_paket_tender_draf_panitia();	
		$data['count_paket_tender_berjalan_panitia'] = $this->M_Dashboard->count_paket_tender_berjalan_panitia();	
		$data['count_paket_tender_umumkan_panitia'] = $this->M_Dashboard->count_paket_tender_umumkan_panitia();	
		$data['count_paket_tender_selesai_panitia'] = $this->M_Dashboard->count_paket_tender_selesai_panitia();	
		$this->load->view('template_tender/header');
		$this->load->view('panitia/dashboard', $data);
		$this->load->view('template_tender/footer');
		$this->load->view('panitia/ajax_dashboard');
	}
}
