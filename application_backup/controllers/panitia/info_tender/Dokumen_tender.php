<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_tender extends CI_Controller
{

    // isi parameter nama paket, jenis dokumen, nama dokumen

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->load->model('M_rup/M_rup');
        $this->load->model('M_panitia/M_dok_tender');
    }

    public function prakualifikasi($id_dokumen_prakualifikasi)
    {
        $file_name = $this->M_dok_tender->get_dok_prakualifikasi($id_dokumen_prakualifikasi);
        $rup = $this->M_dok_tender->get_row_rup($file_name['id_rup']);
        return force_download('file_paket/' . $rup['nama_rup']  . '/' . 'DOKUMEN_PRAKUALIFIKASI/' . $file_name['file_dok_prakualifikasi'], NULL);
    }

    public function pengadaan($id_dokumen_pengadaan)
    {
        $file_name = $this->M_dok_tender->get_dok_pengadaan($id_dokumen_pengadaan);
        $rup = $this->M_dok_tender->get_row_rup($file_name['id_rup']);
        return force_download('file_paket/' . $rup['nama_rup']  . '/' . 'DOKUMEN_PENGADAAN/' . $file_name['file_dok_pengadaan'], NULL);
    }

    public function syarat_tambahan($id_syarat_tambahan)
    {
        $file_name = $this->M_dok_tender->get_dok_syarat_tambahan($id_syarat_tambahan);
        $rup = $this->M_dok_tender->get_row_rup($file_name['id_rup']);
        return force_download('file_paket/' . $rup['nama_rup']  . '/' . 'SYARAT_TAMBAHAN/' . $file_name['file_syarat_tambahan'], NULL);
    }

    public function undangan_pembuktian($id_rup)
    {
        $rup = $this->M_dok_tender->get_row_rup($id_rup);
        return force_download('file_paket/' . $rup['nama_rup']  . '/' . 'UNDANGAN_PEMBUKTIAN/' . $rup['file_undangan_pembuktian'], NULL);
    }

    public function pengumuman_pra($id_rup)
    {
        $rup = $this->M_dok_tender->get_row_rup($id_rup);
        return force_download('file_paket/' . $rup['nama_rup']  . '/' . 'HASIL_PRAKUALIFIKASI/' . $rup['file_pengumuman_prakualifikasi'], NULL);
    }
}
