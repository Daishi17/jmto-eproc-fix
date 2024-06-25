<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rup extends CI_Model
{

    var $order =  array('kode_urut_rup', 'kode_rup', 'tahun_rup', 'nama_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');

    // get nib
    private function _get_data_query_rup()
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
            $this->db->order_by('tbl_rup.kode_urut_rup', 'DESC');
        }
    }

    public function gettable_rup() //nam[ilin data pake ini
    {
        $this->_get_data_query_rup(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rup()
    {
        $this->_get_data_query_rup(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rup()
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
        return $this->db->count_all_results();
    }
    public function get_kode_rup($text = null, $table = null, $field = null)
    {
        $this->db->select_max('kode_urut_rup');
        $this->db->like($field, $text, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);
        return $this->db->get($table)->row_array()[$field];
    }
    public function tambah_rup($data)
    {
        $this->db->insert('tbl_rup', $data);
        return $this->db->affected_rows();
    }
    public function update_rup($data, $where)
    {
        $this->db->update('tbl_rup', $data, $where);
    }

    public function update_ruas($data, $where)
    {
        $this->db->update('tbl_ruas_rup', $data, $where);
    }


    public function get_all_rup()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_ruas_by_id_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_ruas_rup');
        $this->db->join('mst_ruas', 'tbl_ruas_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_ruas_rup($id_ruas_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_ruas_rup');
        $this->db->join('mst_ruas', 'tbl_ruas_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('id_ruas_rup', $id_ruas_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_nama($id_url_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where($id_url_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_rup($id_url_rup)
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
        $this->db->where('id_url_rup', $id_url_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_rup_by_id_rup($id_rup)
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

    public function get_metode($id_rup)
    {
        $this->db->select('metode_kualifikasi, metode_dokumen');
        $this->db->from('tbl_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_ruas($where)
    {
        $this->db->delete('tbl_ruas_rup', $where);
    }

    public function pegawai_panitia()
    {
        $this->db->select('*');
        $this->db->from('tbl_manajemen_user');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_manajemen_user.sts_aktif', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tim_teknis()
    {
        $this->db->select('*');
        $this->db->from('tbl_manajemen_user');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('tbl_manajemen_user.role', 6);
        $this->db->where('tbl_manajemen_user.sts_aktif', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pegawai_panitia_by_kode_mnjm_user($kode_mjm_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_manajemen_user');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('kode_mjm_user', $kode_mjm_user);
        $query = $this->db->get();
        return $query->row_array();
    }





    var $order_panitia =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');

    // get nib
    private function _get_data_query_rup_panitia($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $i = 0;
        foreach ($this->order_panitia as $item) // looping awal
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

                if (count($this->order_panitia) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_panitia[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_panitia.role_panitia', 'ASC');
        }
    }

    public function gettable_rup_panitia($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_rup_panitia($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rup_panitia($id_rup)
    {
        $this->_get_data_query_rup_panitia($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rup_panitia($id_rup)
    {
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    var $order_tim_teknis =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');
    private function _get_data_query_rup_tim_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_tim_teknis');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_tim_teknis.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_tim_teknis.id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 6);
        $i = 0;
        foreach ($this->order_tim_teknis as $item) // looping awal
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

                if (count($this->order_tim_teknis) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_tim_teknis[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_tim_teknis.role_tim_teknis', 'ASC');
        }
    }

    public function gettable_rup_tim_teknis($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_rup_tim_teknis($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rup_tim_teknis($id_rup)
    {
        $this->_get_data_query_rup_tim_teknis($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rup_tim_teknis($id_rup)
    {
        $this->db->from('tbl_tim_teknis');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_tim_teknis.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_tim_teknis.id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function cek_role_panitia($id_rup, $role_panitia)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_panitia.role_panitia', $role_panitia);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_panitia($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_rup_edit($id_url_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->where('id_url_rup', $id_url_rup);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function cek_user_panitia($id_rup, $id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where('tbl_pegawai.id_pegawai', $id_pegawai);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_user_tim_teknis($id_rup, $id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('tbl_tim_teknis');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_tim_teknis.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_tim_teknis.id_rup', $id_rup);
        $this->db->where('tbl_pegawai.id_pegawai', $id_pegawai);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_panitia($id_url_panitia)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_url_panitia', $id_url_panitia);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_tim_teknis($id_url_tim_teknis)
    {
        $this->db->select('*');
        $this->db->from('tbl_tim_teknis');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_tim_teknis.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_tim_teknis.id_url_tim_teknis', $id_url_tim_teknis);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_panitia($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function cek_sudah_ada_pantia_ketua_dan_sekertaris($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_manajemen_user.id_manajemen_user = tbl_panitia.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_panitia.id_rup', $id_rup);
        $this->db->where_in('tbl_panitia.role_panitia', [1, 2]);
        return $this->db->count_all_results();
    }
    public function delete_panitia($where)
    {
        $this->db->delete('tbl_panitia', $where);
    }

    public function delete_tim_teknis($where)
    {
        $this->db->delete('tbl_tim_teknis', $where);
    }

    var $order_rup_paket =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');

    // get nib
    private function _get_data_query_rup_paket()
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
        $this->db->where('tbl_rup.sts_rup', 1);
        $this->db->where('tbl_rup.sts_rup_buat_paket', 0);
        $i = 0;
        foreach ($this->order_rup_paket as $item) // looping awal
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

                if (count($this->order_rup_paket) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_rup_paket[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_rup_paket() //nam[ilin data pake ini
    {
        $this->_get_data_query_rup_paket(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rup_paket()
    {
        $this->_get_data_query_rup_paket(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_rup_paket()
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
        $this->db->where('tbl_rup.sts_rup', 1);
        $this->db->where('tbl_rup.sts_rup_buat_paket', 0);
        return $this->db->count_all_results();
    }

    // GET RUP PAKET FINAL
    var $order_rup_paket_final =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');
    // get nib
    private function _get_data_query_rup_paket_final()
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
        $this->db->where('tbl_rup.sts_rup', 1);
        $this->db->where_in('tbl_rup.sts_rup_buat_paket', [1, 2]);
        $i = 0;
        foreach ($this->order_rup_paket_final as $item) // looping awal
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

                if (count($this->order_rup_paket_final) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_rup_paket_final[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_rup_paket_final() //nam[ilin data pake ini
    {
        $this->_get_data_query_rup_paket_final(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rup_paket_final()
    {
        $this->_get_data_query_rup_paket_final(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_rup_paket_final()
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
        $this->db->where('tbl_rup.sts_rup', 1);
        $this->db->where_in('tbl_rup.sts_rup_buat_paket', [1, 2]);
        return $this->db->count_all_results();
    }


    // INI  UNTUK GENERATE SYARAT IZIN TENDER
    public function cek_syarat_izin_usaha($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_rup');
        $this->db->where('tbl_izin_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_izin_usaha($data)
    {
        $this->db->insert('tbl_izin_rup', $data);
        return $this->db->affected_rows();
    }

    public function cek_syarat_izin_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_teknis_rup');
        $this->db->where('tbl_izin_teknis_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_izin_teknis($data)
    {
        $this->db->insert('tbl_izin_teknis_rup', $data);
        return $this->db->affected_rows();
    }

    function insert_rup_excel($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('tbl_rup', $data);
        }
    }
}
