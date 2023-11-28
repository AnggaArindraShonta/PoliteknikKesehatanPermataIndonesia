<?php
defined('BASEPATH') or exit('No direct script access allowed');

class authmember extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_login');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('dosen/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$result = $this->model_login->check_member($username, $password);

			if ($result->num_rows() == 1) {
				$db = $result->row();
				$status_aktif = $db->status_aktif;

				if ($status_aktif == 'N') {
					$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Member Anda belum aktif. Silahkan menunggu aktivasi.</div>');
					redirect('authmember/');
				} elseif ($status_aktif == 'Y') {
					$data_login = array(
						'is_login' => true,
						'id_member' => $db->id_member
					);
					$this->session->set_userdata($data_login);
					redirect('dosen');
				} 
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Invalid Username and Password!</div>');
				redirect('authmember/');
			}
		}
	}


	public function logout()
	{

		$this->session->sess_destroy();

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Logout Success!
		</div>
		');
		redirect('dosen');
	}
}
