<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Sirup_rka extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('M_rkap/M_rkap');
		$this->load->model('M_departmen/M_departmen');
		$role = $this->session->userdata('role');
		if (!$role) {
			redirect('auth');
		}
	}
	public function index()
	{
		$data = [
			'result_departemen' => $this->M_departmen->get_result_departemen()
		];
		$this->load->view('administrator/template_menu/header_menu');
		$this->load->view('administrator/sirup_rkap/base_url'); //ini untuk base_url page rkap
		$this->load->view('administrator/sirup_rkap/index', $data);
		$this->load->view('administrator/template_menu/footer_menu');
		$this->load->view('administrator/sirup_rkap/file_public_rkap');
	}


	function get_kode_rkap()
	{
		$table = "tbl_rkap";
		$field = "kode_rkap";
		$get_all_rkap = $this->M_rkap->get_all_rkap();
		if (!$get_all_rkap) {
			$kode_terakhirnya = $this->M_rkap->get_kode_rkap($table, $field);
			$no_urut = (int) substr($kode_terakhirnya, -3, 3);
			$no_urut++;
			$hasilnya = sprintf('%03s', $no_urut);
		} else {
			$kode_terakhirnya = $this->M_rkap->get_kode_rkap($table, $field);
			$no_urut = (int) substr($kode_terakhirnya, -3, 3);
			$no_urut++;
			$hasilnya = sprintf('%03s', $no_urut);
		}
		$response = [
			'kode_rkap' => $hasilnya
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function get_rkap()
	{
		$result = $this->M_rkap->gettable_rkap();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = $rs->tahun_rkap . '.' . $rs->kode_departemen . '.' . $rs->kode_rkap;
			$row[] = $rs->tahun_rkap;
			$row[] = $rs->nama_program_rkap;
			$row[] = $rs->nama_departemen;
			$row[] = "Rp " . number_format($rs->total_pagu_rkap, 2, ',', '.');
			$row[] = '<a href="javascript:;" class="btn btn-primary btn-sm shadow-lg">
						<i class="fa-regular fa-file-excel px-1"></i>
						<small>' . $rs->file_rkap . '</small>
						</a>';
			if ($rs->sts_rkap == 1) {
				$row[] = '<small><span class="badge bg-warning text-dark">Draft</span></small>';
			} else {
				$row[] = '<small><span class="badge bg-success text-white">Finalisasi</span></small>';
			}
			if ($rs->sts_rkap == 1) {
				$row[] = '<div class="text-center"><a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="by_id_rkap(' . "'" . $rs->id_url_rkap . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> Detail</a>
            <a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="by_id_rkap(' . "'" . $rs->id_url_rkap . "','finalisasi'" . ')"><i class="fa-regular fa-circle-up px-1"></i> Finalisasi</a></div>';
			} else {
				$row[] = '<div class="text-center">
				<button type="button" class="btn btn-info btn-sm shadow-lg" disabled>
					<i class="fa-solid fa-users-viewfinder px-1"></i>
					<small>Detail</small>
				</button>
				<button type="button" class="btn btn-success btn-sm shadow-lg" disabled>
					<i class="fa-regular fa-circle-up px-1"></i>
					<small>Finalisasi</small>
				</button>
			</div>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_rkap->count_all_rkap(),
			"recordsFiltered" => $this->M_rkap->count_filtered_rkap(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_rkap($id_url_rkap)
	{
		$response = [
			'row_rkap' => $this->M_rkap->get_row_rkap($id_url_rkap),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function crud_rkap()
	{
		$id_url_rkap = $this->input->post('id_post_form');
		$type_modal = $this->input->post('type_modal');
		$kode_rkap = $this->input->post('kode_rkap');
		$tahun_rkap = $this->input->post('tahun_rkap');
		$nama_program_rkap = $this->input->post('nama_program_rkap');
		$id_departemen = $this->input->post('id_departemen');
		$total_pagu_rkap = $this->input->post('total_pagu_rkap');

		$this->form_validation->set_rules('tahun_rkap', 'Tahun', 'required|trim', ['required' => 'Tahun Wajib Diisi!']);
		$this->form_validation->set_rules('nama_program_rkap', 'Nama Program', 'required|trim', ['required' => 'Nama Program  Wajib Diisi!']);
		$this->form_validation->set_rules('id_departemen', 'Nama Departemen', 'required|trim', ['required' => 'Nama Departemen  Wajib Diisi!']);
		$this->form_validation->set_rules('total_pagu_rkap', 'Total pagu', 'required|trim', ['required' => 'Total Pagu  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'tahun_rkap' => form_error('tahun_rkap'),
					'nama_program_rkap' => form_error('nama_program_rkap'),
					'id_departemen' => form_error('id_departemen'),
					'total_pagu_rkap' => form_error('total_pagu_rkap'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$date = date('Y');
			if (!is_dir('file_admin/rkap-' . $date)) {
				mkdir('file_admin/rkap-' . $date, 0777, TRUE);
			}
			$config['upload_path'] = './file_admin/rkap-' . $date;
			$config['allowed_types'] = 'xlsx';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);
			if ($type_modal == 'tambah') {
				if ($this->upload->do_upload('file_rkap')) {
					$fileDataKontrak = $this->upload->data();
					$post_file_rkap = $fileDataKontrak['file_name'];
					$id = $this->uuid->v4();
					$id = str_replace('-', '', $id);
					$upload = [
						'id_url_rkap' => $id,
						'kode_rkap' => $kode_rkap,
						'tahun_rkap' => $tahun_rkap,
						'nama_program_rkap' => $nama_program_rkap,
						'id_departemen' => $id_departemen,
						'total_pagu_rkap' => $total_pagu_rkap,
						'file_rkap' => $post_file_rkap,
						'sts_rkap' => 1
					];
					$this->M_rkap->tambah_rkap($upload);
					$response = [
						'success' => 'Berhasil Upload'
					];
					$this->output->set_content_type('application/json')->set_output(json_encode($response));
				} else {
					$fileDataKontrak = $this->upload->data();
					$post_file_rkap = $fileDataKontrak['file_name'];
					$id = $this->uuid->v4();
					$id = str_replace('-', '', $id);
					$upload = [
						'id_url_rkap' => $id,
						'kode_rkap' => $kode_rkap,
						'tahun_rkap' => $tahun_rkap,
						'nama_program_rkap' => $nama_program_rkap,
						'id_departemen' => $id_departemen,
						'total_pagu_rkap' => $total_pagu_rkap,
						'sts_rkap' => 1
					];
					$this->M_rkap->tambah_rkap($upload);
					$response = [
						'success' => 'Berhasil Upload'
					];
					$this->output->set_content_type('application/json')->set_output(json_encode($response));
				}
			} else {
				$row_rkap = $this->M_rkap->get_row_rkap($id_url_rkap);
				if ($this->upload->do_upload('file_rkap')) {
					$fileDataKontrak = $this->upload->data();
					$post_file_rkap = $fileDataKontrak['file_name'];
				} else {
					$fileDataKontrak = $row_rkap['file_rkap'];
					$post_file_rkap = $fileDataKontrak;
				}
				$where = [
					'id_url_rkap' => $id_url_rkap
				];
				$upload = [
					'kode_rkap' => $kode_rkap,
					'tahun_rkap' => $tahun_rkap,
					'nama_program_rkap' => $nama_program_rkap,
					'id_departemen' => $id_departemen,
					'total_pagu_rkap' => $total_pagu_rkap,
					'file_rkap' => $post_file_rkap,
					'sts_rkap' => 1
				];
				$this->M_rkap->update_rkap($upload, $where);
				$response = [
					'success' => 'Berhasil Upload'
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		}
	}
	function finalisasi_rkap($id_url_rkap)
	{
		$where = [
			'id_url_rkap' => $id_url_rkap
		];
		$upload = [
			'sts_rkap' => 2
		];
		$this->M_rkap->update_rkap($upload, $where);
		$response = [
			'success' => 'Berhasil Di Finalisasi'
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function import_rkap()
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
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 2) {
						$table = "tbl_rkap";
						$field = "kode_rkap";
						$text = date('Y') . '.';
						$get_all_rup = $this->M_rkap->get_all_rkap();
						if (!$get_all_rup) {
							$kode_terakhirnya = $this->M_rkap->get_kode_rkap($table, $field);
							$no_urut = (int) substr($kode_terakhirnya, -3, 3);
							$no_urut++;
							$hasilnya = sprintf('%03s', $no_urut);
						} else {
							$kode_terakhirnya = $this->M_rkap->get_kode_rkap($table, $field);
							$no_urut = (int) substr($kode_terakhirnya, -3, 3);
							$no_urut++;
							$hasilnya = sprintf('%03s', $no_urut);
						}
						$id = $this->uuid->v4();
						$id = str_replace('-', '', $id);
						// data post
						$tahun = $row->getCellAtIndex(1);
						$nama_program = $row->getCellAtIndex(2);
						$data_detaprtemen = $row->getCellAtIndex(3);
						$total_pagu_rkap = $row->getCellAtIndex(4);

						// data departemen
						if ($data_detaprtemen == 'Customer Service') {
							$id_departemen = 1;
							$row_departemen = '001';
						} else if ($data_detaprtemen == 'Operation Management') {
							$row_departemen = '002';
							$id_departemen = 2;
						} else if ($data_detaprtemen == 'Command Center') {
							$row_departemen = '003';
							$id_departemen = 3;
						} else if ($data_detaprtemen == 'Payment Management') {
							$row_departemen = '004';
							$id_departemen = 20;
						} else if ($data_detaprtemen == 'IT Planning & Development') {
							$row_departemen = '005';
							$id_departemen = 21;
						} else if ($data_detaprtemen == 'IT Infrastructure & Services') {
							$row_departemen = '006';
							$id_departemen = 22;
						} else if ($data_detaprtemen == 'Human Capital Planing & Evaluation') {
							$row_departemen = '007';
							$id_departemen = 23;
						} else if ($data_detaprtemen == 'Human Capital Support') {
							$row_departemen = '008';
							$id_departemen = 24;
						} else if ($data_detaprtemen == 'General Affair') {
							$row_departemen = '009';
							$id_departemen = 25;
						} else if ($data_detaprtemen == 'Finance & Accounting') {
							$row_departemen = '010';
							$id_departemen = 26;
						} else if ($data_detaprtemen == 'Strategic Planning Governance, Risk & Compliance') {
							$row_departemen = '011';
							$id_departemen = 27;
						} else if ($data_detaprtemen == 'Businness Planning & Development') {
							$row_departemen = '012';
							$id_departemen = 28;
						} else if ($data_detaprtemen == 'Project Management Office') {
							$row_departemen = '013';
							$id_departemen = 29;
						} else { }
						$data = array(
							'id_url_rkap' => $id,
							'kode_rkap' => $hasilnya,
							'tahun_rkap' => $tahun,
							'nama_program_rkap' => $nama_program,
							'id_departemen' => $id_departemen,
							'total_pagu_rkap' => $total_pagu_rkap,
							'sts_rkap' => 1,
							'user_created' => $this->session->userdata('nama_pegawai'),
						);

						if ($nama_program == '') { } else {
							$this->M_rkap->insert_rkap_excel($data);
						}
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/' . $file['file_name']);
				$response = [
					'success' => 'Data Berhasil Di Upload',
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		} else {
			$response = [
				'error' => 'error',
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}
}
