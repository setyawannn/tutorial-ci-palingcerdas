<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_laporan($user_id, $user_role)
	{
		$this->db->select('laporan.*, users.name as user_name');
		$this->db->from('laporan');
		$this->db->join('users', 'users.id = laporan.user_id');

		if ($user_role != 'admin') {
			$this->db->where('laporan.user_id', $user_id);
		}

		$query = $this->db->get();
		return $query->result();
	}

	public function get_laporan_by_id($id)
	{
		$query = $this->db->get_where('laporan', array('id' => $id));
		return $query->row();
	}

	public function insert_laporan($data)
	{
		return $this->db->insert('laporan', $data);
	}

	public function update_laporan($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('laporan', $data);
	}

	public function delete_laporan($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('laporan');
	}
}
