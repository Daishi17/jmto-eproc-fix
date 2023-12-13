<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Daftar_hitam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_master/M_karyawan');
        $this->load->model('M_section/M_section');
        $this->load->model('M_master/M_berita_tender');
        $this->load->model('M_datapenyedia/M_Rekanan_terundang');
        $role = $this->session->userdata('role');
        if (!$role == 1) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['departemen'] = $this->M_karyawan->get_departemen();
        $data['section'] = $this->M_karyawan->get_section();
        $this->load->view('template_menu/header_menu');
        $this->load->view('validator/daftar_hitam/index', $data);
        $this->load->view('template_menu/footer_menu');
        $this->load->view('validator/daftar_hitam/ajax');
    }

    public function datatable_daftar_hitam()
    {
        $result = $this->M_berita_tender->gettable_rekanan_terundang();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $res) {
            $row = array();
            $row[] = ++$no;
            $row[] = $res->nama_usaha;
            $row[] = '<div class="text-center">
            <a href="javascript:;" class="btn btn-danger text-white btn-sm shadow-lg" onclick="byid_rekanan(' . "'" . $res->id_vendor . "'" . ')">
                <i class="fa-solid fa-ban"></i>
                <small>Non Aktive Daftar Hitam</small>
            </a>
          </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_berita_tender->count_all_rekanan_terundang(),
            "recordsFiltered" => $this->M_berita_tender->count_filtered_rekanan_terundang(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_berita_tender()
    {
        if (!is_dir('file_paket/DOKUMEN_BERITA_TENDER')) {
            mkdir('file_paket/DOKUMEN_BERITA_TENDER', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/DOKUMEN_BERITA_TENDER';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_berita')) {
            $fileData = $this->upload->data();

            $upload = [
                'file_berita' => $fileData['file_name'],
                'nama_berita' =>  $this->input->post('nama_berita'),
                'user_created' => $this->session->userdata('nama_pegawai'),
                'time_created' => date('Y-m-d H:i:s'),
            ];

            $this->M_berita_tender->insert_data($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    function byid_rekanan($id_vendor)
    {
        $data = $this->M_berita_tender->getByid_daftar_hitam($id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function non_daftar_hitam()
    {

        $row_vendor = $this->M_Rekanan_terundang->get_row_vendor($this->input->post('id_url_vendor'));
        $upload = [
            'sts_aktif' =>  1,
            'status_daftar_hitam_vendor' => NULL,
        ];
        $where = [
            'id_vendor' => $row_vendor['id_vendor']
        ];
        $this->M_Rekanan_terundang->update_vendor($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    
}
