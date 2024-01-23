<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
class export_chat extends CI_Controller
{
    // var $link_vendor = 'http://localhost/jmto-vms/file_paket/';
    var $link_vendor = 'https://jmto-vms.kintekindo.net/file_paket/';
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
        $this->load->model('M_tender/M_tender');
    }
    public function export_chat_anwijing($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['jadwal_aanwizing'] = $this->M_jadwal->jadwal_pra_umum_3($data['row_rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['row_rup']['id_rup']);
        $this->load->view('export_chat/aanwijing', $data);
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax_chat', $data);
    }

    public function export_chat_anwijzing_penawaran($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['jadwal_aanwizing'] = $this->M_jadwal->jadwal_pra_umum_3($data['row_rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['row_rup']['id_rup']);
        $this->load->view('export_chat/aanwijing', $data);
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax_chat_penawaran', $data);
    }

    
}
