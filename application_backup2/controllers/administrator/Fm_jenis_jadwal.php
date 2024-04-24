<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_jenis_jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_Jadwal');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}


	}

	public function index()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_jenis_jadwal');
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_jadwal');
	}

	function get_jadwal()
	{
		$result = $this->M_Jadwal->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = '<small>' . $rs->kode_jadwal . '</small>';
			$row[] = '<small>' . $rs->nama_jadwal_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_metode_pengadaan . '</small>';
			$row[] = '<small>' . $rs->metode_kualifikasi . '</small>';
			$row[] = '<small>' . $rs->metode_dokumen . '</small>';
			if ($rs->status == 1) {
				$row[] = '<td><small><span class="badge bg-success">Aktif</span></small></td>';
			} else {
				$row[] = '<td><small><span class="badge bg-danger">Tidak Aktif</span></small></td>';
			}
			if ($rs->status == 1) {
				$row[] = '<div class="text-center">
							<a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $rs->id_jadwal_tender  . "','detail'" . ')"> <i class="fa-solid fa-users-viewfinder px-1"></i>
							<small>Detail</small></a>
							<a href="javascript:;" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $rs->id_jadwal_tender  . "','nonaktifkan'" . ')">  <i class="fa-solid fa-trash-can px-1"></i>
							<small>Non-Aktifkan</small></a>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $rs->id_jadwal_tender  . "','detail'" . ')"> <i class="fa-solid fa-users-viewfinder px-1"></i>
							<small>Detail</small></a>
							<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $rs->id_jadwal_tender  . "','aktifkan'" . ')">  <i class="fa-solid fa-check px-1"></i>
							<small>Aktifkan</small></a>
						</div>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Jadwal->count_all_data(),
			"recordsFiltered" => $this->M_Jadwal->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function get_jadwal2()
	{
		$id = $this->input->post('id');
		$result = $this->M_Jadwal->getdatatable2($id);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = '<small>' . $rs->nama_jadwal . '</small>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_Jadwal->count_all_data2($id),
			"recordsFiltered" => $this->M_Jadwal->count_filtered_data2($id),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function byid($id_jadwal_tender)
	{
		$data = $this->M_Jadwal->getByid($id_jadwal_tender);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
