<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_vendor_model extends CI_Model
{
    private function _get_data_query_vendor_pemenang($area_agency)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_paket.id_unit_kerja', $area_agency);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        if (isset($_POST['id_metode_pemilihan'], $_POST['id_jenis_pengadaan']) && $_POST['id_metode_pemilihan'] != '' && $_POST['id_jenis_pengadaan'] != '') {
            $this->db->like('tbl_paket.id_metode_pemilihan', $_POST['id_metode_pemilihan']);
            $this->db->like('tbl_paket.id_jenis_pengadaan', $_POST['id_jenis_pengadaan']);
        }
        if (isset($_POST['search']['value'])) {
            $this->db->like('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', 'DESC');
        }
    }

    public function getdatatable_vendor_pemenang($area_agency)
    {
        $this->_get_data_query_vendor_pemenang($area_agency);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_data_vendor_pemenang($area_agency)
    {
        $this->_get_data_query_vendor_pemenang($area_agency);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_vendor_pemenang()
    {
        $this->db->from('tbl_vendor_mengikuti_paket');
        return $this->db->count_all_results();
    }

    public function get_paket_data_vendor_pemenang($area_agency, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_unit_kerja.id_unit_kerja', $area_agency);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_paket_data_vendor_pemenang_mengikuti_paket($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function lokasi_pekerjaan($id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_lokasi_pekerjaan');
        $this->db->join('tbl_provinsi', 'tbl_lokasi_pekerjaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_lokasi_pekerjaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('id_rup', $id_rup);
        $query = $this->db->get();
        return $query->result_array();
    }

    // INI BAGIAN PEKERJAAN KONTRUKSI==================================================================

    public function result_data_tbl_penilaian_kontruksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_kontruksi');
        $query = $this->db->get();
        return $query->result_array();
    }

    // ININ untuk penilaian kinerja vendor
    public function result_data_tbl_penilaian_konsultan_kontruksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_konsultan_kontruksi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_data_tbl_penilaian_konsultan_jasa_lainya_kontruksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_jasa_lainya');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_data_tbl_penilaian_konsultan_penyedia_barang_kontruksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_penyedia_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_data_tbl_penilaian_pengawasan_konsultan_kontruksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_konsultan_pengawasan_kontruksi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_data_tbl_penilaian_kajian_konsultan_kontruksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_konsultan_kajian_kontruksi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_pekerjaan_kontruksi_aspek($data, $where)
    {
        $this->db->update('tbl_detail_penilaian_kinerja', $data, $where);
        return $this->db->affected_rows();
    }
    public function update_pekerjaan_konsultan_kontruksi($data, $where)
    {
        $this->db->update('tbl_detail_penilaian_kinerja', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_ke_vendor($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }
    // BY NAME

    public function jika_sudah_di_tambah_pekerjaan_kontruksi($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function jika_sudah_di_tambah_pekerjaan_konsultan_kontruksi($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jika_sudah_di_tambah_pekerjaan_konsultan_penyedia_barang_kontruksi($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function jika_sudah_di_tambah_pekerjaan_konsultan_jasa_lainya_kontruksi($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function jika_sudah_di_tambah_pekerjaan_pengawasan_konsultan_kontruksi($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jika_sudah_di_tambah_pekerjaan_kajian_konsultan_kontruksi($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_1($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Ketaatan dan kelengkapan dalam memenuhi Administrasi Pekerjaan sesuai Kontrak (Time Schedule, Shop Drawing, Asbuilt Drawing, LaporanLaporan, Buku Tamu, Buku Direksi, Buku Bahan, Buku,Tenaga,Perizinan,dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_2($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Ketaatan dalam penyelesaian Administrasi Keuangan (termin, pajak, jaminan, retribusi, dll).                                                    ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_3($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Kelengkapan Kantor Administrasi: Gudang, Kantor Direksi, Papan Nama, dll. ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_4($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_5($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Progress/Prestasi Pekerjaan sesuai Jadwal dan Tidak ada keterlambatan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_6($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Uji Fungsi/Test Laboratorium,/Uji Teknis/Kesesuaian Teknis dilaksanakan sesuai Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_7($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Kualitas Pekerjaan sesuai dengan Spesifikasi Teknis.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_8($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Kuantitas Pekerjaan sesuai dengan Daftar Kuantitas dan Harga.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_9($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Ketersediaan Bahan selama Pelaksanaan Pekerjaan terpenuhi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_10($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Bahan yang digunakan sesuai dengan Spesifikasi Teknis.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_11($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Jumlah Tenaga kerja dan peralatan selama Waktu Pelaksanaan pekerjaan terpenuhi. ');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_12($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Kemampuan/Keahlian tenaga kerja sesuai ketentuan Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_13($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Kapasitas dan Jenis Peralatan sesuai ketentuan Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_kontruksi_14($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Kelengkapan K3 selama Pelaksanaan Pekerjaan terpenuhi: Peralatan, Bahan, Pakaian, Sepatu, Helm, Rambu-rambu, Alat Pengaman, dan Catatan kejadian.');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function cek_jika_ada_penilaian_kontruksi_15($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Perlindungan tenaga kerja dipenuhi (BPJS, asuransi, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function cek_jika_ada_penilaian_kontruksi_16($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Adanya Sosialisasi/Pem beritahuan ke lingkungan sekitar pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function cek_jika_ada_penilaian_kontruksi_17($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_detail_pekerjaan', 'Tidak ada Komplain/Permasalahan dengan Lingkungan sekitar.');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function total_nilai_pekerjan_kontruksi($id_vendor, $id_rup)
    {
        $this->db->select_sum('nilai_akhir_pekerjaan_kontruksi');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->from('tbl_detail_penilaian_kinerja');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function by_id_vendor_pemenang_pekerjaan_kontruksi($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }
    // UPDATE
    public function update_pekerjaan_kontruksi_vendor($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }
    // update ke tbl_vendor
    public function update_status_warning_pekerjaan_kontruksi($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    // END PEKERJAAN KONTRUKSIIII==========================================================================================










    // INI BAGIAN PEKERJAAN KONSULTAN KONTRUKSI==================================================================
    public function tambah_pekerjaan_konsultan_kontruksi($data)
    {
        $this->db->insert('tbl_penilaian_kinerja_pekerjaan_konsultan_kontruksi', $data);
        return $this->db->affected_rows();
    }
    public function update_pekerjaan_konsultan_kontruksi_aspek($data, $where)
    {
        $this->db->update('tbl_penilaian_kinerja_pekerjaan_konsultan_kontruksi', $data, $where);
        return $this->db->affected_rows();
    }
    // BY NAME
    public function cek_jika_ada_penilaian_konsultan_kontruksi_1($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Kantor, Studio, dan sarana prasarana perusahan memadai untuk melaksanakan pekerjaan/sesuai kualifikasi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_2($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Ketaatan dalam penyelesaian Administrasi Keuangan(termin, pajak, jaminan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_3($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Organisasi (pengurus, tenaga ahli, tenaga administrasi, tenaga teknis) perusahan memadai/sesuai dengan kualifikasi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_4($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Tenaga Ahli dan Tenaga Teknis yang ditugaskan sesuai dengan yang diusulkan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_5($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Tenaga Ahli dan Tenaga Teknis memiliki kemampuan sesuai dengan kualifikasi pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_6($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Kualitas Hasil Pekerjaan Konstruksi yang dilaksanakan Pelaksana sesuai Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_7($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Rapat Monitoring dan Evaluasi Pekerjaan dilaksanakan secara periodik dapat ditepati.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_8($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Memberikan Instruksi-Instruksi kepada Pelaksana sesuai Prosedur Tetap (Protap)/Manual Mutu/SOP.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_9($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Laporan-laporan dan Produk dibuat tepat waktu/tidak ada keterlambatan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_10($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_11($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Prestasi Pekerjaan sesuai Jadwal dan Tidak ada keterlambatan (Progress pekerjaan).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_12($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Penugasan Tenaga kerja selama Waktu Pelaksanaan pekerjaan terpenuhi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_13($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Melakukan koordinasi dan konsultasi rutin dengan pengguna jasa.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kontruksi_14($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Sarana Prasarana (Peralatan) selama pelaksanaan pekerjaan memadai/sesuai ketentuan.');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function cek_jika_ada_penilaian_konsultan_kontruksi_15($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kontruksi_detail', 'Selama pelaksanaan pekerjaan tidak ada teguran,peringatan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function total_nilai_pekerjan_konsultan_kontruksi($id_vendor, $id_rup)
    {
        $this->db->select_sum('nilai_akhir_pekerjaan_konsultan_kontruksi');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->from('tbl_penilaian_kinerja_pekerjaan_konsultan_kontruksi');
        $query = $this->db->get();
        return $query->row_array();
    }
    public function by_id_vendor_pemenang_pekerjaan_konsultan_kontruksi($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }
    // UPDATE
    public function update_pekerjaan_konsultan_kontruksi_vendor($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }
    // update ke tbl_vendor
    public function update_status_warning_pekerjaan_konsultan_kontruksi($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    // END PEKERJAAN KONSULTAN KONTRUKSI==========================================================================================




    // INI BAGIAN PEKERJAAN KONSULTAN KAJIAN KONTRUKSI==================================================================
    // BY NAME
    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_1($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Ketaatan dan kelengkapan dalam memenuhi Administrasi Pekerjaan (Laporan-Laporan, Produk perencanaan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_2($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Ketaatan dalam penyelesaian Adm inistrasi Keuangan (termin, pajak, jaminan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_3($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Kantor, Studio, Organisasi, dan Sarana prasarana perusahaan memadai untuk melaksanakan pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_4($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Tenaga Ahli dan Tenaga Teknis yang ditugaskan sesuai dengan yang diusulkan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_5($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Tenaga Ahli dan Tenaga Teknis memiliki kemampuan sesuai dengan kualifikasi pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_6($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Hasil Perencanaan memenuhi persyaratan, standar dan kualitas sesuai ketentuan dalam kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_7($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Kuantitas Pekerjaan sesuai dengan ketentuan kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_8($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Hasil Perencanaan dapat diaplikasikan dengan baik dan tidak banyak perubahan/revisi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_9($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Adanya Inovasi dan Alih Teknologi dalam perencanaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_10($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_11($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Progres/Prestasi Pekerjaan sesuai Jadwal dan Tidak ada keterlambatan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_12($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Jadwal presentasi laporan, FGD, Konsultasi publik dilaksanakan sesuai dengan rencana.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_13($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Kehadiran Tenaga Ahli selama presentasi, FGD,Konsultasi publik dapat terpenuhi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_kajian_kontruksi_14($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_kajian_kontruksi_detail', 'Melaksanakan konsultasi rutin dengan pengguna jasa selama pelaksanaan pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function by_id_vendor_pemenang_pekerjaan_konsultan_kajian_kontruksi($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }
    // UPDATE
    public function update_pekerjaan_konsultan_kajian_kontruksi_vendor($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }
    // update ke tbl_vendor
    public function update_status_warning_pekerjaan_konsultan_kajian_kontruksi($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    // END PEKERJAAN KONSULTAN KAJIAN KONTRUKSI==========================================================================================


    // BY NAME
    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_1($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Ketaatan dan kelengkapan dalam memenuhi Administrasi Pekerjaan (Laporan-Laporan, Produk perencanaan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_2($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Ketaatan dalam penyelesaian Adm inistrasi Keuangan (termin, pajak, jaminan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_3($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Kantor, Studio, Organisasi, dan Sarana prasarana perusahaan memadai untuk melaksanakan pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_4($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Tenaga Ahli dan Tenaga Teknis yang ditugaskan sesuai dengan yang diusulkan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_5($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Tenaga Ahli dan Tenaga Teknis memiliki kemampuan sesuai dengan kualifikasi pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_6($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Hasil Perencanaan memenuhi persyaratan, standar dan kualitas sesuai ketentuan dalam kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_7($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Kuantitas Pekerjaan sesuai dengan ketentuan kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_8($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Hasil Perencanaan dapat diaplikasikan dengan baik dan tidak banyak perubahan/revisi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_9($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Adanya Inovasi dan Alih Teknologi dalam perencanaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_10($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam Kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_11($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Progres/Prestasi Pekerjaan sesuai Jadwal dan Tidak ada keterlambatan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_12($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Pengawasan Berkala dilakukan rutin sesuai dengan ketentuan kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_13($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Tenaga kerja yang ditugaskan memadai untuk pengawasan berkala.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_14($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Perubahan gambar, spek, RAB, dan permasalahan dalam pelaksanaan segera ditindaklajuti.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_konsultan_pengawasan_kontruksi_15($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_konsultan_pengawasan_kontruksi_detail', 'Selama pelaksanaan pekerjaan tidak ada teguran,peringatan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function by_id_vendor_pemenang_pekerjaan_konsultan_pengawasan_kontruksi($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }
    // UPDATE
    public function update_pekerjaan_konsultan_pengawasan_kontruksi_vendor($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }
    // update ke tbl_vendor
    public function update_status_warning_pekerjaan_konsultan_pengawasan_kontruksi($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    // END PEKERJAAN KONSULTAN PENGAWASAN KONTRUKSI==========================================================================================







    // INI BAGIAN PEKERJAAN JASA LAINYA==================================================================
    public function tambah_pekerjaan_jasa_lainya($data)
    {
        $this->db->insert('tbl_penilaian_kinerja_pekerjaan_jasa_lainya', $data);
        return $this->db->affected_rows();
    }
    public function update_pekerjaan_jasa_lainya_aspek($data, $where)
    {
        $this->db->update('tbl_penilaian_kinerja_pekerjaan_jasa_lainya', $data, $where);
        return $this->db->affected_rows();
    }
    // BY NAME
    public function cek_jika_ada_penilaian_jasa_lainya_1($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Kantor, Studio, dan sarana prasarana perusahan memadai untuk melaksanakan pekerjaan/sesuai kualifikasi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_2($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Ketaatan dalam penyelesaian Administrasi Keuangan (termin, pajak, jaminan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_3($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Organisasi (pengurus, tenaga ahli, tenaga administrasi, tenaga teknis) perusahan memadai/sesuai dengan kualifikasi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_4($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Tenaga Ahli dan Tenaga Teknis yang ditugaskan sesuai dengan yang diusulkan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_5($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Tenaga Ahli dan Tenaga Teknis memiliki kemampuan sesuai dengan kualifikasi pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_6($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Kuantitas Personel sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_7($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Kualitas bahan sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_8($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Volume bahan sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_9($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Kualitas peralatan sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_10($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Volume peralatan sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_11($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_12($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Prestasi Pekerjaan sesuai Jadwal dan Tidak ada keterlambatan (Progress pekerjaan).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_jasa_lainya_13($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_jasa_lainya_detail', 'Kualitas/spesifikasi hasil pekerjaan sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }



    public function by_id_vendor_pemenang_pekerjaan_jasa_lainya($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }
    // UPDATE
    public function update_pekerjaan_jasa_lainya_vendor($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }
    // update ke tbl_vendor
    public function update_status_warning_pekerjaan_jasa_lainya($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    // END PEKERJAAN JASA LAINYA==========================================================================================




    // INI BAGIAN PEKERJAAN PENYEDIA BARANG==================================================================
    public function tambah_pekerjaan_penyedia_barang($data)
    {
        $this->db->insert('tbl_penilaian_kinerja_pekerjaan_penyedia_barang', $data);
        return $this->db->affected_rows();
    }
    public function update_pekerjaan_penyedia_barang_aspek($data, $where)
    {
        $this->db->update('tbl_penilaian_kinerja_pekerjaan_penyedia_barang', $data, $where);
        return $this->db->affected_rows();
    }
    // BY NAME
    public function cek_jika_ada_penilaian_penyedia_barang_1($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Kantor, Studio, dan sarana prasarana perusahan memadai untuk melaksanakan pekerjaan/sesuai kualifikasi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_2($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Ketaatan dalam penyelesaian Administrasi Keuangan (termin, pajak, jaminan, dll).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_3($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Organisasi (pengurus, tenaga ahli, tenaga administrasi, tenaga teknis) perusahan memadai/sesuai dengan kualifikasi.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_4($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Tenaga Ahli dan Tenaga Teknis yang ditugaskan sesuai dengan yang diusulkan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_5($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Tenaga Ahli dan Tenaga Teknis memiliki kemampuan sesuai dengan kualifikasi pekerjaan.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_6($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Kualitas/Spesifikasi barang yang dikirim sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_7($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Kuantitas barang yang dikirim sesuai kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_8($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Sertifikat Garansi Barang/Jaminan Purna Jual.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_9($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Pelaksanaan Pekerjaan sesuai Jangka Waktu pelaksanaan yang ditetapkan dalam kontrak.');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_jika_ada_penilaian_penyedia_barang_10($id_rup, $id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_penilaian_kinerja');
        $this->db->where('id_rup', $id_rup);
        $this->db->where('id_vendor', $id_vendor);
        $this->db->where('indikator_pekerjaan_penyedia_barang_detail', 'Pengiriman barang sesuai Jadwal dan Tidak ada keterlambatan (Progress pekerjaan).');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function by_id_vendor_pemenang_pekerjaan_penyedia_barang($id_vendor, $id_rup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_mengikuti_paket');
        $this->db->join('tbl_paket', 'tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor = tbl_paket.id_rup', 'left');
        $this->db->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_paket.id_unit_kerja', 'left');
        $this->db->join('tbl_panitia', 'tbl_panitia.id_panitia = tbl_paket.id_panitia', 'left');
        $this->db->join('tbl_jenis_anggaran', 'tbl_jenis_anggaran.id_jenis_anggaran = tbl_paket.id_jenis_anggaran', 'left');
        $this->db->join('tbl_jenis_pengadaan', 'tbl_jenis_pengadaan.id_jenis_pengadaan = tbl_paket.id_jenis_pengadaan', 'left');
        $this->db->join('tbl_metode_pemilihan', 'tbl_metode_pemilihan.id_metode_pemilihan = tbl_paket.id_metode_pemilihan', 'left');
        $this->db->join('tbl_vendor', 'tbl_vendor_mengikuti_paket.id_mengikuti_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->join('tbl_vendor_identitas_prusahaan', 'tbl_vendor.id_vendor = tbl_vendor_identitas_prusahaan.id_vendor', 'left');
        $this->db->join('tbl_provinsi', 'tbl_vendor_identitas_prusahaan.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor_identitas_prusahaan.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->where('tbl_vendor_mengikuti_paket.pemenang_tender', 1);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor', $id_rup);
        $this->db->where('tbl_vendor_mengikuti_paket.id_mengikuti_vendor', $id_vendor);
        $this->db->group_by('tbl_vendor_mengikuti_paket.id_mengikuti_paket_vendor');
        $query = $this->db->get();
        return $query->row_array();
    }
    // UPDATE
    public function update_pekerjaan_penyedia_barang_vendor($data, $where)
    {
        $this->db->update('tbl_vendor_mengikuti_paket', $data, $where);
        return $this->db->affected_rows();
    }
    // update ke tbl_vendor
    public function update_status_warning_pekerjaan_penyedia_barang($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    // END PEKERJAAN PENYEDIA BARANG==========================================================================================


    // INI UNTUK DELETE PENILAIANYA / RESET
    public function delete_penilaian_kontruksi($where)
    {
        $this->db->delete('tbl_detail_penilaian_kinerja', $where);
    }

    public function delete_penilaian_konsultan_kontruksi($where)
    {
        $this->db->delete('tbl_detail_penilaian_kinerja', $where);
    }
    public function delete_penilaian_kajian_konsultan_kontruksi($where)
    {
        $this->db->delete('tbl_detail_penilaian_kinerja', $where);
    }
    public function delete_penilaian_konsultan_pengawas_kontruksi($where)
    {
        $this->db->delete('tbl_detail_penilaian_kinerja', $where);
    }
    public function delete_penilaian_konsultan_jasa_lainya_kontruksi($where)
    {
        $this->db->delete('tbl_detail_penilaian_kinerja', $where);
    }

    public function delete_penilaian_konsultan_penyedia_barang_kontruksi($where)
    {
        $this->db->delete('tbl_detail_penilaian_kinerja', $where);
    }
    public function update_ke_paket($data, $where)
    {
        $this->db->update('tbl_paket', $data, $where);
        return $this->db->affected_rows();
    }
}
