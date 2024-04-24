<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->library(array('form_validation', 'recaptcha'));
	}


	public function index()
	{
		$this->form_validation->set_rules('userName', 'Username', 'required|xss_clean|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim');
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$this->session->set_flashdata('salah', 'Username Atau Password Salah');
					redirect('auth');
				} else {
					$username = $this->input->post('userName');
					$password = $this->input->post('password');
					if ($this->input->post('csrf_token_name') != $this->session->csrf_token) {
						$this->session->unset_userdata('csrf_token');
						$this->load->view('not_found');
					} else {
						$this->role_login->login($username, $password);
					}
				}
			}
		}
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('auth/index', $data);
	}

	public function logout()
	{
		$this->role_login->logout();
	}
}
