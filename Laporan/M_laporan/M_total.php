<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_total extends CI_Model
{
    var $table = 'tbl_rup';
    var $order = array('kode_rup', 'kode_rup', 'kode_rup', 'kode_rup', 'kode_rup', 'kode_rup', 'kode_rup', 'kode_rup');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_jadwal_tender', 'tbl_rup.id_jadwal_tender = tbl_jadwal_tender.id_jadwal_tender', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_rup.id_departemen', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->group_by('tbl_rup.id_rup');
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
            $this->db->order_by('kode_rup', 'ASC');
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
        $this->db->join('tbl_jadwal_tender', 'tbl_rup.id_jadwal_tender = tbl_jadwal_tender.id_jadwal_tender', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        return $this->db->count_all_results();
    }

    public function get_pemenang($id_vendor)
    {
        $this->db->from($this->table);
        $this->db->join('tbl_vendor', 'tbl_rup.id_vendor_pemenang = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_rup.id_vendor_pemenang', $id_vendor);
        $query = $this->db->get();
        return $query->row();
    }

    
    public function get_mengikuti($id_vendor, $id_rup)
    {
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_panitia_ketua($id_rup)
    {
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('role_panitia', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_departemen()
    {
        $this->db->select('*');
        $this->db->from('tbl_departemen');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function query_count_jenis_pengadaan($id, $id_jenis)
    {
        $this->db->select('id_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id);
        $this->db->where('id_jenis_pengadaan', $id_jenis);
        return $this->db->count_all_results();
    }

    public function query_count_jenis_pengadaan_keseluruhan($id)
    {
        $this->db->select('id_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id);
        $this->db->where_in('id_jenis_pengadaan', [1,2,3,4]);
        return $this->db->count_all_results();
    }

    public function query_count_metode_pengadaan($id, $id_jenis)
    {
        $this->db->select('id_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id);
        $this->db->where('id_metode_pengadaan', $id_jenis);
        return $this->db->count_all_results();
    }

    
    public function query_count_metode_pengadaan_tender($id)
    {
        $this->db->select('id_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id);
        $this->db->where_in('id_metode_pengadaan', [1,2,4,5]);
        return $this->db->count_all_results();
    }

    public function query_count_metode_pengadaan_total($id)
    {
        $this->db->select('id_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id);
        $this->db->where_in('id_metode_pengadaan', [1,2,3,4,5,6]);
        return $this->db->count_all_results();
    }

    public function query_count_metode_pengadaan_keseluruhan($id)
    {
        $this->db->select('id_rup');
        $this->db->from('tbl_rup');
        $this->db->where('id_departemen', $id);
        $this->db->where_in('id_metode_pengadaan', [1,2,3,4]);
        return $this->db->count_all_results();
    }

    public function nilai_kontrak_juksung($id_departemen)
    {
        $query = $this->db->query("SELECT SUM(nilai_penawaran) AS total FROM tbl_rup
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup
		WHERE tbl_rup.id_rup = $id_departemen AND id_metode_pengadaan = 3");
       	return $query->row_array();

    }

    public function nilai_kontrak_pensung($id_departemen)
    {
        $query = $this->db->query("SELECT SUM(nilai_penawaran) AS total FROM tbl_rup
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup
		WHERE tbl_rup.id_rup = $id_departemen AND id_metode_pengadaan = 6");
       	return $query->row_array();

    }

    public function nilai_kontrak_tender($id_departemen)
    {
        $query = $this->db->query("SELECT SUM(nilai_penawaran) AS total FROM tbl_rup
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup
		WHERE tbl_rup.id_metode_pengadaan IN(1,2,4,5) AND id_departemen = $id_departemen");
       	return $query->row_array();

    }

    public function nilai_kontrak_total($id_departemen)
    {
        $query = $this->db->query("SELECT SUM(nilai_penawaran) AS total FROM tbl_rup
		LEFT JOIN tbl_vendor_mengikuti_paket ON tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup AND id_departemen = $id_departemen");
       	return $query->row_array();

    }

    public function get_total_barang()
	{
		$this->db->select('*');
		$this->db->from('tbl_rup');
		$this->db->where('id_jenis_pengadaan', 4);
		$this->db->where('tbl_rup.status_paket_diumumkan', 1);
		return $this->db->count_all_results();
	}

    public function get_total_konstruksi()
	{
		$this->db->select('*');
		$this->db->from('tbl_rup');
		$this->db->where('id_jenis_pengadaan', 3);
		$this->db->where('tbl_rup.status_paket_diumumkan', 1);
		return $this->db->count_all_results();
	}

    public function get_total_konsultasi()
	{
		$this->db->select('*');
		$this->db->from('tbl_rup');
		$this->db->where('id_jenis_pengadaan', 2);
		$this->db->where('tbl_rup.status_paket_diumumkan', 1);
		return $this->db->count_all_results();
	}

    public function get_total_lain()
	{
		$this->db->select('*');
		$this->db->from('tbl_rup');
		$this->db->where('id_jenis_pengadaan', 1);
		$this->db->where('tbl_rup.status_paket_diumumkan', 1);
		return $this->db->count_all_results();
	}
}
