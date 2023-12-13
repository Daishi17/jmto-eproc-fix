<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_jenis_pengadaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_jenis_pengadaan');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}

	}

	public function index()
	{
		$data['kode_jns_pengadaan'] = $this->M_jenis_pengadaan->kode();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_jenis_pengadaan', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_jenis_pengadaan');
	}

	function save()
	{
		$kode_jenis_pengadaan = $this->input->post('kode_jenis_pengadaan');
		$nama_jenis_pengadaan = $this->input->post('nama_jenis_pengadaan');

		$id_jenis_pengadaan = $this->input->post('id_jenis_pengadaan');

		$this->form_validation->set_rules('nama_jenis_pengadaan', 'Nama jenis_pengadaan', 'required|trim', ['required' => 'Nama jenis_pengadaan Wajib Diisi!']);


		if ($this->form_validation->run() == false) {
			$this->output->set_content_type('application/json')->set_output(json_encode('failed'));
		} else {
			if ($id_jenis_pengadaan) {
				$data = [
					'kode_jenis_pengadaan' => $kode_jenis_pengadaan,
					'nama_jenis_pengadaan' => $nama_jenis_pengadaan,
					'user_edited' => $this->session->userdata('nama_pegawai'),
					'time_edited' => date('Y-m-d H:i'),
					'sts_aktif' => 1
				];
				$this->M_jenis_pengadaan->update_data($data, $id_jenis_pengadaan);
				$this->output->set_content_type('application/json')->set_output(json_encode('response'));
			} else {
				$data = [
					'kode_jenis_pengadaan' => $kode_jenis_pengadaan,
					'nama_jenis_pengadaan' => $nama_jenis_pengadaan,
					'user_created' => $this->session->userdata('nama_pegawai'),
					'sts_aktif' => 1
				];
				$this->M_jenis_pengadaan->insert_data($data);
				$kode = $this->M_jenis_pengadaan->kode();
				$output = [
					"kode" => $kode
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		}
	}

	public function aktif()
	{
		$id_jenis_pengadaan = $this->input->post('id_jenis_pengadaan');
		$data = [
			'sts_aktif' => 1,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_jenis_pengadaan->update_data($data, $id_jenis_pengadaan);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function nonaktif()
	{
		$id_jenis_pengadaan = $this->input->post('id_jenis_pengadaan');
		$data = [
			'sts_aktif' => 2,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_jenis_pengadaan->update_data($data, $id_jenis_pengadaan);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function datatable_jenis_pengadaan()
	{
		$result = $this->M_jenis_pengadaan->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			// $row[] = ++$no;
			$row[] = $res->kode_jenis_pengadaan;
			$row[] = $res->nama_jenis_pengadaan;
			if ($res->sts_aktif == 1) {
				$row[] = '<small><span class="badge bg-success">Aktif</span></small>';
			} else if ($res->sts_aktif == 2) {
				$row[] = '<small><span class="badge bg-danger">Tidak Aktif</span></small>';
			}
			if ($res->sts_aktif == 1) {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_jenis_pengadaan  . "' ,'nonaktif'" . ')" title="Non-Aktif">
														<i class="fa-solid fa-trash-can px-1"></i>
														<small>Non Aktif</small>
													</button>
													<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_jenis_pengadaan . "','edit'" . ')" title="Edit Data">
								<i class="fa-solid fa-edit px-1"></i>
								<small>Edit</small>
							</button>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_jenis_pengadaan  . "' ,'aktif'" . ')" title="Aktif">
														<i class="fa-solid fa-check px-1"></i>
														<small>Aktifkan</small>
													</button>
													<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_jenis_pengadaan . "','edit'" . ')" title="Edit Data">
								<i class="fa-solid fa-edit px-1"></i>
								<small>Edit</small>
						</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_jenis_pengadaan->count_all_data(),
			"recordsFiltered" => $this->M_jenis_pengadaan->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function byid($id_jenis_pengadaan)
	{
		$data = $this->M_jenis_pengadaan->getByid($id_jenis_pengadaan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
