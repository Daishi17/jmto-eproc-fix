<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_count extends CI_Model
{

    public function count_tender_umum($id_manajemenen_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        if ($this->session->userdata('role') == 5) {

            $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
            $this->db->where('tbl_panitia.id_manajemen_user', $id_manajemenen_user);
        } else {

            $this->db->join('tbl_tim_teknis', 'tbl_rup.id_rup = tbl_tim_teknis.id_rup', 'left');
            $this->db->where('tbl_tim_teknis.id_manajemen_user', $id_manajemenen_user);
        }

        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_tender_terbatas($id_manajemenen_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        if ($this->session->userdata('role') == 5) {

            $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
            $this->db->where('tbl_panitia.id_manajemen_user', $id_manajemenen_user);
        } else {

            $this->db->join('tbl_tim_teknis', 'tbl_rup.id_rup = tbl_tim_teknis.id_rup', 'left');
            $this->db->where('tbl_tim_teknis.id_manajemen_user', $id_manajemenen_user);
        }

        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    // PENUNJUKAN LANGSUNG

    public function count_tender_penunjukan_langsung($id_manajemenen_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        if ($this->session->userdata('role') == 5) {

            $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
            $this->db->where('tbl_panitia.id_manajemen_user', $id_manajemenen_user);
        } else {

            $this->db->join('tbl_tim_teknis', 'tbl_rup.id_rup = tbl_tim_teknis.id_rup', 'left');
            $this->db->where('tbl_tim_teknis.id_manajemen_user', $id_manajemenen_user);
        }

        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }
    // END PENUNJUKAN LANGSUNG



    public function count_tender_umum_area($row_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        if ($row_user['role'] == 2) { } else {
            $this->db->where('tbl_rup.id_departemen', $row_user['id_departemen']);
        }
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_tender_terbatas_unit_area($row_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        if ($row_user['role'] == 2) { } else {
            $this->db->where('tbl_rup.id_departemen', $row_user['id_departemen']);
        }
        $this->db->group_by('tbl_rup.id_rup');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_pegawai($id_manajemen_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_pegawai');
        $this->db->join('tbl_manajemen_user', 'tbl_pegawai.id_pegawai = tbl_manajemen_user.id_pegawai', 'left');
        $this->db->where('tbl_manajemen_user.id_manajemen_user', $id_manajemen_user);
        return $this->db->get()->row_array();
    }

    public function get_row_vendor_mengikuti_paket($id_vendor_mengikuti_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', $id_vendor_mengikuti_paket);
        return $this->db->get()->row_array();
    }

    // GET RUP PAKET FINAL
    var $order_paket_tender_umum =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');
    // get nib
    private function _get_data_query_daftar_paket_tender_umum()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_vendor_pemenang = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        // Tender Umum
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $this->db->group_by('tbl_rup.id_rup');
        $i = 0;
        foreach ($this->order_paket_tender_umum as $item) // looping awal
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

                if (count($this->order_paket_tender_umum) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket_tender_umum[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_daftar_paket_tender_umum() //nam[ilin data pake ini
    {
        $this->_get_data_query_daftar_paket_tender_umum(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_daftar_paket_tender_umum()
    {
        $this->_get_data_query_daftar_paket_tender_umum(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_daftar_paket_tender_umum()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        return $this->db->count_all_results();
    }

    var $order_paket_tender_terbatas =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');
    // get nib
    private function _get_data_query_daftar_paket_tender_terbatas()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        // Tender Umum
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_rup');
        $i = 0;
        foreach ($this->order_paket_tender_terbatas as $item) // looping awal
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

                if (count($this->order_paket_tender_terbatas) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket_tender_terbatas[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_daftar_paket_tender_terbatas() //nam[ilin data pake ini
    {
        $this->_get_data_query_daftar_paket_tender_terbatas(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_daftar_paket_tender_terbatas()
    {
        $this->_get_data_query_daftar_paket_tender_terbatas(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_daftar_paket_tender_terbatas()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        return $this->db->count_all_results();
    }


    private function _get_data_query_daftar_paket_tender_juksung()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_diumumkan', 1);
        // Tender Umum
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [9, 10]);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_rup');
        $i = 0;
        foreach ($this->order_paket_tender_terbatas as $item) // looping awal
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

                if (count($this->order_paket_tender_terbatas) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket_tender_terbatas[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_daftar_paket_tender_juksung() //nam[ilin data pake ini
    {
        $this->_get_data_query_daftar_paket_tender_juksung(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_daftar_paket_tender_juksung()
    {
        $this->_get_data_query_daftar_paket_tender_juksung(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_daftar_paket_tender_juksung()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_rup = tbl_vendor_mengikuti_paket.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        return $this->db->count_all_results();
    }

    public function get_penilaian_kinerja_kontruksi_1()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 25);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_2()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 26);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_3()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 27);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_4()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 28);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_5()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 29);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_6()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 30);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_7()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 31);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_8()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 32);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_9()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 33);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_10()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 34);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_11()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 35);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_12()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 36);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_13()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 37);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_14()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 38);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_15()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 39);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_16()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 40);
        return $this->db->get()->row_array();
    }

    public function get_penilaian_kinerja_kontruksi_17()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja');
        $this->db->where('tbl_penilaian_kinerja.id_penilaian_pekerjaan', 41);
        return $this->db->get()->row_array();
    }


    // table untuk

    public function hitung_tender_umum()
    {
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [4, 5, 7, 8]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hitung_tender_terbatas()
    {
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [1, 2, 3, 6]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hitung_tender_juksung()
    {
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_vendor_pemenang !=', NULL);
        $this->db->where_in('tbl_rup.id_jadwal_tender', [9, 10]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hitung_tender_vendor()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_rup.id_vendor_pemenang = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->where('tbl_rup.id_vendor_pemenang !=', null);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
}
