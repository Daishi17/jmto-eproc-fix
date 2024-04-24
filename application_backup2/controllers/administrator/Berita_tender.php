<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Berita_tender extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_master/M_karyawan');
        $this->load->model('M_section/M_section');
        $this->load->model('M_master/M_berita_tender');
        $role = $this->session->userdata('role');
        if (!$role == 1) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['departemen'] = $this->M_karyawan->get_departemen();
        $data['section'] = $this->M_karyawan->get_section();
        $this->load->view('panitia/daftar_paket/js_header_paket');
        $this->load->view('administrator/file_master/berita_tender', $data);
        $this->load->view('administrator/template_menu/footer_menu');
        $this->load->view('administrator/file_master/berita_tender_ajax');
    }

    public function datatable_berita_tender()
    {
        $result = $this->M_berita_tender->getdatatable();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $res) {
            $row = array();
            $row[] = ++$no;
            $row[] = $res->nama_berita;
            $row[] = $res->file_berita;
            $row[] = $res->user_created;
            $row[] = $res->time_created;
            $row[] = '<div class="text-center">
            <a href="javascript:;" class="btn btn-danger text-white btn-sm shadow-lg" onclick="byid_berita(' . "'" . $res->id_berita . "'" . ')">
                <i class="fa-solid fa-trash"></i>
                <small>Hapus</small>
            </a>
          </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_berita_tender->count_all_data(),
            "recordsFiltered" => $this->M_berita_tender->count_filtered_data(),
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

    function by_id_berita($id_berita)
    {
        $data = $this->M_berita_tender->getByid($id_berita);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function hapus_berita_tender()
    {
        $id_berita = $this->input->post('id_berita');
        $this->db->where('tbl_berita_tender.id_berita', $id_berita);
        $this->db->delete('tbl_berita_tender');
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
