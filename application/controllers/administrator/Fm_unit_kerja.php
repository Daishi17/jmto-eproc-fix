<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Fm_unit_kerja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_unit_kerja');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['kode_departemen'] = $this->M_unit_kerja->kode();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_unitkerja', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_unit_kerja');
	}

	function save()
	{
		$kode_departemen = $this->input->post('kode_departemen');
		$nama_departemen = $this->input->post('nama_departemen');

		$id_departemen = $this->input->post('id_departemen');

		$this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'required|trim', ['required' => 'Nama Departemen Wajib Diisi!']);


		if ($this->form_validation->run() == false) {
			$this->output->set_content_type('application/json')->set_output(json_encode('failed'));
		} else {
			if ($id_departemen) {
				$data = [
					'kode_departemen' => $kode_departemen,
					'nama_departemen' => $nama_departemen,
					'user_edited' => $this->session->userdata('nama_pegawai'),
					'time_edited' => date('Y-m-d H:i'),
					'sts_aktif' => 1
				];
				$this->M_unit_kerja->update_data($data, $id_departemen);
				$this->output->set_content_type('application/json')->set_output(json_encode('response'));
			} else {
				$data = [
					'kode_departemen' => $kode_departemen,
					'nama_departemen' => $nama_departemen,
					'user_created' => $this->session->userdata('nama_pegawai'),
					'sts_aktif' => 1
				];
				$this->M_unit_kerja->insert_data($data);
				$kode = $this->M_unit_kerja->kode();
				$output = [
					"kode" => $kode
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		}
	}

	public function aktif()
	{
		$id_departemen = $this->input->post('id_departemen');
		$data = [
			'sts_aktif' => 1,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_unit_kerja->update_data($data, $id_departemen);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function nonaktif()
	{
		$id_departemen = $this->input->post('id_departemen');
		$data = [
			'sts_aktif' => 2,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_unit_kerja->update_data($data, $id_departemen);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function datatable_departemen()
	{
		$result = $this->M_unit_kerja->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			// $row[] = ++$no;
			$row[] = $res->kode_departemen;
			$row[] = $res->nama_departemen;
			if ($res->sts_aktif == 1) {
				$row[] = '<small><span class="badge bg-success">Aktif</span></small>';
			} else if ($res->sts_aktif == 2) {
				$row[] = '<small><span class="badge bg-danger">Tidak Aktif</span></small>';
			}
			if ($res->sts_aktif == 1) {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_departemen  . "','nonaktif'" . ')" title="Non-Aktif">
								<i class="fa-solid fa-trash-can px-1"></i>
								<small>Non Aktif</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_departemen  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Edit</small>
						</button>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_departemen  . "','aktif'" . ')" title="Aktif">
								<i class="fa-solid fa-check px-1"></i>
								<small>Aktifkan</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_departemen  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Edit</small>
						</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_unit_kerja->count_all_data(),
			"recordsFiltered" => $this->M_unit_kerja->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function byid($id_departemen)
	{
		$data = $this->M_unit_kerja->getByid($id_departemen);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
