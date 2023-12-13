<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Laporan_total extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_laporan/M_total');
		$role = $this->session->userdata('role');
		if (!$role == 1) {
			redirect('auth');
		}
	}

    public function index()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/laporan/laporan_total');
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/laporan/ajax_total');
	}

	public function grafik_dan_rekap()
	{
		$data['departemen'] = $this->M_total->get_departemen();
		$data['total_barang_semua_paket'] = $this->M_total->get_total_barang();
		$data['total_pemborongan_semua_paket'] = $this->M_total->get_total_konstruksi();
		$data['total_konsultansi_semua_paket'] = $this->M_total->get_total_konsultasi();
		$data['total_lain_semua_paket'] = $this->M_total->get_total_lain();
		$this->load->view('template_menu/header_menu');
		$this->load->view('administrator/laporan/grafik_dan_rekap', $data);
		$this->load->view('template_menu/footer_menu');
		$this->load->view('administrator/laporan/ajax_total', $data);
	}

    
	public function datatable_total()
	{
		$result = $this->M_total->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $res) {
			$nama_pemenang = $this->M_total->get_pemenang($res->id_vendor_pemenang);
			$efisiensi = $this->M_total->get_mengikuti($res->id_vendor_pemenang, $res->id_rup);
			$panitia = $this->M_total->get_panitia_ketua($res->id_rup);
			$row = array();
			$row[] = ++$no;
			$row[] = $res->kode_rup;
			$row[] = $res->nama_jenis_pengadaan;
			$row[] = $res->nama_metode_pengadaan;
			$row[] = date('Y', strtotime($res->jangka_waktu_mulai_pelaksanaan));
			$row[] = $res->tahun_rup;
			$row[] = $res->nama_rup;
			$row[] = $res->nama_departemen;
			$row[] = number_format($res->total_hps_rup,2,',','.');

			if (!$nama_pemenang) {
				$row[] = 'Belum Ada Pemenang';
			} else {
				$row[] = $nama_pemenang->nama_usaha;
			}
			
			if ($efisiensi) {
				$total1 = $res->total_hps_rup - $efisiensi['nilai_penawaran'];
				$row[] = number_format($efisiensi['nilai_penawaran'],2,',','.');
				$row[] = number_format($total1 ,2,',','.');
				$row[] = number_format($total1  / $res->total_hps_rup,2,',','.');
			} else {
				$row[] = 'Belum ada Penawaran';
				$row[] = 'Belum ada Penawaran';
				$row[] = 'Belum ada Penawaran';
			}			

			$row[] = $panitia['nama_pegawai'];
			
			if ($res->alasan_batal) {
				$row[] = $res->alasan_batal;
			} else {
				$row[] = 'Tidak Ada Catatan';
			}
			
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_total->count_all_data(),
			"recordsFiltered" => $this->M_total->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}