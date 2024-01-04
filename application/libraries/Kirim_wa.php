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
                'delay' => '120-300',
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
                'delay' => '120-300',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }


    public function kirim_wa_pengumuman($id_rup)
    {
        $token = '3HGKVEwLaF7rIt@ZhVcV';
        $row_rup =  $this->ci->M_rup->get_row_rup_by_id_rup($id_rup);
        $get_vendor_mengikuti =  $this->ci->M_panitia->get_peserta_tender($id_rup);
        $data_vendor = array();
        foreach ($get_vendor_mengikuti as $key => $value) {
            $data_vendor[] = $value['no_telpon'];
        }
        $nomor_telpon = implode(",", $data_vendor);
        $target = $nomor_telpon;
        $nama_rup = $row_rup['nama_rup'];
        $batas_pendaftaran_tender = $row_rup['batas_pendaftaran_tender'];
        $nama_jenis_pengadaan = $row_rup['nama_jenis_pengadaan'];
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
                'message' => 'Selamat! Anda Telah Menerima Undangan Paket Tender Baru, Dengan Nama Paket: ' . $nama_rup . ' , Jenis Pengadaan: ' . $nama_jenis_pengadaan . ' Ikuti Pengadaan Segera Sebelum Batas Pendaftaran Habis Pada: ' . $batas_pendaftaran_tender . '  Silakan Login Disini Segera https://eprocurement.jmto.co.id/auth',
                'delay' => '120-300',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
    }
}
