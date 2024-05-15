<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Laporan_efisiensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan/M_laporan');
        $role = $this->session->userdata('role');
        if (!$role == 1) {
            redirect('auth');
        }
    }


    public function index()
    {
        $data['get_departemen'] = $this->M_laporan->get_departemen();
        $this->load->view('template_menu/header_menu');
        $this->load->view('administrator/laporan/laporan_efisiensi', $data);
        $this->load->view('template_menu/footer_menu');
        $this->load->view('administrator/laporan/ajax_efisiensi');
    }

    public function simpan_realisasi()
    {
        $data = [
            'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
            'nama_pic' => $this->input->post('nama_pic'),
            'umum_jan' => $this->input->post('umum_jan'),
            'umum_feb' => $this->input->post('umum_feb'),
            'umum_mar' => $this->input->post('umum_mar'),
            'umum_apr' => $this->input->post('umum_apr'),
            'umum_may' => $this->input->post('umum_may'),
            'umum_jun' => $this->input->post('umum_jun'),
            'umum_jul' => $this->input->post('umum_jul'),
            'umum_aug' => $this->input->post('umum_aug'),
            'umum_sep' => $this->input->post('umum_sep'),
            'umum_oct' => $this->input->post('umum_oct'),
            'umum_nov' => $this->input->post('umum_nov'),
            'umum_dec' => $this->input->post('umum_dec'),
            'umum_total' => $this->input->post('umum_total'),
            'juksung_jan' => $this->input->post('juksung_jan'),
            'juksung_feb' => $this->input->post('juksung_feb'),
            'juksung_mar' => $this->input->post('juksung_mar'),
            'juksung_apr' => $this->input->post('juksung_apr'),
            'juksung_may' => $this->input->post('juksung_may'),
            'juksung_jun' => $this->input->post('juksung_jun'),
            'juksung_jul' => $this->input->post('juksung_jul'),
            'juksung_aug' => $this->input->post('juksung_aug'),
            'juksung_sep' => $this->input->post('juksung_sep'),
            'juksung_oct' => $this->input->post('juksung_oct'),
            'juksung_nov' => $this->input->post('juksung_nov'),
            'juksung_dec' => $this->input->post('juksung_dec'),
            'juksung_total' => $this->input->post('juksung_total'),
            'terbatas_jan' => $this->input->post('terbatas_jan'),
            'terbatas_feb' => $this->input->post('terbatas_feb'),
            'terbatas_mar' => $this->input->post('terbatas_mar'),
            'terbatas_apr' => $this->input->post('terbatas_apr'),
            'terbatas_may' => $this->input->post('terbatas_may'),
            'terbatas_jun' => $this->input->post('terbatas_jun'),
            'terbatas_jul' => $this->input->post('terbatas_jul'),
            'terbatas_aug' => $this->input->post('terbatas_aug'),
            'terbatas_sep' => $this->input->post('terbatas_sep'),
            'terbatas_oct' => $this->input->post('terbatas_oct'),
            'terbatas_nov' => $this->input->post('terbatas_nov'),
            'terbatas_dec' => $this->input->post('terbatas_dec'),
            'terbatas_total' => $this->input->post('terbatas_total'),
            'langsung_jan' => $this->input->post('langsung_jan'),
            'langsung_feb' => $this->input->post('langsung_feb'),
            'langsung_mar' => $this->input->post('langsung_mar'),
            'langsung_apr' => $this->input->post('langsung_apr'),
            'langsung_may' => $this->input->post('langsung_may'),
            'langsung_jun' => $this->input->post('langsung_jun'),
            'langsung_jul' => $this->input->post('langsung_jul'),
            'langsung_aug' => $this->input->post('langsung_aug'),
            'langsung_sep' => $this->input->post('langsung_sep'),
            'langsung_oct' => $this->input->post('langsung_oct'),
            'langsung_nov' => $this->input->post('langsung_nov'),
            'langsung_dec' => $this->input->post('langsung_dec'),
            'langsung_total' => $this->input->post('langsung_total')

        ];
        $this->M_laporan->add_realisasi($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function simpan_rekap()
    {
        $data = [
            'tahun_pengadaan' => $this->input->post('tahun_pengadaan1'),
            'umum_jan' => $this->input->post('umum_jan1'),
            'umum_feb' => $this->input->post('umum_feb1'),
            'umum_mar' => $this->input->post('umum_mar1'),
            'umum_apr' => $this->input->post('umum_apr1'),
            'umum_may' => $this->input->post('umum_may1'),
            'umum_jun' => $this->input->post('umum_jun1'),
            'umum_jul' => $this->input->post('umum_jul1'),
            'umum_aug' => $this->input->post('umum_aug1'),
            'umum_sep' => $this->input->post('umum_sep1'),
            'umum_oct' => $this->input->post('umum_oct1'),
            'umum_nov' => $this->input->post('umum_nov1'),
            'umum_dec' => $this->input->post('umum_dec1'),
            'umum_total' => $this->input->post('umum_total1'),
            'juksung_jan' => $this->input->post('juksung_jan1'),
            'juksung_feb' => $this->input->post('juksung_feb1'),
            'juksung_mar' => $this->input->post('juksung_mar1'),
            'juksung_apr' => $this->input->post('juksung_apr1'),
            'juksung_may' => $this->input->post('juksung_may1'),
            'juksung_jun' => $this->input->post('juksung_jun1'),
            'juksung_jul' => $this->input->post('juksung_jul1'),
            'juksung_aug' => $this->input->post('juksung_aug1'),
            'juksung_sep' => $this->input->post('juksung_sep1'),
            'juksung_oct' => $this->input->post('juksung_oct1'),
            'juksung_nov' => $this->input->post('juksung_nov1'),
            'juksung_dec' => $this->input->post('juksung_dec1'),
            'juksung_total' => $this->input->post('juksung_total1'),
            'terbatas_jan' => $this->input->post('terbatas_jan1'),
            'terbatas_feb' => $this->input->post('terbatas_feb1'),
            'terbatas_mar' => $this->input->post('terbatas_mar1'),
            'terbatas_apr' => $this->input->post('terbatas_apr1'),
            'terbatas_may' => $this->input->post('terbatas_may1'),
            'terbatas_jun' => $this->input->post('terbatas_jun1'),
            'terbatas_jul' => $this->input->post('terbatas_jul1'),
            'terbatas_aug' => $this->input->post('terbatas_aug1'),
            'terbatas_sep' => $this->input->post('terbatas_sep1'),
            'terbatas_oct' => $this->input->post('terbatas_oct1'),
            'terbatas_nov' => $this->input->post('terbatas_nov1'),
            'terbatas_dec' => $this->input->post('terbatas_dec1'),
            'terbatas_total' => $this->input->post('terbatas_total1'),
            'langsung_jan' => $this->input->post('langsung_jan1'),
            'langsung_feb' => $this->input->post('langsung_feb1'),
            'langsung_mar' => $this->input->post('langsung_mar1'),
            'langsung_apr' => $this->input->post('langsung_apr1'),
            'langsung_may' => $this->input->post('langsung_may1'),
            'langsung_jun' => $this->input->post('langsung_jun1'),
            'langsung_jul' => $this->input->post('langsung_jul1'),
            'langsung_aug' => $this->input->post('langsung_aug1'),
            'langsung_sep' => $this->input->post('langsung_sep1'),
            'langsung_oct' => $this->input->post('langsung_oct1'),
            'langsung_nov' => $this->input->post('langsung_nov1'),
            'langsung_dec' => $this->input->post('langsung_dec1'),
            'langsung_total' => $this->input->post('langsung_total1')

        ];
        $this->M_laporan->add_rekap($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_data()
    {

        $data = $this->M_laporan->get_lap_realisasi();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_data_rekap()
    {

        $data = $this->M_laporan->get_lap_rekap();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_resume()
    {
        $tahun = $this->input->post('tahun_resume');

        $data_juksung = $this->M_laporan->get_juksung($tahun);
        $data_juksung_vendor = $this->M_laporan->get_juksung_vendor($tahun);
        $juksung_efisiensi = $data_juksung['total_pagu'] - $data_juksung['total_hps'];
        $juksung_persentase = $juksung_efisiensi / $data_juksung['total_pagu'];

        $data_terbatas = $this->M_laporan->get_terbatas($tahun);
        $data_terbatas_vendor = $this->M_laporan->get_terbatas_vendor($tahun);
        $terbatas_efisiensi = $data_terbatas['total_pagu'] - $data_terbatas['total_hps'];
        $terbatas_persentase = $terbatas_efisiensi / $data_terbatas['total_pagu'];

        $data_umum = $this->M_laporan->get_umum($tahun);
        $data_umum_vendor = $this->M_laporan->get_umum_vendor($tahun);
        $umum_efisiensi = $data_umum['total_pagu'] - $data_umum['total_hps'];
        $umum_persentase = $umum_efisiensi / $data_umum['total_pagu'];

        $data_total = $this->M_laporan->get_total($tahun);
        $data_total_vendor = $this->M_laporan->get_total_vendor($tahun);
        $total_efisiensi = $data_total['total_pagu'] - $data_total['total_hps'];
        $total_persentase = $total_efisiensi / $data_total['total_pagu'];


        $persentase_selisih = $data_total_vendor['total_nego'] / $data_total['total_pagu'];

        $persentase_efisiensi = $total_efisiensi / $data_total['total_pagu'];

        $data = [
            'juksung_resume_pagu' => number_format($data_juksung['total_pagu'], 2, ",", "."),
            'juksung_resume_hps' =>  number_format($data_juksung['total_hps'], 2, ",", "."),
            'juksung_kontrak' => number_format($data_juksung_vendor['total_nego'], 2, ",", "."),
            'juksung_efisiensi' =>  number_format($juksung_efisiensi, 2, ",", "."),
            'juksung_persentase' => number_format($juksung_persentase, 2, ",", "."),

            'terbatas_resume_pagu' => number_format($data_terbatas['total_pagu'], 2, ",", "."),
            'terbatas_resume_hps' =>  number_format($data_terbatas['total_hps'], 2, ",", "."),
            'terbatas_kontrak' => number_format($data_terbatas_vendor['total_nego'], 2, ",", "."),
            'terbatas_efisiensi' =>  number_format($terbatas_efisiensi, 2, ",", "."),
            'terbatas_persentase' => number_format($terbatas_persentase, 2, ",", "."),

            'umum_resume_pagu' => number_format($data_umum['total_pagu'], 2, ",", "."),
            'umum_resume_hps' =>  number_format($data_umum['total_hps'], 2, ",", "."),
            'umum_kontrak' => number_format($data_umum_vendor['total_nego'], 2, ",", "."),
            'umum_efisiensi' =>  number_format($umum_efisiensi, 2, ",", "."),
            'umum_persentase' => number_format($umum_persentase, 2, ",", "."),

            'total_resume_pagu' => number_format($data_total['total_pagu'], 2, ",", "."),
            'total_resume_hps' =>  number_format($data_total['total_hps'], 2, ",", "."),
            'total_kontrak' => number_format($data_total_vendor['total_nego'], 2, ",", "."),
            'total_efisiensi' =>  number_format($total_efisiensi, 2, ",", "."),
            'total_persentase' => number_format($total_persentase, 2, ",", "."),

            'total_persentase_selisih' => number_format($persentase_selisih, 2, ",", "."),

            'total_persentase_efisiensi' => number_format($persentase_efisiensi, 2, ",", "."),

            'tahun' => $tahun
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }


    function datatable_juksung()
    {
        $result = $this->M_laporan->gettable_juksung();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            if (!$rs->id_vendor_pemenang) {
                $get_pemenang = 0;
            } else {
                $get_pemenang = $this->M_laporan->get_pemenang($rs->id_vendor_pemenang, $rs->id_rup);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = number_format($rs->total_pagu_rup, 2, ",", ".");
            $row[] = number_format($rs->total_hps_rup, 2, ",", ".");
            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($rs->total_hps_rup - $get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($rs->total_hps_rup / $get_pemenang['total_hasil_negosiasi'], 2, ",", ".") . ' %';
            }


            $row[] = date('d-m-Y', strtotime($rs->jangka_waktu_mulai_pelaksanaan));
            $row[] = date('d-m-Y', strtotime($rs->jangka_waktu_selesai_pelaksanaan));
            $row[] = $rs->jangka_waktu_hari_pelaksanaan . ' Hari';
            $row[] = '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_laporan->count_all_juksung(),
            "recordsFiltered" => $this->M_laporan->count_filtered_juksung(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function datatable_terbatas()
    {
        $result = $this->M_laporan->gettable_terbatas();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            if (!$rs->id_vendor_pemenang) {
                $get_pemenang = 0;
            } else {
                $get_pemenang = $this->M_laporan->get_pemenang($rs->id_vendor_pemenang, $rs->id_rup);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = number_format($rs->total_pagu_rup, 2, ",", ".");
            $row[] = number_format($rs->total_hps_rup, 2, ",", ".");
            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($rs->total_hps_rup - $get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($rs->total_hps_rup / $get_pemenang['total_hasil_negosiasi'], 2, ",", ".") . ' %';
            }


            $row[] = date('d-m-Y', strtotime($rs->jangka_waktu_mulai_pelaksanaan));
            $row[] = date('d-m-Y', strtotime($rs->jangka_waktu_selesai_pelaksanaan));
            $row[] = $rs->jangka_waktu_hari_pelaksanaan . ' Hari';
            $row[] = '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_laporan->count_all_terbatas(),
            "recordsFiltered" => $this->M_laporan->count_filtered_terbatas(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function datatable_umum()
    {
        $result = $this->M_laporan->gettable_umum();
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            if (!$rs->id_vendor_pemenang) {
                $get_pemenang = 0;
            } else {
                $get_pemenang = $this->M_laporan->get_pemenang($rs->id_vendor_pemenang, $rs->id_rup);
            }
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_rup;
            $row[] = $rs->nama_departemen;
            $row[] = number_format($rs->total_pagu_rup, 2, ",", ".");
            $row[] = number_format($rs->total_hps_rup, 2, ",", ".");
            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($rs->total_hps_rup - $get_pemenang['total_hasil_negosiasi'], 2, ",", ".");
            }

            if ($get_pemenang == 0) {
                $row[] = number_format(0, 2, ",", ".");
            } else {
                $row[] = number_format($rs->total_hps_rup / $get_pemenang['total_hasil_negosiasi'], 2, ",", ".") . ' %';
            }


            $row[] = date('d-m-Y', strtotime($rs->jangka_waktu_mulai_pelaksanaan));
            $row[] = date('d-m-Y', strtotime($rs->jangka_waktu_selesai_pelaksanaan));
            $row[] = $rs->jangka_waktu_hari_pelaksanaan . ' Hari';
            $row[] = '';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_laporan->count_all_umum(),
            "recordsFiltered" => $this->M_laporan->count_filtered_umum(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_perunit()
    {
        $tahun = $this->input->post('tahun');

        $data = [
            'total_rup_cs' => $this->M_laporan->sum_rup_cs($tahun),
            'total_rup_om' => $this->M_laporan->sum_rup_om($tahun),
            'total_rup_cc' => $this->M_laporan->sum_rup_cc($tahun),
            'total_rup_pm' => $this->M_laporan->sum_rup_pm($tahun),
            'total_rup_itd' => $this->M_laporan->sum_rup_itd($tahun),
            'total_rup_its' => $this->M_laporan->sum_rup_its($tahun),
            'total_rup_hcpe' => $this->M_laporan->sum_rup_hcpe($tahun),
            'total_rup_hcs' => $this->M_laporan->sum_rup_hcs($tahun),
            'total_rup_ga' => $this->M_laporan->sum_rup_ga($tahun),
            'total_rup_fa' => $this->M_laporan->sum_rup_fa($tahun),
            'total_rup_spgrc' => $this->M_laporan->sum_rup_spgrc($tahun),
            'total_rup_bpd' => $this->M_laporan->sum_rup_bpd($tahun),
            'total_rup_pmo' => $this->M_laporan->sum_rup_pmo($tahun),

            'total_hps_cs' => $this->M_laporan->sum_hps_cs($tahun),
            'total_hps_om' => $this->M_laporan->sum_hps_om($tahun),
            'total_hps_cc' => $this->M_laporan->sum_hps_cc($tahun),
            'total_hps_pm' => $this->M_laporan->sum_hps_pm($tahun),
            'total_hps_itd' => $this->M_laporan->sum_hps_itd($tahun),
            'total_hps_its' => $this->M_laporan->sum_hps_its($tahun),
            'total_hps_hcpe' => $this->M_laporan->sum_hps_hcpe($tahun),
            'total_hps_hcs' => $this->M_laporan->sum_hps_hcs($tahun),
            'total_hps_ga' => $this->M_laporan->sum_hps_ga($tahun),
            'total_hps_fa' => $this->M_laporan->sum_hps_fa($tahun),
            'total_hps_spgrc' => $this->M_laporan->sum_hps_spgrc($tahun),
            'total_hps_bpd' => $this->M_laporan->sum_hps_bpd($tahun),
            'total_hps_pmo' => $this->M_laporan->sum_hps_pmo($tahun),


            'total_kontrak_cs' => $this->M_laporan->sum_pemenang_cs($tahun),
            'total_kontrak_om' => $this->M_laporan->sum_pemenang_om($tahun),
            'total_kontrak_cc' => $this->M_laporan->sum_pemenang_cc($tahun),
            'total_kontrak_pm' => $this->M_laporan->sum_pemenang_pm($tahun),
            'total_kontrak_itd' => $this->M_laporan->sum_pemenang_itd($tahun),
            'total_kontrak_its' => $this->M_laporan->sum_pemenang_its($tahun),
            'total_kontrak_hcpe' => $this->M_laporan->sum_pemenang_hcpe($tahun),
            'total_kontrak_hcs' => $this->M_laporan->sum_pemenang_hcs($tahun),
            'total_kontrak_ga' => $this->M_laporan->sum_pemenang_ga($tahun),
            'total_kontrak_fa' => $this->M_laporan->sum_pemenang_fa($tahun),
            'total_kontrak_spgrc' => $this->M_laporan->sum_pemenang_spgrc($tahun),
            'total_kontrak_bpd' => $this->M_laporan->sum_pemenang_bpd($tahun),
            'total_kontrak_pmo' => $this->M_laporan->sum_pemenang_pmo($tahun),

            'total_terbatas_rup_cs' => $this->M_laporan->sum_terbatas_rup_cs($tahun),
            'total_terbatas_rup_om' => $this->M_laporan->sum_terbatas_rup_om($tahun),
            'total_terbatas_rup_cc' => $this->M_laporan->sum_terbatas_rup_cc($tahun),
            'total_terbatas_rup_pm' => $this->M_laporan->sum_terbatas_rup_pm($tahun),
            'total_terbatas_rup_itd' => $this->M_laporan->sum_terbatas_rup_itd($tahun),
            'total_terbatas_rup_its' => $this->M_laporan->sum_terbatas_rup_its($tahun),
            'total_terbatas_rup_hcpe' => $this->M_laporan->sum_terbatas_rup_hcpe($tahun),
            'total_terbatas_rup_hcs' => $this->M_laporan->sum_terbatas_rup_hcs($tahun),
            'total_terbatas_rup_ga' => $this->M_laporan->sum_terbatas_rup_ga($tahun),
            'total_terbatas_rup_fa' => $this->M_laporan->sum_terbatas_rup_fa($tahun),
            'total_terbatas_rup_spgrc' => $this->M_laporan->sum_terbatas_rup_spgrc($tahun),
            'total_terbatas_rup_bpd' => $this->M_laporan->sum_terbatas_rup_bpd($tahun),
            'total_terbatas_rup_pmo' => $this->M_laporan->sum_terbatas_rup_pmo($tahun),

            'total_terbatas_hps_cs' => $this->M_laporan->sum_terbatas_hps_cs($tahun),
            'total_terbatas_hps_om' => $this->M_laporan->sum_terbatas_hps_om($tahun),
            'total_terbatas_hps_cc' => $this->M_laporan->sum_terbatas_hps_cc($tahun),
            'total_terbatas_hps_pm' => $this->M_laporan->sum_terbatas_hps_pm($tahun),
            'total_terbatas_hps_itd' => $this->M_laporan->sum_terbatas_hps_itd($tahun),
            'total_terbatas_hps_its' => $this->M_laporan->sum_terbatas_hps_its($tahun),
            'total_terbatas_hps_hcpe' => $this->M_laporan->sum_terbatas_hps_hcpe($tahun),
            'total_terbatas_hps_hcs' => $this->M_laporan->sum_terbatas_hps_hcs($tahun),
            'total_terbatas_hps_ga' => $this->M_laporan->sum_terbatas_hps_ga($tahun),
            'total_terbatas_hps_fa' => $this->M_laporan->sum_terbatas_hps_fa($tahun),
            'total_terbatas_hps_spgrc' => $this->M_laporan->sum_terbatas_hps_spgrc($tahun),
            'total_terbatas_hps_bpd' => $this->M_laporan->sum_terbatas_hps_bpd($tahun),
            'total_terbatas_hps_pmo' => $this->M_laporan->sum_terbatas_hps_pmo($tahun),


            'total_terbatas_kontrak_cs' => $this->M_laporan->sum_terbatas_pemenang_cs($tahun),
            'total_terbatas_kontrak_om' => $this->M_laporan->sum_terbatas_pemenang_om($tahun),
            'total_terbatas_kontrak_cc' => $this->M_laporan->sum_terbatas_pemenang_cc($tahun),
            'total_terbatas_kontrak_pm' => $this->M_laporan->sum_terbatas_pemenang_pm($tahun),
            'total_terbatas_kontrak_itd' => $this->M_laporan->sum_terbatas_pemenang_itd($tahun),
            'total_terbatas_kontrak_its' => $this->M_laporan->sum_terbatas_pemenang_its($tahun),
            'total_terbatas_kontrak_hcpe' => $this->M_laporan->sum_terbatas_pemenang_hcpe($tahun),
            'total_terbatas_kontrak_hcs' => $this->M_laporan->sum_terbatas_pemenang_hcs($tahun),
            'total_terbatas_kontrak_ga' => $this->M_laporan->sum_terbatas_pemenang_ga($tahun),
            'total_terbatas_kontrak_fa' => $this->M_laporan->sum_terbatas_pemenang_fa($tahun),
            'total_terbatas_kontrak_spgrc' => $this->M_laporan->sum_terbatas_pemenang_spgrc($tahun),
            'total_terbatas_kontrak_bpd' => $this->M_laporan->sum_terbatas_pemenang_bpd($tahun),
            'total_terbatas_kontrak_pmo' => $this->M_laporan->sum_terbatas_pemenang_pmo($tahun),

            'total_umum_hps_cs' => $this->M_laporan->sum_umum_hps_cs($tahun),
            'total_umum_hps_om' => $this->M_laporan->sum_umum_hps_om($tahun),
            'total_umum_hps_cc' => $this->M_laporan->sum_umum_hps_cc($tahun),
            'total_umum_hps_pm' => $this->M_laporan->sum_umum_hps_pm($tahun),
            'total_umum_hps_itd' => $this->M_laporan->sum_umum_hps_itd($tahun),
            'total_umum_hps_its' => $this->M_laporan->sum_umum_hps_its($tahun),
            'total_umum_hps_hcpe' => $this->M_laporan->sum_umum_hps_hcpe($tahun),
            'total_umum_hps_hcs' => $this->M_laporan->sum_umum_hps_hcs($tahun),
            'total_umum_hps_ga' => $this->M_laporan->sum_umum_hps_ga($tahun),
            'total_umum_hps_fa' => $this->M_laporan->sum_umum_hps_fa($tahun),
            'total_umum_hps_spgrc' => $this->M_laporan->sum_umum_hps_spgrc($tahun),
            'total_umum_hps_bpd' => $this->M_laporan->sum_umum_hps_bpd($tahun),
            'total_umum_hps_pmo' => $this->M_laporan->sum_umum_hps_pmo($tahun),


            'total_umum_kontrak_cs' => $this->M_laporan->sum_umum_pemenang_cs($tahun),
            'total_umum_kontrak_om' => $this->M_laporan->sum_umum_pemenang_om($tahun),
            'total_umum_kontrak_cc' => $this->M_laporan->sum_umum_pemenang_cc($tahun),
            'total_umum_kontrak_pm' => $this->M_laporan->sum_umum_pemenang_pm($tahun),
            'total_umum_kontrak_itd' => $this->M_laporan->sum_umum_pemenang_itd($tahun),
            'total_umum_kontrak_its' => $this->M_laporan->sum_umum_pemenang_its($tahun),
            'total_umum_kontrak_hcpe' => $this->M_laporan->sum_umum_pemenang_hcpe($tahun),
            'total_umum_kontrak_hcs' => $this->M_laporan->sum_umum_pemenang_hcs($tahun),
            'total_umum_kontrak_ga' => $this->M_laporan->sum_umum_pemenang_ga($tahun),
            'total_umum_kontrak_fa' => $this->M_laporan->sum_umum_pemenang_fa($tahun),
            'total_umum_kontrak_spgrc' => $this->M_laporan->sum_umum_pemenang_spgrc($tahun),
            'total_umum_kontrak_bpd' => $this->M_laporan->sum_umum_pemenang_bpd($tahun),
            'total_umum_kontrak_pmo' => $this->M_laporan->sum_umum_pemenang_pmo($tahun),


            'total_keseluruhan_hps_cs' => $this->M_laporan->sum_keseluruhan_hps_cs($tahun),
            'total_keseluruhan_hps_om' => $this->M_laporan->sum_keseluruhan_hps_om($tahun),
            'total_keseluruhan_hps_cc' => $this->M_laporan->sum_keseluruhan_hps_cc($tahun),
            'total_keseluruhan_hps_pm' => $this->M_laporan->sum_keseluruhan_hps_pm($tahun),
            'total_keseluruhan_hps_itd' => $this->M_laporan->sum_keseluruhan_hps_itd($tahun),
            'total_keseluruhan_hps_its' => $this->M_laporan->sum_keseluruhan_hps_its($tahun),
            'total_keseluruhan_hps_hcpe' => $this->M_laporan->sum_keseluruhan_hps_hcpe($tahun),
            'total_keseluruhan_hps_hcs' => $this->M_laporan->sum_keseluruhan_hps_hcs($tahun),
            'total_keseluruhan_hps_ga' => $this->M_laporan->sum_keseluruhan_hps_ga($tahun),
            'total_keseluruhan_hps_fa' => $this->M_laporan->sum_keseluruhan_hps_fa($tahun),
            'total_keseluruhan_hps_spgrc' => $this->M_laporan->sum_keseluruhan_hps_spgrc($tahun),
            'total_keseluruhan_hps_bpd' => $this->M_laporan->sum_keseluruhan_hps_bpd($tahun),
            'total_keseluruhan_hps_pmo' => $this->M_laporan->sum_keseluruhan_hps_pmo($tahun),


            'total_keseluruhan_kontrak_cs' => $this->M_laporan->sum_keseluruhan_pemenang_cs($tahun),
            'total_keseluruhan_kontrak_om' => $this->M_laporan->sum_keseluruhan_pemenang_om($tahun),
            'total_keseluruhan_kontrak_cc' => $this->M_laporan->sum_keseluruhan_pemenang_cc($tahun),
            'total_keseluruhan_kontrak_pm' => $this->M_laporan->sum_keseluruhan_pemenang_pm($tahun),
            'total_keseluruhan_kontrak_itd' => $this->M_laporan->sum_keseluruhan_pemenang_itd($tahun),
            'total_keseluruhan_kontrak_its' => $this->M_laporan->sum_keseluruhan_pemenang_its($tahun),
            'total_keseluruhan_kontrak_hcpe' => $this->M_laporan->sum_keseluruhan_pemenang_hcpe($tahun),
            'total_keseluruhan_kontrak_hcs' => $this->M_laporan->sum_keseluruhan_pemenang_hcs($tahun),
            'total_keseluruhan_kontrak_ga' => $this->M_laporan->sum_keseluruhan_pemenang_ga($tahun),
            'total_keseluruhan_kontrak_fa' => $this->M_laporan->sum_keseluruhan_pemenang_fa($tahun),
            'total_keseluruhan_kontrak_spgrc' => $this->M_laporan->sum_keseluruhan_pemenang_spgrc($tahun),
            'total_keseluruhan_kontrak_bpd' => $this->M_laporan->sum_keseluruhan_pemenang_bpd($tahun),
            'total_keseluruhan_kontrak_pmo' => $this->M_laporan->sum_keseluruhan_pemenang_pmo($tahun),

            'total_rup' => $this->M_laporan->sum_rup($tahun),
            'total_hps_juksung' => $this->M_laporan->sum_hps_juksung($tahun),
            'total_kontrak_juksung' => $this->M_laporan->sum_kontrak_juksung($tahun),

            'total_rup' => $this->M_laporan->sum_rup($tahun),
            'total_hps_juksung' => $this->M_laporan->sum_hps_juksung($tahun),
            'total_kontrak_juksung' => $this->M_laporan->sum_kontrak_juksung($tahun),

            'total_hps_terbatas' => $this->M_laporan->sum_hps_terbatas($tahun),
            'total_kontrak_terbatas' => $this->M_laporan->sum_kontrak_terbatas($tahun),

            'total_hps_umum' => $this->M_laporan->sum_hps_umum($tahun),
            'total_kontrak_umum' => $this->M_laporan->sum_kontrak_umum($tahun),

            'total_hps_keseluruhan' => $this->M_laporan->sum_hps_keseluruhan($tahun),
            'total_kontrak_keseluruhan' => $this->M_laporan->sum_kontrak_keseluruhan($tahun),


        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
