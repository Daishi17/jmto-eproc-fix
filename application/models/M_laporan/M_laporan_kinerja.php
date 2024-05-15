
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_kinerja extends CI_Model
{

    public function get_row_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_jadwal_tender', 'tbl_rup.id_jadwal_tender = tbl_jadwal_tender.id_jadwal_tender', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function input_data_satgas($data)
    {
        $this->db->insert('tbl_pelaksanaan_satgas', $data);
    }

    public function cek_pelaksanaan_satgas($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelaksanaan_satgas');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data_satgas($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pelaksanaan_satgas', $data);
        return $this->db->affected_rows();
    }


    public function input_data_manager($data)
    {
        $this->db->insert('tbl_pelaksanaan_manager', $data);
    }

    public function cek_pelaksanaan_manager($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelaksanaan_manager');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data_manager($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pelaksanaan_manager', $data);
        return $this->db->affected_rows();
    }


    public function input_data_depthead($data)
    {
        $this->db->insert('tbl_pelaksanaan_depthead', $data);
    }

    public function cek_pelaksanaan_depthead($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelaksanaan_depthead');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data_depthead($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pelaksanaan_depthead', $data);
        return $this->db->affected_rows();
    }


    public function cek_pelaksanaan_total($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelaksanaan_total');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_total_pelaksanaan($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pelaksanaan_total', $data);
        return $this->db->affected_rows();
    }

    public function insert_total_pelaksanaan($data)
    {
        $this->db->insert('tbl_pelaksanaan_total', $data);
    }


    public function input_data_satgas_pemeliharaan($data)
    {
        $this->db->insert('tbl_pemeliharaan_satgas', $data);
    }

    public function cek_pemeliharaan_satgas($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeliharaan_satgas');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data_satgas_pemeliharaan($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pemeliharaan_satgas', $data);
        return $this->db->affected_rows();
    }


    public function input_data_manager_pemeliharaan($data)
    {
        $this->db->insert('tbl_pemeliharaan_manager', $data);
    }

    public function cek_pemeliharaan_manager($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeliharaan_manager');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data_manager_pemeliharaan($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pemeliharaan_manager', $data);
        return $this->db->affected_rows();
    }

    public function input_data_depthead_pemeliharaan($data)
    {
        $this->db->insert('tbl_pemeliharaan_depthead', $data);
    }

    public function cek_pemeliharaan_depthead($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeliharaan_depthead');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_data_depthead_pemeliharaan($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pemeliharaan_depthead', $data);
        return $this->db->affected_rows();
    }

    public function cek_pemeliharaan_total($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeliharaan_total');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_total_pemeliharaan($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_pemeliharaan_total', $data);
        return $this->db->affected_rows();
    }

    public function insert_total_pemeliharaan($data)
    {
        $this->db->insert('tbl_pemeliharaan_total', $data);
    }


    public function count_pelaksanaan_total($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelaksanaan_total');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function count_pemeliharaan_total($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeliharaan_total');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function result_pelaksanaan_total($id_vendor, $id_rup)
    {
        $this->db->select_sum('hasil_akhir', 'hasil_akhir_pelaksanaan');
        $this->db->from('tbl_pelaksanaan_total');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function result_pemeliharaan_total($id_vendor, $id_rup)
    {
        $this->db->select_sum('hasil_akhir', 'hasil_akhir_pemeliharaan');
        $this->db->from('tbl_pemeliharaan_total');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_ke_vendor($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_vendor', $data);
        return $this->db->affected_rows();
    }

    public function get_penilaian_pelaksanaan_byid($id_penilaian_vendor, $type)
    {

        if ($type == 'satgas') {
            $this->db->select('*');
            $this->db->from('tbl_pelaksanaan_satgas');
            $this->db->join('tbl_rup', 'tbl_pelaksanaan_satgas.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pelaksanaan_satgas.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('tbl_pelaksanaan_satgas.id_penilaian_vendor', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        } else if ($type == 'manager') {
            $this->db->select('*');
            $this->db->from('tbl_pelaksanaan_manager');
            $this->db->join('tbl_rup', 'tbl_pelaksanaan_manager.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pelaksanaan_manager.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('id_penilaian_vendor', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        } else if ($type == 'depthead') {
            $this->db->select('*');
            $this->db->from('tbl_pelaksanaan_depthead');
            $this->db->join('tbl_rup', 'tbl_pelaksanaan_depthead.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pelaksanaan_depthead.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('id_penilaian_vendor', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_pelaksanaan_total');
            $this->db->join('tbl_rup', 'tbl_pelaksanaan_total.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pelaksanaan_total.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('id_pelaksanaan_total', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function get_penilaian_pemeliharaan_byid($id_penilaian_vendor, $type)
    {

        if ($type == 'satgas') {
            $this->db->select('*');
            $this->db->from('tbl_pemeliharaan_satgas');
            $this->db->join('tbl_rup', 'tbl_pemeliharaan_satgas.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pemeliharaan_satgas.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('tbl_pemeliharaan_satgas.id_penilaian_vendor', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        } else if ($type == 'manager') {
            $this->db->select('*');
            $this->db->from('tbl_pemeliharaan_manager');
            $this->db->join('tbl_rup', 'tbl_pemeliharaan_manager.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pemeliharaan_manager.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('id_penilaian_vendor', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        } else if ($type == 'depthead') {
            $this->db->select('*');
            $this->db->from('tbl_pemeliharaan_depthead');
            $this->db->join('tbl_rup', 'tbl_pemeliharaan_depthead.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pemeliharaan_depthead.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('id_penilaian_vendor', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_pemeliharaan_total');
            $this->db->join('tbl_rup', 'tbl_pemeliharaan_total.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
            $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
            $this->db->join('tbl_vendor', 'tbl_pemeliharaan_total.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('id_pemeliharaan_total', $id_penilaian_vendor);
            $query = $this->db->get();
            return $query->row_array();
        }
    }
}
