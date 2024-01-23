<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);

class Daftar_paket extends CI_Controller
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
		$this->load->model('M_panitia/M_jadwal');
	}
	public function index()
	{

		// $this->load->view('panitia/template_menu/header_menu');
		$this->load->view('panitia/daftar_paket/js_header_paket');
		$this->load->view('panitia/daftar_paket/base_url_panitia');
		$this->load->view('panitia/daftar_paket/daftar_paket');
		$this->load->view('administrator/template_menu/footer_menu');
		$this->load->view('panitia/daftar_paket/file_public_daftar_paket');
	}


	public function get_draft_paket()
	{
		$result = $this->M_panitia->gettable_daftar_paket();
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
			$row[] = '<small>' . $rs->tahun_rup . '</small>';
			$row[] = '<small>' . $rs->nama_rup . '</small>';
			$row[] = '<small>' . $rs->nama_departemen . '</small>';
			$row[] = '<small>' . $rs->nama_jenis_pengadaan . '</small>';
			$row[] = '<small>' . $rs->nama_metode_pengadaan . '</small>';
			$row[] = '<small>' . "Rp " . number_format($rs->total_hps_rup, 2, ',', '.') . '</small>';

			if ($rs->sts_ulang == 1) {
				$row[] = '<small><span class="badge bg-warning text-dark">Draft Paket (Sedang Mengulang)</span></small>';
			} else {
				if ($rs->status_paket_panitia == 1) {
					$row[] = '<small><span class="badge bg-warning text-dark">Draft Paket</span></small>';
				} else {
					if ($jadwal_terakhir['waktu_mulai'] <= $now) {
						$row[] = '<span class="badge bg-success text-white">Pengadaan Sudah Selesai
						</span>';
					} else {
						$row[] = '<span class="badge bg-danger text-white">Sedang Berlangsung
						</span>';
					}
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
			"recordsTotal" => $this->M_panitia->count_all_daftar_paket(),
			"recordsFiltered" => $this->M_panitia->count_filtered_daftar_paket(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function beranda()
	{
		$this->load->view('panitia/template_menu/header_menu');
		$this->load->view('panitia/beranda/js_header_paket');
		$this->load->view('panitia/beranda/base_url_panitia');
		$this->load->view('panitia/daftar_paket/daftar_paket');
		$this->load->view('panitia/template_menu/footer_menu');
		$this->load->view('panitia/daftar_paket/file_public_daftar_paket');
	}

	public function form_daftar_paket($id_url_rup)
	{
		$data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
		$data['jadwal'] = $this->M_panitia->get_jadwal($id_url_rup);
		$data['panitia'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
		$data['ruas'] = $this->M_panitia->get_ruas($data['row_rup']['id_rup']);

		$data['syarat_izin_usaha_tender'] = $this->M_panitia->get_syarat_izin_usaha_tender($data['row_rup']['id_rup']);
		$data['syarat_izin_teknis_tender'] = $this->M_panitia->get_syarat_izin_teknis_tender($data['row_rup']['id_rup']);
		$data['result_kbli'] = $this->M_panitia->result_kbli();
		$data['result_sbu'] = $this->M_panitia->result_sbu();
		// // lolos kualifikasi
		// cek vendor terundang
		// lolos izin_usaha paket
		$syarat_izin_usaha = $this->M_panitia->cek_syarat_izin_usaha($data['row_rup']['id_rup']);
		$cek_syarat_kbli = $this->M_panitia->cek_syarat_kbli($data['row_rup']['id_rup']);

		$cek_syarat_kbli_sbu = $this->M_panitia->cek_syarat_sbu($data['row_rup']['id_rup']);
		$cek_syarat_teknis = $this->M_panitia->cek_syarat_teknis($data['row_rup']['id_rup']);
		// siup
		$data_vendor_lolos_siup_kbli = $this->M_panitia->data_vendor_lolos_siup_kbli($cek_syarat_kbli);

		// nib
		$data_vendor_lolos_nib_kbli = $this->M_panitia->data_vendor_lolos_nib_kbli($cek_syarat_kbli);
		// var_dump($data_vendor_lolos_nib_kbli);
		// die;
		// siujk
		$data_vendor_lolos_siujk_kbli = $this->M_panitia->data_vendor_lolos_siujk_kbli($cek_syarat_kbli);

		// // skdp
		// // $data_vendor_lolos_skdp_kbli = $this->M_panitia->data_vendor_lolos_skdp_kbli($cek_syarat_kbli);

		// sbu
		$data_vendor_lolos_sbu_kbli = $this->M_panitia->data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu);

		// spt
		$data_vendor_lolos_spt = $this->M_panitia->data_vendor_lolos_spt($cek_syarat_teknis);

		// laporan keuangan
		$data_vendor_lolos_laporan_keuangan = $this->M_panitia->data_vendor_lolos_laporan_keuangan($cek_syarat_teknis);

		// neraca keuangan
		$data_vendor_lolos_neraca_keuangan = $this->M_panitia->data_vendor_lolos_neraca_keuangan($cek_syarat_teknis);


		$data_vendor_terundang_by_kbli = $this->M_panitia->gabung_keseluruhan_vendor_terundang($data_vendor_lolos_siup_kbli, $data_vendor_lolos_nib_kbli, $data_vendor_lolos_siujk_kbli, $data_vendor_lolos_sbu_kbli);

		$data_vendor_terundang_by_kbli_sbu = $this->M_panitia->gabung_keseluruhan_vendor_terundang_sbu($data_vendor_lolos_sbu_kbli);

		$data['result_vendor_terundang'] = $this->M_panitia->result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli, $data_vendor_terundang_by_kbli_sbu, $data['row_rup']);

		// yang dapat mengumumkan 
		$data['diumumkan_oleh'] = $this->M_panitia->get_yang_dapat_mengumumkan($data['row_rup']['id_rup']);
		if ($data['row_rup']['id_jadwal_tender'] == 1) {
			$data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['row_rup']['id_rup']);
		} else {
			$data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_10($data['row_rup']['id_rup']);
		}
		// $this->load->view('panitia/template_menu/header_menu');
		$this->load->view('panitia/daftar_paket/js_header_paket');
		$this->load->view('panitia/daftar_paket/base_url_panitia');
		$this->load->view('panitia/daftar_paket/form_daftar_paket', $data);
		$this->load->view('panitia/daftar_paket/js_footer_paket');
		$this->load->view('panitia/daftar_paket/file_public_daftar_paket');
	}

	// cek vendor
	public function get_rekanan_terkomendasi()
	{
		$id_rup = $this->input->post('id_rup_global');
		$id_url_rup = $this->input->post('id_url_rup');
		$data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
		$syarat_izin_usaha = $this->M_panitia->cek_syarat_izin_usaha($id_rup);
		$cek_syarat_kbli = $this->M_panitia->cek_syarat_kbli($id_rup);
		$cek_syarat_kbli_sbu = $this->M_panitia->cek_syarat_sbu($id_rup);
		$cek_syarat_teknis = $this->M_panitia->cek_syarat_teknis($id_rup);
		// siup
		$data_vendor_lolos_siup_kbli = $this->M_panitia->data_vendor_lolos_siup_kbli($cek_syarat_kbli);

		// nib
		$data_vendor_lolos_nib_kbli = $this->M_panitia->data_vendor_lolos_nib_kbli($cek_syarat_kbli);

		// siujk
		$data_vendor_lolos_siujk_kbli = $this->M_panitia->data_vendor_lolos_siujk_kbli($cek_syarat_kbli);

		// skdp
		// $data_vendor_lolos_skdp_kbli = $this->M_panitia->data_vendor_lolos_skdp_kbli($cek_syarat_kbli);

		// sbu
		$data_vendor_lolos_sbu_kbli = $this->M_panitia->data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu);

		// spt
		$data_vendor_lolos_spt = $this->M_panitia->data_vendor_lolos_spt($cek_syarat_teknis);

		// laporan keuangan
		$data_vendor_lolos_laporan_keuangan = $this->M_panitia->data_vendor_lolos_laporan_keuangan($cek_syarat_teknis);

		// neraca keuangan
		$data_vendor_lolos_neraca_keuangan = $this->M_panitia->data_vendor_lolos_neraca_keuangan($cek_syarat_teknis);


		$data_vendor_terundang_by_kbli = $this->M_panitia->gabung_keseluruhan_vendor_terundang($data_vendor_lolos_siup_kbli, $data_vendor_lolos_nib_kbli, $data_vendor_lolos_siujk_kbli, $data_vendor_lolos_sbu_kbli);

		// $data_vendor_terundang_by_kbli_sbu = $this->M_panitia->gabung_keseluruhan_vendor_terundang_sbu($data_vendor_lolos_sbu_kbli);


		$data_respon = $this->M_panitia->result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli, $data['row_rup']);

		$this->output->set_content_type('application/json')->set_output(json_encode($data_respon));
	}


	public function get_rekanan_terkomendasi_umum()
	{
		$id_rup = $this->input->post('id_rup_global');
		$id_url_rup = $this->input->post('id_url_rup');
		$data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);

		$data['syarat_izin_usaha_tender'] = $this->M_panitia->get_syarat_izin_usaha_tender($data['row_rup']['id_rup']);
		$data['syarat_izin_teknis_tender'] = $this->M_panitia->get_syarat_izin_teknis_tender($data['row_rup']['id_rup']);
		$data['result_kbli'] = $this->M_panitia->result_kbli();
		$data['result_sbu'] = $this->M_panitia->result_sbu();
		// // lolos kualifikasi
		// cek vendor terundang
		// lolos izin_usaha paket
		$syarat_izin_usaha = $this->M_panitia->cek_syarat_izin_usaha($data['row_rup']['id_rup']);
		$cek_syarat_kbli = $this->M_panitia->cek_syarat_kbli($data['row_rup']['id_rup']);
		$cek_syarat_kbli_sbu = $this->M_panitia->cek_syarat_sbu($data['row_rup']['id_rup']);
		$cek_syarat_teknis = $this->M_panitia->cek_syarat_teknis($data['row_rup']['id_rup']);
		// siup
		$data_vendor_lolos_siup_kbli = $this->M_panitia->data_vendor_lolos_siup_kbli($cek_syarat_kbli);

		// nib
		$data_vendor_lolos_nib_kbli = $this->M_panitia->data_vendor_lolos_nib_kbli($cek_syarat_kbli);
		// var_dump($data_vendor_lolos_nib_kbli);
		// die;
		// siujk
		$data_vendor_lolos_siujk_kbli = $this->M_panitia->data_vendor_lolos_siujk_kbli($cek_syarat_kbli);

		// skdp
		// $data_vendor_lolos_skdp_kbli = $this->M_panitia->data_vendor_lolos_skdp_kbli($cek_syarat_kbli);

		// sbu
		$data_vendor_lolos_sbu_kbli = $this->M_panitia->data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu);

		// spt
		$data_vendor_lolos_spt = $this->M_panitia->data_vendor_lolos_spt($cek_syarat_teknis);

		// laporan keuangan
		$data_vendor_lolos_laporan_keuangan = $this->M_panitia->data_vendor_lolos_laporan_keuangan($cek_syarat_teknis);

		// neraca keuangan
		$data_vendor_lolos_neraca_keuangan = $this->M_panitia->data_vendor_lolos_neraca_keuangan($cek_syarat_teknis);


		$data_vendor_terundang_by_kbli = $this->M_panitia->gabung_keseluruhan_vendor_terundang($data_vendor_lolos_siup_kbli, $data_vendor_lolos_nib_kbli, $data_vendor_lolos_siujk_kbli, $data_vendor_lolos_sbu_kbli);

		// var_dump($data_vendor_terundang_by_kbli);
		// die;
		// $data_vendor_terundang_by_kbli_sbu = $this->M_panitia->gabung_keseluruhan_vendor_terundang_sbu($data_vendor_lolos_sbu_kbli);
		$data_respon = $this->M_panitia->result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli, $data['row_rup']);

		$this->output->set_content_type('application/json')->set_output(json_encode($data_respon));
	}
	public function invite_rekanan()
	{
		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup_global');
		$row_rup = $this->M_rup->get_row_rup_by_id_rup($id_rup);
		if ($row_rup['id_jadwal_tender'] == 9) {
			$cek_hanya_satu_vendor = $this->M_panitia->cek_vendor_mengikuti_penunjukan_langsung($id_rup);
			if ($cek_hanya_satu_vendor) {
				$this->output->set_content_type('application/json')->set_output(json_encode('sudah_ada'));
			} else {
				$cek_vendor = $this->M_panitia->cek_vendor_mengikuti($id_vendor, $id_rup);
				if ($cek_vendor) {
					$this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
				} else {
					$data = [
						'id_vendor' => $id_vendor,
						'id_rup' => $id_rup
					];
					$cek_vendor = $this->M_panitia->insert_vendor_mengikuti($data);
					$this->output->set_content_type('application/json')->set_output(json_encode('success'));
				}
			}
		} else {
			$cek_vendor = $this->M_panitia->cek_vendor_mengikuti($id_vendor, $id_rup);
			if ($cek_vendor) {
				$this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
			} else {
				$data = [
					'id_vendor' => $id_vendor,
					'id_rup' => $id_rup
				];
				$cek_vendor = $this->M_panitia->insert_vendor_mengikuti($data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		}
	}

	public function batal_pilih_rekanan()
	{
		$id_vendor = $this->input->post('id_vendor');
		$id_rup = $this->input->post('id_rup_global');

		$where = [
			'id_vendor' => $id_vendor,
			'id_rup' => $id_rup
		];
		$cek_vendor = $this->M_panitia->delete_vendor_mengikuti($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_rekanan_terpilih()
	{
		$id_rup = $this->input->post('id_rup_global');
		$data_respon = $this->M_panitia->result_vendor_terpilih($id_rup);

		$this->output->set_content_type('application/json')->set_output(json_encode($data_respon));
	}

	// management jadwal
	public function buat_jadwal($id_url_rup)
	{
		$data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
		$data['jadwal'] = $this->M_panitia->get_jadwal($id_url_rup);
		$data['jadwal_1file'] = $this->M_panitia->get_jadwal($id_url_rup);
		$data['panitia'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
		$data['role_panitia'] = $this->M_panitia->get_panitia_role($data['row_rup']['id_rup']);
		$data['cek_ada_prubahan_jadwal'] = $this->M_panitia->cek_jika_ada_perubahan($data['row_rup']['id_rup']);
		$this->load->view('panitia/template_menu/header_menu');
		$this->load->view('panitia/daftar_paket/js_header_paket');
		$this->load->view('panitia/daftar_paket/base_url_panitia');
		if ($data['row_rup']['id_jadwal_tender'] == 5 || $data['row_rup']['id_jadwal_tender'] == 2) {
			// tender terbatas dengan 18 jadwal
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas/index', $data);
			$this->load->view('administrator/template_menu/footer_menu');
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas/ajax');
		} else if ($data['row_rup']['id_jadwal_tender'] == 1 || $data['row_rup']['id_jadwal_tender'] == 4) {
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas/jadwal_1file', $data);
			$this->load->view('administrator/template_menu/footer_menu');
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas/ajax_1file');
		} else if ($data['row_rup']['id_jadwal_tender'] == 9) {
			$this->load->view('panitia/daftar_paket/jadwal_tender_penunjukan_langsung/index', $data);
			$this->load->view('administrator/template_menu/footer_menu');
			$this->load->view('panitia/daftar_paket/jadwal_tender_penunjukan_langsung/ajax');
		} else if ($data['row_rup']['id_jadwal_tender'] == 3) {
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas_pasca_1_file/index', $data);
			$this->load->view('administrator/template_menu/footer_menu');
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas_pasca_1_file/ajax');
		} else if ($data['row_rup']['id_jadwal_tender'] == 6) {
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas_pasca_2_file/index', $data);
			$this->load->view('administrator/template_menu/footer_menu');
			$this->load->view('panitia/daftar_paket/jadwal_tender_terbatas_pasca_2_file/ajax');
		}
	}

	public function get_rup_terfinalisasi()
	{
		$result = $this->M_panitia->gettable_rup_paket_final();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = $rs->tahun_rup;
			$row[] = $rs->nama_rup;
			$row[] = $rs->nama_departemen;
			$row[] = "Rp " . number_format($rs->total_pagu_rup, 2, ',', '.');
			$row[] = $rs->nama_jenis_pengadaan;
			$row[] = $rs->nama_metode_pengadaan;
			$row[] = '<div class="text-center">
					  <a href="javascript:;" class="btn btn-info btn-sm  shadow-lg" onClick="by_id_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i>
					  <small>Buat Paket Penyedia</small></a>
					  </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_panitia->count_all_rup_paket_final(),
			"recordsFiltered" => $this->M_panitia->count_filtered_rup_paket_final(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function by_id_rup($id_url_rup)
	{
		$data_rup = $this->M_rup->get_row_rup($id_url_rup);
		$panitia = $this->M_panitia->get_panitia($data_rup['id_rup']);
		$syarat_tambahan = $this->M_panitia->result_syarat_tambahan($data_rup['id_rup']);
		$ruas = $this->M_panitia->get_ruas($data_rup['id_rup']);
		$jadwal = $this->M_panitia->get_jadwal($id_url_rup);
		$row_syarat_administrasi_rup = $this->M_panitia->get_syarat_izin_usaha_tender($data_rup['id_rup']);
		$row_syarat_teknis_rup = $this->M_panitia->get_syarat_izin_teknis_tender($data_rup['id_rup']);
		$hak_mengumumkan = $this->M_panitia->get_yang_dapat_mengumumkan($data_rup['id_rup']);
		$response = [
			'row_rup' => $data_rup,
			'panitia' => $panitia,
			'ruas' => $ruas,
			'jadwal' => $jadwal,
			'row_syarat_administrasi_rup' => $row_syarat_administrasi_rup,
			'row_syarat_teknis_rup' => $row_syarat_teknis_rup,
			'syarat_tambahan' => $syarat_tambahan,
			'hak_mengumumkan' => $hak_mengumumkan,
			'dok_izin_prinsip'  => $this->M_panitia->get_dokumen_izin_prinsip($data_rup['id_rup']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function update_hps()
	{
		$id_rup = $this->input->post('id_rup');
		$total_hps_rup = $this->input->post('total_hps_rup');
		$data = [
			'total_hps_rup' => $total_hps_rup
		];
		$this->M_panitia->update_rup_panitia($id_rup, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function umumkan_paket()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$data_rup = $this->M_rup->get_row_rup($id_url_rup);

		$data = [
			'status_paket_panitia' => 2,
			'status_paket_diumumkan' => 1,
			'sts_ulang' => 0
		];
		$this->M_panitia->update_rup_panitia($data_rup['id_rup'], $data);
		$get_panitia_terpilih  = $this->M_rup->get_panitia($data_rup['id_rup']);

		// foreach ($get_panitia_terpilih as $key => $value2) {
		// 	if ($value2['role_panitia'] == 1) {
		// 		$nama_role = 'Ketua';
		// 	} else if ($value2['role_panitia'] == 2) {
		// 		$nama_role = 'Sekretaris';
		// 	} else {
		// 		$nama_role = 'Anggota';
		// 	}
		// 	$message = 'Paket Tender ' . $data_rup['nama_metode_pengadaan']  . ' ' . $data_rup['nama_rup'] . ' Telah diumumkan, silahkan login untuk monitoring proses tender berlangsung.';
		// 	$this->kirim_wa->kirim_wa_vendor_terdaftar($value2['no_telpon'], $message);
		// }
		$message = 'Paket Tender ' . $data_rup['nama_metode_pengadaan']  . ' ' . $data_rup['nama_rup'] . ' Telah diumumkan, silahkan login untuk monitoring proses tender berlangsung.';
		$this->email_send->sen_email_finalisasi_panitia($data_rup['id_rup']);
		// $this->email_send->sen_email_pengumuman($data_rup['id_rup']);
		$this->kirim_wa->kirim_wa_pengumuman($data_rup['id_rup'], $message);

		$this->kirim_wa->kirim_wa_pengumuman_panitia($data_rup['id_rup'], $message);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function update_dok_izin_prinsip()
	{
		$id_rup = $this->input->post('id_rup');
		$nama_rup = $this->input->post('nama_rup');


		$date = date('Y');
		if (!is_dir('file_paket/' . $nama_rup . '/DOKUMEN_IZIN_PRINSIP_DAN_HPS')) {
			mkdir('file_paket/' . $nama_rup . '/DOKUMEN_IZIN_PRINSIP_DAN_HPS', 0777, TRUE);
		}

		$config['upload_path'] = './file_paket/' . $nama_rup  . '/DOKUMEN_IZIN_PRINSIP_DAN_HPS';
		$config['allowed_types'] = 'pdf|xlsx|xls';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dokumen')) {
			$fileData = $this->upload->data();

			$upload = [
				'file_dokumen' => $fileData['file_name'],
				'nama_file' =>  $this->input->post('nama_file'),
				'id_rup' =>  $this->input->post('id_rup'),
			];

			$this->M_panitia->insert_izin_prinsip($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
		}
	}

	public function get_dok_izin_prinsip($id_rup_global)
	{
		$response = [
			'dok_izin_prinsip'  => $this->M_panitia->get_dokumen_izin_prinsip($id_rup_global),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function hapus_izin_prinsip()
	{
		$id_izin_prinsip = $this->input->post('id_izin_prinsip');
		$where = [
			'id_izin_prinsip' => $id_izin_prinsip
		];
		$this->M_panitia->delete_izin_prinsip($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function url_update_rup()
	{
		$id_rup = $this->input->post('id_rup');

		$validasi_jadwal = $this->M_panitia->validasi_row_jadwal($id_rup);
		$validasi_dok_izin_prinsip = $this->M_panitia->validasi_dok_izin_prinsip($id_rup);
		$validasi_hps = $this->M_panitia->validasi_hps($id_rup);
		// jenis_kontrak
		$jenis_kontrak = $this->input->post('jenis_kontrak');
		$data = [
			'jenis_kontrak' => $jenis_kontrak
		];
		$this->M_panitia->update_rup_panitia($id_rup, $data);
		$data_beban_tahun = [
			'beban_tahun_anggaran' => $this->input->post('beban_tahun_anggaran')
		];
		$this->M_panitia->update_rup_panitia($id_rup, $data_beban_tahun);



		$validasi_jenis_kontrak = $this->M_panitia->validasi_jenis_kontrak($id_rup);
		// beban_tahun_anggaran
		$validasi_beban_tahun_anggaran = $this->M_panitia->validasi_beban_tahun_anggaran($id_rup);
		// bobot_nilai
		$validasi_bobot_nilai = $this->M_panitia->validasi_bobot_nilai($id_rup);
		// bobot_teknis
		$validasi_bobot_teknis = $this->M_panitia->validasi_bobot_teknis($id_rup);
		// bobot_biaya
		$validasi_bobot_biaya = $this->M_panitia->validasi_bobot_biaya($id_rup);
		// syarat_tender_kualifikasi
		$validasi_syarat_tender_kualifikasi = $this->M_panitia->validasi_syarat_tender_kualifikasi($id_rup);
		if (!$validasi_jadwal) {
			$erorr = 'jadwal_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if (!$validasi_dok_izin_prinsip) {
			$erorr = 'dok_izin_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_hps) {
			$erorr = 'hps_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_jenis_kontrak) {
			$erorr = 'jenis_kontrak_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_beban_tahun_anggaran) {
			$erorr = 'beban_tahun_anggaran';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_bobot_nilai) {
			$erorr = 'bobot_nilai_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_bobot_teknis) {
			$erorr = 'bobot_teknis_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_bobot_biaya) {
			$erorr = 'bobot_biaya_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else if ($validasi_syarat_tender_kualifikasi) {
			$erorr = 'syarat_tender_kualifikasi_validasi';
			$this->output->set_content_type('application/json')->set_output(json_encode($erorr));
		} else {
			$id_url_rup = $this->input->post('id_url_rup');

			$beban_tahun_anggaran = $this->input->post('beban_tahun_anggaran');
			$bobot_nilai = $this->input->post('bobot_nilai');
			$bobot_biaya = $this->input->post('bobot_biaya');
			$bobot_teknis = $this->input->post('bobot_teknis');
			$status_paket_panitia = $this->input->post('status_paket_panitia');
			// validasi jadwal 
			if ($beban_tahun_anggaran) {
				$data = [
					'beban_tahun_anggaran' => $beban_tahun_anggaran
				];
				$this->M_panitia->update_rup_panitia($id_rup, $data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else if ($bobot_nilai) {
				$data = [
					'bobot_nilai' => $bobot_nilai
				];
				$this->M_panitia->update_rup_panitia($id_rup, $data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else if ($bobot_biaya) {
				$data = [
					'bobot_biaya' => $bobot_biaya
				];
				$this->M_panitia->update_rup_panitia($id_rup, $data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else if ($bobot_teknis) {
				$data = [
					'bobot_teknis' => $bobot_teknis
				];
				$this->M_panitia->update_rup_panitia($id_rup, $data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else if ($status_paket_panitia) {
				$data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
				$data['panitia'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
				$data['syarat_izin_usaha_tender'] = $this->M_panitia->get_syarat_izin_usaha_tender($data['row_rup']['id_rup']);
				$data['syarat_izin_teknis_tender'] = $this->M_panitia->get_syarat_izin_teknis_tender($data['row_rup']['id_rup']);
				$data['result_kbli'] = $this->M_panitia->result_kbli();
				$data['result_sbu'] = $this->M_panitia->result_sbu();
				// // lolos kualifikasi
				// cek vendor terundang
				// lolos izin_usaha paket
				$syarat_izin_usaha = $this->M_panitia->cek_syarat_izin_usaha($data['row_rup']['id_rup']);

				$cek_syarat_kbli = $this->M_panitia->cek_syarat_kbli($data['row_rup']['id_rup']);
				$cek_syarat_kbli_sbu = $this->M_panitia->cek_syarat_sbu($data['row_rup']['id_rup']);
				$cek_syarat_teknis = $this->M_panitia->cek_syarat_teknis($data['row_rup']['id_rup']);
				// siup
				$data_vendor_lolos_siup_kbli = $this->M_panitia->data_vendor_lolos_siup_kbli($cek_syarat_kbli);
				// nib
				$data_vendor_lolos_nib_kbli = $this->M_panitia->data_vendor_lolos_nib_kbli($cek_syarat_kbli);
				// siujk
				$data_vendor_lolos_siujk_kbli = $this->M_panitia->data_vendor_lolos_siujk_kbli($cek_syarat_kbli);
				// skdp
				// $data_vendor_lolos_skdp_kbli = $this->M_panitia->data_vendor_lolos_skdp_kbli($cek_syarat_kbli);
				// sbu
				$data_vendor_lolos_sbu_kbli = $this->M_panitia->data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu);

				// spt
				$data_vendor_lolos_spt = $this->M_panitia->data_vendor_lolos_spt($cek_syarat_teknis);
				// laporan keuangan
				$data_vendor_lolos_laporan_keuangan = $this->M_panitia->data_vendor_lolos_laporan_keuangan($cek_syarat_teknis);
				// neraca keuangan
				$data_vendor_lolos_neraca_keuangan = $this->M_panitia->data_vendor_lolos_neraca_keuangan($cek_syarat_teknis);
				$data_vendor_terundang_by_kbli = $this->M_panitia->gabung_keseluruhan_vendor_terundang($data_vendor_lolos_siup_kbli, $data_vendor_lolos_nib_kbli, $data_vendor_lolos_siujk_kbli, $data_vendor_lolos_sbu_kbli);
				$data_vendor_terundang = $this->M_panitia->result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli, $data['row_rup']);
				$post_all_vendor = [];
				foreach ($data_vendor_terundang as $value) {
					$post_all_vendor[] = $value['id_vendor'];
				}
				$fix_vendor = implode(',', $post_all_vendor);
				$key = '';
				$keys = array_merge(range(0, 9), range('a', 'z'));
				for ($i = 0; $i < 10; $i++) {
					$key .= $keys[array_rand($keys)];
				}
				$vendor_key = '';
				$vendor_keys = array_merge(range(0, 9), range('a', 'z'));
				for ($i = 0; $i < 10; $i++) {
					$vendor_key .= $vendor_keys[array_rand($vendor_keys)];
				}
				$data = [
					'status_paket_panitia' => $status_paket_panitia,
					'data_vendor_terundang' => $fix_vendor,
					'token_panitia' => $key,
					'token_vendor' => $vendor_key
				];
				$this->M_panitia->update_rup_panitia($id_rup, $data);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		}
	}


	public function url_update_live_rup()
	{
		$id_rup = $this->input->post('id_rup');
		$id_url_rup = $this->input->post('id_url_rup');
		$jenis_kontrak = $this->input->post('jenis_kontrak');
		$beban_tahun_anggaran = $this->input->post('beban_tahun_anggaran');
		$bobot_nilai = $this->input->post('bobot_nilai');
		$bobot_biaya = $this->input->post('bobot_biaya');
		$bobot_teknis = $this->input->post('bobot_teknis');
		$status_paket_panitia = $this->input->post('status_paket_panitia');
		// validasi jadwal 
		if ($jenis_kontrak) {
			$data = [
				'jenis_kontrak' => $jenis_kontrak
			];
			$this->M_panitia->update_rup_panitia($id_rup, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($beban_tahun_anggaran) {
			$data = [
				'beban_tahun_anggaran' => $beban_tahun_anggaran
			];
			$this->M_panitia->update_rup_panitia($id_rup, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($bobot_nilai) {
			$data = [
				'bobot_nilai' => $bobot_nilai,
				'bobot_biaya' => $bobot_biaya,
				'bobot_teknis' => $bobot_teknis,
			];
			$this->M_panitia->update_rup_panitia($id_rup, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($bobot_biaya) {
			$data = [
				'bobot_biaya' => $bobot_biaya
			];
			$this->M_panitia->update_rup_panitia($id_rup, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($bobot_teknis) {
			$data = [
				'bobot_teknis' => $bobot_teknis
			];
			$this->M_panitia->update_rup_panitia($id_rup, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else if ($status_paket_panitia) {
			$data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
			$data['panitia'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
			$data['syarat_izin_usaha_tender'] = $this->M_panitia->get_syarat_izin_usaha_tender($data['row_rup']['id_rup']);
			$data['syarat_izin_teknis_tender'] = $this->M_panitia->get_syarat_izin_teknis_tender($data['row_rup']['id_rup']);
			$data['result_kbli'] = $this->M_panitia->result_kbli();
			$data['result_sbu'] = $this->M_panitia->result_sbu();
			// // lolos kualifikasi
			// cek vendor terundang
			// lolos izin_usaha paket
			$syarat_izin_usaha = $this->M_panitia->cek_syarat_izin_usaha($data['row_rup']['id_rup']);

			$cek_syarat_kbli = $this->M_panitia->cek_syarat_kbli($data['row_rup']['id_rup']);
			$cek_syarat_kbli_sbu = $this->M_panitia->cek_syarat_sbu($data['row_rup']['id_rup']);
			$cek_syarat_teknis = $this->M_panitia->cek_syarat_teknis($data['row_rup']['id_rup']);
			// siup
			$data_vendor_lolos_siup_kbli = $this->M_panitia->data_vendor_lolos_siup_kbli($cek_syarat_kbli);
			// nib
			$data_vendor_lolos_nib_kbli = $this->M_panitia->data_vendor_lolos_nib_kbli($cek_syarat_kbli);
			// siujk
			$data_vendor_lolos_siujk_kbli = $this->M_panitia->data_vendor_lolos_siujk_kbli($cek_syarat_kbli);
			// skdp
			// $data_vendor_lolos_skdp_kbli = $this->M_panitia->data_vendor_lolos_skdp_kbli($cek_syarat_kbli);
			// sbu
			$data_vendor_lolos_sbu_kbli = $this->M_panitia->data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu);

			// spt
			$data_vendor_lolos_spt = $this->M_panitia->data_vendor_lolos_spt($cek_syarat_teknis);
			// laporan keuangan
			$data_vendor_lolos_laporan_keuangan = $this->M_panitia->data_vendor_lolos_laporan_keuangan($cek_syarat_teknis);
			// neraca keuangan
			$data_vendor_lolos_neraca_keuangan = $this->M_panitia->data_vendor_lolos_neraca_keuangan($cek_syarat_teknis);
			$data_vendor_terundang_by_kbli = $this->M_panitia->gabung_keseluruhan_vendor_terundang($data_vendor_lolos_siup_kbli, $data_vendor_lolos_nib_kbli, $data_vendor_lolos_siujk_kbli, $data_vendor_lolos_sbu_kbli);
			$data_vendor_terundang = $this->M_panitia->result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli, $data['row_rup']);
			$post_all_vendor = [];
			foreach ($data_vendor_terundang as $value) {
				$post_all_vendor[] = $value['id_vendor'];
			}
			$fix_vendor = implode(',', $post_all_vendor);
			$key = '';
			$keys = array_merge(range(0, 9), range('a', 'z'));
			for ($i = 0; $i < 10; $i++) {
				$key .= $keys[array_rand($keys)];
			}

			$vendor_key = '';
			$vendor_keys = array_merge(range(0, 9), range('a', 'z'));
			for ($i = 0; $i < 10; $i++) {
				$vendor_key .= $vendor_keys[array_rand($vendor_keys)];
			}
			$data = [
				'status_paket_panitia' => $status_paket_panitia,
				'data_vendor_terundang' => $fix_vendor,
				'token_panitia' => $key,
				'token_vendor' => $vendor_key
			];
			$this->M_panitia->update_rup_panitia($id_rup, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function simpan_jadwal_20baris()
	{
		$id_rup = $this->input->post('id_rup');
		$id_jadwal_rup = $this->input->post('id_jadwal_rup[]');
		$waktu_mulai = $this->input->post('waktu_mulai[]');
		$waktu_selesai = $this->input->post('waktu_selesai[]');

		// date('Y-m-d H:i', strtotime())
		$jadwal1 = date('Y-m-d H:i', strtotime($waktu_mulai[1]));
		$jadwal2 = date('Y-m-d H:i', strtotime($waktu_selesai[1]));
		$jadwal3 = date('Y-m-d H:i', strtotime($waktu_mulai[2]));
		$jadwal4 = date('Y-m-d H:i', strtotime($waktu_selesai[2]));
		$jadwal5 = date('Y-m-d H:i', strtotime($waktu_mulai[3]));
		$jadwal6 = date('Y-m-d H:i', strtotime($waktu_selesai[3]));
		$jadwal7 = date('Y-m-d H:i', strtotime($waktu_mulai[4]));
		$jadwal8 = date('Y-m-d H:i', strtotime($waktu_selesai[4]));
		$jadwal9 = date('Y-m-d H:i', strtotime($waktu_mulai[5]));
		$jadwal10 = date('Y-m-d H:i', strtotime($waktu_selesai[5]));
		$jadwal11 = date('Y-m-d H:i', strtotime($waktu_mulai[6]));
		$jadwal12 = date('Y-m-d H:i', strtotime($waktu_selesai[6]));
		$jadwal13 = date('Y-m-d H:i', strtotime($waktu_mulai[7]));
		$jadwal14 = date('Y-m-d H:i', strtotime($waktu_selesai[7]));
		$jadwal15 = date('Y-m-d H:i', strtotime($waktu_mulai[8]));
		$jadwal16 = date('Y-m-d H:i', strtotime($waktu_selesai[8]));
		$jadwal17 = date('Y-m-d H:i', strtotime($waktu_mulai[9]));
		$jadwal18 = date('Y-m-d H:i', strtotime($waktu_selesai[9]));
		$jadwal19 = date('Y-m-d H:i', strtotime($waktu_mulai[10]));
		$jadwal20 = date('Y-m-d H:i', strtotime($waktu_selesai[10]));
		$jadwal21 = date('Y-m-d H:i', strtotime($waktu_mulai[11]));
		$jadwal22 = date('Y-m-d H:i', strtotime($waktu_selesai[11]));
		$jadwal23 = date('Y-m-d H:i', strtotime($waktu_mulai[12]));
		$jadwal24 = date('Y-m-d H:i', strtotime($waktu_selesai[12]));
		$jadwal25 = date('Y-m-d H:i', strtotime($waktu_mulai[13]));
		$jadwal26 = date('Y-m-d H:i', strtotime($waktu_selesai[13]));
		$jadwal27 = date('Y-m-d H:i', strtotime($waktu_mulai[14]));
		$jadwal28 = date('Y-m-d H:i', strtotime($waktu_selesai[14]));
		$jadwal29 = date('Y-m-d H:i', strtotime($waktu_mulai[15]));
		$jadwal30 = date('Y-m-d H:i', strtotime($waktu_selesai[15]));
		$jadwal31 = date('Y-m-d H:i', strtotime($waktu_mulai[16]));
		$jadwal32 = date('Y-m-d H:i', strtotime($waktu_selesai[16]));
		$jadwal33 = date('Y-m-d H:i', strtotime($waktu_mulai[17]));
		$jadwal34 = date('Y-m-d H:i', strtotime($waktu_selesai[17]));
		$jadwal35 = date('Y-m-d H:i', strtotime($waktu_mulai[18]));
		$jadwal36 = date('Y-m-d H:i', strtotime($waktu_selesai[18]));
		$jadwal37 = date('Y-m-d H:i', strtotime($waktu_mulai[19]));
		$jadwal38 = date('Y-m-d H:i', strtotime($waktu_selesai[19]));
		$jadwal39 = date('Y-m-d H:i', strtotime($waktu_mulai[20]));
		$jadwal40 = date('Y-m-d H:i', strtotime($waktu_selesai[20]));

		if ($jadwal1 > $jadwal2) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal1'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[1]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal1)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal2)),
			];
			$data2 = [
				'batas_pendaftaran_tender' => $waktu_selesai[1],
			];

			$this->M_panitia->update_jadwal_rup_tender_terbatas_18_jadwal($data, $where);
			$this->M_panitia->update_rup_panitia($id_rup, $data2);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal3 < $jadwal2 || $jadwal3 > $jadwal4) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal2'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[2]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal3)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal4)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal5 < $jadwal4 || $jadwal5 > $jadwal6) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal3'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[3]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal5)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal6)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal7 < $jadwal6 || $jadwal7 > $jadwal8) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal4'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[4]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal7)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal8)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal9 < $jadwal8 || $jadwal9 > $jadwal10) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal5'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[5]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal9)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal10)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal11 < $jadwal10 || $jadwal11 > $jadwal12) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal6'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[6]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal11)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal12)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal13 < $jadwal12 || $jadwal13 > $jadwal14) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal7'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[7]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal13)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal14)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal15 < $jadwal14 || $jadwal15 > $jadwal16) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal8'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[8]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal15)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal16)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal17 < $jadwal16 || $jadwal17 > $jadwal18) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal9'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[9]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal17)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal18)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal19 < $jadwal18 || $jadwal19 > $jadwal20) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal10'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[10]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal19)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal20)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal21 < $jadwal20 || $jadwal21 > $jadwal22) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal11'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[11]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal21)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal22)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal23 < $jadwal22 || $jadwal23 > $jadwal24) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal12'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[12]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal23)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal24)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal25 < $jadwal24 || $jadwal25 > $jadwal26) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal13'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[13]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal25)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal26)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal27 < $jadwal26 || $jadwal27 > $jadwal29) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal14'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[14]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal27)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal28)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal29 < $jadwal28 || $jadwal29 > $jadwal30) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal15'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[15]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal29)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal30)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}


		if ($jadwal29 < $jadwal28 || $jadwal29 > $jadwal30) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal15'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[15]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal29)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal30)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal31 < $jadwal30 || $jadwal31 > $jadwal32) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal16'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[16]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal31)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal32)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal33 < $jadwal32 || $jadwal33 > $jadwal34) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal17'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[17]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal33)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal34)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal35 < $jadwal34 || $jadwal35 > $jadwal36) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal18'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[18]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal35)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal36)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}


		if ($jadwal37 < $jadwal35 || $jadwal37 > $jadwal38) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal19'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[19]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal37)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal38)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}

		if ($jadwal39 < $jadwal37 || $jadwal39 > $jadwal40) {
			$this->output->set_content_type('application/json')->set_output(json_encode('gagal20'));
		} else {
			$where = [
				'id_jadwal_rup' => $id_jadwal_rup[20]
			];
			$data = [
				'waktu_mulai' => date('Y-m-d H:i', strtotime($jadwal39)),
				'waktu_selesai' => date('Y-m-d H:i', strtotime($jadwal40)),
			];

			$this->M_panitia->update_jadwal($data, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function update_syarat_klasifikasi()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$syarat_tender_kualifikasi = $this->input->post('syarat_tender_kualifikasi');
		$data = [
			'syarat_tender_kualifikasi' => $syarat_tender_kualifikasi
		];
		$this->M_panitia->update_rup($id_url_rup, $data);
		$response = [
			'row_rup' => $this->M_rup->get_row_rup($id_url_rup),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	// INI UNTUK SYARAT TENDER IZIN USAHA
	public function update_syarat_izin_usaha_tender()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		// bagian siup
		$sts_checked_siup = $this->input->post('sts_checked_siup');
		$sts_masa_berlaku_siup = $this->input->post('sts_masa_berlaku_siup');
		$tgl_berlaku_siup = $this->input->post('tgl_berlaku_siup');
		// bagian nib
		$sts_checked_nib = $this->input->post('sts_checked_nib');
		$sts_masa_berlaku_nib = $this->input->post('sts_masa_berlaku_nib');
		$tgl_berlaku_nib = $this->input->post('tgl_berlaku_nib');
		// bagian sbu
		$sts_checked_sbu = $this->input->post('sts_checked_sbu');
		$sts_masa_berlaku_sbu = $this->input->post('sts_masa_berlaku_sbu');
		$tgl_berlaku_sbu = $this->input->post('tgl_berlaku_sbu');
		// bagian siujk
		$sts_checked_siujk = $this->input->post('sts_checked_siujk');
		$sts_masa_berlaku_siujk = $this->input->post('sts_masa_berlaku_siujk');
		$tgl_berlaku_siujk = $this->input->post('tgl_berlaku_siujk');
		// bagian skdp
		$sts_checked_skdp = $this->input->post('sts_checked_skdp');
		$sts_masa_berlaku_skdp = $this->input->post('sts_masa_berlaku_skdp');
		$tgl_berlaku_skdp = $this->input->post('tgl_berlaku_skdp');

		$type = $this->input->post('type');
		$type_izin = $this->input->post('type_izin');
		if ($type_izin == 'siup') {
			if ($type == 'sts_checked_siup') {
				$data = [
					'sts_checked_siup' => $sts_checked_siup,

				];
			} else if ($type == 'sts_masa_berlaku_siup') {
				if ($sts_masa_berlaku_siup == 1) {
					$data = [
						'sts_masa_berlaku_siup' => $sts_masa_berlaku_siup,
						'tgl_berlaku_siup' => $tgl_berlaku_siup
					];
				} else {
					$data = [
						'sts_masa_berlaku_siup' => $sts_masa_berlaku_siup,
						'tgl_berlaku_siup' => date('Y-m-d'),
					];
				}
			} else {
				$data = [
					'tgl_berlaku_siup' => $tgl_berlaku_siup
				];
			}
		} else if ($type_izin == 'nib') {
			if ($type == 'sts_checked_nib') {
				$data = [
					'sts_checked_nib' => $sts_checked_nib,
					'tgl_berlaku_nib' => date('Y-m-d'),
				];
			} else if ($type == 'sts_masa_berlaku_nib') {
				if ($sts_masa_berlaku_nib == 1) {
					$data = [
						'sts_masa_berlaku_nib' => $sts_masa_berlaku_nib,
						'tgl_berlaku_nib' => $tgl_berlaku_nib
					];
				} else {
					$data = [
						'sts_masa_berlaku_nib' => $sts_masa_berlaku_nib,
						'tgl_berlaku_nib' => date('Y-m-d'),
					];
				}
			} else {
				$data = [
					'tgl_berlaku_nib' => $tgl_berlaku_nib
				];
			}
		} else if ($type_izin == 'sbu') {
			if ($type == 'sts_checked_sbu') {
				$data = [
					'sts_checked_sbu' => $sts_checked_sbu,
					'tgl_berlaku_sbu' => date('Y-m-d'),
				];
			} else if ($type == 'sts_masa_berlaku_sbu') {
				if ($sts_masa_berlaku_sbu == 1) {
					$data = [
						'sts_masa_berlaku_sbu' => $sts_masa_berlaku_sbu,
						'tgl_berlaku_sbu' => $tgl_berlaku_sbu
					];
				} else {
					$data = [
						'sts_masa_berlaku_sbu' => $sts_masa_berlaku_sbu,
						'tgl_berlaku_sbu' => date('Y-m-d'),
					];
				}
			} else {
				$data = [
					'tgl_berlaku_sbu' => $tgl_berlaku_sbu
				];
			}
		} else if ($type_izin == 'siujk') {
			if ($type == 'sts_checked_siujk') {
				$data = [
					'sts_checked_siujk' => $sts_checked_siujk,
					'tgl_berlaku_siujk' => date('Y-m-d'),
				];
			} else if ($type == 'sts_masa_berlaku_siujk') {
				if ($sts_masa_berlaku_siujk == 1) {
					$data = [
						'sts_masa_berlaku_siujk' => $sts_masa_berlaku_siujk,
						'tgl_berlaku_siujk' => $tgl_berlaku_siujk
					];
				} else {
					$data = [
						'sts_masa_berlaku_siujk' => $sts_masa_berlaku_siujk,
						'tgl_berlaku_siujk' => date('Y-m-d'),
					];
				}
			} else {
				$data = [
					'tgl_berlaku_siujk' => $tgl_berlaku_siujk
				];
			}
		} else if ($type_izin == 'skdp') {
			if ($type == 'sts_checked_skdp') {
				$data = [
					'sts_checked_skdp' => $sts_checked_skdp,
					'tgl_berlaku_skdp' => date('Y-m-d'),
				];
			} else if ($type == 'sts_masa_berlaku_skdp') {
				if ($sts_masa_berlaku_skdp == 1) {
					$data = [
						'sts_masa_berlaku_skdp' => $sts_masa_berlaku_skdp,
						'tgl_berlaku_skdp' => $tgl_berlaku_skdp
					];
				} else {
					$data = [
						'sts_masa_berlaku_skdp' => $sts_masa_berlaku_skdp,
						'tgl_berlaku_skdp' => date('Y-m-d'),
					];
				}
			} else {
				$data = [
					'tgl_berlaku_skdp' => $tgl_berlaku_skdp
				];
			}
		}
		$this->M_panitia->update_syarat_izin_usaha_tender($row_rup['id_rup'], $data);
		$response = [
			'row_syarat_izin_usah_tender' => $this->M_panitia->get_syarat_izin_usaha_tender($row_rup['id_rup'])
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	// INI UNTUK SYARAT TENDER KBLI

	function url_get_tambah_syarat_kbli()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$nama_kbli = $this->input->post('nama_kbli');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$row_kbli = $this->M_panitia->get_row_kbli($nama_kbli);
		$cek_syarat_kbli_tender = $this->M_panitia->row_syarat_tender_kbli($row_rup['id_rup'], $row_kbli['id_kbli']);
		if ($cek_syarat_kbli_tender) {
			$response = [
				'error' => [
					'id_kbli' => 'Kode Kbli Sudah Ada Di Table Anda',
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$data = [
				'id_rup' => $row_rup['id_rup'],
				'id_kbli' => $nama_kbli
			];
			$this->M_panitia->tambah_syarat_tender_kbli($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	function get_kbli_syarat_tender()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$response = [
			'result_syarat_tender_kbli' => $this->M_panitia->result_syarat_tender_kbli($row_rup['id_rup'])
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	function url_hapus_syarat_kbli()
	{
		$id_syarat_kbli_tender = $this->input->post('id_syarat_kbli_tender');
		$where = [
			'id_syarat_kbli_tender' => $id_syarat_kbli_tender
		];
		$this->M_panitia->delete_syarat_tender_kbli($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	// INI UNTUK SYARAT TENDER SBU

	function url_get_tambah_syarat_sbu()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$nama_sbu = $this->input->post('nama_sbu');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$row_sbu = $this->M_panitia->get_row_sbu($nama_sbu);
		$cek_syarat_sbu_tender = $this->M_panitia->row_syarat_tender_sbu($row_rup['id_rup'], $row_sbu['id_sbu']);
		if ($cek_syarat_sbu_tender) {
			$response = [
				'error' => [
					'id_sbu' => 'Kode sbu Sudah Ada Di Table Anda',
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$data = [
				'id_rup' => $row_rup['id_rup'],
				'id_sbu' => $row_sbu['id_sbu']
			];
			$this->M_panitia->tambah_syarat_tender_sbu($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}
	function get_sbu_syarat_tender()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$response = [
			'result_syarat_tender_sbu' => $this->M_panitia->result_syarat_tender_sbu($row_rup['id_rup'])
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	function url_hapus_syarat_sbu()
	{
		$id_syarat_sbu_tender = $this->input->post('id_syarat_sbu_tender');
		$where = [
			'id_syarat_sbu_tender' => $id_syarat_sbu_tender
		];
		$this->M_panitia->delete_syarat_tender_sbu($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	// INI UNTUK SYARAT TENDER TEKNIS

	public function update_syarat_izin_teknis_tender()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		// pengalaman_pekerjaan
		$sts_checked_pengalaman_pekerjaan = $this->input->post('sts_checked_pengalaman_pekerjaan');
		// spt
		$sts_checked_spt = $this->input->post('sts_checked_spt');
		$tahun_lapor_spt = $this->input->post('tahun_lapor_spt');
		// laporan_keuangan
		$sts_checked_laporan_keuangan = $this->input->post('sts_checked_laporan_keuangan');
		$sts_audit_laporan_keuangan = $this->input->post('sts_audit_laporan_keuangan');
		$tahun_awal_laporan_keuangan = $this->input->post('tahun_awal_laporan_keuangan');
		$tahun_akhir_laporan_keuangan = $this->input->post('tahun_akhir_laporan_keuangan');
		// neraca_keuangan
		$sts_checked_neraca_keuangan = $this->input->post('sts_checked_neraca_keuangan');
		$tahun_awal_neraca_keuangan = $this->input->post('tahun_awal_neraca_keuangan');
		$tahun_akhir_neraca_keuangan = $this->input->post('tahun_akhir_neraca_keuangan');
		$type = $this->input->post('type');
		if ($type == 'sts_checked_pengalaman_pekerjaan') {
			// pengalaman_pekerjaan
			$data = [
				'sts_checked_pengalaman_pekerjaan' => $sts_checked_pengalaman_pekerjaan,
			];
		} else if ($type == 'sts_checked_spt') {
			// spt
			$data = [
				'sts_checked_spt' => $sts_checked_spt,
			];
		} else if ($type == 'tahun_lapor_spt') {
			// spt
			$data = [
				'tahun_lapor_spt' => $tahun_lapor_spt,
			];
		} else if ($type == 'sts_checked_laporan_keuangan') {
			// laporan_keuangan
			$data = [
				'sts_checked_laporan_keuangan' => $sts_checked_laporan_keuangan,
			];
		} else if ($type == 'sts_audit_laporan_keuangan') {
			// laporan_keuangan
			$data = [
				'sts_audit_laporan_keuangan' => $sts_audit_laporan_keuangan,
			];
		} else if ($type == 'tahun_awal_laporan_keuangan') {
			// laporan_keuangan
			$data = [
				'tahun_awal_laporan_keuangan' => $tahun_awal_laporan_keuangan,
				'tahun_awal_neraca_keuangan' => $tahun_awal_laporan_keuangan,
			];
		} else if ($type == 'tahun_akhir_laporan_keuangan') {
			// laporan_keuangan
			$data = [
				'tahun_akhir_laporan_keuangan' => $tahun_akhir_laporan_keuangan,
				'tahun_akhir_neraca_keuangan' => $tahun_akhir_laporan_keuangan,
			];
		} else if ($type == 'sts_checked_neraca_keuangan') {
			// neraca_keuangan
			$data = [
				'sts_checked_neraca_keuangan' => $sts_checked_neraca_keuangan,
			];
		} else if ($type == 'tahun_awal_neraca_keuangan') {
			// neraca_keuangan
			$data = [
				'tahun_awal_neraca_keuangan' => $tahun_awal_neraca_keuangan,
			];
		} else if ($type == 'tahun_akhir_neraca_keuangan') {
			// neraca_keuangan
			$data = [
				'tahun_akhir_neraca_keuangan' => $tahun_akhir_neraca_keuangan,
			];
		} else { }
		$this->M_panitia->update_syarat_izin_teknis_tender($row_rup['id_rup'], $data);
		$response = [
			'row_syarat_izin_teknis_tender' => $this->M_panitia->get_syarat_izin_teknis_tender($row_rup['id_rup'])
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_dok_pengadaan()
	{
		$id_rup = $this->input->post('id_rup');
		$nama_dok_pengadaan = $this->input->post('nama_dok_pengadaan');
		$nama_rup = $this->input->post('nama_rup');
		$nama_pegawai = $this->session->userdata('nama_pegawai');
		$rup = $this->M_panitia->get_rup($id_rup);
		$date = date('Y');
		if (!is_dir('file_paket/' . $nama_rup  . '/DOKUMEN_PENGADAAN')) {
			mkdir('file_paket/' . $nama_rup  . '/DOKUMEN_PENGADAAN', 0777, TRUE);
		}

		$config['upload_path'] = './file_paket/' . $nama_rup  . '/DOKUMEN_PENGADAAN';
		$config['allowed_types'] = 'pdf|xlsx|xls';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dok_pengadaan')) {
			$fileData = $this->upload->data();
			if ($rup['status_paket_diumumkan'] == 1) {
				$upload = [
					'nama_dok_pengadaan' => $nama_dok_pengadaan,
					'id_rup' => $id_rup,
					'file_dok_pengadaan' => $fileData['file_name'],
					'user_created' => $nama_pegawai,
					'sts_dokumen_tambahan' => 1
				];
			} else {
				$upload = [
					'nama_dok_pengadaan' => $nama_dok_pengadaan,
					'id_rup' => $id_rup,
					'file_dok_pengadaan' => $fileData['file_name'],
					'user_created' => $nama_pegawai
				];
			}
			$this->M_panitia->insert_dok_pengadaan($upload);
		}
	}
	public function simpan_syarat_tambahan()
	{
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$nama_syarat_tambahan = $this->input->post('nama_syarat_tambahan');
		$date = date('Y');
		if (!is_dir('file_paket/' . $row_rup['nama_rup'] . '/SYARAT_TAMBAHAN')) {
			mkdir('file_paket/' . $row_rup['nama_rup'] . '/SYARAT_TAMBAHAN', 0777, TRUE);
		}
		$config['upload_path'] = './file_paket/' . $row_rup['nama_rup'] . '/SYARAT_TAMBAHAN';
		$config['allowed_types'] = 'pdf|xlsx|xls';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_syarat_tambahan')) {
			$fileData = $this->upload->data();
			$upload = [
				'id_rup' => $row_rup['id_rup'],
				'nama_syarat_tambahan' => $nama_syarat_tambahan,
				'file_syarat_tambahan' => $fileData['file_name']
			];
			$this->M_panitia->tambah_syarat_rup($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$upload = [
				'id_rup' => $row_rup['id_rup'],
				'nama_syarat_tambahan' => $nama_syarat_tambahan,
				'file_syarat_tambahan' => ''
			];
			$this->M_panitia->tambah_syarat_rup($upload);
		}
	}

	function hapus_dok_pengadaan()
	{
		$id_dokumen_pengadaan = $this->input->post('id_dokumen_pengadaan');
		$where = [
			'id_dokumen_pengadaan' => $id_dokumen_pengadaan
		];
		$this->M_panitia->delete_dok_pengadaan($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function add_dok_prakualifikasi()
	{
		$id_rup = $this->input->post('id_rup');
		$nama_dok_prakualifikasi = $this->input->post('nama_dok_prakualifikasi');
		$nama_rup = $this->input->post('nama_rup');
		$nama_pegawai = $this->session->userdata('nama_pegawai');
		$rup = $this->M_panitia->get_rup($id_rup);
		$date = date('Y');
		if (!is_dir('file_paket/' . $nama_rup  . '/DOKUMEN_PRAKUALIFIKASI')) {
			mkdir('file_paket/' . $nama_rup  . '/DOKUMEN_PRAKUALIFIKASI', 0777, TRUE);
		}

		$config['upload_path'] = './file_paket/' . $nama_rup  . '/DOKUMEN_PRAKUALIFIKASI';
		$config['allowed_types'] = 'pdf|xlsx|xls';
		$config['max_size'] = 0;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_dok_prakualifikasi')) {
			$fileData = $this->upload->data();
			if ($rup['status_paket_diumumkan'] == 1) {
				$upload = [
					'nama_dok_prakualifikasi' => $nama_dok_prakualifikasi,
					'id_rup' => $id_rup,
					'file_dok_prakualifikasi' => $fileData['file_name'],
					'user_created' => $nama_pegawai,
					'sts_dokumen_tambahan' => 1
				];
			} else {
				$upload = [
					'nama_dok_prakualifikasi' => $nama_dok_prakualifikasi,
					'id_rup' => $id_rup,
					'file_dok_prakualifikasi' => $fileData['file_name'],
					'user_created' => $nama_pegawai
				];
			}
			$this->M_panitia->insert_dok_prakualifikasi($upload);
		}
	}

	function hapus_dok_prakualifikasi()
	{
		$id_dokumen_prakualifikasi = $this->input->post('id_dokumen_prakualifikasi');
		$where = [
			'id_dokumen_prakualifikasi' => $id_dokumen_prakualifikasi
		];
		$this->M_panitia->delete_dok_prakualifikasi($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_dok_pengadaan($id_rup_global)
	{
		$response = [
			'dok_pengadaan'  => $this->M_panitia->get_dokumen_pengadaan($id_rup_global),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function get_dok_prakualifikasi($id_rup_global)
	{
		$response = [
			'dok_prakualifikasi'  => $this->M_panitia->get_dokumen_prakualifikasi($id_rup_global),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function get_syarat_tambahan()
	{
		$id_url_rup  = $this->input->post('id_url_rup');
		$row_rup  = $this->M_rup->get_row_rup($id_url_rup);
		$response = [
			'result_syarat_tender_tambahan'  => $this->M_panitia->result_syarat_tambahan($row_rup['id_rup'])
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_syarat_tambahan($id_syarat_tambahan)
	{
		$row_syarat  = $this->M_panitia->row_syarat_tambahan($id_syarat_tambahan);
		$file_url = 'file_paket/'  . $row_syarat['nama_rup']  .  '/SYARAT_TAMBAHAN' . '/'  . $row_syarat['file_syarat_tambahan'];
		$url  = $file_url;
		redirect($url);
	}

	function url_hapus_syarat_tambahan()
	{
		$id_syarat_tambahan  = $this->input->post('id_syarat_tambahan');
		$where = [
			'id_syarat_tambahan'  => $id_syarat_tambahan
		];
		$this->M_panitia->delete_syarat_rup($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function setujui_pakta_integritas()
	{
		$data = [
			'sts_pakta_integritas' => 1
		];
		$where = [
			'id_manajemen_user' => $this->input->post('id_manajemen_user'),
			'id_rup' => $this->input->post('id_rup_global'),
		];
		$this->M_panitia->panitia_mengikuti_update($data, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
