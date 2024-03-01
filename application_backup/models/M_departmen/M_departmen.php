<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_departmen extends CI_Model
{

    public function get_result_departemen()
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_row_departemen($id_departement)
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $this->db->where('id_departemen', $id_departement);
        $query = $this->db->get();
        return $query->row_array();
    }
}
