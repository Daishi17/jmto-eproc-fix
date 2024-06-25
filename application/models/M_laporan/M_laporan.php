<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{



    public function get_departemen()
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_realisasi($data)
    {
        $this->db->insert('tbl_laporan_realisasi_pic', $data);
    }

    public function add_rekap($data)
    {
        $this->db->insert('tbl_rekap_bulanan', $data);
    }

    public function get_lap_realisasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_laporan_realisasi_pic');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_lap_rekap()
    {
        $this->db->select('*');
        $this->db->from('tbl_rekap_bulanan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_juksung($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_pagu_rup) AS total_pagu, SUM(total_hps_rup) AS total_hps FROM tbl_rup WHERE tahun_rup = $tahun AND id_jadwal_tender IN(9,10)  AND id_vendor_pemenang IS NOT NULL");
        return $query->row_array();
    }


    public function get_juksung_vendor($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_hasil_negosiasi) AS total_nego FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_rup ON tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup WHERE sts_deal_negosiasi = 'deal' AND id_jadwal_tender IN(9,10) AND tahun_rup = $tahun");
        return $query->row_array();
    }

    public function get_terbatas($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_pagu_rup) AS total_pagu, SUM(total_hps_rup) AS total_hps FROM tbl_rup WHERE tahun_rup = $tahun AND id_jadwal_tender IN(1,2,3,6)  AND id_vendor_pemenang IS NOT NULL");
        return $query->row_array();
    }


    public function get_terbatas_vendor($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_hasil_negosiasi) AS total_nego FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_rup ON tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup WHERE sts_deal_negosiasi = 'deal' AND id_jadwal_tender IN(1,2,3,6) AND tahun_rup = $tahun");
        return $query->row_array();
    }

    public function get_umum($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_pagu_rup) AS total_pagu, SUM(total_hps_rup) AS total_hps FROM tbl_rup WHERE tahun_rup = $tahun AND id_jadwal_tender IN(4,5,7,8)  AND id_vendor_pemenang IS NOT NULL");
        return $query->row_array();
    }


    public function get_umum_vendor($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_hasil_negosiasi) AS total_nego FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_rup ON tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup WHERE sts_deal_negosiasi = 'deal' AND id_jadwal_tender IN(4,5,7,8) AND tahun_rup = $tahun");
        return $query->row_array();
    }


    public function get_total($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_pagu_rup) as total_pagu, SUM(total_hps_rup) as total_hps FROM tbl_rup WHERE tahun_rup = $tahun AND id_vendor_pemenang IS NOT NULL");
        return $query->row_array();
    }


    public function get_total_vendor($tahun)
    {
        $query = $this->db->query("SELECT SUM(total_hasil_negosiasi) AS total_nego FROM tbl_vendor_mengikuti_paket LEFT JOIN tbl_rup ON tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup WHERE sts_deal_negosiasi = 'deal' AND tahun_rup = $tahun");
        return $query->row_array();
    }



    var $order =  array('kode_urut_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');

    // get nib
    private function _get_data_query_juksung()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_rup.sts_pengumuman_rup_trakhir', 1);
        if (isset($_POST['tahun_juksung_val']) && $_POST['tahun_juksung_val'] != '') {
            $this->db->where('tbl_rup.tahun_rup', $_POST['tahun_juksung_val']);
        }
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'ASC');
        }
    }

    public function gettable_juksung() //nam[ilin data pake ini
    {
        $this->_get_data_query_juksung(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_juksung()
    {
        $this->_get_data_query_juksung(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_juksung()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        return $this->db->count_all_results();
    }

    private function _get_data_query_terbatas()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_rup.sts_pengumuman_rup_trakhir', 1);
        if (isset($_POST['tahun_terbatas_val']) && $_POST['tahun_terbatas_val'] != '') {
            $this->db->where('tbl_rup.tahun_rup', $_POST['tahun_terbatas_val']);
        }
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'ASC');
        }
    }

    public function gettable_terbatas() //nam[ilin data pake ini
    {
        $this->_get_data_query_terbatas(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_terbatas()
    {
        $this->_get_data_query_terbatas(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_terbatas()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        return $this->db->count_all_results();
    }

    private function _get_data_query_umum()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.sts_pengumuman_rup_trakhir', 1);
        if (isset($_POST['tahun_umum_val']) && $_POST['tahun_umum_val'] != '') {
            $this->db->where('tbl_rup.tahun_rup', $_POST['tahun_umum_val']);
        }
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'ASC');
        }
    }

    public function gettable_umum() //nam[ilin data pake ini
    {
        $this->_get_data_query_umum(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_umum()
    {
        $this->_get_data_query_umum(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_umum()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        return $this->db->count_all_results();
    }

    public function get_pemenang($id_vendor_pemenang, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor_pemenang);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_cs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 1);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_cs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 1);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_pemenang_cs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 1);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_rup_om($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 2);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_om($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 2);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_om($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 2);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_cc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 3);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_cc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 3);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_pemenang_cc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 3);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_pm($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 20);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_pm($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 20);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_pm($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 20);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_itd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 21);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_itd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 21);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_itd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 21);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_its($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 22);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_its($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 22);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_its($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 22);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_hcpe($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 23);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_hcpe($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 23);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_hcpe($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 23);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_hcs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 24);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_hcs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 24);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_hcs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 24);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_ga($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 25);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_ga($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 25);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_ga($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 25);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_fa($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 26);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_fa($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 26);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_fa($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 26);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_spgrc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 27);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_spgrc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 27);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_spgrc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 27);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_bpd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 28);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_hps_bpd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_bpd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup_pmo($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 29);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_pmo($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 29);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang_pmo($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_terbatas_rup_cs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 1);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_cs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 1);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_terbatas_pemenang_cs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 1);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_terbatas_rup_om($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 2);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_om($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_om($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_cc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 3);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_cc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 3);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_terbatas_pemenang_cc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 3);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_pm($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 20);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_pm($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 20);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_pm($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 20);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_itd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 21);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_itd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 21);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_itd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 21);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_its($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 22);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_its($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 22);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_its($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 22);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_hcpe($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 23);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_hcpe($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 23);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_hcpe($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 23);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_hcs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 24);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_hcs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 24);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_hcs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 24);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_ga($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 25);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_ga($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 25);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_ga($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 25);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_fa($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 26);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_fa($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 26);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_fa($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 26);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_spgrc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 27);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_spgrc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 27);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_spgrc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 27);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_bpd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 28);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_terbatas_hps_bpd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_bpd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_rup_pmo($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 29);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_hps_pmo($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 29);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_terbatas_pemenang_pmo($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_cs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 1);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_cs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 1);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_umum_pemenang_cs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 1);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_umum_rup_om($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 2);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_om($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_om($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_cc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 3);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_cc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 3);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_umum_pemenang_cc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 3);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_pm($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 20);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_pm($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 20);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_pm($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 20);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_itd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 21);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_itd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 21);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_itd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 21);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_its($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 22);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_its($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 22);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_its($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 22);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_hcpe($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 23);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_hcpe($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 23);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_hcpe($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 23);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_hcs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 24);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_hcs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 24);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_hcs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 24);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_ga($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 25);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_ga($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 25);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_ga($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 25);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_fa($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 26);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_fa($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 26);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_fa($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 26);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_spgrc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 27);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_spgrc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 27);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_spgrc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 27);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_bpd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 28);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_umum_hps_bpd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_bpd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_rup_pmo($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 29);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_hps_pmo($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 29);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_umum_pemenang_pmo($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_cs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 1);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_cs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 1);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_keseluruhan_pemenang_cs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 1);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_keseluruhan_rup_om($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 2);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_om($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 2);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_om($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 2);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_cc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 3);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_cc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 3);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_keseluruhan_pemenang_cc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 3);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_pm($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 20);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_pm($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 20);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_pm($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 20);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_itd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 21);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_itd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 21);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_itd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 21);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_its($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 22);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_its($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 22);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_its($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 22);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_hcpe($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 23);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_hcpe($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 23);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_hcpe($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 23);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_hcs($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 24);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_hcs($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 24);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_hcs($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 24);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_ga($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 25);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_ga($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 25);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_ga($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 25);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_fa($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 26);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_fa($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 26);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_fa($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 26);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_spgrc($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 27);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_spgrc($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 27);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_spgrc($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 27);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_bpd($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 28);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_keseluruhan_hps_bpd($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 28);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_bpd($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_rup_pmo($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('tbl_rup.id_departemen', 29);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_hps_pmo($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_departemen', 29);

        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_keseluruhan_pemenang_pmo($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_departemen', 28);

        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_rup($tahun)
    {
        $this->db->select_sum('total_pagu_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_vendor_pemenang !=', null);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_juksung($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_kontrak_juksung($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.id_jadwal_tender', 9);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_terbatas($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_kontrak_terbatas($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps_umum($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_kontrak_umum($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }


    public function sum_hps_keseluruhan($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_kontrak_keseluruhan($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_hps($tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sum_pemenang($tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        if ($tahun) {
            $this->db->where('tbl_rup.tahun_rup', $tahun);
        }
        $query = $this->db->get();
        return $query->row_array();
    }
}
