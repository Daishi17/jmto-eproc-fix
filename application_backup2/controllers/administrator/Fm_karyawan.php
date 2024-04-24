<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Fm_karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_karyawan');
		$this->load->model('M_section/M_section');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['departemen'] = $this->M_karyawan->get_departemen();
		$data['section'] = $this->M_karyawan->get_section();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/file_master/fm_karyawan', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/file_master/js_karyawan');
	}

	public function datatable_karyawan()
	{
		$result = $this->M_karyawan->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$row = array();
			$row[] = ++$no;
			$row[] = $res->nip;
			$row[] = $res->nama_pegawai;
			$row[] = $res->nama_departemen;
			$row[] = $res->nama_section;

			$row[] = $res->email;
			if ($res->status == 1) {
				$row[] = '<small><span class="badge bg-success">Aktif</span></small>';
			} else if ($res->status == 2) {
				$row[] = '<small><span class="badge bg-danger">Tidak Aktif</span></small>';
			}
			if ($res->status == 1) {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-danger btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_pegawai  . "','nonaktif'" . ')" title="Non-Aktif">
								<i class="fa-solid fa-trash-can px-1"></i>
								<small>Non Aktif</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_pegawai  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Detail</small>
						</button>
						</div>';
			} else {
				$row[] = '<div class="text-center">
							<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_pegawai  . "','aktif'" . ')" title="Aktif">
								<i class="fa-solid fa-check px-1"></i>
								<small>Aktifkan</small>
							</button>
							<button type="button" class="btn btn-info btn-sm shadow-lg" onClick="byid(' . "'" . $res->id_pegawai  . "','edit'" . ')" title="Edit Data">
							<i class="fa-solid fa-edit px-1"></i>
							<small>Detail</small>
						</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_karyawan->count_all_data(),
			"recordsFiltered" => $this->M_karyawan->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function aktif()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$data = [
			'status' => 1,
			'user_created' => $this->session->userdata('nama_pegawai'),
			'date_created' => date('Y-m-d H:i')
		];
		$this->M_karyawan->update_data($data, $id_pegawai);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function nonaktif()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$data = [
			'status' => 2,
			'user_created' => $this->session->userdata('nama_pegawai'),
			'date_created' => date('Y-m-d H:i')
		];
		$this->M_karyawan->update_data($data, $id_pegawai);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	function save()
	{
		$nip = $this->input->post('nip');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$id_departemen = $this->input->post('id_departemen');
		$id_section = $this->input->post('id_section');
		$email = $this->input->post('email');
		$no_telpon = $this->input->post('no_telpon');
		$id_role = $this->input->post('id_role');
		$password = $this->input->post('password');

		$id_pegawai = $this->input->post('id_pegawai');
		if ($id_pegawai) {
			// $this->form_validation->set_rules('nip', 'NIK', 'required|trim|is_unique[tbl_pegawai.nip]', ['required' => 'Nama Section Wajib Diisi!', 'is_unique' => 'NIK Sudah Terdaftar']);
			$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
			$this->form_validation->set_rules('id_departemen', 'Nama Departemen', 'required|trim', ['required' => 'Departemen Wajib Diisi!']);
			// $this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|valid_email|is_unique[tbl_pegawai.nip]', ['required' => 'Email Pegawai Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
			$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required|trim', ['required' => 'No. Telpon Wajib Diisi!']);
			// $this->form_validation->set_rules('id_role', 'Nama Section', 'required|trim', ['required' => 'Role Wajib Diisi!']);
			// $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
			// $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
			if ($this->form_validation->run() == false) {

				$response = [
					'error' => [
						'nip' => form_error('nip'),
						'nama_pegawai' => form_error('nama_pegawai'),
						'id_departemen' => form_error('id_departemen'),
						'email' => form_error('email'),
						'no_telpon' => form_error('no_telpon'),
					],
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$id = $this->uuid->v4();
				$id = str_replace('-', '', $id);
				$data = [
					'nip' => $nip,
					'id_url_pegawai' => $id,
					'nama_pegawai' => $nama_pegawai,
					'id_departemen' => $id_departemen,
					'id_section' => $id_section,
					'email' => $email,
					'no_telpon' => $no_telpon,
					'status' => 1,
					'user_created' => $this->session->userdata('nama_pegawai')
				];
				$this->M_karyawan->update_data($data, $id_pegawai);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		} else {

			$this->form_validation->set_rules('nip', 'NIK', 'required|trim|is_unique[tbl_pegawai.nip]', ['required' => 'Nama Section Wajib Diisi!', 'is_unique' => 'NIK Sudah Terdaftar']);
			$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', ['required' => 'Nama Pegawai Wajib Diisi!']);
			$this->form_validation->set_rules('id_departemen', 'Nama Departemen', 'required|trim', ['required' => 'Departemen Wajib Diisi!']);
			// $this->form_validation->set_rules('email', 'Email Pegawai', 'required|trim|valid_email|is_unique[tbl_pegawai.nip]', ['required' => 'Email Email Pegawai Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
			$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required|trim', ['required' => 'No. Telpon Wajib Diisi!']);
			// $this->form_validation->set_rules('id_role', 'Nama Section', 'required|trim', ['required' => 'Role Wajib Diisi!']);
			// $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
			// $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
			if ($this->form_validation->run() == false) {

				$response = [
					'error' => [
						'nip' => form_error('nip'),
						'nama_pegawai' => form_error('nama_pegawai'),
						'id_departemen' => form_error('id_departemen'),
						'email' => form_error('email'),
						'no_telpon' => form_error('no_telpon'),
					],
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$id = $this->uuid->v4();
				$id = str_replace('-', '', $id);
				$data = [
					'nip' => $nip,
					'id_url_pegawai' => $id,
					'nama_pegawai' => $nama_pegawai,
					'id_departemen' => $id_departemen,
					'id_section' => $id_section,
					'email' => $email,
					'no_telpon' => $no_telpon,
					'status' => 1,
					'user_created' => $this->session->userdata('nama_pegawai')
				];
				$this->M_karyawan->insert_data($data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		}
	}

	function byid($id_departemen)
	{
		$data = $this->M_karyawan->getByid($id_departemen);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function data_section($id_departemen)
	{
		$data = $this->M_section->get_section($id_departemen);
		$data_row = $this->M_section->get_section_row($id_departemen);
		echo '<option value="">--Pilih Section--</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_section'] . '">' . $value['nama_section'] . '</option>';
		}
	}


	public function import_data_karyawan()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcel')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->open('uploads/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 0;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$id = $this->uuid->v4();
						$id = str_replace('-', '', $id);
						$nip = $row->getCellAtIndex(0)->getValue();
						// cek_nip
						$jika_ada_nip = $this->M_karyawan->getByid_nip($nip);
						$data_detaprtemen = $row->getCellAtIndex(2);
						$nama_pegawai = $row->getCellAtIndex(1);
						if ($data_detaprtemen == 'Customer Service') {
							$id_departemen = 1;
						} else if ($data_detaprtemen == 'Operation Management') {
							$id_departemen = 2;
						} else if ($data_detaprtemen == 'Command Center') {
							$id_departemen = 3;
						} else if ($data_detaprtemen == 'Payment Management') {
							$id_departemen = 20;
						} else if ($data_detaprtemen == 'IT Planning & Development') {
							$id_departemen = 21;
						} else if ($data_detaprtemen == 'IT Infrastructure & Services') {
							$id_departemen = 22;
						} else if ($data_detaprtemen == 'Human Capital Planing & Evaluation') {
							$id_departemen = 23;
						} else if ($data_detaprtemen == 'Human Capital Support') {
							$id_departemen = 24;
						} else if ($data_detaprtemen == 'General Affair') {
							$id_departemen = 25;
						} else if ($data_detaprtemen == 'Finance & Accounting') {
							$id_departemen = 26;
						} else if ($data_detaprtemen == 'Strategic Planning Governance, Risk & Compliance') {
							$id_departemen = 27;
						} else if ($data_detaprtemen == 'Businness Planning & Development') {
							$id_departemen = 28;
						} else if ($data_detaprtemen == 'Project Management Office') {
							$id_departemen = 29;
						} else {
							$id_departemen = 2;
						}
						$data_section = $row->getCellAtIndex(3);
						if ($data_section == 'Traffic Services & Security') {
							$id_section = 1;
						} else if ($data_section == '-') {
							$id_section = 5;
						} else if ($data_section == 'Transaction Environtment Services') {
							$id_section = 9;
						} else if ($data_section == 'Traffic Information Area') {
							$id_section = 10;
						} else if ($data_section == 'Traffic Information Center') {
							$id_section = 11;
						} else if ($data_section == 'Settlement & Reconciliation Area') {
							$id_section = 12;
						} else if ($data_section ==  'Transaction System Planning') {
							$id_section = 13;
						} else if ($data_section ==  'IT Strategy & Planning') {
							$id_section = 14;
						} else if ($data_section ==  'Technology Innovation') {
							$id_section = 15;
						} else if ($data_section ==  'IT Application & Development') {
							$id_section = 16;
						} else if ($data_section == 'IT Network & Infrastructure') {
							$id_section = 17;
						} else if ($data_section ==  'IT Services & Operation') {
							$id_section = 18;
						} else if ($data_section ==  'Human Capital Planning') {
							$id_section = 19;
						} else if ($data_section ==  'Human Capital Development') {
							$id_section = 20;
						} else if ($data_section ==  'Human Capital Administration') {
							$id_section = 21;
						} else if ($data_section ==  'Human Capital Industrial Relation') {
							$id_section = 22;
						} else if ($data_section ==  'Office Administration') {
							$id_section = 23;
						} else if ($data_section ==  'Procurement & Asset') {
							$id_section = 24;
						} else if ($data_section ==  'Accounting & Tax') {
							$id_section = 25;
						} else if ($data_section ==  'Finance') {
							$id_section = 26;
						} else if ($data_section ==  'Strategic Planning Risk & Quality') {
							$id_section = 27;
						} else if ($data_section ==  'Legal & Compliance') {
							$id_section = 28;
						} else if ($data_section ==  'Business Planning & Market Research') {
							$id_section = 29;
						} else if ($data_section ==  'Marketing & Customer Relation') {
							$id_section = 30;
						} else if ($data_section ==  '-') {
							$id_section = 31;
						} else {
							$id_section = 2;
						}
						$data = array(
							'id_url_pegawai' => $id,
							'status' => 1,
							'nip' => $row->getCellAtIndex(0),
							'nama_pegawai' => $row->getCellAtIndex(1),
							'id_departemen' => $id_departemen,
							'id_section' => $id_section,
							'email' => $row->getCellAtIndex(4),
							'no_telpon' => $row->getCellAtIndex(5),
						);
						if ($jika_ada_nip) { } else {
							if ($nama_pegawai == '') {
								# code...
							} else {
								$this->M_karyawan->insert_excel_karyawan($data);
							}
						}
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/' . $file['file_name']);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
				redirect('administrator/Fm_karyawan');
			}
		} else {
			echo "Error : " . $this->upload->display_errors();
		}
	}
}
