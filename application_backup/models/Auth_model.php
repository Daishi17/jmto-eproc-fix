<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function login($username)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_manajemen_user', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_manajemen_user.username', $username);
        // $this->db->or_where('tbl_pegawai.nip', $username);
        return $this->db->get()->row();
    }


    public function insert_log($data)
    {
        $this->db->insert('tbl_pegawai_log', $data);
        return $this->db->affected_rows();
    }
}
