<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_login');
		$this->load->model('model_admin');

		$id_admin = $this->session->userdata('id_admin');

		$this->db->where('id_admin', $id_admin);
		$db = $this->db->get('admin')->row();

		if (!$this->session->userdata('id_admin') == TRUE) {
			redirect('auth');
		}
	}
	public function index()
	{

		$id_admin = $this->session->userdata('id_admin');
		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['member'] = $this->model_admin->get_all_member()->num_rows();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/dashboard_admin', $data);
		$this->load->view('admin/footer');
	}

	public function profile()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;

		$data['admin'] = $this->model_admin->get_admin($id_admin)->result_array();


		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/footer');
	}

	public function edit_admin()
	{

		$delete = $this->model_admin->edit_admin();

		if ($delete['result'] == 'success') {



			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Profile Success!
			</div>
			');
			redirect('admin/profile');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Profile Failed!
			</div>
			');
			redirect('admin/profile');
		}
	}

	public function member()
	{

		$id_admin = $this->session->userdata('id_admin');

		$db = $this->model_admin->get_admin($id_admin)->row();
		$data['nama_admin'] = $db->nama_admin;
		$data['member'] = $this->model_admin->get_all_member()->result_array();

		$this->load->view('admin/navbar', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('admin/footer');
	}

	public function add_member()
	{

		$add = $this->model_admin->add_member();

		if ($add['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Dosen Success!
			</div>
			');
			redirect('admin/member');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Add Dosen Failed!
			</div>
			');
			redirect('admin/member');
		}
	}

	public function edit_member()
	{
		$edit = $this->model_admin->edit_member();

		if ($edit['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Edit Dosen Success!</div>');
			redirect('admin/member');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Edit Dosen Failed!</div>');
			redirect('admin/member');
		}
	}


	public function ubah_statusaktif($id)
	{
		$result = $this->model_admin->get_by_id($id)->row_object();
		if ($result) {
			$status = $result->status_aktif;
			if ($status == "Y") {
				$dataUpdate = array('status_aktif' => "N");
			} else {
				$dataUpdate = array('status_aktif' => "Y");
			}
			$this->model_admin->update('member', $dataUpdate, 'id_member', $id);
		}
		redirect('admin/member');
	}

	public function delete_member()
	{

		$delete = $this->model_admin->delete_member();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Dosen Success!
			</div>
			');
			redirect('admin/member');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Dosen Failed!
			</div>
			');
			redirect('admin/member');
		}
	}
	
}
