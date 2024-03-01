<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Jadwal extends CI_Model
{
    var $table = 'tbl_jadwal_tender';
    var $order = array('kode_jadwal', 'nama_jadwal_pengadaan', 'nama_jenis_pengadaan', 'nama_metode_pengadaan', 'metode_kualifikasi', 'metode_dokumen', 'status', 'id_jenis_pengadaan');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jadwal_tender.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_jadwal_tender.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
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
            $this->db->order_by('kode_jadwal', 'ASC');
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

    var $table2 = 'tbl_detail_jadwal_tender';
    var $order2 = array('id_detail_jadwal_tender', 'nama_jadwal');

    private function _get_data_query2($id)
    {
        $this->db->select('*');
        $this->db->from($this->table2);
        $this->db->where('tbl_detail_jadwal_tender.id_jadwal_tender', $id);
        // $this->db->join('tbl_departemen', 'tbl_section.id_departemen = tbl_departemen.id_departemen', 'left');
        $i = 0;
        foreach ($this->order2 as $item) // looping awal
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

                if (count($this->order2) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_detail_jadwal_tender', 'ASC');
        }
    }

    public function getdatatable2($id) //nam[ilin data pake ini
    {
        $this->_get_data_query2($id); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data2($id)
    {
        $this->_get_data_query2($id); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data2($id)
    {
        $this->db->from($this->table2);
        $this->db->where('tbl_detail_jadwal_tender.id_jadwal_tender', $id);
        return $this->db->count_all_results();
    }

    public function getByid($id_jadwal_tender)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_tender');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jadwal_tender.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_jadwal_tender.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->where('id_jadwal_tender', $id_jadwal_tender);
        $query = $this->db->get();
        return $query->row_array();
    }
}
