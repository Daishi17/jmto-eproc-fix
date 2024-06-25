<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Laporan_realisasi_rup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan/M_laporan');
        $this->load->model('M_laporan/M_laporan_realisasi');
        $role = $this->session->userdata('role');
        if (!$role == 1) {
            redirect('auth');
        }
    }


    public function index()
    {
        $data['get_departemen'] = $this->M_laporan->get_departemen();
        $this->load->view('template_menu/header_menu');
        $this->load->view('administrator/laporan/laporan_realisasi_rup', $data);
        $this->load->view('template_menu/footer_menu');
        $this->load->view('administrator/laporan/ajax_realisasi_rup');
    }

    public function get_departemen()
    {
        $data = $this->M_laporan->get_departemen();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_data_rekapitulasi_rup()
    {
        $id_departemen = $this->input->post('id_departemen');
        $tahun = $this->input->post('tahun_pengadaan');
        $jumlah_pengadaan = $this->M_laporan_realisasi->jumlah_pengadaan($id_departemen, $tahun);
        $jumlah_rup = $this->M_laporan_realisasi->jumlah_rup($id_departemen, $tahun);
        $jumlah_rup_pemenang = $this->M_laporan_realisasi->jumlah_rup_pemenang($id_departemen, $tahun);
        $data = [
            'jumlah_pengadaan' => $jumlah_pengadaan,
            'jumlah_rup' => $jumlah_rup['total_hps_rup'],
            'jumlah_rup_pemenang' => $jumlah_rup_pemenang['total_hasil_negosiasi'],
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_data_opex_capex()
    {
        $id_departemen = $this->input->post('id_departemen');
        $tahun = $this->input->post('tahun_pengadaan_opex_capex');
        $jumlah_pengadaan_rencana = $this->M_laporan_realisasi->jumlah_pengadaan_rencana($id_departemen, $tahun);
        $jumlah_rup_rencana = $this->M_laporan_realisasi->jumlah_rup_rencana($id_departemen, $tahun);
        $jumlah_pengadaan_rencana_capex = $this->M_laporan_realisasi->jumlah_pengadaan_rencana_capex($id_departemen, $tahun);
        $jumlah_rup_rencana_capex = $this->M_laporan_realisasi->jumlah_rup_rencana_capex($id_departemen, $tahun);

        $jumlah_pengadaan_realisasi = $this->M_laporan_realisasi->jumlah_pengadaan_realisasi($id_departemen, $tahun);
        $jumlah_rup_realisasi = $this->M_laporan_realisasi->jumlah_rup_realisasi($id_departemen, $tahun);
        $jumlah_pengadaan_realisasi_capex = $this->M_laporan_realisasi->jumlah_pengadaan_realisasi_capex($id_departemen, $tahun);
        $jumlah_rup_realisasi_capex = $this->M_laporan_realisasi->jumlah_rup_realisasi_capex($id_departemen, $tahun);
        $data = [
            'jumlah_pengadaan_rencana' => $jumlah_pengadaan_rencana,
            'jumlah_rup_rencana' => $jumlah_rup_rencana['total_hps_rup'],
            'jumlah_pengadaan_rencana_capex' => $jumlah_pengadaan_rencana_capex,
            'jumlah_rup_rencana_capex' => $jumlah_rup_rencana_capex['total_hps_rup'],

            'jumlah_pengadaan_realisasi' => $jumlah_pengadaan_realisasi,
            'jumlah_rup_realisasi' => $jumlah_rup_realisasi['total_hasil_negosiasi'],
            'jumlah_pengadaan_realisasi_capex' => $jumlah_pengadaan_realisasi_capex,
            'jumlah_rup_realisasi_capex' => $jumlah_rup_realisasi_capex['total_hasil_negosiasi'],
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_data_jml_paket()
    {
        $id_departemen = $this->input->post('id_departemen');
        $tahun = $this->input->post('tahun_pengadaan_jml_paket');

        $jumlah_pengadaan_jml_paket = $this->M_laporan_realisasi->jumlah_pengadaan_jml_paket($id_departemen, $tahun);

        $jml_pengadaan_juksung_tw1 = $this->M_laporan_realisasi->jml_pengadaan_juksung_tw1($id_departemen, $tahun);
        $jml_pengadaan_juksung_tw2 = $this->M_laporan_realisasi->jml_pengadaan_juksung_tw2($id_departemen, $tahun);
        $jml_pengadaan_juksung_tw3 = $this->M_laporan_realisasi->jml_pengadaan_juksung_tw3($id_departemen, $tahun);
        $jml_pengadaan_juksung_tw4 = $this->M_laporan_realisasi->jml_pengadaan_juksung_tw4($id_departemen, $tahun);

        $jml_pengadaan_terbatas_tw1 = $this->M_laporan_realisasi->jml_pengadaan_terbatas_tw1($id_departemen, $tahun);
        $jml_pengadaan_terbatas_tw2 = $this->M_laporan_realisasi->jml_pengadaan_terbatas_tw2($id_departemen, $tahun);
        $jml_pengadaan_terbatas_tw3 = $this->M_laporan_realisasi->jml_pengadaan_terbatas_tw3($id_departemen, $tahun);
        $jml_pengadaan_terbatas_tw4 = $this->M_laporan_realisasi->jml_pengadaan_terbatas_tw4($id_departemen, $tahun);


        $jml_pengadaan_umum_tw1 = $this->M_laporan_realisasi->jml_pengadaan_umum_tw1($id_departemen, $tahun);
        $jml_pengadaan_umum_tw2 = $this->M_laporan_realisasi->jml_pengadaan_umum_tw2($id_departemen, $tahun);
        $jml_pengadaan_umum_tw3 = $this->M_laporan_realisasi->jml_pengadaan_umum_tw3($id_departemen, $tahun);
        $jml_pengadaan_umum_tw4 = $this->M_laporan_realisasi->jml_pengadaan_umum_tw4($id_departemen, $tahun);

        $buku_rup = $this->M_laporan_realisasi->buku_rup($id_departemen, $tahun);

        if ($buku_rup == 0) {
            $persentase = 0;
        } else {
            $persentase = $jumlah_pengadaan_jml_paket / $buku_rup * 100;
        }


        $data = [
            'jumlah_pengadaan_jml_paket' => $jumlah_pengadaan_jml_paket,

            'jml_pengadaan_juksung_tw1' => $jml_pengadaan_juksung_tw1,
            'jml_pengadaan_juksung_tw2' => $jml_pengadaan_juksung_tw2,
            'jml_pengadaan_juksung_tw3' => $jml_pengadaan_juksung_tw3,
            'jml_pengadaan_juksung_tw4' => $jml_pengadaan_juksung_tw4,

            'jml_pengadaan_terbatas_tw1' => $jml_pengadaan_terbatas_tw1,
            'jml_pengadaan_terbatas_tw2' => $jml_pengadaan_terbatas_tw2,
            'jml_pengadaan_terbatas_tw3' => $jml_pengadaan_terbatas_tw3,
            'jml_pengadaan_terbatas_tw4' => $jml_pengadaan_terbatas_tw4,

            'jml_pengadaan_umum_tw1' => $jml_pengadaan_umum_tw1,
            'jml_pengadaan_umum_tw2' => $jml_pengadaan_umum_tw2,
            'jml_pengadaan_umum_tw3' => $jml_pengadaan_umum_tw3,
            'jml_pengadaan_umum_tw4' => $jml_pengadaan_umum_tw4,

            'jml_buku_rup' => $buku_rup,

            'jml_persentase' => $persentase
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
