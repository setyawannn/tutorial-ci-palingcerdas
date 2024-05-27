<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/BaseController.php');

class AuthController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'session'));
	}

	public function login()
	{
		$this->check_if_logged_in();
		$this->load->view('auth/login');
	}

	public function login_process()
	{
		$this->check_if_logged_in();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('auth/login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->UserModel->check_user_credentials($email, $password);

			if ($user) {
				$this->session->set_userdata('user_id', $user->id);
				$this->session->set_userdata('user_name', $user->name);
				$this->session->set_userdata('user_role', $user->role);
				redirect('UserController');
			} else {
				$this->session->set_flashdata('message', 'Invalid email or password');
				$this->session->set_flashdata('message_type', 'error');
				redirect('AuthController/login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_role');
		$this->session->set_flashdata('message', 'Logged out successfully');
		$this->session->set_flashdata('message_type', 'success');
		redirect('AuthController/login');
	}
}
