<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_anggaran extends CI_Model
{

    public function get_result_jenis_anggaran()
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_anggaran');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_jenis_anggaran($id_jenis_anggaran)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_anggaran');
        $this->db->where('id_jenis_anggaran', $id_jenis_anggaran);
        $query = $this->db->get();
        return $query->row_array();
    }
}
