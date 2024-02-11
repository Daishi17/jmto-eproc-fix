<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_unit_area extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_unit_area');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['departemen'] = $this->M_unit_area->get_departemen();
		$data['kode_section'] = $this->M_unit_area->kode();
		// var_dump($data['kode_section']);
		// die;
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_unitarea', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_unit_area');
	}

	public function aktif()
	{
		$id_section = $this->input->post('id_section');
		$data = [
			'sts_aktif' => 1,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_unit_area->update_data($data, $id_section);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function nonaktif()
	{
		$id_section = $this->input->post('id_section');
		$data = [
			'sts_aktif' => 2,
			'user_edited' => $this->session->userdata('nama_pegawai'),
			'time_edited' => date('Y-m-d H:i')
		];
		$this->M_unit_area->update_data($data, $id_section);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	function save()
	{

		$id_section = $this->input->post('id_section');

		if ($id_section) {
			$kode_section = $this->input->post('kode_section_edit');
			$nama_section = $this->input->post('nama_section_edit');


			$id_departemen = $this->input->post('id_departemen_edit');
			$this->form_validation->set_rules('nama_section_edit', 'Nama Section', 'required|trim', ['required' => 'Nama Section Wajib Diisi!']);
			$this->form_validation->set_rules('id_departemen_edit', 'Nama Departemen', 'required|trim', ['required' => 'Nama Departemen Wajib Diisi!']);
		} else {
			$kode_section = $this->input->post('kode_section');
			$nama_section = $this->input->post('nama_section');
			$id_departemen = $this->input->post('id_departemen');
			$this->form_validation->set_rules('nama_section', 'Nama Section', 'required|trim', ['required' => 'Nama Section Wajib Diisi!']);
			$this->form_validation->set_rules('id_departemen', 'Nama Departemen', 'required|trim', ['required' => 'Nama Departemen Wajib Diisi!']);
		}
		if ($this->form_validation->run() == false) {
			if ($id_section) {
				$response = [
					'error' => [
						'nama_section' => form_error('nama_section_edit'),
						'id_departemen' => form_error('id_departemen_edit'),
					],
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$response = [
					'error' => [
						'nama_section' => form_error('nama_section'),
						'id_departemen' => form_error('id_departemen'),
					],
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		} else {
			if ($id_section) {
				$data = [
					'kode_section' => $kode_section,
					'nama_section' => $nama_section,
					'id_departemen' => $id_departemen,
					'user_edited' => $this->session->userdata('nama_pegawai'),
					'time_edited' => date('Y-m-d H:i'),
					'sts_aktif' => 1
				];
				$this->M_unit_area->update_data($data, $id_section);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else {
				$data = [
					'kode_section' => $kode_section,
					'nama_section' => $nama_section,
					'id_departemen' => $id_departemen,
					'user_created' => $this->session->userdata('nama_pegawai'),
					'sts_aktif' => 1
				];
				$this->M_unit_area->insert_data($data);
				$kode = $this->M_unit_area->kode();
				$output = [
					"kode" => $kode
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		}
	}

	public function datatable_section()
	{
		$result = $this->M_unit_area->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			// $row[] = ++$no;
			$row[] = $res->kode_section;
			$row[] = $res->nama_section;
			$row[] = $res->nama_departemen;
			if ($res->sts_aktif == 1) {
				$row[] = '<small><span class="badge bg-success">Aktif</span></small>';
			} else if ($res->sts_aktif == 2) {
				$row[] = '<small><span class="badge bg-danger">Tidak Aktif</span></small>';
			}
			if ($res->sts_aktif == 1) {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_section  . "','nonaktif'" . ')" title="Non-Aktif">
								<i class="fa-solid fa-trash-can px-1"></i>
								<small>Non Aktif</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_section  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Detail</small>
						</button>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_section  . "','aktif'" . ')" title="Aktif">
								<i class="fa-solid fa-check px-1"></i>
								<small>Aktifkan</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_section  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Detail</small>
						</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_unit_area->count_all_data(),
			"recordsFiltered" => $this->M_unit_area->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function byid($id_departemen)
	{
		$data = $this->M_unit_area->getByid($id_departemen);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
