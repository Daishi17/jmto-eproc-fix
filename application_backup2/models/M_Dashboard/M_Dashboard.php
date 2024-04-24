<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{

    function count_rup()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_paket_tender()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('status_paket_diumumkan', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_paket_tender_berjalan()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('status_paket_diumumkan', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_paket_tender_selesai()
    {
        $date = date('Y-m-d H:i');
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('status_paket_diumumkan', 1);
        $this->db->where('selesai_semua_tender <=', $date);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_baru()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', NULL);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_tervalidasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('sts_terundang', null);
        $query = $this->db->get();
        return $query->num_rows();
    }




    function count_rekanan_terundang()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('sts_terundang', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_daftar_hitam()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_daftar_hitam', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_jan()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '01');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_feb()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '02');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_mar()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '03');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_apr()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '04');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_mei()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '05');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_jun()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '06');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_jul()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '07');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_ags()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '08');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_sep()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '09');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_okt()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '10');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_nov()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '11');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_rekanan_des()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_aktif', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '12');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_jan()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '01');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_feb()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '02');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_mar()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '03');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_apr()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '04');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_mei()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '05');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_jun()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '06');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_jul()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '07');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_ags()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '08');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_sep()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '09');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_okt()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '10');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_nov()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '11');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_terundang_des()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('sts_terundang', 1);
        $this->db->where('YEAR(tbl_vendor.tgl_daftar)', '2023');
        $this->db->where('MONTH(tbl_vendor.tgl_daftar)', '12');
        $query = $this->db->get();
        return $query->num_rows();
    }


    function count_paket_tender_draf_panitia()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_paket_tender_berjalan_panitia()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_paket_tender_umumkan_panitia()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_paket_tender_selesai_panitia()
    {
        $date = date('Y-m-d H:i');
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $this->db->where('tbl_rup.selesai_semua_tender <=', $date);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
