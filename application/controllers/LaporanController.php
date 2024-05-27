<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'core/BaseController.php');

class LaporanController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		$this->check_login();
		$this->load->model('LaporanModel');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$user_role = $this->session->userdata('user_role');
		$data['laporan'] = $this->LaporanModel->get_all_laporan($user_id, $user_role);
		$this->load->view('laporan/index', $data);
	}

	public function create()
	{
		$this->load->view('laporan/create');
	}

	public function store()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('laporan/create');
		} else {
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'tanggal' => $this->input->post('tanggal'),
				'user_id' => $this->session->userdata('user_id') // Menambahkan user_id dari sesi
			);

			if ($this->LaporanModel->insert_laporan($data)) {
				$this->session->set_flashdata('message', 'Laporan created successfully');
				$this->session->set_flashdata('message_type', 'success');
			} else {
				$this->session->set_flashdata('message', 'Failed to create laporan');
				$this->session->set_flashdata('message_type', 'error');
			}

			redirect('LaporanController');
		}
	}

	public function edit($id)
	{
		$data['laporan'] = $this->LaporanModel->get_laporan_by_id($id);
		if (empty($data['laporan'])) {
			show_404();
		}
		$this->load->view('laporan/edit', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['laporan'] = $this->LaporanModel->get_laporan_by_id($id);
			$this->load->view('laporan/edit', $data);
		} else {
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'tanggal' => $this->input->post('tanggal')
			);

			if ($this->LaporanModel->update_laporan($id, $data)) {
				$this->session->set_flashdata('message', 'Laporan updated successfully');
				$this->session->set_flashdata('message_type', 'success');
			} else {
				$this->session->set_flashdata('message', 'Failed to update laporan');
				$this->session->set_flashdata('message_type', 'error');
			}

			redirect('LaporanController');
		}
	}

	public function delete($id)
	{
		$laporan = $this->LaporanModel->get_laporan_by_id($id);
		if (empty($laporan)) {
			show_404();
		}

		if ($this->LaporanModel->delete_laporan($id)) {
			$this->session->set_flashdata('message', 'Laporan deleted successfully');
			$this->session->set_flashdata('message_type', 'success');
		} else {
			$this->session->set_flashdata('message', 'Failed to delete laporan');
			$this->session->set_flashdata('message_type', 'error');
		}

		redirect('LaporanController');
	}
}
