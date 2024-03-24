<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
// error_reporting(0);


class Panitia_terpilih extends CI_Controller
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
        $this->load->model('M_panitia/M_panitia_terpilih');
        $this->load->model('M_panitia/M_jadwal');
        $this->load->model('M_tender/M_tender');
    }

    public function post_aksi()
    {
        // wherenya
        $id_panitia = $this->input->post('id_panitia');

        // nama fieldnya
        $name_field = $this->input->post('name_field');

        // value fieldnya
        $field_value = $this->input->post('field_value');

        $data = [
            $name_field => $field_value
        ];

        $where = [
            'id_panitia' => $id_panitia
        ];
        $this->M_panitia_terpilih->update_status($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_panitia_ba($id_rup)
    {
        $data = $this->M_panitia_terpilih->panitia_ba($id_rup);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
