<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_panitia extends CI_Model
{
    // GET RUP PAKET FINAL
    var $order_rup_paket_final =  array('tbl_rup.id_rup', 'tbl_rup.kode_rup', 'tbl_rup.tahun_rup', 'tbl_rup.nama_program_rup', 'kode_departemen', 'tbl_rup.total_pagu_rup', 'tbl_rup.id_rup', 'tbl_rup.id_rup', 'tbl_rup.id_rup');
    // get nib
    private function _get_data_query_rup_paket_final()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_rup.status_paket_panitia', NULL);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
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
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_rup.status_paket_panitia', NULL);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        return $this->db->count_all_results();
    }

    public function update_rup_panitia($id_rup, $data)
    {
        $this->db->where('id_rup', $id_rup);
        $this->db->update('tbl_rup', $data);
    }

    public function get_jadwal($id_url_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_url_rup', $id_url_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_jadwal_rup_tender_terbatas_22_jadwal($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_jadwal_rup', $data);
    }

    // INI UNTUK BAGIAN SYARAT ADMINISTRASI
    public function update_rup($id_url_rup, $data)
    {
        $this->db->where('id_url_rup', $id_url_rup);
        $this->db->update('tbl_rup', $data);
    }

    public function get_syarat_izin_usaha_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_syarat_izin_usaha_tender($id_rup, $data)
    {
        $this->db->where('id_rup', $id_rup);
        $this->db->update('tbl_izin_rup', $data);
    }

    // INI UNTUK SYART KBLI TENDER
    function result_kbli()
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_row_kbli($nama_kbli)
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
        $this->db->where('id_kbli', $nama_kbli);
        $query = $this->db->get();
        return $query->row_array();
    }

    function row_syarat_tender_kbli($id_rup, $id_kbli)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_kbli_tender');
        $this->db->where('tbl_syratat_kbli_tender.id_rup', $id_rup);
        $this->db->where('tbl_syratat_kbli_tender.id_kbli', $id_kbli);
        $query = $this->db->get();
        return $query->row_array();
    }

    function result_kbli_syarat($id_kbli)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_kbli_tender');
        $this->db->join('tbl_kbli', 'tbl_syratat_kbli_tender.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_syratat_kbli_tender.id_kbli', $id_kbli);
        $query = $this->db->get();
        return $query->result_array();
    }



    function result_syarat_tender_kbli($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_kbli_tender');
        $this->db->join('tbl_kbli', 'tbl_syratat_kbli_tender.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->where('tbl_syratat_kbli_tender.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_syarat_tender_kbli($data)
    {
        $this->db->insert('tbl_syratat_kbli_tender', $data);
    }

    public function delete_syarat_tender_kbli($where)
    {
        $this->db->delete('tbl_syratat_kbli_tender', $where);
    }

    // syarat tambahan
    public function tambah_syarat_rup($data)
    {
        $this->db->insert('tbl_syarat_tambahan_rup', $data);
    }
    public function delete_syarat_rup($where)
    {
        $this->db->delete('tbl_syarat_tambahan_rup', $where);
    }

    function result_syarat_tambahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->where('tbl_syarat_tambahan_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }


    function row_syarat_tambahan($id_syarat_tambahan)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->join('tbl_rup', 'tbl_syarat_tambahan_rup.id_rup = tbl_rup.id_rup', 'left');
        $this->db->where('tbl_syarat_tambahan_rup.id_syarat_tambahan', $id_syarat_tambahan);
        $query = $this->db->get();
        return $query->row_array();
    }

    // INI UNTUK SYART SBU TENDER
    function result_sbu()
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_row_sbu($nama_sbu)
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        $this->db->where('id_sbu', $nama_sbu);
        $query = $this->db->get();
        return $query->row_array();
    }

    function row_syarat_tender_sbu($id_rup, $id_sbu)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_sbu_tender');
        $this->db->where('tbl_syratat_sbu_tender.id_rup', $id_rup);
        $this->db->where('tbl_syratat_sbu_tender.id_sbu', $id_sbu);
        $query = $this->db->get();
        return $query->row_array();
    }

    function result_sbu_syarat($id_sbu)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_sbu_tender');
        $this->db->join('tbl_sbu', 'tbl_syratat_sbu_tender.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->where('tbl_syratat_sbu_tender.id_sbu', $id_sbu);
        $query = $this->db->get();
        return $query->result_array();
    }



    function result_syarat_tender_sbu($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_sbu_tender');
        $this->db->join('tbl_sbu', 'tbl_syratat_sbu_tender.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->where('tbl_syratat_sbu_tender.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_syarat_tender_sbu($data)
    {
        $this->db->insert('tbl_syratat_sbu_tender', $data);
    }

    public function delete_syarat_tender_sbu($where)
    {
        $this->db->delete('tbl_syratat_sbu_tender', $where);
    }

    // INI UNTUK BAGIAN SYARAT ADMINISTRASI TEJNIS
    public function get_syarat_izin_teknis_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_teknis_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_syarat_izin_teknis_tender($id_rup, $data)
    {
        $this->db->where('id_rup', $id_rup);
        $this->db->update('tbl_izin_teknis_rup', $data);
    }


    // START KUALIFIKASI DAN DATA VENDOR TERUNDANG
    // cek vendor terundang
    public function cek_syarat_izin_usaha($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_syarat_kbli($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_kbli_tender');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function cek_syarat_sbu($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syratat_sbu_tender');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek_syarat_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_teknis_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_kualifikasi($row_paket)
    {
        $this->db->select('tbl_vendor.nama_usaha,tbl_vendor.kualifikasi_usaha');
        $this->db->from('tbl_vendor');
        if ($row_paket['syarat_tender_kualifikasi'] == 'Besar') {
            $this->db->where('tbl_vendor.kualifikasi_usaha', 'Besar');
        } else if ($row_paket['syarat_tender_kualifikasi'] == 'Menengah Besar') {
            $this->db->where_in('tbl_vendor.kualifikasi_usaha', ['Menengah', 'Besar']);
        } else if ($row_paket['syarat_tender_kualifikasi'] == 'Menengah') {
            $this->db->where('tbl_vendor.kualifikasi_usaha', 'Menengah');
        } else if ($row_paket['syarat_tender_kualifikasi'] == 'Kecil Menengah') {
            $this->db->where_in('tbl_vendor.kualifikasi_usaha', ['Kecil', 'Menengah']);
        } else if ($row_paket['syarat_tender_kualifikasi'] == 'Kecil') {
            $this->db->where('tbl_vendor.kualifikasi_usaha', 'Kecil');
        } else if ($row_paket['syarat_tender_kualifikasi'] == 'Semua') {
            $this->db->where_in('tbl_vendor.kualifikasi_usaha', ['Menengah', 'Besar', 'Kecil']);
        }
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    function data_vendor_lolos_siup_kbli($cek_syarat_kbli)
    {
        $data_kbli_tampung = [];
        foreach ($cek_syarat_kbli as $data_syarat_siup) {
            $data_kbli_tampung[] = $data_syarat_siup['id_kbli'];
        }
        $implode = implode(',', $data_kbli_tampung);
        $data_kbli_id_vendor = explode(",", $implode);
        $this->db->select('tbl_vendor.id_vendor,tbl_vendor_kbli_siup.id_kbli');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_kbli_siup', 'tbl_vendor_kbli_siup.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where_in('tbl_vendor_kbli_siup.id_kbli', $data_kbli_id_vendor);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    // end cek barus kbli siup

    function data_vendor_lolos_nib_kbli($cek_syarat_kbli)
    {
        $data_kbli_tampung = [];
        foreach ($cek_syarat_kbli as $data_syarat_nib) {
            $data_kbli_tampung[] = $data_syarat_nib['id_kbli'];
        }
        $implode = implode(',', $data_kbli_tampung);
        $data_kbli_id_vendor = explode(",", $implode);
        $this->db->select('tbl_vendor.id_vendor,tbl_vendor_kbli_nib.id_kbli');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_kbli_nib', 'tbl_vendor_kbli_nib.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where_in('tbl_vendor_kbli_nib.id_kbli', $data_kbli_id_vendor);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    // end cek barus kbli nib


    function data_vendor_lolos_siujk_kbli($cek_syarat_kbli)
    {
        $data_kbli_tampung = [];
        foreach ($cek_syarat_kbli as $data_syarat_siujk) {
            $data_kbli_tampung[] = $data_syarat_siujk['id_kbli'];
        }
        $implode = implode(',', $data_kbli_tampung);
        $data_kbli_id_vendor = explode(",", $implode);
        $this->db->select('tbl_vendor.id_vendor,tbl_vendor_kbli_siujk.id_kbli');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_kbli_siujk', 'tbl_vendor_kbli_siujk.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where_in('tbl_vendor_kbli_siujk.id_kbli', $data_kbli_id_vendor);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    // end cek barus kbli siujk
    // ini baris cek_kli sbu angga

    function data_vendor_lolos_sbu_kbli($cek_syarat_kbli_sbu)
    {
        $data_kbli_tampung = [];
        foreach ($cek_syarat_kbli_sbu as $data_syarat_sbu) {
            $data_kbli_tampung[] = $data_syarat_sbu['id_sbu'];
        }
        $implode = implode(',', $data_kbli_tampung);
        $data_kbli_id_vendor = explode(",", $implode);
        $this->db->select('tbl_vendor.id_vendor,tbl_vendor_kbli_sbu.id_sbu');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_kbli_sbu', 'tbl_vendor_kbli_sbu.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where_in('tbl_vendor_kbli_sbu.id_sbu', $data_kbli_id_vendor);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_vendor_lolos_spt($cek_syarat_teknis)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.tahun_lapor', $cek_syarat_teknis['tahun_lapor_spt']);
        $this->db->group_by('tbl_vendor_spt.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    function data_vendor_lolos_laporan_keuangan($cek_syarat_teknis)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        if ($cek_syarat_teknis['sts_audit_laporan_keuangan'] == 'Audit') {
            $this->db->where('tbl_vendor_keuangan.tahun_lapor >=', $cek_syarat_teknis['tahun_awal_laporan_keuangan']);
            $this->db->where('tbl_vendor_keuangan.tahun_lapor <=', $cek_syarat_teknis['tahun_akhir_laporan_keuangan']);
            $this->db->where('tbl_vendor_keuangan.jenis_audit', $cek_syarat_teknis['sts_audit_laporan_keuangan']);
        } else {
            $this->db->where('tbl_vendor_keuangan.tahun_lapor >=', $cek_syarat_teknis['tahun_awal_laporan_keuangan']);
            $this->db->where('tbl_vendor_keuangan.tahun_lapor <=', $cek_syarat_teknis['tahun_akhir_laporan_keuangan']);
        }
        $this->db->group_by('tbl_vendor_keuangan.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }


    function data_vendor_lolos_neraca_keuangan($cek_syarat_teknis)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.tahun_mulai >=', $cek_syarat_teknis['tahun_awal_neraca_keuangan']);
        $this->db->where('tbl_vendor_neraca_keuangan.tahun_selesai <=', $cek_syarat_teknis['tahun_akhir_neraca_keuangan']);
        $this->db->group_by('tbl_vendor_neraca_keuangan.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    // end cek barus kbli sbu
    // ini untuk mengabungkan data vendor terundang
    function gabung_keseluruhan_vendor_terundang($array_kbli_siup, $array_kbli_nib)
    {
        // lolos kbli
        $mergedResult = [];

        // kbli siup
        foreach ($array_kbli_siup as $row) {
            $mergedResult[$row['id_vendor']] = $row;
        }
        // kbli nib
        foreach ($array_kbli_nib as $row) {
            $mergedResult[$row['id_vendor']] = $row;
        }

        // result_kbli
        if (isset($mergedResult[$row['id_vendor']])) {
            $mergedResult[$row['id_vendor']] = array_merge($mergedResult[$row['id_vendor']], $row);
        }
        return $mergedResult;
    }


    function gabung_keseluruhan_vendor_terundang_sbu($array_kbli_sbu)
    {
        // lolos kbli
        $mergedResult = [];
        foreach ($array_kbli_sbu as $row) {
            $mergedResult[$row['id_vendor']] = $row;
        }
        //  result_sbu
        if (isset($mergedResult[$row['id_vendor']])) {
            $mergedResult[$row['id_vendor']] = array_merge($mergedResult[$row['id_vendor']], $row);
        }
        return $mergedResult;
    }

    function result_vendor_terundang($syarat_izin_usaha, $cek_syarat_teknis, $data_vendor_lolos_spt, $data_vendor_lolos_laporan_keuangan, $data_vendor_lolos_neraca_keuangan, $data_vendor_terundang_by_kbli,  $rup, $data_vendor_terundang_by_kbli_sbu)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_siup', 'tbl_vendor.id_vendor = tbl_vendor_siup.id_vendor', 'left');
        $this->db->join('tbl_vendor_nib', 'tbl_vendor.id_vendor = tbl_vendor_nib.id_vendor', 'left');
        $this->db->join('tbl_vendor_sbu', 'tbl_vendor.id_vendor = tbl_vendor_sbu.id_vendor', 'left');
        $this->db->join('tbl_vendor_siujk', 'tbl_vendor.id_vendor = tbl_vendor_siujk.id_vendor', 'left');
        $this->db->join('tbl_vendor_skdp', 'tbl_vendor.id_vendor = tbl_vendor_skdp.id_vendor', 'left');
        $this->db->where('tbl_vendor.sts_terundang', 1);
        $this->db->where('tbl_vendor.sts_daftar_hitam', NULL);
        // $this->db->like('tbl_vendor.id_jenis_usaha', $rup['id_jenis_pengadaan']);
        // cek_kualifikasi
        if ($rup['syarat_tender_kualifikasi'] == 'Besar') {
            $this->db->where('tbl_vendor.kualifikasi_usaha', 'Besar');
        } else if ($rup['syarat_tender_kualifikasi'] == 'Menengah Besar') {
            $this->db->where_in('tbl_vendor.kualifikasi_usaha', ['Menengah', 'Besar']);
        } else if ($rup['syarat_tender_kualifikasi'] == 'Menengah') {
            $this->db->where('tbl_vendor.kualifikasi_usaha', 'Menengah');
        } else if ($rup['syarat_tender_kualifikasi'] == 'Kecil Menengah') {
            $this->db->where_in('tbl_vendor.kualifikasi_usaha', ['Kecil', 'Menengah']);
        } else if ($rup['syarat_tender_kualifikasi'] == 'Kecil') {
            $this->db->where('tbl_vendor.kualifikasi_usaha', 'Kecil');
        } else {
            // $this->db->where('tbl_vendor.id_vendor', null);
        }

        // lolos_spt
        if ($cek_syarat_teknis['sts_checked_spt'] == 1) {
            if ($data_vendor_lolos_spt) {
                $id_vendor_terundang_spt = [];
                foreach ($data_vendor_lolos_spt as $row) {
                    $id_vendor_terundang_spt[] = $row['id_vendor'];
                }
                $this->db->where_in('tbl_vendor.id_vendor', $id_vendor_terundang_spt);
            } else { }
        } else { }

        // // lolos_keuangan
        if ($cek_syarat_teknis['sts_checked_laporan_keuangan'] == 1) {
            if ($data_vendor_lolos_laporan_keuangan) {
                $id_vendor_terundang_laporan_keuangan = [];
                foreach ($data_vendor_lolos_laporan_keuangan as $row) {
                    $id_vendor_terundang_laporan_keuangan[] = $row['id_vendor'];
                }
                $this->db->where_in('tbl_vendor.id_vendor', $id_vendor_terundang_laporan_keuangan);
            } else { }
        } else { }

        // // lolos_neraca_keuangan
        if ($cek_syarat_teknis['sts_checked_neraca_keuangan'] == 1) {
            if ($data_vendor_lolos_neraca_keuangan) {
                $id_vendor_terundang_neraca_keuangan = [];
                foreach ($data_vendor_lolos_neraca_keuangan as $row) {
                    $id_vendor_terundang_neraca_keuangan[] = $row['id_vendor'];
                }
                $this->db->where_in('tbl_vendor.id_vendor', $id_vendor_terundang_neraca_keuangan);
            } else { }
        } else { }


        // cek_vendor terundang by_kbli
        if ($data_vendor_terundang_by_kbli) {
            $id_vendor_terundang = array();
            foreach ($data_vendor_terundang_by_kbli as $row) {
                $id_vendor_terundang[] = $row['id_vendor'];
            }
            $this->db->where_in('tbl_vendor.id_vendor', $id_vendor_terundang);
        } else { }


        if ($data_vendor_terundang_by_kbli_sbu) {
            $id_vendor_terundang = array();
            foreach ($data_vendor_terundang_by_kbli_sbu as $row) {
                $id_vendor_terundang[] = $row['id_vendor'];
            }
            $this->db->where_in('tbl_vendor.id_vendor', $id_vendor_terundang);
        } else { }



        // cek siup syart izin
        if ($syarat_izin_usaha['sts_checked_siup'] == 1) {
            if ($syarat_izin_usaha['sts_masa_berlaku_siup'] == 2) {
                // catatan ketika seumur hidup di vendor harus di default tanggalnya ke 2050
                $this->db->where('tbl_vendor_siup.tgl_berlaku >=', $syarat_izin_usaha['tgl_berlaku_siup']);
                $this->db->where_in('tbl_vendor_siup.sts_seumur_hidup', [1, 2]);
            } else {
                $this->db->where('tbl_vendor_siup.tgl_berlaku >=', $syarat_izin_usaha['tgl_berlaku_siup']);
                $this->db->where_in('tbl_vendor_siup.sts_seumur_hidup', [1, 2]);
            }
        } else { }

        // cek nib syart izin
        if ($syarat_izin_usaha['sts_checked_nib'] == 1) {
            if ($syarat_izin_usaha['sts_masa_berlaku_nib'] == 2) {
                $this->db->where('tbl_vendor_nib.tgl_berlaku >=', $syarat_izin_usaha['tgl_berlaku_nib']);
                $this->db->where_in('tbl_vendor_nib.sts_seumur_hidup', [1, 2]);
            } else {
                $this->db->where('tbl_vendor_nib.tgl_berlaku >=', $syarat_izin_usaha['tgl_berlaku_nib']);
                $this->db->where_in('tbl_vendor_nib.sts_seumur_hidup', [1, 2]);
            }
        } else {
            // $this->db->where('tbl_vendor.id_vendor', null);
        }

        // var_dump($syarat_izin_usaha['tgl_berlaku_sbu']);
        // die;
        // cek sbu syart izin
        if ($syarat_izin_usaha['sts_checked_sbu'] == 1) {
            if ($syarat_izin_usaha['sts_masa_berlaku_sbu'] == 2) {
                $this->db->where('tbl_vendor_sbu.tgl_berlaku >=', $syarat_izin_usaha['tgl_berlaku_sbu']);
                $this->db->where_in('tbl_vendor_sbu.sts_seumur_hidup', [1, 2]);
            } else {
                $this->db->where('tbl_vendor_sbu.tgl_berlaku >=', $syarat_izin_usaha['tgl_berlaku_sbu']);
                $this->db->where_in('tbl_vendor_sbu.sts_seumur_hidup', [1, 2]);
            }
        } else {
            // $this->db->where('tbl_vendor.id_vendor', null);
        }


        $query = $this->db->get();
        return $query->result_array();
    }
    // dokumen pengadaan dan dokumen prakualifikasi
    public function insert_dok_pengadaan($data)
    {
        $this->db->insert('tbl_dokumen_pengadaan', $data);
    }

    public function delete_dok_pengadaan($where)
    {
        $this->db->delete('tbl_dokumen_pengadaan', $where);
    }

    public function insert_dok_prakualifikasi($data)
    {
        $this->db->insert('tbl_dokumen_prakualifikasi', $data);
    }


    public function delete_dok_prakualifikasi($where)
    {
        $this->db->delete('tbl_dokumen_prakualifikasi', $where);
    }

    public function get_dokumen_pengadaan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_pengadaan');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_row_dokumen_pengadaan($id_dokumen_pengadaan)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_pengadaan');
        $this->db->where('id_dokumen_pengadaan', $id_dokumen_pengadaan);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_dokumen_pengadaan($data, $where)
    {
        $this->db->update('tbl_dokumen_pengadaan', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_dokumen_prakualifikasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_prakualifikasi');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_dokumen_prakualifikasi($data, $where)
    {
        $this->db->update('tbl_dokumen_prakualifikasi', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_row_dokumen_prakualifikasi($id_dokumen_prakualifikasi)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_prakualifikasi');
        $this->db->where('id_dokumen_prakualifikasi', $id_dokumen_prakualifikasi);
        $query = $this->db->get();
        return $query->row_array();
    }


    // get panitia pengadaan
    public function get_panitia($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->order_by('tbl_panitia.role_panitia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_ketua_sekertaris($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where_in('tbl_panitia.role_panitia', [1, 2]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_panitia_role($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_manajemen_user.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $query = $this->db->get();
        return $query->row_array();
    }

    // get datatable paket draft

    // GET RUP PAKET FINAL
    var $order_paket =  array('tbl_rup.tahun_rup', 'tbl_rup.nama_rup', 'tbl_departemen.nama_departemen', 'tbl_jenis_pengadaan.nama_jenis_pengadaan', 'tbl_metode_pengadaan.nama_metode_pengadaan', 'total_hps_rup', 'tbl_rup.status_paket_panitia', 'tbl_rup.id_rup', 'tbl_rup.id_rup');
    // get nib
    private function _get_data_query_daftar_paket()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
        $this->db->join('tbl_departemen', 'tbl_rup.id_departemen = tbl_departemen.id_departemen', 'left');
        $this->db->join('tbl_section', 'tbl_rup.id_section = tbl_section.id_section', 'left');
        $this->db->join('tbl_rkap', 'tbl_rup.id_rkap = tbl_rkap.id_rkap', 'left');
        $this->db->join('tbl_provinsi', 'tbl_rup.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_rup.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_rup.id_jenis_pengadaan = tbl_jenis_pengadaan.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pengadaan', 'tbl_rup.id_metode_pengadaan = tbl_metode_pengadaan.id_metode_pengadaan', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_rup.id_jenis_anggaran = tbl_jenis_anggaran.id_jenis_anggaran', 'left');
        $this->db->join('mst_ruas', 'tbl_rup.id_ruas = mst_ruas.id_ruas', 'left');
        $this->db->where_in('tbl_rup.status_paket_panitia', [1, 2]);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
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

    public function gettable_daftar_paket() //nam[ilin data pake ini
    {
        $this->_get_data_query_daftar_paket(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_daftar_paket()
    {
        $this->_get_data_query_daftar_paket(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_daftar_paket()
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
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        return $this->db->count_all_results();
    }

    public function get_ruas($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_ruas_rup');
        $this->db->join('mst_ruas', 'tbl_ruas_rup.id_ruas = mst_ruas.id_ruas');
        $this->db->where('tbl_ruas_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    // INI UNTUK BERANDA

    // TENDER UMUM TABLE
    // get datatable paket draft

    // GET RUP PAKET FINAL
    var $order_paket_tender_umum =  array('tahun_rup', 'nama_rup', 'nama_departemen', 'nama_jenis_pengadaan', 'total_hps_rup', 'status_paket_panitia', 'tbl_rup.id_rup');
    // get nib
    private function _get_data_query_daftar_paket_tender_umum()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
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
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 1);
        return $this->db->count_all_results();
    }

    var $order_paket_tender_terbatas =  array('tahun_rup', 'nama_rup', 'nama_departemen', 'nama_jenis_pengadaan', 'total_hps_rup', 'status_paket_panitia', 'tbl_rup.id_rup');
    // get nib
    private function _get_data_query_daftar_paket_tender_terbatas()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
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
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 4);
        return $this->db->count_all_results();
    }
    // PENUNJUKAN LANGSUNG

    var $order_paket_penunjukan_langsung =  array('tahun_rup', 'nama_rup', 'nama_departemen', 'nama_jenis_pengadaan', 'total_hps_rup', 'status_paket_panitia', 'tbl_rup.id_rup');
    // get nib
    private function _get_data_query_daftar_paket_penunjukan_langsung()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $i = 0;
        foreach ($this->order_paket_penunjukan_langsung as $item) // looping awal
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

                if (count($this->order_paket_penunjukan_langsung) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_paket_penunjukan_langsung[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_daftar_paket_penunjukan_langsung() //nam[ilin data pake ini
    {
        $this->_get_data_query_daftar_paket_penunjukan_langsung(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_daftar_paket_penunjukan_langsung()
    {
        $this->_get_data_query_daftar_paket_penunjukan_langsung(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_daftar_paket_penunjukan_langsung()
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
        $this->db->where('tbl_rup.status_paket_panitia', 1);
        $this->db->where('tbl_rup.id_metode_pengadaan', 3);
        return $this->db->count_all_results();
    }

    // END PENUNJUKAN LANGSUNG 


    // get vendor mengikuti

    public function get_pemenang($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_vendor', 'tbl_rup.id_vendor_pemenang = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_mengikuti_paket', 'tbl_vendor.id_vendor = tbl_vendor_mengikuti_paket.id_vendor', 'left');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_mengikuti($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_mengikuti_vendor($id_vendor_mengikuti_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', $id_vendor_mengikuti_paket);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_mengikuti_deal_nego($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_ikut($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_keuangan >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_teknis >', 60);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_peserta_tender_umumkan($data)
    {
        $string = $data['data_vendor_terundang'];
        $data_id_vendor = explode(",", $string);
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where_in('tbl_vendor.id_vendor', $data_id_vendor);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where_in('tbl_vendor.id_vendor', [$id_vendor]);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_lolos_prakualifikasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->join('tbl_vendor', 'tbl_vendor_syarat_tambahan.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.status', 2);
        $this->db->group_by('tbl_vendor_syarat_tambahan.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_lolos_prakualifikasi_asli($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->join('tbl_vendor', 'tbl_vendor_syarat_tambahan.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where_in('tbl_vendor_syarat_tambahan.id_vendor', [$id_vendor]);
        $this->db->group_by('tbl_vendor_syarat_tambahan.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_peserta_tender_ba_pra($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->join('tbl_vendor', 'tbl_vendor_syarat_tambahan.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_ba_pra_lolos($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_keuangan >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_teknis >', 60);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_ba_pra_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_keuangan >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_teknis >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.file1_administrasi !=', null);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deal($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deal_row($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_tender_ba_pra_penawaran_terendah($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_akhir >', 60);
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_ba_pra_penawaran_terendahperingkat1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_tender_count($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        return $this->db->count_all_results();
    }

    // evaluasi vendor

    // GET RUP PAKET FINAL
    var $order_evaluasi =  array('tbl_rup.id_rup', 'tbl_rup.kode_rup', 'tbl_rup.tahun_rup', 'tbl_rup.nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'tbl_rup.id_rup', 'tbl_rup.id_rup', 'tbl_rup.id_rup');
    // get nib
    private function _get_data_query_evaluasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $i = 0;
        foreach ($this->order_evaluasi as $item) // looping awal
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

                if (count($this->order_evaluasi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_evaluasi($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_evaluasi($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_evaluasi($id_rup)
    {
        $this->_get_data_query_evaluasi($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_evaluasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function row_vendor_mengikuti($id_vendor_mengikuti_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', $id_vendor_mengikuti_paket);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_evaluasi($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_vendor_mengikuti_paket', $data);
        return $this->db->affected_rows();
    }


    // get evaluasi penawaran
    private function _get_data_query_evaluasi_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_keuangan >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_teknis >', 60);
        $i = 0;
        foreach ($this->order_evaluasi as $item) // looping awal
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

                if (count($this->order_evaluasi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_evaluasi_penawaran($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_evaluasi_penawaran($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_evaluasi_penawaran($id_rup)
    {
        $this->_get_data_query_evaluasi_penawaran($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_evaluasi_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        return $this->db->count_all_results();
    }

    public function get_min_penawaran($id_rup_post)
    {
        $this->db->select_min('tbl_vendor_mengikuti_paket.nilai_penawaran', 'min_nilai_penawaran');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_udah_ada_table($id_rup_post)
    {
        $this->db->select_min('tbl_vendor_mengikuti_paket.nilai_penawaran', 'min_nilai_penawaran');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_peserta_tender_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        // $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }




    public function get_peserta_tender_nilai_akhir($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_hps <=', 100);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_penawaran_akhir', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // get evaluasi tkdn
    var $order_evaluasi_hea_tkdn =  array('tbl_vendor_mengikuti_paket.id_rup', 'tbl_vendor_mengikuti_paket.nama_usaha', 'tbl_vendor_mengikuti_paket.ev_hea_penawaran', 'tbl_vendor_mengikuti_paket.ev_hea_tkdn', 'tbl_vendor_mengikuti_paket.ev_hea_harga', 'tbl_vendor_mengikuti_paket.ev_hea_peringkat', 'tbl_vendor_mengikuti_paket.ev_hea_keterangan', 'tbl_rup.id_rup');
    private function _get_data_query_evaluasi_hea_tkdn($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $i = 0;
        foreach ($this->order_evaluasi_hea_tkdn as $item) // looping awal
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

                if (count($this->order_evaluasi_hea_tkdn) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi_hea_tkdn[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_evaluasi_hea_tkdn($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_evaluasi_hea_tkdn($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_evaluasi_hea_tkdn($id_rup)
    {
        $this->_get_data_query_evaluasi_hea_tkdn($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_filtered_evaluasi_hea_tkdn($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        return $this->db->count_all_results();
    }

    public function get_peserta_tender_hea_tkdn($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_hps <=', 100);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_akhir !=', NULL);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn !=', NULL);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_hea_harga', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_tender_hea_tkdn_terendah($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_harga !=', NULL);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn_terendah !=', NULL);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    // evaluasi akhir hea
    var $order_evaluasi_akhir_hea =  array('tbl_vendor_mengikuti_paket.id_rup', 'tbl_vendor_mengikuti_paket.nama_usaha', 'tbl_vendor_mengikuti_paket.ev_hea_penawaran', 'tbl_vendor_mengikuti_paket.ev_hea_tkdn', 'tbl_vendor_mengikuti_paket.ev_hea_harga', 'tbl_vendor_mengikuti_paket.ev_hea_peringkat', 'tbl_vendor_mengikuti_paket.ev_hea_keterangan', 'tbl_rup.id_rup');
    private function _get_data_query_evaluasi_akhir_hea($id_rup, $persen_pencatatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn >=', $persen_pencatatan);
        $i = 0;
        foreach ($this->order_evaluasi_akhir_hea as $item) // looping awal
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

                if (count($this->order_evaluasi_akhir_hea) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi_akhir_hea[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_evaluasi_akhir_hea($id_rup, $persen_pencatatan) //nam[ilin data pake ini
    {
        $this->_get_data_query_evaluasi_akhir_hea($id_rup, $persen_pencatatan); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_evaluasi_akhir_hea($id_rup, $persen_pencatatan)
    {
        $this->_get_data_query_evaluasi_akhir_hea($id_rup, $persen_pencatatan); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_filtered_evaluasi_akhir_hea($id_rup, $persen_pencatatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn >=', $persen_pencatatan);
        return $this->db->count_all_results();
    }

    private function _get_data_query_evaluasi_akhir_hea_file1_akhir($id_rup, $persen_pencatatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn_terendah >=', $persen_pencatatan);
        $i = 0;
        foreach ($this->order_evaluasi_akhir_hea as $item) // looping awal
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

                if (count($this->order_evaluasi_akhir_hea) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi_akhir_hea[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_evaluasi_akhir_hea_file1_akhir($id_rup, $persen_pencatatan) //nam[ilin data pake ini
    {
        $this->_get_data_query_evaluasi_akhir_hea_file1_akhir($id_rup, $persen_pencatatan); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_evaluasi_akhir_hea_file1_akhir($id_rup, $persen_pencatatan)
    {
        $this->_get_data_query_evaluasi_akhir_hea($id_rup, $persen_pencatatan); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_filtered_evaluasi_akhir_hea_file1_akhir($id_rup, $persen_pencatatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn >=', $persen_pencatatan);
        return $this->db->count_all_results();
    }


    private function _get_data_query_evaluasi_akhir_hea_file1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $i = 0;
        foreach ($this->order_evaluasi_akhir_hea as $item) // looping awal
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

                if (count($this->order_evaluasi_akhir_hea) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi_akhir_hea[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_evaluasi_akhir_hea_file1($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_evaluasi_akhir_hea_file1($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_evaluasi_akhir_hea_file1($id_rup)
    {
        $this->_get_data_query_evaluasi_akhir_hea_file1($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_filtered_evaluasi_akhir_hea_file1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        return $this->db->count_all_results();
    }

    public function get_min_penawaran_hea($id_rup_post)
    {
        $this->db->select_min('tbl_vendor_mengikuti_paket.ev_hea_harga', 'min_nilai_hea');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', NULL);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_nilai_akhir_hea($id_rup_post)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_hps <=', 100);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_teknis !=', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_nilai_akhir_hea2($id_rup_post)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_hps <=', 100);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_akhir !=', NULL);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_akhir_hea_akhir', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // evaluasi harga terendah
    public function get_min_penawaran_terendah($id_rup_post)
    {
        $this->db->select_min('tbl_vendor_mengikuti_paket.ev_terendah_harga', 'min_nilai_terendah');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_min_penawaran_terendah_peringkat($id_rup_post)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_harga !=', null);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_terendah_harga', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_min_penawaran_terendah2($id_rup_post)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_harga !=', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    // new_evaluasi

    public function get_min_penawaran_terendah_hea_peringkat_akhir($id_rup_post)
    {
        $this->db->select_min('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah', 'min_nilai_terendah');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_min_penawaran_terendah_hea_peringkat_akhir2($id_rup_post)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_min_penawaran_terendah_peringkat_akhir_hea($id_rup_post)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup_post);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', null);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // end evaluasi harga terendah
    // end evaluasi 

    // syarat tambahan
    var $order_syarat_tambahan =  array('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket, tbl_vendor_mengikuti_paket.nama_usaha, tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket,tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket');
    // get nib
    private function _get_data_query_syarat_tambahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $i = 0;
        foreach ($this->order_syarat_tambahan as $item) // looping awal
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

                if (count($this->order_syarat_tambahan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_syarat_tambahan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_rup', 'DESC');
        }
    }

    public function gettable_syarat_tambahan($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_syarat_tambahan($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_syarat_tambahan($id_rup)
    {
        $this->_get_data_query_syarat_tambahan($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_syarat_tambahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        return $this->db->count_all_results();
    }


    var $order_dokumen_syarat_tambahan =  array('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket, tbl_vendor_mengikuti_paket.nama_usaha, tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket,tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket');
    // get nib
    private function _get_data_query_dokumen_syarat_tambahan($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->join('tbl_vendor', 'tbl_vendor_syarat_tambahan.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_syarat_tambahan.nama_syarat_tambahan');
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        $i = 0;
        foreach ($this->order_dokumen_syarat_tambahan as $item) // looping awal
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

                if (count($this->order_dokumen_syarat_tambahan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_dokumen_syarat_tambahan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_syarat_tambahan.id_rup', 'DESC');
        }
    }

    public function gettable_dokumen_syarat_tambahan($id_vendor, $id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_dokumen_syarat_tambahan($id_vendor, $id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_dokumen_syarat_tambahan($id_vendor, $id_rup)
    {
        $this->_get_data_query_dokumen_syarat_tambahan($id_vendor, $id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_dokumen_syarat_tambahan($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function row_vendor_syarat_tambahan($id_vendor_syarat_tambahan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->join('tbl_vendor', 'tbl_vendor_syarat_tambahan.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', $id_vendor_syarat_tambahan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_syarat_tambahan($data, $where)
    {
        $this->db->where($where);
        $this->db->update('tbl_vendor_syarat_tambahan', $data);
    }

    // untuk cek
    public function hitung_total_syarat($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_syarat_tambahan_rup');
        $this->db->where('tbl_syarat_tambahan_rup.id_rup', $id_rup);
        return $this->db->count_all_results();
    }

    public function cek_valid_vendor($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.status', 1);
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        $this->db->group_by('tbl_vendor_syarat_tambahan.nama_syarat_tambahan');
        return $this->db->count_all_results();
    }

    public function cek_valid_belum_dicekvendor($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.status', NULL);
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        $this->db->group_by('tbl_vendor_syarat_tambahan.nama_syarat_tambahan');
        return $this->db->count_all_results();
    }
    public function cek_tidak_valid_dicekvendor($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.status', 2);
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        $this->db->group_by('tbl_vendor_syarat_tambahan.nama_syarat_tambahan');
        return $this->db->count_all_results();
    }


    public function cek_tidak_valid($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.status', 2);
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        $this->db->group_by('tbl_vendor_syarat_tambahan.nama_syarat_tambahan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek_null_syarat($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.status', NULL);
        $this->db->order_by('tbl_vendor_syarat_tambahan.id_vendor_syarat_tambahan', 'DESC');
        $this->db->group_by('tbl_vendor_syarat_tambahan.nama_syarat_tambahan');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function cek_valid_vendor_new($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_syarat_tambahan');
        $this->db->where('tbl_vendor_syarat_tambahan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_syarat_tambahan.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_syarat_tambahan.status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    // end syarat tambahan
    var $order_vendor_mengikuti_paket_penawaran =  array('tbl_rup.id_rup', 'tbl_rup.kode_rup', 'tbl_rup.tahun_rup', 'tbl_rup.nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'tbl_rup.id_rup', 'tbl_rup.id_rup', 'tbl_rup.id_rup');
    private function _get_data_query_vendor_mengikuti_paket_penawaran($id_rup)
    {
        $rup = $this->db->select('*')->where('id_rup', $id_rup)->get('tbl_rup')->row_array();
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        if ($rup['id_jadwal_tender'] == 3 || $rup['id_jadwal_tender'] == 6 || $rup['id_jadwal_tender'] == 8) { } else {
            $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >=', 60);
        }
        $i = 0;
        foreach ($this->order_vendor_mengikuti_paket_penawaran as $item) // looping awal
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

                if (count($this->order_vendor_mengikuti_paket_penawaran) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_vendor_mengikuti_paket_penawaran[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_vendor_mengikuti_paket_penawaran($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_vendor_mengikuti_paket_penawaran($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_vendor_mengikuti_paket_penawaran($id_rup)
    {
        $this->_get_data_query_vendor_mengikuti_paket_penawaran($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_vendor_mengikuti_paket_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        return $this->db->count_all_results();
    }




    var $order_vendor_dokumen_penawaran_file_I =  array('tbl_rup.id_dokumen_pengadaan_vendor', 'tbl_rup.id_dokumen_pengadaan_vendor');
    private function _get_data_query_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_dokumen_pengadaan');
        $this->db->join('tbl_rup', 'tbl_vendor_dokumen_pengadaan.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_dokumen_pengadaan.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_vendor_dokumen_penawaran_file_I as $item) // looping awal
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

                if (count($this->order_vendor_dokumen_penawaran_file_I) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_vendor_dokumen_penawaran_file_I[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_dokumen_pengadaan.id_dokumen_pengadaan_vendor', 'DESC');
        }
    }

    public function gettable_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor)
    {
        $this->_get_data_query_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_vendor_dokumen_penawaran_file_I($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_dokumen_pengadaan');
        $this->db->join('tbl_rup', 'tbl_vendor_dokumen_pengadaan.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_dokumen_pengadaan.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_rup', $id_rup);
        $this->db->where('tbl_vendor_dokumen_pengadaan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }



    var $order_vendor_dokumen_penawaran_file_II =  array('tbl_rup.id_dokumen_pengadaan_vendor', 'tbl_rup.id_dokumen_pengadaan_vendor');
    private function _get_data_query_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $i = 0;
        foreach ($this->order_vendor_dokumen_penawaran_file_II as $item) // looping awal
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

                if (count($this->order_vendor_dokumen_penawaran_file_II) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_vendor_dokumen_penawaran_file_II[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_rup', 'DESC');
        }
    }

    public function gettable_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor)
    {
        $this->_get_data_query_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_vendor_dokumen_penawaran_file_II($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    // berita acara pengadaan
    public function insert_ba_tender($data)
    {
        $this->db->insert('tbl_ba_tender', $data);
    }

    public function get_ba_tender($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_ba_tender');
        $this->db->where('tbl_ba_tender.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hapus_ba_tender($id_berita_acara_tender)
    {
        $this->db->where('tbl_ba_tender.id_berita_acara_tender', $id_berita_acara_tender);
        $this->db->delete('tbl_ba_tender');
    }
    // end berita acara pengadaan

    // get pesertam pemenang
    public function get_peserta_pemenang_ketika_tidak_ada_negosiasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_penawaran_peringkat', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_pemenang_ketika_ada_negosiasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_penawaran_peringkat', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_rank1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_peringkat', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_rank1_dengan_negosiasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $query = $this->db->get();
        return $query->row_array();
    }



    public function get_peserta_pemenang_biaya($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_pemenang_pra_1_file_biaya($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_keuangan >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_teknis >', 60);
        $this->db->order_by('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_peserta_rank1_biaya($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_rank1_pra_1_file_biaya($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_peserta_rank1_biaya_dengan_negosiasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi', 'deal');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_result_vendor_sanggahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.file_sanggah_pra !=', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_vendor_negosiasi_rank1_pringkat_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_peringkat', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_vendor_negosiasi_rank1_pringkat_biaya($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_vendor_negosiasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_vendor_negosiasi_pra_1_file($id_rup)
    {
        // Query untuk mendapatkan hasil teratas tanpa mempertimbangkan sts_deal_negosiasi
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_keuangan >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_teknis >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->result_array();

        // Jika hasil pertama ditemukan dan sts_deal_negosiasi tidak kosong, langsung kembalikan hasilnya
        if (!empty($result) && $result[0]['sts_deal_negosiasi'] == null) {
            return $result;
        } else {
            // Jika hasil pertama kosong atau sts_deal_negosiasi kosong, cari hasil lain dengan sts_deal_negosiasi yang tidak kosong
            $this->db->select('*');
            $this->db->from('tbl_vendor_mengikuti_paket');
            $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
            $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
            $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
            $this->db->where('tbl_vendor_mengikuti_paket.sts_deal_negosiasi IS NOT NULL');
            $query = $this->db->get();
            $result = $query->result_array();

            // Kembalikan hasil yang ditemukan, mungkin hasilnya kosong jika tidak ada yang ditemukan
            return $result;
        }
    }


    public function get_result_vendor_negosiasi_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_peringkat', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    // 

    public function get_result_vendor_negosiasi_1_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_peringkat', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_2_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_peringkat', 2);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_3_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_peringkat', 3);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 2);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat', 3);
        $query = $this->db->get();
        return $query->row_array();
    }


    // PRA 1 FILE
    public function get_result_vendor_negosiasi_pra_1_file_1_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_pra_1_file_2_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 2);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_pra_1_file_3_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 3);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_pra_1_file_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_pra_1_file_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 2);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_result_vendor_negosiasi_pra_1_file_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_harga_hea_terendah !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_peringkat_akhir_hea', 3);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_vendor_negosiasi($id_vendor_mengikuti_paket)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_vendor_mengikuti_paket', $id_vendor_mengikuti_paket);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jumlah_peserta_negosiasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.sts_mengikuti_paket', 1);
        return $this->db->count_all_results();
    }

    public function jumlah_peserta_negosiasi_negosiasi_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_penawaran_hps <=', 100);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_akhir_hea_akhir !=', NULL);
        $this->db->where('tbl_vendor_mengikuti_paket.nilai_penawaran !=', 0);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn !=', NULL);
        return $this->db->count_all_results();
    }

    public function jumlah_peserta_negosiasi_negosiasi_teknis_pra_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_harga !=', NULL);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_terendah_hps !=', NULL);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_hea_tkdn_terendah !=', NULL);
        return $this->db->count_all_results();
    }


    public function get_result_vendor_sanggahan_pra($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_sanggah_detail');
        $this->db->join('tbl_vendor', 'tbl_sanggah_detail.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_sanggah_detail.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_mengikuti_sanggah_pra($data, $where)
    {
        $this->db->update('tbl_sanggah_detail', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_result_vendor_sanggahan_akhir($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_sanggah_detail_akhir');
        $this->db->join('tbl_vendor', 'tbl_sanggah_detail_akhir.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_sanggah_detail_akhir.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_mengikuti_sanggah_akhir($data, $where)
    {
        $this->db->update('tbl_sanggah_detail_akhir', $data, $where);
        return $this->db->affected_rows();
    }



    public function update_mengikuti($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }


    // jadwal ngeplus
    public function get_jadwal_plus_id_result($id_jadwal_rup, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_jadwal_rup >=', $id_jadwal_rup);
        $this->db->where('id_rup', $id_rup);
        $this->db->order_by('id_jadwal_rup', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_jadwal_plus_id_row($id_jadwal_rup, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_jadwal_rup >=', $id_jadwal_rup);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pengumuman_pasca_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pengumuman Tender Terbatas');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pengumuman($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pengumuman Pengadaan');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pengumuman_terbatas_1file($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pengumuman, Pendaftaran dan Download Dokumen');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function jadwal_pengumuman_juksung($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Pengumuman, Pendaftaran dan Download Dokumen');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function jadwal_pengumuman_penandatangan_kontrak($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_rup', $id_rup);
        $this->db->like('nama_jadwal_rup', 'Penandatanganan Kontrak');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_jadwal_min_id_result($id_jadwal_rup, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_jadwal_rup >=', $id_jadwal_rup);
        $this->db->where('id_rup', $id_rup);
        $this->db->where('waktu_mulai !=', NULL);
        $this->db->where('waktu_selesai !=', NULL);
        $this->db->order_by('id_jadwal_rup', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_jadwal_min_id_row($id_jadwal_rup, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_jadwal_rup >=', $id_jadwal_rup);
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_izin_prinsip($data)
    {
        $this->db->insert('tbl_izin_prinsip', $data);
    }

    public function get_dokumen_izin_prinsip($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_prinsip');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_izin_prinsip($where)
    {
        $this->db->delete('tbl_izin_prinsip', $where);
    }

    // cek vendor mengikuti 
    public function cek_vendor_mengikuti($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_vendor_mengikuti_penunjukan_langsung($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function insert_vendor_mengikuti($data)
    {
        $this->db->insert('tbl_vendor_mengikuti_paket', $data);
    }

    public function result_vendor_terpilih($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_vendor_mengikuti($where)
    {
        $this->db->delete('tbl_vendor_mengikuti_paket', $where);
    }

    function get_yang_dapat_mengumumkan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('tbl_manajemen_user.role', 5);
        $this->db->where('tbl_manajemen_user.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        $query = $this->db->get();
        return $query->row_array();
    }



    // INI UNTUK VALIDASI SIMPAN PADA FORM DAFTAR PAKET


    public function validasi_row_jadwal($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('tbl_jadwal_rup.id_rup', $id_rup);
        $this->db->where('tbl_jadwal_rup.waktu_mulai !=', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function cek_jika_ada_perubahan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('tbl_jadwal_rup.id_rup', $id_rup);
        $this->db->where('tbl_jadwal_rup.sts_perubahan_jadwal', 1);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function validasi_dok_izin_prinsip($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_izin_prinsip');
        $this->db->where('tbl_izin_prinsip.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function validasi_rup($id_rup)
    {

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function validasi_hps($id_rup)
    {

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.total_hps_rup', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function validasi_jenis_kontrak($id_rup)
    {

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.jenis_kontrak', NULL);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function validasi_beban_tahun_anggaran($id_rup)
    {

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.beban_tahun_anggaran', NULL);
        $query = $this->db->get();
        return $query->row_array();
    }
    // bobot_nilai
    public function validasi_bobot_nilai($id_rup)
    {

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.bobot_nilai', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    // bobot_teknis
    public function validasi_bobot_teknis($id_rup)
    {

        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.bobot_teknis', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    // bobot_biaya
    public function validasi_bobot_biaya($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.bobot_biaya', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    // syarat_tender_kualifikasi
    public function validasi_syarat_tender_kualifikasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('tbl_rup.id_rup', $id_rup);
        $this->db->where('tbl_rup.syarat_tender_kualifikasi', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }

    // ba sampul 1
    private function _get_data_query_sampul1_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.file1_administrasi !=', null);
        $i = 0;
        foreach ($this->order_evaluasi as $item) // looping awal
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

                if (count($this->order_evaluasi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_evaluasi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rup.id_rup', 'DESC');
        }
    }

    public function gettable_sampul1_penawaran($id_rup) //nam[ilin data pake ini
    {
        $this->_get_data_query_sampul1_penawaran($id_rup); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_sampul1_penawaran($id_rup)
    {
        $this->_get_data_query_sampul1_penawaran($id_rup); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_sampul1_penawaran($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_rup', 'tbl_vendor_mengikuti_paket.id_rup = tbl_rup.id_rup', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.id_rup', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.ev_kualifikasi_akhir >', 60);
        $this->db->where('tbl_vendor_mengikuti_paket.file1_administrasi !=', null);
        return $this->db->count_all_results();
    }

    public function get_ba_evaluasi_teknis($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_ba_teknis_detail');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function panitia_mengikuti_update($data, $where)
    {
        $this->db->update('tbl_panitia', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_row_alasan_jadwal($id_jadwal_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal_rup');
        $this->db->where('id_jadwal_rup', $id_jadwal_rup);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_row_rup($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_url_rup($id_url_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->where('id_url_rup', $id_url_rup);
        $query = $this->db->get();
        return $query->row_array();
    }

    var $order_keuangan =  array('id_vendor_keuangan', 'tahun_lapor', 'file_laporan_auditor', 'file_laporan_keuangan', 'sts_validasi', 'id_vendor_keuangan');
    private function _get_data_query_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->join('tbl_vendor', 'tbl_vendor_keuangan.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_keuangan as $item) // looping awal
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

                if (count($this->order_keuangan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_keuangan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_keuangan.id_vendor', 'ASC');
        }
    }

    public function gettable_keuangan($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_keuangan($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_keuangan($id_vendor)
    {
        $this->_get_data_query_keuangan($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    var $order_neraca_keuangan = array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

    private function _get_data_query_neraca_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->join('tbl_vendor', 'tbl_vendor_neraca_keuangan.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_neraca_keuangan as $item) // looping awal
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

                if (count($this->order_neraca_keuangan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengalaman_excel[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_neraca_keuangan.id_vendor', 'DESC');
        }
    }

    public function gettable_neraca_keuangan($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_neraca_keuangan($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_neraca_keuangan($id_vendor)
    {
        $this->_get_data_query_neraca_keuangan($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_data_neraca_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    var $order_pengalaman =  array('tbl_vendor_pengalaman.id_vendor', 'nama_pekerjaan', 'instansi_pemberi', 'tanggal_kontrak', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'tbl_vendor_pengalaman.id_vendor', 'tbl_vendor_pengalaman.id_vendor', 'tbl_vendor_pengalaman.id_vendor');

    private function _get_data_query_pengalaman_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->join('tbl_vendor', 'tbl_vendor_pengalaman.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pengalaman.id_pengalaman', 'DESC');
        $i = 0;
        foreach ($this->order_pengalaman as $item) // looping awal
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

                if (count($this->order_pengalaman) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengalaman[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pengalaman.id_pengalaman', 'DESC');
        }
    }

    public function gettable_pengalaman_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pengalaman_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pengalaman_manajerial($id_vendor)
    {
        $this->_get_data_query_pengalaman_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengalaman_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_ba_1($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_pembuktian_kualifikasi', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_2($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_evaluasi', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_3($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_sampul1', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_4($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_undangan', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_5($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_evaluasi_teknis', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_6($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_sampul2', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_7($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_negosiasi', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_8($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_klarifikasi_harga', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_9($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_penjelasan', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_10($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_pemenang', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_11($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_pengumuman_hasil_evaluasi_teknis', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_12($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_penjelasan_kualifikasi', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ba_13($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('sts_ba_sampul1_2', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    private function _get_data_query_rup_paket_final_panitia()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_rup.status_paket_panitia', NULL);
        $this->db->where('tbl_rup.sts_rup_buat_paket', 2);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
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

    public function gettable_rup_paket_final_panitia() //nam[ilin data pake ini
    {
        $this->_get_data_query_rup_paket_final_panitia(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_rup_paket_final_panitia()
    {
        $this->_get_data_query_rup_paket_final_panitia(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_rup_paket_final_panitia()
    {
        $this->db->select('*');
        $this->db->from('tbl_rup');
        $this->db->join('tbl_panitia', 'tbl_rup.id_rup = tbl_panitia.id_rup', 'left');
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
        $this->db->where('tbl_rup.status_paket_panitia', NULL);
        $this->db->where('tbl_rup.sts_rup_buat_paket', 2);
        $this->db->where('tbl_panitia.id_manajemen_user', $this->session->userdata('id_manajemen_user'));
        return $this->db->count_all_results();
    }
}
