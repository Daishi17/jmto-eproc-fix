<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dok_tender extends CI_Model
{
    public function get_row_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_dok_prakualifikasi($id_dokumen_prakualifikasi)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_prakualifikasi');
        $this->db->where('id_dokumen_prakualifikasi', $id_dokumen_prakualifikasi);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_dok_pengadaan($id_dokumen_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_pengadaan');
        $this->db->where('id_dokumen_pengadaan', $id_dokumen_pengadaan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_dok_syarat_tambahan($id_syarat_tambahan)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->where('id_syarat_tambahan', $id_syarat_tambahan);
        $query = $this->db->get();
        return $query->row_array();
    }
}
