<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_unit_area extends CI_Model
{
    var $table = 'tbl_section';
    var $order = array('id_section', 'nama_section', 'sts_aktif', 'id_section');

    private function _get_data_query()
    {
        $this->db->select('id_section,kode_section, nama_section,nama_departemen,tbl_section.sts_aktif');
        $this->db->from($this->table);
        $this->db->join('tbl_departemen', 'tbl_section.id_departemen = tbl_departemen.id_departemen', 'left');
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
            $this->db->order_by('kode_section', 'ASC');
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

    public function kode()
    {
        $this->db->select('LEFT(tbl_section.kode_section,3) as kode_section', FALSE);
        $this->db->order_by('id_section', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_section');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_section) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "20", STR_PAD_LEFT);
        $kodetampil = $batas;  //format kode
        return $kodetampil;
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_section', $data);
    }

    public function getByid($id_section)
    {
        $this->db->select('*');
        $this->db->from('tbl_section');
        $this->db->join('tbl_departemen', 'tbl_section.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->where('id_section', $id_section);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data($data, $id_section)
    {
        $this->db->where('id_section', $id_section);
        $this->db->update('tbl_section', $data);
    }

    public function get_departemen()
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $this->db->where('sts_aktif', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
}
