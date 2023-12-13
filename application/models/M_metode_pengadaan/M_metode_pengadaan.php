<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_metode_pengadaan extends CI_Model
{
    
    public function get_result_metode_pengadaan()
    {
        $this->db->select('*');
        $this->db->from('tbl_metode_pengadaan');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_row_metode_pengadaan($id_metode_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_metode_pengadaan');
        $this->db->where('id_metode_pengadaan', $id_metode_pengadaan);
        $query = $this->db->get();
        return $query->row_array();
    }
}