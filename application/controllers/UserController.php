<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/BaseController.php');

class UserController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		$this->load->model('UserModel');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['users'] = $this->UserModel->get_all_users();
		$this->load->view('users/index', $data);
	}

	public function create()
	{
		$this->load->view('users/create');
	}

	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('users/create');
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'role' => $this->input->post('role')
			);

			if ($this->UserModel->insert_user($data)) {
				$this->session->set_flashdata('message', 'User created successfully');
				$this->session->set_flashdata('message_type', 'success');
			} else {
				$this->session->set_flashdata('message', 'Failed to create user');
				$this->session->set_flashdata('message_type', 'error');
			}

			redirect('UserController');
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->UserModel->get_user_by_id($id);
		if (empty($data['user'])) {
			show_404();
		}
		$this->load->view('users/edit', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['user'] = $this->UserModel->get_user_by_id($id);
			$this->load->view('users/edit', $data);
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'role' => $this->input->post('role')
			);

			if ($this->input->post('password')) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			}

			if ($this->UserModel->update_user($id, $data)) {
				$this->session->set_flashdata('message', 'User updated successfully');
				$this->session->set_flashdata('message_type', 'success');
			} else {
				$this->session->set_flashdata('message', 'Failed to update user');
				$this->session->set_flashdata('message_type', 'error');
			}

			redirect('UserController');
		}
	}

	public function delete($id)
	{
		$user = $this->UserModel->get_user_by_id($id);
		if (empty($user)) {
			show_404();
		}

		if ($this->UserModel->delete_user($id)) {
			$this->session->set_flashdata('message', 'User deleted successfully');
			$this->session->set_flashdata('message_type', 'success');
		} else {
			$this->session->set_flashdata('message', 'Failed to delete user');
			$this->session->set_flashdata('message_type', 'error');
		}

		redirect('UserController');
	}
}
