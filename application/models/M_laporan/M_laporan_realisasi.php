
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_realisasi extends CI_Model
{



    public function jumlah_pengadaan($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        // $this->db->where('sts_pengumuman_rup_trakhir', 1);
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        return $this->db->count_all_results();
    }

    public function jumlah_rup($id_departemen, $tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        // $this->db->where('sts_pengumuman_rup_trakhir', 1);
        $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function jumlah_rup_pemenang($id_departemen, $tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function jumlah_pengadaan_rencana($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('id_jenis_anggaran', 2);
        $this->db->where('tahun_rup', $tahun);
        return $this->db->count_all_results();
    }

    public function jumlah_rup_rencana($id_departemen, $tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        // $this->db->where('sts_pengumuman_rup_trakhir', 1);
        // $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('id_jenis_anggaran', 2);
        $this->db->where('tahun_rup', $tahun);
        $query =  $this->db->get();
        return $query->row_array();
    }

    public function jumlah_pengadaan_rencana_capex($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('id_jenis_anggaran', 1);
        $this->db->where('tahun_rup', $tahun);
        return $this->db->count_all_results();
    }

    public function jumlah_rup_rencana_capex($id_departemen, $tahun)
    {
        $this->db->select_sum('total_hps_rup');
        $this->db->from('tbl_rup');
        // $this->db->where('sts_pengumuman_rup_trakhir', 1);
        // $this->db->where('id_vendor_pemenang !=', null);
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('id_jenis_anggaran', 1);
        $this->db->where('tahun_rup', $tahun);
        $query =  $this->db->get();
        return $query->row_array();
    }


    public function jumlah_pengadaan_realisasi($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('id_jenis_anggaran', 2);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('id_vendor_pemenang !=', null);
        return $this->db->count_all_results();
    }

    public function jumlah_rup_realisasi($id_departemen, $tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $this->db->where('id_jenis_anggaran', 2);
        $this->db->where('tbl_rup.tahun_rup', $tahun);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jumlah_pengadaan_realisasi_capex($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('id_jenis_anggaran', 1);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('id_vendor_pemenang !=', null);
        return $this->db->count_all_results();
    }

    public function jumlah_rup_realisasi_capex($id_departemen, $tahun)
    {
        $this->db->select_sum('tbl_vendor_mengikuti_paket.total_hasil_negosiasi');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $this->db->where('id_jenis_anggaran', 1);
        $this->db->where('tbl_rup.tahun_rup', $tahun);
        $query = $this->db->get();
        return $query->row_array();
    }

    // jumlah pengadaan

    public function jumlah_pengadaan_jml_paket($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_juksung_tw1($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 1 . ' AND ' . 3 . '');
        $this->db->where_in('id_jadwal_tender', [9, 10]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_juksung_tw2($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 4 . ' AND ' . 6 . '');
        $this->db->where_in('id_jadwal_tender', [9, 10]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_juksung_tw3($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 7 . ' AND ' . 9 . '');
        $this->db->where_in('id_jadwal_tender', [9, 10]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_juksung_tw4($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 10 . ' AND ' . 12 . '');
        $this->db->where_in('id_jadwal_tender', [9, 10]);
        return $this->db->count_all_results();
    }


    public function jml_pengadaan_terbatas_tw1($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 1 . ' AND ' . 3 . '');
        $this->db->where_in('id_jadwal_tender', [1, 2, 3, 6]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_terbatas_tw2($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 4 . ' AND ' . 6 . '');
        $this->db->where_in('id_jadwal_tender', [1, 2, 3, 6]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_terbatas_tw3($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 7 . ' AND ' . 9 . '');
        $this->db->where_in('id_jadwal_tender', [1, 2, 3, 6]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_terbatas_tw4($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 10 . ' AND ' . 12 . '');
        $this->db->where_in('id_jadwal_tender', [1, 2, 3, 6]);
        return $this->db->count_all_results();
    }



    public function jml_pengadaan_umum_tw1($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 1 . ' AND ' . 3 . '');
        $this->db->where_in('id_jadwal_tender', [4, 5, 7, 8]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_umum_tw2($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 4 . ' AND ' . 6 . '');
        $this->db->where_in('id_jadwal_tender', [4, 5, 7, 8]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_umum_tw3($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 7 . ' AND ' . 9 . '');
        $this->db->where_in('id_jadwal_tender', [4, 5, 7, 8]);
        return $this->db->count_all_results();
    }

    public function jml_pengadaan_umum_tw4($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rup', $tahun);
        $this->db->where('MONTH(tbl_rup.jangka_waktu_mulai_pelaksanaan) BETWEEN ' . 10 . ' AND ' . 12 . '');
        $this->db->where_in('id_jadwal_tender', [4, 5, 7, 8]);
        return $this->db->count_all_results();
    }

    public function buku_rup($id_departemen, $tahun)
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->where('id_departemen', $id_departemen);
        $this->db->where('tahun_rkap', $tahun);
        return $this->db->count_all_results();
    }
}
