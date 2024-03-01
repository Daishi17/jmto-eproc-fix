<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
    var $table = 'tbl_pegawai';
    var $order = array('id_pegawai', 'nip', 'nama_pegawai', 'nama_departemen', 'id_role', 'email', 'status', 'id_pegawai');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_departemen', 'tbl_pegawai.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_pegawai.id_section = tbl_section.id_section', 'left');
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
            $this->db->order_by('id_pegawai', 'DESC');
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

    public function get_departemen()
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $this->db->where('sts_aktif', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_section()
    {
        $this->db->select('*');
        $this->db->from('tbl_section');
        $this->db->where('sts_aktif', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_pegawai', $data);
    }


    public function update_data($data, $id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('tbl_pegawai', $data);
    }

    public function getByid($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_departemen', 'tbl_pegawai.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_pegawai.id_departemen = tbl_section.id_departemen', 'left');
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updatepassword($data, $id_pegawai)
	{
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('tbl_manajemen_user', $data);
	}

    public function getByid_nip($nip)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert_excel_karyawan($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('tbl_pegawai', $data);
        }
    }

    public function ambil_role_2()
    {
        $this->db->select('*');
        $this->db->from('tbl_manajemen_user');
        $this->db->where('role', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

}
