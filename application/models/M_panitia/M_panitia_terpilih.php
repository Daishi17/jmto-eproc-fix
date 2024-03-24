<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_panitia_terpilih extends CI_Model
{

    public function panitia_ba($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);

        $query = $this->db->get();
        return $query->result_array();
    }


    public function update_status($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_panitia', $data);
    }

    public function get_panitia_ba1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_1 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_2 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_3 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_4 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    // sampul 1
    public function get_panitia_ba5($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_5 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    // sampul 1_2
    public function get_panitia_ba6($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_6 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_8 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba10($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_10 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_11 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ba12($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_panitia.sts_ba_12 !=', 1);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }
}
