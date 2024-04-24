<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mjm_user extends CI_Model
{

    var $table = 'tbl_manajemen_user';
    var $order = array('id_manajemen_user', 'kode_mjm_user', 'nip', 'email', 'role', 'status', 'tbl_pegawai.id_pegawai', 'username');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_manajemen_user.id_pegawai', 'DESC');
        }
    }

    public function getdatatable() //nam[ilin data pake ini
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data()
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_karyawan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function kode()
    {
        $this->db->select('LEFT(tbl_manajemen_user.kode_mjm_user,3) as kode', FALSE);
        $this->db->order_by('id_manajemen_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_manajemen_user');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "00", STR_PAD_LEFT);
        $kodetampil = $batas;  //format kode
        return $kodetampil;
    }
    public function getByid($value)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_departemen', 'tbl_pegawai.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_pegawai.id_section = tbl_section.id_section', 'left');
        $this->db->where('id_pegawai', $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getByid_mjm($value)
    {
        $this->db->select('*');
        $this->db->from('tbl_manajemen_user');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->join('tbl_departemen', 'tbl_pegawai.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->where('tbl_manajemen_user.id_manajemen_user', $value);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_manajemen_user', $data);
    }

    public function update_data($data, $id_manajemen_user)
    {
        $this->db->where('id_manajemen_user', $id_manajemen_user);
        $this->db->update('tbl_manajemen_user', $data);
    }


    public function getByid_user($id_pegawai, $id_role)
    {
        $this->db->select('*');
        $this->db->from('tbl_manajemen_user');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_manajemen_user.id_pegawai', $id_pegawai);
        $this->db->where('tbl_manajemen_user.role', $id_role);
        $query = $this->db->get();
        return $query->row_array();
    }
}
