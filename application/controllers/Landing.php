<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('download');
		$this->load->model('M_landing/M_landing');
	}

	public function index()
	{
		$this->load->view('landing/index');
	}

	public function datatable_berita_tender()
	{
		$result = $this->M_landing->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->nama_berita;
			$row[] = $res->time_created;
			$row[] = '<a href="' . base_url('file_paket/DOKUMEN_BERITA_TENDER/') . $res->file_berita . '" class=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png" width="50px"/></a>';
			$row[] = '<div class="text-center">
            <a href="javascript:;" class="btn btn-danger text-white btn-sm shadow-lg" onclick="byid_berita(' . "'" . $res->id_berita . "'" . ')">
                <i class="fa-solid fa-trash"></i>
                <small>Hapus</small>
            </a>
          </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_landing->count_all_data(),
			"recordsFiltered" => $this->M_landing->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function datatable_pengadaan_barang()
	{
		$result = $this->M_landing->gettable_pengadaan_barang();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->nama_rup;
			$row[] = "Rp " . number_format($res->total_hps_rup,2,',','.');
			$row[] = $res->batas_pendaftaran_tender;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_landing->count_all_pengadaan_barang(),
			"recordsFiltered" => $this->M_landing->count_filtered_pengadaan_barang(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function datatable_pengadaan_konsultansi()
	{
		$result = $this->M_landing->gettable_pengadaan_konsultansi();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->nama_rup;
			$row[] = "Rp " . number_format($res->total_hps_rup,2,',','.');
			$row[] = $res->batas_pendaftaran_tender;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_landing->count_all_pengadaan_konsultansi(),
			"recordsFiltered" => $this->M_landing->count_filtered_pengadaan_konsultansi(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function datatable_pengadaan_jasa_lain()
	{
		$result = $this->M_landing->gettable_pengadaan_jasa_lain();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->nama_rup;
			$row[] = "Rp " . number_format($res->total_hps_rup,2,',','.');
			$row[] = $res->batas_pendaftaran_tender;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_landing->count_all_pengadaan_jasa_lain(),
			"recordsFiltered" => $this->M_landing->count_filtered_pengadaan_jasa_lain(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function datatable_pengadaan_pemborongan()
	{
		$result = $this->M_landing->gettable_pengadaan_pemborongan();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->nama_rup;
			$row[] = "Rp " . number_format($res->total_hps_rup,2,',','.');
			$row[] = $res->batas_pendaftaran_tender;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_landing->count_all_pengadaan_pemborongan(),
			"recordsFiltered" => $this->M_landing->count_filtered_pengadaan_pemborongan(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}
