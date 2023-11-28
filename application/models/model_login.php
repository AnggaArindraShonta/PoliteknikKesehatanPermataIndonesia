<?php
class model_login extends CI_Model
{
	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function check_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get();

		if ($result->num_rows() == 1) {
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('is_login', true);
		}

		return $result;
	}

	public function check_member($username, $password)
	{
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get();

		if ($result->num_rows() == 1) {
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('is_login', true);
		}

		return $result;
	}
}
