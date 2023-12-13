<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master/M_karyawan');
	}

	public function index()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('user_setting/index'); 
		$this->load->view('template_menu/footer_menu');
        $this->load->view('user_setting/ajax');
	}

	public function ubah_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[confirmPassword]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('confirmPassword', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Tidak Sama!</div>');
			redirect('user_setting');
		} else {
			$password  = $this->input->post('password');
			$data = [
				'password' => password_hash($password, PASSWORD_DEFAULT),
			];
			$this->M_karyawan->updatepassword($data, $this->session->userdata('id_pegawai'));
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Di Ubah!</div>');
			redirect('user_setting');
		}
	}
}
