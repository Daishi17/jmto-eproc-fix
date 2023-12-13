<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Kirim_wa
{
    protected $ci;
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
}
