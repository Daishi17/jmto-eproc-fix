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
		$data['count_tender_umum'] = $this->M_count->count_tender_umum_area($row_management_user);
		$data['count_tender_terbatas'] = $this->M_count->count_tender_terbatas_unit_area($row_management_user);
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
		// INI UNTUK PEKERJAAN KONTRUKSI
		$data['kontruksi_1'] = $this->M_count->get_penilaian_kinerja_kontruksi_1();
		$data['kontruksi_2'] = $this->M_count->get_penilaian_kinerja_kontruksi_2();
		$data['kontruksi_3'] = $this->M_count->get_penilaian_kinerja_kontruksi_3();
		$data['kontruksi_4'] = $this->M_count->get_penilaian_kinerja_kontruksi_4();
		$data['kontruksi_5'] = $this->M_count->get_penilaian_kinerja_kontruksi_5();
		$data['kontruksi_6'] = $this->M_count->get_penilaian_kinerja_kontruksi_6();
		$data['kontruksi_7'] = $this->M_count->get_penilaian_kinerja_kontruksi_7();
		$data['kontruksi_8'] = $this->M_count->get_penilaian_kinerja_kontruksi_8();
		$data['kontruksi_9'] = $this->M_count->get_penilaian_kinerja_kontruksi_9();
		$data['kontruksi_10'] = $this->M_count->get_penilaian_kinerja_kontruksi_10();
		$data['kontruksi_11'] = $this->M_count->get_penilaian_kinerja_kontruksi_11();
		$data['kontruksi_12'] = $this->M_count->get_penilaian_kinerja_kontruksi_12();
		$data['kontruksi_13'] = $this->M_count->get_penilaian_kinerja_kontruksi_13();
		$data['kontruksi_14'] = $this->M_count->get_penilaian_kinerja_kontruksi_14();
		$data['kontruksi_15'] = $this->M_count->get_penilaian_kinerja_kontruksi_15();
		$data['kontruksi_16'] = $this->M_count->get_penilaian_kinerja_kontruksi_16();
		$data['kontruksi_17'] = $this->M_count->get_penilaian_kinerja_kontruksi_17();
		$data['cek_jika_ada_kontruksi_1'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_1($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_2'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_2($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_3'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_3($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_4'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_4($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_5'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_5($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_6'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_6($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_7'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_7($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_8'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_8($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_9'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_9($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_10'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_10($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_11'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_11($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_12'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_12($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_13'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_13($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_14'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_14($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_15'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_15($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_16'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_16($id_rup, $id_vendor);
		$data['cek_jika_ada_kontruksi_17'] = $this->Penilaian_vendor_model->cek_jika_ada_penilaian_kontruksi_17($id_rup, $id_vendor);
		$data['jika_sudah_di_tambah_pekerjaan_kontruksi'] = $this->Penilaian_vendor_model->jika_sudah_di_tambah_pekerjaan_kontruksi($id_rup, $id_vendor);
		// END PEKERJAAN KONTRUKSI


		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/penilaian_kinerja/buat_penilaian', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/penilaian_kinerja/ajax', $data);
	}


	public function get_draft_paket_tender_umum()
	{
		$result = $this->M_count->gettable_daftar_paket_tender_umum();
		$data = [];
		$no = $_POST['start'];
		$now = date('Y-m-d H:i');
		foreach ($result as $rs) {
			$jadwal_terakhir = $this->M_jadwal->jadwal_pra_umum_22($rs->id_rup);
			$row = array();
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->nama_usaha . '</small>';
			if ($rs->nilai_penawaran_vendor == NULL) {
				$row[] = '<small class="badge bg-danger">Belum Ada Penawaran</small>';
			} else {
				$row[] = '<small>' . "Rp " . number_format($rs->nilai_penawaran_vendor, 2, ',', '.') . '</small>';
			}
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_metode_pengadaan . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<a href="' . base_url('administrator/penilaian_kinerja/buat_penilaian/' . $rs->id_vendor_mengikuti_paket) . '" class="btn btn-sm btn-info">Penilaian</a>';
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

	// INI BAGIAN BARU PEKERJAAN KONTRUKSI
	public function tambah_warning_pekerjaan_kontruksisaya()
	{
		$id_rup = $this->input->post('id_rup', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_kontruksi = $this->input->post('indikator_pekerjaan_kontruksi', TRUE);
		$bobot_pekerjaan_kontruksi = $this->input->post('bobot_pekerjaan_kontruksi', TRUE);
		$penilaian_pekerjaan_kontruksi = $this->input->post('penilaian_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket asdasd asdad
		$rating_penilaian_vendor_pekerjaan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kontruksi');
		$status_rating_pekerjaan_kontruksi = $this->input->post('status_rating_pekerjaan_kontruksi');
		$status_nilai_akhir_pekerjaan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kontruksi');
		$id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
		$data['row_mengikuti_paket'] = $this->M_count->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);
		$nama_rup = $data['row_mengikuti_paket']['nama_rup'];
		$nama_metode_pengadaan = $data['row_mengikuti_paket']['nama_metode_pengadaan'];
		$id_vendor = $data['row_mengikuti_paket']['id_vendor'];
		$id_rup = $data['row_mengikuti_paket']['id_rup'];
		$id_url_vendor = $data['row_mengikuti_paket']['id_url_vendor'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->M_count->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);
		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_kontruksi as $key => $val) {
				$result[] = array(
					'id_rup'   => $id_rup,
					'id_vendor'   => $id_vendor,
					'indikator_detail_pekerjaan'   => $indikator_pekerjaan_kontruksi[$key],
					'bobot_detail_pekerjaan'   => $bobot_pekerjaan_kontruksi[$key],
					'penilaian_detail'   =>  $penilaian_pekerjaan_kontruksi[$key],
					'nilai_akhir_detail_pekerjaan'   =>  $nilai_akhir_pekerjaan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor,
			];
			if ($status_nilai_akhir_pekerjaan_kontruksi <= 51) {
				$jumlah_bintang = 1;
			} else if ($status_nilai_akhir_pekerjaan_kontruksi <= 70) {
				$jumlah_bintang = 2;
			} else if ($status_nilai_akhir_pekerjaan_kontruksi <= 80) {
				$jumlah_bintang = 3;
			} else {
				$jumlah_bintang = 3;
			}
			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
				'jumlah_bintang' => $jumlah_bintang
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 2,
			];
			// ini ketika di blacklist
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => "Mendapatakan Warning Ke 2 / Kinerja Vendor Kurang",
				'masa_berlaku_daftar_hitam_mulai' => date('d-m-Y H:i'),
				'masa_berlaku_daftar_hitam_selesai' => date('d-m-Y H:i', strtotime("+2 year")),
				'sts_aktif' => 0,
				'status_daftar_hitam_vendor' => 1
			];

			$this->db->insert_batch('tbl_detail_penilaian_kinerja', $result);
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			// $type_email = 'PENILAIAN-KINERJA';
			// $pesan = "Anda Mendapatkan Blacklist!!!, Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement User Akan Kami NonAktifkan Sementara Sampai Hukuman 2 Tahun Blacklist Selesai, Nama Paket : $nama_rup , Metode Pemilihan : $nama_metode_pengadaan.";
			// $this->email_send->sen_row_email($type_email, $id_url_vendor, $pesan);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			// ketable detail penilaian
			$result = array();
			foreach ($indikator_pekerjaan_kontruksi as $key => $val) {
				$result[] = array(
					'id_rup'   => $id_rup,
					'id_vendor'   => $id_vendor,
					'indikator_detail_pekerjaan'   => $indikator_pekerjaan_kontruksi[$key],
					'bobot_detail_pekerjaan'   => $bobot_pekerjaan_kontruksi[$key],
					'penilaian_detail'   =>  $penilaian_pekerjaan_kontruksi[$key],
					'nilai_akhir_detail_pekerjaan'   =>  $nilai_akhir_pekerjaan_kontruksi[$key],
				);
			}

			// ketable vendor mengkikuti paket
			$where = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor,
			];
			if ($status_nilai_akhir_pekerjaan_kontruksi <= 51) {
				$jumlah_bintang = 1;
			} else if ($status_nilai_akhir_pekerjaan_kontruksi <= 70) {
				$jumlah_bintang = 2;
			} else if ($status_nilai_akhir_pekerjaan_kontruksi <= 80) {
				$jumlah_bintang = 3;
			} else {
				$jumlah_bintang = 3;
			}

			$data = [
				'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
				'status_rating' => $status_rating_pekerjaan_kontruksi,
				'status_rating_sudah_di_nilai' => 1,
				'status_jenis_penilayan' => 'kontruksi',
				'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
				'jumlah_bintang' => $jumlah_bintang
			];

			// ke table vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 1,
			];
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->db->insert_batch('tbl_detail_penilaian_kinerja', $result);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			// $type_email = 'PENILAIAN-KINERJA';
			// $pesan = "Anda Mendapatkan Warning Ke 1, Perbaiki Kinerja Pada Tender Selanjutnya Jika Anda Mendapatkan Warning Ke 2 Maka Anda Akan Kami Blacklist Selama 2 Tahun Pada Tender Jmtm E-procurement, Nama Paket : $nama_rup , Metode Pemilihan : $nama_metode_pengadaan";
			// $this->email_send->sen_row_email($type_email, $id_url_vendor, $pesan);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	public function tambah_pekerjaan_kontruksisaya()
	{

		$id_rup = $this->input->post('id_rup', TRUE);
		$id_vendor = $this->input->post('id_vendor', TRUE);
		$indikator_pekerjaan_kontruksi = $this->input->post('indikator_pekerjaan_kontruksi', TRUE);
		$bobot_pekerjaan_kontruksi = $this->input->post('bobot_pekerjaan_kontruksi', TRUE);
		$penilaian_pekerjaan_kontruksi = $this->input->post('penilaian_kontruksi', TRUE);
		$nilai_akhir_pekerjaan_kontruksi = $this->input->post('nilai_akhir_pekerjaan_kontruksi', TRUE);
		// tbl_vendor mengikuti paket
		$rating_penilaian_vendor_pekerjaan_kontruksi = $this->input->post('rating_penilaian_vendor_pekerjaan_kontruksi');
		$status_rating_pekerjaan_kontruksi = $this->input->post('status_rating_pekerjaan_kontruksi');
		$status_nilai_akhir_pekerjaan_kontruksi = $this->input->post('status_nilai_akhir_pekerjaan_kontruksi');
		$id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
		$result = array();
		foreach ($indikator_pekerjaan_kontruksi as $key => $val) {
			$result[] = array(
				'id_rup'   => $id_rup,
				'id_vendor'   => $id_vendor,
				'indikator_detail_pekerjaan'   => $indikator_pekerjaan_kontruksi[$key],
				'bobot_detail_pekerjaan'   => $bobot_pekerjaan_kontruksi[$key],
				'penilaian_detail'   =>  $penilaian_pekerjaan_kontruksi[$key],
				'nilai_akhir_detail_pekerjaan'   =>  $nilai_akhir_pekerjaan_kontruksi[$key],
			);
		}
		$where = [
			'id_rup' => $id_rup,
			'id_vendor' => $id_vendor,
		];
		if ($status_nilai_akhir_pekerjaan_kontruksi <= 51) {
			$jumlah_bintang = 1;
		} else if ($status_nilai_akhir_pekerjaan_kontruksi <= 70) {
			$jumlah_bintang = 2;
		} else if ($status_nilai_akhir_pekerjaan_kontruksi <= 80) {
			$jumlah_bintang = 3;
		} else {
			$jumlah_bintang = 3;
		}
		$data = [
			'rating_penilaian_vendor' => $rating_penilaian_vendor_pekerjaan_kontruksi,
			'status_rating' => $status_rating_pekerjaan_kontruksi,
			'status_rating_sudah_di_nilai' => 1,
			'status_jenis_penilayan' => 'kontruksi',
			'rating_nilai_akhir' => $status_nilai_akhir_pekerjaan_kontruksi,
			'jumlah_bintang' => $jumlah_bintang
		];
		$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
		$this->db->insert_batch('tbl_detail_penilaian_kinerja', $result);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function reset_penilaian_performance_pekerjaan_kontruksi()
	{
		$id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket', TRUE);
		$data['row_mengikuti_paket'] = $this->M_count->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);
		$nama_rup = $data['row_mengikuti_paket']['nama_rup'];
		$nama_metode_pengadaan = $data['row_mengikuti_paket']['nama_metode_pengadaan'];
		$id_vendor = $data['row_mengikuti_paket']['id_vendor'];
		$id_rup = $data['row_mengikuti_paket']['id_rup'];
		$vendor_pemenag_by_id_pekerjaan_kontruksi = $this->M_count->get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket);

		if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 1) {
			// update ke tbl_vendor_mengikuti_paket
			$where_warning = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor,
			];
			$data_warning = [
				'rating_penilaian_vendor' => null,
				'status_jenis_penilayan' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
				'jumlah_bintang' => null
			];
			// update ke tbl_vendor
			$where_tbl_vendor_warning = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_warning = [
				'status_warning_vendor' => 0,
			];
			$where_delete_tbl_penilainya = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_warning, $where_tbl_vendor_warning);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_warning, $where_warning);
			// $type_email = 'PENILAIAN-KINERJA';
			// $pesan = "Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_rup , Metode Pemilihan : $nama_metode_pengadaan, Tidak Ada Peringataan, Saat Ini Aman, Anda Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.";
			// $this->email_send->sen_row_email($type_email, $data['row_mengikuti_paket']['id_url_vendor'], $pesan);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($vendor_pemenag_by_id_pekerjaan_kontruksi['status_warning_vendor'] == 2) {
			$where_blacklist = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor,
			];
			$data_blacklist = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_rating_sudah_di_nilai' => null,
				'status_jenis_penilayan' => null,
				'rating_nilai_akhir' => null,
				'jumlah_bintang' => null
			];
			$where_tbl_vendor_blacklist = [
				'id_vendor' => $id_vendor,
			];
			$data_tbl_vendor_blacklist = [
				'status_warning_vendor' => 1,
			];
			$where_delete_tbl_penilainya = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor
			];
			$data_blacklist_vendor = [
				'alasan_daftar_hitam' => null,
				'masa_berlaku_daftar_hitam_mulai' => null,
				'masa_berlaku_daftar_hitam_selesai' => null,
				'sts_aktif' => 1,
				'status_daftar_hitam_vendor' => 0
			];
			$this->Penilaian_vendor_model->update_ke_vendor($data_blacklist_vendor, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->delete_penilaian_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_status_warning_pekerjaan_kontruksi($data_tbl_vendor_blacklist, $where_tbl_vendor_blacklist);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data_blacklist, $where_blacklist);
			// $type_email = 'PENILAIAN-KINERJA';
			// $pesan = "Mengalamai Penilaian Ulang Oleh Agency Pada Nama Paket : $nama_rup , Metode Pemilihan : $nama_metode_pengadaan, Tidak Ada Peringataan Ke-2, Saat Ini Anda Masih Dalam Peringataan Ke-1, Anda Masih Dapat Mengikuti Paket Tender Selanjutnya Pada Jmtm E-procurement.";
			// $this->email_send->sen_row_email($type_email, $data['row_mengikuti_paket']['id_url_vendor'], $pesan);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$where = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor,
			];
			$data = [
				'rating_penilaian_vendor' => null,
				'status_rating' => null,
				'status_jenis_penilayan' => null,
				'status_rating_sudah_di_nilai' => null,
				'rating_nilai_akhir' => null,
				'jumlah_bintang' => null
			];
			$where_delete_tbl_penilainya = [
				'id_rup' => $id_rup,
				'id_vendor' => $id_vendor
			];
			$this->Penilaian_vendor_model->delete_penilaian_kontruksi($where_delete_tbl_penilainya);
			$this->Penilaian_vendor_model->update_pekerjaan_kontruksi_vendor($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
}
