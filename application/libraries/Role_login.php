<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Role_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Auth_model');
    }

    // ingat ini masih statis
    // nip dan email belom unique di database
    public function login($username, $password)
    {

        $cek = $this->ci->Auth_model->login($username);
        if (!$cek->nip) {
            $this->ci->session->set_flashdata('salah', 'Pegawai Tidak Terdaftar!');
            redirect('auth');
        } else {
            if ($cek->sts_aktif == 0) {
                $this->ci->session->set_flashdata('salah', 'Pegawai Belum Di Aktivasi!');
                redirect('auth');
            } else if ($cek->sts_aktif == 2) {
                $this->ci->session->set_flashdata('salah', 'Pegawai Belum Di Aktivasi!');
                redirect('auth');
            } else {
                if ($cek && password_verify($password, $cek->password)) {
                    // administrator
                    if ($cek->role == 2) {
                        $sekarang = date('Y-m-d H:i');
                        $data = [
                            'waktu_login' => $sekarang,
                            'alamat_ip' => $this->ci->input->ip_address(),
                            'id_pegawai' => $cek->id_pegawai
                        ];
                        $this->ci->Auth_model->insert_log($data);
                        $userdata = [
                            'id_pegawai' => $cek->id_pegawai,
                            'id_url_pegawai' => $cek->id_url_pegawai,
                            'id_manajemen_user' => $cek->id_manajemen_user,
                            'nama_pegawai' => $cek->nama_pegawai,
                            'no_telpon' => $cek->no_telpon,
                            'email' => $cek->email,
                            'nip' => $cek->nip,
                            'id_unit' => $cek->id_unit,
                            'role' => $cek->role
                        ];

                        // buat session
                        $this->ci->session->set_userdata($userdata);
                        redirect('administrator/dashboard');
                    }

                    if ($cek->role == 3) {
                        $sekarang = date('Y-m-d H:i');
                        $data = [
                            'waktu_login' => $sekarang,
                            'alamat_ip' => $this->ci->input->ip_address(),
                            'id_pegawai' => $cek->id_pegawai
                        ];
                        $this->ci->Auth_model->insert_log($data);
                        $userdata = [
                            'id_pegawai' => $cek->id_pegawai,
                            'id_url_pegawai' => $cek->id_url_pegawai,
                            'id_manajemen_user' => $cek->id_manajemen_user,
                            'nama_pegawai' => $cek->nama_pegawai,
                            'no_telpon' => $cek->no_telpon,
                            'email' => $cek->email,
                            'nip' => $cek->nip,
                            'id_unit' => $cek->id_unit,
                            'role' => $cek->role
                        ];

                        // buat session
                        $this->ci->session->set_userdata($userdata);
                        redirect('administrator/dashboard');
                    }
                    // validator
                    if ($cek->role == 4) {

                        $sekarang = date('Y-m-d H:i');
                        $data = [
                            'waktu_login' => $sekarang,
                            'alamat_ip' => $this->ci->input->ip_address(),
                            'id_pegawai' => $cek->id_pegawai
                        ];
                        $this->ci->Auth_model->insert_log($data);
                        $userdata = [
                            'id_pegawai' => $cek->id_pegawai,
                            'id_url_pegawai' => $cek->id_url_pegawai,
                            'id_manajemen_user' => $cek->id_manajemen_user,
                            'nama_pegawai' => $cek->nama_pegawai,
                            'no_telpon' => $cek->no_telpon,
                            'email' => $cek->email,
                            'nip' => $cek->nip,
                            'id_unit' => $cek->id_unit,
                            'role' => $cek->role
                        ];

                        // buat session
                        $this->ci->session->set_userdata($userdata);
                        redirect('validator/dashboard');
                    }
                    // panitia
                    if ($cek->role == 5 || $cek->role == 6) {

                        $sekarang = date('Y-m-d H:i');
                        $data = [
                            'waktu_login' => $sekarang,
                            'alamat_ip' => $this->ci->input->ip_address(),
                            'id_pegawai' => $cek->id_pegawai
                        ];
                        $this->ci->Auth_model->insert_log($data);
                        $userdata = [
                            'id_pegawai' => $cek->id_pegawai,
                            'id_url_pegawai' => $cek->id_url_pegawai,
                            'id_manajemen_user' => $cek->id_manajemen_user,
                            'nama_pegawai' => $cek->nama_pegawai,
                            'no_telpon' => $cek->no_telpon,
                            'email' => $cek->email,
                            'nip' => $cek->nip,
                            'id_unit' => $cek->id_unit,
                            'role' => $cek->role
                        ];

                        // buat session
                        $this->ci->session->set_userdata($userdata);
                        redirect('panitia/dashboard');
                    }
                } else {
                    $this->ci->session->set_flashdata('salah', 'Email Atau Password Salah');
                    redirect('auth');
                }
            }
        }
    }
    // public function cek_login()
    // {
    //     if ($this->ci->session->userdata('username_vendor') == "") {
    //         $this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
    //         redirect('auth');
    //     }
    // }
    public function logout()
    {
        $this->ci->session->sess_destroy();
        redirect(base_url(''));
    }
}
