<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Beranda extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('M_rkap/M_rkap');
		$this->load->helper('download');
		$this->load->model('M_rup/M_rup');
		$this->load->model('M_departmen/M_departmen');
		$this->load->model('M_section/M_section');
		$this->load->model('M_jenis_pengadaan/M_jenis_pengadaan');
		$this->load->model('M_metode_pengadaan/M_metode_pengadaan');
		$this->load->model('M_jenis_anggaran/M_jenis_anggaran');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('M_jenis_jadwal/M_jenis_jadwal');
		$this->load->model('M_panitia/M_panitia');
		$this->load->model('M_panitia/M_count');
		$this->load->model('M_panitia/M_jadwal');
	}

	public function index()
	{
		$id_manajemenen_user = $this->session->userdata('id_manajemen_user');
		$data['count_tender_umum'] = $this->M_count->count_tender_umum($id_manajemenen_user);
		$data['count_tender_terbatas'] = $this->M_count->count_tender_terbatas($id_manajemenen_user);
		// PENUNJUKAN LANGSUNG
		$data['count_tender_penunjukan_langsung'] = $this->M_count->count_tender_penunjukan_langsung($id_manajemenen_user);
		// END PENUNJUKAN LANGSUNG
		$this->load->view('template_tender/header');
		$this->load->view('panitia/info_tender/beranda/index', $data);
		$this->load->view('template_tender/footer');
		$this->load->view('panitia/info_tender/beranda/ajax');
	}

	public function get_draft_paket_tender_umum()
	{
		$result = $this->M_panitia->gettable_daftar_paket_tender_umum();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			$jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_22($rs->id_rup);
			$row = array();
			$row[] = ++$no;
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->nama_departemen . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . "Rp " . number_format($rs->total_hps_rup, 2, ',', '.') . '</small>';
			if ($rs->status_paket_panitia == 1) {
				$row[] = '<small><span class="badge bg-warning text-dark">Draft Paket</span></small>';
			} else {
				if ($jadwal_terakhir['waktu_mulai'] < $now) {
					$row[] = '<span class="badge bg-danger text-white">Pengadaan Sudah Selesai
					</span>';
				} else {
					$row[] = '<span class="badge bg-success text-white">Sedang Berlangsung
					</span>';
				}
			}
			$row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onclick="byid_paket(' . "'" . $rs->id_url_rup . "'" . ')">
							<i class="fa-solid fa-users-viewfinder"></i>
							<small>Detail</small>
						</a>
					  </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_panitia->count_all_daftar_paket_tender_umum(),
			"recordsFiltered" => $this->M_panitia->count_filtered_daftar_paket_tender_umum(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_draft_paket_tender_terbatas()
	{
		$result = $this->M_panitia->gettable_daftar_paket_tender_terbatas();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			if ($rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
				$jadwal_terakhir = $this->M_jadwal->jadwal_pasca_terbatas($rs->id_rup);
			} else {
				$jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_22($rs->id_rup);
			}
			$row = array();
			$row[] = ++$no;
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->nama_departemen . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . "Rp " . number_format($rs->total_hps_rup, 2, ',', '.') . '</small>';
			if ($rs->status_paket_panitia == 1) {
				$row[] = '<small><span class="badge bg-warning text-dark">Draft Paket</span></small>';
			} else {
				if ($rs->selesai_semua_tender < $now) {
					$row[] = '<span class="badge bg-danger text-white">Pengadaan Sudah Selesai
					</span>';
				} else {
					$row[] = '<span class="badge bg-success text-white">Sedang Berlangsung
					</span>';
				}
			}
			$row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onclick="byid_paket(' . "'" . $rs->id_url_rup . "'" . ')">
							<i class="fa-solid fa-users-viewfinder"></i>
							<small>Detail</small>
						</a>
					  </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_panitia->count_all_daftar_paket_tender_terbatas(),
			"recordsFiltered" => $this->M_panitia->count_filtered_daftar_paket_tender_terbatas(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// PENUNJUKAN LANGSUNG

	public function get_draft_paket_penunjukan_langsung()
	{
		$result = $this->M_panitia->gettable_daftar_paket_penunjukan_langsung();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			$jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_22($rs->id_rup);
			$row = array();
			$row[] = ++$no;
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->nama_departemen . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . "Rp " . number_format($rs->total_hps_rup, 2, ',', '.') . '</small>';
			if ($rs->status_paket_panitia == 1) {
				$row[] = '<small><span class="badge bg-warning text-dark">Draft Paket</span></small>';
			} else {
				if (date('d-m-Y', strtotime($jadwal_terakhir['waktu_selesai'])) < $now) {
					$row[] = '<span class="badge bg-danger text-white">Pengadaan Sudah Selesai
					</span>';
				} else {
					$row[] = '<span class="badge bg-success text-white">Sedang Berlangsung
					</span>';
				}
			}
			$row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onclick="byid_paket(' . "'" . $rs->id_url_rup . "'" . ')">
							<i class="fa-solid fa-users-viewfinder"></i>
							<small>Detail</small>
						</a>
					  </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_panitia->count_all_daftar_paket_penunjukan_langsung(),
			"recordsFiltered" => $this->M_panitia->count_filtered_daftar_paket_penunjukan_langsung(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	// END PENUNJUKAN LANGSUNG
}
