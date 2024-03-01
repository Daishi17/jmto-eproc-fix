<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_unit_kerja extends CI_Model
{
    var $table = 'tbl_departemen';
    var $order = array('kode_departemen', 'nama_departemen', 'sts_aktif', 'kode_departemen');

    private function _get_data_query()
    {
        $this->db->from($this->table);
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
            $this->db->order_by('kode_departemen', 'ASC');
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
        $this->db->select('RIGHT(tbl_departemen.kode_departemen,3) as kode_departemen', FALSE);
        $this->db->order_by('kode_departemen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_departemen');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_departemen) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $batas;  //format kode
        return $kodetampil;
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_departemen', $data);
    }

    public function getByid($id_departemen)
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $this->db->where('id_departemen', $id_departemen);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data($data, $id_departemen)
    {
        $this->db->where('id_departemen', $id_departemen);
        $this->db->update('tbl_departemen', $data);
    }
}
