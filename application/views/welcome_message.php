<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Email_send
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_datapenyedia/M_datapenyedia');
    }

    public function sen_row_email($type, $data)
    {
        if ($type == 'send_one_vendor') {
            $type = $this->ci->M_datapenyedia->get_row_vendor($data['id_vendor']);
        } else if ($type == 'registrasi') {
            $email = $data['email'];
            $token_regis = $data['token_regis'];
            // $base_url = base_url('registrasi/identitas/' . $token_regis);
            $base_url = 'drtproc.jmto.co.id/registrasi/identitas/' . $token_regis;
        } else if ($type == 'lupa_password') {
            $email = $data['email'];
            $token_lupa_password = $data['token_lupa_password'];
            $base_url = base_url('auth/buat_password/' . $token_lupa_password);
        } else { }
        $this->ci->load->library('email');
        // $config = array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'smtp.jasamarga.co.id',
        //     'smtp_port' => 587,
        //     'smtp_user' => 'e-procurement@jmto.co.id',
        //     'smtp_pass' => 'tehgelas123!',
        //     'mailtype'  => 'html',
        //     'smtp_crypto'  => 'tls'
        // );

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
            // 'charset'   => 'utf-8'
        );
        $this->ci->email->initialize($config);
        $this->ci->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->ci->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        $this->ci->email->to($email); // Ganti dengan email tujuan

        // Subject email
        if ($type == 'lupa_password') {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  UBAH PASSWORD');

            // Isi email
            $this->ci->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pengubahan Password Anda");

            $this->ci->email->send();
        } else if ($type == 'token_penawaran') {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  TOKEN KODENISASI');

            // Isi email
            $this->ci->email->message($data);

            $this->ci->email->send();
        } else {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  REGISTRASI');

            // Isi email
            $this->ci->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya");

            $this->ci->email->send();
        }
    }

    public function sen_row_email_token($type, $data, $message)
    {
        $type = $this->ci->M_datapenyedia->get_row_vendor($data['id_vendor']);
        $email = $data['email'];
        $this->ci->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
            'charset'   => 'utf-8'
        );
        $this->ci->email->initialize($config);
        $this->ci->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->ci->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        $this->ci->email->to($email); // Ganti dengan email tujuan
        $this->ci->email->subject('E-PROCUREMENT JMTO :  TOKEN KODENISASI');

        // Isi email
        $this->ci->email->message($message);

        $this->ci->email->send();
    }

	public function sen_row_email_api($type, $data)
    {
        if ($type == 'send_one_vendor') {
            $type = $this->ci->M_datapenyedia->get_row_vendor($data['id_vendor']);
        } else if ($type == 'registrasi') {
            $email = $data['email'];
            $token_regis = $data['token_regis'];
            // $base_url = base_url('registrasi/identitas/' . $token_regis);
            $base_url = 'drtproc.jmto.co.id/registrasi/identitas/' . $token_regis;
        } else if ($type == 'lupa_password') {
            $email = $data['email'];
            $token_lupa_password = $data['token_lupa_password'];
            $base_url = base_url('auth/buat_password/' . $token_lupa_password);
        } else { }
        $this->ci->load->library('email');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.jmto.co.id',
            'smtp_port' => 26,
            'smtp_user' => 'e-procurement@jmto.co.id',
            'smtp_pass' => 'jmt02023!#',
            'mailtype'  => 'html',
            'smtp_crypto'  => 'tls',
            // 'charset'   => 'utf-8'
        );
        $this->ci->email->initialize($config);
        $this->ci->email->set_newline("\r\n");
        // Email dan nama pengirim
        $this->ci->email->from('e-procurement@jmto.co.id', 'JMTO');

        // Email penerima

        $this->ci->email->to($email); // Ganti dengan email tujuan

        // Subject email
        if ($type == 'lupa_password') {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  UBAH PASSWORD');

            // Isi email
            $this->ci->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pengubahan Password Anda");

            $this->ci->email->send();
        } else if ($type == 'token_penawaran') {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  TOKEN KODENISASI');

            // Isi email
            $this->ci->email->message($data);

            $this->ci->email->send();
        } else {
            $this->ci->email->subject('E-PROCUREMENT JMTO :  REGISTRASI');

            // Isi email
            $this->ci->email->message("Silakan Klik Link Ini $base_url Untuk Melakukan Prosess Pendaftaran Selanjutnya");

            $this->ci->email->send();
        }
    }
}
