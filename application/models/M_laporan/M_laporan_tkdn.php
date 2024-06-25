<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_tkdn extends CI_Model
{
    var $order =  array('kode_urut_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');

    // get nib
    private function _get_data_query()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.sts_pengumuman_rup_trakhir', 1);
        if (isset($_POST['tahun_pengadaan']) && $_POST['tahun_pengadaan'] != '') {
            $this->db->where('tbl_rup.tahun_rup', $_POST['tahun_pengadaan']);
        }
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
            $this->db->order_by('tbl_rup.id_rup', 'ASC');
        }
    }

    public function gettable() //nam[ilin data pake ini
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select('*');
        $this->db->from('tbl_rkap');
        $this->db->join('tbl_departemen', 'tbl_rkap.id_departemen = tbl_departemen.id_departemen', 'left');
        return $this->db->count_all_results();
    }

    public function get_pemenang($id_vendor_pemenang, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor_pemenang);
        $this->db->where('sts_deal_negosiasi', 'deal');
        $this->db->where('tbl_rup.sts_pengumuman_rup_trakhir', 1);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_rup($data, $where)
    {
        $this->db->update('tbl_rup', $data, $where);
    }
}
