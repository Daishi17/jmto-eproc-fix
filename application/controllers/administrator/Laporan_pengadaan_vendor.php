<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Laporan_pengadaan_vendor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan/M_laporan_vendor');
        $role = $this->session->userdata('role');
        if (!$role == 1) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('template_menu/header_menu');
        $this->load->view('administrator/laporan/laporan_vendor');
        $this->load->view('template_menu/footer_menu');
        $this->load->view('administrator/laporan/ajax_vendor');
    }

    function datatable()
    {
        $result = $this->M_laporan_vendor->gettable();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            if (!$rs->id_vendor_pemenang) {
                $get_pemenang = 0;
            } else {
                $get_pemenang = $this->M_laporan_vendor->get_pemenang($rs->id_vendor_pemenang, $rs->id_rup);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_departemen;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_metode_pengadaan;
            $row[] = number_format($rs->total_hps_rup, 2, ",", ".");
            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = 'Belum Ada Pemenang';
            } else {
                $subs_string = substr($get_pemenang['nama_usaha'], 0, 2);
                if ($subs_string == 'PT' || $subs_string == 'CV' || $subs_string == 'Koperasi') {
                    $row[] = $get_pemenang['nama_usaha'];
                } else {
                    if ($get_pemenang['bentuk_usaha'] == 'Perseroan Terbatas (PT)') {
                        $row[] = 'PT ' . $get_pemenang['nama_usaha'];
                    } else if ($get_pemenang['bentuk_usaha'] == 'Commanditaire Vennootschap (CV)') {
                        $row[] = 'CV ' . $get_pemenang['nama_usaha'];
                    } else if ($get_pemenang['bentuk_usaha'] == 'Koperasi') {
                        $row[] = $get_pemenang['nama_usaha'];
                    }
                }
            }

            $row[] = $rs->jangka_waktu_hari_pelaksanaan . ' Hari';
            $row[] = number_format($rs->persen_pencatatan, 2, ",", ".") . ' %';

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                if ($rs->id_jadwal_tender == 9 || $rs->id_jadwal_tender == 1 || $rs->id_jadwal_tender == 2 || $rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                    $row[] = number_format($get_pemenang['ev_hea_tkdn_terendah'], 2, ",", ".");
                } else {
                    $row[] = number_format($get_pemenang['ev_hea_tkdn'], 2, ",", ".");
                }
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_laporan_vendor->count_all(),
            "recordsFiltered" => $this->M_laporan_vendor->count_filtered(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
