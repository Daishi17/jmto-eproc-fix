<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_rupiah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('M_rkap/M_rkap');
		$this->load->model('M_ruas/M_ruas');
		$this->load->model('M_rup/M_rup');
		$this->load->model('M_departmen/M_departmen');
		$this->load->model('M_section/M_section');
		$this->load->model('M_jenis_pengadaan/M_jenis_pengadaan');
		$this->load->model('M_metode_pengadaan/M_metode_pengadaan');
		$this->load->model('M_jenis_anggaran/M_jenis_anggaran');
		$this->load->view('administrator/sirup_rup/file_public_rup');
		$this->load->model('Wilayah/Wilayah_model');
	}
	function ambil_rupiah($rupiah)
	{
		$response = [
			'rupiah_nilai_pencatatan' => "Rp " . number_format($rupiah)
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
