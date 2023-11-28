<?php
class model_admin extends CI_Model
{

	function get_admin($id_admin)
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id_admin);

		return $this->db->get();
	}

	function get_all_admin()
	{

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->order_by('id_admin', 'Desc');

		return $this->db->get();
	}

	function edit_admin()
	{
		$data = array(
			'username' =>  $this->input->post('username'),
			'password' =>  $this->input->post('password'),
			'nama_admin' =>  $this->input->post('nama_admin')
		);
		$this->db->where('id_admin', $this->input->post('id_admin'));
		$this->db->update('admin', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function get_member($id_member)
	{

		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('id_member', $id_member);

		return $this->db->get();
	}

	function get_by_id($id_member)
	{

		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('id_member', $id_member);

		return $this->db->get();
	}

	function get_all_member()
	{

		$this->db->select('*');
		$this->db->from('member');
		$this->db->order_by('id_member', 'Desc');

		return $this->db->get();
	}

	function add_member()
	{

		$data = array(
			'username' => $this->input->post('username'),
			'nama_member' => $this->input->post('nama_member'),
			'password' => $this->input->post('password'),
			'status_aktif' => 'N',
		);

		$this->db->insert('member', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	public function edit_member()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'nama_member' => $this->input->post('nama_member'),
			'password' => $this->input->post('password'),
			'status_aktif' => 'Y',
		);
		$this->db->where('id_member', $this->input->post('id_member'));
		$this->db->update('member', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function delete_member()
	{

		$this->db->where('id_member', $this->input->post('id_member'));
		$this->db->delete('member');

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	public function getKRSbyDosen($id_member)
	{
		$this->db->select('k.id_krs, m.nama_member, k.nama_mhs, k.nim_mhs, k.prodi_mhs, k.tanggal, k.materi_bimbingan, k.tindak_lanjut');
		$this->db->from('krs k');
		$this->db->join('member m', 'k.id_member = m.id_member', 'left');
		$this->db->where('k.id_member', $id_member);
		return $this->db->get();
	}

	public function getKRSCountByDosen($id_member)
	{
		$this->db->where('id_member', $id_member);
		return $this->db->count_all_results('krs');
	}

	public function getUTSCountByDosen($id_member)
	{
		$this->db->where('id_member', $id_member);
		return $this->db->count_all_results('uts');
	}

	public function getUASCountByDosen($id_member)
	{
		$this->db->where('id_member', $id_member);
		return $this->db->count_all_results('uas');
	}

	function add_krs()
	{
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'prodi_mhs' => $this->input->post('prodi_mhs'),
			'id_member' => $this->input->post('id_member'),
			'tanggal' => $this->input->post('tanggal'),
			'materi_bimbingan' => $this->input->post('materi_bimbingan'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
		);

		$this->db->insert('krs', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function edit_krs()
	{
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'prodi_mhs' => $this->input->post('prodi_mhs'),
			'id_member' => $this->input->post('id_member'),
			'tanggal' => $this->input->post('tanggal'),
			'materi_bimbingan' => $this->input->post('materi_bimbingan'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
		);

		$this->db->where('id_krs', $this->input->post('id_krs'));
		$this->db->update('krs', $data);

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	function delete_krs()
	{
		$this->db->where('id_krs', $this->input->post('id_krs'));
		$this->db->delete('krs');

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	public function getUTSbyDosen($id_member)
	{
		$this->db->select('t.id_uts, m.nama_member, t.nama_mhs, t.nim_mhs, t.prodi_mhs, t.tanggal, t.materi_bimbingan, t.tindak_lanjut');
		$this->db->from('uts t');
		$this->db->join('member m', 't.id_member = m.id_member', 'left');
		$this->db->where('t.id_member', $id_member);
		return $this->db->get()->result();
	}

	function add_uts()
	{
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'prodi_mhs' => $this->input->post('prodi_mhs'),
			'id_member' => $this->input->post('id_member'),
			'tanggal' => $this->input->post('tanggal'),
			'materi_bimbingan' => $this->input->post('materi_bimbingan'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
		);

		$this->db->insert('uts', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function edit_uts()
	{
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'prodi_mhs' => $this->input->post('prodi_mhs'),
			'id_member' => $this->input->post('id_member'),
			'tanggal' => $this->input->post('tanggal'),
			'materi_bimbingan' => $this->input->post('materi_bimbingan'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
		);

		$this->db->where('id_uts', $this->input->post('id_uts'));
		$this->db->update('uts', $data);

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	function delete_uts()
	{
		$this->db->where('id_uts', $this->input->post('id_uts'));
		$this->db->delete('uts');

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	public function getUASbyDosen($id_member)
	{
		$this->db->select('a.id_uas, m.nama_member, a.nama_mhs, a.nim_mhs, a.prodi_mhs, a.tanggal, a.materi_bimbingan, a.tindak_lanjut');
		$this->db->from('uas a');
		$this->db->join('member m', 'a.id_member = m.id_member', 'left');
		$this->db->where('a.id_member', $id_member);
		return $this->db->get()->result();
	}

	function add_uas()
	{
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'prodi_mhs' => $this->input->post('prodi_mhs'),
			'id_member' => $this->input->post('id_member'),
			'tanggal' => $this->input->post('tanggal'),
			'materi_bimbingan' => $this->input->post('materi_bimbingan'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
		);

		$this->db->insert('uas', $data);

		if ($this->db->affected_rows() > 0) {
			$return =  array('result' => 'success');
		} else {
			$return =  array('result' => 'failed');
		}
		return $return;
	}

	function edit_uas()
	{
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'prodi_mhs' => $this->input->post('prodi_mhs'),
			'id_member' => $this->input->post('id_member'),
			'tanggal' => $this->input->post('tanggal'),
			'materi_bimbingan' => $this->input->post('materi_bimbingan'),
			'tindak_lanjut' => $this->input->post('tindak_lanjut'),
		);

		$this->db->where('id_uas', $this->input->post('id_uas'));
		$this->db->update('uas', $data);

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	function delete_uas()
	{
		$this->db->where('id_uas', $this->input->post('id_uas'));
		$this->db->delete('uas');

		if ($this->db->affected_rows() > 0) {
			$return = array('result' => 'success');
		} else {
			$return = array('result' => 'failed');
		}
		return $return;
	}

	public function update($tabel, $data, $pk, $id)
	{
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id, $val)
	{
		$this->db->delete($tabel, array($id => $val));
	}
}
