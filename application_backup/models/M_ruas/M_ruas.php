<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ruas extends CI_Model
{

    public function get_result_ruas()
    {
        $this->db->select('*');
        $this->db->from('mst_ruas');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_row_ruas($id_ruast)
    {
        $this->db->select('*');
        $this->db->from('mst_ruas');
        $this->db->where('id_ruas', $id_ruast);
        $query = $this->db->get();
        return $query->row_array();
    }
}
