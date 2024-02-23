<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Kirim_wa
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Auth_model');
        $this->ci->load->model('M_panitia/M_panitia');
        $this->ci->load->model('M_rup/M_rup');
        $this->ci->load->helper('string');
    }
    public function kirim_wa_vendor_aktif($nomor_telpon)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $target = $nomor_telpon;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => 'Selamat! Akun Anda Telah Aktif Pada Aplikasi E-PROCUREMENT PT. Jasamarga Tollroad Operator Silahkan Login Sebagai Penyedia https://drtproc.jmto.co.id/',
                'delay' => '60-80',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }


    public function kirim_wa_vendor_terdaftar($nomor_telpon, $pesan)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $target = $nomor_telpon;
        $pesan = str_replace("-", " ", $pesan);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => "$pesan",
                'delay' => '60-80',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function kirim_wa_pengumuman($id_rup, $message)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $row_rup =  $this->ci->M_rup->get_row_rup_by_id_rup($id_rup);
        if ($row_rup['id_jadwal_tender'] == 9 || $row_rup['id_jadwal_tender'] == 1 || $row_rup['id_jadwal_tender'] == 2 || $row_rup['id_jadwal_tender'] == 3  || $row_rup['id_jadwal_tender'] == 6 || $row_rup['id_jadwal_tender'] == 10) {
            $get_vendor_mengikuti =  $this->ci->M_panitia->get_peserta_tender($id_rup);
            $data_vendor = array();
            foreach ($get_vendor_mengikuti as $key => $value) {
                $data_vendor[] = $value['no_telpon'];
            }
            $nomor_telpon = implode(",", $data_vendor);
        } else {
            $get_vendor_mengikuti =  $this->ci->M_panitia->get_peserta_tender_umumkan($row_rup);
            $data_vendor = array();
            foreach ($get_vendor_mengikuti as $key => $value) {
                $data_vendor[] = $value['no_telpon'];
            }
            $nomor_telpon = implode(",", $data_vendor);
        }
        $target = $nomor_telpon;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
                'delay' => '40-60',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function kirim_wa_pengumuman_panitia($id_rup, $message)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $row_rup =  $this->ci->M_rup->get_row_rup_by_id_rup($id_rup);
        $get_panitia_mengikuti =  $this->ci->M_rup->get_panitia($id_rup);
        $data_vendor = array();
        foreach ($get_panitia_mengikuti as $key => $value) {
            $data_vendor[] = $value['no_telpon'];
        }
        $nomor_telpon = implode(",", $data_vendor);
        $target = $nomor_telpon;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
                'delay' => '40-60',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function kirim_wa_pengumuman_notif_dokumen($id_rup, $nama_dokumen, $keterangan)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $row_rup =  $this->ci->M_rup->get_row_rup_by_id_rup($id_rup);
        $get_vendor_lolos =  $this->ci->M_panitia->get_peserta_tender_lolos_prakualifikasi($id_rup);
        $id_vendor_lolos = array();
        foreach ($get_vendor_lolos as $key => $value) {
            $id_vendor_lolos[] = $value['id_vendor'];
        }
        $get_id_vendor = implode(",", $id_vendor_lolos);
        $get_vendor_mengikuti =  $this->ci->M_panitia->get_peserta_tender_lolos_prakualifikasi_asli($id_rup, $get_id_vendor);
        $data_vendor = array();
        foreach ($get_vendor_mengikuti as $key => $valu2) {
            $data_vendor[] = $valu2['no_telpon'];
        }
        $nomor_telpon = implode(",", $data_vendor);
        $target = $nomor_telpon;
        $nama_rup = $row_rup['nama_rup'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => 'PERUBAHAN DOKUMEN PENGADAAN / KUALIFIKASI
NAMA PAKET : .' . $nama_rup . ', NAMA DOKUMEN : ' . $nama_dokumen . ', KETERANGAN : ' . $keterangan . '',
                'delay' => '40-60',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }




    public function kirim_wa_perubahan_jadwal($id_rup, $id_jadwal_rup, $pesan)
    {
        $row_rup =  $this->ci->M_panitia->get_row_alasan_jadwal($id_jadwal_rup);
        $ambil_nama_paket =  $this->ci->M_panitia->get_row_rup($id_rup);
        $get_panitia_aja =  $this->ci->M_panitia->get_panitia_ketua_sekertaris($id_rup);
        $data_pegawai = array();
        foreach ($get_panitia_aja as $key => $value) {
            $data_pegawai[] = $value['no_telpon'];
        }
        $nomor_telpon = implode(",", $data_pegawai);
        $target = $nomor_telpon;
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        // $token = 'Md6J!e+vNCB4LNZkAcTq';
        $nama_jadwal = $row_rup['nama_jadwal_rup'];
        $nama_rup = $ambil_nama_paket['nama_rup'];
        $pesan = str_replace("-", " ", $pesan);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => "Perubahan Jadwal:
Izin melakukan perubahan jadwal Paket Tender $nama_rup
untuk Tahapan $nama_jadwal dengan Alasan $pesan",
                'delay' => '60-80',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }
}
