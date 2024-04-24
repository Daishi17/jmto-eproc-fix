<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_pengadaan extends CI_Model
{
    
    public function get_result_jenis_pengadaan()
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_pengadaan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_jenis_pengadaan($id_jenis_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_pengadaan');
        $this->db->where('id_jenis_pengadaan', $id_jenis_pengadaan);
        $query = $this->db->get();
        return $query->row_array();
    }
}