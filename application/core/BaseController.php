<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url'); // Pastikan helper URL dimuat di sini
	}

	protected function check_login()
	{
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('message', 'You must be logged in to access this page');
			$this->session->set_flashdata('message_type', 'warning');
			redirect('AuthController/login');
		}
	}

	protected function check_if_logged_in()
	{
		if ($this->session->userdata('user_id')) {
			redirect('UserController');
		}
	}
}
