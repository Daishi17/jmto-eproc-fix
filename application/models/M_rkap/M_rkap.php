<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rkap extends CI_Model
{


    var $order =  array('id_rkap', 'kode_rkap', 'tahun_rkap', 'nama_program_rkap', 'kode_departemen', 'total_pagu_rkap', 'id_rkap', 'id_rkap', 'id_rkap');

    // get nib
    private function _get_data_query_rkap()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
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
            $this->db->order_by('tbl_rkap.id_rkap', 'ASC');
        }
    }

    public function gettable_rkap() //nam[ilin data pake ini
    {
        $this->_get_data_query_rkap(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rkap()
    {
        $this->_get_data_query_rkap(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rkap()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        return $this->db->count_all_results();
    }




    public function get_kode_rkap($table = null, $field = null)
    {
        $this->db->select_max('kode_rkap');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);
        return $this->db->get($table)->row_array()[$field];
    }
    public function tambah_rkap($data)
    {
        $this->db->insert('tbl_rkap', $data);
        return $this->db->affected_rows();
    }
    public function update_rkap($data, $where)
    {
        $this->db->update('tbl_rkap', $data, $where);
    }


    public function get_all_rkap()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    // by_url
    public function get_row_rkap($id_url_rkap)
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->where('id_url_rkap', $id_url_rkap);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_rkap_by_id($id_rkap)
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->where('id_rkap', $id_rkap);
        $query = $this->db->get();
        return $query->row_array();
    }
}
