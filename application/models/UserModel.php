<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row();
	}

	public function insert_user($data)
	{
		return $this->db->insert('users', $data);
	}

	public function update_user($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}

	// Function to check user credentials
	public function check_user_credentials($email, $password)
	{
		$this->db->where('email', $email);
		$user = $this->db->get('users')->row();

		if ($user && password_verify($password, $user->password)) {
			return $user;
		}
		return false;
	}
}
