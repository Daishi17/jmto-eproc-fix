<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_metode_pengadaan extends CI_Model
{
    var $table = 'tbl_metode_pengadaan';
    var $order = array('id_metode_pengadaan', 'nama_metode_pengadaan', 'sts_aktif', 'id_metode_pengadaan');

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
            $this->db->order_by('id_metode_pengadaan', 'ASC');
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
        $this->db->select('LEFT(tbl_metode_pengadaan.kode_metode_pengadaan,3) as kode_metode_pengadaan', FALSE);
        $this->db->order_by('id_metode_pengadaan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_metode_pengadaan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_metode_pengadaan) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "00", STR_PAD_LEFT);
        $kodetampil = $batas;  //format kode
        return $kodetampil;
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_metode_pengadaan', $data);
    }

    public function getByid($id_metode_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_metode_pengadaan');
        $this->db->where('id_metode_pengadaan', $id_metode_pengadaan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data($data, $id_metode_pengadaan)
    {
        $this->db->where('id_metode_pengadaan', $id_metode_pengadaan);
        $this->db->update('tbl_metode_pengadaan', $data);
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
