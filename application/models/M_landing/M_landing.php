<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_landing extends CI_Model
{
    var $table = 'tbl_berita_tender';
    var $order = array('id_berita', 'nama_berita', 'file_berita');

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
            $this->db->order_by('id_berita', 'DESC');
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


    // GET RUP PAKET FINAL
    var $order_paket =  array('tbl_rup.tahun_rup', 'tbl_rup.nama_rup');
    // pengadaan_barang
    private function _get_data_query_pengadaan_barang()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 4);
        $i = 0;
        foreach ($this->order_paket as $item) // looping awal
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

                if (count($this->order_paket) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_pengadaan_barang() //nam[ilin data pake ini
    {
        $this->_get_data_query_pengadaan_barang(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_pengadaan_barang()
    {
        $this->_get_data_query_pengadaan_barang(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_pengadaan_barang()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 4);
        return $this->db->count_all_results();
    }

    // pengadaan_konsultansi
    private function _get_data_query_pengadaan_konsultansi()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 2);
        $i = 0;
        foreach ($this->order_paket as $item) // looping awal
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

                if (count($this->order_paket) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_pengadaan_konsultansi() //nam[ilin data pake ini
    {
        $this->_get_data_query_pengadaan_konsultansi(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_pengadaan_konsultansi()
    {
        $this->_get_data_query_pengadaan_konsultansi(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_pengadaan_konsultansi()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 2);
        return $this->db->count_all_results();
    }


    // pengadaan_pemborongan
    private function _get_data_query_pengadaan_pemborongan()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 3);
        $i = 0;
        foreach ($this->order_paket as $item) // looping awal
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

                if (count($this->order_paket) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_pengadaan_pemborongan() //nam[ilin data pake ini
    {
        $this->_get_data_query_pengadaan_pemborongan(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_pengadaan_pemborongan()
    {
        $this->_get_data_query_pengadaan_pemborongan(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_pengadaan_pemborongan()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 3);
        return $this->db->count_all_results();
    }

    // pengadaan_jasa_lain
    private function _get_data_query_pengadaan_jasa_lain()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 1);
        $i = 0;
        foreach ($this->order_paket as $item) // looping awal
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

                if (count($this->order_paket) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_pengadaan_jasa_lain() //nam[ilin data pake ini
    {
        $this->_get_data_query_pengadaan_jasa_lain(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_pengadaan_jasa_lain()
    {
        $this->_get_data_query_pengadaan_jasa_lain(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_pengadaan_jasa_lain()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 2);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->where('tbl_rup.id_jenis_pengadaan', 3);
        return $this->db->count_all_results();
    }
}
