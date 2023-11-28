<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_login');
		$this->load->model('model_admin');

		$id_member = $this->session->userdata('id_member');

		$this->db->where('id_member', $id_member);
		$db = $this->db->get('member')->row();

		if (!$this->session->userdata('id_member') == TRUE) {
			redirect('authmember');
		}
	}
	
	public function index()
	{

		$id_member = $this->session->userdata('id_member');
		$db = $this->model_admin->get_member($id_member)->row();
		$data['nama_member'] = $db->nama_member;
		$data['member'] = $this->model_admin->get_all_member()->num_rows();
		$data['krs'] = $this->model_admin->getKRSCountByDosen($id_member);
		$data['uts'] = $this->model_admin->getUTSCountByDosen($id_member);
		$data['uas'] = $this->model_admin->getUASCountByDosen($id_member);

		$this->load->view('dosen/navbar', $data);
		$this->load->view('dosen/sidebar', $data);
		$this->load->view('dosen/dashboard_dosen', $data);
		$this->load->view('dosen/footer');
	}

	public function profile()
	{

		$id_member = $this->session->userdata('id_member');

		$db = $this->model_admin->get_member($id_member)->row();
		$data['nama_member'] = $db->nama_member;

		$data['member'] = $this->model_admin->get_member($id_member)->result_array();


		$this->load->view('dosen/navbar', $data);
		$this->load->view('dosen/sidebar', $data);
		$this->load->view('dosen/profile', $data);
		$this->load->view('dosen/footer');
	}

	public function edit_member()
	{

		$delete = $this->model_admin->edit_member();

		if ($delete['result'] == 'success') {



			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Profile Success!
			</div>
			');
			redirect('dosen/profile');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Profile Failed!
			</div>
			');
			redirect('dosen/profile');
		}
	}

	public function krs()
	{

		$id_member = $this->session->userdata('id_member');
		if (!$id_member) {
			redirect('dosen');
		}

		$db = $this->model_admin->get_member($id_member)->row();
		$data['nama_member'] = $db->nama_member;
		$data['krs'] = $this->model_admin->getKRSbyDosen($id_member)->result();
		$data['data_member'] = $this->model_admin->get_by_id($id_member)->result();

		$this->load->view('dosen/navbar', $data);
		$this->load->view('dosen/sidebar', $data);
		$this->load->view('dosen/bimbingan_krs', $data);
		$this->load->view('dosen/footer');
	}

	public function add_krs()
	{
		$add = $this->model_admin->add_krs();

		if ($add['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Bimbingan KRS Success!
        </div>');
		redirect('dosen/krs');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Bimbingan KRS Failed!
        </div>');
		}
		redirect('dosen/krs');
	}

	public function edit_krs()
	{

		$delete = $this->model_admin->edit_krs();

		if ($delete['result'] == 'success') {



			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Bimbingan KRS Success!
			</div>
			');
			redirect('dosen/krs');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Bimbingan KRS Failed!
			</div>
			');
			redirect('dosen/krs');
		}
	}

	public function delete_krs()
	{

		$delete = $this->model_admin->delete_krs();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Bimbingan KRS Success!
			</div>
			');
			redirect('dosen/krs');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Bimbingan KRS Failed!
			</div>
			');
			redirect('dosen/krs');
		}
	}

	public function uts()
	{

		$id_member = $this->session->userdata('id_member');

		$db = $this->model_admin->get_member($id_member)->row();
		$data['nama_member'] = $db->nama_member;
		$data['uts'] = $this->model_admin->getUTSbyDosen($id_member);
		$data['data_member'] = $this->model_admin->get_by_id($id_member)->result();

		$this->load->view('dosen/navbar', $data);
		$this->load->view('dosen/sidebar', $data);
		$this->load->view('dosen/bimbingan_uts', $data);
		$this->load->view('dosen/footer');
	}

	public function add_uts()
	{
		$add = $this->model_admin->add_uts();

		if ($add['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Bimbingan UTS Success!
        </div>');
			redirect('dosen/uts');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Bimbingan UTS Failed!
        </div>');
		}
		redirect('dosen/uts');
	}

	public function edit_uts()
	{

		$delete = $this->model_admin->edit_uts();

		if ($delete['result'] == 'success') {



			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Bimbingan UTS Success!
			</div>
			');
			redirect('dosen/uts');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Bimbingan UTS Failed!
			</div>
			');
			redirect('dosen/uts');
		}
	}

	public function delete_uts()
	{

		$delete = $this->model_admin->delete_uts();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Bimbingan UTS Success!
			</div>
			');
			redirect('dosen/uts');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Bimbingan UTS Failed!
			</div>
			');
			redirect('dosen/uts');
		}
	}

	public function uas()
	{

		$id_member = $this->session->userdata('id_member');

		$db = $this->model_admin->get_member($id_member)->row();
		$data['nama_member'] = $db->nama_member;
		$data['uas'] = $this->model_admin->getUASbyDosen($id_member);
		$data['data_member'] = $this->model_admin->get_by_id($id_member)->result();

		$this->load->view('dosen/navbar', $data);
		$this->load->view('dosen/sidebar', $data);
		$this->load->view('dosen/bimbingan_uas', $data);
		$this->load->view('dosen/footer');
	}

	public function add_uas()
	{
		$add = $this->model_admin->add_uas();

		if ($add['result'] == 'success') {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Bimbingan UAS Success!
        </div>');
			redirect('dosen/uas');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Add Bimbingan UAS Failed!
        </div>');
		}
		redirect('dosen/uas');
	}

	public function edit_uas()
	{

		$delete = $this->model_admin->edit_uas();

		if ($delete['result'] == 'success') {



			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Bimbingan UAS Success!
			</div>
			');
			redirect('dosen/uas');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Edit Data Bimbingan UAS Failed!
			</div>
			');
			redirect('dosen/uas');
		}
	}

	public function delete_uas()
	{

		$delete = $this->model_admin->delete_uas();

		if ($delete['result'] == 'success') {

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Bimbingan UAS Success!
			</div>
			');
			redirect('dosen/uas');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Delete Bimbingan UAS Failed!
			</div>
			');
			redirect('dosen/uas');
		}
	}
}
