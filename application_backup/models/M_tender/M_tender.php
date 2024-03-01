<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tender extends CI_Model
{
    public function getPesan($id_rup)
    {
        $this->db->from('tbl_pesan');
        $this->db->join('tbl_vendor', 'tbl_pesan.id_pengirim = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pesan.id_pengirim = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_pesan.id_rup', $id_rup);
        $r = $this->db->get();
        return $r->result();
    }

    public function getDataById($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        //    $this->db->where('tbl_rup.status_tahap_tender', 2);
        //    $this->db->where('status_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_chat($in)
    {
        $this->db->insert('tbl_pesan', $in);
    }

    // ini untuk Anwizing (tanya jawab)
    public function jadwal_aanwizing($id_rup)
    {
        $query = $this->db->query("SELECT * FROM tbl_jadwal_rup WHERE id_rup = $id_rup AND nama_jadwal_rup = 'Anwizing (tanya jawab)'");
        return $query->row_array();
    }

    // aanwizing penawaran
    public function getPesan_penawaran($id_rup)
    {
        $this->db->from('tbl_pesan_penawaran');
        $this->db->join('tbl_vendor', 'tbl_pesan_penawaran.id_pengirim = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pesan_penawaran.id_pengirim = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_pesan_penawaran.id_rup', $id_rup);
        $r = $this->db->get();
        return $r->result();
    }

    public function tambah_chat_penawaran($in)
    {
        $this->db->insert('tbl_pesan_penawaran', $in);
    }
}
