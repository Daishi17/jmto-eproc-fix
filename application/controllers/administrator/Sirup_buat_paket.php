<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Sirup_buat_paket extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('M_rkap/M_rkap');
		$this->load->model('M_rup/M_rup');
		$this->load->model('M_departmen/M_departmen');
		$this->load->model('M_master/M_karyawan');
		$this->load->model('M_section/M_section');
		$this->load->model('M_jenis_pengadaan/M_jenis_pengadaan');
		$this->load->model('M_metode_pengadaan/M_metode_pengadaan');
		$this->load->model('M_jenis_anggaran/M_jenis_anggaran');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->model('M_jenis_jadwal/M_jenis_jadwal');
		$role = $this->session->userdata('role');
		if (!$role) {
			redirect('auth');
		}
	}
	public function index()
	{
		$data['pegawai_panitia'] = $this->M_rup->pegawai_panitia();
		$data['get_jadwal'] =  $this->db->get('tbl_jadwal_tender')->result_array();
		$this->load->view('administrator/template_menu/header_menu');
		$this->load->view('administrator/template/si_rup/js_header_rup');
		$this->load->view('administrator/sirup_rup/base_url'); //ini untuk base_url page rup
		$this->load->view('administrator/sirup_rup/buat_paket', $data);
		$this->load->view('administrator/template_menu/footer_menu');
		$this->load->view('administrator/sirup_rup/file_public_buat_paket');
	}

	function get_rup()
	{
		$result = $this->M_rup->gettable_rup_paket();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = $rs->kode_rup;
			$row[] = $rs->tahun_rup;
			$row[] = $rs->nama_rup;
			$row[] = $rs->nama_departemen;
			$row[] = "Rp " . number_format($rs->total_pagu_rup, 2, ',', '.');
			$row[] = $rs->nama_jenis_pengadaan;
			$row[] = '<div class="text-center">
				<a href="javascript:;" class="btn btn-primary btn-sm shadow-lg" onClick="by_id_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa-solid fa-square-plus"></i> Buat Paket</a>
				</div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_rup->count_all_rup_paket(),
			"recordsFiltered" => $this->M_rup->count_filtered_rup_paket(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_rup($id_url_rup)
	{
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$ruas_rup = $this->M_rup->get_ruas_by_id_rup($row_rup['id_rup']);
		$metode = $this->M_rup->get_metode($row_rup['id_rup']);
		$response = [
			'row_rup' => $this->M_rup->get_row_rup($id_url_rup),
			'result_ruas_rup' => $ruas_rup,
			'metode' => $metode
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function tambah_panitia()
	{
		$role_panitia = $this->input->post('role_panitia');
		$nama_panitia = $this->input->post('nama_panitia');
		$id_url_rup = $this->input->post('random_kode');
		if ($nama_panitia == null) {
			$response = [
				'error' => 'Pilih Nama Panitia Dahulu Yaa',
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$convert_nama = str_split($nama_panitia);
			$kode_mnj_user = $convert_nama[0] . $convert_nama[1] . $convert_nama[2];
			$row_pegawai_panitia = $this->M_rup->pegawai_panitia_by_kode_mnjm_user($kode_mnj_user);
			$row_rup = $this->M_rup->get_row_rup($id_url_rup);
			$cek_data_role_ketua = $this->M_rup->cek_role_panitia($row_rup['id_rup'], $role_panitia);

			$cek_user_panitia = $this->M_rup->cek_user_panitia($row_rup['id_rup'], $row_pegawai_panitia['id_pegawai']);

			if ($cek_user_panitia) {
				$response = [
					'error' => 'User Panitia Panitia Sudah Ada',
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				if (!$cek_data_role_ketua) {
					$id = $this->uuid->v4();
					$id = str_replace('-', '', $id);
					$data  = array(
						'id_url_panitia' => $id,
						'id_manajemen_user' => $row_pegawai_panitia['id_manajemen_user'],
						'role_panitia' => $role_panitia,
						'id_rup' => $row_rup['id_rup']
					);
					$this->db->insert('tbl_panitia', $data);
					$response = [
						'success' => 'success'
					];
					$this->output->set_content_type('application/json')->set_output(json_encode($response));
				} else {

					if ($cek_data_role_ketua['role_panitia'] == 1) {
						$response = [
							'error' => 'Role Ketua Panitia Sudah Ada',
						];
						$this->output->set_content_type('application/json')->set_output(json_encode($response));
					} else if ($cek_data_role_ketua['role_panitia'] == 2) {
						$response = [
							'error' => 'Role Sekertaris Sudah Ada',
						];
						$this->output->set_content_type('application/json')->set_output(json_encode($response));
					} else {
						$id = $this->uuid->v4();
						$id = str_replace('-', '', $id);
						$data  = array(
							'id_url_panitia' => $id,
							'id_manajemen_user' => $row_pegawai_panitia['id_manajemen_user'],
							'role_panitia' => $role_panitia,
							'id_rup' => $row_rup['id_rup']
						);
						$this->db->insert('tbl_panitia', $data);
						$response = [
							'success' => 'success'
						];
						$this->output->set_content_type('application/json')->set_output(json_encode($response));
					}
				}
			}
		}
	}

	function get_panitia()
	{
		$id_url_rup = $this->input->post('random_kode');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$result = $this->M_rup->gettable_rup_panitia($row_rup['id_rup']);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = $rs->nama_pegawai;
			if ($rs->role_panitia == 1) {
				$row[] = 'Ketua Panitia';
			} else if ($rs->role_panitia == 2) {
				$row[] = 'Sekretaris';
			} else {
				$row[] = 'Anggota';
			}
			$row[] = '<div class="text-center">
				<a href="javascript:;" class="btn btn-danger btn-sm shadow-lg" onClick="by_id_panitia(' . "'" . $rs->id_url_panitia . "','hapus_panitia'" . ')"><i class="fa-solid fa-trash"></i> Hapus User</a>
				</div>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_rup->count_all_rup_panitia($row_rup['id_rup']),
			"recordsFiltered" => $this->M_rup->count_filtered_rup_panitia($row_rup['id_rup']),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	function get_by_id_panitia($id_url_panitia)
	{
		$response = [
			'row_panitia' => $this->M_rup->get_row_panitia($id_url_panitia),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}



	function hapus_panitia($id_url_panitia)
	{
		$where = [
			'id_url_panitia' => $id_url_panitia
		];
		$this->M_rup->delete_panitia($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	function simpan_buat_rup()
	{
		$id_url_rup = $this->input->post('random_kode');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$id_jadwal_tender = $this->input->post('id_jadwal_tender');
		$metode_kualifikasi = $this->input->post('metode_kualifikasi');
		$metode_dokumen = $this->input->post('metode_dokumen');

		$cek_pantia_kurang_dari_5 = $this->M_rup->get_result_panitia($row_rup['id_rup']);
		$cek_pantia_kurang_dari_5_ketua = $this->M_rup->cek_sudah_ada_pantia_ketua_dan_sekertaris($row_rup['id_rup']);
		if ($cek_pantia_kurang_dari_5 >= 7) {
			if ($cek_pantia_kurang_dari_5_ketua >= 2) {
				$where = [
					'id_url_rup' => $id_url_rup
				];

				$data = [
					'sts_rup_buat_paket' => 1,
					'id_jadwal_tender' => $id_jadwal_tender,
					'metode_kualifikasi' => $metode_kualifikasi,
					'metode_dokumen' => $metode_dokumen,
				];
				$date = date('Y');
				$get_nama_rup = $this->M_rup->get_nama($where);
				if (!is_dir('file_paket/' . $get_nama_rup['nama_rup'])) {
					mkdir('file_paket/' . $get_nama_rup['nama_rup'], 0777, TRUE);
				}
				$this->M_rup->update_rup($data, $where);

				$response = [
					'success' => 'Rup Paket Berhasil Di Buat'
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$response = [
					'validasi' => 'Ketua Atau Sekertaris Belum Ada'
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		} else {
			$response = [
				'validasi' => 'Maaf Panitia Tidak Boleh Kurang Dari 5'
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}


	function finalisasi_paket_rup_final($id_url_rup)
	{
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$result_jadwal = $this->M_jenis_jadwal->generate_jadwal($row_rup['id_jadwal_tender']);
		$cek_ke_jadwal_rup = $this->M_jenis_jadwal->cek_jadwal_rup($row_rup['id_rup']);
		$this->M_jenis_jadwal->delete_jadwal_rup($row_rup['id_rup']);

		// INI UNTUK CHECKER GENERATE PERSYARATAN 
		$cek_syarat_izin = $this->M_rup->cek_syarat_izin_usaha($row_rup['id_rup']);
		$cek_syarat_izin_teknis = $this->M_rup->cek_syarat_izin_teknis($row_rup['id_rup']);

		if (!$cek_syarat_izin) {
			$data = [
				'id_rup' => $row_rup['id_rup'],
				'tgl_berlaku_siup' => date('Y-m-d'),
				'tgl_berlaku_nib' => date('Y-m-d'),
				'tgl_berlaku_sbu' => date('Y-m-d'),
				'tgl_berlaku_siujk' => date('Y-m-d'),
				'tgl_berlaku_skdp' => date('Y-m-d'),
			];
			$this->M_rup->tambah_izin_usaha($data);
		} else {
		}

		if (!$cek_syarat_izin_teknis) {
			$data = [
				'id_rup' => $row_rup['id_rup'],
				'id_rup' => $row_rup['id_rup'],
				'tahun_lapor_spt' => date('Y'),
				'tahun_awal_laporan_keuangan' => '2020',
				'tahun_akhir_laporan_keuangan' => '2020',
				'tahun_awal_neraca_keuangan' => '2020',
				'tahun_akhir_neraca_keuangan' => '2020',
			];
			$this->M_rup->tambah_izin_teknis($data);
		} else {
		}

		foreach ($result_jadwal as $key => $value) {
			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			$data = [
				'id_url_jadwal_rup' => $id,
				'id_rup' => $row_rup['id_rup'],
				'id_url_rup' => $row_rup['id_url_rup'],
				'nama_jadwal_rup' => $value['nama_jadwal'],
			];
			$this->M_jenis_jadwal->insert_generate_jadwal($data);
		}

		$where = [
			'id_url_rup' => $id_url_rup
		];
		$data = [
			'sts_rup_buat_paket' => 2
		];
		$this->M_rup->update_rup($data, $where);

		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$ambil_role_2 = $this->M_karyawan->ambil_role_2();
		// ini menambah admin sebagai panitia
		foreach ($ambil_role_2 as $key => $value) {
			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			$data  = array(
				'id_url_panitia' => $id,
				'id_manajemen_user' => $value['id_manajemen_user'],
				'role_panitia' => 1,
				'id_rup' => $row_rup['id_rup']
			);
			$this->db->insert('tbl_panitia', $data);
		}

		$response = [
			'success' => 'Rup Paket Berhasil Di Buat'
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	function get_rup_final()
	{
		$result = $this->M_rup->gettable_rup_paket_final();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {
			$row = array();
			$row[] = $rs->kode_rup;
			$row[] = $rs->tahun_rup;
			$row[] = $rs->nama_rup;
			$row[] = $rs->nama_departemen;
			$row[] = "Rp " . number_format($rs->total_pagu_rup, 2, ',', '.');
			if ($rs->sts_rup_buat_paket == 1) {
				$row[] = '<small><span class="badge bg-warning">Draft Paket</span></small>';
			} else {
				$row[] = '<small><span class="badge bg-success text-white">Finalisasi Paket</span></small>';
			}
			// if ($rs->sts_rup_buat_paket == 1) {
			// 	$row[] = '<div class="text-center">
			// 	<a href="javascript:;" class="btn btn-warning btn-sm  shadow-lg" onClick="lihat_jadwal(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i>
			// 	<small>View Jadwal</small></a>
			// 	</div>';
			// } else {
			// 	$row[] = '<div class="text-center">
			// 	<button type="button" class="btn btn-warning btn-sm  shadow-lg" disabled>
			// 	<i class="fa-solid fa-users-viewfinder px-1"></i> 
			// 		<small>View Jadwal</small>
			// 	</button>
			// </div>';
			// }
			if ($rs->sts_rup_buat_paket == 1) {
				$row[] = '<div class="text-center">
				<a href="javascript:;" class="btn btn-info btn-sm  shadow-lg" onClick="by_id_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i>
				<small>Detail</small></a>
				<a href="javascript:;" class="btn btn-success btn-sm  shadow-lg" onClick="finalisasi_final_rup(' . "'" . $rs->id_url_rup . "'" . ')"><i class="fa-regular fa-circle-up px-1"></i>
				<small>Finalisasi</small></a>
				</div>';
			} else {
				$row[] = '<div class="text-center">
				<button type="button" class="btn btn-info btn-sm  shadow-lg" disabled>
				<i class="fa-solid fa-square-plus px-1"></i> 
					<small>Detail</small>
				</button>
				<button type="button" class="btn btn-success btn-sm  shadow-lg" disabled>
				<i class="fa-regular fa-circle-up px-1"></i>
					<small>Finalisasi</small>
				</button>
			</div>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_rup->count_all_rup_paket_final(),
			"recordsFiltered" => $this->M_rup->count_filtered_rup_paket_final(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_jenis_jadwal_dokumen() //satuan kerja
	{
		$metode_kualifikasi = $this->input->post('metode_kualifikasi');
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$data = $this->M_jenis_jadwal->get_result_jenis_jadwal_paket_dokumen($metode_kualifikasi, $row_rup['id_metode_pengadaan']);
		echo '<option value="">Pilih Metode Dokumen</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['metode_dokumen'] . '">' . $value['metode_dokumen'] . '</option>';
		}
	}
	public function get_jenis_jadwal() //satuan kerja
	{
		$metode_kualifikasi = $this->input->post('metode_kualifikasi');
		$metode_dokumen = $this->input->post('metode_dokumen');
		$id_url_rup = $this->input->post('id_url_rup');
		$row_rup = $this->M_rup->get_row_rup($id_url_rup);
		$data = $this->M_jenis_jadwal->get_result_jenis_jadwal_paket($metode_kualifikasi, $metode_dokumen, $row_rup['id_metode_pengadaan']);
		echo '<option value="">Pilih Jenis Jadwal</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_jadwal_tender'] . '">' . $value['nama_jadwal_pengadaan'] . '</option>';
		}
	}

	public function get_jenis_jadwal_juksung($id_url_rup) //satuan kerja
	{
		echo '<option value="9">Penunjukan Langsung</option>';
	}
}
