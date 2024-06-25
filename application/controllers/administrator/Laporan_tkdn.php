<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Laporan_tkdn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan/M_laporan_tkdn');
        $role = $this->session->userdata('role');
        if (!$role == 1) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('template_menu/header_menu');
        $this->load->view('administrator/laporan/laporan_tkdn');
        $this->load->view('template_menu/footer_menu');
        $this->load->view('administrator/laporan/ajax_tkdn');
    }

    function datatable()
    {
        $result = $this->M_laporan_tkdn->gettable();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            if (!$rs->id_vendor_pemenang) {
                $get_pemenang = 0;
            } else {
                $get_pemenang = $this->M_laporan_tkdn->get_pemenang($rs->id_vendor_pemenang, $rs->id_rup);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_jenis_pengadaan;
            if ($rs->id_jenis_anggaran == 1) {
                $row[] = 'Capex';
            } else if ($rs->id_jenis_anggaran == 2) {
                $row[] = 'Opex';
            } else {
                $row[] = 'Capex-Opex';
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }


            $row[] = $rs->nama_jenis_pengadaan;
            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = $get_pemenang['nama_usaha'];
            }


            if ($get_pemenang == 0) {
                $row[] = '';
            } else {
                $row[] = $get_pemenang['kualifikasi_usaha'];
            }

            $row[] = $rs->status_pencatatan;

            if ($rs->status_pencatatan == 'PDN') {
                if ($rs->id_jadwal_tender == 9 || $rs->id_jadwal_tender == 1 || $rs->id_jadwal_tender == 2 || $rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                    if ($get_pemenang == 0) {
                        $row[] = '0';
                        $row[] = '0';
                        $row[] = '0';
                    } else {
                        $pdn1 = 100 - $get_pemenang['ev_hea_tkdn_terendah'];
                        $row[] = number_format($pdn1, 2, ",", ".");
                        $row[] = number_format($pdn1 / 2, 2, ",", ".");
                        $row[] = number_format($pdn1 / 2, 2, ",", ".");
                    }
                } else {
                    if ($get_pemenang == 0) {
                        $row[] = '0';
                        $row[] = '0';
                        $row[] = '0';
                    } else {
                        $pdn2 = 100 - $get_pemenang['ev_hea_tkdn'];
                        $row[] = number_format($pdn2, 2, ",", ".");
                        $row[] = number_format($pdn2 / 2, 2, ",", ".");
                        $row[] = number_format($pdn2 / 2, 2, ",", ".");
                    }
                }
            } else if ($rs->status_pencatatan = 'TKDN') {
                if ($rs->id_jadwal_tender == 9 || $rs->id_jadwal_tender == 1 || $rs->id_jadwal_tender == 2 || $rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                    if ($get_pemenang == 0) {
                        $row[] = '0';
                        $row[] = '0';
                        $row[] = '0';
                    } else {
                        $tkdn1 = 100 - $get_pemenang['ev_hea_tkdn_terendah'];
                        $row[] = number_format($tkdn1 / 2, 2, ",", ".");
                        $row[] = number_format($get_pemenang['ev_hea_tkdn_terendah'], 2, ",", ".");
                        $row[] = number_format($tkdn1 / 2, 2, ",", ".");
                    }
                } else {
                    if ($get_pemenang == 0) {
                        $row[] = '0';
                        $row[] = '0';
                        $row[] = '0';
                    } else {
                        $tkdn2 = 100 - $get_pemenang['ev_hea_tkdn'];
                        $row[] = number_format($tkdn2 / 2, 2, ",", ".");
                        $row[] = number_format($get_pemenang['ev_hea_tkdn'], 2, ",", ".");
                        $row[] = number_format($tkdn2 / 2, 2, ",", ".");
                    }
                }
            } else {
                if ($rs->id_jadwal_tender == 9 || $rs->id_jadwal_tender == 1 || $rs->id_jadwal_tender == 2 || $rs->id_jadwal_tender == 3 || $rs->id_jadwal_tender == 6) {
                    if ($get_pemenang == 0) {
                        $row[] = '0';
                        $row[] = '0';
                        $row[] = '0';
                    } else {
                        $import1 = 100 - $get_pemenang['ev_hea_tkdn_terendah'];
                        $row[] = number_format($import1 / 2, 2, ",", ".");
                        $row[] = number_format($import1 / 2, 2, ",", ".");
                        $row[] = number_format($import1, 2, ",", ".");
                    }
                } else {
                    if ($get_pemenang == 0) {
                        $row[] = '0';
                        $row[] = '0';
                        $row[] = '0';
                    } else {
                        $import2 = 100 - $get_pemenang['ev_hea_tkdn'];
                        $row[] = number_format($import2 / 2, 2, ",", ".");
                        $row[] = number_format($import2 / 2, 2, ",", ".");
                        $row[] = number_format($import2, 2, ",", ".");
                    }
                }
            }



            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = '100';
            }

            $row[] = date('d-m-Y', strtotime($rs->awal_pendaftaran_tender));
            $row[] = date('d-m-Y', strtotime($rs->selesai_semua_tender));
            $row[] = $rs->ket_laporan;
            $row[] = '<button type="button" class="btn btn-success btn-sm shadow-lg" onClick="byid(' . "'" . $rs->id_rup  . "','edit_keterangan'" . ')" title="Aktif">
								<small>Buat Keterangan</small>
							</button>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_laporan_tkdn->count_all(),
            "recordsFiltered" => $this->M_laporan_tkdn->count_filtered(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_rup($id_rup)
    {
        $output = $this->M_laporan_tkdn->get_rup($id_rup);
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function edit_keterangan()
    {

        $id_rup = $this->input->post('id_rup');

        $ket_laporan = $this->input->post('ket_laporan');

        $data = [
            'ket_laporan' => $ket_laporan,
            'id_rup' => $id_rup
        ];

        $where = [
            'id_rup' => $id_rup
        ];

        $this->M_laporan_tkdn->update_rup($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('sucess'));
    }
}
