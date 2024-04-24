<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sirup_form_rup extends CI_Controller {

	public function index()
	{
		$this->load->view('administrator/template/si_rup/js_header_rup');
		$this->load->view('administrator/template_menu/header_menu');
		$this->load->view('administrator/template/si_rup/form_rup');
        $this->load->view('administrator/template/si_rup/js_footer_rup');
        $this->load->view('administrator/template_menu/footer_menu');
	}
}
