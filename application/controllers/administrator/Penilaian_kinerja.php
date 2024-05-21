<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class Penilaian_kinerja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dashboard/M_Dashboard');
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
		$this->load->model('M_laporan/M_laporan_kinerja');
		$this->load->model('Penilaian_vendor_model');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}
	}


	public function index()
	{
		$data['blm_tervalidasi'] = $this->M_Dashboard->count_rekanan_tervalidasi();
		$data['tervalidasi'] = $this->M_Dashboard->count_rekanan_terundang();
		$data['rup'] = $this->M_Dashboard->count_rup();
		$data['paket_tender'] = $this->M_Dashboard->count_paket_tender();
		$data['paket_tender_berjalan'] = $this->M_Dashboard->count_paket_tender_berjalan();
		$id_manajemenen_user = $this->session->userdata('id_manajemen_user');
		$row_management_user = $this->M_count->get_row_pegawai($id_manajemenen_user);
		$data['count_tender_umum'] = $this->M_count->hitung_tender_umum();
		$data['count_tender_terbatas'] = $this->M_count->hitung_tender_terbatas();
		$data['count_tender_juksung'] = $this->M_count->hitung_tender_juksung();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/penilaian_kinerja/index', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/penilaian_kinerja/ajax', $data);
	}

	function buat_penilaian($id_vendor_mengikuti_paket)
	{
		$data['row_mengikuti_paket'] = $this->M_count->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);
		$id_rup = $data['row_mengikuti_paket']['id_rup'];
		$id_vendor = $data['row_mengikuti_paket']['id_vendor'];
		$data['row_rup'] = $this->M_laporan_kinerja->get_row_rup($id_rup);

		$data['get_pelaksanaan_satgas'] =  $this->M_laporan_kinerja->cek_pelaksanaan_satgas($id_vendor, $id_rup);
		$data['get_pelaksanaan_manager'] =  $this->M_laporan_kinerja->cek_pelaksanaan_manager($id_vendor, $id_rup);
		$data['get_pelaksanaan_depthead'] =  $this->M_laporan_kinerja->cek_pelaksanaan_depthead($id_vendor, $id_rup);
		$data['get_pelaksanaan_total'] =  $this->M_laporan_kinerja->cek_pelaksanaan_total($id_vendor, $id_rup);

		$data['get_pemeliharaan_satgas'] =  $this->M_laporan_kinerja->cek_pemeliharaan_satgas($id_vendor, $id_rup);
		$data['get_pemeliharaan_manager'] =  $this->M_laporan_kinerja->cek_pemeliharaan_manager($id_vendor, $id_rup);
		$data['get_pemeliharaan_depthead'] =  $this->M_laporan_kinerja->cek_pemeliharaan_depthead($id_vendor, $id_rup);
		$data['get_pemeliharaan_total'] =  $this->M_laporan_kinerja->cek_pemeliharaan_total($id_vendor, $id_rup);

		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/penilaian_kinerja/buat_penilaian', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/penilaian_kinerja/ajax_penilaian', $data);
	}


	public function get_draft_paket_tender_umum()
	{
		$result = $this->M_count->gettable_daftar_paket_tender_umum();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			$get_nilai_pelaksanaan = $this->M_laporan_kinerja->cek_pelaksanaan_total($rs->id_vendor, $rs->id_rup);
			$get_nilai_pemeliharaan = $this->M_laporan_kinerja->cek_pemeliharaan_total($rs->id_vendor, $rs->id_rup);

			if ($get_nilai_pelaksanaan) {
				if ($get_nilai_pelaksanaan['hasil_akhir'] >= 80) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pelaksanaan['hasil_akhir'] >= 60) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pelaksanaan['hasil_akhir'] >= 40) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				} else {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				}
			} else if ($get_nilai_pemeliharaan) {
				if ($get_nilai_pemeliharaan['hasil_akhir'] >= 80) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pemeliharaan['hasil_akhir'] >= 60) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pemeliharaan['hasil_akhir'] >= 40) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				} else {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				}
			} else {
				$rating = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}

			if ($rs->nilai_vendor) {
				$nilai_vendor = $rs->nilai_vendor;
			} else {
				$nilai_vendor = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}

			$row = array();
			$row[] = '<small>' . ++$no . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_usaha . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_metode_pengadaan . '</small>';
			$row[] = '<small>' . $rating . '</small>';
			if ($get_nilai_pelaksanaan) {
				$row[] = '<small>' . $get_nilai_pelaksanaan['hasil_akhir']  . '</small>';
			} else if ($get_nilai_pemeliharaan) {
				$row[] = '<small>' . $get_nilai_pemeliharaan['hasil_akhir']  . '</small>';
			} else {
				$row[] = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}


			$row[] = '<a href="' . base_url('administrator/penilaian_kinerja/buat_penilaian/' . $rs->id_vendor_mengikuti_paket) . '" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i>  Penilaian</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_count->count_all_daftar_paket_tender_umum(),
			"recordsFiltered" => $this->M_count->count_filtered_daftar_paket_tender_umum(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	public function get_draft_paket_tender_terbatas()
	{
		$result = $this->M_count->gettable_daftar_paket_tender_terbatas();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			$get_nilai_pelaksanaan = $this->M_laporan_kinerja->cek_pelaksanaan_total($rs->id_vendor, $rs->id_rup);
			$get_nilai_pemeliharaan = $this->M_laporan_kinerja->cek_pemeliharaan_total($rs->id_vendor, $rs->id_rup);

			if ($get_nilai_pelaksanaan) {
				if ($get_nilai_pelaksanaan['hasil_akhir'] >= 80) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pelaksanaan['hasil_akhir'] >= 60) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pelaksanaan['hasil_akhir'] >= 40) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				} else {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				}
			} else if ($get_nilai_pemeliharaan) {
				if ($get_nilai_pemeliharaan['hasil_akhir'] >= 80) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pemeliharaan['hasil_akhir'] >= 60) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pemeliharaan['hasil_akhir'] >= 40) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				} else {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				}
			} else {
				$rating = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}

			if ($rs->nilai_vendor) {
				$nilai_vendor = $rs->nilai_vendor;
			} else {
				$nilai_vendor = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}

			$row = array();
			$row[] = '<small>' . ++$no . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_usaha . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_metode_pengadaan . '</small>';
			$row[] = '<small>' . $rating . '</small>';
			if ($get_nilai_pelaksanaan) {
				$row[] = '<small>' . $get_nilai_pelaksanaan['hasil_akhir']  . '</small>';
			} else if ($get_nilai_pemeliharaan) {
				$row[] = '<small>' . $get_nilai_pemeliharaan['hasil_akhir']  . '</small>';
			} else {
				$row[] = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}
			$row[] = '<a href="' . base_url('administrator/penilaian_kinerja/buat_penilaian/' . $rs->id_vendor_mengikuti_paket) . '" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i>  Penilaian</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_count->count_all_daftar_paket_tender_terbatas(),
			"recordsFiltered" => $this->M_count->count_filtered_daftar_paket_tender_terbatas(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_draft_paket_tender_juksung()
	{
		$result = $this->M_count->gettable_daftar_paket_tender_juksung();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			$get_nilai_pelaksanaan = $this->M_laporan_kinerja->cek_pelaksanaan_total($rs->id_vendor, $rs->id_rup);
			$get_nilai_pemeliharaan = $this->M_laporan_kinerja->cek_pemeliharaan_total($rs->id_vendor, $rs->id_rup);

			if ($get_nilai_pelaksanaan) {
				if ($get_nilai_pelaksanaan['hasil_akhir'] >= 80) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pelaksanaan['hasil_akhir'] >= 60) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pelaksanaan['hasil_akhir'] >= 40) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				} else {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				}
			} else if ($get_nilai_pemeliharaan) {
				if ($get_nilai_pemeliharaan['hasil_akhir'] >= 80) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pemeliharaan['hasil_akhir'] >= 60) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> <small> <span class="text-warning"><i class="fas fa fa-star"></i></span></small></center>';
				} else if ($get_nilai_pemeliharaan['hasil_akhir'] >= 40) {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				} else {
					$rating = '<center><small><span class="text-warning"><i class="fas fa fa-star"></i></span></small> </center>';
				}
			} else {
				$rating = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}

			if ($rs->nilai_vendor) {
				$nilai_vendor = $rs->nilai_vendor;
			} else {
				$nilai_vendor = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}

			$row = array();
			$row[] = '<small>' . ++$no . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_usaha . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_metode_pengadaan . '</small>';
			$row[] = '<small>' . $rating . '</small>';
			if ($get_nilai_pelaksanaan) {
				$row[] = '<small>' . $get_nilai_pelaksanaan['hasil_akhir']  . '</small>';
			} else if ($get_nilai_pemeliharaan) {
				$row[] = '<small>' . $get_nilai_pemeliharaan['hasil_akhir']  . '</small>';
			} else {
				$row[] = '<center><small><span class="badge bg-danger">Belum Ada Penilaian </center>';
			}
			$row[] = '<a href="' . base_url('administrator/penilaian_kinerja/buat_penilaian/' . $rs->id_vendor_mengikuti_paket) . '" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i>  Penilaian</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_count->count_all_daftar_paket_tender_juksung(),
			"recordsFiltered" => $this->M_count->count_filtered_daftar_paket_tender_juksung(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	// input satgas pelaksaaan
	public function add_pelaksanaan_satgas()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pelaksanaan_satgas($id_vendor, $id_rup);
		if ($cek_data) {
			$data =  [
				'nomor_kontrak' => $this->input->post('satgas_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('satgas_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('satgas_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('satgas_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('satgas_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('satgas_pelaksanaan_jabatan'),
				'nilai1' => $this->input->post('satgas_pelaksanaan_nilai1'),
				'nilai_angka1' => $this->input->post('satgas_pelaksanaan_nilai_angka1'),
				'nilai2' => $this->input->post('satgas_pelaksanaan_nilai2'),
				'nilai_angka2' => $this->input->post('satgas_pelaksanaan_nilai_angka2'),
				'nilai3' => $this->input->post('satgas_pelaksanaan_nilai3'),
				'nilai_angka3' => $this->input->post('satgas_pelaksanaan_nilai_angka3'),
				'nilai4' => $this->input->post('satgas_pelaksanaan_nilai4'),
				'nilai_angka4' => $this->input->post('satgas_pelaksanaan_nilai_angka4'),
				'nilai5' => $this->input->post('satgas_pelaksanaan_nilai5'),
				'nilai_angka5' => $this->input->post('satgas_pelaksanaan_nilai_angka5'),
				'penjelasan1' => $this->input->post('satgas_pelaksanaan_penjelasan1'),
				'penjelasan2' => $this->input->post('satgas_pelaksanaan_penjelasan2'),
				'penjelasan3' => $this->input->post('satgas_pelaksanaan_penjelasan3'),
				'penjelasan4' => $this->input->post('satgas_pelaksanaan_penjelasan4'),
				'penjelasan5' => $this->input->post('satgas_pelaksanaan_penjelasan5'),
				'hasil' => $this->input->post('satgas_pelaksanaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('satgas_pelaksanaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_data_satgas($data, $where);
		} else {
			$data =  [
				'nomor_kontrak' => $this->input->post('satgas_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('satgas_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('satgas_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('satgas_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('satgas_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('satgas_pelaksanaan_jabatan'),
				'nilai1' => $this->input->post('satgas_pelaksanaan_nilai1'),
				'nilai_angka1' => $this->input->post('satgas_pelaksanaan_nilai_angka1'),
				'nilai2' => $this->input->post('satgas_pelaksanaan_nilai2'),
				'nilai_angka2' => $this->input->post('satgas_pelaksanaan_nilai_angka2'),
				'nilai3' => $this->input->post('satgas_pelaksanaan_nilai3'),
				'nilai_angka3' => $this->input->post('satgas_pelaksanaan_nilai_angka3'),
				'nilai4' => $this->input->post('satgas_pelaksanaan_nilai4'),
				'nilai_angka4' => $this->input->post('satgas_pelaksanaan_nilai_angka4'),
				'nilai5' => $this->input->post('satgas_pelaksanaan_nilai5'),
				'nilai_angka5' => $this->input->post('satgas_pelaksanaan_nilai_angka5'),
				'penjelasan1' => $this->input->post('satgas_pelaksanaan_penjelasan1'),
				'penjelasan2' => $this->input->post('satgas_pelaksanaan_penjelasan2'),
				'penjelasan3' => $this->input->post('satgas_pelaksanaan_penjelasan3'),
				'penjelasan4' => $this->input->post('satgas_pelaksanaan_penjelasan4'),
				'penjelasan5' => $this->input->post('satgas_pelaksanaan_penjelasan5'),
				'hasil' => $this->input->post('satgas_pelaksanaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('satgas_pelaksanaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->input_data_satgas($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	// input pelaksanaan manager
	public function add_pelaksanaan_manager()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pelaksanaan_manager($id_vendor, $id_rup);
		if ($cek_data) {
			$data = [
				'nomor_kontrak' => $this->input->post('manager_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('manager_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('manager_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('manager_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('manager_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('manager_pelaksanaan_jabatan'),
				'nilai1' => $this->input->post('manager_pelaksanaan_nilai1'),
				'nilai_angka1' => $this->input->post('manager_pelaksanaan_nilai_angka1'),
				'nilai2' => $this->input->post('manager_pelaksanaan_nilai2'),
				'nilai_angka2' => $this->input->post('manager_pelaksanaan_nilai_angka2'),
				'nilai3' => $this->input->post('manager_pelaksanaan_nilai3'),
				'nilai_angka3' => $this->input->post('manager_pelaksanaan_nilai_angka3'),
				'nilai4' => $this->input->post('manager_pelaksanaan_nilai4'),
				'nilai_angka4' => $this->input->post('manager_pelaksanaan_nilai_angka4'),
				'nilai5' => $this->input->post('manager_pelaksanaan_nilai5'),
				'nilai_angka5' => $this->input->post('manager_pelaksanaan_nilai_angka5'),
				'penjelasan1' => $this->input->post('manager_pelaksanaan_penjelasan1'),
				'penjelasan2' => $this->input->post('manager_pelaksanaan_penjelasan2'),
				'penjelasan3' => $this->input->post('manager_pelaksanaan_penjelasan3'),
				'penjelasan4' => $this->input->post('manager_pelaksanaan_penjelasan4'),
				'penjelasan5' => $this->input->post('manager_pelaksanaan_penjelasan5'),
				'hasil' => $this->input->post('manager_pelaksanaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('manager_pelaksanaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_data_manager($data, $where);
		} else {
			$data = [
				'nomor_kontrak' => $this->input->post('manager_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('manager_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('manager_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('manager_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('manager_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('manager_pelaksanaan_jabatan'),
				'nilai1' => $this->input->post('manager_pelaksanaan_nilai1'),
				'nilai_angka1' => $this->input->post('manager_pelaksanaan_nilai_angka1'),
				'nilai2' => $this->input->post('manager_pelaksanaan_nilai2'),
				'nilai_angka2' => $this->input->post('manager_pelaksanaan_nilai_angka2'),
				'nilai3' => $this->input->post('manager_pelaksanaan_nilai3'),
				'nilai_angka3' => $this->input->post('manager_pelaksanaan_nilai_angka3'),
				'nilai4' => $this->input->post('manager_pelaksanaan_nilai4'),
				'nilai_angka4' => $this->input->post('manager_pelaksanaan_nilai_angka4'),
				'nilai5' => $this->input->post('manager_pelaksanaan_nilai5'),
				'nilai_angka5' => $this->input->post('manager_pelaksanaan_nilai_angka5'),
				'penjelasan1' => $this->input->post('manager_pelaksanaan_penjelasan1'),
				'penjelasan2' => $this->input->post('manager_pelaksanaan_penjelasan2'),
				'penjelasan3' => $this->input->post('manager_pelaksanaan_penjelasan3'),
				'penjelasan4' => $this->input->post('manager_pelaksanaan_penjelasan4'),
				'penjelasan5' => $this->input->post('manager_pelaksanaan_penjelasan5'),
				'hasil' => $this->input->post('manager_pelaksanaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('manager_pelaksanaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->input_data_manager($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// input pelaksanaan depthead
	public function add_pelaksanaan_depthead()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pelaksanaan_depthead($id_vendor, $id_rup);
		if ($cek_data) {
			$data = [
				'nomor_kontrak' => $this->input->post('depthead_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('depthead_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('depthead_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('depthead_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('depthead_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('depthead_pelaksanaan_jabatan'),
				'nilai1' => $this->input->post('depthead_pelaksanaan_nilai1'),
				'nilai_angka1' => $this->input->post('depthead_pelaksanaan_nilai_angka1'),
				'nilai2' => $this->input->post('depthead_pelaksanaan_nilai2'),
				'nilai_angka2' => $this->input->post('depthead_pelaksanaan_nilai_angka2'),
				'nilai3' => $this->input->post('depthead_pelaksanaan_nilai3'),
				'nilai_angka3' => $this->input->post('depthead_pelaksanaan_nilai_angka3'),
				'nilai4' => $this->input->post('depthead_pelaksanaan_nilai4'),
				'nilai_angka4' => $this->input->post('depthead_pelaksanaan_nilai_angka4'),
				'nilai5' => $this->input->post('depthead_pelaksanaan_nilai5'),
				'nilai_angka5' => $this->input->post('depthead_pelaksanaan_nilai_angka5'),
				'penjelasan1' => $this->input->post('depthead_pelaksanaan_penjelasan1'),
				'penjelasan2' => $this->input->post('depthead_pelaksanaan_penjelasan2'),
				'penjelasan3' => $this->input->post('depthead_pelaksanaan_penjelasan3'),
				'penjelasan4' => $this->input->post('depthead_pelaksanaan_penjelasan4'),
				'penjelasan5' => $this->input->post('depthead_pelaksanaan_penjelasan5'),
				'hasil' => $this->input->post('depthead_pelaksanaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('depthead_pelaksanaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_data_depthead($data, $where);
		} else {
			$data = [
				'nomor_kontrak' => $this->input->post('depthead_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('depthead_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('depthead_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('depthead_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('depthead_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('depthead_pelaksanaan_jabatan'),
				'nilai1' => $this->input->post('depthead_pelaksanaan_nilai1'),
				'nilai_angka1' => $this->input->post('depthead_pelaksanaan_nilai_angka1'),
				'nilai2' => $this->input->post('depthead_pelaksanaan_nilai2'),
				'nilai_angka2' => $this->input->post('depthead_pelaksanaan_nilai_angka2'),
				'nilai3' => $this->input->post('depthead_pelaksanaan_nilai3'),
				'nilai_angka3' => $this->input->post('depthead_pelaksanaan_nilai_angka3'),
				'nilai4' => $this->input->post('depthead_pelaksanaan_nilai4'),
				'nilai_angka4' => $this->input->post('depthead_pelaksanaan_nilai_angka4'),
				'nilai5' => $this->input->post('depthead_pelaksanaan_nilai5'),
				'nilai_angka5' => $this->input->post('depthead_pelaksanaan_nilai_angka5'),
				'penjelasan1' => $this->input->post('depthead_pelaksanaan_penjelasan1'),
				'penjelasan2' => $this->input->post('depthead_pelaksanaan_penjelasan2'),
				'penjelasan3' => $this->input->post('depthead_pelaksanaan_penjelasan3'),
				'penjelasan4' => $this->input->post('depthead_pelaksanaan_penjelasan4'),
				'penjelasan5' => $this->input->post('depthead_pelaksanaan_penjelasan5'),
				'hasil' => $this->input->post('depthead_pelaksanaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('depthead_pelaksanaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->input_data_depthead($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// total pelaksanaan

	public function add_pelaksanaan_total()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pelaksanaan_total($id_vendor, $id_rup);
		if ($cek_data) {
			$data =  [
				'nomor_kontrak' => $this->input->post('total_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('total_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('total_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('total_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('total_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('total_pelaksanaan_jabatan'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_total_pelaksanaan($data, $where);
		} else {
			$data =  [
				'nomor_kontrak' => $this->input->post('total_pelaksanaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('total_pelaksanaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('total_pelaksanaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('total_pelaksanaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('total_pelaksanaan_nama_penilai'),
				'jabatan' => $this->input->post('total_pelaksanaan_jabatan'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->insert_total_pelaksanaan($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update_pelaksanaan_penilaian()
	{
		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$satgas =  $this->M_laporan_kinerja->cek_pelaksanaan_satgas($id_vendor, $id_rup);
		$manger =  $this->M_laporan_kinerja->cek_pelaksanaan_manager($id_vendor, $id_rup);
		$depthead =  $this->M_laporan_kinerja->cek_pelaksanaan_depthead($id_vendor, $id_rup);
		if ($satgas && $manger && $depthead) {
			$total =  $this->M_laporan_kinerja->cek_pelaksanaan_total($id_vendor, $id_rup);

			$nilai1 = $satgas['nilai_angka1'] + $manger['nilai_angka1'] + $depthead['nilai_angka1'];
			$nilai2 = $satgas['nilai_angka2'] + $manger['nilai_angka2'] + $depthead['nilai_angka2'];
			$nilai3 = $satgas['nilai_angka3'] + $manger['nilai_angka3'] + $depthead['nilai_angka3'];
			$nilai4 = $satgas['nilai_angka4'] + $manger['nilai_angka4'] + $depthead['nilai_angka4'];
			$nilai5 = $satgas['nilai_angka5'] + $manger['nilai_angka5'] + $depthead['nilai_angka5'];

			$nilai_rata_rata1 = $nilai1 / 3;
			$nilai_rata_rata2 = $nilai2 / 3;
			$nilai_rata_rata3 = $nilai3 / 3;
			$nilai_rata_rata4 = $nilai4 / 3;
			$nilai_rata_rata5 = $nilai5 / 3;


			$nilai_terbobot1 = $nilai_rata_rata1 * 0.35;
			$nilai_terbobot2 = $nilai_rata_rata2 * 0.2;
			$nilai_terbobot3 = $nilai_rata_rata3 * 0.25;
			$nilai_terbobot4 = $nilai_rata_rata4 * 0.10;
			$nilai_terbobot5 = $nilai_rata_rata5 * 0.10;

			$total_akhir = $nilai_terbobot1 + $nilai_terbobot2 + $nilai_terbobot3 + $nilai_terbobot4 + $nilai_terbobot5;


			if ($total_akhir >= 90) {
				$predikat = 'A';
			} else if ($total_akhir >= 80 && $total_akhir <= 89) {
				$predikat = 'B';
			} else if ($total_akhir >= 60 && $total_akhir <= 79) {
				$predikat = 'C';
			} else if ($total_akhir <= 60) {
				$predikat = 'D';
			} else {
				$predikat = 'Tidak Diketahui';
			}

			$data = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
				'nilai_rata_rata1' =>  round($nilai_rata_rata1, 2),
				'nilai_rata_rata2' => round($nilai_rata_rata2, 2),
				'nilai_rata_rata3' => round($nilai_rata_rata3, 2),
				'nilai_rata_rata4' => round($nilai_rata_rata4, 2),
				'nilai_rata_rata5' => round($nilai_rata_rata5, 2),

				'nilai_terbobot1' => round($nilai_terbobot1, 2),
				'nilai_terbobot2' => round($nilai_terbobot2, 2),
				'nilai_terbobot3' => round($nilai_terbobot3, 2),
				'nilai_terbobot4' => round($nilai_terbobot4, 2),
				'nilai_terbobot5' => round($nilai_terbobot5, 2),

				'hasil_akhir' => round($total_akhir, 2),
				'hasil_predikat' => $predikat
			];

			if ($total) {
				$where = [
					'id_vendor' => $id_vendor,
					'id_rup' => $id_rup
				];
				$this->M_laporan_kinerja->update_total_pelaksanaan($data, $where);
			} else {
				$this->M_laporan_kinerja->insert_total_pelaksanaan($data);
			}
		} else {
			return 0;
		}
	}

	// =============== PEMELIHARAAN ============== //


	public function add_pemeliharaan_satgas()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pemeliharaan_satgas($id_vendor, $id_rup);
		if ($cek_data) {
			$data = [
				'nomor_kontrak' => $this->input->post('satgas_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('satgas_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('satgas_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('satgas_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('satgas_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('satgas_pemeliharaan_jabatan'),
				'nilai1' => $this->input->post('satgas_pemeliharaan_nilai1'),
				'nilai_angka1' => $this->input->post('satgas_pemeliharaan_nilai_angka1'),
				'nilai2' => $this->input->post('satgas_pemeliharaan_nilai2'),
				'nilai_angka2' => $this->input->post('satgas_pemeliharaan_nilai_angka2'),
				'nilai3' => $this->input->post('satgas_pemeliharaan_nilai3'),
				'nilai_angka3' => $this->input->post('satgas_pemeliharaan_nilai_angka3'),
				'nilai4' => $this->input->post('satgas_pemeliharaan_nilai4'),
				'nilai_angka4' => $this->input->post('satgas_pemeliharaan_nilai_angka4'),
				'nilai5' => $this->input->post('satgas_pemeliharaan_nilai5'),
				'nilai_angka5' => $this->input->post('satgas_pemeliharaan_nilai_angka5'),
				'nilai6' => $this->input->post('satgas_pemeliharaan_nilai6'),
				'nilai_angka6' => $this->input->post('satgas_pemeliharaan_nilai_angka6'),
				'penjelasan1' => $this->input->post('satgas_pemeliharaan_penjelasan1'),
				'penjelasan2' => $this->input->post('satgas_pemeliharaan_penjelasan2'),
				'penjelasan3' => $this->input->post('satgas_pemeliharaan_penjelasan3'),
				'penjelasan4' => $this->input->post('satgas_pemeliharaan_penjelasan4'),
				'penjelasan5' => $this->input->post('satgas_pemeliharaan_penjelasan5'),
				'penjelasan6' => $this->input->post('satgas_pemeliharaan_penjelasan6'),
				'hasil' => $this->input->post('satgas_pemeliharaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('satgas_pemeliharaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_data_satgas_pemeliharaan($data, $where);
		} else {
			$data = [
				'nomor_kontrak' => $this->input->post('satgas_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('satgas_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('satgas_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('satgas_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('satgas_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('satgas_pemeliharaan_jabatan'),
				'nilai1' => $this->input->post('satgas_pemeliharaan_nilai1'),
				'nilai_angka1' => $this->input->post('satgas_pemeliharaan_nilai_angka1'),
				'nilai2' => $this->input->post('satgas_pemeliharaan_nilai2'),
				'nilai_angka2' => $this->input->post('satgas_pemeliharaan_nilai_angka2'),
				'nilai3' => $this->input->post('satgas_pemeliharaan_nilai3'),
				'nilai_angka3' => $this->input->post('satgas_pemeliharaan_nilai_angka3'),
				'nilai4' => $this->input->post('satgas_pemeliharaan_nilai4'),
				'nilai_angka4' => $this->input->post('satgas_pemeliharaan_nilai_angka4'),
				'nilai5' => $this->input->post('satgas_pemeliharaan_nilai5'),
				'nilai_angka5' => $this->input->post('satgas_pemeliharaan_nilai_angka5'),
				'nilai6' => $this->input->post('satgas_pemeliharaan_nilai6'),
				'nilai_angka6' => $this->input->post('satgas_pemeliharaan_nilai_angka6'),
				'penjelasan1' => $this->input->post('satgas_pemeliharaan_penjelasan1'),
				'penjelasan2' => $this->input->post('satgas_pemeliharaan_penjelasan2'),
				'penjelasan3' => $this->input->post('satgas_pemeliharaan_penjelasan3'),
				'penjelasan4' => $this->input->post('satgas_pemeliharaan_penjelasan4'),
				'penjelasan5' => $this->input->post('satgas_pemeliharaan_penjelasan5'),
				'penjelasan6' => $this->input->post('satgas_pemeliharaan_penjelasan6'),
				'hasil' => $this->input->post('satgas_pemeliharaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('satgas_pemeliharaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->input_data_satgas_pemeliharaan($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	public function add_pemeliharaan_manager()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pemeliharaan_manager($id_vendor, $id_rup);
		if ($cek_data) {
			$data = [
				'nomor_kontrak' => $this->input->post('manager_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('manager_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('manager_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('manager_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('manager_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('manager_pemeliharaan_jabatan'),
				'nilai1' => $this->input->post('manager_pemeliharaan_nilai1'),
				'nilai_angka1' => $this->input->post('manager_pemeliharaan_nilai_angka1'),
				'nilai2' => $this->input->post('manager_pemeliharaan_nilai2'),
				'nilai_angka2' => $this->input->post('manager_pemeliharaan_nilai_angka2'),
				'nilai3' => $this->input->post('manager_pemeliharaan_nilai3'),
				'nilai_angka3' => $this->input->post('manager_pemeliharaan_nilai_angka3'),
				'nilai4' => $this->input->post('manager_pemeliharaan_nilai4'),
				'nilai_angka4' => $this->input->post('manager_pemeliharaan_nilai_angka4'),
				'nilai5' => $this->input->post('manager_pemeliharaan_nilai5'),
				'nilai_angka5' => $this->input->post('manager_pemeliharaan_nilai_angka5'),
				'nilai6' => $this->input->post('manager_pemeliharaan_nilai6'),
				'nilai_angka6' => $this->input->post('manager_pemeliharaan_nilai_angka6'),
				'penjelasan1' => $this->input->post('manager_pemeliharaan_penjelasan1'),
				'penjelasan2' => $this->input->post('manager_pemeliharaan_penjelasan2'),
				'penjelasan3' => $this->input->post('manager_pemeliharaan_penjelasan3'),
				'penjelasan4' => $this->input->post('manager_pemeliharaan_penjelasan4'),
				'penjelasan5' => $this->input->post('manager_pemeliharaan_penjelasan5'),
				'penjelasan6' => $this->input->post('manager_pemeliharaan_penjelasan6'),
				'hasil' => $this->input->post('manager_pemeliharaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('manager_pemeliharaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_data_manager_pemeliharaan($data, $where);
		} else {
			$data = [
				'nomor_kontrak' => $this->input->post('manager_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('manager_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('manager_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('manager_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('manager_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('manager_pemeliharaan_jabatan'),
				'nilai1' => $this->input->post('manager_pemeliharaan_nilai1'),
				'nilai_angka1' => $this->input->post('manager_pemeliharaan_nilai_angka1'),
				'nilai2' => $this->input->post('manager_pemeliharaan_nilai2'),
				'nilai_angka2' => $this->input->post('manager_pemeliharaan_nilai_angka2'),
				'nilai3' => $this->input->post('manager_pemeliharaan_nilai3'),
				'nilai_angka3' => $this->input->post('manager_pemeliharaan_nilai_angka3'),
				'nilai4' => $this->input->post('manager_pemeliharaan_nilai4'),
				'nilai_angka4' => $this->input->post('manager_pemeliharaan_nilai_angka4'),
				'nilai5' => $this->input->post('manager_pemeliharaan_nilai5'),
				'nilai_angka5' => $this->input->post('manager_pemeliharaan_nilai_angka5'),
				'nilai6' => $this->input->post('manager_pemeliharaan_nilai6'),
				'nilai_angka6' => $this->input->post('manager_pemeliharaan_nilai_angka6'),
				'penjelasan1' => $this->input->post('manager_pemeliharaan_penjelasan1'),
				'penjelasan2' => $this->input->post('manager_pemeliharaan_penjelasan2'),
				'penjelasan3' => $this->input->post('manager_pemeliharaan_penjelasan3'),
				'penjelasan4' => $this->input->post('manager_pemeliharaan_penjelasan4'),
				'penjelasan5' => $this->input->post('manager_pemeliharaan_penjelasan5'),
				'penjelasan6' => $this->input->post('manager_pemeliharaan_penjelasan6'),
				'hasil' => $this->input->post('manager_pemeliharaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('manager_pemeliharaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->input_data_manager_pemeliharaan($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function add_pemeliharaan_depthead()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pemeliharaan_depthead($id_vendor, $id_rup);
		if ($cek_data) {
			$data = [
				'nomor_kontrak' => $this->input->post('depthead_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('depthead_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('depthead_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('depthead_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('depthead_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('depthead_pemeliharaan_jabatan'),
				'nilai1' => $this->input->post('depthead_pemeliharaan_nilai1'),
				'nilai_angka1' => $this->input->post('depthead_pemeliharaan_nilai_angka1'),
				'nilai2' => $this->input->post('depthead_pemeliharaan_nilai2'),
				'nilai_angka2' => $this->input->post('depthead_pemeliharaan_nilai_angka2'),
				'nilai3' => $this->input->post('depthead_pemeliharaan_nilai3'),
				'nilai_angka3' => $this->input->post('depthead_pemeliharaan_nilai_angka3'),
				'nilai4' => $this->input->post('depthead_pemeliharaan_nilai4'),
				'nilai_angka4' => $this->input->post('depthead_pemeliharaan_nilai_angka4'),
				'nilai5' => $this->input->post('depthead_pemeliharaan_nilai5'),
				'nilai_angka5' => $this->input->post('depthead_pemeliharaan_nilai_angka5'),
				'nilai6' => $this->input->post('depthead_pemeliharaan_nilai6'),
				'nilai_angka6' => $this->input->post('depthead_pemeliharaan_nilai_angka6'),
				'penjelasan1' => $this->input->post('depthead_pemeliharaan_penjelasan1'),
				'penjelasan2' => $this->input->post('depthead_pemeliharaan_penjelasan2'),
				'penjelasan3' => $this->input->post('depthead_pemeliharaan_penjelasan3'),
				'penjelasan4' => $this->input->post('depthead_pemeliharaan_penjelasan4'),
				'penjelasan5' => $this->input->post('depthead_pemeliharaan_penjelasan5'),
				'penjelasan6' => $this->input->post('depthead_pemeliharaan_penjelasan6'),
				'hasil' => $this->input->post('depthead_pemeliharaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('depthead_pemeliharaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_data_depthead_pemeliharaan($data, $where);
		} else {
			$data = [
				'nomor_kontrak' => $this->input->post('depthead_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('depthead_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('depthead_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('depthead_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('depthead_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('depthead_pemeliharaan_jabatan'),
				'nilai1' => $this->input->post('depthead_pemeliharaan_nilai1'),
				'nilai_angka1' => $this->input->post('depthead_pemeliharaan_nilai_angka1'),
				'nilai2' => $this->input->post('depthead_pemeliharaan_nilai2'),
				'nilai_angka2' => $this->input->post('depthead_pemeliharaan_nilai_angka2'),
				'nilai3' => $this->input->post('depthead_pemeliharaan_nilai3'),
				'nilai_angka3' => $this->input->post('depthead_pemeliharaan_nilai_angka3'),
				'nilai4' => $this->input->post('depthead_pemeliharaan_nilai4'),
				'nilai_angka4' => $this->input->post('depthead_pemeliharaan_nilai_angka4'),
				'nilai5' => $this->input->post('depthead_pemeliharaan_nilai5'),
				'nilai_angka5' => $this->input->post('depthead_pemeliharaan_nilai_angka5'),
				'nilai6' => $this->input->post('depthead_pemeliharaan_nilai6'),
				'nilai_angka6' => $this->input->post('depthead_pemeliharaan_nilai_angka6'),
				'penjelasan1' => $this->input->post('depthead_pemeliharaan_penjelasan1'),
				'penjelasan2' => $this->input->post('depthead_pemeliharaan_penjelasan2'),
				'penjelasan3' => $this->input->post('depthead_pemeliharaan_penjelasan3'),
				'penjelasan4' => $this->input->post('depthead_pemeliharaan_penjelasan4'),
				'penjelasan5' => $this->input->post('depthead_pemeliharaan_penjelasan5'),
				'penjelasan6' => $this->input->post('depthead_pemeliharaan_penjelasan6'),
				'hasil' => $this->input->post('depthead_pemeliharaan_hasil_angka'),
				'hasil_huruf' => $this->input->post('depthead_pemeliharaan_hasil'),
				'user_created' => $this->session->userdata('nama_pegawai'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->input_data_depthead_pemeliharaan($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// update pemeliharaan total
	public function add_pemeliharaan_total()
	{

		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$cek_data = $this->M_laporan_kinerja->cek_pemeliharaan_total($id_vendor, $id_rup);
		if ($cek_data) {
			$data = [
				'nomor_kontrak' => $this->input->post('total_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('total_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('total_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('total_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('total_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('total_pemeliharaan_jabatan'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$where = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->update_total_pemeliharaan($data, $where);
		} else {
			$data = [
				'nomor_kontrak' => $this->input->post('total_pemeliharaan_nomor_kontrak'),
				'periode_kontrak' => $this->input->post('total_pemeliharaan_periode_kontrak'),
				'waktu_penilaian' => $this->input->post('total_pemeliharaan_waktu_penilaian'),
				'periode_penilaian' => $this->input->post('total_pemeliharaan_periode_penilaian'),
				'nama_penilai' => $this->input->post('total_pemeliharaan_nama_penilai'),
				'jabatan' => $this->input->post('total_pemeliharaan_jabatan'),
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
			];
			$this->M_laporan_kinerja->insert_total_pemeliharaan($data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update_pemeliharaan_penilaian()
	{
		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$satgas = $this->M_laporan_kinerja->cek_pemeliharaan_satgas($id_vendor, $id_rup);
		$manger = $this->M_laporan_kinerja->cek_pemeliharaan_manager($id_vendor, $id_rup);
		$depthead = $this->M_laporan_kinerja->cek_pemeliharaan_depthead($id_vendor, $id_rup);
		if ($satgas && $manger && $depthead) {
			$total = $this->M_laporan_kinerja->cek_pemeliharaan_total($id_vendor, $id_rup);

			$nilai1 = $satgas['nilai_angka1'] + $manger['nilai_angka1'] + $depthead['nilai_angka1'];
			$nilai2 = $satgas['nilai_angka2'] + $manger['nilai_angka2'] + $depthead['nilai_angka2'];
			$nilai3 = $satgas['nilai_angka3'] + $manger['nilai_angka3'] + $depthead['nilai_angka3'];
			$nilai4 = $satgas['nilai_angka4'] + $manger['nilai_angka4'] + $depthead['nilai_angka4'];
			$nilai5 = $satgas['nilai_angka5'] + $manger['nilai_angka5'] + $depthead['nilai_angka5'];
			$nilai6 = $satgas['nilai_angka6'] + $manger['nilai_angka6'] + $depthead['nilai_angka6'];

			$nilai_rata_rata1 = $nilai1 / 3;
			$nilai_rata_rata2 = $nilai2 / 3;
			$nilai_rata_rata3 = $nilai3 / 3;
			$nilai_rata_rata4 = $nilai4 / 3;
			$nilai_rata_rata5 = $nilai5 / 3;
			$nilai_rata_rata6 = $nilai6 / 3;


			$nilai_terbobot1 = $nilai_rata_rata1 * 0.35;
			$nilai_terbobot2 = $nilai_rata_rata2 * 0.15;
			$nilai_terbobot3 = $nilai_rata_rata3 * 0.20;
			$nilai_terbobot4 = $nilai_rata_rata4 * 0.10;
			$nilai_terbobot5 = $nilai_rata_rata5 * 0.15;
			$nilai_terbobot6 = $nilai_rata_rata6 * 0.5;

			$total_akhir = $nilai_terbobot1 + $nilai_terbobot2 + $nilai_terbobot3 + $nilai_terbobot4 + $nilai_terbobot5;


			if ($total_akhir >= 90) {
				$predikat = 'A';
			} else if ($total_akhir >= 80 && $total_akhir <= 89) {
				$predikat = 'B';
			} else if ($total_akhir >= 60 && $total_akhir <= 79) {
				$predikat = 'C';
			} else if ($total_akhir <= 60) {
				$predikat = 'D';
			} else {
				$predikat = 'Tidak Diketahui';
			}
			$data = [
				'id_vendor' => $id_vendor,
				'id_rup' => $id_rup,
				'nilai_rata_rata1' => round($nilai_rata_rata1, 2),
				'nilai_rata_rata2' => round($nilai_rata_rata2, 2),
				'nilai_rata_rata3' => round($nilai_rata_rata3, 2),
				'nilai_rata_rata4' => round($nilai_rata_rata4, 2),
				'nilai_rata_rata5' => round($nilai_rata_rata5, 2),
				'nilai_rata_rata6' => round($nilai_rata_rata6, 2),

				'nilai_terbobot1' => round($nilai_terbobot1, 2),
				'nilai_terbobot2' => round($nilai_terbobot2, 2),
				'nilai_terbobot3' => round($nilai_terbobot3, 2),
				'nilai_terbobot4' => round($nilai_terbobot4, 2),
				'nilai_terbobot5' => round($nilai_terbobot5, 2),
				'nilai_terbobot6' => round($nilai_terbobot6, 2),

				'hasil_akhir' => round($total_akhir, 2),
				'hasil_predikat' => $predikat
			];

			if ($total) {
				$where = [
					'id_vendor' => $id_vendor,
					'id_rup' => $id_rup
				];
				$this->M_laporan_kinerja->update_total_pemeliharaan($data, $where);
			} else {
				$this->M_laporan_kinerja->insert_total_pemeliharaan($data);
			}
		} else {
			return 0;
		}
	}

	// end update pemeliharaan total

	public function update_nilai_vendor()
	{

		// value nilai_vendor
		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$count_pelaksanaan_total = $this->M_laporan_kinerja->count_pelaksanaan_total($id_vendor, $id_rup);
		$count_pemeliharaan_total = $this->M_laporan_kinerja->count_pemeliharaan_total($id_vendor, $id_rup);

		$result_pelaksanaan_total = $this->M_laporan_kinerja->result_pelaksanaan_total($id_vendor, $id_rup);
		$result_pemeliharaan_total = $this->M_laporan_kinerja->result_pemeliharaan_total($id_vendor, $id_rup);

		$total_penilaian = $count_pelaksanaan_total + $count_pemeliharaan_total;

		$a = array($result_pelaksanaan_total['hasil_akhir_pelaksanaan'], $result_pemeliharaan_total['hasil_akhir_pemeliharaan']);
		$total_sum = array_sum($a);
		$total_final = $total_sum / $total_penilaian;

		$data = [
			'nilai_vendor' => $total_final
		];

		$where = [
			'id_vendor' => $id_vendor
		];

		$this->M_laporan_kinerja->update_ke_vendor($data, $where);
	}

	public function print_pelaksanaan_satgas($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pelaksanaan_byid($id_penilaian_vendor, 'satgas');
		$this->load->view('administrator/penilaian_kinerja/print_penilaian', $data);
	}

	public function print_pelaksanaan_manager($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pelaksanaan_byid($id_penilaian_vendor, 'manager');
		$this->load->view('administrator/penilaian_kinerja/print_penilaian', $data);
	}

	public function print_pelaksanaan_depthead($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pelaksanaan_byid($id_penilaian_vendor, 'depthead');
		$this->load->view('administrator/penilaian_kinerja/print_penilaian', $data);
	}

	public function print_pelaksanaan_total($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pelaksanaan_byid($id_penilaian_vendor, 'total');

		$id_vendor = $data['get_penilaian']['id_vendor'];
		$id_rup = $data['get_penilaian']['id_rup'];
		$data['get_pelaksanaan_satgas'] =  $this->M_laporan_kinerja->cek_pelaksanaan_satgas($id_vendor, $id_rup);
		$data['get_pelaksanaan_manager'] =  $this->M_laporan_kinerja->cek_pelaksanaan_manager($id_vendor, $id_rup);
		$data['get_pelaksanaan_depthead'] =  $this->M_laporan_kinerja->cek_pelaksanaan_depthead($id_vendor, $id_rup);
		$this->load->view('administrator/penilaian_kinerja/print_penilaian_total', $data);
	}

	public function print_pemeliharaan_satgas($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pemeliharaan_byid($id_penilaian_vendor, 'satgas');
		$this->load->view('administrator/penilaian_kinerja/print_penilaian_pemeliharaan', $data);
	}

	public function print_pemeliharaan_manager($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pemeliharaan_byid($id_penilaian_vendor, 'manager');
		$this->load->view('administrator/penilaian_kinerja/print_penilaian_pemeliharaan', $data);
	}

	public function print_pemeliharaan_depthead($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pemeliharaan_byid($id_penilaian_vendor, 'depthead');
		$this->load->view('administrator/penilaian_kinerja/print_penilaian_pemeliharaan', $data);
	}

	public function print_pemeliharaan_total($id_penilaian_vendor = 0)
	{
		$data['get_penilaian'] =  $this->M_laporan_kinerja->get_penilaian_pemeliharaan_byid($id_penilaian_vendor, 'total');

		$id_vendor = $data['get_penilaian']['id_vendor'];
		$id_rup = $data['get_penilaian']['id_rup'];
		$data['get_pemeliharaan_satgas'] =  $this->M_laporan_kinerja->cek_pemeliharaan_satgas($id_vendor, $id_rup);
		$data['get_pemeliharaan_manager'] =  $this->M_laporan_kinerja->cek_pemeliharaan_manager($id_vendor, $id_rup);
		$data['get_pemeliharaan_depthead'] =  $this->M_laporan_kinerja->cek_pemeliharaan_depthead($id_vendor, $id_rup);
		$this->load->view('administrator/penilaian_kinerja/print_penilaian_pemeliharaan_total', $data);
	}

	public function get_penilaian()
	{
		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup');

		$data = [
			'get_pelaksanaan_satgas' => $this->M_laporan_kinerja->cek_pelaksanaan_satgas($id_vendor, $id_rup),
			'get_pelaksanaan_manager' => $this->M_laporan_kinerja->cek_pelaksanaan_manager($id_vendor, $id_rup),
			'get_pelaksanaan_depthead' => $this->M_laporan_kinerja->cek_pelaksanaan_depthead($id_vendor, $id_rup),
			'get_pelaksanaan_total' => $this->M_laporan_kinerja->cek_pelaksanaan_total($id_vendor, $id_rup),

			'get_pemeliharaan_satgas' => $this->M_laporan_kinerja->cek_pemeliharaan_satgas($id_vendor, $id_rup),
			'get_pemeliharaan_manager' => $this->M_laporan_kinerja->cek_pemeliharaan_manager($id_vendor, $id_rup),
			'get_pemeliharaan_depthead' => $this->M_laporan_kinerja->cek_pemeliharaan_depthead($id_vendor, $id_rup),
			'get_pemeliharaan_total' => $this->M_laporan_kinerja->cek_pemeliharaan_total($id_vendor, $id_rup),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
