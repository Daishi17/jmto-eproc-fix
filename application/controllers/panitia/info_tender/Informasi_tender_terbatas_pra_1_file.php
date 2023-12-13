<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Informasi_tender_terbatas_pra_1_file extends CI_Controller
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
    public function informasi_pengadaan($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['dok_lelang'] = $this->M_panitia->get_dokumen_pengadaan($data['row_rup']['id_rup']);
        $data['dok_prakualifikasi'] = $this->M_panitia->get_dokumen_prakualifikasi($data['row_rup']['id_rup']);
        $data['dok_tambahan'] = $this->M_panitia->result_syarat_tambahan($data['row_rup']['id_rup']);
        $data['hitung_peserta'] = $this->M_panitia->get_peserta_tender_count($data['row_rup']['id_rup']);

        if ($data['row_rup']['bobot_nilai'] == 1) {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        } else if (($data['row_rup']['bobot_nilai'] == 2)) {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang_biaya($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1_biaya($data['row_rup']['id_rup']);
        } else {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        }

        // get tahap
        $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_1($data['row_rup']['id_rup']);
        $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_2($data['row_rup']['id_rup']);
        $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['row_rup']['id_rup']);
        $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_4($data['row_rup']['id_rup']);
        $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_5($data['row_rup']['id_rup']);
        $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_4($data['row_rup']['id_rup']);
        $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_7($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_8($data['row_rup']['id_rup']);
        $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_9($data['row_rup']['id_rup']);
        $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_10($data['row_rup']['id_rup']);
        $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['row_rup']['id_rup']);
        $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra1file_umum_12($data['row_rup']['id_rup']);
        $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra1file_umum_13($data['row_rup']['id_rup']);
        $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra1file_umum_14($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra1file_umum_15($data['row_rup']['id_rup']);
        $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra1file_umum_16($data['row_rup']['id_rup']);
        $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra1file_umum_17($data['row_rup']['id_rup']);
        $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_pra1file_umum_18($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra1file_umum_18($data['row_rup']['id_rup']);
        $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra1file_umum_20($data['row_rup']['id_rup']);
        $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra1file_umum_21($data['row_rup']['id_rup']);
        // end get tahap

        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/base_url_global', $data);
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/base_url_info_tender', $data);
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/index', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax', $data);
    }

    // global id rup for ajax
    public function get_row_rup($id_rup)
    {
        $response = $this->M_panitia->get_rup($id_rup);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    // evaluasi
    public function evaluasi($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_6($data['row_rup']['id_rup']);
        $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra1file_umum_14($data['row_rup']['id_rup']);
        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/base_url_info_tender', $data);
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/evaluasi', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax', $data);
    }

    public function get_evaluasi_kualifikasi($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi($id_rup);
        $jadwal_evaluasi_dokumen_kualifikasi =  $this->M_jadwal->jadwal_pra1file_umum_6($id_rup);
        $hitung_syarat = $this->M_panitia->hitung_total_syarat($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $cek_valid_vendor = $this->M_panitia->cek_valid_vendor($id_rup, $rs->id_vendor);
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;

            if ($cek_valid_vendor >= $hitung_syarat) {
                $row[] = '<span class="badge bg-success">Lulus</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Tidak Lulus</span>';
            }



            // nilai keuangan
            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->ev_keuangan == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                } else {
                    if ($rs->ev_keuangan >= 60) {
                        $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                    }
                }
            } else {
                if ($rs->ev_keuangan == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                } else {
                    if ($rs->ev_keuangan >= 60) {
                        $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                    }
                }
            }



            // nilai teknis

            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->ev_teknis == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                } else {
                    if ($rs->ev_teknis >= 60) {
                        $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                    }
                }
            } else {
                if ($rs->ev_teknis == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                } else {
                    if ($rs->ev_teknis >= 60) {
                        $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                    }
                }
            }


            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->ev_kualifikasi_akhir == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                } else {
                    if ($rs->ev_kualifikasi_akhir >= 60) {
                        $row[] = number_format($rs->ev_kualifikasi_akhir, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_kualifikasi_akhir, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                    }
                }
            } else {
                if ($rs->ev_kualifikasi_akhir == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-secondary bg-sm">Tidak Dievaluasi</span>';
                } else {
                    if ($rs->ev_kualifikasi_akhir >= 60) {
                        $row[] = number_format($rs->ev_kualifikasi_akhir, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_kualifikasi_akhir, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                    }
                }
            }


            if ($cek_valid_vendor >= $hitung_syarat) {
                if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) {
                    $row[] = '<div class="text-center badge bg-danger"><small>Belum Memasuki Tahap Ini</small></div>';
                } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) {
                    $row[] = '<div class="text-center">
                                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','kualifikasi'" . ')">
                                    <i class="fa-solid fa-edit"></i>
                                    <small>Evaluasi</small>
                                </a>
                            </div>';
                } else {
                    $row[] = '<div class="text-center">
                    <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','kualifikasi'" . ')">
                        <i class="fa-solid fa-edit"></i>
                        <small>Evaluasi</small>
                    </a>
                </div>';
                }
            } else {

                $row[] = '<div class="text-center">
                <button disabled class="btn btn-secondary btn-sm shadow-lg text-white">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </button>
            </div>';


                //     $row[] = '<div class="text-center">
                //     <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','kualifikasi'" . ')">
                //         <i class="fa-solid fa-edit"></i>
                //         <small>Evaluasi</small>
                //     </a>
                // </div>';
            }


            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_evaluasi_penawaran($id_rup)
    {
        $jadwal_presentasi_evaluasi =  $this->M_jadwal->jadwal_pra1file_umum_14($id_rup);
        $result = $this->M_panitia->gettable_evaluasi_penawaran($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->nilai_penawaran) {
                $row[] =  number_format($rs->nilai_penawaran, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_penawaran_teknis) {
                $row[] =  $rs->ev_penawaran_teknis;
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_penawaran_hps) {
                $row[] =  number_format($rs->ev_penawaran_hps, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_penawaran_biaya) {
                $row[] =  number_format($rs->ev_penawaran_biaya, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }


            if ($rs->ev_penawaran_akhir) {
                $row[] =  number_format($rs->ev_penawaran_akhir, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_penawaran_peringkat) {
                $row[] =  $rs->ev_penawaran_peringkat;
            } else {
                $row[] =  '0';
            }


            if ($rs->ev_penawaran_akhir == NULL) {
                $row[] = '<span class="badge bg-secondary bg-sm">Belum Di Ketahui</span>';
            } else {
                if ($rs->ev_penawaran_akhir >= 60) {
                    $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Tidak Sah</span>';
                }
            }

            if (date('Y-m-d H:i', strtotime($jadwal_presentasi_evaluasi['waktu_mulai']))  >= date('Y-m-d H:i')) {
                $row[] = '<div class="text-center badge bg-danger"><small>Belum Memasuki Tahap Ini</small></div>';
            } else if (date('Y-m-d H:i', strtotime($jadwal_presentasi_evaluasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_presentasi_evaluasi['waktu_mulai'])) == date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','penawaran'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','penawaran'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
              </div>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_penawaran($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_penawaran($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_evaluasi_hea_tkdn($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_hea_tkdn($id_rup);
        $rup = $this->M_panitia->get_rup($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {

            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->ev_hea_penawaran) {
                $row[] =  number_format($rs->ev_hea_penawaran, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_hea_tkdn) {
                $row[] =  number_format($rs->ev_hea_tkdn, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_hea_harga) {
                $row[] =  number_format($rs->ev_hea_harga, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            $row[] = $rs->ev_hea_peringkat;

            if ($rs->ev_hea_tkdn) {
                if ($rs->ev_hea_tkdn >= $rup['persen_pencatatan'] && $rs->ev_hea_harga <= $rup['total_hps_rup']) {
                    $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                }
            } else {
                $row[] = '<span class="badge bg-secondary bg-sm">Belum Di Evaluasi</span>';
            }


            $row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','hea_tkdn'" . ')">
							<i class="fa-solid fa-edit"></i>
							<small>Evaluasi</small>
						</a>
					  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_hea_tkdn($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_hea_tkdn($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_evaluasi_akhir_hea($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_akhir_hea($id_rup);
        $rup = $this->M_panitia->get_rup($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {

            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->ev_hea_harga) {
                $row[] =  number_format($rs->ev_hea_harga, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_akhir_hea_teknis) {
                $row[] =  number_format($rs->ev_akhir_hea_teknis, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_akhir_hea_hps) {
                $row[] =  number_format($rs->ev_akhir_hea_hps, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_akhir_hea_nilai) {
                $row[] =  number_format($rs->ev_akhir_hea_nilai, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_akhir_hea_akhir) {
                $row[] =  number_format($rs->ev_akhir_hea_akhir, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            $row[] = $rs->ev_akhir_hea_peringkat;

            if ($rs->ev_akhir_hea_akhir) {
                if ($rs->ev_akhir_hea_akhir >= $rup['bobot_teknis']) {
                    $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                }
            } else {
                $row[] = '<span class="badge bg-secondary bg-sm">Belum Di Evaluasi</span>';
            }


            $row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','akhir_hea'" . ')">
							<i class="fa-solid fa-edit"></i>
							<small>Evaluasi</small>
						</a>
					  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_akhir_hea($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_akhir_hea($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_evaluasi_akhir_harga_terendah($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_akhir_hea($id_rup);
        $rup = $this->M_panitia->get_rup($id_rup);
        $hitung_syarat = $this->M_panitia->hitung_total_syarat($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $cek_valid_vendor = $this->M_panitia->cek_valid_vendor($id_rup, $rs->id_vendor);
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($cek_valid_vendor >= $hitung_syarat) {
                $row[] = '<span class="badge bg-success">Lulus</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Tidak Lulus</span>';
            }
            if ($rs->ev_terendah_harga) {
                $row[] =  number_format($rs->ev_terendah_harga, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_hps) {
                $row[] =  number_format($rs->ev_terendah_hps, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_bobot) {
                $row[] =  number_format($rs->ev_terendah_bobot, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }


            $row[] = $rs->ev_terendah_peringkat;

            if ($rs->ev_terendah_hps) {
                if ($rs->ev_terendah_hps <= $rup['bobot_biaya']) {
                    $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Tidak Lulus</span>';
                }
            } else {
                $row[] = '<span class="badge bg-secondary bg-sm">Belum Di Evaluasi</span>';
            }


            $row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','harga_terendah'" . ')">
							<i class="fa-solid fa-edit"></i>
							<small>Evaluasi</small>
						</a>
					  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_akhir_hea($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_akhir_hea($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_byid_mengikuti($id_vendor_mengikuti_paket)
    {
        $row_vendor_mengikuti = $this->M_panitia->row_vendor_mengikuti($id_vendor_mengikuti_paket);
        $data = [
            'row_vendor_mengikuti' => $row_vendor_mengikuti
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_byid_syarat_tambahan($id_vendor_mengikuti_paket)
    {
        $row_vendor_mengikuti = $this->M_panitia->row_vendor_syarat_tambahan($id_vendor_mengikuti_paket);
        $data = [
            'row_vendor_tambahan' => $row_vendor_mengikuti
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function simpan_evaluasi_kualifikasi()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $ev_keuangan = $this->input->post('ev_keuangan');
        $ev_teknis = $this->input->post('ev_teknis');

        $this->form_validation->set_rules('ev_keuangan', 'Evaluasi Keuangan', 'required|trim', ['required' => 'Evaluasi Keuangan Harus Di isi!']);
        $this->form_validation->set_rules('ev_teknis', 'Evaluasi Teknis', 'required|trim', ['required' => 'Evaluasi Teknis Harus Di isi!']);

        if ($this->form_validation->run() == false) {
            $response = [
                'error' => [
                    'ev_keuangan' => form_error('ev_keuangan'),
                    'ev_teknis' => form_error('ev_teknis')
                ],
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $total = $ev_keuangan * 0.5 + $ev_teknis * 0.5;
            $data = [
                'ev_keuangan' => $ev_keuangan,
                'ev_teknis' => $ev_teknis,
                'ev_kualifikasi_akhir' => $total
            ];
            $where = [
                'id_vendor_mengikuti_paket'    => $id_vendor_mengikuti_paket
            ];
            $this->M_panitia->update_evaluasi($data, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function simpan_evaluasi_penawaran()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $id_rup_post = $this->input->post('id_rup_post');
        $nilai_penawaran = $this->input->post('nilai_penawaran');
        $ev_penawaran_teknis = $this->input->post('ev_penawaran_teknis');
        $total_hps_rup = $this->input->post('total_hps_rup');

        //post teknis dan biaya
        $bobot_teknis = $this->input->post('bobot_teknis');
        $bobot_biaya = $this->input->post('bobot_biaya');

        $terhadap_hps = $nilai_penawaran / $total_hps_rup * 100;

        // get nilai penawaran terendah
        $get_min_penawaran = $this->M_panitia->get_min_penawaran($id_rup_post);
        $get_usulan_biaya = $get_min_penawaran['min_nilai_penawaran'];
        $total_usulan_biaya = $get_usulan_biaya / $total_hps_rup * 100;


        if ($total_usulan_biaya == 0) {
            $data = [
                'nilai_penawaran' => $nilai_penawaran,
                'ev_penawaran_teknis' => $ev_penawaran_teknis,
                'ev_penawaran_hps' => $terhadap_hps,
                'ev_penawaran_biaya' => $total_usulan_biaya
            ];
            $where = [
                'id_vendor_mengikuti_paket'    => $id_vendor_mengikuti_paket
            ];
            $this->M_panitia->update_evaluasi($data, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {

            $data = [
                'nilai_penawaran' => $nilai_penawaran,
                'ev_penawaran_teknis' => $ev_penawaran_teknis,
                'ev_penawaran_hps' => $terhadap_hps,
                'ev_penawaran_biaya' => $total_usulan_biaya
            ];
            $where = [
                'id_vendor_mengikuti_paket'    => $id_vendor_mengikuti_paket
            ];
            $this->M_panitia->update_evaluasi($data, $where);

            // update biaya usulan 
            $get_min_penawaran2 = $this->M_panitia->get_min_penawaran($id_rup_post);
            $get_usulan_biaya2 = $get_min_penawaran2['min_nilai_penawaran'];
            $peserta = $this->M_panitia->get_peserta_tender_penawaran($id_rup_post);
            foreach ($peserta as $key => $value) {
                $data2 = [
                    'nilai_penawaran' => $value['nilai_penawaran'],
                    'ev_penawaran_teknis' => $value['ev_penawaran_teknis'],
                    'ev_penawaran_hps' => $value['ev_penawaran_hps'],
                    'ev_penawaran_biaya' => $get_usulan_biaya2 / $value['nilai_penawaran'] * 100,
                ];
                $where2 = [
                    'id_vendor_mengikuti_paket'    => $value['id_vendor_mengikuti_paket']
                ];
                $this->M_panitia->update_evaluasi($data2, $where2);
            }

            // update nilai akhir keseluruhan
            $peserta2 = $this->M_panitia->get_peserta_tender_penawaran($id_rup_post);
            foreach ($peserta2 as $key => $value2) {
                $data3 = [
                    'ev_penawaran_akhir' => $value2['ev_penawaran_teknis'] * $bobot_teknis / 100  + $value2['ev_penawaran_biaya'] * $bobot_biaya / 100
                ];
                $where3 = [
                    'id_vendor_mengikuti_paket'    => $value2['id_vendor_mengikuti_paket']
                ];
                $this->M_panitia->update_evaluasi($data3, $where3);
            }

            // update peringkat keseluruhan
            $peserta3 = $this->M_panitia->get_peserta_tender_nilai_akhir($id_rup_post);
            $i = 1;
            foreach ($peserta3 as $key => $value3) {
                $data4 = [
                    'ev_penawaran_peringkat' => $i++
                ];
                $where4 = [
                    'id_vendor_mengikuti_paket'    => $value3['id_vendor_mengikuti_paket']
                ];
                $this->M_panitia->update_evaluasi($data4, $where4);
            }


            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function simpan_evaluasi_akhir_tkdn()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $id_rup_post = $this->input->post('id_rup_post');
        $ev_hea_penawaran = $this->input->post('ev_hea_penawaran');
        $ev_hea_tkdn = $this->input->post('ev_hea_tkdn');
        $total_hps_rup = $this->input->post('total_hps_rup');

        if ($ev_hea_tkdn >= 25) {
            // $prefensi = 25 / 100;
            $total_harga = (1 - ($ev_hea_tkdn / 100 * 0.25)) * $ev_hea_penawaran;
        } else {
            $prefensi = 0;
            $total_harga = (1 - ($ev_hea_tkdn * $prefensi)) * $ev_hea_penawaran;
        }

        $data = [
            'ev_hea_penawaran' => $ev_hea_penawaran,
            'ev_hea_tkdn' => $ev_hea_tkdn,
            'ev_hea_harga' => $total_harga,

        ];
        $where = [
            'id_vendor_mengikuti_paket'    => $id_vendor_mengikuti_paket
        ];
        $this->M_panitia->update_evaluasi($data, $where);

        $peserta = $this->M_panitia->get_peserta_tender_hea_tkdn($id_rup_post);
        $i = 0;
        foreach ($peserta as $key => $value) {
            $data2 = [
                'ev_hea_peringkat' => $i++
            ];
            $where2 = [
                'id_vendor_mengikuti_paket'    => $value['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data2, $where2);
        }

        $a = 1;
        $peserta2 = $this->M_panitia->get_peserta_tender_hea_tkdn($id_rup_post);
        foreach ($peserta2 as $key => $value) {
            $data3 = [
                'ev_hea_peringkat' =>  $a++
            ];
            $where3 = [
                'id_vendor_mengikuti_paket'  => $value['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data3, $where3);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function simpan_evaluasi_akhir_hea()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $id_rup_post = $this->input->post('id_rup_post');
        $ev_hea_harga = $this->input->post('ev_hea_harga');
        $ev_akhir_hea_teknis = $this->input->post('ev_akhir_hea_teknis');
        $total_hps_rup = $this->input->post('total_hps_rup');

        //post teknis dan biaya
        $bobot_teknis = $this->input->post('bobot_teknis');
        $bobot_biaya = $this->input->post('bobot_biaya');

        // nilai hea
        $get_min_penawaran = $this->M_panitia->get_min_penawaran_hea($id_rup_post);
        $get_nilai_hea = $get_min_penawaran['min_nilai_hea'];
        $total_nilai_hea = $get_nilai_hea / $ev_hea_harga * 100;


        $data = [
            'ev_akhir_hea_teknis' => $ev_akhir_hea_teknis,
            'ev_akhir_hea_hps' => $ev_hea_harga / $total_hps_rup * 100,
            'ev_akhir_hea_nilai' => $total_nilai_hea
        ];
        $where = [
            'id_vendor_mengikuti_paket'    => $id_vendor_mengikuti_paket
        ];
        $this->M_panitia->update_evaluasi($data, $where);
        // update nilai akhir keseluruhan
        $peserta = $this->M_panitia->get_peserta_nilai_akhir_hea($id_rup_post);
        foreach ($peserta as $key => $value2) {
            $data2 = [
                'ev_akhir_hea_akhir' => $value2['ev_akhir_hea_teknis'] * $bobot_teknis / 100  + $value2['ev_akhir_hea_nilai'] * $bobot_biaya / 100
            ];
            $where2 = [
                'id_vendor_mengikuti_paket'    => $value2['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data2, $where2);
        }
        // update nilai peringkat keseluruhan
        $peserta2 = $this->M_panitia->get_peserta_nilai_akhir_hea2($id_rup_post);
        $i = 1;
        foreach ($peserta2 as $key => $value3) {
            $data3 = [
                'ev_akhir_hea_peringkat' => $i++
            ];
            $where3 = [
                'id_vendor_mengikuti_paket'    => $value3['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data3, $where3);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function simpan_evaluasi_harga_terendah()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $id_rup_post = $this->input->post('id_rup_post');
        $ev_terendah_harga = $this->input->post('ev_terendah_harga');
        $total_hps_rup = $this->input->post('total_hps_rup');

        //post teknis dan biaya
        $bobot_teknis = $this->input->post('bobot_teknis');
        $bobot_biaya = $this->input->post('bobot_biaya');

        // nilai hea
        $get_min_penawaran = $this->M_panitia->get_min_penawaran_terendah($id_rup_post);
        $get_nilai_min = $get_min_penawaran['min_nilai_terendah'];
        // $total_nilai_hea = $get_nilai_hea / $ev_terendah_harga * 100;

        $data = [
            'ev_terendah_harga' => $ev_terendah_harga,
            'ev_terendah_hps' => $ev_terendah_harga / $total_hps_rup * 100,
            'ev_terendah_bobot' => $get_nilai_min / $ev_terendah_harga * 100
        ];
        $where = [
            'id_vendor_mengikuti_paket'  => $id_vendor_mengikuti_paket
        ];
        $this->M_panitia->update_evaluasi($data, $where);

        $peserta2 = $this->M_panitia->get_min_penawaran_terendah_peringkat($id_rup_post);
        $i = 1;
        foreach ($peserta2 as $key => $value3) {
            $data3 = [
                'ev_terendah_peringkat' => $i++
            ];
            $where3 = [
                'id_vendor_mengikuti_paket' => $value3['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data3, $where3);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));

        // update nilai akhir keseluruhan
        // $peserta = $this->M_panitia->get_peserta_nilai_akhir_hea($id_rup_post);
        // foreach ($peserta as $key => $value2) {
        //     $data2 = [
        //         'ev_akhir_hea_akhir' => $value2['ev_akhir_hea_teknis'] * $bobot_teknis / 100  + $value2['ev_akhir_hea_nilai'] * $bobot_biaya / 100
        //     ];
        //     $where2 = [
        //         'id_vendor_mengikuti_paket'    => $value2['id_vendor_mengikuti_paket']
        //     ];
        //     $this->M_panitia->update_evaluasi($data2, $where2);
        // }
        // // update nilai peringkat keseluruhan
        // $peserta2 = $this->M_panitia->get_peserta_nilai_akhir_hea2($id_rup_post);
        // $i = 1;
        // foreach ($peserta2 as $key => $value3) {
        //     $data3 = [
        //         'ev_akhir_hea_peringkat' => $i++
        //     ];
        //     $where3 = [
        //         'id_vendor_mengikuti_paket'    => $value3['id_vendor_mengikuti_paket']
        //     ];
        //     $this->M_panitia->update_evaluasi($data3, $where3);
        // }
        // $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end evaluasi

    // persyaratan tambahan
    public function get_syarat_tambahan($id_rup)
    {
        $result = $this->M_panitia->gettable_syarat_tambahan($id_rup);
        // urgensi hitung pake syarat buat cek valid atau Tidak Lulus
        $hitung_syarat = $this->M_panitia->hitung_total_syarat($id_rup);
        $jadwal_evaluasi_dokumen_kualifikasi =  $this->M_jadwal->jadwal_pra1file_umum_4($id_rup);

        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $cek_valid_vendor = $this->M_panitia->cek_valid_vendor($id_rup, $rs->id_vendor);
            $cek_tidak_valid = $this->M_panitia->cek_tidak_valid($id_rup, $rs->id_vendor);
            $cek_null_syarat = $this->M_panitia->cek_null_syarat($id_rup, $rs->id_vendor);
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($cek_valid_vendor >= $hitung_syarat) {
                $row[] = '<span class="badge bg-success">Lulus</span>';
            } else {
                if ($cek_null_syarat) {
                    $row[] = '<span class="badge bg-secondary">Belum Diperiksa</span>';
                } else {
                    if ($cek_tidak_valid) {
                        $row[] = '<span class="badge bg-danger">Tidak Valid</span>';
                    } else {
                        if ($cek_valid_vendor >= $hitung_syarat) {
                            $row[] = '<span class="badge bg-secondary">Belum Diperiksa</span>';
                        } else {
                            $row[] = '<span class="badge bg-warning">Belum Lengkap</span>';
                        }
                    }
                }
            }
            if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <button disabled class="btn btn-danger btn-sm shadow-lg text-white">
                    <i class="fa-solid fa-edit"></i>
                    <small>Belum Memasuki Tahap Ini</small>
                </button>
              </div>';
            } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','syarat_tambahan'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','syarat_tambahan'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
              </div>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_syarat_tambahan($id_rup),
            "recordsFiltered" => $this->M_panitia->count_all_syarat_tambahan($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_dokumen_syarat_tambahan($id_vendor)
    {
        $id_rup = $this->uri->segment(6);
        $nama_rup = $this->M_panitia->get_rup($id_rup);
        $result = $this->M_panitia->gettable_dokumen_syarat_tambahan($id_vendor, $id_rup);
        $jadwal_evaluasi_dokumen_kualifikasi =  $this->M_jadwal->jadwal_pra1file_umum_6($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_syarat_tambahan;
            $row[] = '<a target="_blank" href="http://localhost/jmto-vms/file_paket/' .  $nama_rup['nama_rup'] .  '/' . $rs->nama_usaha . '/SYARAT_TAMBAHAN' . '/' . $rs->file_syarat_tambahan . '" class="btn btn-sm btn-warning text-white"><i class="fa fa-file"></i></a>';
            if ($rs->status == NULL) {
                $row[] = '<span class="badge bg-secondary">Belum Di Evaluasi</span>';
            } else if ($rs->status == 1) {
                $row[] = '<span class="badge bg-success">Valid</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Tidak Lulus</span>';
            }
            if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <button disabled class="btn btn-danger btn-sm shadow-lg text-white">
                    <i class="fa-solid fa-edit"></i>
                    <small>Belum Memasuki Tahap Ini</small>
                </button>
              </div>';
            } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_syarat_tambahan(' . "'" . $rs->id_vendor_syarat_tambahan . "','evaluasi_syarat_tambah'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_syarat_tambahan(' . "'" . $rs->id_vendor_syarat_tambahan . "','evaluasi_syarat_tambah'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
              </div>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_dokumen_syarat_tambahan($id_vendor, $id_rup),
            "recordsFiltered" => $this->M_panitia->count_all_dokumen_syarat_tambahan($id_vendor, $id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_evaluasi_syarat_tambahan()
    {
        $id_vendor_syarat_tambahan = $this->input->post('id_vendor_syarat_tambahan');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');
        $nama_validator = $this->session->userdata('nama_pegawai');
        $tgl_dicek = date('Y-m-d H:i');

        $data = [
            'status' => $status,
            'nama_validator' => $nama_validator,
            'tgl_dicek' => $tgl_dicek,
            'keterangan' => $keterangan
        ];
        $where = [
            'id_vendor_syarat_tambahan'    => $id_vendor_syarat_tambahan
        ];
        $this->M_panitia->update_syarat_tambahan($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // end persyaratan tambahan

    // berita acara pengadaan
    public function simpan_berita_acara_tender()
    {
        $id_rup = $this->input->post('id_rup_ba_tender');
        $nama_rup = $this->input->post('nama_rup_ba_tender');


        $date = date('Y');
        if (!is_dir('file_paket/' . $nama_rup . '/BERITA_ACARA_PENGADAAN')) {
            mkdir('file_paket/' . $nama_rup . '/BERITA_ACARA_PENGADAAN', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/' . $nama_rup  . '/BERITA_ACARA_PENGADAAN';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_ba')) {
            $fileData = $this->upload->data();

            $upload = [
                'id_rup' => $id_rup,
                'nama_file' => $this->input->post('nama_file'),
                'file_ba' => $fileData['file_name'],
                'user_upload' => $this->session->userdata('nama_pegawai')
            ];

            $this->M_panitia->insert_ba_tender($upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function get_berita_acara_tender($id_rup)
    {
        $response = $this->M_panitia->get_ba_tender($id_rup);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    // 

    public function hapus_berita_acara_tender()
    {
        $id_berita_acara_tender = $this->input->post('id_berita_acara_tender');
        $this->M_panitia->hapus_ba_tender($id_berita_acara_tender);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end berita acara pengadaan

    // upload undangan pembuktian 
    public function simpan_undangan_pembuktian()
    {
        $id_rup = $this->input->post('id_rup_pembuktian');
        $nama_rup = $this->input->post('nama_rup_pembuktian');


        $date = date('Y');
        if (!is_dir('file_paket/' . $nama_rup . '/UNDANGAN_PEMBUKTIAN')) {
            mkdir('file_paket/' . $nama_rup . '/UNDANGAN_PEMBUKTIAN', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/' . $nama_rup  . '/UNDANGAN_PEMBUKTIAN';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_undangan_pembuktian')) {
            $fileData = $this->upload->data();

            $upload = [
                'file_undangan_pembuktian' => $fileData['file_name']
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }
    // end upload undangan pembuktian

    // upload hasil prakualifikasi
    public function simpan_hasil_prakualifikasi()
    {
        $id_rup = $this->input->post('id_rup_prakualifikasi');
        $nama_rup = $this->input->post('nama_rup_prakualifikasi');


        $date = date('Y');
        if (!is_dir('file_paket/' . $nama_rup . '/HASIL_PRAKUALIFIKASI')) {
            mkdir('file_paket/' . $nama_rup . '/HASIL_PRAKUALIFIKASI', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/' . $nama_rup  . '/HASIL_PRAKUALIFIKASI';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_pengumuman_prakualifikasi')) {
            $fileData = $this->upload->data();

            $upload = [
                'file_pengumuman_prakualifikasi' => $fileData['file_name']
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }
    // end hasil prakualifikasi

    // upload penunjukan pemenang
    public function simpan_penunjukan_pemenang()
    {
        $id_rup = $this->input->post('id_rup_penunjukan');
        $nama_rup = $this->input->post('nama_rup_penunjukan');


        $date = date('Y');
        if (!is_dir('file_paket/' . $nama_rup . '/SURAT_PENUNJUKAN_PEMENANG')) {
            mkdir('file_paket/' . $nama_rup . '/SURAT_PENUNJUKAN_PEMENANG', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/' . $nama_rup  . '/SURAT_PENUNJUKAN_PEMENANG';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_surat_penunjukan_pemenang')) {
            $fileData = $this->upload->data();
            $upload = [
                'file_surat_penunjukan_pemenang' => $fileData['file_name']
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }
    // end penunjukan pemenang

    public function sanggahan_prakualifikasi($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/sanggahan_prakualifikasi', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax', $data);
    }

    public function sanggahan_akhir($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/sanggahan_akhir', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax', $data);
    }

    public function buka_penawaran($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra1file_umum_14($data['row_rup']['id_rup']);
        $this->load->view('template_tender/header_penawaran');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/buka_penawaran', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax_penawaran');
    }

    function acces_penawaran()
    {
        $id_url_rup = $this->input->post('id_url_rup');
        $token_syalala = $this->input->post('token_syalala');
        $row_rup = $this->M_rup->get_row_rup($id_url_rup);
        if ($row_rup['token_panitia'] == $token_syalala) {
            $userdata = [
                'token_panitia' => $token_syalala,
            ];
            $this->session->set_userdata($userdata);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('token_salah'));
        }
    }
    function kirim_token_penawaran()
    {
        $id_url_rup = $this->input->post('id_url_rup');
        $row_rup = $this->M_rup->get_row_rup($id_url_rup);
        $message = 'Token = ' . $row_rup['token_panitia'] . ' , Nama Pengadaan = ' . $row_rup['nama_rup'] . '';
        $no_telpon = $this->session->userdata('no_telpon');
        $this->kirim_wa->kirim_wa_vendor_terdaftar($no_telpon, $message);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    function summary_tender($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['dok_lelang'] = $this->M_panitia->get_dokumen_pengadaan($data['row_rup']['id_rup']);
        $data['dok_prakualifikasi'] = $this->M_panitia->get_dokumen_prakualifikasi($data['row_rup']['id_rup']);
        $data['dok_tambahan'] = $this->M_panitia->result_syarat_tambahan($data['row_rup']['id_rup']);
        $data['hitung_peserta'] = $this->M_panitia->get_peserta_tender_count($data['row_rup']['id_rup']);

        if ($data['row_rup']['bobot_nilai'] == 1) {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        } else if (($data['row_rup']['bobot_nilai'] == 2)) {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang_biaya($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1_biaya($data['row_rup']['id_rup']);
        } else {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        }



        // get tahap
        $data['jadwal_pengumuman_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_1($data['row_rup']['id_rup']);
        $data['jadwal_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_2($data['row_rup']['id_rup']);
        $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra_umum_3($data['row_rup']['id_rup']);
        $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_4($data['row_rup']['id_rup']);
        $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_5($data['row_rup']['id_rup']);
        $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_6($data['row_rup']['id_rup']);
        $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_7($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_8($data['row_rup']['id_rup']);
        $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_9($data['row_rup']['id_rup']);
        $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_10($data['row_rup']['id_rup']);
        $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra_umum_11($data['row_rup']['id_rup']);
        $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra_umum_12($data['row_rup']['id_rup']);
        $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_pra_umum_13($data['row_rup']['id_rup']);
        $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra_umum_14($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra_umum_15($data['row_rup']['id_rup']);
        $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra_umum_16($data['row_rup']['id_rup']);
        $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra_umum_17($data['row_rup']['id_rup']);
        $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_18($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_19($data['row_rup']['id_rup']);
        $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra_umum_20($data['row_rup']['id_rup']);
        $data['jadwal_upload_surat_penunjukan'] =  $this->M_jadwal->jadwal_pra_umum_21($data['row_rup']['id_rup']);
        // end get tahap

        // ININ SECTION DARI DAFTAR PAKET
        $data['syarat_izin_usaha_tender'] = $this->M_panitia->get_syarat_izin_usaha_tender($data['row_rup']['id_rup']);
        $data['syarat_izin_teknis_tender'] = $this->M_panitia->get_syarat_izin_teknis_tender($data['row_rup']['id_rup']);
        $data['result_kbli'] = $this->M_panitia->result_kbli();
        $data['result_sbu'] = $this->M_panitia->result_sbu();
        // // lolos kualifikasi
        // cek vendor terundang
        // lolos izin_usaha paket
        $syarat_izin_usaha = $this->M_panitia->cek_syarat_izin_usaha($data['row_rup']['id_rup']);
        $cek_syarat_kbli = $this->M_panitia->cek_syarat_kbli($data['row_rup']['id_rup']);
        $cek_syarat_kbli_sbu = $this->M_panitia->cek_syarat_sbu($data['row_rup']['id_rup']);
        $cek_syarat_teknis = $this->M_panitia->cek_syarat_teknis($data['row_rup']['id_rup']);
        // siup
        $data_vendor_lolos_siup_kbli = $this->M_panitia->data_vendor_lolos_siup_kbli($cek_syarat_kbli);

        // nib
        $data_vendor_lolos_nib_kbli = $this->M_panitia->data_vendor_lolos_nib_kbli($cek_syarat_kbli);
        // var_dump($data_vendor_lolos_nib_kbli);
        // die;
        // siujk
        $data_vendor_lolos_siujk_kbli = $this->M_panitia->data_vendor_lolos_siujk_kbli($cek_syarat_kbli);

        // skdp
        // $data_vendor_lolos_skdp_kbli = $this->M_panitia->data_vendor_lolos_skdp_kbli($cek_syarat_kbli);

        // sbu
        $data_vendor_lolos_sbu_kbli = $this->M_panitia->data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu);

        // spt
        $data_vendor_lolos_spt = $this->M_panitia->data_vendor_lolos_spt($cek_syarat_teknis);

        // laporan keuangan
        $data_vendor_lolos_laporan_keuangan = $this->M_panitia->data_vendor_lolos_laporan_keuangan($cek_syarat_teknis);

        // neraca keuangan
        $data_vendor_lolos_neraca_keuangan = $this->M_panitia->data_vendor_lolos_neraca_keuangan($cek_syarat_teknis);


        $data_vendor_terundang_by_kbli = $this->M_panitia->gabung_keseluruhan_vendor_terundang($data_vendor_lolos_siup_kbli, $data_vendor_lolos_nib_kbli, $data_vendor_lolos_siujk_kbli, $data_vendor_lolos_sbu_kbli);

        // var_dump($data_vendor_terundang_by_kbli);
        // die;

        $data['result_vendor_terundang'] = $this->M_panitia->result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli, $data['row_rup']);

        // yang dapat mengumumkan 
        $data['diumumkan_oleh'] = $this->M_panitia->get_yang_dapat_mengumumkan($data['row_rup']['id_rup']);
        $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra_umum_10($data['row_rup']['id_rup']);
        $data['dok_lelang'] = $this->M_panitia->get_dokumen_pengadaan($data['row_rup']['id_rup']);
        $data['data_panitia'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        // $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/summary_tender', $data);
    }

    function kirim_pengumuman_pemenang()
    {
        $id_url_rup = $this->input->post('id_url_rup');
        $row_rup = $this->M_rup->get_row_rup($id_url_rup);

        if ($row_rup['bobot_nilai'] == 1) {
            $get_rank1 = $this->M_panitia->get_peserta_rank1($row_rup['id_rup']);
            $message = 'Selamat Anda Telah Memenangkan Pengadaan Paket ' . $row_rup['nama_rup'] . ' Dengan Penawaran Rp.' . number_format($get_rank1['ev_hea_penawaran'], 2, ',', '.') . '';
        } else {
            $get_rank1 = $this->M_panitia->get_peserta_rank1_biaya($row_rup['id_rup']);
            $message = 'Selamat Anda Telah Memenangkan Pengadaan Paket ' . $row_rup['nama_rup'] . ' Dengan Penawaran Rp.' . number_format($get_rank1['ev_hea_penawaran'], 2, ',', '.') . '';
        }

        $this->kirim_wa->kirim_wa_vendor_terdaftar($get_rank1['no_telpon'], $message);
        $type_email = 'PENGUMUMAN PEMENANG';
        $this->email_send->sen_row_email($type_email, $get_rank1['id_vendor'], $message);
        $upload = [
            'id_vendor_pemenang' => $get_rank1['id_vendor']
        ];
        $this->M_panitia->update_rup_panitia($row_rup['id_rup'], $upload);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    
    public function get_vendor_mengikuti_paket_penawaran()
    {
        $id_rup = $this->input->post('id_rup');
        $result = $this->M_panitia->gettable_vendor_mengikuti_paket_penawaran($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            $row[] = '<div class="text-center">
			<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','lihat_dokumen_penawaran_1'" . ')">
				<i class="fa-solid fa-eye"></i>
				<small>Lihat</small>
			</a>
		  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_vendor_mengikuti_paket_penawaran($id_rup),
            "recordsFiltered" => $this->M_panitia->count_all_vendor_mengikuti_paket_penawaran($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_vendor_mengikuti_paket_penawaran_file_II()
    {
        $id_rup = $this->input->post('id_rup');
        $result = $this->M_panitia->gettable_vendor_mengikuti_paket_penawaran($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            // if ($rs->nilai_penawaran_vendor) {
            //     $row[] = "Rp " . number_format($rs->nilai_penawaran_vendor, 2, ',', '.');
            // } else {
            //     $row[] = "-";
            // }

            // if ($rs->tkdn_dokumen_penawaran_vendor) {
            //     $row[] = $rs->tkdn_dokumen_penawaran_vendor;
            // } else {
            //     $row[] = "-";
            // }

            // if ($rs->persentase_tkdn_dokumen_penawaran_vendor) {
            //     $row[] = $rs->persentase_tkdn_dokumen_penawaran_vendor . '%';
            // } else {
            //     $row[] = "-";
            // }
            $row[] = '<div class="text-center">
			<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','lihat_dokumen_penawaran_2'" . ')">
				<i class="fa-solid fa-eye"></i>
				<small>Lihat</small>
			</a>
		  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_vendor_mengikuti_paket_penawaran($id_rup),
            "recordsFiltered" => $this->M_panitia->count_all_vendor_mengikuti_paket_penawaran($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_dokumen_penawaran_file_I_vendor()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');
        $rup = $this->M_panitia->get_rup($id_rup);
        $result = $this->M_panitia->gettable_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_dokumen_pengadaan_vendor;
            $row[] = '<div class="text-center">
			<a target="_blank" href="' . $this->link_vendor .  $rup['nama_rup'] . '/' .  $rs->nama_usaha . '/DOKUMEN_PENGADAAN_FILE_I' . '/' . $rs->file_dokumen_pengadaan_vendor . '" class="btn btn-info btn-sm shadow-lg text-white">
				<i class="fa-solid fa-file"></i>
				<small>Lihat</small>
			</a>
		  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor),
            "recordsFiltered" => $this->M_panitia->count_all_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_dokumen_penawaran_file_II_vendor()
    {
        $id_rup = $this->input->post('id_rup');
        $id_vendor = $this->input->post('id_vendor');
        $rup = $this->M_panitia->get_rup($id_rup);
        $result = $this->M_panitia->gettable_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            // if ($rs->nilai_penawaran_vendor) {
            //     $row[] = "Rp " . number_format($rs->nilai_penawaran_vendor, 2, ',', '.');
            // } else {
            //     $row[] = "-";
            // }

            // if ($rs->tkdn_dokumen_penawaran_vendor) {
            //     $row[] = $rs->tkdn_dokumen_penawaran_vendor;
            // } else {
            //     $row[] = "-";
            // }

            // if ($rs->persentase_tkdn_dokumen_penawaran_vendor) {
            //     $row[] = $rs->persentase_tkdn_dokumen_penawaran_vendor . '%';
            // } else {
            //     $row[] = "-";
            // }

            $row[] = '<div class="text-center">
            <a target="_blank" href="' . $this->link_vendor .  $rup['nama_rup'] . '/' .  $rs->nama_usaha . '/DOKUMEN_PENGADAAN_FILE_II' . '/' . $rs->dok_penawaran_harga . '" class="btn btn-info btn-sm shadow-lg text-white">
            <i class="fa-solid fa-file"></i>
            <small>Lihat</small>
        </a>
		  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor),
            "recordsFiltered" => $this->M_panitia->count_all_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function aanwijzing($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['jadwal_aanwizing'] = $this->M_jadwal->jadwal_pra1file_umum_12($data['row_rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['row_rup']['id_rup']);
        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/aanwijzing', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax_chat', $data);
    }

    public function ngeload_chatnya($id_rup)
    {
        $data = $this->M_tender->getPesan($id_rup);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya($id_rup)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $replay_tujuan = $this->input->post('replay_tujuan');
        $replay_isi = $this->input->post('replay_isi');
        $id_rup = $this->input->post('id_rup');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'replay_tujuan' => $replay_tujuan,
                'replay_isi' => $replay_isi,
                'id_rup' => $id_rup,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'replay_tujuan' => $replay_tujuan,
                'replay_isi' => $replay_isi,
                'id_rup' => $id_rup,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'replay_tujuan' => $replay_tujuan,
                'replay_isi' => $replay_isi,
                'id_rup' => $id_rup,
            ];
            $this->M_tender->tambah_chat($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }

    public function aanwijzing_penawaran($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['jadwal_aanwizing'] = $this->M_jadwal->jadwal_pra1file_umum_11($data['row_rup']['id_rup']);
        $data['data2'] = $this->M_tender->getDataById($data['row_rup']['id_rup']);
        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/aanwijzing_penawaran', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax_chat_penawaran', $data);
    }

    public function ngeload_chatnya_penawaran($id_rup)
    {
        $data = $this->M_tender->getPesan_penawaran($id_rup);
        echo json_encode(array(
            'data' => $data
        ));
    }

    public function kirim_pesanya_penawaran($id_rup)
    {
        $isi = $this->input->post('isi');
        $id_pengirim = $this->input->post('id_pengirim');
        $id_penerima = $this->input->post('id_penerima');
        $replay_tujuan = $this->input->post('replay_tujuan');
        $replay_isi = $this->input->post('replay_isi');
        $id_rup = $this->input->post('id_rup');
        $config['upload_path'] = './file_chat/';
        $config['allowed_types'] = 'pdf|jpeg|jpg|png|jfif|gif|xlsx|docx';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen_chat')) {

            $fileData = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'replay_tujuan' => $replay_tujuan,
                'replay_isi' => $replay_isi,
                'id_rup' => $id_rup,
                'dokumen_chat' => $fileData['file_name'],
            ];
            $this->M_tender->tambah_chat_penawaran($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else if ($this->upload->do_upload('img_chat')) {

            $fileData2 = $this->upload->data();

            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'replay_tujuan' => $replay_tujuan,
                'replay_isi' => $replay_isi,
                'id_rup' => $id_rup,
                'img_chat' => $fileData2['file_name'],
            ];
            $this->M_tender->tambah_chat_penawaran($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        } else {
            $upload = [
                'id_pengirim' => $id_pengirim,
                'isi' => $isi,
                'id_penerima' => $id_penerima,
                'replay_tujuan' => $replay_tujuan,
                'replay_isi' => $replay_isi,
                'id_rup' => $id_rup,
            ];
            $this->M_tender->tambah_chat_penawaran($upload);
            $log = array('status' => true);
            echo json_encode($log);
            return true;
        }
    }

    public function get_sanggahan_pra()
    {
        $id_rup = $this->input->post('id_rup');
        $result_sanggahan_pra = $this->M_panitia->get_result_vendor_sanggahan($id_rup);
        $output = [
            'result_sanggahan_pra' => $result_sanggahan_pra,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_sanggahan_pra()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $ket_sanggah_pra_panitia = $this->input->post('ket_sanggah_pra_panitia');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_panitia->get_rup($id_rup);

        if (!is_dir('file_paket/' . $nama_rup['nama_rup']  . '/' . 'SANGGAHAN_PRAKUALIFIKASI')) {
            mkdir('file_paket/' . $nama_rup['nama_rup']  . '/' . 'SANGGAHAN_PRAKUALIFIKASI', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup']  . '/' . 'SANGGAHAN_PRAKUALIFIKASI';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sanggah_pra_panitia')) {
            $fileData = $this->upload->data();
            $upload = [
                'ket_sanggah_pra_panitia' => $ket_sanggah_pra_panitia,
                'file_sanggah_pra_panitia' => $fileData['file_name']
            ];
            $where = [
                'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
            ];
            $this->M_panitia->update_mengikuti($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_sanggahan_pra()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        $upload = [
            'ket_sanggah_pra' => '',
            'file_sanggah_pra' => ''
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_panitia->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sanggahan prakualifikasi

    public function get_sanggahan_akhir()
    {
        $id_rup = $this->input->post('id_rup');
        $result_sanggahan_akhir = $this->M_panitia->get_result_vendor_sanggahan($id_rup);
        $output = [
            'result_sanggahan_akhir' => $result_sanggahan_akhir,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function upload_sanggahan_akhir()
    {
        // post 
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $ket_sanggah_akhir_panitia = $this->input->post('ket_sanggah_akhir_panitia');

        // get value vendor dan paket untuk genrate file
        $nama_rup = $this->M_panitia->get_rup($id_rup);

        if (!is_dir('file_paket/' . $nama_rup['nama_rup']  . '/' . 'SANGGAHAN_AKHIR')) {
            mkdir('file_paket/' . $nama_rup['nama_rup']  . '/' . 'SANGGAHAN_AKHIR', 0777, TRUE);
        }
        $config['upload_path'] = './file_paket/' . $nama_rup['nama_rup']  . '/' . 'SANGGAHAN_AKHIR';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sanggah_akhir_panitia')) {
            $fileData = $this->upload->data();
            $upload = [
                'ket_sanggah_akhir_panitia' => $ket_sanggah_akhir_panitia,
                'file_sanggah_akhir_panitia' => $fileData['file_name']
            ];

            $where = [
                'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
            ];
            $this->M_panitia->update_mengikuti($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function hapus_sanggahan_akhir()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
        $nama_usaha = $this->session->userdata('nama_usaha');
        $id_vendor = $this->session->userdata('id_vendor');

        $upload = [
            'ket_sanggah_akhir' => '',
            'file_sanggah_akhir' => ''
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_panitia->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sanggahan akhir
    public function negosiasi($id_url_rup)
    {
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $this->load->view('template_tender/header');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/negosiasi', $data);
        $this->load->view('template_tender/footer');
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/ajax', $data);
    }

    public function get_vendor_negosiasi()
    {
        $id_rup = $this->input->post('id_rup');
        $result_vendor_negosiasi = $this->M_panitia->get_result_vendor_sanggahan($id_rup);
        $output = [
            'result_vendor_negosiasi' => $result_vendor_negosiasi,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_link_negosiasi()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $upload = [
            'tanggal_negosiasi' =>  $this->input->post('tanggal_negosiasi'),
            'link_negosiasi' =>  $this->input->post('link_negosiasi')
        ];

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
        ];
        $this->M_panitia->update_mengikuti($upload, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // public function update_status_aanwijzing_vendor()
    // {
    //     $id_vendor = $this->input->post('id_vendor');
    //     $id_rup = $this->input->post('id_rup');

    //     $where = [
    //         'id_vendor' => $id_vendor,
    //         'id_rup' => $id_rup
    //     ];

    //     $data = [
    //         'sts_aanwijzing_pq' => 1
    //     ];
    //     $this->M_panitia->update_mengikuti($data, $where);
    // }
}
