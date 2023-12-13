<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_metode_pengadaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_metode_pengadaan');
	}

	public function index()
	{
		$data['kode_mtd_pengadaan'] = $this->M_metode_pengadaan->kode();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_metode_pengadaan', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_metode_pengadaan');
	}

	function save()
	{
		$kode_metode_pengadaan = $this->input->post('kode_metode_pengadaan');
		$nama_metode_pengadaan = $this->input->post('nama_metode_pengadaan');

		$id_metode_pengadaan = $this->input->post('id_metode_pengadaan');

		$this->form_validation->set_rules('nama_metode_pengadaan', 'Nama metode_pengadaan', 'required|trim', ['required' => 'Nama metode_pengadaan Wajib Diisi!']);


		if ($this->form_validation->run() == false) {
			$this->output->set_content_type('application/json')->set_output(json_encode('failed'));
		} else {
			if ($id_metode_pengadaan) {
				$data = [
					'kode_metode_pengadaan' => $kode_metode_pengadaan,
					'nama_metode_pengadaan' => $nama_metode_pengadaan,
					'user_edited' => $this->session->userdata('nama_pegawai'),
					'time_edited' => date('Y-m-d H:i'),
					'sts_aktif' => 1
				];
				$this->M_metode_pengadaan->update_data($data, $id_metode_pengadaan);
				$this->output->set_content_type('application/json')->set_output(json_encode('response'));
			} else {
				$data = [
					'kode_metode_pengadaan' => $kode_metode_pengadaan,
					'nama_metode_pengadaan' => $nama_metode_pengadaan,
					'user_created' => $this->session->userdata('nama_pegawai'),
					'sts_aktif' => 1
				];
				$this->M_metode_pengadaan->insert_data($data);
				$kode = $this->M_metode_pengadaan->kode();
				$output = [
					"kode" => $kode
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		}
	}

	public function aktif()
	{
		$id_metode_pengadaan = $this->input->post('id_metode_pengadaan');
		$data = [
			'sts_aktif' => 1,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_metode_pengadaan->update_data($data, $id_metode_pengadaan);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function nonaktif()
	{
		$id_metode_pengadaan = $this->input->post('id_metode_pengadaan');
		$data = [
			'sts_aktif' => 2,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_metode_pengadaan->update_data($data, $id_metode_pengadaan);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function datatable_metode_pengadaan()
	{
		$result = $this->M_metode_pengadaan->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			// $row[] = ++$no;
			$row[] = $res->kode_metode_pengadaan;
			$row[] = $res->nama_metode_pengadaan;
			if ($res->sts_aktif == 1) {
				$row[] = '<small><span class="badge bg-success">Aktif</span></small>';
			} else if ($res->sts_aktif == 2) {
				$row[] = '<small><span class="badge bg-danger">Tidak Aktif</span></small>';
			}
			if ($res->sts_aktif == 1) {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_metode_pengadaan  . "' ,'nonaktif'" . ')" title="Non-Aktif">
														<i class="fa-solid fa-trash-can px-1"></i>
														<small>Non Aktif</small>
													</button>
													<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_metode_pengadaan . "','edit'" . ')" title="Edit Data">
								<i class="fa-solid fa-edit px-1"></i>
								<small>Edit</small>
							</button>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_metode_pengadaan  . "' ,'aktif'" . ')" title="Aktif">
														<i class="fa-solid fa-check px-1"></i>
														<small>Aktifkan</small>
													</button>
													<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_metode_pengadaan . "','edit'" . ')" title="Edit Data">
								<i class="fa-solid fa-edit px-1"></i>
								<small>Edit</small>
						</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_metode_pengadaan->count_all_data(),
			"recordsFiltered" => $this->M_metode_pengadaan->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function byid($id_metode_pengadaan)
	{
		$data = $this->M_metode_pengadaan->getByid($id_metode_pengadaan);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
