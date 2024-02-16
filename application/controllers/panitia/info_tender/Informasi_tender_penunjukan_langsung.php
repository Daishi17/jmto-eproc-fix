<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
class Informasi_tender_penunjukan_langsung extends CI_Controller
{
    // var $link_vendor = 'http://localhost/jmto-vms/file_paket/';
    var $link_vendor = 'https://drtproc.jmto.co.id/file_paket/';
    var $dok_vendor  = 'https://drtproc.jmto.co.id/file_vms/';
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
        $data['role_panitia'] = $this->M_panitia->get_panitia_role($data['row_rup']['id_rup']);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['dok_lelang'] = $this->M_panitia->get_dokumen_pengadaan($data['row_rup']['id_rup']);
        $data['dok_ip'] = $this->M_panitia->get_dokumen_izin_prinsip($data['row_rup']['id_rup']);
        $data['dok_prakualifikasi'] = $this->M_panitia->get_dokumen_prakualifikasi($data['row_rup']['id_rup']);
        $data['dok_tambahan'] = $this->M_panitia->result_syarat_tambahan($data['row_rup']['id_rup']);
        $data['hitung_peserta'] = $this->M_panitia->get_peserta_tender_count($data['row_rup']['id_rup']);
        $data['hak_mengumumkan'] = $this->M_panitia->get_yang_dapat_mengumumkan($data['row_rup']['id_rup']);

        if ($data['row_rup']['bobot_nilai'] == 1) {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang_pra_1_file_biaya($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        } else if (($data['row_rup']['bobot_nilai'] == 2)) {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang_pra_1_file_biaya($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1_biaya($data['row_rup']['id_rup']);
        } else {
            $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang_pra_1_file_biaya($data['row_rup']['id_rup']);
            $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        }

        // get tahap
        $data['jadwal_aanwijzing_pq'] =  $this->M_jadwal->jadwal_pra1file_umum_3($data['row_rup']['id_rup']);
        $data['jadwal_upload_dokumen_prakualifikasi'] =  $this->M_jadwal->jadwal_juksung_4($data['row_rup']['id_rup']);
        $data['jadwal_pembuktian_kualifikasi'] =  $this->M_jadwal->jadwal_juksung_5($data['row_rup']['id_rup']);
        $data['jadwal_evaluasi_dokumen_kualifikasi'] =  $this->M_jadwal->jadwal_juksung_4($data['row_rup']['id_rup']);
        // $data['jadwal_penetapan_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_7($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_juksung_8($data['row_rup']['id_rup']);
        // $data['jadwal_masa_sanggah_kualifikasi'] =  $this->M_jadwal->jadwal_pra1file_umum_9($data['row_rup']['id_rup']);
        $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_10($data['row_rup']['id_rup']);
        // $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['row_rup']['id_rup']);
        // $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra1file_umum_12($data['row_rup']['id_rup']);
        $data['jadwal_pembukaan_file1'] =  $this->M_jadwal->jadwal_juksung_11($data['row_rup']['id_rup']);
        // $data['jadwal_presentasi_evaluasi'] =  $this->M_jadwal->jadwal_pra1file_umum_14($data['row_rup']['id_rup']);
        // $data['jadwal_pengumuman_peringkat'] =  $this->M_jadwal->jadwal_pra1file_umum_15($data['row_rup']['id_rup']);
        // $data['jadwal_pembukaan_file2'] =  $this->M_jadwal->jadwal_pra1file_umum_16($data['row_rup']['id_rup']);
        // $data['jadwal_upload_ba'] =  $this->M_jadwal->jadwal_pra1file_umum_17($data['row_rup']['id_rup']);
        $data['jadwal_penetapan_pemenang'] =  $this->M_jadwal->jadwal_juksung_16($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_pemenang'] =  $this->M_jadwal->jadwal_juksung_16($data['row_rup']['id_rup']);
        // $data['jadwal_masa_sanggah_akhir'] =  $this->M_jadwal->jadwal_pra1file_umum_20($data['row_rup']['id_rup']);
        // end get tahap

        $data['deal_nego'] = $this->M_panitia->get_peserta_rank1_biaya_dengan_negosiasi($data['row_rup']['id_rup']);
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
                if ($rs->sts_suratpernyataan_1 == 1 && $rs->sts_suratpernyataan_2 == 1 && $rs->sts_suratpernyataan_3 == 1 && $rs->sts_suratpernyataan_4 == 1) {
                    $row[] = '<span class="badge bg-success">Lulus</span>';
                } else {
                    $row[] = '<span class="badge bg-danger">Gugur</span>';
                }
            } else {
                $row[] = '<span class="badge bg-danger">Gugur</span>';
            }

            // nilai keuangan
            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->sts_suratpernyataan_1 == 1 && $rs->sts_suratpernyataan_2 == 1 && $rs->sts_suratpernyataan_3 == 1 && $rs->sts_suratpernyataan_4 == 1) {
                    if ($rs->ev_keuangan == NULL) {
                        $row[] = '00.00';
                        $row[] = '<span class="badge bg-secondary bg-sm">Belum Diperiksa</span>';
                    } else {
                        if ($rs->ev_keuangan >= 60) {
                            $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                            $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                        } else {
                            $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                            $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                        }
                    }
                } else {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-danger">Gugur</span>';
                }
            } else {
                if ($rs->ev_keuangan == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                } else {
                    if ($rs->ev_keuangan >= 60) {
                        $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_keuangan, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                    }
                }
            }

            // nilai teknis
            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->sts_suratpernyataan_1 == 1 && $rs->sts_suratpernyataan_2 == 1 && $rs->sts_suratpernyataan_3 == 1 && $rs->sts_suratpernyataan_4 == 1) {
                    if ($rs->ev_teknis == NULL) {
                        $row[] = '00.00';
                        if ($rs->ev_keuangan >= 60) {
                            $row[] = '<span class="badge bg-secondary bg-sm">Belum Diperiksa</span>';
                        } else {
                            if ($rs->ev_keuangan == NULL) {
                                $row[] = '<span class="badge bg-secondary bg-sm">Belum Diperiksa</span>';
                            } else {
                                $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                            }
                        }
                    } else {
                        if ($rs->ev_teknis >= 60) {
                            $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                            $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                        } else {
                            $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                            $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                        }
                    }
                } else {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-danger">Gugur</span>';
                }
            } else {
                if ($rs->ev_teknis == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                } else {
                    if ($rs->ev_teknis >= 60) {
                        $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = number_format($rs->ev_teknis, 2, ',', '.');
                        $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                    }
                }
            }


            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->sts_suratpernyataan_1 == 1 && $rs->sts_suratpernyataan_2 == 1 && $rs->sts_suratpernyataan_3 == 1 && $rs->sts_suratpernyataan_4 == 1) {
                    if ($rs->ev_kualifikasi_akhir == NULL) {
                        $row[] = '00.00';
                        $row[] = '<span class="badge bg-secondary bg-sm">Belum Diperiksa</span>';
                    } else {
                        if ($rs->ev_teknis >= 60 && $rs->ev_keuangan >= 60) {
                            $row[] = number_format($rs->ev_kualifikasi_akhir, 2, ',', '.');
                            $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                        } else {
                            $row[] = '<span class="badge bg-danger bg-sm">-</span>';
                            $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                        }
                    }
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">-</span>';
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                }
            } else {
                if ($rs->ev_kualifikasi_akhir == NULL) {
                    $row[] = '00.00';
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                } else {
                    if ($rs->ev_teknis >= 60 && $rs->ev_keuangan >= 60) {
                        $row[] = number_format($rs->ev_kualifikasi_akhir, 2, ',', '.');
                        $row[] = '<span class="badge bg-success bg-sm">Lulus</span>';
                    } else {
                        $row[] = '<span class="badge bg-danger bg-sm">-</span>';
                        $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                    }
                }
            }


            if ($cek_valid_vendor >= $hitung_syarat) {
                if ($rs->sts_suratpernyataan_1 == 1 && $rs->sts_suratpernyataan_2 == 1 && $rs->sts_suratpernyataan_3 == 1 && $rs->sts_suratpernyataan_4 == 1) {
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
                }
            } else {
                $row[] = '<div class="text-center">
                            <button disabled class="btn btn-secondary btn-sm shadow-lg text-white">
                                <i class="fa-solid fa-edit"></i>
                                <small>Evaluasi</small>
                            </button>
                        </div>';
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
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
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
        $result = $this->M_panitia->gettable_evaluasi_akhir_hea_file1($id_rup);
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
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
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
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_akhir_hea_file1($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_akhir_hea_file1($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_evaluasi_akhir_harga_terendah($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_akhir_hea_file1($id_rup);
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
                $row[] = '<span class="badge bg-danger">Gugur</span>';
            }
            if ($rs->ev_terendah_harga) {
                $row[] =  number_format($rs->ev_terendah_harga, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_hps) {
                $row[] =  number_format($rs->ev_terendah_hps, 2, ',', '.') . ' %';
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_bobot) {
                $row[] =  number_format($rs->ev_terendah_bobot, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }


            $row[] = '<div class="text-center">' . $rs->ev_terendah_peringkat . '</div>';

            if ($rs->ev_terendah_hps) {
                if ($rs->ev_terendah_hps <= $rup['bobot_biaya']) {
                    $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
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
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_akhir_hea_file1($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_akhir_hea_file1($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    // BATAS EVALUASI BARU

    public function get_evaluasi_hea_tkdn_harga_terendah($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_akhir_hea_file1($id_rup);
        $rup = $this->M_panitia->get_rup($id_rup);
        $hitung_syarat = $this->M_panitia->hitung_total_syarat($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $cek_valid_vendor = $this->M_panitia->cek_valid_vendor($id_rup, $rs->id_vendor);
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->ev_terendah_harga) {
                $row[] =  number_format($rs->ev_terendah_harga, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_hea_tkdn_terendah) {
                $row[] =  number_format($rs->ev_hea_tkdn_terendah, 2, ',', '.') . ' %';
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_hea_harga_hea_terendah) {
                $row[] =  number_format($rs->ev_hea_harga_hea_terendah, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_hea_tkdn_terendah >= $rup['persen_pencatatan']) {
                $row[] = '<div class="text-center">' . $rs->ev_hea_tkdn_terendah_peringkat . '</div>';
            } else {
                $row[] = '<span class="badge bg-danger bg-sm">-</span>';
            }

            if ($rs->ev_terendah_hps) {
                if ($rs->ev_terendah_hps <= $rup['bobot_biaya']) {
                    if ($rs->ev_hea_tkdn_terendah >= $rup['persen_pencatatan']) {
                        $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                    } else {
                        $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                    }
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                }
            } else {
                $row[] = '<span class="badge bg-secondary bg-sm">Belum Di Evaluasi</span>';
            }
            $row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','hea_tkdn_harga_terendah'" . ')">
							<i class="fa-solid fa-edit"></i>
							<small>Evaluasi</small>
						</a>
					  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_akhir_hea_file1($id_rup),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_akhir_hea_file1($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function simpan_evaluasi_akhir_tkdn_terendah()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $id_rup_post = $this->input->post('id_rup_post');
        $row_vendor =  $this->M_panitia->get_row_vendor_negosiasi($id_vendor_mengikuti_paket);
        $ev_terendah_harga = $row_vendor['ev_terendah_harga'];
        $ev_hea_tkdn_terendah = $this->input->post('ev_hea_tkdn_terendah');
        if ($ev_hea_tkdn_terendah >= 25) {
            // $prefensi = 25 / 100;
            $total_harga = (1 - ($ev_hea_tkdn_terendah / 100 * 0.25)) * $ev_terendah_harga;
        } else {
            $prefensi = 0;
            $total_harga = (1 - ($ev_hea_tkdn_terendah * $prefensi)) * $ev_terendah_harga;
        }
        $data = [
            'ev_hea_tkdn_terendah' => $ev_hea_tkdn_terendah,
            'ev_hea_harga_hea_terendah' => $total_harga,
        ];
        $where = [
            'id_vendor_mengikuti_paket'    => $id_vendor_mengikuti_paket
        ];
        $this->M_panitia->update_evaluasi($data, $where);

        $peserta = $this->M_panitia->get_peserta_tender_hea_tkdn_terendah($id_rup_post);
        $i = 0;
        foreach ($peserta as $key => $value) {
            $data2 = [
                'ev_hea_tkdn_terendah_peringkat' => $i++
            ];
            $where2 = [
                'id_vendor_mengikuti_paket'    => $value['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data2, $where2);
        }

        $a = 1;
        $peserta2 = $this->M_panitia->get_peserta_tender_hea_tkdn_terendah($id_rup_post);
        foreach ($peserta2 as $key => $value) {
            $data3 = [
                'ev_hea_tkdn_terendah_peringkat' =>  $a++
            ];
            $where3 = [
                'id_vendor_mengikuti_paket'  => $value['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data3, $where3);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_evaluasi_pringkat_akhir_harga_terendah_hea($id_rup)
    {
        $rup = $this->M_panitia->get_rup($id_rup);
        $result = $this->M_panitia->gettable_evaluasi_akhir_hea_file1_akhir($id_rup, $rup['persen_pencatatan']);
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
                $row[] = '<span class="badge bg-danger">Gugur</span>';
            }
            if ($rs->ev_hea_harga_hea_terendah) {
                $row[] =  number_format($rs->ev_hea_harga_hea_terendah, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_hps_pringkat_akhir_hea) {
                $row[] =  number_format($rs->ev_terendah_hps_pringkat_akhir_hea, 2, ',', '.') . ' %';
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_bobot_pringkat_akhir_hea) {
                $row[] =  number_format($rs->ev_terendah_bobot_pringkat_akhir_hea, 2, ',', '.');
            } else {
                $row[] =  '0,00';
            }

            if ($rs->ev_terendah_nilai_akhir_pringkat_akhir_hea) {
                $row[] =  number_format($rs->ev_terendah_nilai_akhir_pringkat_akhir_hea, 2, ',', '.') . ' %';
            } else {
                $row[] =  '0,00';
            }


            $row[] =  '<div class="text-center">' . $rs->ev_terendah_peringkat_akhir_hea . '</div>';

            if ($rs->ev_terendah_hps_pringkat_akhir_hea) {
                if ($rs->ev_terendah_hps_pringkat_akhir_hea <= $rup['bobot_biaya']) {
                    $row[] = '<span class="badge bg-success bg-sm">Sah</span>';
                } else {
                    $row[] = '<span class="badge bg-danger bg-sm">Gugur</span>';
                }
            } else {
                $row[] = '<span class="badge bg-secondary bg-sm">Belum Di Evaluasi</span>';
            }


            $row[] = '<div class="text-center">
						<a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','harga_terendah_peringkat_hea'" . ')">
							<i class="fa-solid fa-edit"></i>
							<small>Evaluasi</small>
						</a>
					  </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_evaluasi_akhir_hea_file1_akhir($id_rup, $rup['persen_pencatatan']),
            "recordsFiltered" => $this->M_panitia->count_filtered_evaluasi_akhir_hea_file1_akhir($id_rup, $rup['persen_pencatatan']),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_evaluasi_harga_terendah_hea()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $id_rup_post = $this->input->post('id_rup_post');
        $total_hps_rup = $this->input->post('total_hps_rup');
        $row_vendor =  $this->M_panitia->get_row_vendor_negosiasi($id_vendor_mengikuti_paket);
        $ev_terendah_harga = $row_vendor['ev_hea_harga_hea_terendah'];
        $get_min_penawaran = $this->M_panitia->get_min_penawaran_terendah_hea_peringkat_akhir($id_rup_post);
        $get_nilai_min = $get_min_penawaran['min_nilai_terendah'];
        $bobot = $get_nilai_min / $ev_terendah_harga * 100;
        $data = [
            'ev_terendah_hps_pringkat_akhir_hea' => $ev_terendah_harga / $total_hps_rup * 100,
            'ev_terendah_bobot_pringkat_akhir_hea' => $bobot,
            'ev_terendah_nilai_akhir_pringkat_akhir_hea' => $bobot / 100 * 100
        ];
        $where = [
            'id_vendor_mengikuti_paket'  => $id_vendor_mengikuti_paket
        ];
        $this->M_panitia->update_evaluasi($data, $where);

        $peserta_terendah = $this->M_panitia->get_min_penawaran_terendah_hea_peringkat_akhir($id_rup_post);
        $get_nilai_min_terendah1 = $peserta_terendah['min_nilai_terendah'];

        $get_min_penawaran_terndah = $this->M_panitia->get_min_penawaran_terendah_hea_peringkat_akhir2($id_rup_post);

        foreach ($get_min_penawaran_terndah as $key => $value_terendah) {
            $data_terendah = [
                'ev_terendah_hps_pringkat_akhir_hea' => $value_terendah['ev_hea_harga_hea_terendah'] / $total_hps_rup * 100,
                'ev_terendah_bobot_pringkat_akhir_hea' => $get_nilai_min_terendah1 / $value_terendah['ev_hea_harga_hea_terendah'] * 100
            ];
            $where_terendah = [
                'id_vendor_mengikuti_paket' => $value_terendah['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data_terendah, $where_terendah);
        }

        $peserta2 = $this->M_panitia->get_min_penawaran_terendah_peringkat_akhir_hea($id_rup_post);
        $i = 1;
        foreach ($peserta2 as $key => $value3) {
            $data3 = [
                'ev_terendah_peringkat_akhir_hea' => $i++,
            ];
            $where3 = [
                'id_vendor_mengikuti_paket' => $value3['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data3, $where3);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }




    public function get_byid_mengikuti($id_vendor_mengikuti_paket)
    {
        $row_vendor_mengikuti = $this->M_panitia->row_vendor_mengikuti($id_vendor_mengikuti_paket);
        // link cross
        $rup = $this->M_panitia->get_rup($row_vendor_mengikuti['id_rup']);
        $link_vendor = 'https://drtproc.jmto.co.id/';
        $link_vendor2 = 'https://drtproc.jmto.co.id/';
        $data = [
            'row_vendor_mengikuti' => $row_vendor_mengikuti,
            'link_vendor' => $link_vendor,
            'rup' => $rup
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

        $peserta_terendah = $this->M_panitia->get_min_penawaran_terendah($id_rup_post);
        $get_nilai_min_terendah1 = $peserta_terendah['min_nilai_terendah'];

        $get_min_penawaran_terndah = $this->M_panitia->get_min_penawaran_terendah2($id_rup_post);

        foreach ($get_min_penawaran_terndah as $key => $value_terendah) {
            $data_terendah = [
                'ev_terendah_hps' => $value_terendah['ev_terendah_harga'] / $total_hps_rup * 100,
                'ev_terendah_bobot' => $get_nilai_min_terendah1 / $value_terendah['ev_terendah_harga'] * 100
            ];
            $where_terendah = [
                'id_vendor_mengikuti_paket' => $value_terendah['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data_terendah, $where_terendah);
        }

        $peserta2 = $this->M_panitia->get_min_penawaran_terendah_peringkat($id_rup_post);
        $i = 1;
        foreach ($peserta2 as $key => $value3) {
            $data3 = [
                'ev_terendah_peringkat' => $i++,
            ];
            $where3 = [
                'id_vendor_mengikuti_paket' => $value3['id_vendor_mengikuti_paket']
            ];
            $this->M_panitia->update_evaluasi($data3, $where3);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end evaluasi

    // persyaratan tambahan
    public function get_syarat_tambahan($id_rup)
    {
        $result = $this->M_panitia->gettable_syarat_tambahan($id_rup);
        // urgensi hitung pake syarat buat cek valid atau Gugur
        $hitung_syarat = $this->M_panitia->hitung_total_syarat($id_rup);
        $jadwal_evaluasi_dokumen_kualifikasi =  $this->M_jadwal->jadwal_juksung_6($id_rup);

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
                if ($rs->sts_suratpernyataan_1 == 1 && $rs->sts_suratpernyataan_2 == 1 && $rs->sts_suratpernyataan_3 == 1 && $rs->sts_suratpernyataan_4 == 1) {
                    $row[] = '<span class="badge bg-success">Lulus</span>';
                } else {
                    $row[] = '<span class="badge bg-danger">Gugur</span>';
                }
            } else {
                if ($cek_null_syarat) {
                    if ($cek_tidak_valid) {
                        $row[] = '<span class="badge bg-danger">Gugur</span>';
                    } else {
                        $row[] = '<span class="badge bg-secondary">Belum Diperiksa</span>';
                    }
                } else {
                    if ($cek_tidak_valid) {
                        $row[] = '<span class="badge bg-danger">Gugur</span>';
                    } else {
                        if ($cek_valid_vendor >= $hitung_syarat) {
                            $row[] = '<span class="badge bg-danger">Gugur</span>';
                        } else {
                            $row[] = '<span class="badge bg-warning">Belum Lengkap</span>';
                        }
                    }
                }
            }


            if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai']))  >= date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','syarat_tambahan'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','neraca_keuangan'" . ')">
                <i class="fa-solid fa-edit"></i>
                <small>Neraca Keuangan</small>
                </a>
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','laporan_keuangan'" . ')">
                <i class="fa-solid fa-edit"></i>
                <small>Laporan Keuangan</small>
                </a>
              </div>';
            } else if (date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_selesai'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal_evaluasi_dokumen_kualifikasi['waktu_mulai'])) == date('Y-m-d H:i')) {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','syarat_tambahan'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','neraca_keuangan'" . ')">
                <i class="fa-solid fa-edit"></i>
                <small>Neraca Keuangan</small>
                </a>
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','laporan_keuangan'" . ')">
                <i class="fa-solid fa-edit"></i>
                <small>Laporan Keuangan</small>
                </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','syarat_tambahan'" . ')">
                    <i class="fa-solid fa-edit"></i>
                    <small>Evaluasi</small>
                </a>
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','neraca_keuangan'" . ')">
                <i class="fa-solid fa-edit"></i>
                <small>Neraca Keuangan</small>
                </a>
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','laporan_keuangan'" . ')">
                <i class="fa-solid fa-edit"></i>
                <small>Laporan Keuangan</small>
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
        $jadwal_evaluasi_dokumen_kualifikasi =  $this->M_jadwal->jadwal_juksung_6($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_syarat_tambahan;
            $row[] = '<a target="_blank" href="https://drtproc.jmto.co.id/file_paket/' .  $nama_rup['nama_rup'] .  '/' . $rs->nama_usaha . '/SYARAT_TAMBAHAN' . '/' . $rs->file_syarat_tambahan . '" class="btn btn-sm btn-warning text-white"><i class="fa fa-file"></i></a>';
            if ($rs->status == NULL) {
                $row[] = '<span class="badge bg-secondary">Belum Di Evaluasi</span>';
            } else if ($rs->status == 1) {
                $row[] = '<span class="badge bg-success">Lulus</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Gugur</span>';
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

        // if ($data['row_rup']['bobot_nilai'] == 1) {
        //     $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang($data['row_rup']['id_rup']);
        //     $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        // } else if (($data['row_rup']['bobot_nilai'] == 2)) {
        //     $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang_biaya($data['row_rup']['id_rup']);
        //     $data['get_rank1'] = $this->M_panitia->get_peserta_rank1_biaya($data['row_rup']['id_rup']);
        // } else {
        //     $data['get_pemenang'] = $this->M_panitia->get_peserta_pemenang($data['row_rup']['id_rup']);
        //     $data['get_rank1'] = $this->M_panitia->get_peserta_rank1($data['row_rup']['id_rup']);
        // }



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

    // function kirim_pengumuman_pemenang()
    // {
    //     $id_url_rup = $this->input->post('id_url_rup');
    //     $row_rup = $this->M_rup->get_row_rup($id_url_rup);

    //     if ($row_rup['bobot_nilai'] == 1) {
    //         $get_rank1 = $this->M_panitia->get_peserta_rank1_pra_1_file_biaya($row_rup['id_rup']);
    //         $message = 'Selamat ' . $get_rank1['nama_usaha'] . ' Dinyatakan sebagai calon Pemenang untuk ' . $row_rup['nama_metode_pengadaan'] . ' ' . $row_rup['nama_rup'] . ', dan masa sanggah pemenang selama 2 (dua) hari kerja sejak pengumuman ini';
    //     } else {
    //         $get_rank1 = $this->M_panitia->get_peserta_rank1_pra_1_file_biaya($row_rup['id_rup']);
    //         $message = 'Selamat ' . $get_rank1['nama_usaha'] . ' Dinyatakan sebagai calon Pemenang untuk ' . $row_rup['nama_metode_pengadaan'] . ' ' . $row_rup['nama_rup'] . ', dan masa sanggah pemenang selama 2 (dua) hari kerja sejak pengumuman ini';
    //     }
    //     $this->kirim_wa->kirim_wa_vendor_terdaftar($get_rank1['no_telpon'], $message);
    //     // $type_email = 'PENGUMUMAN PEMENANG';
    //     // $this->email_send->sen_row_email($type_email, $get_rank1['id_vendor'], $message);
    //     $upload = [
    //         'id_vendor_pemenang' => $get_rank1['id_vendor'],
    //         'sts_pengumuman_rup_trakhir' => 1
    //     ];
    //     $this->M_panitia->update_rup_panitia($row_rup['id_rup'], $upload);
    //     $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    // }

    function kirim_pengumuman_pemenang()
    {
        $id_url_rup = $this->input->post('id_url_rup');
        $row_rup = $this->M_rup->get_row_rup($id_url_rup);
        $peserta_vendor = $this->M_panitia->jumlah_peserta_negosiasi_negosiasi_teknis_pra_1($row_rup['id_rup']);
        if ($peserta_vendor > 2) {
            $get_rank1 = $this->M_panitia->get_peserta_rank1_pra_1_file_biaya($row_rup['id_rup']);
            $message = 'Pengumuman Hasil ' . $row_rup['nama_metode_pengadaan'] . ' Pemenang untuk ' . $row_rup['nama_rup'] . ' adalah  ' . $get_rank1['nama_usaha'] . '  dengan Nilai penawaran sebesar Rp.' . number_format($get_rank1['ev_hea_penawaran'], 2, ',', '.') . 'Terimakasih atas keikutsertaan Anda Ttd Panitia.';
        } else {
            $get_rank1 = $this->M_panitia->get_peserta_rank1_dengan_negosiasi($row_rup['id_rup']);
            $message = 'Pengumuman Hasil ' . $row_rup['nama_metode_pengadaan'] . ' Pemenang untuk ' . $row_rup['nama_rup'] . ' adalah  ' . $get_rank1['nama_usaha'] . '  dengan Nilai penawaran sebesar Rp.' . number_format($get_rank1['total_hasil_negosiasi'], 2, ',', '.') . 'Terimakasih atas keikutsertaan Anda Ttd Panitia.';
        }
        $this->kirim_wa->kirim_wa_pengumuman($row_rup['id_rup'], $message);
        // $type_email = 'PENGUMUMAN PEMENANG';
        // $this->email_send->sen_row_email($type_email, $get_rank1['id_vendor'], $message);
        $upload = [
            'id_vendor_pemenang' => $get_rank1['id_vendor'],
            'sts_pengumuman_rup_trakhir' => 1
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
        $data['jadwal_aanwizing'] = $this->M_jadwal->jadwal_pra1file_umum_2($data['row_rup']['id_rup']);
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
        $data['jadwal_aanwizing'] = $this->M_jadwal->jadwal_pra1file_umum_12($data['row_rup']['id_rup']);
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
        $result_sanggahan_pra = $this->M_panitia->get_result_vendor_sanggahan_pra($id_rup);
        $output = [
            'result_sanggahan_pra' => $result_sanggahan_pra,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



    public function upload_sanggahan_pra()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $id_sanggah_pra_detail = $this->input->post('id_vendor_mengikuti_paket');
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
                'id_sanggah_pra_detail' => $id_sanggah_pra_detail,
            ];
            $this->M_panitia->update_mengikuti_sanggah_pra($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $upload = [
                'ket_sanggah_pra_panitia' => $ket_sanggah_pra_panitia
            ];
            $where = [
                'id_sanggah_pra_detail' => $id_sanggah_pra_detail,
            ];
            $this->M_panitia->update_mengikuti_sanggah_pra($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
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
        $result_sanggahan_akhir = $this->M_panitia->get_result_vendor_sanggahan_akhir($id_rup);
        $output = [
            'result_sanggahan_akhir' => $result_sanggahan_akhir,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function upload_sanggahan_akhir()
    {
        // post
        $id_rup = $this->input->post('id_rup');
        $id_sanggah_akhir_detail = $this->input->post('id_vendor_mengikuti_paket');
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
                'id_sanggah_akhir_detail' => $id_sanggah_akhir_detail,
            ];
            $this->M_panitia->update_mengikuti_sanggah_akhir($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $upload = [
                'ket_sanggah_akhir_panitia' => $ket_sanggah_akhir_panitia,
                'file_sanggah_akhir_panitia' => NULL,
            ];
            $where = [
                'id_sanggah_akhir_detail' => $id_sanggah_akhir_detail,
            ];
            $this->M_panitia->update_mengikuti_sanggah_akhir($upload, $where);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }

    public function hapus_sanggahan_akhir()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        // get value vendor dan paket untuk genrate file
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
        $row_rup =  $this->M_panitia->get_rup($id_rup);
        if ($row_rup['bobot_nilai'] == 1) {
            $result_vendor_negosiasi = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file($id_rup);
        } else {
            $result_vendor_negosiasi = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file($id_rup);
        }
        $output = [
            'result_vendor_negosiasi' => $result_vendor_negosiasi,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_row_vendor_negosiasi()
    {
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $row_vendor = $this->M_panitia->get_row_vendor_negosiasi($id_vendor_mengikuti_paket);
        $output = [
            'row_vendor' => $row_vendor,
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

    public function kirim_notif_perubahan_dokumen()
    {
        // post
        $id_dokumen_pengadaan = $this->input->post('id_dokumen_pengadaan');
        $id_dokumen_prakualifikasi = $this->input->post('id_dokumen_prakualifikasi');
        $id_rup = $this->input->post('id_rup');
        $type_notif_dokumen = $this->input->post('type_notif_dokumen');
        if ($type_notif_dokumen == 'dok_pra') {
            $upload = [
                'keterangan_dokumen' =>  $this->input->post('keterangan_dokumen_pra'),
            ];
            $where = [
                'id_dokumen_prakualifikasi' => $id_dokumen_prakualifikasi,
            ];
            $this->M_panitia->update_dokumen_prakualifikasi($upload, $where);
            $row_dokumen = $this->M_panitia->get_row_dokumen_prakualifikasi($id_dokumen_prakualifikasi);
            $nama_dokumen = $row_dokumen['nama_dok_prakualifikasi'];
            $this->email_send->sen_notifikasi_dokumen($id_rup, $nama_dokumen, $this->input->post('keterangan_dokumen_pra'));
        } else {
            $upload = [
                'keterangan_dokumen' =>  $this->input->post('keterangan_dokumen'),
            ];
            $where = [
                'id_dokumen_pengadaan' => $id_dokumen_pengadaan,
            ];
            $this->M_panitia->update_dokumen_pengadaan($upload, $where);
            $row_dokumen = $this->M_panitia->get_row_dokumen_pengadaan($id_dokumen_pengadaan);
            $nama_dokumen = $row_dokumen['nama_dok_pengadaan'];
            $this->email_send->sen_notifikasi_dokumen($id_rup, $nama_dokumen, $this->input->post('keterangan_dokumen'));
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function buat_hasil_negosiasi()
    {
        // post
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        $type_deal = $this->input->post('type_deal');
        $id_rup = $this->input->post('id_rup');
        $row_rup =  $this->M_panitia->get_rup($id_rup);
        if ($type_deal == 'deal') {
            $upload = [
                'total_hasil_negosiasi' =>  $this->input->post('total_hasil_negosiasi'),
                'keterangan_negosiasi' =>  $this->input->post('keterangan_negosiasi'),
                'sts_deal_negosiasi' => $type_deal,
            ];
            $where = [
                'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket,
            ];
            $this->M_panitia->update_mengikuti($upload, $where);
        } else {
            if ($row_rup['bobot_nilai'] == 1) {
                $pemenang_1 = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file_1_teknis($id_rup);
                $pemenang_2 = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file_2_teknis($id_rup);
                $pemenang_3 = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file_3_teknis($id_rup);
            } else {
                $pemenang_1 = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file_1($id_rup);
                $pemenang_2 = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file_2($id_rup);
                $pemenang_3 = $this->M_panitia->get_result_vendor_negosiasi_pra_1_file_3($id_rup);
            }
            $peserta_negosiasi = $this->M_panitia->jumlah_peserta_negosiasi($id_rup);
            if ($peserta_negosiasi == 2) {
                $where_pemenang_1 = [
                    'id_vendor_mengikuti_paket' => $pemenang_1['id_vendor_mengikuti_paket'],
                ];
                if ($row_rup['bobot_nilai'] == 1) {
                    $update_pemenang_1 = [
                        'total_hasil_negosiasi' =>  $this->input->post('total_hasil_negosiasi'),
                        'keterangan_negosiasi' =>  $this->input->post('keterangan_negosiasi'),
                        'ev_terendah_peringkat_akhir_hea' => 2,
                        'sts_deal_negosiasi' => $type_deal,
                    ];
                } else {
                    $update_pemenang_1 = [
                        'total_hasil_negosiasi' =>  $this->input->post('total_hasil_negosiasi'),
                        'keterangan_negosiasi' =>  $this->input->post('keterangan_negosiasi'),
                        'ev_terendah_peringkat_akhir_hea' => 2,
                        'sts_deal_negosiasi' => $type_deal,
                    ];
                }
                $this->M_panitia->update_mengikuti($update_pemenang_1, $where_pemenang_1);
                $where_pemenang_2 = [
                    'id_vendor_mengikuti_paket' => $pemenang_2['id_vendor_mengikuti_paket'],
                ];
                if ($row_rup['bobot_nilai'] == 1) {
                    $update_pemenang_2 = [
                        'ev_terendah_peringkat_akhir_hea' => 1
                    ];
                } else {
                    $update_pemenang_2 = [
                        'ev_terendah_peringkat_akhir_hea' => 1
                    ];
                }
                $this->M_panitia->update_mengikuti($update_pemenang_2, $where_pemenang_2);
            } else {
                $where_pemenang_1 = [
                    'id_vendor_mengikuti_paket' => $pemenang_1['id_vendor_mengikuti_paket'],
                ];
                if ($row_rup['bobot_nilai'] == 1) {
                    $update_pemenang_1 = [
                        'total_hasil_negosiasi' =>  $this->input->post('total_hasil_negosiasi'),
                        'keterangan_negosiasi' =>  $this->input->post('keterangan_negosiasi'),
                        'ev_terendah_peringkat_akhir_hea' => 3,
                        'sts_deal_negosiasi' => $type_deal,
                    ];
                } else {
                    $update_pemenang_1 = [
                        'total_hasil_negosiasi' =>  $this->input->post('total_hasil_negosiasi'),
                        'keterangan_negosiasi' =>  $this->input->post('keterangan_negosiasi'),
                        'ev_terendah_peringkat_akhir_hea' => 3,
                        'sts_deal_negosiasi' => $type_deal,
                    ];
                }
                $this->M_panitia->update_mengikuti($update_pemenang_1, $where_pemenang_1);
                $where_pemenang_2 = [
                    'id_vendor_mengikuti_paket' => $pemenang_2['id_vendor_mengikuti_paket'],
                ];
                if ($row_rup['bobot_nilai'] == 1) {
                    $update_pemenang_2 = [
                        'ev_terendah_peringkat_akhir_hea' => 1
                    ];
                } else {
                    $update_pemenang_2 = [
                        'ev_terendah_peringkat_akhir_hea' => 1
                    ];
                }
                $this->M_panitia->update_mengikuti($update_pemenang_2, $where_pemenang_2);

                $where_pemenang_3 = [
                    'id_vendor_mengikuti_paket' => $pemenang_3['id_vendor_mengikuti_paket'],
                ];
                if ($row_rup['bobot_nilai'] == 1) {
                    $update_pemenang_3 = [
                        'ev_terendah_peringkat_akhir_hea' => 1
                    ];
                } else {
                    $update_pemenang_3 = [
                        'ev_terendah_peringkat_akhir_hea' => 1
                    ];
                }
                $this->M_panitia->update_mengikuti($update_pemenang_3, $where_pemenang_3);
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    // save undangan pembuktian
    public function save_undangan_pembuktian()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');

        if ($post_type == 'no_undangan') {
            $data = [
                'no_undangan' => $value
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $data);
        } else if ($post_type == 'tgl_surat') {
            $data2 = [
                'tgl_surat_undangan' => $value
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $data2);
        } else if ($post_type == 'hari') {
            $data3 = [
                'hari_undangan' => $value
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $data3);
        } else if ($post_type == 'tanggal') {
            $data4 = [
                'tanggal_undangan' => $value
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $data4);
        } else if ($post_type == 'waktu') {
            $data5 = [
                'waktu_undangan' => $value
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $data5);
        } else if ($post_type == 'jml_halaman') {
            $data6 = [
                'jml_halaman_undangan' => $value
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $data6);
        }
    }

    public function save_undangan_pembuktian_vendor_waktu()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
        ];
        $data2 = [
            'wkt_undang_pembuktian' => $value
        ];
        $this->M_panitia->update_mengikuti($data2, $where);
    }

    public function save_undangan_pembuktian_vendor_metode()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
        ];
        $data = [
            'metode_pembuktian' => $value
        ];
        $this->M_panitia->update_mengikuti($data, $where);
    }

    function save_pengumuman_hasil_kualifikasi()
    {
        $id_rup = $this->input->post('id_rup');
        $post_type = $this->input->post('post_type');
        $value = $this->input->post('value');
        $upload = [
            '' . $post_type . '' => $value,
        ];
        $this->M_panitia->update_rup_panitia($id_rup, $upload);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function save_ba_pembuktian_hadir()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
        ];
        $data = [
            'ba_pembuktian_hadir' => $value
        ];
        $this->M_panitia->update_mengikuti($data, $where);
    }


    public function save_ba_pembuktian_dok()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
        ];
        $data = [
            'ba_pembuktian_dok' => $value
        ];
        $this->M_panitia->update_mengikuti($data, $where);
    }

    public function save_ba_pembuktian_ket()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
        ];
        $data = [
            'ba_pembuktian_ket' => $value
        ];
        $this->M_panitia->update_mengikuti($data, $where);
    }

    public function save_waktu_undangan()
    {
        $value = $this->input->post('value');
        $post_type = $this->input->post('post_type');
        $id_rup = $this->input->post('id_rup');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $where = [
            'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
        ];
        $data = [
            'waktu_undangan_rapat' => $value
        ];
        $this->M_panitia->update_mengikuti($data, $where);
    }

    public function get_vendor_mengikuti_ba1($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->ba_check_ev1 == 1) {
                $row[] = '<div class="text-center badge bg-success">Mengikuti</div>';
            } else {
                $row[] = '<div class="text-center badge bg-danger">Tidak Mengikuti</div>';
            }

            if ($rs->ba_check_ev1 == 1) {
                $row[] = '<div class="text-center">
                  <a href="javascript:;" class="btn btn-danger btn-sm shadow-lg text-white" onclick="byid_mengikuti_ba(' . "'" . $rs->id_vendor_mengikuti_paket . "','uncheck_evaluasi1'" . ')">
                      <i class="fa-solid fa-times"></i>
                      <small>Un-Check</small>
                  </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                          <a href="javascript:;" class="btn btn-success btn-sm shadow-lg text-white" onclick="byid_mengikuti_ba(' . "'" . $rs->id_vendor_mengikuti_paket . "','check_evaluasi1'" . ')">
                              <i class="fa-solid fa-check"></i>
                              <small>Check</small>
                          </a>
                      </div>';
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

    public function get_vendor_mengikuti_ba2($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->ba_check_ev2 == 1) {
                $row[] = '<div class="text-center badge bg-success">Mengikuti</div>';
            } else {
                $row[] = '<div class="text-center badge bg-danger">Tidak Mengikuti</div>';
            }

            if ($rs->ba_check_ev2 == 1) {
                $row[] = '<div class="text-center">
                  <a href="javascript:;" class="btn btn-danger btn-sm shadow-lg text-white" onclick="byid_mengikuti_ba(' . "'" . $rs->id_vendor_mengikuti_paket . "','uncheck_evaluasi2'" . ')">
                      <i class="fa-solid fa-times"></i>
                      <small>Un-Check</small>
                  </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                          <a href="javascript:;" class="btn btn-success btn-sm shadow-lg text-white" onclick="byid_mengikuti_ba(' . "'" . $rs->id_vendor_mengikuti_paket . "','check_evaluasi2'" . ')">
                              <i class="fa-solid fa-check"></i>
                              <small>Check</small>
                          </a>
                      </div>';
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

    public function get_vendor_mengikuti_ba3($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;
            if ($rs->ba_check_ev3 == 1) {
                $row[] = '<div class="text-center badge bg-success">Mengikuti</div>';
            } else {
                $row[] = '<div class="text-center badge bg-danger">Tidak Mengikuti</div>';
            }

            if ($rs->ba_check_ev3 == 1) {
                $row[] = '<div class="text-center">
                  <a href="javascript:;" class="btn btn-danger btn-sm shadow-lg text-white" onclick="byid_mengikuti_ba(' . "'" . $rs->id_vendor_mengikuti_paket . "','uncheck_evaluasi3'" . ')">
                      <i class="fa-solid fa-times"></i>
                      <small>Un-Check</small>
                  </a>
              </div>';
            } else {
                $row[] = '<div class="text-center">
                          <a href="javascript:;" class="btn btn-success btn-sm shadow-lg text-white" onclick="byid_mengikuti_ba(' . "'" . $rs->id_vendor_mengikuti_paket . "','check_evaluasi3'" . ')">
                              <i class="fa-solid fa-check"></i>
                              <small>Check</small>
                          </a>
                      </div>';
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


    public function check_ba_evaluasi1()
    {
        $type = $this->input->post('type');
        $name = $this->input->post('name');
        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');
        if ($type == '1') {
            $where = [
                'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
            ];
            $data = [
                $name => 1,
            ];
            $this->M_panitia->update_mengikuti($data, $where);
        } else if ($type == '2') {
            $where = [
                'id_vendor_mengikuti_paket' => $id_vendor_mengikuti_paket
            ];
            $data = [
                $name => 2
            ];
            $this->M_panitia->update_mengikuti($data, $where);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // sampul 1
    public function get_vendor_mengikuti_ba_sampul1($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_penawaran($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_evaluasi_penawaran($id_rup),
            "recordsFiltered" => $this->M_panitia->count_all_evaluasi_penawaran($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_vendor_mengikuti_ba_sampul1_1($id_rup)
    {
        $result = $this->M_panitia->gettable_sampul1_penawaran($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_filtered_sampul1_penawaran($id_rup),
            "recordsFiltered" => $this->M_panitia->count_all_sampul1_penawaran($id_rup),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_tahapan_ba_evaluasi_teknis($id_rup)
    {
        $get_ba_evaluasi_teknis = $this->M_panitia->get_ba_evaluasi_teknis($id_rup);
        $data = [
            'ba_teknis' => $get_ba_evaluasi_teknis
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function tambah_evaluasi_ba_teknis()
    {
        $id_rup = $this->input->post('id_rup');
        $nama_evaluasi = $this->input->post('nama_evaluasi');
        $data = [
            'id_rup' => $id_rup,
            'nama_evaluasi' => $nama_evaluasi
        ];
        $this->db->insert('tbl_ba_teknis_detail', $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function hapus_tahapan_ba_evaluasi($id_ba_teknis_detail)
    {
        $where = ['id_ba_teknis_detail' => $id_ba_teknis_detail];
        $this->db->delete('tbl_ba_teknis_detail', $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function ba_pembuktian_kualifikasi($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_pembuktian_kualifikasi', $data);
    }

    public function ba_hasil_evaluasi($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_lolos'] = $this->M_panitia->get_peserta_tender_ba_pra_lolos($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_hasil_evaluasi', $data);
    }

    public function ba_sampul_I($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_lolos'] = $this->M_panitia->get_peserta_tender_ba_pra_lolos($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_sampul1', $data);
    }


    public function ba_sampul_I_2($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_lolos'] = $this->M_panitia->get_peserta_tender_ba_pra_lolos($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['peserta_peringkat1'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran_terendahperingkat1($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_sampul1_2', $data);
    }


    public function ba_undangan_rapat($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/undangan_rapat', $data);
    }

    public function ba_hasil_evaluasi_teknis($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $data['ba_teknis_detail'] = $this->M_panitia->get_ba_evaluasi_teknis($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_hasil_evaluasi_teknis', $data);
    }

    public function ba_sampul_II($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_sampul2', $data);
    }

    public function ba_negosiasi($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $data['deal_nego'] = $this->M_panitia->get_peserta_rank1_biaya_dengan_negosiasi($data['row_rup']['id_rup']);
        $data['deal_row'] = $this->M_panitia->deal_row($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_negosiasi', $data);
    }

    public function ba_evaluasinegosiasi($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $data['deal'] = $this->M_panitia->deal($data['row_rup']['id_rup']);
        $data['deal_row'] = $this->M_panitia->deal_row($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_evaluasinegosiasi', $data);
    }

    public function ba_penjelasan_pengadaan($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_penjelasan_pengadaan', $data);
    }

    public function ba_pemenang_tender($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $data['get_pemenang'] = $this->M_panitia->get_pemenang($data['row_rup']['id_rup']);
        $data['get_mengikuti'] = $this->M_panitia->get_mengikuti($data['row_rup']['id_rup']);
        if ($data['row_rup']['id_jadwal_tender'] == 1) {
            $data['jadwal_sanggah_pemenang'] =  $this->M_jadwal->jadwal_pra1file_umum_19($data['row_rup']['id_rup']);
        } else {
            $data['jadwal_sanggah_pemenang'] =  $this->M_jadwal->jadwal_pra_umum_20($data['row_rup']['id_rup']);
        }
        $this->load->view('panitia/info_tender/print_ba/ba_pemenang', $data);
    }

    public function ba_pengumuman_hasil_evaluasi_teknis($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_pengumuman_hasil_evaluasi_teknis', $data);
    }

    public function ba_penjelasan_kualifiaksi($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/ba_penjelasan_kualifikasi', $data);
    }

    public function lihat_undangan_penawran($id_url_rup)
    {
        $data['row_rup'] = $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $data['peserta_tender'] = $this->M_panitia->get_peserta_tender($data['row_rup']['id_rup']);
        $data['peserta_tender_pq'] = $this->M_panitia->get_peserta_tender_ba_pra_lolos($data['row_rup']['id_rup']);
        $data['peserta_tender_pq_penawaran'] = $this->M_panitia->get_peserta_tender_ba_pra_penawaran($data['row_rup']['id_rup']);
        $data['panitia_tender'] = $this->M_panitia->get_panitia($data['row_rup']['id_rup']);
        $data['jadwal_pengumuman_hasil_kualifikasi'] =  $this->M_jadwal->jadwal_pra_umum_8($data['row_rup']['id_rup']);
        $data['jadwal_download_dokumen_pengadaan'] =  $this->M_jadwal->jadwal_pra1file_umum_10($data['row_rup']['id_rup']);
        $data['jadwal_aanwijzing'] =  $this->M_jadwal->jadwal_pra1file_umum_11($data['row_rup']['id_rup']);
        $data['jadwal_upload_dokumen_penawaran'] =  $this->M_jadwal->jadwal_pra1file_umum_12($data['row_rup']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/undangan_penawaran', $data);
    }

    public function pakta_integritas_penyedia($id_vendor_mengikuti_paket)
    {

        $data['mengikuti'] = $this->M_panitia->row_vendor_mengikuti($id_vendor_mengikuti_paket);
        $data['peserta_tender'] = $this->M_panitia->cek_direktur_utama($data['mengikuti']['id_vendor']);
        $data['row_rup'] = $this->M_panitia->get_rup($data['mengikuti']['id_rup']);
        $this->load->view('panitia/info_tender/print_ba/pakta_integritas', $data);
    }

    public function save_status_ba()
    {
        $type = $this->input->post('type');
        $post = $this->input->post('post');
        $id_rup = $this->input->post('id_rup');

        $data = [
            $post => $type,
        ];

        $where = [
            'id_rup' => $id_rup,
            'id_manajemen_user' => $this->session->userdata('id_manajemen_user')
        ];
        $this->M_panitia->panitia_mengikuti_update($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function save_status_kirim()
    {
        $post = $this->input->post('post');
        $id_rup = $this->input->post('id_rup');
        $data = [
            $post => 1,
        ];
        $this->M_panitia->update_rup_panitia($id_rup, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function simpan_status_file1()
    {
        $name = $this->input->post('name');

        $where = [
            'id_vendor_mengikuti_paket' => $this->input->post('id_vendor_mengikuti_paket')
        ];
        $data = [
            $name => $this->input->post('value_name')
        ];
        $this->M_panitia->update_mengikuti($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function get_kelengkapan_file2($id_rup)
    {
        $result = $this->M_panitia->gettable_evaluasi_penawaran($id_rup);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_usaha;

            if ($rs->kelengkapan_file2_1 == 1) {
                $row[] = '<span class="badge bg-sm bg-success"><i class="fa fa-check"></i></span>';
            } else {
                $row[] = '<span class="badge bg-sm bg-secondary">-</span>';
            }

            if ($rs->kelengkapan_file2_2 == 1) {
                $row[] = '<span class="badge bg-sm bg-success"><i class="fa fa-check"></i></span>';
            } else {
                $row[] = '<span class="badge bg-sm bg-secondary">-</span>';
            }

            if ($rs->kelengkapan_file2_3 == 1) {
                $row[] = '<span class="badge bg-sm bg-success"><i class="fa fa-check"></i></span>';
            } else {
                $row[] = '<span class="badge bg-sm bg-secondary">-</span>';
            }

            if ($rs->kelengkapan_file2_4 == 1) {
                $row[] = '<span class="badge bg-sm bg-success"><i class="fa fa-check"></i></span>';
            } else {
                $row[] = '<span class="badge bg-sm bg-secondary">-</span>';
            }

            if ($rs->kelengkapan_file2_5 == 1) {
                $row[] = '<span class="badge bg-sm bg-success"><i class="fa fa-check"></i></span>';
            } else {
                $row[] = '<span class="badge bg-sm bg-secondary">-</span>';
            }

            if ($rs->kelengkapan_file2_6 == 1) {
                $row[] = '<span class="badge bg-sm bg-success"><i class="fa fa-check"></i></span>';
            } else {
                $row[] = '<span class="badge bg-sm bg-secondary">-</span>';
            }


            $row[] = '<div class="text-center">
                <a href="javascript:;" class="btn btn-info btn-sm shadow-lg text-white" onclick="byid_mengikuti(' . "'" . $rs->id_vendor_mengikuti_paket . "','kelengkapan_file2'" . ')">
                    <i class="fa-solid fa-edit"></i>
                </a>
              </div>';



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

    public function simpan_kelengkapan_file2()
    {

        $id_vendor_mengikuti_paket = $this->input->post('id_vendor_mengikuti_paket');

        $kelengkapan_file2_1 = $this->input->post('kelengkapan_file2_1');
        $kelengkapan_file2_2 = $this->input->post('kelengkapan_file2_2');
        $kelengkapan_file2_3 = $this->input->post('kelengkapan_file2_3');
        $kelengkapan_file2_4 = $this->input->post('kelengkapan_file2_4');
        $kelengkapan_file2_5 = $this->input->post('kelengkapan_file2_5');
        $kelengkapan_file2_6 = $this->input->post('kelengkapan_file2_6');

        $where = [
            'id_vendor_mengikuti_paket' =>    $id_vendor_mengikuti_paket
        ];
        $data = [
            'kelengkapan_file2_1' => $kelengkapan_file2_1,
            'kelengkapan_file2_2' => $kelengkapan_file2_2,
            'kelengkapan_file2_3' => $kelengkapan_file2_3,
            'kelengkapan_file2_4' => $kelengkapan_file2_4,
            'kelengkapan_file2_5' => $kelengkapan_file2_5,
            'kelengkapan_file2_6' => $kelengkapan_file2_6,
        ];
        $this->M_panitia->update_evaluasi($data, $where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function pakta_integritas($id_vendor_mengikuti_paket)
    {
        $data['vendor'] = $this->M_panitia->get_mengikuti_vendor($id_vendor_mengikuti_paket);
        $data['rup'] = $this->M_panitia->get_rup($data['vendor']['id_rup']);
        $data['nama_usaha'] = $data['vendor']['nama_usaha'];
        $this->load->view('panitia/info_tender/surat_pernyataan_penyedia/pakta_integritas', $data);
    }

    public function surat_pernyataan_minat($id_vendor_mengikuti_paket)
    {
        $data['vendor'] = $this->M_panitia->get_mengikuti_vendor($id_vendor_mengikuti_paket);
        $data['rup'] = $this->M_panitia->get_rup($data['vendor']['id_rup']);
        $data['nama_usaha'] = $data['vendor']['nama_usaha'];
        $this->load->view('panitia/info_tender/surat_pernyataan_penyedia/surat_pernyataan_minat', $data);
    }

    public function surat_kebenaran_data($id_vendor_mengikuti_paket)
    {
        $data['vendor'] = $this->M_panitia->get_mengikuti_vendor($id_vendor_mengikuti_paket);
        $data['rup'] = $this->M_panitia->get_rup($data['vendor']['id_rup']);
        $data['nama_usaha'] = $data['vendor']['nama_usaha'];
        $this->load->view('panitia/info_tender/surat_pernyataan_penyedia/surat_kebenaran_data', $data);
    }

    public function surat_pernyataan($id_vendor_mengikuti_paket)
    {
        $data['vendor'] = $this->M_panitia->get_mengikuti_vendor($id_vendor_mengikuti_paket);
        $data['rup'] = $this->M_panitia->get_rup($data['vendor']['id_rup']);
        $data['nama_usaha'] = $data['vendor']['nama_usaha'];
        $this->load->view('panitia/info_tender/surat_pernyataan_penyedia/surat_pernyataan', $data);
    }

    public function get_table_nerca_keuangan($id_vendor)
    {
        $resultss = $this->M_panitia->gettable_neraca_keuangan($id_vendor);
        $data = [];
        $no = $_POST['start'];
        $nama_usaha = $this->session->userdata('nama_usaha');
        $date = date('Y');
        $file_path = 'file_vms/' . $nama_usaha . '/Neraca';
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            if ($rs->sts_token_dokumen == 1) {
                $row[] = '<label for="" style="white-space: nowrap; 
				width: 100px; 
				overflow: hidden;
				text-overflow: ellipsis;">' . $rs->file_dokumen_neraca . '</label>';
            } else {
                $row[] = '<a target="_blank" href="' . $this->dok_vendor . $rs->nama_usaha . '/' . 'Neraca/' . $rs->file_dokumen_neraca . '"  class="btn btn-sm btn-warning btn-block">' . $rs->file_dokumen_neraca . '</a>';
            }
            if ($rs->sts_token_dokumen == 2) {
                $row[] = '<center>
            	<a href="javascript:;" class="btn btn-success btn-sm shadow-lg"  <i class="fa-solid fa-lock px-1"></i> Enkrip</a></center>';
            } else {
                $row[] = '<center>
            	<a href="javascript:;" class="btn btn-warning btn-sm shadow-lg"  <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a></center>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_data_neraca_keuangan($id_vendor),
            "recordsFiltered" => $this->M_panitia->count_filtered_data_neraca_keuangan($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    function get_keuangan($id_vendor)
    {
        $result = $this->M_panitia->gettable_keuangan($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $rs) {

            $row = array();
            $row[] = ++$no;
            $row[] = $rs->tahun_lapor;
            $row[] = $rs->jenis_audit;
            if ($rs->jenis_audit == 'Audit') {
                if ($rs->sts_token_dokumen == 1) {
                    $row[] = '<center><span class="badge bg-danger text-white">Terenkripsi <i class="fa-solid fa-lock px-1"></i> </span></center>';
                } else {
                    $row[] = '<a target="_blank" href="' . $this->dok_vendor . $rs->nama_usaha . '/' . 'Laporan_keuangan/' . $rs->file_laporan_auditor . '" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;"  class="btn btn-sm btn-warning btn-block">' . $rs->file_laporan_auditor . '</a>';
                }
            } else {
                $row[] = '<span class="badge bg-secondary">Tidak Audit</span>';
            }

            if ($rs->sts_token_dokumen == 1) {
                $row[] = '<center><span class="badge bg-danger text-white">Terenkripsi <i class="fa-solid fa-lock px-1"></i></span></center>';
            } else {
                $row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' . $rs->id_url . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_laporan_keuangan . '</a>';
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_panitia->count_all_keuangan($id_vendor),
            "recordsFiltered" => $this->M_panitia->count_filtered_keuangan($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function cetak_jadwal($id_url_rup)
    {
        $data['jadwal'] = $this->M_panitia->get_jadwal($id_url_rup);
        $data['row_rup'] = $this->M_rup->get_row_rup($id_url_rup);
        $root_jadwal = $data['row_rup']['root_jadwal'];
        $data['root_jadwal'] = $data['row_rup']['root_jadwal'];
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/base_url_global', $data);
        $this->load->view('panitia/info_tender/' . $root_jadwal . '/base_url_info_tender', $data);
        $this->load->view('panitia/info_tender/print_ba/cetak_jadwal', $data);
        $this->load->view('panitia/info_tender/print_ba/ajax_jadwal', $data);
    }

    public function ulang_pengadaan()
    {
        $id_rup = $this->input->post('id_rup_ulang');
        $nama_rup = $this->input->post('nama_rup_ulang');
        $alasan_ulang = $this->input->post('alasan_ulang');


        $date = date('Y');
        if (!is_dir('file_paket/' . $nama_rup . '/FILE_ULANG')) {
            mkdir('file_paket/' . $nama_rup . '/FILE_ULANG', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/' . $nama_rup  . '/FILE_ULANG';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_ulang_paket')) {
            $fileData = $this->upload->data();

            $upload = [
                'file_ulang_paket' => $fileData['file_name'],
                'alasan_ulang' => $alasan_ulang,
                'sts_ulang' => 1,
                'status_paket_diumumkan' => 0,
                'status_paket_panitia' => 1
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }

    public function batal_pengadaan()
    {
        $id_rup = $this->input->post('id_rup_batal');
        $nama_rup = $this->input->post('nama_rup_batal');
        $alasan_batal = $this->input->post('alasan_batal');


        $date = date('Y');
        if (!is_dir('file_paket/' . $nama_rup . '/FILE_BATAL')) {
            mkdir('file_paket/' . $nama_rup . '/FILE_BATAL', 0777, TRUE);
        }

        $config['upload_path'] = './file_paket/' . $nama_rup  . '/FILE_BATAL';
        $config['allowed_types'] = 'pdf|xlsx|xls';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_batal_paket')) {
            $fileData = $this->upload->data();

            $upload = [
                'file_batal_paket' => $fileData['file_name'],
                'alasan_batal' => $alasan_batal,
                'sts_batal' => 1,
                'status_paket_diumumkan' => 0,
                'status_paket_panitia' => 0
            ];
            $this->M_panitia->update_rup_panitia($id_rup, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json')->set_output(json_encode('gagal'));
        }
    }
}
