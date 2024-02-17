<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
class Send_email_jmto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datapenyedia/M_Rekanan_tervalidasi');
        $this->load->model('M_datapenyedia/M_Rekanan_terundang');
        $this->load->model('M_rup/M_rup');
        $this->load->model('M_panitia/M_panitia');
    }

    public function kirim_email_registrasi()
    {
        $email = $this->uri->segment(3);
        $token_regis = $this->uri->segment(4);
        $base_url = 'drtproc.jmto.co.id/registrasi/identitas/' . $token_regis;
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        $this->email->to($email); // Ganti dengan email tujuan

        $this->email->subject('E-PROCUREMENT JMTO :  REGISTRASI');

        // Isi email
        $this->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya ");

        $this->email->send();
    }

    public function sen_row_email()
    {
        $data_curl = file_get_contents('php://input');
        var_dump($data_curl);die;
    
        // if ($type == 'TERIMA-VENDOR' || $type == 'KIRIM-PESAN' || $type == 'KIRIM-UNDANGAN') {
        //     $data = $this->M_Rekanan_tervalidasi->get_row_vendor($data);
        // } else {
        //     $data = $this->M_Rekanan_tervalidasi->get_id_vendor($data);
        // }
        // $email = $data['email'];
        // $this->load->library('email');
        // $config = array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'mail.jmto.co.id',
        //     'smtp_port' => 26,
        //     'smtp_user' => 'e-procurement@jmto.co.id',
        //     'smtp_pass' => 'jmt02023!#',
        //     'mailtype'  => 'html',
        //     'smtp_crypto'  => 'tls',
        // );
        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");
        // // Email dan nama pengirim
        // $this->email->from('e-procurement@jmto.co.id', 'JMTO');
        // // Email penerima
        // $this->email->to($email); // Ganti dengan email tujuan
        // if ($type == 'SIUP') {
        //     // Isi email
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SIUP");
        //     $this->email->message("$message ");
        // } else if ($type == 'KBLI-SIUP') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN KBLI-SIUP");
        //     $this->email->message("$message ");
        // } else if ($type == 'NIB') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN NIB");
        //     $this->email->message("$message ");
        // } else if ($type == 'KBLI-NIB') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN KBLI-NIB");
        //     $this->email->message("$message ");
        // } else if ($type == 'SBU') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SBU");
        //     $this->email->message("$message ");
        // } else if ($type == 'KODE-SBU') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN KODE-SBU");
        //     $this->email->message("$message ");
        // } else if ($type == 'SIUJK') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SIUJK");
        //     $this->email->message("$message ");
        // } else if ($type == 'KBLI-SIUJK') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN KBLI-SIUJK");
        //     $this->email->message("$message ");
        // } else if ($type == 'AKTA-PENDIRIAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN AKTA-PENDIRIAN");
        //     $this->email->message("$message ");
        // } else if ($type == 'AKTA-PERUBAHAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN AKTA-PERUBAHAN");
        //     $this->email->message("$message ");
        // } else if ($type == 'PEMILIK') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN PEMILIK");
        //     $this->email->message("$message ");
        // } else if ($type == 'PENGURUS') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN PENGURUS");
        //     $this->email->message("$message ");
        // } else if ($type == 'PENGALAMAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN PENGALAMAN");
        //     $this->email->message("$message ");
        // } else if ($type == 'SPPKP') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SPPKP");
        //     $this->email->message("$message ");
        // } else if ($type == 'NPWP') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN NPWP");
        //     $this->email->message("$message ");
        // } else if ($type == 'SPT') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN SPT");
        //     $this->email->message("$message ");
        // } else if ($type == 'NERACA-KEUANGAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN NERACA-KEUANGAN");
        //     $this->email->message("$message ");
        // } else if ($type == 'LAPORAN-KEUANGAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : VALIDASI DOKUMEN LAPORAN-KEUANGAN");
        //     $this->email->message("$message ");
        // } else if ($type == 'TERIMA-VENDOR') {
        //     $this->email->subject("E-PROCUREMENT JMTO : AKTIVASI VENDOR JMTO");
        //     $this->email->message("$message ");
        // } else if ($type == 'KIRIM-PESAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : INFO");
        //     $this->email->message("$message ");
        // } else if ($type == 'KIRIM-UNDANGAN') {
        //     $this->email->subject("E-PROCUREMENT JMTO : UNDANGAN VERIFIKASI KELENGKAPAN DOKUMEN");
        //     $this->email->message("$message ");
        // } else if ($type == 'PENILAIAN-KINERJA') {
        //     $this->email->subject("E-PROCUREMENT JMTO : INFORMARSI PENILAIAN KINERJA PENYEDIA JMTO");
        //     $this->email->message("$message ");
        // } else if ($type == 'PENGUMUMAN PEMENANG') {
        //     $this->email->subject("E-PROCUREMENT JMTO : PENGUMUMAN PEMENANG TENDER");
        //     $this->email->message("$message ");
        // }
        // $this->email->send();
    }

    public function sen_umumkan_paket($id_url_rup)
    {
        $row_rup = $this->M_rup->get_row_rup($id_url_rup);
        $nama_rup = $row_rup['nama_rup'];
        $data_vendor = $row_rup['data_vendor_terundang'];
        $result_vendor = $this->M_Rekanan_terundang->get_all_vendor_terundang($data_vendor);
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->email->from('e-procurement@jmto.co.id', 'JMTO');
        // Email penerima
        foreach ($result_vendor as $key => $value) {
            $this->email->to($value['email']);
        }
        // Ganti dengan email tujuan asdasd
        $this->email->subject("E-PROCUREMENT JMTO : PENGUMUMAN PAKET TENDER BARU UNTUK ANDA SEGERA IKUTI !!!");
        $this->email->message("NAMA PAKET : $nama_rup Silakan Ikuti Tender Sebelum Batas Waktu Pendaftaran Berakhir");
        $this->email->send();
    }

    public function sen_notifikasi_dokumen($id_rup, $nama_dokumen, $keterangan)
    {
        $row_rup = $this->M_rup->get_row_rup_by_id_rup($id_rup);
        $nama_rup = $row_rup['nama_rup'];
        $result_vendor = $this->M_panitia->get_peserta_tender($id_rup);
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        foreach ($result_vendor as $key => $value) {
            $this->email->to($value['email']);
        }
        // Ganti dengan email tujuan
        $this->email->subject("E-PROCUREMENT JMTO : PERUBAHAN DOKUMEN PENGADAAN / KUALIFIKASI !!!");
        $this->email->message("NAMA PAKET : $nama_rup, NAMA DOKUMEN : $nama_dokumen, KETERANGAN : $keterangan");
        $this->email->send();
    }

    public function sen_email_pengumuman($id_rup)
    {
        $row_rup =  $this->M_rup->get_row_rup_by_id_rup($id_rup);
        if ($row_rup['id_jadwal_tender'] == 9) {
            $get_vendor_mengikuti =  $this->M_panitia->get_peserta_tender($id_rup);
        } else {
            $data_vendor = $this->M_rup->get_row_rup_by_id_rup($id_rup);
            $get_vendor_mengikuti =  $this->M_panitia->get_peserta_tender_umumkan($data_vendor);
        }
        // var_dump($get_vendor_mengikuti);die;
        $nama_rup = $row_rup['nama_rup'];
        $nama_metode_pengadaan = $row_rup['nama_metode_pengadaan'];
        $batas_pendaftaran_tender = $row_rup['batas_pendaftaran_tender'];
        $nama_jenis_pengadaan = $row_rup['nama_jenis_pengadaan'];
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        foreach ($get_vendor_mengikuti as $key => $value) {
            $this->email->to($value['email']);
        }
        // Ganti dengan email tujuan
        $nama_rup = $row_rup['nama_rup'];
        $nama_metode_pengadaan = $row_rup['nama_metode_pengadaan'];
        $batas_pendaftaran_tender = $row_rup['batas_pendaftaran_tender'];
        $nama_jenis_pengadaan = $row_rup['nama_jenis_pengadaan'];
        $this->email->subject("E-PROCUREMENT JMTO : PAKET TENDER TERBARU UNTUK ANDA !!!");
        $this->email->message("Pengumuman Tender PT JMTO ! 
$nama_metode_pengadaan :
Nama Paket: $nama_rup 
Jenis Pengadaan: $nama_jenis_pengadaan
Silahkan Mengikuti Melalui Link Ini : https://drtproc.jmto.co.id/auth 
Selambat-Lambatnya Pada : $batas_pendaftaran_tender
Terimakasih");
        $this->email->send();
    }

    public function sen_email_finalisasi_panitia($id_rup)
    {
        $row_rup =  $this->M_rup->get_row_rup_by_id_rup($id_rup);
        $get_panitia_mengikuti =  $this->M_rup->get_panitia($id_rup);
        $nama_rup = $row_rup['nama_rup'];
        $nama_metode_pengadaan = $row_rup['nama_metode_pengadaan'];
        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
        );
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        foreach ($get_panitia_mengikuti as $key => $value) {
            $this->email->to($value['email']);
        }
        // Ganti dengan email tujuan
        $this->email->subject("E-PROCUREMENT JMTO : PAKET TENDER TERBARU UNTUK ANDA !!!");
        $this->email->message("Anda menjadi Panitia Pengadaan Untuk Paket Tender $nama_rup $nama_metode_pengadaan");
        $this->email->send();
    }

}
