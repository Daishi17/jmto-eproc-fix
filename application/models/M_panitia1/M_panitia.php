<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_panitia extends CI_Model
{
    // GET RUP PAKET FINAL
    var $order_rup_paket_final =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');
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
        $this->db->where('tbl_rup.sts_rup_buat_paket', 2);
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

    public function update_jadwal($data, $where)
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
        $this->db->where('nama_kbli', $nama_kbli);
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
        $this->db->join('tbl_paket', 'tbl_syarat_tambahan_rup.id_rup = tbl_paket.id_rup', 'left');
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
        $this->db->where('nama_sbu', $nama_sbu);
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
    private function cek_kbli_siup_vendor()
    {
        $this->db->select('tbl_vendor.id_vendor,tbl_vendor_kbli_siup.id_kbli');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_kbli_siup', 'tbl_vendor_kbli_siup.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    function data_vendor_lolos_siup_kbli($cek_syarat_kbli)
    {
        $cek_kbli_vendor_siup = $this->cek_kbli_siup_vendor();
        $tampung_data_vendor_siup = [];
        foreach ($cek_syarat_kbli as $data_syarat) {
            foreach ($cek_kbli_vendor_siup as $data_siup_vendor) {
                if ($data_syarat['id_kbli'] == $data_siup_vendor['id_kbli']) {
                    $tampung_data_vendor_siup[] = $data_siup_vendor;
                }
            }
        }
        return $tampung_data_vendor_siup;
    }
    private function cek_kbli_siujk_vendor()
    {
        $this->db->select('tbl_vendor.id_vendor,tbl_vendor_kbli_siujk.id_kbli');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_vendor_kbli_siujk', 'tbl_vendor_kbli_siujk.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->group_by('tbl_vendor.id_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }
    function data_vendor_lolos_siujk_kbli($cek_syarat_kbli)
    {
        $cek_kbli_vendor_siujk = $this->cek_kbli_siujk_vendor();
        $tampung_data_vendor_siujk = [];
        foreach ($cek_syarat_kbli as $data_syarat_siujk) {
            foreach ($cek_kbli_vendor_siujk as $data_siujk_vendor) {
                if ($data_syarat_siujk['id_kbli'] == $data_siujk_vendor['id_kbli']) {
                    $tampung_data_vendor_siujk[] = $data_siujk_vendor;
                }
            }
        }
        return $tampung_data_vendor_siujk;
    }

    // ini untuk mengabungkan data vendor terundang
    function gabung_keseluruhan_vendor_terundang($array_kbli_siup, $array_kbli_siujk)
    {
        $mergedResult = [];
        foreach ($array_kbli_siup as $row) {
            $mergedResult[$row['id_vendor']] = $row;
        }

        foreach ($array_kbli_siujk as $row) {
            if (isset($mergedResult[$row['id_vendor']])) {
                $mergedResult[$row['id_vendor']] = array_merge($mergedResult[$row['id_vendor']], $row);
            }
        }
        return $mergedResult;
    }

    // function result_vendor_terundang($syarat_izin_usaha, $data_vendor_terundang_by_kbli)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_vendor');
    //     $this->db->join('tbl_vendor_siup', 'tbl_vendor_siup.id_vendor = tbl_vendor.id_vendor', 'left');
    //     $id_vendor_terundang = [];
    //     foreach ($data_vendor_terundang_by_kbli as $row) {
    //         $id_vendor_terundang[] = $row['id_vendor'];
    //     }
    //     $this->db->where_in('tbl_vendor.id_vendor', $id_vendor_terundang);
    //     // cek siup
    //     if ($syarat_izin_usaha['sts_checked_siup'] == 1) {
    //         if ($syarat_izin_usaha['sts_masa_berlaku_siup'] == 1) {
    //             $this->db->where('tbl_vendor_siup.tgl_berlaku <=', $syarat_izin_usaha['tgl_berlaku_siup']);
    //         } else {
    //             $this->db->where('tbl_vendor_siup.sts_seumur_hidup', $syarat_izin_usaha['sts_masa_berlaku_siup']);
    //         }
    //     }
    //     $this->db->group_by('tbl_vendor.id_vendor');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

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

    public function get_dokumen_prakualifikasi($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_dokumen_prakualifikasi');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get panitia pengadaan
    public function get_panitia($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->join('tbl_manajemen_user', 'tbl_panitia.id_manajemen_user = tbl_manajemen_user.id_manajemen_user', 'left');
        $this->db->join('tbl_pegawai', 'tbl_manajemen_user.id_pegawai = tbl_pegawai.id_pegawai', 'left');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get datatable paket draft

    // GET RUP PAKET FINAL
    var $order_paket =  array('id_rup', 'kode_rup', 'tahun_rup', 'nama_program_rup', 'kode_departemen', 'total_pagu_rup', 'id_rup', 'id_rup', 'id_rup');
    // get nib
    private function _get_data_query_daftar_paket()
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
}
