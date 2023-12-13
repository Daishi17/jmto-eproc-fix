<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_mjm_user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_mjm_user');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}

	}

	private function _role($role)
	{
		if ($role == '2') {
			return 'Administrator';
		} else if ($role == '3') {
			return 'Unit Kerja';
		} else if ($role == '4') {
			return 'Validator';
		} else if ($role == '5') {
			return 'Panitia';
		}
	}

	private function _role_badge($role)
	{
		if ($role == '2') {
			return '<small><span class="badge swatch-pink">Administrator</span></small>';
		} else if ($role == '3') {
			return '<small><span class="badge swatch-purple">Unit Kerja</span></small>';
		} else if ($role == '4') {
			return '<small><span class="badge swatch-orange">Validator</span></small>';
		} else if ($role == '5') {
			return '<small><span class="badge bd-cyan-700">Panitia</span></small>';
		}
	}

	public function index()
	{
		$data['karyawan'] = $this->M_mjm_user->get_karyawan();
		$data['kode'] = $this->M_mjm_user->kode();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_mjm_user', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_mjm_user');
	}

	public function aktif()
	{
		$id_mjm_user = $this->input->post('id_mjm_user');
		$data = [
			'sts_aktif' => 1,
			'data_created' => date('Y-m-d H:i')
		];
		$this->M_mjm_user->update_data($data, $id_mjm_user);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function nonaktif()
	{
		$id_mjm_user = $this->input->post('id_mjm_user');
		$data = [
			'sts_aktif' => 2,
			'data_created' => date('Y-m-d H:i')
		];
		$this->M_mjm_user->update_data($data, $id_mjm_user);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function datatable_karyawan()
	{
		$result = $this->M_mjm_user->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->kode_mjm_user;
			$row[] = $res->nip . " || " . $res->nama_pegawai;
			$row[] = $res->username;
			$row[] = $this->_role_badge($res->role);
			if ($res->sts_aktif == 1) {
				$row[] = '<small><span class="badge bg-success">Aktif</span></small>';
			} else if ($res->sts_aktif == 2) {
				$row[] = '<small><span class="badge bg-danger">Tidak Aktif</span></small>';
			}
			if ($res->sts_aktif == 1) {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_manajemen_user  . "','nonaktif'" . ')" title="Non-Aktif">
								<i class="fa-solid fa-trash-can px-1"></i>
								<small>Non Aktif</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_manajemen_user  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Detail</small>
						</button>
						<button type="button" class="btn btn-primary btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_manajemen_user  . "','ubah_pw'" . ')" title="Edit Data">
							<i class="fas fa-lock"></i>
							<small>Ubah Password</small>
						</button>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_manajemen_user  . "','aktif'" . ')" title="Aktif">
								<i class="fa-solid fa-check px-1"></i>
								<small>Aktifkan</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_manajemen_user  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Detail</small>
							<button type="button" class="btn btn-primary btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_manajemen_user  . "','ubah_pw'" . ')" title="Edit Data">
							<i class="fas fa-lock"></i>
							<small>Ubah Password</small>
						</button>
						</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_mjm_user->count_all_data(),
			"recordsFiltered" => $this->M_mjm_user->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_byid($value)
	{

		$data = $this->M_mjm_user->getByid($value);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	public function get_byid_mjm($value)
	{

		$data = $this->M_mjm_user->getByid_mjm($value);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function ubah_password()
	{
		$id_manajemen_user_ubah = $this->input->post('id_manajemen_user_ubah');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi Wajib Di isi!', 'matches' => 'Password Tidak Sama']);

		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'password' => form_error('password'),
					'password2' => form_error('password2'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$data = [
				'password' => password_hash($password, PASSWORD_DEFAULT),
			];
			$this->M_mjm_user->update_data($data, $id_manajemen_user_ubah);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}


	public function save()
	{
		$kode_mjm_user = $this->input->post('kode_mjm_user');
		$id_pegawai = $this->input->post('id_pegawai');
		$id_role = $this->input->post('id_role');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('id_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
		$this->form_validation->set_rules('id_role', 'Role', 'required|trim', ['required' => 'Role Wajib Diisi!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_manajemen_user.username]', ['required' => 'Username Wajib Diisi!', 'is_unique' => 'Username Sudah Terdaftar']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi Wajib Di isi!', 'matches' => 'Password Tidak Sama']);

		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_pegawai' => form_error('id_pegawai'),
					'id_role' => form_error('id_role'),
					'username' => form_error('username'),
					'password' => form_error('password'),
					'password2' => form_error('password2'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {

			// checking role pegawai
			$get_pegawai = $this->M_mjm_user->getByid_user($id_pegawai, $id_role);
			// checking pegawai 
			if ($get_pegawai) {
				// checking role pegawai
				$response = [
					'error2' => [
						'id_role' => 'Nama Pegawai ' . $get_pegawai['nama_pegawai'] . ' Dengan Role ' . $this->_role($id_role) . ' Sudah Ada',
					],
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$data = [
					'kode_mjm_user' => $kode_mjm_user,
					'id_pegawai' => $id_pegawai,
					'role' => $id_role,
					'username' => $username,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'sts_aktif' => 1
				];
				$this->M_mjm_user->insert_data($data);
				$kode = $this->M_mjm_user->kode();
				$output = [
					"kode" => $kode
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($output));
			}
		}
	}

	public function update()
	{
		$id_pegawai = $this->input->post('id_pegawai_edit');
		$id_role = $this->input->post('id_role_edit');

		$id_manajemen_user = $this->input->post('id_manajemen_user');

		// checking role pegawai
		$get_pegawai = $this->M_mjm_user->getByid_user($id_pegawai, $id_role);
		// checking pegawai 
		if ($get_pegawai) {
			// checking role pegawai
			$response = [
				'error2' => [
					'id_role' => 'Nama Pegawai ' . $get_pegawai['nama_pegawai'] . ' Dengan Role ' . $this->_role($id_role) . ' Sudah Ada',
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$data = [
				'role' => $id_role,
			];
			$this->M_mjm_user->update_data($data, $id_manajemen_user);
			$kode = $this->M_mjm_user->kode();
			$output = [
				"kode" => $kode
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($output));
		}
	}
}
